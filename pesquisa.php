<?php
session_start();
include_once('config.php');
if((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}
$logado = $_SESSION['login'];
if(!empty($_GET['search']))
{
  $data = $_GET['search'];
  $sql = "SELECT * FROM tbl_registro_parada WHERE id LIKE '%$data%' or Maquina LIKE '%$data%' or  Motivo_da_parada LIKE '%$data%' or data_parada LIKE '%$data%' ORDER BY id DESC";
}
else
{
  $sql = "SELECT * FROM tbl_registro_parada ORDER BY id DESC";
}
$result = $conexao->query($sql);
?>
<style>
  body{
    background-image: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));
    color: white;
    text-align: center;
  }
  .table-bg{
      background: rgba(0, 0, 0, 0.5);
  }

  .box-search{
      display: flex;
      justify-content: center;
      gap: 0.1%;
  }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TBL REGISTRO FORNOS</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid d-flex">
    <a class="navbar-brand" href="sistema.php">
      SISTEMA MET | LAB
    </a>
    <div>
      <a>
    
      </a>
      <ul>
        <a></a>
        </a>
      </ul>
    </div>
    <div class="d-flex ms-auto">
      <button id="download" class="btn btn-danger">Salvar em PDF</button>
    </div>
  </div>
</nav>
<?php
  echo "<h4 style='color: white;'>Bem vindo <u>$logado</u></h4>";
?>
  <br>
    <div class="box-search">
      <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
      <button onclick="searchData()" class="btn btn-primary">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
         </svg>
      </button>
    </div>
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
              <tr>
                <th scope="col" style="text-align: center">APROVADO</th> <!-- Nova coluna -->
                <th scope="col" style="text-align: center">ID</th>
                <th scope="col" style="text-align: center">MQUINA</th>
                <th scope="col" style="text-align: center">MOTIVO<br>DA<br>PARADA</th>
                <th scope="col" style="text-align: center">OPERADOR</th>
                <th scope="col" style="text-align: center">HORA<br>INICIAL</th>
                <th scope="col" style="text-align: center">HORA<br>FINAL</th>
                <th scope="col" style="text-align: center">DATA<br>DA<br>PARADA</th>
                <th scope="col" style="text-align: center">...</th>
              </tr>
              <tfoot>
                    <tr>
                        <td colspan="8" style="text-align: right; font-weight: bold;">Visto do metalúrgico: Cassio Marcelo Sampaio</td>
                    </tr>
                </tfoot>
            </thead>
            <tbody>
              <?php
                while($user_data = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td style='text-align: center'><input type='checkbox' class='select-row'> APROVADO</td>"; // Nova caixa de seleção
                    echo "<td style='text-align: center'>". $user_data['ID'] ."</td>";
                    echo "<td style='text-align: center'>". $user_data['Maquina'] ."</td>";
                    echo "<td style='text-align: center'>". $user_data['Motivo_da_parada'] ."</td>";
                    echo "<td style='text-align: center'>". $user_data['Operador'] ."</td>";
                    echo "<td style='text-align: center'>". $user_data['Hora_inicial'] ."</td>";
                    echo "<td style='text-align: center'>". $user_data['Hora_final'] ."</td>";
                    $dataOriginal = $user_data['data_parada'];
                    $dataFormatada = date_format(date_create_from_format('Y-m-d', $dataOriginal), 'd/m/Y');
                    echo "<td style='text-align: center'>" . $dataFormatada . "</td>";
                    echo "<td>
                     <a class='btn btn-sm btn-primary' href='edite_para_forno.php?ID=" . $user_data['ID'] . "'>
                     <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                     <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                   </svg>
                   </a>
                    </td>";
                    echo "</tr>";
                }
              ?>
            </tbody>
          </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script>
       document.getElementById('download').addEventListener('click', function() {
              var opt = {
                  margin: 1,
                  filename: 'TabelaRegistroFornos.pdf',
                  image: { type: 'jpeg', quality: 0.98 },
                  html2canvas: { scale: 2 },
                  jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
              };

              // Crie uma cópia da tabela
              var cloneTable = document.querySelector('.table').cloneNode(true);

              // Remova linhas não selecionadas da cópia
              var rows = cloneTable.querySelectorAll('tbody tr');
              rows.forEach(function(row) {
                  var checkbox = row.querySelector('.select-row');
                  if (!checkbox.checked) {
                      row.parentNode.removeChild(row);
                  }
              });

              html2pdf().from(cloneTable).set(opt).save();
          });

          var search = document.getElementById('pesquisar');

          search.addEventListener("keydown", function(event) {
            if (event.key === "Enter")
            {
              searchData();
            }
          });

          function  searchData()
          {
            window.location = 'pesquisa.php?search='+search.value;
          } 
    </script>
</body>
</html>

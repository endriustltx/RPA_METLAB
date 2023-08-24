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
$sql = "SELECT * FROM tbl_para_fornos ORDER BY id DESC";
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
    <a class="navbar-brand" href="#">
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
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
              <tr>
                <th scope="col" style="text-align: center">SELECIONAR</th> <!-- Nova coluna -->
                <th scope="col" style="text-align: center">ID</th>
                <th scope="col" style="text-align: center">FREQUENCIA</th>
                <th scope="col" style="text-align: center">RECEITA</th>
                <th scope="col" style="text-align: center">TEMP. DA CAMARA</th>
                <th scope="col" style="text-align: center">TEMP. DO OLEO</th>
                <th scope="col" style="text-align: center">VAZAO NI. PROCESSO</th>
                <th scope="col" style="text-align: center">VAZAO NI. SEGURANÇA</th>
                <th scope="col" style="text-align: center">PRESS. LINHA NI. PROCESS.</th>
                <th scope="col" style="text-align: center">PRESS. LINHA NI. SEG.</th>
                <th scope="col" style="text-align: center">VAZAO METANOL HORA</th>
                <th scope="col" style="text-align: center">PRESS. LINHA DE METANOL</th>
                <th scope="col" style="text-align: center">VAZAO GAS NATURAL</th>
                <th scope="col" style="text-align: center">POTENCIAL DE CARBONO</th>
                <th scope="col" style="text-align: center">%CO NA ATMO. DO FORNO</th>
                <th scope="col" style="text-align: center">%CO2 NA ATMO. DO FORNO</th>
                <th scope="col" style="text-align: center">%CH4 NA ATMO. DO FORNO</th>
                <th scope="col" style="text-align: center">DATA DO REGISTRO</th>
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
                    echo "<td style='text-align: center'><input type='checkbox' class='select-row'></td>"; // Nova caixa de seleção
                    echo "<td style='text-align: center'>". $user_data['ID'] ."</td>";
                    echo "<td style='text-align: center'>". $user_data['Frequencia'] ."</td>";
                    echo "<td style='text-align: center'>". $user_data['Receita'] ."</td>";
                    echo "<td style='text-align: center'>". $user_data['Temp_camara'] ."</td>";
                    echo "<td style='text-align: center'>". $user_data['Temp_Oleo'] ."</td>";
                    echo "<td style='text-align: center'>". $user_data['Vazao_ni_seg'] ."</td>";
                    echo "<td style='text-align: center'>". $user_data['Pres_lin_pro'] ."</td>";
                    echo "<td style='text-align: center'>". $user_data['Pres_lin_ni_seg'] ."</td>";
                    echo "<td style='text-align: center'>". $user_data['Vazao_metanol'] ."</td>";
                    echo "<td style='text-align: center'>". $user_data['Press_lin_meta'] ."</td>";
                    echo "<td style='text-align: center'>". $user_data['Vazao_gas_natural'] ."</td>";
                    echo "<td style='text-align: center'>". $user_data['Pot_carbono'] ."</td>";
                    echo "<td style='text-align: center'>". $user_data['Atmo_forno'] ."</td>";
                    echo "<td style='text-align: center'>". $user_data['Co2_atmo_forno'] ."</td>";
                    echo "<td style='text-align: center'>". $user_data['Ch4_atmo_forno'] ."</td>";
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
    </script>
</body>
</html>

<?php
    session_start();
    if((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['login'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SISTEMA | MET LAB</title>
    <style>
    body
    {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(imagem/img\ formulario/capa.jpg);
            background-size: cover;
            background-repeat: no-repeat;
      }
      .echo{

         color: white;

      }
    </style>
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid d-flex">
    <a class="navbar-brand" href="#">
      SISTEMA MET | LAB
    </a>
    <div class="dropdown">
      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        FORMULARIOS
      </a>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <li><a class="dropdown-item" href="formulario.php">Formulario de Registro de Parada</a></li>
        <li><a class="dropdown-item" href="formulario_parametro_fornos.php">Formulario de Registro de Parametro dos Fornos</a></li>
        <li><a class="dropdown-item" href="pesquisa.php">Pesquisa Registro de Parada</a></li>
      </ul>
    </div>
    <div class="d-flex ms-auto">
      <a href="sair.php" class="btn btn-danger">SAIR</a>
    </div>
  </div>
</nav>
    <?php
      echo "<h1 style='color: white;'>Bem vindo <u>$logado</u></h1>";
    ?>
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX5" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>

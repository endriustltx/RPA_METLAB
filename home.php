<?php
    session_start();
    if((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['login']);
        unset($_SESSION['$senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['login'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MET LAB</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(imagem/img\ formulario/capa.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            text-align: center;
            color: white;
        }
        .box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 15px;
        }
        a{
            text-decoration: none;
            color: white;
            border: 3px solid dodgerblue;
            padding: 10px;    
        }
        a:hover{
            background-color: dodgerblue;
        }
    </style>
</head>
<body>
    <h1>TESTE</h1>
    <h2>TESTE2</h2>
    <div class="box">
        <a href="formulario.php">Formulario de Registo de Parada</a>
        <a href="formulario_parametro_fornos.php">Formulario de Registo de Parmetros dos Fornos</a>
    </div>
</body>
</html>
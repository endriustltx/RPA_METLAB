<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesis.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX5" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>SISTEMA | MET LAB</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Menu lateral -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                <div>
                    <?php
                    echo "<h1 class='echo'>Bem vindo <u>$logado</u></h1>";
                    ?>
                </div>
                <h3 class="text-white mt-3">Categorias</h3>
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle w-100" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" onclick="event.preventDefault();">
                        FORNOS
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="formulario.php">Formulario de Registro de Parada</a></li>
                        <li><a class="dropdown-item" href="formulario_parametro_fornos.php">Formulario de Registro de Parametro dos Fornos</a></li>
                        <li><a class="dropdown-item" href="pesquisa.php">Pesquisa Registro de Parada</a></li>
                    </ul>
                </div>
                <a href="#" class="btn btn-secondary w-100">METALURGIA</a>
                <a href="#" class="btn btn-secondary w-100">INDICADORES</a>
            </nav>
            <!-- Conteúdo principal -->
            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <nav class="navbar">
                    <div class="container-fluid d-flex">
                        <div class="d-flex ms-auto">
                            <a href="sair.php" class="btn btn-danger">SAIR</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</body>
</html>

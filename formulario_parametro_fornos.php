<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}
$logado = $_SESSION['login'];

if (isset($_POST['submit'])) {
    include_once('config.php');

    if (!isset($_POST['receita']) || empty($_POST['receita'])) {
        die("O campo receita é obrigatório!");
    }
    $receita = $_POST['receita'];

    $fornos = $_POST['fornos'];
    $frequencias = $_POST['frequencia'];
    $data_registro = $_POST['data_registro'];
    $temp_camara = $_POST['temp_camara'];
    $temp_oleo = $_POST['temp_oleo'];
    $vazao_ni_pr = $_POST['vazao_ni_pr'];
    $vazao_ni_seg = $_POST['vazao_ni_seg'];
    $pres_lin_pro = $_POST['pres_lin_pro'];
    $pres_lin_ni_seg = $_POST['pres_lin_ni_seg'];
    $vazao_metanol = $_POST['vazao_metanol'];
    $press_lin_meta = $_POST['press_lin_meta'];
    $vazao_gas_natural = $_POST['vazao_gas_natural'];
    $pot_carbono = $_POST['pot_carbono'];
    $atmo_forno = $_POST['atmo_forno'];
    $co2_atmo_forno = $_POST['co2_atmo_forno'];
    $ch4_atmo_forno = $_POST['ch4_atmo_forno'];

    $stmt = $conexao->prepare("INSERT INTO tbl_para_fornos(Fornos, Frequencia, Receita, Data_Registro, Temp_camara, Temp_Oleo, Vazao_ni_pr, Vazao_ni_seg, Pres_lin_pro, Pres_lin_ni_seg, Vazao_metanol, Press_lin_meta, Vazao_gas_natural, Pot_carbono, Atmo_forno, Co2_atmo_forno, Ch4_atmo_forno) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisssssssssssssss", $fornos, $frequencias, $receita, $data_registro, $temp_camara, $temp_oleo, $vazao_ni_pr, $vazao_ni_seg , $pres_lin_pro, $pres_lin_ni_seg , $vazao_metanol , $press_lin_meta , $vazao_gas_natural , $pot_carbono , $atmo_forno , $co2_atmo_forno , $ch4_atmo_forno);

    if ($stmt->execute()) {
        // Inserção bem-sucedida
        echo "Salvo com sucesso!";
    } else {
        //Erro na inserção
        echo "Erro ao inserir: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTROLES DE PARÂMETROS DE PROCESSO NOS FORNOS</title>
    
    <!-- Adicionar CSS do Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url(imagem/img\ formulario/capa.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }
        .box {
            color: slategray;
            padding: 15px;
            border-radius: 15px;
            background-color: rgba(0, 0, 0, 0.6);
        }
        .inputuser {
            background: rgba(255, 255, 255, 0.253);
            border: 1px solid rgb(12, 0, 0);
            color: black;
            outline: none;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
            border-radius: 15px;
            padding: 5px;
        }
        #submit {
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <!-- Adicionei o link para o Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header text-center">
                    <h4>PARAMETRO DE PROCESSO DOS FORNOS</h4>
                </div>
                <div class="card-body">
                    <form action="formulario_parametro_fornos.php" method="POST">

                        <!-- Fornos -->
                        <div class="form-group">
                            <label>Fornos</label>
                            <!-- Lista de Fornos, VKGS 1-5 -->
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                echo '<div class="form-check form-check-inline">';
                                echo "<input class='form-check-input' type='radio' name='fornos' id='VKGS $i' value='VKGS $i'>";
                                echo "<label class='form-check-label' for='VKGS $i'>VKGS $i</label>";
                                echo '</div>';
                            }
                            ?>
                        </div>

                        <!-- Frequência -->
                        <div class="form-group">
                            <label>Frequência</label>
                            <!-- Lista de Horários -->
                            <?php
                            $horarios = ["07:00", "09:00", "11:00", "13:00", "15:00", "17:00", "19:00", "21:00", "23:00", "01:00", "03:00", "05:00"];
                            foreach ($horarios as $hora) {
                                echo '<div class="form-check form-check-inline">';
                                echo "<input class='form-check-input' type='radio' name='frequencia' id='$hora' value='$hora'>";
                                echo "<label class='form-check-label' for='$hora'>$hora</label>";
                                echo '</div>';
                            }
                            ?>
                        </div>

                        <!-- Receita de Uso -->
                        <div class="form-group">
                            <label>Receita de Uso</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="receita" id="OK" value="OK">
                                <label class="form-check-label" for="OK">OK</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="receita" id="NOK" value="NOK">
                                <label class="form-check-label" for="NOK">NOK</label>
                            </div>
                        </div>

                        <!-- Data do Registro -->
                        <div class="form-group">
                            <label for="data_parada">Data do Registro:</label>
                            <input type="date" class="form-control" name="data_registro" id="data_parada" required>
                        </div>

                        <!-- Aqui você continuará com os outros campos, da mesma forma -->
                        <div>
                            <label for="temp_camara">Temperat. da camara durante a cementação e têmpera 600 a 950°C: </label>
                            <br>
                            <input type="text" name="temp_camara" id="temp_camara" class="inputuser" required>
                        </div>
                        <br>
                        <div>
                            <label for="temp_oleo">Temperat. do óleo de têmpera 120 a 170°C: </label>
                            <br>
                            <input type="text" name="temp_oleo" id="temp_oleo" class="inputuser" required>
                        </div>
                        <br>
                        <div>
                            <label for="vazao_ni_pr">Vazão de nitrogênio de processo 4 a 8 M³/H: </label>
                            <br>
                            <input type="text" name="vazao_ni_pr" id="vazao_ni_pr" class="inputuser" required>
                        </div>
                        <br>
                        <div>
                            <label for="vazao_ni_seg">Vazão de nitrogênio de segurança 0 a 30 M3/H: </label>
                            <br>
                            <input type="text" name="vazao_ni_seg" id="vazao_ni_seg" class="inputuser" required>
                        </div>
                        <br>
                        <div>
                            <label for="pres_lin_pro">Pressão da linha de nitrogênio de processo 0,3 a 0,7 Bar: </label>
                            <br>
                            <input type="text" name="pres_lin_pro" id="pres_lin_pro" class="inputuser" required>
                        </div>
                        <br>
                        <div>
                            <label for="pres_lin_ni_seg">Pressão da linha de nitrogênio de segurança 0,3 a 0,7 bar (fornos 3,4 e5): </label>
                            <br>
                            <input type="text" name="pres_lin_ni_seg" id="pres_lin_ni_seg" class="inputuser" required>
                        </div>
                        <br>
                        <div>
                            <label for="vazao_metanol">Vazão de metanol 3 a 4 L/hora: </label>
                            <br>
                            <input type="text" name="vazao_metanol" id="vazao_metanol" class="inputuser" required>
                        </div>
                        <br>
                        <div>
                            <label for="press_lin_meta">Pressão da linha de metanol 0,5 a 1,25 Bar: </label>
                            <br>
                            <input type="text" name="press_lin_meta" id="press_lin_meta" class="inputuser" required>
                        </div>
                        <br>
                        <div>
                            <label for="vazao_gas_natural">Vazão de Gás Natural 0 a 1,0 M³/H: </label>
                            <br>
                            <input type="text" name="vazao_gas_natural" id="vazao_gas_natural" class="inputuser" required>
                        </div>
                        <br>
                        <div>
                            <label for="pot_carbono">Potencial de carbono 0.80-1.25%: </label>
                            <br>
                            <input type="text" name="pot_carbono" id="pot_carbono" class="inputuser" required>
                        </div>
                        <br>
                        <div>
                            <label for="atmo_forno">%CO Na atmosfera do forno 18-22%: </label>
                            <br>
                            <input type="text" name="atmo_forno" id="atmo_forno" class="inputuser" required>
                        </div>
                        <br>
                        <div>
                            <label for="co2_atmo_forno">%CO2 Na atmosfera do forno 0,05-1,0%: </label>
                            <br>
                            <input type="text" name="co2_atmo_forno" id="co2_atmo_forno" class="inputuser" required>
                        </div>
                        <br>
                        <div>
                            <label for="ch4_atmo_forno">%CH4 Na atmosfera do forno 0.1- 5%: </label>
                            <br>
                            <input type="text" name="ch4_atmo_forno" id="ch4_atmo_forno" class="inputuser" required>
                            <br><br>
                            <input type="submit" name="submit" id="submit">
                        </div>
                </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts do Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

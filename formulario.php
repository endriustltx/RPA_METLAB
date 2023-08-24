<?php

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

    $maquina = $_POST['maquina'];
    $motivo_parada = $_POST['motivo_parada'];
    $operador = $_POST['operador'];
    $hora_inicial = $_POST['hora_inicial'];
    $hora_final = $_POST['hora_final'];
    $data_parada = $_POST['data_parada'];

    $stmt = $conexao->prepare("INSERT INTO tbl_registro_parada(Maquina,Motivo_da_parada,Operador,Hora_inicial,Hora_final,data_parada) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $maquina, $motivo_parada, $operador, $hora_inicial, $hora_final, $data_parada);

    if ($stmt->execute()) {
        // Inserção bem-sucedida
    } else {
        //Erro na inserção
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro de Parada</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(imagem/img\ formulario/capa.jpg);
            background-size: cover;
            background-repeat: no-repeat;
           
            
            
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.8);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 3px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputuser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            color: white;
            outline: none;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(20, 147, 220),rgb(17, 54, 71));
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
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Registro de Parada</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="maquina" id="maquina" class="inputuser" required>
                    <label for="maquina">MAQUINA</label>
                    <div>
                    <br><br>
                    <input type="text" name="motivo_parada" id="motivo_parada" class="inputuser" required>
                    <label for="motivo_parada">MOTIVO DA PARADA</label>
                    </div>
                    <br><br>
                    <div>
                    <input type="text" readonly name="operador" id="operador" class="inputuser" value= "<?php echo $logado; ?>" required>
                    <label for="operador">OPERADOR</label>
                    </div>
                    <br><br>
                    <div>
                    <input type="text" name="hora_inicial" id="hora_inicial" class="inputuser" required>
                    <label for="hora_inicial">HORA INICIAL</label>
                    </div>
                    <br><br>
                    <div>
                    <input type="text" name="hora_final" id="hora_final" class="inputuser" required>
                    <label for="hora_final">HORA FINAL</label>
                    </div>
                    <br><br>
                    <div>
                    <label for="data_parada">DATA DA PARADA:</label>
                    <input type="date" name="data_parada" id="data_parada" class="inputdata" required>
                    </div>
                    <br><br>
                    <input type="submit" name="submit" id="submit">
                </div>
            </fieldset>
        </form>
    </div>
    
</body>
</html>
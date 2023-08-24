<?php
if (!empty($_GET['ID']) && is_numeric($_GET['ID'])) {

    include_once('config.php');

    $id = $_GET['ID'];

    // Usando prepared statements para evitar injeção SQL
    $stmt = $conexao->prepare("SELECT * FROM tbl_registro_parada WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();

        $maquina = $user_data['Maquina'];
        $motivo_parada = $user_data['Motivo_da_parada'];
        $operador = $user_data['Operador'];
        $hora_inicial = $user_data['Hora_inicial'];
        $hora_final = $user_data['Hora_final'];
        $data_parada = $user_data['data_parada'];
    } else {
        header('Location: pesquisa.php');
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Registro de Parada</title>
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
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Edição Registro de Parada</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="maquina" id="maquina" class="inputuser" value="<?php echo $maquina;?>" required>
                    <label for="maquina">MAQUINA</label>
                    <div>
                    <br><br>
                    <input type="text" name="motivo_parada" id="motivo_parada" class="inputuser" value="<?php echo $motivo_parada;?>" required>
                    <label for="motivo_parada">MOTIVO DA PARADA</label>
                    </div>
                    <br><br>
                    <div>
                    <input type="text" name="operador" id="operador" class="inputuser" value= "<?php echo $operador; ?>" required>
                    <label for="operador">OPERADOR</label>
                    </div>
                    <br><br>
                    <div>
                    <input type="text" name="hora_inicial" id="hora_inicial" class="inputuser" value="<?php echo $hora_inicial;?>" required>
                    <label for="hora_inicial">HORA INICIAL</label>
                    </div>
                    <br><br>
                    <div>
                    <input type="text" name="hora_final" id="hora_final" class="inputuser" value="<?php echo $hora_final;?>" required>
                    <label for="hora_final">HORA FINAL</label>
                    </div>
                    <br><br>
                    <div>
                    <label for="data_parada">DATA DA PARADA:</label>
                    <input type="date" name="data_parada" id="data_parada" class="inputdata" value="<?php echo $data_parada;?>" required>
                    </div>
                    <br><br>
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="submit" name="update" id="update">
                </div>
            </fieldset>
        </form>
    </div>
    
</body>
</html>
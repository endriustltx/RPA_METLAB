<?php
    include_once('config.php');

    if(isset($_POST['update'])){

        $id = $_POST['id'];
        $maquina = $_POST['maquina'];  // Alterado para minúsculo
        $motivo_parada = $_POST['motivo_parada'];  // Alterado para minúsculo
        $operador = $_POST['operador'];  // Alterado para minúsculo
        $hora_inicial = $_POST['hora_inicial'];  // Alterado para minúsculo
        $hora_final = $_POST['hora_final'];  // Alterado para minúsculo
        $data_parada = $_POST['data_parada'];  // Mantido igual pois estava correto

        // Usando prepared statements para evitar injeção SQL
        $stmt = $conexao->prepare("UPDATE tbl_registro_parada SET Maquina=?, Motivo_da_parada=?, Operador=?, Hora_inicial=?, Hora_final=?, data_parada=? WHERE id=?");
        $stmt->bind_param("ssssssi", $maquina, $motivo_parada, $operador, $hora_inicial, $hora_final, $data_parada, $id);

        if ($stmt->execute()) {
            echo "Registro atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar o registro: " . $stmt->error;
        }

        $stmt->close();
        
        header('Location: pesquisa.php');
    }
?>

<?php
    session_start();
    if (isset($_POST['btn-login']) && !empty($_POST['usuario']) && !empty($_POST['senha'])) {
        include_once('config.php');
        $login = $_POST['usuario'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios_metlab WHERE login = ? and senha = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ss", $login, $senha);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows < 1) {
            unset($_SESSION['login']); // Ajustado para 'login'
            unset($_SESSION['senha']);
            header('Location: login.php');
        } else {
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = $senha;
            header('Location: sistema.php');
        }

        $stmt->close();
    } else {
        header('Location: login.php');
    }
?>
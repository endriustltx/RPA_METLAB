<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>LOGIN</title>
</head>
<body>
    <div class="main-login">
        <div class="left-login">
            <h1> SISTEMA MET|LAB </h1>
            <form action="testeLogin.php" method="POST">
            <img src="metlab.svg" class="left-login-image" alt="metlab">
        </div>
        <div class="right-login"></div>
            <div class="card-login">
                <h1><img src="/imagem/img formulario/LOGOAAM.jpg" alt="LogoAAM"></h1>
                <div class="textfield">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" placeholder="Usuario" id="">
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" placeholder="Senha" id="">
                </div>
                <button class="btn-login" name="btn-login">Login</button>
            </form>
            </div>
    </div>
</body>
</html>
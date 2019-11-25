<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/sb-admin3.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="shortcut icon" type="image/png" href="img/logomarcamin.png">

    <title>JuriGestor - Login</title>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Juri</b>Gestor
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Realize login para iniciar sua sessão!</p>

            <form action="model/verificaLogin.php" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="user" placeholder="Usuário" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mt-3 mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="text" name="pass" class="form-control" placeholder="Senha" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="row mt-4">
                    <!-- /.col -->
                    <div class="col-xs-12 col-md-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="#">Esqueci minha senha</a><br>
                </div>
                <div class="col-12 text-center mt-3">
                    <a href="register.html" class="text-center">Registre-se aqui</a>
                </div>
            </div>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    <footer>
        <script src="node_modules/jquery/dist/jquery.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
        <script src="js/login.js"></script>
    </footer>
</body>

</html>
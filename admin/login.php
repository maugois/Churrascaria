<?php 
include '../conn/connect.php';
// Iniciar a verificação do login
if ($_POST) {
    $login = $_POST['login_usuario'];
    $senha = md5($_POST['senha_usuario']);
    $loginRes = $conn->query("select * from tbusuarios where login_usuario = '$login' and senha_usuario = '$senha'"); 
    $rowLogin = $loginRes->fetch_assoc();
    $numRow = mysqli_num_rows($loginRes);
    // Se a sessão não exitir
    if (!isset($_SESSION)) {
        $sessaoAntiga = session_name('chulettaaa');
        session_start();
        $session_name_new = session_name();
    }

    if ($numRow > 0) {
        $_SESSION['login_usuario'] = $login;
        $_SESSION['nivel_usuario'] = $rowLogin['nivel_usuario'];
        $_SESSION['nome_da_sessao'] = session_name();
        if ($rowLogin['nivel_usuario'] == 'sup') {
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            echo "<script>window.open('../cliente/index.php?cliente=".$login."','_self')</script>";
        }
    } else {
        echo "<script>window.open('invasor.php','_self')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="10;URL=../index.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/2495680ceb.js" crossorigin="anonymous"></script>
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/estilo.css" type="text/css">
    
    <title>Chuleta Quente - Login</title>
</head>

<body class="fundofixo">
    <main class="container">
        <section>
            <article>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <h1 class="breadcrumb text-danger text-center">Faça seu login</h1>
                        <div class="thumbnail">
                            <p class="text-info text-center" role="alert">
                                <i class="fas fa-users fa-10x text-danger"></i>
                            </p>
                            <br>
                            <div class="alert alert-danger" role="alert">
                                <form action="login.php" name="form_login" id="form_login" method="POST" enctype="multipart/form-data">
                                    <label for="login_usuario">Login:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                        </span>
                                        <input type="text" name="login_usuario" id="login_usuario" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu login.">
                                    </p>
                                    <label for="senha_usuario">Senha:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-qrcode text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="password" name="senha_usuario" id="senha_usuario" class="form-control" required autocomplete="off" placeholder="Digite sua senha.">
                                    </p>
                                    <a class="font-weight-bolder text-danger" href="../cliente/cliente_cadastro.php">Cadastra-se</a>
                                    <p class="text-right">
                                        <input type="submit" value="Entrar" class="btn btn-danger">
                                    </p>
                                </form>
                                <p class="text-center">
                                    <small>
                                        <br>
                                        Caso não faça uma escolha em 15 segundos será redirecionado automaticamente para página inicial.
                                    </small>
                                </p>
                            </div><!-- fecha alert -->
                        </div><!-- fecha thumbnail -->
                    </div><!-- fecha dimensionamento -->
                </div><!-- fecha row -->
            </article>
        </section>
    </main>


    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>
<?php 
include '../connection/connect.php';

if ($_POST) {
    $nome_completo = $_POST['nome_completo'];
    $senha_usuario = md5($_POST['senha_usuario']);
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];

    $insereUsuario = "INSERT INTO tbusuarios 
                (login_usuario, senha_usuario, nivel_usuario)
                VALUES 
                ('$cpf', '$senha_usuario', 'com');
                ";

    $insereCliente = "INSERT INTO tbclientes 
                    (nome, email, cpf)
                    VALUES 
                    ('$nome_completo', '$email', '$cpf');
                    ";
    $resultado = $conn->query($insereUsuario);
    $resultado = $conn->query($insereCliente);
}

if (mysqli_insert_id($conn)) {
    header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/2495680ceb.js" crossorigin="anonymous"></script>
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/estilo.css" type="text/css">
    
    <title>Chuleta Quente - Cadastro</title>
</head>

<body class="fundofixo">
    <main class="container">
        <section>
            <article>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <h1 class="breadcrumb text-danger text-center">Faça seu cadastro</h1>
                        <div class="thumbnail">
                            <p class="text-info text-center" role="alert">
                                <i class="fas fa-users fa-8x text-danger"></i>
                            </p>
                            <br>
                            <div class="alert alert-danger" role="alert">
                                <form action="cliente_cadastro.php" name="form_cadastro" id="form_cadastro" method="POST" enctype="multipart/form-data">

                                    <label for="login_usuario">Nome completo:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                        </span>
                                        <input type="text" name="nome_completo" id="nome_completo" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu nome completo">
                                    </p>

                                    <label for="login_usuario">E-mail:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                        </span>
                                        <input type="email" name="email" id="email" class="form-control" autofocus required autocomplete="off" placeholder="Digite o seu E-mail">
                                    </p>

                                    <label for="senha_usuario">CPF:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                                        </span>
                                        <input type="text" name="cpf" id="cpf" class="form-control" required autocomplete="off" placeholder="Digite o seu CPF" oninput="mascara(this)">
                                    </p>

                                    <label for="senha_usuario">Senha:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                        </span>
                                        <input type="password" name="senha_usuario" id="senha_usuario" class="form-control" required autocomplete="off" minlength="4" placeholder="Digite sua senha">
                                    </p>

                                    <div class="row">
                                        <span class="col-md-8">
                                            <a href="../index.php" class="btn btn-danger" role="btn">Voltar</a>
                                        </span>
                                        <span class="col-md-4">
                                            <input type="submit" value="Cadastrar" class="btn btn-danger">
                                        </span>
                                    </div>
                                </form>
                            </div><!-- fecha alert -->
                        </div><!-- fecha thumbnail -->
                    </div><!-- fecha dimensionamento -->
                </div><!-- fecha row -->
            </article>
        </section>
    </main>

    <script type="text/javascript">
        function mascara(i){

            var v = i.value;

            if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
                i.value = v.substring(0, v.length-1);
                return;
            }

            i.setAttribute("maxlength", "14");
            if (v.length == 3 || v.length == 7) i.value += ".";
            if (v.length == 11) i.value += "-";

        }
    </script>
    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
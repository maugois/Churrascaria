<?php 
include 'acesso_com.php';
include '../connection/connect.php';

if ($_POST) {
    $login_usuario = $_POST['login_usuario'];
    $senha_usuario = md5($_POST['senha_usuario']);
    $nivel_usuario = $_POST['nivel_usuario'];

    $insereUsuario = "INSERT INTO tbusuarios 
                (login_usuario, senha_usuario, nivel_usuario)
                VALUES 
                ('$login_usuario', '$senha_usuario', '$nivel_usuario');
                ";
    $resultado = $conn->query($insereUsuario);
}

// Após a gravação bem sucedida do produto, volta (atualiza) para lista 
if (mysqli_insert_id($conn)) {
    header('location: usuario_listar.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Usuário - Insere</title>
</head>
<body class="fundofixo">
    <?php include 'menu_adm.php';?>

    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-6 col-md-8">
                <h2 class="breadcrumb text-danger">
                    <a class="text-decoration-none" href="usuario_listar.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Inserindo Usuários
                </h2>
                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="usuario_insere.php" method="post" name="form_usuario_insere" enctype="multipart/form-data" id="form_usuario_insere">                        
                            <label for="resumo_produto">Login do usuário:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="login_usuario" id="login_usuario" class="form-control" placeholder="Digite o login do usuário" maxlength="32" required>
                            </div>

                            
                            <label for="descri_produto">Senha do usuário:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                </span>
                                <input type="password" name="senha_usuario" id="senha_usuario" class="form-control" placeholder="Digite a senha do usuário" maxlength="32" required>
                            </div>


                            <label for="id_usuario">Nível do usuário:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                </span>
                                <select name="nivel_usuario" id="nivel_usuario" class="form-control" required>
                                        <option value="sup">Superior</option>
                                        <option value="ven">Vendedor</option>
                                        <option value="com">Comum</option>
                                </select>
                            </div>
                            <hr>
                            <input type="submit" name="enviar" id="enviar" class="btn btn-danger btn-block" value="Cadastrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<?php 
include 'acesso_com.php';
include '../conn/connect.php';

if ($_POST) { 

    $id_tipo = $_POST['id_tipo'];
    $sigla_tipo = $_POST['sigla_tipo'];
    $rotulo_tipo = $_POST['rotulo_tipo'];


    $id = $_POST['id_tipo'];

    $updateSql = "UPDATE tbtipos
                    SET id_tipo = '$id_tipo', 
                    sigla_tipo = '$sigla_tipo', 
                    rotulo_tipo = '$rotulo_tipo'
                     WHERE id_tipo = $id;";
    $resultado = $conn->query($updateSql);

    if ($resultado) {
        header('location: tipo_listar.php');
    } 
}

if ($_GET) {
    $id_form = $_GET['id_tipo'];
} else {
    $id_form = 0;
}

$lista = $conn->query("SELECT * FROM tbtipos WHERE id_tipo = $id_form");
$row = $lista->fetch_assoc();
$numRows = $lista->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Usuário - Atualiza</title>
</head>
<body class="fundofixo">
    <?php include 'menu_adm.php';?>

    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-6 col-md-8">
                <h2 class="breadcrumb text-danger">
                    <a class="text-decoration-none" href="produtos_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Alterando Usuários
                </h2>
                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="usuario_insere.php" method="post" name="form_usuario_insere" enctype="multipart/form-data" id="form_usuario_insere">
                            <label for="resumo_produto">Login do usuário:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="login_usuario" id="login_usuario" class="form-control" placeholder="Digite o login do usuário" maxlength="100" required value="">
                            </div>


                            <label for="id_usuario">Nível do usuário:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                </span>
                                <select name="nivel_usuario" id="nivel_usuario" class="form-control" required>
                                        <option value="sup">Superior</option>
                                        <option value="ven">Vendedor</option>
                                </select>
                            </div>
                            <hr>
                            <input type="submit" name="enviar" id="enviar" class="btn btn-danger btn-block" value="Atualizar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
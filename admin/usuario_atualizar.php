<?php 
include 'acesso_com.php';
include '../connection/connect.php';

if ($_POST) {
    
    $id_usuario = $_POST['id_usuario'];
    $login_usuario = $_POST['login_usuario'];
    $nivel_usuario = $_POST['nivel_usuario'];


    $id = $_POST['id_usuario'];

    $updateSql = "UPDATE tbusuarios
                    SET id_usuario = '$id_usuario', 
                    login_usuario = '$login_usuario', 
                    nivel_usuario = '$nivel_usuario'
                     WHERE id_usuario = $id;";
    $resultado = $conn->query($updateSql);

    if ($resultado) {
        header('location: usuario_listar.php');
    } 
}

if ($_GET) {
    $id_form = $_GET['id_usuario'];
} else {
    $id_form = 0;
}

$lista = $conn->query("SELECT * FROM tbusuarios WHERE id_usuario = $id_form");
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
                    <a class="text-decoration-none" href="usuario_listar.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Alterando Usuários
                </h2>
                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="usuario_atualizar.php" method="post" name="form_usuario_atualizar" enctype="multipart/form-data" id="form_usuario_atualizar">
                            <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $row['id_usuario']; ?>">
                        
                            <label for="resumo_produto">Login do usuário:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="login_usuario" id="login_usuario" class="form-control" placeholder="Digite o login do usuário" maxlength="100" required value="<?php echo $row['login_usuario']?>">
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
                            <input type="submit" name="enviar" id="enviar" class="btn btn-danger btn-block" value="Atualizar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
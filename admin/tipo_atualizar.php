<?php 
include 'acesso_com.php';
include '../connection/connect.php';

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
    <title>Tipo - Atualiza</title>
</head>
<body class="fundofixo">
    <?php include 'menu_adm.php';?>

    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-6 col-md-8">
                <h2 class="breadcrumb text-danger">
                    <a class="text-decoration-none" href="tipo_listar.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Alterando Categorias
                </h2>

                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="tipo_atualizar.php" method="post" name="form_tipo_atualizar" enctype="multipart/form-data" id="form_tipo_atualizar">
                            <input type="hidden" name="id_tipo" id="id_tipo" value="<?php echo $row['id_tipo']; ?>">
                            
                            <label for="rotulo_tipo">Rótulo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="rotulo_tipo" id="rotulo_tipo" class="form-control" placeholder="Digite o rótulo do Tipo" maxlength="100" value="<?php echo $row['rotulo_tipo'] ?>">
                            </div>

                            <label for="sigla_tipo">Sigla:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                
                                <input type="text" name="sigla_tipo" id="sigla_tipo" class="form-control" placeholder="Digite a sigla do Tipo" maxlength="3" value="<?php echo $row['sigla_tipo'] ?>">
                            </div>

                            <hr>
                            <input type="submit" name="atualizar" id="atualizar" class="btn btn-danger btn-block" value="Atualizar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
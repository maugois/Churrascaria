<?php 
include 'acesso_com.php';
include '../conn/connect.php';

if ($_POST) { 

    $id_mesa = $_POST['id_mesa'];
    $qtde_pessoas = $_POST['qtde_pessoas'];
    $status_mesa = $_POST['status_mesa'];


    $id = $_POST['id_mesa'];

    $updateSql = "UPDATE tbmesas
                    SET id_mesa = '$id_mesa', 
                    qtde_pessoas = '$qtde_pessoas', 
                    status_mesa = '$status_mesa'
                     WHERE id_mesa = $id;";
    $resultado = $conn->query($updateSql);

    if ($resultado) {
        header('location: mesas_listar.php');
    } 
}

if ($_GET) {
    $id_form = $_GET['id_mesa'];
} else {
    $id_form = 0;
}

$lista = $conn->query("SELECT * FROM tbmesas WHERE id_mesa = $id_form");
$row = $lista->fetch_assoc();
$numRows = $lista->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesa - Atualiza</title>
</head>
<body class="fundofixo">
    <?php include 'menu_adm.php';?>

    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-6 col-md-8">
                <h2 class="breadcrumb text-danger">
                    <a class="text-decoration-none" href="mesas_listar.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Alterando Mesas
                </h2>

                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="mesas_atualizar.php" method="post" name="form_mesas_atualizar" enctype="multipart/form-data" id="form_mesas_atualizar">
                            <input type="hidden" name="id_mesa" id="id_mesa" value="<?php echo $row['id_mesa']; ?>">
                            
                            <label for="rotulo_tipo">Quantidade de Pessoas:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="number" name="qtde_pessoas" id="qtde_pessoas" class="form-control" placeholder="Insira o máximo de pessoas que a mesa suporta" min="1" max="20" value="<?php echo $row['qtde_pessoas'] ?>">
                            </div>

                            <label for="sigla_tipo">Status:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                </span>
                                <select name="status_mesa" id="status_mesa" class="form-control" required>
                                        <option value="Disponível">Disponível</option>
                                        <option value="Indisponível">Indisponível</option>
                                </select>
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
<?php 
include 'acesso_com.php';
include '../conn/connect.php';

if ($_POST) {
    $qtde_pessoas = $_POST['qtde_pessoas'];
    $status_mesa = $_POST['status_mesa'];

    $insereMesa = "INSERT INTO tbmesas 
                (qtde_pessoas, status_mesa)
                VALUES 
                ('$qtde_pessoas', '$status_mesa');
                ";
    $resultado = $conn->query($insereMesa);
}

// Após a gravação bem sucedida do produto, volta (atualiza) para lista 
if (mysqli_insert_id($conn)) {
    header('location: mesas_listar.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Mesas - Insere</title>
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
                    Inserindo Mesas
                </h2>
                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="mesas_insere.php" method="post" name="form_mesas_insere" enctype="multipart/form-data" id="form_mesas_insere">
                            <label for="destaque_produto">Quantidade de pessoas:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="number" name="qtde_pessoas" id="qtde_pessoas" class="form-control" placeholder="Insira o máximo de pessoas que a mesa suporta" min="1" max="20" required>
                            </div>

                            <label for="descri_produto">Status:</label>
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
                            <input type="submit" name="enviar" id="enviar" class="btn btn-danger btn-block" value="Cadastrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
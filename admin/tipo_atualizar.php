<?php 
include 'acesso_com.php';
include '../conn/connect.php';

if ($_POST) { 

    $id_tipo_produto = $_POST['id_tipo_produto'];
    $destaque_produto = $_POST['destaque_produto'];
    $descri_produto = $_POST['descri_produto'];


    $id = $_POST['id_produto'];

    $updateSql = "UPDATE tbprodutos
                    SET id_tipo_produto = '$id_tipo_produto', 
                    destaque_produto = '$destaque_produto', 
                    descri_produto = '$descri_produto',
                    resumo_produto = '$resumo_produto',
                    valor_produto = '$valor_produto'
                     WHERE id_produto = $id;";
    $resultado = $conn->query($updateSql);

    if ($resultado) {
        header('location: produtos_lista.php');
    } 
}

if ($_GET) {
    $id_form = $_GET['id_produto'];
} else {
    $id_form = 0;
}

$lista = $conn->query("SELECT * FROM tbprodutos WHERE id_produto = $id_form");
$row = $lista->fetch_assoc();
$numRows = $lista->num_rows;

// Selecionar os dados de chave estrangeira (lista de tipos de produto)
$consulta_fk = "select * from tbtipos order by rotulo_tipo asc";
$lista_fk = $conn->query($consulta_fk);
$row_fk = $lista_fk->fetch_assoc();
$numRows = $lista_fk->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    Inserindo Categorias
                </h2>
                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="produtos_atualiza.php" method="post" name="form_produto_insere" enctype="multipart/form-data" id="form_produto_insere">
                            <input type="hidden" name="id_produto" id="id_produto" value="<?php echo $row['id_produto']; ?>">
                            <label for="id_tipo_produto">Tipo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                </span>
                                <select name="id_tipo_produto" id="id_tipo_produto" class="form-control" required>
                                    <?php do {?>
                                        <option value="<?php echo $row_fk['id_tipo']; ?>"
                                            <?php 
                                                if (!(strcmp($row_fk['id_tipo'], $row['id_tipo_produto']))) {
                                                    echo "selected=\"selected\"";
                                                }
                                            ?>
                                        >
                                            <?php echo $row_fk['rotulo_tipo'];?>

                                            
                                        </option>
                                    <?php } while ($row_fk = $lista_fk->fetch_assoc());?>
                                </select>
                            </div>

                            <label for="destaque_produto">:</label>
                            <div class="input-group">
                                <label for="destaque_produto_s" class="radio-inline">
                                    <input type="radio" name="destaque_produto" id="destaque_produto" value="Sim" <?php echo $row['destaque_produto']=="Sim"?"checked":null ?>>Sim
                                </label>

                                <label for="destaque_produto_n" class="radio-inline">
                                    <input type="radio" name="destaque_produto" id="destaque_produto" value="Não" <?php echo $row['destaque_produto']=="Não"?"checked":null ?>>Não
                                </label>
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
<?php 
include "connection/connect.php";
$busca = $_GET['buscar'];
$lista = $conn->query("select * from vw_tbprodutos where descri_produto like '%$busca%';");
$row_produto = $lista->fetch_assoc();
$num_linhas = $lista->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Busca por palavra</title>
</head>
<body class="fundofixo">
    <!-- area de menu -->
    <?php include "menu_publico.php";?>

    <div class="container">
        <!-- mostrar se a consulta retornar vazia -->
        <?php if($num_linhas == 0) {?>
            <h2 class="breadcrumb alert-danger">
                <a href="javascript:window.history.go(-1)" class="btn btn-danger">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>                
                Não há produtos cadastrados
            </h2>
        <?php }?>

        <!-- mostrar se a consulta retornou produtos -->
        <?php if($num_linhas > 0) {?>
            <h2 class="breadcrumb alert-danger">
                <a href="javascript:window.history.go(-1)" class="btn btn-danger">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <strong>Produtos Gerais</strong>
            </h2>
            <div class="row">
                <?php do {?>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <a href="produto_detalhes.php?id_produto=<?php echo $row_produto['id_produto'];?>">
                                <img src="images/<?php echo $row_produto['imagem_produto'];?>" class="img-responsive img-rounded">
                            </a>
                            <div class="caption text-right">
                                <h3 class="text-danger">
                                    <strong><?php echo $row_produto['descri_produto'];?></strong>
                                </h3>
                                <p class="text-warning">
                                    <strong><?php echo $row_produto['rotulo_tipo'];?></strong>
                                </p>
                                <p class="text-left">
                                    <?php echo mb_strimwidth($row_produto['resumo_produto'],0,42,'...');?>
                                </p>
                                <p>
                                    <button class="btn btn-default disable" role="button" style="cursor: default">
                                        <?php echo "R$ ".number_format($row_produto['valor_produto'],2,",",".");?>
                                    </button>
                                    <a href="produto_detalhes.php?id_produto=<?php echo $row_produto['id_produto'];?>">
                                        <span class="hidden-xs">Saiba Mais...</span>
                                        <span class="hidden-xs glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } while($row_produto = $lista->fetch_assoc());?>
            </div>
        <?php }?>
        <!-- rodapé -->
        <footer class="panel-footer" style="background: none;">
            <?php include 'rodape.php'; ?>
            <a name="contato"></a>
        </footer>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).on('ready', function(){
        $(".regular").slick({
            dots: true,
            Infinity: true,
            slidesToShow: 3,
            slidesToScroll: 3
        });
    });
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick/slick.min.js"></script>
</html>
<?php 
include 'acesso_com.php';
include '../connection/connect.php';
$lista = $conn->query("select * from tbclientes order by id_cliente desc");
$row = $lista->fetch_assoc();
$rows = $lista->num_rows;


// echo $disabled_mesa->num_rows > 0 ? 'disabled' : '';
// $disabled_mesa = $conn->query("select id_cliente from tbclientes id_cliente = ".$row['id_cliente']." limit 1;");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Reserva - Listar</title>
</head>
<body class="fundofixo">
<?php include "menu_adm.php"; ?>
    <main class="container">
        <h2 class="breadcrumb alert-danger">
            <a class="text-decoration-none" href="index.php">
                <button class="btn btn-danger">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </button>
            </a>    
            <strong>Lista - Pedido de Reservas</strong>
        </h2>
        <table class="table table-hover table-condensed tb-opacidade bg-warning" style="border-radius: 5px;"> 
            <thead>
                <th class="text-center hidden">ID</th>
                <th class="text-center">QUANTIDADE DE PESSOAS</th>
                <th class="text-center">DATA DO PEDIDO</th>
                <th class="text-center">STATUS DO PEDIDO</th>
                <th class="text-center">VERIFICAÇÃO</th>
            </thead>
            
            <tbody> <!-- início corpo da tabela -->
           	        <!-- início estrutura repetição -->
                    <?php do {?>
                    <tr>
                        <td class="text-center hidden">
                            <?php echo $row[''];?>
                        </td>


                        <td class="text-center">
                            <?php echo $row['id_cliente'];?>
                        </td>

                        
                        <td class="text-center text-uppercase">
                            <?php echo $row['id_cliente']?>    
                        </td>

                        <td class="text-center text-uppercase">
                            <?php echo $row['id_cliente']?>    
                        </td>

                        <td>
                            <button data-nome="<?php echo $row['id_cliente']?>" data-id="<?php echo $row['id_cliente']?>" class="confirmar btn btn-success btn-block btn-xs"> 
                                <span class="glyphicon glyphicon-refresh"></span>
                                <span class="hidden-xs">CONFIRMAR</span>
                            </button>
                            
                            <button data-nome="<?php echo $row['id_cliente']?>" data-id="<?php echo $row['id_cliente']?>" class="recusar btn btn-xs btn-block btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                                <span class="hidden-xs">RECUSAR</span>
                            </button>
                        </td>
                    </tr>
                    <?php } while ($row = $lista->fetch_assoc());?>
            </tbody><!-- final corpo da tabela -->
        </table>
    </main>

    <!-- inicio do modal para confirmar... -->
    <div class="modal fade" id="modalEdit" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    Deseja mesmo excluir a mesa de Nº?
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
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-success delete-yes">
                        Confirmar
                    </a>
                    <button class="btn btn-danger" data-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- inicio do modal para recusar... -->
    <div class="modal fade" id="modalEdit" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    Deseja mesmo excluir a mesa de Nº?
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
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-success delete-yes">
                        Confirmar
                    </a>
                    <button class="btn btn-danger" data-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('.confirmar').on('click',function(){
        var nome = $(this).data('nome'); //busca o nome com a descrição (data-nome)
        var id = $(this).data('id'); // busca o id (data-id)
        //console.log(id + ' - ' + nome); //exibe no console
        $('span.nome').text(nome); // insere o nome do item na confirmação
        $('a.delete-yes').attr('href','mesas_excluir.php?id_mesa='+id); //chama o arquivo php para excluir o produto
        $('#modalEdit').modal('show'); // chamar o modal
    });

    $('.recusar').on('click',function(){
        var nome = $(this).data('nome'); //busca o nome com a descrição (data-nome)
        var id = $(this).data('id'); // busca o id (data-id)
        //console.log(id + ' - ' + nome); //exibe no console
        $('span.nome').text(nome); // insere o nome do item na confirmação
        $('a.delete-yes').attr('href','mesas_excluir.php?id_mesa='+id); //chama o arquivo php para excluir o produto
        $('#modalEdit').modal('show'); // chamar o modal
    });
</script>
</html>
<?php 
include 'acesso_com.php';
include '../connection/connect.php';
// Lista do pedidos
$lista = $conn->query("select * from tbpedidoreservas where status_pedido = 'Enviado' order by id_pedido_reservas desc");
$row = $lista->fetch_assoc();
$rows = $lista->num_rows;
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
                            <?php echo $row['id_pedido_reserva']; ?>
                        </td>


                        <td class="text-center">
                            <?php echo $row['num_pessoas'];?>
                        </td>

                        
                        <td class="text-center text-uppercase">
                            <?php echo $row['data_reserva']?>    
                        </td>

                        <td class="text-center text-uppercase">
                            <?php echo $row['status_pedido']?>    
                        </td>

                        <td>
                            <button data-nome="<?php echo $row['id_pedido_reservas']?>" data-id="<?php echo $rowCli['id_cliente']?>" class="informar btn btn-xs btn-block btn-primary">
                                <span class="glyphicon glyphicon-trash"></span>
                                <span class="hidden-xs">INFORMAÇÕES</span>
                            </button>

                            <button data-nome="<?php echo $row['id_pedido_reservas']?>" data-id="<?php echo $row['id_pedido_reservas']?>" class="confirmar btn btn-success btn-block btn-xs"> 
                                <span class="glyphicon glyphicon-refresh"></span>
                                <span class="hidden-xs">CONFIRMAR</span>
                            </button>
                            
                            <button data-nome="<?php echo $row['id_pedido_reservas']?>" data-id="<?php echo $row['id_pedido_reservas']?>" class="recusar btn btn-xs btn-block btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                                <span class="hidden-xs">RECUSAR</span>
                            </button>
                        </td>
                    </tr>
                    <?php } while ($row = $lista->fetch_assoc());?>
            </tbody><!-- final corpo da tabela -->
        </table>
    </main>

    <!-- inicio do modal para informar... -->
    <div class="modal fade" id="modalInfo" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Informações do pedido
                    <button class="close" data-dismiss="modal" type="button">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                
                    <form action="reserva_pedido.php" method="post" name="" enctype="multipart/form-data" id="">
                        <label for="nome">Nome:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </span>
                            <input disabled type="text" name="nome" id="nome" class="form-control" value="<?php echo $rowCli['nome'] ?>">
                        </div>

                        <label for="cpf">CPF:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                            </span>
                            
                            <input disabled type="text" name="cpf" id="cpf" class="form-control" value="<?php echo $rowCli['email'] ?>">
                        </div>

                        <label for="email">E-MAIL:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            </span>
                            
                            <input disabled type="text" name="email" id="email" class="form-control" value="<?php echo $rowCli['cpf'] ?>">
                        </div>

                        <label for="cod">CÓDIGO:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-barcode" aria-hidden="true"></span>
                            </span>
                            
                            <input disabled type="text" name="cod" id="cod" class="form-control" value="<?php echo $row['hash_code'] ?>">
                        </div>

                        <hr>

                        <button class="btn btn-danger" data-dismiss="modal">
                            Fechar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- inicio do modal para confirmar... -->
    <div class="modal fade" id="modalCon" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <span>Confirmar</span>
                    <button class="close" data-dismiss="modal" type="button">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    
                    <form action="reserva_confirma.php" method="post" name="" enctype="multipart/form-data" id="">
                        
                        <label for="mesa">Mesa dísponivel:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                            </span>
                            <input type="text" name="mesa" id="mesa" class="form-control" placeholder="Informe a mesa" maxlength="100">
                        </div>

                        <hr>
                        
                        <a href="#" type="submit" class="btn btn-danger con-yes">
                            Confirmar
                        </a>                

                        <button class="btn btn-danger" data-dismiss="modal">
                            Cancelar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- inicio do modal para recusar... -->
    <div class="modal fade" id="modalRecu" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <span>RECUSAR</span>
                    <button class="close" data-dismiss="modal" type="button">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <form action="reserva_pedido.php" method="post" name="" enctype="multipart/form-data" id="">         

                        <label for="mensagem">Mensagem para o cliente:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </span>
                            <textarea name="mensagem" max-cols="30" rows="5" placeholder="digite sua mensagem" aria-describedby="basic-addon3" class="form-control" required></textarea>
                        </div>

                        <hr>

                        <a href="#" type="button" class="btn btn-danger recu-yes">
                            Confirmar
                        </a>
                        <button class="btn btn-danger" data-dismiss="modal">
                            Cancelar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('.informar').on('click',function(){
        var nome = $(this).data('nome'); //busca o nome com a descrição (data-nome)
        var idInfo = $(this).data('id'); // busca o id (data-id)
        $('span.nome').text(nome); // insere o nome do item na confirmação
        $('#modalInfo').modal('show'); // chamar o modal
    });

    $('.confirmar').on('click',function(){
        var nome = $(this).data('nome'); //busca o nome com a descrição (data-nome)
        var idCon = $(this).data('id'); // busca o id (data-id)
        $('span.nome').text(nome); // insere o nome do item na confirmação
        $('a.con-yes').attr('href','reserva_confirma.php?id_pedido_reservas='+idCon); //chama o arquivo php para excluir o produto
        $('#modalCon').modal('show'); // chamar o modal
    });

    $('.recusar').on('click',function(){
        var nome = $(this).data('nome'); //busca o nome com a descrição (data-nome)
        var idRecu = $(this).data('id'); // busca o id (data-id)
        $('span.nome').text(nome); // insere o nome do item na confirmação
        $('a.delete-yes').attr('href','tipo_excluir.php?id_tipo='+id); //chama o arquivo php para excluir o produto
        $('#modalRecu').modal('show'); // chamar o modal
    });
</script>
</html>
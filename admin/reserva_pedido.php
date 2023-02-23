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
                <th>
                    <a href="mesas_insere.php" target="_self" class="btn btn-block btn-primary btn-xs" role="button">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        <span class="hidden-xs">ADICIONAR</span>
                    </a>
                </th>
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
                            <a href="mesas_atualizar.php?id_mesa=<?php echo $row['id_cliente']?>" role="button" class="btn btn-success btn-block btn-xs"> 
                                <span class="glyphicon glyphicon-refresh"></span>
                                <span class="hidden-xs">CONFIRMAR</span>
                            </a>
                            
                            <button data-nome="<?php echo $row['id_cliente']?>" data-id="<?php echo $row['id_cliente']?>" class="delete btn btn-xs btn-block btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                                <span class="hidden-xs">RECUSAR</span>
                            </button>
                        </td>
                    </tr>
                    <?php } while ($row = $lista->fetch_assoc());?>
            </tbody><!-- final corpo da tabela -->
        </table>
    </main>
    <!-- inicio do modal para excluir... -->
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
                    <h4><span class="nome text-danger"></span></h4>
                </div>
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-danger delete-yes">
                        Confirmar
                    </a>
                    <button class="btn btn-success" data-dismiss="modal">
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
    $('.delete').on('click',function(){
        var nome = $(this).data('nome'); //busca o nome com a descrição (data-nome)
        var id = $(this).data('id'); // busca o id (data-id)
        //console.log(id + ' - ' + nome); //exibe no console
        $('span.nome').text(nome); // insere o nome do item na confirmação
        $('a.delete-yes').attr('href','mesas_excluir.php?id_mesa='+id); //chama o arquivo php para excluir o produto
        $('#modalEdit').modal('show'); // chamar o modal
    });
</script>
</html>
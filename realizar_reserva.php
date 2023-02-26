<?php
include 'connection/connect.php';

// Fazendo a limitação da data da reserva

// Obtém a data atual
$min = new DateTime();
$max = new DateTime();

// Adiciona dois dias
$min->add(new DateInterval('P2D'));

// Adicionar 90 dias à data atual
$max->add(new DateInterval('P90D'));

// Formata a data para o padrão
$minDate = $min->format('Y-m-d h:i');
$maxDate = $max->format('Y-m-d h:i');

if ($_POST) {
    $cpf = $_POST['cpf'];
    // Consulta para ver se o cliente já é cadastrado 
    $listaCli = $conn->query("select cpf from tbclientes where cpf = '$cpf'");
    $rowCli = $listaCli->fetch_assoc();
    $rowsCli = $listaCli->num_rows;
    // Caso o não tiver o cliente cadastrado 
    if ($rowsCli < 1) {
        $nome_completo = $_POST['nome_completo'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $numero_pessoas = $_POST['numero_pessoas'];
        $data = new DateTime($_POST['data_reserva']);
        $data_reserva = $data->format('Y-m-d h:i:s');
        // Inserindo primeiro o usuario para assim poder associar ele a reserva 
        $insereCliente = "INSERT INTO tbclientes 
        (nome, email, cpf)
        VALUES 
        ('$nome_completo', '$email', '$cpf');
        ";
        $resultado = $conn->query($insereCliente);
        // Consulta do ultimo cliente cadastrado 
        $lista = $conn->query("select id_cliente from tbclientes order by id_cliente desc limit 1");
        $row = $lista->fetch_assoc();
        $id_cliente = $row["id_cliente"];
        // Inserindo a reserva com o cliente já associado 
        $inserePedidoReservas = "INSERT INTO tbpedidoreservas 
        (num_pessoas, data_reserva, status_pedido, id_cliente_fk)
        VALUES 
        ($numero_pessoas, '$data_reserva', 'Enviado', $id_cliente);
        ";
        $resultado = $conn->query($inserePedidoReservas);
    }
    // Caso tiver o cliente cadastrado
    if ($rowCli > 0) {
        $numero_pessoas = $_POST['numero_pessoas'];
        $data = new DateTime($_POST['data_reserva']);
        $data_reserva = $data->format('Y-m-d h:i:s');
        // Consultando o id para associar o cliente ao pedido 
        $lista = $conn->query("select id_cliente from tbclientes where cpf = '$cpf'");
        $row = $lista->fetch_assoc();
        $id_cliente = $row["id_cliente"];

        $inserePedidoReservas = "INSERT INTO tbpedidoreservas 
                    (num_pessoas, data_reserva, status_pedido, id_cliente_fk)
                    VALUES 
                    ($numero_pessoas, '$data_reserva', 'Enviado', $id_cliente);
                    ";

        $resultado = $conn->query($inserePedidoReservas);
    }

    // Consultando o id do clinte
    $listaHcli = $conn->query("select id_cliente from tbclientes where cpf = '$cpf'");
    $rowHcli = $listaHcli->fetch_assoc();
    // Consultando o id do pedido 
    $listaHped = $conn->query("select id_pedido_reservas from tbpedidoreservas order by id_pedido_reservas desc limit 1");
    $rowHped = $listaHped->fetch_assoc();
    // Inserindo o hash code 
    $hashCode = ("#CH-".$rowHped['id_pedido_reservas']."".$rowHcli['id_cliente']."PR".uniqid());
    $resultado = $conn->query("UPDATE tbpedidoreservas SET hash_code = '$hashCode' WHERE id_cliente_fk = ".$rowHcli['id_cliente'].";");
}

// Após a gravação bem sucedida 
if (mysqli_insert_id($conn)) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link arquivos Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="css/estilo.css">
    <title>Chuleta Quente - Pedido de reserva</title>
</head>
<body class="fundofixo d-flex justify-content">
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-6 col-md-8">
                <h2 class="breadcrumb text-danger">
                    <a class="text-decoration-none" href="index.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Pedido de Reserva
                </h2>

                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="realizar_reserva.php" method="post" name="form_reserva_fazer" enctype="multipart/form-data" id="form_reserva_fazer">
                            <label for="rotulo_tipo">Nome completo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="nome_completo" id="nome_completo" class="form-control" placeholder="Digite seu nome completo" maxlength="100" required>
                            </div>

                            <label for="sigla_tipo">Email:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                </span>
                                
                                <input type="email" name="email" id="email" class="form-control" placeholder="Digite o seu E-mail" required>
                            </div>

                            <label for="sigla_tipo">CPF:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                                </span>
                                
                                <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Digite o seu CPF" oninput="mascara(this)" required>
                            </div>

                            <label for="sigla_tipo">Número de pessoas:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </span>
                                
                                <input type="number" name="numero_pessoas" id="numero_pessoas" class="form-control" placeholder="Informe a quantidade de pessoas" min="1" max="20" required>
                            </div>

                            <label for="sigla_tipo">Data da reserva:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                </span>
                                
                                <input type="datetime-local" name="data_reserva" id="data_reserva" class="form-control" min="<?php echo $minDate ?>" max="<?php echo $maxDate ?>" required>
                            </div>
                            
                            <div>
                                <p>Sua reserva já foi feita? <a class="font-weight-bolder text-danger" href="validacao_status.php"><strong>Clique aqui!</strong></a> para conferir o seu status.</p>
                            </div>
                            <hr>
                            <input type="submit" name="reservar" id="reservar" class="btn btn-danger btn-block reservar" value="Reservar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript">
        function mascara(i){

            var v = i.value;

            if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
                i.value = v.substring(0, v.length-1);
                return;
            }

            i.setAttribute("maxlength", "14");
            if (v.length == 3 || v.length == 7) i.value += ".";
            if (v.length == 11) i.value += "-";

        }
    </script>
    <script type="text/javascript">
        $('.reservar').on('click',function(){
            $('a.reservar-yes').attr('href','index.php'); //chama o arquivo php para excluir o produto
            $('#modalEdit').modal('show'); // chamar o modal
        });

        function abreModal(){
            $.ajax({
                type: 'POST',
                //Caminho do arquivo do seu modal
                url: 'index.php',
                success: function(data){              
                    $('.modal').html(data);
                    $('#myModal').modal('show');
                    
                    $('.reservar').on('click',function(){
                    $('a.reservar-yes').attr('href','index.php'); //chama o arquivo php para excluir o produto
                    $('#modalEdit').modal('show'); // chamar o modal
                    });
                }
            });
        }
    </script>
</body>
</html>
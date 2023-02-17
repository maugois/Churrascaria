<?php 
echo 'phpmail';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link arquivos Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Realizar pedido de reserva</title>
</head>
<body class="fundofixo d-flex justify-content">
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-6 col-md-8">
                <h2 class="breadcrumb text-danger">
                    <a class="text-decoration-none" href="../index.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Pedido de Reserva
                </h2>

                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="reserva_fazer.php" method="post" name="form_reserva_fazer" enctype="multipart/form-data" id="form_reserva_fazer">
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
                                
                                <input type="email" name="email" id="email" class="form-control" placeholder="Digite o seu E-mail" maxlength="3" required>
                            </div>

                            <label for="sigla_tipo">CPF:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                                </span>
                                
                                <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Digite o seu CPF" maxlength="3" required>
                            </div>

                            <label for="sigla_tipo">Número de pessoas:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </span>
                                
                                <input type="number" name="numero_pessoas" id="numero_pessoas" class="form-control" min="15" placeholder="Informe a quantidade de pessoas" required>
                            </div>

                            <hr>
                            <input type="submit" name="reservar" id="reservar" class="btn btn-danger btn-block" value="Reservar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
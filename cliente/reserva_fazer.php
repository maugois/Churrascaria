<?php 
 
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
            <div class="col-sm-6 col-md-6">
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
                        <form action="tipo_insere.php" method="post" name="form_tipo_insere" enctype="multipart/form-data" id="form_tipo_insere">
                            <label for="rotulo_tipo">Rótulo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="rotulo_tipo" id="rotulo_tipo" class="form-control" placeholder="Digite o rótulo do Tipo" maxlength="100" required>
                            </div>

                            <label for="sigla_tipo">Sigla:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                
                                <input type="text" name="sigla_tipo" id="sigla_tipo" class="form-control" placeholder="Digite a sigla do Tipo" maxlength="3" required>
                            </div>

                            <hr>
                            <input type="submit" name="cadastrar" id="cadastrar" class="btn btn-danger btn-block" value="Cadastrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<?php 
include 'acesso_com.php';
include '../connection/connect.php';
$lista = $conn->query("select * from tbreservas order by id_reserva desc");
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
            <strong>Lista - Reservas</strong>
        </h2>
        <table class="table table-hover table-condensed tb-opacidade bg-warning" style="border-radius: 5px;"> 
            <thead>
                <th class="text-center">ID DA RESERVA</th>
                <th class="text-center">MESA</th>
                <th class="text-center">
                    <button target="_self" class="btn btn-success btn-xs" role="button">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        <span class="hidden-xs">CONFIRMADAS</span>
                    </button>

                    <button target="_self" class="btn btn-danger btn-xs" role="button">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        <span class="hidden-xs">CANCELADAS</span>
                    </button>

                    <button href="mesas_insere.php" class="btn btn-primary btn-xs" role="button">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        <span class="hidden-xs">EXPIRADAS</span>
                    </button>
                </th>
            </thead>
            
            <tbody> <!-- início corpo da tabela -->
           	        <!-- início estrutura repetição -->
                    <?php do {?>
                    <tr>
                        <td class="text-center">
                            <?php echo $row['id_reserva'];?>
                        </td>
                        
                        <td class="text-center text-uppercase">
                            <?php echo $row['mesa'];?>    
                        </td>

                        <td class="text-center text-uppercase">
                            <button href="mesas_insere.php" class="btn btn-primary btn-xs" role="button">
                                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                <span class="hidden-xs">INFORMAÇÕES</span>
                            </button>   
                        </td>
                    </tr>
                    <?php } while ($row = $lista->fetch_assoc());?>
            </tbody><!-- final corpo da tabela -->
        </table>
    </main>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
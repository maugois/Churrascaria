<!-- html:5 -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Área do Cliente</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link arquivos Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body class="fundofixo">
    <nav class="nav navbar-inverse">
        <div class="container-fluid">
            <!-- Agrupamento para exibição Mobile -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar" aria-expanded="false">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php" class="navbar-brand">
                    <img src="../images/" alt="Logo churrascaria">
                </a>
            </div>
            <!-- Fecha Agrupamento para exibição Mobile -->
            <!-- nav direita -->
            <div class="collapse navbar-collapse" id="defaultNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <button type="button" class="btn btn-danger navbar-btn disabled">
                            Olá, <?php echo($_SESSION['login_usuario']); ?>!
                        </button>
                    </li>
                    <li class="active"><a href="index.php">CLIENTE</a></li>
                    <li><a href="cliente_lista.php">RESERVA</a></li>
                    <li><a href="cliente_perfil.php">PERFIL</a></li>
                    <li class="active">
                        <a href="../index.php">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </li>
                    <li>
                        <a href="../admin/logout.php">
                            <span class="glyphicon glyphicon-log-out"></span>
                        </a>
                    </li>
                </ul>
            </div><!-- fecha collapse navbar-collapse -->
            <!-- Fecha nav direita -->
        </div><!-- fecha container-fluid -->
    </nav>
</body>
<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
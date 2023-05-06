<?php 
include "connection/connect.php";
$lista_tipos = $conn->query("select * from tbtipos order by rotulo_tipo;"); 
$rows_tipos = $lista_tipos->fetch_all();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Menu público</title>
</head>
<body>
    <!-- abre a barra de navegação -->
    <nav class="fixed navbar fixed-top navbar-light navbar-inverse bg-light">
        <div class="container-fluid">
            <!-- agrupamento mobile -->
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#menupublico" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php" class="navbar-brand">
                    <img src="images/logo_churrascaria.png" alt="Logotipo Churrascaria">
                </a>
            </div>
            <!-- fecha agrupamento mobile -->
            <!-- nav direita -->
            <div class="collapse navbar-collapse" id="menupublico">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <button type="button" class="btn btn-danger navbar-btn" data-toggle="modal" data-target="#myModal">
                            <span class="glyphicon glyphicon-calendar"></span>&nbsp;
                            FAÇA SUA RESERVA
                        </button>
                        
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header d-flex">
                                        <h4 class="modal-title">Atenção:</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><strong>O pedido da reserva deve ser feito apenas por um CPF para o mesmo dia.</strong></li>
                                            <li class="list-group-item"><strong> O pedido da reserva deve ter mínimo 48 horas de antecedência e no máximo 90 dias para ser efetuada.</strong></li>
                                            <li class="list-group-item"><strong>As informações usadas para a realização do pedido da reserva são: 
                                                Nome completo, CPF e o E-mail.&nbsp;&#128521;</strong>
                                            </li>
                                        </ul>
                                        
                                        <input type="checkbox" name="termos" id="termos" value="termos" onclick="termos();">&nbsp;<label for="termos"><b>Li e concordo com os termos.</b></label>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Voltar</button>
                                        <a type="button" class="btn btn-success disabled" id="reserva-btn"  href="realizar_reserva.php">Reservar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="active">
                        <a href="index.php">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </li>
                    <li><a href="index.php#destaques">DESTAQUES</a></li>
                    <li><a href="index.php#produtos">PRODUTOS</a></li>
                    <!-- dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            TIPOS
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach($rows_tipos as $row) {?>
                                <li><a href="produtos_por_tipo.php?id_tipo=<?php echo $row[0] ?>"><?php echo $row[2] ?></a></li>
                            <?php }?>
                        </ul>
                    </li>
                    <!-- fim dropdown -->
                    <li><a href="index.php#contato">CONTATO</a></li>
                    <!-- início formulário de busca -->
                    <form action="produtos_busca.php" method="get" name="form-busca" id="form-busca" class="navbar-form navbar-left" role="search">
                        <div class="input-group">
                            <input type="search" name="buscar" id="buscar" size="10" class="form-control" aria-label="search" placeholder="Buscar produto" required>
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </div>
                        </div>                                
                    </form>

                    <?php 

                    ?>
                    <!-- fim do formulário de busca -->
                    <li class="active">
                        <a href="admin/index.php">
                            <span class="glyphicon glyphicon-user">&nbsp;ADMIN/CLIENTE</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script>
        function termos() {
            let check = document.getElementById('termos');
            let btn = document.getElementById('reserva-btn');

            if (check.checked == true) {
                return btn.classList.remove("disabled");
            } else {
                return btn.classList.add("disabled");
            }
        }
    </script>
</body>
</html>
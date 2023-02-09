<?php 
include "../conn/connect.php";
$conn->query("DELETE FROM tbusuarios WHERE id_usuario = ".$_GET['id_usuario']);
header('location: usuario_listar.php');
?>
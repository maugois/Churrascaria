<?php
include "../conn/connect.php";
$conn->query("DELETE FROM tbtipos WHERE id_tipo = ".$_GET['id_tipo']);
header('location: tipo_listar.php');
?>
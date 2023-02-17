<?php
include "../conn/connect.php";
$conn->query("DELETE FROM tbmesas WHERE id_mesa = ".$_GET['id_mesa']);
header('location: mesas_listar.php');
?>
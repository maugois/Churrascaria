<?php
include "../conn/connect.php";
$conn->query("DELETE FROM tbprodutos WHERE id_produto = ".$_GET['id_produto']);
// $conn->query("UPDATE tbprodutos SET deleted = now() where id_produto =".$_GET['id_produto']);
header('location: produtos_lista.php');
?>
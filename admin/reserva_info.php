<?php 
include '../connection/connect.php'; 
// Informações
$listaCli = $conn->query("select * from tbclientes");
$rowCli = $listaCli->fetch_assoc();
$rowsCli = $listaCli->num_rows;
?>
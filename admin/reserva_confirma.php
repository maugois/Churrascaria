<?php
include '../connection/connect.php'; 
// Confirmar
if ($_POST) {
    // Atualizando a o pedido para confirmado, mudando status para não aparecer
    $id_pedido = $_GET['id_pedido_reservas'];
    $updateSql = "UPDATE tbpedidoreservas
                    SET status_pedido = 'Visualizado'
                     WHERE id_pedido_reservas = $id_pedido;";
    $resultado = $conn->query($updateSql);
    // Define como uma reserva
    $mesa = $_POST['mesa'];

    $insereTipo = "INSERT INTO tbreservas
                  (status_reserva, mesa, id_pedido_fk)
                  VALUES 
                  ('Confirmado', '$mesa', $id_pedido);
                  ";
    $resultado = $conn->query($insereTipo);
        
    // Após a gravação bem sucedida do produto, volta (atualiza) para lista 
    if ($resultado) {
        header('location: reserva_pedido.php');
    } 
} else {
    echo 'teste';
}
?>
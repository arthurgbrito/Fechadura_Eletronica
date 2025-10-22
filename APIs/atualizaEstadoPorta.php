<?php 

include_once("../database/conexao.php");

$lab = $_POST['lab'] ?? '';
$estadoPortaAtual = $_POST['estadoPorta'] ?? '';

$response = ["ok" => false];

$sql = "UPDATE laboratorios SET estado_porta = '$estadoPortaAtual' WHERE id = '$lab'";
if (mysqli_query($conn, $sql)) {
    $response = ["ok" => true];
} else $response = ["ok" => false];;

header('Content-Type: application/json');
echo json_encode($response);

?>
<?php 

include_once("../database/conexao.php");

// Recebe os dados via POST
$lab = $_POST['lab'] ?? '';
$estadoPortaAtual = $_POST['estadoPorta'] ?? '';

// Inicializa a resposta com a flag falsa
$response = ["ok" => false];

// Atualiza o estado da porta no banco de dados
$sql = "UPDATE laboratorios SET estado_porta = '$estadoPortaAtual' WHERE id = '$lab'";

// Se a consulta tiver sucesso, atualiza a flag para true na resposta, caso contrário permanece false
if (mysqli_query($conn, $sql)) {
    $response = ["ok" => true];
}

header('Content-Type: application/json');
echo json_encode($response); // Envia a resposta apenas com a flag para um possível debug

?>
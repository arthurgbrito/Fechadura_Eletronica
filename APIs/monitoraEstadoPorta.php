<?php 

include_once("../database/conexao.php");

$lab = $_GET['lab']; // Pega a variável via GET 

// Consulta o estado da porta do laboratório
$sql = "SELECT estado_porta FROM laboratorios WHERE id = '$lab'";
$result = mysqli_query($conn, $sql);

// Se tiver resultado
if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $estado_porta = $row['estado_porta']; // Pega o estado da porta

    // Monta o array de resposta se der certo
    $response = ([ 
        "ok" => true,
        "estado_porta" => (bool)$estado_porta
    ]);
} else {
    // Monta o array se der errado
    $response = ([
        "ok" => false,
        "estado_porta" => NULL
    ]);
}

header('Content-Type: application/json');
echo json_encode($response);

?>
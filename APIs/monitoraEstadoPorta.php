<?php 

include_once("../database/conexao.php");

$lab = $_GET['lab'];

$sql = "SELECT estado_porta FROM laboratorios WHERE id = '$lab'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $estado_porta = $row['estado_porta'];

    $response = ([
        "ok" => true,
        "estado_porta" => (bool)$estado_porta
    ]);
} else {
    $response = ([
        "ok" => false,
        "estado_porta" => NULL
    ]);
}

header('Content-Type: application/json');
echo json_encode($response);

?>
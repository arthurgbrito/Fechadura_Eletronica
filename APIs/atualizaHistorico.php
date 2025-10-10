<?php 

include_once("../database/conexao.php");
date_default_timezone_set('America/Sao_Paulo');

$cracha = $_POST['cracha'] ?? '';
$lab = $_POST['lab'] ?? '';
$acao = $_POST['acao'] ?? '';
$response = ["ok" => false];

if (!$cracha || !$lab || !$acao) {
    $response = ["ok" => false, "erro" => "Parametros faltando"];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

$sql = "SELECT Username FROM usuarios WHERE cracha = '$cracha'";
$result = mysqli_query($conn, $sql);

if ($result){

    $data = date('Y-m-d');
    $hora = date('H:i:s');
    $row = mysqli_fetch_assoc($result);
    $username = $row['Username'];
    
    $sql = "INSERT INTO historico(usuario, data, hora, lab_id) VALUES('$username', '$data', '$hora', '$lab')";
    mysqli_query($conn, $sql);

    $response = ["ok" => true];
}


header('Content-Type: application/json');
echo json_encode($response);    

?>
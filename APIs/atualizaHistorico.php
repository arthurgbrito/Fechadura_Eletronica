<?php 

include_once("../database/conexao.php");
date_default_timezone_set('America/Sao_Paulo'); // Define o fuso horário como o de São Paulo

// Recebe os dados via POST
$cracha = $_POST['cracha'] ?? '';
$lab = $_POST['lab'] ?? '';

// Caso faltem parâmetros, retorna erro e encerra a execução
if (!$cracha || !$lab) {
    $response = ["ok" => false, "erro" => "Parametros faltando"];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// Caso contrário, prossegue com a consulta para achar o usuário com o crachá recebido
$sql = "SELECT Username FROM usuarios WHERE cracha = '$cracha'";
$result = mysqli_query($conn, $sql);

// Se a consulta tiver sucesso, busca a data e hora atual e insere os dados na tabela de histórico no banco de dados
if ($result){

    $data = date('Y-m-d');
    $hora = date('H:i');
    $row = mysqli_fetch_assoc($result);
    $username = $row['Username'];
    
    $sql = "INSERT INTO historico(usuario, data, hora, lab_id) VALUES('$username', '$data', '$hora', '$lab')";
    mysqli_query($conn, $sql);

    $response = ["ok" => true];
}


header('Content-Type: application/json');
echo json_encode($response); // Envia a resposta apenas com a flag para casos de debug

?>
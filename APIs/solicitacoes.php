<?php 

    include_once('../database/conexao.php');

    $sql = "SELECT s.id, s.usuario_id, u.Username, s.status_cadastro, s.log FROM solicitacoes s JOIN usuarios u ON s.usuario_id = u.id WHERE s.status_cadastro = 'pendente' ORDER BY s.id DESC LIMIT 1";

    $result = mysqli_query($conn, $sql);
    
    $response = [];

    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $response = $row['status_cadastro'];
    } else {
        $response = ["mensagem" => "nenhuma_solicitacao"];
    }

    header('Content-Type: application/json');

    echo json_encode($response);

?>
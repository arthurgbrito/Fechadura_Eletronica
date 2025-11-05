<?php 

    session_start();
    include_once('../database/conexao.php');

    $solicitacao_id = $_GET['id']; // Pega a variável via GET

    // Faz a contulta, verificando o status atual de cadastro
    $sql = "SELECT status_cadastro FROM solicitacoes WHERE id = '$solicitacao_id' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    // Se houver resultado
    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $status = $row['status_cadastro']; // Pega o status de cadastro

        echo json_encode(["ok" => true, "status_cadastro" => $status]); // Envia o status em formato JSON com a flag ok como true
    } else echo json_encode(["ok" => false]); // Se não houver resultado, envia a flag ok como false, 

?>
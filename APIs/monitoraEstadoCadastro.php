<?php 

    session_start();
    include_once('../database/conexao.php');

    $solicitacao_id = $_GET['id'];

    $sql = "SELECT status_cadastro FROM solicitacoes WHERE id = '$solicitacao_id' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $status = $row['status_cadastro'];

        if ($status === 'concluido'){
            echo json_encode(["ok" => true, "status_cadastro" => "concluido"]);
        } else if ($status === 'pendente') {
            echo json_encode(["ok" => true, "status_cadastro" => "pendente"]);
        } else if ($status === 'erro') {
            echo json_encode(["ok" => true, "status_cadastro" => "erro"]);
        }
    }

?>
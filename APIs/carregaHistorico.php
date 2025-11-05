<?php 

    include_once("../database/conexao.php");

    $sql = "SELECT * FROM historico ORDER BY id ASC"; // Seleciona todas as colunas e linhas da tabela ordenados por ordem crescente de ID 
    $result = mysqli_query($conn, $sql);

    $historico = [];

    if (mysqli_num_rows($result)){ // Se a query tiver sucesso
        while ($row = mysqli_fetch_assoc($result)){ // Pega cada linha retornada pela query e adiciona ao array
            $historico[] = $row;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($historico);
?>
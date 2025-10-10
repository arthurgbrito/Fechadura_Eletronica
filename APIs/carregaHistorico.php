<?php 

    include_once("../database/conexao.php");

    $sql = "SELECT * FROM historico ORDER BY id ASC";
    $result = mysqli_query($conn, $sql);

    $historico = [];

    if (mysqli_num_rows($result)){
        while ($row = mysqli_fetch_assoc($result)){
            $historico[] = $row;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($historico);
?>
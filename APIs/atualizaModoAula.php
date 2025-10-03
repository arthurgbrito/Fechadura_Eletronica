<?php 

    include_once("../database/conexao.php");

    $lab = $_GET['lab'] ?? '';
    $response = ["ok" => false];

    if (!empty($lab)){

        $sql = "SELECT modo_aula FROM laboratorios WHERE id = '$lab'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_assoc($result);
            $estado_atual = (int)$row['modo_aula'];

            $responde = [
                "ok" => true,
                "username" => $user['Username'],
                "modoAula" => $estado_atual
            ];
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);

?>
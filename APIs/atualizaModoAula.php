<?php 

    include_once("../database/conexao.php");

    $lab = $_GET['lab'] ?? '';
    $modoAula_esp = $_GET['modoAula'] ?? '';
    $response = ["ok" => false];

    if (!empty($lab)){

        $sql = "SELECT modo_aula FROM laboratorios WHERE id = '$lab'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_assoc($result);
            $modoAula_banco = (int)$row['modo_aula'];

            if ($modoAula_esp === $modoAula_banco) {
                $response = [
                    "ok" => true,
                    "diferente" => false
                ];
            } else if ($modoAula_esp != $modoAula_banco) {
                $response = [
                    "ok" => true,
                    "diferente" => true,
                    "modoAula" => $modoAula_banco
                ];
            }
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);

?>
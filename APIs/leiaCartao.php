<?php 

    include_once("../database/conexao.php");

    $cracha = $_GET['cracha'] ?? '';
    $lab = $_GET['lab'] ?? '';
    $response = ["autorizado" => false];

    if (!empty($cracha)){
        $sql = "SELECT Username FROM usuarios WHERE cracha = '$cracha' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
            $user = mysqli_fetch_assoc($result);

            $sql = "SELECT modo_aula FROM laboratorios WHERE id = '$lab'";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($result);
            $estado_atual = (int)$row['modo_aula'];
            $estado_novo = $estado_atual ? 0 : 1;

            $sql = "UPDATE laboratorios SET modo_aula = '$estado_novo' WHERE id = '$lab'";
            mysqli_query($conn, $sql);

            $response = [ 
                "autorizado" => true,
                "username" => $user['Username'],
                "modoAula" => $estado_atual
            ];
                
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);

?>
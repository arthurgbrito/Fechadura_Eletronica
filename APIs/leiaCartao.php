<?php 

    include_once("../database/conexao.php");

    $cracha = $_GET['cracha'] ?? '';
    $response = ["autorizado" => false];

    if (!empty($cracha)){
        $sql = "SELECT Username FROM usuarios WHERE cracha = '$cracha' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
            $user = mysqli_fetch_assoc($result);
            
            $response = [ 
                "autorizado" => true,
                "username" => $user['Username']
            ];
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);

?>
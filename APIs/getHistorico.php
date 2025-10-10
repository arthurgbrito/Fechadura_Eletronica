<?php 

    include_once('../database/conexao.php');

    $ultimoID = intval($_GET['ultimoID']);

    $sql = "SELECT * FROM historico WHERE id > $ultimoID ORDER BY id ASC";
    $result = mysqli_query($conn, $sql);

    $linhas = [];

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $id = (int)$row['id'];
            $usuario = $row['usuario'];
            $data = $row['data'];
            $hora = $row['hora'];
            $lab = (int)$row['lab_id'];

            $response = ([
                "ok" => true,
                "id" => $id,
                "usuario" => $usuario,
                "data" => $data,
                "hora" => $hora,
                "lab" => $lab
            ]);
        }
    } else {
        $response = (["ok" => false]);
    }

    header('Content-Type: application/json');
    echo json_encode($response);

?>
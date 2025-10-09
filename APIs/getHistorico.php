<?php 

    include_once('../database/conexao.php');

    $ultimoID = intval($_GET['ultimoID']);

    $sql = "SELECT * FROM historico WHERE id > $ultimoID ORDER BY ASC";
    $result = mysqli_query($conn, $sql);

    $linhas = [];

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $linhas[] = $row;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($linhas);

?>
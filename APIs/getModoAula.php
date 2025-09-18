<?php 

    session_start();
    include_once("../database/conexao.php");

    $lab = $_GET['lab'];

    if((!isset($_SESSION['email'])) || (!isset($_SESSION['senha']))){
        echo json_encode(["ok" => false, "mensagem" => "Sessão expirada"]);   
    } else {
        $sql = "SELECT modo_aula FROM laboratorios WHERE id = '$lab'";
        $result = mysqli_query($conn, $sql);

        if ($row = mysqli_fetch_assoc($result)){
            echo json_encode(["ok" => true, "modo_aula" => (int)$row['modo_aula']]);
        } else {
            echo json_encode(["ok" => false, "mensagem" => "Sessão expirada"]); 
        }
    }

?>
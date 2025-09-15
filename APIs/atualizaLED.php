<?php 
    session_start();
    include_once("../database/conexao.php");

    $lab = $_GET['lab'];
    $response = ["ok" => false];

    // Verifica se existe algum usuário logado
    if((!isset($_SESSION['email'])) || (!isset($_SESSION['senha']))){
        echo json_encode(["ok" => false, "mensagem" => "Sessão expirada"]);
        exit;
    } else { // Se existir
        $email = $_SESSION['email'];
        $senha = $_SESSION['senha'];

        $sql = "SELECT id FROM usuarios WHERE Email = '$email' AND Password = '$senha' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        echo json_encode(["ok" => false, "mensagem" => "Sessão ONLINE"]);

        if (mysqli_num_rows($result) > 0){
            $user = mysqli_fetch_assoc($result);
            $user_id = $user['id'];

            $sql = "SELECT * FROM permissoes WHERE usuario_id = '$user_id' AND laboratorio_id = '$lab' LIMIT 1";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0){

                $sql = "SELECT modo_aula FROM laboratorios WHERE id = '$lab' LIMIT 1";
                $res = mysqli_query($conn, $sql);

                $row = mysqli_fetch_assoc($res);
                $estado_atual = (int)$row['modo_aula'];

                $estado_novo = !$estado_atual;
                $sql = "UPDATE laboratorios SET modo_aula = '$estado_novo' WHERE id = '$lab'";
                mysqli_query($conn, $sql);

                $response = [
                    "ok" => true,
                    "mensagem" => "Modo aula atualizado",
                    "lab" => $lab,
                    "modo_aula" => $estado_novo
                ];
            }
        }
    }

    header("Content-Type: application/json");
    echo json_encode($response);

?>
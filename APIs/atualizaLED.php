<?php 
    session_start();
    include_once("../database/conexao.php");

    $lab = $_GET['lab'];
    $response = ["ok" => false];

    // Verifica se existe algum usuário logado
    if((!isset($_SESSION['email'])) || (!isset($_SESSION['senha']))){
        echo json_encode(["ok" => false, "mensagem" => "Sessão expirada"]);
        
    } else { // Se existir

        //Pega as informações do usuário
        $email = $_SESSION['email'];
        $senha = $_SESSION['senha'];

        // Procura o ID desse usuário
        $sql = "SELECT id FROM usuarios WHERE Email = '$email' AND Password = '$senha' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        // Se achar o ID
        if (mysqli_num_rows($result) > 0){
            $user = mysqli_fetch_assoc($result);
            $user_id = $user['id']; // Pega esse ID

            // Procura na tabela de permissões se ele tem permissão para entrar no lab
            /*$sql = "SELECT * FROM permissoes WHERE usuario_id = '$user_id' AND laboratorio_id = '$lab' LIMIT 1";
            $result = mysqli_query($conn, $sql);*/

            $sql = "SELECT modo_aula FROM laboratorios WHERE id = '$lab' LIMIT 1";
            $res = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($res);
            $estado_atual = (int)$row['modo_aula'];

            /*$estado_novo = !$estado_atual;
            $sql = "UPDATE laboratorios SET modo_aula = '$estado_novo' WHERE id = '$lab'";
            mysqli_query($conn, $sql);*/

            $response = [
                "ok" => true,
                "mensagem" => "Modo aula atualizado",
                "lab" => $lab,
                "modo_aula" => $estado_atual
            ];

            // Se existir essa permissão
            /*if (mysqli_num_rows($result) > 0){


                
            }*/
        }
    }

    header("Content-Type: application/json");
    echo json_encode($response);

?>
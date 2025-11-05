<?php 
    session_start(); // Inicia a sessão
    include_once("../database/conexao.php");

    // Pega o laboratório e o novo estado de modo aula atualizado pelo toggle
    $lab = $_GET['lab'];
    $estado_novo = (int)$_GET['estado'];

    // Confere se o usuário está com a sessão ativa
    if((!isset($_SESSION['email'])) || (!isset($_SESSION['senha']))){
        $response = (["ok" => false, "mensagem" => "Sessão expirada"]);
    } else { // Se estiver logado

        // Atualiza o valor do modo aula no banco de dados
        $sql = "UPDATE laboratorios SET modo_aula = '$estado_novo' WHERE id = '$lab'";
        $result = mysqli_query($conn, $sql);

        // Se a atualização foi feita com sucesso
        if ($result) {

            //Pega as informações do usuário
            $email = $_SESSION['email'];
            $senha = $_SESSION['senha'];

            // Procura o crachá desse usuário
            $sql = "SELECT cracha FROM usuarios WHERE Email = '$email' AND Password = '$senha' LIMIT 1";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0){ // Se achar o crachá
                $user = mysqli_fetch_assoc($result);
                $cracha = $user['cracha']; 

                // Pega ele e coloca na resposta junto com o novo estado do modo aula e uma flag de sucesso
                $response = ([
                    "ok" => true,
                    "cracha" => $cracha,
                    "modo_aula" => $estado_novo
                ]);
            } else {
                // Se não achar o crachá, resposta recebe erro com a flag de falha
                $response = ([
                    "ok" => false,
                    "mensagem" => "Erro ao pegar o crachá"
                ]);
            }
        } else {
            // Se não atualizar, resposta recebe erro com a flag de falha
            $response = ([
                "ok" => false,
                "mensagem" => "Erro ao atualizar"
            ]);
        }
    }
    
    header("Content-Type: application/json");
    echo json_encode($response); // Envia a resposta em formato JSON

?>
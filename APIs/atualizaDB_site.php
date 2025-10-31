<?php 
    session_start();
    include_once("../database/conexao.php");

    // Pega o laboratório e o novo estado de modo aula atualizado pelo toggle
    $lab = $_GET['lab'];
    $estado_novo = (int)$_GET['estado'];

    // Confere se o usuário está logado
    if((!isset($_SESSION['email'])) || (!isset($_SESSION['senha']))){
        $response = (["ok" => false, "mensagem" => "Sessão expirada"]);
    } else { // Se estiver logado

        // Atualiza o valor do modo aula no banco de dados
        $sql = "UPDATE laboratorios SET modo_aula = '$estado_novo' WHERE id = '$lab'";
        $result = mysqli_query($conn, $sql);

        // Retorna o sucesso ou falha da operação
        if ($result) {

            //Pega as informações do usuário
            $email = $_SESSION['email'];
            $senha = $_SESSION['senha'];

            // Procura o crachá desse usuário
            $sql = "SELECT cracha FROM usuarios WHERE Email = '$email' AND Password = '$senha' LIMIT 1";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0){ // Se achar o crachá desse usuário 
                $user = mysqli_fetch_assoc($result);
                $cracha = $user['cracha']; // Pega ele

                $response = ([
                    "ok" => true,
                    "cracha" => $cracha,
                    "modo_aula" => $estado_novo
                ]);
            } else {
                $response = ([
                    "ok" => false,
                    "mensagem" => "Erro ao pegar o crachá"
                ]);
            }
        } else {
            $response = ([
                "ok" => false,
                "mensagem" => "Erro ao atualizar"
            ]);
        }
    }
    
    header("Content-Type: application/json");
    echo json_encode($response);
    
    // Procura na tabela de permissões se ele tem permissão para entrar no lab
    /*$sql = "SELECT * FROM permissoes WHERE usuario_id = '$user_id' AND lab_id = '$lab' LIMIT 1";
    $result = mysqli_query($conn, $sql);*/

?>
<?php 

    include_once("../database/conexao.php");

    // Recepção dos dados 
    $id_solicitacao = $_POST['id_solicitacao'];
    $cracha = $_POST['cracha'];


    // Consulta o banco de dados para verificar se já está cadastrado o novo crachá
    $sql = "SELECT id FROM usuarios WHERE cracha = '$cracha' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    // Se já existir algum usuário com esse crachá cadastrado, retorna um JSON de erro e para imediatamente a execução do script
    if (mysqli_num_rows($result) > 0){ 

        // Completa as informações na tabela de solicitações, repassando o erro lá
        $sql = "UPDATE solicitacoes SET status_cadastro = 'erro', cracha = '0' WHERE id = '$id_solicitacao'";
        mysqli_query($conn, $sql);


        // Apaga as informações do usuário que tentou se cadastrar
        $sql = "DELETE u FROM usuarios u JOIN solicitacoes s ON u.id = s.usuario_id WHERE s.id = '$id_solicitacao'";
        mysqli_query($conn, $sql);

        echo json_encode(["status" => "erro"]);
        exit;
    }


    // Se não existir esse crachá no banco, aí sim será feito o UPDATE dele e do ID do usuário no banco de solicitações
    $sql = "UPDATE solicitacoes SET status_cadastro = 'concluido', cracha = '$cracha' WHERE id = '$id_solicitacao'";
    mysqli_query($conn, $sql);

    //Aqui será feito o UPDATE no banco de usuários, com o crachá a partir do id retornado acima
    $sql = "UPDATE usuarios u JOIN solicitacoes s ON u.id = s.usuario_id SET u.cracha = '$cracha' WHERE s.id = '$id_solicitacao'";
    mysqli_query($conn, $sql);

    echo json_encode(["status" => "ok"]);

?>
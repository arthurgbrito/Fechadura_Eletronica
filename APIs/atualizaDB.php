<?php 

    include_once("../database/conexao.php");

    // Recebe os dados via POST
    $id_solicitacao = $_POST['id_solicitacao'];
    $cracha = $_POST['cracha'];
    $flag = (bool)$_POST['flag'];

    // Consulta o banco de dados para verificar se já está cadastrado o novo crachá
    $sql = "SELECT id FROM usuarios WHERE cracha = '$cracha' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    // Se já existir algum usuário com esse crachá cadastrado, retorna um JSON de erro e para imediatamente a execução do script
    
    if ($flag){
        $sql = "UPDATE solicitacoes SET status_cadastro = 'erro', cracha = NULL WHERE id = '$id_solicitacao'";
        mysqli_query($conn, $sql);
        
        echo json_encode(["ok" => true]);

    } else if (mysqli_num_rows($result) > 0){ 

        // Completa as informações na tabela de solicitações, repassando o erro lá
        $sql = "SELECT usuario_id FROM solicitacoes WHERE id = '$id_solicitacao' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $usuario_id = $row['usuario_id'];

        $sql = "UPDATE solicitacoes SET status_cadastro = 'erro', cracha = NULL WHERE id = '$id_solicitacao'";
        mysqli_query($conn, $sql);

        // Apaga as informações do usuário que tentou se cadastrar
        $sql = "UPDATE usuarios SET Password = NULL WHERE id = '$usuario_id'";
        mysqli_query($conn, $sql);

        echo json_encode(["ok" => false]);
        
    } else {
        
        // Se não existir esse crachá no banco, aí sim será feito o UPDATE dele e do ID do usuário no banco de solicitações
        $sql = "UPDATE solicitacoes SET status_cadastro = 'concluido', cracha = '$cracha' WHERE id = '$id_solicitacao'";
        mysqli_query($conn, $sql);

        //Aqui será feito o UPDATE no banco de usuários, com o crachá a partir do id retornado acima
        $sql = "UPDATE usuarios u JOIN solicitacoes s ON u.id = s.usuario_id SET u.cracha = '$cracha' WHERE s.id = '$id_solicitacao'";
        mysqli_query($conn, $sql);

        echo json_encode(["ok" => true]);
    }
?>
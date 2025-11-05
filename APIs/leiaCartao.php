<?php 

include_once("../database/conexao.php");

// Pega as varoáveis enviadas via GET
$cracha = $_GET['cracha'] ?? '';
$lab = $_GET['lab'] ?? '';
$response = ["autorizado" => false];

// Se o crachá não estiver vazio
if (!empty($cracha)){

    // Faz a consulta no banco buscando o usuário com o crachá informado
    $sql = "SELECT Username FROM usuarios WHERE cracha = '$cracha' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    // Se o usuário for encontrado, ele é autorizado a passar o crachá
    if (mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);

        // Busca o modo aula atual do laboratório
        $sql = "SELECT modo_aula FROM laboratorios WHERE id = '$lab'";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);
        $estado_atual = (int)$row['modo_aula'];
        $estado_novo = !$estado_atual; // Pega o modo aula e inverte o valor

        // Atualiza esse valor no banco de dados
        $sql = "UPDATE laboratorios SET modo_aula = '$estado_novo' WHERE id = '$lab'";
        mysqli_query($conn, $sql);

        // Monta o array de resposta indicando que o usuário foi autorizado e o novo estado do modo aula
        $response = [ 
            "autorizado" => true,
            "username" => $user['Username'],
            "modoAula" => $estado_novo
        ];
            
    }
}

header('Content-Type: application/json');
echo json_encode($response);

?>
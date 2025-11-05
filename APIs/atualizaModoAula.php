<?php 

include_once("../database/conexao.php");

// Recebe os parâmetros via GET
$lab = $_GET['lab'] ?? '';
$modoAula_esp = $_GET['modoAula'] ?? '';

// Se a variável LAB não estiver vazia, continua com a lógica
if (!empty($lab)){

    // Consulta no banco de dados para obter o estado atual do modo aula
    $sql = "SELECT modo_aula FROM laboratorios WHERE id = '$lab'";
    $result = mysqli_query($conn, $sql);

    // Verifica se a consulta retornou algum resultado
    if (mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result); // Pega a linha do resultado
        $modoAula_banco = (int)$row['modo_aula']; // Pega a coluna modo_aula da linha

        if ($modoAula_esp === $modoAula_banco) { //Se os valores do esp e do banco forem iguais, não retorna diferença
            $response = [
                "ok" => true,
                "diferente" => false
            ];
        } else if ($modoAula_esp != $modoAula_banco) { // Se forem diferentes, retorna a diferença
            $response = [
                "ok" => true,
                "diferente" => true,
                "modoAula" => $modoAula_banco
            ];
        }
    }
}

header('Content-Type: application/json');
echo json_encode($response);

?>
<?php 

// Inicia a sessão e inclui o arquivo de conexão com o banco de dados
session_start();
include_once("../database/conexao.php");

// Pega o ID por meio do GET
$lab = $_GET['lab'];

// Verifica se a sessão está ativa
if((!isset($_SESSION['email'])) || (!isset($_SESSION['senha']))){
    echo json_encode(["ok" => false, "mensagem" => "Sessão expirada"]);   
} else { // Se a sessão estiver ativa

    // Busca o modo de aula no banco de dados
    $sql = "SELECT modo_aula FROM laboratorios WHERE id = '$lab'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)){ // Se a busca for bem sucedida, retorna a operação como ok e o valor de modo aula
        echo json_encode(["ok" => true, "modo_aula" => (int)$row['modo_aula']]);
    } else { // Se a busca falhar, retorna a operação como não ok e uma mensagem de erro
        echo json_encode(["ok" => false, "mensagem" => "Sessão expirada"]); 
    }
}

?>
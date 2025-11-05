<?php 

// Inclui a conexão com o banco de dados
include_once("../database/conexao.php");

// Faz a consulta no banco de dados para obter os usuários com crachás não nulos e os crachás correspondentes
$sql = "SELECT Username, cracha FROM usuarios WHERE cracha IS NOT NULL";
$result = mysqli_query($conn, $sql);

$usuarios = [];

// Se a consulta tiver sucesso
if ($result){
    while($row = mysqli_fetch_assoc($result)){ // Percorre cada linha do JSON retornado pela consulta
        $usuarios[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($usuarios); // Retorna o vetor de usuários em JSON

?>
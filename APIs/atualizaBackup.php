<?php 

include_once("../database/conexao.php");

$sql = "SELECT Username, cracha FROM usuarios WHERE cracha IS NOT NULL AND cracha <> 0";
$result = mysqli_query($conn, $sql);

$usuarios = [];

while($row = mysqli_fetch_assoc($result)){
    $usuarios[] = $row;
}

header('Content-Type: application/json');
echo json_encode($usuarios);

?>
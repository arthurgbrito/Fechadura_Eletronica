<?php 

    include_once("../database/conexao.php");

    $id_solicitacao = $_POST['id_solicitacao'];
    $cracha = $_POST['cracha'];

    $sql = "UPDATE solicitacoes SET status_cadastro = 'concluido', cracha = '$cracha' WHERE id = '$id_solicitacao'";

    mysqli_query($conn, $sql);

    $sql = "UPDATE usuarios u JOIN solicitacoes s ON u.id = s.usuario_id SET u.cracha = '$cracha' WHERE s.id = '$id_solicitacao'";

    mysqli_query($conn, $sql);

    echo json_encode(["status" => "ok"]);

    header('Location: sistema.php');

?>
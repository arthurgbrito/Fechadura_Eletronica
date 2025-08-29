<?php
header('Content-Type: application/json');

$ip_esp = '172.20.0.153';
$acao = $_GET['acao'] ?? 'off';

if ($acao === 'on') {
    file_get_contents("http://$ip_esp/led/on");
    echo json_encode([
        "ok" => true,
        "mensagem" => "LED ligado com sucesso"
    ]);
} elseif ($acao === 'off') {
    file_get_contents("http://$ip_esp/led/off");
    echo json_encode([
        "ok" => true,
        "mensagem" => "LED desligado com sucesso"
    ]);
} else {
    echo json_encode([
        "ok" => false,
        "mensagem" => "Ação inválida"
    ]);
}
?>

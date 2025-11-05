<?php 

session_start();

// Encerra a sessão do usuário atual
unset($_SESSION['email']);
unset($_SESSION['senha']);
header("Location: ../templates/login.php");

?>
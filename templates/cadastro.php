<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

  include_once('../database/conexao.php');

  $nome = $_POST['nome'];
  $senha = $_POST['senha'];
  $email = $_POST['email'];
  $cargo = $_POST['cargo'];

  $sql = "INSERT INTO usuarios(Username, Password, Email, Cargo) VALUES ('$nome', '$senha', '$email', '$cargo')";
  $resultado = mysqli_query($conn, $sql);
  
  if ($resultado){
    $usuario_id = mysqli_insert_id($conn);  

    $sql = "INSERT INTO solicitacoes(usuario_id, status_cadastro) VALUES ('$usuario_id', 'pendente')";
    mysqli_query($conn, $sql);

    $sql = "SELECT id from solicitacoes WHERE usuario_id = '$usuario_id' ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $solicitacao_id = $row['id'];

    header('Content-Type: application/json');
    echo json_encode(['ok' => true, "solicitacao_id" => $solicitacao_id]);
  } else {
      header('Content-Type: application/json', true, 500);
      echo json_encode(['ok' => false, 'error' => mysqli_error($conn)]);
  }
  exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro - Controle de Acesso</title>
  <link rel="stylesheet" href="../style/style-cadastro.css">
  <link rel="stylesheet" href="../style/medias-cadastro.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="shortcut icon" href="../style/imagens/logo-tro.ico" type="image/x-icon">
  <script src="../scripts/cadastroScript.js"></script>
</head>
<body>

  <header>
    <div class="text">
      <h1>Controle de Acesso</h1>
      <h2>Curso de Eletrônica</h2>
    </div>
    <div class="box-image">
      <img src="../style/imagens/logo-tro.png" alt="Logo TRO Eletrônica">
    </div>
  </header>

  <section id="conteudo">
    
    <h3>Cadastro de Usuário</h3>
      
    <form id="formCadastro">

      <div class="input">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
      </div>

      <div class="input">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required>
      </div>
      
      
      <div class="input">
        <label for="senha">Senha</label>
        <div class="box-password">
          <input type="password" id="senha" name="senha" required>
            <i class="bi bi-eye-fill" id="olho"></i>
        </div>
      </div>

      <div class="input">
        <label for="cargo">Cargo</label>
        <select id="cargo" name="cargo" required>
          <option value="">Selecione...</option>
          <option value="auxiliar">Auxiliar de Ensino</option>
          <option value="professor">Professor</option>
          <option value="estagiario">Estagiário</option>
        </select>
      </div>

      <input type="submit" id="enviar" name="enviar" value="Cadastrar">

    </form>

    <div class="link-login">
      <p>Já tenho cadastro? <a href="login.php">Login</a></p>
    </div>

  </section>

  <div id="aproximeCracha">
    <h1>Aproxime o seu crachá na Fechadura</h1>
    <img src="../style/imagens/aproximacao-sem-fundo.jpg" alt="aproximação" class="imagem">
  </div>
  
  <div id="modalSucesso" class="modal">
    <div class="modal-content">
      <div class="checkmark">&#10004;</div>
      <h2>Cadastro concluído!</h2>
      <p>Seu crachá foi registrado com sucesso. Você será redirecionado para o login.</p>
    </div>
  </div>
  
</body>
</html>

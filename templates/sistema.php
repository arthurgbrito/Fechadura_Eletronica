<?php 
    session_start();

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <link rel="stylesheet" href="../estilos/style-sistema.css">
    <link rel="stylesheet" href="../estilos/medias-sistema.css">
    <link rel="shortcut icon" href="../estilos/imagens/logo-tro.ico" type="image/x-icon">
</head>
<body>

    <header>
        <img src="../estilos/imagens/logo-tro.png" alt="Logo Curso">
        <h1>Controle de Acesso - Curso de Eletrônica</h1>
    </header>

    <main>
        <section id="historico">
            <h1>Histórico</h1>
            <iframe src="historico.html" id="mostra_Historico" frameborder="0"></iframe>
        </section>
        <section id="interacao_Porta">
            <!--<div id="estado_Porta">
                <h1>Estado da Porta</h1>
                <div>
                    <img src="../estilos/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
            </div>
        
            <div id="modo_Aula">
                <h1>Modo Aula</h1>

                <div class="inter-User">
                    <div class="estado">
                        <label for="modoToggle" class="label_Toggle">Desativado</label>
                        <label class="caixa-checkbox">
                            <input type="checkbox" id="modoToggle">
                            <span class="slider"></span>
                        </label>
                        
                    </div>
                    
                    <div class="entrada-motivo">
                        <label for="motivo">Motivo:</label>
                        <select name="motivos" id="motivo">
                            <option value="Aula no Laboratório"></option>
                            <option value="Aberto para práticas"></option>
                            <option value="Outro"></option>
                        </select>
                    </div>
                </div>
                
                <button onclick="window.location.href='ligaled.php?acao=on'">Ativar Modo Aula</button>
            </div>-->

        <h1 class="titulo_lab">Laboratórios</h1>

        <div class="rolagem_lab">
            <div class="caixa-laboratorio">
                <h1>Laboratório 1</h1>
                <div class="estado_porta">
                    <img src="../estilos/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
                <div class="modo_aula">
                    <label for="ativar">Modo Aula</label>
                    <input type="button" value="On" id="ativar1" onclick = ligaLed()>
                </div>
            </div>
            <div class="caixa-laboratorio">
                <h1>Laboratório 2</h1>
                <div class="estado_porta">
                    <img src="../estilos/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
                <div class="modo_aula">
                    <label for="ativar">Modo Aula</label>
                    <input type="button" value="On" id="ativar">
                </div>
            </div>
            
            <div class="caixa-laboratorio">
                <h1>Laboratório 3</h1>
                <div class="estado_porta">
                    <img src="../estilos/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
                <div class="modo_aula">
                    <label for="ativar">Modo Aula</label>
                    <input type="button" value="On" id="ativar">
                </div>
            </div>
            
            <div class="caixa-laboratorio">
                <h1>Laboratório 6</h1>
                <div class="estado_porta">
                    <img src="../estilos/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
                <div class="modo_aula">
                    <label for="ativar">Modo Aula</label>
                    <input type="button" value="On" id="ativar">
                </div>
            </div>
            
            <div class="caixa-laboratorio">
                <h1>Laboratório 9</h1>
                <div class="estado_porta">
                    <img src="../estilos/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
                <div class="modo_aula">
                    <label for="ativar">Modo Aula</label>
                    <input type="button" value="On" id="ativar">
                </div>
            </div>
            
            <div class="caixa-laboratorio">
                <h1>Laboratório 10</h1>
                <div class="estado_porta">
                    <img src="../estilos/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
                <div class="modo_aula">
                    <label for="ativar">Modo Aula</label>
                    <input type="button" value="On" id="ativar">
                </div>
            </div>
            
            <div class="caixa-laboratorio">
                <h1>Laboratório 11</h1>
                <div class="estado_porta">
                    <img src="../estilos/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
                <div class="modo_aula">
                    <label for="ativar">Modo Aula</label>
                    <input type="button" value="On" id="ativar">
                </div>
            </div>
            
            <div class="caixa-laboratorio">
                <h1>Laboratório 12</h1>
                <div class="estado_porta">
                    <img src="../estilos/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
                <div class="modo_aula">
                    <label for="ativar">Modo Aula</label>
                    <input type="button" value="On" id="ativar">
                </div>
            </div>
            
            <div class="caixa-laboratorio">
                <h1>Laboratório 13</h1>
                <div class="estado_porta">
                    <img src="../estilos/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
                <div class="modo_aula">
                    <label for="ativar">Modo Aula</label>
                    <input type="button" value="On" id="ativar">
                </div>
            </div>
            
            <div class="caixa-laboratorio">
                <h1>Laboratório 14</h1>
                <div class="estado_porta">
                    <img src="../estilos/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
                <div class="modo_aula">
                    <label for="ativar">Modo Aula</label>
                    <input type="button" value="On" id="ativar">
                </div>
            </div>
        </div>

        </section>
    </main>
    
    <script>

        async function ligaLed() {
        const btn = document.getElementById("ativar1");
        btn.disabled = true;
        btn.value = "Ligando...";

        try {
            const resp = await fetch("../ligaled.php?acao=on", {
                method: "GET",
                cache: "no-store"
            });

            if (!resp.ok) throw new Error("HTTP " + resp.status);

            const data = await resp.json();
            if (data.ok) {
                btn.value = data.mensagem + " ✅";
            } else {
                btn.value = "Erro: " + data.mensagem;
            }
        } catch (err) {
            btn.value = "Erro: " + err;
        }

        setTimeout(() => {
            btn.disabled = false;
            btn.value = "Ligar";
        }, 3000);
    }


    </script>

</body>
</html>
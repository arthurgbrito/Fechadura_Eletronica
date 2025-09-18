<?php 
    session_start();

    // Verifica se existe algum usuário logado
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
    <link rel="stylesheet" href="../style/style-sistema.css">
    <link rel="stylesheet" href="../style/medias-sistema.css">
    <script src="../scripts/sistemaScript.js"></script>
    <link rel="shortcut icon" href="../style/imagens/logo-tro.ico" type="image/x-icon">
</head>
<body>

    <header>
        <img src="../style/imagens/logo-tro.png" alt="Logo Curso">
        <h1 class="header_title" >Controle de Acesso - Curso de Eletrônica</h1>
    </header>

    <main>
        <section id="historico">
            <h1>Histórico</h1>
            <iframe src="historico.html" id="mostra_Historico" frameborder="0"></iframe>
        </section>
        <section id="interacao_Porta">

        <h1 class="titulo_lab">Laboratórios</h1>

        <div class="rolagem_lab">
            <div class="caixa-laboratorio">
                <h1>Laboratório 1</h1>
                <div class="estado_porta">
                    <img src="../style/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
                <div class="modo_aula">
                    <label for="toggle1">Modo Aula</label>
                        <div class="toggle-modo-aula">
                            
                        <div class="caixa_led" id="led_R_1"> 
                            <span class="led"></span> 
                            <span class="baixo-led"></span> 
                        </div>
                        <input type="checkbox" name="on/off" id="toggle1" class="toggle" onchange="atualizaModoAula('1')">
                        <label for="toggle1" class="switch">
                            <span class="slider"></span>
                        </label>
                        <div class="caixa_led" id="led_G_1">
                            <span class="led"></span>
                            <span class="baixo-led"></span> 
                        </div>
                    </div>
                    <div class="box-botao" >
                        <input type="button" value="Abrir Porta" class="abre_porta">
                    </div>
                </div>
            </div>

            <div class="caixa-laboratorio">
                <h1>Laboratório 2</h1>
                <div class="estado_porta">
                    <img src="../style/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
                <div class="modo_aula">
                    <label for="toggle2">Modo Aula</label>
                    
                    <div class="toggle-modo-aula">
                        <div class="caixa_led" id="led_R_2">
                            <div class="led"></div>
                            <span class="baixo-led"></span> 
                        </div>
                        <input type="checkbox" name="on/off" id="toggle2" class="toggle" onchange="atualizaModoAula('2')">
                        <label for="toggle2" class="switch">
                            <span class="slider"></span>
                        </label>
                        <div class="caixa_led" id="led_G_2">
                            <div class="led"></div>
                            <span class="baixo-led"></span> 
                        </div>
                    </div>
                    <div>
                        <input type="button" value="Abrir Porta" class="abre_porta">
                    </div>
                </div>
            </div>
            
            <div class="caixa-laboratorio">
                <h1>Laboratório 3</h1>
                <div class="estado_porta">
                    <img src="../style/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
                <div class="modo_aula">
                    <label for="toggle3">Modo Aula</label>
                    
                    <div class="toggle-modo-aula">
                        <div class="caixa_led" id="led_R_3">
                            <div class="led"></div>
                            <span class="baixo-led"></span> 
                        </div>
                        <input type="checkbox" name="on/off" id="toggle3" class="toggle" onchange="atualizaModoAula('3')">
                        <label for="toggle3" class="switch">
                            <span class="slider"></span>
                        </label>
                        <div class="caixa_led" id="led_G_3">
                            <div class="led"></div>
                            <span class="baixo-led"></span> 
                        </div>
                    </div>
                    <div>
                        <input type="button" value="Abrir Porta" class="abre_porta">
                    </div>
                </div>
            </div>
            
            <div class="caixa-laboratorio">
                <h1>Laboratório 6</h1>
                <div class="estado_porta">
                    <img src="../style/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
                <div class="modo_aula">
                    <label for="toggle6">Modo Aula</label>
                    
                    <div class="toggle-modo-aula">
                        <div class="caixa_led" id="led_R_6">
                            <div class="led"></div>
                            <span class="baixo-led"></span> 
                        </div>
                        <input type="checkbox" name="on/off" id="toggle6" class="toggle" onchange="atualizaModoAula('6')">
                        <label for="toggle6" class="switch">
                            <span class="slider"></span>
                        </label>
                        <div class="caixa_led" id="led_G_6">
                            <div class="led"></div>
                            <span class="baixo-led"></span> 
                        </div>
                    </div>
                    <div>
                        <input type="button" value="Abrir Porta" class="abre_porta">
                    </div>
                </div>
            </div>
            
            <div class="caixa-laboratorio">
                <h1>Laboratório 9</h1>
                <div class="estado_porta">
                    <img src="../style/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
                <div class="modo_aula">
                    <label for="toggle9">Modo Aula</label>
                    
                    <div class="toggle-modo-aula">
                        <div class="caixa_led" id="led_R_9">
                            <div class="led"></div>
                            <span class="baixo-led"></span> 
                        </div>
                        <input type="checkbox" name="on/off" id="toggle9" class="toggle" onchange="atualizaModoAula('9')">
                        <label for="toggle9" class="switch">
                            <span class="slider"></span>
                        </label>
                        <div class="caixa_led" id="led_G_9">
                            <div class="led"></div>
                            <span class="baixo-led"></span> 
                        </div>
                    </div>
                    <div>
                        <input type="button" value="Abrir Porta" class="abre_porta">
                    </div>
                </div>
            </div>
            
            <div class="caixa-laboratorio">
                <h1>Laboratório 10</h1>
                <div class="estado_porta">
                    <img src="../style/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
                <div class="modo_aula">
                    <label for="toggle10">Modo Aula</label>
                    
                    <div class="toggle-modo-aula">
                        <div class="caixa_led" id="led_R_10">
                            <div class="led"></div>
                            <span class="baixo-led"></span> 
                        </div>
                        <input type="checkbox" name="on/off" id="toggle10" class="toggle" onchange="atualizaModoAula('10')">
                        <label for="toggle10" class="switch">
                            <span class="slider"></span>
                        </label>
                        <div class="caixa_led" id="led_G_10">
                            <div class="led"></div>
                            <span class="baixo-led"></span> 
                        </div>
                    </div>
                    <div>
                        <input type="button" value="Abrir Porta" class="abre_porta">
                    </div>
                </div>
            </div>
            
            <div class="caixa-laboratorio">
                <h1>Laboratório 11</h1>
                <div class="estado_porta">
                    <img src="../style/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
                <div class="modo_aula">
                    <label for="toggle11">Modo Aula</label>
                    
                    <div class="toggle-modo-aula">
                        <div class="caixa_led" id="led_R_11">
                            <div class="led"></div>
                            <span class="baixo-led"></span> 
                        </div>
                        <input type="checkbox" name="on/off" id="toggle11" class="toggle" onchange="atualizaModoAula('11')">
                        <label for="toggle11" class="switch">
                            <span class="slider"></span>
                        </label>
                        <div class="caixa_led" id="led_G_11">
                            <div class="led"></div>
                            <span class="baixo-led"></span> 
                        </div>
                    </div>
                    <div>
                        <input type="button" value="Abrir Porta" class="abre_porta">
                    </div>
                </div>
            </div>
            
            <div class="caixa-laboratorio">
                <h1>Laboratório 12</h1>
                <div class="estado_porta">
                    <img src="../style/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
                <div class="modo_aula">
                    <label for="toggle12">Modo Aula</label>
                    
                    <div class="toggle-modo-aula">
                        <div class="caixa_led" id="led_R_12">
                            <div class="led"></div>
                            <span class="baixo-led"></span> 
                        </div>
                        <input type="checkbox" name="on/off" id="toggle12" class="toggle" onchange="atualizaModoAula('12')">
                        <label for="toggle12" class="switch">
                            <span class="slider"></span>
                        </label>
                        <div class="caixa_led" id="led_G_12">
                            <div class="led"></div>
                            <span class="baixo-led"></span> 
                        </div>
                    </div>
                    <div>
                        <input type="button" value="Abrir Porta" class="abre_porta">
                    </div>
                </div>
            </div>
            
            <div class="caixa-laboratorio">
                <h1>Laboratório 13</h1>
                <div class="estado_porta">
                    <img src="../style/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
                <div class="modo_aula">
                    <label for="toggle13">Modo Aula</label>
                    
                    <div class="toggle-modo-aula">
                        <div class="caixa_led" id="led_R_13">
                            <div class="led"></div>
                            <span class="baixo-led"></span> 
                        </div>
                        <input type="checkbox" name="on/off" id="toggle13" class="toggle" onchange="atualizaModoAula('13')">
                        <label for="toggle13" class="switch">
                            <span class="slider"></span>
                        </label>
                        <div class="caixa_led" id="led_G_13">
                            <div class="led"></div>
                            <span class="baixo-led"></span> 
                        </div>
                    </div>
                    <div>
                        <input type="button" value="Abrir Porta" class="abre_porta">
                    </div>
                </div>
            </div>
            
            <div class="caixa-laboratorio">
                <h1>Laboratório 14</h1>
                <div class="estado_porta">
                    <img src="../style/imagens/porta-fechada.png" alt="porta-aberta">
                    <h2>FECHADO</h2>
                </div>
                <div class="modo_aula">
                    <label for="toggle14">Modo Aula</label>
                    
                    <div class="toggle-modo-aula">
                        <div class="caixa_led" id="led_R_14">
                            <div class="led"></div>
                            <span class="baixo-led"></span> 
                        </div>
                        <input type="checkbox" name="on/off" id="toggle14" class="toggle" onchange="atualizaModoAula('14')">
                        <label for="toggle14" class="switch">
                            <span class="slider"></span>
                        </label>
                        <div class="caixa_led" id="led_G_14">
                            <div class="led"></div>
                            <span class="baixo-led"></span> 
                        </div>
                    </div>
                    <div>
                        <input type="button" value="Abrir Porta" class="abre_porta">
                    </div>
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
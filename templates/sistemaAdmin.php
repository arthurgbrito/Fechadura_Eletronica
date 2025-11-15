<?php
session_start();

// Verifica se existe algum usuário logado
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
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

    <link rel="stylesheet" href="../style/style-sistemaAdmin.css">
    <link rel="stylesheet" href="../style/medias-sistemaAdmin.css">

    <link rel="shortcut icon" href="../style/imagens/logo-tro.ico" type="image/x-icon">

</head>

<body>

    <header>
        <div class="mainTitle">
            <img src="../style/imagens/logo-tro.png" alt="Logo Curso">
            <h1 class="header_title">Controle de Acesso</h1>
        </div>
        <div class="menu">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="sistemaAdmin.php" class="top">Sistema</a></li>
                <li><a href="../templates/programarhorarioAdmin.html">Programar Fechadura</a></li>
                <li><a href="../APIs/logout.php">Sair</a></li>
                <li><a href="codigos-acesso.html" class="bottom">Códigos de Acesso</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="interacao_Porta">

            <h1 class="titulo_lab">Laboratórios</h1>

            <div class="rolagem_lab">
                <div class="caixa-laboratorio expand-right-down">
                    <h1>Laboratório 1</h1>
                    <div class="estado_porta" id="estado_porta1">
                        <img src="../style/imagens/porta-fechada.png" id="porta" alt="porta-aberta">
                        <h2 id="texto-porta">FECHADO</h2>
                    </div>
                    <div class="modo_aula">
                        <label>Modo Aula</label>
                        <div class="toggle-modo-aula">

                            <div class="caixa_led" id="led_R_1">
                                <span class="led"></span>
                                <span class="baixo-led"></span>
                            </div>
                            <input type="checkbox" name="on/off" id="toggle1" class="toggle" onchange="atualizaModoAula(1)">
                            <label for="toggle1" class="switch">
                                <span class="slider"></span>
                            </label>
                            <div class="caixa_led" id="led_G_1">
                                <span class="led"></span>
                                <span class="baixo-led"></span>
                            </div>
                        </div>
                    </div>
                    <div class="box-botao">
                        <input type="button" value="Abrir Porta" class="abre_porta">
                    </div>
                </div>

                <div class="caixa-laboratorio expand-right-up">
                    <h1>Laboratório 2</h1>
                    <div class="estado_porta" id="estado_porta2">
                        <img src="../style/imagens/porta-fechada.png" id="porta" alt="porta-aberta">
                        <h2 id="texto-porta">FECHADO</h2>
                    </div>
                    <div class="modo_aula">
                        <label>Modo Aula</label>

                        <div class="toggle-modo-aula">
                            <div class="caixa_led" id="led_R_2">
                                <div class="led"></div>
                                <span class="baixo-led"></span>
                            </div>
                            <input type="checkbox" name="on/off" id="toggle2" class="toggle" onchange="atualizaModoAula(2)">
                            <label for="toggle2" class="switch">
                                <span class="slider"></span>
                            </label>
                            <div class="caixa_led" id="led_G_2">
                                <div class="led"></div>
                                <span class="baixo-led"></span>
                            </div>
                        </div>
                    </div>
                    <div class="box-botao">
                        <input type="button" value="Abrir Porta" class="abre_porta">
                    </div>
                </div>

                <div class="caixa-laboratorio expand-down">
                    <h1>Laboratório 3</h1>
                    <div class="estado_porta" id="estado_porta3">
                        <img src="../style/imagens/porta-fechada.png" id="porta" alt="porta-aberta">
                        <h2 id="texto-porta">FECHADO</h2>
                    </div>
                    <div class="modo_aula">
                        <label>Modo Aula</label>

                        <div class="toggle-modo-aula">
                            <div class="caixa_led" id="led_R_3">
                                <div class="led"></div>
                                <span class="baixo-led"></span>
                            </div>
                            <input type="checkbox" name="on/off" id="toggle3" class="toggle" onchange="atualizaModoAula(3)">
                            <label for="toggle3" class="switch">
                                <span class="slider"></span>
                            </label>
                            <div class="caixa_led" id="led_G_3">
                                <div class="led"></div>
                                <span class="baixo-led"></span>
                            </div>
                        </div>
                    </div>
                    <div class="box-botao">
                        <input type="button" value="Abrir Porta" class="abre_porta">
                    </div>
                </div>
 
                <div class="caixa-laboratorio expand-up">
                    <h1>Laboratório 6</h1>
                    <div class="estado_porta" id="estado_porta6">
                        <img src="../style/imagens/porta-fechada.png" id="porta" alt="porta-aberta">
                        <h2 id="texto-porta">FECHADO</h2>
                    </div>
                    <div class="modo_aula">
                        <label>Modo Aula</label>

                        <div class="toggle-modo-aula">
                            <div class="caixa_led" id="led_R_6">
                                <div class="led"></div>
                                <span class="baixo-led"></span>
                            </div>
                            <input type="checkbox" name="on/off" id="toggle6" class="toggle" onchange="atualizaModoAula(6)">
                            <label for="toggle6" class="switch">
                                <span class="slider"></span>
                            </label>
                            <div class="caixa_led" id="led_G_6">
                                <div class="led"></div>
                                <span class="baixo-led"></span>
                            </div>
                        </div>
                    </div>
                    <div class="box-botao">
                        <input type="button" value="Abrir Porta" class="abre_porta">
                    </div>
                </div>

                <div class="caixa-laboratorio expand-down">
                    <h1>Laboratório 9</h1>
                    <div class="estado_porta" id="estado_porta9">
                        <img src="../style/imagens/porta-fechada.png" id="porta" alt="porta-aberta">
                        <h2 id="texto-porta">FECHADO</h2>
                    </div>
                    <div class="modo_aula">
                        <label>Modo Aula</label>

                        <div class="toggle-modo-aula">
                            <div class="caixa_led" id="led_R_9">
                                <div class="led"></div>
                                <span class="baixo-led"></span>
                            </div>
                            <input type="checkbox" name="on/off" id="toggle9" class="toggle" onchange="atualizaModoAula(9)">
                            <label for="toggle9" class="switch">
                                <span class="slider"></span>
                            </label>
                            <div class="caixa_led" id="led_G_9">
                                <div class="led"></div>
                                <span class="baixo-led"></span>
                            </div>
                        </div>
                    </div>
                    <div class="box-botao">
                        <input type="button" value="Abrir Porta" class="abre_porta">
                    </div>
                </div>

                <div class="caixa-laboratorio expand-up">
                    <h1>Laboratório 10</h1>
                    <div class="estado_porta" id="estado_porta10">
                        <img src="../style/imagens/porta-fechada.png" id="porta" alt="porta-aberta">
                        <h2 id="texto-porta">FECHADO</h2>
                    </div>
                    <div class="modo_aula">
                        <label >Modo Aula</label>

                        <div class="toggle-modo-aula">
                            <div class="caixa_led" id="led_R_10">
                                <div class="led"></div>
                                <span class="baixo-led"></span>
                            </div>
                            <input type="checkbox" name="on/off" id="toggle10" class="toggle" onchange="atualizaModoAula(10)">
                            <label for="toggle10" class="switch">
                                <span class="slider"></span>
                            </label>
                            <div class="caixa_led" id="led_G_10">
                                <div class="led"></div>
                                <span class="baixo-led"></span>
                            </div>
                        </div>
                    </div>
                    <div class="box-botao">
                        <input type="button" value="Abrir Porta" class="abre_porta">
                    </div>
                </div>

                <div class="caixa-laboratorio expand-down">
                    <h1>Laboratório 11</h1>
                    <div class="estado_porta" id="estado_porta11">
                        <img src="../style/imagens/porta-fechada.png" id="porta" alt="porta-aberta">
                        <h2 id="texto-porta">FECHADO</h2>
                    </div>
                    <div class="modo_aula">
                        <label >Modo Aula</label>

                        <div class="toggle-modo-aula">
                            <div class="caixa_led" id="led_R_11">
                                <div class="led"></div>
                                <span class="baixo-led"></span>
                            </div>
                            <input type="checkbox" name="on/off" id="toggle11" class="toggle" onchange="atualizaModoAula(11)">
                            <label for="toggle11" class="switch">
                                <span class="slider"></span>
                            </label>
                            <div class="caixa_led" id="led_G_11">
                                <div class="led"></div>
                                <span class="baixo-led"></span>
                            </div>
                        </div>
                    </div>
                    <div class="box-botao">
                        <input type="button" value="Abrir Porta" class="abre_porta">
                    </div>
                </div>

                <div class="caixa-laboratorio expand-up">
                    <h1>Laboratório 12</h1>
                    <div class="estado_porta" id="estado_porta12">
                        <img src="../style/imagens/porta-fechada.png" id="porta" alt="porta-aberta">
                        <h2 id="texto-porta">FECHADO</h2>
                    </div>
                    <div class="modo_aula">
                        <label >Modo Aula</label>

                        <div class="toggle-modo-aula">
                            <div class="caixa_led" id="led_R_12">
                                <div class="led"></div>
                                <span class="baixo-led"></span>
                            </div>
                            <input type="checkbox" name="on/off" id="toggle12" class="toggle" onchange="atualizaModoAula(12)">
                            <label for="toggle12" class="switch">
                                <span class="slider"></span>
                            </label>
                            <div class="caixa_led" id="led_G_12">
                                <div class="led"></div>
                                <span class="baixo-led"></span>
                            </div>
                        </div>
                    </div>
                    <div class="box-botao">
                        <input type="button" value="Abrir Porta" class="abre_porta">
                    </div>
                </div>

                <div class="caixa-laboratorio expand-left-down">
                    <h1>Laboratório 13</h1>
                    <div class="estado_porta" id="estado_porta13">
                        <img src="../style/imagens/porta-fechada.png" id="porta" alt="porta-aberta">
                        <h2 id="texto-porta">FECHADO</h2>
                    </div>
                    <div class="modo_aula">
                        <label >Modo Aula</label>

                        <div class="toggle-modo-aula">
                            <div class="caixa_led" id="led_R_13">
                                <div class="led"></div>
                                <span class="baixo-led"></span>
                            </div>
                            <input type="checkbox" name="on/off" id="toggle13" class="toggle" onchange="atualizaModoAula(13)">
                            <label for="toggle13" class="switch">
                                <span class="slider"></span>
                            </label>
                            <div class="caixa_led" id="led_G_13">
                                <div class="led"></div>
                                <span class="baixo-led"></span>
                            </div>
                        </div>
                    </div>
                    <div class="box-botao">
                        <input type="button" value="Abrir Porta" class="abre_porta">
                    </div>
                </div>

                <div class="caixa-laboratorio expand-left-up">
                    <h1>Laboratório 14</h1>
                    <div class="estado_porta" id="estado_porta14">
                        <img src="../style/imagens/porta-fechada.png" id="porta" alt="porta-aberta">
                        <h2 id="texto-porta">FECHADO</h2>
                    </div>
                    <div class="modo_aula">
                        <label >Modo Aula</label>

                        <div class="toggle-modo-aula">
                            <div class="caixa_led" id="led_R_14">
                                <div class="led"></div>
                                <span class="baixo-led"></span>
                            </div>
                            <input type="checkbox" name="on/off" id="toggle14" class="toggle" onchange="atualizaModoAula(14)">
                            <label for="toggle14" class="switch">
                                <span class="slider"></span>
                            </label>
                            <div class="caixa_led" id="led_G_14">
                                <div class="led"></div>
                                <span class="baixo-led"></span>
                            </div>
                        </div>
                    </div>
                    <div class="box-botao">
                        <input type="button" value="Abrir Porta" class="abre_porta">
                    </div>
                </div>
            </div>
        </section>
        <section id="historico">
            <h1>Histórico</h1>

            <div class="tableContainer">
                <table>
                    <thead class="cabecalhoTabela">
                        <tr>
                            <th scope="col">Usuário</th>
                            <th scope="col">Dia</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Lab</th>
                        </tr>
                    </thead>
                    <tbody id="corpoTabela">
                        
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <script src="../scripts/sistemaScriptAdmin.js"></script>

</body>

</html>
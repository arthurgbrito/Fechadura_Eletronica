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

    <link rel="stylesheet" href="../style/style-sistema.css">
    <link rel="stylesheet" href="../style/medias-sistema.css">

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
                <li><a href="sistema.php" class="top">Sistema</a></li>
                <li><a href="../templates/programarhorario.html">Programar Fechadura</a></li>
                <li><a href="../APIs/logout.php" class="bottom">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="interacao_Porta">

            <h1 class="titulo_lab">Laboratórios</h1>

            <div class="rolagem_lab">
                <div class="caixa-laboratorio expand-right-down">
                    <h1>Laboratório 1</h1>
                    <div class="estado_porta">
                        <img src="../style/imagens/porta-fechada.png" alt="porta-aberta">
                        <h2>FECHADO</h2>
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
                    <div class="estado_porta">
                        <img src="../style/imagens/porta-fechada.png" alt="porta-aberta">
                        <h2>FECHADO</h2>
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
                    <div class="estado_porta">
                        <img src="../style/imagens/porta-fechada.png" alt="porta-aberta">
                        <h2>FECHADO</h2>
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
                    <div class="estado_porta">
                        <img src="../style/imagens/porta-fechada.png" alt="porta-aberta">
                        <h2>FECHADO</h2>
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
                    <div class="estado_porta">
                        <img src="../style/imagens/porta-fechada.png" alt="porta-aberta">
                        <h2>FECHADO</h2>
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
                    <div class="estado_porta">
                        <img src="../style/imagens/porta-fechada.png" alt="porta-aberta">
                        <h2>FECHADO</h2>
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
                    <div class="estado_porta">
                        <img src="../style/imagens/porta-fechada.png" alt="porta-aberta">
                        <h2>FECHADO</h2>
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
                    <div class="estado_porta">
                        <img src="../style/imagens/porta-fechada.png" alt="porta-aberta">
                        <h2>FECHADO</h2>
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
                    <div class="estado_porta">
                        <img src="../style/imagens/porta-fechada.png" alt="porta-aberta">
                        <h2>FECHADO</h2>
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
                    <div class="estado_porta">
                        <img src="../style/imagens/porta-fechada.png" alt="porta-aberta">
                        <h2>FECHADO</h2>
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
                    <tbody>
                        <tr><td>Arthur</td><td>27/09/2025</td><td>08:00</td><td class="lab">1</td></tr>
                        <tr><td>Maria</td><td>27/09/2025</td><td>08:30</td><td class="lab">2</td></tr>
                        <tr><td>João</td><td>27/09/2025</td><td>09:00</td><td class="lab">3</td></tr>
                        <tr><td>Lucas</td><td>27/09/2025</td><td>09:30</td><td class="lab">6</td></tr>
                        <tr><td>Ana</td><td>27/09/2025</td><td>10:00</td><td class="lab">9</td></tr>
                        <tr><td>Pedro</td><td>27/09/2025</td><td>10:30</td><td class="lab">10</td></tr>
                        <tr><td>Clara</td><td>27/09/2025</td><td>11:00</td><td class="lab">11</td></tr>
                        <tr><td>Felipe</td><td>27/09/2025</td><td>11:30</td><td class="lab">12</td></tr>
                        <tr><td>Beatriz</td><td>27/09/2025</td><td>12:00</td><td class="lab">13</td></tr>
                        <tr><td>Renan</td><td>27/09/2025</td><td>12:30</td><td class="lab">14</td></tr>
                        <tr><td>Marcos</td><td>28/09/2025</td><td>08:00</td><td class="lab">1</td></tr>
                        <tr><td>Juliana</td><td>28/09/2025</td><td>08:30</td><td class="lab">2</td></tr>
                        <tr><td>Thiago</td><td>28/09/2025</td><td>09:00</td><td class="lab">3</td></tr>
                        <tr><td>Rafaela</td><td>28/09/2025</td><td>09:30</td><td class="lab">6</td></tr>
                        <tr><td>André</td><td>28/09/2025</td><td>10:00</td><td class="lab">9</td></tr>
                        <tr><td>Camila</td><td>28/09/2025</td><td>10:30</td><td class="lab">10</td></tr>
                        <tr><td>Leonardo</td><td>28/09/2025</td><td>11:00</td><td class="lab">11</td></tr>
                        <tr><td>Gabriela</td><td>28/09/2025</td><td>11:30</td><td class="lab">12</td></tr>
                        <tr><td>Diego</td><td>28/09/2025</td><td>12:00</td><td class="lab">13</td></tr>
                        <tr><td>Larissa</td><td>28/09/2025</td><td>12:30</td><td class="lab">14</td></tr>
                        <tr><td>Henrique</td><td>29/09/2025</td><td>08:00</td><td class="lab">1</td></tr>
                        <tr><td>Paula</td><td>29/09/2025</td><td>08:30</td><td class="lab">2</td></tr>
                        <tr><td>Bruno</td><td>29/09/2025</td><td>09:00</td><td class="lab">3</td></tr>
                        <tr><td>Fernanda</td><td>29/09/2025</td><td>09:30</td><td class="lab">6</td></tr>
                        <tr><td>Rodrigo</td><td>29/09/2025</td><td>10:00</td><td class="lab">9</td></tr>
                        <tr><td>Luana</td><td>29/09/2025</td><td>10:30</td><td class="lab">10</td></tr>
                        <tr><td>Carlos</td><td>29/09/2025</td><td>11:00</td><td class="lab">11</td></tr>
                        <tr><td>Patrícia</td><td>29/09/2025</td><td>11:30</td><td class="lab">12</td></tr>
                        <tr><td>Vitor</td><td>29/09/2025</td><td>12:00</td><td class="lab">13</td></tr>
                        <tr><td>Natália</td><td>29/09/2025</td><td>12:30</td><td class="lab">14</td></tr>
                    </tbody>
                </table>
            </div>


            <!--<iframe src="historico.html" id="mostra_Historico" frameborder="0"></iframe>-->
        </section>
    </main>

    <script src="../scripts/sistemaScript.js"></script>

</body>

</html>
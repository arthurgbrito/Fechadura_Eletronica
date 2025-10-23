let labs = [1,2,3,6,9,10,11,12,13,14];
let flag = 0;

addEventListener ("DOMContentLoaded", () => {

    carregaHistorico();
    labs.forEach(num => {procuraModoAula(num)});
    labs.forEach(num => {carregaEstadoPorta(num)});
})

setInterval(() => {labs.forEach(num => carregaEstadoPorta(num))}, 500);

async function carregaEstadoPorta(lab) {

    let caixaPorta = document.getElementById('estado_porta' + lab);
    let iconePorta = caixaPorta.querySelector('#porta');
    let textoPorta = caixaPorta.querySelector('#texto-porta');
    indice = labs.indexOf(lab) + 1

    try {
        const response = await fetch(`../APIs/monitoraEstadoPorta.php?lab=${indice}`, {method: "GET", cache: "no-store"});
        
        const data = await response.json();
        //console.log("Estado da porta do lab " + lab + ": ", data.estado_porta);
        
        if (data.ok){
            if (data.estado_porta){
                iconePorta.src = "../style/imagens/porta-aberta.png";
                textoPorta.textContent = "ABERTO";
                textoPorta.style.color = "#4CAF50";
            } else {
                iconePorta.src = "../style/imagens/porta-fechada.png";
                textoPorta.textContent = "FECHADO";
                textoPorta.style.color = "#F44336";
            }
        } else alert("erro na resposta da API:");
    } catch (err){
        alert("Erro ao carregar estado da porta:", err);
    }
}


async function carregaHistorico(){

    try {
        const response = await fetch('../APIs/carregaHistorico.php', {method: "GET", cache: "no-store"});

        const data = await response.json();

        const corpoTabela = document.getElementById('corpoTabela');
        corpoTabela.innerHTML = '';

        data.forEach(linha => {

            let lab = parseInt(linha.lab_id);
            let labReal = labs[lab - 1];

            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${linha.usuario}</td>
                <td>${linha.data.split("-").reverse().join("/")}</td>
                <td>${linha.hora.slice(0,5)}</td>
                <td class="lab">${labReal}</td>
            `;
            corpoTabela.appendChild(tr);
        })
        ultimoID = data[data.length - 1].id;
        console.log("Ultimo ID: ", ultimoID);

    } catch {
        alert("ERRO ao acessar a tabela historico.");
    }
}

setInterval(() => {labs.forEach(num => procuraModoAula(num))}, 2000);

async function procuraModoAula (lab) {

    indice = labs.indexOf(lab) + 1

    try {

        const response = await fetch(`../APIs/getModoAula.php?lab=${indice}`, {method:  "GET", cache: "no-store"});

        const data = await response.json();
        if (data.ok){
        
            if (data.modo_aula == 1){
                atualiza_Led(lab, "on")
            } else {
                atualiza_Led(lab, "off")
            }
        } else {
            alert("Nao foi possivel fazer isso" + data.mensagem);
        }
    } catch (err){
        console.error("Erro: ", err);
    }
}


async function atualizaModoAula(lab){

    let toggleAtual = document.getElementById('toggle' + lab)

    if(toggleAtual.checked) estadoNovo = 1;
    else estadoNovo = 0;
    indice = labs.indexOf(lab) + 1;

    try {
        
        const resp = await fetch(`../APIs/atualizaDB_site.php?lab=${indice}&estado=${estadoNovo}`, {method: "GET", cache: "no-store"});
        
        const data = await resp.json();

        if(data.ok){
            if (data.modo_aula) atualiza_Led(lab, "on");
            else atualiza_Led(lab, "off");
        }
    } catch (err) {
        console.error("Erro ao atualizar modo aula:", err);
    }
}


function atualiza_Led (lab, estado){

    let toggleAtual = document.getElementById('toggle' + lab)
    let switch_atual = toggleAtual.nextElementSibling;
    let slider = switch_atual.querySelector(".slider");

    let led_red = document.getElementById('led_R_' + lab)
    let led_green = document.getElementById('led_G_' + lab)
    

    let red_circle = led_red.querySelector(".led");
    let red_base = led_red.querySelector(".baixo-led");

    let green_circle = led_green.querySelector(".led");
    let green_base = led_green.querySelector(".baixo-led");


    if (estado == "on"){
        green_circle.style.backgroundImage = "linear-gradient(to top right, rgba(16, 255, 16, 0.8) 20%, rgba(45, 250, 45, 0.56) 60%, rgba(50, 255, 50, 0.49))";
        green_base.style.backgroundImage = "linear-gradient(to top right, rgba(16, 255, 16, 0.8) 20%, rgba(45, 250, 45, 0.56) 60%, rgba(50, 255, 50, 0.49))";
        green_circle.style.boxShadow = "0px 0px 8px 8px rgba(0, 255, 0, 0.78)";

        red_circle.style.backgroundImage = "linear-gradient(#afafaf, #afafaf)";
        red_base.style.backgroundImage = "linear-gradient(#afafaf, #afafaf)";
        red_circle.style.boxShadow = "none";

        toggleAtual.checked = true

        if (toggleAtual.checked){
            switch_atual.style.backgroundColor = "#388E3C";
            slider.style.transform = "translateX(28px)";
        }

    } else if (estado == "off") {
        green_circle.style.backgroundImage = "linear-gradient(to top, #afafaf, #afafaf)";
        green_base.style.backgroundImage = "linear-gradient(to top, #afafaf, #afafaf)";
        green_circle.style.boxShadow = "none";

        red_circle.style.backgroundImage = "linear-gradient(to top right, rgba(255, 0, 0, 0.66) 20%, rgba(255, 30, 30, 0.57) 60%, rgba(255, 35, 35, 0.2)) ";
        red_base.style.backgroundImage = "linear-gradient(to right, rgba(255, 0, 0, 0.66) 20%, rgba(255, 30, 30, 0.57) 60%, rgba(255, 35, 35, 0.2)) ";
        red_circle.style.boxShadow = "0px 0px 8px 8px rgba(255, 0, 0, 0.79)";

        toggleAtual.checked = false

        if (!toggleAtual.checked){
            switch_atual.style.backgroundColor = "#9a9a9a";
            slider.style.transform = "translateX(0px)";
        }
    }
}


const menu = document.querySelector('.menu');
const navbar = document.querySelector('.navbar ul');

menu.addEventListener('click', () => {
    if (flag == 0){
        navbar.style.opacity = "1";
        navbar.style.pointerEvents = "auto";
        menu.style.transform = "rotate(90deg)";
        menu.style.transition = "transform 0.3s ease";
        flag = 1;
    } else {
        navbar.style.opacity = "0";
        navbar.style.pointerEvents = "none";
        menu.style.transform = "rotate(0deg)";
        menu.style.transition = "transform 0.3s ease";
        flag = 0;
    }
})

let ultimoID = 0;

setInterval(() => {atualizaHistorico()}, 500);

async function atualizaHistorico(){
    const respose = await fetch(`../APIs/getHistorico.php?ultimoID=${ultimoID}`, {method:  "GET", cache: "no-store"});

    const novasLinhas = await respose.json();


    if (novasLinhas.ok){
        const corpoTabela = document.getElementById('corpoTabela');
        
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${novasLinhas.usuario}</td>
            <td>${novasLinhas.data.split("-").reverse().join("/")}</td>
            <td>${novasLinhas.hora.slice(0,5)}</td>
            <td class="lab">${novasLinhas.lab}</td>
        `;

        corpoTabela.append(tr);
        ultimoID = novasLinhas.id;
    
    } //else {
        //console.log("Nenhuma atualização");
    //}
}
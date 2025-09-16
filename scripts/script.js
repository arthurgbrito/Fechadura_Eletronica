let labs = [1,2,3,6,9,10,11,12,13,14];

addEventListener ("DOMContentLoaded", () => {

    labs.forEach(num => {atualizaLED(num)})
})

async function atualizaLED (lab) {
    try {

        indice = labs.indexOf(lab) + 1

        const response = await fetch(`../APIs/atualizaLED.php?lab=${indice}`, {method:  "GET", cache: "no-store"});
        if (!response.ok) throw new Error ("HTTP" + response.status);

        const data = await response.json();
        if (data.ok){

            let led_red = document.getElementById('led_R_' + lab)
            let led_green = document.getElementById('led_G_' + lab)

            let red_circle = led_red.querySelector(".led");
            let red_base   = led_red.querySelector(".baixo-led");

            let green_circle = led_green.querySelector(".led");
            let green_base   = led_green.querySelector(".baixo-led");

        
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

setInterval(() => {labs.forEach(num => atualizaLED(num))}, 2000);

function atualiza_Led (lab, estado){

    let toggle_atual = document.getElementById('toggle' + lab)
    let switch_atual = toggle_atual.nextElementSibling;
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

        toggle_atual.checked = true

        if (toggle_atual.checked){
            switch_atual.style.backgroundColor = "#388E3C";
            slider.style.transform = "translateX(40px)";
        }

    } else if (estado == "off") {
        green_circle.style.backgroundImage = "linear-gradient(to top, #afafaf, #afafaf)";
        green_base.style.backgroundImage = "linear-gradient(to top, #afafaf, #afafaf)";
        green_circle.style.boxShadow = "none";

        red_circle.style.backgroundImage = "linear-gradient(to top right, rgba(255, 0, 0, 0.66) 20%, rgba(255, 30, 30, 0.57) 60%, rgba(255, 35, 35, 0.2)) ";
        red_base.style.backgroundImage = "linear-gradient(to right, rgba(255, 0, 0, 0.66) 20%, rgba(255, 30, 30, 0.57) 60%, rgba(255, 35, 35, 0.2)) ";
        red_circle.style.boxShadow = "0px 0px 8px 8px rgba(255, 0, 0, 0.79)";

        toggle_atual.checked = false

        if (!toggle_atual.checked){
            switch_atual.style.backgroundColor = "#9a9a9a";
            slider.style.transform = "translateX(0px)";
        }

    }
}




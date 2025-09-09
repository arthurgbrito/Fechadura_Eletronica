

addEventListener ("DOMContentLoaded", () => {
    let labs = [1,2,3,6,9,10,11,12,13,14];

    labs.forEach(num => {liga_Led(num)})
})

function liga_Led (indice){

    //let toggle_string = ['toggle1', 'toggle2', 'toggle3', 'toggle6', 'toggle9', 'toggle10', 'toggle11', 'toggle12', 'toggle13', 'toggle14'];
    
    switch_atual = document.getElementById('toggle' + indice)
    led_red = document.getElementById('led_R_' + indice)
    led_green = document.getElementById('led_G_' + indice)
    

    let red_circle = led_red.querySelector(".led");
    let red_base   = led_red.querySelector(".baixo-led");

    let green_circle = led_green.querySelector(".led");
    let green_base   = led_green.querySelector(".baixo-led");


    if (switch_atual.checked){
        green_circle.style.backgroundImage = "linear-gradient(to top right, rgba(16, 255, 16, 0.8) 20%, rgba(45, 250, 45, 0.56) 60%, rgba(50, 255, 50, 0.49))";
        green_base.style.backgroundImage = "linear-gradient(to top right, rgba(16, 255, 16, 0.8) 20%, rgba(45, 250, 45, 0.56) 60%, rgba(50, 255, 50, 0.49))";
        green_circle.style.boxShadow = "0px 0px 8px 8px rgba(0, 255, 0, 0.78)";

        red_circle.style.backgroundImage = "linear-gradient(#afafaf, #afafaf)";
        red_base.style.backgroundImage = "linear-gradient(#afafaf, #afafaf)";
        red_circle.style.boxShadow = "none";

    } else {
        green_circle.style.backgroundImage = "linear-gradient(to top, #afafaf, #afafaf)";
        green_base.style.backgroundImage = "linear-gradient(to top, #afafaf, #afafaf)";
        green_circle.style.boxShadow = "none";

        red_circle.style.backgroundImage = "linear-gradient(to top right, rgba(255, 0, 0, 0.66) 20%, rgba(255, 30, 30, 0.57) 60%, rgba(255, 35, 35, 0.2)) ";
        red_base.style.backgroundImage = "linear-gradient(to right, rgba(255, 0, 0, 0.66) 20%, rgba(255, 30, 30, 0.57) 60%, rgba(255, 35, 35, 0.2)) ";
        red_circle.style.boxShadow = "0px 0px 8px 8px rgba(255, 0, 0, 0.79)";
    }
}
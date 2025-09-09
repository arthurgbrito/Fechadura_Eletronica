

addEventListener ("DOMContentLoaded", () => {
    let labs = [1,2,3,6,9,10,11,12,13,14];

    labs.forEach(num => {liga_Led(num)})
})

function liga_Led (indice){

    let toggle_string = ['toggle1', 'toggle2', 'toggle3', 'toggle6', 'toggle9', 'toggle10', 'toggle11', 'toggle12', 'toggle13', 'toggle14'];
    
    switch_atual = document.getElementById('toggle' + indice)
    led_red = document.getElementById('led_R_' + indice)
    led_green = document.getElementById('led_G_' + indice)
    

    if (switch_atual.checked){
        led_green.style.backgroundColor = "green";
        led_red.style.backgroundColor = "gray";
    } else {
        led_green.style.backgroundColor = "gray";
        led_red.style.backgroundColor = "red";
    }
}
/*/============== Tous les p en vert =====================================/*/


var penvert = $("#green");

$(penvert).on("click", function() {
    $('p').css('color', 'green')

})


/*/=============== Tous les li en bleu =======================================/*/

function buttonblue() {
    $('li').css('color', 'blue')
}



/*/============== Le 1er li en orange ======================================/*/

var lienorange = $("#orange");

$(lienorange).on("click", function() {
    $('li:nth-child(1)').css('color', 'orange')
})

/*/========= Le 2eme li jaune ===============================================/*/


var lienjaune = $("#yellow");

$(lienjaune).on("click", function() {
    $('li:nth-child(2)').css('color', 'yellow')
})


/*/========= Tous les elements ayant une classe red en rouge ================/*/

var redelement = $("#red");

$(redelement).on("click", function() {
    $('.red').css('color', 'red')
})

/*/=========== Le 2eme li du 2eme ul en rose ==============================/*/

var lienrose = ("#pink");

$(lienrose).on("click", function() {
    $('#deux li:nth-child(2)').css('color', 'pink')
})

/*/ =================== Le 4eme li du 1er ul en marron ==================/*/

var lienmarron = ("#marron");

$(lienmarron).on("click", function() {
    $('#un li:nth-child(4)').css('color', 'brown')
})
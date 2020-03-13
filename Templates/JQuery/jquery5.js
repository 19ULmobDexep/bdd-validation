/*/=============== Remplacer le contenu du 1er li par "Hello world"  ==================/*/


$("#btn1").click(function() {
    $('#un li:nth-child(1)').text('Hello World')
})



/*/============== Ajouter le contenu suivant "ceci est un ajout" à la fin du 2eme li du 1er ul ===============================/*/

$("#btn2").click(function() {
    $('#un li:nth-child(2)').append(' Ceci est un ajout')
})



/*/============== Ajouter le contenu suivant "ceci est un ajout" qu début du 3eme li du 1er ul ===============================/*/

$("#btn3").click(function() {
    $('#un li:nth-child(3)').prepend(' Ceci est un ajout')
})


/*/====================== Ajouter un li au 1er ul avec le contenu suivant : "je suis un nouveau li" =========================/*/

$("#btn4").click(function() {
    $('#un').append('<li><a href="#">Je suis un nouveau li</a></li>')
})


/*/======================= Dupliquer le 2eme ul et l'ajouter avant le 1er ul ==========================================/*/

$("#btn5").click(function() {

    var clone = $('#deux').clone();

    $('#un').before(clone)
})
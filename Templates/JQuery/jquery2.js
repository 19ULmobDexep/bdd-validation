/*/================ Avec Jquery, ajouter un evenement à ce bouton, Au clic le texte devient orange ==================================/*/

var penorange = ("#orange");

$(penorange).on("click", function() {
    $('p').css('color', 'orange')
})


/*/==================== Avec Jquery, ajouter un evenement à ce bouton et créer une fonction externe, Au clic le texte devient noir ================
================================================================================================================================================/*/

function paramblack() {
    $('p').css('color', 'black')
}


$("#noir").on("click", paramblack)
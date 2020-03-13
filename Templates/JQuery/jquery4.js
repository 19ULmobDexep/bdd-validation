/*/==================== Masquer les p ==================================/*/


$("#green").click(function() {
    $('p').hide()
})


/*/=================== Afficher les p =================================/*/


$("#blue").click(function() {
    $('p').show()
})


/*/================== Masquer les li ==============================/*/

$("#orange").click(function() {
    $('li').hide()
})

/*/=================== Afficher les li ==========================/*/

$("#yellow").click(function() {
    $('li').show()
})




/*/================ Masquer les p rapidement ====================/*/

$("#red").click(function() {
    $('p').hide('fast')
})


/*/=================== Afficher les li doucement ==================/*/

$("#pink").click(function() {
    $('li').show('slow')
})


/*/=================== Fade in sur les p =========================/*/

$("#marron").click(function() {
    $('p').fadeIn()
})


/*/================== Fade out sur les li ==========================/*/


$("#dark").click(function() {
    $('li').fadeOut()
})
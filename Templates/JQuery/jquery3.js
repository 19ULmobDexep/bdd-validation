/*//=== En utilisant les fonctions addClass, removeClass , toggleClass,
 mettre le texte en vert ======================================/*/

$("#green").click(function() {
    $('p').addClass("intro")
})


/*//=== En utilisant les fonctions addClass, removeClass , toggleClass,
 mettre le texte en bleu ======================================/*/

$("#blue").click(function() {
    $('p').addClass("intro2")
})

/*//=== En utilisant les fonctions addClass, removeClass , toggleClass,
 mettre le texte en gras ======================================/*/

$("#bold").click(function() {
    $('p').addClass("intro3")
})

/*//=== En utilisant les fonctions addClass, removeClass , toggleClass,
 enlever le gras ======================================/*/

$("#ss_bold").click(function() {
    $('p').removeClass("intro3")
})

/*//=== En utilisant les fonctions addClass, removeClass , toggleClass,
 mettre le texte en italic et quand on reclique le text n'est plus en italique ======================================/*/


$("#italic").click(function() {
    $('p').toggleClass("intro4")
})
/*function button() {

    var xhr = new XMLHttpRequest();

    xhr.onload = function() {

        //document.getElementById('pays').innerHTML += "<p>" + xhr.responseText + "</p>"; //c'est dans le load qu'on fait la modifcation du DOM
        var p = document.createElement('p')
        p.innerHTML = xhr.responseText;
        var section = document.getElementById('pays');

        section.appendChild(p);

    }

    xhr.open('GET', 'http://jihane.fr/ajax/pays.php')
    xhr.send()

}


function button() {

    var xhr = new XMLHttpRequest();

    xhr.onload = function() {

        //document.getElementById('nombre').innerHTML += "<p>" + xhr.responseText + "</p>"; //c'est dans le load qu'on fait la modifcation du DOM
        var span = document.createElement('span')
        span.innerHTML = xhr.responseText;
        var p = document.getElementById('nombre');

        p.appendChild(span);

    }

    xhr.open('GET', 'http://jihane.fr/ajax/nombre.php')
    xhr.send()

}



function button() {

    var xhr = new XMLHttpRequest();

    xhr.onload = function() {

        //document.getElementById('nombre').innerHTML += "<p>" + xhr.responseText + "</p>"; //c'est dans le load qu'on fait la modifcation du DOM
        var span = document.getElementById('span')

        for (i = 0; i < xhr.responseText; i++) {
            span.innerHTML += i + " ";
        }
    }

    xhr.open('GET', 'http://jihane.fr/ajax/nombre.php')
    xhr.send()


}



function button() {

    var xhr = new XMLHttpRequest();

    xhr.onload = function() {



        for (i = 0; i < xhr.responseText; i++) {
            var div = document.createElement('div')
            var section = document.getElementById('parent')
            section.appendChild(div);
            div.innerHTML += i + " ";


            if (i % 2 === 0) {

                div.classList.add('divauno');
            } else {

                div.classList.add('divados');
            }


        }

    }

    xhr.open('GET', 'http://jihane.fr/ajax/nombre.php')
    xhr.send()


}


function onclick(id) {

    document.getElementById('divauno' + id).classList.remove('');
    document.getElementById('divauno' + id).classList.remove('');
    document.getElementById('divauno' + id).classList.add('');


}

*/

// Fonction aléatoire pour une fact de CHuck Norris//

function aleatoire() {

    var xhr = new XMLHttpRequest();

    xhr.onload = function() {

        var span = document.createElement('span');
        var tab = JSON.parse(xhr.responseText);
        span.innerHTML = tab[0].fact;
        var p = document.getElementById('middlediv');
        p.innerHTML = " ";
        p.appendChild(span);
        //  span.innerHTML = JSON.parse(xhr.responseText) + " ";

    }

    xhr.open('GET', 'http://jihane.fr/ajax/chucknorris.php/get?data=tri:alea;type:txt;nb:1')
    xhr.send()
}


//Fonctions pour les topten //

function topten() {

    fetch('http://jihane.fr/ajax/chucknorris.php/get?data=tri:top;type:txt;nb:10')

    .then(
        function(response) {
            return response.json()
        }
    )

    .then(
        function(data) {


            var tab = data;
            var p = document.getElementById('middlediv');
            p.innerHTML = " ";

            for (i = 0; i < 10; i++) {

                var span = document.createElement('span');
                span.innerHTML = tab[i].fact;
                var p = document.getElementById('middlediv');
                p.appendChild(span);

            }
        }
    )

}

//Fonction pour le dernière fact//

function dernierefact() {



    fetch('http://jihane.fr/ajax/chucknorris.php/get?data=tri:last;type:txt')

    .then(
        function(response) {
            return response.json()
        }
    )

    .then(
        function(data) {


            var tab = data;

            var p = document.getElementById('middlediv');
            p.innerHTML = " ";

            for (i = 0; i < 10; i++) {

                var span = document.createElement('span');
                span.innerHTML = tab[i].fact;
                var p = document.getElementById('middlediv');
                p.appendChild(span);

            }
        }
    )

}

//Function Précédent et Suivant pour Top 10//

var page = 1

function precedent() {


    page--
    fetch('http://jihane.fr/ajax/chucknorris.php/get?data=tri:top;type:txt;nb:10;page:' + page)

    .then(
        function(response) {
            return response.json()
        }
    )

    .then(
        function(data) {


            var tab = data;

            var p = document.getElementById('middlediv');
            p.innerHTML = " ";

            for (i = 0; i < 10; i++) {

                var span = document.createElement('span');
                span.innerHTML = tab[i].fact;
                var p = document.getElementById('middlediv');
                p.appendChild(span);

            }

        }
    )

}



var page = 1

function suivant() {


    page++
    fetch('http://jihane.fr/ajax/chucknorris.php/get?data=tri:top;type:txt;nb:10;page:' + page)

    .then(
        function(response) {
            return response.json()
        }
    )

    .then(
        function(data) {


            var tab = data;
            var p = document.getElementById('middlediv');
            p.innerHTML = " ";

            for (i = 0; i < 10; i++) {

                var span = document.createElement('span');
                span.innerHTML = tab[i].fact;
                var p = document.getElementById('middlediv');
                p.appendChild(span);

            }
        }
    )


}

//-----------------------------Fonction pour le Précédent et le Suivant Dernieres Facts----------------------------------//

var page = 1

function unprecedent() {


    page--
    fetch('http://jihane.fr/ajax/chucknorris.php/get?data=tri:last;type:txt;page:' + page)

    .then(
        function(response) {
            return response.json()
        }
    )

    .then(
        function(data) {


            var tab = data;
            var p = document.getElementById('middlediv');
            p.innerHTML = " ";

            for (i = 0; i < 10; i++) {

                var span = document.createElement('span');
                span.innerHTML = tab[i].fact;
                var p = document.getElementById('middlediv');
                p.appendChild(span);

            }
        }
    )

}



var page = 1

function unsuivant() {


    page++
    fetch('http://jihane.fr/ajax/chucknorris.php/get?data=tri:last;type:txt;page:' + page)

    .then(
        function(response) {
            return response.json()
        }
    )

    .then(
        function(data) {


            var tab = data;

            var p = document.getElementById('middlediv');
            p.innerHTML = " ";

            for (i = 0; i < 10; i++) {

                var span = document.createElement('span');
                span.innerHTML = tab[i].fact;
                var p = document.getElementById('middlediv');
                p.appendChild(span);

            }
        }
    )


}
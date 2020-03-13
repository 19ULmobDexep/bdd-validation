/*

var json = {
    "debug": "on",
    "title": "Sample Konfabulator",
    "name": "main_window",
    "width": 500,
    "height": 500,
    "src": "Images/Sun.png",
    "hOffset": 250,
    "vOffset": 250,
    "alignment": "cent"

}


var table = document.getElementById('tableau');


// Boucle for, une façon plus rapide de mettre toutes les données dans le tableau// for(key in data){
    create_function(parent, key, value)

} //Boucle for//


function create_function(parent, key, value) {

}


var tr = document.createElement('tr');
var td = document.createElement('td');
td.innerHTML = "debug";
var td2 = document.createElement('td2');
td2.innerHTML = json.debug;
tr.appendChild(td);
tr.appendChild(td2);
table.appendChild(tr);


var tr = document.createElement('tr');
var td = document.createElement('td');
td.innerHTML = "title";
var td2 = document.createElement('td2');
td2.innerHTML = json.title;
tr.appendChild(td);
tr.appendChild(td2);
table.appendChild(tr);

var tr = document.createElement('tr');
var td = document.createElement('td');
td.innerHTML = "name";
var td2 = document.createElement('td2');
td2.innerHTML = json.name;
tr.appendChild(td);
tr.appendChild(td2);
table.appendChild(tr);

var tr = document.createElement('tr');
var td = document.createElement('td');
td.innerHTML = "width";
var td2 = document.createElement('td2');
td2.innerHTML = json.width;
tr.appendChild(td);
tr.appendChild(td2);
table.appendChild(tr);

var tr = document.createElement('tr');
var td = document.createElement('td');
td.innerHTML = "height";
var td2 = document.createElement('td2');
td2.innerHTML = json.height;
tr.appendChild(td);
tr.appendChild(td2);
table.appendChild(tr);

var tr = document.createElement('tr');
var td = document.createElement('td');
td.innerHTML = "src";
var td2 = document.createElement('td2');
td2.innerHTML = json.src;
tr.appendChild(td);
tr.appendChild(td2);
table.appendChild(tr);

var tr = document.createElement('tr');
var td = document.createElement('td');
td.innerHTML = "hOffset";
var td2 = document.createElement('td2');
td2.innerHTML = json.hOffset;
tr.appendChild(td);
tr.appendChild(td2);
table.appendChild(tr);

var tr = document.createElement('tr');
var td = document.createElement('td');
td.innerHTML = "vOffset";
var td2 = document.createElement('td2');
td2.innerHTML = json.vOffset;
tr.appendChild(td);
tr.appendChild(td2);
table.appendChild(tr);

var tr = document.createElement('tr');
var td = document.createElement('td');
td.innerHTML = "alignment";
var td2 = document.createElement('td2');
td2.innerHTML = json.alignment;
tr.appendChild(td);
tr.appendChild(td2);
table.appendChild(tr);




//2) Exercice sur le générateur de Pays//

function button() {
    var xhr = new XMLHttpRequest();

    xhr.onload = function() {


        var p = document.createElement('p');
        p.innerHTML += "<p>" + JSON.parse(xhr.responseText).pays.nom + JSON.parse(xhr.responseText).pays.continent + "</p>";
        var section = document.getElementById('pays');

        section.appendChild(p);

    }

    xhr.open('GET', 'http://jihane.fr/ajax/jpays.php')
    xhr.send()
}





// 3) Exercice sur les Pays et affectation des pays dans le continent //

function button() {
    var xhr = new XMLHttpRequest();

    xhr.onload = function() {

        var p = document.createElement('p');
        // p.innerHTML += "<p>" + JSON.parse(xhr.responseText).pays.nom + JSON.parse(xhr.responseText).pays.continent + "</p>";
        var section = document.getElementById('pays');

        section.appendChild(p);

        var element = JSON.parse(xhr.responseText).pays.continent;


        if (element == "EU") {
            var div = document.getElementById('Europe');
            p.innerHTML += "<p>" + JSON.parse(xhr.responseText).pays.nom + "</p>";
            div.appendChild(p);

        } else if (element == "AS") {
            var div = document.getElementById('Asie');
            p.innerHTML += "<p>" + JSON.parse(xhr.responseText).pays.nom + "</p>";
            div.appendChild(p);

        } else {
            var div = document.getElementById('Afrique');
            p.innerHTML += "<p>" + JSON.parse(xhr.responseText).pays.nom + "</p>";
            div.appendChild(p);
        }


    }

    xhr.open('GET', 'http://jihane.fr/ajax/jpays.php')
    xhr.send()
}

function reset() {

    var div = document.getElementById('Europe');
    var p = document.createElement('p');

    if (div == "p") {

        p = "";

    } else {

    }
}



//Exercice 4) pays à charger en fonction de chiffres que l'on donne //

function button() {
    var xhr = new XMLHttpRequest();

    var valeur = document.getElementById('valeur').value;

    xhr.onload = function() {




        for (i = 0; i < valeur; i++) {

            var p = document.createElement('p');
            var section = document.getElementById('pays');
            section.appendChild(p);
            element = JSON.parse(xhr.responseText).pays[i].continent;


            if (element == "EU") {
                var div = document.getElementById('Europe');
                p.innerHTML += "<p>" + JSON.parse(xhr.responseText).pays[i].nom + "</p>";
                div.appendChild(p);

            } else if (element == "AS") {
                var div = document.getElementById('Asie');
                p.innerHTML += "<p>" + JSON.parse(xhr.responseText).pays[i].nom + "</p>";
                div.appendChild(p);

            } else {
                var div = document.getElementById('Afrique');
                p.innerHTML += "<p>" + JSON.parse(xhr.responseText).pays[i].nom + "</p>";
                div.appendChild(p);
            }


        }

    }

    xhr.open('GET', 'http://jihane.fr/ajax/jpays.php?nb=' + valeur)
    xhr.send()
}


//Exercice 5) sur le formulaire et le POST

function button() {
    var xhr = new XMLHttpRequest();



    xhr.onload = function() {

        var reponseok = document.getElementById('msg');
        var responseno = document.getElementById('msga')


        if (xhr.responseText == "ok") {

            reponseok.className = "afficher";
            responseno.className = "messagenon";

        } else {
            reponseok.className = "messageok";
            responseno.className = "afficher";

        }


    }

    xhr.open('POST', 'http://jihane.fr/ajax/form.php')

    var form = document.getElementById('formulaire');
    var formData = new FormData(form);

    xhr.send(formData);
}





// Exercice 6) Recherche 1/2 JSON les étudiants




var xhr = new XMLHttpRequest();

function research() {



    xhr.onload = function() {

        var nom = JSON.parse(xhr.responseText).etudiants;
        var section = document.getElementById('tableau');
        var para = document.createElement('p');

        section.innerHTML = "";

        for (i = 0; i < nom.length; i++) {


            section.insertBefore(para, section.firstChild);
            para.innerHTML += nom[i].prenom;

        }

    }

    var recup = document.getElementById('informations').value;
    xhr.open('GET', 'http://jihane.fr/ajax/dwmg2.php?query=' + recup);
    xhr.send();


}

*/
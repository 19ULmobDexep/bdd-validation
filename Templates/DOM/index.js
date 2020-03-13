/*var titre = document.getElementById("montitre");
alert(titre.innerHTML)

var para = document.getElementById("monparagraphe");
alert(para.innerHTML)



var para = document.getElementById("monparagraphe");
para.innerHTML = "Je vais bien merci"
alert(para.innerHTML)


function myfunction(color) {
    document.getElementById('montitre').style.color = color;
}


function apparence() {
    document.getElementById('parados').style.display = "none";
    document.getElementById('paratres').style.display = "none";
}

function apparencea() {
    document.getElementById('parauno').style.display = "none";
    document.getElementById('paratres').style.display = "none";
}

function apparenceb() {
    document.getElementById('parauno').style.display = "none";
    document.getElementById('parados').style.display = "none";
}


var p = document.createElement("p");
p.innerHTML = "titre de niveau 1";

//var body = document.getElementById("body");
var body = document.body;

body.appendChild(p);


function pgraphe() {
    body = document.getElementById('body');
    p = document.getElementById('pp');
    body.removeChild(p);
}

*/

function BoutonClicka() {
    var pe = document.createElement("p")
    pe.innerHTML = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa recusandae sint debitis explicabo voluptas?";
    var body = document.getElementById("body");
    body.insertBefore(pe, body.firstChild)
}

function BoutonClickb() {
    body = document.getElementById("body");
    body.appendChild(pe);

}
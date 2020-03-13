function charger() {

    fetch('https://pokeapi.co/api/v2/pokemon')

    .then(
        function(response) {
            return response.json()
        }
    )

    .then(
        function(data) {


            var tab = data;
            var p = document.getElementById('left');
            p.innerHTML = " ";
            var right = document.getElementById('right')
            right.innerHTML = " ";


            for (let i = 0; i <= 14; i++) {

                var span = document.createElement('span');
                span.innerHTML += "<p>" + tab.results[i].name + "</p>";

                p.appendChild(span);

                var infof = document.createElement("p");
                infof.innerHTML = "voir les stats";

                infof.addEventListener("click", function() {
                    infopoke(data.results[i].name)
                })
                right.appendChild(infof);

            }


        }
    )

}

function infopoke(name) {

    var visible = document.getElementById("information");
    visible.className = "vue"

    fetch('https://pokeapi.co/api/v2/pokemon/' + name)

    .then(
        function(response) {
            return response.json()
        }
    )

    .then(
        function(data) {
            var parent = document.getElementById("information");
            parent.innerHTML = " ";

            var idt = document.createElement("h3");
            idt.innerHTML = "Id";
            var parent = document.getElementById("information");
            parent.appendChild(idt);
            var id = document.createElement("p");
            id.innerHTML = "data.id";
            var parent = document.createElement("infromation");
            parent.appendChild(id);

            var nomt = document.createElement("h3");
            nomt.innerHTML = "Nom";
            var parent = document.getElementById("information");
            parent.appendChild(nomt);
            var nom = document.createElement("p");
            nom.innerHTML = data.name;
            var parent = document.getElementById("information");
            parent.appendChild(nom);

            var hauteurt = document.createElement("h3");
            hauteurt.innerHTML = "Hauteur";
            var parent = document.getElementById("information");
            parent.appendChild(hauteurt);
            var hauteur = document.createElement("p");
            hauteur.innerHTML = data.height;
            var parent = document.getElementById("information");
            parent.appendChild(hauteur);

            var imaget = document.createElement("h3");
            imaget.innerHTML = "Image";
            var parent = document.getElementById("information");
            parent.appendChild(imaget);
            var image = document.createElement("img");
            image.setAttribute("src", data.sprites.front_default);
            var parent = document.getElementById("information");
            parent.appendChild(image);

        }
    )

}



var page = 1


function suivant() {


    page--
    fetch('https://pokeapi.co/api/v2/pokemon?offset=20&limit=20&page=' + page)

    .then(
        function(response) {
            return response.json()
        }
    )

    .then(
        function(data) {



            var tab = data;
            var p = document.getElementById('left');
            p.innerHTML = " ";
            var right = document.getElementById('right')
            right.innerHTML = " ";
            var parent = document.getElementById('information')
            parent.innerHTML = " ";


            for (let i = 0; i <= 14; i++) {

                var span = document.createElement('span');
                span.innerHTML += "<p>" + tab.results[i].name + "</p>";

                p.appendChild(span);

                var infof = document.createElement("p");
                infof.innerHTML = "voir les stats";

                infof.addEventListener("click", function() {
                    infopoke(data.results[i].name)
                })
                right.appendChild(infof);

            }

        }
    )

}






var page = 1


function precedent() {


    page--
    fetch('https://pokeapi.co/api/v2/pokemon?offset=0&limit=' + page)

    .then(
        function(response) {
            return response.json()
        }
    )

    .then(
        function(data) {



            var tab = data;
            var p = document.getElementById('left');
            p.innerHTML = " ";
            var right = document.getElementById('right')
            right.innerHTML = " ";
            var parent = document.getElementById('information')
            parent.innerHTML = " ";


            for (let i = 0; i <= 14; i++) {

                var span = document.createElement('span');
                span.innerHTML += "<p>" + tab.results[i].name + "</p>";

                p.appendChild(span);

                var infof = document.createElement("p");
                infof.innerHTML = "voir les stats";

                infof.addEventListener("click", function() {
                    infopoke(data.results[i].name)
                })
                right.appendChild(infof);

            }

        }
    )

}
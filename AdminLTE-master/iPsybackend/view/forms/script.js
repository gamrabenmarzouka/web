function verif() {

    var errors = "<ul>";
    var nom = document.querySelector('#nom').value;
    var theme_even = document.querySelector('#theme_even').value;
    var dateNais = document.querySelector('#dateNais').value;
    var nb_participant = document.querySelector('#nb_participant').value;
    var type_even = document.querySelector('#type_even').value;
    var lien_even = document.querySelector('#lien_even').value;


    if (nom.charAt(0) < 'A' || nom.charAt(0) > 'Z') {
        //document.getElementById('erreur').innerHTML = "Le nom doit commencer par une lettre Majuscule";
        //return false;
        errors += "<li>Le nom doit commencer par une lettre Majuscule </li>";
    }
    if (theme_even.charAt(0) < 'A' || theme_even.charAt(0) > 'Z') {
        //document.getElementById('erreur').innerHTML = "Le nom doit commencer par une lettre Majuscule";
        //return false;
        errors += "<li>Le theme doit commencer par une lettre Majuscule </li>";
        // errors += "<li>or choisie un theme </li>";
    }

    if (dateNais === "") {
        errors += "<li>La date est obligatoire </li>";
    }else {
        var today = new Date();
        dateNais = new Date(dateNais);
        if (today.getFullYear() - dateNais.getFullYear() < 18) {
            errors += "<li>Vous n'êtes pas un adulte </li>";
        }
    }

    // if (type_even === "") {
    //     errors += "<li>le type est obligatoire </li>";
    // }

    if (lien_even === "") {
        errors += "<li>le lien d'evenement est obligatoire </li>";
    }
    if (errors !== "<ul>") {
        document.querySelector('#erreur').style.color = 'red';
        errors += "</ul>"
        document.getElementById('erreur').innerHTML = errors;
        
    }

}
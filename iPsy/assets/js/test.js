function checkEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function verif() {
    var errors_nom = "<ul>";
    var errors_prénom = "<ul>";
    var errors_email = "<ul>";
    var errors_role = "<ul>";
    var errors_mdp = "<ul>";
    var errors_re_mdp = "<ul>";
    /*  document.getElementById('nom').value
    */
    var prénom = document.querySelector('#prénom').value;
    var nom = document.querySelector('#nom').value;
    var email = document.querySelector('#email').value;
    var role = document.querySelectorAll('#role');
    var mdp = document.querySelector('#mdp').value;
    var re_mdp = document.querySelector('#re_mdp').value;
    if (checkEmail(email)) {

    } else {
        errors_email += "<li>Adresse e-mail non valide</li>";

    }

    if (nom.charAt(0) < 'A' || nom.charAt(0) > 'Z') {
        //document.getElementById('erreur').innerHTML = "Le nom doit commencer par une lettre Majuscule";
        //return false;
        errors_nom += "<li>Le nom doit commencer par une lettre Majuscule </li>";
    }
    if (prénom.charAt(0) < 'A' || prénom.charAt(0) > 'Z') {
        errors_prénom += "<li>Le prenom doit commencer par une lettre Majuscule </li>";
    }
    



    if (role === 'select') {
        errors_role += "<li>Veuillez indiquer votre profession </li>";
    }



    if (mdp !== re_mdp || mdp === "" || re_mdp === ""||mdp.length<10) {
        errors_mdp += "<li> Veuillez vérifier le mot de pass saisi </li>";
        errors_re_mdp += "<li> Veuillez vérifier le mot de pass saisi </li>";

        document.querySelector('#mdp').value = "";
        document.querySelector('#re_mdp').value = "";
        document.querySelector('#mdp').focus();
    }

    if (errors_nom !== "<ul>") {
        document.querySelector('#erreur_nom').style.color = 'red';
        errors_nom += "</ul>"
        document.getElementById('erreur_nom').innerHTML = errors_nom;
    } 
    
    
    if (errors_prénom !== "<ul>") {
        document.querySelector('#erreur_prénom').style.color = 'red';
        errors_prénom += "</ul>"
        document.getElementById('erreur_prénom').innerHTML = errors_prénom;
    } 
    if (errors_email !== "<ul>") {
        document.querySelector('#erreur_email').style.color = 'red';
        errors_email += "</ul>"
        document.getElementById('erreur_email').innerHTML = errors_email;
    } 
    if (errors_role !== "<ul>") {
        document.querySelector('#erreur_role').style.color = 'red';
        errors_role += "</ul>"
        document.getElementById('erreur_role').innerHTML = errors_role;
    } 
    if (errors_mdp !== "<ul>") {
        document.querySelector('#erreur_mdp').style.color = 'red';
        errors_mdp += "</ul>"
        document.getElementById('erreur_mdp').innerHTML = errors_mdp;
    } 
    if (errors_re_mdp !== "<ul>") {
        document.querySelector('#erreur_re_mdp').style.color = 'red';
        errors_re_mdp += "</ul>"
        document.getElementById('erreur_re_mdp').innerHTML = errors_re_mdp;
    } 
    if(errors_nom !== "<ul>"||errors_prénom !== "<ul>"|| errors_email !== "<ul>"|| errors_role !== "<ul>"||errors_re_mdp !== "<ul>"||errors_mdp !== "<ul>")
    {
        return false;
    }

}
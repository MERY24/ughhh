


function validate() {
    var name = document.forms["formR"]["nom"];
    var pname = document.forms["formR"]["prenom"];
    var email = document.forms["formR"]["email"];
    var mat = document.forms["formR"]["loginid"];
    var niv = document.forms["formR"]["niv"];
    var spec = document.forms["formR"]["spec"];
    var password = document.forms["formR"]["pass"];



    if (name.value == "") {
        window.alert("Veuillez insérer votre nom.");
        name.focus();
        return false;
    }

    if (pname.value == "") {
        window.alert("Veuillez insérer votre prénom.");
        pname.focus();
        return false;
    }

    if (email.value == "") {
        window.alert(
            "Veuillez insérer votre e-mail .");
        email.focus();
        return false;
    }

    if (spec.value == "") {
        window.alert(
            "Veuillez insérer votre specialité.");
        spec.focus();
        return false;
    }
    if (mat.value == "") {
        window.alert(
            "Veuillez insérer votre matricule");
        mat.focus();
        return false;
    }

    if (password.value == "" ) {
        window.alert("Veuillez insérer votre mot de passe ");
        password.focus();
        return false;
    }

    if (niv.selectedIndex < 1) {
        alert("Please enter your course.");
        what.focus();
        return false;
    }





    return true;
}




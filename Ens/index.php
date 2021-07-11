<?php
session_start();
include("header.php")
?>

<head>
    <title>LOGIN</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="css/style.css" rel="stylesheet" type="text/css">


</head>




<div class="container">
    <h2>Bienvenu sur le site officiel des examens de l'université de Béjaia</h2>
    <form name="form1" action="login.php" method="POST" class="login_form" onsubmit="return validated()">

        <input class="form-control" name="loginid" type="text" id="loginid" placeholder="Matricule Universitaire">
        <div id="email_error">Veuillez insérer votre matricule</div>
        <input class="form-control" name="pass" type="password" id="pass" placeholder="Mot de Passe">
        <div id="pass_error">Veuillez insérer votre mot de passe</div>
        <button class="btn btn-primary" name="submit" type="submit" id="submit" value="Login">Connexion</button>
        <div class="newUser"> <p>Nouvel utilsateur ?</p>
            <a href="../Create.php">Créer un compte</a></div>
    </form>
    <script src="valid.js"></script>
</div>

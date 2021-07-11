<?php
session_start();
include("header.php")
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>LOGIN</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="./Ens/css/style.css" rel="stylesheet" type="text/css">

</head>

<body>
<?php

include("database.php");
extract($_POST);

if(isset($submit))
{
    $rs=mysqli_query($con,"select * from mst_user where loginMat='$loginid' and pass='$pass'");
    if(mysqli_num_rows($rs)<1)
    {
        $found="N";
    }
    else
    {
        $_SESSION['login']=$loginid;
    }
}
if (isset($_SESSION['login']))
{

    header('Location: affichage.php');


}


?>

<div class="container">
    <h2>Bienvenu sur le site officiel des examens de l'université de Béjaia</h2>
    <form name="form1"  method="POST" class="login_form" onsubmit="return validated()">

        <input class="form-control" name="loginid" type="text" id="loginid" placeholder="Matricule Universitaire">
        <div id="email_error">Veuillez insérer votre matricule</div>
        <input class="form-control" name="pass" type="password" id="pass" placeholder="Mot de Passe">
        <div id="pass_error">Veuillez insérer votre mot de passe</div>
        <button class="btn btn-primary" name="submit" type="submit" id="submit" value="Login">Connexion</button>
        <div class="newUser"> <p>Nouvel utilsateur ?</p>
            <a href="Create.php">Créer un compte</a></div>
    </form>
    <script src="valid.js"></script>
</div>
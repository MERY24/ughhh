<?php
session_start();
?>
<head>
  <meta charset="UTF-8">
  <title>Créer Un Compte</title>
  <link rel="stylesheet" href="./css/create.css">
</head>
<?php
include('header.php');?>

<div class="container">

  <form action="traiteinscription.php" method="POST" class="create_form" onsubmit="return validate()">

    <div class="radio-container">
      <input type="radio" id="test1" name="radio-group" value="etud" checked>
      <label for="test1">Etudiant</label>
      <input type="radio" id="test2" name="radio-group" value="ens">
      <label for="test2">Enseignant</label>
    </div>




    <input type="text" name="nom" placeholder="Nom">

    <input type="text" name="prenom" placeholder="Prénom">

    <input autocomplete="off" type="text" name="email" placeholder="Email">

       <input type="text" name="spec" placeholder="Spécialité/Filière" value="Informatique">

      <select class="form-select form-control" id="niveau" name="niv" placeholder="niveau">
          <option value="L1">L1</option>
          <option value="L2">L2</option>
          <option value="L3">L3</option>
          <option value="M1">M1</option>
          <option value="M2">M2</option>
      </select>

    <input type="text" name="loginid" placeholder="Matricule Universitaire">

    <input type="password" name="pass" placeholder="Mot de Passe">

    <input type="password" name="password-confirm" placeholder="Confirmer Votre Mot de Passe">

    <button type="submit">Créer</button>

  </form>

</div>
</div>
<SCRIPT LANGUAGE="JavaScript">
    let stu=document.getElementById('test1');
    let teach=document.getElementById('test2');
    let lvl=document.getElementById('niveau');
    teach.addEventListener('click',()=>{
        lvl.style.display='none';});
    stu.addEventListener('click',()=>{
        lvl.style.display='block';});
</SCRIPT>








<link href="css/startpage.css" rel="stylesheet" type="text/css">

<?php
session_start();
include ("header.php");
echo "<div class='container'>";
echo "<h1 >Platforme Examen En Ligne</h1>";
echo '<table>
  <tr>
    <td ><img src="image/test1.png" height="50" width="50" ></td>
    <td > <a href="index.php" ><button type="button">Vous êtes étudiant</button> </a></td>


    <td ><img src="image/result.png" height="50" width="50"></td>
    <td> <a href="./Ens/index.php" ><button type="button">Vous êtes enseignant</button></a></td>
  </tr>
 
</table>
</div>
';

exit;
?>
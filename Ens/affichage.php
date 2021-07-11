<link href="css/affichage.css" rel="stylesheet" type="text/css">



<?php
session_start();

if (!isset($_SESSION['alogin']))
{
    include ("logproblem.php");
}

include ("header.php");
echo "<div class='container'>";
echo "<h1 style='transform: translateY(125px)'>Platforme Examen En Ligne</h1>";
echo '<table style="transform: translateY(100px)">
  <tr>
    <td ><img src="img/module.png" height="50" width="50" ></td>
    <td > <a href="subadd.php" ><button type="button">Ajouter Module</button> </a></td>
    <td ><img src="img/module.png" height="50" width="50"></td>
    <td> <a href="viewsub.php" ><button type="button">Modifier Module</button></a></td>
  </tr>
  <tr>
    <td ><img src="img/test1.png" height="50" width="50" ></td>
    <td > <a href="testadd.php" ><button type="button">Ajouter Test</button> </a></td>
    <td ><img src="img/test1.png" height="50" width="50"></td>
    <td> <a href="testview.php" ><button type="button">Modifier Test</button></a></td>
  </tr>
    <tr>
    <td ><img src="img/qst.png" height="50" width="50" ></td>
    <td > <a href="questionadd.php" ><button type="button">Ajouter Question</button> </a></td>
    <td ><img src="img/qst.png" height="50" width="50"></td>
    <td> <a href="questionview.php" ><button type="button">Modifier Question</button></a></td>
  </tr>
  <tr >
  
   <td ><img src="img/calendar.png" height="50" width="50"></td>
    <td> <a href="planning.php" ><button type="button">Ajouter Au Planning</button></a></td>
</tr>
 
</table>
</div>
';

exit;
?>
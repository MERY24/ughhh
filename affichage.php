


<link href="./css/affichage.css" rel="stylesheet" type="text/css">

<?php
session_start();

include ("header.php");
echo "<div class='container'>";
echo "<h1 >Platforme Examen En Ligne</h1>";
echo '<table>
  <tr>
    <td ><img src="image/test1.png" height="50" width="50" ></td>
    <td > <a href="sublist.php" ><button type="button">List Tests</button> </a></td>
      <td ><img src="image/calendar.png" height="50" width="50" ></td>
    <td > <a href="planing.php" ><button type="button">Planning</button> </a></td>


  </tr>
</table>
</div>
';


exit;
?>
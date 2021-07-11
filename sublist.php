<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Modules</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/sublist.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>



<?php
include("header.php");
include("database.php");
$id=$_SESSION['login'];
{
    $rs=mysqli_query($con,"select * from mst_subject ");


    echo " <div class='main'>";
    echo " <h1 bott >Listes Des Modules</h1>";
    echo " <div class='down'>";
    echo " <div class='tab'>";
    echo "<table class='table table-borderless table-hover'>";
    echo "<thead >
<tr>

	<th  width='100%' class='text-light'>Nom Module</th>

</tr>
          </thead>";

    while($row=mysqli_fetch_row($rs))
    {

        echo "<tr>";
        echo "<td ><a href=showtest.php?subid=$row[0]>$row[1]</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo"</div>";
    echo"</div>";
    echo"</div>";
}
?>

</body>
</html>





<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Liste Tests</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/showtest.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
<?php
include("header.php");
include("database.php");
extract($_GET);
$id=$_SESSION['login'];
$rs1=mysqli_query($con,"select * from mst_subject where sub_id=$subid");
$row1=mysqli_fetch_array($rs1);

    echo " <div class='main'>";
    echo " <h1 bott >Choisir Examen</h1>";
    echo " <div class='down'>";
    echo " <div class='tab'>";
    echo "<table class='table table-borderless table-hover'>";
    echo "<thead >
<tr>

	<th  width='100%' class='text-light'>Liste Tests</th>

</tr>
          </thead>";
$rs=mysqli_query($con,"select * from mst_test where sub_id=$subid and lvl in  (select niv from mst_user where loginMat=$id and mst_test.lvl=mst_user.niv)");
if(mysqli_num_rows($rs)<1)
{
    echo "<td><h2>Il N'y a Pas D'Examen Dans Ce Module Pour l'instant </h2></td>";
    exit;
}


while($row=mysqli_fetch_row($rs))
{
    echo "<tr>
<td><a href=passer.php?testid=$row[0]&subid=$subid>$row[2]</a></td>

    
      


</tr>
";

}
echo "</table>";


    echo "</table>";
    echo"</div>";
    echo"</div>";
    echo"</div>";



?>
</body>
</html>

<?php
session_start();

if (!isset($_SESSION['alogin']))
{
    include ("logproblem.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Liste Test</title>
    <link href="../passer.css" rel="stylesheet" type="text/css">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="./css/viewsub.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
<?php
include("header.php");
include("../database.php");
{
    $sql=mysqli_query($con,"select * from mst_test");





    echo " <div class='main'>";
    echo " <h1 >Ajouter Un Test</h1>";
    echo " <div class='down'>";
    echo " <div class='tab'>";
    echo "<table class='table table-borderless table-hover'>";
    echo "<thead >
<tr>
	<th width='25%' class='text-light'>ID</th>
	<th  width='25%' class='text-light'>name</th>
	<th width='25%' class='text-light'>Total question</th>
	<th width='25%' class='text-light'>Update/Delete</th>
</tr>
          </thead>";

    while($result=mysqli_fetch_assoc($sql))
    {
        $id=$result['test_id'];


        echo "<tr>";
        echo "<td class='text-light'>".$result['test_id']. "</td>";
        echo "<td class='text-light'>".$result['test_name']."</td>";
        echo "<td class='text-light'>".$result['total_que']."</td>";
        echo "<td style='display: flex;justify-content: space-evenly;'><a href='testupdate.php?test_id=$id' role='button' class='cik btn btn-outline-warning' ><i class='bi bi-pen'></i></a>
<a href='testdelete.php?test_id=$id' role='button' class='cik fu btn btn-outline-danger' ><i class='bi bi-trash'></i></a></td>
<td>";
        echo "</tr>";
    }
    echo "</table>";
    echo"</div>";
    echo"<div class='ajouter'>
<a role='button' class='add cik btn btn-outline-danger'  href=\"testadd.php\">Ajouter L'Examen</a>
</div>";
    echo"</div>";
    echo"</div>";


}
?>
</body>
</html>

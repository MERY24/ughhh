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
    <title>Liste Module</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="./css/viewsub.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<?php
include("header.php");
include("../database.php");
if (!isset($_SESSION['alogin']))
{
    include ("logproblem.php");
}
{
    $sql=mysqli_query($con,"select * from mst_subject");


    echo " <div class='main'>";
    echo " <h1 >Listes Des Modules</h1>";
    echo " <div class='down'>";
    echo " <div class='tab'>";
    echo "<table class='table table-borderless table-hover'>";
    echo "<thead >
<tr>
	<th width='25%' class='text-light'>ID</th>
	<th  width='55%' class='text-light'>name</th>
	<th width='20%' class='text-light'>Update/Delete</th>
</tr>
          </thead>";

    while($result=mysqli_fetch_assoc($sql))
    {
        $id=$result['sub_id'];

        echo "<tr>";
        echo "<td class='text-light'>".$result['sub_id']. "</td>";
        echo "<td class='text-light'>".$result['sub_name']."</td>";
        echo "<td style='display: flex;justify-content: space-evenly;'><a href='subupdate.php?sub_id=$id' role='button' class='cik btn btn-outline-warning' ><i class='bi bi-pen'></i></a>
	<a href='subdelete.php?sub_id=$id' role='button' class='cik fu btn btn-outline-danger' ><i class='bi bi-trash'></i></a></td>
<td>";
        echo "</tr>";
    }
    echo "</table>";
    echo"</div>";
    echo"<div class='ajouter'>
<a role='button' class='cik btn btn-outline-danger'  href='subadd.php'>Ajouter Un Module</a>
</div>";
    echo"</div>";
    echo"</div>";
}
?>
<SCRIPT LANGUAGE="JavaScript">
    const items = document.querySelectorAll("ul li");
    items.forEach(item => {
        item.addEventListener("click", () => {
            document.querySelector("li.current").classList.remove("current");
            item.classList.add("current");
        });
    });
</script>
</body>
</html>
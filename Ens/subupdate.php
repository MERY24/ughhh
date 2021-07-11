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
    <title>Modifier Modules</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

    <link href="./css/subAdd.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
<?php
include("header.php");
include("../database.php");

extract($_REQUEST);
$id=$_GET['sub_id'];
$q=mysqli_query($con,"select * from mst_subject where sub_id='$id'");
$res=mysqli_fetch_assoc($q);


if(isset($update))
{

    $query="update mst_subject SET sub_name='$subname' where sub_id='$id'";
    mysqli_query($con,$query);
    echo"<div class='main'>";
    echo "<br><br><br><div class=head1>Module est mis à jour</div>";
    exit;
    echo"</div>";

}



?>
<div class="main">
    <div class="ajouter" >
        <h1>Mettre à Jour Module</h1>
        <form name="form1" method="post" onSubmit="return check();">
            <table class="table table-borderless">
                <tr>
                    <td width="35%" height="32"><div style="display: flex;justify-content: center;color: cornsilk;"><strong>Entrez L'Intitulé De L'Examen </strong></div></td>
                    <td width="45%" height="5">   <input style="display: flex;justify-content: center;" value="<?php echo $res['sub_name']; ?>" class="form-control" name="subname" placeholder="Exp: Base De Données" type="text" id="subname">
                    <td width="20%" height="32">


                <tr>
                    <td height="26"></td>
                    <td></td>
                    <td style="display: flex;justify-content: center;"><input style="color: white;" class="btn btn-outline-dark"id="button" type="submit" name="update" value="Mettre à Jour" ></td>
                </tr>
                <tr>
                    <td height="26"></td>
                    <td></td>
                    <td ></td>
                </tr> <tr>
                    <td height="26"></td>
                    <td></td>
                    <td ></td>
                </tr>
            </table>
        </form>
    </div>

</div>

</body>
</html>

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
    <title>Modifier test</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="./css/subAdd.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
<?php
include("header.php");
include("../database.php");

extract($_REQUEST);
$id=$_GET['test_id'];
$q=mysqli_query($con,"select * from mst_test where test_id='$id'");
$res=mysqli_fetch_assoc($q);


if(isset($update))
{

    $query="update mst_test SET test_name='$testname',total_que='$totque' where test_id='$id'";
    mysqli_query($con,$query);
    echo"<div class='main'>";
    echo "<br><br><br><div class=head1>Test Modifié <br> <br> <a href='questionview.php'>Cliquez ici pour modifier un autre test</a></div>";
    exit;
    echo"</div>";

}



?>
<div class="main">
    <div class="ajouter" >
        <h1>Mettre à Jour Test</h1>
        <form name="form1" method="post" onSubmit="return check();">
            <table class="table table-borderless">
                <tr>
                    <td width="45%" height="32"><div    ><strong>Entrez L'Intitulé De L'Examen </strong></div></td>
                    <td width="35%" height="5">   <input style="display: flex;justify-content: center;" class="form-control" value="<?php echo $res['test_name']; ?>" name="testname" type="text" id="testname">
                    <td width="20%" height="32">

                <tr>
                    <td height="26"><div align="left"><strong>Entrez Le Nombre Total De Question </strong></div></td>
                    <td><input class="form-control" value="<?php echo $res['total_que']; ?>" name="totque" type="text" id="totque"></td>
                    <td>&nbsp;</td>
                </tr>

                <tr>
                    <td height="26"><strong>Entrez Le Niveau De Cet Examen</strong></td>
                    <td><input style="display: flex;justify-content: center;" value="<?php echo $res['lvl']; ?>" class="form-control" name="lvel" placeholder="Niveau" type="text" id="lvel"</td>
                    <td ></td>
                </tr>
                <tr>
                    <td height="26"></td>
                    <td></td>
                    <td style="display: flex;justify-content: center;"><input style="color: white;" class="btn btn-outline-dark"id="button" type="submit" name="update" value="Mettre à Jour" ></td>
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
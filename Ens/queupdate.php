<?php
session_start();

if (!isset($_SESSION['alogin']))
{
    include ("logproblem.php");
}
?>
<html>
<head>
    <title>Modifier Questions</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

    <link href="./css/subAdd.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>

<?php
include("header.php");
include("../database.php");

extract($_REQUEST);
$id=$_GET['que_id'];
$q=mysqli_query($con,"select * from mst_question where que_id='$id'");
$res=mysqli_fetch_assoc($q);


if(isset($update))
{

    $query="update mst_question SET que_desc='$addque',ans1='$ans1',ans2='$ans2',ans3='$ans3',ans4='$ans4',true_ans='$anstrue' where que_id='$id'";
    mysqli_query($con,$query);
    echo"<div class='main'>";
    echo "<br><br><br><div class=head1>Question Modifiée <br> <br> <a href='questionview.php'>Cliquez ici pour modifier une autre question</a></div>";
    exit;
    echo"</div>";

}



?>

<div class="main">
    <div class="ajouter" >
        <h1>Mettre à Jour Question</h1>
        <form name="form1" method="post" onSubmit="return check();">
            <table class="table table-borderless">
                <tr>
                    <td width="45%" height="32"><div style="display: flex;justify-content: center;color: cornsilk;"><strong>Entrez L'Intitulé De La Question </strong></div></td>
                    <td width="35%" height="5">   <input style="display: flex;justify-content: center;border-radius;25px;" class="form-control" value="<?php echo $res['que_desc']; ?>" name="addque" cols="60" rows="2" id="addque" Type="text">
                    <td width="20%" height="32">

                <tr>
                    <td height="26"><div align="left"><strong>Enter Answer1 </strong></div></td>
                    <td><input style="border-radius;25px;"class="form-control" value="<?php echo $res['ans1']; ?>" name="ans1" type="text" id="ans1" size="85" maxlength="85" type="text" ></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td height="26"><div align="left"><strong>Enter Answer2 </strong></div></td>
                    <td><input style="border-radius;25px;" class="form-control" value="<?php echo $res['ans2']; ?>" name="ans2" type="text" id="ans2" size="85" maxlength="85" type="text" ></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td height="26"><div align="left"><strong>Enter Answer3 </strong></div></td>
                    <td><input style="border-radius;25px;" class="form-control" value="<?php echo $res['ans3']; ?>" name="ans3" type="text" id="ans3" size="85" maxlength="85" type="text" ></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td height="26"><div align="left"><strong>Enter Answer4 </strong></div></td>
                    <td><input style="border-radius;25px;" class="form-control" value="<?php echo $res['ans4']; ?>" name="ans4" type="text" id="ans4" size="85" maxlength="85" type="text" ></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td height="26"><div align="left"><strong>Enter True Answer </strong></div></td>
                    <td><input style="border-radius;25px;" class="form-control" value="<?php echo $res['true_ans']; ?>" name="anstrue" type="text" id="anstrue" size="50" maxlength="50" type="text" ></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td height="26"></td>
                    <td></td>
                    <td style="display: flex;justify-content: center;"><input style="color: white;" class="btn btn-outline-dark"id="button" type="submit" name="update" value="Mettre à Jour" ></td>
                </tr>


            </table>
        </form>
    </div>

</div>
</body>
</html>

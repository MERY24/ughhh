<?php
session_start();
if (!isset($_SESSION['alogin']))
{
    include ("logproblem.php");
}
require("../database.php");
include ("header.php");


error_reporting(1);

?>

<link href="./css/subAdd.css" rel="stylesheet" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


<?php

extract($_POST);






?>
<SCRIPT LANGUAGE="JavaScript">
    function check() {
        mt=document.form1.subname.value;
        if (mt.length<1) {
            alert("Please Enter Subject Name");
            document.form1.subname.focus();
            return false;
        }
        return true;
    }
</script>

<div class="main">
    <?php

    if($submit=='submit' || strlen($subname)>0 )
    {
        $rs=mysqli_query($con,"select * from mst_subject where sub_name='$subname'");
        if (mysqli_num_rows($rs)>0)
        {
            echo "<br><br><br><div class=head1>Module Déjà Existant </div>";
            exit;
        }
        mysqli_query($con,"insert into mst_subject(sub_name) values ('$subname')") or die(mysqli_error());
        $submit="";
        echo"<div class='main'>";
        echo "<br><br><br><div class=head1>Module  <b> \"$subname \"</b> Ajouté. <br> <br> <a href='subadd.php'>Cliquez ici pour ajouter un autre module</a></div>";
        exit;
        echo"</div>";
        unset($_POST);

    }
    ?>
    <div class="ajouter" >
        <h1>Ajouter Module</h1>
        <form name="form1" method="post" onSubmit="return check();">
            <table class="table table-borderless">
                <tr>
                    <td width="25%" height="32"><div style="display: flex;justify-content: center;color: cornsilk;"><strong>Nom Module </strong></div></td>
                    <td width="55%" height="5">   <input style="display: flex;justify-content: center;" class="form-control" name="subname" placeholder="Exp: Base De Données" type="text" >
                    <td width="20%" height="32">

                <tr>
                    <td height="26"> </td>
                    <td></td>
                    <td> </td>
                </tr>
                <tr>
                    <td height="26"></td>
                    <td></td>
                    <td style="display: flex;justify-content: center;"><input style="color: white;" class="btn btn-outline-dark"id="button" type="submit" name="submit" value="    Ajouter    " ></td>
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

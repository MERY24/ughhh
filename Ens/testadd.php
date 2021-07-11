<?php
session_start();
error_reporting(1);
if (!isset($_SESSION['alogin']))
{
    include ("logproblem.php");
}
?>
<link href="../passer.css" rel="stylesheet" type="text/css">
<link href="./css/testadd.css" rel="stylesheet" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<?php
require("../database.php");

include("header.php");
$id=$_SESSION['login'];

echo "<h2 class='text-center bg-primary'>ADD TEST</h2>";
if($_POST[submit]=='Save' || strlen($_POST['subid'])>0 )
{
    extract($_POST);
    mysqli_query($con,"insert into mst_test(sub_id,test_name,total_que,loginid,lvl) values ('$subid','$testname','$totque','$id','$lvel')") or die(mysqli_error());
    echo"<div class='main'>";
    echo "<br><br><br><div class=head1>Examen <b> \"$testname \"</b> Ajouté <br> <br> <a href='testadd.php'>Cliquez ici pour ajouter un autre Examen</a></div>";
    exit;
    echo"</div>";
    unset($_POST);
}
?>
<SCRIPT LANGUAGE="JavaScript">
    function check() {
        mt=document.form1.testname.value;
        if (mt.length<1) {
            alert("Please Enter Test Name");
            document.form1.testname.focus();
            return false;
        }
        tt=document.form1.totque.value;
        if(tt.length<1) {
            alert("Please Enter Total Question");
            document.form1.totque.value;
            return false;
        }
        return true;
    }
</script>
<div class="main">
    <div class="for">
        <form name="form1" method="post" onSubmit="return check();">
            <table class="table table-borderless ">
                <tr>
                    <td width="49%" height="32"><div ><strong>Entrez  L'ID Du Module</strong></div></td>
                    <td width="3%" height="5">
                    <td width="48%" height="32"><select style="border-radius: 25px;" class="form-select form-control" name="subid">
                            <?php
                            $rs=mysqli_query($con,"Select * from mst_subject order by  sub_name");
                            while($row=mysqli_fetch_array($rs))
                            {
                                if($row[0]==$subid)
                                {
                                    echo "<option value='$row[0]' selected>$row[1]</option>";
                                }
                                else
                                {
                                    echo "<option value='$row[0]'>$row[1]</option>";
                                }
                            }

                            ?>
                        </select>

                <tr>
                    <td height="26"><div ><strong> Entrez Le Nom De L'Examen </strong></div></td>
                    <td>&nbsp;</td>
                    <td><input style="border-radius: 25px;" class="form-control" name="testname" type="text" id="testname"></td>
                </tr>
                <tr>
                    <td height="26"><div ><strong>Entrez Le Nombre Total De Question </strong></div></td>
                    <td>&nbsp;</td>
                    <td><input style="border-radius: 25px;"class="form-control" name="totque" type="text" id="totque"></td>
                </tr>
                <tr>
                    <td height="26"><div ><strong>Entrez Le Niveau De Cet Examen </strong></div></td>
                    <td>&nbsp;</td>
                    <td> <select style="border-radius: 25px" class="form-select form-control" id="lvel" name="lvel">
                            <option value="L1">L1</option>
                            <option value="L2">L2</option>
                            <option value="L3">L3</option>
                            <option value="M1">M1</option>
                            <option value="M2">M2</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td height="26"></td>
                    <td><input style="border-radius: 25px;display: flex;align-self: center;" class="btn btn-outline-dark" type="submit" name="submit" value="  Ajouter  " ></td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </form>
    </div>
    <p>&nbsp; </p>

</div>

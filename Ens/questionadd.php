<?php
session_start();

if (!isset($_SESSION['alogin']))
{
    include ("logproblem.php");
}
require("../database.php");
include("header.php");

error_reporting(1);
?>

<link href="css/testadd.css" rel="stylesheet" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<?php
extract($_POST);

echo "<BR>";


if($_POST[submit]=='Save' || strlen($_POST['testid'])>0 )
{
    extract($_POST);
    mysqli_query($con,"insert into mst_question(test_id,que_desc,ans1,ans2,ans3,ans4,true_ans) values ('$testid','$addque','$ans1','$ans2','$ans3','$ans4','$anstrue')") or die(mysqli_error());
    echo"<div class='main'>";
    echo "<br><br><br><div class=head1>Question Ajouté <br> <br> <a href='questionadd.php'>Cliquez ici pour ajouter une autre question</a></div>";
    exit;
    echo"</div>";
    unset($_POST);
}
?>
<SCRIPT LANGUAGE="JavaScript">
    function check() {
        mt=document.form1.addque.value;
        if (mt.length<1) {
            alert("Please Enter Question");
            document.form1.addque.focus();
            return false;
        }
        a1=document.form1.ans1.value;
        if(a1.length<1) {
            alert("Please Enter Answer1");
            document.form1.ans1.focus();
            return false;
        }
        a2=document.form1.ans2.value;
        if(a1.length<1) {
            alert("Please Enter Answer2");
            document.form1.ans2.focus();
            return false;
        }
        a3=document.form1.ans3.value;
        if(a3.length<1) {
            alert("Please Enter Answer3");
            document.form1.ans3.focus();
            return false;
        }
        a4=document.form1.ans4.value;
        if(a4.length<1) {
            alert("Please Enter Answer4");
            document.form1.ans4.focus();
            return false;
        }
        at=document.form1.anstrue.value;
        if(at.length<1) {
            alert("Please Enter True Answer");
            document.form1.anstrue.focus();
            return false;
        }
        return true;
    }
</script>

<div class="main"  >
    <h2 class='text-center bg-primary'>ADD Question</h2>
    <div class="forq" style="margin:100px">
        <form name="form1" method="post" onSubmit="return check();">
            <div class="tab">
                <table class="table table-borderless">
                    <tr>
                        <td width="29%" height="32"><div  align="left"><strong>Selectionnez L'Examen </strong></div></td>
                        <td width="1%" height="5">
                        <td width="70%" height="32"><select style="border-radius: 25px;" class="form-select form-control" name="testid" id="testid">
                                <?php
                                $rs=mysqli_query($con,"Select * from mst_test order by test_name",$cn);
                                while($row=mysqli_fetch_array($rs))
                                {
                                    if($row[0]==$testid)
                                    {
                                        echo "<option value='$row[0]' selected>$row[2]</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='$row[0]'>$row[2]</option>";
                                    }
                                }
                                ?>
                            </select>

                    <tr>
                        <td height="26"><div align="left"><strong> Entrez Votre Question </strong></div></td>
                        <td>&nbsp;</td>
                        <td><textarea style="border-radius: 25px;" class="form-control" name="addque" cols="60" rows="1.5" id="addque"></textarea></td>
                    </tr>
                    <tr>
                        <td height="26"><div align="left"><strong>Entrez Le Choix N°1 </strong></div></td>
                        <td>&nbsp;</td>
                        <td><input style="border-radius: 25px;" class="form-control" name="ans1" type="text" id="ans1" size="70" maxlength="70"></td>
                    </tr>
                    <tr>
                        <td height="26"><strong>Entrez Le Choix N°2 </strong></td>
                        <td>&nbsp;</td>
                        <td><input style="border-radius: 25px;" class="form-control" name="ans2" type="text" id="ans2" size="70" maxlength="70"></td>
                    </tr>
                    <tr>
                        <td height="26"><strong>Entrez Le Choix N°3 </strong></td>
                        <td>&nbsp;</td>
                        <td><input style="border-radius: 25px;" class="form-control" name="ans3" type="text" id="ans3" size="70" maxlength="70"></td>
                    </tr>
                    <tr>
                        <td height="26"><strong>Entrez Le Choix N°4</strong></td>
                        <td>&nbsp;</td>
                        <td><input style="border-radius: 25px;" class="form-control" name="ans4" type="text" id="ans4" size="70" maxlength="70"></td>
                    </tr>
                    <tr>
                        <td height="26"><strong>Entrez L'Indice De La Bonne Réponse</strong></td>
                        <td>&nbsp;</td>
                        <td><input style="border-radius: 25px;" class="form-control"  name="anstrue" type="text" id="anstrue" size="50" maxlength="50" placeholder="Exp: 1 / 2 / 3 ou 4"></td>
                    </tr>
                    <tr>
                        <td height="26"></td>
                        <td>&nbsp;</td>
                        <td><div align="center"><input style="border-radius: 25px;" class="btn btn-outline-dark" type="submit" name="submit" value="Ajouter" ></div></td>

                    </tr>
                </table>
            </div>
        </form>
    </div>
    <p>&nbsp; </p>
</div>

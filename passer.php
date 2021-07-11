<?php
session_start();
error_reporting(1);
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);

if(isset($subid) && isset($testid))
{
    $_SESSION[sid]=$subid;
    $_SESSION[tid]=$testid;
    header("location:passer.php");
}
if(!isset($_SESSION[sid]) || !isset($_SESSION[tid]))
{
    header("location: index.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Examen En ligne</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="passer.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");


$query="select * from mst_question";

$rs=mysqli_query($con,"select * from mst_question where test_id=$tid") or die(mysqli_error());
if(!isset($_SESSION[qn]))
{
    $_SESSION[qn]=0;
    mysqli_query("delete from mst_useranswer where sess_id='" . session_id() ."'") or die(mysqli_error());
    $_SESSION[trueans]=0;

}


if($submit=='Next Question' && isset($ans))
{
    mysqli_data_seek($rs,$_SESSION[qn]);
    $row= mysqli_fetch_row($rs);
    mysqli_query($con,"insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', '$tid','$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error());
    if($ans==$row[7])
    {
        $_SESSION[trueans]=$_SESSION[trueans]+1;
    }
    $_SESSION[qn]=$_SESSION[qn]+1;
}
else if($submit=='Get Result' && isset($ans))
{
    mysqli_data_seek($rs,$_SESSION[qn]);
    $row= mysqli_fetch_row($rs);
    mysqli_query($con,"insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', '$tid','$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error());
    if($ans==$row[7])
    {
        $_SESSION[trueans]=$_SESSION[trueans]+1;
    }
    echo"<div class='main'>";
    $_SESSION[qn]=$_SESSION[qn]+1;

    echo "<Table align=center><tr class=tot><td>Nombre de questions<td> $_SESSION[qn]";
    echo "<tr class=tans><td>Réponse Juste<td>".$_SESSION[trueans];
    $w=$_SESSION[qn]-$_SESSION[trueans];
    echo "<tr class=fans><td>Réponse Fausse<td> ". $w;
    echo "<tr class='rev'><td><a href='review.php'>Cliquez ici pour terminer la session et voir le corrigé</a><td> ";
    echo "</table>";
    echo" </div>";




}
$rs=mysqli_query($con,"select * from mst_question where test_id=$tid") or die(mysqli_error());
if($_SESSION[qn]>mysqli_num_rows($rs)-1)
{
    unset($_SESSION[qn]);
    session_destroy();
    exit;
}

mysqli_data_seek($rs,$_SESSION[qn]);
$row= mysqli_fetch_row($rs);
echo"<div class='main'>";
echo "<form name=myfm class='form' method=post action=passer.php>";
echo "<table width=100%> <tr> <td width=30>&nbsp;<td> <table border=0>";
$n=$_SESSION[qn]+1;
echo "<tr><td class='styleTd'><h1 class=style2>Question ".  $n .": $row[2]";
echo "<tr><td > <label class='container'>$row[3]<input class='checkbox' type=radio name=ans value=1><span class='checkmark'></span> </label>";
echo "<tr><td > <label class='container'>$row[4]<input class='checkbox' type=radio name=ans value=2><span class='checkmark'></span></label>";
echo "<tr><td ><label class='container'>$row[5]<input class='checkbox' type=radio name=ans value=3><span class='checkmark'></span></label>";
echo "<tr><td ><label class='container'>$row[6]<input class='checkbox' type=radio name=ans value=4><span class='checkmark'></span></label>";

if($_SESSION[qn]<mysqli_num_rows($rs)-1)
    echo "<tr><td><input class='button' type=submit name=submit value='Next Question'></form>";
else
    echo "<tr><td><input class='button' type=submit name=submit value='Get Result'></form>";

echo "</div>";
?>
</body>
</html>
<?php
session_start();
extract($_POST);
extract($_SESSION);
include("database.php");

?>


    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <html>
    <head>
        <title>Correction </title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="passer.css" rel="stylesheet" type="text/css">
    </head>

    <body>
<?php

include("header.php");


if(!isset($_SESSION[qn]))
{
    $_SESSION[qn]=0;
}
else if($submit=='Prochaine Question' )
{
    $_SESSION[qn]=$_SESSION[qn]+1;

}

$rs=mysqli_query($con,"select * from mst_useranswer where sess_id='" . session_id() ."'") or die(mysqli_error());
mysqli_data_seek($rs,$_SESSION[qn]);
$row= mysqli_fetch_row($rs);
echo "<div class='main'>";
echo "<form name=myfm method=post action=review.php>";
echo "<table width=100%> <tr> <td width=30>&nbsp;<td> <table border=0>";
$n=$_SESSION[qn]+1;
echo "<tR><td><span class=style2>Que ".  $n .": $row[2]</style>";
echo "<tr><td class=".($row[7]==1?'tans':'style8').">$row[3]";
echo "<tr><td class=".($row[7]==2?'tans':'style8').">$row[4]";
echo "<tr><td class=".($row[7]==3?'tans':'style8').">$row[5]";
echo "<tr><td class=".($row[7]==4?'tans':'style8').">$row[6]";
if($_SESSION[qn]<mysqli_num_rows($rs)-1)
    echo "<tr><td><input class='button' type=submit name=submit value='Prochaine Question'></form>";
else
    echo "<tr><td><input class='button' type=submit name=submit value='Terminer'></form>";

echo "</table></table>";

echo "</div>";
if($submit=='Terminer')
{
    mysqli_query($con,"delete from mst_useranswer where sess_id='" . session_id() ."'") or die(mysqli_error());
    unset($_SESSION[qn]);
    header("Location: beforeConnex.php");
    exit;
}



?>
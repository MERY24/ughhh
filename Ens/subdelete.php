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
        <title>Online Quiz - Quiz List</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    </head>
    <body>
<?php
include("header.php");
include("../database.php");

$id=$_GET['sub_id'];

$sql=mysqli_query($con,"delete from mst_subject where sub_id='$id'");
header('location:viewsub.php');
?>
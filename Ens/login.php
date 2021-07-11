<?php
session_start();
error_reporting(1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>LOGIN</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="../passer.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link href="./css/style.css"/>
</head>

<body>
<?php
include("../database.php");
extract($_POST);
if(isset($submit))
{
    $rs=mysqli_query($con,"select * from mst_admin where loginid='$loginid' and pass='$pass'") or die(mysqli_error());
    if(mysqli_num_rows($rs)<1)
    {
        echo "<BR><BR><BR><BR><div class=head1> Invalid User Name or Password<br>
		<a href='index.php'>Click here to login again </a>
		<div>";
        //exit;
        echo "<script>window.location='index.php'</script>";
    }
    else
    {
        echo "<script>window.location='affichage.php'</script>";
        $_SESSION['alogin']="true";
    }
}
else if(!isset($_SESSION[alogin]))
{
    include ("logproblem.php");
}





//echo"<div style='background:#CDDC39;padding:49PX;margin-top:33px;margin-right:20px;border-radius:500px'> ";




?>



</body>
</html>
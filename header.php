


<link rel="stylesheet" href="./css/header.css"/>








<?php @$_SESSION['login'];
error_reporting(1);
?>



<?php
if(isset($_SESSION['login']))
{

    echo "<header class=\"main-header\">
	<nav>
	        <img  src=\"./image/exam.png\">
	 <ul>
         <li><a href=\"affichage.php\">Affichage</a></li>
            <li><a href=\"planing.php\">Planning</a></li>  

        
	
		<li><strong> <a href=\"signout.php\">Signout</a></strong></li> 
		</ul>&emsp;&emsp;&emsp;&emsp;&emsp;

	  </nav>
	  </header>
	 ";
}
else
{
    echo "<header class=\"main-header\">
	<nav>
	        <img  src=\"./image/exam.png\">
	 <ul>
         <li><a href=\"index.php\">Login</a></li>
            <li><a href=\"Create.php\">S'inscrire</a></li> 
        
	</ul>
	</nav>
	  </header>
	";
}
?>



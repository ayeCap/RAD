<?php

	require('../connection.php');

	session_start();

	$_SESSION = array();

	if (isset($_COOKIE[session_name()]))
	{
		setcookie(session_name(), '', time()-42000, '/');
	}

	session_destroy();
	
	
	if(count($_POST) > 0)
	{
		$result = mysql_query("SELECT * FROM `admin` WHERE email = '" . $_POST["email"] . "' and password = '". $_POST["password"]."' and code = '" . $_POST["code"] . "'");
		$row  = mysql_fetch_array($result);
		if (!$result)
		{ 
			die('Invalid query: ' . mysql_error());
		}
		
		if(is_array($row)) 
		{
			$_SESSION['id'] = $row['id'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['code'] = $row['code'];
		} 
		else 
		{
			$message = "Invalid Email or Password!";
		}	
	}
	
	if(isset($_SESSION["id"]))
	{
		header("Location:../index.php");
	}

?>


<!DOCTYPE html>
<html>
    <head>
    <meta inf="utf-8">
    <title>R&A | Home</title>
    
     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/css.css">
    </head>
    
    <body>
    	<header class="container layot-elements">
        	<a href="../index.php"><img src="../images/RADiation.jpg" alt="" width="180px" style="padding-top: 10px; padding-left: 5px;"></a>
            
            <div class="reg-form">
                <a href="login.php"><input type='submit' class="btn btn-success btn-font" value='Log In'></a>
               	<a href="register.php"><input type='submit' class="btn btn-success btn-font" value='Sign Up'></a>
            </div>
            
            <hr class="style-two-top">
            <nav class="container nav text-center">
            	<ul class="list-inline navlist text-center">
                    <li><a href="">Recycle &#9734; Art &#9734; Donate</a></li>
                </ul>
            </nav>
            <hr class="style-two-bott">
            
        </header>
        
        <article class="container layot-elements">
        	<form action='?act=login' class="text-center" method='post'>
			<input type='text' name='email' class="font" size='30'><br><br>
			<input type='password' name='password' class="font" size='30'><br><br>
			<input type='text' name='code' class="font" size='30'><br><br>
			<input type='submit' class="btn btn-success font" value='Login'>
		</form>
        </article>
        
        <footer class="container footer">
        	<div class="site-map">
            	<p class="text-left fp"><a href="about-us.php">About us</a>
                </p>
            	<img src="../images/walking_chaosf.png" class="footer-logo text-right" alt="">
                <br>
                <div class="cp-right">
            	<p class="cp-right-text">Walking Chaos Copyright &copy </p>            
           	 	</div>
            </div>
        </footer>
        
    </body>
</html>

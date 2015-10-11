<?php

	require('..\connection.php');
	session_start();
	if(count($_POST) > 0)
	{
		$result = mysql_query("SELECT * FROM users WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
		$row  = mysql_fetch_array($result);
		if(is_array($row)) 
		{
			$_SESSION['user_name'] = $row['username'];
			$_SESSION['email'] = $row['email'];
		} 
		else 
		{
			echo "Invalid Email or Password!";
		}	
	}
	
	if(isset($_SESSION["user_name"]))
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
        
        <article class="container layot-elements"">
        	<form action='?act=login' class="text-center log-form" method='post'>
            <input type='text' name='email' size='30' class="font" placeholder='Email'><br><br>
            <input type='password' name='password' class="font" size='30' placeholder='Password'><br><br>
            <input type='submit' class="btn btn-success btn-font" value='Log In'>
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
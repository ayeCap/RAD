<?php

	require('..\connection.php');

	session_start ();
	$username = $_SESSION['user_name'];
	if (! isset($username)) {
		
		//TODO: handle error
	}
	
	if (isset($_POST['submit']))
	{
			
		if(empty($_POST['oldpassword'])) 
		{
			echo "Old password wrong!";
			header("Location: edit.php");
		}
	
		if(empty($_POST['newpassword']))
		{
			echo "No password!";
			header("Location: edit.php");
		}
	
		if(empty($_POST['repeatnewpassword']))
		{
			echo "No password";
			header("Location: edit.php");
		}
	
		$oldpassword = $_POST['oldpassword'];
		$newpassword = $_POST['newpassword'];
		$repeatnewpassword = $_POST['repeatnewpassword'];
				
		if ($newpassword == $repeatnewpassword)
		{
			$query = sprintf ("UPDATE users SET password='%s' WHERE username = '%s'",
								  mysql_real_escape_string($newpassword),
								  mysql_real_escape_string($username));
			$update = mysql_query($query);
			
			die ("Your password has been changed");
			header("Location: edit.php");
			
		}
		else 
			echo "New password dont match!";
			header("Location: edit.php");
	}
	
	if (isset($_POST['change_email']))
	{
			
		if(empty($_POST['oldemail'])) 
		{
			echo "No email!";
			header("Location: edit.php");
		}
	
		if(empty($_POST['newemail']))
		{
			echo "No new email!";
			header("Location: edit.php");
		}
	
		if(empty($_POST['repeatnewemail']))
		{
			echo "No password!";
			header("Location: edit.php");
		}
	
		$oldemail = $_POST['oldemail'];
		$newemail = $_POST['newemail'];
		$repeatnewemail = $_POST['repeatnewemail'];
				
		if ($newemail == $repeatnewemail)
		{	
			$query = sprintf ("UPDATE users SET email='%s' WHERE username = '%s'",
								  mysql_real_escape_string($newemail),
								  mysql_real_escape_string($username));
			$update = mysql_query($query);
	
			echo "Your email has been changed.";
			header("Location: edit.php");
		}
		else{
			echo "New email dont match!";
			header("Location: edit.php");
		}
	}
	
	if (isset($_POST['delete_acc']))
	{
		$query = "DELETE FROM users WHERE username = '$username'";
		$result = mysql_query($query);
		$_SESSION = array();

		if (isset($_COOKIE[session_name()]))
		{
			setcookie(session_name(), '', time()-42000, '/');
		}

		session_destroy();
		header("Location: index.php");
	}
	
?>


<!DOCTYPE html>
<html>
    <head>
    <meta inf="utf-8">
    <title>R&A - Home</title>
    
     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/css.css">
    </head>
    
    <body>
    	<header class="container layot-elements">
        	<a href="../index.php"><img src="../images/RADiation.jpg" alt="" width="180px" style="padding-top: 10px; padding-left: 5px;"></a>
            
            <div class="reg-form">
                <a href="logout.php"><input type = "submit" class="btn btn-success" name="log_out" value = "Log Out"></a>
               	<a href="edit.php"><input type = "submit" class="btn btn-success" name="settings" value = "Settings"></a>
                <a href="../progects/sell.php" class=\"btn-link\"><input type = "submit"  class="btn btn-success" name="Sell" value = "Sell"></a>
            </div>
            
            <hr class="style-two-top">
            <nav class="container nav text-center">
            	<ul class="list-inline navlist text-center">
                    <li>Recycle &#9734; Art &#9734; Donate</li>
                </ul>
            </nav>
            <hr class="style-two-bott">
            
        </header>
        
        <article class="container layot-elements text-center">
        	<form action="edit.php" class="edit-frm" method="post">
			<input type="password" name="oldpassword" class="font" placeholder="Old Password"><br/><br/>
			<input type="password" name="newpassword" class="font" placeholder="Password"><br/><br/>
			<input type="password" name="repeatnewpassword" class="font" placeholder="Password Confirmation"><br/><br/>		
			<a href="index.php"><input type = "submit" class="btn btn-success" name="submit" value = "Change Password"></a><br><br><br>
			
			<input type="text" name="oldemail" class="font" placeholder="Old Email"><br/><br/>
			<input type="text" name="newemail" class="font" placeholder="New Email"><br/><br/>
			<input type="text" name="repeatnewemail" class="font" placeholder="Email Confirmation"><br/><br/>		
			<input type = "submit" class="btn btn-success" name="change_email" class="font" value = "Change Email"><br><br><br>
			
			<a href="../index.php"><input type = "submit" class="btn btn-success" name="delete_acc" value = "Delete Account"></a><br>
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
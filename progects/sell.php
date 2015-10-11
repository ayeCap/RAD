<?php

	require('..\connection.php');
	session_start ();
	$username = $_SESSION['user_name'];
	
	if (isset($_POST['submit'])) {
			
		if(empty($_POST['productname'])) 
		{
			die("There is not product name!");
		}
	
		if(empty($_POST['price']))
		{
			die("There is not price!");
		}
	
		if(empty($_POST['article']))
		{
			die("There is no article!");
		}
		
		/*if(empty($_POST['productimage']))
		{
			die("There is no image!");
		}
		*/
		//echo "<pre>";
 		print_r($_FILES["fileToUpload"]);
 		

		$productname = $_POST['productname'];
		$price = $_POST['price'];
		$article = $_POST['article'];
	    		
	
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$SellOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 

		echo $imagename = basename($_FILES["fileToUpload"]["name"]);
		// Check if image file is a actual image or fake image

	    /*$check = getimagesize($_FILES["fileToSell"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $SellOk = 1;
	    } else {
	        echo "File is not an image.";
	        $SellOk = 0;
	    }*/

	    // Check if $SellOk is set to 0 by an error
		if ($SellOk == 0) {
		    echo "Sorry, your file was not Selled.";
		// if everything is ok, try to Sell file
		} else {
		    if (move_Uploaded_file($_FILES["fileToSell"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["fileToSell"]["name"]). " has been Selled.";
		    } else {
		        echo "Sorry, there was an error Selling your file.";
		    }
		}

		mysql_query("INSERT INTO products (username, productname, price, article,image) VALUES ('$username', '$productname', '$price', '$article', '$imagename')") or die(mysql_error());

		echo $username."You entered your product! Thank you!";
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
                <?php

					$email = isset($_SESSION['email']);
					$password = isset($_SESSION['password']);
					$firstname = isset($_SESSION['firstname']);
					$lastname = isset($_SESSION['lastname']);
					$username = isset($_SESSION['username']);

					if(!$email && !$password)
					{
						echo "<a href=\"users/login.php\" class=\"btn-link\"><input type = \"submit\" Name=\"submit\" class=\"btn btn-success log-btn\" value=\"Log In\"></a>";
						echo "<a href=\"users/register.php\" class=\"btn-link\"><input type = \"submit\" Name=\"submit\" class=\"btn btn-success log-btn\" value=\"Sign Up\"></a>";
					}
					else
					{	
						echo "<a href=\"users/logout.php\" class=\"btn-link\"><input type = \"submit\" Name=\"submit\" class=\"btn btn-success log-btn\" value=\"Log Out\"></a>";
						echo "<a href=\"users/edit.php\" class=\"btn-link\"><input type = \"submit\" Name=\"submit\" class=\"btn btn-success log-btn\" value=\"Settings\"></a>";
					}
				?> 
            </div>
            
            <hr class="style-two-top">
            <nav class="container nav text-center">
            	<ul class="list-inline navlist text-center">
                    <li><a href="">Recycle &#9734; Art &#9734; Donate</a></li>
                </ul>
            </nav>
            <hr class="style-two-bott">
            
        </header>
        
        <article class="container layot-elements text-center">
        	<form action="sell.php" method="post" enctype="multipart/form-data">
     
		   <input type="text" name="productname" class="sell-font" placeholder="ProductName"style="width: 250px;"><br/><br/>  
		   <input type="text" name="price" class="sell-font" placeholder="Price"style="width: 250px;"><br/><br/>
		   <textarea type="text" cols="10" rows="1" method="post" maxlength="45" name="article" class="sell-font" placeholder="Article"style="width: 250px; padding-bottom: 100px;"></textarea><br/><br/>
			
			<center><input type="file" name="fileToUpload" class="btn btn-success" id="fileToUpload" style="width: 250px;"></center>
			
			
		  <br> <input type = "submit" Name="submit" class="btn btn-success sell-font" value = "Upload product"style="width: 250px;">
			</form>
        </article>
        
        <footer class="container footer">
        	<div class="site-map">
            	<p class="text-left fp"><a href="../users/about-us.php">About us</a>
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
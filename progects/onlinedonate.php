

<!DOCTYPE html>
<html>
    <head>
    <meta inf="utf-8">
    <title>R&A | Shop</title>
    
     <link rel="stylesheet" href="../css/bootstrap.css">
     <link rel="stylesheet" href="../css/css.css">
    </head>
    
    <body>
     <header class="container layot-elements">
         <a href="../index.php"><img src="../images/RADiation.jpg" alt="" width="180px" style="padding-top: 10px; padding-left: 5px;"></a>
           
			<div class="reg-form">
				 <?php
				 
				 	session_start();
					
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
						echo "<a href=\"progects/sell.php\" class=\"btn-link\"><input type = \"submit\" Name=\"submit\" class=\"btn btn-success log-btn\" value=\"Sell\"></a>";
					}
				?> 
            </div>
            
            <hr class="style-two-top">
            <nav class="container nav text-center">
            	<ul class="list-inline navlist text-center">
                    <li>Recycle &#9734; Art &#9734; Donate</li>
                </ul>
            </nav>
            <hr class="style-two-bott">
            
			
			
        </header>
        
        <article class="container layot-elements">
 		
       	  <div class="sl-con" >
            	<div id="content-slider">
                	<div id="slider">
                    	<div id="mask">
                        
                        	<ul>
                           	  <li class="firstanimation">
                                <img src="../images/slideshow1.png" alt="">
                                </li>
                                
                              <li class="secondanimation">
                                <img src="../images/slideshow2.png" alt="">
                                </li>
                                
                              <li class="thirdanimation">
                                <img src="../images/slideshow3.png" alt="">
                                </li>
                                
                              <li class="fourthanimation">
                                <img src="../images/slideshow4.png" alt="">
                                </li>
                                
                              <li class="fifthanimation">
                                <img src="../images/slideshow5.png" alt="">
                                </li>
                            </ul>
                        	
                        </div>
                    </div>
                </div>
            </div>   
			   
               <?php 
					$con=mysqli_connect("localhost","root","","randa");
					
					 $sql = "SELECT * FROM donations";
					
					
					$result=mysqli_query($con,$sql);
					
					// Associative array
					$row=mysqli_fetch_all($result, MYSQLI_ASSOC);
					//echo "<pre>";
					//print_r($row);
					
						foreach ($row as $product) {
						echo "<div class=\"product text-center\">";
						echo "<p class=\"product-name\"> ".$product['productname']."</p>";
						echo "<p class=\"product-creator\">By: ".$product['username']."</p>";
						echo '<p ><img class="product-image" src="progects/uploads/' .$product['image']. '" alt="Seller too lazy to upload a picture I guess :/" /></p>';
						
						//echo "<a href=\"\" class=\"buynow\"><button class=\"btn btn-success buy-btn\" value=\"Buy It Now!\">Buy Now!</button></a>";
						
						echo "<p class=\"product-desc\">".$product['article']."</p>";
						
						echo "<hr class=\"product-hr\">";
						echo "</div>";
						}
					  
					?>
		   
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
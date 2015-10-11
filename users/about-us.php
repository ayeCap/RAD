<!DOCTYPE html>
<html>
    <head>
    <meta inf="utf-8">
    <title>R&A | About us</title>
    
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
						echo "<a href=\"../progects/sell.php\" class=\"btn-link\"><input type = \"submit\" Name=\"submit\" class=\"btn btn-success log-btn\" value=\"Sell\"></a>";
					}
				?> 
            </div>
			
            <hr class="style-two-top">
            <nav class="container nav text-center">
             <ul class="list-inline navlist text-center">
                    <li class="border"><a href="">Recycle &#9734; Art &#9734; Donate</a></li>
                </ul>
            </nav>
            <hr class="style-two-bott">
            
        </header>
        
        <article class="container layot-elements asa">
		<p class="pcf"> <b>What is R&A?</b>
        <br>Have you ever wondered what can you do with old tests? Or jeans that you can't wear anymore?
        <br>Our idea for this site is to sell or buy things. You can sell things that you can't use anymore and in that way you recycle it. You sell it to a new owner who is going to use your materials to create an art project. And that site allows you to sell your art projects too. Isn't that awesome? Seriously look at our slideshow! And.. more text that makes this article longer... 
        <br> <br> <b>Who are we?</b> 
        <br>We are a team of five <a id="potato" href="http://www.elsys-bg.org/">ELSYS</a> students who decided to participate in <a id="potato" href="http://hacktues.com/">HackTues</a>. So this is our prject on the topic "Environmental and social develpment". <b>POTATO</b>! 
        <br><img src="../images/walking_chaos.png" width="1000px;">
        </p>
        </article>
        
        <footer class="container footer">
        	<div class="site-map">
            	<p class="text-left fp"><a href="">About us</a>
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
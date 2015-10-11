
<?php 
	$postParam = $_POST;
	$con = mysqli_connect("localhost","root","","randa");
	if(!empty($postParam))
	{
		foreach($postParam as $key=>$value)
		{
			$re = explode('_', $key);
			$id = $re[1];
			$sql = "DELETE FROM users WHERE id = ".$id;
			$result = mysqli_query($con,$sql);
			unset($sql, $result);

		}
	}
	

	 $sql = "SELECT * FROM users";


	$result = mysqli_query($con,$sql);

	$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
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
						echo "<a href=\"../users/login.php\" class=\"btn-link\"><input type = \"submit\" Name=\"submit\" class=\"btn btn-success log-btn\" value=\"Log In\"></a>";
						echo "<a href=\"../users/register.php\" class=\"btn-link\"><input type = \"submit\" Name=\"submit\" class=\"btn btn-success log-btn\" value=\"Sign Up\"></a>";
					}
					else
					{	
						echo "<a href=\"../users/logout.php\" class=\"btn-link\"><input type = \"submit\" Name=\"submit\" class=\"btn btn-success log-btn\" value=\"Log Out\"></a>";
						echo "<a href=\"../users/edit.php\" class=\"btn-link\"><input type = \"submit\" Name=\"submit\" class=\"btn btn-success log-btn\" value=\"Settings\"></a>";
					}
				?> 
                
                <form style="display: inline-block;">
              		<?var url = getUrl();?><a href="index.php"><input style=" margin-bottom: -5px; margin-left: -5px;" type='button' class="btn btn-success log-btn" name='test		' value='Back'>
                
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
        	<center><table class="admin-table" width="100%">
  			<tr>
   				<th>First Name    </th>
    			<th>Last Name    </th>		
    			<th>Username    </th>
    			<th>Email     </th>
    			<th>Date of registration     </th>
    			<th>Date of birth    </th>		
    			<th>Delete    </th>
  			</tr>
  			<tr>
  				<?php
  					foreach ($row as $user) 
					{
						echo "<td>".$user['firstname']."</td>";
						echo "<td>".$user['lastname']."</td>";
						echo "<td>".$user['username']."</td>";
					    echo "<td>".$user['email']."</td>";
					    echo "<td>".$user['reg_date']."</td>";
					    echo "<td>".$user['date_of_birth']."</td>";
					    
					    $query = "DELETE FROM users WHERE username = ".$user['username']."";
					    $result = mysql_query($query);
					    $id = $user['id'];

					    echo "<td><form method = \"post\"><input type = \"submit\" class=\"btn btn-success\" name=\"id_$id\" value = \"X\"></form></td>";
					    echo "<tr></tr>";
					}
  				?>

  			</tr>
  	 </table></center>
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
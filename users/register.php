<?php

	require('..\connection.php');
		
	if (isset($_POST['Submit'])) {
			
		if(empty($_POST['firstname'])) 
		{
			die("You didn't entered name!");
		}
	
		if(empty($_POST['lastname']))
		{
			die("You didn't entered mail!");
		}
	
		if(empty($_POST['username']))
		{
			die("No password!");
		}
		
		if(empty($_POST['email'])) 
		{
			die("No password!");
		}
		
		if(empty($_POST['password'])) 
		{
			die("No password!");
		}
		
		if(empty($_POST['password'])) 
		{
			die("No password!");
		}
		
		if(empty($_POST['Day'])) 
		{
			die("Date of birth!");
		}
		
		if(empty($_POST['Month'])) 
		{
			die("Date of birth!");
		}
		
		if(empty($_POST['Year'])) 
		{
			die("Date of birth!");
		}
		
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password1 = $_POST['password1'];
		$email = $_POST['email'];
		$b_day = $_POST['Day'];
		$b_month = $_POST['Month'];
		$b_year = $_POST['Year'];
		$date_of_birth = $b_day.'/'.$b_month.'/'.$b_year;		
		
		$user_check = mysql_query("SELECT username FROM users WHERE username='$username'");

		$do_user_check = mysql_num_rows($user_check);

		$email_check = mysql_query("SELECT email FROM users WHERE email='$email'");
		$do_email_check = mysql_num_rows($email_check);

		if($do_user_check > 0)
		{
			die("Username is already in use!");
		}

		if($do_email_check > 0)
		{
			die("Email is already in use!");
		}

		if($password != $password1)
		{
			echo "Passwords don't match!";
		}
				
		mysql_query("INSERT INTO users (firstname, lastname, username, email, password, date_of_birth) VALUES ('$firstname', '$lastname', '$username', '$email', '$password', '$date_of_birth')") or die(mysql_error());
	
		header("Location: ../index.php");
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
                <a href="login.php"><input type='submit' class="btn btn-success font" value='Log In'></a>
               	<a href="register.php"><input type='submit' class="btn btn-success font" value='Register'></a>
            </div>
            
            <hr class="style-two-top">
            <nav class="container nav text-center">
            	<ul class="list-inline navlist text-center">
                    <li>Recycle &#9734; Art &#9734; Donate</li>
                </ul>
            </nav>
            <hr class="style-two-bott">
            
        </header>
        
        <article class="container layot-elements"">
        	<form action="register.php" class="text-center log-form" method="post">
			<input type="text" name="firstname" class="font" placeholder="First Name"><br/><br/>		
			<input type="text" name="lastname" class="font" placeholder="Last Name"><br/><br/>		
			<input type="text" name="username" class="font" placeholder="Username"><br/><br/>
			<input type="text" name="email" class="font" placeholder="Email"><br/><br/>
			<input type="password" name="password" class="font" placeholder="Password"><br/><br/>
			<input type="password" name="password1" class="font" placeholder="Password Confirmation"><br/><br/>		
			
		
			<select name="Month" class="font">
				<option> - Month - </option>
				<option value="January">January</option>
				<option value="Febuary">Febuary</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>
			</select>

			<select name="Day" class="font">
				<option> - Day - </option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
			</select>

			<select name="Year" class="font">
				<option> - Year - </option>
				<option value="1993">2000</option>
				<option value="1999">1999</option>
				<option value="1998">1998</option>
				<option value="1997">1997</option>
				<option value="1996">1996</option>
				<option value="1995">1995</option>
				<option value="1994">1994</option>
				<option value="1993">1993</option>
				<option value="1992">1992</option>
				<option value="1991">1991</option>
				<option value="1990">1990</option>
				<option value="1989">1989</option>
				<option value="1988">1988</option>
				<option value="1987">1987</option>
				<option value="1986">1986</option>
				<option value="1985">1985</option>
				<option value="1984">1984</option>
				<option value="1983">1983</option>
				<option value="1982">1982</option>
				<option value="1981">1981</option>
				<option value="1980">1980</option>
				<option value="1979">1979</option>
				<option value="1978">1978</option>
				<option value="1977">1977</option>
				<option value="1976">1976</option>
				<option value="1975">1975</option>
				<option value="1974">1974</option>
				<option value="1973">1973</option>
				<option value="1972">1972</option>
				<option value="1971">1971</option>
				<option value="1970">1970</option>
				<option value="1969">1969</option>
				<option value="1968">1968</option>
				<option value="1967">1967</option>
				<option value="1966">1966</option>
				<option value="1965">1965</option>
				<option value="1964">1964</option>
				<option value="1963">1963</option>
				<option value="1962">1962</option>
				<option value="1961">1961</option>
				<option value="1960">1960</option>
				<option value="1959">1959</option>
				<option value="1958">1958</option>
				<option value="1957">1957</option>
				<option value="1956">1956</option>
				<option value="1955">1955</option>
				<option value="1954">1954</option>
				<option value="1953">1953</option>
				<option value="1952">1952</option>
				<option value="1951">1951</option>
				<option value="1950">1950</option>
	
			</select>
			<br><br>
			<a href="../index.php"><input type = "Submit" Name="Submit" class="btn btn-success btn-font" value = "Sign Up"></a>
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
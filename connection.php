<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

	$conn = mysql_connect($servername, $username, $password);

	if (!$conn)
	{
		die("Connection failed: " . mysql_error());
	}
	
	if(!mysql_select_db("RandA"))
	{
		die("DataBase selection problem" . mysql_error());
	}
?>
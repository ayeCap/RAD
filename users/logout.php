<?php

	session_start();
	unset($_SESSION["user_name"]);
	unset($_SESSION["email"]);
	
	header("Location:../index.php");
?>
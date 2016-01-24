<?php
	require_once("includes/dbinfo.php");
	global $SERVER,$DB,$USER,$PSWD,$conn;
	try 
	{
		$conn = new PDO("mysql:host=$SERVER;dbname=$DB", $USER, $PSWD);
	// set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
	    header("index.php?msg=".urlencode("db connection error"));
	    exit();
	}

?>
<?php 
	$teamid=-1;
	require_once("./includes/dbinfo.php");
	try 
	{
		$conn = new PDO("mysql:host=$SERVER;dbname=$DB", $USER, $PSWD);
	// set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//prepare
	    //$sql = "SELECT * FROM hell Where visible=?; ";
	    $stmt=$conn->prepare("SELECT id,teamname FROM registration Where teamname LIKE :tn ;");
	    //bind
		$stmt->bindParam(':tn',$teamname);
		//set and execute
		
		$stmt->execute();				
		$result = $stmt->fetchAll();
		if( count($result)>0 ) 
		{ 
			$teamid=$result[0][0];
	    }
	}
	catch(PDOException $e)
	{
	 	/*IF SOME UNEXPECTED ERROR HAPPENS */
		$teamid=-1;	 //ERROR CODE	
	}
	$conn=NULL;
?>
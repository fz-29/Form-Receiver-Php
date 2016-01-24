<?php 
	
	if(isset($_POST["teamname"]) and $_POST["teamname"]!=='')
	{
		$teamname = $_POST["teamname"];
                $teamname=strtolower($teamname);
		$teamavail=1;
		require_once("./includes/dbinfo.php");
			try 
			{
				$conn = new PDO("mysql:host=$SERVER;dbname=$DB", $USER, $PSWD);
	    	// set the PDO error mode to exception
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//prepare
			    //$sql = "SELECT * FROM hell Where visible=?; ";
			    $stmt=$conn->prepare("SELECT teamname FROM registration Where teamname LIKE :tn ;");
			    //bind
				$stmt->bindParam(':tn',$teamname);
				//set and execute
				
				$stmt->execute();
				
				$result = $stmt->fetchAll();
				if( count($result)>0 ) 
				{ 
					$teamavail=0;
			    }
			}
			catch(PDOException $e)
			{
			 	/*IF SOME UNEXPECTED ERROR HAPPENS */
				$teamavail=-1;	 //ERROR CODE	
			}
			$conn=NULL;

	}
	else
		$teamavail=-1;

	$jsonreturn = array('avail'=>$teamavail);
	/** THIS IS HOW WE RETURN JSON IN PHP ***/
	header('Content-Type: application/json');
	echo json_encode($jsonreturn);

?>
<?php
    session_start();
    if (isset($_POST["submit"])) //RECEIVING
    {
        if ($_POST["formid"] == $_SESSION["formid"]) //PROPER SESSION
        {
            $_SESSION["formid"] = '';
            require_once("./includes/dbinfo.php");
            require_once("./includes/msgfunction.php");
    		/***FETCHING POST DATA ******/
    		$bits=0;
    		$bots=0;
    		$brainwave=0;
    		$designpro=0;
    		$electrocution=0;
    		$envision=0;
    		$radix=0;
    		$technovision=0;
    		$events=array('bits','bots','brainwave','designpro','electrocution','envision','radix','technovision');
    		$accomodation = 'no';
    		$name1=$name2=$name3=$name4="";
    		$contact1=$contact2=$contact3=$contact4=0;
    		$email1=$email2=$email4=$email3="";
    		$college1=$college2=$college3=$college4="";
     
    		if(isset($_POST['bits']) && $_POST['bits'] == 'Yes') { $bits=1; }
    		if(isset($_POST['bots']) && $_POST['bots'] == 'Yes') { $bots=1; }
    		if(isset($_POST['brainwave']) && $_POST['brainwave'] == 'Yes') { $brainwave=1; }
    		if(isset($_POST['designpro']) && $_POST['designpro'] == 'Yes') { $designpro=1; }
    		if(isset($_POST['electrocution']) && $_POST['electrocution'] == 'Yes') { $electrocution=1; }
    		if(isset($_POST['envision']) && $_POST['envision'] == 'Yes') { $envision=1; }
    		if(isset($_POST['radix']) && $_POST['radix'] == 'Yes') { $radix=1; }
    		if(isset($_POST['technovision']) && $_POST['technovision'] == 'Yes') { $technovision=1; }
    
    		$teamname=$_POST["teamname"];
                    $teamname=strtolower($teamname);
    		$strength=$_POST["strength"];
    
    		$name1=$_POST["name1"]; 
    		$contact1=$_POST["contact1"];
    		$email1=$_POST["email1"]; 
    		$college1=$_POST["college1"];
    		if($strength >= 2) {
    		$name2=$_POST["name2"]; 
    		$contact2=$_POST["contact2"];
    		$email2=$_POST["email2"]; 
    		$college2=$_POST["college2"];
    		}
    		if($strength >= 3) {
    		$name3=$_POST["name3"]; 
    		$contact3=$_POST["contact3"];
    		$email3=$_POST["email3"]; 
    		$college3=$_POST["college3"];
    		}
    		if($strength >= 4) {
    		$name4=$_POST["name4"]; 
    		$contact4=$_POST["contact4"];
    		$email4=$_POST["email4"]; 
    		$college4=$_POST["college4"];
    		}
    
    		if(isset($_POST['accomodation']) && $_POST['accomodation'] == 'yes') { $accomodation="yes"; }
    		$comments = $_POST["comments"];
    
    		/********* TEAM NAME CHECK ******/
    		$teamredundancy=0;
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
    				$teamredundancy=1;
    				$_SESSION["error"]= "Team : ".$teamname." already exists. Kindly use another team name";
    		    }
    		}
    		catch(PDOException $e)
    		{
    		    $_SESSION["error"]= "Unexpected Error, Kindly fill the form.";
    		}
    		$conn=NULL;
    		if(isset($_SESSION["error"]))
    		{
    			header('Location: register.php');
    			exit();
    		}
    
    
    
    		/******** INSERTION OF FORM DETAILS *******/
    		try 
    		{
    		    $conn = new PDO("mysql:host=$SERVER;dbname=$DB", $USER, $PSWD);
    		    // set the PDO error mode to exception
    		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		    
    		    $sqlq = "INSERT INTO registration (teamname,strength,
    		    		name1,contact1,email1,college1,
    		    		name2,contact2,email2,college2,
    		    		name3,contact3,email3,college3,
    		    		name4,contact4,email4,college4,
    		    		bits,bots,brainwave,designpro,electrocution,envision,radix,technovision,
    		    		accomodation,comments) ";
    		    $sqlq .= " VALUES (?,?,?,?,
    		    			?,?,?,?,
    		    			?,?,?,?,
    		    			?,?,?,?,
    		    			?,?,?,?,
    		    			?,?,?,?,
    		    			?,?,?,?);";
    
    		    $stmt = $conn->prepare($sqlq);
    		    $stmt->bindParam(1,$teamname);
    			$stmt->bindParam(2,$strength);
    			$stmt->bindParam(3,$name1);
    			$stmt->bindParam(4,$contact1);
    			$stmt->bindParam(5,$email1);
    			$stmt->bindParam(6,$college1);
    			$stmt->bindParam(7,$name2);
    			$stmt->bindParam(8,$contact2);
    			$stmt->bindParam(9,$email2);
    			$stmt->bindParam(10,$college2);
    			$stmt->bindParam(11,$name3);
    			$stmt->bindParam(12,$contact3);
    			$stmt->bindParam(13,$email3);
    			$stmt->bindParam(14,$college3);
    			$stmt->bindParam(15,$name4);
    			$stmt->bindParam(16,$contact4);
    			$stmt->bindParam(17,$email4);
    			$stmt->bindParam(18,$college4);
    			$stmt->bindParam(19,$bits);
    			$stmt->bindParam(20,$bots);
    			$stmt->bindParam(21,$brainwave);
    			$stmt->bindParam(22,$designpro);
    			$stmt->bindParam(23,$electrocution);
    			$stmt->bindParam(24,$envision);
    			$stmt->bindParam(25,$radix);
    			$stmt->bindParam(26,$technovision);
    			$stmt->bindParam(27,$accomodation);
    			$stmt->bindParam(28,$comments);
    			//set and execute
    			$stmt->execute();
    			// use exec() because no results are returned
    		    //$conn->exec($sql);
                       
    		    
    
    			/** FETCH TEAM ID ****/
    			require('fetchid.php');  //$teamid is intoduced in this file
    		    /********EMAIL STUFF****/
    		 	
    			/*** FOR DEFAULT MAIL()
    			// use wordwrap() if lines are longer than 70 characters
    			$mailmsg = wordwrap($mailmsg,100);
    			$headers = "From: webmaster@example.com";
    			// send email
    			mail($email1,"Registration Successfull",$mailmsg,$headers);
    			******************************** DEFAULT MAIL() ********************/
    			include './includes/mailermodule.php';
    			if($strength>=1) $mail->AddAddress($email1,$name1);                  // name is optional
    			if($strength>=2) $mail->AddAddress($email2,$name2);
    			if($strength>=3) $mail->AddAddress($email3,$name3);
    			if($strength>=4) $mail->AddAddress($email4,$name4);
    			$mail->Subject = "Troika Registration Successful";
    			$mail->Body    = mailmessage();

    			$mail->AltBody = "Registration Completeted Successfully for team : ".$teamname;
    			
                if(!$mail->Send())
    			{
    				$_SESSION['message']="Team ".$teamname.", &nbsp; Registration Completeted Successfully, but confirmation mail could not be sent to your email ID <br>";
    				$_SESSION['message'].= "<br><strong>Please NOTE DOWN your Team ID : ".$teamid."</strong>";	
    				
    			}
    			else
    			{
    				$_SESSION['message']="Team ".$teamname.",Registration Completeted Successfully, also a confirmation mail has been sent to your email ID <br>";
    				$_SESSION['message'].= "<br><strong>Please note down your Team ID : ".$teamid."</strong>";
    			}
    			$conn = null;
    			header('Location: success.php');
    			exit();
    
    	    }
    		catch(PDOException $e)
    	    {
    	    	$_SESSION["error"]= "Unexpected Error, Kindly fill the form.";
    	    }
    
    	    if(isset($_SESSION["error"]))
    		{
    			header('Location: register.php');
    			exit();
    		}
        }
        else
        {
        	/***** WILL HAPPEN IF CSRF *****/
        	/*** THIS BLOCK CHECKS HAPPENS WHEN formid is mismatch ****/
        	$_SESSION["error"]= "Unexpected Error, Kindly Refresh and fill the form.";
        	/**** inform ADMIN VIA MAIL ****/
    
    
        	header('Location: register.php');
        	//or redirect to form page freshly.
        }
    }
    else //form to be rendered to be first time
    {
        $_SESSION["formid"] = md5(rand(0,10000000));
    
    ?>
<html>
    <head>
        <title>Register | Troika '16</title>
        <meta name="viewport" content="width=device-width">
        <!-- VALIDATION -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
        <script src="js/validation.js"></script>
        <script src="js/formhelp.js"></script>
        <script src="js/register.js"></script>
        <!-- BOOTSTRAP-->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./css/register.css">
    </head>
    <body onload="loadfunction()" onunload="savefunction()">
        <div>
            <a href="http://ieee.dcetech.com"><img src="http://www.troika.dcetech.com/images/ieeelogo.svg" width="80" class="top_logos" id="ieeeedtu"></a>
            <a href="http://www.troika.dcetech.com"><img src="http://www.troika.dcetech.com/images/troika_logo_small.svg" width="80" class="top_logos" id="troikaSmall"></a>
            <a href="http://dtu.ac.in"><img src="http://www.troika.dcetech.com/images/dtulogo.png" width="80" class="top_logos" id="dtu"></a>
        </div>
        <div class="container form">
        <header>
            <span class='center'>
                <h1>Troika 16 Registration Form</h1>
            </span>
        </header>
        <hr>
        <?php
            if(isset($_SESSION["error"]))
            {
            	echo '<div class="error">'.$_SESSION["error"].'</div>';
            	unset($_SESSION["error"]);
            }
            ?>
        <form method="POST" id="reg-form" action="register.php" autocomplete="off" novalidate>
            <input type="hidden" name="formid" value="<?php echo $_SESSION['formid']; ?>"/>
            <div class="jumbotron">
                <h3 class="center subhead">Events</h3>
                <br>
                <p style="font-size: 1.2em;"> Please choose the events in which you want to take part.<br/>
                    To know more about events <a href="http://www.troika.dcetech.com/categories.html" target="_blank">Click Here</a>
                </p>
                <div class="row">
                    <div class="col-md-offset-1 col-md-3" style="font-size: 1.3em;">
                        <input type="checkbox" name="bits" value="Yes" class="eventselect">BITS
                        <br>
                        <input type="checkbox" name="bots" value="Yes" class="eventselect">BOTS
                        <br>
                        <input type="checkbox" name="brainwave" value="Yes" class="eventselect">Brainwave
                        <br>
                        <input type="checkbox" name="designpro" value="Yes" class="eventselect">Design Pro
                        <br>
                    </div>
                    <div class="col-md-offset-5 col-md-3" style="font-size: 1.3em;">
                        <input type="checkbox" name="electrocution" value="Yes" class="eventselect">Electrocution
                        <br>
                        <input type="checkbox" name="envision" value="Yes" class="eventselect">Envision
                        <br>
                        <input type="checkbox" name="radix" value="Yes" class="eventselect">Radix
                        <br>
                        <input type="checkbox" name="technovision" value="Yes" class="eventselect">Technovision
                        <br>
                    </div>
                </div>
                <br>
                <div class="row center">
                    <div class="alert alert-warning" style="font-size: 1.3em; margin:6px;" role="alert">
                        There's a single registration required for an event, and there is no separate online registration for sub events.
                    </div>
                </div>
            </div>
            <div>
                <h3>Team Details</h3>
                <div class="row">
                    <div class="col-md-6 errorPar">
                        <div class="input-group">
                            <span class="input-group-addon">Team Name</span>
                            <input type="text" name="teamname" class="form-control" onkeyup="teamcheck()" style="text-transform: lowercase;" maxlength="20" pattern="[A-Za-z0-9\s]+" placeholder="" required title="Name must consists of alphanumeric characters" aria-describedby="basic-addon2">
                        </div>
                        <div class="errorTxt"></div>
                    </div>
                    <div id="team-name-status" class="col-md-6 teamcheck"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-2">
                        <div class="input-group">
                            <span class="input-group-addon">Team Strength</span>
                            <span style="padding-top:2px;" class="form-control center">
                                <select name="strength" class="styled-select center">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </span>
                        </div>
                        <div class="errorTxt"></div>
                    </div>
                </div>
            </div>
            <section>
                <br><br>
                <hr>
                <div class="mhead row">
                <h3>Member 1</h3>
                <br>
                <div class="row">
                    <div class="col-md-6 errorPar">
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Name</span>
                            <input class="form-control" type="text" name="name1" maxlength="50" pattern="[A-Za-z\s]+" placeholder="Full Name" required title="Name must contain only alphabets and spaces">
                        </div>
                        <div class="errorTxt"></div>
                    </div>
                    <div class="col-md-6 errorPar">
                        <br>
                        <div class="input-group">								
                            <span class="input-group-addon">Contact Number</span>
                            <input class="form-control" type="number" name="contact1" maxlength="10" placeholder="10 digits" required>
                        </div>
                        <div class="errorTxt"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Email</span>
                            <input class="form-control" type="email" name="email1" maxlength="50" placeholder="" required>
                        </div>
                        <div class="errorTxt"></div>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <div class="input-group">									
                            <span class="input-group-addon">College Name</span>
                            <input class="form-control" type="text" name="college1" maxlength="100" pattern="[A-Za-z\s]+" placeholder="" required title="Name must contain only alphabets and spaces">
                        </div>
                        <div class="errorTxt"></div>
                    </div>
                </div>
            </section>
            <section>
                <br><br>
                <hr>
                <div class="mhead row">
                <h3>Member 2</h3>
                <br>
                <div class="row">
                    <div class="col-md-6 errorPar">
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Name</span>
                            <input class="form-control" type="text" name="name2" maxlength="50" pattern="[A-Za-z\s]+" placeholder="Full Name" required title="Name must contain only alphabets and spaces">
                        </div>
                        <div class="errorTxt"></div>
                    </div>
                    <div class="col-md-6 errorPar">
                        <br>
                        <div class="input-group">								
                            <span class="input-group-addon">Contact Number</span>
                            <input class="form-control" type="number" name="contact2" maxlength="10" placeholder="10 digits" required>
                        </div>
                        <div class="errorTxt"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Email</span>
                            <input class="form-control" type="email" name="email2" maxlength="50" placeholder="" required>
                        </div>
                        <div class="errorTxt"></div>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <div class="input-group">									
                            <span class="input-group-addon">College Name</span>
                            <input class="form-control" type="text" name="college2" maxlength="100" pattern="[A-Za-z\s]+" placeholder="" required title="Name must contain only alphabets and spaces">
                        </div>
                        <div class="errorTxt"></div>
                    </div>
                </div>
            </section>
            <section>
                <br><br>
                <hr>
                <div class="mhead row">
                <h3>Member 3</h3>
                <br>
                <div class="row">
                    <div class="col-md-6 errorPar">
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Name</span>
                            <input class="form-control" type="text" name="name3" maxlength="50" pattern="[A-Za-z\s]+" placeholder="Full Name" required title="Name must contain only alphabets and spaces">
                        </div>
                        <div class="errorTxt"></div>
                    </div>
                    <div class="col-md-6 errorPar">
                        <br>
                        <div class="input-group">								
                            <span class="input-group-addon">Contact Number</span>
                            <input class="form-control" type="number" name="contact3" maxlength="10" placeholder="10 digits" required>
                        </div>
                        <div class="errorTxt"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Email</span>
                            <input class="form-control" type="email" name="email3" maxlength="50" placeholder="" required>
                        </div>
                        <div class="errorTxt"></div>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <div class="input-group">									
                            <span class="input-group-addon">College Name</span>
                            <input class="form-control" type="text" name="college3" maxlength="100" pattern="[A-Za-z\s]+" placeholder="" required title="Name must contain only alphabets and spaces">
                        </div>
                        <div class="errorTxt"></div>
                    </div>
                </div>
            </section>
            <section>
                <br><br>
                <hr>
                <div class="mhead row">
                    <h3>Member 4</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-6 errorPar">
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Name</span>
                                <input class="form-control" type="text" name="name4" maxlength="50" pattern="[A-Za-z\s]+" placeholder="Full Name" required title="Name must contain only alphabets and spaces">
                            </div>
                            <div class="errorTxt"></div>
                        </div>
                        <div class="col-md-6 errorPar">
                            <br>
                            <div class="input-group">								
                                <span class="input-group-addon">Contact Number</span>
                                <input class="form-control" type="number" name="contact4" maxlength="10" placeholder="10 digits" required>
                            </div>
                            <div class="errorTxt"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Email</span>
                                <input class="form-control" type="email" name="email4" maxlength="50" placeholder="" required>
                            </div>
                            <div class="errorTxt"></div>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <div class="input-group">									
                                <span class="input-group-addon">College Name</span>
                                <input class="form-control" type="text" name="college4" maxlength="100" pattern="[A-Za-z\s]+" placeholder="" required title="Name must contain only alphabets and spaces">
                            </div>
                            <div class="errorTxt"></div>
                        </div>
                    </div>
            </section>
            <br>
            <hr>
            <br>
            <div style="font-size: 1.3em;">
            <input type="checkbox" name="accomodation" value="yes"> Accomodation
            <br>
            <br>Additional Comments
            <br>
            <textarea name="comments"></textarea>
            </div>
            <br><br>
            <div>
            <span class="center"><input type="submit" name="submit" value="Submit" id="submit" class="btn btn-success btn-lg"></span>
            </div>
        </form>
        </div>
        <script>
            $(document).ready(function(){
    //form submit handler
    $('#reg-form').submit(function (e) {
        //check atleat 1 checkbox is checked
        if (!$('.eventselect').is(':checked')) {
            //prevent the default form submit if it is not checked
            e.preventDefault();
            alert("Please select atleast one event");
        }
    })
})
        </script>
    </body>
</html>
<?php } ?>
<?php 
	session_start(); 
		if(isset($_SESSION['message']))
		{
			
			?>
<html>
<head>
	<title>Troika 16 Registration Form</title>
	<meta name="viewport" content="width=device-width">
	
	<!-- BOOTSTRAP-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/register.css">
</head>
<body>
	<div>
		<a href="http://ieee.dcetech.com"><img src="http://www.troika.dcetech.com/images/ieeelogo.svg" width="80" class="top_logos" id="ieeeedtu"></a>
		<a href="http://www.troika.dcetech.com/"><img src="http://www.troika.dcetech.com/images/troika_logo_small.svg" width="80" class="top_logos" id="troikaSmall"></a>
		<a href="http://dtu.ac.in"><img src="http://www.troika.dcetech.com/images/dtulogo.png" width="80" class="top_logos" id="dtu"></a>
	</div>
	<div class="container">
		<header><span class='center'><h1>Troika 16 Registration Form</h1></span></header><hr>

		<p class="message">
	        <?php
	            echo $_SESSION['message'];
				session_destroy(); /* END THE CURRENT SESSION */
				/* AS THE FORM SUBMITTED SUCCESSFULLY, CLEAR FORM DATA */
	        ?>
		</p>
</div>
	<script>
		localStorage.clear();
	</script>
</body>
</html>
     <?php
		}
		else /* IF THE USER REFRESHES, REDIRECT TO FORM PAGE */
			header('Location: register.php');
	?>
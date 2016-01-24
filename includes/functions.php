<?php
function getFbLoginUrl()
{
	require_once('fbapp/src/facebook.php');
	// Create our Application instance
	$facebook = new Facebook(array(
	  'appId'  => '1656109864649862',
	  'secret' => '30dd5bcdf99df0f6514324d6ffb2c6d9',
	));
	// Get User ID
	$user = $facebook->getUser();
	// 0 if accesstoken expired else USER ID WITH RESPECT TO FBAPP
	// If we have a $user id here, it means we know the user is logged into
	// Facebook, but we don't know if the access token is valid. An access
	// token is invalid if the user logged out of Facebook. , publish_actions
	$loginUrl = $facebook->getLoginUrl(array(
        'scope' => 'email,user_friends',
        'redirect_uri' => "http://troika.dcetech.com/register/mist/checkuser.php"
    ));
    return $loginUrl;
}
function getFbToken()
{
	require_once('fbapp/src/facebook.php');
	// Create our Application instance (replace this with your appId and secret).
	$facebook = new Facebook(array(
	  'appId'  => '1656109864649862',
	  'secret' => '30dd5bcdf99df0f6514324d6ffb2c6d9',
	));
	// Get User ID
	//USER HAS BEEN REDIRECTED HERE AFTER SUCCESSFUL LOGIN
	$fbId = $facebook->getUser();
	if($fbId == 0) //Possiblity that user is logged out of FB/his access token is expired.
	{ //REDIRECt
		header("Location: login.php");
		exit();	
	}
	else
	{
		try
		{
			// Proceed knowing you have a logged in user who's authenticated.
			$fbToken = $facebook->getAccessToken();
		}
		catch (FacebookApiException $e)
		{
			header("Location: "."index.php?msg=".urlencode("cannot get fbAccessToken"));
			exit();	
		}
	}
	return $fbToken;
}

/******************* BACKDOOR POSTING ON FB :  as of 2016 JAN : FB POLICY DONOT ALLOW THIS ****************/
// function postToFB($message)
// {
// 	require_once('fbapp/src/facebook.php');
// 	// Create our Application instance (replace this with your appId and secret).
// 	$facebook = new Facebook(array(
// 	  'appId'  => '1656109864649862',
// 	  'secret' => '30dd5bcdf99df0f6514324d6ffb2c6d9',
// 	));
// 	// Get User ID
// 	//USER HAS BEEN REDIRECTED HERE AFTER SUCCESSFUL LOGIN
// 	$facebook->getUser();
	
// 	$fbToken = (string)getFbToken(); //$_SESSION["fbtoken"];//FOR FRESH TOKEN

// 	$attachment = array('message' => 'this is my message',
// 					    'name' => 'This is my demo Facebook application!',
// 					    'caption' => "Caption of the Post",
// 					    'description' => 'this is a description',
// 					    'access_token' => $fbToken
// 			    );
//     try {
//     	// Proceed knowing you have a user who is logged in and authenticated
//    		$result = $facebook->api('/me/feed/','post',$attachment);
//    		//$response = $facebook->post('/me/feed', $attachment, $fbToken);
//     } 
//     catch (FacebookApiException $e) 
//     {
// 	    error_log($e);
// 	    $user = null;
// 	}
// }

?>
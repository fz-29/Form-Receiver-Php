<?php

function eventmsg()
{
	global $bits,$bots,$brainwave,$designpro,$electrocution,$envision,$radix,$technovision;
	
	$ctr=0;
	$eventmessage="";
	if($bits == 1) { $ctr=$ctr+1;  $eventmessage .= (string)$ctr.". BITS<br>"; }
	if($bots == 1) { $ctr=$ctr+1;  $eventmessage .= (string)$ctr.". BOTS<br>"; }
	if($brainwave == 1) { $ctr=$ctr+1;  $eventmessage .= (string)$ctr.". BRAINWAVE<br>"; }
	if($designpro== 1) { $ctr=$ctr+1;  $eventmessage .= (string)$ctr.". DESIGNPRO<br>"; }
	if($electrocution == 1) { $ctr=$ctr+1;  $eventmessage .= (string)$ctr.". ELECTROCUTION<br>"; }
	if($envision == 1) { $ctr=$ctr+1;  $eventmessage .= (string)$ctr.". ENVISION<br>"; }
	if($radix == 1) { $ctr=$ctr+1;  $eventmessage .= (string)$ctr.". RADIX<br>"; }
	if($technovision == 1) { $ctr=$ctr+1;  $eventmessage .= (string)$ctr.". TECHNOVISION<br>"; }
	$intro="<p>You have registered for ".$ctr." Event";
	if($ctr>1){ $intro = $intro."s"; }
	$intro = $intro." :<br><strong>";
	$eventmessage = $intro . $eventmessage . "</strong></p>";
	return $eventmessage;
}

function mailmessage()
{
	global $strength,$teamname,$teamid,$name1,$name2,$name3,$name4;
	$body = "<span style='text-align:center; color:#1ab188'><h1> Congratulations Team ".$teamname."!</h1></span>";
	$body .= "<p>You have successfully registered yourself for <strong>TROIKA 2016</strong>.";
	$body .= "Kindly note that your<strong> Team ID is ".$teamid.".IEEE DTU </strong> shall be looking forward to your participation in TROIKA 2016. Best of luck for your event!!</p>";
	$body .= "<p>For queries mail us at : contact@ieeedtu.com OR directly reply to this mail.</p>";
    
    $body .= "<p>Team Member(s):<strong><br> 1.".$name1;
    if($strength>=2)  $body .= "<br> 2.".$name2;
    if($strength>=3)  $body .= "<br> 3.".$name3;
    if($strength>=4)  $body .= "<br> 4.".$name4;
    $body.= "</strong></p>";
    $eventinfo = eventmsg();
    $body = $body."<br>". $eventinfo;

    $body .= "<p style='text-align:center'>Share the amazing experience of TROIKA 2016 with your Friends <a title='Share this on Facebook' href='http://www.facebook.com/share.php?u=http://www.facebook.com/events/1684545078457334/'><img src='http://www.midphase.com/blog/wp-content/uploads/2014/02/FB-Share-Button.png' width=70px alt='Share Troika 16' /></a></p>
        <p style='text-align:center'>To stay updated, like us on Facebook
        <a title='Like Troika on Facebook' href='https://web.facebook.com/TroikaIeeeDTU/'>
        <img src='http://www.citesocial.co.uk/wp-content/uploads/2013/12/new-facebook-like-button.png' width=45px style='border: 
        0 none;' alt='Like Troika on Facebook'></a>
        </p>";
    return $body;
}

?>
<?php
require("phpmailer/class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host =  ;  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
//$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
//$mail->Port = 465;                                    // TCP port to connect to
/********** CREDENTIALS *********/
$mail->Username = ;  // SMTP username
$mail->Password = ; // SMTP password
/********************************/
$mail->From =  ;
$mail->FromName = ;
$mail->WordWrap = 600;
$mail->IsHTML(true); // set email format to HTML

//$mailer->AddBCC("f29ahmad@gmail.com","xyz"); //NOT WORKING                        
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
$mail->AddReplyTo("contact@ieeedtu.com", "ContactIEEEDTU");
?>

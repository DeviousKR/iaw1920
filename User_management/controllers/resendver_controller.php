<?php
session_start();

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

require_once("db/db.php");
require_once("models/resendver_model.php");

$_SESSION["w_username"] = FALSE;
$_SESSION["w_password"] = FALSE;
$_SESSION["w_email"] = FALSE;
$_SESSION["oops"] = FALSE;
$_SESSION["duplicate"] = FALSE;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["mail"]) && !(empty($_POST["mail"]))) {


$email = $_POST["mail"];
$OOuser = new getuser();
$user_array = $OOuser->get_user($email);
$user = $user_array['username'];
$pwd_hash = $user_array['pwd_hash'];
$ver_hash = $user_array['ver_hash'];

// Instantiation and passing `true` enables exceptions
function sendMail($user,$email,$pwd_hash,$ver_hash) {
  	// example from: https://github.com/PHPMailer/PHPMailer/blob/master/examples/smtp.phps
	date_default_timezone_set('Etc/UTC');
	// require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;
	$mail->CharSet = 'UTF-8';
	$mail->isSMTP();
	$mail->SMTPDebug = 0;	// 0 = off (for production use) || 2 = debug
	$mail->Debugoutput = 'html';
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	$mail->SMTPAuth = true;
	$mail->Username = "martimorat@gmail.com";
	$mail->Password = "bdiupsbhkbrjlryg";
	$mail->setFrom('martimorat@gmail.com','Martí Móra');
	//$mail->addReplyTo('replyto@example.com', 'First Last');
	$mail->addAddress($email);
	$mail->Subject = 'Confirm account for '.$user;
	$mail->msgHTML(mailBody($user, $email,$pwd_hash,$ver_hash));
	//$mail->msgHTML('<b>Hola</b>');
	$mail->AltBody = 'Please, copy the url into a browser to confirm your account';
	//$mail->addAttachment('images/phpmailer_mini.png');
	//send the message, check for errors
  $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      )
    );
	$isMailSent = $mail->send();
	if (!$isMailSent) {
	    // Debug
		file_put_contents('./debug/mail.err', (new \DateTime())->format('Y-m-d H:i:s').': '.$mail->ErrorInfo."\r\n", FILE_APPEND);
		// End Debug
	}
	return $isMailSent;	// Boolean
}



function mailBody($user, $email,$pwd_hash,$ver_hash) {
	$href = '172.16.10.11/iaw1920/User_management/register_confirmed'.'?username='.base64_encode($user).'&challenge='.$ver_hash;
	// Debug
	// file_put_contents('./debug/mail.css', $styles);
	// End Debug
	$text = <<<EOT
		<!doctype html>
		<html>
		  	<head>
		    	<meta charset="utf-8">
		    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		    	<meta name="viewport" content="width=device-width, initial-scale=1">
		    	<title>Confirm</title>
		    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		  	</head>
		  	<body>
		    	<div class="jumbotron">
					<h1 class="display-4">You Track the World</h1>
					<p class="lead">This is the only data that we are going to store from you. Keep this email just in case you forget your username.
					</p>
					<table class="table" style="background-color: white">
				      <tbody>
				        <tr>
				          <td>Email: $email</td>
				        </tr>
				        <tr>
				          <td>Username: $user</td>
				        </tr>
				      </tbody>
				    </table>
					<hr class="my-4">
					<p>Please, click the button to confirm your account. Then proceed to the login page and that's it!</p>
					<p class="lead">
					    <a href="$href">Confirm Account</a>
					</p>
				</div>
			</body>
		</html>
EOT;
	return $text;
}

$mail = sendMail($user,$email,$pwd_hash,$ver_hash);

if ($mail) {
  header("location:mail_sent");
} else {
  $_SESSION["oops"] = TRUE;
  header("location:register");
  exit;
}


}
//Llamada a la vista
require_once("views/resendver_view.phtml");
?>

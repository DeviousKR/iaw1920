<?php
session_start();
//llamada a la API de correo
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require_once("db/db.php");
//Llamada al modelo
require_once("models/recnew_model.php");

//Username control
$_SESSION["w_username"] = FALSE;
$_SESSION["w_password"] = FALSE;
$_SESSION["w_email"] = FALSE;
$_SESSION["oops"] = FALSE;

if (isset($_POST["username"]) && !empty($_POST["username"])) {
  if (preg_match('/^([A-Za-z0-9_\-\.]){2,25}$/',$_POST["username"])) {
    $user = ($_POST["username"]);
  } else {
    $_SESSION["w_username"] = TRUE;
    header("location:register");
    exit;
  }
} else {
  header("location:register");
  exit;
}

//Email control

if (isset($_POST["mail"]) && !empty($_POST["mail"])) {
  if (preg_match('/^[^@;]+@[A-Za-z0-9]+(\.[A-Za-z0-9]+)+$/',$_POST['mail'])) {
    $email = ($_POST["mail"]);
  } else {
    $_SESSION["w_email"] = TRUE;
    header("location:register");
    exit;
  }
} else {
  header("location:register");
  exit;
}

//Password control
$options = [
  'cost' => 12
];
if (isset($_POST["password"]) && !empty($_POST["password"])) {
  $pwd_hash = password_hash("{$_POST['password']}",PASSWORD_BCRYPT,$options);
} else {
  $_SESSION["w_password"] = TRUE;
  header("location:register");
  exit;
}

$date = date_create();
$t_date = date_timestamp_get($date);
$creation_date = date("Y-m-d H:i:s",$t_date);


//creates the challenge to be sent to the user.
$ver_hash = setChallenge($pwd_hash);

function passwordHash($pwd_hash){
	return crypt($pwd_hash,'$5$rounds=5000$HaveANiceTrip!$');
}

function generateRandomString($pwd_hash, $length = 10) {
	$characters = passwordHash($pwd_hash);
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

function setChallenge($pwd_hash){
	$challenge = base64_encode(generateRandomString($pwd_hash));
  return $challenge;
}


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
	$mail->msgHTML(mailBody($user, $email, $pwd_hash,$ver_hash));
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



function mailBody($user, $email, $pwd_hash,$ver_hash) {
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
  $create_user = new createuser();
  $error = $create_user->create_user($user,$pwd_hash,$email,$ver_hash,
  $creation_date);
  if ($error == 1062) {
    $_SESSION["duplicate"] = TRUE;
    header("location:register");
    exit;
  }
  header("location:mail_sent");
} else {
  $_SESSION["oops"] = TRUE;
  header("location:register");
  exit;
}
?>

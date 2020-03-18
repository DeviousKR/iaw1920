<?php
/*require_once("db/db.php");
require_once("controllers/personas_controller.php");*/
define("BASE_URL","/iaw1920/User_management");
define("CONTEXT_URL","User_management");

// GET THE BASENAME IN CASE YOU HAVE A QUERY STRING
$request = basename($_SERVER['REQUEST_URI']);
$pattern = "/(\w+)[?]?.*/";
preg_match($pattern, $request, $matches, PREG_OFFSET_CAPTURE);

//echo print_r($matches), "<br>";
$request = isset($matches[1]) ? $matches[1][0] : $request;

switch ($request) {
    case CONTEXT_URL:
    case '':
    case 'landing' :
        require __DIR__ . '/controllers/landing_controller.php';
        break;
    case 'login' :
        require __DIR__ . '/controllers/loginq_controller.php';
        break;
    case 'login_v' :
      require __DIR__ . '/controllers/logsucc_controller.php';
      break;
    case 'register' :
      require __DIR__ . '/controllers/formreg_controller.php';
      break;
    case 'register_confirmation' :
      require __DIR__ . '/controllers/recnew_controller.php';
      break;
    case 'register_confirmed' :
      require __DIR__ . '/controllers/recver_controller.php';
      break;
    case 'resend_verification' :
      require __DIR__ . '/controllers/resendver_controller.php';
      break;
    case 'mail_sent' :
      require __DIR__ . '/controllers/mailsent_controller.php';
      break;
    case 'recovery' :
      require __DIR__ . '/controllers/recovery_controller.php';
      break;
    case 'new_password' :
      require __DIR__ . '/controllers/new_password_controller.php';
      break;
    case 'set_password' :
      require __DIR__ . '/controllers/set_password_controller.php';
      break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}
?>

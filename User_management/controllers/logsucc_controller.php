<?php
session_start();
require_once("db/db.php");
$_SESSION["w_name"] = FALSE;
$_SESSION["w_pass"] = FALSE;


  if (isset($_POST["username"]) && !(empty($_POST["username"]))) {
    $user = $_POST["username"];
  } else {
    header("Location:index.php");
    exit;
  }

//Llamada al modelo
require_once("models/login_model.php");
$get_user = new getuser();
$dbuser = $get_user->get_user($user);

  if ($dbuser === array()) {
    $_SESSION["w_name"] = TRUE;
    header("Location:login");
    exit;
  }

if (isset($_POST["password"]) && !(empty($_POST["password"]))) {
    $password = $_POST["password"];
    if ($user == $dbuser[0]["username"] && password_verify($password,$dbuser[0]["pwd_hash"])){
      if ($dbuser[0]["verification"]) {
        $_SESSION["user"] = $user;
        header("Location:landing");
        exit;
      } else {
        header("Location:resend_verification");
        exit;
      }
    } else {
      $_SESSION["w_pass"] = TRUE;
      header("Location:login");
      exit;
    }
  } else {
    header("Location:login");
    exit;
  }
?>

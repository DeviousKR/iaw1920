<?php
session_start();
require_once("db/db.php");

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
    if ($user == $dbuser[0]["username"] && $password == $dbuser[0]["pwd_hash"]){
      $_SESSION["user"] = $user;
      //header("Location:right");
      echo "Conectado correctamente";
      exit;
    } else {
      $_SESSION["w_pass"] = TRUE;
      //header("Location:wrong");
      echo "Contraseña erronea";
      exit;
    }
  } else {
    //header("Location:not_set");
    echo "Usuario erroneo";
    exit;
  }
?>

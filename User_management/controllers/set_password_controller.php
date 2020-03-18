<?php
session_start();
require_once("db/db.php");
//Llamada al modelo
require_once("models/set_password_model.php");

if (isset($_SESSION['userver'])) {
  $username = $_SESSION['userver'];
} else {
  header("location:landing");
}

$val_p = "";
$w_pwd = "";
if (isset($_GET['w_pwd'])) {
  $val_p ="is-invalid";
  $w_pwd = "Sorry, this password is invalid, or the passwords do not match.";
}

if (isset($_POST["pwd"]) && !(empty($_POST["pwd"]))) {
  if (isset($_POST["pwd1"]) && !(empty($_POST["pwd1"]))) {
    if (($_POST["pwd1"]) == ($_POST["pwd"])) {
      $options = [
        'cost' => 12
      ];
      $pwd_hash = password_hash("{$_POST['pwd']}",PASSWORD_BCRYPT,$options);
      $new_pass = new updatepwd();
      $result = $new_pass->update_password($username,$pwd_hash);
      $_SESSION["user"] = $username;
      header("location:landing");
    }}}
$_GET['w_pwd'] = TRUE;

require_once("views/set_password_view.phtml");

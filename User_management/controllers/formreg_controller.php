<?php
session_start();
$val_n = "";
$val_p = "";
$val_e = "";
$w_name = "";
$w_pass = "";
$w_mail = "";
$oops = "";
$duplicate = "";
if (isset($_SESSION["w_password"]) && ($_SESSION["w_password"] == TRUE)) {
  $val_p ="is-invalid";
  $w_pass = "Sorry, this is not a valid password";
}

if (isset($_SESSION["w_username"]) && ($_SESSION["w_username"] == TRUE)) {
  $val_n ="is-invalid";
  $w_name = "Sorry, this is not a valid username";
}

if (isset($_SESSION["w_email"]) && ($_SESSION["w_email"] == TRUE)) {
  $val_e ="is-invalid";
  $w_mail = "Sorry, this is not a valid e-mail";
}

if (isset($_SESSION["oops"]) && ($_SESSION["oops"] == TRUE)) {
  $oops = "Sorry, something went wrong, please try again in a few minutes";
}

if (isset($_SESSION["duplicate"]) && ($_SESSION["duplicate"] == TRUE)) {
  $duplicate = "It seems that either your username is in use or you already registered with us.
  If you haven't registered with us before, please use a different username";
}

//Llamada a la vista
require_once("views/formreg_view.phtml");
?>

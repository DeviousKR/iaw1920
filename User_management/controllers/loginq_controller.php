<?php
session_start();
$val_n = "";
$val_p = "";
$w_name = "";
$w_pass = "";
if (isset($_SESSION["w_name"]) && ($_SESSION["w_name"] == TRUE)) {
  $val_n ="is-invalid";
  $w_name = "Sorry, this is not a valid username, if you wish to register,
  <a href=\"register\">Click here</a>";
}

if (isset($_SESSION["w_pass"]) && ($_SESSION["w_pass"] == TRUE)) {
  $val_p ="is-invalid";
  $w_pass = "Sorry, this is not a valid password, if you have forgotten your password,
  <a href=\"r_password\">Click here</a>";
}
//Llamada a la vista
require_once("views/loginq_view.phtml");
?>

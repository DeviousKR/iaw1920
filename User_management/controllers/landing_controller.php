<?php
session_start();
$res = "";
if (isset($_SESSION['res'])) {
  $res = $_SESSION['res'];
  unset($_SESSION['res']);
}
if (isset($_SESSION['user'])) {
  $username = $_SESSION['user'];
  $user = "<a class=\"nav-link\" href=\"\">$username</a>";
  $log = "<a class=\"nav-link\" href=\"logoff\">Log off</a>";
  $delete = "<a class=\"nav-link\" href=\"delete\">Delete Account</a>";
} else {
  $user = "<a class=\"nav-link\" href=\"login\">Log in</a>";
  $log = "<a class=\"nav-link\" href=\"register\">Register</a>";
  $delete = "<a class=\"nav-link\" href=\"delete\"></a>";
}
//Llamada a la vista
require_once("views/landing_view.phtml");
?>

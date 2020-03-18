<?php
session_start();

require_once("db/db.php");
//Llamada al modelo
require_once("models/recver_model.php");

//security check that the verification elments are beling sent.
if (isset($_GET['username'])) {
  $username = base64_decode($_GET['username']);
} else {
  header("location:recovery");
  exit;
}


if (isset($_GET['challenge'])) {
  $ver_hash = $_GET['challenge'];
} else {
  header("location:recovery");
  exit;
}


//get the variable values quering the database
$ver_array = new validateuser();
$verification_array = $ver_array->get_hash($username);
$ver_hash1 = $verification_array['ver_hash'];
if (!($ver_hash1 == $ver_hash)) {
  header("location:resend_verification");
  exit;
}
$creation_date = $verification_array['creation_date'];


//Create a comparation time string
$date = date_create();
$this_date = date_timestamp_get($date);
$verification_date = date("Y-m-d H:i:s",$this_date);

$date = new DateTime($verification_date);
$date = $date->modify('-1 hour');
$check_date = $date->format('Y-m-d H:i:s');

//verifiying that the time is less than 1 hour before the registry
if ($creation_date >= $check_date) {
  $_SESSION['userver'] = $username;
  header("location:set_password");
} else {
  header("location:recovery");
  exit;
}
?>

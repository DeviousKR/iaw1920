<?php
session_start();
require_once("db/db.php");

if (isset($_SESSION['user'])) {
  $username = $_SESSION['user'];
} else {
  header("location:landing");
  exit;
}

require_once("models/delete_model.php");

if (isset($_POST['query'])) {
  $query = $_POST['query'];
  if ($_POST['query'] == "yes") {
    $delet_dis = new deleteacc();
    $result = $delet_dis->delete_account($username);
    header("location:logoff");
    exit;
  } else {
    header("location:landing");
    exit;
  }
}

require_once("views/delete_view.phtml");
?>

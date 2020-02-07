<?php
  session_start();
  unset($_SESSION);
  session_destroy();

  header ("location:P28_PRCS.php");
  exit;
 ?>

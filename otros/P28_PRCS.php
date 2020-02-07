<?php
    session_start();
if (empty($_SESSION)) {
  if (isset($_POST["name"]) && isset($_POST["sname"])
      && !empty($_POST["name"]) && !empty($_POST["sname"])) {
      $_SESSION["name"] = $_POST["name"];
      $_SESSION["sname"] = $_POST["sname"];
      $_SESSION["bcolor"] = $_POST["bcolor"];
      $_SESSION["fcolor"] = $_POST["fcolor"];
      $_SESSION["ftype"] = $_POST["ftype"];

  } else {
     header("location:P28_UPref.php");
     exit;
  }
}

if (isset($_SESSION["ftype"])) {
  switch ($_SESSION["ftype"]) {
  case 'helvetica':
      $font='"Trebuchet MS", Helvetica, sans-serif';
      break;
  case 'tnw':
      $font= '"Times New Roman", Times, serif';
      break;
  case 'arial':
      $font='Arial, Helvetica, sans-serif';
      break;
  }
}

foreach ($_SESSION as $key => $value) {
  echo "$key , $value <br>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>P28 Results!</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <style>
      body {
        background-color:<?=$_SESSION["bcolor"]?>;
        color:<?=$_SESSION["fcolor"]?>;
        font-family:<?=$font?>
      }
    </style>
  </head>
  <body>
    <br>
    <br>
    <br>
    <br>
  <div class="container">
    <div class="jumbotron text-center">
      <h1 class="display-3">User Preferences</h1>
      <p class="lead">Hi <?=$_SESSION["name"]?>  <?=$_SESSION["sname"]?> This page
        has the css style you've choosen.</p>
        <a href="P28_UDest.php" class="btn btn-danger">Remove the preferences</a>
        <a href="P28_UPref.php" class="btn btn-success">Back to the form</a>
        <a href="P28_PRCS.php" class="btn btn-primary">Refresh this page</a>
    </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/popper.js/dist/popper.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>

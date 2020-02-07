<?php

  $name = "ContadVisit";
  $value = 1;
  $expire = time() + 30;
  //$path = dirname($_SERVER['REQUEST_URI']);
  $value = isset($_COOKIE["ContadVisit"])? $_COOKIE["ContadVisit"] + 1 : 1;

  setcookie($name, $value, $expire);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Visit counter!</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">


  </head>
  <body>.
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-3">Hello! You've visited the page <?=$value?> times!</h1>
      <p class="lead">This counter resets if you don't visit the page within 30 seconds!</p>
    </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/popper.js/dist/popper.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>

<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Memory game</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <style>
      body {
        background-color: #000000;
        font-family:"Trebuchet MS", Helvetica, sans-serif'
      }
    </style>
  </head>
  <body>
   <div class="container">
     <div class="jumbotron mt-4 bg-secondary text-white text-center">
       <h1 class="display-3">Memory Game</h1>
       <p class="lead">Select the number of words you want to try and memorize in 5 seconds:(2-100)</p>
     <hr>
     <form action="P30_guess.php" method="GET" class="text-center bg-secondary text white">
       <input type="number" autofocus class="form-control text-center mb-4" name="dif">
       <button class="btn btn-info mt-5 mb-5" type="submit">Play!</button>
     </form>
     </div>
   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/popper.js/dist/popper.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>

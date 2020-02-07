<?php
/*we ensue that a difficulty has been set, at least the default one of 5 and that
the solution page has not been visited, if not the user is returned to the select
difficulty page*/
session_start();
$form = "";
if (!isset($_SESSION['dif']) || empty($_SESSION['dif'])) {
  header("location:index.php");
  exit;
}
/*we print out the formulary for the user to fill up the words the answers are
stored into the array ans*/
$dif = $_SESSION['dif'];
for ($i=0;$i<$dif;$i++) {
  $form = $form."<input type=\"text\" class=\"form-control mb-4\" name=\"ans[]\" placeholder=\"Insert your guess:\">";
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Memory Test</title>
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
       <h1 class="display-3">Now it's time to test your memory!</h1>
     <hr>
     <form action="P30_res.php" method="POST" class="text-center bg-secondary text white">
       <p>Insert your words one by one in the form below:</p>
         <?=$form?>
       <button class="btn btn-info mt-5 mb-5" type="submit">Results!</button>
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

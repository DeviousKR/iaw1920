<?php
  session_start();
  if (!empty($_SESSION)) {
    header ("location:P28_PRCS.php");
    exit;
  }
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>P28_UPref</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">


  </head>
  <body>
    <div class="container" style="margin-top:1vh">
      <div class="jumbotron text-center">
        <h1 class="display-4">Form user preferences</h1>
        <p class="h5 mb-5">Insert your preferences down below!</p>

        <form action="P28_PRCS.php" method="POST" class="text-center">
            <label for="select1">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Please introduce your name" id="select1">
            <br>
            <label for="select2">Surname:</label>
            <input type="text"  class="form-control" name="sname" placeholder="Please introduce your surname" id="select2">
            <br>
            <label for="select3">Background color:</label>
            <input type="color" class="form-control" name="bcolor" id="select3">
            <br>
            <label for="select4">Font color:</label>
            <input type="color" class="form-control" name="fcolor" value="#00008b" id="select4">
            <br>
            <label for="select5">Font type:</label>
            <select name="ftype" class="form-control" id="select5">
              <option value="helvetica">Helvetica</option>
              <option value="tnw">Times new roman</option>
              <option value="arial">Arial</option>
            </select>
            <br>
          <button class="btn btn-success btn-lg" type="submit">Save options</button>
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

<?php
session_start();
if (isset($_POST['prv']) && !empty($_POST['prv'])){
  $_SESSION['id_p'] = $_POST['prv'];
  $PRV_ID = $_POST['prv'];
} else {
  header("Location:database.php");
  exit;
}

$mysqli = new mysqli('localhost','root','root','geografia');

if ($mysqli->connect_errno){
  echo "Error connecting to the server, $mysqli->connect_errno : $mysqli->connect_error";
}

if (!$mysqli->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
    exit;
}

$sql = "SELECT id_localidad,nombre FROM localidades WHERE n_provincia = $PRV_ID";
$res = $mysqli->query($sql);
$data = $res->fetch_all(MYSQLI_ASSOC);
$dispQ = "";
foreach ($data as $row) {
				$dispQ = $dispQ."<option value={$row['id_localidad']}>{$row['nombre']}</option>";
		}

$mysqli->close();

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Population Analyzer</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">


  </head>
  <body>
    <div class="container" style="margin-top:1vh">
      <div class="jumbotron text-center">
        <h1 class="display-4">Select your desired location</h1>
        <p class="h5 mb-5">Use the desplegable below</p>

        <form action="display.php" method="POST" class="text-center">
            <label for="select5">Location:</label>
            <select name="loc" class="form-control" id="select5">
                <?=$dispQ?>
            </select>
            <br>
          <button class="btn btn-success btn-lg" type="submit">Procced!</button>
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

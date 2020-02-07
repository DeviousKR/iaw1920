<?php
session_start();
if (isset($_POST['loc']) && !empty($_POST['loc'])){
  $_SESSION['id_l'] = $_POST['loc'];
  $LOC_ID = $_POST['loc'];
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

$p_id = $_SESSION['id_p'];
$c_id = $_SESSION['id_c'];


$sql = "SELECT nombre,poblacion FROM localidades WHERE id_localidad=$LOC_ID";
$res = $mysqli->query($sql);
$data = $res->fetch_all(MYSQLI_ASSOC);
$dispQ = "";
foreach ($data as $row) {
				$dispQ = "{$row['nombre']} : HAB = {$row['poblacion']}";
		}


$sql = "SELECT nombre FROM provincias WHERE n_provincia = $p_id";
$res = $mysqli->query($sql);
$data = $res->fetch_all(MYSQLI_ASSOC);
$dispA = "";
foreach ($data as $row) {
    	$dispA = "{$row['nombre']} : ";
    	}


$sql = "SELECT nombre FROM comunidades WHERE id_comunidad = $c_id";
$res = $mysqli->query($sql);
$data = $res->fetch_all(MYSQLI_ASSOC);
$dispB = "";
      foreach ($data as $row) {
          	$dispB = "{$row['nombre']} : ";
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
        <p class="h5 mb-5">Your results:</p>
      </div>
      <div class="alert alert-dark text-center" role="alert"><?=$dispB?><?=$dispA?><?=$dispQ?></div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/popper.js/dist/popper.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>

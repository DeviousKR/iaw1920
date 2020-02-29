<?php
session_start();
require_once("db/db.php");

if (isset($_POST['lcd']) && !empty($_POST['lcd'])){
  $_SESSION['id_l'] = $_POST['lcd'];
  $lcd = $_POST['lcd'];
} else {
  header("Location:comunidades");
  exit;
}

$p_id = $_SESSION['id_p'];
$c_id = $_SESSION['id_c'];


//Llamada al modelo
require_once("models/display_model.php");
$geografia = new geografia();
$data=$geografia->get_display($lcd);
$dispQ = "";
foreach ($data as $pos => $row) {
					$dispQ = "{$row['nombre']} : {$row['poblacion']}";
			}

$data=$geografia->get_pvr($p_id);
$dispQ1 = "";
foreach ($data as $pos => $row) {
      	     $dispQ1 = $row['nombre'];
      }

$data=$geografia->get_com($c_id);
$dispQ2 = "";
foreach ($data as $pos => $row) {
              $dispQ2 = $row['nombre'];
      }

//Llamada a la vista
require_once("views/display_view.phtml");
?>

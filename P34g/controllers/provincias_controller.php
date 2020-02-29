<?php
session_start();
require_once("db/db.php");

if (isset($_POST['com']) && !empty($_POST['com'])){
  $_SESSION['id_c'] = $_POST['com'];
  $com = $_POST['com'];
} else {
  header("Location:comunidades");
  exit;
}
//Llamada al modelo
require_once("models/provincias_model.php");
$geografia = new geografia();
$data=$geografia->get_provincias($com);
$dispQ = "";
foreach ($data as $pos => $row) {
					$dispQ = $dispQ."<option value={$row['n_provincia']}>{$row['nombre']}</option>";
			}

//Llamada a la vista
require_once("views/provincias_view.phtml");
?>

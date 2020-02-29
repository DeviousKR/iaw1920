<?php
session_start();
require_once("db/db.php");

if (isset($_POST['prv']) && !empty($_POST['prv'])){
  $_SESSION['id_p'] = $_POST['prv'];
  $prv = $_POST['prv'];
} else {
  header("Location:comunidades");
  exit;
}
//Llamada al modelo
require_once("models/localidades_model.php");
$geografia = new geografia();
$data=$geografia->get_localidades($prv);
$dispQ = "";
foreach ($data as $pos => $row) {
					$dispQ = $dispQ."<option value={$row['id_localidad']}>{$row['nombre']}</option>";
			}

//Llamada a la vista
require_once("views/localidades_view.phtml");
?>

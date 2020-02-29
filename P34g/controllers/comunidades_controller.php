<?php
session_start();
require_once("db/db.php");
//Llamada al modelo
require_once("models/comunidades_model.php");
$geografia = new geografia();
$data=$geografia->get_comunidades();
$dispQ = "";
foreach ($data as $pos => $row) {
					$dispQ = $dispQ."<option value={$row['id_comunidad']}>{$row['nombre']}</option>";
			}

//Llamada a la vista
require_once("views/comunidades_view.phtml");
?>

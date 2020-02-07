<?php
//Llamada al modelo
require_once("models/personas_model.php");
$per=new personas_model();
$datos=$per->get_personas();

//Llamada a la vista
require_once("views/personas_view.phtml");
?>

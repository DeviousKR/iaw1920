<?php
/*require_once("db/db.php");
require_once("controllers/personas_controller.php");*/
define("BASE_URL","/iaw1920/P34g");

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case BASE_URL.'/':
    case BASE_URL.'' :
    case BASE_URL.'/comunidades' :
        require __DIR__ . '/controllers/comunidades_controller.php';
        break;
    case BASE_URL.'/provincias' :
      require __DIR__ . '/controllers/provincias_controller.php';
      break;
    case BASE_URL.'/localidades' :
      require __DIR__ . '/controllers/localidades_controller.php';
      break;
    case BASE_URL.'/display' :
      require __DIR__ . '/controllers/display_controller.php';
      break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}
?>

<?php
class Conectar{
    public static function conexion(){
        $mysqli=new mysqli("localhost", "root","root","test");
        $mysqli->set_charset("utf8");
        return $mysqli;
    }
}
?>

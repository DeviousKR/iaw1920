<?php
class Connect{
    public static function conexion(){
        $mysqli=new mysqli("localhost","root","root","accounts");
        $mysqli->set_charset("utf8");
        return $mysqli;
    }
}
?>

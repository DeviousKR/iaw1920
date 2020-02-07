<?php
class personas_model{
    private $db;
    private $personas;

    public function __construct(){
        $con = new Conectar();
        $this->db = $con::conexion();
    }
    public function get_personas(){
        $consulta=$this->db->query("select * from personas;");
        $this->personas = $consulta->fetch_all(MYSQLI_ASSOC);

        /*while($filas=$consulta->fetch_assoc()){
            $this->personas[]=$filas;
        }*/

        return $this->personas;
    }
}
?>

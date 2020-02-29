<?php
class geografia{
    private $db;
    private $comunidades;

    public function __construct(){
        $con = new Conectar();
        $this->db = $con::conexion();
    }
    public function get_comunidades(){
        $sql = "SELECT * FROM comunidades";
        $consulta=$this->db->query($sql);
        $comunidades = $consulta->fetch_all(MYSQLI_ASSOC);

    return $comunidades;
    }
}
?>

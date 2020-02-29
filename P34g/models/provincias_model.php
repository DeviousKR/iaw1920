<?php
class geografia{
    private $db;
    private $provincias;

    public function __construct(){
        $con = new Conectar();
        $this->db = $con::conexion();
    }
    public function get_provincias($id){
        $sql = "SELECT * FROM provincias WHERE id_comunidad = $id";
        $consulta=$this->db->query($sql);
        $provincias = $consulta->fetch_all(MYSQLI_ASSOC);

    return $provincias;
    }
}
?>

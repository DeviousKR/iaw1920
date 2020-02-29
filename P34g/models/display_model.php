<?php
class geografia{
    private $db;
    private $display;

    public function __construct(){
        $con = new Conectar();
        $this->db = $con::conexion();
    }
    public function get_display($id){
        $sql = "SELECT nombre,poblacion FROM localidades WHERE id_localidad = $id";
        $consulta=$this->db->query($sql);
        $display = $consulta->fetch_all(MYSQLI_ASSOC);

    return $display;
    }

    public function get_pvr($id){
        $sql = "SELECT nombre FROM provincias WHERE n_provincia = $id";
        $consulta=$this->db->query($sql);
        $display = $consulta->fetch_all(MYSQLI_ASSOC);

    return $display;
    }

    public function get_com($id){
        $sql = "SELECT nombre FROM comunidades WHERE id_comunidad = $id";
        $consulta=$this->db->query($sql);
        $display = $consulta->fetch_all(MYSQLI_ASSOC);

    return $display;
    }
}
?>

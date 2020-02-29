<?php
class geografia{
    private $db;
    private $localidades;

    public function __construct(){
        $con = new Conectar();
        $this->db = $con::conexion();
    }
    public function get_localidades($id){
        $sql = "SELECT id_localidad,nombre FROM localidades WHERE n_provincia = $id";
        $consulta=$this->db->query($sql);
        $localidades = $consulta->fetch_all(MYSQLI_ASSOC);

    return $localidades;
    }
}
?>

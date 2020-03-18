<?php
class getdata{
    private $db;

    public function __construct(){
        $con = new Connect();
        $this->db = $con->conexion();
    }
    public function get_data($user){
        $sql = "SELECT file_add FROM files WHERE username = '$user'";
        $query = $this->db->query($sql);
        if ($query) {
        $data = $query->fetch_all(MYSQLI_ASSOC);
        } else {
           $data = "";
        }
    return $data;
    }
}
?>

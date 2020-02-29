<?php
class validateuser{
    private $db;

    public function __construct(){
        $con = new Connect();
        $this->db = $con->conexion();
    }
    public function get_hash($user){
        $sql = "SELECT ver_hash,creation_date FROM users WHERE username='$user'";
        $query = $this->db->query($sql);
        $ver_array= $query->fetch_assoc();
        return $ver_array;
    }
    public function verifiy_user($user){
        $sql = "UPDATE users SET verification=1 WHERE username='$user'";
        $query = $this->db->query($sql);
        return $this->db->errno;
    }
}
?>

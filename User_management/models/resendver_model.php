<?php
class getuser{
    private $db;

    public function __construct(){
        $con = new Connect();
        $this->db = $con->conexion();
    }
    public function get_user($email){
        $sql = "SELECT username,pwd_hash,ver_hash FROM users WHERE mail='$email'";
        $query = $this->db->query($sql);
        $user = $query->fetch_assoc();
        return $user;
    }
}
?>

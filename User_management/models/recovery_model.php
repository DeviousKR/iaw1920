<?php
class getuser{
    private $db;

    public function __construct(){
        $con = new Connect();
        $this->db = $con->conexion();
    }
    public function get_user($email){
        $sql = "SELECT username,pwd_hash,ver_hash,verification FROM users WHERE mail='$email'";
        $query = $this->db->query($sql);
        $user = $query->fetch_assoc();
        return $user;
    }
    public function update_user($ver_hash,$email){
        $sql = "UPDATE users SET ver_hash = '$ver_hash' WHERE mail='$email'";
        $query = $this->db->query($sql);
        return $query;
    }
}
?>

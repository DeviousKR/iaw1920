<?php
class getuser{
    private $db;

    public function __construct(){
        $con = new Connect();
        $this->db = $con->conexion();
    }
    public function get_user($user){
        $sql = "SELECT username,pwd_hash,verification FROM users WHERE username = '$user'";
        $query = $this->db->query($sql);
        $dbuser = $query->fetch_all(MYSQLI_ASSOC);

    return $dbuser;
    }
}
?>

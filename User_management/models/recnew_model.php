<?php
class createuser{
    private $db;

    public function __construct(){
        $con = new Connect();
        $this->db = $con->conexion();
    }
    public function create_user($user,$pwd_hash,$email,$ver_hash,
    $creation_date){
        $sql = "INSERT INTO users(mail,username,pwd_hash,ver_hash,verification,
          creation_date)
        VALUES ('$email','$user','$pwd_hash','$ver_hash',FALSE,'$creation_date')";
        $query = $this->db->query($sql);
        return $this->db->errno;
    }
}
?>

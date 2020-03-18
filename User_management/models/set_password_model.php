<?php
class updatepwd{
    private $db;

    public function __construct(){
        $con = new Connect();
        $this->db = $con->conexion();
    }
    public function update_password($username,$pwd_hash){
      $sql = "UPDATE users SET pwd_hash = '$pwd_hash' WHERE username='$username'";
      $query = $this->db->query($sql);
      return $query;
    }
}

<?php
class deleteacc{
    private $db;

    public function __construct(){
        $con = new Connect();
        $this->db = $con->conexion();
    }
    public function delete_account($username){
      $sql = "DELETE FROM users WHERE username = '$username'";
      $query = $this->db->query($sql);
      return $query;
    }
}
?>

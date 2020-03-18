<?php
class uploadfile{
    private $db;

    public function __construct(){
        $con = new Connect();
        $this->db = $con->conexion();
    }
    public function upload_file($user,$basename){
        $address = 'uploads/'.$user.'/'.$basename;
        $sql = "INSERT INTO files(username,file_add)
        VALUES ('$user','$address')";
        $query = $this->db->query($sql);
        return $this->db->errno;
    }
}
?>

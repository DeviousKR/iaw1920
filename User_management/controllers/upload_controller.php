<?php
session_start();
require_once("db/db.php");
if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
} else {
  $res = "You need to be a logged in user to use this, log-in or register.";
  $_SESSION['res'] = $res;
  header("location:landing.php");
  exit;
}
$target_dir = "uploads/".$user;

$file_name = basename($_FILES["fileToUpload"]["name"]);

$target_file = $target_dir."/".$file_name;

$uploadOk = 1;

if (!file_exists($target_dir)) {
   mkdir($target_dir, 0770, true);
}

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $res = "File is not an image.";
        $_SESSION['res'] = $res;
        header("location:landing.php");
        exit;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    $res = "Sorry, file already exists.";
    $uploadOk = 0;
    $_SESSION['res'] = $res;
    header("location:landing.php");
    exit;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $res = "Sorry, your file is too large.";
    $uploadOk = 0;
    $_SESSION['res'] = $res;
    header("location:landing.php");
    exit;
}

// Allow certain file formats
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $res = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    $_SESSION['res'] = $res;
    header("location:landing.php");
    exit;
}

require_once("models/upload_model.php");
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $res = "Sorry, your file was not uploaded.";
    $_SESSION['res'] = $res;
    header("location:landing.php");
    exit;
// if everything is ok, try to upload file
} elseif (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $res = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    $new_file = new uploadfile();
    $error = $new_file->upload_file($user,basename( $_FILES["fileToUpload"]["name"]));
    $_SESSION['res'] = $res;
    header("location:landing.php");
    exit;
} else {
    $res = "Sorry, there was an error uploading your file.";
    $_SESSION['res'] = $res;
    header("location:landing.php");
    exit;
}

?>

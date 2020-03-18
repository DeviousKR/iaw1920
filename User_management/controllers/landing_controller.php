<?php
session_start();
require_once("db/db.php");
$res = "";
$gallery = "";
if (isset($_SESSION['res'])) {
  $res = $_SESSION['res'];
  unset($_SESSION['res']);
}
require_once("models/landing_model.php");
if (isset($_SESSION['user'])) {
  $username = $_SESSION['user'];
  $user = "<a class=\"nav-link\" href=\"\">$username</a>";
  $log = "<a class=\"nav-link\" href=\"logoff\">Log off</a>";
  $delete = "<a class=\"nav-link\" href=\"delete\">Delete Account</a>";

  $addresses = new getdata();
  $add = $addresses->get_data($username);
  foreach ($add as $key => $a_array) {
    $address = $a_array['file_add'];
    $gallery = $gallery."<div class=\"col-lg-3 col-md-4 col-xs-6 thumb\">
        <img  src=$address class=\"zoom img-fluid \"  alt=\"\">
        </div>";
  }
} else {
  $user = "<a class=\"nav-link\" href=\"login\">Log in</a>";
  $log = "<a class=\"nav-link\" href=\"register\">Register</a>";
  $delete = "<a class=\"nav-link\" href=\"delete\"></a>";
  $gallery =
  "<div class=\"col-lg-3 col-md-4 col-xs-6 thumb\">
      <img  src=\"https://i.ytimg.com/vi/wCZ5TJCBWMg/maxresdefault.jpg\" class=\"zoom img-fluid \"  alt=\"\">
    </div>
    <div class=\"col-lg-3 col-md-4 col-xs-6 thumb\">
      <img  src=\"https://cdn0.tnwcdn.com/wp-content/blogs.dir/1/files/2018/04/CGWd8yk-796x398.jpg\" class=\"zoom img-fluid\"  alt=\"\">
    </div>
    <div class=\"col-lg-3 col-md-4 col-xs-6 thumb\">
      <img  src=\"https://hackernoon.com/drafts/q141s3xfs.png\" class=\"zoom img-fluid \" alt=\"\">
    </div>
    <div class=\"col-lg-3 col-md-4 col-xs-6 thumb\">
      <img  src=\"https://cdn.freebiesupply.com/logos/thumbs/2x/java-logo.png\" class=\"zoom img-fluid \"  alt=\"\">
    </div>
    <div class=\"col-lg-3 col-md-4 col-xs-6 thumb\">
      <img  src=\"https://engineering.fb.com/wp-content/uploads/2015/06/1522635669452_11.jpg\" class=\"zoom img-fluid \"  alt=\"\">
    </div>
    <div class=\"col-lg-3 col-md-4 col-xs-6 thumb\">
      <img  src=\"https://cdn.lynda.com/course/139988/139988-637021525148800194-16x9.jpg\" class=\"zoom img-fluid \"  alt=\"\">
    </div>";
}
//Llamada a la vista
require_once("views/landing_view.phtml");
?>

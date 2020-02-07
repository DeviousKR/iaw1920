<?php
  $time = time();
  $dateFormat = date('Y-m-d H:i:s',$time);
  $param = "";
  $title = "Cookie";
  $text = "";

if (isset($_GET["param"])&&(!empty($_GET["param"]))) {
  $select = $_GET["param"];
  if ($select == "read" && isset($_COOKIE["VisitTime"])) {
    $title = "Cookie VisitTime";
    $text = "Cookie VisitTime has the value ".$_COOKIE["VisitTime"];
  } elseif ($select == "set") {
    $name = "VisitTime";
    $value = $dateFormat;
    $expire = time() + 300;

    setcookie($name,$value,$expire);

    $title = "Cookie $name";
    $text = "Cookie $name has been set. Next time you read the cookie it will
    have the value $value.";
  } elseif ($select == "delete" && isset($_COOKIE["VisitTime"])) {
    $name = "VisitTime";
    $value = false;
    $expire = time() + 300;

    setcookie($name,$value,$expire);

    $title = "Cookie $name";
    $text = "Cokkie $name has been deleted. Next time you read the cookie it will
    be empty.";
  } else {
    $title = "The cookie does not exist!";
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cookie Practice</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <div class="jumbotron text-center mt-5">
        <h1 class="display-3"> <?=$title?> </h1>
        <hr>
        <p class="h3 m-4"><?=$text?></p>
        <p class="lead">
          <form action="Cookie_practice.php" method="GET" class="text-center">
            <button type="submit" class="btn btn-primary" name="param" value="read">Read the Cookie</button>
            <button type="submit" class="btn btn-success" name="param" value="set">Set the Cookie</button>
            <button type="submit" class="btn btn-danger" name="param" value="delete">Delete the Cookie</button>
          </form>
        </p>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/popper.js/dist/popper.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>

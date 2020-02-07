<?php
$rmail = "";
$wmail = "";
$val = "";
$holder = "";
if (isset($_POST['Email']) && !(empty($_POST['Email']))) {
    $holder = $_POST['Email'];
  if (preg_match('/^[^@ ]+@[A-Za-z0-9]+\.[A-Za-z0-9.]+$/',$_POST['Email'])) {
    $rmail = "Your mail is valid and is: ".$_POST['Email'];
    $val = "is-valid";
  } else {
    $wmail = "Sorry that mail is not valid";
    $val = "is-invalid";
  }
}
?>
<!doctype html>
<html lang="en">



<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

  <title>Email checker</title>
</head>

<body>
  <div class="container" style="margin-top:1vh">
    <div class="jumbotron text-center">
      <h1 class="display-4">Email checker</h1>
    </div>
  </div>
  <div class="container">
    <div class="jumbotron">
      <form action="P23_E-checker.php" method="POST" class="text-center" action="#!">
        <p class="h4 mb-4"><h3>Insert your email!</h3></p>
          Email:<br>
          <input class="form-control <?=$val?>" type="text" name="Email" value="<?=$holder?>" placeholder="Your email here">
          <p class="text-center text-danger font-weight-bold mt-2"><?=$wmail?><p>
          <p class="text-center text-success font-weight-bold"><?=$rmail?><p>
          <br>
          <br>
        <button class="btn btn-success btn-lg" type="submit">Submit your email!</button>
      </form>
    </div>
  </div>
  <!-- Default form subscription -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/popper.js/dist/popper.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>

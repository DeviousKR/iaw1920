<?php
$email[] = "abcedfg";
$email[] = "mmoratorres@alumnat.iessacolomina.es";
$email[] = "antonio_23@gmail.com";
$email[] = "megustan123@tomates";
$email[] = "LLamando al ascensor & Esperando";
$email[] = "roberto.salinas@hotmail.com";
$email[] = "Lorem ipsum dolor sie amet";
$email[] = "se_sale_hoy?@live.barcelona";
$email[] = "Me estoy quedando sin ideas";
$email[] = "sheri_blossom@telefonica.net";

function emailCheck($email_array) {
  $checked_emails = [];
  foreach ($email_array as $value) {
    if (preg_match('/^[^@ ]+@[A-Za-z0-9]+\.[A-Za-z0-9.]+$/',$value)) {
      $checked_emails[$value] = "true";
    } else {
      $checked_emails[$value] = "false";
    }
  }
  return $checked_emails;
}



function genTable($array_table) {
		$rows = "";
		foreach ($array_table as $key => $value) {
				$rows = $rows."<tr class=\"text-center\">
                        <td>$key</td><td>$value</td>
                      </tr>";
		}
    $table = "<table class=\"table table-bordered table-dark table-striped table-hover\">
                <thead>
                  <tr class=\"text-center\">
                    <th>String</th>
                    <th>Validation</th>
                  </tr>
                </thead>
                <tbody>
                    $rows
                </tbody>
              </table>";
		return $table;
};
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Email Validator </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <div class="jumbotron mt-4 text-center">
        <h1 class="display-3">Your list of emails</h1>
        <p class="lead">The emails will be checked for their vailidity</p>
      </div>
    </div>
    <div class="container table-responsive">
      <?php $checked_emails = emailCheck($email); echo genTable($checked_emails)?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/popper.js/dist/popper.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>

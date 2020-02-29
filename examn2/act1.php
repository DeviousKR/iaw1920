<?php

function arrayToTable($numbers){
    $rows = "";
    $keys = "";
    foreach ($numbers as $key => $value) {
        $keys = $keys."<th class=\"text-center\">
                        $key
                      </th>";
        $rows = $rows."<th class=\"text-center\">
                    $value
                    </th>";
    }
    $table = "<table class=\"table table-bordered table-dark table-striped table-hover\">
                <thead>
                  <tr class=\"text-center\">
                    $keys
                  </tr>
                </thead>
                <tbody>
                  <tr class=\"text-center\">
                    $rows
                  </tr>
                </tbody>
              </table>";
    return $table;
  };

$array = [];
$array[] = 3;
$array[] = 5;
$array[] = 8;
$array[] = 31;
$array[] = 22;
$array[] = 11;
$array[] = 7;
$array[] = 9;
$table = arrayToTable($array);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">


  </head>
  <body>
    <div class="container">
      <div class="jumbotron mt-4 text-center">
        <h1 class="display-3">Your list of numbers</h1>
      </div>
    </div>
    <div class="container table-responsive">
      <?=$table?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/popper.js/dist/popper.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>

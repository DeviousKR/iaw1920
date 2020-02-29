<?php
function addPairs($array) {
  $init = "";
  $Oarray = [];
  foreach ($array as $key => $number) {
    if ($key == 0) {
      $init = $number;
      $Oarray[0] = $number;
    } else {
      if ($init == $number) {
        $before = $key-1;
        $Oarray[$before] = $Oarray[$before]*2;
        $Oarray[$key] = 0;
        $init = 0;
      } else {
        $init = $number;
        $Oarray[$key] = $number;
      }
    }
  }
  return $Oarray;
}

function MoveLeft($numbers) {
  $count = 0;
  $checkarray = [];
  for ($i=0; $i < count($numbers); $i++) {
    if ($numbers[$i] == 0) {
      $value = 0;
      while ($value == 0) {
        $value = $numbers[$i+1];
        $count++;
      }
      $i++;
      $Onumbers[] = $value;
    } else {
      $Onumbers[] = $numbers[$i];
    }
  }
  for ($i=0; $i < $count ; $i++) {
      $Onumbers[] = 0;
  }
  return $Onumbers;
}

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
$array[] = 2;
$array[] = 0;
$array[] = 4;
$array[] = 0;
$array[] = 2;
$array[] = 0;
$array[] = 4;
$array[] = 4;
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
      <?=arrayToTable($array)?>
      <?=arrayToTable(addPairs($array))?>
      <?=arrayToTable(MoveLeft($array))?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/popper.js/dist/popper.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>























 ?>

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

$array = [];
$array[] = 2;
$array[] = 2;
$array[] = 4;
$array[] = 4;
$array[] = 2;
$array[] = 4;
$array[] = 0;
$array[] = 0;

$Oarray = addPairs($array);
print_r($Oarray);


?>

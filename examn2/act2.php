<?php

function equalsArrays($array1,$array2) {
  $equal = true;
  foreach ($array1 as $key => $value) {
    $value2 = $array2[$key];
    if (!($value === $value2)) {
      $equal = false;
      break;
    }
  }
  return $equal;
}
$array = [];
$array[] = 3;
$array[] = 5;
$array[] = 8;
$array[] = 31;
$array[] = 22;
$array[] = 11;
$array[] = 7;
$array[] = 9;


$array2 = [];
$array2[] = 3;
$array2[] = 5;
$array2[] = 8;
$array2[] = 31;
$array2[] = 22;
$array2[] = 11;
$array2[] = 7;
$array2[] = 9;

$equal = equalsArrays($array,$array2);
echo $equal;
?>

<?php
function addPairs($array) {
  $init = "";
  $Oarray = [];
  foreach ($array as $key => $number) {
    if ($key == 0) {
      $init = $number;
      $Oarray[0] = $number;
    } else {
      if (($init == $number) AND ($number != 0)) {
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
  for ($i=0; $i < count($numbers); $i++) {
    while (($numbers[$i] == 0) && $i < count($numbers)-1) {
      $i++;
      $count++;
      }
    $Onumbers[] = $numbers[$i];
    }
  for ($i=0; $i < $count ; $i++) {
      $Onumbers[] = 0;
  }
  return $Onumbers;
}

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
$array[] = 4;
$array[] = 4;
$array[] = 4;
$array[] = 0;
$array[] = 4;
$array[] = 0;
$array[] = 4;
$array[] = 0;


$count = [];
$count[] = 0;
$count[] = 0;
$count[] = 0;
$count[] = 0;
$count[] = 0;
$count[] = 0;
$count[] = 0;
$count[] = 0;

function optimize($array,$count) {
  while (!(equalsArrays($array,$count))) {
    $count = $array;
    $array = addPairs(MoveLeft($array));
  }
  return $array;
}

$res = optimize($array,$count);
print_r($res);
?>

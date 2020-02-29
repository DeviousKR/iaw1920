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

function optimize_array($array) {
  for ($i=0; $i < count($array); $i++) {
    $array = MoveLeft(addpairs($array));
  }
  return $array;
}

?>

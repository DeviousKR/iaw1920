<?php
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


$array = [];
$array[] = 0;
$array[] = 0;
$array[] = 0;
$array[] = 2;
$array[] = 0;
$array[] = 0;
$array[] = 2;
$array[] = 0;

$count = MoveLeft($array);
print_r($count);








?>

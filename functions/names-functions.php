<?php

function dd($value) {
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  exit();
}

function array_most_common($array) {
  $counted = array_count_values($array);
  arsort($counted);
  $top_ten = array_slice($counted, 0, 9);
  return ($top_ten);        
}

function load_full_names($fileName) {
  $lineNumber = 0;


  $FH = fopen("$fileName", "r");
  $nextName = fgets($FH);

  while(!feof($FH)) {
    if($lineNumber % 2 == 0) {
      $fullNames[] = trim(substr($nextName, 0, strpos($nextName, " --")));
    }

    $lineNumber++;
    $nextName = fgets($FH);
  }
  return $fullNames;
}

function load_first_names($fullNames) {
  foreach($fullNames as $fullName) {
    $startHere = strpos($fullName, ",") + 1;
    $firstNames[] = trim(substr($fullName, $startHere));
  }
  return $firstNames;
}

function load_last_names($fullNames) {
  foreach($fullNames as $fullName) {
    $stopHere = strpos($fullName, ",");
    $lastNames[] = substr($fullName, 0, $stopHere);
  }
  return $lastNames;
}
?>
<?php

function dd($value) {
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  exit();
}

function array_most_common($array)
{
    $counted = array_count_values($array);
    arsort($counted);
    $top_ten = array_slice($counted, 0, 9);
    return ($top_ten);        

}

?>
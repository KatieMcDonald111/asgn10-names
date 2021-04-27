<?php
include 'functions/utility-functions.php';
$fileName = 'names-short-list.txt';

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

// first names

foreach($fullNames as $fullName) {
  $startHere = strpos($fullName, ",") + 1;
  $firstNames[] = trim(substr($fullName, $startHere));
}

// last names

foreach($fullNames as $fullName) {
  $stopHere = strpos($fullName, ",");
  $lastNames[] = substr($fullName, 0, $stopHere);
}

// valid names

for($i = 0; $i < sizeof($fullNames); $i++) {
  if(ctype_alpha($lastNames[$i].$firstNames[$i])) {
    $validFirstNames[$i] = $firstNames[$i];
    $validLastNames[$i] = $lastNames[$i];
    $validFullNames[$i] = $validLastNames[$i] . "," . $validFirstNames[$i];
  }
}

// display

echo '<h1>Names - Results</h1>';

echo '<h2>All Names</h2>';
echo "<p>There are " . sizeof($fullNames) . " total names</p>";
echo '<ul>';
  foreach($fullNames as $fullName) {
    echo "<li>$fullName</li>";
  }
echo "</ul>";

echo '<h2>All Valid Names</h2>';
echo "<p>There are " . sizeof($fullValidNames) . " valid names</p>";
echo '<ul>';
  foreach($validFullNames as $validFullName) {
    echo "<li>$validFullName</li>";
  }
echo "</ul>";

echo '<h2>Unique Names</h2>';
$uniqueValidNames = (array_unique($validFullNames));
echo "<p>There are " . sizeof($uniqueValidNames) . " unique names</p>";
echo '<ul>';
  foreach($uniqueValidNames as $uniqueValidNames) {
    echo "<li>$uniqueValidName</li>";
  }
echo "</ul>";

?>
<?php
include 'functions/names-functions.php';
$fileName = 'names-short-list.txt';
$fullNames = load_full_names($fileName);

$firstNames = load_first_names($fullNames);
$lastNames = load_last_names($fullNames);



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
echo "<p>There are " . sizeof($validFullNames) . " valid names</p>";
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
  echo "<li>$uniqueValidNames</li>";
}
echo "</ul>";

echo '<h2>Unique Last Names</h2>';
$uniqueLastNames = (array_unique($validLastNames));
echo "<p>There are " . sizeof($uniqueLastNames) . " unique last names</p>";
echo '<ul>';
foreach($uniqueLastNames as $uniqueLastNames) {
  echo "<li>$uniqueLastNames</li>";
}
echo "</ul>";

echo '<h2>Unique First Names</h2>';
$uniqueFirstNames = (array_unique($validFirstNames));
echo "<p>There are " . sizeof($uniqueFirstNames) . " unique first names</p>";
echo '<ul>';
foreach($uniqueFirstNames as $uniqueFirstNames) {
  echo "<li>$uniqueFirstNames</li>";
}
echo "</ul>";

echo '<h2>10 Most Common First Names</h2>';
$commonFirstNames = array_most_common($validFirstNames);
echo "<p>Here are the 10 most common first names</p>";
echo '<ul>';
foreach($commonFirstNames as $i => $i) {
  echo "<li>$i</li>";
}
echo "</ul>";

echo '<h2>10 Most Common Last Names</h2>';
$commonLastNames = array_most_common($validLastNames);
echo "<p>Here are the 10 most common last names</p>";
echo '<ul>';
foreach($commonLastNames as $i => $i) {
  echo "<li>$i</li>";
}
echo "</ul>";

echo '<h2>25 Specially Unique Names</h2>';
$specialNames = array_unique($validFullNames);
$counted = array_count_values($specialNames);
arsort($counted);
$specialNames = array_slice($counted, 0, 25);
echo "Here are 25 specially unique names</p>";
echo '<ul>';
foreach($specialNames as $i => $i) {
  echo "<li>$i</li>";
}
echo "</ul>";

echo '<h2>25 Modified Unique Names</h2>';
$modifiedNames = array_unique($validFullNames);
shuffle($modifiedNames);
$counted = array_count_values($modifiedNames);
arsort($counted);
$modifiedNames = array_slice($counted, 0, 25);
echo "<p>Here are 25 modified unique names</p>";
echo '<ul>';
foreach($modifiedNames as $i => $i) {
  echo "<li>$i</li>";
}
echo "</ul>";

?>
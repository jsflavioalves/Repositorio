<?php

$file = fopen('testenestedjson.csv', 'r');
$header = fgetcsv($file);
array_shift($header);
$data = array();

while ($row = fgetcsv($file))
{
  $key = array_shift($row);
  $data[$key] = array_combine($header, $row);
}

echo json_encode($data);
fclose($file);
?>
<?php

$file = fopen('webaulas.csv', 'r');
$header = fgetcsv($file);
array_shift($header);
$data = array();


$i=1;
while ($row = fgetcsv($file))
{
  //$key = array_shift($row);
  // verifica se a chave já está no array dos indíces
  //if($indice[$contInd]==$key){}
  
  //$data[$key][$i] = array_combine($header, $row);
  //$i=$i+1;
  $data[$row["data"]][] = array("tipo" => $row["tipo"], "dtparti" => $row["tipo"]);
 }

//echo json_encode($data);
$output_arr = array();
foreach($data as $key=>$value){
$output_arr[]=array("data"=>$key,"random"=>$value);
}
echo json_encode($output_arr);
fclose($file);
?>
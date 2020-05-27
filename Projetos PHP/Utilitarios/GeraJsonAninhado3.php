<?php

$file = fopen('webaulas2.csv', 'r');
$header = fgetcsv($file);
$data = array();

//array_shift($header);
//$data = array(array());


$i=1;
//while ($row = fgetcsv($file))
//{
  //$key = array_shift($row);
  // verifica se a chave já está no array dos indíces
  //if($indice[$contInd]==$key){}
  
  //$data[$key][$i] = array_combine($header, $row);
  //$i=$i+1;
//}

//echo json_encode($data);
while ($row = fgetcsv($file))
{
 // foreach($header as $key=>$value){
    //	$data[$header[$key]]=array_combine($header, $row);
    $data[$i]=array_combine($header, $row);
    $i=$i+1;
  // }
 }



$json= json_encode($data);
//echo $json->{"tipo"};
echo $json;
 

fclose($file);
?>
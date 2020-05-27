<?php
 $mydata = array();

 if($file = fopen("testenestedjson.csv","r")){
   $csvheaders = fgetcsv($file);
   while(($row = fgetcsv($file)) !== FALSE){
     $arr = array();
     for($i=1; $i<count($csvheaders); $i++){
      $arr[$csvheaders[$i]] = $row[$i];
     } 
     $mydata[$row[0]] = $arr;
    }
  fclose($file);
  // encode $mydata array into json to get result in the required format
  $mydatainformat = json_encode($mydata);
  echo $mydatainformat; // This is your output.
 }
?>
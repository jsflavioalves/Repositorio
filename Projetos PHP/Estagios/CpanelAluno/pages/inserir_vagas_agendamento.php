<?php
require ('conn.php');
mysql_select_db('estagios');

$meses = array(
      '1' => '01',
      '2' => '02',
      '3' => '03',
      '4' => '04',
      '5' => '05',
      '6' => '06',
      '7' => '07',
      '8' => '08',
      '9' => '09',
      '10' => '10',
      '11' => '11',
      '12' => '12'
   );
$dias = array(
      '1' => '01',
      '2' => '02',
      '3' => '03',
      '4' => '04',
      '5' => '05',
      '6' => '06',
      '7' => '07',
      '8' => '08',
      '9' => '09',
      '10' => '10',
      '11' => '11',
      '12' => '12',
      '13' => '13',
      '14' => '14',
      '15' => '15',
      '16' => '16',
      '17' => '17',
      '18' => '18',
      '19' => '19',
      '20' => '20',
      '21' => '21',
      '22' => '22',
      '23' => '23',
      '24' => '24',
      '25' => '25',
      '26' => '26',
      '27' => '27',
      '28' => '28',
      '29' => '29',
      '30' => '30',
      '31' => '31'
   );

$horas = array(
      '1' => '08:00',
      '2' => '08:20',
      '3' => '08:40',
      '4' => '09:00',
      '5' => '09:20',
      '6' => '09:40',
      '7' => '10:00',
      '8' => '10:20',
      '9' => '10:40',
      '10' => '11:00',
      '11' => '11:20',
      '12' => '11:40',
      '13' => '12:00',
      '14' => '12:20',
      '15' => '12:40',
      '16' => '13:00',
      '17' => '13:20',
      '18' => '13:40',
      '19' => '14:00',
      '20' => '14:20',
      '21' => '14:40',
      '22' => '15:00',
      '23' => '15:20',
      '24' => '15:40',
      '25' => '16:00',
      '26' => '16:20',
      '27' => '16:40',
      '28' => '17:00'
   );

$ano = date('Y');

      for($x = 1; $x <= 28; $x++){
            for($y = 1; $y <= 31; $y++){
                  $a = $dias[$y];
                  $c = $horas[$x];
                  $inserir = mysql_query("INSERT INTO vagas_agendamento2 VALUES('', '$a', '01', '$ano', '$c', '3') ");
            }
	}
		          
?>
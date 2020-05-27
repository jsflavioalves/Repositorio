<?php
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data = '18/01/2017';

$data = DateTime::createFromFormat('d/m/Y', $data);
$data->add(new DateInterval('P5Y')); // 5 ANOS
echo $data->format('d/m/Y');
?>
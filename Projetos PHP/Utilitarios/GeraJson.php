<?php
 
// Atribui o conteúdo do arquivo para variável $arquivo
$arquivo = file_get_contents('atividades_teleeducacao_05_2019.json');
 
// Decodifica o formato JSON e retorna um Objeto
$json = json_decode($arquivo);
 
// Loop para percorrer o Objeto
$tipo_ant= '';
$dtdispo_ant = '';
$cargah_ant ='';
$id_ant ='';
$decs_ant ='';
 
foreach($json->atividades_teleeducacao as $registro):
   	if($registro->tipo<> $tipo_ant) echo '<br>'.'"tipo": ' . $registro->tipo . ',<br>'. '"participacoes_teleeducacao": ['.'<br>';
    echo ' {"dtparti": ' . $registro->dtparti . ',<br>'.' "satisf": ' . $registro->satisf . ',<br>'. '"cbo": ' . $registro->cbo .  ',<br>'.'"cnes": ' . $registro->cnes . ',<br>'. '"cpf": ' . $registro->cpf .' },<br>';
    if($dtdispo_ant<>$registro->dtdispo and $dtdispo_ant<>'' ) echo '],<br>'.'"dtdispo": ' . $registro->dtdispo . ',<br>';
    if($cargah_ant<>$registro->cargah and $cargah_ant <>'') echo '"cargah": ' . $registro->cargah . ',<br>';
    if($id_ant<>$registro->id and $id_ant<>'') echo '"id": ' . $registro->id . ',<br>';
    if($decs_ant<>$registro->decs and $decs_ant<> '') echo '"decs": ' . $registro->decs . '<br>'. ']<br>';
    $tipo_ant = $registro->tipo;
    $dtdispo_ant = $registro->dtdispo;
    $cargah_ant = $registro->cargah;
    $id_ant = $registro->id;
    $decs_ant = $registro->decs;
echo $tipo_ant;
endforeach;
?>

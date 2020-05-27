<?php
function getLAIS(&$obj, $cpf){
    $url = 'https://barramento.lais.huol.ufrn.br/api/v2/profissionais/'.$cpf;
    $ch = curl_init('https://barramento.lais.huol.ufrn.br/api/v2/profissionais/'.$cpf);
    
    $header = array(	"Accept:application/json",
        "Content-Type:application/json; charset=utf-8",
        "Authorization: Token fd72c110b87d8fbacb45609dfc90eb447e16220b"
    );
  
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
  
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  
    curl_setopt($ch, CURLOPT_URL, $url);
  
    $resp = curl_exec($ch);
    
    $error = false;
    if($resp === false){
        $error = curl_error($ch);
    }
    echo "ERRO".$error;
    curl_close($ch);
    
    if($error){
        $obj = null;
        return 0;
    }
    else{
        $data = json_decode($resp);
        echo "resposta".$data;
        if(@property_exists($data, 'errors') || !@$data || !@$data[0]){
            $obj = null;
            return 0;
        }
        
        $obj = $data[0];
        return 1;
    }
}
function getSUS(&$obj, $send, $phase = 0) {
    $url = 'http://cnes.datasus.gov.br/services/profissionais?cpf=' . $send;
    if($phase == 1) {
        $url = 'http://cnes.datasus.gov.br/services/profissionais/' . $send;
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    $resp = curl_exec($ch);
    $error = false;
    if($resp === false){
        $error = curl_error($ch);
    }
    if($resp === true){ echo "RESPOSTA VERD".$resp;}
    echo "ERRO".$error;
    $temp = json_decode($resp, true);
    if($temp != null) {
        $obj = $temp;
        return 1;
    }
    else {
        $obj = null;
        return 0;
    }
}
$cpf = '28542304349';

if(getSus($obj, $cpf)){
   $obj 			= $obj[0];
   $form 			= array();
   $form['type']	= 'sus';
   $form['id'] 	= $obj['id'];
   $form['cpf']	= $cpf;
   $form['nome'] 	= $obj['nome'];
   $form['cns'] 	= $obj['cns'];
   $form['cbo'] 	= $obj['cbo'];
   $form['cnes'] 	= $obj['cnes'];
   echo "CNES:". $form['cnes'];
  }
    else {
        echo "nÃO ENCONTREI";
    }
?>    

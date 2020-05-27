<?php

header('Content-Type: text/html; charset=utf-8');
require('classes/integra.class.php');

$URL = 'http://localhost:8000/';
//$URL = 'http://smartteste.telessaude.ufrn.br/';
//$URL = 'http://smart.telessaude.ufrn.br/';
$integra = new Integra('9723f53168b7cafbc4c9d7a95b3233fff366aad1');

$JSON = '{
  "mes_referencia":"022015",
  "codigo_nucleo":"0000010",
  "teleconsultorias":[
    {
      "canal":"1",
      "dtresp":"03/08/2015 17:10:34",
      "stipo":"01",
      "inenc":"0",
      "tipo":"A",
      "evenc":"1",
      "satisf":1,
      "rduvida":1,
      "scbo":"3222",
      "psof":"0",
      "dtsol":"30/07/2015 14:31:57",
      "scpf":"93779860449",
      "scnes":"2409690",
      "ciaps":[
        "D82"
      ]
    },
    {
      "canal":"1",
      "dtresp":"03/08/2015 17:17:42",
      "stipo":"01",
      "inenc":"0",
      "tipo":"A",
      "evenc":"0",
      "satisf":"0",
      "rduvida":"0",
      "scbo":"5151",
      "psof":"0",
      "dtsol":"30/07/2015 14:32:26",
      "scpf":"21816911852",
      "scnes":"5385806",
      "ciaps":[
        "D82"
      ]
    },
    {
      "canal":"1",
      "dtresp":"03/08/2015 18:44:19",
      "stipo":"01",
      "inenc":"0",
      "tipo":"A",
      "evenc":"0",
      "satisf":"0",
      "rduvida":"0",
      "scbo":"2235",
      "psof":"0",
      "dtsol":"30/07/2015 16:31:45",
      "scpf":"03318976440",
      "scnes":"5550815",
      "ciaps":[
        "T63"
      ]
    },
    {
      "canal":"1",
      "dtresp":"04/08/2015 14:48:10",
      "stipo":"01",
      "inenc":"0",
      "tipo":"A",
      "evenc":"0",
      "satisf":"0",
      "rduvida":"0",
      "scbo":"2251",
      "psof":"0",
      "dtsol":"04/08/2015 14:47:21",
      "scpf":"01413987877",
      "scnes":"4014111",
      "cids":[
        "V88"
      ],
      "ciaps":[
        "T90"
      ]
    },
    {
      "canal":"1",
      "dtresp":"04/08/2015 14:52:08",
      "stipo":"01",
      "inenc":"0",
      "tipo":"A",
      "evenc":"0",
      "satisf":"0",
      "rduvida":"0",
      "scbo":"2251",
      "psof":"0",
      "dtsol":"31/07/2015 14:52:04",
      "scpf":"01413987877",
      "scnes":"4014111",
      "cids":[
        "Y590"
      ],
      "ciaps":[
        "D44"
      ]
    },
    {
      "canal":"1",
      "dtresp":"30/04/2015 13:00:54",
      "stipo":"4",
      "inenc":"0",
      "tipo":"A",
      "evenc":"0",
      "satisf":"0",
      "rduvida":"0",
      "scbo":"5151",
      "psof":"0",
      "dtsol":"01/10/2014 09:20:20",
      "scpf":"04163252460",
      "scnes":"2665611",
      "sine":"0000107743"
    },
    {
      "canal":"1",
      "dtresp":"05/08/2015 14:51:27",
      "stipo":"01",
      "inenc":"0",
      "tipo":"A",
      "evenc":"0",
      "satisf":"0",
      "rduvida":"0",
      "scbo":"5151",
      "psof":"0",
      "dtsol":"30/07/2015 14:15:51",
      "scpf":"06439342436",
      "scnes":"2409704",
      "ciaps":[
        "L44"
      ]
    },
    {
      "canal":"1",
      "dtresp":"30/04/2015 13:00:53",
      "stipo":"01",
      "inenc":"0",
      "tipo":"A",
      "evenc":"0",
      "satisf":"0",
      "rduvida":"0",
      "scbo":"2235",
      "psof":"0",
      "dtsol":"30/07/2014 10:33:37",
      "scpf":"03559927447",
      "scnes":"2410516"
    },
    {
      "canal":"1",
      "dtresp":"30/04/2015 13:00:53",
      "stipo":"4",
      "inenc":"0",
      "tipo":"A",
      "evenc":"0",
      "satisf":"0",
      "rduvida":"0",
      "scbo":"5151",
      "psof":"0",
      "dtsol":"04/09/2014 10:08:23",
      "scpf":"02603685473",
      "scnes":"2501988",
      "sine":"0000111961"
    },
    {
      "canal":"1",
      "dtresp":"30/04/2015 13:00:53",
      "stipo":"01",
      "inenc":"0",
      "tipo":"A",
      "evenc":"0",
      "satisf":"0",
      "rduvida":"0",
      "scbo":"2235",
      "psof":"0",
      "dtsol":"04/09/2014 14:54:45",
      "scpf":"22828257304",
      "scnes":"2503603"
    }
  ]
}
';
$respostaN1 = $integra->enviarDados(TipoDeDados::JSON, $URL."api/v2/teleconsultorias/?format=json", $JSON);

echo '<h1>.: Resposta do Servidor - Indicadores :.</h1>';
echo $respostaN1;

?>

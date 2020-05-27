<?php


$blacklist = [];

function createNewArrayCPFS($cpfs) {
	global $blacklist;
	$newsCPFS = array();
	for($i=0;$i<count($cpfs);$i++) {
		if(validaCPF($cpfs[$i])) {
			if(!in_array($cpfs[$i], $blacklist)) {
				$newsCPFS[] = $cpfs[$i];
			} 
		}
	}
	return $newsCPFS;
}

function validaCPF($cpf = null) {
 
    // Verifica se um número foi informado
    if(empty($cpf)) {
        return false;
    }
 
    // Elimina possivel mascara
    $cpf = @ereg_replace('[^0-9]', '', $cpf);
    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
     
    // Verifica se o numero de digitos informados é igual a 11 
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica se nenhuma das sequências invalidas abaixo 
    // foi digitada. Caso afirmativo, retorna falso
    else if ($cpf == '00000000000' || 
        $cpf == '11111111111' || 
        $cpf == '22222222222' || 
        $cpf == '33333333333' || 
        $cpf == '44444444444' || 
        $cpf == '55555555555' || 
        $cpf == '66666666666' || 
        $cpf == '77777777777' || 
        $cpf == '88888888888' || 
        $cpf == '99999999999') {
        return false;
     // Calcula os digitos verificadores para verificar se o
     // CPF é válido
     } else {   
         
        for ($t = 9; $t < 11; $t++) {
             
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
 
        return true;
    }
}

function maskInep($inep) {
    $len = strlen($inep);
    if($len < 7){
	    $calc = 7 - $len;
	    $inep = str_repeat('0', $calc).$inep;	
    }
    return $inep;
}




header("Content-Type: text/html; charset=utf-8");
require("classes/integra.class.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);
set_time_limit(0);
require_once('../includes/frameworkajax.php');


$mes_envio = "092018";
$curso = new TeleeducacaoCurso("0000088", $mes_envio);
$atividade = new TeleeducacaoAtividade("0000088", $mes_envio);
$profissionalTeleconsultorias = new ProfissionalSaude("0000088", $mes_envio);



//
$cpfsm = createNewArrayCPFS(['25753513832',
'67013023353',
'45343284353',
'05922195697',
'00350798354',
'65916506368',
'07465073480',
'01663924309',
'75898659234',
'32251725881',
'06095785456',
'02347516302',
'03959978367',
'08594195176',
'48493481300',
'31932398368',
'04254190379',
'02937340709',
'97873217191',
'77355822349',
'08098871185',
'00362854556',
'04201834425',
'03178861777',
'64185770359',
'08220753188',
'74505050378',
'32301995453',
'11871660300',
'19265198842',
'02815403307',
'04817544317',
'07946310617',
'05978299420',
'04594856365',
'72302046315',
'93080700368',
'08354293424',
'00731490398',
'46205640368',
'96514515568',
'05026317677',
'02689357348',
'95968105453',
'03569865940',
'03610215771',
'26763884877',
'08323784450',
'46391037353',
'07947877114',
'39834344368',
'41373804300',
'02906243396',
'52695930925',
'06788160694',
'13118242434',
'80272045349',
'04217485913',
'66071445353',
'05861983429',
'08425893410',
'08208173177',
'07403411463',
'64275450353',
'09039334463',
'08589444139',
'01724985701',
'00580339203',
'92905897368',
'04369082714',
'21461244404',
'00456089381',
'00184982219',
'17158516334',
'94714797620',
'01758482117',
'34743553253',
'65616847372',
'40616159803',
'60003978362',
'90167333968',
'04323983417',
'64594343520',
'03225012378',
'01056224436',
'50904418987',
'02838073427',
'01873386559',
'02868705332',
'57741573268',
'06755103926',
'51513773100',
'67105742372',
'69649693300',
'04016635403',
'94739145049',
'27177914854',
'96571683091',
'79576834368',
'08588955105']);
$cpfsc = createNewArrayCPFS(['08594195176',
'31932398368',
'52695930925',
'06755103926',
'69649693300',
'96571683091']);
$cpfsr = createNewArrayCPFS(['08220753188']);
$cpfse = createNewArrayCPFS(['25753513832',
'67013023353',
'45343284353',
'05922195697',
'00350798354',
'65916506368',
'07465073480',
'01663924309',
'75898659234',
'32251725881',
'06095785456',
'02347516302',
'03959978367',
'48493481300',
'04254190379',
'02937340709',
'97873217191',
'77355822349',
'08098871185',
'00362854556',
'04201834425',
'03178861777',
'64185770359',
'74505050378',
'32301995453',
'11871660300',
'19265198842',
'02815403307',
'04817544317',
'07946310617',
'05978299420',
'04594856365',
'72302046315',
'93080700368',
'08354293424',
'00731490398',
'46205640368',
'96514515568',
'05026317677',
'02689357348',
'95968105453',
'03569865940',
'03610215771',
'26763884877',
'08323784450',
'46391037353',
'07947877114',
'39834344368',
'41373804300',
'02906243396',
'06788160694',
'13118242434',
'80272045349',
'04217485913',
'66071445353',
'05861983429',
'08425893410',
'08208173177',
'07403411463',
'64275450353',
'09039334463',
'08589444139',
'01724985701',
'00580339203',
'92905897368',
'04369082714',
'21461244404',
'00456089381',
'00184982219',
'17158516334',
'94714797620',
'01758482117',
'34743553253',
'65616847372',
'40616159803',
'60003978362',
'90167333968',
'04323983417',
'64594343520',
'03225012378',
'01056224436',
'50904418987',
'02838073427',
'01873386559',
'02868705332',
'57741573268',
'51513773100',
'67105742372',
'04016635403',
'94739145049',
'27177914854',
'79576834368',
'08588955105']);
$codigo 	            = 'EAD2018B';
$datai 					= "01/09/2018 08:00:00";
$dataf 					= "30/09/2018 00:00:00";
$vagas                  = 150; //Número de vagas ofertadas
$chhoraria 			    = 1200; //Carga horaria do curso - Número em minutos
$tema        			= "I02.195"; //Tema do curso
$curso->addCurso($codigo, $datai, $dataf, $vagas, $tema, $chhoraria, 
$cpfsm,     //matriculados
$cpfsc,     //concluintes
$cpfse,     //evadidos
$cpfsr);    //reprovados
$atividade->addAtividade($codigo, $datai, $chhoraria, TipoAtividade::CURSO, $tema);
for($i=0;$i<count($cpfsm);$i++) {
	$sql = "select 	itp.nome, itp.codigo_cbo, itp.estabelecimento_codigo_cnes, coalesce(itp.equipe_codigo_ine, 'null') as equipe_codigo_ine, tu.fl_sexo
from integracao.tb_profissional as itp 
inner join tb_profissional tp on(itp.cpf=replace(replace(tp.nr_cpf, '.', ''), '-', ''))
inner join tb_usuario tu on(tp.ci_profissional=tu.ci_usuario)
where itp.cpf = '" . $cpfsm[$i] . "'";	
	$q = query($sql)->fetch();
	if($q['codigo_cbo'] != '' || $q['estabelecimento_codigo_cnes'] != '') {
		$atividade->addParticipacaoAtividade($codigo, $datai, $cpfsm[$i], 
		$q['codigo_cbo'], maskInep($q['estabelecimento_codigo_cnes']), null, GrauSatisfacao::SATISFEITO);  	
		$fl_sexo = "M";
		if($q['fl_sexo'] == '2'){
			$fl_sexo = "F";
		}
		$profissionalTeleconsultorias->addProfissionalSaude(null, $cpfsm[$i], $q['nome'], maskInep($q['estabelecimento_codigo_cnes']), $q['codigo_cbo'], null, "02", $fl_sexo);
	}
}





////////////////////////////////////////////////////////////////
//INTEGRA
$url = 'http://smart.telessaude.ufrn.br/';
$integra = new Integra("ad9c2aa3622033fc9d79703fde22a4e892641221");





////////////////////////////////////////////////////////////////
echo "<br/><br/><fieldset><legend>Teleconsultoria - Profissionais de Saúde</legend>";
$dados_profissionalTeleconsultorias = Integra::serializar(TipoDeDados::JSON, $profissionalTeleconsultorias);
echo "<h3>.: Dados Serializados - Profissional de Saúde :.</h3>";
echo $dados_profissionalTeleconsultorias;
//$resposta_profissional = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/profissionais-saude/?format=json", $dados_profissionalTeleconsultorias);
echo "<h3>.: Resposta do Servidor - Profissional de Saúde :.</h3>";
//echo $resposta_profissional;
echo "</fieldset>";



echo "<br/><br/><fieldset><legend>Cursos</legend>";
$dados_serializados_curso = Integra::serializar(TipoDeDados::JSON, $curso);
echo "<h3>.: Dados Serializados - Curso :.</h3>";
echo $dados_serializados_curso;
//$resposta_curso = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/cursos-teleeducacao/?format=json", $dados_serializados_curso);
echo "<h3>.: Resposta do Servidor - Curso :.</h3>";
//echo $resposta_curso;
echo "</fieldset>";




echo "<br/><br/><fieldset><legend>Atividades de Tele-educação</legend>";
$dados_serializados_atividade = Integra::serializar(TipoDeDados::JSON, $atividade);
echo "<h3>.: Dados Serializados - Atividades de Tele-educação :.</h3>";
echo $dados_serializados_atividade;
$resposta_atividade = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/atividades-teleeducacao/?format=json", $dados_serializados_atividade);
echo "<h3>.: Resposta do Servidor - Atividades de Tele-educação :.</h3>";
echo $resposta_atividade;
echo "</fieldset>";



?>
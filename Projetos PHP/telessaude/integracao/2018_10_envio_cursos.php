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


$mes_envio = "102018";
$curso = new TeleeducacaoCurso("0000088", $mes_envio);
$atividade = new TeleeducacaoAtividade("0000088", $mes_envio);
$profissionalTeleconsultorias = new ProfissionalSaude("0000088", $mes_envio);



//
$cpfsm = createNewArrayCPFS(['03339018600',
'03288771403',
'00785681299',
'05739793670',
'83633537368',
'66807034253',
'93918615200',
'06941422394',
'92605400387',
'74240900204',
'03132638331',
'20524684391',
'02503512429',
'92782876520',
'54934923349',
'01019407344',
'98768026315',
'00102742510',
'06986968400',
'04413867416',
'89638255234',
'07517271482',
'50878956204',
'51048795268',
'02100804502',
'06966308420',
'04554032361',
'83886877353',
'01681032309',
'74056247315',
'05024731425',
'01921316489',
'03459972475',
'04877776460',
'00841070300',
'06061690673',
'79930360387',
'49763555191',
'45997810291',
'68795467220',
'06200958220',
'04475047463',
'63499380382',
'65781333215',
'88583759391',
'05931475532',
'49495038391',
'93678681468',
'62751310206',
'58945474315',
'30100216315',
'01820414256',
'60786361204',
'88623807553',
'00902219588',
'01034220489',
'81527446387',
'04620126462',
'00677423357',
'73768073300',
'00023547561',
'01560258250',
'03470475482',
'76709396304',
'36855162304',
'26187094115',
'78888905472',
'23185643372',
'02626375373',
'05169646313',
'00157218503',
'05699181466',
'74817752300',
'38458934353',
'20951892304',
'02212410514',
'01963450302',
'01245710265',
'57712824215',
'68197870306',
'75985195287',
'50787004200',
'07516174661',
'07256536470',
'66977649291',
'14303752304',
'00394641566',
'06178043384',
'59896450900',
'88216454104',
'70784825300',
'02622787316',
'76777324453',
'01055832190',
'95072730344',
'94761973234',
'79750761200',
'03955103412',
'01880166275',
'92563198534',
'00667995200',
'09490939471',
'09439774444',
'02091946427',
'44561687300',
'04817673478',
'07853772637',
'84199296204',
'68773854204',
'01860101178',
'09653020676',
'21802487840',
'71058532200',
'06790503455',
'87114429304',
'90306775387',
'76571521334',
'83353380272',
'60402669371',
'10387436642',
'38058154253',
'72426683287',
'42877822249',
'85982270300',
'13920248627',
'11642639605',
'56015917253',
'85769231300',
'08489983402',
'90471431591',
'69981159387',
'53355300306',
'91706289472',
'85966959315',
'91977770304',
'26573377320',
'05026057314',
'89970268368',
'66071445353',
'05042147640',
'05713025489',
'75234610349',
'64281086315',
'17087368249',
'78292581200',
'78552834200',
'80305946315',
'48274917553',
'00117792250',
'02134180455',
'73327700320',
'85843393100',
'03517215414',
'00195239202',
'01628786302',
'05677501328',
'01482517302',
'03511463424',
'00527511552',
'07582139488',
'71459693272',
'88391280349',
'61567353215',
'46331859268',
'03566123412',
'98154982404',
'98662708315',
'00754313352',
'02224826567',
'69928894272',
'74745646291',
'31410766349',
'49056735268',
'45392676200',
'63838540204',
'28166086204',
'89663284315',
'85601438234',
'40224457500',
'73322644200',
'64620280410',
'81438885253',
'04787068393',
'04697394445',
'58081585320',
'12673484612',
'03389753494',
'02474994475',
'72820055249',
'02361616106',
'76903478353',
'07178659327',
'63231590230',
'35727020204',
'58723048204',
'04981824440',
'41014103304',
'06322134698']);
$cpfsc = createNewArrayCPFS(['03288771403',
'74240900204',
'20524684391',
'98768026315',
'89638255234',
'83886877353',
'00677423357',
'00023547561',
'02626375373',
'01245710265',
'14303752304',
'02622787316',
'76777324453',
'04817673478',
'71058532200',
'26573377320',
'05026057314',
'05042147640',
'75234610349',
'00195239202',
'02224826567',
'28166086204',
'89663284315',
'85601438234',
'73322644200',
'07178659327']);
$cpfsr = createNewArrayCPFS(['50878956204',
'73768073300',
'09439774444',
'00754313352']);
$cpfse = createNewArrayCPFS([]);
$codigo 	            = 'CCMACS2018A';
$datai 					= "08/10/2018 08:00:00";
$dataf 					= "31/10/2018 00:00:00";
$vagas                  = 250; //Número de vagas ofertadas
$chhoraria 			    = 2400; //Carga horaria do curso - Número em minutos
$tema        			= "C04.588.180"; //Tema do curso
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





//
$cpfsm = createNewArrayCPFS(['25753513832',
'92782876520',
'04554032361',
'03536550401',
'79930360387',
'45997810291',
'82297452349',
'46827650359',
'99347199591',
'88623807553',
'04620126462',
'04201834425',
'01569122440',
'02626375373',
'74505050378',
'03015942441',
'09469661419',
'71613471149',
'92635636320',
'07156918486',
'23502509387',
'08909337400',
'02091946427',
'03297759445',
'21802487840',
'71058532200',
'98861280382',
'01022802313',
'05216683364',
'91767490453',
'72610867468',
'39834344368',
'31201006848',
'52525511387',
'26573377320',
'82142017134',
'05026057314',
'66071445353',
'05861983429',
'02534612433',
'48274917553',
'04048137476',
'02033910393',
'06114302311',
'04697484606',
'72700858115',
'03033428460',
'07178659327']);
$cpfsc = createNewArrayCPFS(['25753513832',
'02626375373',
'07178659327']);
$cpfsr = createNewArrayCPFS(['05216683364',
'52525511387']);
$cpfse = createNewArrayCPFS([]);
$codigo 	            = 'WD22018C';
$datai 					= "08/10/2018 08:00:00";
$dataf 					= "31/10/2018 00:00:00";
$vagas                  = 150; //Número de vagas ofertadas
$chhoraria 			    = 2400; //Carga horaria do curso - Número em minutos
$tema        			= "C04.588.180"; //Tema do curso
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
$resposta_profissional = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/profissionais-saude/?format=json", $dados_profissionalTeleconsultorias);
echo "<h3>.: Resposta do Servidor - Profissional de Saúde :.</h3>";
echo $resposta_profissional;
echo "</fieldset>";



echo "<br/><br/><fieldset><legend>Cursos</legend>";
$dados_serializados_curso = Integra::serializar(TipoDeDados::JSON, $curso);
echo "<h3>.: Dados Serializados - Curso :.</h3>";
echo $dados_serializados_curso;
$resposta_curso = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/cursos-teleeducacao/?format=json", $dados_serializados_curso);
echo "<h3>.: Resposta do Servidor - Curso :.</h3>";
echo $resposta_curso;
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
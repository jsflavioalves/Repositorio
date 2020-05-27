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




/*header("Content-Type: text/html; charset=utf-8");
require("classes/integra.class.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);
set_time_limit(0);*/


header("Content-Type: text/html; charset=utf-8");
require("classes/integra.class.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);
set_time_limit(0);
require_once('../includes/frameworkajax.php');



/*$profissionalTeleconsultorias = new ProfissionalSaude("0000088", "012018");
$cpfs = ["61514594315", "78806054368", "53227301334", "00122518365", "36904880368",
"83079882172", "85257249634", "30860490220", "01907607536", "91306922372", "11812773706", "00287308600", "02375223144", "24814305818", "90527569453", "01727601009", "00808351044", "00668996560", "07622391662", "71544992220", "04507018676", "05151431110", "03891450508", "99450437491", "82757950010", "00828207593", "10161177794", "02026611726", "01259282031", "03130129111", "82168482004", "56545401220", "03598011458", "10774827602", "04647967417", "01394992106", "05221551705", "01466643102", "04291718110", "02688427105", "65902300304", "02763119492", "02529402450", "23965444204", "02879998581", "00794656501", "09689236407", "36067741253", "01007406003", "00264591593", "02362669505", "78525314234", "39791319049", "89814193534", "35737913015", "03085713123", "84277017568", "52728170282", "09063223676", "80629083215", "01165691159", "01873617038", "04875949405", "07763173696", "93778260120", "01941431046", "04110096995", "97961078053", "84161639287", "00700939113", "06745241447", "00602057175", "04064762681", "00515995118", "10478026609", "92669573053", "02175332560", "02544614099", "77013042234", "28312104100", "10558825613", "80756930197", "25791993811", "57309116615", "04995931465", "77746716172", "60170921204", "04530920550", "06897848646", "71166556034", "00965311180", "83196439100", "02542356114", "00464871581", "05418256580", "02232020100", "00830760423", "64120309134", "05726453840", "75608928504", "73442666104", "50889427615", "02802828690", "03916213199", "00776125079", "06520627410", "91300550082", "86515407521", "54444519134", "00271375205", "01085282198", "02386866556", "03867274142", "01108082408", "86410830149", "04016635403", "21409528049", "67220541600", "75218526304", "04244096663", "03883998133", "02424593400",
"04454649332", 
"69876150120", "00480670080", "08667015679", "03597383467", "64986128353", "11293510688", "04333857660", "06656152481", "56954778168", "92635636320", "03731975351", "06673027436", "02247220509", "38486778816", "22386459349", "86216643215", "31932398368", "93795327253", "25860844387", "62501038215", "71615660100", "90339452234", "04552098551", "05244299875", "03761493100", "08832906694", "02749964130", "01850080119", "01553200683", "06246712673", "95917500053", "25875841320", "76892743315", "31694748472", "02342517513", "52994929104", "38898594372", "85310824391", "30686049829", "01137161337", "00296946125", "30999146300", "01001288319", "01554774551", "10389023639", "01908475579", "60511362749",
"76905810304", "89579461368", "72547880300", "05396381370", "65854187353", "76426459372", "87290650387", "00710366361", "92949185304", "37727885304", "49162462334", "44358539300", "75414503320", "61962180344", "95535888320", "04861610486", "70841136300", "70570140315", "42064554653", "71498915353", "78162939334", "01164474359", "46352090320", "00365736392", "74530410315", "61610100387", "01491042354", "84181060349", "46958525353", "02214894365", "02271382360", "24757993315", "53173619315", "50023292334", "89883128304", "78655277304", "01661149367", "02752072341", "04806754307", "03613477319", "67233309353", "65662113300", "22882588372", "03491535310", "79867316304", "84269464372", "05903446337", "04310984339", "95981632372", "30015669300", "02607064341", "45606110334", "02364434378", "01554434378", "60051875381", "00538913339", "23028050382", "04038782336", "23196629368", "61756989320", "73591262315", "00551726369"];
for($i=0;$i<count($cpfs);$i++) {
	$sql = "select 	itp.nome, itp.codigo_cbo, itp.estabelecimento_codigo_cnes, coalesce(itp.equipe_codigo_ine, 'null') as equipe_codigo_ine, tu.fl_sexo
from integracao.tb_profissional as itp 
inner join tb_profissional tp on(itp.cpf=replace(replace(tp.nr_cpf, '.', ''), '-', ''))
inner join tb_usuario tu on(tp.ci_profissional=tu.ci_usuario)
where itp.cpf = '" . $cpfs[$i] . "'
";	
	$q = query($sql)->fetch();
	if($q['codigo_cbo'] != '' || $q['estabelecimento_codigo_cnes'] != '') {
		$fl_sexo = "M";
		if($q['fl_sexo'] == '2'){
			$fl_sexo = "F";
		}
		
		$cnes = $q['estabelecimento_codigo_cnes'];
		if(strlen($cnes) == 4){
			$cnes = '000'.$cnes;
		}
		if(strlen($cnes) == 5){
			$cnes = '00'.$cnes;
		}
		
		$profissionalTeleconsultorias->addProfissionalSaude(null, $cpfs[$i], $q['nome'], $cnes, $q['codigo_cbo'], null, "02", $fl_sexo);
	}
}*/


/*
Código de identificação 
Data/hora de início do curso
Data/hora de término do curso
Número de vagas ofertadas
Tema do curso
Carga horaria do curso - Número em minutos
Alunos matriculados	(opcional) Lista de CPFs separados por vírgula dos alunos matriculados	Em um primeiro momento, o SMART recebe apenas os dados do curso para cadastro, depois poderá receber a lista de CPFs
Alunos formados	(opcional) Lista de CPFs separados por vírgula dos alunos formados	Quando o curso tiver sido encerrado, poderá enviar os dados do curso com a lista de formados
Alunos evadidos	(opcional) Lista de CPFs separados por vírgula dos alunos evadidos	Quando o curso tiver sido encerrado, poderá enviar os dados do curso com a lista de evadidos
Alunos reprovados	(opcional) Lista de CPFs separados por vírgula dos alunos reprovados	Quando o curso tiver sido encerrado, poderá enviar os dados do curso com a lista de reprovados
*/



$curso = new TeleeducacaoCurso("0000088", "042018");
$curso->addCurso("CDPAB2018CEDRO", "01/04/2018 00:00:00", "30/04/2018 00:00:00", "120", "C25.775", "1200", 
//matriculados
createNewArrayCPFS(['76658619387',
'24505463320',
'26384957353',
'42558352334',
'24505706320',
'60547106300',
'76869180334',
'72497521387',
'49600419353',
'29213764820',
'60451525302',
'00287645363',
'96615583372',
'89102916304',
'53212282304',
'69755078304',
'36106992304',
'30770238300',
'85994294349',
'00394366328',
'69278938300',
'76663469304',
'76922553349',
'76658686300',
'85081256315',
'01812728301',
'24585807349',
'66290538349',
'89352947304',
'04826652380',
'03624044370',
'87270951349',
'54135133304',
'03808655305',
'15167480850',
'05269311321',
'72437405372',
'76664228300',
'22965645349',
'52010805372',
'83112383320',
'76695336334',
'00581866380',
'23394110334',
'88048110300',
'32551843391',
'60452524385',
'26385267890',
'32024738320',
'01939797306']), 
//concluintes
createNewArrayCPFS(['76658619387',
'49600419353',
'03808655305',
'00581866380']), 
//evadidos
createNewArrayCPFS(['24505463320',
'26384957353',
'42558352334',
'24505706320',
'60547106300',
'76869180334',
'72497521387',
'29213764820',
'60451525302',
'00287645363',
'96615583372',
'89102916304',
'53212282304',
'69755078304',
'36106992304',
'30770238300',
'85994294349',
'00394366328',
'69278938300',
'76663469304',
'76922553349',
'76658686300',
'85081256315',
'01812728301',
'24585807349',
'66290538349',
'89352947304',
'04826652380',
'03624044370',
'87270951349',
'54135133304',
'15167480850',
'05269311321',
'72437405372',
'76664228300',
'22965645349',
'52010805372',
'83112383320',
'76695336334',
'23394110334',
'88048110300',
'32551843391',
'60452524385',
'26385267890',
'32024738320',
'01939797306']), 
//reprovados
createNewArrayCPFS([]));








////////////////////////////////////////////////////////////////
//INTEGRA
$url = 'http://smart.telessaude.ufrn.br/';
$integra = new Integra("ad9c2aa3622033fc9d79703fde22a4e892641221");



/*echo "<br/><br/><fieldset><legend>Teleconsultoria - Profissionais de Saúde</legend>";
$dados_profissionalTeleconsultorias = Integra::serializar(TipoDeDados::JSON, $profissionalTeleconsultorias);
echo "<h3>.: Dados Serializados - Profissional de Saúde :.</h3>";
echo $dados_profissionalTeleconsultorias;
$resposta_profissional = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/profissionais-saude/?format=json", $dados_profissionalTeleconsultorias);
echo "<h3>.: Resposta do Servidor - Profissional de Saúde :.</h3>";
echo $resposta_profissional;
echo "</fieldset>";
*/

////////////////////////////////////////////////////////////////
//1 - Cursos

echo "<br/><br/><fieldset><legend>Cursos</legend>";
$dados_serializados_curso = Integra::serializar(TipoDeDados::JSON, $curso);
echo "<h3>.: Dados Serializados - Curso :.</h3>";
echo $dados_serializados_curso;
$resposta_curso = $integra->enviarDados(TipoDeDados::JSON, $url."api/v2/cursos-teleeducacao/?format=json", $dados_serializados_curso);
echo "<h3>.: Resposta do Servidor - Curso :.</h3>";
echo $resposta_curso;
echo "</fieldset>";





?>
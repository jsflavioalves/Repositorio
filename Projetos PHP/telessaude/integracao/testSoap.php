<?php 

	echo "<pre>";
	
	$url = 'http://cnes.datasus.gov.br/services/profissionais?cpf=83516328304';
	$url1 = 'http://cnes.datasus.gov.br/services/profissionais/7035C74DBDFCC30321C4D03F118D2E06406B77C41FF3D4B6E7EF48DC5F767ED2';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept:application/json","Content-Type:text/plain; charset=utf-8" ));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	curl_setopt($ch, CURLOPT_URL, $url);
	
	$resp = curl_exec($ch);		
	$obj1 = json_decode($resp);	
	print_r($obj1);
	
	
	curl_setopt($ch, CURLOPT_URL, $url1);
	$resp = curl_exec($ch);		
	$obj1 = json_decode($resp);	
	print_r($obj1);
	
	
	
	
	curl_close($ch);
	
		
		
		
		
	

	exit;
	
	//http://cnes.datasus.gov.br/services/profissionais/7035C74DBDFCC30321C4D03F118D2E06406B77C41FF3D4B6E7EF48DC5F767ED2
	//http://cnes.datasus.gov.br/services/profissionais?cpf=83516328304

	/*
	$apiauth =array('UserName'=>'abcusername','Password'=>'xyzpassword','UserCode'=>'1991');
	$wsdl = 'http://sitename.com/service.asmx?WSDL';
	$header = new SoapHeader('http://tempuri.org/', 'AuthHeader', $apiauth);
	$soap = new SoapClient($wsdl); 
	$soap->__setSoapHeaders($header);       
	$data = $soap->methodname($header);  
	
	<soap:Header>
		<AuthHeader xmlns="http://tempuri.org/">
		  <UserName>abcusername</UserName>
		  <Password>xyzpassword</Password>
		  <UserCode>1991</UserCode>
		</AuthHeader>
	</soap:Header>
	
	<soap:Header>
		<wsse:Security soap:mustUnderstand="true" xmlns:wsse="http://docs.oasisopen.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd"
			xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">		
			<wsse:UsernameToken wsu:Id="UsernameToken-5FCA58BED9F27C406E14576381084652">				
				<wsse:Username>CNES.PUBLICO</wsse:Username>
				<wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wssusername-token-profile-1.0#PasswordText">cnes#2015public</wsse:Password>			
			</wsse:UsernameToken>			
		</wsse:Security>
	</soap:Header>

	
	*/
	
	
	echo "<pre>";
	
	$xmlAuth = '<soap:Header>
		<wsse:Security soap:mustUnderstand="true" xmlns:wsse="http://docs.oasisopen.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd"
			xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">		
			<wsse:UsernameToken wsu:Id="UsernameToken-5FCA58BED9F27C406E14576381084652">				
				<wsse:Username>CNES.PUBLICO</wsse:Username>
				<wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wssusername-token-profile-1.0#PasswordText">cnes#2015public</wsse:Password>			
			</wsse:UsernameToken>			
		</wsse:Security>
	</soap:Header>';
	
	$header = new SoapHeader('http://docs.oasisopen.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd', 'Security', new SoapVar($xmlAuth, XSD_ANYXML));

	$options = array( 
                'soap_version'=>SOAP_1_2, 
                'exceptions'=>true, 
                'trace'=>1, 
                'cache_wsdl'=>WSDL_CACHE_NONE 
            );
	
    $soap = new SoapClient("https://servicos.saude.gov.br/cnes/VinculacaoProfissionalService/v1r0?wsdl", $options); 
	$soap->__setSoapHeaders($header);
	
	
	/*print_r($soap->__getFunctions());
	
	$types = $soap->__getTypes();
	foreach ($types as $type) {
		$type = preg_replace(
			array('/(\w+) ([a-zA-Z0-9]+)/', '/\n /'),
			array('<font color="green">${1}</font> <font color="blue">${2}</font>', "\n\t"),
			$type
		);
		echo $type;
		echo "\n\n";
	}*/
	
	/*
	Array
	(
		[0] => ResponseVinculacaos pesquisarVinculacaoProfissionalSaude(RequestVinculacaos $RequestVinculacaos)
		[1] => ResponseVinculacao detalharVinculacaoProfissionalSaude(RequestVinculacao $RequestVinculacao)
		[2] => ResponseVinculacaos pesquisarVinculacaoProfissionalSaude(RequestVinculacaos $RequestVinculacaos)
		[3] => ResponseVinculacao detalharVinculacaoProfissionalSaude(RequestVinculacao $RequestVinculacao)
	)
	*/
	
	
	
	class NumeroCNSType {
		function NumeroCNSType( $numeroCNS )
		{
			
			$this->numeroCNS = $numeroCNS;
			
		}
	}
	
	class CodigoCNESType {
		function CodigoCNESType ( $codigo )
		{
			$this->codigo = $codigo;			
		}
		
	}
	
	class CPFType {
		function CPFType( $numeroCPF )
		{
			
			$this->numeroCPF = $numeroCPF;
			
		}
	}
	
	class ProfissionalVinculacaoType {
		function ProfissionalVinculacaoType(
				CPFType $cpf ) 
		{
		
			$this->cpf = $cpf;
			
		
		}
	}
	
	class EstabelecimentoVinculacaoType {
		function EstabelecimentoVinculacaoType(
				CodigoCNESType $cnes ) 
		{
		
			$this->cnes = $cnes;
			
		
		}
	}
	
	class TipoVinculacaoType {
		function TipoVinculacaoType ( $tipoVinculacao )
		{
			$this->tipoVinculacao = $tipoVinculacao;
		}
	}
	
	class FiltroPesquisaVinculacaoType {
		function FiltroPesquisaVinculacaoType(
					ProfissionalVinculacaoType $IdentificacaoProfissional, 
					EstabelecimentoVinculacaoType $IdentificacaoEstabelecimento,
					TipoVinculacaoType $IdentificacaoVinculacao) 
		{
			
			$this->IdentificacaoProfissional = $IdentificacaoProfissional;
			$this->IdentificacaoEstabelecimento = $IdentificacaoEstabelecimento;			
			$this->IdentificacaoVinculacao = $IdentificacaoVinculacao;
			
		}
	}
	
	class RequestVinculacao {
		function RequestVinculacao( FiltroPesquisaVinculacaoType $FiltroPesquisaVinculacao ) 
		{
		
			$this->FiltroPesquisaVinculacao = $FiltroPesquisaVinculacao;
			
		}
	}
	
	/*
	struct RequestVinculacao {
		FiltroPesquisaVinculacaoType FiltroPesquisaVinculacao;
	}
	struct FiltroPesquisaVinculacaoType {
		ProfissionalVinculacaoType IdentificacaoProfissional;
		EstabelecimentoVinculacaoType IdentificacaoEstabelecimento;
		TipoVinculacaoType IdentificacaoVinculacao;
	}
	struct ProfissionalVinculacaoType {
		CPFType cpf;
		NumeroCNSType cns;
	}
	struct CPFType {
		numeroCPF numeroCPF; //string
	}	
	struct NumeroCNSType {
		numeroCNS numeroCNS; //string
	}
	struct TipoVinculacaoType {
		tipoVinculacao tipoVinculacao; //string
	}		
	*/
	
	$param = new RequestVinculacao(
		new FiltroPesquisaVinculacaoType(
			
			new ProfissionalVinculacaoType(
				new CPFType('02034935322')
			),
			
			new EstabelecimentoVinculacaoType(
				new CodigoCNESType('2530031')
			),
			
			new TipoVinculacaoType(
				''
			)
			
		)
	);
	
	try{
		$obj = $soap->detalharVinculacaoProfissionalSaude($param);
	}catch (SoapFault $e){
		echo 'erooooooooooo';
		print_r($soap);
	}
	
	//print_r($soap->__getLastRequest());
	
	//print_r($obj);
	
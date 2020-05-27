<?php
/**
 * Tipos e status da teleconsulta
 * @package br.ufc.nuteds
 * @version 1.0
 * @copyright nuteds
 * @license http://opensource.org/licenses/gpl-3.0.html GPL General Public License
 */
final class Teleconsulta {

	//Tipos de teleconsulta
	const TIPO_EXAME 			= 1;
	const TIPO_OPNIAO_FORMATIVA = 2;
	
	public static $tipos = array(	1 => 'EXAME',
									2 => 'TELECONSULTORIA');
	
	//Status de teleconsulta
	const STATUS_AGUARDANDO = 1;
	const STATUS_EM_ANALISE = 2;
	const STATUS_RESPONDIDO = 3;
	const STATUS_FINALIZADO = 4;
									
	public static $status = array(	1 => 'AGUARDANDO',
									2 => 'EM ANÁLISE',
									3 => 'RESPONDIDO',
									4 => 'FINALIZADO');
									
	public static $statusCor = array(	1 => 'blue',
										2 => 'orange',
										3 => 'brown',
										4 => 'green');

	public static $laudosPadroes = array(
		array(	'lab' => 'FALTA DE DADOS CLÍNICOS',
				'msg' => 'Devido à falta de dados clínicos mínimos na solicitação, conforme portaria 2.546, 27/10/2011, Ministério da Saúde, 
		encerro teleconsultoria. Caso deseje esclarecer dúvidas sobre procedimentos clínicos, ações de saúde e questões 
		relativas ao processo de trabalho, solicite nova teleconsultoria.')
	);
										
	private $teleconsulta;
	private $usuario;
	private $auth;
	private $verificaAptoLaudo;
	private $aptoLaudo;
	
	public function Teleconsulta($teleconsulta, $usuario, $auth){
		$this->teleconsulta = $teleconsulta;
		$this->usuario = $usuario;
		$this->auth = $auth;
		$this->verificaAptoLaudo = false;		
	}
	
	/**
	 * Verifica se o usuário está laudando
	 * 
	 * @return boolean
	 */
	public function isLaudando(){
		if(($this->isStatusEmAnalise() || $this->isStatusRespondido()) && $this->isEspecialistaOwner())
			return true;
		
		return false;
	}
	
	/**
	 * Verifica se o usuário está apto a laudar, faz a verificação uma vez por execução
	 * 
	 * @return boolean
	 */
	public function isAptoLaudo(){
		
		if($this->verificaAptoLaudo){
			return $this->aptoLaudo;
		}
		else{
			$this->verificaAptoLaudo = true;
			$this->aptoLaudo = false;
			
			//Verificando se a teleconsulta não está no status de aguardando
			if($this->teleconsulta['tp_status'] != Teleconsulta::STATUS_AGUARDANDO){
				return false;
			}
			
			//Verificando se a teleconsulta foi solicitada pelo mesmo especialista
			if($this->usuario['ci_usuario'] == $this->teleconsulta['cd_profissional_solicitante']){
				return false;
			}
			
			//Verificando se tem permissão
			if($this->teleconsulta['tp_tipo'] == Teleconsulta::TIPO_EXAME){
				if($this->auth->isOn('especialista_exame')){
					$this->aptoLaudo = true;
				}
			}
			elseif($this->teleconsulta['tp_tipo'] == Teleconsulta::TIPO_OPNIAO_FORMATIVA){
				if($this->auth->isOn('especialista_2_op_form')){
					$this->aptoLaudo = true;
				}			
			}
			
			if(!$this->aptoLaudo){
				return false;
			}			
			
			//Verificando as especialidades 
			$sqlEspecialidades = 'select cd_especialidade from tb_profissional_especialidade where cd_profissional = '.$this->usuario['ci_usuario'].' and cd_especialidade = '.$this->teleconsulta['cd_especialidade'];
			$queryEspecialidades = query($sqlEspecialidades);
			if($queryEspecialidades->rowCount() < 1){
				$this->aptoLaudo = false;
				return false;
			}
			
			//Verificando os municípios
			/*$sqlMunicipios = 'select cd_localidade from tb_profissional_localidade where cd_profissional = '.$this->usuario['ci_usuario'].' and cd_localidade = '.$this->teleconsulta['cd_localidade'];
			$queryMunicipios = query($sqlMunicipios);
			if($queryMunicipios->rowCount() < 1){
				$this->aptoLaudo = false;
				return false;
			}*/

			return $this->aptoLaudo;
		}		
	}
	
	/**
	 * Retorna o tipo da teleconsulta
	 * 
	 * @return string
	 */
	public function getTipo(){
		return Teleconsulta::$tipos[$this->teleconsulta['tp_tipo']];
	}
	
	/**
	 * Retorna o código da teleconsulta
	 * 
	 * @return integer
	 */
	public function getId(){
		return $this->teleconsulta['ci_teleconsulta'];
	}
	
	/**
	 * Verifica se o usuário especialista é dono da teleconsulta, isto é, se esta laudando
	 * 
	 * @return boolean
	 */
	public function isEspecialistaOwner(){
		if($this->usuario['ci_usuario'] == $this->teleconsulta['cd_profissional_especialista'])
			return true;
		
		return false;
	}
	
	/**
	 * Verifica se o usuário é dono da teleconsulta, sendo o solicitante ou especialista
	 * 
	 * @return boolean
	 */
	public function isOwner(){
		if($this->usuario['ci_usuario'] == $this->teleconsulta['cd_profissional_especialista']
			|| $this->usuario['ci_usuario'] == $this->teleconsulta['cd_profissional_solicitante'])
			return true;
		
		return false;
	}

	/**
	 * Verifica se a teleconsulta está com o status aguardando
	 * 
	 * @return boolean
	 */
	public function isStatusAguardando(){
		if($this->teleconsulta['tp_status'] == Teleconsulta::STATUS_AGUARDANDO)
			return true;
		
		return false;
	}
	
	/**
	 * Verifica se a teleconsulta está com o status em análise
	 * 
	 * @return boolean
	 */
	public function isStatusEmAnalise(){
		if($this->teleconsulta['tp_status'] == Teleconsulta::STATUS_EM_ANALISE)
			return true;
		
		return false;
	}
	
	/**
	 * Verifica se a teleconsulta está com o status respondido
	 * 
	 * @return boolean
	 */
	public function isStatusRespondido(){
		if($this->teleconsulta['tp_status'] == Teleconsulta::STATUS_RESPONDIDO)
			return true;
		
		return false;
	}
	
	/**
	 * Verifica se a teleconsulta está com o status finalizado
	 * 
	 * @return boolean
	 */
	public function isStatusFinalizado(){
		if($this->teleconsulta['tp_status'] == Teleconsulta::STATUS_FINALIZADO)
			return true;
		
		return false;
	}
} 
 ?>
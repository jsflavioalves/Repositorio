<?php 
	require 'libs/httpful.phar';
	
	/**
	 * Classe responsável por armazenar as constantes dos tipo de dados aceitados pelo webservice.
	 */
	class TipoDeDados {
		const JSON = 0; // TiposDeDados::JSON
		const XML = 1; //  TiposDeDados::XML
	}
	
	/**
	 * Classe responsável por empacotar os dados e os enviar para o webservice.
	 */
	class Integra {
		private $token_autenticacao = null;	
		
		/**
		 * Inicializa uma nova instância da classe com código do Token gerado pelo sistema.
		 * @param String $token_autenticacao
		 */
		public function __construct($token_autenticacao) {
			$this->token_autenticacao = $token_autenticacao;
		}
		
		public function setTokenAutenticacao($token_autenticacao) {
			$this->token_autenticacao = $token_autenticacao;
		}
		
		/**
		 * Método utilizado para enviar dados no formato bruto (JSON ou XML) para o webservice.
		 * @param TipoDeDados $tipoDeDados
		 * @param String $url
		 * @param String $dados
		 */
		public function enviarDados($tipoDeDados, $url, $dados) {
			if ($this->token_autenticacao != null || $this->token_autenticacao != "") {
				
				if ($tipoDeDados == TipoDeDados::JSON) {
					try {
		                $response = \Httpful\Request::post($url)->addHeader("Authorization", "Token " . $this->token_autenticacao)->sendsJson()->body($dados)->send();
						return $response;
		            } catch (Exception $e) {
                        throw new Exception("Atenção: Não foi possível conectar-se à URL informada.");
		            }
				} else {	
					throw new Exception("O formato XML ainda não foi implementado.");
				}	
			} else {
                throw new Exception("Atenção: Você precisa setar o token de autenticação.");
			}
		}
        	
		/**
		 * Converte os indicadores no tipo do formato aceito pelo webservice.
		 * @param TipoDeDados $tipoDeDados
		 * @param String $dados
		 */
		public function serializar($tipoDeDados, $dados) {
			if ($tipoDeDados == TipoDeDados::JSON) {
				try {
	                return json_encode($dados);
	            } catch (Exception $e) {
	                throw new Exception("Atenção: Não foi possível serializar os dados para o formato JSON.");
	            }
			} else {
				throw new Exception("O formato XML ainda não foi implementado.");
			}
		}
        
        public static function isBlankOrNull($data) {
            return $data == trim('') || $data == null;
        }
	}

	/**
	 * Representa uma coleção de dados cadastrais de equipes de saúde.
	 */
	class EquipesSaude {
		public $lista_equipes_saude = array();
		
		/**
		 * Adiciona os dados cadastrais de uma equipe de saúde.
		 * @param String $codigo_nucleo
		 * @param String $codigo_equipe
		 * @param String $codigo_equipe_ine
		 * @param String $nome
		 * @param String $cnes_estabelecimento
		 * @param String $codigo_tipo_equipe
		 */
		public function addEquipeSaude($codigo_nucleo, $codigo_equipe, $codigo_equipe_ine, $nome, $cnes_estabelecimento, $codigo_tipo_equipe) {
			$equipe_saude = new stdClass();
			
			$equipe_saude->codigo_nucleo = $codigo_nucleo;
            $equipe_saude->nome = $nome;
            $equipe_saude->cnes_estabelecimento = $cnes_estabelecimento;
            
			if (!Integra::isBlankOrNull($codigo_equipe)) {
    			$equipe_saude->codigo_equipe = $codigo_equipe;
            }
            
            if (!Integra::isBlankOrNull($codigo_equipe_ine)) {
			    $equipe_saude->codigo_equipe_ine = $codigo_equipe_ine;
            }

            if (!Integra::isBlankOrNull($codigo_tipo_equipe)) {
			    $equipe_saude->codigo_tipo_equipe = $codigo_tipo_equipe;
            }
            
			array_push($this->lista_equipes_saude, $equipe_saude);
		}
	}
	
	/**
	 * Determina quais são os indicadore (quadros) a serem enviados.
	 */
	class IndicadorGeral {
		public $codigo_nucleo = "";
		public $mes_referencia = "";
		public $quadro_um = null;
		public $quadro_dois = null;
		public $quadro_tres = null;
		public $quadro_quatro = null;
		public $quadro_cinco = null;
		public $quadro_seis = null;
	
		/**
		 * Inicializa uma nova instância da classe com os indicadores passados nos parâmetros.
		 * @param String $codigo_nucleo
		 * @param String $mes_referencia
		 * @param String $quadro_um
		 * @param String $quadro_dois
		 * @param String $quadro_tres
		 * @param String $quadro_quatro
		 * @param String $quadro_cinco
		 * @param String $quadro_seis
		 */
		public function __construct($codigo_nucleo, $mes_referencia, $quadro_um, $quadro_dois, $quadro_tres, $quadro_quatro, $quadro_cinco, $quadro_seis) {
			$this->codigo_nucleo = $codigo_nucleo;
			$this->mes_referencia = $this->validateDataReferencia($mes_referencia);
			
			if ($quadro_um != null)
			    $this->quadro_um = $quadro_um;
            
			if ($quadro_dois != null)
    			$this->quadro_dois = $quadro_dois;

			if ($quadro_tres != null)
    			$this->quadro_tres = $quadro_tres;
			
			if ($quadro_quatro != null)
    			$this->quadro_quatro = $quadro_quatro;

			if ($quadro_cinco != null)
	   		    $this->quadro_cinco = $quadro_cinco;
	
    		if ($quadro_seis != null)
    		  	$this->quadro_seis = $quadro_seis;
		}
        
        public function validateDataReferencia($data) {
            if (checkdate(substr($data, 0, 2), "01", substr($data, 2, 6))) {
                return $data;
            } else {
                throw new Exception("Atenção: A data informada não é valida. Informe no formato \"MMAAAA\".");                      
            }
        }
	}

	/**
	 * Classe com todas as funções necessárias para o recebimento do Quadro 1 (Indicadores de estrutura 
	 * para monitoramento e avaliação do Programa Nacional Telessaúde Brasil Redes).
	 */
	class QuadroUm {
		public $num_profissionais_qualificados = 0;
		public $num_dispositivos_movel = 0;
		public $num_dispositivos_fixo = 0;
		public $avaliacao_estrutura_municipio = array();
		public $profissionais_registrados = array();

		/**
		 * Inicializa uma nova instância da classe com os indicadores passados nos parâmetros.
		 * @param String $num_profissionais_qualificados
		 * @param String $num_dispositivos_movel
		 * @param String $num_dispositivos_fixo
		 */
		public function __construct($num_profissionais_qualificados, $num_dispositivos_movel, $num_dispositivos_fixo) {
			$this->num_profissionais_qualificados = $num_profissionais_qualificados;
			$this->num_dispositivos_movel = $num_dispositivos_movel;
			$this->num_dispositivos_fixo = $num_dispositivos_fixo;
		}
		
		/**
		 * Adiciona indicadores (numPontosEmImplantacao, numPontosImplantados e numEquipesSaude) 
		 * em cada município (codigoMunicipio).
		 * @param String $codigo_municipio
		 * @param String $num_ubs_pontos_em_implantacao
		 * @param String $num_ubs_pontos_implantados
		 * @param String $num_equipe_saude_atendidas
		 */
		public function addAvaliacaoEstrutura($codigo_municipio, $num_ubs_pontos_em_implantacao, $num_ubs_pontos_implantados, $num_equipe_saude_atendidas) {
			$avaliacao_estrutura_municipio = new stdClass();
			
            if (strlen($codigo_municipio) > 6)
                throw new Exception("Atenção: O Código do Município não pode ser maior que 6.");
    		
			$avaliacao_estrutura_municipio->codigo_municipio = $codigo_municipio;
			$avaliacao_estrutura_municipio->num_ubs_pontos_em_implantacao = $num_ubs_pontos_em_implantacao;
			$avaliacao_estrutura_municipio->num_ubs_pontos_implantados = $num_ubs_pontos_implantados;
			$avaliacao_estrutura_municipio->num_equipe_saude_atendidas = $num_equipe_saude_atendidas;

			array_push($this->avaliacao_estrutura_municipio, $avaliacao_estrutura_municipio);
		}
	
		/**
		 * Adiciona o indicador "Número de profissionais registrados em cada município (codigoMunicipio) 
		 * e em cada categoria profissional (codigoFamiliaCBO)".
		 * @param String $codigo_municipio
		 * @param String $codigo_familia_cbo
		 * @param String $numero
		 */
		public function addProfissionaisRegistrados($codigo_municipio, $codigo_familia_cbo, $numero) {
			$profissionais_registrados = new stdClass();
			
			if (strlen($codigo_municipio) > 6)
                throw new Exception("Atenção: O Código do Município não pode ser maior que 6.");
            
            if (strlen($codigo_familia_cbo) > 4)
                throw new Exception("Atenção: O Código da família do CBO não pode ser maior que 4.");
            
			$profissionais_registrados->codigo_municipio = $codigo_municipio;
			$profissionais_registrados->codigo_familia_cbo = $codigo_familia_cbo;
			$profissionais_registrados->numero = $numero;
			
			array_push($this->profissionais_registrados, $profissionais_registrados);
		}
	}
	
	/**
	 * Classe com todas as funções necessárias para o recebimento do Quadro 2 (Indicadores mínimos de processo
	 * para monitoramento e avaliação de Teleconsultoria).
	 */	
	class QuadroDois {
		public $num_sincronas = 0;
		public $num_assincronas = 0;
		public $num_pontos_ativos = 0;
		public $percentual_aprovado_cib = 0.0;
		public $solicitacoes_uf = array();
		public $solicitacoes_municipio = array();
		public $solicitacoes_equipe = array();
		public $solicitacoes_membro = array();
		public $solicitacoes_ponto = array();
		public $solicitacoes_profissional = array();
		public $solicitacoes_tema_profissional = array();
		public $solicitacoes_cat_profissional = array();
	
		/**
		 * Inicializa uma nova instância da classe com os indicadores passados nos parâmetros.
		 * @param String $num_sincronas
		 * @param String $num_assincronas
		 * @param String $num_pontos_ativos
		 * @param Double $percentual_aprovado_cib
		 */
		public function __construct($num_sincronas, $num_assincronas, $num_pontos_ativos, $percentual_aprovado_cib) {
			$this->num_sincronas = $num_sincronas;
			$this->num_assincronas = $num_assincronas;
			$this->num_pontos_ativos = $num_pontos_ativos;
			$this->percentual_aprovado_cib = $percentual_aprovado_cib;
		}
		
		/**
		 * Adiciona o indicador "Número de solicitações de teleconsultorias no estado (codigoUF) respondidas".
		 * @param String $codigo_uf
		 * @param String $numero
		 */
		public function addSolicitacoesUF($codigo_uf, $numero) {
			$solicitacoes_uf = new stdClass();
			$solicitacoes_uf->codigo_uf = $codigo_uf;
			$solicitacoes_uf->numero = $numero;

			array_push($this->solicitacoes_uf, $solicitacoes_uf);
		}
		
		/**
		 * Adiciona o indicador "Número de solicitações de teleconsultorias por município (codigoMunicipio) respondidas".
		 * @param String $codigo_municipio
		 * @param String $numero
		 */
		public function addSolicitacoesMunicipio($codigo_municipio, $numero) {
			$solicitacoes_municipio = new stdClass();
            
            if (strlen($codigo_municipio) > 6)
                throw new Exception("Atenção: O Código do Município não pode ser maior que 6.");
            
			$solicitacoes_municipio->codigo_municipio = $codigo_municipio;
			$solicitacoes_municipio->numero = $numero;

			array_push($this->solicitacoes_municipio, $solicitacoes_municipio);
		}
	
		/**
		 * Adiciona o indicador "Número de solicitações de teleconsultorias por equipe de saúde respondidas".
		 * @param String $codigo_equipe
		 * @param String $numero
		 */
		public function addSolicitacoesEquipe($codigo_equipe, $codigo_equipe_ine, $numero) {
			$solicitacoes_equipe = new stdClass();
            $solicitacoes_equipe->numero = $numero;
            
            if (!Integra::isBlankOrNull($codigo_equipe)) {
    			$solicitacoes_equipe->codigo_equipe = $codigo_equipe;
            }
            
            if (!Integra::isBlankOrNull($codigo_equipe_ine)) {
    			$solicitacoes_equipe->codigo_equipe_ine = $codigo_equipe_ine;
            }

			array_push($this->solicitacoes_equipe, $solicitacoes_equipe);
		}
	
		/**
		 * Adiciona o indicador "Número de solicitações de teleconsultorias por membro de gestão respondidas".
		 * @param String $codigo_cpf
		 * @param String $codigo_cns
		 * @param String $email
		 * @param String $membro_nome
		 * @param String $numero
		 */
		public function addSolicitacoesMembroGestao($codigo_cpf, $codigo_cns, $email, $membro_nome, $numero) {
			$solicitacoes_membro = new stdClass();
			
			$solicitacoes_membro->email = $email;
			$solicitacoes_membro->membro_nome = $membro_nome;
			$solicitacoes_membro->numero = $numero;
            
			if (!Integra::isBlankOrNull($codigo_cpf)) {
    			$solicitacoes_membro->codigo_cpf = $codigo_cpf;
            }
            
            if (!Integra::isBlankOrNull($codigo_cns)) {
    			$solicitacoes_membro->codigo_cns = $codigo_cns;
            }

			array_push($this->solicitacoes_membro, $solicitacoes_membro);
		}

		/**
		 * Adiciona o indicador "Número de solicitações de teleconsultorias por ponto (codigoPontoTelessaude) respondidas."
		 * @param String $codigo_ponto
		 * @param String $numero
		 */
		public function addSolicitacoesPontoTelessaude($codigo_ponto, $numero) {
			$solicitacoes_ponto = new stdClass();
			$solicitacoes_ponto->codigo_ponto = $codigo_ponto;
			$solicitacoes_ponto->numero = $numero;

			array_push($this->solicitacoes_ponto, $solicitacoes_ponto);
		}
		
		/**
		 * Adiciona o indicador "Número total de solicitações por profissional respondidas".
		 * @param String $profissional_cpf
		 * @param String $profissional_codigo_cns
		 * @param String $nome
		 * @param String $email
		 * @param String $codigo_tipo_profissional
         * @param String $codigo_cbo
         * @param String $codigo_equipe
         * @param String $codigo_equipe_ine
		 * @param String $numero
		 */
		public function addSolicitacoesProfissional($profissional_cpf, $profissional_codigo_cns, $nome, $email, $codigo_tipo_profissional, $codigo_cbo, $codigo_equipe, $codigo_equipe_ine, $numero) {
			$solicitacoes_profissional = new stdClass();
			
			$solicitacoes_profissional->nome = $nome;
			$solicitacoes_profissional->profissional_email = $email;
			$solicitacoes_profissional->codigo_tipo_profissional = $codigo_tipo_profissional;
			$solicitacoes_profissional->codigo_cbo = $codigo_cbo;
			$solicitacoes_profissional->numero = $numero;

            if (!Integra::isBlankOrNull($codigo_equipe)) {
    			$solicitacoes_profissional->codigo_equipe = $codigo_equipe;
            }
    
            if (!Integra::isBlankOrNull($codigo_equipe_ine)) {
    			$solicitacoes_profissional->codigo_equipe_ine = $codigo_equipe_ine;
            }
            
            if (!Integra::isBlankOrNull($profissional_cpf)) {
                $solicitacoes_profissional->profissional_cpf = $profissional_cpf;
            }
            
            if (!Integra::isBlankOrNull($profissional_codigo_cns)) {
                $solicitacoes_profissional->profissional_codigo_cns = $profissional_codigo_cns;
            }
            
			array_push($this->solicitacoes_profissional, $solicitacoes_profissional);
		}

        /**
         * Adiciona o indicador "Número total de solicitações por Profissional de saúde e por tema (CID e/ou CIAP2) respondidas".
         * 
         * Observações:
         *      1. profissional_cpf, profissional_codigo_cns e profissional_email são utilizados para localizar o profissional de saúde, ao menos um dos três deve ser informado.
         *      2. Ao menos codigo_cid ou codigo_ciap deve ser informado.
         * 
         * @param $profissional_cpf          CPF  do profissional    
         * @param $profissional_codigo_cns   Identificador CNS do profissional
         * @param $profissional_email        Email do profissional
         * @param $codigo_cid                Código CID (Classificação Internacional de Doenças).
         * @param $codigo_ciap               Código CIAP (Classificação Internacional de Assistência Primária).
         * @param $numero                    Valor do indicador.
         */
        public function addSolicitacoesProfissionalTema($profissional_cpf, $profissional_codigo_cns, $profissional_email, $codigo_cid, $codigo_ciap, $numero) {
            $solicitacoes_tema_profissional = new stdClass();
            
            $solicitacoes_tema_profissional->profissional_email = $profissional_email;
            $solicitacoes_tema_profissional->numero = $numero;
            
            if (!Integra::isBlankOrNull($codigo_cid)) {
                $solicitacoes_tema_profissional->codigo_cid = $codigo_cid;
            }

            if (!Integra::isBlankOrNull($codigo_ciap)) {
                $solicitacoes_tema_profissional->codigo_ciap = $codigo_ciap;
            }
            
            if (!Integra::isBlankOrNull($profissional_cpf)) {
                $solicitacoes_tema_profissional->profissional_cpf = $profissional_cpf;
            }
            
            if (!Integra::isBlankOrNull($profissional_codigo_cns)) {
                $solicitacoes_tema_profissional->profissional_codigo_cns = $profissional_codigo_cns;
            }
            
            array_push($this->solicitacoes_tema_profissional, $solicitacoes_tema_profissional);
            
        }
		
		/**
		 * Adiciona o indicador "Número de solicitações de solicitações por categoria profissional respondidas".
		 * @param String $codigo_familia_cbo
		 * @param String $numero
		 */
		public function addSolicitacoesCatProfissional($codigo_familia_cbo, $numero) {
			$solicitacoes_cat_profissional = new stdClass();
            
            if (strlen($codigo_familia_cbo) > 4)
                throw new Exception("Atenção: O Código da família do CBO não pode ser maior que 4.");

			$solicitacoes_cat_profissional->codigo_familia_cbo = $codigo_familia_cbo;
			$solicitacoes_cat_profissional->numero = $numero;

			array_push($this->solicitacoes_cat_profissional, $solicitacoes_cat_profissional);
		}
	}

	/**
	 * Classe com todas as funções necessárias para o recebimento do Quadro 3 (Indicadores mínimos de processo 
	 * para monitoramento e avaliação de Telediagnóstico).
	 */
	class QuadroTres {
		public $num_pontos_ativos = 0;
		public $porcentual_aprovado_cib = 0.0;
		public $solicitacoes_telediagnostico_uf = array();
		public $solicitacoes_telediagnostico_municipio = array();
		public $solicitacoes_telediagnostico_equipe = array();
		public $solicitacoes_telediagnostico_ponto = array();
		public $solicitacoes_telediagnostico_tipo = array();
		
		/**
		 * Inicializa uma nova instância da classe com os indicadores passados nos parâmetros.
		 * @param int $num_pontos_ativos
		 * @param double $percentual_aprovado_cib
		 */
		public function __construct($num_pontos_ativos, $porcentual_aprovado_cib) {
			$this->num_pontos_ativos = $num_pontos_ativos;
			$this->porcentual_aprovado_cib = $porcentual_aprovado_cib;
		}

		/**
		 * Adiciona o indicador "Número de solicitações com exame realizado e laudo enviado ao solicitado por estado (codigoUF)".
		 * @param String $codigo_uf
		 * @param String $numero
		 */
		public function addSolicitacoesTelediagnosticoUF($codigo_uf, $numero) {
			$solicitacoes_telediagnostico_uf = new stdClass();
			$solicitacoes_telediagnostico_uf->codigo_uf = $codigo_uf;
			$solicitacoes_telediagnostico_uf->numero = $numero;

			array_push($this->solicitacoes_telediagnostico_uf, $solicitacoes_telediagnostico_uf);
		}

		/**
		 * Adiciona o indicador "Número de solicitações com exame realizado e laudo enviado ao solicitado por município (codigoMunicipio)".
		 * @param String $codigo_municipio
		 * @param String $numero
		 */
		public function addSolicitacoesTelediagnosticoMunicipio($codigo_municipio, $numero) {
			$solicitacoes_telediagnostico_municipio = new stdClass();
            
            if (strlen($codigo_municipio) > 6)
                throw new Exception("Atenção: O Código do Município não pode ser maior que 6.");
            
			$solicitacoes_telediagnostico_municipio->codigo_municipio = $codigo_municipio;
			$solicitacoes_telediagnostico_municipio->numero = $numero;

			array_push($this->solicitacoes_telediagnostico_municipio, $solicitacoes_telediagnostico_municipio);
		}
		
		/**
		 * Adiciona o indicador "Número de solicitações com exame realizado e laudo enviado ao solicitante por equipe".
		 * @param String $codigo_equipe
		 * @param String $codigo_equipe_ine
		 * @param String $numero
		 */
		public function addSolicitacoesTelediagnosticoEquipe($codigo_equipe, $codigo_equipe_ine, $numero) {
			$solicitacoes_telediagnostico_equipe = new stdClass();
			$solicitacoes_telediagnostico_equipe->numero = $numero;
			
			if (!Integra::isBlankOrNull($codigo_equipe)) {
    			$solicitacoes_telediagnostico_equipe->codigo_equipe = $codigo_equipe;
            }
            
            if (!Integra::isBlankOrNull($codigo_equipe_ine)) {
    			$solicitacoes_telediagnostico_equipe->codigo_equipe_ine = $codigo_equipe_ine;
            }

			array_push($this->solicitacoes_telediagnostico_equipe, $solicitacoes_telediagnostico_equipe);
		}

		/**
		 * Adiciona o indicador "Número de solicitações com exame realizado e laudo enviado ao solicitante por ponto de telessaúde."
		 * @param String $codigo_ponto
		 * @param String $numero
		 */
		public function addSolicitacoesTelediagnosticoPontoTelessaude($codigo_ponto, $numero) {
			$solicitacoes_telediagnostico_ponto = new stdClass();
			$solicitacoes_telediagnostico_ponto->codigo_ponto = $codigo_ponto;
			$solicitacoes_telediagnostico_ponto->numero = $numero;

			array_push($this->solicitacoes_telediagnostico_ponto, $solicitacoes_telediagnostico_ponto);
		}
		
		/**
		 * Adiciona o indicador "Número de solicitações com exame realizado e laudo enviado ao solicitante por tipo (codigoSIA)."
		 * @param String $codigo_sia
		 * @param String $numero
		 */
		public function addSolicitacoesTelediagnosticoTipo($codigo_sia, $numero) {
			$solicitacoes_telediagnostico_tipo = new stdClass();
			$solicitacoes_telediagnostico_tipo->codigo_sia = $codigo_sia;
			$solicitacoes_telediagnostico_tipo->numero = $numero;

			array_push($this->solicitacoes_telediagnostico_tipo, $solicitacoes_telediagnostico_tipo);
		}
	}

	/**
	 * Classe com todas as funções necessárias para o recebimento do Quadro 4 (Indicadores mínimos de processo
	 * para monitoramento e avaliação de Tele-educação).
	 */
	class QuadroQuatro {
		public $quantidade_disponibilizada_ares = 0; 
		public $num_pontos_ativos = 0;
		public $atividades_realizadas_uf = array();
		public $atividades_realizadas_municipio = array();
		public $atividades_realizadas_ponto = array();
		public $atividades_realizadas_equipe = array();
		public $participantes_cat_profissional_uf = array();
		public $participantes_cat_profissional_municipio = array();
		public $participantes_cat_profissional_equipe = array();
		public $participantes_cat_profissional_ponto = array();
		public $acessos_objetos_aprendizagem = array();
		public $acessos_objetos_aprendizagem_municipio = array();
		public $acessos_objetos_aprendizagem_equipe = array();
		public $acessos_objetos_aprendizagem_ponto = array();
		public $acessos_objetos_aprendizagem_cat_profissional = array();
		
		/**
		 * Inicializa uma nova instância da classe com os indicadores passados nos parâmetros.
		 * @param String $quantidade_disponibilizada_ares
		 * @param String $num_pontos_ativos
		 */
		public function __construct($quantidade_disponibilizada_ares, $num_pontos_ativos) {
			$this->quantidade_disponibilizada_ares = $quantidade_disponibilizada_ares;
			$this->num_pontos_ativos = $num_pontos_ativos;
		}
		
		/**
		 * Adiciona o indicador "Número de atividades realizadas por estado (codigoUF)".
		 * @param String $codigo_uf
		 * @param String $numero
		 */
		public function addAtividadesRealizadasUF($codigo_uf, $numero) {
			$atividades_realizadas_uf = new stdClass();
			$atividades_realizadas_uf->codigo_uf = $codigo_uf;
			$atividades_realizadas_uf->numero = $numero;

			array_push($this->atividades_realizadas_uf, $atividades_realizadas_uf);
		}

		/**
		 * Adiciona o indicador "Número de atividades realizadas por município (codigoMunicipio)".
		 * @param String $codigo_municipio
		 * @param String $numero
		 */
		public function addAtividadesRealizadasMunicipio($codigo_municipio, $numero) {
			$atividades_realizadas_municipio = new stdClass();
            
            if (strlen($codigo_municipio) > 6)
                throw new Exception("Atenção: O Código do Município não pode ser maior que 6.");
            
			$atividades_realizadas_municipio->codigo_municipio = $codigo_municipio;
			$atividades_realizadas_municipio->numero = $numero;

			array_push($this->atividades_realizadas_municipio, $atividades_realizadas_municipio);
		}
		
		/**
		 * Adiciona o indicador "Número de atividades realizadas por ponto de telessaúde (codigoPontoTelessaude)."
		 * @param String $codigo_ponto
		 * @param String $numero
		 */
		public function addAtividadesRealizadasPontoTelessaude($codigo_ponto, $numero) {
			$atividades_realizadas_ponto = new stdClass();
			$atividades_realizadas_ponto->codigo_ponto = $codigo_ponto;
			$atividades_realizadas_ponto->numero = $numero;

			array_push($this->atividades_realizadas_ponto, $atividades_realizadas_ponto);
		}

		/**
		 * Adiciona o indicador "Número de atividades realizdas por equipe".
		 * @param String $codigo_equipe
		 * @param String $codigo_equipe_ine
		 * @param String $numero
		 */
		public function addAtividadesRealizadasEquipe($codigo_equipe, $codigo_equipe_ine, $numero) {
			$atividades_realizadas_equipe = new stdClass();
			$atividades_realizadas_equipe->numero = $numero;
            
            if (!Integra::isBlankOrNull($codigo_equipe)) {
    			$atividades_realizadas_equipe->codigo_equipe = $codigo_equipe;
            }
            
            if (!Integra::isBlankOrNull($codigo_equipe_ine)) {
    			$atividades_realizadas_equipe->codigo_equipe_ine = $codigo_equipe_ine;
            }

			array_push($this->atividades_realizadas_equipe, $atividades_realizadas_equipe);
		}

		/**
		 * Adiciona o indicador "Número de particpantes por categoriga profissional (codigoFamiliaCBO) por estado (codigoUF)".
		 * @param String $codigo_uf
		 * @param String $codigo_familia_cbo
		 * @param String $numero
		 */
		public function addParticipantesCatProfissionalUF($codigo_uf, $codigo_familia_cbo, $numero) {
			$participantes_cat_profissional_uf = new stdClass();
            
            if (strlen($codigo_familia_cbo) > 4)
                throw new Exception("Atenção: O Código da família do CBO não pode ser maior que 4.");
            
			$participantes_cat_profissional_uf->codigo_uf = $codigo_uf;
			$participantes_cat_profissional_uf->codigo_familia_cbo = $codigo_familia_cbo;
			$participantes_cat_profissional_uf->numero = $numero;

			array_push($this->participantes_cat_profissional_uf, $participantes_cat_profissional_uf);
		}
		
		/**
		 * Adiciona o indicador "Número de particpantes por categoriga profissional (codigoFamiliaCBO) por município (codigoMunicipio)".
		 * @param String $codigo_municipio
		 * @param String $codigo_familia_cbo
		 * @param String $numero
		 */
		public function addParticipantesCatProfissionalMunicipio($codigo_municipio, $codigo_familia_cbo, $numero) {
			$participantes_cat_profissional_municipio = new stdClass();
            
            if (strlen($codigo_municipio) > 6)
                throw new Exception("Atenção: O Código do Município não pode ser maior que 6.");
            
            if (strlen($codigo_familia_cbo) > 4)
                throw new Exception("Atenção: O Código da família do CBO não pode ser maior que 4.");
            
			$participantes_cat_profissional_municipio->codigo_municipio = $codigo_municipio;
			$participantes_cat_profissional_municipio->codigo_familia_cbo = $codigo_familia_cbo;
			$participantes_cat_profissional_municipio->numero = $numero;

			array_push($this->participantes_cat_profissional_municipio, $participantes_cat_profissional_municipio);
		}
		
		/**
		 * Adiciona o indicador "Número de particpantes por categoriga profissional (codigoFamiliaCBO) por equipe".
		 * @param String $codigo_equipe
		 * @param String $codigo_equipe_ine
		 * @param String $codigo_familia_cbo
		 * @param String $numero
		 */
		public function addParticipantesCatProfissionalEquipe($codigo_equipe, $codigo_equipe_ine, $codigo_familia_cbo, $numero) {
			$participantes_cat_profissional_equipe = new stdClass();
			$participantes_cat_profissional_equipe->codigo_familia_cbo = $codigo_familia_cbo;
			$participantes_cat_profissional_equipe->numero = $numero;

            if (!Integra::isBlankOrNull($codigo_equipe)) {
    			$participantes_cat_profissional_equipe->codigo_equipe = $codigo_equipe;
            }
            
            if (!Integra::isBlankOrNull($codigo_equipe_ine)) {
    			$participantes_cat_profissional_equipe->codigo_equipe_ine = $codigo_equipe_ine;
            }
            
            if (strlen($codigo_familia_cbo) > 4)
                throw new Exception("Atenção: O Código da família do CBO não pode ser maior que 4.");

			array_push($this->participantes_cat_profissional_equipe, $participantes_cat_profissional_equipe);
		}
		
		/**
		 * Adiciona o indicador "Número de particpantes por categoriga profissional (codigoFamiliaCBO) por ponto/mês (codigoPonto)".
		 * @param String $codigo_ponto
		 * @param String $codigo_familia_cbo
		 * @param String $numero
		 */
		public function addParticipantesCatProfissionalPontoTelessaude($codigo_ponto, $codigo_familia_cbo, $numero) {
			$participantes_cat_profissional_ponto = new stdClass();
            
            if (strlen($codigo_familia_cbo) > 4)
                throw new Exception("Atenção: O Código da família do CBO não pode ser maior que 4.");
            
			$participantes_cat_profissional_ponto->codigo_ponto = $codigo_ponto;
			$participantes_cat_profissional_ponto->codigo_familia_cbo = $codigo_familia_cbo;
			$participantes_cat_profissional_ponto->numero = $numero;

			array_push($this->participantes_cat_profissional_ponto, $participantes_cat_profissional_ponto);
		}
		
		/**
		 * Adiciona o indicador "Número global de acessos aos objetos de aprendizagem por estado, município, equipe e ponto/mês".
		 * @param String $codigo_uf
		 * @param String $codigo_municipio
		 * @param String $codigo_equipe
		 * @param String $codigo_equipe_ine
		 * @param String $codigo_ponto
		 * @param String $numero
		 */
		public function addAcessosObjetosAprendizagem($codigo_uf, $codigo_municipio, $codigo_equipe, $codigo_equipe_ine, $codigo_ponto, $numero) {
			$acessos_objetos_aprendizagem = new stdClass();
            
            if (strlen($codigo_municipio) > 6)
                throw new Exception("Atenção: O Código do Município não pode ser maior que 6.");
            
            if (!Integra::isBlankOrNull($codigo_equipe)) {
                $acessos_objetos_aprendizagem->codigo_equipe = $codigo_equipe;
            }
            
            if (!Integra::isBlankOrNull($codigo_equipe_ine)) {
                $acessos_objetos_aprendizagem->codigo_equipe_ine = $codigo_equipe_ine;
            }
            
			$acessos_objetos_aprendizagem->codigo_uf = $codigo_uf;
			$acessos_objetos_aprendizagem->codigo_municipio = $codigo_municipio;
			$acessos_objetos_aprendizagem->codigo_ponto = $codigo_ponto;
			$acessos_objetos_aprendizagem->numero = $numero;

			array_push($this->acessos_objetos_aprendizagem, $acessos_objetos_aprendizagem);
		}
		
		/**
		 * Adiciona o indicador "Número global de acessos aos objetos de aprendizagem por município (codigoMunicipio)".
		 * @param String $codigo_municipio
		 * @param String $numero
		 */
		public function addAcessosObjetosAprendizagemMunicipio($codigo_municipio, $numero) {
			$acessos_objetos_aprendizagem_municipio = new stdClass();
            
            if (strlen($codigo_municipio) > 6)
                throw new Exception("Atenção: O Código do Município não pode ser maior que 6.");
            
			$acessos_objetos_aprendizagem_municipio->codigo_municipio = $codigo_municipio;
			$acessos_objetos_aprendizagem_municipio->numero = $numero;

			array_push($this->acessos_objetos_aprendizagem_municipio, $acessos_objetos_aprendizagem_municipio);
		}
		
		/**
		 * Adiciona o indicador "Número global de acessos aos objetos de aprendizagem por equipe".
		 * @param String $codigo_equipe
		 * @param String $codigo_equipe_ine
		 * @param String $numero
		 */
		public function addAcessosObjetosAprendizagemEquipe($codigo_equipe, $codigo_equipe_ine, $numero) {
			$acessos_objetos_aprendizagem_equipe = new stdClass();
			$acessos_objetos_aprendizagem_equipe->numero = $numero;
            
            if (!Integra::isBlankOrNull($codigo_equipe)) {
                $acessos_objetos_aprendizagem_equipe->codigo_equipe = $codigo_equipe;
            }
            
            if (!Integra::isBlankOrNull($codigo_equipe_ine)) {
                $acessos_objetos_aprendizagem_equipe->codigo_equipe_ine = $codigo_equipe_ine;
            }
			
			array_push($this->acessos_objetos_aprendizagem_equipe, $acessos_objetos_aprendizagem_equipe);
		}

		/**
		 * Adiciona o indicador "Número global de acessos aos objetos de aprendizagem por ponto de telessaúde."
		 * @param String $codigo_ponto
		 * @param String $numero
		 */
		public function addAcessosObjetosAprendizagemPontoTelessaude($codigo_ponto, $numero) {
			$acessos_objetos_aprendizagem_ponto = new stdClass();
			$acessos_objetos_aprendizagem_ponto->codigo_ponto = $codigo_ponto;
			$acessos_objetos_aprendizagem_ponto->numero = $numero;

			array_push($this->acessos_objetos_aprendizagem_ponto, $acessos_objetos_aprendizagem_ponto);
		}
		
		/**
		 * Adiciona o indicador "Número global de acessos aos objetos de aprendizagem por categoria profissional (codigoFamiliaCBO)".
		 * @param String $codigo_familia_cbo
		 * @param String $numero
		 */
		public function addAcessosObjetosAprendizagemCatProfissional($codigo_familia_cbo, $numero) {
			$acessos_objetos_aprendizagem_cat_profissional = new stdClass();
            
            if (strlen($codigo_familia_cbo) > 4)
                throw new Exception("Atenção: O Código da família do CBO não pode ser maior que 4.");
            
			$acessos_objetos_aprendizagem_cat_profissional->codigo_familia_cbo = $codigo_familia_cbo;
			$acessos_objetos_aprendizagem_cat_profissional->numero = $numero;

			array_push($this->acessos_objetos_aprendizagem_cat_profissional, $acessos_objetos_aprendizagem_cat_profissional);
		}
	}
	
	/**
	 * Classe com todas as funções necessárias para o recebimento do Quadro 5 (Indicadores mínimos
	 * de resultados e avaliação para monitoramento de Teleconsultoria).
	 */
	class QuadroCinco {
		const SIM = 1;
		const PARCIALMENTE = 2;
		const NAO = 3;
		const NAOSEI = 4;
		
		public $num_sof_enviada_bireme = 0;
		public $tempo_medio_sincronas = 0;
		public $tempo_medio_assincronas = 0;
		public $percentual_assinc_resp_emmenos72 = 0.0;
		public $satisfacao_solicitante = array();
		public $resolucao_duvida = array();
		public $temas_frequentes = array();
		public $cat_profissionais_frequentes = array();
		public $especialidades_frequentes = array();
		public $evitacao_encaminhamentos = array();
		
		/**
		 * Inicializa uma nova instância da classe com os indicadores passados nos parâmetros.
		 * @param String $num_sof_enviada_bireme
		 * @param Double $tempo_medio_sincronas
		 * @param Double $tempo_medio_assincronas
		 * @param Double $percentual_assinc_resp_emmenos72
		 */
		public function __construct($num_sof_enviada_bireme, $tempo_medio_sincronas, $tempo_medio_assincronas, $percentual_assinc_resp_emmenos72) {
			$this->num_sof_enviada_bireme = $num_sof_enviada_bireme;
			$this->tempo_medio_sincronas = $tempo_medio_sincronas;
			$this->tempo_medio_assincronas = $tempo_medio_assincronas;
			$this->percentual_assinc_resp_emmenos72 = $percentual_assinc_resp_emmenos72;
		}
		
		/**
		 * Adiciona o indicador "Percentual de teleconsultorias respondidas em que houve satisfação do solicitante".
		 * @param String $codigo_escala_likert
		 * @param Double $percentual
		 */
		public function addSatisfacaoSolicitante($codigo_escala_likert, $percentual) {
			$satisfacao_solicitante = new stdClass();
			$satisfacao_solicitante->codigo_escala_likert = $codigo_escala_likert;
			$satisfacao_solicitante->percentual = $percentual;
			
			array_push($this->satisfacao_solicitante, $satisfacao_solicitante);
		}
		
		/**
		 * Adiciona o indicador "Percentual de teleconsultorias respondidas em que houve resolução da dúvida (sim, parcialmente, não, não sei)".
		 * @param Double $percentual_sim
		 * @param Double $percentual_parcial
		 * @param Double $percentual_nao
		 * @param Double $percentual_nao_sei
		 */
		public function addResolucaoDuvida($percentual_sim, $percentual_parcial, $percentual_nao, $percentual_nao_sei) {
			$resolucao_duvida = new stdClass();
			$resolucao_duvida->percentual_sim = $percentual_sim;
			$resolucao_duvida->percentual_parcial = $percentual_parcial;
			$resolucao_duvida->percentual_nao = $percentual_nao;
			$resolucao_duvida->percentual_nao_sei = $percentual_nao_sei;
			
			array_push($this->resolucao_duvida, $resolucao_duvida);
		}
		
		/**
		 * Adiciona o indicador "Lista dos 10 temas mais frequentes das solicitações de teleconsultorias respondidas".
		 * @param String $codigo_cid
		 * @param String $codigo_ciap
		 */
		public function addTemasFrequentes($codigo_cid, $codigo_ciap) {
			$temas_frequentes = new stdClass();
			$temas_frequentes->codigo_cid = $codigo_cid;
			$temas_frequentes->codigo_ciap = $codigo_ciap;
			
			array_push($this->temas_frequentes, $temas_frequentes);
		}
		
		/**
		 * Adiciona o indicador " Categoria profissional dos teleconsultores mais frequentes entre as solicitações de telconsultorias respondidas".
		 * @param String $codigo_familia_cbo
		 */
		public function addCatProfissionaisFrequentes($codigo_familia_cbo) {
			$cat_profissionais_frequentes = new stdClass();
			$cat_profissionais_frequentes->codigo_familia_cbo = $codigo_familia_cbo;
			
			array_push($this->cat_profissionais_frequentes, $cat_profissionais_frequentes);
		}	
		
		/**
		 * Adiciona o indicador "Especialidades dos teleconsultores mais frequentes entre as solicitações de telconsultorias respondidas".
		 * @param String $codigo_cbo
		 */
		public function addEspecialidadesFrequentes($codigo_cbo) {
			$especialidades_frequentes = new stdClass();
			$especialidades_frequentes->codigo_cbo = $codigo_cbo;
			
			array_push($this->especialidades_frequentes, $especialidades_frequentes);
		}
        
        /**
         * % teleconsultorias respondidas que havia intenção de encaminhar paciente em que houve evitação de encaminhamentos".
         * @param String $codigo_familia_cbo
         * @param Double $percentual_sim
         * @param Double $percentual_nao
         */
        public function addEvitacaoEncaminhamentoCatProfissional($codigo_familia_cbo, $percentual_sim, $percentual_nao) {
            $evitacao_encaminhamento_cat_profissional = new stdClass();
            $evitacao_encaminhamento_cat_profissional->codigo_familia_cbo = $codigo_familia_cbo;
            $evitacao_encaminhamento_cat_profissional->percentual_sim = $percentual_sim;
            $evitacao_encaminhamento_cat_profissional->percentual_nao = $percentual_nao;
            
            array_push($this->evitacao_encaminhamentos, $evitacao_encaminhamento_cat_profissional);
        }        
	}
	
	/**
	 * Classe com todas as funções necessárias para o recebimento do Quadro 6 (Indicadores de resultados e 
	 * avaliação para a Tele-educação).
	 */
	class QuadroSeis {
		public $temas_frequentes_participacao = array();
		public $avaliacao_satisfacao_participantes = array();
		public $temas_frequntes_objeto_aprendizagem = array();
		public $avaliacao_satisfacao_objeto_aprendizagem = array();

		/**
		 * Adiciona o indicador "Até 5 temas com maior participação por mês".
		 * @param String $codigo_decs_bireme
		 */
		public function addTemasFrequentesParticipacao($codigo_decs_bireme) {
			$temas_frequentes_participacao = new stdClass();
			$temas_frequentes_participacao->codigo_decs_bireme = $codigo_decs_bireme;
			
			array_push($this->temas_frequentes_participacao, $temas_frequentes_participacao);
		}
		
		/**
		 * Adiciona o indicador "Avaliação global da satisfação dos profissionais participantes do mês".
		 * @param String $codigo_escala_likert
		 * @param Double $percentual
		 */
		public function addAvaliacaoSatisfacaoParticipantes($codigo_escala_likert, $percentual) {
			$avaliacao_satisfacao_participantes = new stdClass();
			$avaliacao_satisfacao_participantes->codigo_escala_likert = $codigo_escala_likert;
			$avaliacao_satisfacao_participantes->percentual = $percentual;
			
			array_push($this->avaliacao_satisfacao_participantes, $avaliacao_satisfacao_participantes);
		}
		
		/**
		 * Adiciona o indicador " Até 5 temas mais acessados, por objetos de aprendizagem".
		 * @param String $codigo_decs_bireme
		 */
		public function addTemasFrequentesObjetoAprendizagem($codigo_decs_bireme) {
			$temas_frequntes_objeto_aprendizagem = new stdClass();
			$temas_frequntes_objeto_aprendizagem->codigo_decs_bireme = $codigo_decs_bireme;
			
			array_push($this->temas_frequntes_objeto_aprendizagem, $temas_frequntes_objeto_aprendizagem);
		}
	
		/**
		 * Adiciona o indicador " Avaliação global da satisfação profissional com os objetos de aprendizagem por mês".
		 * @param String $codigo_escala_likert
		 * @param Double $percentual
		 */
		public function addAvaliacaoSatisfacaoObjetoAprendizagem($codigo_escala_likert, $percentual) {
			$avaliacao_satisfacao_objeto_aprendizagem = new stdClass();
			$avaliacao_satisfacao_objeto_aprendizagem->codigo_escala_likert = $codigo_escala_likert;
			$avaliacao_satisfacao_objeto_aprendizagem->percentual = $percentual;
			
			array_push($this->avaliacao_satisfacao_objeto_aprendizagem, $avaliacao_satisfacao_objeto_aprendizagem);
		}
	}
?>
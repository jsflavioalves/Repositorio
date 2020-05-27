<?php
/**
 * Nível de acesso do grupos de usuários da seduc
 * @package br.gov.ce.seduc
 * @version 1.0
 * @copyright seduc
 * @license http://opensource.org/licenses/gpl-3.0.html GPL General Public License
 */
final class NivelAcesso {	
	const BASICO 	= 1; 
	const ESCOLA 	= 2;
	const MUNICIPIO = 3;
	const CREDE 	= 4;
	const SEDUC 	= 5;
	const MASTER	= 6; //Nível de super usuário
	
	public static $niveis = array(	1 => 'BÁSICO',
									2 => 'ESCOLA',
									3 => 'MUNICÍPIO',
									4 => 'CREDE',
									5 => 'SEDUC');
} 
 ?>
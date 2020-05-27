<?php
/**
 * Validação - Realiza validações diversas utilizadas pela instituição
 * @package br.gov.ce.seduc
 * @author Thiago Segato Antunes
 * @version 1.0
 * @copyright seduc
 * @license http://opensource.org/licenses/gpl-3.0.html GPL General Public License
 */

class Validacao {

	/**
	 * Valida uma conta do bradesco
	 * 
	 * @return boolean
	 */
	public function validaContaBradesco($conta){
		$acumulador = $corrente = $mod11 = 0;
		$digitoCalc = $digito = "";
		$conta = str_pad($conta, 11, '0', STR_PAD_LEFT);
		$digito = substr($conta, 10, 11);
		for($i=2;$i<12;$i++){
			$corrente = substr($conta, 11-$i,1);
			$corrente *= $i;
			$acumulador += $corrente;
		}
		$mod11 = $acumulador % 11;
		switch($mod11){
		case 0:
			$digitoCalc = "0";
			break;
		case 1:
			$digitoCalc = "P";
			break;
		default:
			$digitoCalc = (11 - $mod11);
			break;
		}		
		$bResult = false;
		if($digitoCalc == $digito){
			$bResult = true;
		}
		else{			
			if($digitoCalc == "P" || $digito == "0"){
				$bResult = true;
			}
			else{
				$bResult = false;
			}
		}
		if(substr($conta, 1, 9) >= 1000000){
			$bResult = false;
		}
		return $bResult;	
	}
	
}
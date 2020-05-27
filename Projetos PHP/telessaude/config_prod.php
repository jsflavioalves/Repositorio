<?php
/**
 * Classe de configuração do sistema
 * @package default
 * @author Thiago Segato Antunes
 * @version 1.1
 * @copyright atitudeweb
 * @license http://opensource.org/licenses/gpl-3.0.html GPL General Public License
 */
 
final class Config{
	
	//Nome padrão do sistema
	const SYSTEM = 'Telessaúde - NUTEDS';
	const SITE = 'https://ufc.unasus.gov.br/telessaude/';
	
	//Conexão padrão do sistema
	//Configuração para conexão com BD Postgres
	const DEFAULT_CONNECTION = 'postgres';	
	const POSTGRES_HOST = 'localhost';
    const POSTGRES_PORT = 5432;  
    const POSTGRES_NAME = 'telessaude';
    const POSTGRES_USER = 'medicina';
    const POSTGRES_PASS = 'bCZBKPb52NwZ';
	
	//Configuração do envio de email autenticado ou não
	const MAIL_AUTH = 'smtp'; // mail = Utiliza o daemon sendmail linux | smtp = Utiliza comunicação socket no protocolo smtp
	const MAIL_HOST = '172.18.0.16';
	const MAIL_USER = 'telessaude@medicina.ufc.br';
	const MAIL_PASS = '0987654321@@@@@';
	const MAIL_PORT = 465;
	
	//Classe de Autenticação
	const AUTH_CLASS = 'br.ufc.nuteds.Autenticacao';    
	const AUTH_MESSAGE = 'É necessário ter permissão para executar esta operação!';
	
	//Configuração do nome da sessão
	const SESSION_NAME = 'telessaude';	
	
	//Configuração do nome e duração do cookie
	const COOKIE_NAME = 'teleconsultacookie';
	const COOKIE_TIME = 2592000; //30 dias - 60*60*24*30
	
}
?>
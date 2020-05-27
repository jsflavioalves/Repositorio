<?php
/**
 * Engine de carregamento para requisições ajax e demais opções
 * Inicia configurações, sessão, conexão padrão do banco de dados e autenticação
 * @package includes
 * @author Thiago Segato Antunes
 * @version 1.1
 * @copyright atitudeweb
 * @license http://opensource.org/licenses/gpl-3.0.html GPL General Public License
 */

//Definindo constantes
define('EXEC', 1);
define('DS', DIRECTORY_SEPARATOR);

//Ajustando para se basear no diretório do framework 
$currentFolder = getcwd();
$parts = explode(DS, $currentFolder);
array_pop($parts);
$correctFolder = implode(DS, $parts);

@define('ATITUDE_BASE', $correctFolder);
define('ATITUDE_LIBRARIES', ATITUDE_BASE.DS.'com'.DS.'atitudeweb');
require_once(ATITUDE_BASE.DS.'config.php');
require_once(ATITUDE_LIBRARIES.DS.'loader.php');
Loader::import('com.atitudeweb.database.Connection');
	
//Iniciando conexão caso o usuário exista com o banco de dados
Connection::open();

/**
 * Realiza uma consulta na conexão padrão do banco de dados
 *
 * @param string $id - Identificador da conexão
 * @return com.atitudeweb.database.IResult
 */
function query($sql, $id=null){
	return Connection::query($sql, $id);
}

/**
 * Executa uma instrução no banco de dados
 *
 * @param string $id - Identificador da conexão
 * @return boolean
 */
function execute($sql, $id=null){
	return Connection::exec($sql, $id);
}
?>
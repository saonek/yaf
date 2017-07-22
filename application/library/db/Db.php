<?php
namespace db;
use db\Medoo;
use Yaf\Application;
use Yaf\Config\Ini;

/**
 * init  db medoo
 */
class Db 
{

	public $em;

	function __construct(){

		$config = Application::app()->getConfig();
		$database = new Medoo([
		    'database_type' => 'mysql',
		    'database_name' => $config->db->mysql->db,
		    'server' => $config->db->mysql->server,
		    'username' => $config->db->mysql->user,
		    'password' => $config->db->mysql->pass,
		    'charset' => 'utf8'
		]);
		
		$this->em = $database;
	}
}
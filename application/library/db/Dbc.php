<?php
namespace db;
use db\Medoo;
use Yaf\Application;
use Yaf\Config\Ini;
use db\Db;
/**
 * init  db medoo
 */
class Dbc 
{
	static public function init(){
		return new Db();
	}

}
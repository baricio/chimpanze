<?php

require __DIR__ . "/../vendor/autoload.php";

use \max\mailchimp\Connection;
/**
* Teste de cadastro de membros em uma lista
*/
class TestConnection extends PHPUnit_Framework_TestCase 
{

	public function TestVerApi(){

		$connection = new Connection();
		$api = $connection->getApi();

		file_put_contents('log.txt',print_r($api,true));

	}

}
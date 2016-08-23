<?php

require __DIR__ . "/../vendor/autoload.php";

use \max\mailchimp\Lista;
/**
* Teste de cadastro de membros em uma lista
*/
class TestLista extends PHPUnit_Framework_TestCase 
{

	public function testRecuperaLista(){

		$lista = new Lista();
		$lista_data = $lista->get();

		file_put_contents('log.txt',print_r($lista->getLastResponse(),true));

		$this->assertNotEmpty($lista_data);
	}

}
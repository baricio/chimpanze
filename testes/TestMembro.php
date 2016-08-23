<?php

require "/vendor/autoload.php";

use \max\mailchimp\Lista;
use \max\mailchimp\Membro;
use \max\mailchimp\config\ListaName;
/**
* Teste de cadastro de membros em uma lista
*/
class TestMembro extends PHPUnit_Framework_TestCase 
{

	public function testMembroExistente(){

		$lista = new Lista();
		$pedido_id = $lista->getByName(ListaName::$MAX);
		$membro = new Membro($pedido_id);

		$dadosMembro = new \max\mailchimp\entity\Membro();
		$dadosMembro->setEmailAddress('danival@gmail.com');
		$retorno = $membro->find($dadosMembro->getEmailAddress());

		$this->assertTrue($membro->success());

	}

	public function testMembroNaoExistente(){

		$lista = new Lista();
		$pedido_id = $lista->getByName(ListaName::$MAX);
		$membro = new Membro($pedido_id);

		$dadosMembro = new \max\mailchimp\entity\Membro();
		$dadosMembro->setEmailAddress('naoexisto@gmail.com');
		$retorno = $membro->find($dadosMembro->getEmailAddress());

		$this->isTrue($membro->success());

	}

}
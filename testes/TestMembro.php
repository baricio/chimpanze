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

	public function TestEncontraEmail(){

		$lista = new Lista();
		$pedido = $lista->getByName(ListaName::$PEDIDO);

		$membro = new Membro($pedido);

		$dadosMembro = new \max\mailchimp\entity\Membro();

		$dadosMembro->setEmailAddress('danival@gmail.com');

		$retorno = $membro->find($dadosMembro->getEmailAddress());

	}

}
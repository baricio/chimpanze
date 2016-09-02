<?php

require __DIR__ . "/../vendor/autoload.php";

use \max\mailchimp\Automation;
use \max\mailchimp\config\AutomationName;

/**
 * Teste de cadastro de membros em uma lista
 */
class TestAutomation {

	public function testRecuperaAutomations() {

		$auto = new Automation();
		$lista_auto = $auto->get();
		var_dump($lista_auto);

	}

	public function testGetAutomation() {

		$auto = new Automation();
		$lista_auto = $auto->getByName(AutomationName::$PEDIDO);
		var_dump($lista_auto);

	}

	public function testRemoveEmail() {

		$auto = new Automation();
		$id = $auto->getByName(AutomationName::$PEDIDO);
		$lista_auto = $auto->removeEmail($id, 'removeemail@gmail.com');
		var_dump($lista_auto);

	}

}

$execute = new TestAutomation();
$execute->testRecuperaAutomations();
$execute->testGetAutomation();
$execute->testRemoveEmail();
<?php

require __DIR__ . "/../vendor/autoload.php";

use \max\mailchimp\Automation;
use \max\mailchimp\config\AutomationName;
use \max\mailchimp\WorkflowEmail;

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

	public function testGetEmails() {

		$auto = new Automation();
		$workflow_id = $auto->getByName(AutomationName::$PEDIDO);

		$workflow_emails = new WorkflowEmail($workflow_id);
		$dados = $workflow_emails->get();

	}

	public function GetQueueEmails() {

		$auto = new Automation();
		$workflow_id = $auto->getByName(AutomationName::$PEDIDO);

		$workflow_emails = new WorkflowEmail($workflow_id);
		$dados = $workflow_emails->queueAllEmails();

		var_dump($dados);

	}

}

$execute = new TestAutomation();
$execute->GetQueueEmails();
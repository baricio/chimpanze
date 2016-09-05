<?php

namespace max\mailchimp;

use \max\mailchimp\AbstractApi;

class Automation extends AbstractApi {

	private $automations;

	public function get() {
		$automations = $this->api->get('automations');

		$dados = array();
		if ($automations) {
			foreach ($automations['automations'] as $item) {
				$dados[$item['settings']['title']] = $item['id'];
			}
			$this->automations = $dados;
			return $this->automations;
		}

		return array();
	}

	public function getByName($nome) {
		$automations = $this->get();

		if ($automations) {
			return (isset($automations[$nome])) ? $automations[$nome] : '';
		}

		return '';
	}

	public function removeEmail($workflow_id, $email) {
		$removed = $this->api->post(
			'/automations/' . $workflow_id . '/removed-subscribers',
			array('email_address' => $email)
		);
		return $removed;
	}

}
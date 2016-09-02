<?php

namespace max\mailchimp;

use \max\mailchimp\AbstractApi;

class WorkflowEmail extends AbstractApi {

	private $automations;
	private $workflow_id;

	public function __construct($workflow_id) {
		$this->workflow_id = $workflow_id;
		parent::__construct();
	}

	public function get() {
		$workflow_emails = $this->api->get('/automations/' . $this->workflow_id . '/emails/');

		return $workflow_emails;

	}

}
<?php

namespace max\mailchimp;

use \DrewM\MailChimp\MailChimp;
use \max\mailchimp\config\Data;

abstract class AbstractApi{

	protected $api;

	public function __construct(){
		$this->api = new MailChimp(Data::$KEY);
	}

	public function success(){
		$response = $this->api->getLastResponse();
		return ($response['headers']['http_code'] == 200);
	}

	public function getLastError(){
		return $this->api->getLastError();
	}

	public function getLastResponse(){
		return $this->api->getLastResponse();
	}

}
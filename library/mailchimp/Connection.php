<?php

namespace max\mailchimp;

use \DrewM\MailChimp\MailChimp;
use \max\mailchimp\config\Data;

class Connection{

	protected $api;

	public function __construct(){
		$this->api = new MailChimp(Data::$KEY);
	}

	public function getApi(){
		return $this->api;
	}

}
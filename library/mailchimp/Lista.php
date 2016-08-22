<?php

namespace max\mailchimp;

use \max\mailchimp\AbstractApi;

class Lista extends AbstractApi{

	private $lists;

	public function get(){
		$lists = $this->api->get('lists');

		if($lists){
			$this->lists = array_column($lists['lists'],'id','name');
			return $this->lists;
		}

		return array();
	}

	public function getByName($nome){
		$lists = $this->get();

		if($lists){
			return $lists[$nome];
		}

		return '';
	}

}
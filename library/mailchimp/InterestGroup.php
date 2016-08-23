<?php

namespace max\mailchimp;

use \max\mailchimp\AbstractApi;

class InterestGroup extends AbstractApi{

	private $group_index;
	private $lista_id;
	private $uri;

	public function __construct($lista_id){
		$this->lista_id = $lista_id;
		$this->uri = 'lists/'. $this->lista_id .'/interest-categories';
		parent::__construct();
	}

	public function get(){
		$groups = $this->api->get($this->uri);

		if($groups){
			$this->group_index = array_column($groups['categories'],'id','title');
			return $this->group_index;
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
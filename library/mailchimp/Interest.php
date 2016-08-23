<?php

namespace max\mailchimp;

use \max\mailchimp\AbstractApi;
use \max\mailchimp\entity;

class Interest extends AbstractApi{

	private $interest_index;
	private $lista_id;
	private $group_id;
	private $uri;

	public function __construct($lista_id,$group_id){
		$this->lista_id = $lista_id;
		$this->group_id = $group_id;
		$this->uri = 'lists/'. $this->lista_id .'/interest-categories/'. $this->group_id .'/interests' ;
		parent::__construct();
	}

	public function get(){

		$interests = $this->api->get($this->uri);

		if($interests){
			$this->interest_index = array_column($interests['interests'],'id','name');
			return $this->interest_index;
		}

		return array();
	}

	public function getObject(Array $list_interest){
		$list_interest = $this->get();

		$dados = array();
		foreach ($list_interest as $key => $value) {
			$dados[] = new  entity/Interest($value,$key);
		}
		return $dados;
	}

	public function getByName($nome){
		$lists = $this->get();

		if($lists){
			return $lists[$nome];
		}

		return '';
	}

	public function getByNameWithList(Array $lists, $nome){

		if($lists){
			return $lists[$nome];
		}

		return '';
	}

}
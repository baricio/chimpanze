<?php

namespace max\mailchimp;

use \max\mailchimp\AbstractApi;

class Membro extends AbstractApi{

	private $lista_id;
	private $uri;

	public function __construct($lista_id){
		$this->lista_id = $lista_id;
		$this->uri = 'lists/'. $this->lista_id .'/members';
		parent::__construct();
	}

	public function get(){
		return $this->api->get($this->uri);
	}

	public function post(\max\mailchimp\entity\Membro $membro){
		return $this->api->post($this->uri,$membro->send());
	}

	public function put($membro_id, \max\mailchimp\entity\Membro $membro){
		return $this->api->put($this->uri + '/' + $membro_id,$membro->send());
	}

	public function delete($membro_id){
		return $this->api->delete($this->uri + '/' + $membro_id);
	}

	public function find($email){
		return $this->api->get($this->uri + '/' + md5($email));
	}

}
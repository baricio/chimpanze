<?php
require __DIR__ . "/../vendor/autoload.php";

use \max\mailchimp\Lista;
use \max\mailchimp\Membro;
use \max\mailchimp\Interest;
use \max\mailchimp\InterestGroup;
use \max\mailchimp\config\ListaName;
use \max\mailchimp\entity;
use \max\mailchimp\config;

//Recupera a lista
$lista = new Lista();
$lista_id = $lista->getByName(ListaName::$MAX);

//recupera grupo
$iGroup = new InterestGroup($lista_id);
$iStatus_id = $iGroup->getByName(config\InterestGroup::$STATUS);

//recupera interesse
$interest = new Interest($lista_id,$iStatus_id);
$interests = $interest->get();

// define qual o interesse será salvo
// recupera o id de cada interesse
// e define quais fazem parte do membro com boolean
$dados = array();

$client_id = $interest->getByNameWithList($interests, config\Interest::$CLIENTE);
$pedido_id = $interest->getByNameWithList($interests, config\Interest::$PEDIDO);
$cancelado_id = $interest->getByNameWithList($interests, config\Interest::$CANCELADO);

$dados[$client_id] = false;
$dados[$pedido_id] = true;
$dados[$cancelado_id] = false;

// carrega os dados de membro
$dadosMembro = new \max\mailchimp\entity\Membro();
$dadosMembro->setEmailAddress('jaexiste@gmail.com');
$dadosMembro->setInterests($dados);

// recupera a classe de membro
$membro = new Membro($lista_id);

//encontra o membro
$apiMembro = $membro->find($dadosMembro->getEmailAddress());

if($membro->success()){
	$result = $membro->patch($apiMembro['id'], $dadosMembro);
}else{
	die('membro nao existe');
}

if($membro->success()){
	var_dump($result);
	die('membro atualizado com sucesso');
}else{
	die('Falha ao atualizar cliente');
}


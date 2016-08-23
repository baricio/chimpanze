<?php
require __DIR__ . "/../vendor/autoload.php";

use \max\mailchimp\Lista;
use \max\mailchimp\Membro;
use \max\mailchimp\config\ListaName;

$lista = new Lista();
$pedido_id = $lista->getByName(ListaName::$MAX);
$membro = new Membro($pedido_id);

$dadosMembro = new \max\mailchimp\entity\Membro();
$dadosMembro->setEmailAddress('novomembro@gmail.com');
$retorno = $membro->find($dadosMembro->getEmailAddress());

if($membro->success()){
	var_dump($retorno); 
	die('Membro ja existe');
}

$result = $membro->post($dadosMembro);

if($membro->success()){
	die('membro adicionado com sucesso!');
}else{
	die('houve falha no processo, favor verificar');
}
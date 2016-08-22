<?php
require "vendor/autoload.php";

use \max\mailchimp\Lista;
use \max\mailchimp\Membro;
use \max\mailchimp\config\ListaName;

$lista = new Lista();
$pedido_id = $lista->getByName(ListaName::$PEDIDO);

$membro = new Membro($pedido_id);

$dadosMembro = new \max\mailchimp\entity\Membro();

$dadosMembro->setEmailAddress('pinguemenerfeito22@gmail.com');


try{

	$retorno = $membro->find($dadosMembro->getEmailAddress());

	if(!$retorno){
		$result = $membro->post($dadosMembro);
		if($membro->success()){
			die('membro adicionado com sucesso!');
		}else{
			echo('houve falha no processo, favor verificar');
			var_dump($membro->getLastResponse());
		}
	}else{
		die('membro já existe');
	}

}catch(Exception $e){
	var_dump($e);
}



die();


/*
$Batch->post("op1","lists/". $lista_ids['pedido'] ."/members", [
            'email_address' => 'vemnimim@gmail.com',
            'status'        => 'subscribed',
        ]);

$Batch->post("op2","lists/". $lista_ids['pedido'] ."/members", [
            'email_address' => 'danival@gmail.com',
            'status'        => 'subscribed',
        ]);

$Batch->post("op3","lists/". $lista_ids['pedido'] ."/members", [
            'email_address' => 'josevaz@gmail.com',
            'status'        => 'subscribed',
        ]);

$result = $Batch->execute();
*/

$members = $MailChimp->get('lists/'. $lista_ids['pedido'] .'/members');

var_dump($members);

die();

if ($MailChimp->success()) {
    print_r($result);
} else {
    echo $MailChimp->getLastError();
    var_dump($MailChimp->getLastResponse());
}

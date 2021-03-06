Chimpanze MailChimp API
=======================

Uso simples do MailChimp API v3, em PHP.

projeto com base em https://raw.githubusercontent.com/drewm/mailchimp-api

Requer no minimo PHP 5.3.


Installation
------------

Você pode instalar chimpanze usando Composer:

```
composer require fabricio/chimpanze
```

Você vai precisar:
* rodar ``composer install`` para pegar as depêndencias na pasta vendor
* adicione o autoloader na sua aplicação com esta linha: ``require("vendor/autoload.php")``

Examplos
--------

Adicione sua API key em library/mailchimp/config/Data.php
Adicione o nome dos grupos de interesse em library/mailchimp/config/InterestGroup.php
Adicione o nome dos interesse em library/mailchimp/config/Interest.php

Recupera suas listas de emails
```php
use \max\mailchimp\Lista;

$lista = new Lista();
$lista_array = $lista->get();
```

Insere um novo membro se não existir

```php
use \max\mailchimp\Lista;
use \max\mailchimp\Membro;
use \max\mailchimp\config\ListaName;

$lista = new Lista();
$lsita_id = $lista->getByName(ListaName::$NOMELISTA);
$membro = new Membro($lsita_id);

$dadosMembro = new \max\mailchimp\entity\Membro();
$dadosMembro->setEmailAddress('novomembro@gmail.com');
$dadosMembro->setNome('novo','membrp'); //nome e sobrenome
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
```

Recupera todos os grupos e seus interesses

```php
use \max\mailchimp\Lista;
use \max\mailchimp\InterestGroup;
use \max\mailchimp\Interest;
use \max\mailchimp\config;

$lista = new Lista();
$lista_id = $lista->getByName(config\ListaName::$NOMELISTA);

$iGroup = new InterestGroup($lista_id);
$iStatus_id = $iGroup->getByName(config\InterestGroup::$NOMEDOGRUPO);

$interest = new Interest($lista_id,$iStatus_id);
$interest_id = $interest->get();

var_dump($interest->get());
```

Atualiza um membro em grupo de interesse

```php
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
```

Remove um email da automacao

```php
$auto = new Automation();
$worflow_id = $auto->getByName(AutomationName::$PEDIDO);
$result = $auto->removeEmail($worflow_id, 'removeemail@gmail.com');

if($auto->success()){
	die('email removido')
}else{
	die('error ao remover email');
}
```

Pega todos os e-mails da workflow

```php
$auto = new Automation();
$workflow_id = $auto->getByName(AutomationName::$PEDIDO);

$workflow_emails = new WorkflowEmail($workflow_id);
$dados = $workflow_emails->get();
```

Pega todos os e-mails na fila do workflow

```php
$auto = new Automation();
$workflow_id = $auto->getByName(AutomationName::$PEDIDO);

$workflow_emails = new WorkflowEmail($workflow_id);
$dados = $workflow_emails->queueAllEmails();
```

Contribuição
------------

Toda contribuição e ajuda será bem vinda

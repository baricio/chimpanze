<?php
require __DIR__ . "/../vendor/autoload.php";

use \max\mailchimp\Lista;
use \max\mailchimp\InterestGroup;
use \max\mailchimp\Interest;
use \max\mailchimp\config;

$lista = new Lista();
$lista_id = $lista->getByName(config\ListaName::$MAX);

$iGroup = new InterestGroup($lista_id);
$iStatus_id = $iGroup->getByName(config\InterestGroup::$STATUS);

$interest = new Interest($lista_id,$iStatus_id);
$interest_id = $interest->get();

var_dump($interest->get());
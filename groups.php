<?php
require "vendor/autoload.php";

use \max\mailchimp\Lista;
use \max\mailchimp\InterestGroup;
use \max\mailchimp\config;

$lista = new Lista();
$lista_id = $lista->getByName(config\ListaName::$MAX);
$iGroup = new InterestGroup($lista_id);
$iGroups = $iGroup->get();

var_dump($iGroups);
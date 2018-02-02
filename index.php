<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 19.01.18
 * Time: 14:19
 */
//nõuame konfiguratsioonifaili
require_once "conf.php";
//loome pramalli objekti

$mainTmpl = new template("main");
require_once "control.php";

//reaalväärtuste määramine
$mainTmpl->set("site_lang", "et");
$mainTmpl->set("site_title", "PV");
$mainTmpl->set("user", "Kasutaja");
$mainTmpl->set("title", "Pealkiri");
$mainTmpl->set("lang_bar", "Keeleriba");
//lisame menüü failist
require_once "menu.php";
//väljastame objekti sisu testkujul

echo $mainTmpl->parse();
//kontrollime $http objekti tööd
$control = $http->get("control");
echo $control."<pre>";
echo "<pre>";
print_r($http->vars);
echo "</pre>";
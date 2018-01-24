<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 19.01.18
 * Time: 14:19
 */
//nõuame konfiguratsioonifaili
require_once  "conf.php";

//loome pramalli objekti
$mainTmpl = new template("main");
//reaalväärtuste määramine
$mainTmpl->set("site_lang", "et");
$mainTmpl->set("site_title", "PV");
$mainTmpl->set("user", "Kasutaja");
$mainTmpl->set("title", "Pealkiri");
$mainTmpl->set("lang_bar", "Keeleriba");
//lisame menüü failist
require_once "menu.php";
$mainTmpl->set("content", "Lehe sisu");
//väljastame objekti sisu testkujul
echo "<pre>";
print_r($mainTmpl);
echo "</pre>";
echo $mainTmpl->parse();
//kontrollime $http objekti tööd
echo HTTP_HOST.SCRIPT_NAME."<br>";
echo $http->baseLink."<br>";


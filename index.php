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
$mainTmpl->set("menu", "Lehe menüü");
$mainTmpl->set("content", "Lehe sisu");
//väljastame objekti sisu testkujul
echo "<pre>";
print_r($mainTmpl);
echo "</pre>";
echo $mainTmpl->parse();


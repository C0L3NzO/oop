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

//väljastame objekti sisu testkujul
echo "<pre>";
print_r($mainTmpl);
echo "</pre>";


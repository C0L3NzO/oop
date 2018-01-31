<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 18.01.18
 * Time: 09:35
 */

// konfiguratsioonifail

// loome vajalikud abikonstandid
define("MODEL_DIR", "model/");
define("VIEWS_DIR", "views/");
define("CONTROL_DIR", "controllers/");
define("LIB_DIR", "lib/");

//lisame vaikimisi kontrolleri faili nime
define("DEFAULT_CONTROL", "default");

//nõuame abifunktsioonide olemasolu
require_once LIB_DIR."utils.php";

//nõuame vajalike failide olemasolu
require_once MODEL_DIR."template.php"; //html vaate failide töötlus
require_once MODEL_DIR."http.php"; //HTTP töötluse klass
require_once MODEL_DIR."linkObject.php"; //lingi töötluse klass

//loome vajalikud objektid, mis on pidevalt kasutuses
$http = new linkObject();

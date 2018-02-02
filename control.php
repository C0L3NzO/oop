<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 31.01.18
 * Time: 10:50
 */

$control = $http->get("control");
$file = CONTROL_DIR.$control.".php";
if(file_exists($file) and is_file($file) and is_readable($file)){
    require_once $file;
} else {
    $file = CONTROL_DIR.DEFAULT_CONTROL.".php";
    $http->set("control", DEFAULT_CONTROL);
    require_once $file;
}
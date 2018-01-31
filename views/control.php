<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 31.01.18
 * Time: 10:50
 */

$control = $http->get("control");
$fail = CONTROL_DIR.$control."php";
if(file_exists($fail) and is_file($file) and is_readable($fail)){
    require_once $file;

}
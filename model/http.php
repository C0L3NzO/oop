<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 24.01.18
 * Time: 08:40
 */

class http
{
    //klassi muutujad
    var $vars = array(); //andmed, mis jõuavad HTTP kaudu
    var $server = array(); //serveriga seotud andmed

    /**
     * http constructor.
     */
    public function __construct(){
        $this->init();
    }

    //klassi muutujate väärtustega täitmine
    function init(){
        //nüüd on olemas kõik andmed, mis serverile jõudnud
        $this->vars = array_merge($_GET, $_POST);
        //serveri andmed
        $this->server = $_SERVER;

    }
}
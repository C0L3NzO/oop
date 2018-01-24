<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 24.01.18
 * Time: 09:15
 */

class linkObject extends http
{
    //klassi muutujad/väljad
    var $baseLink =false; //põhilink
    var $protocol = "http://"; //HTTP protokoll
    var $eq = "="; //=
    var $delim = "&amp;"; //&

    /**
     * linkObject constructor.
     */
    public function __construct(){
        //kõigepealt defineerime vajalikud eelandmed
        parent::__construct();
        $this->baseLink = $this->protocol.HTTP_HOST.SCRIPT_NAME;
    }

    //moodustame paarid kujul nimi_väärtus ja ühendame paarid omavahel kujul nimi1=vaartus1&nimi2=vaartus2 jne
    function addToLink(&$link, $name, $value){
        if($link != ""){
            $link = $link.$this->delim;
        }
        $link = $link.fixUrl($name).$this->eq.fixUrl($value);
    }
    //moodustame valmislingi kasutades põhilinki ja $this->>addToLink funktsiooni abil paare
    function getLink($add = array()){
        $link = "";
        foreach($add as $name=>$value){
            $this->addToLink($link, $name, $value);
        }
        if($link != ""){

            $link = $this->baseLink."?".$link;
        } else {
            $link = $this->baseLink;
        }
        return $link;
    }
}
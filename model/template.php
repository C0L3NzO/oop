<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 18.01.18
 * Time: 10:22
 */

class template
{
    //template objekti/klassi omadused
    var $file = ""; //html vaate faili nimi
    //html vaate faili sisu, mis on klassis vastava funktsiooni abil loetud
    var $content = false;
    //reaalsed väärtused html vaate šablooni täitmiseks
    var $vars = array();
    //template klassi meetodid:
    //html vaate faili sisu lugemine
    function readFile($f){
//        $fp = fopen($f, "rb");
//        $this->content = fread($fp, filesize($f));
//        fclose($fp);
        $this->content = file_get_contents($f);
    }
    //html vaate faili kontrollimine ja kasutuselevõtt
    function loadFile(){
        $f = $this->file; //abiasendus
        //kontrollime html vaadete kausta olemasolu
        if(!is_dir(VIEWS_DIR)){
            echo "Kataloogi ".VIEWS_DIR." ei ole leitud<br>";
            exit;
        }
        //kui html vaate faili nimi antakse kujul:
        //views/test.html
        $f = $this->file; //abiasendus
        if(file_exists($f) and is_file($f) and is_readable($f)){
            //loome sisu failist
            $this->readFile($f);
        }
        //kui html vaate faili nimi antakse kujul:
        //test.html
        $f = VIEWS_DIR.$this->file;
        if(file_exists($f) and is_file($f) and is_readable($f)) {
            //loome sisu failist
            $this->readFile($f);
        }
        //kui html vaate faili nimi antakse kujul:
        //test
        $f = VIEWS_DIR.$this->file.".html";
        if(file_exists($f) and is_file($f) and is_readable($f)) {
            //loome sisu failist
            $this->readFile($f);
        }
        //kui html vaate faili nimi antakse kujul:
        //katse.test -> views/katse/test.html
        $f = $this->file.str_replace(".", "/", $this->file).".html";
        if(file_exists($f) and is_file($f) and is_readable($f)) {
            //loome sisu failist
            $this->readFile($f);
        }
        if($this->content === false){
            echo "ei suutnud lugeda faili ".$this->file."<br>";
        }
    }
}
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

    /**
     * template constructor.
     * @param string $file
     */
    public function __construct($file)
    {
        $this->file = $file; //määrame html vaate faili nime
        $this->loadFile(); //laadime html vaate faili sisu
    }
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
        $file = $this->file; //abiasendus
        //kontrollime html vaadete kausta olemasolu
        if(!is_dir(VIEWS_DIR)){
            echo "Kataloogi ".VIEWS_DIR." ei ole leitud<br>";
            exit;
        }
        //kui html vaate faili nimi antakse kujul:
        //views/test.html
        $file = $this->file; //abiasendus
        if(file_exists($file) and is_file($file) and is_readable($file)){
            //loome sisu failist
            $this->readFile($file);
        }
        //kui html vaate faili nimi antakse kujul:
        //test.html
        $file = VIEWS_DIR.$this->file;
        if(file_exists($file) and is_file($file) and is_readable($file)) {
            //loome sisu failist
            $this->readFile($file);
        }
        //kui html vaate faili nimi antakse kujul:
        //test
        $file = VIEWS_DIR.$this->file.".html";
        if(file_exists($file) and is_file($file) and is_readable($file)) {
            //loome sisu failist
            $this->readFile($file);
        }
        //kui html vaate faili nimi antakse kujul:
        //katse.test -> views/katse/test.html
        $file = VIEWS_DIR.str_replace(".", "/", $this->file).".html";
        if(file_exists($file) and is_file($file) and is_readable($file)) {
            //loome sisu failist
            $this->readFile($file);
        }
        if($this->content === false){
            echo "ei suutnud lugeda faili ".$this->file."<br>";
        }
    }
    //this->vars massiivi täiendamine väärtuste paaridega kujul "malli elemendi nimi"=>"reaalne elemendi nimi"
    function set($name, $value){
        $this->vars[$name] = $value;
    }

    //$this->vars massiivi


    function add($name, $value){
        if(!isset($this->vars[$name])){
            $this->set($name, $value);
        } else {
            $this->vars[$name] = $this->vars[$name].$value;
        }
    }

    //malli elementide asendamine reaalväärtustega vastavalt elementide nimele
    function parse(){
        $str = $this->content; //sisu, mis ei ole veel asendatud
        foreach ($this->vars as $name=>$value) {
            $str = str_replace("{".$name."}", $value, $str);
        }
        return $str; //tagastame asendatud sisu
    }
}
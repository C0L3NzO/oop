<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 02.02.18
 * Time: 08:57
 */

class mysql
{
    //klassi väljad
    var $conn = false; //ühendus db serveriga
    var $host = false; //db server
    var $user = false; //db serveri kasutaja
    var $pass = false; //db serveri kasutaja parool
    var $dbname = false; //db nimi, mis on kasutusel

    /**
     * mysql constructor.
     * @param bool $host
     * @param bool $user
     * @param bool $pass
     * @param bool $dbname
     */
    public function __construct($host, $user, $pass, $dbname)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbname = $dbname;
        $this->connect(); //tekitame ühenduse andmebaasiga
    }

    //ühenduse loomine andmebaasiga
    function connect(){
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        if(!$this->conn){
            echo "Probleem andmebaasi ühendusega<br>";
            exit;
        }
    }

    //päringu saatmise funktsioon
    function query($sql){
        $result = mysqli_query($this->conn, $sql);
        if(!$result){
            echo "Probleem päringuga".$sql."<br>";
            return false;
        }
        return $result;
    }

    //andmete lugemine päringust
    function getData($sql){
        $result = $this->query($sql); //saadame andmebaasile päringu
        $data = array(); //päringu andmete salvestamiseks
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row; //loeme need ridade kaupa
        }
        //kui probleeme andmete lugemisega
        if(count($data) == 0){
            return false;
        }
        return $data; //või on andmed korralikud
    }
}
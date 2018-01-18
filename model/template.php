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
}
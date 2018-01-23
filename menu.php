<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 23.01.18
 * Time: 14:14
 */

//loome menüü ehitamiseks vajalikud objektid
$menuTempl = new template("menu.menu"); //menüü mall
$itemTempl = new template("menu.item"); //menüü elemendi mall

//loome ühe menüü elemendi nimega esimene
$itemTempl->set("name", "esimene");
//lisame elemendi menüüsse
$menuItem = $itemTempl->parse(); //string, mis sisaldab ühte nimekirja elementi
$menuTempl->set("menu_items", $menuItem); //nüüd olemas paar "menu_items"->"<li>...</li>

//loome ühe menüü elemendi nimega teine
$itemTempl->set("name", "teine");
//lisame elemendi menüüsse
$menuItem = $itemTempl->parse(); //string, mis sisaldab ühte nimekirja elementi
$menuTempl->set("menu_items", $menuItem); //nüüd olemas paar "menu_items"->"<li>...</li>

//ehitame valmis menüü
$menu = $menuTempl->parse();

//lisame valmis menüü lehele
$mainTmpl->set("menu", $menu);
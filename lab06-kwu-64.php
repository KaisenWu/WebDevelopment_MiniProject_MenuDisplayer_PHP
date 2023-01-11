<?php

//Require utility classes and config
require_once("inc/config.inc.php");
require_once("inc/Page.class.php");
require_once("inc/FileAgent.class.php");
require_once("inc/Menu.class.php");

// Require Pizza and all subclasses
require_once("inc/Entities/Pizza.class.php");
require_once("inc/Entities/Drink.class.php");
require_once("inc/Entities/Pop.class.php");
require_once("inc/Entities/Juice.class.php");
require_once("inc/Entities/Basics.class.php");
require_once("inc/Entities/Chicken.class.php");
require_once("inc/Entities/Veggie.class.php");
require_once("inc/Entities/Meat.class.php");


//Use the static function of Page class to show the header.
Page::header("Menu Displayer");


//Declare a new menu
$m = new Menu();
//read the file
$fileContents = FileAgent::read(PIZZA_FILE);

//Use the created object to parse the data.
$m->parseMenuData($fileContents);
$m->buildMenu();

//Use the static function of Page class to print the table. 
Page::printMenu($m);

//Use the static function of Page class to show the footer.
Page::footer();
?>
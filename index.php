<?php

//FRONT CONTROLLER

//1. General setting
ini_set('display_errors',1);
error_reporting(E_ALL);

//2. Mount system files
define('ROOT', dirname(__FILE__));

require_once(ROOT.'/components/Autoload.php');

//3. Establishing a database connection


//4. Call "Router"
$router = new Router();
$router->run();


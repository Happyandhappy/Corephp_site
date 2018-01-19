<?php
error_reporting(0);
ini_set('max_execution_time', 300);
ini_set('display_errors', 0); 
define("_WOJO", true);
require_once("dashboard/init.php");
App::Auth()->logout();
Url::redirect('/');
?>
<?php 
	/** 
	* Configuration

	* @package Wojo Framework
	* @author wojoscripts.com
	* @copyright 2017
	* @version Id: config.ini.php, v1.00 2017-09-13 11:42:51 gewa Exp $
	*/
 
	 if (!defined("_WOJO")) 
     die('Direct access to this location is not allowed.');
 error_reporting(0);
	/** 
	* Database Constants - these constants refer to 
	* the database configuration settings. 
	*/
	 define('DB_SERVER', 'localhost'); 
	 define('DB_USER', 'speedyhu_dashb'); 
	 define('DB_PASS', 'vT+*;C{,V4Pu'); 
	 define('DB_DATABASE', 'speedyhu_dashboard');
	 define('DB_DRIVER', 'mysql');
 
	 define('INSTALL_KEY', '2OhotNc5lTeedl17'); 
 
	/** 
	* Show Debugger Console. 
	* Display errors in console view. Not recomended for live site. true/false 
	*/
	 define('DEBUG', false);
	 error_reporting(0);
?>
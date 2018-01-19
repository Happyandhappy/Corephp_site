<?php
class DatabaseInmotion { // connecting to DB
	private $_connection;
	private static $_instance;
	private $_host = "104.244.126.65";
	private $_username = "quanki_data";
	private $_password = "Justified2";
	private $_database = "quanki_data";
	public static function getInstanceInmotion() {
	if(!self::$_instance) {
	self::$_instance = new self();	}
	return self::$_instance; }
	private function __construct() {
	$this->_connection = new mysqli($this->_host, $this->_username, 
	$this->_password, $this->_database);
	if(mysqli_connect_error()) {
	header('Location: 404.php');
	exit; 
	}
	}
	private function __clone() { }
	public function getConnectionInmotion() {
	return $this->_connection;
	}
}
class DatabaseHostgator { // connecting to DB
	private $_connection;
	private static $_instance;
	private $_host = "162.144.253.225";
	private $_username = "quanki_data";
	private $_password = "Justified2";
	private $_database = "quanki_data";
	public static function getInstanceHostgator() {
	if(!self::$_instance) {
	self::$_instance = new self();	}
	return self::$_instance; }
	private function __construct() {
	$this->_connection = new mysqli($this->_host, $this->_username, 
	$this->_password, $this->_database);
	if(mysqli_connect_error()) {
	header('Location: 404.php');
	exit; 
	}
	}
	private function __clone() { }
	public function getConnectionHostgator() {
	return $this->_connection;
	}
}
class DatabaseCubibProfile { // connecting to DB
	private $_connection;
	private static $_instance;
	private $_host = "192.249.125.90";
	private $_username = "scanth7_scanthem";
	private $_password = "{#=T+Q~1nbm.";
	private $_database = "scanth7_profile";
	public static function getInstanceCubibProfile() {
	if(!self::$_instance) {
	self::$_instance = new self();	}
	return self::$_instance; }
	private function __construct() {
	$this->_connection = new mysqli($this->_host, $this->_username, 
	$this->_password, $this->_database);
	if(mysqli_connect_error()) {
	header('Location: 404.php');
	exit; 
	}
	}
	private function __clone() { }
	public function getConnectionCubib() {
	return $this->_connection;
	}
}
?>
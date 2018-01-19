<?php
class DatabaseMain { // connecting to DB
	private $_connection;
	private static $_instance;
	private $_host = "104.244.126.65";
	private $_username = "quanki_data";
	private $_password = "Justified2";
	private $_database = "quanki_data";
	public static function getInstanceMain() {
	if(!self::$_instance) {
	self::$_instance = new self();	}
	return self::$_instance; }
	private function __construct() {
	$this->_connection = new mysqli($this->_host, $this->_username, 
	$this->_password, $this->_database);
	if(mysqli_connect_error()) {
	header('Location: 404.php');
	exit; }
	}
	private function __clone() { }
	public function getConnectionMain() {
	return $this->_connection;
	}
}
class DatabaseNewData { // connecting to DB
	private $_connection;
	private static $_instance;
	private $_host = "104.244.126.65";
	private $_username = "quanki_data";
	private $_password = "Justified2";
	private $_database = "quanki_newdata";
	public static function getInstanceNewData() {
	if(!self::$_instance) {
	self::$_instance = new self();	}
	return self::$_instance; }
	private function __construct() {
	$this->_connection = new mysqli($this->_host, $this->_username, 
	$this->_password, $this->_database);
	if(mysqli_connect_error()) {
	header('Location: 404.php');
	exit; }
	}
	private function __clone() { }
	public function getConnectionNewData() {
	return $this->_connection;
	}
}
class DatabaseOldData { // connecting to DB
	private $_connection;
	private static $_instance;
	private $_host = "104.244.126.65";
	private $_username = "quanki_data";
	private $_password = "Justified2";
	private $_database = "quanki_hostgator";
	public static function getInstanceOldData() {
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
	public function getConnectionOldData() {
	return $this->_connection;
	}
}
class DatabaseExperian { // connecting to DB
	private $_connection;
	private static $_instance;
	private $_host = "104.244.126.65";
	private $_username = "quanki_data";
	private $_password = "Justified2";
	private $_database = "quanki_experian";
	public static function getInstanceExperian() {
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
	public function getConnectionExperian() {
	return $this->_connection;
	}
}
class DatabaseNewDataSex
{
    private $_connection;
    private static $_instance;
    private $_host = "192.249.125.90";
    private $_username = "sexoffen_data";
    private $_password = "XZ3UiD?1xWqQ";
    private $_database = "sexoffen_data";
    public static function getInstanceNewDataSex()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    private function __construct()
    {
        $this->_connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
        if (mysqli_connect_error()) {
            header('Location: 404.php');
            exit;
        }
    }
    private function __clone()
    {
    }
    public function getConnectionNewDataSex()
    {
        return $this->_connection;
    }
}
class DatabaseNewDataArrest
{
    private $_connection;
    private static $_instance;
    private $_host = "192.249.125.90";
    private $_username = "allarres_data";
    private $_password = "FaD(7z8q@]V$";
    private $_database = "allarres_data";
    public static function getInstanceNewDataArrest()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    private function __construct()
    {
        $this->_connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
        if (mysqli_connect_error()) {
            header('Location: 404.php');
            exit;
        }
    }
    private function __clone()
    {
    }
    public function getConnectionNewDataArrest()
    {
        return $this->_connection;
    }
}
?>
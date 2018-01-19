<?php
  $name = $_POST['name'];
  $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $state = $_POST['state'];
	$comments =  $_POST['comments'];
	$query = $_POST['query'];
	$type = $_POST['type'];
	$time = date('Y-m-d H:i:s');
class DatabaseNewData { // connecting to DB
	private $_connection;
	private static $_instance;
	private $_host = "104.244.126.65";
	private $_username = "quanki_data";
	private $_password = "Justified2";
	private $_database = "quanki_data";
	public static function getInstanceNewData() {
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
	public function getConnectionNewData() {
	return $this->_connection;
	}
}
$dbNewData = DatabaseNewData::getInstanceNewData();
$db1 = $dbNewData->getConnectionNewData();
$searchquery = "INSERT INTO requested_data SET type='$type', name='$name', mobile='$mobile', email='$email', state='$state', comments='$comments', query='$query', time='$time'";
$result  = $db1->query($searchquery);

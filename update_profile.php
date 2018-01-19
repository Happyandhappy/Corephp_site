<?php
  $userid = $_POST['userid'];
  $profiletype = $_POST['profiletype'];
    $profileid = $_POST['profileid'];
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
$searchquery = "INSERT INTO update_data SET userid='$userid', profiletype='$profiletype', profileid='$profileid', time='$time'";
$result  = $db1->query($searchquery);

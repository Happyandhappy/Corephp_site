<?php
//error_reporting(1);
ini_set('max_execution_time', 300);
//ini_set('display_errors', 0); 

function clean($string) {
while (strpos(substr($string, -1), ' ') !== false) 
$string = substr($string, 0, -1);
$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
return preg_replace('/[^A-Za-z0-9\-_]/', '', $string); // Removes special chars.
// this function is to remove ending spaces
}
function ageCalculator($relativeDateOfBirth)
{
    if (!empty($relativeDateOfBirth)) {
        $birthdate = new DateTime($relativeDateOfBirth);
        $today     = new DateTime('today');
        $age       = $birthdate->diff($today)->y;
        return $age;
    } else {
        return 'Unknown';
    }
}
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
class DatabaseDT { // connecting to DB
	private $_connection;
	private static $_instance;
	private $_host = "104.244.126.65";
	private $_username = "quanki_data";
	private $_password = "Justified2";
	private $_database = "quanki_newdata";
	public static function getInstanceDT() {
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
	public function getConnectionDT() {
	return $this->_connection;
	}
}
class DatabaseScanThem { // connecting to DB
	private $_connection;
	private static $_instance;
	private $_host = "192.249.125.90";
	private $_username = "scanth7_scanthem";
	private $_password = "%TXvd9w~;VKi";
	private $_database = "scanth7_fulldata";
	public static function getInstanceScanThem() {
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
	public function getConnectionScanThem() {
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
class DatabaseExperianOld { // connecting to DB
	private $_connection;
	private static $_instance;
	private $_host = "104.244.126.65";
	private $_username = "quanki_data";
	private $_password = "Justified2";
	private $_database = "quanki_experian";
	public static function getInstanceExperianOld() {
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
	public function getConnectionExperianOld() {
	return $this->_connection;
	}
}
function base64url_encode($data) {
return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}
$dbNewData = DatabaseNewData::getInstanceNewData();
$db1 = $dbNewData->getConnectionNewData();
$dbOldData = DatabaseOldData::getInstanceOldData();
$db2 = $dbOldData->getConnectionOldData();  

$dbDT = DatabaseDT::getInstanceDT();
$db3 = $dbDT->getConnectionDT(); 

$dbScanThem = DatabaseScanThem::getInstanceScanThem();
$dbScanThemConnect = $dbScanThem->getConnectionScanThem(); 

$dbExperian = DatabaseExperian::getInstanceExperian(); // DiscoverThem
$dbExperianConnect = $dbExperian->getConnectionExperian();  // Initial DB

$dbExperianOld = DatabaseExperianOld::getInstanceExperianOld(); // DiscoverThem
$dbExperianConnectOld = $dbExperianOld->getConnectionExperianOld();  // Initial DB

$first = htmlentities(clean(($_GET['fn'])));
$firstNew = preg_replace("/[a-zA-Z0-9]/", "", $first);
$last = htmlentities(clean(($_GET['ln'])));
$st = htmlentities(clean(($_GET['state'])));
if ((($first == '') || ($first == NULL)) && (($last == '') || ($last = NULL))) {
header('Location: 404.php');
} 
$webTitle = $first.' '.$last;

$resultseducation = '';
$resultsaliases = '';

$resultseducation = '';
$resultsemail = '';
$resultsworkexp = '';
$resultsaliases = '';
$OCC_OCCUP = '';
$i = 0;
	
if (isset($st) && strlen($st) == 2) {
$searchquery = "select distinct(c.profileId)
    from profile c
	inner join addresses o
            on c.profileId = o.profileId
    where c.firstName = '$first' and c.lastName = '$last' and o.state = '$st' LIMIT 500"; }
else {
$searchquery = "SELECT profileId FROM `profile` WHERE `firstName` = '$first' AND `lastName` = '$last' LIMIT 500"; }
$result  = $db1->query($searchquery);

$totalcounter = $result->num_rows;
//$j = $totalcounter;

		$resultsDB = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$profileId        = $row['profileId'];
				$resultsDBArray[] = array(
				'profileId' => $profileId,
				'db_type' => 'Main_db'
				);
			}
		}
	
if (isset($st) && strlen($st) == 2) {
$searchquery = "select distinct(c.profileId)
    from profile c
	inner join addresses o
            on c.profileId = o.profileId
    where c.firstName = '$first' and c.lastName = '$last' and o.state = '$st' LIMIT 500"; }
else {
$searchquery = "SELECT profileId FROM `profile` WHERE `firstName` = '$first' AND `lastName` = '$last' LIMIT 500"; }
$result  = $db2->query($searchquery);

$totalcounter = $result->num_rows;

		$resultsDBOld = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$profileId        = $row['profileId'];
				$resultsDBArrayOld[] = array(
				'profileId' => $profileId,
				'db_type' => 'hostgator_db'
				);
			}
		}
			
if (isset($st) && strlen($st) == 2) {
$searchquery = "select distinct(c.profileId)
    from profile c
	inner join addresses o
            on c.profileId = o.profileId
    where c.firstName = '$first' and c.lastName = '$last' and o.state = '$st' AND c.InOtherDB != '1' LIMIT 500"; }
else {
$searchquery = "SELECT profileId FROM `profile` WHERE `firstName` = '$first' AND `lastName` = '$last' AND `InOtherDB` != '1' LIMIT 500 "; }
$result  = $db3->query($searchquery);

$totalcounter = $result->num_rows;
//$j = $totalcounter;

		$resultsDBDT = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
			$profileId        = $row['profileId'];
				$resultsDBDT[] = array(
				'profileId' => $profileId,
				'db_type' => 'DT_db'
				);
			}
		}
			
//} // end if for TotalCounter = 0
$profileIds = array();
foreach( $resultsDBArray as $keyB) {
	$profileIds[] = $keyB['profileId'];
}

 foreach( $resultsDBArrayOld as $keyB) {
 if( !in_array($keyB['profileId'],$profileIds) ) {
    $resultsDBArray[] = $keyB;
	}
  }
//var_dump($resultsDBArray);
//var_dump($resultsDBDT);

  $newarray = array_merge($resultsDBArray,$resultsDBDT);

 $aliasCounterForSearch = count($newarray);
 // ALIASES START
 $resultsDBArrayAliases = array();
if ($aliasCounterForSearch <= 500) {
if (isset($st) && strlen($st) == 2) {
$searchquery = "select distinct(c.profileId)
    from aliases c
	inner join addresses o
            on c.profileId = o.profileId
    where c.firstName = '$first' and c.lastName = '$last' and o.state = '$st' LIMIT 500"; }
else {
$searchquery = "SELECT profileId FROM `aliases` WHERE `firstName` = '$first' AND `lastName` = '$last' LIMIT 500"; }
$result  = $db1->query($searchquery);

$totalcounter = $result->num_rows;

		$resultsDBArrayAliases = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
			$profileId        = $row['profileId'];
				$resultsDBArrayAliases[] = array(
				'profileId' => $profileId,
				'db_type' => 'Main_db'
				);
			}
		}

if (isset($st) && strlen($st) == 2) {
$searchquery = "select distinct(c.profileId)
    from aliases c
	inner join addresses o
            on c.profileId = o.profileId
    where c.firstName = '$first' and c.lastName = '$last' and o.state = '$st' LIMIT 500"; }
else {
$searchquery = "SELECT profileId FROM `aliases` WHERE `firstName` = '$first' AND `lastName` = '$last' LIMIT 500"; }
$result  = $db2->query($searchquery);

$totalcounter = $result->num_rows;
//$j = $totalcounter;

		$resultsDBOldAliases = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$profileId        = $row['profileId'];
				$resultsDBArrayOldAliases[] = array(
				'profileId' => $profileId,
				'db_type' => 'hostgator_db'
				);
			}
		}
	
$profileIdsAliases = array();
foreach( $resultsDBArrayAliases as $keyB) {
	$profileIdsAliases[] = $keyB['profileId'];
}

 foreach( $resultsDBArrayOldAliases as $keyB) {
 if( !in_array($keyB['profileId'],$profileIdsAliases) ) {
    $resultsDBArrayAliases[] = $keyB;
	}
  }

} // ALIASES TOT HIER

// MERGE THE 2 ARRAYS
$profileIdsMerged = array();
foreach( $newarray as $keyB) {
$profileIdsMerged[] = $keyB['profileId'];
}

foreach( $resultsDBArrayAliases as $keyB) {
if( !in_array($keyB['profileId'],$profileIdsMerged) ) {
   $newarray[] = $keyB;
}
 }
// END MERGE OF 2 ARRAYS




$totalcounter = count($newarray);
$displayCount = 0;
if ($totalcounter > 50) {
	

	for($i = 0; $i < 50 ;$i++){
		$q = $newarray[$i]['profileId'];
		$db_type = $newarray[$i]['db_type'];
		if ($db_type == 'Main_db') {
		$dbNewData = DatabaseNewData::getInstanceNewData();
		$db1 = $dbNewData->getConnectionNewData();
		$db_InUse = 'main_db';
		}
		if ($db_type == 'hostgator_db') {
		$dbOldData = DatabaseOldData::getInstanceOldData();
		$db1 = $dbOldData->getConnectionOldData(); 
		$db_InUse = 'hostgator';
		}
		if ($db_type == 'DT_db') {
		$dbDT = DatabaseDT::getInstanceDT();
		$db1 = $dbDT->getConnectionDT(); 
		$db_InUse = 'hostgator';
		}
	
		$profile = "SELECT * FROM `profile` WHERE `profileId` = '{$q}' ";
		$result  = $db1->query($profile);
		//print_r( $result);
		$results = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$db_InUseIntelius        = $db_InUse;
				$uniqueId        = htmlspecialchars($row['profileId']);
				$firstName        = htmlspecialchars($row['firstName']);
				$middleName       = htmlspecialchars($row['middleName']);
				$lastName         = htmlspecialchars($row['lastName']);
				$gender           = htmlspecialchars($row['gender']);
				$dateOfBirth      = htmlspecialchars($row['dateOfBirth']);
				$resultsprofile[] = array(
				'db_InUseIntelius' => $db_InUseIntelius,
				'uniqueId' => $uniqueId,
				'firstName' => $firstName,
				'middleName' => $middleName,
				'lastName' => $lastName,
				'gender' => $gender,
				'dateOfBirth' => $dateOfBirth,
				);
			}
		}
		
		
		$address = "SELECT * FROM `addresses` WHERE `profileId` = '{$q}' ";
		$result  = $db1->query($address);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$houseNumber      = htmlspecialchars($row['houseNumber']);
				$unitNumber       = htmlspecialchars($row['unitNumber']);
				$streetName       = htmlspecialchars($row['streetName']);
				$streetAddress    = htmlspecialchars($row['streetAddress']);
				$city             = htmlspecialchars($row['city']);
				$state            = htmlspecialchars($row['state']);
				$zip              = htmlspecialchars($row['zip']);
				$lastSeen         = htmlspecialchars($row['lastSeen']);
				$firstSeen        = htmlspecialchars($row['firstSeen']);
				$latitude         = htmlspecialchars($row['latitude']);
				$longitude        = htmlspecialchars($row['longitude']);
				$resultsaddress[] = array(
				'houseNumber' => $houseNumber,
				'unitNumber' => $unitNumber,
				'streetName' => $streetName,
				'streetAddress' => $streetAddress,
				'city' => $city,
				'state' => $state,
				'zip' => $zip,
				'lastSeen' => $lastSeen,
				'firstSeen' => $firstSeen,
				'latitude' => $latitude,
				'longitude' => $longitude
				);
			}
		}
		$aliases = "SELECT * FROM `aliases` WHERE `profileId` = '{$q}' ";
		$result  = $db1->query($aliases);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$firstName        = htmlspecialchars($row['firstName']);
				$middleName       = htmlspecialchars($row['middleName']);
				$lastName         = htmlspecialchars($row['lastName']);
				$resultsaliases[] = array(
				'firstName' => $firstName,
				'middleName' => $middleName,
				'lastName' => $lastName
				);
			}
		}
		$education = "SELECT * FROM `education` WHERE `profileId` = '{$q}' ";
		$result    = $db1->query($education);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$degreeSchool       = htmlspecialchars($row['degreeSchool']);
				$degreeTitle        = htmlspecialchars($row['degreeTitle']);
				$degreeMajor        = htmlspecialchars($row['degreeMajor']);
				$resultseducation[] = array(
				'degreeSchool' => $degreeSchool,
				'degreeTitle' => $degreeTitle,
				'degreeMajor' => $degreeMajor
				);
			}
		}
		$emails = "SELECT * FROM `emails` WHERE `profileId` = '{$q}' ";
		$result = $db1->query($emails);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$email          = htmlspecialchars($row['email']);
				$resultsemail[] = array(
				'email' => $email
				);
			}
		}
		
		$phones = "SELECT * FROM `phones` WHERE `profileId` = '{$q}' ";
		$result = $db1->query($phones);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$phoneNumber     = htmlspecialchars($row['phoneNumber']);
				$phoneRegion     = htmlspecialchars($row['phoneRegion']);
				$location        = htmlspecialchars($row['location']);
				$connectionType  = htmlspecialchars($row['connectionType']);
				$resultsphones[] = array(
				'phoneNumber' => $phoneNumber,
				'phoneRegion' => $phoneRegion,
				'location' => $location,
				'connectionType' => $connectionType
				);
			}
		}
		$relatives = "SELECT * FROM `relatives` WHERE `profileId` = '{$q}' ";
		$result    = $db1->query($relatives);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$relativeFirstName    = htmlspecialchars($row['relativeFirstName']);
				$relativeMiddleName   = htmlspecialchars($row['relativeMiddleName']);
				$relativeLastName     = htmlspecialchars($row['relativeLastName']);
				$relativeDateOfBirth  = htmlspecialchars($row['relativeDateOfBirth']);
				$relativeRelationship = htmlspecialchars($row['relativeRelationship']);
				$profileId            = htmlspecialchars($row['relativeProfileId']);
				$resultsrelatives[]   = array(
				'relativeFirstName' => $relativeFirstName,
				'relativeMiddleName' => $relativeMiddleName,
				'relativeLastName' => $relativeLastName,
				'relativeDateOfBirth' => $relativeDateOfBirth,
				'relativeRelationship' => $relativeRelationship,
				'profileId' => $profileId
				);
			}
		}
	
		$workexp = "SELECT * FROM `workexp` WHERE `profileId` = '{$q}' ";
		$result  = $db1->query($workexp);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$companyName      = $row['companyName'];
				$title            = htmlspecialchars($row['title']);
				$division         = htmlspecialchars($row['division']);
				$workStartDate    = htmlspecialchars($row['workStartDate']);
				$workEndDate      = htmlspecialchars($row['workEndDate']);
				$companyDesc      = htmlspecialchars($row["companyDesc"]);
				$resultsworkexp[] = array(
				'companyName' => $companyName,
				'title' => $title,
				'division' => $division,
				'workStartDate' => $workStartDate,
				'workEndDate' => $workEndDate,
				'companyDesc' => $companyDesc
				);
			}
		}
		
		
		
		
		
		$resultscounter[] = array(
		'profile' => $resultsprofile,
		'address' => $resultsaddress,
		'aliases' => $resultsaliases,
		'education' => $resultseducation,
		'emails' => $resultsemail,
		
		'phones' => $resultsphones,
		'relatives' => $resultsrelatives,
		'workexp' => $resultsworkexp
		);
		

		
//		var_dump($resultscounter);
//		unset($resultscounter);
		unset($resultsprofile);
		unset($resultsaddress);
		unset($resultsaliases);
		unset($resultsemail);
		
		unset($resultsphones);
		unset($resultseducation);
		unset($resultsrelatives);
		unset($resultsworkexp);
		$resultsprofile = NULL;
		$resultsaddress = NULL;
		$resultseducation = NULL;
		$resultsemail = NULL;
		$resultsphones = NULL;
		$resultsrelatives = NULL;
		$resultsworkexp = NULL;
		$resultsaliases = NULL;
//		$i++;
//		echo json_encode($resultsa, JSON_UNESCAPED_UNICODE);

		$displayCount = 50;
	}	
}
else{
	for($i = 0; $i < $totalcounter ;$i++){
		$displayCount++;
		$q = $newarray[$i]['profileId'];
		$db_type = $newarray[$i]['db_type'];
		if ($db_type == 'Main_db') {
		$dbNewData = DatabaseNewData::getInstanceNewData();
		$db1 = $dbNewData->getConnectionNewData();
		$db_InUse = 'main_db';
		}
		if ($db_type == 'hostgator_db') {
		$dbOldData = DatabaseOldData::getInstanceOldData();
		$db1 = $dbOldData->getConnectionOldData(); 
		$db_InUse = 'hostgator';
		}
		if ($db_type == 'DT_db') {
		$dbDT = DatabaseDT::getInstanceDT();
		$db1 = $dbDT->getConnectionDT(); 
		$db_InUse = 'hostgator';
		}
	
		$profile = "SELECT * FROM `profile` WHERE `profileId` = '{$q}' ";
		$result  = $db1->query($profile);
		//print_r( $result);
		$results = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$db_InUseIntelius        = $db_InUse;
				$uniqueId        = htmlspecialchars($row['profileId']);
				$firstName        = htmlspecialchars($row['firstName']);
				$middleName       = htmlspecialchars($row['middleName']);
				$lastName         = htmlspecialchars($row['lastName']);
				$gender           = htmlspecialchars($row['gender']);
				$dateOfBirth      = htmlspecialchars($row['dateOfBirth']);
				$resultsprofile[] = array(
				'db_InUseIntelius' => $db_InUseIntelius,
				'uniqueId' => $uniqueId,
				'firstName' => $firstName,
				'middleName' => $middleName,
				'lastName' => $lastName,
				'gender' => $gender,
				'dateOfBirth' => $dateOfBirth,
				);
			}
		}
		
		
		$address = "SELECT * FROM `addresses` WHERE `profileId` = '{$q}' ";
		$result  = $db1->query($address);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$houseNumber      = htmlspecialchars($row['houseNumber']);
				$unitNumber       = htmlspecialchars($row['unitNumber']);
				$streetName       = htmlspecialchars($row['streetName']);
				$streetAddress    = htmlspecialchars($row['streetAddress']);
				$city             = htmlspecialchars($row['city']);
				$state            = htmlspecialchars($row['state']);
				$zip              = htmlspecialchars($row['zip']);
				$lastSeen         = htmlspecialchars($row['lastSeen']);
				$firstSeen        = htmlspecialchars($row['firstSeen']);
				$latitude         = htmlspecialchars($row['latitude']);
				$longitude        = htmlspecialchars($row['longitude']);
				$resultsaddress[] = array(
				'houseNumber' => $houseNumber,
				'unitNumber' => $unitNumber,
				'streetName' => $streetName,
				'streetAddress' => $streetAddress,
				'city' => $city,
				'state' => $state,
				'zip' => $zip,
				'lastSeen' => $lastSeen,
				'firstSeen' => $firstSeen,
				'latitude' => $latitude,
				'longitude' => $longitude
				);
			}
		}
		$aliases = "SELECT * FROM `aliases` WHERE `profileId` = '{$q}' ";
		$result  = $db1->query($aliases);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$firstName        = htmlspecialchars($row['firstName']);
				$middleName       = htmlspecialchars($row['middleName']);
				$lastName         = htmlspecialchars($row['lastName']);
				$resultsaliases[] = array(
				'firstName' => $firstName,
				'middleName' => $middleName,
				'lastName' => $lastName
				);
			}
		}
		$education = "SELECT * FROM `education` WHERE `profileId` = '{$q}' ";
		$result    = $db1->query($education);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$degreeSchool       = htmlspecialchars($row['degreeSchool']);
				$degreeTitle        = htmlspecialchars($row['degreeTitle']);
				$degreeMajor        = htmlspecialchars($row['degreeMajor']);
				$resultseducation[] = array(
				'degreeSchool' => $degreeSchool,
				'degreeTitle' => $degreeTitle,
				'degreeMajor' => $degreeMajor
				);
			}
		}
		$emails = "SELECT * FROM `emails` WHERE `profileId` = '{$q}' ";
		$result = $db1->query($emails);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$email          = htmlspecialchars($row['email']);
				$resultsemail[] = array(
				'email' => $email
				);
			}
		}
		
		$phones = "SELECT * FROM `phones` WHERE `profileId` = '{$q}' ";
		$result = $db1->query($phones);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$phoneNumber     = htmlspecialchars($row['phoneNumber']);
				$phoneRegion     = htmlspecialchars($row['phoneRegion']);
				$location        = htmlspecialchars($row['location']);
				$connectionType  = htmlspecialchars($row['connectionType']);
				$resultsphones[] = array(
				'phoneNumber' => $phoneNumber,
				'phoneRegion' => $phoneRegion,
				'location' => $location,
				'connectionType' => $connectionType
				);
			}
		}
		$relatives = "SELECT * FROM `relatives` WHERE `profileId` = '{$q}' ";
		$result    = $db1->query($relatives);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$relativeFirstName    = htmlspecialchars($row['relativeFirstName']);
				$relativeMiddleName   = htmlspecialchars($row['relativeMiddleName']);
				$relativeLastName     = htmlspecialchars($row['relativeLastName']);
				$relativeDateOfBirth  = htmlspecialchars($row['relativeDateOfBirth']);
				$relativeRelationship = htmlspecialchars($row['relativeRelationship']);
				$profileId            = htmlspecialchars($row['relativeProfileId']);
				$resultsrelatives[]   = array(
				'relativeFirstName' => $relativeFirstName,
				'relativeMiddleName' => $relativeMiddleName,
				'relativeLastName' => $relativeLastName,
				'relativeDateOfBirth' => $relativeDateOfBirth,
				'relativeRelationship' => $relativeRelationship,
				'profileId' => $profileId
				);
			}
		}
	
		$workexp = "SELECT * FROM `workexp` WHERE `profileId` = '{$q}' ";
		$result  = $db1->query($workexp);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$companyName      = $row['companyName'];
				$title            = htmlspecialchars($row['title']);
				$division         = htmlspecialchars($row['division']);
				$workStartDate    = htmlspecialchars($row['workStartDate']);
				$workEndDate      = htmlspecialchars($row['workEndDate']);
				$companyDesc      = htmlspecialchars($row["companyDesc"]);
				$resultsworkexp[] = array(
				'companyName' => $companyName,
				'title' => $title,
				'division' => $division,
				'workStartDate' => $workStartDate,
				'workEndDate' => $workEndDate,
				'companyDesc' => $companyDesc
				);
			}
		}
		
		
		
		
		
		$resultscounter[] = array(
		'profile' => $resultsprofile,
		'address' => $resultsaddress,
		'aliases' => $resultsaliases,
		'education' => $resultseducation,
		'emails' => $resultsemail,
		
		'phones' => $resultsphones,
		'relatives' => $resultsrelatives,
		'workexp' => $resultsworkexp
		);
		

		
//		var_dump($resultscounter);
//		unset($resultscounter);
		unset($resultsprofile);
		unset($resultsaddress);
		unset($resultsaliases);
		unset($resultsemail);
		
		unset($resultsphones);
		unset($resultseducation);
		unset($resultsrelatives);
		unset($resultsworkexp);
		$resultsprofile = NULL;
		$resultsaddress = NULL;
		$resultseducation = NULL;
		$resultsemail = NULL;
		$resultsphones = NULL;
		$resultsrelatives = NULL;
		$resultsworkexp = NULL;
		$resultsaliases = NULL;
//		$i++;
//		echo json_encode($resultsa, JSON_UNESCAPED_UNICODE);
	
	}
}
$finaljson[] = array(
	'profileTotal' => $totalcounter,
	'displayTotal' => $displayCount,
	'profileList' => $resultscounter
);
//var_dump($finaljson[0]);
$finaljson = (json_encode($finaljson[0]));
echo $finaljson;
/////////// START HERE

// EXPERIAN STARTS HERE


//echo $finaljson;
?>

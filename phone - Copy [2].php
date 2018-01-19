<?php
error_reporting(0);
ini_set('max_execution_time', 300);
ini_set('display_errors', 0); 
define("_WOJO", true);
require_once("dashboard/init.php");
error_reporting(0);
function clean($string) {
while (strpos(substr($string, -1), ' ') !== false) 
$string = substr($string, 0, -1);
$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
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
require_once ('experianFunctions.php');
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

$phoneSearch = $_GET['phone'];

if ((($phoneSearch == '') || ($phoneSearch == NULL))) {
header('Location: 404.php');
} 
$phoneSearchClean = $phoneSearch;
$phoneSearchCleanExperian = phoneDeFormat($phoneSearch);
$phoneSearch = phoneFormat($phoneSearch);

$webTitle = 'Phone Search for '. $phoneSearch;

$i = 0;
	

$searchquery = "SELECT profileId FROM `phones` WHERE `phoneNumber` = '$phoneSearch' LIMIT 500"; 
$result  = $db1->query($searchquery);
$arr = array();
$totalcounter = $result->num_rows;
//$j = $totalcounter;

		$resultsDBArray = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$profileId        = $row['profileId'];
				$resultsDBArray[] = array(
				'profileId' => $profileId,
				'db_type' => 'Main_db'
				);
			}
		}
	
$searchquery = "SELECT profileId FROM `phones` WHERE `phoneNumber` = '$phoneSearch' LIMIT 500"; 
$result  = $db2->query($searchquery);
$arr = array();
$totalcounter = $result->num_rows;
//$j = $totalcounter;

		$resultsDBArrayOld = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$profileId        = $row['profileId'];
				$resultsDBArrayOld[] = array(
				'profileId' => $profileId,
				'db_type' => 'hostgator_db'
				);
			}
		}
			

$searchquery = "SELECT profileId FROM `phones` WHERE `phoneNumber` = '$phoneSearch' LIMIT 500"; 
$result  = $db3->query($searchquery);
$arr = array();
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
   foreach( $resultsDBDT as $keyB) {
 if( !in_array($keyB['profileId'],$resultsDBArray) ) {
    $resultsDBArray[] = $keyB;
	}
  }
//var_dump($resultsDBArray);
//var_dump($resultsDBDT);

//$newarray = array_merge($resultsDBArray,$resultsDBDT);
$newarray = $resultsDBArray;

// END MERGE OF 2 ARRAYS




  $totalcounter = count($newarray);
  $j = $totalcounter;
if ($totalcounter > 0) {
	
//	foreach ($arr as $value) {
	for($i = 0; $i < $totalcounter ;$i++){
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
		$externalprofiles = "SELECT * FROM `externalprofiles` WHERE `profileId` = '{$q}' ";
		$result           = $db1->query($externalprofiles);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$externalType              = htmlspecialchars($row['externalType']);
				$externalUri               = htmlspecialchars($row['externalUri']);
				$resultsexternalprofiles[] = array(
				'externalType' => $externalType,
				'externalUri' => $externalUri
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
		'externalprofiles' => $resultsexternalprofiles,
		'phones' => $resultsphones,
		'relatives' => $resultsrelatives,
		'workexp' => $resultsworkexp
		);
		
		$resultsa[] = array(
		'profileTotal' => $j,
		'profileCount' => $i, 
		$i => $resultscounter
		);
		
//		var_dump($resultscounter);
		unset($resultscounter);
		unset($resultsprofile);
		unset($resultsaddress);
		unset($resultsaliases);
		unset($resultsemail);
		unset($resultsexternalprofiles);
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


$profileTotal = $resultsa[0]["profileTotal"];

//echo json_encode($resultsa, ENT_QUOTES, 'UTF-8');
//$json_encode = json_encode($resultsa, JSON_UNESCAPED_UNICODE);

//$json_decode = htmlspecialchars(json_encode($json_encode), ENT_QUOTES, 'UTF-8');
//echo $json_decode;
} 
/////////// START HERE

// EXPERIAN STARTS HERE
$searchquery = "SELECT id, ADDR FROM `datanew` WHERE `PHONE` = '$phoneSearchCleanExperian' LIMIT 500"; 
$result  = $dbExperianConnect->query($searchquery);
$totalcounterExperian = $result->num_rows;
//$j = $totalcounter;

		$resultsDBArrayExperian = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$profileId        = $row['id'];
				$ADDR        = $row['ADDR'];
				$resultsDBArrayExperian[] = array(
				'profileId' => $profileId,
				'ADDR' => $ADDR,
				'db_type' => 'Experian_db'
				);
			}
		}
$searchquery = "SELECT id, ADDR FROM `data` WHERE `PHONE` = '$phoneSearchCleanExperian' LIMIT 500"; 

$result  = $dbExperianConnectOld->query($searchquery);
$totalcounterExperianNew = $result->num_rows;
//$j = $totalcounter;

		$resultsDBArrayExperianOld = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$profileId        = $row['id'];
				$ADDR        = $row['ADDR'];
				$resultsDBArrayExperianOld[] = array(
				'profileId' => $profileId,
				'ADDR' => $ADDR,
				'db_type' => 'ExperianOld_db'
				);
			}
		}
	
$profileIds = array();
foreach( $resultsDBArrayExperian as $keyB) {
	$profileIds[] = $keyB['ADDR'];
}

 foreach( $resultsDBArrayExperianOld as $keyB) {
 if( !in_array($keyB['ADDR'],$profileIds) ) {
    $resultsDBArrayCompleteExperian[] = $keyB;
	}
  }

  $totalcounterExperian = $totalcounterExperian + $totalcounterExperianNew;
  $totalExperianArray = (array)$resultsDBArrayExperian + (array)$resultsDBArrayExperianOld;
//  $totalExperianArray = array_merge($resultsDBArrayExperian, $resultsDBArrayExperianOld);

//var_dump($totalExperianArray);
//var_dump($resultsDBArrayExperianOld);

  $jCount = $totalcounterExperian;
if ($totalcounterExperian > 0) {
	
//	foreach ($arr as $value) {
	for($i = 0; $i < $totalcounterExperian ;$i++){
		$q = $totalExperianArray[$i]['profileId'];
		$db_type = $totalExperianArray[$i]['db_type'];
		if ($db_type == 'Experian_db') {
		$dbExperian = DatabaseExperian::getInstanceExperian(); // DiscoverThem
		$dbExperianConnect = $dbExperian->getConnectionExperian();  // Initial DB
		$db_InUse = 'datanew';
		}
		if ($db_type == 'ExperianOld_db') {
		$dbExperianOld = DatabaseExperianOld::getInstanceExperianOld(); // DiscoverThem
		$dbExperianConnect = $dbExperianOld->getConnectionExperianOld();  // Initial DB
		$db_InUse = 'data';
		}
		
		$profile = "SELECT * FROM `$db_InUse` WHERE `id` = '{$q}' ";
		$result  = $dbExperianConnect->query($profile);
		//print_r( $result);
		$results = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$experianDbType = $db_type;
				$uniqueId        = htmlspecialchars($row['id']);
				$firstName        = htmlspecialchars($row['FN']);
				$firstNameExperian        = htmlspecialchars($row['FN']);
				$middleName       = htmlspecialchars($row['MI']);
				$lastName         = htmlspecialchars($row['LN']);
				$lastNameExperian         = htmlspecialchars($row['LN']);
				$street        = htmlspecialchars($row['ADDR']);
				$streetExperian        = htmlspecialchars($row['ADDR']);
				$city       = htmlspecialchars($row['CITY']);
				$state         = htmlspecialchars($row['ST']);
				$zip        = htmlspecialchars($row['ZIP']);
				$phone       = htmlspecialchars($row['PHONE']);
				$dobYear         = htmlspecialchars($row['DOB_YR']);
				$dobMonth        = htmlspecialchars($row['DOB_MON']);
				$dobDay       = htmlspecialchars($row['DOB_DAY']);
				$education         = htmlspecialchars($row['EDUC']);
				$occupation        = htmlspecialchars($row['OCC_OCCUP']);
				$email       = htmlspecialchars($row['EMAIL']);
				$resultsprofile[] = array(
				'experianDbType' => $experianDbType,	
				'uniqueId' => $uniqueId,
				'firstName' => $firstName,
				'middleName' => $middleName,
				'lastName' => $lastName,
				'street' => $street,
				'city' => $city,
				'state' => $state,	
				'zip' => $zip,
				'phone' => $phone,
				'dobYear' => $dobYear,
				'dobMonth' => $dobMonth,
				'dobDay' => $dobDay,
				'education' => $education,
				'occupation' => $occupation,
				'email' => $email,														
				);
			}
		}
		
	$relatives = "SELECT * FROM `$db_InUse` WHERE `ADDR` = '{$streetExperian}' and `LN` = '{$lastNameExperian}' and `FN` != '{$firstNameExperian}'  ";

		$result    = $dbExperianConnect->query($relatives);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$relativeFirstName    = htmlspecialchars($row['FN']);
				$relativeMiddleName   = htmlspecialchars($row['MI']);
				$relativeLastName     = htmlspecialchars($row['LN']);
				$resultsrelatives[]   = array(
				'relativeFirstName' => $relativeFirstName,
				'relativeMiddleName' => $relativeMiddleName,
				'relativeLastName' => $relativeLastName,
				);
			}
		}	

		
		
		
		
		$resultscounter[] = array(
		
		'profile' => $resultsprofile,
		'relatives' => $resultsrelatives,
		
		);
		
		$resultsExperian[] = array(
		'profileTotal' => $jCount,
		'profileCount' => $i, 
		$i => $resultscounter
		);
		

		unset($resultscounter);
		unset($resultsprofile);
		unset($resultsrelatives);
$resultsprofile = NULL;
		$resultsrelatives = NULL;
	}	


$profileTotalExperian = $resultsExperian[0]["profileTotal"];

} 
////////// EXPERIAN ENDS HERE


// ScanThem STARTS HERE
$searchquery = "SELECT uniqueId FROM `phone` WHERE `phones` = '$phoneSearch' LIMIT 500"; 

$result  = $dbScanThemConnect->query($searchquery);
$totalcounterNew = $result->num_rows;

//$j = $totalcounter;

		$resultsDBNew = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$profileId        = $row['uniqueId'];
				$resultsDBArrayScanThem[] = array(
				'profileId' => $profileId,
				'db_type' => 'ScanThem_db'
				);
			}
		}
	
  $jCount = $totalcounterNew;
if ($totalcounterNew > 0) {
	
//	foreach ($arr as $value) {
	for($i = 0; $i < $totalcounterNew ;$i++){
		$q = $resultsDBArrayScanThem[$i]['profileId'];
		$db_type = $resultsDBArrayScanThem[$i]['db_type'];
		if ($db_type == 'ScanThem_db') {
		$dbScanThem = DatabaseScanThem::getInstanceScanThem();
		$dbScanThemConnect = $dbScanThem->getConnectionScanThem(); 
		$db_InUse = 'ScanThem_db';
		}
	
		$profile = "SELECT * FROM `basic` WHERE `uniqueId` = '{$q}' ";
		$result  = $dbScanThemConnect->query($profile);
		//print_r( $result);
		$results = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$uniqueId        = htmlspecialchars($row['uniqueId']);
				$firstName        = htmlspecialchars($row['firstName']);
				$middleName       = htmlspecialchars($row['middleName']);
				$lastName         = htmlspecialchars($row['lastName']);
				$age           = htmlspecialchars($row['age']);
				$resultsprofile[] = array(
				'uniqueId' => $uniqueId,
				'firstName' => $firstName,
				'middleName' => $middleName,
				'lastName' => $lastName,
				'age' => $age,
				);
			}
		}
		
		
		$address = "SELECT * FROM `address` WHERE `uniqueId` = '{$q}' ";

		$result  = $dbScanThemConnect->query($address);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$street       = htmlspecialchars($row['street']);
				$city             = htmlspecialchars($row['city']);
				$state            = htmlspecialchars($row['state']);
				$zip              = htmlspecialchars($row['zip']);
				$resultsaddress[] = array(				
				'street' => $street,
				'city' => $city,
				'state' => $state,
				'zip' => $zip,
				);
			}
		}
		$aliases = "SELECT * FROM `aliases` WHERE `uniqueId` = '{$q}' ";
		$result  = $dbScanThemConnect->query($aliases);
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
		$emails = "SELECT * FROM `email` WHERE `uniqueId` = '{$q}' ";
		$result = $dbScanThemConnect->query($emails);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$email          = htmlspecialchars($row['emails']);
				$resultsemail[] = array(
				'email' => $email
				);
			}
		}
		$phones = "SELECT * FROM `phone` WHERE `uniqueId` = '{$q}' ";
		$result = $dbScanThemConnect->query($phones);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$phones     = htmlspecialchars($row['phones']);
				$resultsphones[] = array(
				'phoneNumber' => $phones,
				);
			}
		}
		$relatives = "SELECT * FROM `relatives` WHERE `uniqueId` = '{$q}' ";
		$result    = $dbScanThemConnect->query($relatives);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$relativeFirstName    = htmlspecialchars($row['firstName']);
				$relativeMiddleName   = htmlspecialchars($row['middleName']);
				$relativeLastName     = htmlspecialchars($row['lastName']);
				$resultsrelatives[]   = array(
				'relativeFirstName' => $relativeFirstName,
				'relativeMiddleName' => $relativeMiddleName,
				'relativeLastName' => $relativeLastName,
				);
			}
		}
	
		$workexp = "SELECT * FROM `businesses` WHERE `uniqueId` = '{$q}' ";
		$result  = $dbScanThemConnect->query($workexp);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$companyName      = $row['company'];
				$resultsworkexp[] = array(
				'companyName' => $companyName,
				);
			}
		}
		
		
		
		
		
		$resultscounter[] = array(
		
		'profile' => $resultsprofile,
		'address' => $resultsaddress,
		'aliases' => $resultsaliases,
		'emails' => $resultsemail,
		'phones' => $resultsphones,
		'relatives' => $resultsrelatives,
		'workexp' => $resultsworkexp
		);
		
		$resultsScanThem[] = array(
		'profileTotal' => $jCount,
		'profileCount' => $i, 
		$i => $resultscounter
		);
		

		unset($resultscounter);
		unset($resultsprofile);
		unset($resultsaddress);
		unset($resultsaliases);
		unset($resultsemail);
		unset($resultsphones);
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
	}	

$profileTotal = $resultsa[0]["profileTotal"];

} 
////////// SCAN THEM ENDS HERE




$profileTotalScanThem = $resultsScanThem[0]["profileTotal"];
$profileTotalCombined = $profileTotal + $profileTotalScanThem + $profileTotalExperian;


?>

<!DOCTYPE html>

<html lang="en">



<head>

	<title><?php echo 'Phone Results For '. ucwords($phoneSearch);?></title>

	<!-- META TAGS -->

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- FAV ICON(BROWSER TAB ICON) -->

	<link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">

	<!-- GOOGLE FONT -->

	<link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:500,700" rel="stylesheet">

	<!-- FONTAWESOME ICONS -->

	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- ALL CSS FILES -->

	<link href="css/materialize.css" rel="stylesheet">

	<link href="css/style.css" rel="stylesheet">
<link href="css/styleProfile.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />

	<!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->

	<link href="css/responsive.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

	<!--[if lt IE 9]>

	<script src="js/html5shiv.js"></script>

	<script src="js/respond.min.js"></script>

	<![endif]-->
    
  <style>
.wojo.small.message {
	display:none !important;
}
</style>





    <script type="text/javascript" src="https://speedyhunt.com/dashboard/assets/jquery.js"></script>
<script type="text/javascript" src="https://speedyhunt.com/dashboard/assets/global.js"></script>
<link href="css/master_main.css" rel="stylesheet" type="text/css" />


</head>



<body>



	<!--TOP SEARCH SECTION-->

		<?php include('headerInner.php'); ?>

	<section class="dir-alp dir-pa-sp-top" style="background: rgba(248,80,50,1);
background: -moz-radial-gradient(center, ellipse cover, rgba(248,80,50,1) 0%, rgba(1,82,243,1) 0%, rgba(21,31,49,1) 100%);
background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(248,80,50,1)), color-stop(0%, rgba(1,82,243,1)), color-stop(100%, rgba(21,31,49,1)));
background: -webkit-radial-gradient(center, ellipse cover, rgba(248,80,50,1) 0%, rgba(1,82,243,1) 0%, rgba(21,31,49,1) 100%);
background: -o-radial-gradient(center, ellipse cover, rgba(248,80,50,1) 0%, rgba(1,82,243,1) 0%, rgba(21,31,49,1) 100%);
background: -ms-radial-gradient(center, ellipse cover, rgba(248,80,50,1) 0%, rgba(1,82,243,1) 0%, rgba(21,31,49,1) 100%);
background: radial-gradient(ellipse at center, rgba(248,80,50,1) 0%, rgba(1,82,243,1) 0%, rgba(21,31,49,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f85032', endColorstr='#151f31', GradientType=1 );

">

		<div class="container">

			<div class="row">

				<div class="dir-alp-tit">

					<h1><?php echo strtoupper($first) . ' ' . strtoupper($last); ?></h1>

					<ol class="breadcrumb">

						<li><a href="#">Home</a> </li>

						

						<li class="active" style="color:#fff;"><?php echo strtoupper($phoneSearch); ?></li>

					</ol>

				</div>

			</div>

			<div class="row">

				<div class="dir-alp-con">

                <div>
                <div id="mobilemenu" style="display:none;">
<ul class="collapsible" data-collapsible="accordion" style="margin-top:0px !important;">
							<li>
								<div class="collapsible-header"><i class="material-icons">search</i>Search Results</div>
								<div class="collapsible-body"><ul>

                              

                              	 <li><a class="active" href="#people">People (<?php if ($profileTotalCombined == 1551) {
	echo $profileTotalCombined.'+';} else { echo $profileTotalCombined;} ?>)</a> </li>

									

								</ul></div>
							</li>
							<li>
								<div class="collapsible-header"><i class="material-icons">find_replace</i>Premium</div>
								<div class="collapsible-body"><div class="col-md-3 dir-alp-con-left">

						<div class="dir-alp-con-left-1">

							<h3>Get Premium!</h3> </div>

						<div class="dir-hom-pre dir-alp-left-ner-notb">

							<ul>

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="register.php">

										<div class="list-left-near lln1"> <i class="fa fa-users" style="font-size:25px;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>People Search</h5>  </div>

										<div class="list-left-near lln3"><i class="fa fa-unlock-alt" style="font-size:25px;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="register.php">

										<div class="list-left-near lln1"> <i class="fa fa-lock" style="font-size:25px;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Arrest Search</h5>  </div>

										<div class="list-left-near lln3"> <i class="fa fa-unlock-alt" style="font-size:25px;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="register.php">

										<div class="list-left-near lln1"> <i class="fa fa-venus-mars" style="font-size:25px;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Sex Offender Search</h5>  </div>

										<div class="list-left-near lln3"><i class="fa fa-unlock-alt" style="font-size:25px;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="register.php">

										<div class="list-left-near lln1"> <i class="fa fa-phone" style="font-size:25px;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Reverse Phone</h5>  </div>

										<div class="list-left-near lln3"><i class="fa fa-unlock-alt" style="font-size:25px;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="register.php">

										<div class="list-left-near lln1"> <i class="fa fa-envelope" style="font-size:25px;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Reverse Emails</h5>  </div>

										<div class="list-left-near lln3"><i class="fa fa-unlock-alt" style="font-size:25px;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="register.php">

										<div class="list-left-near lln1">  <i class="fa fa-building" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Company Search</h5>  </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="register.php">

										<div class="list-left-near lln1"><i class="fa fa-graduation-cap" style="font-size:25px;color:orange;" aria-hidden="true"></i></div>

										<div class="list-left-near lln2">

											<h5>Education Search</h5>  </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

                                <li>

									<a href="register.php">

										<div class="list-left-near lln1"><i class="fa fa-sticky-note" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Voter Records</h5>  </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

                                <li>

									<a href="register.php"> 

										<div class="list-left-near lln1"><i class="fa fa-file" style="font-size:25px;color:orange;" aria-hidden="true"></i></div>

										<div class="list-left-near lln2">

											<h5>Patent Records</h5>  </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

                               

                                  <li>

									<a href="register.php">

										<div class="list-left-near lln1"><i class="fa fa-home" style="font-size:25px;color:orange;" aria-hidden="true"></i></div>

										<div class="list-left-near lln2">

											<h5>Property Records</h5>  </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

                                    <li>

									<a href="register.php">

										<div class="list-left-near lln1"><i class="fa fa-info-circle" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>And more...</h5>  </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

							</ul>

						</div>

		

					</div></div>
							</li>
												</ul>
                        </div>

								<ul class="tabs pg-ele-tab" id="desktopsearch">

                                <i class="fa fa-search tab col" style="padding: 0 24px; font-size:25px;"  aria-hidden="true"></i>

                              		<li class="tab col"><a class="active" href="#people">People (<?php if ($profileTotalCombined == 1551) {
	echo $profileTotalCombined.'+';} else { echo $profileTotalCombined;} ?>)</a> </li>

									

								</ul>

							</div>

					<div class="col-md-3 dir-alp-con-left" id="premiumdesktop">

						<div class="dir-alp-con-left-1">

							<h3>Get Premium!</h3> </div>

						<div class="dir-hom-pre dir-alp-left-ner-notb">

							<ul>

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="register.php">

										<div class="list-left-near lln1"> <i class="fa fa-users" style="font-size:25px;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>People Search</h5>  </div>

										<div class="list-left-near lln3"><i class="fa fa-unlock-alt" style="font-size:25px;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="register.php">

										<div class="list-left-near lln1"> <i class="fa fa-lock" style="font-size:25px;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Arrest Search</h5>  </div>

										<div class="list-left-near lln3"> <i class="fa fa-unlock-alt" style="font-size:25px;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="register.php">

										<div class="list-left-near lln1"> <i class="fa fa-venus-mars" style="font-size:25px;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Sex Offender Search</h5>  </div>

										<div class="list-left-near lln3"><i class="fa fa-unlock-alt" style="font-size:25px;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="register.php">

										<div class="list-left-near lln1"> <i class="fa fa-phone" style="font-size:25px" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Reverse Phone</h5>  </div>

										<div class="list-left-near lln3"><i class="fa fa-unlock-alt" style="font-size:25px;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="register.php">

										<div class="list-left-near lln1"> <i class="fa fa-envelope" style="font-size:25px;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Reverse Emails</h5>  </div>

										<div class="list-left-near lln3"><i class="fa fa-unlock-alt" style="font-size:25px;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="register.php">

										<div class="list-left-near lln1">  <i class="fa fa-building" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Company Search</h5>  </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="register.php">

										<div class="list-left-near lln1"><i class="fa fa-graduation-cap" style="font-size:25px;color:orange;" aria-hidden="true"></i></div>

										<div class="list-left-near lln2">

											<h5>Education Search</h5>  </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

                                <li>

									<a href="register.php">

										<div class="list-left-near lln1"><i class="fa fa-sticky-note" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Voter Records</h5>  </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

                                <li>

									<a href="register.php"> 

										<div class="list-left-near lln1"><i class="fa fa-file" style="font-size:25px;color:orange;" aria-hidden="true"></i></div>

										<div class="list-left-near lln2">

											<h5>Patent Records</h5>  </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

                               

                                  <li>

									<a href="register.php">

										<div class="list-left-near lln1"><i class="fa fa-home" style="font-size:25px;color:orange;" aria-hidden="true"></i></div>

										<div class="list-left-near lln2">

											<h5>Property Records</h5>  </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

                                    <li>

									<a href="register.php">

										<div class="list-left-near lln1"><i class="fa fa-info-circle" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>And more...</h5>  </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

							</ul>

						</div>

						<!--==========Sub Category Filter============-->

						

						<!--==========End Sub Category Filter============-->

						<!--==========Sub Category Filter============-->

						

						<!--==========End Sub Category Filter============-->

						<!--==========Sub Category Filter============-->

						

						<!--==========End Sub Category Filter============-->

					</div>

                   

                    <div class="pg-elem-inn ele-btn" style="margin:0px !important;">

                    <div class="col-md-9 dir-alp-con-right" id="people">

						<div class="dir-alp-con-right-1">

							<div class="row">

								<!--LISTINGS-->

                                  <?php
								  
if ($profileTotalCombined == 0) {

    echo '	  <div class="pglist-p-com-ti">

								<h3><span>No Results</span> Available</h3> </div>

								<div class="list-pg-inn-sp">

								<div class="list-pg-write-rev">

										<form name="frm" method="POST" action="" class="col">

										<p>Do you feel like we are missing a phone record for <strong>' . strtoupper($phoneSearch) . '? Not a problem, give us your details and we will shoot over an email as soon as we find the result you are looking for:</p>

										<div class="row">

											<div class="col s12">

											

											</div>

										</div>

										<div class="row">

											<div class="input-field col s6">

												<input id="name" type="text" class="validate">

												<label for="re_name" class="">Full Name</label>

											</div>

											<div class="input-field col s6">

												<input id="mobile" type="number" class="validate">

												<label for="re_mob">Mobile</label>

											</div>

										</div>

										<div class="row">

											<div class="input-field col s6">

												<input id="email" type="email" class="validate">

												<label for="re_mail">Email</label>

											</div>

											<div class="input-field col s6">

												<input id="stateinput" type="text" class="validate">

												<label for="re_city">State/City</label>

											</div>

										</div>

										<div class="row">

											<div class="input-field col s12">

												<textarea id="comments" class="materialize-textarea"></textarea>

												<label for="re_msg">Anything you can add to help aid our search</label>

											</div>

										</div>

										<div class="row">
<div class="input-field col s12"><input type="submit" name="Update" id="update" value="Find me details about ' . $phoneSearch .'" class="waves-effect waves-light btn-large full-btn" /></div>
											

										</div>

									</form>
								</div>

							</div>';
}
?>

							<?php
		
for($k = 0; $k < $profileTotal ;$k++){
$addressCounter =  count($resultsa[$k][$k][0]['address']);
$phoneCounter =  count($resultsa[$k][$k][0]['phones']);
$emailCounter =  count($resultsa[$k][$k][0]['emails']);
$aliasesCounter =  count($resultsa[$k][$k][0]['aliases']);
$educationCounter =  count($resultsa[$k][$k][0]['education']);
$workCounter =  count($resultsa[$k][$k][0]['workexp']);
$relativesCounter =  count($resultsa[$k][$k][0]['relatives']);
//echo 'addresscounter'.$addressCounter;

$uniqueId = $resultsa[$k][$k][0]['profile'][0]["uniqueId"];
$db_InUseIntelius = $resultsa[$k][$k][0]['profile'][0]["db_InUseIntelius"];
$uniqueIdRemoval = $resultsa[$k][$k][0]['profile'][0]["uniqueId"];
$uniqueId = base64_encode($uniqueId);
$db_InUseIntelius = base64_encode($db_InUseIntelius);
$uniqueId = '__'.$uniqueId.'&d=i&t='.$db_InUseIntelius.'';
    $firstname = $resultsa[$k][$k][0]['profile'][0]["firstName"];
	   $middleName  = $resultsa[$k][$k][0]['profile'][0]["middleName"];
       $lastName    = $resultsa[$k][$k][0]['profile'][0]["lastName"];
     $gender      = $resultsa[$k][$k][0]['profile'][0]["gender"];
    $dateOfBirth = $resultsa[$k][$k][0]['profile'][0]["dateOfBirth"];
	$fullname = $firstname.' '.$middleName.' '.$lastName;
    echo '            <div class="home-list-pop list-spac">

									<!--LISTINGS IMAGE-->

									<div class="col-md-3" id="mobileicon"> <img src="images/usericon.png" alt="" /> </div>

									<!--LISTINGS: CONTENT-->

									<div class="col-md-9 home-list-pop-desc inn-list-pop-desc" style="float:left;"> <a href="profile.php?unique='.$uniqueId.'"><h3>' . $fullname . ', ' . ageCalculator($dateOfBirth) . '</h3></a>

										<h4>DOB : ' . $dateOfBirth . '</h4>
<div class="col-md-6 home-list-pop-desc inn-list-pop-desc" style="float:left;">
										<p><b>Address: </b>';
    for ($l = 0; $l < 2; $l++) {
	  // echo $addressCounter << die execute reg, soveel keer vir soveel addresse.

 	$addressStreetAddress = $resultsa[$k][$k][0]['address'][$l]["streetAddress"];
    $addressCity  = $resultsa[$k][$k][0]['address'][$l]["city"];
    $addressState  = $resultsa[$k][$k][0]['address'][$l]["state"];
    $addressZip =  $resultsa[$k][$k][0]['address'][$l]["zip"];
    $fulladdress = $addressStreetAddress.', '.$addressCity.', '.$addressState;
	if ($fulladdress !== ', , ' ) { 
	 echo '<li>'.$fulladdress.'</li> ';
	}
    }

	if ($addressCounter <= 2 ) { 
	echo '<a href="profile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li>Search for more </li></a> <br/>'; }
	else {
	 echo '<a href="profile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li>and atleast '.($addressCounter - 2).' more </li></a> <br/>'; }
    echo '</p>
	</div>
	
<div class="col-md-6 home-list-pop-desc inn-list-pop-desc" style="float:left;">
										<p><b>Associated With: </b>';
    for ($o = 0; $o < 2; $o++) {
	  // echo $addressCounter << die execute reg, soveel keer vir soveel addresse.
				$relativeFirstName     = $resultsa[$k][$k][0]['relatives'][$o]["relativeFirstName"];
                $relativeMiddleName    = $resultsa[$k][$k][0]['relatives'][$o]["relativeMiddleName"];
                $relativeLastName      = $resultsa[$k][$k][0]['relatives'][$o]["relativeLastName"];
				$relativeFullName = $relativeFirstName.' '.$relativeMiddleName.' '.$relativeLastName;
	  echo '<li>'.$relativeFullName.'</li> ';
    }
	if ($relativesCounter <= 2 ) { 
	echo '<a href="profile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li>Search for more </li></a> <br/>'; }
	else {
	 echo '<a href="profile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li>and atleast '.($relativesCounter - 2).' more </li></a> <br/>'; }
    echo '</p>
	
	</div>
<div style="clear:both;"> </div>
							
<div class="col-md-6 home-list-pop-desc inn-list-pop-desc" style="float:left;">
										<div class="list-number">
										<p> <b>
Phones: </b> </p>
											<ul>';
for ($m = 0; $m < 2; $m++) {
  $PhoneNumber    = $resultsa[$k][$k][0]['phones'][$m]["phoneNumber"];
  if (strpos($PhoneNumber, '+') !== false) {
	
echo ' <li style="width:100%;"><i class="fa fa-phone" style="font-size:25px;color:orange; margin-right:10px;" aria-hidden="true"></i>'.$PhoneNumber.'</li>';
}
}
if ($phoneCounter <= 2 ) { 
	echo '<a href="profile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li style="color:#337ab7 !important;">Check Full Profile </li></a> <br/>'; }
	else {
	 echo '<a href="profile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li style="color:#337ab7 !important;">and atleast '.($phoneCounter - 2).' more </li></a> <br/>'; }
	 
 echo '
												

											</ul>

										</div> 
</div>	

<div class="col-md-6 home-list-pop-desc inn-list-pop-desc" style="float:left;">
										<div class="list-number">
	<p> <b>
Emails: </b> </p>
											<ul>';
for ($n = 0; $n < 2; $n++) {
  $emails    = $resultsa[$k][$k][0]['emails'][$n]["email"];
  if (strpos($emails, '@') !== false) {
	
echo ' <li style="width:100%;"><i class="fa fa-envelope" style="font-size:25px;color:orange; margin-right:10px;" aria-hidden="true"></i>'.$emails.'</li>';
}
}
if ($emailCounter <= 2 ) { 
	echo '<a href="profile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li style="color:#337ab7 !important;">Check Full Profile </li></a> <br/>'; }
	else {
	 echo '<a href="profile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li style="color:#337ab7 !important;">and atleast '.($emailCounter - 2).' more </li></a> <br/>'; } 
 echo '									

											</ul>

										</div> 
</div>										
										
										
										<span class="home-list-pop-rat"><i class="fa fa-unlock-alt" style="font-size:25px;color:#337ab7" aria-hidden="true"></i></span>

										<div class="list-enqu-btn">

											<ul>

												

												
												<li style="width:75%; font-size:13px; color: #0e76a8; font-weight:bold; font-style:italic; float:left;">Sex Offenders, Arrest, Work Experience, Companies,  Social Accounts, Educational, Property, Vehicle, Voter, Patents,  Whois, and more.. </li>

												<li><a href="profile.php?unique='.$uniqueId.'"><i class="fa fa-search" aria-hidden="true"></i> Full Profile</a> </li>

											</ul>

										</div>

									</div>

								</div>';
}
?>

<!--LISTINGS END-->
<!--LISTINGS Next E Start -->

<?php
						
for($k = 0; $k < $profileTotalExperian ;$k++){
$profileCounter =  count($resultsExperian[$k][$k][0]['profile']);
$relativesCounter =  count($resultsExperian[$k][$k][0]['relatives']);
//echo 'addresscounter'.$addressCounter;

$uniqueId = $resultsExperian[$k][$k][0]['profile'][0]["uniqueId"];
$experianDbType = $resultsExperian[$k][$k][0]['profile'][0]["experianDbType"];
$uniqueIdRemoval = $resultsExperian[$k][$k][0]['profile'][0]["uniqueId"];

$uniqueId = base64_encode($uniqueId);
$experianDbType = base64_encode($experianDbType);
$uniqueId = '__'.$uniqueId.'&d=e&t='.$experianDbType;
     $firstname = $resultsExperian[$k][$k][0]['profile'][0]["firstName"];
	 $middleName  = $resultsExperian[$k][$k][0]['profile'][0]["middleName"];
     $lastName    = $resultsExperian[$k][$k][0]['profile'][0]["lastName"];
     $street      = $resultsExperian[$k][$k][0]['profile'][0]["street"];
     $city      = $resultsExperian[$k][$k][0]['profile'][0]["city"];
	 $state      = $resultsExperian[$k][$k][0]['profile'][0]["state"];
	 $zip      = $resultsExperian[$k][$k][0]['profile'][0]["zip"];
	 $phone      = $resultsExperian[$k][$k][0]['profile'][0]["phone"];
	 $dobYear      = $resultsExperian[$k][$k][0]['profile'][0]["dobYear"];
	 $dobMonth      = $resultsExperian[$k][$k][0]['profile'][0]["dobMonth"];
	 $dobDay      = $resultsExperian[$k][$k][0]['profile'][0]["dobDay"];
	 $education      = $resultsExperian[$k][$k][0]['profile'][0]["education"];
	 $occupation      = $resultsExperian[$k][$k][0]['profile'][0]["occupation"];
	 $email      = $resultsExperian[$k][$k][0]['profile'][0]["email"];
	 $DobFull = $dobYear.'-'.$dobMonth.'-'.$dobDay;
	 $fullphone = phoneFormat($phone);
	 $occupationFull = OccupationExperian($occupation);
	 $educationFull = EducationExperian($education);
	 $fullAddressNew = $street.', '.$city.', '.$state.', '.$zip;
	 $fullname = $firstname.' '.$middleName.' '.$lastName;
	 $fullname = ucfirst($fullname);
    echo '            <div class="home-list-pop list-spac">

									<!--LISTINGS IMAGE-->

									<div class="col-md-3" id="mobileicon"> <img src="images/usericon.png" alt="" /> </div>

									<!--LISTINGS: CONTENT-->

									<div class="col-md-9 home-list-pop-desc inn-list-pop-desc" style="float:left;"> <a href="eprofile.php?unique='.$uniqueId.'"><h3>' . $fullname . ', ' . ageCalculator($DobFull) . '</h3></a>

										<h4>DOB : ' . $DobFull . '</h4>
<div class="col-md-6 home-list-pop-desc inn-list-pop-desc" style="float:left;">
										<p><b>Address: </b>';
    
	  // echo $addressCounter << die execute reg, soveel keer vir soveel addresse.

	 echo '<li>'.$fullAddressNew.'</li> ';

  
$addressCounterExperian = '1';
	if ($addressCounterExperian <= 2 ) { 
	echo '<a href="eprofile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li>Search for more </li></a> <br/>'; }
	else {
	 echo '<a href="eprofile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li>and atleast '.($addressCounterExperian - 2).' more </li></a> <br/>'; }
    echo '</p>
	</div>
	
<div class="col-md-6 home-list-pop-desc inn-list-pop-desc" style="float:left;">
										<p><b>Associated With: </b>';
    for ($o = 0; $o < 2; $o++) {
	  // echo $addressCounter << die execute reg, soveel keer vir soveel addresse.
				$relativeFirstName     = $resultsExperian[$k][$k][0]['relatives'][$o]["relativeFirstName"];
                $relativeMiddleName    = $resultsExperian[$k][$k][0]['relatives'][$o]["relativeMiddleName"];
                $relativeLastName      = $resultsExperian[$k][$k][0]['relatives'][$o]["relativeLastName"];
				$relativeFullName = $relativeFirstName.' '.$relativeMiddleName.' '.$relativeLastName;
	  echo '<li>'.$relativeFullName.'</li> ';
    }
	$relativesCounterExperian = '2';
	if ($relativesCounterExperian <= 2 ) { 
	echo '<a href="eprofile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li>Search for more </li></a> <br/>'; }
	else {
	 echo '<a href="eprofile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li>and atleast '.($relativesCounterExperian - 2).' more </li></a> <br/>'; }
    echo '</p>
	
	</div>
<div style="clear:both;"> </div>
							
<div class="col-md-6 home-list-pop-desc inn-list-pop-desc" style="float:left;">
										<div class="list-number">
										<p> <b>
Phones: </b> </p>
											<ul>';

	
echo ' <li style="width:100%;"><i class="fa fa-phone" style="font-size:25px;color:orange; margin-right:10px;" aria-hidden="true"></i>'.$fullphone.'</li>';
$phoneCounterExperian = '1';
if ($phoneCounter <= 2 ) { 
	echo '<a href="eprofile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li style="color:#337ab7 !important;">Check Full Profile </li></a> <br/>'; }
	else {
	 echo '<a href="eprofile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li style="color:#337ab7 !important;">and atleast '.($phoneCounterExperian - 2).' more </li></a> <br/>'; }
	 
 echo '
												

											</ul>

										</div> 
</div>	

<div class="col-md-6 home-list-pop-desc inn-list-pop-desc" style="float:left;">
										<div class="list-number">
	<p> <b>
Emails: </b> </p>
											<ul>';

	
echo ' <li style="width:100%;"><i class="fa fa-envelope" style="font-size:25px;color:orange; margin-right:10px;" aria-hidden="true"></i>'.$email.'</li>';
$emailCounterExperian = '1';
if ($emailCounterExperian <= 2 ) { 
	echo '<a href="eprofile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li style="color:#337ab7 !important;">Check Full Profile </li></a> <br/>'; }
	else {
	 echo '<a href="eprofile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li style="color:#337ab7 !important;">and atleast '.($emailCounterExperian - 2).' more </li></a> <br/>'; } 
 echo '									

											</ul>

										</div> 
</div>										
										
										
										<span class="home-list-pop-rat"><i class="fa fa-unlock-alt" style="font-size:25px;color:#337ab7" aria-hidden="true"></i></span>

										<div class="list-enqu-btn">

											<ul>

												

												
												<li style="width:75%; font-size:13px; color: #0e76a8; font-weight:bold; font-style:italic; float:left;">Sex Offenders, Arrest, Work Experience, Companies,  Social Accounts, Educational, Property, Vehicle, Voter, Patents,  Whois, and more.. </li>

												<li><a href="eprofile.php?unique='.$uniqueId.'"><i class="fa fa-search" aria-hidden="true"></i> Full Profile</a> </li>

											</ul>

										</div>

									</div>

								</div>';
}
?>
<!--LISTINGS next Sc Start -->
<?php
for($k = 0; $k < $profileTotalScanThem ;$k++){
$addressCounter =  count($resultsScanThem[$k][$k][0]['address']);
$phoneCounter =  count($resultsScanThem[$k][$k][0]['phones']);
$emailCounter =  count($resultsScanThem[$k][$k][0]['emails']);
$aliasesCounter =  count($resultsScanThem[$k][$k][0]['aliases']);
$workCounter =  count($resultsScanThem[$k][$k][0]['workexp']);
$relativesCounter =  count($resultsScanThem[$k][$k][0]['relatives']);
//echo 'addresscounter'.$addressCounter;

$uniqueId = $resultsScanThem[$k][$k][0]['profile'][0]["uniqueId"];
$uniqueIdRemoval = $resultsScanThem[$k][$k][0]['profile'][0]["uniqueId"];
$uniqueId = base64_encode($uniqueId);
$dbInUse = 'ScanThem';
$dbInUse = base64_encode($db_InUse);
$uniqueId = '__'.$uniqueId.'&d=s&t='.$dbInUse;
    $firstname = $resultsScanThem[$k][$k][0]['profile'][0]["firstName"];
	   $middleName  = $resultsScanThem[$k][$k][0]['profile'][0]["middleName"];
       $lastName    = $resultsScanThem[$k][$k][0]['profile'][0]["lastName"];
     $age      = $resultsScanThem[$k][$k][0]['profile'][0]["age"];

	$fullname = $firstname.' '.$middleName.' '.$lastName;
    echo '            <div class="home-list-pop list-spac">

									<!--LISTINGS IMAGE-->

									<div class="col-md-3" id="mobileicon"> <img src="images/usericon.png" alt="" /> </div>

									<!--LISTINGS: CONTENT-->

									<div class="col-md-9 home-list-pop-desc inn-list-pop-desc" style="float:left;"> <a href="sprofile.php?unique='.$uniqueId.'"><h3>' . $fullname . ', ' . $age . '</h3></a>

										<h4>Age : ' . $age . '</h4>
<div class="col-md-6 home-list-pop-desc inn-list-pop-desc" style="float:left;">
										<p><b>Address: </b>';
    for ($l = 0; $l < 1; $l++) {
	  // echo $addressCounter << die execute reg, soveel keer vir soveel addresse.

 	
	  // echo $addressCounter << die execute reg, soveel keer vir soveel addresse.

 	$addressStreetAddress = $resultsScanThem[$k][$k][0]['address'][$l]["street"];
    $addressCity  = $resultsScanThem[$k][$k][0]['address'][$l]["city"];
    $addressState  = $resultsScanThem[$k][$k][0]['address'][$l]["state"];
    $addressZip =  $resultsScanThem[$k][$k][0]['address'][$l]["zip"];
    $fulladdress = $addressStreetAddress.', '.$addressCity.', '.$addressState;
	 echo '<li>'.$fulladdress.'</li> <br/>';
    }
    

	if ($addressCounter <= 2 ) { 
	echo '<a href="sprofile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li>Search for more </li></a> <br/>'; }
	else {
	 echo '<a href="sprofile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li>and atleast '.($addressCounter - 2).' more </li></a> <br/>'; }
    echo '</p>
	</div>
	
<div class="col-md-6 home-list-pop-desc inn-list-pop-desc" style="float:left;">
										<p><b>Associated With: </b>';
    for ($o = 0; $o < 2; $o++) {
	  // echo $addressCounter << die execute reg, soveel keer vir soveel addresse.
				$relativeFirstName     = $resultsScanThem[$k][$k][0]['relatives'][$o]["relativeFirstName"];
                $relativeMiddleName    = $resultsScanThem[$k][$k][0]['relatives'][$o]["relativeMiddleName"];
                $relativeLastName      = $resultsScanThem[$k][$k][0]['relatives'][$o]["relativeLastName"];
				$relativeFullName = $relativeFirstName.' '.$relativeMiddleName.' '.$relativeLastName;
	  echo '<li>'.$relativeFullName.'</li> ';
    }
	if ($relativesCounter <= 2 ) { 
	echo '<a href="sprofile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li>Search for more </li></a> <br/>'; }
	else {
	 echo '<a href="sprofile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li>and atleast '.($relativesCounter - 2).' more </li></a> <br/>'; }
    echo '</p>
	
	</div>
<div style="clear:both;"> </div>
							
<div class="col-md-6 home-list-pop-desc inn-list-pop-desc" style="float:left;">
										<div class="list-number">
										<p> <b>
Phones: </b> </p>
											<ul>';
for ($m = 0; $m < 2; $m++) {
  $PhoneNumber    = $resultsScanThem[$k][$k][0]['phones'][$m]["phoneNumber"];
  if (strpos($PhoneNumber, '+') !== false) {
	
echo ' <li style="width:100%;"><i class="fa fa-phone" style="font-size:25px;color:orange; margin-right:10px;" aria-hidden="true"></i>'.$PhoneNumber.'</li>';
}
}
if ($phoneCounter <= 2 ) { 
	echo '<a href="sprofile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li style="color:#337ab7 !important;">Check Full Profile </li></a> <br/>'; }
	else {
	 echo '<a href="sprofile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li style="color:#337ab7 !important;">and atleast '.($phoneCounter - 2).' more </li></a> <br/>'; }
	 
 echo '
												

											</ul>

										</div> 
</div>	

<div class="col-md-6 home-list-pop-desc inn-list-pop-desc" style="float:left;">
										<div class="list-number">
	<p> <b>
Emails: </b> </p>
											<ul>';
for ($n = 0; $n < 2; $n++) {
 $emails    = $resultsScanThem[$k][$k][0]['emails'][$n]["email"];
  if (strpos($emails, '@') !== false) {
	
echo ' <li style="width:100%;"><i class="fa fa-envelope" style="font-size:25px;color:orange; margin-right:10px;" aria-hidden="true"></i>'.$emails.'</li>';
}
}
if ($emailCounter <= 2 ) { 
	echo '<a href="sprofile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li style="color:#337ab7 !important;">Check Full Profile </li></a> <br/>'; }
	else {
	 echo '<a href="sprofile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li style="color:#337ab7 !important;">and atleast '.($emailCounter - 2).' more </li></a> <br/>'; } 
 echo '									

											</ul>

										</div> 
</div>										
										
										
										<span class="home-list-pop-rat"><i class="fa fa-unlock-alt" style="font-size:25px;color:#337ab7" aria-hidden="true"></i></span>

										<div class="list-enqu-btn">

											<ul>

												

												
												<li style="width:75%; font-size:13px; color: #0e76a8; font-weight:bold; font-style:italic; float:left;">Sex Offenders, Arrest, Work Experience, Companies,  Social Accounts, Educational, Property, Vehicle, Voter, Patents,  Whois, and more.. </li>

												<li><a href="sprofile.php?unique='.$uniqueId.'"><i class="fa fa-search" aria-hidden="true"></i> Full Profile</a> </li>

											</ul>

										</div>

									</div>

								</div>';
}
?>							



							</div>

							

						</div>

					</div>

                            

					

                    

                    	

                    

                    

				</div>

			</div>

		</div>

	</section>

	<!--MOBILE APP-->

	

	<!--FOOTER SECTION-->

	<?php include ('footer.php'); ?>
				<script type="text/javascript">    
  $("#update").click(function(e) {
  e.preventDefault();
  var name = $("#name").val(); 
  var mobile = $("#mobile").val();
  var email = $("#email").val();
  var state = $("#stateinput").val();
  var comments = $("#comments").val();
	 var query = '<?php echo $phoneSearch; ?>';
   var type = 'phone'; 
  
  var dataString = 'name='+name+'&mobile='+mobile+'&email='+email+'&state='+state+'&comments='+comments+'&query='+query+'&type='+type;
  $.ajax({
    type:'POST',
    data:dataString,
    url:'request_data.php',
    success:function(data) {
      alert('We will contact you in 24 hours if we find anything.');
    }
  });
});
</script>
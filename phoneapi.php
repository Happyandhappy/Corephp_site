<?php
error_reporting(0);
ini_set('max_execution_time', 300);
ini_set('display_errors', 0); 
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

$finaljson  = (json_encode($resultsa));
echo $finaljson;
?>
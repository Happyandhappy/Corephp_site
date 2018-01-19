<?php
error_reporting(0);
ini_set('max_execution_time', 300);
//ini_set('display_errors', 0); 
function clean($string) {
while (strpos(substr($string, -1), ' ') !== false) 
$string = substr($string, 0, -1);
$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
return preg_replace('/[^A-Za-z0-9\-_@.]/', '', $string); // Removes special chars.
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

$dbExperian = DatabaseExperian::getInstanceExperian(); // DiscoverThem
$dbExperianConnect = $dbExperian->getConnectionExperian();  // Initial DB

$dbExperianOld = DatabaseExperianOld::getInstanceExperianOld(); // DiscoverThem
$dbExperianConnectOld = $dbExperianOld->getConnectionExperianOld();  // Initial DB

$email = htmlentities(clean($_GET['em']));

if ($email == '' || $email == NULL) {
header('Location: 404.php');
}

$searchquery = "SELECT id, ADDR FROM `datanew` WHERE `EMAIL` LIKE '$email' LIMIT 500"; 
$result  = $dbExperianConnect->query($searchquery);
$totalcounterExperian = $result->num_rows;
//$j = $totalcounter;

$resultsDBNew = array();
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

$searchquery = "SELECT id, ADDR FROM `data` WHERE `EMAIL` LIKE '$email' LIMIT 500"; 
$result  = $dbExperianConnectOld->query($searchquery);
$totalcounterExperian = $result->num_rows;
//$j = $totalcounter;

		$resultsDBNew = array();
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
$totalcounterExperian = 0;
$profileIds = array();
foreach( $resultsDBArrayExperian as $keyB) {
	$profileIds[] = $keyB['ADDR'];
	$totalcounterExperian++;
}

 foreach( $resultsDBArrayExperianOld as $keyB) {
 if( !in_array($keyB['ADDR'],$profileIds) ) {
	 
    $resultsDBArrayExperian[] = $keyB;
	$totalcounterExperian++;
	}
  }


$resultsDBArrayCompleteExperian = $resultsDBArrayExperian;
  $jCount = $totalcounterExperian;
if ($jCount < 50) {
	$displayCount = $jCount;
//	foreach ($arr as $value) {
	for($i = 0; $i < $jCount ;$i++){
		$q = $resultsDBArrayCompleteExperian[$i]['profileId'];
		$db_type = $resultsDBArrayCompleteExperian[$i]['db_type'];
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
		
//		unset($resultscounter);
		unset($resultsprofile);
		unset($resultsrelatives);
		$resultsprofile = NULL;
		$resultsrelatives = NULL;
	}	
}
else{
	$displayCount = 50;
//	foreach ($arr as $value) {
	for($i = 0; $i < 50 ;$i++){
		$q = $resultsDBArrayCompleteExperian[$i]['profileId'];
		$db_type = $resultsDBArrayCompleteExperian[$i]['db_type'];
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
		
//		unset($resultscounter);
		unset($resultsprofile);
		unset($resultsrelatives);
		$resultsprofile = NULL;
		$resultsrelatives = NULL;
	}	
}

$profileTotalExperian[] = array(
	'profileTotal' => $jCount,
	'displayCount' => $displayCount,
	'profiles' => $resultscounter,
	);
//var_dump($profileTotalExperian); 
$JDump = json_encode($profileTotalExperian);
echo $JDump;
?>
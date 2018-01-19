<?php
error_reporting(0);
ini_set('max_execution_time', 300);
ini_set('display_errors', 0); 
define("_WOJO", true);
require_once("dashboard/init.php");
function base64url_encode($data) {
return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}
function base64url_decode($data) {
return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}
$uniqueidentifierperson = $_GET['unique'];
$uniqueId = $uniqueidentifierperson;
error_reporting(0);
$uniqueidentifierperson = $_GET['unique'];
require_once ('config.php'); // loading databases
require_once ('experianFunctions.php');
function array_merge_recursive_adv(array &$array1, $array2) {
        if(!empty($array2) && is_array($array2))
            foreach ($array2 as $key => $value) {
                    if(array_key_exists($key,$array1)) {
                        if(is_array($value)){
                            foreach($value as $subKey => $subValue){
                                if(array_key_exists($subKey,$array1[$key])&&is_array($subValue)&&gettype($subKey)=="string"){
                                    $tmp = array();
                                    foreach($subValue as $endSubKey => $endSubValue){
                                        array_push($tmp, $endSubValue);
                                    }
                                    foreach($array1[$key][$subKey] as $endSubKey => $endSubValue){
                                        array_push($tmp, $endSubValue);
                                    }
                                    $array1[$key][$subKey] = $tmp;
                                }
                            }
                            array_merge_recursive_adv($array1[$key], $value);
                        } 
                    } else {
                        $array1[$key] = $value;
                    }
            }
            return $array1;
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
class verifyPage {
	public $uniqueidentifierperson;
	public $mysqli;
function DetermineDB() {
	global $uniqueidentifierperson;
	$uniqueidentifierperson = $_GET['unique'];
	$uniqueidentifierperson = substr($uniqueidentifierperson, strrpos($uniqueidentifierperson, '_') + 1);
	$uniqueidentifierperson =  base64url_decode($uniqueidentifierperson);
	$q = $uniqueidentifierperson;
	
	$dbIntel = DatabaseNewData::getInstanceNewData(); // DiscoverThem
	$mysqlidbIntel = $dbIntel->getConnectionNewData();  // Initial DB
	$db = DatabaseMain::getInstanceMain(); // Quanki DB
	$mysqli = $db->getConnectionMain();  // Quanki DB
	$query = "SELECT removed FROM `quanki_removals` WHERE `profileId` = '{$q}' LIMIT 1";
	$removed = $mysqli->query($query);	
	while ($row = mysqli_fetch_array($removed)) {
	$removedProfile = $row['removed']; }
	//if($removedProfile == 1) {	header('Location: 404.php'); 
	//exit; }
	
	
	$count = 0;
	
	$query = "SELECT profileId FROM `profile` WHERE `profileId` = '{$q}' LIMIT 1";
	$result = $mysqlidbIntel->query($query); // DiscoverThem DB
	$count =  $result->num_rows;
	if ($count > 0) {	
	return 'discoverthem_db';
	}
	if ($count == 0) {	
	$db = DatabaseMain::getInstanceMain(); // Quanki DB
	$mysqli = $db->getConnectionMain();  // Quanki DB
	$query = "SELECT profileId FROM `profile` WHERE `profileId` = '{$q}' LIMIT 1";
	$result = $mysqli->query($query);
	$count =  $result->num_rows;	
	if ($count > 0) {	
	return 'quanki_db';
	}
	}
	
	if ($count == 0) {	
	$dbOldData = DatabaseOldData::getInstanceOldData(); // Hostgator
	$db2 = $dbOldData->getConnectionOldData();  // Hostgator
	
	$query = "SELECT profileId FROM `profile` WHERE `profileId` = '{$q}' LIMIT 1";
	$result = $db2->query($query);
	$count =  $result->num_rows;
	if ($count > 0) {	
	return 'hostgator_db';
	}	
	}
	if ($count == 0) {	
	//header('Location: 404.php');
	exit; }
}
function Security() {
	global $uniqueidentifierperson;
	$uniqueidentifierperson = $_GET['unique'];
	$uniqueidentifierperson = substr($uniqueidentifierperson, strrpos($uniqueidentifierperson, '_') + 1);
	$uniqueidentifierperson =  base64url_decode($uniqueidentifierperson);
	if ( count($_GET) <> 3 ) { 	header('Location: 404.php');
	exit; }
	$this->uniqueidentifierperson = $uniqueidentifierperson;
}
}
$verifyPage = new verifyPage;
$verifyPage->Security();
$db_type = $verifyPage->DetermineDB();

 		
		if ($db_type == 'discoverthem_db') {
		$dbIntel = DatabaseNewData::getInstanceNewData(); // DiscoverThem
		$mysqliNewData = $dbIntel->getConnectionNewData();  // Initial DB
		$db_InUse = 'discoverThem';
		}
		if ($db_type == 'quanki_db') {
		$db = DatabaseMain::getInstanceMain(); // Quanki DB
		$mysqliNewData = $db->getConnectionMain();  // Quanki DB
		$db_InUse = 'Quanki';
		}
		if ($db_type == 'hostgator_db') {
		$dbOldData = DatabaseOldData::getInstanceOldData(); // Hostgator
		$mysqliNewData = $dbOldData->getConnectionOldData();  // Hostgator
			$db_InUse = 'Hostgator';
		}
$phones = "SELECT phoneNumber FROM `phones` WHERE `profileId` = '$uniqueidentifierperson'";
$phones = $mysqliNewData->query($phones);
while ($row = mysqli_fetch_array($phones)) {
$countPhones =mysqli_num_rows($phones);
$countPhones = ($countPhones - 1);
$phoneNumber = $row['phoneNumber'];
$completephone .= $phoneNumber . ' ';
} 
$emailsQuery = "SELECT email FROM `emails` WHERE `profileId` = '$uniqueidentifierperson'";
$emailssql = $mysqliNewData->query($emailsQuery);
while ($row = mysqli_fetch_array($emailssql)) {
$countEmails =mysqli_num_rows($emailssql);
$emails = $row['email'];
$completeemails .= '"'.$emails.'"' . ',';

}
$fulladdress = NULL;
$city = NULL;
$state = NULL;
$streetName = NULL;
$streets = array();
$address = "SELECT city, state, streetAddress FROM `addresses` WHERE `profileId` = '$uniqueidentifierperson' ";
$address = $mysqliNewData->query($address);
while ($row = mysqli_fetch_array($address)) {
$countAddress =mysqli_num_rows($address);
$countAddress = ($countAddress - 1);
$completeStreet .= '"'.$row['streetAddress'].'"' . ',';
$streetName =  $row['streetAddress'];
$city   = $row['city'];
$state  = $row['state'];
$streets[] = $row['streetAddress'];
$homeLocation = $city.', '.$state;
$fulladdress .= $city . ', ' . $state. ' - ';
$completeStreetName .= $streetName . ' ';
}
//echo 'test4';
//echo $completeStreetName;

$profile = "SELECT * FROM `profile` WHERE `profileId` = '{$uniqueidentifierperson}' ";
		$result  = $mysqliNewData->query($profile);
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
		$address = "SELECT * FROM `addresses` WHERE `profileId` = '{$uniqueidentifierperson}' ";
		$result  = $mysqliNewData->query($address);
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
		$aliases = "SELECT * FROM `aliases` WHERE `profileId` = '{$uniqueidentifierperson}' ";
		$result  = $mysqliNewData->query($aliases);
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
		$education = "SELECT * FROM `education` WHERE `profileId` = '{$uniqueidentifierperson}' ";
		$result    = $mysqliNewData->query($education);
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
		$emails = "SELECT * FROM `emails` WHERE `profileId` = '{$uniqueidentifierperson}' ";
		$result = $mysqliNewData->query($emails);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$email          = htmlspecialchars($row['email']);
				$resultsemail[] = array(
				'email' => $email
				);
			}
		}
		
		$phones = "SELECT * FROM `phones` WHERE `profileId` = '{$uniqueidentifierperson}' ";
		$result = $mysqliNewData->query($phones);
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
		$relatives = "SELECT * FROM `relatives` WHERE `profileId` = '{$uniqueidentifierperson}' ";
		$result    = $mysqliNewData->query($relatives);
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
	
		$workexp = "SELECT * FROM `workexp` WHERE `profileId` = '{$uniqueidentifierperson}' ";
		$result  = $mysqliNewData->query($workexp);
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
		
		
		
		
		$j = 1;
		$i = 1;
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
			$resultsa[] = array(
		'profileTotal' => $j,
		'profileCount' => $i, 
		$i => $resultscounter
		);
		

		
$firstName2 = $firstName;
$lastName2 = $lastName;
$dbExperian = DatabaseExperian::getInstanceExperian(); // DiscoverThem
$dbExperianConnect = $dbExperian->getConnectionExperian();  // Initial DB
$Experianids = NULL;
$completeemails = substr($completeemails, 0, -1);
$emailsExperian = "SELECT id FROM datanew WHERE EMAIL IN ($completeemails) and FN = '$firstName' LIMIT 1";
$emailsValues = $dbExperianConnect->query($emailsExperian);
while ($row = mysqli_fetch_array($emailsValues)) {
$Experianids = $row['id']; 
$completeids .= $ids . ' ';
}
if ($Experianids <> NULL) {
	$ExperianTest = 'true';
}
if ($ExperianTest !== 'true') {
$completestreet = substr($completeStreet, 0, -1);
$completestreetExperian = "SELECT id FROM datanew WHERE ADDR IN ($completestreet) and FN = '$firstName' LIMIT 1";
$addressValues = $dbExperianConnect->query($completestreetExperian);
while ($row = mysqli_fetch_array($addressValues)) {
$Experianids = $row['id']; 
$completeids .= $ids . ' ';
}
if ($Experianids <> NULL) {
	$ExperianTest = 'true';
}
}
if ($ExperianTest == 'true') {
$profile = "SELECT * FROM `datanew` WHERE `id` = '{$Experianids}' ";

		$result  = $dbExperianConnect->query($profile);
		//print_r( $result);
		$results = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
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
				$resultsprofileExperian[] = array(
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
	$relatives = "SELECT * FROM `datanew` WHERE `ADDR` = '{$streetExperian}' and `LN` = '{$lastNameExperian}' and `FN` != '{$firstNameExperian}'  ";

		$result    = $dbExperianConnect->query($relatives);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$relativeFirstName    = htmlspecialchars($row['FN']);
				$relativeMiddleName   = htmlspecialchars($row['MI']);
				$relativeLastName     = htmlspecialchars($row['LN']);
				$resultsrelativesExperian[]   = array(
				'relativeFirstName' => $relativeFirstName,
				'relativeMiddleName' => $relativeMiddleName,
				'relativeLastName' => $relativeLastName,
				);
			}
		}	
		
		$moreinfo = "SELECT * FROM `datanew` WHERE `id` = '{$Experianids}' ";
		$result    = $dbExperianConnect->query($moreinfo);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$homeOwner   = HomeOwnerFlagExperian(htmlspecialchars($row['HOME_OWNER_SRC']));
				$houseHoldIncome    = HouseholdIncomeExperian(htmlspecialchars($row['HH_INCOME']));
				$netWorth   = NetWorthExperian(htmlspecialchars($row['NET_WORTH']));
				$Occupation     = OccupationExperian(htmlspecialchars($row['OCC_OCCUP']));
				$Education     = EducationExperian(htmlspecialchars($row['EDUC']));
				$homeOwnerRent   = OwnerRenterExperian(htmlspecialchars($row['HOME_OWNER']));				
				$numberOfKids     = htmlspecialchars($row['NUM_KIDS']);
				$ethnicity     = EthnicCodeExperian(htmlspecialchars($row['ETHNIC_CODE']));
				$ethnicGroup     = EthnicGroupExperian(htmlspecialchars($row['ETHNIC_GRP']));
				$ethnicLanguage     = LanguageCodeExperian(htmlspecialchars($row['ETHNIC_LANG']));				
				$Religion     = ReligionExperian(htmlspecialchars($row['ETHNIC_RELIGION']));
				$creditRating     = htmlspecialchars($row['CREDIT_RATING']);
				$creditLines     = htmlspecialchars($row['CREDIT_LINES']);
				$dncFlag     = htmlspecialchars($row['DNC_FLAG']);
				$maritalStatus     = MaritalStatusExperian($row['HH_MARITAL_STAT']);
				$dwellingType     = DwellingTypeExperian(htmlspecialchars($row['DWELL_TYP']));	
				$houseHoldSize     = htmlspecialchars($row['HH_SIZE']);			
				
				$moreinfoExperian[]   = array(
				'homeOwner' => $homeOwner,
				'houseHoldIncome' => $houseHoldIncome,
				'netWorth' => $netWorth,
				'Occupation' => $Occupation,
				'Education' => $Education,
				'homeOwnerRent' => $homeOwnerRent,
				'numberOfKids' => $numberOfKids,
				'ethnicGroup' => $ethnicGroup,
				'ethnicLanguage' => $ethnicLanguage,
				'Religion' => $Religion,
				'creditRating' => $creditRating,
				'creditLines' => $creditLines,
				'dncFlag' => $dncFlag,
				'maritalStatus' => $maritalStatus,
				'dwellingType' => $dwellingType,
				'houseHoldSize' => $houseHoldSize
				);
			}
		}	
		$emailQuery = "SELECT * FROM `datanew` WHERE `id` = '{$Experianids}' ";
		$result    = $dbExperianConnect->query($emailQuery);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				//$email    = htmlspecialchars($row['EMAIL']);
				$email =  htmlspecialchars($row['EMAIL']);
				$emailsExperianArray[]   = array(
				'email' => $email,
				);
			}
		}	
		
		$phonesQuery = "SELECT * FROM `datanew` WHERE `id` = '{$Experianids}' ";
		$result    = $dbExperianConnect->query($phonesQuery);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				//$email    = htmlspecialchars($row['EMAIL']);
				$phoneNumber =  htmlspecialchars($row['PHONE']);
				$phoneExperianArray[]   = array(
				'phoneNumber' => $phoneNumber,
				);
			}
		}		
		$resultscounterExperian[] = array(
		
		'profile' => $resultsprofileExperian,
		'relatives' => $resultsrelativesExperian,
		'moreinfoExperian' => $moreinfoExperian,
		'emails' => $emailsExperianArray,
		'phones' => $phoneExperianArray,

		
		);
		$jCount = '1';
		$iExperian = '1';
		$resultsExperian[] = array(
		'profileTotal' => $jCount,
		'profileCount' => $iExperian, 
		$iExperian => $resultscounterExperian
		);
		

		unset($resultscounter);
		unset($resultsprofile);
		unset($resultsrelatives);

$profileTotalExperian = $resultsExperian[0]["profileTotal"];
}

//$newarray = array_merge_recursive_adv($firstarray, $myArray);
//$newarray = array_merge_recursive($resulta, $resultsExperian);
$newarray = array_merge_recursive_adv($resultsa, $resultsExperian);

echo '<br />';
echo '<br />';
echo '<br />';
var_dump(json_encode($newarray, true));
$sexId = NULL;
if ($dateOfBirth) {
$dbNewDataSex = DatabaseNewDataSex::getInstanceNewDataSex();
$db1Sex       = $dbNewDataSex->getConnectionNewDataSex();
$profilePic = 'images/usericon.png';

$sexOffender = "SELECT theirId, savedImage FROM basic WHERE fName = '$firstName2' and lName = '$lastName2' and dobDate = '$dateOfBirth 'LIMIT 1";
$sexOffender = $db1Sex->query($sexOffender);
while ($row = mysqli_fetch_array($sexOffender)) {
$sexId  = $row['theirId'];
$savedImageSex  = $row['savedImage'];
}
}
if ($sexId <> NULL) {
	$SexTest = 'true';
}
if ($SexTest == 'true') {


$profile = "SELECT * FROM `basic` WHERE `theirId` = '$sexId'";
$result  = $db1Sex->query($profile);
$results = array();
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$uniqueId            = htmlspecialchars($row['theirId']);
		$offenderId          = htmlspecialchars($row['offenderId']);
		$firstName           = htmlspecialchars($row['fName']);
		$middleName          = htmlspecialchars($row['mName']);
		$lastName            = htmlspecialchars($row['lName']);
		$dob                 = htmlspecialchars($row['dobDate']);
		$alias               = htmlspecialchars($row['alias']);
		$status              = htmlspecialchars($row['status']);
		$offenderDesignation = htmlspecialchars($row['offenderDesignation']);
		$sex                 = htmlspecialchars($row['sex']);
		$height              = htmlspecialchars($row['height']);
		$weight              = htmlspecialchars($row['weight']);
		$race                = htmlspecialchars($row['race']);
		$ethnicity           = htmlspecialchars($row['ethnicity']);
		$hairColor           = htmlspecialchars($row['hairColor']);
		$eyeColor            = htmlspecialchars($row['eyeColor']);
		$scarsMarksTattoos   = htmlspecialchars($row['scarsMarksTattoos']);
		$releaseDate         = htmlspecialchars($row['dateRelease']);
		$verificationDate    = htmlspecialchars($row['dateVerification']);
		$registrationDate    = htmlspecialchars($row['dateRegistration']);
		$victimAge           = htmlspecialchars($row['victimAge']);
		$registrationEndDate = htmlspecialchars($row['dateEndRegistration']);
		$registrationDuration  = htmlspecialchars($row['registrationDuration']);
		$victimGender        = htmlspecialchars($row['victimGender']);
		$probationStatus     = htmlspecialchars($row['probationStatus']);
		$addressDate         = htmlspecialchars($row['addressDate']);
		$skinColor           = htmlspecialchars($row['skinColor']);
		$ageAtOffence        = htmlspecialchars($row['ageAtOffence']);
		$biometric           = htmlspecialchars($row['biometric']);
		$build               = htmlspecialchars($row['build']);
		$correctiveLens      = htmlspecialchars($row['correctiveLens']);
		$offenderEmploymentRestictions      = htmlspecialchars($row['offenderEmploymentRestictions']);
		$offenderExclusion   = htmlspecialchars($row['correctiveLens']);
		$repeatOffender      = htmlspecialchars($row['offenderRepeat']);
		$offenderResidencyRestrictions      = htmlspecialchars($row['offenderResidencyRestrictions']);
		$offendingMethods    = htmlspecialchars($row['offendingMethods']);
		$targets             = htmlspecialchars($row['targets']);
		$verificationRequirement      = htmlspecialchars($row['verificationRequirement']);
		$violations          = htmlspecialchars($row['violations']);
		$pictureLink         = htmlspecialchars($row['savedImage']);
		$executionDate       = htmlspecialchars($row['executionDate']);
						
		$dobYear          = explode('-',$dob);
		$dobYear          = $dobYear[0];
		$age              = $year - $dobYear;
		
		$alias            = explode(';',$alias);
		
		if (strpos($status, 'status') !== false) {
			$status = str_replace('{"status":"','',$status);
			$status = strtok($status,'"');
		}
		$scarsMarksTattoos = explode(',',$scarsMarksTattoos);
		$scarsMarksTattoos = implode('  |  ',$scarsMarksTattoos);
		$pictureLink      = str_replace('images/','',$pictureLink);
		
		
		$resultsprofile[] = array(
		'uniqueId' => $uniqueId,
		'firstName' => $firstName,
		'middleName' => $middleName,
		'lastName' => $lastName,
		'dob' => $dob,
		'age' => $age,
		'pictureLink' => $pictureLink,
		'alias' => $alias
		);
		
		$resultstable[] = array(
		'status' => $status,
		'offenderDesignation' => $offenderDesignation,
		'sex' => $sex,
		'height' => $height,
		'weight' => $weight,
		'race' => $race,
		'ethnicity' => $ethnicity,
		'hairColor' => $hairColor,
		'eyeColor' => $eyeColor,
		'scarsMarksTattoos' => $scarsMarksTattoos,
		'releaseDate' => $releaseDate,
		'verificationDate' => $verificationDate,
		'registrationDate' => $registrationDate,
		'victimAge' => $victimAge,
		'registrationEndDate' => $registrationEndDate,
		'registrationDuration' => $registrationDuration,
		'victimGender' => $victimGender,
		'probationStatus' => $probationStatus,
		'addressDate' => $addressDate,
		'skinColor' => $skinColor,
		'ageAtOffence' => $ageAtOffence,
		'biometric' => $biometric,
		'build' => $build,
		'correctiveLens' => $correctiveLens,
		'offenderEmploymentRestictions' => $offenderEmploymentRestictions,
		'offendingMethods' => $offendingMethods,
		'targets' => $targets,
		'verificationRequirement' => $verificationRequirement,
		'violations' => $violations,
		'executionDate' => $executionDate,
		);
		
		$resultsvehicle[] = array(
		'vehicle' => $vehicle
		);
	}
}

$address = "SELECT * FROM `address` WHERE `theirId` = '$sexId'";
$result  = $db1Sex->query($address);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$street           = htmlspecialchars($row['street']);
		$city             = htmlspecialchars($row['city']);
		$state            = htmlspecialchars($row['state']);
		$zip              = htmlspecialchars($row['zip']);
		$fulladdress      = htmlspecialchars($row['strAdd']);
		
		$resultsaddress[] = array(				
		'street' => $street,
		'city' => $city,
		'state' => $state,
		'zip' => $zip,
		'fulladdress' => $fulladdress,
		);
	}
}
$offenceQ = "SELECT * FROM `offense` WHERE `theirId` = '$sexId'";
$result  = $db1Sex->query($offenceQ);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$stateEquivalent    = htmlspecialchars($row['stateEquivalent']);
		$convitionCountry   = htmlspecialchars($row['convitionCountry']);
		$convictionCity     = htmlspecialchars($row['convictionCity']);
		$ageAtOffence       = htmlspecialchars($row['ageAtOffence']);
		$victimRelation     = htmlspecialchars($row['victimRelation']);
		$sentance           = htmlspecialchars($row['sentance']);
		$court              = htmlspecialchars($row['court']);
		$victimGender       = htmlspecialchars($row['victimGender']);
		$docketNumber       = htmlspecialchars($row['docketNumber']);
		$dateOffence        = htmlspecialchars($row['dateOffence']);
		$offenceCourt       = htmlspecialchars($row['offenceCourt']);
		$convictionLocation = htmlspecialchars($row['convictionLocation']);
		$convictionCountry  = htmlspecialchars($row['convictionCountry']);
		$victimAge          = htmlspecialchars($row['victimAge']);
		$details            = htmlspecialchars($row['details']);
		$releaseDate        = htmlspecialchars($row['dateRelease']);
		$statute            = htmlspecialchars($row['statute']);
		$convictionState    = htmlspecialchars($row['convictionState']);
		$dateConvicted      = htmlspecialchars($row['dateConvicted']);
		$offence            = htmlspecialchars($row['offense']);
		
		$resultsoffences[] = array(
		'stateEquivalent' => $stateEquivalent,
		'convitionCountry' => $convitionCountry,
		'convictionCity' => $convictionCity,
		'convictionState' => $convictionState,
		'offence' => $offence,
		'ageAtOffence' => $ageAtOffence,
		'victimRelation' => $victimRelation,
		'victimGender' => $victimGender,
		'victimAge' => $victimAge,
		'court' => $court,
		'docketNumber' => $docketNumber,
		'sentance' => $sentance,
		'dateOffence' => $dateOffence,
		'offenceCourt' => $offenceCourt,
		'convictionLocation' => $convictionLocation,
		'convictionCountry' => $convictionCountry,
		'details' => $details,
		'releaseDate' => $releaseDate,
		'statute' => $statute,
		'dateConvicted' => $dateConvicted,
		);
	}
}
$resultstotalSex[] = array(

'profile' => $resultsprofile,
'vehicle' => $resultsvehicle,
'table' => $resultstable,
'address' => $resultsaddress,
'offences' => $resultsoffences,
);

$resultsprofile = NULL;
$resultstable = NULL;
$resultsvehicle = NULL;
$resultsaddress = NULL;
$resultsoffences = NULL;
unset($resultsprofile);
unset($resultstable);
unset($resultsvehicle);
unset($resultsaddress);
unset($resultsoffences);
}
$ArrestId = NULL;
if ($dateOfBirth) {
$dbNewDataArrest = DatabaseNewDataArrest::getInstanceNewDataArrest();
$db1Arrest      = $dbNewDataArrest->getConnectionNewDataArrest();
$dateOfBirthArrest = $dateOfBirth. ' 00:00:00';
$ArrestQuery = "SELECT site_profile_id FROM profile WHERE first_name = '$firstName2' and last_name = '$lastName2' and dob = '$dateOfBirthArrest 'LIMIT 1";
$ArrestQuery = $db1Arrest->query($ArrestQuery);
while ($row = mysqli_fetch_array($ArrestQuery)) {
$ArrestId  = $row['site_profile_id'];
}
}
if ($ArrestId <> NULL) {
	$ArrestTest = 'true';
}
?> 

<?php
$streets[] = '2 2nd ST';
$result = array_unique($streets);

//$addressCounter =  count($resultsa[0][1][0]['address']);
//$phoneCounter =  count($resultsa[0][1][0]['phones']);
//$emailCounter =  count($resultsa[0][1][0]['emails']);
//$aliasesCounter =  count($resultsa[0][1][0]['aliases']);
//$educationCounter =  count($resultsa[0][1][0]['education']);
//$workCounter =  count($resultsa[0][1][0]['workexp']);
//$relativesCounter =  count($resultsa[0][1][0]['relatives']);
?>



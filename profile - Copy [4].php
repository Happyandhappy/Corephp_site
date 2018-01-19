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
		}
		if ($db_type == 'quanki_db') {
		$db = DatabaseMain::getInstanceMain(); // Quanki DB
		$mysqliNewData = $db->getConnectionMain();  // Quanki DB
		$db_InUse = 'hostgator';
		}
		if ($db_type == 'hostgator_db') {
		$dbOldData = DatabaseOldData::getInstanceOldData(); // Hostgator
		$mysqliNewData = $dbOldData->getConnectionOldData();  // Hostgator
		}
		

//$loadData->intel();
//$loadData->basicData();

$query = "SELECT profileId, firstName, middleName, lastName, gender, dateOfBirth FROM `profile` WHERE `profileId` = '{$uniqueidentifierperson}' LIMIT 1  ";
	$profile = $mysqliNewData->query($query);	
	while ($row = mysqli_fetch_array($profile)) {
	$firstName   = $row['firstName'];
	$middleName  = $row['middleName'];
	$lastName    = $row['lastName'];
	$gender      = $row['gender'];
	$dateOfBirth = $row['dateOfBirth'];
	if ($gender == 'M') { 	$gender = 'Male'; }
	if ($gender == 'F') { 	$gender = 'Female'; }
	$fullname = $firstName.' '.$middleName.' '.$lastName;
	} // end of while
	
	
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

$emailsExperian = "SELECT id FROM data WHERE EMAIL IN ($completeemails) LIMIT 1";

$emailsValues = $dbExperianConnect->query($emailsExperian);
while ($row = mysqli_fetch_array($emailsValues)) {
$Experianids = $row['id']; 
$completeids .= $ids . ' ';
}
if ($Experianids <> NULL) {
	$ExperianTest = 'true';
}
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
$addressCounter =  count($resultsa[0][1][0]['address']);
$phoneCounter =  count($resultsa[0][1][0]['phones']);
$emailCounter =  count($resultsa[0][1][0]['emails']);
$aliasesCounter =  count($resultsa[0][1][0]['aliases']);
$educationCounter =  count($resultsa[0][1][0]['education']);
$workCounter =  count($resultsa[0][1][0]['workexp']);
$relativesCounter =  count($resultsa[0][1][0]['relatives']);
?>

<!DOCTYPE html>

<html lang="en">



<head>

	<title><?php echo $profileTotalCombined. ' Results For '. ucwords($webTitle);?></title>

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

					<h1><?php echo strtoupper($fullname)?></h1>

					<ol class="breadcrumb">

						<li><a href="/">Home</a> </li>

						<li style="color:#fff;"><?php echo strtoupper($fullname)?> </li>

						

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

                              

                              	 <li><a class="active" href="#basic">Basic</a> </li>
							
									

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

                              		<li class="tab col"><a class="active" href="#basic">Basic</a> </li>
                                       <li class="tab col"><a href="#work">Employment</a> </li>
     <li class="tab col"><a href="#test4">Companies</a> </li>

                                    <li class="tab col"><a href="#test4">Voter</a> </li>

                                    <li class="tab col"><a href="#test4">Patents</a> </li>

                                    <li class="tab col"><a href="#test4">Property</a> </li>

                                        <li class="tab col"><a href="#test4">Vehicle</a> </li>

                               

                                 

                                    
<li class="tab col"><a href="http://build-report.php?unique=<?php echo $uniqueId ?>"><i class="fa fa-search" aria-hidden="true"></i> Unlock Profile</a> </li>
									

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

                    <div class="col-md-9 dir-alp-con-right" id="basic">

						<div class="dir-alp-con-right-1">

							<div class="row">

								<!--LISTINGS-->

                                 

							<?php
						

    echo '            <div class="home-list-pop list-spac">

									<!--LISTINGS IMAGE-->

									<div class="col-md-3" id="mobileicon"> <img src="images/usericon.png" alt="" /> </div>

									<!--LISTINGS: CONTENT-->

									<div class="col-md-9 home-list-pop-desc inn-list-pop-desc" style="float:left;"> <a href="profile.php?unique='.$uniqueId.'"><h3>' . $fullname . ', ' . ageCalculator($dateOfBirth) . '</h3></a>

										<h4>DOB : ' . $dateOfBirth . '</h4>
<div class="col-md-6 home-list-pop-desc inn-list-pop-desc" style="float:left;">
										<p><b>Address: </b>';
    for ($l = 0; $l < 1; $l++) {
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

	if ($addressCounter <= 1 ) { 
	echo '<a href="profile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li style="color:#337ab7">Search for more </li></a> <br/>'; }
	else {
	 echo '<a href="profile.php?unique='.$uniqueId.'" style="color:#337ab7 !important; font-size:14px;"><li style="color:#337ab7 !important;">and atleast '.($addressCounter - 1).' more </li></a> <br/>'; }
    echo '</p>
	</div>
	
<div class="col-md-6 home-list-pop-desc inn-list-pop-desc" style="float:left;">
										<p><b>Associated With: </b>';
    for ($o = 0; $o < 1; $o++) {
	  // echo $addressCounter << die execute reg, soveel keer vir soveel addresse.
				$relativeFirstName     = $resultsa[$k][$k][0]['relatives'][$o]["relativeFirstName"];
                $relativeMiddleName    = $resultsa[$k][$k][0]['relatives'][$o]["relativeMiddleName"];
                $relativeLastName      = $resultsa[$k][$k][0]['relatives'][$o]["relativeLastName"];
				$relativeFullName = $relativeFirstName.' '.$relativeMiddleName.' '.$relativeLastName;
	  echo '<li>'.$relativeFullName.'</li> ';
    }
	if ($relativesCounter <= 1 ) { 
	echo '<a href="profile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li style="color:#337ab7">Search for more </li></a> <br/>'; }
	else {
	 echo '<a href="profile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li style="color:#337ab7">and atleast '.($relativesCounter - 1).' more </li></a> <br/>'; }
    echo '</p>
	
	</div>
<div style="clear:both;"> </div>
							
<div class="col-md-6 home-list-pop-desc inn-list-pop-desc" style="float:left; margin-top:-15px !important;">
										<div class="list-number">
										<p> <b>
Phones: </b> </p>
											<ul>';
for ($m = 0; $m < 1; $m++) {
  $PhoneNumber    = $resultsa[$k][$k][0]['phones'][$m]["phoneNumber"];
  if (strpos($PhoneNumber, '+') !== false) {
	
echo ' <li style="width:100%;"><i class="fa fa-phone" style="font-size:25px;color:orange; margin-right:10px;" aria-hidden="true"></i>'.$PhoneNumber.'</li>';
}
}
if ($phoneCounter <= 1 ) { 
	echo '<a href="profile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li style="color:#337ab7 !important;">Build Report! </li></a> <br/>'; }
	else {
	 echo '<a href="profile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li style="color:#337ab7 !important;">and atleast '.($phoneCounter - 1).' more </li></a> <br/>'; }
	 
 echo '
												

											</ul>

										</div> 
</div>	

<div class="col-md-6 home-list-pop-desc inn-list-pop-desc" style="float:left; margin-top:-15px !important;">
										<div class="list-number">
	<p> <b>
Emails: </b> </p>
											<ul>';
for ($n = 0; $n < 1; $n++) {
  $emails    = $resultsa[$k][$k][0]['emails'][$n]["email"];
  if (strpos($emails, '@') !== false) {
	
echo ' <li style="width:100%;"><i class="fa fa-envelope" style="font-size:25px;color:orange; margin-right:10px;" aria-hidden="true"></i>'.$emails.'</li>';
}
}
if ($emailCounter <= 1 ) { 
	echo '<a href="profile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li style="color:#337ab7 !important;">Build Report! </li></a> <br/>'; }
	else {
	 echo '<a href="profile.php?unique='.$uniqueId.'" style="color:#337ab7 !important;"><li style="color:#337ab7 !important;">and atleast '.($emailCounter - 1).' more </li></a> <br/>'; } 
 echo '									

											</ul>

										</div> 
</div>										
										
										
										<span class="home-list-pop-rat"><i class="fa fa-unlock-alt" style="font-size:25px;color:#337ab7" aria-hidden="true"></i></span>

										<div class="list-enqu-btn">

											<ul>

												

												
												<li style="width:75%; font-size:12px; color: #0e76a8; font-weight:bold; font-style:italic; float:left;">Sex Offenders, Arrest, Work Experience, Companies,  Social Accounts, Educational, Property, Vehicle, Voter, Patents,  Whois, and more.. </li>

												<li><a href="profile.php?unique='.$uniqueId.'"><i class="fa fa-search" aria-hidden="true"></i> Free Profile</a> </li>

											</ul>

										</div>

									</div>

								</div>';

?>


<div class="col-md-12">
								<div class="box-inn-sp">
									<div class="inn-title">
										<h4>Phone Numbers</h4>
										
									</div>
									<div class="tab-inn">
										<div class="table-responsive table-desi">
											
                                            <table class="table table-hover">
												<thead>
													<tr>
														<th>Phone</th>
														<th>Location</th>
														<th>Type</th>
													</tr>
												</thead>
												<tbody>
													 <?php
						$phones = "SELECT phoneNumber, location, connectionType FROM `phones` WHERE `profileId`= '$uniqueidentifierperson'";
						$phones = $mysqliNewData->query($phones);
						while ($row = mysqli_fetch_array($phones)) {
						$phoneNumber    = $row['phoneNumber'];
						//$phoneRegion    = $row['phoneRegion'];
						$location       = $row['location'];
						$connectionType = $row['connectionType'];
						$tosplit = explode('-', $phoneNumber);
        				$firstPhone = $tosplit[0];
						$firstPhone = str_replace('+1 ', '', $firstPhone);
						$middlePhone = $tosplit[1];
		 				$lastPhone = $tosplit[2];
						echo '<tr>';
						echo '<td><span class="txt-dark weight-500">' . $phoneNumber . '</span></td>';
						//echo '<td class="col3">' . $phoneRegion . '</td>';
						echo '<td><span class="txt-dark weight-500">' . $location . '</td>';
						echo '<td><span class="txt-dark weight-500">' . $connectionType . '</td>';

						echo '</tr>';
						}
					?>
                     <?php
					 if ($ExperianTest == 'true') {
						$phones = "SELECT CITY, ST, PHONE FROM `data` WHERE `id`= '$Experianids'";
						$phones = $dbExperianConnect->query($phones);
						while ($row = mysqli_fetch_array($phones)) {
						$city    = $row['CITY'];
						$state    = $row['ST'];
						$location = $city.', '.$state;
						$phoneNumber       = phoneFormat($row['PHONE']);
						$connectionType = 'Unknown';
						echo '<tr>';
						echo '<td><span class="txt-dark weight-500">' . $phoneNumber . '</span></td>';
						//echo '<td class="col3">' . $phoneRegion . '</td>';
						echo '<td><span class="txt-dark weight-500">' . $location . '</td>';
						echo '<td><span class="txt-dark weight-500">' . $connectionType . '</td>';

						echo '</tr>';
						}
					 }
					?>
                                                    
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
<!--Phones end here-->

<div class="col-md-12">
								<div class="box-inn-sp">
									<div class="inn-title">
										<h4>Locations</h4>
										
										<!-- Dropdown Structure -->
									</div>
									<div class="tab-inn">
										<div class="table-responsive table-desi">
											
                                            <table class="table table-hover">
												<thead>
													<tr>
														 <th> Street Address   </th>
                        <th>      City         </th>
                        <th>     State             </th>
                        <th>                 Zip        </th>
													</tr>
												</thead>
												<tbody>
						 <?php




					for($k = 0; $k < $addressCounter ;$k++){
						$addressStreetAddress = $resultsa[0][1][0]['address'][$k]["streetAddress"];
						$addressCity  = $resultsa[0][1][0]['address'][$k]["city"];
						$addressState  = $resultsa[0][1][0]['address'][$k]["state"];
						$addressZip =  $resultsa[0][1][0]['address'][$k]["zip"];
	
			echo '<tr>';
						
						//  echo '<td class="col2"><span itemprop="address">' . $houseNumber . '</span></td>';
						//  echo '<td class="col3"><span itemprop="address">' . $unitNumber . '</span></td>';
						// echo '<td class="col4"><span itemprop="homeLocation">' . $streetName . '</span></td>';
						echo '<td class="col5"><span itemprop="streetAddress" class="street-address" style="font-weight:bold; text-style:underline;">' . $addressStreetAddress . '</span>';
						echo '<li>First seen: '.$firstSeen.'</li><li>Last seen: ' .$lastSeen.'</li></td>';
						echo '<td class="col6"><span itemprop="addressLocality" class="locality">' . $addressCity . '</span>';
						echo '<li>Latitude: '.$latitude.'</li><li>Longitude: ' .$longitude.'</li></td>';
						echo '<td class="col7"><span itemprop="addressRegion" class="region">' . $addressState . '</span>';
						echo '<li>Unit No: '.$unitNumber.'</li><li>Street: ' .$streetName.'</li></td>';
						echo '<td class="col8"><span itemprop="postalCode" class="postal-code">' . $addressZip . '</span>';
						echo '</td>';				  
						//  echo '<td class="col9">' . $firstSeen . '</td>';
						//   echo '<td class="col10">' . $lastSeen . '</td>';
						echo '</tr>';
						}
					
                    
					?>
					
                                                    
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
                            
                            <!--Address ends here-->
                      
                      <div class="col-md-12">
								<div class="box-inn-sp">
									<div class="inn-title">
										<h4>Emails</h4>
										
										<!-- Dropdown Structure -->
									</div>
									<div class="tab-inn">
										<div class="table-responsive table-desi">
											
                                            <table class="table table-hover">
												<thead>
													<tr>
														<th>Emails</th>
													</tr>
												</thead>
												<tbody>
						<?php						
						$email = "SELECT email FROM `emails` WHERE `profileId` = '$uniqueidentifierperson'";
						$email = $mysqliNewData->query($email);
						while ($row = mysqli_fetch_array($email)) {
						$emaildisplay = $row['email'];
						echo '<tr>';
						echo '<td><span class="txt-dark weight-500">' . $emaildisplay .  '</span></td>';
						//echo '<td class="col1"><span itemprop="email" class="email"><a href="emailsearch.php?email=' . $emaildisplay .'" rel="nofollow">' . $emaildisplay . '</a>'.'</span></td>';
						echo '</tr>';
						}	 
					?>
					
                                                    
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
                            
                            
                            <!--Emails end here-->      
							</div>

							

						</div>

					</div>

                            

					

                    

                    	

                    

                    

				</div>

<div class="col-md-9 dir-alp-con-right" id="work">

						<div class="dir-alp-con-right-1">

							<div class="row">

<div class="col-md-12">
								<div class="box-inn-sp">
									<div class="inn-title">
										<h4>Work Related</h4>
										
										<!-- Dropdown Structure -->
									</div>
									<div class="tab-inn">
										<div class="table-responsive table-desi">
											
                                            <table class="table table-hover">
												<thead>
													<tr>
													 <th>    Company </th>
                      <th>             Title             </th>
                   
													</tr>
												</thead>
												<tbody>
										
						  <?php
					$workexp = "SELECT companyName, title, division, workStartDate, workEndDate, companyDesc FROM `workexp` WHERE `profileId` = '$uniqueidentifierperson'";
					$workexp = $mysqliNewData->query($workexp);
					while ($row = mysqli_fetch_array($workexp)) {
					$companyName   = $row['companyName'];
					$title         = $row['title'];
					$division      = $row['division'];
					$workStartDate = $row['workStartDate'];
					$workEndDate   = $row['workEndDate'];
					$companyDesc   = $row['companyDesc'];
					echo '<tr>';
					echo '<td><span class="txt-dark weight-500" style="font-weight:bold;">'. $companyName .'</span>';
					echo '<li>'.$companyDesc.'</li></td>';
					echo '<td><span class="txt-dark weight-500">' . $title . '</span></td>';
			
					echo '</tr>';
					}
					?>
					
                                                    
												</tbody>
											</table>
										</div>
									</div>
								</div>
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

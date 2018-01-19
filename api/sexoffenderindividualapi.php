<?php 
function clean($string) {
	while (strpos(substr($string, -1), ' ') !== false) 
		$string = substr($string, 0, -1);
	$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
	return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
// this function is to remove ending spaces
}
class DatabaseOffenders { // connecting to DB
	private $_connection;
	private static $_instance;
	private $_host = "192.249.125.90";
	private $_username = "sexoffen_data";
	private $_password = "XZ3UiD?1xWqQ";
	private $_database = "sexoffen_data";
	public static function getInstanceOffenders() {
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
	public function getConnectionOffenders() {
	return $this->_connection;
	}
};
$dbOffenders = DatabaseOffenders::getInstanceOffenders();
$dbOffendersConnect = $dbOffenders->getConnectionOffenders(); 
$offender = htmlentities(($_GET['offender']));
if ($offender == '') {
	header('Location: 404.php');
} 
$year = date('Y');
$result  = $dbOffendersConnect->query($searchquery);
$totalcounterNew = $result->num_rows;

$profile = "SELECT * FROM `basic` WHERE `theirId` = '$offender'";
$result  = $dbOffendersConnect->query($profile);
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
		$vehicle             = json_decode(htmlspecialchars($row['vehicleInfo'],1));
		/*if (substr($vehicle, -2) !== '"}]'){
			$tempVehicle = explode('},',$vehicle);
			unset($tempVehicle[count($tempVehicle)-1]);
			$tempVehicle = implode('},',$tempVehicle);
			$tempVehicle = $tempVehicle . '}]';
			//$vehicle             = json_decode($tempVehicle,1);
			var_dump($tempVehicle);
		}
		else
			$vehicle             = json_decode($vehicle,1);*/
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


$address = "SELECT * FROM `address` WHERE `theirId` = '$offender'";
$result  = $dbOffendersConnect->query($address);
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
$offenceQ = "SELECT * FROM `offense` WHERE `theirId` = '$offender'";
$result  = $dbOffendersConnect->query($offenceQ);
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


$resultstotal[] = array(

'profile' => $resultsprofile,
'vehicle' => $resultsvehicle,
'table' => $resultstable,
'address' => $resultsaddress,
'offences' => $resultsoffences,
);


unset($resultsprofile);
unset($resultstable);
unset($resultsvehicle);
unset($resultsaddress);
unset($resultsoffences);
$finaljson = (json_encode($resultstotal, true));
echo $finaljson;	

?>
<?php
function base64url_encode($data) {
return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}
function base64url_decode($data) {
return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
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
	if ( count($_GET) <> 2 ) { 	header('Location: 404.php');
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
$completeemails .= $emails . ' ';

}
$address = "SELECT city, state FROM `addresses` WHERE `profileId` = '$uniqueidentifierperson' GROUP BY city, state  ";
$address = $mysqliNewData->query($address);
while ($row = mysqli_fetch_array($address)) {
$countAddress =mysqli_num_rows($address);
$countAddress = ($countAddress - 1);
$city   = $row['city'];
$state  = $row['state'];
$homeLocation = $city.', '.$state;
$fulladdress .= $city . ', ' . $state. ' - ';
}
$firstName2 = $firstName;
$lastName2 = $lastName;
$dbExperian = DatabaseExperian::getInstanceExperian(); // DiscoverThem
$dbExperianConnect = $dbExperian->getConnectionExperian();  // Initial DB
$emailsExperian = "SELECT id FROM data WHERE EMAIL IN ('$emails') LIMIT 1";
$emailsValues = $dbExperianConnect->query($emailsExperian);
while ($row = mysqli_fetch_array($emailsValues)) {
$Experianids = $row['id']; 
$completeids .= $ids . ' ';
}
if ($Experianids <> NULL) {
	$ExperianTest = 'true';
}
echo $ExperianTest;
?>
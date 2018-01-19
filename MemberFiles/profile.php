<?php
require_once ('config.php'); // loading databases
$t = htmlspecialchars($_GET['t']);
$uniqueidentifierperson = htmlspecialchars($_GET['unique']);
echo 'test';




		$dbQuanki = DatabaseInmotion::getInstanceInmotion(); // Quanki DB
		$mysqliInmotion = $dbQuanki->getConnectionInmotion();  // Quanki DB
		echo 'test3';
		$dbScanThemProfile = DatabaseCubibProfile::getInstanceCubibProfile(); // Quanki DB
		echo 'test';
		$mysqliCubibProfile = $dbScanThemProfile->getConnectionCubib();  // Quanki DB
		echo 'test4';
	// So one thing comes in, in this case it is intelius's profile ID and then we match from here.
	
	

$query = "SELECT profileId, firstName, middleName, lastName, gender, dateOfBirth FROM `profile` WHERE `profileId` = '{$uniqueidentifierperson}' LIMIT 1  ";
echo $query;
	$profile = $mysqliInmotion->query($query);	
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
	echo '<br />';
	echo 'First Name:'. $firstName.'<br />';
	echo 'Middle Name:'.$middleName.'<br />';
	echo 'Last Name:'.$lastName.'<br />';
	echo 'Gender Name:'.$gender.'<br />';
	echo 'Dob Name:'.$dateOfBirth.'<br />';
	
	// Currently this only works when the person has one email

//echo $completeemails;
//echo 'test';
//$query = "SELECT uniqueId, emails, theirUnique FROM `email` WHERE `email` = '{$completeemails}' LIMIT 1  ";
//echo $query;
//	$profile = $mysqliCubibProfile->query($query);	
//	while ($row = mysqli_fetch_array($profile)) {
//	$uniqueId   = $row['uniqueId'];
//	$emails  = $row['emails'];
//	$theirUnique    = $row['theirUnique'];
//
//	} // end of while
//	echo '<br />';
//	echo 'uniqueId'. $uniqueId.'<br />';
//	echo 'Emails'.$emails.'<br />';
//	echo 'Their Unique'.$theirUnique.'<br />';

		$emailsQuery = "SELECT * FROM `emails` WHERE `profileId` = '{$uniqueidentifierperson}' ";
		$result  = $mysqliInmotion->query($emailsQuery);
		$results = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$uniqueId        = htmlspecialchars($row['profileId']);
				$emails = $row['email'];
				$resultsEmail[] = array(
				'uniqueId' => $uniqueId,
				'emails' => $emails,
				'db_type' => 'Quanki'
				);
			}
		}
		var_dump($resultsEmail);
	


?>
<?php
error_reporting(0);
ini_set('max_execution_time', 300);
ini_set('display_errors', 0); 
define("_WOJO", true);
require_once("dashboard/init.php");
error_reporting(0);
$uniqueidentifierperson = $_GET['unique'];
require_once ('config.php'); // loading databases
require_once ('experianFunctions.php');
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
$address = "SELECT city, state FROM `addresses` WHERE `profileId` = '$uniqueidentifierperson' GROUP BY city, state  ";
$address = $mysqliNewData->query($address);
while ($row = mysqli_fetch_array($address)) {
$countAddress =mysqli_num_rows($address);
$countAddress = ($countAddress - 1);
$streetName =  $row['streetName'];
$city   = $row['city'];
$state  = $row['state'];
$homeLocation = $city.', '.$state;
$fulladdress .= $city . ', ' . $state. ' - ';
$completeStreetName .= $streetName . ' ';
}
//echo 'test4';
//echo $completeStreetName;
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
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $fullname;?> Profile! </title>
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
	<link href="css/styleProfile.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	<!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
	<link href="css/responsiveProfile.css" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
<style>
li {
	list-style-type:none !important;
}
.wojo.small.message {
	display:none !important;
}

</style>
</head>

<body>
	
	<!--TOP SEARCH SECTION-->
	<?php include ('headerInner.php'); ?>
	<section>
		<div class="v3-list-ql">
			<div class="container">
				<div class="row">
					<div class="v3-list-ql-inn">
						<ul>
							<li class="active"><a href="#ld-abour"><i class="fa fa-user"></i> About</a>
							</li>
							<li><a href="#ld-ser"><i class="fa fa-phone"></i> Phones</a>
							</li>
							<li><a href="#ld-gal"><i class="fa fa-envelope"></i> Emails</a>
							</li>
							<li><a href="#ld-roo"><i class="fa fa-map-marker"></i> Addresses</a>
							</li>
							<li><a href="#ld-vie"><i class="fa fa-graduation-cap"></i>Education </a>
							</li>
							<li><a href="#ld-rew"><i class="fa fa-building"></i> Work</a>
							</li>
							<li><a href="#ld-rer"><i class="fa fa-star-half-o"></i> Aliases</a>
							</li>
                            <li><a href="#ld-rer"><i class="fa fa-star-half-o"></i> Sex Offender</a>
							</li>
                            <li><a href="#ld-rer"><i class="fa fa-star-half-o"></i> Arrests</a>
                            <li><a href="#ld-rer"><i class="fa fa-star-half-o"></i> Relatives</a>
							</li>

							</li>
                        
						</ul>
					</div>
				</div>
			</div>
		</div>
        
        
        
	</section>
	<!--LISTING DETAILS-->
	<section class="pg-list-1">
		<div class="container">
			<div class="row">
           
				<div class="pg-list-1-left"><div class="col-md-3" id="mobileicon" style="width:100px; margin-right:20px;"> <img src="images/usericon.png" alt="" width="100px;" /> </div> <a href="#"><h3><?php echo $fullname; ?></h3></a>
					<div class="list-rat-ch"> <span><?php echo $dateOfBirth; ?></span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </div>
					<h4><?php echo $fulladdress; ?></h4>
					
					<div class="list-number pag-p1-phone">
						<ul>
							<li><i class="fa fa-phone" aria-hidden="true"></i><?php echo $completephone; ?></li>
							<li><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $completeemails; ?></li>
							
						</ul>
					</div>
				</div>
				<div class="pg-list-1-right">
					<div class="list-enqu-btn pg-list-1-right-p1">
						<ul>
							<li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> Phones</a> </li>
							<li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> Emails</a> </li>
							<li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> Address</a> </li>
							<li><a href="#" data-dismiss="modal" data-toggle="modal" data-target="#list-quo"><i class="fa fa-wrench" aria-hidden="true"></i>Update!</a> </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="list-pg-bg">
		<div class="container">
			<div class="row">
				<div class="com-padd" style="padding:10px 0px !important;">
					<div class="list-pg-lt list-page-com-p">
						<!--LISTING DETAILS: LEFT PART 1-->
						<div class="pglist-p1 pglist-bg pglist-p-com" id="ld-abour">
							<div class="pglist-p-com-ti">
								<h3><span>Profile for </span><?php echo $fullname; ?></h3> </div>
							
<?php if ($SexTest == 'true') {
	if($savedImageSex){
										$profilePic = str_replace('images/','http://sexoffenderspy.com/offenderimages/',$savedImageSex);
										$file_headers = @get_headers($profilePic);
										$handle = curl_init($profilePic);
										curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
										
										/* Get the HTML or whatever is linked in $url. */
										$response = curl_exec($handle);
										
										/* Check for 404 (file not found). */
										$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
										if($httpCode == 404) {
											$profilePic = 'images/usericon.png';
										}
										curl_close($handle);

									}
	echo '<img src="'.$profilePic.'" width="150px" alt="" style="padding:20px 15px 10px 15px;">';
	} ?>
 
  	
						</div>
                        
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
						$address = "SELECT streetAddress, city, state, zip, firstSeen, lastSeen, latitude, longitude, unitNumber, streetName FROM `addresses` WHERE `profileId` = '$uniqueidentifierperson'";
						$address = $mysqliNewData->query($address);
						while ($row = mysqli_fetch_array($address)) {
						$houseNumber   = $row['houseNumber'];
						$unitNumber    = $row['unitNumber'];
						$streetName    = $row['streetName'];
						$streetAddress = $row['streetAddress'];
						$city          = $row['city'];
						$state         = $row['state'];
						$zip           = $row['zip'];
						$firstSeen     = $row['firstSeen'];
						$lastSeen      = $row['lastSeen'];
						$latitude     = $row['latitude'];
						$longitude      = $row['longitude'];
						echo '<tr>';
						
						//  echo '<td class="col2"><span itemprop="address">' . $houseNumber . '</span></td>';
						//  echo '<td class="col3"><span itemprop="address">' . $unitNumber . '</span></td>';
						// echo '<td class="col4"><span itemprop="homeLocation">' . $streetName . '</span></td>';
						echo '<td class="col5"><span itemprop="streetAddress" class="street-address" style="font-weight:bold; text-style:underline;">' . $streetAddress . '</span>';
						echo '<li>First seen: '.$firstSeen.'</li><li>Last seen: ' .$lastSeen.'</li></td>';
						echo '<td class="col6"><span itemprop="addressLocality" class="locality">' . $city . '</span>';
						echo '<li>Latitude: '.$latitude.'</li><li>Longitude: ' .$longitude.'</li></td>';
						echo '<td class="col7"><span itemprop="addressRegion" class="region">' . $state . '</span>';
						echo '<li>Unit No: '.$unitNumber.'</li><li>Street: ' .$streetName.'</li></td>';
						echo '<td class="col8"><span itemprop="postalCode" class="postal-code">' . $zip . '</span>';
						echo '</td>';				  
						//  echo '<td class="col9">' . $firstSeen . '</td>';
						//   echo '<td class="col10">' . $lastSeen . '</td>';
						echo '</tr>';
						}
						?>
                         <?php
					 if ($ExperianTest == 'true') {
						$address = "SELECT ADDR, CITY, ST, ZIP FROM `data` WHERE `id`= '$Experianids'";;
						$address = $dbExperianConnect->query($address);
						while ($row = mysqli_fetch_array($address)) {
						$ADDR   = $row['ADDR'];
						$CITY    = $row['CITY'];
						$ST    = $row['ST'];
						$ZIP = $row['ZIP'];
					
						echo '<tr>';
						echo '<td class="col5"><span itemprop="streetAddress" class="street-address" style="font-weight:bold; text-style:underline;">' . $ADDR . '</span></td>';

						echo '<td class="col6"><span itemprop="addressLocality" class="locality">' . $CITY . '</span></td>';

						echo '<td class="col7"><span itemprop="addressRegion" class="region">' . $ST . '</span></td>';

						echo '<td class="col8"><span itemprop="postalCode" class="postal-code">' . $ZIP . '</span>';
						echo '</td>';				  
						//  echo '<td class="col9">' . $firstSeen . '</td>';
						//   echo '<td class="col10">' . $lastSeen . '</td>';
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
                      
                         	<div class="col-md-12">
								<div class="box-inn-sp">
									<div class="inn-title">
										<h4>Education</h4>
										
										<!-- Dropdown Structure -->
									</div>
									<div class="tab-inn">
										<div class="table-responsive table-desi">
											
                                            <table class="table table-hover">
												<thead>
													<tr>
														<th>Degree</th>
                                                        <th>Major</th>
                                                        <th>Title</th>
													</tr>
												</thead>
												<tbody>
										
							<?php
						$education = "SELECT degreeSchool, degreeMajor, degreeTitle FROM `education` WHERE `profileId` = '$uniqueidentifierperson'";
						$education = $mysqliNewData->query($education);
						while ($row = mysqli_fetch_array($education)) {
						$degreeSchool = $row['degreeSchool'];
						$degreeMajor  = $row['degreeMajor'];
						$degreeTitle  = $row['degreeTitle'];
						echo '<tr>';
						echo '<td><span class="txt-dark weight-500">' . $degreeSchool . '</span></td>';
						echo '<td><span class="txt-dark weight-500">' . $degreeMajor . '</span></td>';
						echo '<td><span class="txt-dark weight-500">' . $degreeTitle . '</span></td>';
						echo '</tr>';
						}
					
					?>
					
                                                    
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
                            
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
                      <th>                   Start        </th>
                      <th>              End            </th>
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
					echo '<td><span class="txt-dark weight-500">'. $companyName .'</span>';
					echo '<li>'.$companyDesc.'</li></td>';
					echo '<td><span class="txt-dark weight-500">' . $title . '</span></td>';
					echo '<td><span class="txt-dark weight-500">' . $workStartDate . '</span></td>';
					echo '<td><span class="txt-dark weight-500">' . $workEndDate . '</span></td>';					
					echo '</tr>';
					}
					?>
					
                                                    
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
                            
                               	<div class="col-md-12">
								<div class="box-inn-sp">
									<div class="inn-title">
										<h4>Aliases</h4>
										
										<!-- Dropdown Structure -->
									</div>
									<div class="tab-inn">
										<div class="table-responsive table-desi">
											
                                            <table class="table table-hover">
												<thead>
													<tr>
													 <th>
                        Aliases
                      </th>
                     
													</tr>
												</thead>
												<tbody>
										
						  <?php
					
					$aliases = "SELECT firstName, middleName, lastName FROM `aliases` WHERE `profileId` = '$uniqueidentifierperson'";
					$aliases = $mysqliNewData->query($aliases);
					while ($row = mysqli_fetch_array($aliases)) {
					$firstName  = $row['firstName'];
					$middleName = $row['middleName'];
					$lastName   = $row['lastName'];
					$fullaliases = $firstName.' '. $middleName.' '.$lastName;
					echo '<tr>';
					echo '<td><span class="txt-dark weight-500">' . $fullaliases . '</span></td>';
					echo '</tr>';
					}
					?>
                    	<?php 
						if ($SexTest == 'true') {
										if(count($resultstotalSex[0]["profile"][0]["alias"]) > 0)
											for($a = 0;$a < count($resultstotalSex[0]["profile"][0]["alias"]); $a++){
												if(strlen(trim($resultstotalSex[0]["profile"][0]["alias"][$a])) > 2)
											echo '<tr>';
						echo '<td><span class="txt-dark weight-500">' . trim($resultstotalSex[0]["profile"][0]["alias"][$a]) . '</span></td>';	
					echo '</tr>';
												}}
													
													?>	
					
                                                    
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>  
                            
                            
                             	<div class="col-md-12">
								<div class="box-inn-sp">
									<div class="inn-title">
										<h4>Related People</h4>
									
										<!-- Dropdown Structure -->
									</div>
									<div class="tab-inn">
										<div class="table-responsive table-desi">
											
                                            <table class="table table-hover">
												<thead>
													<tr>
												 <th>
                        First Name
                      </th>
                      <th>
                        Last Name
                      </th>
                      <th>
                        DOB
                      </th>
                      <th>
                        Relationship
                      </th>
													</tr>
												</thead>
												<tbody>
										
						  <?php
					
		
					$relatives = "SELECT relativeFirstName, relativeMiddleName, relativeLastName, relativeDateOfBirth, relativeRelationship, relativeProfileId FROM `relatives` WHERE `profileId` = '$uniqueidentifierperson'";
					$relatives = $mysqliNewData->query($relatives);
					while ($row = mysqli_fetch_array($relatives)) {
					$relativeFirstName    = $row['relativeFirstName'];
					$relativeMiddleName   = $row['relativeMiddleName'];
					$relativeLastName     = $row['relativeLastName'];
					$relativeDateOfBirth  = $row['relativeDateOfBirth'];
					$relativeRelationship = $row['relativeRelationship'];
					$profileId            = $row['relativeProfileId'];
					$uniqueidentifierpersonRelative =  base64url_encode($profileId);
					$uri = '__'.$uniqueidentifierpersonRelative;
					echo '<tr>';
  					echo '<td><span class="txt-dark weight-500">' . '<a href="report.php?unique=' . $uri . '">' . $relativeFirstName . '</a></span></td>';
					echo '<td><span class="txt-dark weight-500">' . '<a href="report.php?unique=' . $uri . '">' . $relativeLastName . '</a></span></td>';
					echo '<td><span class="txt-dark weight-500">' . '<a href="report.php?unique=' . $uri . '">' . $relativeDateOfBirth . '</a></span></td>';
					echo '<td><span class="txt-dark weight-500">' . '<a href="report.php?unique=' . $uri . '">' . $relativeRelationship . '</a></span></td>';
					echo '</tr>';
					}
				?>
					
                                                    
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>                 

						<!--END LISTING DETAILS: LEFT PART 1-->
						<!--LISTING DETAILS: LEFT PART 2-->
						<div class="col-md-12">
								<div class="box-inn-sp">
									<div class="inn-title">
										<h4>Usernames</h4>
										
										<!-- Dropdown Structure -->
									</div>
									<div class="tab-inn">
										<div class="table-responsive table-desi">
											
                                            <table class="table table-hover">
												<thead>
													<tr>
													 <th>
                        First Name
                      </th>
                      <th>
                        Middle Name
                      </th>
                      <th>
                        Last Name
                      </th>
													</tr>
												</thead>
												<tbody>
										
						  <?php
					
					$aliases = "SELECT firstName, middleName, lastName FROM `aliases` WHERE `profileId` = '$uniqueidentifierperson'";
					$aliases = $mysqliNewData->query($aliases);
					while ($row = mysqli_fetch_array($aliases)) {
					$firstName  = $row['firstName'];
					$middleName = $row['middleName'];
					$lastName   = $row['lastName'];
					echo '<tr>';
					echo '<td><span class="txt-dark weight-500">' . $firstName . '</span></td>';
					echo '<td><span class="txt-dark weight-500">' . $middleName . '</span></td>';
					echo '<td><span class="txt-dark weight-500">' . $lastName . '</span></td>';
					echo '</tr>';
					}
					?>
					
                                                    
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						<!--END LISTING DETAILS: LEFT PART 2-->
						<!--LISTING DETAILS: LEFT PART 3-->
						<div class="col-md-12">
								<div class="box-inn-sp">
									<div class="inn-title">
										<h4>Links</h4>
										
										<!-- Dropdown Structure -->
									</div>
									<div class="tab-inn">
										<div class="table-responsive table-desi">
											
                                            <table class="table table-hover">
												<thead>
													<tr>
													 <th>
                        First Name
                      </th>
                      <th>
                        Middle Name
                      </th>
                      <th>
                        Last Name
                      </th>
													</tr>
												</thead>
												<tbody>
										
						  <?php
					
					$aliases = "SELECT firstName, middleName, lastName FROM `aliases` WHERE `profileId` = '$uniqueidentifierperson'";
					$aliases = $mysqliNewData->query($aliases);
					while ($row = mysqli_fetch_array($aliases)) {
					$firstName  = $row['firstName'];
					$middleName = $row['middleName'];
					$lastName   = $row['lastName'];
					echo '<tr>';
					echo '<td><span class="txt-dark weight-500">' . $firstName . '</span></td>';
					echo '<td><span class="txt-dark weight-500">' . $middleName . '</span></td>';
					echo '<td><span class="txt-dark weight-500">' . $lastName . '</span></td>';
					echo '</tr>';
					}
					?>
					
                                                    
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						<!--END LISTING DETAILS: LEFT PART 3-->
						<!--LISTING DETAILS: LEFT PART 4-->
						<div class="col-md-12">
								<div class="box-inn-sp">
									<div class="inn-title">
										<h4>Arrest Details</h4>
										
										<!-- Dropdown Structure -->
									</div>
									<div class="tab-inn">
										<div class="table-responsive table-desi">
									<div class="list-pg-inn-sp">
								<div class="list-pg-oth-info">
									<ul>
										<p> No records found </p>
									</ul>
								</div>
							</div>
										</div>
									</div>
								</div>
							</div>
						<!--END 360 DEGREE MAP: LEFT PART 8-->
						<div class="col-md-12">
								<div class="box-inn-sp">
									<div class="inn-title">
										<h4>Sex Offender Details</h4>
										
										<!-- Dropdown Structure -->
									</div>
									<div class="tab-inn">
										<div class="table-responsive table-desi">
									<div class="list-pg-inn-sp">
								<div class="list-pg-oth-info">
									
                                    <ul>
									         	<?php if ($SexTest == 'true')  {
														if($resultstotalSex[0]["table"][0]["status"])
														echo'<li>Status<span class="green-bg">'.$resultstotalSex[0]["table"][0]["status"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["offenderDesignation"])
														echo'<li>Designation <span>'.$resultstotalSex[0]["table"][0]["offenderDesignation"].'
																</span> </li>';
														if($resultstotalSex[0]["table"][0]["sex"])
														echo'<li>Sex <span>'.$resultstotalSex[0]["table"][0]["sex"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["height"])
														echo'<li>Height <span>'.$resultstotalSex[0]["table"][0]["height"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["weight"])
														echo'<li>Weight <span>'.$resultstotalSex[0]["table"][0]["weight"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["race"])
														echo'<li>Race <span>'.$resultstotalSex[0]["table"][0]["race"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["ethnicity"])
														echo'<li>Ethnicity <span>'.$resultstotalSex[0]["table"][0]["ethnicity"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["hairColor"])
														echo'<li>Hair Color <span>'.$resultstotalSex[0]["table"][0]["hairColor"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["eyeColor"])
														echo'<li>Eye Color <span>'.$resultstotalSex[0]["table"][0]["eyeColor"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["scarsMarksTattoos"])
														echo'<li>Scars/Marks/Tattoos <span>'.$resultstotalSex[0]["table"][0]["scarsMarksTattoos"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["releaseDate"])
														echo'<li>Release Date <span>'.$resultstotalSex[0]["table"][0]["releaseDate"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["verificationDate"])
														echo'<li>Verification Date <span>'.$resultstotalSex[0]["table"][0]["verificationDate"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["registrationDate"])
														echo'<li>Registration Date <span>'.$resultstotalSex[0]["table"][0]["registrationDate"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["victimAge"])
														echo'<li>Victim Age <span>'.$resultstotalSex[0]["table"][0]["victimAge"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["registrationEndDate"])
														echo'<li>Registration End Date <span>'.$resultstotalSex[0]["table"][0]["registrationEndDate"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["registrationDuration"])
														echo'<li>Registration Duration <span>'.$resultstotalSex[0]["table"][0]["registrationDuration"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["victimGender"])
														echo'<li>Victim Gender <span>'.$resultstotalSex[0]["table"][0]["victimGender"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["probationStatus"])
														echo'<li>Probation Status <span>'.$resultstotalSex[0]["table"][0]["probationStatus"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["addressDate"])
														echo'<li>Address Date <span>'.$resultstotalSex[0]["table"][0]["addressDate"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["skinColor"])
														echo'<li>Skin Color <span>'.$resultstotalSex[0]["table"][0]["skinColor"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["ageAtOffence"])
														echo'<li>Age At Offence Committed <span>'.$resultstotalSex[0]["table"][0]["ageAtOffence"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["biometric"])
														echo'<li>Biometric<span>'.$resultstotalSex[0]["table"][0]["biometric"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["build"])
														echo'<li>Offender Build <span>'.$resultstotalSex[0]["table"][0]["build"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["correctiveLens"])
														echo'<li>Corrective Lenses <span>'.$resultstotalSex[0]["table"][0]["correctiveLens"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["offenderEmploymentRestictions"])
														echo'<li>Employment Restrictions <span>'.$resultstotalSex[0]["table"][0]["offenderEmploymentRestictions"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["offendingMethods"])
														echo'<li>Method of Offence <span>'.$resultstotalSex[0]["table"][0]["offendingMethods"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["targets"])
														echo'<li>Targets <span>'.$resultstotalSex[0]["table"][0]["targets"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["verificationRequirement"])
														echo'<li>Verification Required <span>'.$resultstotalSex[0]["table"][0]["verificationRequirement"].'																</span> </li>';
														if($resultstotalSex[0]["table"][0]["violations"])
														echo'<li>Violations <span>'.$resultstotalSex[0]["table"][0]["violations"].'																</span> </li>';
														
		
		
		
							
																										
														
														
														
														
														
														
														
														
														
												} else {
													echo '<p> No records found.</p>'; }
															?>
									</ul>
								</div>
                                
							</div>
										</div>
									</div>
								</div>
							</div>
						<!--END 360 DEGREE MAP: LEFT PART 8-->
						<!--LISTING DETAILS: LEFT PART 6-->
						<div class="col-md-12">
								<div class="box-inn-sp">
									<div class="inn-title">
										<h4>Vehicles</h4>
										
										<!-- Dropdown Structure -->
									</div>
									<div class="tab-inn">
										<div class="table-responsive table-desi">
									<div class="list-pg-inn-sp">
								<div class="list-pg-oth-info">
									<ul>
										<p> No records found. </p>
									</ul>
								</div>
							</div>
										</div>
									</div>
								</div>
							</div>
						<!--END LISTING DETAILS: LEFT PART 6-->
						<!--LISTING DETAILS: LEFT PART 5-->
						<div class="pglist-p3 pglist-bg pglist-p-com" id="ld-rer">
							
							
						</div>
						<!--END LISTING DETAILS: LEFT PART 5-->
					</div>
					<div class="list-pg-rt">
						<!--LISTING DETAILS: LEFT PART 7-->
						<div class="pglist-p3 pglist-bg pglist-p-com">
							<div class="pglist-p-com-ti pglist-p-com-ti-right">
								
							
						</div>
						<!--END LISTING DETAILS: LEFT PART 7-->
						<!--LISTING DETAILS: LEFT PART 7-->
						<div class="pglist-p3 pglist-bg pglist-p-com">
							<div class="pg-list-user-pro"> <img src="images/usericon.png" alt=""> </div>
							<div class="list-pg-inn-sp">
								<div class="list-pg-upro">
									<h5><?php echo $fullname; ?></h5>
									<p><?php echo $dateOfBirth; ?></p> <a class="waves-effect waves-light btn-large full-btn list-pg-btn" href="#!">Update Profile!</a> </div>
							</div>
						</div>
						<!--END LISTING DETAILS: LEFT PART 7-->
						<!--LISTING DETAILS: LEFT PART 8-->
						<div class="pglist-p3 pglist-bg pglist-p-com">
							<div class="pglist-p-com-ti pglist-p-com-ti-right">
								<h3><span>Our</span> Location</h3> </div>
							<div class="list-pg-inn-sp">
								<div class="list-pg-map">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6290413.804893654!2d-93.99620524741552!3d39.66116578737809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880b2d386f6e2619%3A0x7f15825064115956!2sIllinois%2C+USA!5e0!3m2!1sen!2sin!4v1469954001005" allowfullscreen></iframe>
								</div>
							</div>
						</div>
						<!--END LISTING DETAILS: LEFT PART 8-->
						<!--LISTING DETAILS: LEFT PART 9-->
						<div class="pglist-p3 pglist-bg pglist-p-com">
							<div class="pglist-p-com-ti pglist-p-com-ti-right">
								<h3><span>Other</span> Informations</h3> </div>
							<div class="list-pg-inn-sp">
								<div class="list-pg-oth-info">
									<ul>
										<li>Today Shop <span class="green-bg">open</span> </li>
										<li>Experience <span>16</span> </li>
										<li>Parking <span>yes</span> </li>
										<li>Smoking <span>yes</span> </li>
										<li>Pool Table <span>yes</span> </li>
										<li>Take Out <span>yes</span> </li>
										<li>Good for Groups <span>yes</span> </li>
										<li>Accepts All Cards <span>yes</span> </li>
										<li>Open Time <span>09:00am</span> </li>
										<li>Close Time <span>10:00pm</span> </li>
									</ul>
								</div>
							</div>
						</div>
						<!--END LISTING DETAILS: LEFT PART 9-->
						<!--LISTING DETAILS: LEFT PART 10-->
						<div class="list-mig-like">
							<div class="list-ri-spec-tit">
								<h3><span>You might</span> like this</h3> </div>
							<a href="#!">
								<div class="list-mig-like-com">
									<div class="list-mig-lc-img"> <img src="images/listing/1.jpg" alt="" /> <span class="home-list-pop-rat list-mi-pr">$720</span> </div>
									<div class="list-mig-lc-con">
										<div class="list-rat-ch list-room-rati"> <span>4.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
										<h5>Holiday Inn Express</h5>
										<p>Illinois City,</p>
									</div>
								</div>
							</a>
							<a href="#!">
								<div class="list-mig-like-com">
									<div class="list-mig-lc-img"> <img src="images/listing/2.jpg" alt="" /> <span class="home-list-pop-rat list-mi-pr">$420</span> </div>
									<div class="list-mig-lc-con">
										<div class="list-rat-ch list-room-rati"> <span>3.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
										<h5>InterContinental</h5>
										<p>Illinois City,</p>
									</div>

								</div>
							</a>
							<a href="#!">
								<div class="list-mig-like-com">
									<div class="list-mig-lc-img"> <img src="images/listing/3.jpg" alt="" /> <span class="home-list-pop-rat list-mi-pr">$380</span> </div>
									<div class="list-mig-lc-con">
										<div class="list-rat-ch list-room-rati"> <span>5.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </div>
										<h5>Staybridger Suites</h5>
										<p>Illinois City,</p>
									</div>
								</div>
							</a>
						</div>
						<!--END LISTING DETAILS: LEFT PART 10-->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--MOBILE APP-->
	
	<!--FOOTER SECTION-->
	<?php include ('footer.php'); ?>
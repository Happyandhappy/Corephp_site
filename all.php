<?php
error_reporting(0);
//define("_WOJO", true);
//require_once("dashboard/init.php");
//if (App::Auth()->is_User())
//Url::redirect(SITEURL . '/dashboard/');
//if (isset($_POST['login'])):
//if (App::Auth()->login($_POST['username'], $_POST['password'])):
//Url::redirect(SITEURL . '/dashboard/');
//endif;
//endif;
ini_set('max_execution_time', 300);
//error_reporting(0);
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
	private $_host = "162.144.253.225";
	private $_username = "quanki_data";
	private $_password = "Justified2";
	private $_database = "quanki_data";
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
class DatabaseNewDataSex
{
    private $_connection;
    private static $_instance;
    private $_host = "192.249.125.90";
    private $_username = "sexoffen_data";
    private $_password = "XZ3UiD?1xWqQ";
    private $_database = "sexoffen_data";
    public static function getInstanceNewDataSex()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    private function __construct()
    {
        $this->_connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
        if (mysqli_connect_error()) {
            header('Location: 404.php');
            exit;
        }
    }
    private function __clone()
    {
    }
    public function getConnectionNewDataSex()
    {
        return $this->_connection;
    }
}
class DatabaseNewDataArrest
{
    private $_connection;
    private static $_instance;
    private $_host = "192.249.125.90";
    private $_username = "allarres_data";
    private $_password = "FaD(7z8q@]V$";
    private $_database = "allarres_data";
    public static function getInstanceNewDataArrest()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    private function __construct()
    {
        $this->_connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
        if (mysqli_connect_error()) {
            header('Location: 404.php');
            exit;
        }
    }
    private function __clone()
    {
    }
    public function getConnectionNewDataArrest()
    {
        return $this->_connection;
    }
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

$first = htmlspecialchars($_GET['fn']);
$last  = htmlspecialchars($_GET['ln']);
$st    = htmlspecialchars($_GET['state']);
if ((($first == '') || ($first == NULL)) && (($last == '') || ($last = NULL))) {
    header('Location: 404.php');
}
$dbNewData = DatabaseNewData::getInstanceNewData();
$db1 = $dbNewData->getConnectionNewData();
$dbOldData = DatabaseOldData::getInstanceOldData();
$db2 = $dbOldData->getConnectionOldData();
$dbNewDataSex = DatabaseNewDataSex::getInstanceNewDataSex();
$db1Sex       = $dbNewDataSex->getConnectionNewDataSex();
$dbNewDataArrest = DatabaseNewDataArrest::getInstanceNewDataArrest();
$db1Arrest      = $dbNewDataArrest->getConnectionNewDataArrest();
$webTitle     = $first . ' ' . $last;

// PEOPLE START
$i = 0;
	
if (isset($st) && strlen($st) == 2) {
$searchquery = "select distinct(c.profileId)
    from profile c
	inner join addresses o
            on c.profileId = o.profileId
    where c.firstName = '$first' and c.lastName = '$last' and o.state = '$st' LIMIT 50"; }
else {
$searchquery = "SELECT profileId FROM `profile` WHERE `firstName` = '$first' AND `lastName` = '$last' LIMIT 50"; }
	
$result  = $db1->query($searchquery);
$arr = array();
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
    where c.firstName = '$first' and c.lastName = '$last' and o.state = '$st' LIMIT 50"; }
else {
$searchquery = "SELECT profileId FROM `profile` WHERE `firstName` = '$first' AND `lastName` = '$last' LIMIT 50"; }
$result  = $db2->query($searchquery);
$arr = array();
$totalcounter = $result->num_rows;
//$j = $totalcounter;

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
//  var_dump($resultsDBArray);
  $totalcounter = count($resultsDBArray);
  $j = $totalcounter;
if ($totalcounter > 0) {
	
//	foreach ($arr as $value) {
	for($i = 0; $i < $totalcounter ;$i++){
		$q = $resultsDBArray[$i]['profileId'];
		$db_type = $resultsDBArray[$i]['db_type'];
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
	
		$profile = "SELECT * FROM `profile` WHERE `profileId` = '{$q}' ";
		$result  = $db1->query($profile);
		//print_r( $result);
		$results = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$uniqueId        = htmlspecialchars($row['profileId']);
				$firstName        = htmlspecialchars($row['firstName']);
				$middleName       = htmlspecialchars($row['middleName']);
				$lastName         = htmlspecialchars($row['lastName']);
				$gender           = htmlspecialchars($row['gender']);
				$dateOfBirth      = htmlspecialchars($row['dateOfBirth']);
				$resultsprofile[] = array(
				'uniqueId' => $uniqueId,
				'firstName' => $firstName,
				'middleName' => $middleName,
				'lastName' => $lastName,
				'gender' => $gender,
				'dateOfBirth' => $dateOfBirth,
				);
			}
		}
		
		
		$address = "SELECT * FROM `addresses` WHERE `profileId` = '{$q}' group by houseNumber ";
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

	}	

$profileTotal = $resultsa[0]["profileTotal"];


} 
// PEOPLE END
// SEX OFFENDER START
if (isset($st) && strlen($st) == 2) {
    $searchquerySex = "select distinct(c.theirId) from basic c inner join address o on c.theirId = o.theirId 
    where c.fName = '$first' and c.lName = '$last' and o.state = '$st' LIMIT 50";
} else {
    $searchquerySex = "SELECT theirId FROM `basic` WHERE `fName` = '$first' AND `lName` = '$last' LIMIT 50";
}
$resultSex       = $db1Sex->query($searchquerySex);
$arrSex          = array();
$totalcounterSex = $resultSex->num_rows;
$resultsDBSex    = array();
if ($resultSex->num_rows > 0) {
    while ($row = $resultSex->fetch_assoc()) {
        $profileId        = $row['theirId'];
        $resultsDBArraySex[] = array(
            'profileId' => $profileId
        );
    }
}
$totalcounterSex = count($resultsDBArraySex);
$jSex               = $totalcounterSex;
if ($totalcounterSex > 0) {
    for ($iSex = 0; $iSex < $totalcounterSex; $iSex++) {
        $q       = $resultsDBArraySex[$iSex]['profileId'];
        $profileSex = "SELECT * FROM `basic` WHERE `theirId` = '{$q}' ";
		$resultSex  = $db1Sex->query($profileSex);
		
        $resultsSex = array();
        if ($resultSex->num_rows > 0) {
            while ($row = $resultSex->fetch_assoc()) {
                $uniqueId            = htmlspecialchars($row['theirId']);
                $fullName            = htmlspecialchars($row['fullName']);
                $savedImage          = htmlspecialchars($row['savedImage']);
                $status              = htmlspecialchars($row['status']);
                $alias               = htmlspecialchars($row['alias']);
                $dobDate             = htmlspecialchars($row['dobDate']);
                $level               = htmlspecialchars($row['level']);
                $resultsprofileSex[] = array(
                    'uniqueId' => $uniqueId,
                    'fullName' => $fullName,
                    'savedImage' => $savedImage,
                    'status' => $status,
                    'alias' => $alias,
                    'dobDate' => $dobDate,
                    'level' => $level
                );
            }
        }
        $addressSex = "SELECT * FROM `address` WHERE `theirId` = '{$q}' ";
        $resultSex  = $db1Sex->query($addressSex);
        if ($resultSex->num_rows > 0) {
            while ($row = $resultSex->fetch_assoc()) {
                $strAdd              = htmlspecialchars($row['strAdd']);
                $resultsaddressSex[] = array(
                    'strAdd' => $strAdd
                );
            }
        }
        $offenseSex = "SELECT * FROM `offense` WHERE `theirId` = '{$q}' ";
        $resultSex  = $db1Sex->query($offenseSex);
        if ($result->num_rows > 0) {
            while ($row = $resultSex->fetch_assoc()) {
                $offense             = htmlspecialchars($row['offense']);
                $resultsoffenseSex[] = array(
                    'offense' => $offense
                );
            }
        }
        $resultscounterSex[] = array(
            'profile' => $resultsprofileSex,
            'address' => $resultsaddressSex,
            'offense' => $resultsoffenseSex
        );
        $resultsaSex[]          = array(
            'profileTotalSex' => $jSex,
            'profileCountSex' => $iSex,
            $iSex => $resultscounterSex
        );
        unset($resultscounterSex);
        unset($resultsprofileSex);
        unset($resultsaddressSex);
        unset($resultsoffenseSex);
    }
    $profileTotalSex = $resultsaSex[0]["profileTotalSex"];
}

// SEX OFFENDER END

// ARREST START
if (isset($st) && strlen($st) == 2) {
      $searchqueryArrest = "SELECT site_profile_id FROM `profile` WHERE `first_name` = '$first' AND `last_name` = '$last' and `stateShort` = '$st' group by dob order by picture_link desc LIMIT 50";
} else {
    $searchqueryArrest = "SELECT site_profile_id FROM `profile` WHERE `first_name` = '$first' AND `last_name` = '$last' group by dob order by picture_link desc LIMIT 50";
}
$resultArrest       = $db1Arrest->query($searchqueryArrest);
$arrArrest         = array();
$totalcounterArrest = $resultArrest->num_rows;
$resultsDBArrest    = array();
if ($resultArrest->num_rows > 0) {
    while ($row = $resultArrest->fetch_assoc()) {
        $profileId        = $row['site_profile_id'];
        $resultsDBArrayArrest[] = array(
            'profileId' => $profileId
        );
    }
}
$totalcounterArrest = count($resultsDBArrayArrest);
$jArrest               = $totalcounterArrest;
if ($totalcounterArrest > 0) {
    for ($iArrest = 0; $iArrest < $totalcounterArrest; $iArrest++) {
        $q       = $resultsDBArrayArrest[$iArrest]['profileId'];
        $profileArrest = "SELECT * FROM `profile` WHERE `site_profile_id` = '{$q}' ";
		$resultArrest  = $db1Arrest->query($profileArrest);
		
        $resultsArrest = array();
        if ($resultArrest->num_rows > 0) {
            while ($row = $resultArrest->fetch_assoc()) {
                $uniqueId            = htmlspecialchars($row['site_profile_id']);
                $first_name            = htmlspecialchars($row['first_name']);
                $middle_name          = htmlspecialchars($row['middle_name']);
                $last_name              = htmlspecialchars($row['last_name']);
                $picture_link               = htmlspecialchars($row['picture_link']);
                $city             = htmlspecialchars($row['city']);
                $state               = htmlspecialchars($row['state']);
				$dob               = htmlspecialchars($row['dob']);
                $resultsprofileArrest[] = array(
                    'uniqueId' => $uniqueId,
                    'first_name' => $first_name,
                    'middle_name' => $middle_name,
                    'last_name' => $last_name,
                    'picture_link' => $picture_link,
                    'city' => $city,
                    'state' => $state,
					'dob' => $dob
                );
            }
        }
    
        $resultscounterArrest[] = array(
            'profile' => $resultsprofileArrest,
           
        );
        $resultsaArrest[]          = array(
            'profileTotalArrest' => $jArrest,
            'profileCountArrest' => $iArrest,
            $iArrest => $resultscounterArrest
        );
        unset($resultscounterArrest);
        unset($resultsprofileArrest);
      
    }
    $profileTotalArrest = $resultsaArrest[0]["profileTotalArrest"];
}
// ARREST END
error_reporting(0);
?>

<!DOCTYPE html>

<html lang="en">



<head>

	<title>World Best Local Directory Website template</title>

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

	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />

	<!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->

	<link href="css/responsive.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

	<!--[if lt IE 9]>

	<script src="js/html5shiv.js"></script>

	<script src="js/respond.min.js"></script>

	<![endif]-->
    
    <link rel="stylesheet" type="text/css" href="css/ideaboxTestimonials.min.css"/>





    <script type="text/javascript" src="http://speedyhunt.com/dashboard/assets/jquery.js"></script>
<script type="text/javascript" src="http://speedyhunt.com/dashboard/assets/global.js"></script>
<link href="css/master_main.css" rel="stylesheet" type="text/css" />
<script src="js/ideaboxTestimonials.min.js"></script>

</head>



<body>



	<!--TOP SEARCH SECTION-->

	<section class="bottomMenu dir-il-top-fix">

		<div class="container top-search-main">

			<div class="row">

				<div class="ts-menu">

					<!--SECTION: LOGO-->

					<div class="ts-menu-1">

						<a href="index.html"><img src="images/aff-logo.png" alt=""> </a>

					</div>

					<!--SECTION: BROWSE CATEGORY(NOTE:IT'S HIDE ON MOBILE & TABLET VIEW)-->

					<div class="ts-menu-2"><a href="#" class="t-bb">All Pages <i class="fa fa-angle-down" aria-hidden="true"></i></a>

						<!--SECTION: BROWSE CATEGORY-->

						<div class="cat-menu cat-menu-1">

							<div class="dz-menu">

								<div class="dz-menu-inn">

									<h4>Frontend Pages</h4>

									<ul>

										<li><a href="index.html">Home</a></li>

										<li><a href="index-1.html">Home 1</a></li>

										<li><a href="list.html">All Listing</a></li>

										<li><a href="listing-details.html">Listing Details </a> </li>

										<li><a href="add-listing.html">Add Listing</a> </li>

										<li><a href="list-lead.html">Lead Listing</a></li>

										<li><a href="list-grid.html">Listing Grid View</a></li>

									</ul>

								</div>

								<div class="dz-menu-inn">

									<h4>Frontend Pages</h4>

									<ul>

										<li><a href="new-business.html"> New Listings </a> </li>

										<li><a href="nearby-listings.html">Nearby Listings</a> </li>

										<li><a href="customer-reviews.html"> Customer Reviews</a> </li>

										<li><a href="trendings.html"> Top Trendings</a> </li>

										<li><a href="how-it-work.html"> How It Work</a> </li>

										<li><a href="advertise.html"> Advertise with us</a> </li>

										<li><a href="price.html"> Price Details</a> </li>

									</ul>

								</div>

								<div class="dz-menu-inn">

									<h4>Frontend Pages</h4>

									<ul>

										<li><a href="about-us.html"> About Us</a> </li>

										<li><a href="customer-reviews.html"> Customer Reviews</a> </li>

										<li><a href="contact-us.html"> Contact Us</a> </li>

										<li><a href="blog.html"> Blog Post</a> </li>

										<li><a href="blog-content.html"> Blog Details</a> </li>

										<li><a href="elements.html"> All Elements </a> </li>

										<li><a href="shop-listing-details.html"> Shop Details </a> </li>

										<li><a href="property-listing-details.html"> Property Details </a> </li>

									</ul>

								</div>

								<div class="dz-menu-inn">

									<h4>Dashboard Pages</h4>

									<ul>

										<li><a href="dashboard.html"> Dashboard</a> </li>

										<li><a href="db-invoice.html"> Invoice</a> </li>

										<li><a href="db-setting.html"> User Setting</a> </li>

										<li><a href="db-all-listing.html"> All Listings</a> </li>

										<li><a href="db-listing-add.html"> Add New Listing</a> </li>

										<li><a href="db-review.html"> Listing Reviews</a> </li>

										<li><a href="db-payment.html"> Listing Payments </a> </li>

									</ul>

								</div>

								<div class="dz-menu-inn">

									<h4>Dashboard Pages</h4>

									<ul>

										<li><a href="register.html"> User Register</a> </li>

										<li><a href="login.html"> User Login</a> </li>

										<li><a href="forgot-pass.html"> Forgot Password</a> </li>

										<li><a href="db-message.html"> Messages</a> </li>

										<li><a href="db-my-profile.html"> Dashboard Profile</a> </li>

										<li><a href="db-post-ads.html"> Post Ads </a> </li>

										<li><a href="db-invoice-download.html"> Download Invoice </a> </li>

									</ul>

								</div>

								<div class="dz-menu-inn lat-menu">

									<h4>Admin Panel Pages</h4>

									<ul>

										<li><a target="_blank" href="admin.html"> Admin</a> </li>

										<li><a target="_blank" href="admin-all-listing.html"> All Listing</a> </li>

										<li><a target="_blank" href="admin-all-users.html"> All Users</a> </li>

										<li><a target="_blank" href="admin-analytics.html"> Analytics</a> </li>

										<li><a target="_blank" href="admin-ads.html"> Advertisement</a> </li>

										<li><a target="_blank" href="admin-setting.html"> Admin Setting </a> </li>

										<li><a target="_blank" href="admin-payment.html"> Payments </a> </li>

									</ul>

								</div>

							</div>

							<div class="dir-home-nav-bot">

								<ul>

									<li>A few reasons you’ll love Online Business Directory <span>Call us on: +01 6214 6548</span> </li>

									<li><a href="advertise.html" class="waves-effect waves-light btn-large"><i class="fa fa-bullhorn"></i> Advertise with us</a>

									</li>

									<li><a href="price.html" class="waves-effect waves-light btn-large"><i class="fa fa-bookmark"></i> Add your business</a>

									</li>

								</ul>

							</div>

						</div>

					</div>

					<!--SECTION: SEARCH BOX-->

					<div class="ts-menu-3">

						<div class="top-search">

							<form>

								<ul>

									<li>

										<input type="text" class="sea-drop-top" placeholder="Find your service,business or place here">

										<div class="sea-drop-2 sea-drop-com">

											<ul>

												<li>

													<a href="property-listing-details.html"><img src="images/menu/1.png" alt="">Property Management Services</a>

												</li>

												<li>

													<a href="hotels-listing-details.html"><img src="images/menu/4.png" alt="">Hotel and Resorts</a>

												</li>

												<li>

													<a href="shop-listing-details.html"><img src="images/menu/2.png" alt="">Spicy Supermarket Shop</a>

												</li>

												<li>

													<a href="automobile-listing-details.html"><img src="images/menu/3.png" alt="">Automobile Service Providers</a>

												</li>

												<li>

													<a href="list.html"><img src="images/menu/5.png" alt="">Computer Repair & Services</a>

												</li>

												<li>

													<a href="list.html"><img src="images/menu/6.png" alt="">Coaching & Tuitions</a>

												</li>

												<li>

													<a href="list.html"><img src="images/menu/1.png" alt="">Job Training</a>

												</li>

												<li>

													<a href="list.html"><img src="images/menu/7.png" alt="">Skin Care & Treatment</a>

												</li>

											</ul>

										</div>

									</li>

									<li>

										<input type="submit" value=""> </li>

								</ul>

							</form>

						</div>

					</div>

					<!--SECTION: REGISTER,SIGNIN AND ADD YOUR BUSINESS-->

					<div class="ts-menu-4">

						<div class="top-links">

							<ul>

								<li><a href="register.html">Register</a> </li>

								<li><a href="login.html">Sign In</a> </li>

							</ul>

						</div>

					</div>

					<!--MOBILE MENU ICON:IT'S ONLY SHOW ON MOBILE & TABLET VIEW-->

					<div class="ts-menu-5"><span><i class="fa fa-bars" aria-hidden="true"></i></span> </div>

					<!--MOBILE MENU CONTAINER:IT'S ONLY SHOW ON MOBILE & TABLET VIEW-->

					<div class="mob-right-nav" data-wow-duration="0.5s">

						<div class="mob-right-nav-close"><i class="fa fa-times" aria-hidden="true"></i> </div>

						<h5>Business</h5>

						<ul class="mob-menu-icon">

							<li><a href="price.html">Add Business</a> </li>

							<li><a href="register.html">Register</a> </li>

							<li><a href="login.html">Sign In</a> </li>

						</ul>

						<h5>All Categories</h5>

						<ul>

							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Help Services</a> </li>

							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Appliances Repair & Services</a> </li>

							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Furniture Dealers</a> </li>

							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Packers and Movers</a> </li>

							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Pest Control </a> </li>

							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Solar Product Dealers</a> </li>

							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Interior Designers</a> </li>

							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Carpenters</a> </li>

							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Plumbing Contractors</a> </li>

							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Modular Kitchen</a> </li>

							<li><a href="list.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Internet Service Providers</a> </li>

						</ul>

					</div>

				</div>

			</div>

		</div>

	</section>

	<section class="dir-alp dir-pa-sp-top" style="background: #667db6;  /* fallback for old browsers */

background: -webkit-linear-gradient(to left, #667db6, #0082c8, #0082c8, #667db6);  /* Chrome 10-25, Safari 5.1-6 */

background: linear-gradient(to left, #667db6, #0082c8, #0082c8, #667db6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */ 

">

		<div class="container">

			<div class="row">

				<div class="dir-alp-tit">

					<h1><?php echo strtoupper($first) . ' ' . strtoupper($last); ?></h1>

					<ol class="breadcrumb">

						<li><a href="#">Home</a> </li>

						<li><a href="all.php?fn=<?php echo $first;?>&ln=<?php echo $last; ?>"><?php echo strtoupper($first) . ' ' . strtoupper($last); ?></a> </li>

						<li class="active"><?php echo strtoupper($st); ?></li>

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

                              

                              	 <li><a class="active" href="#people">People (<?php if ($totalcounter == 50) {
	echo $totalcounter.'+';} else { echo $totalcounter;} ?>)</a> </li>

									 <li><a href="#sexoffender">Sex Offenders (<?php if ($totalcounterSex == 50) {
	echo $totalcounterSex.'+';} else { echo $totalcounterSex;} ?>)</a> </li>

									 <li><a href="#arrest">Arrests (<?php if ($totalcounterArrest == 50) {
	echo $totalcounterArrest.'+';} else { echo $totalcounterArrest;} ?>)</a> </li>

									

									

                                    <li><a href="#test4">Companies</a> </li>

                                     <li><a href="#test4">Voter</a> </li>

                                     <li><a href="#test4">Patents</a> </li>

                                     <li><a href="#test4">Property</a> </li>

                                         <li><a href="#test4">Vehicle</a> </li>

                               

                                    <li><a href="#test4">Whois</a> </li>

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

									<a href="listing-details.html">

										<div class="list-left-near lln1"> <i class="fa fa-users" style="font-size:25px;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>People Search</h5> <span>City: illunois, United States</span> </div>

										<div class="list-left-near lln3"><i class="fa fa-unlock-alt" style="font-size:25px;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="listing-details.html">

										<div class="list-left-near lln1"> <i class="fa fa-lock" style="font-size:25px;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Arrest Search</h5> <span>City: illunois, United States</span> </div>

										<div class="list-left-near lln3"> <i class="fa fa-unlock-alt" style="font-size:25px;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="listing-details.html">

										<div class="list-left-near lln1"> <i class="fa fa-venus-mars" style="font-size:25px;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Sex Offender Search</h5> <span>City: illunois, United States</span> </div>

										<div class="list-left-near lln3"><i class="fa fa-unlock-alt" style="font-size:25px;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="listing-details.html">

										<div class="list-left-near lln1"> <i class="fa fa-phone" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Reverse Phone</h5> <span>City: illunois, United States</span> </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="listing-details.html">

										<div class="list-left-near lln1"> <i class="fa fa-envelope" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Reverse Emails</h5> <span>City: illunois, United States</span> </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="listing-details.html">

										<div class="list-left-near lln1">  <i class="fa fa-building" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Company Search</h5> <span>City: illunois, United States</span> </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="listing-details.html">

										<div class="list-left-near lln1"><i class="fa fa-graduation-cap" style="font-size:25px;color:orange;" aria-hidden="true"></i></div>

										<div class="list-left-near lln2">

											<h5>Education Search</h5> <span>City: illunois, United States</span> </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

                                <li>

									<a href="listing-details.html">

										<div class="list-left-near lln1"><i class="fa fa-sticky-note" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Voter Records</h5> <span>City: illunois, United States</span> </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

                                <li>

									<a href="listing-details.html"> 

										<div class="list-left-near lln1"><i class="fa fa-file" style="font-size:25px;color:orange;" aria-hidden="true"></i></div>

										<div class="list-left-near lln2">

											<h5>Patent Records</h5> <span>City: illunois, United States</span> </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

                               

                                  <li>

									<a href="listing-details.html">

										<div class="list-left-near lln1"><i class="fa fa-home" style="font-size:25px;color:orange;" aria-hidden="true"></i></div>

										<div class="list-left-near lln2">

											<h5>Property Records</h5> <span>City: illunois, United States</span> </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

                                    <li>

									<a href="listing-details.html">

										<div class="list-left-near lln1"><i class="fa fa-info-circle" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>And more...</h5> <span>City: illunois, United States</span> </div>

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

                              		<li class="tab col"><a class="active" href="#people">People (<?php if ($totalcounter == 50) {
	echo $totalcounter.'+';} else { echo $totalcounter;} ?>)</a> </li>

									<li class="tab col"><a href="#sexoffender">Sex Offenders (<?php if ($totalcounterSex == 50) {
	echo $totalcounterSex.'+';} else { echo $totalcounterSex;} ?>)</a> </li>

									<li class="tab col"><a href="#arrest">Arrests (<?php if ($totalcounterArrest == 50) {
	echo $totalcounterArrest.'+';} else { echo $totalcounterArrest;} ?>)</a> </li>

									

									

                                    <li class="tab col"><a href="#test4">Companies</a> </li>

                                    <li class="tab col"><a href="#test4">Voter</a> </li>

                                    <li class="tab col"><a href="#test4">Patents</a> </li>

                                    <li class="tab col"><a href="#test4">Property</a> </li>

                                        <li class="tab col"><a href="#test4">Vehicle</a> </li>

                               

                                     <li class="tab col"><a href="#test4">Whois</a> </li>

								</ul>

							</div>

					<div class="col-md-3 dir-alp-con-left" id="premiumdesktop">

						<div class="dir-alp-con-left-1">

							<h3>Get Premium!</h3> </div>

						<div class="dir-hom-pre dir-alp-left-ner-notb">

							<ul>

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="listing-details.html">

										<div class="list-left-near lln1"> <i class="fa fa-users" style="font-size:25px;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>People Search</h5> <span>City: illunois, United States</span> </div>

										<div class="list-left-near lln3"><i class="fa fa-unlock-alt" style="font-size:25px;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="listing-details.html">

										<div class="list-left-near lln1"> <i class="fa fa-lock" style="font-size:25px;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Arrest Search</h5> <span>City: illunois, United States</span> </div>

										<div class="list-left-near lln3"> <i class="fa fa-unlock-alt" style="font-size:25px;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="listing-details.html">

										<div class="list-left-near lln1"> <i class="fa fa-venus-mars" style="font-size:25px;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Sex Offender Search</h5> <span>City: illunois, United States</span> </div>

										<div class="list-left-near lln3"><i class="fa fa-unlock-alt" style="font-size:25px;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="listing-details.html">

										<div class="list-left-near lln1"> <i class="fa fa-phone" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Reverse Phone</h5> <span>City: illunois, United States</span> </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="listing-details.html">

										<div class="list-left-near lln1"> <i class="fa fa-envelope" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Reverse Emails</h5> <span>City: illunois, United States</span> </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="listing-details.html">

										<div class="list-left-near lln1">  <i class="fa fa-building" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Company Search</h5> <span>City: illunois, United States</span> </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

								<!--==========END NEARBY LISTINGS============-->

								<!--==========NEARBY LISTINGS============-->

								<li>

									<a href="listing-details.html">

										<div class="list-left-near lln1"><i class="fa fa-graduation-cap" style="font-size:25px;color:orange;" aria-hidden="true"></i></div>

										<div class="list-left-near lln2">

											<h5>Education Search</h5> <span>City: illunois, United States</span> </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

                                <li>

									<a href="listing-details.html">

										<div class="list-left-near lln1"><i class="fa fa-sticky-note" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>Voter Records</h5> <span>City: illunois, United States</span> </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

                                <li>

									<a href="listing-details.html"> 

										<div class="list-left-near lln1"><i class="fa fa-file" style="font-size:25px;color:orange;" aria-hidden="true"></i></div>

										<div class="list-left-near lln2">

											<h5>Patent Records</h5> <span>City: illunois, United States</span> </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

                               

                                  <li>

									<a href="listing-details.html">

										<div class="list-left-near lln1"><i class="fa fa-home" style="font-size:25px;color:orange;" aria-hidden="true"></i></div>

										<div class="list-left-near lln2">

											<h5>Property Records</h5> <span>City: illunois, United States</span> </div>

										<div class="list-left-near lln3"> <i class="fa fa-lock" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

									</a>

								</li>

                                    <li>

									<a href="listing-details.html">

										<div class="list-left-near lln1"><i class="fa fa-info-circle" style="font-size:25px;color:orange;" aria-hidden="true"></i> </div>

										<div class="list-left-near lln2">

											<h5>And more...</h5> <span>City: illunois, United States</span> </div>

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
if ($profileTotal == 0) {
    echo '	  <div class="pglist-p-com-ti">

								<h3><span>No Results</span> Available</h3> </div>

								<div class="list-pg-inn-sp">

								<div class="list-pg-write-rev">

									<form class="col">

										<p>Do you feel like we are missing a sex offender record for <strong>' . strtoupper($first) . ' ' . strtoupper($last) . '? Not a problem, give us your details and we will shoot over an email as soon as we find the result you are looking for:</p>

										<div class="row">

											<div class="col s12">

											

											</div>

										</div>

										<div class="row">

											<div class="input-field col s6">

												<input id="re_name" type="text" class="validate">

												<label for="re_name" class="">Full Name</label>

											</div>

											<div class="input-field col s6">

												<input id="re_mob" type="number" class="validate">

												<label for="re_mob">Mobile</label>

											</div>

										</div>

										<div class="row">

											<div class="input-field col s6">

												<input id="re_mail" type="email" class="validate">

												<label for="re_mail">Email</label>

											</div>

											<div class="input-field col s6">

												<input id="re_city" type="text" class="validate">

												<label for="re_city">State/City</label>

											</div>

										</div>

										<div class="row">

											<div class="input-field col s12">

												<textarea id="re_msg" class="materialize-textarea"></textarea>

												<label for="re_msg">Anything you can add to help aid our search</label>

											</div>

										</div>

										<div class="row">

											<div class="input-field col s12"> <a class="waves-effect waves-light btn-large full-btn" href="#!">Find the correct ' . $first . ' ' . $last . '</a> </div>

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
$uniqueIdRemoval = $resultsa[$k][$k][0]['profile'][0]["uniqueId"];
$uniqueId = '__'.$uniqueId;
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

									<div class="col-md-9 home-list-pop-desc inn-list-pop-desc" style="float:left;"> <a href="listing-details.html"><h3>' . $fullname . ', ' . ageCalculator($dateOfBirth) . '</h3></a>

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
	echo '<a href="listing-details.html" style="color:#337ab7 !important;"><li>Search for more </li></a> <br/>'; }
	else {
	 echo '<a href="listing-details.html" style="color:#337ab7 !important;"><li>and atleast '.($addressCounter - 2).' more </li></a> <br/>'; }
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
	echo '<a href="listing-details.html" style="color:#337ab7 !important;"><li>Search for more </li></a> <br/>'; }
	else {
	 echo '<a href="listing-details.html" style="color:#337ab7 !important;"><li>and atleast '.($relativesCounter - 2).' more </li></a> <br/>'; }
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
	echo '<a href="listing-details.html" style="color:#337ab7 !important;"><li style="color:#337ab7 !important;">Check Full Profile </li></a> <br/>'; }
	else {
	 echo '<a href="listing-details.html" style="color:#337ab7 !important;"><li style="color:#337ab7 !important;">and atleast '.($phoneCounter - 2).' more </li></a> <br/>'; }
	 
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
	echo '<a href="listing-details.html" style="color:#337ab7 !important;"><li style="color:#337ab7 !important;">Check Full Profile </li></a> <br/>'; }
	else {
	 echo '<a href="listing-details.html" style="color:#337ab7 !important;"><li style="color:#337ab7 !important;">and atleast '.($emailCounter - 2).' more </li></a> <br/>'; } 
 echo '									

											</ul>

										</div> 
</div>										
										
										
										<span class="home-list-pop-rat"><i class="fa fa-unlock-alt" style="font-size:25px;color:#337ab7" aria-hidden="true"></i></span>

										<div class="list-enqu-btn">

											<ul>

												

												
												<li style="width:75%; font-size:13px; color: #0e76a8; font-weight:bold; font-style:italic; float:left;">Sex Offenders, Arrest, Work Experience, Companies,  Social Accounts, Educational, Property, Vehicle, Voter, Patents,  Whois, and more.. </li>

												<li><a href="#!" data-dismiss="modal" data-toggle="modal" data-target="#list-quo"><i class="fa fa-search" aria-hidden="true"></i> Full Profile</a> </li>

											</ul>

										</div>

									</div>

								</div>';
}
?>

								<!--LISTINGS END-->

								<!--LISTINGS-->

							

								<!--LISTINGS END-->

							</div>

							

						</div>

					</div>

                            

					<div class="col-md-9 dir-alp-con-right" id="sexoffender">

						<div class="dir-alp-con-right-1">

							<div class="row">

								<!--LISTINGS-->

                                  <?php
if ($profileTotalSex == 0) {
    echo '	  <div class="pglist-p-com-ti">

								<h3><span>No Results</span> Available</h3> </div>

								<div class="list-pg-inn-sp">

								<div class="list-pg-write-rev">

									<form class="col">

										<p>Do you feel like we are missing a sex offender record for <strong>' . strtoupper($first) . ' ' . strtoupper($last) . '? Not a problem, give us your details and we will shoot over an email as soon as we find the result you are looking for:</p>

										<div class="row">

											<div class="col s12">

											

											</div>

										</div>

										<div class="row">

											<div class="input-field col s6">

												<input id="re_name" type="text" class="validate">

												<label for="re_name" class="">Full Name</label>

											</div>

											<div class="input-field col s6">

												<input id="re_mob" type="number" class="validate">

												<label for="re_mob">Mobile</label>

											</div>

										</div>

										<div class="row">

											<div class="input-field col s6">

												<input id="re_mail" type="email" class="validate">

												<label for="re_mail">Email</label>

											</div>

											<div class="input-field col s6">

												<input id="re_city" type="text" class="validate">

												<label for="re_city">State/City</label>

											</div>

										</div>

										<div class="row">

											<div class="input-field col s12">

												<textarea id="re_msg" class="materialize-textarea"></textarea>

												<label for="re_msg">Anything you can add to help aid our search</label>

											</div>

										</div>

										<div class="row">

											<div class="input-field col s12"> <a class="waves-effect waves-light btn-large full-btn" href="#!">Find the correct ' . $first . ' ' . $last . '</a> </div>

										</div>

									</form>

								</div>

							</div>';
}
?>

							<?php
for ($kSex = 0; $kSex < $profileTotalSex; $kSex++) {
    $addressCounterSex = count($resultsaSex[$kSex][$kSex][0]['address']);
    $offenseCounterSex = count($resultsaSex[$kSex][$kSex][0]['offense']);
    $fullNameSex          = strtoupper($resultsaSex[$kSex][$kSex][0]['profile'][0]["fullName"]);
    $savedImageSex        = $resultsaSex[$kSex][$kSex][0]['profile'][0]["savedImage"];
    $dobDateSex           = $resultsaSex[$kSex][$kSex][0]['profile'][0]["dobDate"];
    $aliasSex             = $resultsaSex[$kSex][$kSex][0]['profile'][0]["alias"];
    $levelSex             = $resultsaSex[$kSex][$kSex][0]['profile'][0]["level"];
    echo '            <div class="home-list-pop list-spac">

									<!--LISTINGS IMAGE-->

									<div class="col-md-3"> <img src="http://sexoffenderspy.com/' . $savedImageSex . '" alt="" /> </div>

									<!--LISTINGS: CONTENT-->

									<div class="col-md-9 home-list-pop-desc inn-list-pop-desc"> <a href="listing-details.html"><h3>' . $fullNameSex . ' Age:' . ageCalculator($dobDateSex) . '.Born: ' . $dobDateSex . '' . '</h3></a>

										<h4>Aliases: ' . ucfirst($aliasSex) . '</h4>

										<p><b>Address: </b>';
    for ($lSex = 0; $lSex < $addressCounterSex; $lSex++) {
        $strAddSex = $resultsaSex[$kSex][$kSex][0]['address'][$lSex]["strAdd"];
        $strAddSex = strtolower($strAddSex);
        echo ucfirst($strAddSex);
    }
    echo '</p>

										<p><b>Offense: </b>';
    for ($lSex = 0; $lSex < $offenseCounterSex; $lSex++) {
        $offenseSex = $resultsaSex[$kSex][$kSex][0]['offense'][$lSex]["offense"];
        $offenseSex = strtolower($offenseSex);
        echo ucfirst($offenseSex);
    }
    echo '</p>

										

										<div class="list-number">

											<ul>

												<li><img src="images/icon/phone.png" alt=""> +01 1245 2541, +62 6541 6528</li>

												<li><img src="images/icon/mail.png" alt=""> localdir@webdir.com</li>

											</ul>

										</div> <span class="home-list-pop-rat"><i class="fa fa-unlock-alt" style="font-size:25px;color:#337ab7" aria-hidden="true"></i></span>

										<div class="list-enqu-btn">

											<ul>

												<li style="background:coral;"><a href="#!"><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i>' . $levelSex . ' </a></li>

												<li><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</a> </li>

												<li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a> </li>

												<li><a href="#!" data-dismiss="modal" data-toggle="modal" data-target="#list-quo"><i class="fa fa-usd" aria-hidden="true"></i> Full Profile</a> </li>

											</ul>

										</div>

									</div>

								</div>';
}
?>

								<!--LISTINGS END-->

								<!--LISTINGS-->

							

								<!--LISTINGS END-->

							</div>

							

						</div>

					</div>

                    

                    	<div class="col-md-9 dir-alp-con-right" id="arrest">

						<div class="dir-alp-con-right-1">

							<div class="row">

								<!--LISTINGS-->

                                  <?php
if ($profileTotalArrest == 0) {
    echo '	  <div class="pglist-p-com-ti">

								<h3><span>No Results</span> Available</h3> </div>

								<div class="list-pg-inn-sp">

								<div class="list-pg-write-rev">

									<form class="col">

										<p>Do you feel like we are missing a sex offender record for <strong>' . strtoupper($first) . ' ' . strtoupper($last) . '? Not a problem, give us your details and we will shoot over an email as soon as we find the result you are looking for:</p>

										<div class="row">

											<div class="col s12">

											

											</div>

										</div>

										<div class="row">

											<div class="input-field col s6">

												<input id="re_name" type="text" class="validate">

												<label for="re_name" class="">Full Name</label>

											</div>

											<div class="input-field col s6">

												<input id="re_mob" type="number" class="validate">

												<label for="re_mob">Mobile</label>

											</div>

										</div>

										<div class="row">

											<div class="input-field col s6">

												<input id="re_mail" type="email" class="validate">

												<label for="re_mail">Email</label>

											</div>

											<div class="input-field col s6">

												<input id="re_city" type="text" class="validate">

												<label for="re_city">State/City</label>

											</div>

										</div>

										<div class="row">

											<div class="input-field col s12">

												<textarea id="re_msg" class="materialize-textarea"></textarea>

												<label for="re_msg">Anything you can add to help aid our search</label>

											</div>

										</div>

										<div class="row">

											<div class="input-field col s12"> <a class="waves-effect waves-light btn-large full-btn" href="#!">Find the correct ' . $first . ' ' . $last . '</a> </div>

										</div>

									</form>

								</div>

							</div>';
}
?>

							<?php
for ($kArrest = 0; $kArrest < $profileTotalArrest; $kArrest++) {
    $profileCounterArrest = count($resultsaArrest[$kArrest][$kArrest][0]['profile']);

    $first_nameArrest          = strtoupper($resultsaArrest[$kArrest][$kArrest][0]['profile'][0]["first_name"]);
	$middle_nameArrest          = strtoupper($resultsaArrest[$kArrest][$kArrest][0]['profile'][0]["middle_name"]);
	$last_nameArrest          = strtoupper($resultsaArrest[$kArrest][$kArrest][0]['profile'][0]["last_name"]);
	$picture_linkArrest          = strtoupper($resultsaArrest[$kArrest][$kArrest][0]['profile'][0]["picture_link"]);
	$cityArrest          = strtoupper($resultsaArrest[$kArrest][$kArrest][0]['profile'][0]["city"]);
	$stateArrest          = strtoupper($resultsaArrest[$kArrest][$kArrest][0]['profile'][0]["state"]);
	$dobArrest          = strtoupper($resultsaArrest[$kArrest][$kArrest][0]['profile'][0]["dob"]);
	$fullNameArrest = $first_nameArrest.' '.$middle_nameArrest.' '.$last_nameArrest;
	$picture_linkArrest = strtolower($picture_linkArrest);
	
	 

    echo '            <div class="home-list-pop list-spac">

									<!--LISTINGS IMAGE-->

									<div class="col-md-3"> <img src="' . $picture_linkArrest . '" alt="" /> </div>

									<!--LISTINGS: CONTENT-->

									<div class="col-md-9 home-list-pop-desc inn-list-pop-desc"> <a href="listing-details.html"><h3>' . $fullNameArrest . ' Age:' . ageCalculator($dobArrest) . '.Born: ' . $dobArrest . '' . '</h3></a>

										<h4>Aliases: ' . ucfirst($cityArrest) . '</h4>

										

										

										<div class="list-number">

											<ul>

												<li><img src="images/icon/phone.png" alt=""> +01 1245 2541, +62 6541 6528</li>

												<li><img src="images/icon/mail.png" alt=""> localdir@webdir.com</li>

											</ul>

										</div> <span class="home-list-pop-rat"><i class="fa fa-unlock-alt" style="font-size:25px;color:#337ab7" aria-hidden="true"></i></span>

										<div class="list-enqu-btn">

											<ul>

												<li style="background:coral;"><a href="#!"><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i>' . $stateArrest . ' </a></li>

												<li><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</a> </li>

												<li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a> </li>

												<li><a href="#!" data-dismiss="modal" data-toggle="modal" data-target="#list-quo"><i class="fa fa-usd" aria-hidden="true"></i> Full Profile</a> </li>

											</ul>

										</div>

									</div>

								</div>';
}
?>

								<!--LISTINGS END-->

								<!--LISTINGS-->

							

								<!--LISTINGS END-->

							</div>

							

						</div>

					</div>

                    

                    

				</div>

			</div>

		</div>

	</section>

	<!--MOBILE APP-->

	<section class="web-app com-padd">

		<div class="container">

			<div class="row">

				<div class="col-md-6 web-app-img"> <img src="images/mobile.png" alt="" /> </div>

				<div class="col-md-6 web-app-con">

					<h2>Looking for the Best Service Provider? <span>Get the App!</span></h2>

					<ul>

						<li><i class="fa fa-check" aria-hidden="true"></i> Find nearby listings</li>

						<li><i class="fa fa-check" aria-hidden="true"></i> Easy service enquiry</li>

						<li><i class="fa fa-check" aria-hidden="true"></i> Listing reviews and ratings</li>

						<li><i class="fa fa-check" aria-hidden="true"></i> Manage your listing, enquiry and reviews</li>

					</ul> <span>We'll send you a link, open it on your phone to download the app</span>

					<form>

						<ul>

							<li>

								<input type="text" placeholder="+01" /> </li>

							<li>

								<input type="number" placeholder="Enter mobile number" /> </li>

							<li>

								<input type="submit" value="Get App Link" /> </li>

						</ul>

					</form>

					<a href="#"><img src="images/android.png" alt="" /> </a>

					<a href="#"><img src="images/apple.png" alt="" /> </a>

				</div>

			</div>

		</div>

	</section>

	<!--FOOTER SECTION-->

	<footer id="colophon" class="site-footer clearfix">

		<div id="quaternary" class="sidebar-container " role="complementary">

			<div class="sidebar-inner">

				<div class="widget-area clearfix">

					<div id="azh_widget-2" class="widget widget_azh_widget">

						<div data-section="section">

							<div class="container">

								<div class="row">

									<div class="col-sm-4 col-md-3 foot-logo"> <img src="images/foot-logo.png" alt="logo">

										<p class="hasimg">Worlds's No. 1 Local Business Directory Website.</p>

										<p class="hasimg">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>

									</div>

									<div class="col-sm-4 col-md-3">

										<h4>Support & Help</h4>

										<ul class="two-columns">

											<li> <a href="advertise.html">Advertise us</a> </li>

											<li> <a href="about-us.html">About Us</a> </li>

											<li> <a href="customer-reviews.html">Review</a> </li>

											<li> <a href="how-it-work.html">How it works </a> </li>

											<li> <a href="add-listing.html">Add Business</a> </li>

											<li> <a href="#!">Register</a> </li>

											<li> <a href="#!">Login</a> </li>

											<li> <a href="#!">Quick Enquiry</a> </li>

											<li> <a href="#!">Ratings </a> </li>

											<li> <a href="trendings.html">Top Trends</a> </li>

										</ul>

									</div>

									<div class="col-sm-4 col-md-3">

										<h4>Popular Services</h4>

										<ul class="two-columns">

											<li> <a href="#!">Hotels</a> </li>

											<li> <a href="#!">Hospitals</a> </li>

											<li> <a href="#!">Transportation</a> </li>

											<li> <a href="#!">Real Estates </a> </li>

											<li> <a href="#!">Automobiles</a> </li>

											<li> <a href="#!">Resorts</a> </li>

											<li> <a href="#!">Education</a> </li>

											<li> <a href="#!">Sports Events</a> </li>

											<li> <a href="#!">Web Services </a> </li>

											<li> <a href="#!">Skin Care</a> </li>

										</ul>

									</div>

									<div class="col-sm-4 col-md-3">

										<h4>Cities Covered</h4>

										<ul class="two-columns">

											<li> <a href="#!">Atlanta</a> </li>

											<li> <a href="#!">Austin</a> </li>

											<li> <a href="#!">Baltimore</a> </li>

											<li> <a href="#!">Boston </a> </li>

											<li> <a href="#!">Chicago</a> </li>

											<li> <a href="#!">Indianapolis</a> </li>

											<li> <a href="#!">Las Vegas</a> </li>

											<li> <a href="#!">Los Angeles</a> </li>

											<li> <a href="#!">Louisville </a> </li>

											<li> <a href="#!">Houston</a> </li>

										</ul>

									</div>

								</div>

							</div>

						</div>

						<div data-section="section" class="foot-sec2">

							<div class="container">

								<div class="row">

									<div class="col-sm-3">

										<h4>Payment Options</h4>

										<p class="hasimg"> <img src="images/payment.png" alt="payment"> </p>

									</div>

									<div class="col-sm-4">

										<h4>Address</h4>

										<p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A. Landmark : Next To Airport</p>

										<p> <span class="strong">Phone: </span> <span class="highlighted">+01 1245 2541</span> </p>

									</div>

									<div class="col-sm-5 foot-social">

										<h4>Follow with us</h4>

										<p>Join the thousands of other There are many variations of passages of Lorem Ipsum available</p>

										<ul>

											<li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>

											<li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>

											<li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>

											<li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>

											<li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>

											<li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>

										</ul>

									</div>

								</div>

							</div>

						</div>

					</div>

				</div>

				<!-- .widget-area -->

			</div>

			<!-- .sidebar-inner -->

		</div>

		<!-- #quaternary -->

	</footer>

	<!--COPY RIGHTS-->

	<section class="copy">

		<div class="container">

			<p>copyrights © 2017 RN53Themes.net. &nbsp;&nbsp;All rights reserved. </p>

		</div>

	</section>

	<!--QUOTS POPUP-->

	<section>

		<!-- GET QUOTES POPUP -->

		<div class="modal fade dir-pop-com" id="list-quo" role="dialog">

			<div class="modal-dialog">

				<div class="modal-content">

					<div class="modal-header dir-pop-head">
<h4>Create an Account</h4>

			
						<button type="button" class="close" data-dismiss="modal">×</button>

					

						<!--<i class="fa fa-pencil dir-pop-head-icon" aria-hidden="true"></i>-->

					</div>

					<div class="modal-body dir-pop-body">

						
<section class="tz-register">

		<div class="tz-regi-form">


			
<div class="wojo-grid">
<div id="login-wrap">
  <div class="clearfix" id="tabs"> <a class="active">Signup</a></div>
  <div class="login-form">
    <form method="post" id="wojo_form" name="wojo_form">
      <div class="wojo form">
       <div class="wojo fields">
       <div class="row">
       <div class="input-field col m6 s12">
          <div class="field">
            <input type="text" placeholder="First Name" name="fname">
          </div>
          </div>
          <div class="input-field col m6 s12">
          <div class="field">
            <input type="text" placeholder="Last Name" name="lname">
          </div>
          </div>
          </div>
        </div>
       
        <div class="wojo block fields">
         <div class="row">
         	<div class="input-field col s12">
          <div class="field">
            <input type="text" placeholder="Email Address" name="email">
          </div>
          </div>
          	<div class="input-field col s12">
          <div class="field">
            <input type="password" placeholder="Password" name="password">
          </div>
          </div>
        </div>
        </div>
        
       
                        <div class="wojo block fields">
          <div class="field">
            <div class="wojo right labeled input">
              <input name="captcha" placeholder="Captcha" type="text" style="margin-top:10px;">
              <div class="wojo basic label"><img src="http://speedyhunt.com/dashboard/captcha.php" alt="" style="height:25px"></div>
            </div>
          </div>
        </div>
        <div class="content-center">
          <div class="horizontal-padding">
           <i class="waves-effect waves-light btn-large full-btn waves-input-wrapper" style=""> <button class="waves-effect waves-light btn-large full-btn waves-input-wrapper" data-action="register" name="dosubmit" type="button"><span class="wojo bold small caps text" style="color:#fff;">Signup</span></button></i>
           
            
          </div>
        </div>
      </div>
    </form>
  </div>
</div><!-- Footer -->
</div>
			<p>Are you a already member ? <a href="login.html">Click to Login</a> </p>

			<div class="soc-login">

				 <div class="ideaboxTestimonials it-style1" id="testimonial1">
    	<ul>
        	<li>
            	<h4><img src="https://peepfind.com/images/melissa.jpg" /></h4>
                <div class="it-content">
                	<p>
                    	Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eu quam sed justo pulvinar bibendum. Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.
                    </p>
                    <div class="it-name">
                		<h3>Jesse Doe</h3>
                        <span>Artist</span>
                    </div>
                </div>
            </li>
            
            <li>
            	<h4><img src="https://peepfind.com/images/michael.jpg" /></h4>
                <div class="it-content">
                	<p>
                    	Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur
                    </p>
                    <div class="it-name">
                		<h3>Johnetten Doe</h3>
                        <span>Creative Director</span>
                    </div>
                </div>
            </li>  
            
            <li>
            	<h4><img src="https://peepfind.com/images/henry.jpg" /></h4>
                <div class="it-content">
                	<p>
                    	Vivamus accumsan viverra ipsum, nec imperdiet diam laoreet vitae. Integer nisi turpis, molestie eu orci vel, vulputate feugiat lorem. Curabitur quam turpis, efficitur quis maximus sed, condimentum eget sapien
                    </p>
                    <div class="it-name">
                		<h3>John Doe</h3>
                        <span>Web Developer</span>
                    </div>
                </div>
            </li>            
        </ul>
        <div class="it-navi">
        	<div>
            	<button></button>
            	<button></button>
            </div>
        </div>
    </div>


			</div>			

		</div>

	</section>
					</div>

				</div>

			</div>

		</div>

		<!-- GET QUOTES Popup END -->

	</section>

	<!--SCRIPT FILES-->

	<!--<script src="js/jquery.min.js"></script>-->

	<script src="js/bootstrap.js" type="text/javascript"></script>

	<script src="js/materialize.min.js" type="text/javascript"></script>
    	<script type="text/javascript" src="js/jquery.queue-min.js"></script>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			// select elements
			var elem = $('.boxPending');
			 var emails = $(this).serialize();
			  var dataString = $(this).serialize();
			 
			// instantiate the queue
			var q = new Queue([
				{type: 'POST',
				url: 'requests.php',
				dataType:'json',
				data: {
                    requestData: true,
                    message: "please print me!"
                },
			
				success: function(data){
    		    console.log(data);
				console.log('success') 
				},
				error: function(data){
					  console.log(data);
					  console.log('error') }
				},
				{url: 'requests.php?req=4', success: successHandler, error: errorHandler},
//				{url: 'requests.php?req=3', success: successHandler, error: errorHandler}
			]);
			console.log(emails);
			var profileId;
			 $(".xx").on("click", function(evt) {
				profileId = $(this).attr('value');
				
				q.start().showLoader('.boxLoading');
			});
			
			// global properties for the queue
			q.baseURL = '/';
			console.log(profileId);
			q.alwaysSend = {id: profileId}; // send this key/value pair to the server for all requests
			console.log(profileId);
			
			// callback functions
			function successHandler(data, reqNum) {
				$(elem[reqNum-1]).removeClass().addClass('boxLoaded').html(data.resp);
			}
			
			function errorHandler(reqNum, url, queryData, errorType, errorMsg) {
				$(elem[reqNum-1]).removeClass().addClass('boxCanceled').html(errorMsg);
			}
			
			
			// event handlers
			q.on('init', function() {
				elem.removeClass().addClass('boxLoading').html('Loading...');
			});
			
			q.on('complete', function() {
				q.hideLoader('.boxLoading');
			});
			
			
			// button action
			
		});
		
		
		</script>
		
		<style type="text/css">
		.boxPending, .boxLoading, .boxLoaded, .boxCanceled {
			float: left;
			width: 65px; 
			height: 60px; 
			margin-right: 10px; 
			padding: 10px; 
			
			text-shadow: 0 1px 2px rgba(0, 0, 0, 0.35); 
			color: #fff; 
			
			border-radius: 5px; 
			
			box-shadow: 0 2px 0 #666;
		}
		
		.boxPending {background-color: #bbb;}
		.boxLoading {background-color: #09f;}
		.boxLoaded {background-color: #45ab34;}
		.boxCanceled {background-color: #ab3434;}
		</style>

	<script src="js/custom.js"></script>
<script type="text/javascript" src="http://speedyhunt.com/dashboard/view/front/js/master.js"></script> 
<script type="text/javascript"> 
// <![CDATA[  
$(document).ready(function() {
    $.Master({
		url: "http://speedyhunt.com/dashboard/view/front",
		surl: "http://speedyhunt.com/dashboard",
        lang: {
            button_text: "Browse...",
            empty_text: "No file...",
        }
    });
});
// ]]>
</script>
<script>
	$(document).ready(function(e) {
        $("header>span").on("click",function(){
			$(".ideaboxTestimonials").find("ul:first").removeClass().addClass("it-"+$(this).attr("data-color"));
			$("header>span").removeClass();
			$(this).addClass("activex");
		});
    });
</script>

 <script>
		$(document).ready(function(){
	
			$('#testimonial1').ideaboxTestimonials({
			autoplay: true,
			timer: 3000,
			color: 'blue'
				
			});
			
		});	
	</script>

</body>



</html>
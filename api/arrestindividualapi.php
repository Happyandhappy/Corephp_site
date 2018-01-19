<?php
class DatabaseArrests { // connecting to DB
	private $_connection;
	private static $_instance;
	private $_host = "192.249.125.90";
	private $_username = "allarres_data";
	private $_password = "FaD(7z8q@]V$";
	private $_database = "allarres_data";
	public static function getInstanceArrests() {
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
	public function getConnectionArrests() {
	return $this->_connection;
	}
};
$dbArrests = DatabaseArrests::getInstanceArrests();
$dbArrestsConnect = $dbArrests->getConnectionArrests();
function numberFormat($string) {
	if(strlen($string) == 15){
		$number =  substr($string,3);
		$number = explode("-", $number, 3);
		$result = '('.$number[0].') '.$number[1].'-'.$number[2];	
		return $result;
	}
	if(strlen($string) == 12){
		$number = explode("-", $number, 3);
		$result = '('.$number[0].') '.$number[1].'-'.$number[2];	
		return $result;
	}
	else
		return $string;
}
function clean($string) {
while (strpos(substr($string, -1), ' ') !== false) 
$string = substr($string, 0, -1);
$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
// this function is to remove ending spaces
} 
$q = htmlentities(($_GET['id']));
$searchquery = "SELECT * FROM `profile` WHERE `profileId` = '{$q}' ";
		$result  = $dbArrestsConnect->query($searchquery);
		//print_r( $result);
		unset($resultsprofile);
		unset($resultsaddress);
		unset($resultsphysical);
		unset($resultsarrestdetails);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$uniqueId			= htmlspecialchars($row['profileId']);
				$firstName			= htmlspecialchars($row['first_name']);
				$middleName			= htmlspecialchars($row['middle_name']);
				$lastName			= htmlspecialchars($row['last_name']);
							
				$gender        	= htmlspecialchars($row['gender']);
				$race       			= htmlspecialchars($row['race']);
				$arrestNumber         = htmlspecialchars($row['arrest_number']);
				$arrestDate         = htmlspecialchars($row['arrest_date']);
				$display			= htmlspecialchars($row['display']);
				$age               = htmlspecialchars($row['dob']);
				$birthYear               = htmlspecialchars($row['birth_year']);
				$age 		       = explode('-',$age);
				$age               = $age[0];
				
				$street		  = htmlspecialchars($row['street']);
				$city			= htmlspecialchars($row['city']);
				$state            = htmlspecialchars($row['state']);
				$stateShort            = htmlspecialchars($row['stateShort']);
				$zip              = htmlspecialchars($row['zip']);
				
				$eyeColor            = htmlspecialchars($row['eye_color']);
				$hairColor              = htmlspecialchars($row['hair_color']);
				$weight            = htmlspecialchars($row['weight']);
				$height            = htmlspecialchars($row['height']);
				
				$agency            = htmlspecialchars($row['agency']);
				$totalBond            = htmlspecialchars($row['total_bond']);
				$location            = htmlspecialchars($row['location']);
				$bookingDate            = htmlspecialchars($row['booking_date']);
				$chargesCount		= htmlspecialchars($row['charges_count']);
				
				$alias            = htmlspecialchars($row['alias']);
				$birthYear            = htmlspecialchars($row['birth_year']);
				$county            = htmlspecialchars($row['county']);
				$pictureLink		= htmlspecialchars($row['picture_link']);
				$resultsprofile[] = array(
				'uniqueId' => $uniqueId,
				'firstName' => $firstName,
				'middleName' => $middleName,
				'lastName' => $lastName,
				'gender' => $gender,
				'race' => $race,
				'arrestNumber' => $arrestNumber,
				'arrestDate' => $arrestDate,
				'display' => $display,
				'age' => $age,
				'birthYear' => $birthYear
				);
				$resultsaddress[] = array(
				'street' => $street,
				'city' => $city,
				'state' => $state,
				'stateShort' => $stateShort,				
				'zip' => $zip,
				);
				$resultsphysical[] = array(
				'eyeColor' => $eyeColor,
				'hairColor' => $hairColor,
				'weight' => $weight,
				'height' => $height,
				);
				$resultsarrestdetails[] = array(
				'agency' => $agency,
				'totalBond' => $totalBond,
				'location' => $location,
				'bookingDate' => $bookingDate,
				'chargesCount' => $chargesCount,
				'alias' => $alias,
				'birthYear' => $birthYear,
				'county' => $county,
				'pictureLink' => $pictureLink,
				);
			}
		$totalProfiles = $result->num_rows;
		}
		$age = $resultsprofile[0]["age"];
		$year = date('Y');
		if(strlen($age) > 2){		
			$age = $year - $age;
		}
		elseif(strlen($age) < 2){
			$age = $resultsprofile[0]["birthYear"];
			if ($age){
				$age = $year - $age;
			}
			else{
				$age = 'Unknown';
			}
		}

$finaljson = (json_encode($resultsprofile, true));
echo $finaljson;	
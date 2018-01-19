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
function base64url_encode($data) {
return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}
$dbNewDataArrest = DatabaseNewDataArrest::getInstanceNewDataArrest();
$db1Arrest      = $dbNewDataArrest->getConnectionNewDataArrest();

$first = htmlentities(clean(($_GET['fn'])));
$firstNew = preg_replace("/[a-zA-Z0-9]/", "", $first);
echo $firstNew;
$last = htmlentities(clean(($_GET['ln'])));
$st = htmlentities(clean(($_GET['state'])));
if ((($first == '') || ($first == NULL)) && (($last == '') || ($last = NULL))) {
header('Location: 404.php');
} 
$webTitle = $first.' '.$last;

$i = 0;
	
// ARREST START
if (isset($st) && strlen($st) == 2) {
      $searchqueryArrest = "SELECT site_profile_id FROM `profile` WHERE `first_name` = '$first' AND `last_name` = '$last' and `stateShort` = '$st' group by dob order by picture_link desc LIMIT 500";
} else {
    $searchqueryArrest = "SELECT site_profile_id FROM `profile` WHERE `first_name` = '$first' AND `last_name` = '$last' group by dob order by picture_link desc LIMIT 500";
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
                $uniqueId            = htmlspecialchars($row['profileId']);
                $first_name            = htmlspecialchars($row['first_name']);
                $middle_name          = htmlspecialchars($row['middle_name']);
                $last_name              = htmlspecialchars($row['last_name']);
                $picture_link               = htmlspecialchars($row['picture_link']);
                $city             = htmlspecialchars($row['city']);
                $state               = htmlspecialchars($row['state']);
				$dob               = htmlspecialchars($row['dob']);
				$agency               = htmlspecialchars($row['agency']);
				$charges_count               = htmlspecialchars($row['charges_count']);
				$arrest_number               = htmlspecialchars($row['arrest_number']);
				$total_bond               = htmlspecialchars($row['total_bond']);
                $resultsprofileArrest[] = array(
                    'uniqueId' => $uniqueId,
                    'first_name' => $first_name,
                    'middle_name' => $middle_name,
                    'last_name' => $last_name,
                    'picture_link' => $picture_link,
                    'city' => $city,
                    'state' => $state,
					'dob' => $dob,
					'agency' => $agency,
					'charges_count' => $charges_count,
					'arrest_number' => $arrest_number,
					'total_bond' => $total_bond,
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
$finaljson  = (json_encode($resultsaArrest));
echo $finaljson;
?>
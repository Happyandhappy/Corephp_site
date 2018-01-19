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
function base64url_encode($data) {
return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}
$dbNewDataSex = DatabaseNewDataSex::getInstanceNewDataSex();
$db1Sex       = $dbNewDataSex->getConnectionNewDataSex();

$first = htmlentities(clean(($_GET['fn'])));
$firstNew = preg_replace("/[a-zA-Z0-9]/", "", $first);
$last = htmlentities(clean(($_GET['ln'])));
$st = htmlentities(clean(($_GET['state'])));
if ((($first == '') || ($first == NULL)) && (($last == '') || ($last = NULL))) {
echo 'Error';
} 
$i = 0;
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
        if ($resultSex->num_rows > 0) {
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
		$resultsprofileSex = NULL;
		$resultsaddressSex = NULL;
		$resultsoffenseSex = NULL;
    }
    $profileTotalSex = $resultsaSex[0]["profileTotalSex"];
	if ($profileTotalSex == 0) {
		$profileTotalSexNumber = '0';
	}
}

$finaljson  = (json_encode($resultsaSex));
echo $finaljson;
?>

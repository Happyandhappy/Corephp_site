<?php
error_reporting(0);
ini_set('max_execution_time', 300);
ini_set('display_errors', 0); 
define("_WOJO", true);
require_once("dashboard/init.php");
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
echo $firstNew;
$last = htmlentities(clean(($_GET['ln'])));
$st = htmlentities(clean(($_GET['state'])));
if ((($first == '') || ($first == NULL)) && (($last == '') || ($last = NULL))) {
header('Location: 404.php');
} 
$webTitle = $first.' '.$last;

$i = 0;
	
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

// SEX OFFENDER END
?>

<!DOCTYPE html>

<html lang="en">



<head>

	<title><?php echo 'Sex Offender Results For '. ucwords($webTitle);?></title>

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

					<h1><?php echo strtoupper($first) . ' ' . strtoupper($last); ?></h1>

					<ol class="breadcrumb">

						<li><a href="#">Home</a> </li>

						<li><a href="search.php?fn=<?php echo $first;?>&ln=<?php echo $last; ?>"><?php echo strtoupper($first) . ' ' . strtoupper($last); ?></a> </li>

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

                              

                              	 <li><a class="active" href="#people">People (<?php if ($profileTotalSex == 50) {
	echo $profileTotalSex.'+';} else { echo $profileTotalSex;} ?>)</a> </li>

									

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

                              		<li class="tab col"><a class="active" href="#people">People (<?php if ($profileTotalSex == 50) {
	echo $profileTotalSex.'+';} else { echo $profileTotalSex;} ?>)</a> </li>

									

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

                   	<div class="col-md-9 dir-alp-con-right" id="people">

						<div class="dir-alp-con-right-1">

							<div class="row">

								<!--LISTINGS-->

                                  <?php
if ($profileTotalSex == 0) {
    echo '	  <div class="pglist-p-com-ti">

								<h3><span>No Results</span> Available</h3> </div>

								<div class="list-pg-inn-sp">

								<div class="list-pg-write-rev">

										<form name="frm" method="POST" action="" class="col">

										<p>Do you feel like we are missing a sex offender record for <strong>' . strtoupper($first) . ' ' . strtoupper($last) . '? Not a problem, give us your details and we will shoot over an email as soon as we find the result you are looking for:</p>

										<div class="row">

											<div class="col s12">

											

											</div>

										</div>

										<div class="row">

											<div class="input-field col s6">

												<input id="name" type="text" class="validate">

												<label for="re_name" class="">Full Name</label>

											</div>

											<div class="input-field col s6">

												<input id="mobile" type="number" class="validate">

												<label for="re_mob">Mobile</label>

											</div>

										</div>

										<div class="row">

											<div class="input-field col s6">

												<input id="email" type="email" class="validate">

												<label for="re_mail">Email</label>

											</div>

											<div class="input-field col s6">

												<input id="stateinput" type="text" class="validate">

												<label for="re_city">State/City</label>

											</div>

										</div>

										<div class="row">

											<div class="input-field col s12">

												<textarea id="comments" class="materialize-textarea"></textarea>

												<label for="re_msg">Anything you can add to help aid our search</label>

											</div>

										</div>

										<div class="row">
<div class="input-field col s12"><input type="submit" name="Update" id="update" value="Find the correct ' . $first . ' ' . $last . '" class="waves-effect waves-light btn-large full-btn" /></div>
											

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
	if($savedImageSex){
										$profilePic = str_replace('images/','https://sexoffenderspy.com/offenderimages/',$savedImageSex);
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
									else
										$profilePic = 'images/usericon.png';
			  //var_dump($filesizetest);
//if (!file_exists($savedImageSex)) {

    $dobDateSex           = $resultsaSex[$kSex][$kSex][0]['profile'][0]["dobDate"];
    $aliasSex             = $resultsaSex[$kSex][$kSex][0]['profile'][0]["alias"];
    $levelSex             = $resultsaSex[$kSex][$kSex][0]['profile'][0]["level"];
    echo '            <div class="home-list-pop list-spac">

									<!--LISTINGS IMAGE-->

									<div class="col-md-3" id="mobileicon"> <img src="' . $profilePic . '" alt=""  /> </div>

									<!--LISTINGS: CONTENT-->

									<div class="col-md-9 home-list-pop-desc inn-list-pop-desc"> <a href="soffender.php?unique='.$uniqueId.'"><h3>' . $fullNameSex . ' Age:' . ageCalculator($dobDateSex) . '.Born: ' . $dobDateSex . '' . '</h3></a>

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

										

									 <span class="home-list-pop-rat"><i class="fa fa-unlock-alt" style="font-size:25px;color:#337ab7" aria-hidden="true"></i></span>

										<div class="list-enqu-btn">

											<ul>

												

												
												<li style="width:75%; font-size:13px; color: #0e76a8; font-weight:bold; font-style:italic; float:left;">Sex Offenders, Arrest, Work Experience, Companies,  Social Accounts, Educational, Property, Vehicle, Voter, Patents,  Whois, and more.. </li>

												<li><a href="soffender.php?unique='.$uniqueId.'"><i class="fa fa-search" aria-hidden="true"></i> Full Profile</a> </li>

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

	</section>

	<!--MOBILE APP-->

	

	<!--FOOTER SECTION-->

	<?php include ('footer.php'); ?>
		<script type="text/javascript">    
  $("#update").click(function(e) {
  e.preventDefault();
  var name = $("#name").val(); 
  var mobile = $("#mobile").val();
  var email = $("#email").val();
  var state = $("#stateinput").val();
  var comments = $("#comments").val();
	 var query = '<?php echo $webTitle; ?>';
   var type = 'sex'; 
  
  var dataString = 'name='+name+'&mobile='+mobile+'&email='+email+'&state='+state+'&comments='+comments+'&query='+query+'&type='+type;
  $.ajax({
    type:'POST',
    data:dataString,
    url:'request_data.php',
    success:function(data) {
      alert('We will contact you in 24 hours if we find anything.');
    }
  });
});
</script>
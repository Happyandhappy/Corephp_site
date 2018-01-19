<?php
ini_set('max_execution_time', 300);
error_reporting(0);
class DatabaseNewData { // connecting to DB
	private $_connection;
	private static $_instance;
	private $_host = "192.249.125.90";
	private $_username = "sexoffen_data";
	private $_password = "XZ3UiD?1xWqQ";
	private $_database = "sexoffen_data";
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
function ageCalculator($relativeDateOfBirth){
if(!empty($relativeDateOfBirth)){
$birthdate = new DateTime($relativeDateOfBirth);
$today   = new DateTime('today');
$age = $birthdate->diff($today)->y;
return $age;
}else{
return 'Unknown';
}
}
$dbNewData = DatabaseNewData::getInstanceNewData();
$db1 = $dbNewData->getConnectionNewData();
$first = htmlspecialchars($_GET['fn']);
$last = htmlspecialchars($_GET['ln']);
$st = htmlspecialchars($_GET['state']);
if ((($first == '') || ($first == NULL)) && (($last == '') || ($last = NULL))) {
header('Location: 404.php');
//	echo 'test';
} // DIE WERK NIE!!!    DINK IS NOU SOOS JY DIT SOEK
$webTitle = $first.' '.$last;
if (isset($st) && strlen($st) == 2) {
$searchquery = "select distinct(c.theirId)
    from basic c
	inner join address o
            on c.theirId = o.theirId
    where c.fName = '$first' and c.lName = '$last' and o.state = '$st' LIMIT 50"; }
else {
$searchquery = "SELECT theirId FROM `basic` WHERE `fName` = '$first' AND `lName` = '$last' LIMIT 10"; }
$result  = $db1->query($searchquery);
$arr = array();
$totalcounter = $result->num_rows;
//$j = $totalcounter;

		$resultsDB = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$profileId        = $row['theirId'];
				$resultsDBArray[] = array(
				'profileId' => $profileId,
				);
			}
		}
  $totalcounter = count($resultsDBArray);
  $j = $totalcounter;		
if ($totalcounter > 0) {
	
//	foreach ($arr as $value) {
	for($i = 0; $i < $totalcounter ;$i++){
		$q = $resultsDBArray[$i]['profileId'];
		$profile = "SELECT * FROM `basic` WHERE `theirId` = '{$q}' ";
		$result  = $db1->query($profile);
		//print_r( $result);
		$results = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$uniqueId        = htmlspecialchars($row['theirId']);
				$fullName        = htmlspecialchars($row['fullName']);
				$savedImage        = htmlspecialchars($row['savedImage']);
				$status        = htmlspecialchars($row['status']);
				$alias        = htmlspecialchars($row['alias']);
				$dobDate        = htmlspecialchars($row['dobDate']);
				$level        = htmlspecialchars($row['level']);
				$resultsprofile[] = array(
				'uniqueId' => $uniqueId,
				'fullName' => $fullName,
				'savedImage' => $savedImage,
				'status' => $status,
				'alias' => $alias,
				'dobDate' => $dobDate,
				'level' => $level,
				
				);
			}
		}
		
		$address = "SELECT * FROM `address` WHERE `theirId` = '{$q}' ";
		$result  = $db1->query($address);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$strAdd      = htmlspecialchars($row['strAdd']);			
				$resultsaddress[] = array(
				'strAdd' => $strAdd,
				
				);
			}
		}
		
		$offense = "SELECT * FROM `offense` WHERE `theirId` = '{$q}' ";
		$result  = $db1->query($offense);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$offense      = htmlspecialchars($row['offense']);			
				$resultsoffense[] = array(
				'offense' => $offense,
				
				);
			}
		}
		
	$resultscounter[] = array(
		
		'profile' => $resultsprofile,
		'address' => $resultsaddress,
		'offense' => $resultsoffense,
		
		
		);
		
		$resultsa[] = array(
		'profileTotal' => $j,
		'profileCount' => $i, 
		$i => $resultscounter
		);
		
		unset($resultscounter);
		unset($resultsprofile);
		unset($resultsaddress);
		unset($resultsoffense);
		
	}	

$profileTotal = $resultsa[0]["profileTotal"];
} 


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
					<h1><?php echo strtoupper($first). ' '. strtoupper($last); ?></h1>
					<ol class="breadcrumb">
						<li><a href="#">Home</a> </li>
						<li><a href="sexoffender.php?fn=<?php echo $first;?>&ln=<?php echo $last; ?>"><?php echo strtoupper($first). ' '. strtoupper($last); ?></a> </li>
						<li class="active"><?php echo strtoupper($st);?></li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="dir-alp-con">
                <div>
								<ul class="tabs pg-ele-tab">
                                <i class="fa fa-search tab col" style="padding: 0 24px; font-size:25px;"  aria-hidden="true"></i>
                              		<li class="tab col"><a href="#test4">People</a> </li>
									<li class="tab col"><a class="active" href="#sexoffender">Sex Offenders (<?php echo $totalcounter; ?>)</a> </li>
									<li class="tab col"><a href="#arrest">Arrest</a> </li>
									
									
                                    <li class="tab col"><a href="#test4">Companies</a> </li>
                                    <li class="tab col"><a href="#test4">Voter</a> </li>
                                    <li class="tab col"><a href="#test4">Patents</a> </li>
                                    <li class="tab col"><a href="#test4">Property</a> </li>
                                        <li class="tab col"><a href="#test4">Vehicle</a> </li>
                               
                                     <li class="tab col"><a href="#test4">Whois</a> </li>
								</ul>
							</div>
					<div class="col-md-3 dir-alp-con-left">
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
                    
                            
					<div class="col-md-9 dir-alp-con-right" id="sexoffender">
						<div class="dir-alp-con-right-1">
							<div class="row">
								<!--LISTINGS-->
                                  <?php if ($profileTotal == 0) {
								echo '	  <div class="pglist-p-com-ti">
								<h3><span>No Results</span> Available</h3> </div>
								<div class="list-pg-inn-sp">
								<div class="list-pg-write-rev">
									<form class="col">
										<p>Do you feel like we are missing a sex offender record for <strong>'.strtoupper($first). ' '.strtoupper($last).'? Not a problem, give us your details and we will shoot over an email as soon as we find the result you are looking for:</p>
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
											<div class="input-field col s12"> <a class="waves-effect waves-light btn-large full-btn" href="#!">Find the correct '.$first. ' '. $last.'</a> </div>
										</div>
									</form>
								</div>
							</div>';
								  
								  
								  
								  
								  
								  
								  
								   } ?>
							<?php	for($k = 0; $k < $profileTotal ;$k++){
$addressCounter =  count($resultsa[$k][$k][0]['address']);
$offenseCounter =  count($resultsa[$k][$k][0]['offense']);
//$emailCounter =  count($resultsa[$k][$k][0]['emails']);
//$aliasesCounter =  count($resultsa[$k][$k][0]['aliases']);
//$educationCounter =  count($resultsa[$k][$k][0]['education']);
//$workCounter =  count($resultsa[$k][$k][0]['workexp']);
//$relativesCounter =  count($resultsa[$k][$k][0]['relatives']);
 $fullName = strtoupper($resultsa[$k][$k][0]['profile'][0]["fullName"]);
  $savedImage  = $resultsa[$k][$k][0]['profile'][0]["savedImage"];
      $dobDate    = $resultsa[$k][$k][0]['profile'][0]["dobDate"];
    $alias      = $resultsa[$k][$k][0]['profile'][0]["alias"];
	$level = $resultsa[$k][$k][0]['profile'][0]["level"];
//    $dateOfBirth = $resultsa[$k][$k][0]['profile'][0]["dateOfBirth"];

                    echo '            <div class="home-list-pop list-spac">
									<!--LISTINGS IMAGE-->
									<div class="col-md-3"> <img src="http://sexoffenderspy.com/'.$savedImage.'" alt="" /> </div>
									<!--LISTINGS: CONTENT-->
									<div class="col-md-9 home-list-pop-desc inn-list-pop-desc"> <a href="listing-details.html"><h3>'.$fullName.' Age:'.ageCalculator($dobDate).'.Born: '.$dobDate.''.'</h3></a>
										<h4>Aliases: '.ucfirst($alias).'</h4>
										<p><b>Address: </b>';
										 for ($l = 0; $l < $addressCounter; $l++) {
 										$strAdd = $resultsa[$k][$k][0]['address'][$l]["strAdd"]; 
										$strAdd = strtolower($strAdd);
										 echo ucfirst($strAdd);
   										 }
										echo '</p>
										<p><b>Offense: </b>';
										 for ($l = 0; $l < $offenseCounter; $l++) {
 										$offense = $resultsa[$k][$k][0]['offense'][$l]["offense"]; 
										//$offense = $resultsa[$k][$k][0]['offense'][$l]["offense"]; 
										//$offense = $resultsa[$k][$k][0]['offense'][$l]["offense"]; 
										 $offense = strtolower($offense);
										 echo ucfirst($offense);
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
												<li style="background:coral;"><a href="#!"><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i>'.$level.' </a></li>
												<li><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</a> </li>
												<li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a> </li>
												<li><a href="#!" data-dismiss="modal" data-toggle="modal" data-target="#list-quo"><i class="fa fa-usd" aria-hidden="true"></i> Full Profile</a> </li>
											</ul>
										</div>
									</div>
								</div>';
								} ?>
								<!--LISTINGS END-->
								<!--LISTINGS-->
							
								<!--LISTINGS END-->
							</div>
							
						</div>
					</div>
                    
                    <div class="col-md-9 dir-alp-con-right" id="arrest">
						<div class="dir-alp-con-right-1">
							<div class="row">
                            <p> arrest </p>
								<!--LISTINGS-->
                                  <?php if ($profileTotal == 0) {
								echo '	  <div class="pglist-p-com-ti">
								<h3><span>No Results</span> Available</h3> </div>
								<div class="list-pg-inn-sp">
								<div class="list-pg-write-rev">
									<form class="col">
										<p>Do you feel like we are missing a sex offender record for <strong>'.strtoupper($first). ' '.strtoupper($last).'? Not a problem, give us your details and we will shoot over an email as soon as we find the result you are looking for:</p>
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
											<div class="input-field col s12"> <a class="waves-effect waves-light btn-large full-btn" href="#!">Find the correct '.$first. ' '. $last.'</a> </div>
										</div>
									</form>
								</div>
							</div>';
								  
								  
								  
								  
								  
								  
								  
								   } ?>
							<?php	for($k = 0; $k < $profileTotal ;$k++){
//$addressCounter =  count($resultsa[$k][$k][0]['address']);
//$phoneCounter =  count($resultsa[$k][$k][0]['phones']);
//$emailCounter =  count($resultsa[$k][$k][0]['emails']);
//$aliasesCounter =  count($resultsa[$k][$k][0]['aliases']);
//$educationCounter =  count($resultsa[$k][$k][0]['education']);
//$workCounter =  count($resultsa[$k][$k][0]['workexp']);
//$relativesCounter =  count($resultsa[$k][$k][0]['relatives']);
 $fullName = strtoupper($resultsa[$k][$k][0]['profile'][0]["fullName"]);
  $savedImage  = $resultsa[$k][$k][0]['profile'][0]["savedImage"];
      $dobDate    = $resultsa[$k][$k][0]['profile'][0]["dobDate"];
//     $gender      = $resultsa[$k][$k][0]['profile'][0]["gender"];
//    $dateOfBirth = $resultsa[$k][$k][0]['profile'][0]["dateOfBirth"];

                    echo '            <div class="home-list-pop list-spac">
									<!--LISTINGS IMAGE-->
									<div class="col-md-3"> <img src="http://sexoffenderspy.com/'.$savedImage.'" alt="" /> </div>
									<!--LISTINGS: CONTENT-->
									<div class="col-md-9 home-list-pop-desc inn-list-pop-desc"> <a href="listing-details.html"><h3>'.$fullName.'</h3></a>
										<h4>DOB: '.$dobDate.'</h4>
										<p><b>Address:</b> 28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A.</p>
										<div class="list-number">
											<ul>
												<li><img src="images/icon/phone.png" alt=""> +01 1245 2541, +62 6541 6528</li>
												<li><img src="images/icon/mail.png" alt=""> localdir@webdir.com</li>
											</ul>
										</div> <span class="home-list-pop-rat">4.2</span>
										<div class="list-enqu-btn">
											<ul>
												<li><a href="#!"><i class="fa fa-star-o" aria-hidden="true"></i> Write Review</a> </li>
												<li><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</a> </li>
												<li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a> </li>
												<li><a href="#!" data-dismiss="modal" data-toggle="modal" data-target="#list-quo"><i class="fa fa-usd" aria-hidden="true"></i> Full Profile</a> </li>
											</ul>
										</div>
									</div>
								</div>';
								} ?>
								<!--LISTINGS END-->
								<!--LISTINGS-->
							
								<!--LISTINGS END-->
							</div>
							<div class="row">
								<ul class="pagination list-pagenat">
									<li class="disabled"><a href="#!!"><i class="material-icons">chevron_left</i></a> </li>
									<li class="active"><a href="#!">1</a> </li>
									<li class="waves-effect"><a href="#!">2</a> </li>
									<li class="waves-effect"><a href="#!">3</a> </li>
									<li class="waves-effect"><a href="#!">4</a> </li>
									<li class="waves-effect"><a href="#!">5</a> </li>
									<li class="waves-effect"><a href="#!">6</a> </li>
									<li class="waves-effect"><a href="#!">7</a> </li>
									<li class="waves-effect"><a href="#!">8</a> </li>
									<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a> </li>
								</ul>
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
						<button type="button" class="close" data-dismiss="modal">×</button>
						<h4 class="modal-title">Get a Quotes</h4>
						<!--<i class="fa fa-pencil dir-pop-head-icon" aria-hidden="true"></i>-->
					</div>
					<div class="modal-body dir-pop-body">
						<form method="post" class="form-horizontal">
							<!--LISTING INFORMATION-->
							<div class="form-group has-feedback ak-field">
								<label class="col-md-4 control-label">Full Name *</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="fname" placeholder="" required> </div>
							</div>
							<!--LISTING INFORMATION-->
							<div class="form-group has-feedback ak-field">
								<label class="col-md-4 control-label">Mobile</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="mobile" placeholder=""> </div>
							</div>
							<!--LISTING INFORMATION-->
							<div class="form-group has-feedback ak-field">
								<label class="col-md-4 control-label">Email</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="email" placeholder=""> </div>
							</div>
							<!--LISTING INFORMATION-->
							<div class="form-group has-feedback ak-field">
								<label class="col-md-4 control-label">Message</label>
								<div class="col-md-8 get-quo">
									<textarea class="form-control"></textarea>
								</div>
							</div>
							<!--LISTING INFORMATION-->
							<div class="form-group has-feedback ak-field">
								<div class="col-md-6 col-md-offset-4">
									<input type="submit" value="SUBMIT" class="pop-btn"> </div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- GET QUOTES Popup END -->
	</section>
	<!--SCRIPT FILES-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/materialize.min.js" type="text/javascript"></script>
	<script src="js/custom.js"></script>
</body>

</html>
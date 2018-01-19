<?php
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
//echo $ExperianTest;
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
</head>

<body>
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>
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
										<li><a href="index.html">Home</a>
										</li>
										<li><a href="index-1.html">Home 1</a>
										</li>
										<li><a href="list.html">All Listing</a>
										</li>
										<li><a href="listing-details.html">Listing Details </a> </li>
										<li><a href="price.html">Add Listing</a> </li>
										<li><a href="list-lead.html">Lead Listing</a>
										</li>
										<li><a href="list-grid.html">Listing Grid View</a>
										</li>
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
									<li><a href="advertise.html" class="waves-effect waves-light btn-large"><i class="fa fa-bullhorn"></i> Advertise with us</a> </li>
									<li><a href="db-listing-add.html" class="waves-effect waves-light btn-large"><i class="fa fa-bookmark"></i> Add your business</a> </li>
								</ul>
							</div>
						</div>
					</div>
										<!--SECTION: SEARCH BOX-->
					<div class="ts-menu-3">
						<div class="">
							<form class="tourz-search-form tourz-top-search-form">
								<div class="input-field">
									<input type="text" id="top-select-city" class="autocomplete">
									<label for="top-select-city">Enter city</label>
								</div>
								<div class="input-field">
									<input type="text" id="top-select-search" class="autocomplete">
									<label for="top-select-search" class="search-hotel-type">Search your services like hotel, resorts, events and more</label>
								</div>
								<div class="input-field">
									<input type="submit" value="" class="waves-effect waves-light tourz-top-sear-btn"> </div>
							</form>
						</div>
					</div>
					<!--SECTION: REGISTER,SIGNIN AND ADD YOUR BUSINESS-->
					<div class="ts-menu-4">
						<div class="v3-top-ri">
							<ul>
								<li><a href="login.html" class="v3-menu-sign"><i class="fa fa-sign-in"></i> Sign In</a> </li>
								<li><a href="db-listing-add.html" class="v3-add-bus"><i class="fa fa-plus" aria-hidden="true"></i> Add Listing</a> </li>
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
	<section>
		<div class="v3-list-ql">
			<div class="container">
				<div class="row">
					<div class="v3-list-ql-inn">
						<ul>
							<li class="active"><a href="#ld-abour"><i class="fa fa-user"></i> About</a>
							</li>
							<li><a href="#ld-ser"><i class="fa fa-cog"></i> Services</a>
							</li>
							<li><a href="#ld-gal"><i class="fa fa-photo"></i> Gallery</a>
							</li>
							<li><a href="#ld-roo"><i class="fa fa-ticket"></i> Room Booking</a>
							</li>
							<li><a href="#ld-vie"><i class="fa fa-street-view"></i> 360 View</a>
							</li>
							<li><a href="#ld-rew"><i class="fa fa-edit"></i> Write Review</a>
							</li>
							<li><a href="#ld-rer"><i class="fa fa-star-half-o"></i> User Review</a>
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
           
				<div class="pg-list-1-left"> <a href="#"><h3><?php echo $fullname; ?></h3></a>
					<div class="list-rat-ch"> <span>5.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </div>
					<h4>Express Avenue Mall, Los Angeles</h4>
					<p><b>Address:</b> 28800 Orchard Lake Road, Suite 180 Farmington Hills, Los Angeles, USA.</p>
					<div class="list-number pag-p1-phone">
						<ul>
							<li><i class="fa fa-phone" aria-hidden="true"></i> +01 1245 2541</li>
							<li><i class="fa fa-envelope" aria-hidden="true"></i> localdir@webdir.com</li>
							<li><i class="fa fa-user" aria-hidden="true"></i> johny depp</li>
						</ul>
					</div>
				</div>
				<div class="pg-list-1-right">
					<div class="list-enqu-btn pg-list-1-right-p1">
						<ul>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i> Write Review</a> </li>
							<li><a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</a> </li>
							<li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a> </li>
							<li><a href="#" data-dismiss="modal" data-toggle="modal" data-target="#list-quo"><i class="fa fa-usd" aria-hidden="true"></i> Get Quotes</a> </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="list-pg-bg">
		<div class="container">
			<div class="row">
				<div class="com-padd">
					<div class="list-pg-lt list-page-com-p">
						<!--LISTING DETAILS: LEFT PART 1-->
						<div class="pglist-p1 pglist-bg pglist-p-com" id="ld-abour">
							<div class="pglist-p-com-ti">
								<h3><span>About</span> Taj Luxury</h3> </div>
							<div class="list-pg-inn-sp">
								<div class="share-btn">
									<ul>
										<li><a href="#"><i class="fa fa-facebook fb1"></i> Share On Facebook</a> </li>
										<li><a href="#"><i class="fa fa-twitter tw1"></i> Share On Twitter</a> </li>
										<li><a href="#"><i class="fa fa-google-plus gp1"></i> Share On Google Plus</a> </li>
									</ul>
								</div>
								<p>Taj Luxury Hotels & Resorts presents award winning luxury hotels and resorts in India, Indonesia, Mauritius, Egypt and Saudi Arabia.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution </p>
								<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
							</div>
						</div>
                        	<div class="col-md-12">
								<div class="box-inn-sp">
									<div class="inn-title">
										<h4>Phone Numbers</h4>
										<p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> <a class="dropdown-button drop-down-meta" href="#" data-activates="dropdown1"><i class="material-icons">more_vert</i></a>
										<ul id="dropdown1" class="dropdown-content">
											<li><a href="#!">Add New</a> </li>
											<li><a href="#!">Edit</a> </li>
											<li><a href="#!">Update</a> </li>
											<li class="divider"></li>
											<li><a href="#!"><i class="material-icons">delete</i>Delete</a> </li>
											<li><a href="#!"><i class="material-icons">subject</i>View All</a> </li>
											<li><a href="#!"><i class="material-icons">play_for_work</i>Download</a> </li>
										</ul>
										<!-- Dropdown Structure -->
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
										<p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> <a class="dropdown-button drop-down-meta" href="#" data-activates="dropdown1"><i class="material-icons">more_vert</i></a>
										<ul id="dropdown1" class="dropdown-content">
											<li><a href="#!">Add New</a> </li>
											<li><a href="#!">Edit</a> </li>
											<li><a href="#!">Update</a> </li>
											<li class="divider"></li>
											<li><a href="#!"><i class="material-icons">delete</i>Delete</a> </li>
											<li><a href="#!"><i class="material-icons">subject</i>View All</a> </li>
											<li><a href="#!"><i class="material-icons">play_for_work</i>Download</a> </li>
										</ul>
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
										<p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> <a class="dropdown-button drop-down-meta" href="#" data-activates="dropdown1"><i class="material-icons">more_vert</i></a>
										<ul id="dropdown1" class="dropdown-content">
											<li><a href="#!">Add New</a> </li>
											<li><a href="#!">Edit</a> </li>
											<li><a href="#!">Update</a> </li>
											<li class="divider"></li>
											<li><a href="#!"><i class="material-icons">delete</i>Delete</a> </li>
											<li><a href="#!"><i class="material-icons">subject</i>View All</a> </li>
											<li><a href="#!"><i class="material-icons">play_for_work</i>Download</a> </li>
										</ul>
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
										<p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> <a class="dropdown-button drop-down-meta" href="#" data-activates="dropdown1"><i class="material-icons">more_vert</i></a>
										<ul id="dropdown1" class="dropdown-content">
											<li><a href="#!">Add New</a> </li>
											<li><a href="#!">Edit</a> </li>
											<li><a href="#!">Update</a> </li>
											<li class="divider"></li>
											<li><a href="#!"><i class="material-icons">delete</i>Delete</a> </li>
											<li><a href="#!"><i class="material-icons">subject</i>View All</a> </li>
											<li><a href="#!"><i class="material-icons">play_for_work</i>Download</a> </li>
										</ul>
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
										<p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> <a class="dropdown-button drop-down-meta" href="#" data-activates="dropdown1"><i class="material-icons">more_vert</i></a>
										<ul id="dropdown1" class="dropdown-content">
											<li><a href="#!">Add New</a> </li>
											<li><a href="#!">Edit</a> </li>
											<li><a href="#!">Update</a> </li>
											<li class="divider"></li>
											<li><a href="#!"><i class="material-icons">delete</i>Delete</a> </li>
											<li><a href="#!"><i class="material-icons">subject</i>View All</a> </li>
											<li><a href="#!"><i class="material-icons">play_for_work</i>Download</a> </li>
										</ul>
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
										<p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> <a class="dropdown-button drop-down-meta" href="#" data-activates="dropdown1"><i class="material-icons">more_vert</i></a>
										<ul id="dropdown1" class="dropdown-content">
											<li><a href="#!">Add New</a> </li>
											<li><a href="#!">Edit</a> </li>
											<li><a href="#!">Update</a> </li>
											<li class="divider"></li>
											<li><a href="#!"><i class="material-icons">delete</i>Delete</a> </li>
											<li><a href="#!"><i class="material-icons">subject</i>View All</a> </li>
											<li><a href="#!"><i class="material-icons">play_for_work</i>Download</a> </li>
										</ul>
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
                            
                            
                             	<div class="col-md-12">
								<div class="box-inn-sp">
									<div class="inn-title">
										<h4>Related People</h4>
										<p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> <a class="dropdown-button drop-down-meta" href="#" data-activates="dropdown1"><i class="material-icons">more_vert</i></a>
										<ul id="dropdown1" class="dropdown-content">
											<li><a href="#!">Add New</a> </li>
											<li><a href="#!">Edit</a> </li>
											<li><a href="#!">Update</a> </li>
											<li class="divider"></li>
											<li><a href="#!"><i class="material-icons">delete</i>Delete</a> </li>
											<li><a href="#!"><i class="material-icons">subject</i>View All</a> </li>
											<li><a href="#!"><i class="material-icons">play_for_work</i>Download</a> </li>
										</ul>
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
						<div class="pglist-p2 pglist-bg pglist-p-com" id="ld-ser">
							<div class="pglist-p-com-ti">
								<h3><span>Services</span> Offered</h3> </div>
							<div class="list-pg-inn-sp">
								<p>Taj Luxury Hotels & Resorts provide 24-hour Business Centre, Clinic, Internet Access Centre, Babysitting, Butler Service in Villas and Seaview Suite, House Doctor on Call, Airport Butler Service, Lobby Lounge </p>
								<div class="tz-l-1">
					<ul>
						<li><img src="images/db-profile.jpg" alt="" /> </li>
						<li><span>80%</span> profile compl</li>
						<li><span>18</span> Notifications</li>
					</ul>
				</div>
				<div class="tz-l-2">
					<ul>
						<li>
							<a href="dashboard.html"><img src="images/icon/dbl1.png" alt="" /> My Dashboard</a>
						</li>
						<li>
							<a href="db-all-listing.html"><img src="images/icon/dbl2.png" alt="" /> All Listing</a>
						</li>
						<li>
							<a href="db-listing-add.html"><img src="images/icon/dbl3.png" alt="" /> Add New Listing</a>
						</li>
						<li>
							<a href="db-message.html" class="tz-lma"><img src="images/icon/dbl14.png" alt="" /> Messages(12)</a>
						</li>
						<li>
							<a href="db-review.html"><img src="images/icon/dbl13.png" alt="" /> Reviews(05)</a>
						</li>
						<li>
							<a href="db-my-profile.html"><img src="images/icon/dbl6.png" alt="" /> My Profile</a>
						</li>
						<li>
							<a href="db-post-ads.html"><img src="images/icon/dbl11.png" alt="" /> Ad Summary</a>
						</li>
						<li>
							<a href="db-payment.html"><img src="images/icon/dbl9.png" alt="" /> Payments</a>
						</li>
						<li>
							<a href="db-invoice-all.html"><img src="images/icon/db21.png" alt="" /> Invoice</a>
						</li>						
						<li>
							<a href="db-claim.html"><img src="images/icon/dbl7.png" alt="" /> Claim & Refund</a>
						</li>
						<li>
							<a href="db-setting.html"><img src="images/icon/dbl210.png" alt="" /> Setting</a>
						</li>
						<li>
							<a href="#!"><img src="images/icon/dbl12.png" alt="" /> Log Out</a>
						</li>
					</ul>
				</div>

							</div>
						</div>
						<!--END LISTING DETAILS: LEFT PART 2-->
						<!--LISTING DETAILS: LEFT PART 3-->
						<div class="pglist-p3 pglist-bg pglist-p-com" id="ld-gal">
							<div class="pglist-p-com-ti">
								<h3><span>Photo</span> Gallery</h3> </div>
							<div class="list-pg-inn-sp">
								<div id="myCarousel" class="carousel slide" data-ride="carousel">
									<!-- Indicators -->
									<ol class="carousel-indicators">
										<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
										<li data-target="#myCarousel" data-slide-to="1"></li>
										<li data-target="#myCarousel" data-slide-to="2"></li>
										<li data-target="#myCarousel" data-slide-to="3"></li>
									</ol>
									<!-- Wrapper for slides -->
									<div class="carousel-inner">
										<div class="item active"> <img src="images/slider/1.jpg" alt="Los Angeles"> </div>
										<div class="item"> <img src="images/slider/2.jpg" alt="Chicago"> </div>
										<div class="item"> <img src="images/slider/3.jpg" alt="New York"> </div>
										<div class="item"> <img src="images/slider/4.jpg" alt="New York"> </div>
									</div>
									<!-- Left and right controls -->
									<a class="left carousel-control" href="#myCarousel" data-slide="prev"> <i class="fa fa-angle-left list-slider-nav" aria-hidden="true"></i> </a>
									<a class="right carousel-control" href="#myCarousel" data-slide="next"> <i class="fa fa-angle-right list-slider-nav list-slider-nav-rp" aria-hidden="true"></i> </a>
								</div>
							</div>
						</div>
						<!--END LISTING DETAILS: LEFT PART 3-->
						<!--LISTING DETAILS: LEFT PART 4-->
						<div class="pglist-p3 pglist-bg pglist-p-com" id="ld-roo">
							<div class="pglist-p-com-ti">
								<h3><span>Room</span> Booking</h3> </div>
							<div class="list-pg-inn-sp">
								<div class="home-list-pop list-spac list-spac-1 list-room-mar-o">
									<!--LISTINGS IMAGE-->
									<div class="col-md-3"> <img src="images/room/1.jpg" alt=""> </div>
									<!--LISTINGS: CONTENT-->
									<div class="col-md-9 home-list-pop-desc inn-list-pop-desc list-room-deta"> <a href="#!"><h3>Ultra Deluxe Rooms</h3></a>
										<div class="list-rat-ch list-room-rati"> <span>5.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </div>
										<div class="list-room-type list-rom-ami">
											<ul>
												<li>
													<p><b>Amenities:</b> </p>
												</li>
												<li><img src="images/icon/a7.png" alt=""> Wi-Fi</li>
												<li><img src="images/icon/a4.png" alt=""> Air Conditioner </li>
												<li><img src="images/icon/a3.png" alt=""> Swimming Pool</li>
												<li><img src="images/icon/a2.png" alt=""> Bar</li>
												<li><img src="images/icon/a5.png" alt=""> Bathroom</li>
												<li><img src="images/icon/a6.png" alt=""> TV</li>
												<li><img src="images/icon/a9.png" alt=""> Spa</li>
												<li><img src="images/icon/a10.png" alt=""> Music</li>
												<li><img src="images/icon/a11.png" alt=""> Parking</li>
											</ul>
										</div> <span class="home-list-pop-rat list-rom-pric">$940</span>
										<div class="list-enqu-btn">
											<ul>
												<li><a href="#!"><i class="fa fa-usd" aria-hidden="true"></i> Get Quotes</a> </li>
												<li><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</a> </li>
												<li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a> </li>
												<li><a href="#!"><i class="fa fa-usd" aria-hidden="true"></i> Book Now</a> </li>
											</ul>
										</div>
									</div>
								</div>
								<div class="home-list-pop list-spac list-spac-1 list-room-mar-o">
									<!--LISTINGS IMAGE-->
									<div class="col-md-3"> <img src="images/room/2.jpg" alt=""> </div>
									<!--LISTINGS: CONTENT-->
									<div class="col-md-9 home-list-pop-desc inn-list-pop-desc list-room-deta"> <a href="#!"><h3>Premium Rooms(Executive)</h3></a>
										<div class="list-rat-ch list-room-rati"> <span>4.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
										<div class="list-room-type list-rom-ami">
											<ul>
												<li>
													<p><b>Amenities:</b> </p>
												</li>
												<li><img src="images/icon/a7.png" alt=""> Wi-Fi</li>
												<li><img src="images/icon/a4.png" alt=""> Air Conditioner </li>
												<li><img src="images/icon/a3.png" alt=""> Swimming Pool</li>
												<li><img src="images/icon/a2.png" alt=""> Bar</li>
												<li><img src="images/icon/a5.png" alt=""> Bathroom</li>
												<li><img src="images/icon/a6.png" alt=""> TV</li>
											</ul>
										</div> <span class="home-list-pop-rat list-rom-pric">$620</span>
										<div class="list-enqu-btn">
											<ul>
												<li><a href="#!"><i class="fa fa-usd" aria-hidden="true"></i> Get Quotes</a> </li>
												<li><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</a> </li>
												<li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a> </li>
												<li><a href="#!"><i class="fa fa-usd" aria-hidden="true"></i> Book Now</a> </li>
											</ul>
										</div>
									</div>
								</div>
								<div class="home-list-pop list-spac list-spac-1 list-room-mar-o">
									<!--LISTINGS IMAGE-->
									<div class="col-md-3"> <img src="images/room/3.jpg" alt=""> </div>
									<!--LISTINGS: CONTENT-->
									<div class="col-md-9 home-list-pop-desc inn-list-pop-desc list-room-deta"> <a href="#!"><h3>Normal Rooms(Executive)</h3></a>
										<div class="list-rat-ch list-room-rati"> <span>3.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
										<div class="list-room-type list-rom-ami">
											<ul>
												<li>
													<p><b>Amenities:</b> </p>
												</li>
												<li><img src="images/icon/a7.png" alt=""> Wi-Fi</li>
												<li><img src="images/icon/a4.png" alt=""> Air Conditioner </li>
												<li><img src="images/icon/a3.png" alt=""> Swimming Pool</li>
												<li><img src="images/icon/a2.png" alt=""> Bar</li>
											</ul>
										</div> <span class="home-list-pop-rat list-rom-pric">$420</span>
										<div class="list-enqu-btn">
											<ul>
												<li><a href="#!"><i class="fa fa-usd" aria-hidden="true"></i> Get Quotes</a> </li>
												<li><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</a> </li>
												<li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a> </li>
												<li><a href="#!"><i class="fa fa-usd" aria-hidden="true"></i> Book Now</a> </li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--END 360 DEGREE MAP: LEFT PART 8-->
						<div class="pglist-p3 pglist-bg pglist-p-com" id="ld-vie">
							<div class="pglist-p-com-ti">
								<h3><span>360 </span> Degree View</h3> </div>
							<div class="list-pg-inn-sp list-360">
								<iframe src="https://www.google.com/maps/embed?pb=!1m0!4v1497026654798!6m8!1m7!1sIId_fF3cldIAAAQ7LuSTng!2m2!1d5.553927350344909!2d-0.2005543181775732!3f189.99!4f0!5f0.7820865974627469" allowfullscreen></iframe>
							</div>
						</div>
						<!--END 360 DEGREE MAP: LEFT PART 8-->
						<!--LISTING DETAILS: LEFT PART 6-->
						<div class="pglist-p3 pglist-bg pglist-p-com" id="ld-rew">
							<div class="pglist-p-com-ti">
								<h3><span>Write Your</span> Reviews</h3> </div>
							<div class="list-pg-inn-sp">
								<div class="list-pg-write-rev">
									<form class="col">
										<p>Writing great reviews may help others discover the places that are just apt for them. Here are a few tips to write a good review:</p>
										<div class="row">
											<div class="col s12">
												<fieldset class="rating">
													<input type="radio" id="star5" name="rating" value="5" />
													<label class="full" for="star5" title="Awesome - 5 stars"></label>
													<input type="radio" id="star4half" name="rating" value="4 and a half" />
													<label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
													<input type="radio" id="star4" name="rating" value="4" />
													<label class="full" for="star4" title="Pretty good - 4 stars"></label>
													<input type="radio" id="star3half" name="rating" value="3 and a half" />
													<label class="half" for="star3half" title="Meh - 3.5 stars"></label>
													<input type="radio" id="star3" name="rating" value="3" />
													<label class="full" for="star3" title="Meh - 3 stars"></label>
													<input type="radio" id="star2half" name="rating" value="2 and a half" />
													<label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
													<input type="radio" id="star2" name="rating" value="2" />
													<label class="full" for="star2" title="Kinda bad - 2 stars"></label>
													<input type="radio" id="star1half" name="rating" value="1 and a half" />
													<label class="half" for="star1half" title="Meh - 1.5 stars"></label>
													<input type="radio" id="star1" name="rating" value="1" />
													<label class="full" for="star1" title="Sucks big time - 1 star"></label>
													<input type="radio" id="starhalf" name="rating" value="half" />
													<label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
												</fieldset>
											</div>
										</div>
										<div class="row">
											<div class="input-field col s6">
												<input id="re_name" type="text" class="validate">
												<label for="re_name">Full Name</label>
											</div>
											<div class="input-field col s6">
												<input id="re_mob" type="number" class="validate">
												<label for="re_mob">Mobile</label>
											</div>
										</div>
										<div class="row">
											<div class="input-field col s6">
												<input id="re_mail" type="email" class="validate">
												<label for="re_mail">Email id</label>
											</div>
											<div class="input-field col s6">
												<input id="re_city" type="text" class="validate">
												<label for="re_city">City</label>
											</div>
										</div>
										<div class="row">
											<div class="input-field col s12">
												<textarea id="re_msg" class="materialize-textarea"></textarea>
												<label for="re_msg">Write review</label>
											</div>
										</div>
										<div class="row">
											<div class="input-field col s12"> <a class="waves-effect waves-light btn-large full-btn" href="#!">Submit Review</a> </div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!--END LISTING DETAILS: LEFT PART 6-->
						<!--LISTING DETAILS: LEFT PART 5-->
						<div class="pglist-p3 pglist-bg pglist-p-com" id="ld-rer">
							<div class="pglist-p-com-ti">
								<h3><span>User</span> Reviews</h3> </div>
							<div class="list-pg-inn-sp">
								<div class="lp-ur-all">
									<div class="lp-ur-all-left">
										<div class="lp-ur-all-left-1">
											<div class="lp-ur-all-left-11">Excellent</div>
											<div class="lp-ur-all-left-12">
												<div class="lp-ur-all-left-13"></div>
											</div>
										</div>
										<div class="lp-ur-all-left-1">
											<div class="lp-ur-all-left-11">Good</div>
											<div class="lp-ur-all-left-12">
												<div class="lp-ur-all-left-13 lp-ur-all-left-Good"></div>
											</div>
										</div>
										<div class="lp-ur-all-left-1">
											<div class="lp-ur-all-left-11">Satisfactory</div>
											<div class="lp-ur-all-left-12">
												<div class="lp-ur-all-left-13 lp-ur-all-left-satis"></div>
											</div>
										</div>
										<div class="lp-ur-all-left-1">
											<div class="lp-ur-all-left-11">Below Average</div>
											<div class="lp-ur-all-left-12">
												<div class="lp-ur-all-left-13 lp-ur-all-left-below"></div>
											</div>
										</div>
										<div class="lp-ur-all-left-1">
											<div class="lp-ur-all-left-11">Below Average</div>
											<div class="lp-ur-all-left-12">
												<div class="lp-ur-all-left-13 lp-ur-all-left-poor"></div>
											</div>
										</div>
									</div>
									<div class="lp-ur-all-right">
										<h5>Overall Ratings</h5>
										<p><span>4.5 <i class="fa fa-star" aria-hidden="true"></i></span> based on 242 reviews</p>
									</div>
								</div>
								<div class="lp-ur-all-rat">
									<h5>Reviews</h5>
									<ul>
										<li>
											<div class="lr-user-wr-img"> <img src="images/users/2.png" alt=""> </div>
											<div class="lr-user-wr-con">
												<h6>Jacob Michael <span>4.5 <i class="fa fa-star" aria-hidden="true"></i></span></h6> <span class="lr-revi-date">19th January, 2017</span>
												<p>Good service... nice and clean rooms... very good spread of buffet and friendly staffs. Located in heart of city and easy to reach any places in a short distance. </p>
												<ul>
													<li><a href="#!"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><span>Share Now</span>  <i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
												</ul>
											</div>
										</li>
										<li>
											<div class="lr-user-wr-img"> <img src="images/users/3.png" alt=""> </div>
											<div class="lr-user-wr-con">
												<h6>Gabriel Elijah <span>5.0 <i class="fa fa-star" aria-hidden="true"></i></span></h6> <span class="lr-revi-date">21th July, 2016</span>
												<p>The hotel is clean, convenient and good value for money. Staff are courteous and helpful. However, they need more training to be efficient.</p>
												<ul>
													<li><a href="#!"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><span>Share Now</span>  <i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
												</ul>
											</div>
										</li>
										<li>
											<div class="lr-user-wr-img"> <img src="images/users/4.png" alt=""> </div>
											<div class="lr-user-wr-con">
												<h6>Luke Mason <span>4.2 <i class="fa fa-star" aria-hidden="true"></i></span></h6> <span class="lr-revi-date">21th March, 2018</span>
												<p>Too much good experience with hospitality, cleanliness, facility and privacy and good value for money... To keep mind relaxing... Keep it up... </p>
												<ul>
													<li><a href="#!"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><span>Share Now</span>  <i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
												</ul>
											</div>
										</li>
										<li>
											<div class="lr-user-wr-img"> <img src="images/users/5.png" alt=""> </div>
											<div class="lr-user-wr-con">
												<h6>Kevin Jack <span>3.6 <i class="fa fa-star" aria-hidden="true"></i></span></h6> <span class="lr-revi-date">21th Aug, 2018</span>
												<p>I am deaf. Bar is closed and Restaurant is okay ... It should be more decoration as beautiful. I enjoyed swimming top floor and weather is good</p>
												<ul>
													<li><a href="#!"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><span>Share Now</span>  <i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
												</ul>
											</div>
										</li>
										<li>
											<div class="lr-user-wr-img"> <img src="images/users/6.png" alt=""> </div>
											<div class="lr-user-wr-con">
												<h6>Nicholas Tyler <span>4.4 <i class="fa fa-star" aria-hidden="true"></i></span></h6> <span class="lr-revi-date">21th Aug, 2018</span>
												<p>Overall, it was good experience. Rooms were spacious and they were kept very clean and tidy. Room service was good.</p>
												<ul>
													<li><a href="#!"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><span>Share Now</span>  <i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
													<li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
												</ul>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!--END LISTING DETAILS: LEFT PART 5-->
					</div>
					<div class="list-pg-rt">
						<!--LISTING DETAILS: LEFT PART 7-->
						<div class="pglist-p3 pglist-bg pglist-p-com">
							<div class="pglist-p-com-ti pglist-p-com-ti-right">
								<h3><span>Listing</span> Guarantee</h3> </div>
							<div class="list-pg-inn-sp">
								<div class="list-pg-guar">
									<ul>
										<li>
											<div class="list-pg-guar-img"> <img src="images/icon/g1.png" alt="" /> </div>
											<h4>Service Guarantee</h4>
											<p>Upto 6 month of service</p>
										</li>
										<li>
											<div class="list-pg-guar-img"> <img src="images/icon/g2.png" alt="" /> </div>
											<h4>Professionals</h4>
											<p>100% certified professionals</p>
										</li>
										<li>
											<div class="list-pg-guar-img"> <img src="images/icon/g3.png" alt="" /> </div>
											<h4>Insurance</h4>
											<p>Upto $5,000 against damages</p>
										</li>
									</ul> <a class="waves-effect waves-light btn-large full-btn list-pg-btn" href="#!" data-dismiss="modal" data-toggle="modal" data-target="#list-quo">Quick Enquiry</a> </div>
							</div>
						</div>
						<!--END LISTING DETAILS: LEFT PART 7-->
						<!--LISTING DETAILS: LEFT PART 7-->
						<div class="pglist-p3 pglist-bg pglist-p-com">
							<div class="pg-list-user-pro"> <img src="images/users/8.png" alt=""> </div>
							<div class="list-pg-inn-sp">
								<div class="list-pg-upro">
									<h5>Kevin Jack</h5>
									<p>Member since July 2017</p> <a class="waves-effect waves-light btn-large full-btn list-pg-btn" href="#!">Contact User</a> </div>
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
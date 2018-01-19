<?php
$uniqueidentifierperson = $_GET['unique'];
require_once ('../config.php'); // loading databases
require_once ('../experianFunctions.php');
function base64url_encode($data) {
return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}
function base64url_decode($data) {
return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}
error_reporting(0);
ini_set('max_execution_time', 300);
ini_set('display_errors', 0); 
define("_WOJO", true);
require_once("../dashboard/init.php");
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
	if ( count($_GET) <> 1 ) { 	header('Location: http://speedyhunt.com/404.php');
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
	
?>
<!DOCTYPE html>
<html style="" class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript" async src="./files/rollover.core.js.download"></script>
    <script src="./files/1727.js.download" async type="text/javascript"></script>
   
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="robots" content="noindex,nofollow">
    <title><?php echo $fullname; ?></title>
    <meta name="description" content="Reports may include Criminal Records, Addresses, Phone Numbers, Social Profiles, Court Records, Marriage and Divorce Records, Relatives, Email Addresses, Property Records and more!">
    <meta name="keywords" content="background check, criminal background, criminal records, free background check, background people, background information, marriage records, people search, criminal background check">
    <link href="http://speedyhunt.com/images/fav.ico" rel="shortcut icon" type="image/x-icon">
	<link href="../../css/style.css" rel="stylesheet">
	<link href="../../css/styleProfile.css" rel="stylesheet">
	<link href="http://speedyhunt.com/css/master_main.css" rel="stylesheet">

    <link href="./files/style.css" rel="stylesheet" type="text/css">
    <link href="./files/responsive.css" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script type="text/javascript" src="https://speedyhunt.com/dashboard/assets/jquery.js"></script>
    <!-- Slick Nav -->
    <script src="./files/modernizr.min.js.download"></script>
    <!-- Resizing Header On Scroll -->
  
   
    <!-- Reviews -->
    <link href="./files/slick.css" rel="stylesheet" type="text/css">
   
    <script src="./files/slick.min.js.download" type="text/javascript"></script>
 


 
    <style>
	.top-search form ul li input[type="submit"] {
		height:45px !important; }

.wojo.small.message {
	display:none !important;
}

	</style>
    <script type="text/javascript" src="https://speedyhunt.com/dashboard/assets/jquery.js"></script>
<script type="text/javascript" src="https://speedyhunt.com/dashboard/assets/global.js"></script>


</head>

<body>
    

    <!-- Header -->
   <section id="myID" class="bottomMenu hom-menu" style="display:block !important;">

		<div class="container top-search-main">

			<div class="row" style="margin-left:auto; margin-right:auto; text-align:center; width:80%;">

				<div class="ts-menu">

					<!--SECTION: LOGO-->

					<div class="ts-menu-1" style="width:12%;">

						<a href="/"><img src="../../speedyHunt.png" alt="" style="width:300px; height:55px;"> </a>

					</div>

					<!--SECTION: BROWSE CATEGORY(NOTE:IT'S HIDE ON MOBILE & TABLET VIEW)-->



					<!--SECTION: SEARCH BOX-->

					<div class="ts-menu-3" style="width:68% !important;">

						<div class="top-search">
<div id="menupeople" class="tab-pane fade in active">
							<form action="http://speedyhunt.com/search.php" target="get">

								<ul>

								

										
                                        
                                        <li style="width:30%; padding:5px; ">

												<input type="text" class="sea-drop-top" placeholder="John" style="border:1px solid #000;" name="fn" required>

												

											</li>
                                       <li style="width:30%; padding:5px; ">

			<input type="text" class="sea-drop-top" placeholder="Smith"  name="ln" style="border:1px solid #000;" required>

												

											</li>

									 <li style="width:25%; padding:5px;">

												 <div class="form-field field-select" style="width:100%; border:1px solid #000;">

                                    <div class="select">
                                       <select name="state"  id="state" style="border:1px solid #000;">
                                           <option value="">Nationwide</option>
<option value="AL">Alabama</option>
<option value="AK">Alaska</option>
<option value="AZ">Arizona</option>
<option value="AR">Arkansas</option>
<option value="CA">California</option>
<option value="CO">Colorado</option>
<option value="CT">Connecticut</option>
<option value="DE">Delaware</option>
<option value="FL">Florida</option>
<option value="GA">Georgia</option>
<option value="HI">Hawaii</option>
<option value="ID">Idaho</option>
<option value="IL">Illinois</option>
<option value="IN">Indiana</option>
<option value="IA">Iowa</option>
<option value="KS">Kansas</option>
<option value="KY">Kentucky</option>
<option value="LA">Louisiana</option>
<option value="ME">Maine</option>
<option value="MD">Maryland</option>
<option value="MA">Massachusetts</option>
<option value="MI">Michigan</option>
<option value="MN">Minnesota</option>
<option value="MS">Mississippi</option>
<option value="MO">Missouri</option>
<option value="MT">Montana</option>
<option value="NE">Nebraska</option>
<option value="NV">Nevada</option>
<option value="NH">New Hampshire</option>
<option value="NJ">New Jersey</option>
<option value="NM">New Mexico</option>
<option value="NY">New York</option>
<option value="NC">North Carolina</option>
<option value="ND">North Dakota</option>
<option value="OH">Ohio</option>
<option value="OK">Oklahoma</option>
<option value="OR">Oregon</option>
<option value="PA">Pennsylvania</option>
<option value="RI">Rhode Island</option>
<option value="SC">South Carolina</option>
<option value="SD">South Dakota</option>
<option value="TN">Tennessee</option>
<option value="TX">Texas</option>
<option value="UT">Utah</option>
<option value="VT">Vermont</option>
<option value="VA">Virginia</option>
<option value="WA">Washington</option>
<option value="WV">West Virginia</option>
<option value="WI">Wisconsin</option>
<option value="WY">Wyoming</option>

                                        </select>

                                    </div>

                                </div>
												

											</li>	

							

									<li style="width:15% !important;padding:5px;">

												<input type="submit" value=""> </li>

										</ul>

									</form>
</div> <!--THIS SEARCH ENDS HERE-->

 <!--THIS SEARCH ENDS HERE-->
						</div>

					</div>

					<!--SECTION: REGISTER,SIGNIN AND ADD YOUR BUSINESS-->

					<div class="ts-menu-4">

						<div class="top-links">

							<ul>

<li><a href="http://speedyhunt.com/register.php">Register</a> </li>

								<li><a href="http://speedyhunt.com/login.php">Sign In</a> </li>
							

							</ul>

						</div>

					</div>

					<!--MOBILE MENU ICON:IT'S ONLY SHOW ON MOBILE & TABLET VIEW-->

					<div class="ts-menu-5"><span><i class="fa fa-bars" aria-hidden="true"></i></span> </div>

					<!--MOBILE MENU CONTAINER:IT'S ONLY SHOW ON MOBILE & TABLET VIEW-->

					<div class="mob-right-nav" data-wow-duration="0.5s">

						<div class="mob-right-nav-close"><i class="fa fa-times" aria-hidden="true"></i> </div>

						<h5>Personal</h5>

						<ul class="mob-menu-icon">

							<li><a href="#">Account</a> </li>

							<li><a href="register.php"> Register</a> </li>

							<li><a href="login.pgp" >Sign In</a> </li>

						</ul>

						

						

					</div>

				</div>

			</div>

		</div>

	</section>
    <!-- // Header -->

    <style>
        .checkout-v2 {
            background: 
   background: #667db6;  /* fallback for old browsers */

background: -webkit-linear-gradient(to left, #667db6, #0082c8, #0082c8, #667db6);  /* Chrome 10-25, Safari 5.1-6 */

background: linear-gradient(to left, #667db6, #0082c8, #0082c8, #667db6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */ 

    background-size: cover;
            background-size: cover;
        }
    </style>

    <!-- Main -->
    <div id="main">
        <div class="cv2-message">
            <div class="wrapper cf">
                <h2>FINAL STEP: Activate Account to View Full Report on <span><?php echo $fullname; ?></span></h2>
            </div>
        </div>
        <div class="map-overlay-updated"></div>
        <div class="checkout-v2 cf">
            <div class="wrapper cf">
                <div class="cv2-content cf">
                    <div class="cv2-half left ">
                        <div class="cv2-block">
                            <div class="cv2-top">
                                <div class="cell-sum">
                                    <div class="cv2-sum">
                                        <div class="cv2-sum-img"><img src="http://speedyhunt.com/images/usericon.png" alt="">
                                        </div>
                                        <div class="cv2-sum-info">
                                            <ul>
                                                <li>Full Report: <span>AVAILABLE</span>
                                                </li>
                                                <li>Name: <span><?php echo $fullname; ?></span>
                                                </li>
                                               
                                                <li>Type: <span>Unlimited including manual updates.</span>
                                                </li>
                                                <li>Latest Report as of <span><?php echo date('Y-m-d'); ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell-incs">
                                    <div class="cv2-incs cv2-desktop">
                                        <h3>Reports May Include When Available</h3>
                                        <div class="cv2-incs-list cf">
                                            <ul>
                                                <li class="icn-01">Name</li>
                                                <li class="icn-07">Current Address</li>
                                                <li class="icn-02">Phone Numbers</li>
                                                <li class="icn-08">Hidden Social Profiles</li>
                                                <li class="icn-03">Photos</li>
                                                <li class="icn-09">Email Address</li>
                                                <li class="icn-04">Criminal Records</li>
                                                <li class="icn-10">Arrest Mugshots</li>
                                                <li class="icn-05">Marriages &amp; Divorces</li>
                                                <li class="icn-11">Property Ownership</li>
                                                <li class="icn-06">Court Documents</li>
                                                <li class="icn-12">And More!</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cv2-half right">
                        <div class="cv2-block special">
                            <div class="cv2-block2 cv2-desktop">
                                <h2>
								<span class="cv2-title-table">
									<span>Unlock Unlimited Reports Instantly</span>
									
								</span>
							</h2>
                                <div class="cv2-total">
                                    <div class="row">
                                        <div class="cell">Detailed Report on <span><?php echo $fullname; ?></span>
                                        </div>
                                        <div class="cell"><i>Included</i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="cell">Unlimited Lookups</div>
                                        <div class="cell"><i>Included</i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="cell">Free Expert Assisted Searches and Support</div>
                                        <div class="cell"><i>Included</i>
                                        </div>
                                    </div>
                                </div>
                                <div class="cv2-total">
                                    <div class="row total">
                                        <div class="cell">
                                          
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <h2 class="cv2-arw">
							<span class="cv2-title-table">
								<span style="text-align:center !important;">Register an Account</span>
								
							</span>
						</h2>
                        <div class="wojo-grid">
<div id="login-wrap">
  <div class="login-form">
                          <form method="post" id="wojo_form" name="wojo_form">
                            
                                <div class="cv2-form">
                                    <div class="row cf">
                                        <div class="cell one-half">
                                            <label for="firstname">First Name:</label>
                                            <input class="required" id="firstname" name="fname" value="" required type="text" placeholder="e.g John">
                                        </div>
                                        <div class="cell one-half">
                                            <label for="last_name">Last Name:</label>
                                            <input class="required" id="last_name" name="lname" value="" required type="text" placeholder="e.g. Smith">
                                        </div>
                                    </div>
                                    <div class="row cf">
                                        <div class="cell one-half">
                                            <label for="email">Email:</label>
                                            <input class="required" id="email" name="email" value="" required type="text" placeholder="e.g. john@email.com">
                                        </div>
                                        <div class="cell one-half">
                                            <label for="zipcode">Password:</label>
                                            <input class="required" id="zip" name="password" value="" required type="text" placeholder="e.g. Pass12345">
                                        </div>
                                    </div>
                                    <div class="row cf">
                                        <div class="cell ">
                                            <label for="card_number">Enter the Captcha: <span class="cv2-cards"></span>
                                            </label>
                                             <input name="captcha" placeholder="Captcha" type="text" style="margin-top:10px;">
                                            <div class="wojo right labeled input">
              <div class="wojo basic label"><img src="https://speedyhunt.com/dashboard/captcha.php" alt="" style="height:25px"></div>
           
            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row cf">
                                        <div class="cell">
                                           
                                        </div>
                                    </div>
                               
                                    <div class="row cf">
                                        <div class="cell btn">
                                       
                                          <button data-action="register" name="dosubmit" type="button">Signup</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                                </div>
        </div>
      </div>
                            <div class="cv2-block2 cv2-mobile">
                                <h2>
								<span class="cv2-title-table">
									<span>Unlock Your Report Instantly</span>
									
								</span>
							</h2>
                                <div class="cv2-total">
                                    <div class="row">
                                        <div class="cell">Detailed Report on <span><?php echo $fullname; ?></span>
                                        </div>
                                        <div class="cell"><i>Included</i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="cell">Unlimited Reverse Lookups</div>
                                        <div class="cell"><i>Included</i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="cell">Free Expert Assisted Searches and Support</div>
                                        <div class="cell"><i>Included</i>
                                        </div>
                                    </div>
                                </div>
                                <div class="cv2-total">
                                    <div class="row total">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cv2-incs cv2-mobile">
                        <h3>Report May Include When Available</h3>
                        <div class="cv2-incs-list cf">
                            <ul>
                                <li class="icn-01">Name</li>
                                <li class="icn-07">Current Address</li>
                                <li class="icn-02">Phone Numbers</li>
                                <li class="icn-08">Hidden Social Profiles</li>
                                <li class="icn-03">Photos</li>
                                <li class="icn-09">Email Address</li>
                                <li class="icn-04">Criminal Records</li>
                                <li class="icn-10">Arrest Mugshots</li>
                                <li class="icn-05">Marriages &amp; Divorces</li>
                                <li class="icn-11">Property Ownership</li>
                                <li class="icn-06">Court Documents</li>
                                <li class="icn-12">And More!</li>
                            </ul>
                        </div>
                    </div>
                    <div class="cv2-half left">
                        <div class="cv2-block">
                            <h2>Customer Reviews</h2>
                            <div class="cv2-reviews">
                                <div class="cv2-review">
                                    <p>"A friend of mine recommended me to this service. After I used it once I was amazed how easy and helpful it was. Whenever I need to perform a background check on someone I will make Speedyhunt.com my #1 choice."</p>
                                    <p class="author">Mark Lopez - Phoenix, Arizona</p>
                                </div>
                                <div class="cv2-review">
                                    <p>"Thank you for all the information that you provided me over the years. I use your service to verify all my potential dates. The amount of information you can uncover with just a phone number is amazing!"</p>
                                    <p class="author">Stephanie Schmidt - New York, New York</p>
                                </div>
                                <div class="cv2-review">
                                    <p>"Whenever my friends or family members have had situations regarding a mysterious email I've always recommended Speedyhunt.com. It's gives great results while being very affordable."</p>
                                    <p class="author">Richard Krueger - Chicago, Illinois</p>
                                </div>
                                <div class="cv2-review">
                                    <p>"Speedyhunt.com is a Top notch Service! I will always recommend this site to both my friends and coworkers. I got a lot of useful information from them and it was so easy to use."</p>
                                    <p class="author">Samantha Fisher - San Francisco, California</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cv2-half right">
                        <div class="cv2-verified" style="padding:25px !important;">
                            <p>We make sure to provide you only with the most up-to-date and accurate information. In the event you are not fully satisfied, please contact us for fast customer service and expert support.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- // Main -->

  
    <!-- END: buySAFE Seal -->
    <!-- processorId: 14 -->

    <!-- Footer --><script type="text/javascript" src="https://speedyhunt.com/dashboard/view/front/js/mastercheckout.js"></script> 
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
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109092015-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-109092015-1');
</script>
 <script type='text/javascript'>
window.__lo_site_id = 98141;

	(function() {
		var wa = document.createElement('script'); wa.type = 'text/javascript'; wa.async = true;
		wa.src = 'https://d10lpsik1i8c69.cloudfront.net/w.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wa, s);
	  })();
	</script>
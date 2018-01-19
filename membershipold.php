<?php
error_reporting(0);
ini_set('max_execution_time', 300);
ini_set('display_errors', 0); 
define("_WOJO", true);
require_once("dashboard/init.php");
 if (!App::Auth()->is_User())
      Url::redirect('login.php');
?>

<!DOCTYPE html>

<html lang="en">



<head>

	<title>SpeedyHunt.com - Membership</title>

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
.black {
	background: none !important;
}
.tz-regi-form h4 {
	font-size:20px !important;
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

						<li><a href="/">Home</a> </li>

						<li style="color:#fff;">Register </li>

					

					</ol>

				</div>

			</div>

			<div class="row">

				<div class="dir-alp-con">

                <div>
                <?php include 'sidebarmobile.php'; ?>

								<ul class="tabs pg-ele-tab" id="desktopsearch">

                                <i class="fa fa-search tab col" style="padding: 0 24px; font-size:25px;"  aria-hidden="true"></i>

                              		<li class="tab col"><a class="active" href="#people">Register</a> </li>

									

								</ul>

							</div>

					  <?php include 'sidebardesktop.php'; ?>

                   

                    <div class="pg-elem-inn ele-btn" style="margin:0px !important;">

                    <div class="col-md-9 dir-alp-con-right" id="people">

						<div class="dir-alp-con-right-1">

							<div class="row">



	

		<div class="tz-regi-form" style="width:100% !important; margin-top:0px !important;">

<h4>Select Your Membership</h4>
<h3 style="font-size:12px;">Unlimited Reports - No Hidden Costs.</h3>			
<div class="wojo-grid">
<div id="login-wrap">
  <div class="clearfix" id="tabs"> </div>
  
  <div class="login-form">
<div class="row screen-block-3 tablet-block-2 mobile-block-1 phone-block-1 double-gutters align-center">
    
    <div class="column" id="item_1" style="padding:15px;">
    <div class="wojo attached segment content-center relative">
           
            <div class="wojo space divider"></div>
      <h4 class="content-center">US$22.87 - 1 Month</h4>
      <p class="wojo small text">Recurring: Yes</p>
    
    
            <p><a class="wojo small button add-cart waves-effect waves-light btn-large full-btn waves-input-wrapper" style="color:#fff;" data-id="1">Select</a></p>
          </div>
  </div>
    <div class="column" id="item_3" style="padding:15px !important;">
    <div class="wojo attached segment content-center relative">
         
            <div class="wojo space divider"></div>
      <h4 class="content-center">US$29.95 - 1 Month</h4>
      <p class="wojo small text">Recurring: No</p>
    
      <p class="wojo tiny text"></p>
            <p><a class="wojo small button add-cart waves-effect waves-light btn-large full-btn waves-input-wrapper" style="color:#fff;" data-id="3">Select</a></p>
          </div>
  </div>
  
  <div class="column" id="item_2" style="padding:15px !important;">
    <div class="wojo attached segment content-center relative">
         
            <div class="wojo space divider"></div>
      <h4 class="content-center">US$162 - 6 Months Access (10% Discount)</h4>
      <p class="wojo small text">Recurring: No</p>
    
      <p class="wojo tiny text"></p>
            <p><a class="wojo small button add-cart waves-effect waves-light btn-large full-btn waves-input-wrapper" style="color:#fff;" data-id="2">Select</a></p>
          </div>
  </div>
   <div class="column" id="item_4">
    <div class="wojo attached segment content-center relative">
            <img src="http://speedyhunt.com/dashboard/uploads/memberships/default.png" alt="">
            <div class="wojo space divider"></div>
      <h4 class="content-center">US$2.00 Test</h4>
      <p class="wojo small text">Recurring Yes</p>
   
      <p class="wojo tiny text"></p>
            <p><a class="wojo small button add-cart" data-id="4">Select</a></p>
          </div>
  </div>


    </div>



<div id="mResult"></div>


							

						</div>

					</div>

                            

					

                    

                    	

                    

                    

				</div>

			</div>

		</div>

	</section>

	<!--MOBILE APP-->

	

	<!--FOOTER SECTION-->
	<script type="text/javascript" src="https://speedyhunt.com/dashboard/view/front/js/master.js"></script> 
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
	<?php include ('footerplain.php'); ?>
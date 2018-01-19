<?php
error_reporting(0);
ini_set('max_execution_time', 300);
ini_set('display_errors', 0); 
define("_WOJO", true);
require_once("dashboard/init.php");
if (!App::Auth()->is_User())
   Url::redirect('register.php');
?>


<!DOCTYPE html>

<html lang="en">



<head>

	<title>Speedyhunt.com - Membership</title>

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
.tz-regi-form input {
	height: auto !important;
}
.tz-regi-form p a {
	color:#fff !important;
}
	</style>
<script type="text/javascript" src="https://speedyhunt.com/dashboard/assets/jquery.js"></script>
<script type="text/javascript" src="https://speedyhunt.com/dashboard/assets/global.js"></script>
<link href="css/master_main.css" rel="stylesheet" type="text/css" />

</head>



<body>



	<!--TOP SEARCH SECTION-->

	<?php include('headerInner.php'); ?>

	<section class="tz-register">

		<div class="tz-regi-form">

<h4>Select Your Membership</h4>
			
<div class="wojo-grid">
<div id="login-wrap">
  <div class="clearfix" id="tabs"> </div>
  
  <div class="login-form">
<div class="row screen-block-3 tablet-block-2 mobile-block-1 phone-block-1 double-gutters align-center">
     <div class="column" id="item_1">
    <div class="wojo attached segment content-center relative">
            <img src="http://speedyhunt.com/dashboard/uploads/memberships/default.png" alt="">
            <div class="wojo space divider"></div>
      <h4 class="content-center">US$22.87 1 Month</h4>
      <p class="wojo small text">Recurring Yes</p>
    
      <p class="wojo tiny text"></p>
            <p><a class="wojo small button add-cart waves-effect waves-light btn-large full-btn waves-input-wrapper" data-id="1">Select</a></p>
          </div>
  </div>


<div id="mResult"></div>
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

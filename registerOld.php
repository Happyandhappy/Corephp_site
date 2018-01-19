<?php
error_reporting(0);
ini_set('max_execution_time', 300);
ini_set('display_errors', 0); 
define("_WOJO", true);
require_once("dashboard/init.php");
if (App::Auth()->is_User())
      Url::redirect('Account.php');
?>
<!DOCTYPE html>

<html lang="en">



<head>

	<title>Speedyhunt.com - Register</title>

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

<script type="text/javascript" src="https://speedyhunt.com/dashboard/assets/jquery.js"></script>
<script type="text/javascript" src="https://speedyhunt.com/dashboard/assets/global.js"></script>
<link href="css/master_main.css" rel="stylesheet" type="text/css" />

</head>



<body>



	<!--TOP SEARCH SECTION-->

	<?php include('headerInner.php'); ?>

	<section class="tz-register">

		<div class="tz-regi-form">

<h4>Create an Account</h4>
			
<div class="wojo-grid">
<div id="login-wrap">
  <div class="clearfix" id="tabs"> </div>
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
              <div class="wojo basic label"><img src="https://speedyhunt.com/dashboard/captcha.php" alt="" style="height:25px"></div>
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
			<p>Are you a already member ? <a href="login.php">Click to Login</a> </p>

			<div class="soc-login">

				 


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

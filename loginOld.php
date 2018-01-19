<?php
error_reporting(0);
ini_set('max_execution_time', 300);
ini_set('display_errors', 0); 
define("_WOJO", true);
require_once("dashboard/init.php");
 if (App::Auth()->is_User())
      Url::redirect('Account.php');

  if (isset($_POST['login'])):
      if (App::Auth()->login($_POST['username'], $_POST['password'])):
	  Url::redirect('Account.php');
      endif;
  endif;
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

<h4>Login</h4>
			<div class="actionButton"></div>

<div class="wojo-grid">
<div id="login-wrap">
 <div id="message-box"> </div>
  <div class="clearfix" id="tabs"> </div>
  <div class="login-form">
     <form method="post" id="login_form" name="login_form">
      <div class="wojo form">
       <div class="wojo fields">
       <div class="row">
       <div class="input-field col m6 s12">
          <div class="field">
           <input name="username" placeholder="Email" type="text">

          </div>
          </div>
          <div class="input-field col m6 s12">
          <div class="field">
            <input name="password" placeholder="Password" type="password">

          </div>
          </div>
          </div>
        </div>
       
    


        
       
                        
        <div class="content-center">
          <div class="horizontal-padding" style="margin-top:15px;">
          <button name="login" type="submit" class="waves-effect waves-light btn-large full-btn waves-input-wrapper">Login</button>


       
<div style="padding:25px; list-style-type:none !important;"><?php print Message::$showMsg;?> </div>
           
            
          </div>
        </div>
      </div>
    </form>
  </div>
  
  <div class="wojo form hide-all" id="passform" style="display:none;">
      <form method="post" id="pass_form" name="wojo_form">
        <div class="wojo fields">
       <div class="row">
       <div class="input-field col m6 s12">
          <div class="field">
           <input type="text" placeholder="Email Address" name="pemail">


          </div>
          </div>
          <div class="input-field col m6 s12">
          <div class="field">
           <input type="text" placeholder="First Name" name="fname">


          </div>
          </div>
          </div>
        </div>
        <div class="content-center">
          <div class="horizontal-padding" style="margin-top:15px; ">
            <button class="waves-effect waves-light btn-large full-btn waves-input-wrapper" name="passreset" type="button">Reset Password</button>
          </div>
          <div class="wojo space divider"></div>
          <a class="inverted" id="backto">Back to login</a> </div>
      </form>
    </div>
    
    
</div><!-- Footer -->
</div>
<div class="wojo space divider"></div>
          <a class="inverted" id="passreset">Forgotten Password?</a> 

			<p>Not a member ? <a href="register.php">Click to Register</a> </p>
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

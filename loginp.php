<?php
error_reporting(0);
ini_set('max_execution_time', 300);
ini_set('display_errors', 0); 
define("_WOJO", true);
require_once("dashboard/init.php");
 if (App::Auth()->is_User())
     App::Auth()->logout();

  if (isset($_POST['login'])):
      if (App::Auth()->login($_POST['username'], $_POST['password'])):
	  Url::redirect('Account.php');
      endif;
  endif;
?>

<!DOCTYPE html>

<html lang="en">



<head>

	<title>SpeedyHunt.com - Login</title>

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

					<h1>Login</h1>

					<ol class="breadcrumb">

						<li><a href="/">Home</a> </li>

						<li style="color:#fff;">Login </li>

			

					</ol>

				</div>

			</div>

			<div class="row">

				<div class="dir-alp-con">

                <div>
                <div id="mobilemenu" style="display:none;">
<ul class="collapsible" data-collapsible="accordion" style="margin-top:0px !important;">
							<li>
								<div class="collapsible-header"><i class="material-icons">search</i>Login</div>
								<div class="collapsible-body"><ul>

                              

                              	 <li>Login </li>

									

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

                              		<li class="tab col"><a class="active" href="#people">Login</a> </li>

									

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

                   

                    <div class="pg-elem-inn ele-btn" style="margin:0px !important;">

                    <div class="col-md-9 dir-alp-con-right" id="people">

						<div class="dir-alp-con-right-1">

							<div class="row">



		

<div class="tz-regi-form" style="margin-top:0px !important; margin-bottom:0px !important; width:98% !important;">

<h4 style="font-size:22px !important;">Login</h4>
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

	

	

	




							</div>

							

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
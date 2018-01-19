<?php
error_reporting(0);
ini_set('max_execution_time', 300);
ini_set('display_errors', 0); 
define("_WOJO", true);
require_once("../dashboard/init.php");
error_reporting(0);
$first = htmlentities(clean(($_GET['fn'])));
$last = htmlentities(clean(($_GET['ln'])));
$st = htmlentities(clean(($_GET['state'])));
function clean($string) {
while (strpos(substr($string, -1), ' ') !== false) 
$string = substr($string, 0, -1);
$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
// this function is to remove ending spaces
}

?>

<!DOCTYPE html>

<html lang="en">



<head>

	    <title><?php echo 'Search results for '.$first.' '.$last; ?></title>

	<!-- META TAGS -->

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- FAV ICON(BROWSER TAB ICON) -->

	<link rel="shortcut icon" href="../images/fav.ico" type="image/x-icon">

	<!-- GOOGLE FONT -->

	<link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:500,700" rel="stylesheet">

	<!-- FONTAWESOME ICONS -->

	<link rel="stylesheet" href="../css/font-awesome.min.css">

	<!-- ALL CSS FILES -->

	<link href="../css/materialize.css" rel="stylesheet">

	<link href="../css/style.css" rel="stylesheet">
<link href="../css/styleProfile.css" rel="stylesheet">
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />

	<!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->

	<link href="../css/responsive.css" rel="stylesheet">

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


        .async-hide {

            opacity: 0 !important

        }


</style>


    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <link type="text/css" href="./css/main.css" rel="stylesheet">


    <script type="text/javascript" src="https://speedyhunt.com/dashboard/assets/jquery.js"></script>
<script type="text/javascript" src="https://speedyhunt.com/dashboard/assets/global.js"></script>
<link href="../css/master_main.css" rel="stylesheet" type="text/css" />


</head>

<?php $nexturl = '../arrest.php?fn='.$first.'&ln='.$last.'&state='.$st.'' ?>
<body class="hide" data-next-page="<?php echo $nexturl; ?>">





	<!--TOP SEARCH SECTION-->

	<?php include('../headerInner.php'); ?>

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

						<li style="color:#fff;"><?php echo strtoupper($first) . ' ' . strtoupper($last); ?> </li>

						<li style="color:#fff;"><?php echo strtoupper($st); ?></li>

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

                              

                              	 <li><a class="active" href="#people">Searching..</a> </li>

									

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

                              		<li class="tab col"><a class="active" href="#people">Searching...</a> </li>

									

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

                   

                    <div class="pg-elem-inn ele-btn" style="margin:0px !important; height:100%;">

                    <div class="col-md-9 dir-alp-con-right" id="people" style="height:100%;">

						<div class="dir-alp-con-right-1" style="height:100%;">

							<div class="row" style="height:100%;">
<div class="bar" style="height:100%; min-height:750px;">

            <span class="progress-text-inner">20%</span>

        </div>
							<div class="row hidden-xs hidden-xxs hidden-sm">

                <div id="loadingdesktop_hype_container" style="margin:auto;position:relative;width:1000px;height:400px;overflow:hidden;" aria-live="polite">

                    <script type="text/javascript" charset="utf-8" src="./js/loading-desktop.hyperesources/loadingdesktop_hype_generated_script.js"></script>

                </div>

            </div>
            
            <div class="row visible-xs visible-sm hidden-xxs">

                <div id="loading600_hype_container" style="margin:auto;position:relative;width:600px;height:300px;overflow:hidden;" aria-live="polite">

                    <script type="text/javascript" charset="utf-8" src="./js/loading-600.hyperesources/loading600_hype_generated_script.js"></script>

                </div>

            </div>
            
            <div class="row visible-xxs hidden-xs">

                <div id="loading320_hype_container" style="margin:auto;position:relative;width:320px;height:300px;overflow:hidden;" aria-live="polite">

                    <script type="text/javascript" charset="utf-8" src="./js/loading-320.hyperesources/loading320_hype_generated_script.js"></script>

                </div>

            </div>
            
            <div class="row" id="copy">

                <div class="col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0">

                    <h1 id="header-message" class="text-center" data-fr-bind="query" style="padding:15px;">

                        Updating data on

                        <strong><?php echo ucfirst($first).' '.ucfirst($last); ?> </strong> 
<?php                        if (isset($st) && strlen($st) == 2) {

	echo '                   
                        in <strong>'.$st.'</strong>'; }?>

                    </h1>

                    <p class="text-center"> Important! SpeedyHunt searches real

                        <span data-bv-content>

                            <span data-bv-ref="default" style="font-weight:bold; color:#000;">public records</span>

                        <span data-bv-ref="criminalrecords">CRIMINAL RECORDS</span>

                        <span data-bv-ref="marriagerecords">MARRIAGE RECORDS</span>

                        <span data-bv-ref="divorcerecords">DIVORCE RECORDS</span>

                        <span data-bv-ref="trafficrecords">TRAFFIC TICKETS</span>

                        <span data-bv-ref="driverrecords">DRIVER RECORDS</span>

                        </span>. The information may be surprising. </p>

                </div>
<div class="progress-bar-footer">
<div class="row">
<div class="col-md-12 text-center">
<h5 class="time-remaining" style="color:#000;">
Less than <span class="time-remaining-count" style="font-weight:bold; color:#000;">60</span> seconds remaining. Checking billions of records. DO NOT HIT THE BACK BUTTON
</h5>
</div>
</div>                   
                            
                            

							</div>
            </div>
                            
                            
                            
                            
                            
                            
         

							

						</div>

					</div>

                            

					

                    

                    	

                    

                    

				</div>

			</div>

		</div>

	</section>
  <script src="./js/handlebars.min.js"></script>

    <script src="./js/base64.js"></script>

    <script src="./js/lodash.min.js"></script>

    <script src="./js//amplify.store.min.js"></script>

    <script src="./js/framerida.js"></script>

    <script src="./js/runner.js"></script>
<script type="text/javascript">

    (function() {

        if ($(window).width() < 600) {

            document.getElementsByClassName("")

        } else if (window.attachEvent) {

            window.attachEvent('onload', loadDeviceJs);

        }

    })();

</script>
	<!--MOBILE APP-->

	

	<!--FOOTER SECTION-->

	<?php include ('../footer.php'); ?>
	
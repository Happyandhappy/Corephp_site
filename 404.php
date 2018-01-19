<?php header("Status: 404 Not Found"); header('HTTP/1.0 404 Not Found'); http_response_code(404); ?>
<?php
error_reporting(0);
ini_set('max_execution_time', 300);
ini_set('display_errors', 0); 
define("_WOJO", true);
require_once("dashboard/init.php");
error_reporting(0);
?>
<!DOCTYPE html>

<html lang="en">



<head>

	<title>SpeedyHunt.com - 404</title>

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
</head>



<body>

	

	<!--TOP SEARCH SECTION-->

	<?php include('headerInner.php'); ?>

	<!--LISTING LEAD FORM-->

	<section class="list-page-enq">

		<div class="container">

			<div class="row">

				<div class="lpe-com-main">

					<div class="lpe-com lpe-left">

						<h4>Oops!</h4>

						<h2>404 Page</h2>

						<h5>Let us help..</h5> </div>

					<div class="lpe-com lpe-right">

						<form>

							<h3>What were you looking for?</h3>

							<p>Please tell us what you are looking for and we can see if we can help.</p>

							<div class="row">

								<div class="input-field col s12">

									<input id="name" type="text" class="validate" required>

									<label for="gfc_name">Name</label>

								</div>

							</div>

							<div class="row">

								<div class="input-field col s12">

									<input id="mobile" type="number" class="validate">

									<label for="gfc_mob">Mobile</label>

								</div>

							</div>

							<div class="row">

								<div class="input-field col s12">

									<input id="email" type="email" class="validate">

									<label for="gfc_mail">Email</label>

								</div>

							</div>

							<div class="row">

								<div class="input-field col s12">

									<textarea id="comments" class="validate"></textarea>

									<label for="gfc_msg">Message</label>

								</div>

							</div>

							<div class="row">

								<div class="input-field col s12">

									<input type="submit" id="update" value="SUBMIT" class="waves-effect waves-light btn-large full-btn list-red-btn"> </div>

							</div>

						</form>

					</div>

				</div>

			</div>

		</div>

	</section>

	<!--END LISTING LEAD FORM-->

	

	<!--MOBILE APP-->

	

	<!--FOOTER SECTION-->

	<?php include 'footer.php'; ?>
				<script type="text/javascript">    
  $("#update").click(function(e) {
  e.preventDefault();
  var name = $("#name").val(); 
  var mobile = $("#mobile").val();
  var email = $("#email").val();

  var comments = $("#comments").val();
	 var query = '404';
   var type = '404'; 
  
  var dataString = 'name='+name+'&mobile='+mobile+'&email='+email+'&comments='+comments+'&query='+query+'&type='+type;
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
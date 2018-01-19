<?php
error_reporting(0);
ini_set('max_execution_time', 300);
ini_set('display_errors', 0); 
define("_WOJO", true);
require_once("dashboard/init.php");							
?>
<!DOCTYPE html>

<html lang="en">

<style>
.wojo.small.message {
	display:none !important;
}
#myID { display:block !important; }
</style>

<head>

	<title>SpeedyHunt.com - Contact Us</title>

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

</head>



<body>

	

	<!--TOP SEARCH SECTION-->

	<?php include 'headerInner.php'; ?>

	<section>

		<div class="con-page">

			<div class="con-page-ri">

				

				<div class="con-com">

					<div class="cpn-pag-form">

						<form>

							<h3>Support and Contact Enquiry</h3>

							<p>Please use this form below to contact us if you have any questions or enquiries.</p>

							<div>

								<div class="input-field col s12">

									<input id="name" type="text" class="validate" required>

									<label for="gfc_name">Name</label>

								</div>

							</div>

							<div>

								<div class="input-field col s12">

									<input id="mobile" type="number" class="validate">

									<label for="gfc_mob">Mobile</label>

								</div>

							</div>

							<div>

								<div class="input-field col s12">

									<input id="email" type="email" class="validate">

									<label for="gfc_mail">Email</label>

								</div>

							</div>

							<div>

								<div class="input-field col s12">

									<textarea id="comments" class="validate"></textarea>

									<label for="gfc_msg">Message</label>

								</div>

							</div>

							<div>

								<div class="input-field col s12">

									<input type="submit" id="update" value="SUBMIT" class="waves-effect waves-light btn-large full-btn list-red-btn"> </div>

							</div>

						</form>

					</div>

				</div>

				<!--<div class="con-com con-pag-map con-com-mar-bot-o">

					<h4 class="con-tit-top-o">Touch with us</h4>

					<p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A. Landmark : Next To Airport</p>

					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6290413.804893654!2d-93.99620524741552!3d39.66116578737809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880b2d386f6e2619%3A0x7f15825064115956!2sIllinois%2C+USA!5e0!3m2!1sen!2sin!4v1469954001005" allowfullscreen=""></iframe>

				</div>-->

			</div>

		</div>

	</section>

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
    url:'contact_data.php',
    success:function(data) {
      alert('Thank you for contacting us. We will get back to you ASAP.');
    }
  });
});
</script>
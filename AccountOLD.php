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

	<title>SpeedyHunt.com - Account</title>

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

	<!--DASHBOARD-->

	<section>

		<div class="tz">

			<!--LEFT SECTION-->

			<div class="tz-l">

				<div class="tz-l-1">

					<ul>

						<li><div class="content-center"><img src="<?php echo UPLOADURL;?>/avatars/<?php echo (App::Auth()->avatar) ? App::Auth()->avatar : "blank.png";?>" alt="" class="avatar"></div></li>

						

						<li style="width:100%;"><span>1</span> Month Membership</li>

					</ul>

				</div>

				<div class="tz-l-2">

					<ul>

						<li>

							<a href="Account.php"><i class="fa fa-user"></i> Profile</a>

						</li>

						<!--<li>

							<a href="memberships.php"><i class="fa fa-clock-o"></i> Memberships</a>

						</li>

						<li>

							<a href="invoice.php"><i class="fa fa-usd"></i> Invoices</a>

						</li>-->

					

					</ul>

				</div>

			</div>

			<!--CENTER SECTION-->

			<div class="tz-2">

				<div class="tz-2-com tz-2-main">

					<h4>Manage My Profile</h4>

					<div class="db-list-com tz-db-table">

						<div class="ds-boar-title">

							<h2>Profile</h2>

							

						</div>
  <form method="post" id="wojo_form" name="wojo_form">
						<table class="responsive-table bordered">

							<tbody>

								<tr>

									<td>First Name</td>

									<td>:</td>

									<td><?php echo App::Auth()->fname; ?></td>
									

								</tr>

								<tr>

									<td>Last Name</td>

									<td>:</td>

									<td><?php echo App::Auth()->lname; ?></td>

								</tr>

								<tr>

									<td>Email</td>

									<td>:</td>

									<td><?php echo App::Auth()->email; ?></td>

								</tr>

								<tr>

									<td>New Password</td>

									<td>:</td>

									<td> <input type="password" name="password">          </td>

								</tr>

								

							</tbody>

						</table>

						<div class="db-mak-pay-bot">

							
                             <button type="button" data-action="profile" name="dosubmit" class="waves-effect waves-light btn-large full-btn waves-input-wrapper">Update</button>
                          </form>
                          </div>

					</div>

				</div>

			</div>

			<!--RIGHT SECTION-->

			<div class="tz-3">

				<h4>Last Activity</h4>

				<ul>

					<li>

						Coming soon

					</li>

					

					

				</ul>

			</div>

		</div>

	</section>

	<!--END DASHBOARD-->

	<!--MOBILE APP-->

	

	<!--FOOTER SECTION-->

<?php include ('footerplain.php'); ?>
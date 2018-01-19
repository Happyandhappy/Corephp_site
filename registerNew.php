<?php
define("_WOJO", true);
require_once("dashboard/init.php");
if (App::Auth()->is_User())
Url::redirect(SITEURL . '/dashboard/');
if (isset($_POST['login'])):
if (App::Auth()->login($_POST['username'], $_POST['password'])):
Url::redirect(SITEURL . '/dashboard/');
endif;
endif;
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Welcome to SpeedyHunt.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes">
<script type="text/javascript" src="http://speedyhunt.com/dashboard/assets/jquery.js"></script>
<script type="text/javascript" src="http://speedyhunt.com/dashboard/assets/global.js"></script>
<link href="http://speedyhunt.com/dashboard/view/front/cache/master_main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="menu">
<div class="actionButton"></div>
	    <a href="http://speedyhunt.com/dashboard/" class="sub login" data-content="Sign In" data-position="left center"></a>  
    <a href="http://speedyhunt.com/dashboard/register/" class="sub register" data-content="Signup" data-position="left center"></a>  
        <a href="http://speedyhunt.com/dashboard/packages/" class="sub packages" data-content="Memberships" data-position="left center"></a>  
    <a href="http://speedyhunt.com/dashboard/contact/" class="sub contact" data-content="Contact" data-position="left center"></a> 
        <a class="sub news" data-content="News" data-position="left center"></a>
</div>
<div class="wojo-grid">
<div id="login-wrap">
  <div class="clearfix" id="tabs"> <a class="active">Signup</a></div>
  <div class="login-form">
    <form method="post" id="wojo_form" name="wojo_form">
      <div class="wojo form">
        <div class="wojo block fields">
          <div class="field">
            <input type="text" placeholder="Email Address" name="email">
          </div>
          <div class="field">
            <input type="password" placeholder="Password" name="password">
          </div>
        </div>
        <div class="wojo fields">
          <div class="field">
            <input type="text" placeholder="First Name" name="fname">
          </div>
          <div class="field">
            <input type="text" placeholder="Last Name" name="lname">
          </div>
        </div>
                        <div class="wojo block fields">
          <div class="field">
            <div class="wojo right labeled input">
              <input name="captcha" placeholder="Captcha" type="text">
              <div class="wojo basic label"><img src="http://speedyhunt.com/dashboard/captcha.php" alt="" style="height:25px"></div>
            </div>
          </div>
        </div>
        <div class="content-center">
          <div class="horizontal-padding">
            <button class="wojo fluid rounded big secondary button" data-action="register" name="dosubmit" type="button"><span class="wojo bold small caps text">Signup</span></button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div><!-- Footer -->
</div>
  <footer> Copyright &copy;2017 SpeedyHunt.com</footer>
<script type="text/javascript" src="http://speedyhunt.com/dashboard/view/front/js/master.js"></script> 
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
</body>
</html>


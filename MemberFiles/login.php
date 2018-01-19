<?php
  define("_WOJO", true);
  require_once("dashboard/init.php");

  if (App::Auth()->is_User())
      Url::redirect('/report.php/testreport/'); // if logged in

  if (isset($_POST['login'])):
      if (App::Auth()->login($_POST['username'], $_POST['password'])):
	  Url::redirect(SITEURL . '/dashboard/');
      endif;
  endif;


?>
<form method="post" id="login_form" name="login_form">
  <div class="field">
    <input name="username" placeholder="Username" type="text">
  </div>
  <div class="field">
    <input name="password" placeholder="Password" type="password">
  </div>
  <div class="clearfix">
    <button name="login" type="submit" class="wojo button">Login</button>
  </div>
</form>
<?php print Message::$showMsg;?>
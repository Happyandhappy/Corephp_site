<?php
  define("_WOJO", true);
  require_once("dashboard/init.php");
  
  if (!Membership::is_valid([3,4]))
      Url::redirect(SITEURL);
?>
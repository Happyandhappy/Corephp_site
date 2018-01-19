<?php


  define("_WOJO", true);
  require_once("dashboard/init.php");
  
  if (!App::Auth()->is_User())
     Url::redirect('/login.php');



echo 'test';

?>
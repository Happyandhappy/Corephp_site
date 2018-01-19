<?php

  /**

   * Index

   *

   * @package Wojo Framework

   * @author wojoscripts.com

   * @copyright 2016

   * @version $Id: index.php, v1.00 2016-06-05 10:12:05 gewa Exp $

   */

  define("_WOJO", true);



  include ('dashboard/init.php');
  $router = new Router();

  $tpl = App::View(BASEPATH . 'view/');
    $router->match('GET|POST', '/register', 'FrontController@Register');

  /**

   * Register

   *

   * @package Wojo Framework

   * @author wojoscripts.com

   * @copyright 2016

   * @version $Id: register.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $

   */

 // if (!defined("_WOJO"))

      //die('Direct access to this location is not allowed.');

?>

<div id="login-wrap">

  <div class="clearfix" id="tabs"><a href="<?php echo Url::url('');?>" class="static"> <?php echo Lang::$word->M_SUB16;?></a> <a class="active"><?php echo Lang::$word->M_SUB17;?></a></div>

  <div class="login-form">

    <form method="post" id="wojo_form" name="wojo_form">

      <div class="wojo form">

        <div class="wojo block fields">

          <div class="field">

            <input type="text" placeholder="<?php echo Lang::$word->M_EMAIL;?>" name="email">

          </div>

          <div class="field">

            <input type="password" placeholder="<?php echo Lang::$word->M_PASSWORD;?>" name="password">

          </div>

        </div>

        <div class="wojo fields">

          <div class="field">

            <input type="text" placeholder="<?php echo Lang::$word->M_FNAME;?>" name="fname">

          </div>

          <div class="field">

            <input type="text" placeholder="<?php echo Lang::$word->M_LNAME;?>" name="lname">

          </div>

        </div>

        

        <div class="wojo block fields">

          <div class="field">

            <div class="wojo right labeled input">

              <input name="captcha" placeholder="<?php echo Lang::$word->CAPTCHA;?>" type="text">

              <div class="wojo basic label"><img src="<?php echo SITEURL;?>/captcha.php" alt="" style="height:25px"></div>

            </div>

          </div>

        </div>

        <div class="content-center">

          <div class="horizontal-padding">

            <button class="wojo fluid rounded big secondary button" data-action="register" name="dosubmit" type="button"><span class="wojo bold small caps text"><?php echo Lang::$word->M_SUB17;?></span></button>

          </div>

        </div>

      </div>

    </form>

  </div>

</div>
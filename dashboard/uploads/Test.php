<?php 
	/** 
	* Test
	* 
	* @package Membership Manager Pro
	* @author wojoscripts.com
	* @copyright 2017
	* @version Id: Test.php, v4.0 2017-09-13 20:22:11 gewa Exp $
	*/
 
	 define("_WOJO", true); 
	 require_once("init.php");
 
?> 
 
 <?php include(FRONTBASE . "/header.tpl.php");?> 
 
 
	 <?php if(Membership::is_valid([1,2,3])): ?>
 
	 <h1>User has valid membership, you can display your protected content here</h1>.
 
	 <?php else: ?>
 
	 <h1>User membership is't not valid. Show your custom error message here</h1>
 
	 <?php endif; ?>
 
 
 <?php include(FRONTBASE . "/footer.tpl.php");?> 
 
 

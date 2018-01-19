<?php
$type    = htmlspecialchars($_GET['t']);
$identifier    = htmlspecialchars($_GET['kad']);
require_once ('../config.php'); // loading databases
function base64url_encode($data) {
return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}
function base64url_decode($data) {
return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}
//class verifyPage {
//	public $uniqueidentifierperson;
//	public $mysqli;
//function DetermineDB() {
//	global $uniqueidentifierperson;
//	$uniqueidentifierperson = $_GET['unique'];
//	$uniqueidentifierperson = substr($uniqueidentifierperson, strrpos($uniqueidentifierperson, '_') + 1);
//	$uniqueidentifierperson =  base64url_decode($uniqueidentifierperson);
//	$q = $uniqueidentifierperson;
//	
//	$dbIntel = DatabaseNewData::getInstanceNewData(); // DiscoverThem
//	$mysqlidbIntel = $dbIntel->getConnectionNewData();  // Initial DB
//	$db = DatabaseMain::getInstanceMain(); // Quanki DB
//	$mysqli = $db->getConnectionMain();  // Quanki DB
//	$query = "SELECT removed FROM `quanki_removals` WHERE `profileId` = '{$q}' LIMIT 1";
//	$removed = $mysqli->query($query);	
//	while ($row = mysqli_fetch_array($removed)) {
//	$removedProfile = $row['removed']; }
//	//if($removedProfile == 1) {	header('Location: 404.php'); 
//	//exit; }
//	
//	
//	$count = 0;
//	
//	$query = "SELECT profileId FROM `profile` WHERE `profileId` = '{$q}' LIMIT 1";
//	$result = $mysqlidbIntel->query($query); // DiscoverThem DB
//	$count =  $result->num_rows;
//	if ($count > 0) {	
//	return 'discoverthem_db';
//	}
//	if ($count == 0) {	
//	$db = DatabaseMain::getInstanceMain(); // Quanki DB
//	$mysqli = $db->getConnectionMain();  // Quanki DB
//	$query = "SELECT profileId FROM `profile` WHERE `profileId` = '{$q}' LIMIT 1";
//	$result = $mysqli->query($query);
//	$count =  $result->num_rows;	
//	if ($count > 0) {	
//	return 'quanki_db';
//	}
//	}
//	
//	if ($count == 0) {	
//	$dbOldData = DatabaseOldData::getInstanceOldData(); // Hostgator
//	$db2 = $dbOldData->getConnectionOldData();  // Hostgator
//	
//	$query = "SELECT profileId FROM `profile` WHERE `profileId` = '{$q}' LIMIT 1";
//	$result = $db2->query($query);
//	$count =  $result->num_rows;
//	if ($count > 0) {	
//	return 'hostgator_db';
//	}	
//	}
//	if ($count == 0) {	
//	//header('Location: 404.php');
//	exit; }
//}
//function Security() {
//	global $uniqueidentifierperson;
//	$uniqueidentifierperson = $_GET['unique'];
//	$uniqueidentifierperson = substr($uniqueidentifierperson, strrpos($uniqueidentifierperson, '_') + 1);
//	$uniqueidentifierperson =  base64url_decode($uniqueidentifierperson);
//	if ( count($_GET) <> 1 ) { 	header('Location: 404.php');
//	exit; }
//	$this->uniqueidentifierperson = $uniqueidentifierperson;
//}
//}
//
//$verifyPage = new verifyPage;
//$verifyPage->Security();
//$db_type = $verifyPage->DetermineDB();
 		
	//	if ($db_type == 'discoverthem_db') {
//		$dbIntel = DatabaseNewData::getInstanceNewData(); // DiscoverThem
//		$mysqliNewData = $dbIntel->getConnectionNewData();  // Initial DB
//		}
//		if ($db_type == 'quanki_db') {
//		$db = DatabaseMain::getInstanceMain(); // Quanki DB
//		$mysqliNewData = $db->getConnectionMain();  // Quanki DB
//		$db_InUse = 'hostgator';
//		}
//		if ($db_type == 'hostgator_db') {
//		$dbOldData = DatabaseOldData::getInstanceOldData(); // Hostgator
//		$mysqliNewData = $dbOldData->getConnectionOldData();  // Hostgator
//		}
		

//$loadData->intel();
//$loadData->basicData();

//$query = "SELECT profileId, firstName, middleName, lastName, gender, dateOfBirth FROM `profile` WHERE `profileId` = '{$uniqueidentifierperson}' LIMIT 1  ";
//	$profile = $mysqliNewData->query($query);	
//	while ($row = mysqli_fetch_array($profile)) {
//	$firstName   = $row['firstName'];
//	$middleName  = $row['middleName'];
//	$lastName    = $row['lastName'];
//	$gender      = $row['gender'];
//	$dateOfBirth = $row['dateOfBirth'];
//	if ($gender == 'M') { 	$gender = 'Male'; }
//	if ($gender == 'F') { 	$gender = 'Female'; }
//	$fullname = $firstName.' '.$middleName.' '.$lastName;
//	} // end of while
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <title>Time TravelPremium WordPress Theme
    </title>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:image" content="">
    <meta property="og:title" content="Time Travel"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="https://cray.bg/themes/time-travel"/>
    <meta name="twitter:url" content="https://cray.bg/themes/time-travel">
    <meta name="og:description" content="Time Travel - Premium WordPress Theme"/>

    <meta name="twitter:site" content="@flasherland">

    <!--[if lte IE 8]>
    <style>
        .ss-container, .header-white, .hidden, #nav, .right-bottom-nav, .ss-row-clear {
            display: none;
        }

        .support-note .note-ie {
            display: block;
        }
    </style>
    <![endif]-->


    <!-- Force to reload page on back button for firefox
    ================================================== -->
    <script>
        //	window.name = "reloader" ;
        //	window.onbeforeunload = function() {
        //   		window.name = "reloader";
        //	}
        //	window.onunload = function(){};
    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel='archives' title='June 2015' href='https://cray.bg/themes/time-travel/2015/06/'/>
    <link rel='archives' title='January 2014' href='https://cray.bg/themes/time-travel/2014/01/'/>
    <link rel='archives' title='December 2013' href='https://cray.bg/themes/time-travel/2013/12/'/>
    <link rel='archives' title='November 2013' href='https://cray.bg/themes/time-travel/2013/11/'/>
    <link rel='archives' title='July 2013' href='https://cray.bg/themes/time-travel/2013/07/'/>
    <link rel="alternate" type="application/rss+xml" title="Time Travel &raquo; Feed"
          href="https://cray.bg/themes/time-travel/feed/"/>
    <link rel="alternate" type="application/rss+xml" title="Time Travel &raquo; Comments Feed"
          href="https://cray.bg/themes/time-travel/comments/feed/"/>
    <script type="text/javascript">
        //			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/72x72\/","ext":".png","source":{"concatemoji":"https:\/\/cray.bg\/themes\/time-travel\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.2.16"}};
        //			!function(a,b,c){function d(a){var c=b.createElement("canvas"),d=c.getContext&&c.getContext("2d");return d&&d.fillText?(d.textBaseline="top",d.font="600 32px Arial","flag"===a?(d.fillText(String.fromCharCode(55356,56812,55356,56807),0,0),c.toDataURL().length>3e3):(d.fillText(String.fromCharCode(55357,56835),0,0),0!==d.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
    </script>

    <link rel='stylesheet' id='contact-form-7-css'
          href='https://cray.bg/themes/time-travel/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=4.2'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='ab_tf_fontawesome-css'
          href='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/css/font-awesome/css/font-awesome.css?ver=4.2.16'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='ab_tf_mainstyle-css'
          href='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/style.css?ver=4.2.16' type='text/css'
          media='all'/>
    <link rel='stylesheet' id='ab_tf_prettyPhoto-css'
          href='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/css/prettyPhoto.css?ver=4.2.16'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='ab_tf_flexslider-css'
          href='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/css/flexslider.css?ver=4.2.16'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='ab_tf_customdropdowncss-css'
          href='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/functions/adminanddropdown.css?ver=4.2.16'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='ab_tf_vegas-css'
          href='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/css/jquery.vegas.css?ver=4.2.16'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='ab_tf_opentipcss-css'
          href='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/css/opentip.css?ver=4.2.16'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='ab_tf_responsive-css'
          href='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/css/responsive.css?ver=4.2.16'
          type='text/css' media='all'/>
    <!--[if IE 9]>
    <link rel='stylesheet' id='ab_tf_timetravel-ie9-css'
          href='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/css/styleIE.css?ver=1.6' type='text/css'
          media='all'/>
    <![endif]-->
    <link rel='stylesheet' id='opc-css'
          href='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/css/settings.css?ver=4.2.16'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='options_typography_Open+Sans-css'
          href='https://fonts.googleapis.com/css?family=Open+Sans' type='text/css' media='all'/>
    <link rel='stylesheet' id='timetravel_opensans-css'
          href='https://fonts.googleapis.com/css?family=Open+Sans&#038;ver=4.2.16' type='text/css' media='all'/>
    <link rel='stylesheet' id='js_composer_front-css'
          href='https://cray.bg/themes/time-travel/wp-content/plugins/js_composer_timetravel/assets/css/js_composer.css?ver=4.3.4'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='js_composer_custom_css-css'
          href='https://cray.bg/themes/time-travel/wp-content/uploads/js_composer/custom.css?ver=4.3.4' type='text/css'
          media='screen'/>
    <script type='text/javascript'
            src='https://cray.bg/themes/time-travel/wp-includes/js/jquery/jquery.js?ver=1.11.2'></script>
    <script type='text/javascript'
            src='https://cray.bg/themes/time-travel/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1'></script>
    <link rel="EditURI" type="application/rsd+xml" title="RSD"
          href="https://cray.bg/themes/time-travel/xmlrpc.php?rsd"/>
    <link rel="wlwmanifest" type="application/wlwmanifest+xml"
          href="https://cray.bg/themes/time-travel/wp-includes/wlwmanifest.xml"/>
    <meta name="generator" content="WordPress 4.2.16"/>
    <meta name="generator" content="Powered by Visual Composer - drag and drop page builder for WordPress."/>
    <!--[if IE 8]>
    <link rel="stylesheet" type="text/css"
          href="https://cray.bg/themes/time-travel/wp-content/plugins/js_composer_timetravel/assets/css/vc-ie8.css"
          media="screen"><![endif]--></head>

<link rel="stylesheet" href="styles.css">

<body class="home blog classictilt wpb-js-composer js-comp-ver-4.3.4 vc_responsive">

<div id="progress" class="progress">
    <div id="os_value" class="os_value"></div>
    <div class="os-load-progress">Loading.. <span id="progress_value">0%</span></div>
</div>

<div class="time_progress">
    <div id="time_value" class="time_value"></div>
</div>

<header>
    <div class="hidden welcome-b"><span class="content-title">This site contains REAL police records, background reports, photos, court documents, address information, phone numbers, and much more. 

Learning the truth about the history of your family and friends can be shocking, so please be cautious when using this tool.

SpeedyHunt does not provide consumer reports and is not a consumer reporting agency. We provide a lot of sensitive information that can be used to satisfy your curiosity, protect your family, and find the truth about the people in your life. You may not use our service or the information it provides to make decisions about consumer credit, employers, insurance, tenant screening, or any other purposes that would require FCRA compliance.</span>
        <!--<span id="input-method">You can navigate trough the site by:</span><br/><br/><br/>-->
        <button class="osGo">I UNDERSTAND!</button>
        <!--<div class="mouseico"></div>-->
    </div>

</header>
<div class="addbg"></div>
<div id="fb-root"></div>
<div id="loading">
    <div class="inifiniteLoaderP animated ">
        <div class="loading">
        </div>
    </div>
</div>
<script>

</script>
<header>
    <div class="support-note"><!-- let's check browser support with modernizr -->
        <!--span class="no-cssanimations">CSS animations are not supported in your browser</span-->
        <!--span class="no-csstransforms">CSS transforms are not supported in your browser</span-->
        <!--span class="no-csstransforms3d">CSS 3D transforms are not supported in your browser</span-->
        <!--span class="no-csstransitions">CSS transitions are not supported in your browser</span-->
                <span class="note-ie"><br>We are apologize for the inconvenience but you need to download <br> more modern browser in order to be able to browse our page<br/>
              
                    <p class="support-note-ico ">
                        <a href="http://support.apple.com/kb/DL1531?viewlocale=en_US&amp;locale=en_US"><img
                                src="https://cray.bg/themes/time-travel/wp-content/themes/timetravel/images/support/safari.png"
                                alt="Download Safari" width="50" height="50"/> <br>Download Safari
                        </a>
                        <a href="https://www.google.com/intl/en/chrome/browser/"><img
                                src="https://cray.bg/themes/time-travel/wp-content/themes/timetravel/images/support/chrome.png"
                                alt="Download Chrome" width="50" height="50"/> <br>Download Chrome
                        </a>
                        <a href="http://www.mozilla.org/en-US/firefox/new/"><img
                                src="https://cray.bg/themes/time-travel/wp-content/themes/timetravel/images/support/firefox.png"
                                alt="Download Firefox" width="50" height="50"/> <br>Download Firefox
                        </a>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/ie-10-worldwide-languages"><img
                                src="https://cray.bg/themes/time-travel/wp-content/themes/timetravel/images/support/ie.png"
                                alt="Download IE 10+" width="50" height="50"/> <br>Download IE 10+
                        </a>
                    </p>
                  </span>
    </div>
</header>
<div class="header-top-p">
    <div id="ss-container" class="ss-container    ">
        <div id="ytbgvideo"></div>

        <script src="script.js"></script>

        <div id="main"
             class="post-2093 post type-post status-publish format-standard has-post-thumbnail sticky hentry category-art category-circle tag-art tag-brush tag-digital tag-fun"
             class="layer" data-depth="0.5" style="position:absolute;">
            <div class="timelinepath"></div>
            <article id="articlehold" class="fwdirection">

                <section class="amethyst">
                    <div class=" tt-cn-style  center-content  is-circle  gcnopadding">
                        <div class="circle-img go-anim amethyst">
                            <div class="c-size-big">
                                <div class="circle-img-c ">
                                    <ul class="ch-grid">
                                        <li>
                                            <div class="ch-item"
                                                 style="background-image: url(https://cray.bg/themes/time-travel/wp-content/uploads/2014/01/photodune-6345960-funny-clown-xs2-380x380.jpg);">

                                                <div class="ch-info-wrap">

                                                    <div class="ch-info">

                                                        <div class="ch-info-front"
                                                             style="background-image: url(https://cray.bg/themes/time-travel/wp-content/uploads/2014/01/photodune-6345960-funny-clown-xs2-380x380.jpg);"></div>
                                                        <div class="ch-info-back"><h3 class="content-title"><a
                                                                class="read-more-init" id="2093"
                                                                href="https://cray.bg/themes/time-travel/sircle-center-right-sidebar-demo/">Circle
                                                            / center / right sidebar</a></h3>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                                sed do eiusmod tempor incididunt ut labore et dolore
                                                                magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                                exercitation ullamco laboris nisi ut aliquip ex ea
                                                                commodo con... <a
                                                                        href="https://cray.bg/themes/time-travel/sircle-center-right-sidebar-demo/"
                                                                        class="read-more-init"><strong>Read
                                                                    more</strong> <i class="icon-long-arrow-right"></i>
                                                                </a>
                                                            <div class="circle-info">																					<span
                                                                    class="empty-left time-holder "> <a
                                                                    class="read-more-init voice-morefromthis"
                                                                    href="https://cray.bg/themes/time-travel/category/art/"><i
                                                                    class="icon-tag icon-large"></i> Art</a>
																					</span> 
																																										<span class="empty-left user-holder"> <a
                                                                                                                                                                                href="https://cray.bg/themes/time-travel/sircle-center-right-sidebar-demo/#comments"
                                                                                                                                                                                class="read-more-init voice-readcomments"><i
                                                                                                                                                                                class="icon-comments icon-large"></i> 4</a>
																					</span>

                                                                <span class="empty-left comm-holder"> <a href="#"
                                                                                                         class="dot-irecommendthis"
                                                                                                         id="dot-irecommendthis-2093"
                                                                                                         title="Recommend this"><span
                                                                        class="dot-irecommendthis-count">296</span> <span
                                                                        class="dot-irecommendthis-suffix"></span></a></span>
                                                            </div>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="timedate">
                                <div class="tt-day">05</div>
                                <div class="tt-month">Jun</div>
                                <div class="tt-year">2015</div>
                                <div class="share-box">
                                    <a class="share-btna share-two"
                                       rel="http://www.facebook.com/sharer/sharer.php?u=https://cray.bg/themes/time-travel/sircle-center-right-sidebar-demo/"
                                       href="javascript:window.open('http://www.facebook.com/sharer/sharer.php?u=https://cray.bg/themes/time-travel/sircle-center-right-sidebar-demo/', '_blank', 'width=600,height=400');void(0);"><i
                                            class="icon-facebook"></i></a>
                                    <a class="share-btna share-three"
                                       rel="https://twitter.com/share?url=https://cray.bg/themes/time-travel/sircle-center-right-sidebar-demo/&amp;text=Circle / center / right sidebar"
                                       href="javascript:window.open('https://twitter.com/share?url=https://cray.bg/themes/time-travel/sircle-center-right-sidebar-demo/&amp;text=Circle / center / right sidebar', '_blank', 'width=550,height=420');void(0);"><i
                                            class="icon-twitter"></i></a>
                                </div>
                            </div>
                            <div class="timedateafter"></div>
                            <div class="tt-arrow-side iswhite"></div>
                            <div class="tt-arrow-dot blink"></div>
                            <div class="reslines"></div>
                        </div>
                    </div>


                </section>


                <section class="peterriver">
                    <div class=" tt-cn-style  left-content is-circle  gcnopadding">
                        <div class="circle-img go-anim peterriver">
                            <div class="c-size-big">
                                <div class="circle-img-c ">
                                    <ul class="ch-grid">
                                        <li>
                                            <div class="ch-item"
                                                 style="background-image: url(https://cray.bg/themes/time-travel/wp-content/uploads/2013/07/photodune-5447467-blonde-in-blue-xs1-380x380.jpg);">

                                                <div class="ch-info-wrap">

                                                    <div class="ch-info">

                                                        <div class="ch-info-front"
                                                             style="background-image: url(https://cray.bg/themes/time-travel/wp-content/uploads/2013/07/photodune-5447467-blonde-in-blue-xs1-380x380.jpg);"></div>
                                                        <div class="ch-info-back"><h3 class="content-title"><a
                                                                class="read-more-init" id="4"
                                                                href="https://cray.bg/themes/time-travel/circle-left-left-sidebar/">Circle
                                                            / left / left sidebar</a></h3>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                                sed do eiusmod tempor incididunt ut labore et dolore
                                                                magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                                exercitation ullamco laboris nisi ut aliquip ex ea
                                                                commodo con... <a
                                                                        href="https://cray.bg/themes/time-travel/circle-left-left-sidebar/"
                                                                        class="read-more-init"><strong>Read
                                                                    more</strong> <i class="icon-long-arrow-right"></i>
                                                                </a>
                                                            <div class="circle-info">																					<span
                                                                    class="empty-left time-holder "> <a
                                                                    class="read-more-init voice-morefromthis"
                                                                    href="https://cray.bg/themes/time-travel/category/art/"><i
                                                                    class="icon-tag icon-large"></i> Art</a>
																					</span> 
																																										<span class="empty-left user-holder"> <a
                                                                                                                                                                                href="https://cray.bg/themes/time-travel/circle-left-left-sidebar/#comments"
                                                                                                                                                                                class="read-more-init voice-readcomments"><i
                                                                                                                                                                                class="icon-comments icon-large"></i> 2</a>
																					</span>

                                                                <span class="empty-left comm-holder"> <a href="#"
                                                                                                         class="dot-irecommendthis"
                                                                                                         id="dot-irecommendthis-4"
                                                                                                         title="Recommend this"><span
                                                                        class="dot-irecommendthis-count">96</span> <span
                                                                        class="dot-irecommendthis-suffix"></span></a></span>
                                                            </div>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="timedate">
                                <div class="tt-day">03</div>
                                <div class="tt-month">Jun</div>
                                <div class="tt-year">2015</div>
                                <div class="share-box">
                                    <a class="share-btna share-two"
                                       rel="http://www.facebook.com/sharer/sharer.php?u=https://cray.bg/themes/time-travel/circle-left-left-sidebar/"
                                       href="javascript:window.open('http://www.facebook.com/sharer/sharer.php?u=https://cray.bg/themes/time-travel/circle-left-left-sidebar/', '_blank', 'width=600,height=400');void(0);"><i
                                            class="icon-facebook"></i></a>
                                    <a class="share-btna share-three"
                                       rel="https://twitter.com/share?url=https://cray.bg/themes/time-travel/circle-left-left-sidebar/&amp;text=Circle / left / left sidebar"
                                       href="javascript:window.open('https://twitter.com/share?url=https://cray.bg/themes/time-travel/circle-left-left-sidebar/&amp;text=Circle / left / left sidebar', '_blank', 'width=550,height=420');void(0);"><i
                                            class="icon-twitter"></i></a>
                                </div>
                            </div>
                            <div class="timedateafter"></div>
                            <div class="tt-arrow-side iswhite"></div>
                            <div class="tt-arrow-dot blink"></div>
                            <div class="reslines"></div>
                        </div>
                    </div>


                </section>


                <section class="alizarin">
                    <div class=" tt-cn-style  right-content  is-circle  gcnopadding">
                        <div class="circle-img go-anim alizarin">
                            <div class="c-size-big">
                                <div class="circle-img-c ">
                                    <ul class="ch-grid">
                                        <li>
                                            <div class="ch-item"
                                                 style="background-image: url(https://cray.bg/themes/time-travel/wp-content/uploads/2013/07/photodune-6346179-good-singer-xs1-380x365.jpg);">

                                                <div class="ch-info-wrap">

                                                    <div class="ch-info">

                                                        <div class="ch-info-front"
                                                             style="background-image: url(https://cray.bg/themes/time-travel/wp-content/uploads/2013/07/photodune-6346179-good-singer-xs1-380x365.jpg);"></div>
                                                        <div class="ch-info-back"><h3 class="content-title"><a
                                                                class="read-more-init" id="66"
                                                                href="https://cray.bg/themes/time-travel/this-is-not-good/">Circle
                                                            / right / no sidebar</a></h3>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                                sed do eiusmod tempor incididunt ut labore et dolore
                                                                magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                                exercitation ullamco laboris nisi ut aliquip ex ea
                                                                commodo con... <a
                                                                        href="https://cray.bg/themes/time-travel/this-is-not-good/"
                                                                        class="read-more-init"><strong>Read
                                                                    more</strong> <i class="icon-long-arrow-right"></i>
                                                                </a>
                                                            <div class="circle-info">																					<span
                                                                    class="empty-left time-holder "> <a
                                                                    class="read-more-init voice-morefromthis"
                                                                    href="https://cray.bg/themes/time-travel/category/circle/"><i
                                                                    class="icon-tag icon-large"></i> Circle</a>
																					</span> 
																																										<span class="empty-left user-holder"> <a
                                                                                                                                                                                href="https://cray.bg/themes/time-travel/this-is-not-good/#comments"
                                                                                                                                                                                class="read-more-init voice-readcomments"><i
                                                                                                                                                                                class="icon-comments icon-large"></i> 2</a>
																					</span>

                                                                <span class="empty-left comm-holder"> <a href="#"
                                                                                                         class="dot-irecommendthis"
                                                                                                         id="dot-irecommendthis-66"
                                                                                                         title="Recommend this"><span
                                                                        class="dot-irecommendthis-count">88</span> <span
                                                                        class="dot-irecommendthis-suffix"></span></a></span>
                                                            </div>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="timedate">
                                <div class="tt-day">02</div>
                                <div class="tt-month">Jun</div>
                                <div class="tt-year">2015</div>
                                <div class="share-box">
                                    <a class="share-btna share-two"
                                       rel="http://www.facebook.com/sharer/sharer.php?u=https://cray.bg/themes/time-travel/this-is-not-good/"
                                       href="javascript:window.open('http://www.facebook.com/sharer/sharer.php?u=https://cray.bg/themes/time-travel/this-is-not-good/', '_blank', 'width=600,height=400');void(0);"><i
                                            class="icon-facebook"></i></a>
                                    <a class="share-btna share-three"
                                       rel="https://twitter.com/share?url=https://cray.bg/themes/time-travel/this-is-not-good/&amp;text=Circle / right / no sidebar"
                                       href="javascript:window.open('https://twitter.com/share?url=https://cray.bg/themes/time-travel/this-is-not-good/&amp;text=Circle / right / no sidebar', '_blank', 'width=550,height=420');void(0);"><i
                                            class="icon-twitter"></i></a>
                                </div>
                            </div>
                            <div class="timedateafter"></div>
                            <div class="tt-arrow-side iswhite"></div>
                            <div class="tt-arrow-dot blink"></div>
                            <div class="reslines"></div>
                        </div>
                    </div>


                </section>


                <section class="turquoise">
                    <div class=" tt-cn-style  left-content nonfull ">
                        <div class="turquoise ss-row go-anim  infoison">
                            <div class="ss-full">
                                <div class="hover-effect h-style"><a class="voice-bigimage"
                                                                     href="https://cray.bg/themes/time-travel/wp-content/uploads/2013/07/photodune-2243001-urban-style-xs1.jpg"
                                                                     alt="" rel="prettyPhotoImages[61]">
                                    <img src="https://cray.bg/themes/time-travel/wp-content/uploads/2013/07/photodune-2243001-urban-style-xs1.jpg"
                                         class="clean-img"/>
                                    <div class="mask"><i class="icon-search"></i>
                                        <span class="img-rollover"></span>
                                    </div>
                                </a></div>
                                <div class="container-border">
                                    <div class="gray-container ">
                                        <div class="containera "><h3 class="content-title"><a class="read-more-init"
                                                                                              id="61"
                                                                                              href="https://cray.bg/themes/time-travel/square-left/">Square
                                            / left</a></h3>
                                            <div class="hideifneed">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                                ut aliquip ex ea commodo consequat. Du...<a
                                                        href="https://cray.bg/themes/time-travel/square-left/"
                                                        class="read-more-init"> <strong>Read more</strong> <i
                                                        class="icon-long-arrow-right"></i> </a></div>
                                            <div class="icon-soc-container">
                                                <div class="share-btns">
                                                    <div class="empty-left time-holder "><a
                                                            class="read-more-init voice-morefromthis"
                                                            href="https://cray.bg/themes/time-travel/category/art/"><i
                                                            class="icon-tag"></i> Art</a>
                                                    </div>
                                                    <div class="empty-left user-holder"><a
                                                            href="https://cray.bg/themes/time-travel/square-left/#comments"
                                                            class="read-more-init voice-readcomments"><i
                                                            class="icon-comments"></i> 0</a>
                                                    </div>


                                                    <div class="empty-left comm-holder"><a href="#"
                                                                                           class="dot-irecommendthis"
                                                                                           id="dot-irecommendthis-61"
                                                                                           title="Recommend this"><span
                                                            class="dot-irecommendthis-count">185</span> <span
                                                            class="dot-irecommendthis-suffix"></span></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="timedate">
                                <div class="tt-day">12</div>
                                <div class="tt-month">Jan</div>
                                <div class="tt-year">2014</div>
                                <div class="share-box">
                                    <a class="share-btna share-two"
                                       rel="http://www.facebook.com/sharer/sharer.php?u=https://cray.bg/themes/time-travel/square-left/"
                                       href="javascript:window.open('http://www.facebook.com/sharer/sharer.php?u=https://cray.bg/themes/time-travel/square-left/', '_blank', 'width=600,height=400');void(0);"><i
                                            class="icon-facebook"></i></a>
                                    <a class="share-btna share-three"
                                       rel="https://twitter.com/share?url=https://cray.bg/themes/time-travel/square-left/&amp;text=Square / left"
                                       href="javascript:window.open('https://twitter.com/share?url=https://cray.bg/themes/time-travel/square-left/&amp;text=Square / left', '_blank', 'width=550,height=420');void(0);"><i
                                            class="icon-twitter"></i></a>
                                </div>
                            </div>
                            <div class="timedateafter"></div>
                            <div class="tt-arrow-side iswhite"></div>
                            <div class="tt-arrow-dot blink"></div>
                            <div class="reslines"></div>
                        </div>
                    </div>


                </section>


                <section class="wetasphalt">
                    <div class=" tt-cn-style  center-content  nonfull ">
                        <div class="wetasphalt ss-row go-anim  infoison">
                            <div class="ss-full">
                                <div class="hover-effect h-style"><a class="voice-bigimage"
                                                                     href="https://cray.bg/themes/time-travel/wp-content/uploads/2013/07/photodune-3581207-black-in-black-xs1.jpg"
                                                                     alt="" rel="prettyPhotoImages[1989]">
                                    <img src="https://cray.bg/themes/time-travel/wp-content/uploads/2013/07/photodune-3581207-black-in-black-xs1.jpg"
                                         class="clean-img"/>
                                    <div class="mask"><i class="icon-search"></i>
                                        <span class="img-rollover"></span>
                                    </div>
                                </a></div>
                                <div class="container-border">
                                    <div class="gray-container ">
                                        <div class="containera "><h3 class="content-title"><a class="read-more-init"
                                                                                              id="1989"
                                                                                              href="https://cray.bg/themes/time-travel/square-center/">Square
                                            / center</a></h3>
                                            <div class="hideifneed">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                                ut aliquip ex ea commodo consequat. Du...<a
                                                        href="https://cray.bg/themes/time-travel/square-center/"
                                                        class="read-more-init"> <strong>Read more</strong> <i
                                                        class="icon-long-arrow-right"></i> </a></div>
                                            <div class="icon-soc-container">
                                                <div class="share-btns">
                                                    <div class="empty-left time-holder "><a
                                                            class="read-more-init voice-morefromthis"
                                                            href="https://cray.bg/themes/time-travel/category/square/"><i
                                                            class="icon-tag"></i> Square</a>
                                                    </div>
                                                    <div class="empty-left user-holder"><a
                                                            href="https://cray.bg/themes/time-travel/square-center/#comments"
                                                            class="read-more-init voice-readcomments"><i
                                                            class="icon-comments"></i> 0</a>
                                                    </div>


                                                    <div class="empty-left comm-holder"><a href="#"
                                                                                           class="dot-irecommendthis"
                                                                                           id="dot-irecommendthis-1989"
                                                                                           title="Recommend this"><span
                                                            class="dot-irecommendthis-count">108</span> <span
                                                            class="dot-irecommendthis-suffix"></span></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="timedate">
                                <div class="tt-day">12</div>
                                <div class="tt-month">Jan</div>
                                <div class="tt-year">2014</div>
                                <div class="share-box">
                                    <a class="share-btna share-two"
                                       rel="http://www.facebook.com/sharer/sharer.php?u=https://cray.bg/themes/time-travel/square-center/"
                                       href="javascript:window.open('http://www.facebook.com/sharer/sharer.php?u=https://cray.bg/themes/time-travel/square-center/', '_blank', 'width=600,height=400');void(0);"><i
                                            class="icon-facebook"></i></a>
                                    <a class="share-btna share-three"
                                       rel="https://twitter.com/share?url=https://cray.bg/themes/time-travel/square-center/&amp;text=Square / center"
                                       href="javascript:window.open('https://twitter.com/share?url=https://cray.bg/themes/time-travel/square-center/&amp;text=Square / center', '_blank', 'width=550,height=420');void(0);"><i
                                            class="icon-twitter"></i></a>
                                </div>
                            </div>
                            <div class="timedateafter"></div>
                            <div class="tt-arrow-side iswhite"></div>
                            <div class="tt-arrow-dot blink"></div>
                            <div class="reslines"></div>
                        </div>
                    </div>


                </section>


                <section class="pomegranate">
                    <div class=" tt-cn-style  right-content  nonfull ">
                        <div class="pomegranate ss-row go-anim  infoison">
                            <div class="ss-full">
                                <div class="hover-effect h-style"><a class="voice-bigimage"
                                                                     href="https://cray.bg/themes/time-travel/wp-content/uploads/2014/01/photodune-3578907-touchscreen-xs2.jpg"
                                                                     alt="" rel="prettyPhotoImages[1993]">
                                    <img src="https://cray.bg/themes/time-travel/wp-content/uploads/2014/01/photodune-3578907-touchscreen-xs2-550x355.jpg"
                                         class="clean-img"/>
                                    <div class="mask"><i class="icon-search"></i>
                                        <span class="img-rollover"></span>
                                    </div>
                                </a></div>
                                <div class="container-border">
                                    <div class="gray-container ">
                                        <div class="containera "><h3 class="content-title"><a class="read-more-init"
                                                                                              id="1993"
                                                                                              href="https://cray.bg/themes/time-travel/square-right-2/">Square
                                            / right</a></h3>
                                            <div class="hideifneed">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                                ut aliquip ex ea commodo consequat. Du...<a
                                                        href="https://cray.bg/themes/time-travel/square-right-2/"
                                                        class="read-more-init"> <strong>Read more</strong> <i
                                                        class="icon-long-arrow-right"></i> </a></div>
                                            <div class="icon-soc-container">
                                                <div class="share-btns">
                                                    <div class="empty-left time-holder "><a
                                                            class="read-more-init voice-morefromthis"
                                                            href="https://cray.bg/themes/time-travel/category/square/"><i
                                                            class="icon-tag"></i> Square</a>
                                                    </div>
                                                    <div class="empty-left user-holder"><a
                                                            href="https://cray.bg/themes/time-travel/square-right-2/#comments"
                                                            class="read-more-init voice-readcomments"><i
                                                            class="icon-comments"></i> 0</a>
                                                    </div>


                                                    <div class="empty-left comm-holder"><a href="#"
                                                                                           class="dot-irecommendthis"
                                                                                           id="dot-irecommendthis-1993"
                                                                                           title="Recommend this"><span
                                                            class="dot-irecommendthis-count">76</span> <span
                                                            class="dot-irecommendthis-suffix"></span></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="timedate">
                                <div class="tt-day">10</div>
                                <div class="tt-month">Jan</div>
                                <div class="tt-year">2014</div>
                                <div class="share-box">
                                    <a class="share-btna share-two"
                                       rel="http://www.facebook.com/sharer/sharer.php?u=https://cray.bg/themes/time-travel/square-right-2/"
                                       href="javascript:window.open('http://www.facebook.com/sharer/sharer.php?u=https://cray.bg/themes/time-travel/square-right-2/', '_blank', 'width=600,height=400');void(0);"><i
                                            class="icon-facebook"></i></a>
                                    <a class="share-btna share-three"
                                       rel="https://twitter.com/share?url=https://cray.bg/themes/time-travel/square-right-2/&amp;text=Square / right"
                                       href="javascript:window.open('https://twitter.com/share?url=https://cray.bg/themes/time-travel/square-right-2/&amp;text=Square / right', '_blank', 'width=550,height=420');void(0);"><i
                                            class="icon-twitter"></i></a>
                                </div>
                            </div>
                            <div class="timedateafter"></div>
                            <div class="tt-arrow-side iswhite"></div>
                            <div class="tt-arrow-dot blink"></div>
                            <div class="reslines"></div>
                        </div>
                    </div>


                </section>


                <section class="midnightblue">
                    <div class=" tt-cn-style  right-content  nonfull ">
                        <div class="midnightblue ss-row go-anim  infoison">
                            <div class="ss-full">
                                <div class="hover-effect h-style"><a class="voice-bigimage"
                                                                     href="https://cray.bg/themes/time-travel/wp-content/uploads/2013/07/photodune-2243001-urban-style-xs1.jpg"
                                                                     alt="" rel="prettyPhotoImages[57]">
                                    <img src="https://cray.bg/themes/time-travel/wp-content/uploads/2013/07/photodune-2243001-urban-style-xs1.jpg"
                                         class="clean-img"/>
                                    <div class="mask"><i class="icon-search"></i>
                                        <span class="img-rollover"></span>
                                    </div>
                                </a></div>
                                <div class="container-border">
                                    <div class="gray-container ">
                                        <div class="containera "><h3 class="content-title"><a class="read-more-init"
                                                                                              id="57"
                                                                                              href="https://cray.bg/themes/time-travel/start-the-engine/">Portfolio
                                            style &#8211; 1</a></h3>
                                            <div class="hideifneed">Lorem ipsum <strong>dolor</strong> sit amet,
                                                consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean
                                                massa.
                                                <blockquote>Cum sociis natoque penatibus et magnis dis parturient
                                                    montes, nascetur ridiculus mus. Donec quam f...<a
                                                            href="https://cray.bg/themes/time-travel/start-the-engine/"
                                                            class="read-more-init"> <strong>Read more</strong> <i
                                                            class="icon-long-arrow-right"></i> </a>
                                            </div>
                                            <div class="icon-soc-container">
                                                <div class="share-btns">
                                                    <div class="empty-left time-holder "><a
                                                            class="read-more-init voice-morefromthis"
                                                            href="https://cray.bg/themes/time-travel/category/other/"><i
                                                            class="icon-tag"></i> Other</a>
                                                    </div>


                                                    <div class="empty-left comm-holder"><a href="#"
                                                                                           class="dot-irecommendthis"
                                                                                           id="dot-irecommendthis-57"
                                                                                           title="Recommend this"><span
                                                            class="dot-irecommendthis-count">125</span> <span
                                                            class="dot-irecommendthis-suffix"></span></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="timedate">
                                <div class="tt-day">10</div>
                                <div class="tt-month">Jan</div>
                                <div class="tt-year">2014</div>
                                <div class="share-box">
                                    <a class="share-btna share-two"
                                       rel="http://www.facebook.com/sharer/sharer.php?u=https://cray.bg/themes/time-travel/start-the-engine/"
                                       href="javascript:window.open('http://www.facebook.com/sharer/sharer.php?u=https://cray.bg/themes/time-travel/start-the-engine/', '_blank', 'width=600,height=400');void(0);"><i
                                            class="icon-facebook"></i></a>
                                    <a class="share-btna share-three"
                                       rel="https://twitter.com/share?url=https://cray.bg/themes/time-travel/start-the-engine/&amp;text=Portfolio style &#8211; 1"
                                       href="javascript:window.open('https://twitter.com/share?url=https://cray.bg/themes/time-travel/start-the-engine/&amp;text=Portfolio style &#8211; 1', '_blank', 'width=550,height=420');void(0);"><i
                                            class="icon-twitter"></i></a>
                                </div>
                            </div>
                            <div class="timedateafter"></div>
                            <div class="tt-arrow-side iswhite"></div>
                            <div class="tt-arrow-dot blink"></div>
                            <div class="reslines"></div>
                        </div>
                    </div>


                </section>


                <section class="sunflower">
                    <div class=" tt-cn-style  left-content nonfull ">
                        <div class="sunflower ss-row go-anim  infoison">
                            <div class="ss-full">
                                <div class="hover-effect h-style"><a class="voice-bigimage"
                                                                     href="https://cray.bg/themes/time-travel/wp-content/uploads/2013/07/photodune-6036814-colored-hair-xs1.jpg"
                                                                     alt="" rel="prettyPhotoImages[2095]">
                                    <img src="https://cray.bg/themes/time-travel/wp-content/uploads/2013/07/photodune-6036814-colored-hair-xs1.jpg"
                                         class="clean-img"/>
                                    <div class="mask"><i class="icon-search"></i>
                                        <span class="img-rollover"></span>
                                    </div>
                                </a></div>
                                <div class="container-border">
                                    <div class="gray-container ">
                                        <div class="containera "><h3 class="content-title"><a class="read-more-init"
                                                                                              id="2095"
                                                                                              href="https://cray.bg/themes/time-travel/its-time-to-eat/">Portfolio
                                            style &#8211; 2</a></h3>
                                            <div class="hideifneed">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                                elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque
                                                penatibus et magnis dis parturient montes. Aommodo ipsum dolor sit amet,
                                                consec tetuer adipiscing elit. Aenean...<a
                                                        href="https://cray.bg/themes/time-travel/its-time-to-eat/"
                                                        class="read-more-init"> <strong>Read more</strong> <i
                                                        class="icon-long-arrow-right"></i> </a></div>
                                            <div class="icon-soc-container">
                                                <div class="share-btns">
                                                    <div class="empty-left time-holder "><a
                                                            class="read-more-init voice-morefromthis"
                                                            href="https://cray.bg/themes/time-travel/category/art/"><i
                                                            class="icon-tag"></i> Art</a>
                                                    </div>
                                                    <div class="empty-left user-holder"><a
                                                            href="https://cray.bg/themes/time-travel/its-time-to-eat/#comments"
                                                            class="read-more-init voice-readcomments"><i
                                                            class="icon-comments"></i> 0</a>
                                                    </div>


                                                    <div class="empty-left comm-holder"><a href="#"
                                                                                           class="dot-irecommendthis"
                                                                                           id="dot-irecommendthis-2095"
                                                                                           title="Recommend this"><span
                                                            class="dot-irecommendthis-count">141</span> <span
                                                            class="dot-irecommendthis-suffix"></span></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="timedate">
                                <div class="tt-day">10</div>
                                <div class="tt-month">Jan</div>
                                <div class="tt-year">2014</div>
                                <div class="share-box">
                                    <a class="share-btna share-two"
                                       rel="http://www.facebook.com/sharer/sharer.php?u=https://cray.bg/themes/time-travel/its-time-to-eat/"
                                       href="javascript:window.open('http://www.facebook.com/sharer/sharer.php?u=https://cray.bg/themes/time-travel/its-time-to-eat/', '_blank', 'width=600,height=400');void(0);"><i
                                            class="icon-facebook"></i></a>
                                    <a class="share-btna share-three"
                                       rel="https://twitter.com/share?url=https://cray.bg/themes/time-travel/its-time-to-eat/&amp;text=Portfolio style &#8211; 2"
                                       href="javascript:window.open('https://twitter.com/share?url=https://cray.bg/themes/time-travel/its-time-to-eat/&amp;text=Portfolio style &#8211; 2', '_blank', 'width=550,height=420');void(0);"><i
                                            class="icon-twitter"></i></a>
                                </div>
                            </div>
                            <div class="timedateafter"></div>
                            <div class="tt-arrow-side iswhite"></div>
                            <div class="tt-arrow-dot blink"></div>
                            <div class="reslines"></div>
                        </div>
                    </div>


                </section>


                <section class="gglass">
                    <div class=" tt-cn-style  right-content  nonfull gcnopadding">
                        <div class="gglass ss-row go-anim  infoisoff ">
                            <div class="ss-full">
                                <div class="container-border">
                                    <div class="gray-container gcnopadding">
                                        <div class="containera  addpadding">
                                            <div class="vc_row wpb_row vc_row-fluid">
                                                <div class="vc_col-sm-4 wpb_column vc_column_container">
                                                    <div class="wpb_wrapper">

                                                        <div class="wpb_single_image wpb_content_element vc_align_left">
                                                            <div class="wpb_wrapper">

                                                                <div class="hover-effect h-style wpb_el_border"><img
                                                                        class=""
                                                                        src="https://cray.bg/themes/time-travel/wp-content/uploads/2013/07/photodune-6036814-colored-hair-xs1-300x300.jpg"
                                                                        width="300" height="300"
                                                                        alt="photodune-6036814-colored-hair-xs1"/></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="vc_col-sm-4 wpb_column vc_column_container">
                                                    <div class="wpb_wrapper">

                                                        <div class="wpb_single_image wpb_content_element vc_align_left">
                                                            <div class="wpb_wrapper">

                                                                <div class="hover-effect h-style wpb_el_border"><img
                                                                        class=""
                                                                        src="https://cray.bg/themes/time-travel/wp-content/uploads/2014/01/photodune-3578907-touchscreen-xs2-300x300.jpg"
                                                                        width="300" height="300"
                                                                        alt="photodune-3578907-touchscreen-xs2"/></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="vc_col-sm-4 wpb_column vc_column_container">
                                                    <div class="wpb_wrapper">

                                                        <div class="wpb_single_image wpb_content_element vc_align_left">
                                                            <div class="wpb_wrapper">

                                                                <div class="hover-effect h-style wpb_el_border"><img
                                                                        class=""
                                                                        src="https://cray.bg/themes/time-travel/wp-content/uploads/2013/07/photodune-6346179-good-singer-xs1-300x300.jpg"
                                                                        width="300" height="300"
                                                                        alt="photodune-6346179-good-singer-xs1"/></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="timedate">
                                <div class="tt-day">01</div>
                                <div class="tt-month">Jan</div>
                                <div class="tt-year">2014</div>
                                <div class="share-box">
                                    <a class="share-btna share-two"
                                       rel="http://www.facebook.com/sharer/sharer.php?u=https://cray.bg/themes/time-travel/vc-test/"
                                       href="javascript:window.open('http://www.facebook.com/sharer/sharer.php?u=https://cray.bg/themes/time-travel/vc-test/', '_blank', 'width=600,height=400');void(0);"><i
                                            class="icon-facebook"></i></a>
                                    <a class="share-btna share-three"
                                       rel="https://twitter.com/share?url=https://cray.bg/themes/time-travel/vc-test/&amp;text=PB 1"
                                       href="javascript:window.open('https://twitter.com/share?url=https://cray.bg/themes/time-travel/vc-test/&amp;text=PB 1', '_blank', 'width=550,height=420');void(0);"><i
                                            class="icon-twitter"></i></a>
                                </div>
                            </div>
                            <div class="timedateafter"></div>
                            <div class="tt-arrow-side"></div>
                            <div class="tt-arrow-dot blink"></div>
                            <div class="reslines"></div>
                        </div>
                    </div>


                </section>


                <section class="peterriver">
                    <div class=" tt-cn-style  left-content nonfull gcnopadding">
                        <div class="peterriver ss-row go-anim  infoisoff ">
                            <div class="ss-full">
                                <div class="container-border">
                                    <div class="gray-container gcnopadding">
                                        <div class="containera  addpadding">
                                            <div class="vc_row wpb_row vc_row-fluid">
                                                <div class="vc_col-sm-4 wpb_column vc_column_container">
                                                    <div class="wpb_wrapper">

                                                        <div class="wpb_single_image wpb_content_element vc_align_left">
                                                            <div class="wpb_wrapper">

                                                                <div class="hover-effect h-style wpb_el_border"><img
                                                                        class=""
                                                                        src="https://cray.bg/themes/time-travel/wp-content/uploads/2013/07/photodune-5447467-blonde-in-blue-xs1-300x300.jpg"
                                                                        width="300" height="300"
                                                                        alt="photodune-5447467-blonde-in-blue-xs1"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="vc_col-sm-8 wpb_column vc_column_container">
                                                    <div class="wpb_wrapper">

                                                        <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                                <h5>Small title</h5>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                    elit, sed do eiusmod tempor incididunt ut labore et
                                                                    dolore magna aliqua. Ut enim ad minim veniam, quis
                                                                    nostrud exercitation ullamco.</p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="timedate">
                                <div class="tt-day">01</div>
                                <div class="tt-month">Jan</div>
                                <div class="tt-year">2014</div>
                                <div class="share-box">
                                    <a class="share-btna share-two"
                                       rel="http://www.facebook.com/sharer/sharer.php?u=https://cray.bg/themes/time-travel/pb2/"
                                       href="javascript:window.open('http://www.facebook.com/sharer/sharer.php?u=https://cray.bg/themes/time-travel/pb2/', '_blank', 'width=600,height=400');void(0);"><i
                                            class="icon-facebook"></i></a>
                                    <a class="share-btna share-three"
                                       rel="https://twitter.com/share?url=https://cray.bg/themes/time-travel/pb2/&amp;text=PB2"
                                       href="javascript:window.open('https://twitter.com/share?url=https://cray.bg/themes/time-travel/pb2/&amp;text=PB2', '_blank', 'width=550,height=420');void(0);"><i
                                            class="icon-twitter"></i></a>
                                </div>
                            </div>
                            <div class="timedateafter"></div>
                            <div class="tt-arrow-side"></div>
                            <div class="tt-arrow-dot blink"></div>
                            <div class="reslines"></div>
                        </div>
                    </div>


                </section>

            </article>


            <div id="footer">
                <div class="f-padding">
                    <div class="logo animated fadeOutH">
                        <a href="https://cray.bg/themes/time-travel" class="logohover">
                            <img src="../speedyHunt.png"/>
                        </a>
                    </div>
                    <div class="copyrholder animated fadeOutH">
                        <p><strong>Loading..</strong><br> Full report for <a href="#"><?php echo $fullname; ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="right-bottom-nav">
    <div class="breadcrumbs animated fadeOutH">
        <!-- Breadcrumb NavXT 5.2.2 -->
        <span typeof="v:Breadcrumb"><span property="v:title">Time Travel</span></span></div>
    <div id="tt-voice-c" class="tt-voice-c animated fadeOutH" data-ot='<h4><a href="#">Voice Control</a></h4><div class="vc-info"><br>Listed below are the available voice commands <br>
<p><i class="icon-microphone"></i><strong>Homepage</strong> - go to homepage<br>
<i class="icon-microphone"></i><strong>Next</strong> - slide to next post<br>
<i class="icon-microphone"></i><strong>Previous</strong> - slide to previous post<br>
<i class="icon-microphone"></i><strong>Scroll back</strong> - go to first post<br>
<i class="icon-microphone"></i><strong>Scroll down</strong> - scroll down<br>
<i class="icon-microphone"></i><strong>Scroll up</strong> - scroll up<br>
<i class="icon-microphone"></i><strong>Tweet</strong> - tweet on twitter<br>
<i class="icon-microphone"></i><strong>Share</strong> - share on facebook<br>
<i class="icon-microphone"></i><strong>Open</strong> - open post<br>
<i class="icon-microphone"></i><strong>Search for</strong> - search<br>
<i class="icon-microphone"></i><strong>More from same category</strong> - same category<br>
<i class="icon-microphone"></i><strong>Show comments</strong> - shows comments<br>
<i class="icon-microphone"></i><strong>Show picture</strong> - opens big image<br>
<i class="icon-microphone"></i><strong>Close</strong> - closes big image<br>
</p></div>' data-ot-fixed="true" data-ot-background="rgba(0,0,0,0.7)" data-ot-border-color="rgba(0,0,0,0.8)"
         data-ot-offset="[ 15, -10 ]" data-ot-auto-offset="true" data-ot-tip-joint="top center" data-ot-target="true"
         data-ot-border-radius="0" data-ot-close-button-radius="11" data-ot-close-button-cross-size="7"
         data-ot-close-button-cross-color="#fff" data-ot-hide-trigger="closeButton" data-ot-group="rightnav">
        <i id="vocie-control" class="icon-microphone-off navkey"></i>
    </div>

    <div class="tt-bottom-nav animated fadeOutH" data-ot='Navigate trough timeline' data-ot-fixed="true"
         data-ot-background="rgba(0,0,0,0.5)" data-ot-border-color="rgba(0,0,0,0.8)" data-ot-offset="[ 15, -10 ]"
         data-ot-auto-offset="true" data-ot-tip-joint="top center" data-ot-target="true" data-ot-border-radius="0"
         data-ot-group="rightnav">
        <i id="backb-arrow" class="icon-step-backward navkey"></i>
        <i id="next-arrow" class="icon-chevron-down navkey"></i>
        <i id="enter-arrow" class="icon-level-down navkey"></i>
        <i id="prev-arrow" class="icon-chevron-up navkey "></i>
    </div>
    <div id="footer-time" class="date-time animated fadeOutH"
         data-ot='&lt;li id=&quot;ab_tf_recent_posts_widget-2&quot; class=&quot;widget rpwe_widget recent-posts-extended&quot;&gt;&lt;h2 class=&quot;widgettitle&quot;&gt;Recent Posts&lt;/h2&gt;
		&lt;div class=&quot;rpsb-block&quot;&gt;
			&lt;ul class=&quot;rpsb-ul&quot;&gt;
									&lt;li class=&quot;rpsb-clearfix&quot;&gt;
													&lt;a href=&quot;https://cray.bg/themes/time-travel/sircle-center-right-sidebar-demo/&quot; title=&quot;Permalink to Circle / center / right sidebar&quot; rel=&quot;bookmark&quot;&gt;
								&lt;img width=&quot;60&quot; height=&quot;60&quot; src=&quot;https://cray.bg/themes/time-travel/wp-content/uploads/2014/01/photodune-6345960-funny-clown-xs2-150x150.jpg&quot; class=&quot;rpsb-alignleft wp-post-image&quot; alt=&quot;Circle / center / right sidebar&quot; title=&quot;Circle / center / right sidebar&quot; /&gt;							&lt;/a&gt;
												&lt;h3&gt;
							&lt;a href=&quot;https://cray.bg/themes/time-travel/sircle-center-right-sidebar-demo/&quot; title=&quot;Permalink to Circle / center / right sidebar&quot; rel=&quot;bookmark&quot;&gt;Circle / center / right sidebar&lt;/a&gt;
						&lt;/h3&gt;
													&lt;span class=&quot;rpsb-time&quot;&gt;2 years ago&lt;/span&gt;
																			&lt;div class=&quot;rpsb-summary&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed&amp;hellip;&lt;/div&gt;
											&lt;/li&gt;

									&lt;li class=&quot;rpsb-clearfix&quot;&gt;
													&lt;a href=&quot;https://cray.bg/themes/time-travel/circle-left-left-sidebar/&quot; title=&quot;Permalink to Circle / left / left sidebar&quot; rel=&quot;bookmark&quot;&gt;
								&lt;img width=&quot;60&quot; height=&quot;60&quot; src=&quot;https://cray.bg/themes/time-travel/wp-content/uploads/2013/07/photodune-5447467-blonde-in-blue-xs1-150x150.jpg&quot; class=&quot;rpsb-alignleft wp-post-image&quot; alt=&quot;Circle / left / left sidebar&quot; title=&quot;Circle / left / left sidebar&quot; /&gt;							&lt;/a&gt;
												&lt;h3&gt;
							&lt;a href=&quot;https://cray.bg/themes/time-travel/circle-left-left-sidebar/&quot; title=&quot;Permalink to Circle / left / left sidebar&quot; rel=&quot;bookmark&quot;&gt;Circle / left / left sidebar&lt;/a&gt;
						&lt;/h3&gt;
													&lt;span class=&quot;rpsb-time&quot;&gt;2 years ago&lt;/span&gt;
																			&lt;div class=&quot;rpsb-summary&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed&amp;hellip;&lt;/div&gt;
											&lt;/li&gt;

							&lt;/ul&gt;
		&lt;/div&gt;
		&lt;/li&gt;
&lt;li id=&quot;calendar-2&quot; class=&quot;widget widget_calendar&quot;&gt;&lt;h2 class=&quot;widgettitle&quot;&gt;Archives&lt;/h2&gt;
&lt;div id=&quot;calendar_wrap&quot;&gt;&lt;table id=&quot;wp-calendar&quot;&gt;
	&lt;caption&gt;October 2017&lt;/caption&gt;
	&lt;thead&gt;
	&lt;tr&gt;
		&lt;th scope=&quot;col&quot; title=&quot;Monday&quot;&gt;M&lt;/th&gt;
		&lt;th scope=&quot;col&quot; title=&quot;Tuesday&quot;&gt;T&lt;/th&gt;
		&lt;th scope=&quot;col&quot; title=&quot;Wednesday&quot;&gt;W&lt;/th&gt;
		&lt;th scope=&quot;col&quot; title=&quot;Thursday&quot;&gt;T&lt;/th&gt;
		&lt;th scope=&quot;col&quot; title=&quot;Friday&quot;&gt;F&lt;/th&gt;
		&lt;th scope=&quot;col&quot; title=&quot;Saturday&quot;&gt;S&lt;/th&gt;
		&lt;th scope=&quot;col&quot; title=&quot;Sunday&quot;&gt;S&lt;/th&gt;
	&lt;/tr&gt;
	&lt;/thead&gt;

	&lt;tfoot&gt;
	&lt;tr&gt;
		&lt;td colspan=&quot;3&quot; id=&quot;prev&quot;&gt;&lt;a href=&quot;https://cray.bg/themes/time-travel/2015/06/&quot;&gt;&amp;laquo; Jun&lt;/a&gt;&lt;/td&gt;
		&lt;td class=&quot;pad&quot;&gt;&amp;nbsp;&lt;/td&gt;
		&lt;td colspan=&quot;3&quot; id=&quot;next&quot; class=&quot;pad&quot;&gt;&amp;nbsp;&lt;/td&gt;
	&lt;/tr&gt;
	&lt;/tfoot&gt;

	&lt;tbody&gt;
	&lt;tr&gt;
		&lt;td colspan=&quot;6&quot; class=&quot;pad&quot;&gt;&amp;nbsp;&lt;/td&gt;&lt;td&gt;1&lt;/td&gt;
	&lt;/tr&gt;
	&lt;tr&gt;
		&lt;td&gt;2&lt;/td&gt;&lt;td&gt;3&lt;/td&gt;&lt;td&gt;4&lt;/td&gt;&lt;td&gt;5&lt;/td&gt;&lt;td id=&quot;today&quot;&gt;6&lt;/td&gt;&lt;td&gt;7&lt;/td&gt;&lt;td&gt;8&lt;/td&gt;
	&lt;/tr&gt;
	&lt;tr&gt;
		&lt;td&gt;9&lt;/td&gt;&lt;td&gt;10&lt;/td&gt;&lt;td&gt;11&lt;/td&gt;&lt;td&gt;12&lt;/td&gt;&lt;td&gt;13&lt;/td&gt;&lt;td&gt;14&lt;/td&gt;&lt;td&gt;15&lt;/td&gt;
	&lt;/tr&gt;
	&lt;tr&gt;
		&lt;td&gt;16&lt;/td&gt;&lt;td&gt;17&lt;/td&gt;&lt;td&gt;18&lt;/td&gt;&lt;td&gt;19&lt;/td&gt;&lt;td&gt;20&lt;/td&gt;&lt;td&gt;21&lt;/td&gt;&lt;td&gt;22&lt;/td&gt;
	&lt;/tr&gt;
	&lt;tr&gt;
		&lt;td&gt;23&lt;/td&gt;&lt;td&gt;24&lt;/td&gt;&lt;td&gt;25&lt;/td&gt;&lt;td&gt;26&lt;/td&gt;&lt;td&gt;27&lt;/td&gt;&lt;td&gt;28&lt;/td&gt;&lt;td&gt;29&lt;/td&gt;
	&lt;/tr&gt;
	&lt;tr&gt;
		&lt;td&gt;30&lt;/td&gt;&lt;td&gt;31&lt;/td&gt;
		&lt;td class=&quot;pad&quot; colspan=&quot;5&quot;&gt;&amp;nbsp;&lt;/td&gt;
	&lt;/tr&gt;
	&lt;/tbody&gt;
	&lt;/table&gt;&lt;/div&gt;&lt;/li&gt;
&nbsp;' data-ot-fixed="true" data-ot-hide-trigger="closeButton" data-ot-background="rgba(0,0,0,0.7)"
         data-ot-border-color="rgba(0,0,0,0.8)" data-ot-offset="[ 0, -10 ]" data-ot-auto-offset="true"
         data-ot-tip-joint="bottom center" data-ot-target="true" data-ot-border-radius="0"
         data-ot-close-button-radius="11" data-ot-close-button-cross-size="7" data-ot-close-button-cross-color="#fff"
         data-ot-group="rightnav">
        <div class="tt-b-day  "></div>
        <div class="tt-b-day-r">
            <div class="tt-b-month"></div>
            <div class="tt-b-date"></div>
        </div>
        <div class="tt-b-time-r">
            <div class="tt-b-time"></div>
            <div class="tt-b-amp"></div>
        </div>
    </div>

    <div class="inifiniteLoader animated">
        <div class="loading"></div>
    </div>
    <div class="animated numpostinfi ">
        <div class="numpostcontent">
            <div class='tt-big-dig'>17</div>
            <div class='tt-dig-txt'>posts<br>at home page</div>
        </div>
    </div>
</div>

<div class="cn-overlay"></div>
<audio id="beep-two">
    <source src="https://cray.bg/themes/time-travel/wp-content/themes/timetravel/images/audio/click.mp3"></source>
    <source src="https://cray.bg/themes/time-travel/wp-content/themes/timetravel/images/audio/click.ogg"></source>
</audio>
<div id="sounddiv">
    <bgsound id="sound"></bgsound>
</div>

<div id="dl-menu" class="dl-menuwrapper animated fadeOutH">
    <div class="cn-buttonbg"></div>
    <button class="dl-trigger">Open Menu</button>
    <ul id="nav" class="dl-menu">
        <li class='menu-header-search'>
            <form action='https://cray.bg/themes/time-travel' id='searchform' method='get'><input type='text' name='s'
                                                                                                  id='s' placeholder=''>
            </form>
        </li>
        <div class="nav-header dl-animate-in-2">MENU</div>
        <li id="menu-item-2139" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2139"><a
                href="http://cray.bg/themes/time-travel">HOME</a></li>
        <li id="menu-item-2144"
            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2144"><a
                href="#">TIMELINE STYLES</a>
            <ul class="sub-menu">
                <li id="menu-item-2141"
                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2141"><a
                        href="https://cray.bg/themes/time-travel/category/circle/">CIRCLE</a></li>
                <li id="menu-item-2143"
                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2143"><a
                        href="https://cray.bg/themes/time-travel/category/square/">SQUARE</a></li>
                <li id="menu-item-2150"
                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2150"><a
                        href="https://cray.bg/themes/time-travel/category/video-2/">VIDEOS</a></li>
                <li id="menu-item-2151"
                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2151"><a
                        href="https://cray.bg/themes/time-travel/category/images/">IMAGES</a></li>
                <li id="menu-item-2142"
                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2142"><a
                        href="https://cray.bg/themes/time-travel/category/only-text/">TEXT</a></li>
                <li id="menu-item-2140"
                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2140"><a
                        href="https://cray.bg/themes/time-travel/category/embedded/">EMBEDDED ELEMENTS</a></li>
            </ul>
        </li>
        <li id="menu-item-2146"
            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2146"><a
                href="#">ELEMENTS</a>
            <ul class="sub-menu">
                <li id="menu-item-2158" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2158">
                    <a href="https://cray.bg/themes/time-travel/columns/">COLUMNS</a></li>
                <li id="menu-item-2157" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2157">
                    <a href="https://cray.bg/themes/time-travel/accordions/">ACCORDIONS</a></li>
                <li id="menu-item-2161" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2161">
                    <a href="https://cray.bg/themes/time-travel/toggle/">TOGGLE</a></li>
                <li id="menu-item-2162" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2162">
                    <a href="https://cray.bg/themes/time-travel/tabs/">TABS</a></li>
                <li id="menu-item-2166" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2166">
                    <a href="https://cray.bg/themes/time-travel/image-gallery/">IMAGE GALLERY</a></li>
                <li id="menu-item-2169" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2169">
                    <a href="https://cray.bg/themes/time-travel/latest-blog-posts/">LATEST BLOG POSTS</a></li>
                <li id="menu-item-2170" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2170">
                    <a href="https://cray.bg/themes/time-travel/post-grid/">POST GRID</a></li>
                <li id="menu-item-2172" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2172">
                    <a href="https://cray.bg/themes/time-travel/multimedia/">MULTIMEDIA</a></li>
                <li id="menu-item-2165" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2165">
                    <a href="https://cray.bg/themes/time-travel/misc/">MISC</a></li>
            </ul>
        </li>
        <li id="menu-item-2145"
            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2145"><a
                href="#">PAGES</a>
            <ul class="sub-menu">
                <li id="menu-item-2153" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2153">
                    <a href="https://cray.bg/themes/time-travel/portfolio/">PORTFOLIO</a></li>
                <li id="menu-item-2148" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2148">
                    <a href="https://cray.bg/themes/time-travel/start-the-engine/">PORTFOLIO SINGLE 1</a></li>
                <li id="menu-item-2149" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2149">
                    <a href="https://cray.bg/themes/time-travel/its-time-to-eat/">PORTFOLIO SINGLE 2</a></li>
                <li id="menu-item-2154" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2154">
                    <a href="https://cray.bg/themes/time-travel/about-us/">ABOUT US</a></li>
                <li id="menu-item-2155" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2155">
                    <a href="https://cray.bg/themes/time-travel/faq/">FAQ</a></li>
            </ul>
        </li>
        <li id="menu-item-2152" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2152"><a
                href="https://cray.bg/themes/time-travel/contact-us/">CONTACT US</a></li>
    </ul>
</div>


<script src="second.js"></script>


<link rel='stylesheet' id='flexslider-css'
      href='https://cray.bg/themes/time-travel/wp-content/plugins/js_composer_timetravel/assets/lib/flexslider/flexslider.css?ver=4.3.4'
      type='text/css' media='screen'/>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.51.0-2014.06.20'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var _wpcf7 = {
        "loaderUrl": "https:\/\/cray.bg\/themes\/time-travel\/wp-content\/plugins\/contact-form-7\/images\/ajax-loader.gif",
        "sending": "Sending ...",
        "cached": "1"
    };
    /* ]]> */
</script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.2'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var dot_irecommendthis = {"ajaxurl": "https:\/\/cray.bg\/themes\/time-travel\/wp-admin\/admin-ajax.php"};
    /* ]]> */
</script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-content/plugins/i-recommend-this/js/dot_irecommendthis.js?ver=2.6.0'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/js/jquery.prettyPhoto.js?ver=1.0'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/js/jquery.easing.1.3.js?ver=1.0'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/js/jquery.flexslider.js?ver=1.0'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/js/ddsmoothmenu.js?ver=1.0'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/js/modernizr.custom.79639.js?ver=1.0'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/js/move.js?ver=1.0'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/js/jquery.vegas.js?ver=1.0'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/js/classList.js?ver=1.0'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/js/jquery.nanoscroller.js?ver=1.0'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/js/jquery.dd.js?ver=1.0'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/js/annyang.min.js?ver=1.0'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/js/opentip-jquery.js?ver=1.0'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-content/themes/timetravel/js/sc-jquery.js?ver=1.0'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-content/plugins/js_composer_timetravel/assets/js/js_composer_front.js?ver=4.3.4'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-content/plugins/js_composer_timetravel/assets/lib/jquery-waypoints/waypoints.min.js?ver=4.3.4'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-includes/js/jquery/ui/core.min.js?ver=1.11.4'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-includes/js/jquery/ui/widget.min.js?ver=1.11.4'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-includes/js/jquery/ui/tabs.min.js?ver=1.11.4'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-content/plugins/js_composer_timetravel/assets/lib/jquery-ui-tabs-rotate/jquery-ui-tabs-rotate.js?ver=4.3.4'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-content/plugins/js_composer_timetravel/assets/lib/flexslider/jquery.flexslider-min.js?ver=4.3.4'></script>
<script type='text/javascript'
        src='https://cray.bg/themes/time-travel/wp-includes/js/jquery/ui/accordion.min.js?ver=1.11.4'></script>
<!--[if IE 9]>
<link rel="stylesheet" type="text/css"
      href="https://cray.bg/themes/time-travel/wp-content/themes/timetravel/css/styleIE.css"/>
<![endif]-->


<div id="styles-switcher">
    <div id="bookmark"></div>
    <div id="sc-content">
        <div class="sc-option logoto">
            <img src="https://cray.bg/themes/time-travel/wp-content/uploads/2014/01/logo11.png" class="sc-logo">
        </div>
        <div class="sc-option">
            You can navigate trough the site by using:<br/><br/>
            <div style="opacity:0.8;">
                <img width="190px"
                     src="https://cray.bg/themes/time-travel/wp-content/themes/timetravel/images/mouse.png">
            </div>


        </div>
        <div class="sc-option">SELECT COLOR SCHEME</div>
        <div class="sc-option ">
            <a href="https://www.facebook.com/CrayThemes/app_221305114724134">

                <div class="sc-image sc-image-fb">
                    <img src="https://cray.bg/themes/time-travel/wp-content/themes/timetravel/images/facebook.jpg">
                    <div style="">facebook</div>
                </div>

            </a>
            <!-- <a href="http://flasherland.com/themeforest/timetravel?wptheme=Time%20Travel">

                 <div class="sc-image">
                     <img src="https://cray.bg/themes/time-travel/wp-content/themes/timetravel/images/colorful.jpg">
                     <div style="">colorfull</div>
                 </div>

             </a>
             <a href="http://flasherland.com/themeforest/timetravel?wptheme=Time%20Travel%20Glass">

                 <div class="sc-image ">
                     <img src="https://cray.bg/themes/time-travel/wp-content/themes/timetravel/images/glass.jpg">
                      <div style="">darck</div>
                 </div>

             </a>-->

        </div>
        <!-- <div class="sc-option last"><a href="http://storyline.flasherland.com/?wptheme=Storyline%20Board%20-%20video">
         Youtube video whit audo background</a></div>
       <div class="sc-option last">  Press <i class="icon-arrow-up "></i> and <i class="icon-arrow-down"></i> arrows to change scroll effects</div>-->
        <div class="sc-option last">
            <!-- <br />
             <a class="wpb_button_a" href="http://themeforest.net/item/time-travel-timeline-wordpress-theme/6639517?ref=bilbo_b"><span class="wpb_button  wpb_btn-info wpb_btn-large" style="background-color:rgba(101,177,255, 1);">BUY NOW</span></a>-->


        </div>


    </div>

</div>

<!--<script>-->
    <!--(function (i, s, o, g, r, a, m) {-->
        <!--i['GoogleAnalyticsObject'] = r;-->
        <!--i[r] = i[r] || function () {-->
                    <!--(i[r].q = i[r].q || []).push(arguments)-->
                <!--}, i[r].l = 1 * new Date();-->
        <!--a = s.createElement(o),-->
                <!--m = s.getElementsByTagName(o)[0];-->
        <!--a.async = 1;-->
        <!--a.src = g;-->
        <!--m.parentNode.insertBefore(a, m)-->
    <!--})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');-->

    <!--ga('create', 'UA-37727335-10', 'auto');-->
    <!--ga('send', 'pageview');-->

<!--</script>-->
</body>
</html>
<!-- Dynamic page generated in 0.504 seconds. -->
<!-- Cached page generated by WP-Super-Cache on 2017-10-06 00:46:05 -->

<!-- Compression = gzip -->
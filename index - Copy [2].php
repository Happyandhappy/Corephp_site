<?php
error_reporting(0);
ini_set('max_execution_time', 300);
ini_set('display_errors', 0); 
define("_WOJO", true);
require_once("dashboard/init.php");							
?>
<!DOCTYPE html>
<html lang="en">



<head>

	<title>SpeedyHunt.com - People Search Engine</title>

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
<style>
div.wojo.negative.icon.small.message {
	display:none !important;
}
.btn-success { border-color:snow !important; }
body{font-family:'Lato',Arial,Helvetica,sans-serif;}[data-bv-ref]{display:none;}[data-bv-ref='default']{display:block;}.hide{position:absolute;top:-9999px;left:-9999px;}.hide-elem{display:none;}.cross-browser{display:none;}@media only screen and (min-width : 768px) {.cross-browser{font-weight:normal;display:block\9;color:#85888e;}}::selection{background:#c9c6eb;}::-moz-selection{background:#c9c6eb;}.btn{font-size:18px;padding:8px 30px;border-radius:5px;border-radius:4px;}.btn-default{background-color:transparent;}.btn-basic{max-width:240px;padding:18px;}.smarty-tag{display:none!important;}.smarty-popup{height:auto!important;border:1px solid #e5e5e5;}.smarty-popup-header,.smarty-choice,.smarty-suggestion{font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:14px;}a.smarty-suggestion{line-height:18px;padding:4px;}@media (max-width : 767px) {a.smarty-suggestion{font-size:16px;line-height:32px;padding:4px;}}.smarty-popup-header{font-weight:700;line-height:auto;height:auto;padding:12px;text-transform:none;background:#e5e5e5;}.smarty-choice-list .smarty-choice{color:#333;}.smarty-choice-list .smarty-choice:hover{color:#eee;background-color:#6dac45;}.smarty-choice-alt{border:none;}.smarty-choice-alt .smarty-choice-abort,.smarty-choice-override{padding:6px 15px;}.smarty-choice-abort:hover{}a.btn.smarty-choice{margin:8px;color:#fff;}.smarty-choice-override{display:none!important;}.smarty-popup-close{top:5px;text-transform:none;}.smarty-popup-close .glyphicon{font-size:18px;}.line_two{font-size:12px;font-weight:400;}@media only screen and (max-width : 767px) {.xs-center{text-align:center;}.btn-basic{margin-right:auto!important;margin-left:auto!important;}}.btn-success{background:#6dac45;}.header-search .first-input{border-radius:4px 0 0 4px;}select{border-radius:0!important;}.btn-success{background:#6dac45;}@media only screen and (min-width : 768px) {.no-pad-left{padding-left:0;}.no-pad-right{padding-right:0;}}#topWrapper{background:none;background:-moz-linear-gradient(top,rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%);background:-webkit-linear-gradient(top,rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%);background:linear-gradient(to bottom,rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#a6000000',endColorstr='#00000000',GradientType=0);}@media only screen and (min-width : 768px) {#header{padding:0 0 225px 0;background:#e0e0e0 url('//frcdn.beenverified.com/assets/img/8b7300a655b0177dc4e32b09ab49d08c.jpg') no-repeat;background-position:center center;background-size:cover;}}@media only screen and (max-width : 767px) {#header{padding-bottom:100px;background:url('//frcdn.beenverified.com/assets/img/a532036313ff2decdf62076153f69319.jpg') no-repeat;background-position:right center;background-size:cover;}}#header .btn-login,#header .btn-register{font-size:16px;padding:6px 12px;text-align:center;border-radius:2px;}#header .btn-login{color:#fff;border:1px solid #e2ddd9;}#header .btn-register{color:#21201f;border:1px solid #fff;background-color:#fff;}#header .btn-login:hover,#header .btn-login:focus{color:#000;border-color:#fff;background:#fff;}#header .btn-register:hover,#header .btn-register:focus{color:#fff;border-color:#72c83c;background:#72c83c;}@media only screen and (max-width : 767px) {#header .btn-login,#header .btn-register{padding-top:16px;padding-bottom:16px;}}.navbar{min-height:65px;margin-bottom:100px;padding:0;border:none;background-color:transparent;}@media only screen and (max-width : 767px) {.navbar{margin-bottom:20px;}}.navbar-brand{height:auto;background-color:none}.navbar-brand:hover,.navbar-brand:focus{}.navbar-logo img{padding-top:5px;display:block;width:180px;height:30px;}.navbar-default .navbar-toggle{min-width:44px;min-height:40px;margin:15px 0;border-color:transparent;}#nav-icon-open{display:none;color:white;}.navbar-default .navbar-toggle:focus,.navbar-default .navbar-toggle:hover{border-color:#fff;background:transparent;}html.touchevents .navbar-default .navbar-toggle:hover,html.touchevents .navbar-default .navbar-toggle:focus{border-color:transparent;}.navbar-default .navbar-toggle .icon-bar{background-color:#fff;}.navbar-nav{margin:10px 0 0;}.nav-btn{margin:5px 5px 0;}@media (max-width: 767px) {#topWrapper{background:none;}.navbar{margin-bottom:20px;}.navbar-logo img{width:150px;min-height:20px;}.main-wrap{margin-bottom:-100px;}}@media only screen and (max-width : 767px) {.navbar-collapse{padding-right:0;padding-left:0;}}.navbar-default .navbar-collapse,.navbar-default .navbar-form{margin-bottom:15px;border-top:none;box-shadow:none;}.home-carousel-indicator{padding:0 5px;}.nav-phone{font-size:16px;font-weight:400;margin:0;padding:12px 5px 0;text-decoration:none;color:#fff;text-decoration-color:#fff!important;}.nav-phone a{text-decoration:none;color:#fff;text-decoration-color:#fff!important;}@media only screen and (max-width : 767px) {.nav-phone{line-height:60px;margin-bottom:12px;padding:0;}}.seal{margin-top:-80px;}.box-header img{width:70px;height:auto;float:right;margin-right:20px;margin-top:20px;}.home-search .box-header{min-height:100px;margin-bottom:60px;}@media (max-width: 992px) {.home-search .box-header{margin-bottom:40px;}.seal{margin-top:-100px;}.seal img{width:120px;}}@media (max-width: 767px) {.home-search .box-header{min-height:50px;}.box-header img{width:100px;margin-top:0;}.box-header .col-xs-9{width:80%;}}@media (max-width: 630px) {.box-header .col-xs-9{width:70%;}.box-header img{margin-top:10px;}}@media (max-width: 430px) {.box-header .col-xs-9{width:50%;}.box-header img{margin-top:20px;}}.home-search .box-header h1,.home-search .box-header .huge{font-size:60px;font-weight:bold;margin:0 0 5px;text-align:center;color:#fff;}.home-search .box-header p{font-size:24px;font-weight:400;margin:0;text-align:center;color:#fff;}@media only screen and (max-width : 767px) {#home-search-carousel .carousel-inner .item{min-height:280px;}.home-search .box-header h1{text-align:left;}}#counter{font-size:37px;color:#fff;}.counter-number{font-weight:bold;margin-right:14px;margin-left:9px;padding:15px;padding-right:0;letter-spacing:5px;border:1px solid #fff;}@media only screen and (max-width : 992px) {.counter-number,.counter-text{font-size:30px;}}@media only screen and (max-width : 767px) {.counter-number,.counter-text{display:block;}.counter-number{display:inline-block;margin:40px 10px 10px;}.counter-number,.counter-text{font-size:21px;}.counter-number{padding:15px;}}.search-form{min-height:161px;margin:0;padding:30px;padding-bottom:25px;border-radius:5px;background:url('//frcdn.beenverified.com/assets/img/d00feeb44e18b63f198246a26fe2b860.png') repeat-y;background-position:-1400px 0;}@media only screen and (max-width : 767px) {.search-form{padding:0;border:none;border-radius:0;background:none;}}.home-carousel-wrapper{margin-bottom:20px;}.home-carousel-indicator{font-size:15px;font-weight:400;margin:0;padding:5px 10px;color:#fff;border:none;border-radius:2px;background:transparent;}.home-carousel-indicator:hover,.home-carousel-indicator:focus{text-decoration:none;color:#fff;border-bottom:2px solid #6dac45;border-radius:0;background:transparent;}.home-carousel-indicator.active{color:#fff;border-bottom:2px solid transparent;background:#6dac45;}@media only screen and (max-width : 767px) {.home-carousel-indicator{padding-right:0;padding-left:0;}.home-carousel-indicator.active{padding-right:0;padding-left:0;border-bottom:2px solid #6dac45;background:transparent;}}.search-form .privacy{padding-top:5px;}.search-form .privacy img{width:13px;height:16px;}.search-form .privacy span{font-size:16px;margin-left:5px;padding-top:5px;vertical-align:middle;color:#85888e;}#header-search .field-group{min-height:50px;border-radius:3px 0 0 3px;background:#fff;}.header-search input,.header-search select{font-size:20px;font-weight:300;line-height:50px;height:50px;padding:0 10px;border:none;border-left:1px #dedfe2 solid;border-radius:0!important;box-shadow:none;}.header-search select{padding:10px \9;}@media (-webkit-min-device-pixel-ratio:0) {.header-search select{background-image:url('//frcdn.beenverified.com/assets/img/3b5861418b05608c5e9c28af2275db3d.png');background-repeat:no-repeat;background-position:right center;-webkit-appearance:none;}}.header-search input:focus,.header-search select:focus{border:1px solid #4198d6;}.header-search label.error{font-size:14px;font-weight:400;max-width:100%;margin-top:8px;color:#f77c89;}.header-search input.error{border-top:3px solid #eb3e51;border-bottom:3px solid #fff;background-image:url('//frcdn.beenverified.com/assets/img/f78f9daf80a1b4c4eb24b7b52c43adfc.png');background-repeat:no-repeat;background-position:right center;background-size:26px 18px;}.label-success{display:none!important;}input.success{background-image:url('//frcdn.beenverified.com/assets/img/dd56fb31c112c1190e6af599814bc54f.png');background-repeat:no-repeat;background-position:right center;background-size:24px 16px;}.header-search .btn-search{font-size:20px;height:50px;border-radius:0 3px 3px 0;background:#5c9637;}.header-search .btn-search:hover,.header-search .btn-search:focus{border:none;border-bottom:3px solid #398439;background:#72c83c;}@media (max-width : 767px) {.header-search input,.header-search select,.header-search .btn-search{height:60px;margin-top:6px;}}.logos{margin:10px 0 125px;}.press-logos{width:615px;height:42px;}#background-checks:before{position:absolute;z-index:1;top:-100px;left:0;width:100%;height:200px;content:'';-webkit-transform:skewY(-2.5deg);-moz-transform:skewY(-2.5deg);-ms-transform:skewY(-2.5deg);-o-transform:skewY(-2.5deg);transform:skewY(-2.5deg);-webkit-backface-visibility:hidden;-moz-backface-visibility:hidden;backface-visibility:hidden;outline:1px solid transparent;background:#fff;}@media (max-width:767px) {#background-checks:before{top:-40px;height:120px;}}#background-checks{position:relative;width:100%;padding-top:20px;padding-bottom:40px;}#background-checks .container{position:relative;z-index:99;overflow-x:hidden;padding-right:0;}#background-checks .box-header{padding-right:15px;}#background-checks .box-header,#testimonials .box-header{margin-bottom:50px;}#background-checks .box-header h1,#background-checks .box-header .huge{font-size:42px;font-weight:400;margin-bottom:5px;text-align:center;color:#484848;}@media only screen and (max-width : 992px) {h1,.huge{font-size:36px!important;line-height:42px!important;}.huge{font-size:28px!important;line-height:34px!important;}}#background-checks .box-header p{font-size:22px;font-weight:300;margin:0;text-align:center;color:#888;}#background-checks .box-text{margin-bottom:50px;}#background-checks .box-text p{font-size:18px;color:#888;font-weight:300;line-height:25px;}#background-checks .box-contents{overflow:hidden;}#background-checks .box-contents h2{font-size:22px;font-weight:400;margin-bottom:10px;text-align:left;color:#6dac45;}@media only screen and (max-width : 992px) {#background-checks .box-contents h2,#testimonials .box-contents h2{font-size:18px;line-height:20px;}}#background-checks .box-contents p{font-size:18px;font-weight:400;margin:0;color:#888;}#background-checks .screenshot-resp{margin:0 -15px 0 15px;}#background-checks .box-button{margin-left:0;}#background-checks .btn-default{margin:40px 0;}#animate{}#background-checks .bullet-one,#background-checks .bullet-two,#background-checks .bullet-three,#background-checks .bullet-four{position:relative;left:-900px;display:block;}.screenshot{position:relative;top:80px;display:block;max-width:440px;-webkit-transform:scale(0.9);-ms-transform:scale(0.9);transform:scale(0.9);}@media (min-width : 768px) and (max-width:992px) {.screenshot{width:100%;}}.screenshot-small-wrapper{position:relative;}.screenshot-small{position:absolute;top:45px;max-width:410px;}#bvpro{padding-top:80px;padding-bottom:180px;border-top:1px solid #cecfd5;background-color:#edf0f4;}#bvpro .container{position:relative;z-index:999;}#bvpro .box-header h1,#bvpro .box-header .huge{font-size:50px;line-height:55px;margin-bottom:20px;color:#484848;}#bvpro .box-header p{font-size:22px;font-weight:300;line-height:25px;margin-bottom:30px;color:#484848;}#bvpro .box-contents{margin-bottom:30px;}#bvpro .box-contents h2{font-size:24px;font-weight:500;line-height:25px;margin-bottom:10px;color:#484848;}#bvpro .box-contents li{font-size:18px;font-weight:300;margin-bottom:5px;}#bvpro .box-contents .bvproicon{margin-top:40px;text-align:right;}#bvpro .bvproicon img{height:150px;width:auto;}@media (max-width:992px) {#bvpro{padding-bottom:160px!important;}#bvpro .bvproicon img{height:135px;width:auto;}}@media (max-width:767px) {#bvpro .box-header h1,#bvpro .box-header .huge{font-size:34px;line-height:40px;}#bvpro .box-header p{font-size:18px;}#bvpro .box-contents h2{font-size:22px;}#bvpro .box-contents li{font-weight:300;font-size:16px;}#bvpro .box-contents .bvproicon{margin-top:40px;text-align:right;}#bvpro .bvproicon img{width:auto;height:120px;}}@media (max-width:767px) {.app-bundle-img{}}#app .box-header h1,#app .box-header .huge{font-size:50px;line-height:55px;margin-bottom:20px;color:#484848;}#app .box-header p{font-size:22px;font-weight:300;line-height:25px;margin-bottom:30px;color:#484848;}#app .box-contents p{font-size:18px;font-weight:300;line-height:25px;color:#484848;}#app .box-contents a{text-decoration:none;text-decoration:none;color:#c7c7c7;}#app .box-contents p.small{font-size:14px;line-height:18px;margin-bottom:40px;}#app i.star{font-size:18px;opacity:0;color:#ffc050;}#app .box-app-img{position:relative;overflow:hidden;max-width:400px;min-height:477px;margin-right:auto;margin-left:auto;}#app .app-bundle-img{position:absolute;top:477px;left:0;}#app .app-one{z-index:1;}#app .app-two{z-index:2;}#app .app-three{z-index:3;}#app .app-four{z-index:4;}#app .app-resp{margin:0 25px 0 -15px;}#app .app-review-wrapper{margin-top:20px;padding-top:15px;border-top:1px solid #dedede;}.app-button{position:relative;z-index:9999;display:block;width:100%;max-width:240px;height:100%;margin-bottom:15px;background-color:transparent;}.app-button:hover,.app-button:focus{}.app-button img{width:auto;max-height:60px;}@media (max-width:767px) {.app-button{margin-right:auto;margin-left:auto;}.app-button img{width:180px;height:auto;margin-right:auto;margin-left:auto;}.testimonials-container{background:#292553 url('//frcdn.beenverified.com/assets/img/53345ba121b2208f49d73541491697f0.jpg') no-repeat top center;}#app .box-app-img{width:240px;min-height:300px;}}#app{position:relative;z-index:100;width:100%;padding-top:20px;padding-bottom:100px;background-color:#fff;}@media (max-width : 767px) {#app{margin-top:25px;}}#app.slant:before{position:absolute;z-index:1;bottom:450px;left:0;width:100%;height:200px;content:'';transition:1.0s;-webkit-transform:skewY(-2.5deg);-moz-transform:skewY(-2.5deg);-ms-transform:skewY(-2.5deg);-o-transform:skewY(-2.5deg);transform:skewY(-2.5deg);-webkit-backface-visibility:hidden;-moz-backface-visibility:hidden;backface-visibility:hidden;outline:1px solid transparent;background:#fff;}#app.no-slant:before{position:absolute;z-index:1;bottom:0;left:0;width:100%;height:200px;content:'';transition:1.0s;-webkit-transform:skewY(0deg);-moz-transform:skewY(0deg);-ms-transform:skewY(0deg);-o-transform:skewY(0deg);transform:skewY(0deg);background:#fff;}@media (max-width : 767px) {#app.slant:before{top:-40px;}#app.no-slant:before{top:-40px;height:0;}}#app .container{position:relative;z-index:99;}@media (min-width:768px) {.testimonials-container{background:#292553 url('//frcdn.beenverified.com/assets/img/3b41894bb66f894427e9123854133960.jpg') no-repeat top center;background-position:left top;background-position:center top\9;background-size:cover;}}.testimonials-container{position:relative;z-index:99;margin-top:-195px;padding:195px 0 150px 0;}@media (max-width:992px) {.testimonials-container{padding:115px 0 80px 0;}.app-bundle-img{}}#testimonials:before{position:absolute;z-index:1;top:-100px;left:0;width:100%;height:200px;content:'';-webkit-transform:skewY(2.5deg);-moz-transform:skewY(2.5deg);-ms-transform:skewY(2.5deg);-o-transform:skewY(2.5deg);transform:skewY(2.5deg);-webkit-backface-visibility:hidden;-moz-backface-visibility:hidden;backface-visibility:hidden;outline:1px solid transparent;background:#edf0f4;}#test #testimonials .box-header{margin-bottom:50px;}#testimonials .box-header h1,#testimonials .box-header .huge{font-size:42px;font-weight:400;margin-bottom:5px;text-align:center;color:#fff;}#testimonials .box-header p{font-size:22px;font-weight:300;margin:0;text-align:center;color:#fff;}#testimonials .box-contents h2{font-size:20px;font-weight:400;margin:0 0 5px;color:#6dac45;}#testimonials .box-contents h3{font-size:18px;font-weight:400;margin:0 0 15px;color:#797f93;}#testimonials .box-contents .testi-contents{font-size:16px;font-weight:300;min-height:150px;margin:0;margin-bottom:20px;padding-bottom:30px;color:#fff;background:url('//frcdn.beenverified.com/assets/img/b1326f9af4d2e343db8867e82065185d.png') no-repeat 0 bottom;}@media (max-width : 979px) {#testimonials .box-contents .testi-contents{min-height:190px;}}#testimonials .testi-contents.testi-1{background-position:-185px bottom;}#testimonials .testi-contents.testi-2{background-position:-125px bottom;}#testimonials .testi-contents.testi-3{background-position:-55px bottom;}#testimonials .testi-contents.testi-4{background-position:5px bottom;}#testimonials .box-contents .testi-contents.press-1{background-position:-185px bottom;}#testimonials .box-contents .testi-contents.press-2{background-position:-90px bottom;}#testimonials .box-contents .testi-contents.press-3{background-position:-10px bottom;}#testimonials img{max-height:50px;cursor:pointer;cursor:hand;}#testimonials .testi-press img{max-height:16px;}@media (max-width : 992px) {#testimonials .testi-press img{max-height:15px;}}#testimonials .btn-default{margin-top:20px;color:#fff;}.testimonial-photo,.testi-press{opacity:0.33;}.testimonial-photo.active,.testi-press.active{opacity:1;}.testi-press{display:inline-block;margin:14px auto;}.inline-video{position:relative;overflow:hidden;}.inline-video iframe,.inline-video video{position:absolute;top:0;right:0;bottom:0;left:0;}.inline-video iframe{width:100%;height:100%;}.inline-video video{width:100%;}.inline-video__teaser-video{width:100%;height:auto;}.inline-video__media{width:100%;height:auto;}.video-play-btn{width:142px;height:142px;}.inline-video__play-trigger{position:absolute;z-index:5;top:50%;left:50%;margin-top:-91px;margin-left:-91px;padding:20px 20px;-webkit-transition:background 0.5s;-moz-transition:background 0.5s;transition:background 0.5s;text-align:center;text-decoration:none;border-radius:50%;background:rgba(0,0,0,0.3);}@media (max-width : 767px) {.video-play-btn{width:100%;max-width:71px;max-height:71px;}.inline-video__play-trigger{margin-top:-55px;margin-left:-55px;}}.inline-video__play-trigger:hover{background:rgba(74,18,166,0.5);}.inline-video__close-trigger{position:absolute;z-index:99;top:20px;right:20px;width:30px;height:30px;padding:6px;-webkit-transition:background 0.3s;-moz-transition:background 0.3s;transition:background 0.3s;text-align:center;text-decoration:none;color:white;border:none;border-radius:50%;background:#4a12a6;}.inline-video__close-trigger:hover{cursor:pointer;background:#363636;}#testimonials .btn-basic:hover,#testimonials .btn-basic:focus,#video .btn-basic:hover,#video .btn-basic:focus{border:1px solid #504e81!important;background:#1f1b4b;}#timeline .box-header{margin-bottom:50px;}#timeline .box-header h1,#timeline .box-header .huge{font-size:42px;font-weight:400;margin-bottom:5px;text-align:center;color:#484848;}#timeline .box-header p{font-size:22px;font-weight:300;margin:0;text-align:center;color:#888;}.timeline-box{position:relative;}.timeline-box img,.timeline-box span{opacity:0;}.timeline-box img{width:51px;height:51px;}.timeline-box span{display:inline-block;margin-top:50px;}.timeline-box span{font-size:18px;margin:20px;color:#888;}#timeline .graph-dots{margin-top:-28px;}@media (max-width : 767px) {#cta .backToTop{display:block;margin-top:20px;}}#cta .backToTop:hover,#cta .backToTop:focus{background:#72c83c;}#cta{padding:100px 0 90px;background:#353167;}#cta p{font-size:20px;font-weight:300;color:#fff;}#cta a{margin-right:10px;margin-left:10px;}#footer{padding-top:80px;padding-bottom:80px;color:#747b91;}@media (max-width : 767px) {#footer{padding-top:0;}}.carla-wrapper{position:relative;}.carla-box{position:absolute;right:0;bottom:0;overflow-y:hidden;min-height:60px;}.carla{position:absolute;right:0;bottom:0;width:55px;height:60px;}.carla-hand{position:absolute;right:22px;bottom:-18px;width:58px;height:18px;}.carla-quote{}.footer-links{margin-bottom:75px;}#footer h4{font-size:22px;font-weight:bold;margin-bottom:10px;color:#484848;}#footer .customer-service-wrapper{margin-bottom:30px;padding:20px 20px 10px;border:1px solid #cecfd5;border-radius:4px;background-color:#edf0f4;}#footer .footer-link-group{padding-top:20px;}@media (max-width: 1200px) {}@media (max-width : 979px) {}@media (max-width : 767px) {#footer h4{font-size:18px;margin-top:20px;margin-bottom:12px;}#footer .customer-service-wrapper{margin-top:0;margin-bottom:30px;padding-top:30px;padding-bottom:20px;border:none;border-bottom:1px solid #cecfd5;border-radius:0;background-color:#edf0f4;}}#footer p{font-size:14px;font-weight:400;color:#747b91;}#footer ul{margin:0;padding:0;list-style:none;}#footer li{margin-bottom:4px;color:#747b91;}#footer a{color:#747b91;}#footer a:hover,#footer a:focus{text-decoration:none;color:#006cd2;}@media (max-width : 767px) {#footer ul a{line-height:40px;}}.social-links{margin-top:15px;margin-bottom:40px;}.social-links img{max-width:22px;margin-right:5px;}@media (min-width : 768px) {social-links{text-align:center;}}@media (max-width : 767px) {.social-links img{width:100%;max-width:40px;}}.border-bottom{margin-top:20px;border-bottom:1px solid #cecfd5;}#footer .email-address a,#footer .phone-number a{color:#006cd2;}#footer .phone-number{color:#333;}#footer i.star{font-size:18px;opacity:0;color:#ffc050;}.disclaimer{margin-top:20px;margin-bottom:40px;}@media (max-width : 1200px) {}@media (max-width : 979px) {}@media (max-width : 767px) {body{font-size:16px;}.home-search .box-header h1,.home-search .box-header .huge{font-size:40px;}.home-search .box-header{margin-bottom:40px;}#header-search .field-group{border-radius:3px;}.header-search .btn-search{border-radius:3px;}#background-checks .box-header{margin-bottom:15px;}#background-checks .box-contents p{font-size:16px;}#background-checks .box-button{margin-right:0;margin-left:-15px;}#background-checks .btn-default{margin:20px 0;}#app{padding-bottom:190px;}#app .box-header{margin-bottom:25px;}#app .box-header h1,#app .box-header .huge{font-size:23px;line-height:22px;margin:0;text-align:center;}#testimonials{padding:160px 0 50px;}@media only screen and (max-width : 480px) {
    #testimonials {
      padding-bottom: 30px;
    }
  }
  #testimonials .box-header h1,
  #testimonials .box-header .huge {
    font-size: 23px;
    line-height: 22px;
    /*margin: 0;*/

    text-align: center;
  }
  .graph-dots {
    margin: 0 auto;
  }
  #timeline .box-header h1,
  #timeline .box-header .huge {
    font-size: 23px;
    line-height: 22px;

    margin: 0;

    text-align: center;
  }
  #timeline .box-header p {
    font-size: 18px;

    margin: 15px 0;
  }
  .timeline-box {
    height: 65px;
  }
  .timeline-box img {
    position: absolute;
    top: 60px;
    left: 7px;

    width: 30px;
    height: 30px;
  }
  .timeline-box span {
    font-size: 16px;

    position: absolute;
    top: 60px;
    left: 55px;

    display: block;

    margin: 0;

    text-align: left;
  }
  .graph-vert {
    position: absolute;

    padding-left: 20px;
  }
  #footer,
  #footer p,
  #app .box-contents p.small {
    font-size: 15px;
  }
  #app .box-contents p.small {
    line-height: 21px;
  }
}
@media only screen and (max-width : 480px) {
}
@media only screen and (max-width : 320px) {
}

.pro-search {
  margin-bottom: 0px;
  margin-top: 15px;
}

.pro-search a {
  color: #ffffff;
  cursor: pointer;
}

@media (max-width : 767px) {
  .pro-search {
    display: block;
    text-align: center;
    background: #353167;
    padding: 30px;
  }
  .pro-search span {
    text-decoration: underline;
  }
}
</style>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

	<!--[if lt IE 9]>

	<script src="js/html5shiv.js"></script>

	<script src="js/respond.min.js"></script>

	<![endif]-->

</head>



<body>

	<!--PRE LOADING-->



	<!--BANNER AND SERACH BOX-->

	<section id="background" class="dir1-home-head">

		<div class="container">

			<div class="row">

				<div class="col-md-6 col-sm-6 col-xs-12">

					<div class="dir-ho-tl">

						<ul>

							<li>

								<a href="/"><img src="speedyHunt.png" alt=""> </a>

							</li>

						</ul>

					</div>

				</div>

				<div class="col-md-6 col-sm-6">

					<div class="dir-ho-tr">

						<ul>

							 <?php  if (App::Auth()->is_User()) {
	
								echo '
	<li><a href="Account.php" class="v3-menu-sign"><i class="fa fa-user-circle"></i>My Account</a> </li>
	<li><a href="signout.php" class="v3-menu-sign"><i class="fa fa-sign-out"></i>Sign Out</a> </li>';
} else { echo ' <li><a href="login.php"  class="v3-menu-sign"><i class="fa fa-sign-in"></i>Sign In</a> </li>
				<li><a href="register.php"  class="v3-menu-sign"><i class="fa fa-user"></i>Register</a> </li>

								'; }
								?>

							<!--<li><a href="price.html"><i class="fa fa-plus" aria-hidden="true"></i> Add Listing</a> </li>-->

						</ul>

					</div>

				</div>

			</div>

		</div>

		<div class="container dir-ho-t-sp">

			<div class="row">

				<div class="dir-hr1">

					<div class="dir-ho-t-tit">

						<h1>People Search Engine</h1> </div>

					<div class="home-tab-search">

						

                      

                      

                      

                      

                                    

          <style>

		  .dir-ho-t2l {

			 width:100% !important;

			 float:left;

		  }

		  .dir-ho-t2l form ul li input[type="submit"] {

			  margin-left:10px;

			  width:100px;

		  }

		  </style>                          

                             <div id="home-search-carousel" class="search-form" data-interval="false" style="background-position: 0px 0px;">
<div class="row">
<div class="col-sm-12">
<div class="row home-carousel-wrapper">
<ul class="nav nav-tabs">

							<li class="active"><a data-toggle="tab" href="#homepeople"><i class="fa fa-search" aria-hidden="true"></i>People </a> </li>

							<li><a data-toggle="tab" href="#menu1people"><i class="fa fa-envelope" aria-hidden="true"></i> Phone </a> </li>

							<li><a data-toggle="tab" href="#menu2people"><i class="fa fa-phone" aria-hidden="true"></i>  Email </a> </li>

							<!--<li><a data-toggle="tab" href="#menu3people"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Arrests</a> </li>

                            <li><a data-toggle="tab" href="#menu4people"><i class="fa fa-eye-slash" aria-hidden="true"></i> Sex Offender</a> </li>

                            <li><a data-toggle="tab" href="#menu5people"><i class="fa fa-internet-explorer" aria-hidden="true"></i> Domain</a> </li>
                              <li><a data-toggle="tab" href="#menu6people"><i class="fa fa-users" aria-hidden="true"></i> Username</a> </li>-->

                           

						</ul>


</div>
</div>

<div class="carousel-inner">

<div class="item active" id="homepeople">
<form action="prelim-report/psearch.php" id="header-search-people" class="header-search">
<div class="row">
<div class="col-sm-9 col-no-padding">
<div class="field-group">
<div class="row">
<div class="col-sm-4 no-pad-right">
<label class="cross-browser" for="fn">First Name</label>
<input type="text" name="fn" placeholder="First Name" id="fn" class="form-control first-input focus-me" data-placeholder-focus="false" style="background:#fff;" required>

</div>
<div class="col-sm-4 no-pad-left no-pad-right">
<label class="cross-browser" for="ln">Last Name</label>
<input type="text" name="ln" placeholder="Last Name" id="ln" class="form-control " data-placeholder-focus="false" style="background:#fff;" required>

</div>
<div class="col-sm-4 no-pad-left no-pad-right">
<label class="cross-browser" for="state">State</label>
<select name="state" class="form-control">
<option value="All">All States</option>
<option value="AL">Alabama</option>
<option value="AK">Alaska</option>
<option value="AZ">Arizona</option>
<option value="AR">Arkansas</option>
<option value="CA">California</option>
<option value="CO">Colorado</option>
<option value="CT">Connecticut</option>
<option value="DE">Delaware</option>
<option value="DC">District Of Columbia</option>
<option value="FL">Florida</option>
<option value="GA">Georgia</option>
<option value="HI">Hawaii</option>
<option value="ID">Idaho</option>
<option value="IL">Illinois</option>
<option value="IN">Indiana</option>
<option value="IA">Iowa</option>
<option value="KS">Kansas</option>
<option value="KY">Kentucky</option>
<option value="LA">Louisiana</option>
<option value="ME">Maine</option>
<option value="MD">Maryland</option>
<option value="MA">Massachusetts</option>
<option value="MI">Michigan</option>
<option value="MN">Minnesota</option>
<option value="MS">Mississippi</option>
<option value="MO">Missouri</option>
<option value="MT">Montana</option>
<option value="NE">Nebraska</option>
<option value="NV">Nevada</option>
<option value="NH">New Hampshire</option>
<option value="NJ">New Jersey</option>
<option value="NM">New Mexico</option>
<option value="NY">New York</option>
<option value="NC">North Carolina</option>
<option value="ND">North Dakota</option>
<option value="OH">Ohio</option>
<option value="OK">Oklahoma</option>
<option value="OR">Oregon</option>
<option value="PA">Pennsylvania</option>
<option value="PR">Puerto Rico</option>
<option value="RI">Rhode Island</option>
<option value="SC">South Carolina</option>
<option value="SD">South Dakota</option>
<option value="TN">Tennessee</option>
<option value="TX">Texas</option>
<option value="UT">Utah</option>
<option value="VT">Vermont</option>
<option value="VA">Virginia</option>
<option value="WA">Washington</option>
<option value="WV">West Virginia</option>
<option value="WI">Wisconsin</option>
<option value="WY">Wyoming</option>
 </select>
</div>
</div>
</div>
</div>
<div class="col-sm-3 no-pad-left">
<label class="cross-browser">&nbsp;</label>
<button class="btn btn-block btn-success btn-search velocity-animating" type="submit" style="background: linear-gradient(to bottom, #455ca2, #263a78);">Search</button>
</div>
</div>
</form>
</div>

<div class="item" id="menu1people">

<form action="phone.php" id="header-search-phone" rel="nofollow" class="header-search" role="form" method="get" name="record_search_form">
<div class="row">
<div class="col-sm-9 no-pad-right">
<label class="cross-browser" for="phone">Phone Number</label>
<input type="tel" maxlength="16" name="phone" placeholder="Enter Phone Number" id="phone" class="form-control first-input" data-placeholder-focus="false" style="background:#fff;" pattern="(?:\(\d{3}\)|\d{3})[- ]?\d{3}[- ]?\d{4}" required>

</div>
<div class="col-sm-3 no-pad-left">
<label class="cross-browser">&nbsp;</label>
<button class="btn btn-block btn-success btn-search velocity-animating" type="submit" style="background: linear-gradient(to bottom, #455ca2, #263a78);">Search</button>
</div>
</div>
</form>
</div>

<div class="item" id="menu2people">
<form action="email.php" id="header-search-email" rel="nofollow" class="header-search" role="form" method="get" name="email_search">
<div class="row">
<div class="col-sm-9 col-no-padding no-pad-right">
<label class="cross-browser" for="emailaddress">Email Address</label>
<input type="email" name="email" placeholder="Enter Email Address" id="emailaddress" class="form-control first-input" data-placeholder-focus="false" style="background:#fff;" required>

</div>
<div class="col-sm-3 no-pad-left">
<label class="cross-browser">&nbsp;</label>
<button class="btn btn-block btn-success btn-search velocity-animating" type="submit" style="background: linear-gradient(to bottom, #455ca2, #263a78);">Search</button>
</div>
</div>
</form>
</div>
<!--
<div class="item" id="menu3people">
<form action="prelim-report/asearch.php" id="header-search-people" class="header-search">
<div class="row">
<div class="col-sm-9 col-no-padding">
<div class="field-group">
<div class="row">
<div class="col-sm-4 no-pad-right">
<label class="cross-browser" for="fn">First Name</label>
<input type="text" name="fn" placeholder="First Name" id="fn" class="form-control first-input focus-me" data-placeholder-focus="false" style="background:#fff;" required>

</div>
<div class="col-sm-4 no-pad-left no-pad-right">
<label class="cross-browser" for="ln">Last Name</label>
<input type="text" name="ln" placeholder="Last Name" id="ln" class="form-control " data-placeholder-focus="false" style="background:#fff;" required>

</div>
<div class="col-sm-4 no-pad-left no-pad-right">
<label class="cross-browser" for="state">State</label>
<select name="state" class="form-control">
<option value="All">All States</option>
<option value="AL">Alabama</option>
<option value="AK">Alaska</option>
<option value="AZ">Arizona</option>
<option value="AR">Arkansas</option>
<option value="CA">California</option>
<option value="CO">Colorado</option>
<option value="CT">Connecticut</option>
<option value="DE">Delaware</option>
<option value="DC">District Of Columbia</option>
<option value="FL">Florida</option>
<option value="GA">Georgia</option>
<option value="HI">Hawaii</option>
<option value="ID">Idaho</option>
<option value="IL">Illinois</option>
<option value="IN">Indiana</option>
<option value="IA">Iowa</option>
<option value="KS">Kansas</option>
<option value="KY">Kentucky</option>
<option value="LA">Louisiana</option>
<option value="ME">Maine</option>
<option value="MD">Maryland</option>
<option value="MA">Massachusetts</option>
<option value="MI">Michigan</option>
<option value="MN">Minnesota</option>
<option value="MS">Mississippi</option>
<option value="MO">Missouri</option>
<option value="MT">Montana</option>
<option value="NE">Nebraska</option>
<option value="NV">Nevada</option>
<option value="NH">New Hampshire</option>
<option value="NJ">New Jersey</option>
<option value="NM">New Mexico</option>
<option value="NY">New York</option>
<option value="NC">North Carolina</option>
<option value="ND">North Dakota</option>
<option value="OH">Ohio</option>
<option value="OK">Oklahoma</option>
<option value="OR">Oregon</option>
<option value="PA">Pennsylvania</option>
<option value="PR">Puerto Rico</option>
<option value="RI">Rhode Island</option>
<option value="SC">South Carolina</option>
<option value="SD">South Dakota</option>
<option value="TN">Tennessee</option>
<option value="TX">Texas</option>
<option value="UT">Utah</option>
<option value="VT">Vermont</option>
<option value="VA">Virginia</option>
<option value="WA">Washington</option>
<option value="WV">West Virginia</option>
<option value="WI">Wisconsin</option>
<option value="WY">Wyoming</option>
 </select>
</div>
</div>
</div>
</div>
<div class="col-sm-3 no-pad-left">
<label class="cross-browser">&nbsp;</label>
<button class="btn btn-block btn-success btn-search velocity-animating" type="submit" style="background: linear-gradient(to bottom, #455ca2, #263a78);">Search</button>
</div>
</div>
</form>
</div>

<div class="item" id="menu4people">
<form action="prelim-report/ssearch.php" id="header-search-people" class="header-search">
<div class="row">
<div class="col-sm-9 col-no-padding">
<div class="field-group">
<div class="row">
<div class="col-sm-4 no-pad-right">
<label class="cross-browser" for="fn">First Name</label>
<input type="text" name="fn" placeholder="First Name" id="fn" class="form-control first-input focus-me" data-placeholder-focus="false" style="background:#fff;" required>

</div>
<div class="col-sm-4 no-pad-left no-pad-right">
<label class="cross-browser" for="ln">Last Name</label>
<input type="text" name="ln" placeholder="Last Name" id="ln" class="form-control " data-placeholder-focus="false" style="background:#fff;" required>

</div>
<div class="col-sm-4 no-pad-left no-pad-right">
<label class="cross-browser" for="state">State</label>
<select name="state" class="form-control">
<option value="All">All States</option>
<option value="AL">Alabama</option>
<option value="AK">Alaska</option>
<option value="AZ">Arizona</option>
<option value="AR">Arkansas</option>
<option value="CA">California</option>
<option value="CO">Colorado</option>
<option value="CT">Connecticut</option>
<option value="DE">Delaware</option>
<option value="DC">District Of Columbia</option>
<option value="FL">Florida</option>
<option value="GA">Georgia</option>
<option value="HI">Hawaii</option>
<option value="ID">Idaho</option>
<option value="IL">Illinois</option>
<option value="IN">Indiana</option>
<option value="IA">Iowa</option>
<option value="KS">Kansas</option>
<option value="KY">Kentucky</option>
<option value="LA">Louisiana</option>
<option value="ME">Maine</option>
<option value="MD">Maryland</option>
<option value="MA">Massachusetts</option>
<option value="MI">Michigan</option>
<option value="MN">Minnesota</option>
<option value="MS">Mississippi</option>
<option value="MO">Missouri</option>
<option value="MT">Montana</option>
<option value="NE">Nebraska</option>
<option value="NV">Nevada</option>
<option value="NH">New Hampshire</option>
<option value="NJ">New Jersey</option>
<option value="NM">New Mexico</option>
<option value="NY">New York</option>
<option value="NC">North Carolina</option>
<option value="ND">North Dakota</option>
<option value="OH">Ohio</option>
<option value="OK">Oklahoma</option>
<option value="OR">Oregon</option>
<option value="PA">Pennsylvania</option>
<option value="PR">Puerto Rico</option>
<option value="RI">Rhode Island</option>
<option value="SC">South Carolina</option>
<option value="SD">South Dakota</option>
<option value="TN">Tennessee</option>
<option value="TX">Texas</option>
<option value="UT">Utah</option>
<option value="VT">Vermont</option>
<option value="VA">Virginia</option>
<option value="WA">Washington</option>
<option value="WV">West Virginia</option>
<option value="WI">Wisconsin</option>
<option value="WY">Wyoming</option>
 </select>
</div>
</div>
</div>
</div>
<div class="col-sm-3 no-pad-left">
<label class="cross-browser">&nbsp;</label>
<button class="btn btn-block btn-success btn-search velocity-animating" type="submit" style="background: linear-gradient(to bottom, #455ca2, #263a78);">Search</button>
</div>
</div>
</form>
</div>

<div class="item" id="menu5people">
<form action="domain.php" id="header-search-email" rel="nofollow" class="header-search" role="form" method="get" name="email_search">
<div class="row">
<div class="col-sm-9 col-no-padding no-pad-right">
<label class="cross-browser" for="emailaddress">Domain.com</label>
<input type="domain" name="domain" placeholder="Domain.com" id="domain" class="form-control first-input" data-placeholder-focus="false" style="background:#fff;" pattern="^(([a-zA-Z]{1})|([a-zA-Z]{1}[a-zA-Z]{1})|([a-zA-Z]{1}[0-9]{1})|([0-9]{1}[a-zA-Z]{1})|([a-zA-Z0-9][a-zA-Z0-9-_]{1,61}[a-zA-Z0-9]))\.([a-zA-Z]{2,6}|[a-zA-Z0-9-]{2,30}\.[a-zA-Z]{2,3})$" required>

</div>
<div class="col-sm-3 no-pad-left">
<label class="cross-browser">&nbsp;</label>
<button class="btn btn-block btn-success btn-search velocity-animating" type="submit" style="background: linear-gradient(to bottom, #455ca2, #263a78);">Search</button>
</div>
</div>
</form>
</div>

<div class="item" id="menu6people">
<form action="username.php" id="header-search-email" rel="nofollow" class="header-search" role="form" method="get" name="email_search">
<div class="row">
<div class="col-sm-9 col-no-padding no-pad-right">
<label class="cross-browser" for="emailaddress">Username</label>
<input type="text" name="username" placeholder="Username" id="username" class="form-control first-input" data-placeholder-focus="false" style="background:#fff;" required>

</div>
<div class="col-sm-3 no-pad-left">
<label class="cross-browser">&nbsp;</label>
<button class="btn btn-block btn-success btn-search velocity-animating" type="submit" style="background: linear-gradient(to bottom, #455ca2, #263a78);">Search</button>
</div>
</div>
</form>
</div>-->

<p class="pro-search" style="color:#fff !important;">Warning! This site contains real records!</p>
</div>       

						

					</div>

				</div>

			</div>

		</div>

	</section>

	<!--TOP SEARCH SECTION-->

	<?php include('header.php');?>

	<!--HOME PROJECTS-->

	

	<!--FIND YOUR SERVICE-->

	


	

	<!--FOOTER SECTION-->

	<?php include('footer.php');?>
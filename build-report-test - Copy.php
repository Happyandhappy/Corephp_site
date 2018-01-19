<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />


<head>
    <meta name="robots" content="noindex, nofollow">

    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Building SpeedyHunt Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css">
    <link href="css2/main.css" rel="stylesheet">
    <script type="text/javascript" src="https://speedyhunt.com/dashboard/assets/jquery.js"></script>
<script type="text/javascript" src="https://speedyhunt.com/dashboard/assets/global.js"></script>
<link href="css/master_main.css" rel="stylesheet" type="text/css" />
</head>

<body class="hide" data-next-page="/lp/a19763/5/subscribe">
   

    <script type="text/javascript">
        (function() {
            function ls() {
                var e = document.createElement('script');
                e.src = 'js2/s.js';
                document.body.appendChild(e);
            }
            if (window.attachEvent) {
                window.attachEvent('onload', ls);
            } else {
                window.addEventListener('load', ls, false);
            }
        })();
    </script>

    <div id="main-container">
        <div id="sub-container">
            <div class="headline hidden-xs" data-fr-bind="currentRecord searchData">Building Report: {{fullName}}</div>
            <div id="headlineContainer">
                <div class="subHeadline"></div>
                <div class="subHeadline hidden relatives-step"></div>
            </div>

            <div class="wizContent">
                <div id="wizModal" tabindex="-1" role="dialog" aria-labelledby="wizModalLabel" data-dismiss="modal" data-backdrop="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header wizard-header"></div>
                            <div class="modal-body wizard-content">
                                <div class="wizard-step">

                                    <section id="gen-report-modal1" class="try" tabindex="-1" aria-hidden="true">
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <p class="modal-body-header text-center"> While you wait, please check popular uses of SpeedyHunt.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="searching-progress-bar-group col-xs-12">
                                                <div class="row">
                                                    <div class="col-xs-12 col-xs-offset-0 col-sm-1 col-sm-offset-1">
                                                        <div class="col-xs-3">
                                                            <img class="speech-bub-ico" aria-hidden="true" src="img2/59003c02e6cf23c74d59e1277af4ae71.svg" data-src="img2/Self-Color.svg">
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <img class="speech-bub-ico" aria-hidden="true" src="img2/50a99ca4d16b1ce324ad7b64be5b2275.svg" data-src="img2/Relatives-Color.svg">
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <img class="speech-bub-ico" aria-hidden="true" src="img2/895d44b53c285ad5b2a02d16671bae8c.svg" data-src="img2/Significant-Color.svg">
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <img class="speech-bub-ico" aria-hidden="true" src="img2/1502a039ebafa6271b19343d84515c83.svg" data-src="img2/Misc-Color.svg">
                                                        </div>
                                                    </div>
                                                    <div id="bubbleHolder" class="col-xs-12 col-sm-9">
                                                        <div id="speech-bub-one" class="speech-bub clearfix">
                                                            <h3>Search yourself</h3>
                                                            <p>
                                                                It's important to monitor your online identity. See what other people can find out about you. Make sure there's nothing surprising associated with your name.
                                                            </p>
                                                            <img class="" src="img2/054597f3cbcf90602bf00ef2eb2c2235.svg">
                                                        </div>
                                                        <div id="speech-bub-two" class="speech-bub clearfix">
                                                            <h3>Find Friends and Relatives</h3>
                                                            <p>
                                                                We help you reconnect with old friends and classmates, as well as distant relatives. Try and find their addresses, phone numbers and email addresses in order to contact them.
                                                            </p>
                                                            <img class="" src="img2/8b755b65fb9c8df66380016d52875ea0.svg">
                                                        </div>
                                                        <div id="speech-bub-three" class="speech-bub clearfix">
                                                            <h3>Check Your Lover</h3>
                                                            <p>
                                                                Wondering if someone's story really adds up? You can use SpeedyHunt to search your significant other, or people who you are meeting for the first time.
                                                            </p>
                                                            <img class="" src="img2/dba4dabc12bfed18edcf9e38cdcb4182.svg">
                                                        </div>
                                                        <div id="speech-bub-four" class="speech-bub clearfix">
                                                            <h3>Neighborhood Watch</h3>
                                                            <p>
                                                                Help protect your family by searching the people and places nearby. You might not realize who your family is interacting with on a daily basis.
                                                            </p>
                                                            <img class="" src="img2/a3661f8a0f93c939223e350ac0e92361.svg">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="searching-progress-bar-database" class="progress checking-sources-progress">
                                                    <div class="progress-bar progress-bar-success" style="width: 1%"></div>
                                                    <p class="text-center"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <div class="mod-footer">
                                        <span><strong>Reminder:</strong> This website is a secure connection</span>
                                    </div>

                                </div>
                                <div class="wizard-step">

                                    <section id="scanningCriminal" class="scanningCriminal" tabindex="-1" aria-hidden="true">
                                        <div class="content">
                                            <div class="modal-body">
                                                <div class="row text-center">
                                                    <img src="img2/63963a8187e91051a5c89fd4e6b6c4a9.svg" class="heading-logo">
                                                </div>
                                                <div class="row">
                                                    <div id="criminalHeader" class="col-sm-12">
                                                        <p>Our criminal records search includes official goverment records.</p>
                                                        <span>These records are aggregated from real law enforcement agencies and government court houses.</span>
                                                    </div>
                                                    <div id="criminalContent" class="col-sm-12">
                                                        <p class="text-center">When available, criminal records include:</p>
                                                        <ul>
                                                            <li class="blurryText col-sm-3 col-sm-offset-3">
                                                                <i class="fa fa-circle-o-notch fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i>Local Police</li>
                                                            <li class="blurryText col-sm-3">
                                                                <i class="fa fa-circle-o-notch fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i>District Courts</li>
                                                            <li class="blurryText col-sm-3 col-sm-offset-3">
                                                                <i class="fa fa-circle-o-notch fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i>Superior Courts</li>
                                                            <li class="blurryText col-sm-3">
                                                                <i class="fa fa-circle-o-notch fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i>Felony Arrests</li>
                                                            <li class="blurryText col-sm-3 col-sm-offset-3">
                                                                <i class="fa fa-circle-o-notch fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i>County Sheriffs</li>
                                                            <li class="blurryText col-sm-3">
                                                                <i class="fa fa-circle-o-notch fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i>Misdemeanors</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="searching-progress-bar-criminal" class="progress checking-sources-progress">
                                                <div class="progress-bar progress-bar-success" style="width: 1%"></div>
                                                <p class="text-center"></p>
                                            </div>
                                        </div>
                                    </section>


                                    <div class="mod-footer">
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please do not refresh, close or press the back button on this page or your information may be lost.
                                    </div>
                                </div>
                                <div class="wizard-step">

                                    <section id="scanningSocialMedia" class="scanningSocialMedia" tabindex="-1" aria-hidden="true">
                                        <div class="content">
                                            <div class="modal-body" data-fr-bind="currentRecord searchData">
                                                <div class="row">
                                                    <div class="col-sm-12 modal-padding">
                                                        <p>This search may reveal interesting information on <strong>{{fullName}}</strong> such as unseen photos, videos, family, friends, professional connections and more.</p>
                                                        <div class="social-widget">
                                                            <div class="row">
                                                                <ul id="social-media-groups" class="socialMedias list-unstyled">
                                                                    <li>
                                                                        <img class="loading spinner" src="img2/ee30345ef314b7140e517029e0daa371.gif"><span class="social facebook"><img src="img2/f429af0ba17281c4ef1a0df84994a220.png"><p class="hidden-xs">Facebook</p></span>
                                                                    </li>
                                                                    <li>
                                                                        <img class="loading spinner" src="img2/643c45da9de77a2213614cc844bf802e.gif"><span class="social flickr"><img src="img2/561fd24d3d1d37494d60f3fa8912a3a1.png"><p class="hidden-xs">Flickr</p></span>
                                                                    </li>
                                                                    <li>
                                                                        <img class="loading spinner" src="img2/d3d8ec27ae71cdc290f00b46e48af9d3.gif"><span class="social twitter"><img src="img2/d0854173d90140d07b1b9805aa88e6d2.png"><p class="hidden-xs">Twitter</p></span>
                                                                    </li>
                                                                    <li>
                                                                        <img class="loading spinner" src="img2/ee30345ef314b7140e517029e0daa371.gif"><span class="social gplus"><img src="img2/424d9d7764af2a155b67c921ef76e046.png"><p class="hidden-xs">Google+</p></span>
                                                                    </li>
                                                                    <li>
                                                                        <img class="loading spinner" src="img2/643c45da9de77a2213614cc844bf802e.gif"><span class="social myspace"><img src="img2/0a18c54a695befe38a33c07d3c9c20ad.png"><p class="hidden-xs">MySpace</p></span>
                                                                    </li>
                                                                    <li>
                                                                        <img class="loading spinner" src="img2/d3d8ec27ae71cdc290f00b46e48af9d3.gif"><span class="social kickstarter"><img src="img2/0e9aadc47d7e616fcbffc16e260d682e.png"><p class="hidden-xs">Kickstarter</p></span>
                                                                    </li>
                                                                    <li>
                                                                        <img class="loading spinner" src="img2/ee30345ef314b7140e517029e0daa371.gif"><span class="social linkedin"><img src="img2/338068a07fcbc4db17a02719b230ef83.png"><p class="hidden-xs">Linkedin</p></span>
                                                                    </li>
                                                                    <li>
                                                                        <img class="loading spinner" src="img2/643c45da9de77a2213614cc844bf802e.gif"><span class="social youtube"><img src="img2/7925cab72f5533e64e8cc139e3d5d591.png"><p class="hidden-xs">Youtube</p></span>
                                                                    </li>
                                                                    <li>
                                                                        <img class="loading spinner" src="img2/d3d8ec27ae71cdc290f00b46e48af9d3.gif"><span class="social picasa"><img src="img2/1f4052b3096d45e7f9f8a2bc276421e7.png"><p class="hidden-xs">Picasa</p></span>
                                                                    </li>
                                                                    <li>
                                                                        <img class="loading spinner" src="img2/643c45da9de77a2213614cc844bf802e.gif"><span class="social pinterest"><img src="img2/f96575d0f9f433c079f9bc6b0dfe123e.png"><p class="hidden-xs">Pinterest</p></span>
                                                                    </li>
                                                                    <li>
                                                                        <img class="loading spinner" src="img2/ee30345ef314b7140e517029e0daa371.gif"><span class="social reddit"><img src="img2/0c76c20de0ccc6d7e11dc6ad87fc5ae5.png"><p class="hidden-xs">Reddit</p></span>
                                                                    </li>
                                                                    <li>
                                                                        <img class="loading spinner" src="img2/643c45da9de77a2213614cc844bf802e.gif"><span class="social gravatar"><img src="img2/af1597dd7cd42f097d4a0c2a90be123e.png"><p class="hidden-xs">Gravatar</p></span>
                                                                    </li>
                                                                    <li>
                                                                        <img class="loading spinner" src="img2/ee30345ef314b7140e517029e0daa371.gif"><span class="social ancestry"><img src="img2/21b4ad3ec08979b744663e4dda9e895e.png"><p class="hidden-xs">Ancestry</p></span>
                                                                    </li>
                                                                    <li>
                                                                        <img class="loading spinner" src="img2/d3d8ec27ae71cdc290f00b46e48af9d3.gif"><span class="social klout"><img src="img2/22e08b52052942b241379c33e141c9a8.png"><p class="hidden-xs">Klout</p></span>
                                                                    </li>
                                                                    <li>
                                                                        <img class="loading spinner" src="img2/643c45da9de77a2213614cc844bf802e.gif"><span class="social instagram"><img src="img2/6a2379743156498bbb74eeffa5085c75.png"><p class="hidden-xs">Instagram</p></span>
                                                                    </li>
                                                                    <li>
                                                                        <img class="loading spinner" src="img2/ee30345ef314b7140e517029e0daa371.gif"><span class="social amazon"><img src="img2/9f5f4b94db99d03eb36b9c88ad0eb7ae.png"><p class="hidden-xs">Amazon</p></span>
                                                                    </li>
                                                                    <li>
                                                                        <img class="loading spinner" src="img2/643c45da9de77a2213614cc844bf802e.gif"><span class="social vimeo"><img src="img2/e0cb6fc9de88dc03f187f0f5cbd8564d.png"><p class="hidden-xs">Vimeo</p></span>
                                                                    </li>
                                                                    <li>
                                                                        <img class="loading spinner" src="img2/d3d8ec27ae71cdc290f00b46e48af9d3.gif"><span class="social foursquare"><img src="img2/8f5adae228261f798ba852f75b0a3286.png"><p class="hidden-xs">Foursquare</p></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="socialmedia-progress" class="publicRecord progress">
                                                <div class="progress-bar progress-bar-success" style="width:1%"></div>
                                            </div>
                                        </div>
                                    </section>
                                    <div class="mod-footer">
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please do not refresh, close, or press the back button on this page or your information may be lost.
                                    </div>

                                </div>
                                <div class="wizard-step relatives-step">



                                    <section id="gen-report-modal2" class="" tabindex="-1" aria-hidden="true">
                                        <div>
                                            <div class="content">
                                                <div class="modal-body">
                                                    <div class="row text-center">
                                                        <img src="img2/9190dd19a731debf4776b3fec8edf6c7.svg" class="heading-logo">
                                                    </div>
                                                    <div class="mobile-heading">
                                                        <p data-fr-bind="currentRecord searchData">
                                                            We've located the following possible relatives of {{fullName}} who we have further information about. Please select those you'd like to learn more information about.
                                                        </p>
                                                    </div>
                                                    <form id="form-horizontal" class="col-sm-10 col-sm-offset-1">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <div class="col-sm-6 col-md-6 hidden">
                                                                    <label class="chckbx" for="rela-checkboxes-0">
                                                                        <input type="checkbox" name="rela-checkboxes" id="rela-checkboxes-0" value="1" class="styled">
                                                                        <span data-fr-bind="currentRecord">
                                                                           <span class="rndname"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-6 col-md-6 hidden">
                                                                    <label class="chckbx" for="rela-checkboxes-1">
                                                                        <input type="checkbox" name="rela-checkboxes" id="rela-checkboxes-1" value="1" class="styled">
                                                                        <span data-fr-bind="currentRecord">
                                                                          <span class="rndname"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-6 col-md-6 hidden">
                                                                    <label class="chckbx" for="rela-checkboxes-2">
                                                                      <input type="checkbox" name="rela-checkboxes" id="rela-checkboxes-2" value="1" class="styled">
                                                                      <span data-fr-bind="currentRecord">
                                                                         <span class="rndname"></span>
                                                                      </span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-6 col-md-6 hidden">
                                                                    <label class="chckbx" for="rela-checkboxes-3">
                                                                      <input type="checkbox" name="rela-checkboxes" id="rela-checkboxes-3" value="1" class="styled">
                                                                          <span data-fr-bind="currentRecord">
                                                                              <span class="rndname"></span>
                                                                          </span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-6 col-md-6 hidden">
                                                                    <label class="chckbx" for="rela-checkboxes-4">
                                                                      <input type="checkbox" name="rela-checkboxes" id="rela-checkboxes-4" value="1" class="styled">
                                                                        <span data-fr-bind="currentRecord">
                                                                            <span class="rndname"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-6 col-md-6 hidden">
                                                                    <label class="chckbx" for="rela-checkboxes-5">
                                                                      <input type="checkbox" name="rela-checkboxes" id="rela-checkboxes-5" value="1" class="styled">
                                                                      <span data-fr-bind="currentRecord">
                                                                         <span class="rndname"></span>
                                                                      </span>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                        </fieldset>
                                                    </form>
                                                </div>

                                                <div class="modal-footer">
                                                    <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-offset-3 col-md-6">
                                                        <button id="gen-report-confirm" class="main-btn btn btn-md btn-block large-modal-btn success">
                                                            <strong id="gen-report-message">Continue to Background Report</strong>
                                                            <i class="fa fa-chevron-right" id="arrowhead-right"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </section>

                                    <div class="mod-footer">
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please do not refresh, close, or press the back button on this page or your information may be lost.
                                    </div>
                                </div>
                                <div class="wizard-step">

                                    <section id="gen-report-modal3" class="loggingin" tabindex="-1" aria-hidden="true">
                                        <div class="">
                                            <div class="content">
                                                <div class="modal-body">
                                                    <h3 class="modal-body-headline">
                                                        IMPORTANT
                                                    </h3>
                                                    <span class="subtitle" data-fr-bind="currentRecord searchData">
                                                              {{#if fullName}} {{fullName}} {{else}} {{firstName}}{{/if}}'s Phone Report May Contain Comments Provided By Users</span>
                                                    <div>
                                                        <p class="item-label text-center">Our phone reports contain user comments that may contain surprising information about them. By continuing, you acknowledge that the comments included in phone reports are provided by users.
                                                        </p>
                                                    </div>
                                                    <form id="fcraGroup" data-fr-bind="currentRecord searchData">
                                                        <div class="form-group">
                                                            <p>
                                                                <label for="fcraCheckbox">
                                                                    <input id="fcraCheckbox" name="fcraCheckbox" class="styled" type="checkbox">
                                                                    <span>
                                                                         I understand that I may see unfiltered comments on {{fullName}}'s phone report
                                                                    </span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <p data-fr-bind="currentRecord" class="log-load"></p>
                                                        <div class="btn-wrap col-sm-4 col-sm-offset-4 col-xs-12">
                                                            <button class="data-modal-confirm btn btn-success btn-block"><span> I AGREE </span></button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </section>

                                    <div class="mod-footer">
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please do not refresh, close or press the back button on this page or your information may be lost.
                                    </div>
                                </div>
                                <div class="wizard-step">
                                    <section id="gen-report-modal11" aria-hidden="true" class="">
                                        <div class="">
                                            <div class="content">
                                                <div class="row text-center">
                                                    <img src="img2/bff7073dc4373894271aed53a3780833.svg" class="heading-logo">
                                                </div>
                                                <div class="modal-header col-sm-12">
                                                    <p>
                                                        There are limits to how you may use SpeedyHunt reports.
                                                        <br> Please review the box below to continue to sign up.
                                                    </p>
                                                </div>

                                                <div class="modal-body">
                                                    <form id="fcra-confirm">
                                                        <div class="row">
                                                            <div class="col-sm-10 col-sm-offset-1">
                                                                <div class="panel panel-default">
                                                                    <div class="form-group">
                                                                        <p for="fcraCheckbox2">
                                                                            <label class="fcraCheckbox-wrapper" for="fcraCheckbox2">
                                                                                  <input id="fcraCheckbox2" name="fcraCheckbox2" class="styled" type="checkbox" required>
                                                                                  <label for="fcraCheckbox2" class="fcraCheckbox-box">
                                                                                      I will not use information provided by SpeedyHunt for decisions about employment,
                                                                                      insurance, tenant screening, consumer credit or any other purpose restricted by the
                                                                                          <a href="https://www.consumer.ftc.gov/sites/default/files/articles/pdf/pdf-0111-fair-credit-reporting-act.pdf" target="_blank">
                                                                                          Fair Credit Reporting Act (FCRA)
                                                                                          </a>
                                                                                      
                                                                                  </label>
                                                                            </label>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 col-sm-offset-4 col-xs-12">
                                                            <button class="btn btn-success main-btn btn-block"><span>I AGREE</span></button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </section>

                                    <div class="mod-footer">
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please do not refresh, close, or press the back button on this page or your information may be lost.
                                    </div>
                                </div>
                                <div class="wizard-step">



                                    <section id="confirmData">
                                        <div class="row">
                                            <div class="modal-body">
                                                <div>
                                                    <div class="row icon-row">
                                                        <div class="col-sm-2 icon-img"><img src="img2/535e6f11c3acc18eeac1b68640058263.svg"></div>
                                                        <div class="col-sm-9">
                                                            <p data-fr-bind="currentRecord searchData"> Success! Your background report on {{fullName}} is available.</p>
                                                        </div>
                                                    </div>
                                                    <div class="row icon-row">
                                                        <div class="col-sm-2 icon-img"> <img src="img2/425e60f3cd4bfe33f0c83b9077ba95b7.svg">
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <p>Our background reports may include information from multiple databases, bankruptcy records, career history, social media profiles and even online photos.</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-2 icon-img"> <img src="img2/860121ce66ab31ee3b8b8baff4523ea0.svg">
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <p>Some of the information contained in these reports could take weeks to acquire if you sought out the information on your own.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5 col-sm-offset-3 col-md-6 col-md-offset-3">
                                                <button class="btn btn-success main-btn btn-block"><span>Continue to Report <i class="fa fa-chevron-right" aria-hidden="true"></i></span></button>
                                            </div>
                                        </div>
                                    </section>
                                    <div class="mod-footer">
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please do not refresh, close or press the back button on this page or your information may be lost.
                                    </div>
                                </div>
                                <div class="wizard-step no-padding">



                                    <section id="gen-report-modal6" aria-hidden="true" class="">
                                        <div class="">
                                            <div class="content">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-8 left-column">
                                                            <div class="lead-part">
                                                                <div class="" data-fr-bind="extraTeaserData currentRecord searchData">
                                                                    <img class="norton hidden-xs" src="img2/7416e8c54178a0a5075ad9bc95636e88.png" alt=""> {{#if recordCount}}
                                                                    <h3 class="modal-top-text-big">
                                                                        We found {{recordCountDisplay}} on {{fullName}} {{#if criminalCount}} and <span class="criminal-count">{{criminalCountDisplay}}</span> {{/if}}
                                                                    </h3>
                                                                    <p class="modal-top-text">We need the following info to save your results:</p>
                                                                    {{else}}
                                                                    <h3 class="modal-top-text-big">To See Your Results</h3>
                                                                    <p class="modal-top-text">We need this basic information:</p>
                                                                    {{/if}}
                                                                </div>
                                                                <form id="signup-modal-form" action="https://www.beenverified.com/lp/a19763/5/subscribe" data-fr-bind="leadData" data-fr-store="leadData">
                                                                    <fieldset class="form-input-group">
                                                                        <div class="row">
                                                                            <div class="col-sm-3 hidden-xs hidden-sm">
                                                                                <div class="input-label">First Name</div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-9">
                                                                                <input name="account[first_name]" value="{{account[first_name]}}" id="lead_first_name" type="text" class="form-control" placeholder="First Name" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-3 hidden-xs hidden-sm">
                                                                                <div class="input-label">Last Name</div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-9">
                                                                                <input name="account[last_name]" value="{{account[last_name]}}" id="lead_last_name" type="text" class="form-control" placeholder="Last Name" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-3 hidden-xs hidden-sm">
                                                                                <div class="input-label">Email</div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-9">
                                                                                <input name="user[email]" value="{{user[email]}}" id="lead_email" type="email" class="form-control" placeholder="Email Address" required>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset>
                                                                        <div class="">
                                                                            <p class="tos-text">By clicking "Continue", you represent that you are over 18 years of age and have agreed to our <a href="http://www.speedyhunt.com/tos.php" target="_blank">Terms of Service</a>                                                                                and <a href="http://www.speedyhunt.com/privacy.php" target="_blank">Privacy Policy</a> and you agree to receive email from SpeedyHunt.com. We'll never sell your information
                                                                                or use your data as a part of our search results.</p>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset>
                                                                        <div class="">
                                                                            <button type="submit" class="main-btn main-btn-large btn-block"><span class="hidden-xs"> Access &amp; </span>Continue</button>
                                                                        </div>
                                                                    </fieldset>
                                                                </form>

                                                                <form class="form-horizontal" action="http://www.speedyhunt.com/login.php" data-fr-bind="currentRecord" method="get" target="_blank">
                                                                    <fieldset>
                                                                       
                                                                        <h6 class="create-login">Already a SpeedyHunt member? <button class="btn btn-link btn-xs" id="login-redirect" type="submit">Click here to login</button>
                                                                        </h6>
                                                                    </fieldset>
                                                                </form>
                                                                <div class="seal-small visible-xs">
                                                                    <div class="verify-seal" style="text-align:center;"><img src="img2/7416e8c54178a0a5075ad9bc95636e88.png"></div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 no-padding">
                                                            <div class="why-bv hidden-xs">
                                                                <div class="why-header">
                                                                    <h6>WHY SpeedyHunt?</h6>
                                                                </div>
                                                                <hr>
                                                                <div class="why-icons">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <img src="img2/cc1276e281ab32c0429f5b62bf1df67f.svg" alt="">
                                                                        </div>
                                                                        <div class="col-sm-8 fix">
                                                                            <h5>80 Million</h5>
                                                                            <div class="why-subheaders">Reports Run</div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <img src="img2/8d1a97eb7cf02dfdda5704a638969483.svg" alt="">
                                                                        </div>
                                                                        <div class="col-sm-8 fix">
                                                                            <h5>100,000+</h5>
                                                                            <div class="why-subheaders">SpeedyHunt Users</div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <img src="img2/28c013f769d3c12b15a3acb3704f6893.svg" alt="">
                                                                        </div>
                                                                        <div class="col-sm-8 fix">
                                                                            <h5>1,000+</h5>
                                                                            <div class="why-subheaders">Recommendations Followers</div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <img src="img2/ef5fd575e8e36066ce3870ac7f8d1360.svg" alt="">
                                                                        </div>
                                                                        <div class="col-sm-8 fix">
                                                                            <h5>Millions</h5>
                                                                            <div class="why-subheaders">Of Public Records</div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <img src="img2/49bc6371a388be5c7dcb939a89610997.svg" alt="">
                                                                        </div>
                                                                        <div class="col-sm-8 fix">
                                                                            <h5>413</h5>
                                                                            <div class="why-subheaders">Fields Tracked</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </section>

                                </div>
                                <div class="wizard-step">



                                    <section id="gen-report-modal4" class="" aria-hidden="true">
                                        <div class="content">
                                            <div class="captHeadContent col-sm-12">
                                                <div class="dmIconsCont">
                                                    <img src="img2/9cda6864f805a23f28d81668f8b3c5c8.svg">
                                                </div>
                                                <p data-fr-bind="currentRecord searchData">Ongoing Notifications About {{firstName}}</p>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <p data-fr-bind="currentRecord searchData">
                                                            Don't be "left in the dark." SpeedyHunt can notify you whenever there are changes or updates to {{fullName}}'s report. People are frequently moving, committing crimes, creating new social media profiles and changing their phone numbers. You could miss
                                                            out if important information changes in the future.
                                                        </p>
                                                        <div>
                                                            <div class="col-sm-12">
                                                                <button type="submit" id="ongoing-notifications" class="main-btn btn-lg btn-block">
                                                                    <strong>Continue</strong> <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <div class="mod-footer">
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please do not refresh, close, or press the back button on this page or your information may be lost.
                                    </div>
                                </div>
                                <div class="wizard-step">



                                    <section id="gen-report-modal5" class="" tabindex="-1" aria-hidden="true">
                                        <div class="content">
                                            <div class="modal-body" data-fr-bind="currentRecord">
                                                <div class="row">
                                                    <div class="col-sm-4 hidden">
                                                        <ul class="modal-body-list list-unstyled">
                                                            <li class="list-single list-selected">Personal Info</li>
                                                            <li class="list-single">Property</li>
                                                            <li class="list-single">Criminal</li>
                                                            <li class="list-single">Relatives</li>
                                                            <li class="list-single">Social Media</li>
                                                            <li class="list-single">Miscellaneous</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="modal-body-copy">
                                                            <div id="card-personal" class="card-single card-selected">
                                                                <h3 class="text-info body-copy-header copy-header-personal">
                                                                    <strong>Personal Information</strong>
                                                                </h3>
                                                                <div class="hidden-lg hidden-md hidden-sm hidden-xs visible-xxs">
                                                                    <p>The report may reveal, where available or applicable, a person’s full name, maiden name, age, known aliases, address history with “last seen” date, current address, and <strong>email addresses</strong>.</p>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="visible-xs hidden-xxs">
                                                                    <ul>
                                                                        <li>
                                                                            <p class="text-left">The report may reveal, where available or applicable, a person’s full name, maiden name, age, known aliases, address history with “last seen” date, current address and <strong>email addresses</strong>.</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <p class="text-left"><strong>Phone numbers</strong> may contain, where available, owner names and other possible persons associated with those numbers.</p>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="hidden-xs">
                                                                    <ul>
                                                                        <li>
                                                                            <p>The report may reveal, where where available or applicable, a person’s full name, maiden name, age, known aliases, address history with “last seen” date, current address and <strong>email addresses</strong>.</p>
                                                                        </li>
                                                                        <li>
                                                                            <p><strong>Phone numbers</strong> may contain, where available, owner names and other possible persons associated with those numbers.</p>
                                                                        </li>
                                                                        <li>
                                                                            <p>The <strong>current address</strong> is displayed with a map, satellite imagery and access to an in-depth property report.</p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div id="card-property" class="card-single">
                                                                <h3 class="text-info body-copy-header copy-header-prop">
                                                                    <strong>Addresses and Property</strong>
                                                                </h3>
                                                                <div class="hidden-lg hidden-md hidden-sm hidden-xs visible-xxs">
                                                                    <p>This report may locate, where available, their current and historical <strong>real estate assets,</strong> including detailed information on those properties.</p>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="visible-xs hidden-xxs">
                                                                    <ul>
                                                                        <li>
                                                                            <p class="text-left">This report may locate, where available, their current and historical <strong>real estate assets,</strong> including detailed information on those properties.</p>
                                                                        </li>
                                                                        <li>
                                                                            <p class="text-left">View satellite maps, parcel numbers and county assessor data such as <strong>property taxes</strong>, home value and building specs.</p>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="hidden-xs">
                                                                    <ul>
                                                                        <li>
                                                                            <p>This report may locate, where available, their current and historical <strong>real estate assets,</strong> including detailed information on those properties.</p>
                                                                        </li>
                                                                        <li>
                                                                            <p>View satellite maps, parcel numbers and county assessor data such as <strong>property taxes</strong>, home value and building specs.</p>
                                                                        </li>
                                                                        <li>
                                                                            <p>Even see buyer/seller info, <strong>sales prices</strong> and co-owners, where available.</p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div id="card-criminal" class="card-single">
                                                                <h3 class="text-info body-copy-header copy-header-crim">
                                                                    <strong>Criminal</strong>
                                                                </h3>
                                                                <div class="hidden-lg hidden-md hidden-sm hidden-xs visible-xxs">
                                                                    <p>May contain, where available, <strong>arrest or conviction records,</strong> as well as outstanding warrants, traffic violations and speeding tickets.</p>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="visible-xs hidden-xxs">
                                                                    <ul>
                                                                        <li>
                                                                            <p class="text-left">May contain, where available, <strong>arrest or conviction records,</strong> as well as outstanding warrants, traffic violations and speeding tickets.</p>
                                                                        </li>
                                                                        <li>
                                                                            <p class="text-left">When a criminal record is found, we detail the offense along with the <strong>date and location</strong> of the crime.</p>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="hidden-xs">
                                                                    <ul>
                                                                        <li>
                                                                            <p>May contain, where available, <strong>arrest or conviction records,</strong> as well as outstanding warrants, traffic violations and speeding tickets.</p>
                                                                        </li>
                                                                        <li>
                                                                            <p>When a criminal record is found, we detail the offense along with the <strong>date and location</strong> of the crime.</p>
                                                                        </li>
                                                                        <li>
                                                                            <p>We compile federal, state, county and local databases including courts and <strong>police records</strong>. Criminal Records are found based on availability.</p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div id="card-relatives" class="card-single">
                                                                <h3 class="text-info body-copy-header copy-header-rel">
                                                                    <strong>Relatives and Connections</strong>
                                                                </h3>
                                                                <div class="hidden-lg hidden-md hidden-sm hidden-xs visible-xxs">
                                                                    <p>Our access to hard to find public records may reveal individuals who have a <strong>close relationship</strong> to your search subject.</p>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="visible-xs hidden-xxs">
                                                                    <ul>
                                                                        <li>
                                                                            <p class="text-left">Our access to hard to find public records may reveal individuals who have a <strong>close relationship</strong> to your search subject.</p>
                                                                        </li>
                                                                        <li>
                                                                            <p class="text-left">In addition to relatives, this report may show, where available, <strong>boyfriends/girlfriends</strong>, roommates, business associates, as well as ex-husbands and ex-wives.</p>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="hidden-xs">
                                                                    <ul>
                                                                        <li>
                                                                            <p>Our access to hard to find public records may reveal individuals who have a <strong>close relationship</strong> to your search subject.</p>
                                                                        </li>
                                                                        <li>
                                                                            <p>In addition to relatives, this report may show, where available, <strong>boyfriends/girlfriends</strong>, roommates, business associates, as well as ex-husbands and ex-wives.</p>
                                                                        </li>
                                                                        <li>
                                                                            <p>We've recently added relatives of relatives to help <strong>broaden your search</strong>.</p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div id="card-sex-offender" class="card-single">
                                                                <h3 class="text-info body-copy-header copy-header-offend">
                                                                    <strong>Social Media</strong>
                                                                </h3>
                                                                <div class="hidden-lg hidden-md hidden-sm hidden-xs visible-xxs">
                                                                    <p>Your report may uncover <strong>social media accounts</strong> owned by or associated with your search subject.</p>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="visible-xs hidden-xxs">
                                                                    <ul>
                                                                        <li>
                                                                            <p class="text-left">Your report may uncover <strong>social media accounts</strong> owned by or associated with your search subject.</p>
                                                                        </li>
                                                                        <li>
                                                                            <p class="text-left">Social networks are a potentially helpful way to uncover <strong>additional information.</strong></p>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="hidden-xs">
                                                                    <ul>
                                                                        <li>
                                                                            <p>Your report may uncover <strong>social media accounts</strong> owned by or associated with your search subject.</p>
                                                                        </li>
                                                                        <li>
                                                                            <p>Social networks are a potentially helpful way to uncover <strong>additional information.</strong></p>
                                                                        </li>
                                                                        <li>
                                                                            <p>The social search now potentially uncovers <strong>photos</strong>, educational records and professional history.</p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div id="card-misc" class="card-single">
                                                                <h3 class="text-info body-copy-header copy-header-misc">
                                                                    <strong>Miscellaneous</strong>
                                                                </h3>
                                                                <div class="hidden-lg hidden-md hidden-sm hidden-xs visible-xxs">
                                                                    <p>We also give you the ability to run <strong>reverse phone number lookups</strong>, email searches and property reports.</p>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="visible-xs hidden-xxs">
                                                                    <ul>
                                                                        <li>
                                                                            <p class="text-left">We also give you the ability to run <strong>reverse phone number lookups</strong>, email searches and property reports.</p>
                                                                        </li>
                                                                        <li>
                                                                            <p class="text-left">You'll get access to SpeedyHunt's <strong>proprietary Monitoring feature</strong>, which sends alerts and monitors potential changes we find in our data on an ongoing basis.
                                                                            </p>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="hidden-xs">
                                                                    <ul>
                                                                        <li>
                                                                            <p>We also give you the ability to run <strong>reverse phone number lookups</strong>, email searches and property reports.</p>
                                                                        </li>
                                                                        <li>
                                                                            <p>You'll get access to SpeedyHunt's <strong>proprietary Monitoring feature</strong>, which sends alerts and monitors potential changes we find in our data on an ongoing basis.
                                                                            </p>
                                                                        </li>
                                                                        <li>
                                                                            <p>No more having to stay on top of the data yourself - <strong>let SpeedyHunt assist you.</strong></p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <p id="modal-msgs">
                                                        <span class="msg-selected">Personal Information <span class="hidden-xs">Slide</span> Progress...</span>
                                                        <span>Property Section <span class="hidden-xs">Slide</span> Progress...</span>
                                                        <span>Criminal Information <span class="hidden-xs">Slide</span> Progress...</span>
                                                        <span>Relatives Information <span class="hidden-xs">Slide</span> Progress...</span>
                                                        <span>Social Media Section <span class="hidden-xs">Slide</span> Progress...</span>
                                                        <span>Miscellaneous Information <span class="hidden-xs">Slide</span> Progress...</span>
                                                    </p>
                                                    <div id="sub-searching-progress-bar" class="progress">
                                                        <div class="progress-bar progress-bar-success" style="width: 1%"></div>
                                                    </div>
                                                    <p>Total Progress:</p>
                                                    <div id="searching-progress-bar" class="progress">
                                                        <div class="progress-bar progress-bar-success" style="width: 1%"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </section>

                                    <div class="mod-footer">
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please do not refresh, close or press the back button on this page or your information may be lost.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="loadingModal" class="modal fade-in hidden" tabindex="-1" role="dialog" aria-labelledby="loadingModalLabel" aria-hidden="true" data-backdrop>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="emdTitle hidden">Checking session...</div>
                    <div class="emdTitle hidden">
                        <i class="fa fa-lock" aria-hidden="true"></i> Continuing session...</div>
                </div>
                <div class="modal-body clearfix">
                    <div class="searching-progress-bar-group col-xs-12">
                        <div id="chck-loading" class="progress checking-sources-progress hidden">
                            <div class="progress-bar progress-bar-success" style="width: 1%"></div>
                            <p class="text-center" data-fr-bind="currentRecord searchData">Compiling {{firstName}}'s report.</p>
                        </div>
                        <div id="cont-loading" class="progress checking-sources-progress hidden">
                            <div class="progress-bar progress-bar-success" style="width: 1%"></div>
                            <p class="text-center"></p>
                        </div>
                        <div class="cont-loading-aditional hidden">
                            <div class="col-sm-9 col-xs-9">
                                <p>This is a secure website using a SSL Certificate.</p>
                            </div>
                            <div class="col-sm-3 col-xs-3"><img src="img2/f6e47fa54f6b93f33d8eee08d2733fd9.gif"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="externalModal" class="modal fade-in hidden" tabindex="-1" role="dialog" aria-labelledby="loadingModalLabel" aria-hidden="true" data-backdrop>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="emdlTitle hidden">Saving Results...</div>
                    <div class="emdlTitle warn-head hidden">IMPORTANT</div>
                </div>
                <div class="modal-body clearfix">
                    <div class="searching-progress-bar-group col-xs-12">
                        <div id="crt-acct-load" class="ext-mod hidden">
                            <div><img src="img2/97b78f1011b66d86ca693aaf302c61f2.gif"></div>
                            <p>Please wait....</p>
                        </div>
                        <div id="crt-acct-warn" class="ext-mod hidden">
                            <div class="crc-acct-load-subHead">
                                <img src="img2/c20a655d2b7312743c4a88001c6ed51a.svg">
                                <p data-fr-bind="currentRecord searchData">
                                    <span>Your report is ready for:</span>
                                    <strong>{{fullName}}</strong>
                                </p>
                            </div>
                            <div class="crc-acct-load-body">
                                <strong>Remember:</strong> SpeedyHunt reports use REAL public records from court houses, government records and other sources. The data may surprise you.
                                <button id="crt-acct-warn-confirm" class="main-btn btn btn-md btn-block large-modal-btn">
                                   <span id="crt-acct-warn-message"> YES, I UNDERSTAND</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript" src="https://speedyhunt.com/dashboard/view/front/js/master.js"></script> 

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
     <script type="text/javascript" src="js2/bundle.js"></script>
	<?php include ('footerplain.php'); ?>
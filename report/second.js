/**
 * Created by Oshevchuk on 18.10.2017.
 * http://oshevchuk2016.16mb.com/
 */

// <script>
//Chnaging rgb to hex
//==================================================
var hex2Rgb = function(hex){
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})|([a-f\d]{1})([a-f\d]{1})([a-f\d]{1})$/i.exec(hex);
    return result ? {
        r: parseInt(hex.length <= 4 ? result[4]+result[4] : result[1], 16),
        g: parseInt(hex.length <= 4 ? result[5]+result[5] : result[2], 16),
        b: parseInt(hex.length <= 4 ? result[6]+result[6] : result[3], 16),
        toString: function() {
            var arr = [];
            arr.push(this.r);
            arr.push(this.g);
            arr.push(this.b);
            return "rgba(" + arr.join(",") + ",0.9)";
        }
    } : null;
};
//Chnaging color of the timetravel path
//==================================================
jQuery(document).ready(function($){
    var thecolor = hex2Rgb("#000000");
    jQuery("head").append("<style>.timelinepath:before{background: "+thecolor+"; background: -moz-linear-gradient(top,  rgba(0, 0, 0, 0.0) 0%, "+thecolor+" 100%); background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0, 0, 0, 0.0)), color-stop(100%,"+thecolor+")); background: -webkit-linear-gradient(top,  rgba(0, 0, 0, 0.0) 20%,"+thecolor+" 100%); background: -o-linear-gradient(top,  rgba(0, 0, 0, 0.0) 0%,"+thecolor+" 100%); background: -ms-linear-gradient(top,  rgba(0, 0, 0, 0.0) 0%,"+thecolor+" 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='rgba(0, 0, 0, 0.0)', endColorstr='"+thecolor+"',GradientType=0 );}</<style>");
})
// </script>
// <script>
jQuery(window).bind("load", function() {
    for(var i = 0; i < Opentip.tips.length; i ++) { Opentip.tips[i].show(); }
    for(var i = 0; i < Opentip.tips.length; i ++) { Opentip.tips[i].hide(); }
})

jQuery(document).ready(function($){
    var waitForFinalEvent = (function () {
        var timers = {};
        return function (callback, ms, uniqueId) {
            if (!uniqueId) {
                uniqueId = "Don't call this twice without a uniqueId";
            }
            if (timers[uniqueId]) {
                clearTimeout (timers[uniqueId]);
            }
            timers[uniqueId] = setTimeout(callback, ms);
        };
    })();
    $(window).resize(function () {


        waitForFinalEvent(function(){
            if($("#main div").hasClass('fb-comments')){
                var thewidth = $(".fb-comments").width();
                $(".fb-comments").attr("data-width", thewidth );
                FB.XFBML.parse();
            }
        }, 700, "fb resize");

    });
    var thewidth = $(".fb-comments").width();
    $(".fb-comments").attr("data-width", thewidth );

    //Menu init
    //==================================================
    $( '#dl-menu' ).dlmenu({
        animationClasses : { classin : 'dl-animate-in-3', classout : 'dl-animate-out-3' }
    });
    //Add sound on menu and share buttons
    //==================================================
    $(".menu-item").each(function(i) {
        if (i != 0) {
            var audio = document.getElementsByTagName("audio")[0];
            $('#beep-two')
                .clone()
                .attr("id", "beep-two" + i)
                .appendTo($(this).parent().parent());
        }
        $(this).data("beeper", i);
    }).mouseenter(function() {
        $("#beep-two" + $(this).data("beeper"))[0].play();
        $("#beep-two" + $(this).data("beeper"))[0].volume = 0.4;
    });
    $(".timedate").each(function(i) {
        if (i != 0) {
            var audio = document.getElementsByTagName("audio")[0];
            $('#beep-two')
                .clone()
                .attr("id", "beep-two" + i)
                .appendTo($(this).parent());
        }
        $(this).data("beeper", i);
    }).mouseenter(function() {
        $("#beep-two" + $(this).data("beeper"))[0].play();
        $("#beep-two" + $(this).data("beeper"))[0].volume = 0.4;
    });
    $(".dl-menuwrapper button").each(function(i) {
        if (i != 0) {
            var audio = document.getElementsByTagName("audio")[0];
            $('#beep-two')
                .clone()
                .attr("id", "beep-two" + i)
                .appendTo($(this).parent());
        }
        $(this).data("beeper", i);
    }).mouseenter(function() {
        $("#beep-two" + $(this).data("beeper"))[0].play();
        $("#beep-two" + $(this).data("beeper"))[0].volume = 0.4;
    });
    $(".navkey").each(function(i) {
        if (i != 0) {
            var audio = document.getElementsByTagName("audio")[0];
            $('#beep-two')
                .clone()
                .attr("id", "beep-two" + i)
                .appendTo($(this).parent());
        }
        $(this).data("beeper", i);
    }).mouseenter(function() {
        $("#beep-two" + $(this).data("beeper"))[0].play();
        $("#beep-two" + $(this).data("beeper"))[0].volume = 0.4;
    });
    $(".date-time").each(function(i) {
        if (i != 0) {
            var audio = document.getElementsByTagName("audio")[0];
            $('#beep-two')
                .clone()
                .attr("id", "beep-two" + i)
                .appendTo($(this).parent());
        }
        $(this).data("beeper", i);
    }).mouseenter(function() {
        $("#beep-two" + $(this).data("beeper"))[0].play();
        $("#beep-two" + $(this).data("beeper"))[0].volume = 0.4;
    });




    $("#beep-two").attr("id", "beep-two0");
    //Share buttons
    //==================================================
    $( ".share-box" ).hover(
        function() {
            $(".bespoke-active").addClass('openshare');
            $(this).toggleClass('open');

        }, function() {
            $(".bespoke-slide").removeClass('openshare');
            $(this).removeClass( "open" ).delay( 1800 );
        }
    );
    //Show / hide loading and elements
    //==================================================
    jQuery('.inifiniteLoaderP').removeClass('fadeOutDown').addClass("fadeInUp");
    jQuery('.inifiniteLoaderP').removeClass('fadeInUp').addClass("fadeOutDown");
    setTimeout(function(){
        jQuery('.tt-voice-c').removeClass('fadeOutDown').addClass("fadeInUp");
    },200);
    setTimeout(function(){
        jQuery('.logo').removeClass('fadeOutDown').addClass("fadeInUp");
    },1400);
    setTimeout(function(){
        jQuery('.tt-bottom-nav').removeClass('fadeOutDown').addClass("fadeInUp");
    },400);
    setTimeout(function(){
        jQuery('.copyrholder').removeClass('fadeOutDown').addClass("fadeInUp");
    },1200);
    setTimeout(function(){
        jQuery('.date-time').removeClass('fadeOutDown').addClass("fadeInUp");
    },600);
    setTimeout(function(){
        jQuery('.numpostinfi').removeClass('fadeOutDown').addClass("fadeInUp");
    },800);
    setTimeout(function(){
        jQuery('.breadcrumbs').removeClass('fadeOutDown').addClass("fadeInUpt");
    },800);
    setTimeout(function(){
        jQuery('.dl-menuwrapper').removeClass('fadeOutDown').addClass("fadeInUp");
    },1000);
    setTimeout(function(){
        jQuery('.p-position').removeClass('fadeOutDown').addClass("fadeInUp");
    },1200);

    //For touch devices
    //==================================================
    $('a').live('touchend', function(e) {
        var el = $(this);
        var link = el.attr('href');
    });
    //pretty Photo settings( ! Don't change )
    //==================================================
    $("a[rel^='prettyPhoto']").prettyPhoto({theme: 'dark_square', allow_resize: false,});
    $("a[rel^='prettyPhotoImages']").prettyPhoto({theme: 'dark_square',allow_resize: true});
    //Image hover animation
    //==================================================
    'strict mode';
    if(Modernizr.csstransforms3d !== false){
        var imgholder = document.getElementsByClassName("hover-effect");
        for(var i = 0, j=imgholder.length; i<j; i++){
            imgholder[i].addEventListener("mouseover", function(){
                var imgtoanimate = this.getElementsByTagName("img")[0];
                if(imgtoanimate){
                    move(imgtoanimate)
                        .rotate(10)
                        .scale(1.5)
                        .duration('0.8s')
                        .end();
                }
            });
            imgholder[i].addEventListener("mouseout", function(){
                var imgtoanimate = this.getElementsByTagName("img")[0];
                if(imgtoanimate){
                    move(imgtoanimate)
                        .rotate(0)
                        .scale(1)
                        .duration('0.8s')
                        .end();
                }
            });
        }
    }
    //Menu search ico
    //==================================================
    $('#s').data('holder',$('#s').attr('placeholder'));
    //$("body").click(function() {
    $('#s').focusin(function(){
        $("#searchform").addClass("hidesico");
        $(this).attr('placeholder','');
    });
    $('#s').focusout(function(){
        if(!$(this).val() || $(this).val()!=''  ){
            $("#searchform").removeClass("hidesico");
        }
        $(this).attr('placeholder',$(this).data('holder'));
    });

    //Video background
    //==================================================


    //Clock settings
    //==================================================
    function update(widget_id, time_format, date_format) {
        var months = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"),
            ampm = " AM",
            now = new Date(),
            hours = now.getHours(),
            minutes = now.getMinutes(),
            seconds = now.getSeconds(),
            $date = jQuery("#" + widget_id + " .tt-b-date"),
            $day = jQuery("#" + widget_id + " .tt-b-day"),
            $month = jQuery("#" + widget_id + " .tt-b-month"),
            $time = jQuery("#" + widget_id + " .tt-b-time");
        $ampa = jQuery("#" + widget_id + " .tt-b-amp");

        if (date_format != "none") {
            var currentTime = new Date(),
                year = currentTime.getFullYear(),
                month = currentTime.getMonth(),
                day = currentTime.getDate();

            if (date_format == "long") {
                $date.text(months[month] + " " + day + ", " + year);
            }
            else if (date_format == "medium") {
                $day.text(day);
                $month.text(months[month].substring(0, 3));
                $date.text(year);
            }
            else if (date_format == "short") {
                $date.text((month + 1) + "/" + day + "/" + year);
            }
            else if (date_format == "european") {
                $date.text(day + "/" + (month + 1) + "/" + year);
            }
        }
        if (time_format != "none") {
            if (hours >= 12) {
                ampm = " PM";
            }

            if (minutes <= 9) {
                minutes = "0" + minutes;
            }

            if (seconds <= 9) {
                seconds = "0" + seconds;
            }

            if ((time_format == "12-hour") || (time_format == "12-hour-seconds")) {
                if (hours > 12) {
                    hours = hours - 12;
                }

                if (hours == 0) {
                    hours = 12;
                }

                if (time_format == "12-hour-seconds") {
                    $time.text(hours + ":" + minutes + ":" + seconds);
                    $ampa.text(ampm);
                }
                else {
                    $time.text(hours + ":" + minutes);
                    $ampa.text(ampm);

                }
            }
            else if (time_format == "24-hour-seconds") {
                $time.text(hours + ":" + minutes  + ":" + seconds);
            }
            else {
                $time.text(hours + ":" + minutes);
            }
        }
        if ((date_format != "none") || (time_format != "none")) {
            setTimeout(function() {
                update(widget_id, time_format, date_format);
            }, 1000);
        }
    }
    update('footer-time', '12-hour', 'medium');
});


// </script>



// <script>
//Background image
//==================================================
jQuery(document).ready(function($){
    'strict mode';
    if(window.hasownbg != 1){
        jQuery.vegas('stop');
        jQuery.vegas({
            src:'https://cray.bg/themes/time-travel/wp-content/uploads/2014/01/defbg1.jpg',
            fade:4000,
            valign:'center',
            align:'center'

        })('overlay', {
            src:'https://cray.bg/themes/time-travel/wp-content/themes/timetravel/images/overlays/16.png',
        });
    }
});
// </script>

// <script>
//Ajax comments
//==================================================
jQuery(document).ready(function($){
    var commentform=$('#commentform');
    commentform.prepend('<div id="comment-status" ></div>');
    var statusdiv=$('#comment-status');

    commentform.submit(function(){
        var formdata=commentform.serialize();
        statusdiv.html('<p>Processing...</p>');
        var formurl=commentform.attr('action');
        $.ajax({
            type: 'post',
            url: formurl,
            data: formdata,
            error: function(XMLHttpRequest, textStatus, errorThrown){
                statusdiv.html('<p>You might have left one of the fields blank, or be posting too quickly</p>');
            },
            success: function(data, textStatus){
                if(data=="success"){
                    statusdiv.html('<p>Thanks for your comment. We appreciate your response.</p>');
                }else{
                    statusdiv.html('<p>Thanks for your comment. We appreciate your response.</p>');
                    commentform.find('textarea[name=comment]').val('');
                }
            }
        });
        return false;
    });
});
// </script>
// <script>
(function(moduleName, window, document) {
    var from = function(selector, selectedPlugins) {

            var parent = document.querySelector(selector),
                slides = [].slice.call(parent.children, 0),
                activeSlide = slides[0],
                deckListeners = {},
                relnum = 0,


                activate = function(index, customData) {
                    if (!slides[index]) {
                        return;
                    }
                    fire(deckListeners, 'deactivate', createEventData(activeSlide, customData));

                    activeSlide = slides[index];

                    slides.map(deactivate);

                    fire(deckListeners, 'activate', createEventData(activeSlide, customData));
                    addClass(activeSlide, 'active');
                    removeClass(activeSlide, 'inactive');
                    if ( jQuery.browser.msie && jQuery.browser.version == '9.0' ) {
                        jQuery( ".classictilt section.bespoke-before-3" ).animate({ "bottom": "2800px" },300, "linear" );
                        jQuery( ".classictilt section.bespoke-before-2" ).animate({ "bottom": "1600px" },300, "linear" );
                        jQuery( ".classictilt section.bespoke-before-1" ).animate({ "bottom": "800px" }, 300, "linear" );
                        //jQuery('.single-post section.bespoke-before-2').fadeTo(200, 0);



                        jQuery( ".classictilt section.bespoke-active" ).animate({ "bottom": "23%" }, 300, "linear", function(){
                            jQuery( ".single-post section.bespoke-active" ).css("visibility","visible" )} );
                        jQuery( ".classictilt section.bespoke-after-1" ).animate({ "bottom": "-950px" },300, "linear", function(){
                            jQuery( ".single-post  section.bespoke-after-1" ).css("visibility","hidden" )
                        });
                        jQuery( ".classictilt section.bespoke-after-2" ).animate({ "bottom": "-1700px" },300, "linear" );
                        jQuery( ".classictilt section.bespoke-after-3" ).animate({ "bottom": "-1700px" }, 300, "linear" );
                    }
                },

                deactivate = function(slide, index) {

                    //console.log(slide, index);

                    var offset = index - slides.indexOf(activeSlide),
                        offsetClass = offset > 0 ? 'after' : 'before';

                    ['before(-\\d+)?', 'after(-\\d+)?', 'active', 'inactive'].map(removeClass.bind(null, slide));
                    slide !== activeSlide &&
                    ['inactive', offsetClass, offsetClass + '-' + Math.abs(offset)].map(addClass.bind(null, slide));



                },

                slide = function(index, customData) {
                    fire(deckListeners, 'slide', createEventData(slides[index], customData)) && activate(index, customData);
                },

                next = function(customData) {
                    // window.os_count++;
                    // console.log(activeSlide);
                    // console.log(window.os_count+"<<<<<<");
                    var nextSlideIndex = slides.indexOf(activeSlide) + 1;

                    fire(deckListeners, 'next', createEventData(activeSlide, customData)) && activate(nextSlideIndex, customData);
                    if ( jQuery.browser.msie && jQuery.browser.version == '9.0' ) {
                        jQuery( ".classictilt section.bespoke-before-3" ).animate({ "bottom": "2800px" },300, "linear" );
                        jQuery( ".classictilt section.bespoke-before-2" ).animate({ "bottom": "1600px" },300, "linear" );
                        jQuery( ".classictilt section.bespoke-before-1" ).animate({ "bottom": "800px" }, 300, "linear" );


                        jQuery( ".single-post section.bespoke-active" ).css("visibility","visible" )
                        jQuery( ".classictilt section.bespoke-active" ).animate({ "bottom": "23%" }, 300, "linear", function(){} );
                        jQuery( ".classictilt section.bespoke-after" ).animate({ "bottom": "-950px" },300, "linear" );
                        jQuery( ".classictilt section.bespoke-after-1" ).animate({ "bottom": "-950px" },300, "linear" );
                        jQuery( ".classictilt section.bespoke-after-2" ).animate({ "bottom": "-1700px" },300, "linear" );
                        jQuery( ".classictilt section.bespoke-after-3" ).animate({ "bottom": "-1700px" }, 300, "linear" );
                    }

                    // window.location.hash = '!slide-'+jQuery( "section.bespoke-active" ).attr("rel");
                    window.current=jQuery( "section.bespoke-active" ).attr("rel");
                    window.updateProgressbar();
                    // window.location.hash = 'post-'+jQuery( "section.bespoke-active" ).find(".content-title").text();

//					os_count++;
                },

                prev = function(customData) {
                    // window.os_count--;

                    // console.log('-----', window.os_count);
                    var prevSlideIndex = slides.indexOf(activeSlide) - 1;

                    fire(deckListeners, 'prev', createEventData(activeSlide, customData)) && activate(prevSlideIndex, customData);
                    if ( jQuery.browser.msie && jQuery.browser.version == '9.0' ) {
                        jQuery( ".classictilt section.bespoke-before-3" ).animate({ "bottom": "2800px" },300, "linear" );
                        jQuery( ".classictilt section.bespoke-before-2" ).animate({ "bottom": "1600px" },300, "linear" );
                        jQuery( ".classictilt section.bespoke-before-1" ).animate({ "bottom": "800px" }, 300, "linear" );

                        /*jQuery('.single-post section.bespoke-before-1').fadeTo(200, 1);
                         jQuery('.single-post section.bespoke-before-2').fadeTo(200, 1);*/
                        jQuery( ".classictilt section.bespoke-active" ).animate({ "bottom": "23%" }, 300, "linear", function(){
                            jQuery( ".single-post section.bespoke-active" ).css("visibility","visible" )} );
                        jQuery( ".classictilt section.bespoke-after" ).animate({ "bottom": "-950px" },300, "linear" );
                        jQuery( ".classictilt section.bespoke-after-1" ).animate({ "bottom": "-950px" },300, "linear", function(){
                            jQuery( ".single-post  section.bespoke-after-1" ).css("visibility","hidden" )
                        });

                        jQuery( ".classictilt section.bespoke-after-2" ).animate({ "bottom": "-1700px" },300, "linear" );
                        jQuery( ".classictilt section.bespoke-after-3" ).animate({ "bottom": "-1700px" }, 300, "linear" );
                    }

                    // window.location.hash = '!slide-'+jQuery( "section.bespoke-active" ).attr("rel");
                    window.current=jQuery( "section.bespoke-active" ).attr("rel");
                    window.updateProgressbar();

                    //window.location.hash = jQuery( "section.bespoke-active" ).attr("rel");

                },

                createEventData = function(slide, eventData) {
                    eventData = eventData || {};
                    eventData.index = slides.indexOf(slide);
                    eventData.slide = slide;
                    return eventData;
                },

                deck = {
                    on: on.bind(null, deckListeners),
                    off: off.bind(null, deckListeners),
                    fire: fire.bind(null, deckListeners),
                    slide: slide,
                    next: next,
                    prev: prev,
                    parent: parent,
                    slides: slides
                };

            addClass(parent, 'parent');

            slides.map(function(slide) {

                addClass(slide, 'slide');
                jQuery(slide).attr('rel', relnum);
                relnum++;
            });

            Object.keys(selectedPlugins || {}).map(function(pluginName) {
                var config = selectedPlugins[pluginName];
                config && plugins[pluginName](deck, config === true ? {} : config);

            });

            if (slides.length === 10) {
                // console.log('1', slides);
                activate(0);
            }
            else {
                // console.log('2', slides);
                activate(8);
            }

            decks.push(deck);

            return deck;
        },

        decks = [],

        bespokeListeners = {},

        on = function(listeners, eventName, callback) {
            (listeners[eventName] || (listeners[eventName] = [])).push(callback);
        },

        off = function(listeners, eventName, callback) {
            listeners[eventName] = (listeners[eventName] || []).filter(function(listener) {
                return listener !== callback;
            });
        },

        fire = function(listeners, eventName, eventData) {
            return (listeners[eventName] || [])
                .concat((listeners !== bespokeListeners && bespokeListeners[eventName]) || [])
                .reduce(function(notCancelled, callback) {
                    return notCancelled && callback(eventData) !== false;
                }, true);
        },

        addClass = function(el, cls) {
            el.classList.add(moduleName + '-' + cls);
        },

        removeClass = function(el, cls) {
            el.className = el.className
                .replace(new RegExp(moduleName + '-' + cls +'(\\s|$)', 'g'), ' ')
                .replace(/^\s+|\s+$/g, '');
        },

        callOnAllInstances = function(method) {
            return function(arg) {
                decks.map(function(deck) {
                    deck[method].call(null, arg);
                });
            };
        },

        bindPlugin = function(pluginName) {
            return {
                from: function(selector, selectedPlugins) {
                    (selectedPlugins = selectedPlugins || {})[pluginName] = true;
                    return from(selector, selectedPlugins);
                }
            };
        },

        makePluginForAxis = function(axis) {
            return function(deck) {
                var startPosition,
                    delta;

                document.addEventListener('keydown', function(e) {
                    var key = e.which;

                    if (axis === 'X') {
                        key === 37 && deck.prev();
                        (key === 32 || key === 39) && deck.next();
                    } else {
                        key === 38 && deck.prev();
                        (key === 32 || key === 40) && deck.next();
                    }
                });

                deck.parent.addEventListener('touchstart', function(e) {
                    if (e.touches.length) {
                        startPosition = e.touches[0]['page' + axis];
                        delta = 0;
                    }
                });

                deck.parent.addEventListener('touchmove', function(e) {
                    if (e.touches.length) {
                        e.preventDefault();
                        delta = e.touches[0]['page' + axis] - startPosition;
                    }
                });

                deck.parent.addEventListener('touchend', function() {
                    Math.abs(delta) > 50 && (delta > 0 ? deck.prev() : deck.next());
                });
            };
        },

        plugins = {
            horizontal: makePluginForAxis('X'),
            vertical: makePluginForAxis('Y')
        };

    window[moduleName] = {
        from: from,
        slide: callOnAllInstances('slide'),
        next: callOnAllInstances('next'),
        prev: callOnAllInstances('prev'),
        horizontal: bindPlugin('horizontal'),
        vertical: bindPlugin('vertical'),
        on: on.bind(null, bespokeListeners),
        off: off.bind(null, bespokeListeners),
        plugins: plugins
    };

}('bespoke', this, document));
// </script>

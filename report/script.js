/**
 * Created by Oshevchuk on 18.10.2017.
 * http://oshevchuk2016.16mb.com/
 */
// <script>

// <!-- Force to reload page on back button for firefox
// ================================================== -->
//
window.name = "reloader";
window.onbeforeunload = function () {
    window.name = "reloader";
};
window.onunload = function () {
};

window._wpemojiSettings = {
    "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/72x72\/",
    "ext": ".png",
    "source": {"concatemoji": "https:\/\/cray.bg\/themes\/time-travel\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.2.16"}
};
!function (a, b, c) {
    function d(a) {
        var c = b.createElement("canvas"), d = c.getContext && c.getContext("2d");
        return d && d.fillText ? (d.textBaseline = "top", d.font = "600 32px Arial", "flag" === a ? (d.fillText(String.fromCharCode(55356, 56812, 55356, 56807), 0, 0), c.toDataURL().length > 3e3) : (d.fillText(String.fromCharCode(55357, 56835), 0, 0), 0 !== d.getImageData(16, 16, 1, 1).data[0])) : !1
    }

    function e(a) {
        var c = b.createElement("script");
        c.src = a, c.type = "text/javascript", b.getElementsByTagName("head")[0].appendChild(c)
    }

    var f, g;
    c.supports = {simple: d("simple"), flag: d("flag")}, c.DOMReady = !1, c.readyCallback = function () {
        c.DOMReady = !0
    }, c.supports.simple && c.supports.flag || (g = function () {
        c.readyCallback()
    }, b.addEventListener ? (b.addEventListener("DOMContentLoaded", g, !1), a.addEventListener("load", g, !1)) : (a.attachEvent("onload", g), b.attachEvent("onreadystatechange", function () {
        "complete" === b.readyState && c.readyCallback()
    })), f = c.source || {}, f.concatemoji ? e(f.concatemoji) : f.wpemoji && f.twemoji && (e(f.twemoji), e(f.wpemoji)))
}(window, document, window._wpemojiSettings);
//

'strict mode';
var slectloop = "loop";
var whait = 0;
var count = 2;
var total = 2;
var is_state = 0;
var var_string = 'a%3A61%3A%7Bs%3A8%3A%22post__in%22%3Ba%3A17%3A%7Bi%3A0%3Bi%3A248%3Bi%3A1%3Bi%3A251%3Bi%3A2%3Bi%3A397%3Bi%3A3%3Bi%3A4%3Bi%3A4%3Bi%3A2093%3Bi%3A5%3Bi%3A2094%3Bi%3A6%3Bi%3A2095%3Bi%3A7%3Bi%3A57%3Bi%3A8%3Bi%3A61%3Bi%3A9%3Bi%3A66%3Bi%3A10%3Bi%3A236%3Bi%3A11%3Bi%3A1904%3Bi%3A12%3Bi%3A1989%3Bi%3A13%3Bi%3A1993%3Bi%3A14%3Bi%3A2083%3Bi%3A15%3Bi%3A1931%3Bi%3A16%3Bi%3A1923%3B%7Ds%3A5%3A%22error%22%3Bs%3A0%3A%22%22%3Bs%3A1%3A%22m%22%3Bs%3A0%3A%22%22%3Bs%3A1%3A%22p%22%3Bi%3A0%3Bs%3A11%3A%22post_parent%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22subpost%22%3Bs%3A0%3A%22%22%3Bs%3A10%3A%22subpost_id%22%3Bs%3A0%3A%22%22%3Bs%3A10%3A%22attachment%22%3Bs%3A0%3A%22%22%3Bs%3A13%3A%22attachment_id%22%3Bi%3A0%3Bs%3A4%3A%22name%22%3Bs%3A0%3A%22%22%3Bs%3A6%3A%22static%22%3Bs%3A0%3A%22%22%3Bs%3A8%3A%22pagename%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22page_id%22%3Bi%3A0%3Bs%3A6%3A%22second%22%3Bs%3A0%3A%22%22%3Bs%3A6%3A%22minute%22%3Bs%3A0%3A%22%22%3Bs%3A4%3A%22hour%22%3Bs%3A0%3A%22%22%3Bs%3A3%3A%22day%22%3Bi%3A0%3Bs%3A8%3A%22monthnum%22%3Bi%3A0%3Bs%3A4%3A%22year%22%3Bi%3A0%3Bs%3A1%3A%22w%22%3Bi%3A0%3Bs%3A13%3A%22category_name%22%3Bs%3A0%3A%22%22%3Bs%3A3%3A%22tag%22%3Bs%3A0%3A%22%22%3Bs%3A3%3A%22cat%22%3Bs%3A0%3A%22%22%3Bs%3A6%3A%22tag_id%22%3Bs%3A0%3A%22%22%3Bs%3A6%3A%22author%22%3Bs%3A0%3A%22%22%3Bs%3A11%3A%22author_name%22%3Bs%3A0%3A%22%22%3Bs%3A4%3A%22feed%22%3Bs%3A0%3A%22%22%3Bs%3A2%3A%22tb%22%3Bs%3A0%3A%22%22%3Bs%3A5%3A%22paged%22%3Bi%3A0%3Bs%3A14%3A%22comments_popup%22%3Bs%3A0%3A%22%22%3Bs%3A8%3A%22meta_key%22%3Bs%3A0%3A%22%22%3Bs%3A10%3A%22meta_value%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22preview%22%3Bs%3A0%3A%22%22%3Bs%3A1%3A%22s%22%3Bs%3A0%3A%22%22%3Bs%3A8%3A%22sentence%22%3Bs%3A0%3A%22%22%3Bs%3A6%3A%22fields%22%3Bs%3A0%3A%22%22%3Bs%3A10%3A%22menu_order%22%3Bs%3A0%3A%22%22%3Bs%3A12%3A%22category__in%22%3Ba%3A0%3A%7B%7Ds%3A16%3A%22category__not_in%22%3Ba%3A0%3A%7B%7Ds%3A13%3A%22category__and%22%3Ba%3A0%3A%7B%7Ds%3A12%3A%22post__not_in%22%3Ba%3A0%3A%7B%7Ds%3A7%3A%22tag__in%22%3Ba%3A0%3A%7B%7Ds%3A11%3A%22tag__not_in%22%3Ba%3A0%3A%7B%7Ds%3A8%3A%22tag__and%22%3Ba%3A0%3A%7B%7Ds%3A12%3A%22tag_slug__in%22%3Ba%3A0%3A%7B%7Ds%3A13%3A%22tag_slug__and%22%3Ba%3A0%3A%7B%7Ds%3A15%3A%22post_parent__in%22%3Ba%3A0%3A%7B%7Ds%3A19%3A%22post_parent__not_in%22%3Ba%3A0%3A%7B%7Ds%3A10%3A%22author__in%22%3Ba%3A0%3A%7B%7Ds%3A14%3A%22author__not_in%22%3Ba%3A0%3A%7B%7Ds%3A19%3A%22ignore_sticky_posts%22%3Bb%3A0%3Bs%3A16%3A%22suppress_filters%22%3Bb%3A0%3Bs%3A13%3A%22cache_results%22%3Bb%3A1%3Bs%3A22%3A%22update_post_term_cache%22%3Bb%3A1%3Bs%3A22%3A%22update_post_meta_cache%22%3Bb%3A1%3Bs%3A9%3A%22post_type%22%3Bs%3A0%3A%22%22%3Bs%3A14%3A%22posts_per_page%22%3Bi%3A10%3Bs%3A8%3A%22nopaging%22%3Bb%3A0%3Bs%3A17%3A%22comments_per_page%22%3Bs%3A2%3A%2250%22%3Bs%3A13%3A%22no_found_rows%22%3Bb%3A0%3Bs%3A5%3A%22order%22%3Bs%3A4%3A%22DESC%22%3B%7D';

window.initajax = function () {

    if (count > total) {
        return false;
    } else {
        if (whait != 1) {
            loadArticle(count, is_state, var_string);
            whait = 1
        } else {
            return false;
        }
    }
    count++;
}

window.loadArticl= loadArticle;

function loadArticle(pageNumber, is_state, var_string) {



    jQuery('.inifiniteLoader').removeClass('fadeOutDown').addClass("fadeInUp");
    jQuery('.numpostinfi').removeClass('fadeInUp').addClass("fadeOutDown");
    jQuery.ajax({
        url: "https://cray.bg/themes/time-travel/wp-admin/admin-ajax.php",
        type: 'POST',
        data: "action=infinite_scroll&page_no=" + pageNumber + '&loop_file=' + slectloop + '&is_state=' + is_state + '&var_string=' + var_string,
        success: function (html) {
             console.log(html);
            jQuery('.inifiniteLoader').removeClass('fadeInUp').addClass("fadeOutDown");
            jQuery('.numpostinfi').removeClass('fadeOutDown').addClass("fadeInUp");
            jQuery("#articlehold").append(html);
            whait = 0;
        }
    });
    return false;
}


jQuery(document).ready(function ($) {

    //check for voice recognition
    //==================================================
    if (!annyang) {
        $('#tt-voice-c').css("display", "none");
        $('.tt-bottom-nav').css("border", "none");

    }
    'use strict';
    var themes,
        selectedThemeIndex,
        instructionsTimeout,
        deck;
    window.scrollinit=function () {
        deck = bespoke.from('article');
        // initThemeSwitching();
        AddedItems();
    };

    function AddedItems() {
        window.dom = 'fl';

        initInstructions();
        initKeys();
        initButtons();
        initSlideGestures();
        initClickInactive();
        loopreset();
        //moving();


        var hash = window.location.hash;
        var findme = "!slide-";
        var n = $("section").length;

        // var yourString = hash.replace(/[^\d.]/g, '');
        var yourString=window.current;
        // console.log(">>>" + yourString);
        // if (yourString && hash.indexOf(findme) > -1) {
        if (yourString) {

            if (n <= yourString) {
                document.removeEventListener('keydown', gokb);

                setTimeout(function () {
                    window.initajax()
                }, 10)

            }
            // deck.slide(yourString)
            // deck.slide(9);
            /*setTimeout( function(){
             $('article').css('overflow', 'hidden');
             deck.slide(yourString)},10);  */
        }


        var whichtehem = "0";
    }

    window.scrollinit_ = function () {
        deck = bespoke.from('article');
        initThemeSwitching();
    };

    setTimeout(scrollinit_, 1000);
    function initThemeSwitching() {
        themes = [
            'classictilt'
        ];
        selectedThemeIndex = 0;
        if (window.lastslide !== '') {
            deck.slide(window.lastslide - 1);
        } else {
            deck.slide(0);
        }
        if (window.openfirst !== 1) {
            window.gokb = '';

            if (annyang) {
                //share on twitter
                //==================================================
                var commands = {
                    'tweet': function () {
                        window.open($(".bespoke-active a.share-three").attr("rel"), '_blank', 'width=550,height=420');
                    },
                    //share on facebook
                    //==================================================
                    'share': function () {
                        window.open($(".bespoke-active a.share-two").attr("rel"), '_blank', 'width=600,height=400');
                    },
                    //open big image
                    //==================================================
                    'show picture': function () {
                        if ($(".bespoke-active a.voice-bigimage").attr("href")) {
                            $().prettyPhoto()
                            api_images = [$(".bespoke-active a.voice-bigimage").attr("href")];
                            $.prettyPhoto.open(api_images);
                        }
                    },
                    //close big image
                    //==================================================
                    'close': function () {
                        $.prettyPhoto.close();
                    },
                    //next slide
                    //==================================================
                    'next': function () {
                        deck.next();
                    },
                    //previous slide
                    //==================================================
                    'previous': function () {
                        deck.prev();
                    },
                    //go to beginig of the timeline
                    //==================================================
                    'scroll back': function () {
                        deck.slide(0);
                    },
                    //go to homepage
                    //==================================================
                    'home page': function () {
                        window.open("https://cray.bg/themes/time-travel", "_self");
                    },
                    //search
                    //==================================================
                    'search for *search': function (tag) {
                        window.open("https://cray.bg/themes/time-travel?s=" + tag, "_self");
                    },
                    //open post
                    //==================================================
                    'open': function () {
                        var storyId = $('.bespoke-active a.read-more-init').attr('href');
                        selectactive(storyId);
                    },
                    //more from this category
                    //==================================================
                    'more from same category': function () {
                        if ($('.bespoke-active a.voice-morefromthis').attr('href')) {
                            var storyId = $('.bespoke-active a.voice-morefromthis').attr('href');
                            selectactive(storyId);
                        }
                    },
                    //read comments
                    //==================================================
                    'show comments': function () {
                        if ($('.bespoke-active a.voice-readcomments').attr('href')) {
                            var storyId = $('.bespoke-active a.voice-readcomments').attr('href');
                            selectactive(storyId);
                        }
                    }
                };
                //languige of the voice control listener
                //==================================================
                annyang.setLanguage('en');
                annyang.init(commands);
                annyang.debug();

                //enable / disable voice control (using cookie)
                //==================================================
                var isone = ''
                $(function () {
                    //os voice disable
                    // $("#tt-voice-c").click(function() {
                    //     if (readCookie("voiceon") == 'on') {
                    //         $('#vocie-control').removeClass('icon-microphone').addClass('icon-microphone-off');
                    //         isone='off';
                    //         annyang.abort();
                    //     }
                    //     if (readCookie("voiceon") == 'off') {
                    //         $('#vocie-control').removeClass('icon-microphone-off').addClass('icon-microphone');
                    //         annyang.start();
                    //         isone='on';
                    //     }
                    //     createCookie("voiceon",isone);
                    //     return false;
                    // });
                    //
                    // if( readCookie("voiceon") == null ){
                    //     Opentip.tips[0].show();
                    // }
                    // if (readCookie("voiceon") == 'on') {
                    //     annyang.start();
                    //     $('#vocie-control').removeClass('icon-microphone-off').addClass('icon-microphone');
                    //     isone='on';
                    // }
                    // else if(readCookie("voiceon") == 'off' || readCookie("voiceon") == null ){
                    //     $('#vocie-control').removeClass('icon-microphone').addClass('icon-microphone-off');
                    //     annyang.abort();
                    //     isone='off';
                    //
                    // }
                    createCookie("voiceon", isone);
                });
                function createCookie(name, value, days) {
                    if (days) {
                        var date = new Date();
                        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                        var expires = "; expires=" + date.toGMTString();
                    }
                    else var expires = "";
                    document.cookie = name + "=" + value + expires + "; path=/";
                }

                function readCookie(name) {
                    var nameEQ = name + "=";
                    var ca = document.cookie.split(';');
                    for (var i = 0; i < ca.length; i++) {
                        var c = ca[i];
                        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                    }
                    return null;
                }

                function eraseCookie(name) {
                    createCookie(name, "", -1);
                }
            }
            var nmax = $("section").length - 1;
            window.openfirst = 1
            window.gomouse();
            //---------------------------------++
            deck.slide(0);

        }
        window.dom = 'fl';

        initInstructions();
        initKeys();
        initButtons();
        initSlideGestures();
        initClickInactive();
        loopreset();
        //moving();


        var hash = window.location.hash;

        var findme = "!slide-";
        var n = $("section").length;
        // var yourString = hash.replace(/[^\d.]/g, '');
        var yourString=window.current;
        // if (yourString && hash.indexOf(findme) > -1) {
        if (yourString) {

            if (n <= yourString) {
                document.removeEventListener('keydown', gokb);

                setTimeout(function () {
                    window.initajax()
                }, 10)

            }
            deck.slide(yourString)
            /*setTimeout( function(){
             $('article').css('overflow', 'hidden');
             deck.slide(yourString)},10);  */
        }


        var whichtehem = "0";
    }

    //Display wellcome buble (use cookie to show only once
    //==================================================
    function initInstructions() {
        if (isTouch()) {
            $('body').addClass('forios');
        }
        function setCookie(c_name, value, exdays) {
            var exdate = new Date();
            exdate.setDate(exdate.getDate() + exdays);
            var c_value = escape(value) + ((exdays === null) ? "" : "; expires=" + exdate.toUTCString());
            document.cookie = c_name + "=" + c_value;
        }

        function getCookie(c_name) {
            var c_value = document.cookie;
            var c_start = c_value.indexOf(" " + c_name + "=");
            if (c_start === -1) {
                c_start = c_value.indexOf(c_name + "=");
            }
            if (c_start === -1) {
                c_value = null;
            } else {
                c_start = c_value.indexOf("=", c_start) + 1;
                var c_end = c_value.indexOf(";", c_start);
                if (c_end === -1) {
                    c_end = c_value.length;
                }
                c_value = unescape(c_value.substring(c_start, c_end));
            }
            return c_value;
        }

        function checkCookie() {
            window.bopen = 2;
            var bubleopen = Number(getCookie("welcomemsg"));
            // console.log(bubleopen);
            // if (bubleopen !== 1) {
            if (!window.is_loaded_state) {

                $(document).ready(
                    function () {
                        window.bopen = 1;
                        $("#ss-container").unbind("mousewheel DOMMouseScroll");

                        showInstructions();
                        instructionsTimeout = setTimeout(showInstructions, 2000);


                        $('.osGo').on('click', function (e) {
                            hideInstructions();
                            window.bopen = 2;
                            // setTimeout(window.show, 5000);
                            // window.updateProgressbar();
                            window.show();
                            // $('#os_value').addClass('goo');
                            // setTimeout(function (e) {
                            //     // $('#os_value').removeClass('goo');
                            // }, 4800);
                        });
                    }
                )
            } else {
                // console.log(1);
                // setTimeout(window.show, 5000);
                // window.updateProgressbar();
                window.show();
                // $('#os_value').addClass('goo');
                // setTimeout(function (e) {
                // $('#os_value').removeClass('goo');
                // }, 4800);
            }
        }

        checkCookie();

        setCookie('welcomemsg', '1', 1);

        window.is_loaded_state=true;

        // window.location.hash = '!slide-0';
        window.current=0;
    }

    //Small bottom navigation
    //==================================================
    function initButtons() {
        document.getElementById('next-arrow').addEventListener('click', gonext);
        document.getElementById('prev-arrow').addEventListener('click', goprev);

//		console.log(deck);
//		console.log($('.bespoke-before').length);

//		setInterval(function (r) {
//
//			var value=os_count>9?9:os_count+1;
//			value=value*100/(9+1);
//			$('#os_value').css('width', value+'%');
//			gonext();
//
//			console.log(slides);
//			if(os_count==4){
//
//				os_count=0;
//
//			}
//		}, 5000);


        // setTimeout(window.show, 5000);
    }

    window.os_count = 0;
    window.totalCount = 16;

    window.sl = function(id){

        deck.slide(id);
    };
    window.current=0;
    window.show = function (e) {
        if (window.os_count < window.totalCount) {
            // deck.next();
            gonext();
            // deck.slide(5);

            $('#time_value').animate({width: '100%'}, 4900, "swing", function (cb) {
                $('#time_value').animate({width: '0%'}, 1);
            });
        } else {
            $('#time_value').stop(true, true);
            $('#os_value').stop(true, true);
        }
        setTimeout(window.show, 5000);
        // console.log(count);
    };

    var prev_value = 0;
    window.updateProgressbar = function (e) {
        // var t = window.location.hash ? window.location.hash : 0;
        var t = window.current ? window.current : 0;
        // console.log(t);
        var current = Number(t.substring(t.indexOf('-') + 1, 50));
        window.os_count = current;
        var value = (current) / (window.totalCount) * 100;

        // console.log(value);


        $('#os_value').animate({width: Math.round(value) + '%'}, {
            duration: 400, step: function (e) {
                $('#progress_value').text(Math.round(e) + "%");
                // console.log(e);
            }
        }).promise().done(function () {
            // console.log(prev_value, value);
            prev_value = value;
        });

    };

    function moving() {
        sleep(1000);
        gonext();
        sleep(1000);
        gonext();
        sleep(1000);
        gonext();
        sleep(1000);
        gonext();
        sleep(1000);
    }

    function sleep(milliseconds) {
        var start = new Date().getTime();
        for (var i = 0; i < 1e7; i++) {
            if ((new Date().getTime() - start) > milliseconds) {
                break;
            }
        }
    }


    function gonext() {

//		os_count= os_count<9?os_count++:0;
//         os_count++;
        // if(os_count>9){
        //     os_count=0;
        // }
        window.clearInterval(autorotateposts);
        deck.next();
        var n = $("section").length;
        $('section').each(function () {
            if ($(this).hasClass('bespoke-active') && Number($(this).attr('rel')) + 2 === n) {
                if (window.initajax() !== false) {
                    document.removeEventListener('keydown', gokb);
                    document.getElementById('next-arrow').removeEventListener('click', gonext);
                }
            }
        });
    }

    function goprev() {
        window.clearInterval(autorotateposts);
        deck.prev();
        var n = $("section").length;
        $('section').each(function () {
            if ($(this).hasClass('bespoke-active') && Number($(this).attr('rel')) + 2 === n) {
                if (window.initajax() !== false) {
                    document.removeEventListener('keydown', gokb);
                    document.getElementById('next-arrow').removeEventListener('click', gonext);
                }
            }
        });
    }

    //Keyboard navigation
    //==================================================
    var ShiftKey = false;

    function initKeys(e) {

        //document.removeEventListener('keydown', gokb);
        document.getElementById('next-arrow').removeEventListener('click', gonext);
        if (/Firefox/.test(navigator.userAgent)) {
            document.addEventListener('keydown', function (e) {
                if (e.which >= 37 && e.which <= 40) {
                    e.preventDefault();
                }
            });
        }
        window.gokb = function (e) {
            if (window.bopen === 1) {
                hideInstructions();
                window.bopen = 2;
            }
            var key = e.which;


            if (key === 13) {
                window.issearch = 0;
                $("#searchform").submit(function (e) {
                    window.issearch = 1;
                });
                if ($('.bespoke-active a.read-more-init').attr('href')) {
                    $("#ss-container").unbind("mousewheel DOMMouseScroll");
                    var storyId = $('.bespoke-active a.read-more-init').attr('href');
                    selectactive(storyId);
                    $("#ss-container").unbind("mousewheel DOMMouseScroll");
                }
            }
            if (key === 38 || (ShiftKey && key === 73)) {
                window.clearInterval(autorotateposts);
                deck.prev();
            }
            if (key === 40 || (ShiftKey && key === 75)) {
                window.clearInterval(autorotateposts);
                deck.next();
            }
            var n = $("section").length;
            $('section').each(function () {
                if ($(this).hasClass('bespoke-active') && Number($(this).attr('rel')) + 2 === n) {

                    if (window.initajax() !== false) {
                        document.removeEventListener('keydown', gokb);
                    }
                }
            });
            if (key === 16) {
                ShiftKey = true;
            }
            // prevKey=key;
        };

        window.goup = function (e) {
            var key = e.which;
            if (key === 16) {
                ShiftKey = false;
            }
            // console.log(key);
        };
        document.addEventListener('keydown', gokb);
        document.addEventListener('keyup', goup);

//		setInterval(function (e) {
//			console.log(1);
//			window.clearInterval(autorotateposts);
//			deck.prev();
//		}, 2000);
    }


    //Animate post on read more click
    //==================================================
    function selectactive(storyId) {
        var contentholder = document.getElementsByClassName("bespoke-active")[0];
        var allholder = document.getElementsByClassName("bespoke-parent")[0];
        allholder.style.opacity -= 0.1;
        document.body.style.opacity -= 0.1;
        move(contentholder)
            .scale(6)
            .duration('0.4s')
            .end(function () {
                if (window.issearch != 1) {
                    window.open(storyId, '_self');
                }
            });
    }

    function extractDelta(e) {
        if (e.wheelDelta) {
            return e.wheelDelta;
        }
        if (e.originalEvent.detail) {
            return e.originalEvent.detail * -40;
        }
        if (e.originalEvent && e.originalEvent.wheelDelta) {
            return e.originalEvent.wheelDelta;
        }
    }

    //Mouse wheel navigation
    //==================================================
    window.gomouse = function gomousewheel() {


        var n = $("section").length;
        $('section').each(function () {

            /*	if($(this).hasClass('bespoke-active') && $('div', this ).hasClass('right-content')) {
             $('body').removeClass('go-left');
             $('body').addClass('go-right');
             }else if($(this).hasClass('bespoke-active') && $('div', this ).hasClass('left-content')) {
             $('body').removeClass('go-right');
             $('body').addClass('go-left');
             }else if($(this).hasClass('bespoke-active') && $('div', this ).hasClass('center-content')) {
             $('body').removeClass('go-right');
             $('body').removeClass('go-left');
             $('body').addClass('go-center');

             }*/
            if ($(this).hasClass('bespoke-active') && Number($(this).attr('rel')) + 2 === n && jQuery(document).width() > 530) {
                if (window.initajax() === false) {
                    document.addEventListener('keydown', gokb);
                } else {
                    $("#ss-container").unbind("mousewheel DOMMouseScroll");
                    document.removeEventListener('keydown', gokb);
                }
            }
        });
        if (jQuery(document).width() < 530) {
            if (jQuery(window).scrollTop() > jQuery(document).height() - jQuery(window).height() - 150) {
                if (window.initajax() === false) {
                    document.addEventListener('keydown', gokb);
                } else {
                    $("#ss-container").unbind("mousewheel DOMMouseScroll");
                    document.removeEventListener('keydown', gokb);
                }
            }
        }
        //mouse scroll
        // $('#ss-container').bind('mousewheel DOMMouseScroll', function(e){
        //     if(extractDelta(e) > 0) {
        //         $("#ss-container").unbind("mousewheel DOMMouseScroll");
        //         setTimeout(prevp, 450);
        //     }
        //     if(extractDelta(e) < 0) {
        //         $("#ss-container").unbind("mousewheel DOMMouseScroll");
        //         setTimeout(nextp, 450);
        //     }
        // });
        function prevp() {
            window.clearInterval(autorotateposts);
            deck.prev();
            setTimeout(gomousewheel, 450);
        }

        function nextp() {
            window.clearInterval(autorotateposts);
            deck.next();
            setTimeout(gomousewheel, 450);
        }
    };
    if (window.openfirst === 1) {
        window.gomouse();
    }
    //Navigation for touch devices
    //==================================================
    function initSlideGestures() {
        var start = 0;
        var main = document.getElementById('main'),
            startPosition,
            delta,

            singleTouch = function (fn, preventDefault) {
                return function (e) {
                    if (e.touches.length === 1) {
                        fn(e.touches[0].pageY);
                    }
                };
            },
            touchstart = singleTouch(function (position) {
                startPosition = position;
                delta = 0;
                start = 0;
                main.addEventListener('touchend', touchend);
            }),

            touchmove = singleTouch(function (position) {
                delta = position - startPosition;
            }, true),

            touchend = function () {
                if (jQuery(document).width() < 530) {
                    if (jQuery(window).scrollTop() > jQuery(document).height() - jQuery(window).height() - 130) {
                        if (window.initajax() === false) {
                            main.addEventListener('touchstart', touchstart);
                            main.addEventListener('touchmove', touchmove);
                            main.addEventListener('touchend', touchend);
                        } else {
                            main.removeEventListener('touchstart', touchstart);
                            main.removeEventListener('touchmove', touchmove);
                            main.removeEventListener('touchend', touchend);
                        }
                    }
                }
                if (Math.abs(delta) < 50) {
                    return;
                }
                if (delta > 0) {
                    window.clearInterval(autorotateposts);
                    deck.prev();
                } else {
                    window.clearInterval(autorotateposts);
                    deck.next();
                }
                var n = $("section").length;
                $('section').each(function () {
                    if ($(this).hasClass('bespoke-active') && Number($(this).attr('rel')) + 2 === n && jQuery(document).width() > 530) {
                        if (window.initajax() === false) {
                            main.addEventListener('touchstart', touchstart);
                            main.addEventListener('touchmove', touchmove);
                            main.addEventListener('touchend', touchend);
                        } else {
                            main.removeEventListener('touchstart', touchstart);
                            main.removeEventListener('touchmove', touchmove);
                            main.removeEventListener('touchend', touchend);
                        }
                    }
                });

            };
        window.remvoetuch = function () {
            main.removeEventListener('touchstart', touchstart);
            main.removeEventListener('touchmove', touchmove);
            main.removeEventListener('touchend', touchend);
        };
        window.addtuch = function () {
            main.addEventListener('touchstart', touchstart);
            main.addEventListener('touchmove', touchmove);
            main.addEventListener('touchend', touchend);
        };
        window.addtuch();
    }

    //Show hide wellcome bubble
    //==================================================
    function showInstructions() {
        $('#ss-container').addClass('addblur');
        $('#footer').addClass('addblur');
        $('#dl-menu').addClass('addblur');
        $('.right-bottom-nav').addClass('addblur');
        $('.opentip-container').addClass('addblur');
        $('.addbg').addClass('addbgv');
        $('.addbg').click(function () {
            if (window.bopen === 1) {
                hideInstructions();
                window.bopen = 2;
            }
            $(this).unbind("click");
        });
        document.querySelectorAll('header .welcome-b')[0].className = 'welcome-b visible animated fadeInUp';
    }

    function hideInstructions() {
        window.gomouse();
        $('#ss-container').removeClass('addblur');
        $('#footer').removeClass('addblur');
        $('#dl-menu').removeClass('addblur');
        $('.right-bottom-nav').removeClass('addblur');
        $('.opentip-container').removeClass('addblur');
        $('.addbg').removeClass('addbgv');
        clearTimeout(instructionsTimeout);
        document.querySelectorAll('header .welcome-b')[0].className = 'welcome-b';
    }

    function isTouch() {
        return !!('ontouchstart' in window) || navigator.msMaxTouchPoints;
    }

    function modulo(num, n) {
        return ((num % n) + n) % n;
    }

    //Mouse click navigation
    //==================================================
    function initClickInactive() {
        $(".tt-cn-style").unbind("click");
        var main = document.getElementById('main');
        var n = $("section").length;
        window.lastslide = n;
        $('.tt-cn-style').click(function () {
            //alert('111');
            window.clearInterval(autorotateposts);
            var page = $(this).parent().attr('rel');
            var count = Number(page) + 1;
            if ($(this).parent().hasClass('bespoke-inactive')) {

                if (count === n) {
                    if (window.initajax() === false) {
                        document.addEventListener('keydown', gokb);
                        window.remvoetuch();
                        initSlideGestures();
                    } else {
                        document.removeEventListener('keydown', gokb);
                        window.remvoetuch();
                    }
                }
                deck.slide(page);
            }
        });
    }

    function loopreset() {
        $('a').live('touchend', function (e) {
            var el = $(this);
            var link = el.attr('href');
        });
        //pretty Photo settings( ! Don't change )
        //==================================================

        $("a[rel^='prettyPhotoImages']").prettyPhoto({theme: 'dark_square', allow_resize: false});

        $("a[rel^='prettyPhotoImages']").prettyPhoto({theme: 'dark_square', allow_resize: true});

        //Animate post on read more click
        //==================================================
        var contentholder = document.getElementsByClassName("bespoke-active");
        var allholder = document.getElementsByClassName("bespoke-parent");

        function animate() {
            'use strict';
            $('a.read-more-init').click(function () {
                var storyId = $(this).attr('href');
                selectactive(storyId);
                return false;
            });
            function selectactive(storyId) {
                $("#ss-container").unbind("mousewheel DOMMouseScroll");
                allholder[0].style.opacity -= 0.1;
                document.body.style.opacity -= 0.1;
                move(contentholder[0])
                    .scale(6)
                    .duration('0.4s')
                    .end(function () {
                        window.open(storyId, '_self');
                    });
            }
        }

        animate();

        //Image hover animation
        //==================================================

        'strict mode';
        if (Modernizr.csstransforms3d !== false) {
            var imgholder = document.getElementsByClassName("hover-effect");
            for (var i = 0, j = imgholder.length; i < j; i++) {
                imgholder[i].addEventListener("mouseover", function () {
                    var imgtoanimate = this.getElementsByTagName("img")[0];
                    if (imgtoanimate) {
                        move(imgtoanimate)
                            .rotate(10)
                            .scale(1.5)
                            .duration('0.8s')
                            .end();
                    }
                });
                imgholder[i].addEventListener("mouseout", function () {
                    var imgtoanimate = this.getElementsByTagName("img")[0];
                    if (imgtoanimate) {
                        move(imgtoanimate)
                            .rotate(0)
                            .scale(1)
                            .duration('0.8s')
                            .end();
                    }
                });
            }
        }

        $(".share-box").hover(function () {
            $(".bespoke-active").addClass('openshare');
            $(this).addClass('open');

        }, function () {
            $(".bespoke-slide").removeClass('openshare');
            $(this).removeClass("open").delay(1800);
        })
        $(".timedate")
            .each(function (i) {
                if (i != 0) {
                    var audio = document.getElementsByTagName("audio")[0];
                    $('#beep-two')
                        .clone()
                        .attr("id", "beep-two" + i)
                        .appendTo($(this).parent());
                }
                $(this).data("beeper", i);
            })
            .mouseenter(function () {
                $("#beep-two" + $(this).data("beeper"))[0].play();
                $("#beep-two" + $(this).data("beeper"))[0].volume = 0.4;
            });
    }

    //Animate post on read more click
    //==================================================
    var contentholder = document.getElementsByClassName("bespoke-active");
    var allholder = document.getElementsByClassName("bespoke-parent");

    function animate() {
        $('a.read-more-init').click(function () {
            var storyId = $(this).attr('href');
            selectactive(storyId);
            return false;
        });
        function selectactive(storyId) {
            $("#ss-container").unbind("mousewheel DOMMouseScroll");
            document.removeEventListener('keydown', gokb);
            allholder[0].style.opacity -= 0.1;
            document.body.style.opacity -= 0.1;
            move(contentholder[0])
                .scale(6)
                .duration('0.4s')
                .end(function () {
                    window.open(storyId, '_self');
                });
        }
    }

    animate();
    var autorotateposts

    function initAutoSlide() {
        autorotateposts = setInterval(deck.next, 3000);
    }
});
//</script>
define("sidebar","init",function(){var c,s="touch"==Device.type?"-240%":"-120%",i=!!navigator.userAgent.match(/(UCBrowser|UCWEB)/i),l=50,d=60,r=Device.android(),e=!1,p={locked:!1,lock:function(e){p.locked=e,Device.android_app&&window.SpacesApp.exec("sidebar",{enable:!e})},init:function(){$("#home_link, #sidebarOverlay").off("click.sidebar").on("click.sidebar",function(e){e.preventDefault(),p.toggle()}),e||(e=!0,p.initSwipe())},toggle:function(e){var i=ge("#sidebar_wrap"),t=ge("#left_nav_bg"),n=ge("#content_wrap_move"),o=ge("#main_search_form"),a=ge("#main_search_input_ico");i&&ge("#wrap_all").clientWidth&&(e=e===undefined?!hasClass(i,"sidebar_open_width"):e,Device.android_app&&Loader.loaded("jq",function(){e?(c=$(window).scrollTop(),$("html, body").scrollTop(0),$("#siteContent").css({marginTop:-c})):($("#siteContent").css({marginTop:0}),$("html, body").scrollTop(c)),$("#pmb8876").remove(),$("#navi").append('<div id="pmb8876">')}),toggleClass(i,"sidebar_open_width",e),t&&toggleClass(t,"sidebar_open_width",e),n.style.marginRight=e?s:0,o&&(o.style.display="block"),a&&(a.style.display=e?"none":"block"),$("body").toggleClass("openSidebar",e),$("#home_link").toggleClass("horiz-menu__link_no_hover",e))},initSwipe:function(){var a,c,s,e=document.body;!e.addEventListener||"touch"!=Device.type||"operamini"==Device.browser||i||Device.android_app||(c=a=0,s=!1,e.addEventListener("touchstart",function(e){p.locked||(Spaces.lastActivity=Date.now(),s=!e.touches||1==e.touches.length,a=e.touches?e.touches[0].clientX:e.clientX,c=e.touches?e.touches[0].clientY:e.clientY)},!1),e.addEventListener("touchmove",function(e){if(s){var i=e.touches?e.touches[0].clientX:e.clientX,t=e.touches?e.touches[0].clientY:e.clientY,n=Math.abs(i-a),o=Math.abs(t-c);d<o?s=!1:o<=.66*n?(r&&e.preventDefault(),l<=n&&(p.toggle(a<=i),s=!1)):s=!1}},!1))}};window.Sidebar=p,$(function(){p.init()})});
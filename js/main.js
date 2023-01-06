!function(e){var n;if("function"==typeof define&&define.amd)define(["jquery"],e);else if("object"==typeof exports){try{n=require("jquery")}catch(o){}module.exports=e(n)}else{var r=window.Cookies,t=window.Cookies=e(window.jQuery);t.noConflict=function(){return window.Cookies=r,t}}}(function(e){function n(e){return s.raw?e:encodeURIComponent(e)}function o(e){return s.raw?e:decodeURIComponent(e)}function r(e){return n(s.json?JSON.stringify(e):String(e))}function t(e){0===e.indexOf('"')&&(e=e.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\"));try{return e=decodeURIComponent(e.replace(f," ")),s.json?JSON.parse(e):e}catch(n){}}function i(e,n){var o=s.raw?e:t(e);return u(n)?n(o):o}function c(){for(var e,n,o=0,r={};o<arguments.length;o++){n=arguments[o];for(e in n)r[e]=n[e]}return r}function u(e){return"[object Function]"===Object.prototype.toString.call(e)}var f=/\+/g,s=function(e,t,f){if(arguments.length>1&&!u(t)){if(f=c(s.defaults,f),"number"==typeof f.expires){var a=f.expires,d=f.expires=new Date;d.setMilliseconds(d.getMilliseconds()+864e5*a)}return document.cookie=[n(e),"=",r(t),f.expires?"; expires="+f.expires.toUTCString():"",f.path?"; path="+f.path:"",f.domain?"; domain="+f.domain:"",f.secure?"; secure":""].join("")}for(var p=e?void 0:{},l=document.cookie?document.cookie.split("; "):[],m=0,v=l.length;v>m;m++){var g=l[m].split("="),w=o(g.shift()),j=g.join("=");if(e===w){p=i(j,t);break}e||void 0===(j=i(j))||(p[w]=j)}return p};return s.get=s.set=s,s.defaults={},s.remove=function(e,n){return s(e,"",c(n,{expires:-1})),!s(e)},e&&(e.cookie=s,e.removeCookie=s.remove),s});
;$(document).ready(function() {
    var cashe = $("#videoplayer719").attr("data-cashe");
    if ( cashe < 1 ) {
        var kpid = $("#videoplayer719").attr("data-kpid");
        var season = $("#videoplayer719").attr("data-season");
        var series = $("#videoplayer719").attr("data-series");
        var newsid = $("#videoplayer719").attr("data-newsid");
        var showseason = $("#videoplayer719").attr("data-showseason");
        var source = $("#videoplayer719").attr("data-source");
        var action = 'pageload';
        var trid = '0';
        var cook = '0';
        var wlp = newsid;
        if ( $.cookie('les_' + wlp) != null && $.cookie('les_' + wlp) != undefined && $.cookie('les_' + wlp) != 'null' ) {
            arr = $.cookie('les_' + wlp).split(',');
            trid = arr[0];
            season = arr[1];
            series = arr[2];
            cook = 1;
        }
        $.ajax({
            url: "/engine/ajax/newms.php",
            type: "POST",
            dataType: "html",
            data: {kpid:kpid,trid:trid,season:season,series:series,action:action,cook:cook,newsid:newsid,showseason:showseason,source:source},
            beforeSend: function() {
                showloadpic();
            },
            success: function(data) {
                $("#videoplayer719").html(data);
                hideloadpic();
            },
            complete: function() {
                scrolltoactive();
            }
        });
    } else {
        scrolltoactive()
    }
});
function translates() {
    $('#translators-list').on('click','.b-translator__item',function() {
        var _self = $(this);
        if(!_self.hasClass('active')) {
            $('.b-translator__item').removeClass('active');
            _self.addClass('active');
            var kpid = $("#videoplayer719").attr("data-kpid");
            var season = $("#videoplayer719").attr("data-season");
            var series = $("#videoplayer719").attr("data-series");
            var trid = _self.attr("data-trid");
            var showseason = $("#videoplayer719").attr("data-showseason");
            var action = 'translates';
            $.ajax({
                url: "/engine/ajax/newms.php",
                type: "POST",
                dataType: "html",
                data: {kpid:kpid,season:season,series:series,trid:trid,action:action,showseason:showseason},
                beforeSend: function() {
                    showloadpic();
                },
                success: function(data) {
                    $('#player').html(data);
                    hideloadpic();
                },
                complete: function() {
                    scrolltoactive();
                }
            });
        }
    });
}
function seasons() {
    $('#simple-seasons-tabs').on('click','.b-simple_season__item',function() {
        var _self = $(this);
        if(!_self.hasClass('active')) {
            $('.b-simple_season__item').removeClass('active');
            _self.addClass('active');
            var kpid = $("#videoplayer719").attr("data-kpid");
            var seasid = _self.attr("data-seasid");
            var trid = _self.attr("data-trid");
            var action = 'seasons';
            $.ajax({
                url: "/engine/ajax/newms.php",
                type: "POST",
                dataType: "html",
                data: {kpid:kpid,seasid:seasid,action:action,trid:trid},
                beforeSend: function() {
                    showloadpic();
                },
                success: function(data) {
                    $('#ibox').html(data);
                    hideloadpic();
                },
                complete: function() {
                    scrolltoactive();
                }
            });
        }
    });
}
function episodes() {
    $('#simple-episodes-list').on('click','.b-simple_episode__item',function() {
        var _self = $(this);
        var seasid = _self.attr("data-season_id");
        var trid = '0';
        var trid = _self.attr("data-trid");
        var trna = $('#translators-list li.active').text();
        var episode = _self.attr("data-episode_id");
        var _iframe_block = $('#player').find('iframe').clone();
        var crop = _iframe_block.attr("src").indexOf("episode=");
        var src = _iframe_block.attr("src").slice(0,crop + 8);
        var newsid = $("#videoplayer719").attr("data-newsid");
        if(!_self.hasClass('active')) {
            var cookie_value = trid + ',' + seasid + ',' + episode;
            var wlp = newsid;
            $.cookie('les_' + wlp, cookie_value, {
                expires: 14
            });
            if ( trna != '' ) {
                $('#les').html('. Вы остановились на ' + seasid + ' сезоне ' + episode + ' серии' + ' в озвучке &laquo;' + trna + '&raquo;');
                if ( $('#lesc').html() != '' ) $('#les').append('<img src="/images/process-stop.png" onclick="del();" id="lesc" title="Удалить отметку" />');
            } else {
                $('#les').html('. Вы остановились на ' + seasid + ' сезоне ' + episode + ' серии');
                if ( $('#lesc').html() != '' ) $('#les').append('<img src="/images/process-stop.png" onclick="del();" id="lesc" title="Удалить отметку" />');
            }
            var action = 'cache';
            var newsid = $("#videoplayer719").attr("data-newsid");
            $.ajax({
                url: "/engine/ajax/newms.php",
                type: "POST",
                dataType: "html",
                data: {action:action,newsid:newsid},
            });
            $('#ln').html('');
            $('.b-simple_episode__item').removeClass('active');
            _self.addClass('active');
            showloadpic();
            $('#player').find('iframe').attr('src', src + episode);
            hideloadpic();
        }
    });
}
function del() {
    var newsid = $("#videoplayer719").attr("data-newsid");
    $('#les').html('');
    $('#ln').html('');
    $('#lesc').remove();
    var wlp = newsid;
    $.cookie('les_' + wlp, null, {
        expires: 14
    });
    var action = 'cache';
    var newsid = $("#videoplayer719").attr("data-newsid");
    $.ajax({
        url: "/engine/ajax/newms.php",
        type: "POST",
        dataType: "html",
        data: {action:action,newsid:newsid},
    });
}
function episodes_hd() {
    $('#simple-episodes-list').on('click','.b-simple_episode__item',function() {
        var _self = $(this);
        var seasid = _self.attr("data-season_id");
        var trid = '0';
        var trid = _self.attr("data-trid");
        var trna = $('#translators-list li.active').text();
        var episode = _self.attr("data-episode_id");
        var src = _self.data("epizode_url");
        var newsid = $("#videoplayer719").attr("data-newsid");
        if(!_self.hasClass('active')) {
            var cookie_value = trid + ',' + seasid + ',' + episode;
            var wlp = newsid;
            $.cookie('les_' + wlp, cookie_value, {
                expires: 365
            });
            if ( trna != '' ) {
                $('#les').html('. Вы остановились на ' + seasid + ' сезоне ' + episode + ' серии' + ' в озвучке &laquo;' + trna + '&raquo;');
                if ( $('#lesc').html() != '' ) $('#les').append('<img src="/images/process-stop.png" onclick="del();" id="lesc" title="Удалить отметку" />');
            } else {
                $('#les').html('. Вы остановились на ' + seasid + ' сезоне ' + episode + ' серии');
                if ( $('#lesc').html() != '' ) $('#les').append('<img src="/images/process-stop.png" onclick="del();" id="lesc" title="Удалить отметку" />');
            }
            var action = 'cache';
            var newsid = $("#videoplayer719").attr("data-newsid");
            $.ajax({
                url: "/engine/ajax/newms.php",
                type: "POST",
                dataType: "html",
                data: {action:action,newsid:newsid},
            });
            var ep = _self.html();
            $('#ln').html('');
            $('.b-simple_episode__item').removeClass('active');
            _self.addClass('active');
            showloadpic();
            $('#player').find('iframe').attr('src', src);
            hideloadpic();
        }
    });
}
function translates_hd() {
    $('.b-translators__block').on('click','.b-translator__item',function(){
        var _self = $(this);
        if(!_self.hasClass('active')) {
            $('.b-translator__item').removeClass('active');
            _self.addClass('active');
            var kpid = $("#videoplayer719").attr("data-kpid");
            var season = $("#videoplayer719").attr("data-season");
            var series = $("#videoplayer719").attr("data-series");
            var trid = _self.attr("data-trid");
            var showseason = $("#videoplayer719").attr("data-showseason");
            var action = 'translates_hd';
            $.ajax({
                url: "/engine/ajax/newms.php",
                type: "POST",
                dataType: "html",
                data: {kpid:kpid,season:season,series:series,trid:trid,action:action,showseason:showseason},
                beforeSend: function() {
                    showloadpic();
                },
                success: function(data) {
                    $('#player').html(data);
                    hideloadpic();
                },
                complete: function() {
                    scrolltoactive();
                }
            });
        }
    });
}
function seasons_hd(){
    $('#player').on('click','.b-simple_season__item',function() {
        var _self = $(this);
        if(!_self.hasClass('active')) {
            $('.b-simple_season__item').removeClass('active');
            _self.addClass('active');
            var kpid = $("#videoplayer719").attr("data-kpid");
            var seasid = _self.attr("data-seasid");
            var trid = _self.attr("data-trid");
            var action = 'seasons_hd';
            $.ajax({
                url: "/engine/ajax/newms.php",
                type: "POST",
                dataType: "html",
                data: {kpid:kpid,seasid:seasid,action:action,trid:trid},
                beforeSend: function() {
                    showloadpic();
                },
                success: function(data) {
                    $('#ibox').html(data);
                    console.log(data);
                    hideloadpic();
                },
                complete: function() {
                    scrolltoactive();
                }
            });
        }
    });
}
function scrolltoactive() {
    if ( $("div").is("#simple-episodes-tabs") ) {
        if ( ($('#videoplayer719').width() - 30) < document.getElementById('simple-episodes-tabs').scrollWidth ) {
            $('#simple-episodes-tabs').scrollTo($("#simple-episodes-list > .active"), 300);
        } else {
            $('.prevpl').hide();
            $('.nextpl').hide();
            $('#simple-episodes-tabs').css({'margin':'0px 5px'});
        }
    }
}
function prevpl(){
    var scroll = $('#videoplayer719').width()/2;
    $('#simple-episodes-tabs').scrollTo("-=" + scroll + "px", 300);
}
function nextpl(){
    var scroll = $('#videoplayer719').width()/2;
    $('#simple-episodes-tabs').scrollTo("+=" + scroll + "px", 300);
}
function showloadpic(){
    $('#player-loader-overlay').animate({opacity: "show"}, 450);
}
function hideloadpic(){
    $('#player-loader-overlay').animate({opacity: "hide"}, 600).html('');
}
function mwPlayerNEXTEPISODE(event) {
    if (event.data && event.data.message == 'MW_PLAYER_NEXT_EPISODE') {
        var _self = $('*[data-episode_id=' + event.data.value.episode + ']');
        var seasid = _self.attr("data-season_id");
        var trid = '0';
        var trid = _self.attr("data-trid");
        var trna = $('#translators-list li.active').text();
        var episode = _self.attr("data-episode_id");
        var newsid = $("#videoplayer719").attr("data-newsid");
        if(!_self.hasClass('active')) {
            var cookie_value = trid + ',' + seasid + ',' + episode;
            var wlp = newsid;
            $.cookie('les_' + wlp, cookie_value, {
                expires: 14
            });
            if ( trna != '' ) {
                $('#les').html('. Вы остановились на ' + seasid + ' сезоне ' + episode + ' серии' + ' в озвучке &laquo;' + trna + '&raquo;');
                if ( $('#lesc').html() != '' ) $('#les').append('<img src="/images/process-stop.png" onclick="del();" id="lesc" title="Удалить отметку" />');
            } else {
                $('#les').html('. Вы остановились на ' + seasid + ' сезоне ' + episode + ' серии');
                if ( $('#lesc').html() != '' ) $('#les').append('<img src="/images/process-stop.png" onclick="del();" id="lesc" title="Удалить отметку" />');
            }
            var action = 'cache';
            $.ajax({
                url: "/engine/ajax/newms.php",
                type: "POST",
                dataType: "html",
                data: {action:action,newsid:newsid},
            });
            $('#ln').html('');
            $('.b-simple_episode__item').removeClass('active');
            _self.addClass('active');
        }
    }
}
if (window.addEventListener) {
    window.addEventListener('message', mwPlayerNEXTEPISODE);
} else {
    window.attachEvent('onmessage', mwPlayerNEXTEPISODE);
}
$(function(){
    $('body').on('click', '.re_poletab', function() {
        var $thisd = $(this);
        var $name = $thisd.attr("data-re_xfn");
        var $id = $thisd.attr("data-re_page");
        var $newsid = $thisd.attr("data-re_idnews");

        $.post(dle_root + "engine/ajax/re_video_part.php", { block: $name, page: $id, id: $newsid}, function(data){
            if(data)
            {
                $(".epizode").removeClass("active");
                $("#" + $name + "_" + $id).addClass("active");
                $("#re_frameid").attr("src", data);
            }
        });
    });
});
/**
 * Copyright (c) 2007 Ariel Flesler - aflesler ○ gmail • com | https://github.com/flesler
 * Licensed under MIT
 * @author Ariel Flesler
 * @version 2.1.2
 */
;(function(f){"use strict";"function"===typeof define&&define.amd?define(["jquery"],f):"undefined"!==typeof module&&module.exports?module.exports=f(require("jquery")):f(jQuery)})(function($){"use strict";function n(a){return!a.nodeName||-1!==$.inArray(a.nodeName.toLowerCase(),["iframe","#document","html","body"])}function h(a){return $.isFunction(a)||$.isPlainObject(a)?a:{top:a,left:a}}var p=$.scrollTo=function(a,d,b){return $(window).scrollTo(a,d,b)};p.defaults={axis:"xy",duration:0,limit:!0};$.fn.scrollTo=function(a,d,b){"object"=== typeof d&&(b=d,d=0);"function"===typeof b&&(b={onAfter:b});"max"===a&&(a=9E9);b=$.extend({},p.defaults,b);d=d||b.duration;var u=b.queue&&1<b.axis.length;u&&(d/=2);b.offset=h(b.offset);b.over=h(b.over);return this.each(function(){function k(a){var k=$.extend({},b,{queue:!0,duration:d,complete:a&&function(){a.call(q,e,b)}});r.animate(f,k)}if(null!==a){var l=n(this),q=l?this.contentWindow||window:this,r=$(q),e=a,f={},t;switch(typeof e){case "number":case "string":if(/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(e)){e= h(e);break}e=l?$(e):$(e,q);case "object":if(e.length===0)return;if(e.is||e.style)t=(e=$(e)).offset()}var v=$.isFunction(b.offset)&&b.offset(q,e)||b.offset;$.each(b.axis.split(""),function(a,c){var d="x"===c?"Left":"Top",m=d.toLowerCase(),g="scroll"+d,h=r[g](),n=p.max(q,c);t?(f[g]=t[m]+(l?0:h-r.offset()[m]),b.margin&&(f[g]-=parseInt(e.css("margin"+d),10)||0,f[g]-=parseInt(e.css("border"+d+"Width"),10)||0),f[g]+=v[m]||0,b.over[m]&&(f[g]+=e["x"===c?"width":"height"]()*b.over[m])):(d=e[m],f[g]=d.slice&& "%"===d.slice(-1)?parseFloat(d)/100*n:d);b.limit&&/^\d+$/.test(f[g])&&(f[g]=0>=f[g]?0:Math.min(f[g],n));!a&&1<b.axis.length&&(h===f[g]?f={}:u&&(k(b.onAfterFirst),f={}))});k(b.onAfter)}})};p.max=function(a,d){var b="x"===d?"Width":"Height",h="scroll"+b;if(!n(a))return a[h]-$(a)[b.toLowerCase()]();var b="client"+b,k=a.ownerDocument||a.document,l=k.documentElement,k=k.body;return Math.max(l[h],k[h])-Math.min(l[b],k[b])};$.Tween.propHooks.scrollLeft=$.Tween.propHooks.scrollTop={get:function(a){return $(a.elem)[a.prop]()}, set:function(a){var d=this.get(a);if(a.options.interrupt&&a._last&&a._last!==d)return $(a.elem).stop();var b=Math.round(a.now);d!==b&&($(a.elem)[a.prop](b),a._last=this.get(a))}};return p});
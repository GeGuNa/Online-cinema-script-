function spaces_track(e,t,s,r){1<Device.id&&require("metrics/track",function(){__spaces_track(e,t,s,r)})}


function liveinternet(){ge("#LI").innerHTML="<img src='//counter.yadro.ru/hit?t41.6;r"+escape(window.Spaces&&window.Spaces.referer||document.referrer)+("undefined"==typeof screen?"":";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+";"+Math.random()+"' alt='' border='0' width='1' height='1'/>"}


function attr(e,t){return e.getAttribute(t)}


function dattr(e,t){return attr(e,"data-"+t)}


function mkhash(e){var t,s={};for(t=0;t<e.length;++t)s[e[t][0]]=e[t][1];return s}

function light_json(val){return eval("("+val+")")}


function css2js(e){return(e||"").replace(/-([a-z])/g,function(e,t){return(t||"").toUpperCase()})}


function spaces_gifts(e,t,s){spac_ads.push({id:e,r:t,additional:s}),e&&require("mobiads_loader",function(){tick(function(){mobiads_loader(ge("#"+SPACES_PARAMS.ac+t+e),e,0)})}),require("mobiads")}


function find_parents(e,t,s){var r,i,n=[];if(t)for("."==t[0]?r=RegExp("(^|\\s)"+t.substr(1)+"(\\s|$)"):i=t.toLowerCase();(e=e.parentNode)&&(!(i&&e.nodeName.toLowerCase()==i||r&&r.test(e.className))||(n.push(e),!s)););else for(;(e=e.parentNode)&&e!=document;)n.push(e);return s?n[0]:n}


function each(e,t){var s,r,i;if(e)if("length"in e&&(0 in e||!e.length))for(s=0,r=e.length;s<r;++s)t.call(e[s],e[s],s);else for(i in e)isOwnProp.call(e,i)&&t.call(e[i],e[i],i)}

function base_domain(e){return(e=e||location.host.toString()).match(/[a-zA-Z-_\d]+\.[a-zA-Z-_\d]+\.?$/)[0]}

function text(e){return document.createTextNode(e)}

function ce(e,t,s,r){var i=document.createElement(e),n=[[t,i],[s,i.style],[r,"setAttribute"]];return each(n,function(e,t){var s=e[1];each(e[0],function(e,t){e!==undefined&&("string"==typeof s?i[s](t,e):s[t]=e)})}),i}

function is_empty_object(e){for(var t in e)if(isOwnProp.call(e,t))return!1;return!0}

function insert_after(e,t){var s=t.parentNode,r=t.nextSibling;return r?s.insertBefore(e,r):s.appendChild(e)}

function nsign(e){return e<0?-1:1}

function ge(e,t){var s,r,i,n,o,a,c=e.charAt(0);if("#"==c)return document.getElementById(e.substr(1));if("."==c||"`"==c){if((s=t||document).getElementsByClassName&&"."==c)return s.getElementsByClassName(e.substr(1));for(r=s.getElementsByTagName("*"),i=[],n=e.substr(1),o=RegExp("(^|\\s)"+n+"(\\s|$)"),a=0;a<r.length;++a)o.test(r[a].className)&&i.push(r[a]);return i}return null}

function numeral(e,t){return t[4<e%100&&e%100<20?2:[2,0,1,1,1,2][Math.min(e%10,5)]].replace(/\$n/g,e)}

function extend(){var e,t,s=arguments[0];for(e=1;e<arguments.length;++e)if(arguments[e])for(t in arguments[e])isOwnProp.call(arguments[e],t)&&(s[t]=arguments[e][t]);return s}

function insert_before(e,t){return e.parentElement.insertBefore(t,e),t}

function prepend(e,t){return e.firstChild?e.insertBefore(t,e.firstChild):e.appendChild(t),t}

function class_func(e,t){return function(){return t.apply(e,arguments)}}

function mk_callback(e,t,s){return s=s||[],function(){return t.apply(e||this,s.concat(arguments))}}

function can_eom(e,t,s){var r,i;for(s=s||["","webkit","moz","o","ms"],r=0;r<s.length;++r)if((i=s[r].length?s[r]+t.substr(0,1).toUpperCase()+t.substr(1):t)in e)return i;return!1}

function addClass(e,t){RegExp("(^|\\s)"+t+"(\\s|$)","g").test(e.className)||(e.className=(e.className+" "+t).replace(/\s+/g," ").replace(/(^ | $)/g,""))}

function removeClass(e,t){var s=RegExp("(^|\\s)"+t+"(\\s|$)","g");e.className=e.className.replace(s,"$1").replace(/\s+/g," ").replace(/(^ | $)/g,"")}

function hasClass(e,t){return!!e.className.match(RegExp("(\\s|^)"+t+"(\\s|$)"))}

function toggleClass(e,t,s){return"boolean"!=typeof s&&(s=!hasClass(e,t)),(s?addClass:removeClass)(e,t)}

function tick(e){setTimeout(e,0)}

function html_unwrap(e){var r={quot:'"',lt:"<",gt:">",nbsp:" ",amp:"&"};return((e||"")+"").replace(/&(#x[a-f\d]+|#\d+|[\w\d]+);/gim,function(e,t){var s;return"#"==t.charAt(0)?(s="x"==t.charAt(1)?parseInt(t.substr(2),16):parseInt(t.substr(1)),String.fromCharCode(s)):r[t]||t})}

function pad(e,t,s){var r,i;for(s=s||"0",r="",i=0;i<t-1;++i)r+=s;return(r+e).slice(-t)}

function html_wrap(e){var t={"<":"lt",">":"gt",'"':"quot","&":"amp"};return((e||"")+"").replace(/["'<>&]/gim,function(e){return"&"+(t[e]||"#"+e.charCodeAt(0))+";"})}

function set_caret_pos(e,t,s){if(e.setSelectionRange)e.focus(),e.setSelectionRange(t,s);else if(e.createTextRange){var r=e.createTextRange();r.collapse(!0),r.moveStart("character",t),r.moveEnd("character",s-t),r.select()}}

function m_evt(e,t,s,r){Loader.loaded(e)&&Spaces["$"+e+":"+t].apply(s,r||[])}

function toggle(e){var t=ge("#quote-"+e).style;return t.display="none"==t.display?"block":"none",!1}

function L(e,s){if("object"==typeof s)return e.replace(/\{([\w\d-_]+)\}/gim,function(e,t){return s[t]!==undefined?s[t]:e});if(1<arguments.length){var r=arguments;return e.replace(/\{(\d+)\}/gim,function(e,t){return t<r.length-1?r[+t+1]:e})}return e}

var isOwnProp,page_loader,pushstream,spac_ads,TSimpleEvents;

!function(c,l,d,p){
	
function u(e,t,s,r,i,n){var o,a;c.JSON&&JSON.stringify&&(n||p.log)&&(o=arguments,"complete"==l.readyState||"interactive"==l.readyState?((a=l.getElementById("sandbox_indicator"))||(s||r||!e.match(/Script error/))&&t)&&(y.push([e,h(t||"{main}"),s||0,r||0,REVISION,d.nid,p.id,a?a.getAttribute("data-owner"):"production",h(i)]),y.length>_&&y.shift(),m()?f():g()):setTimeout(function(){u.apply(c,o)},1e3))}

function f(){e||(e=setTimeout(g,t))}

function m(){try{if(c.localStorage)return c.localStorage.setItem("errors_queue",JSON.stringify(y)),!0}catch(e){}}

function g(){var e,t,s;if(y.length)if(e=(l.cookie.match(/llt=(\d+)/)||[0,0])[1],(t=(new Date).getTime())-e<i)f();else{l.cookie="llt="+t+"; path=/; domain=."+d.Domain.toLowerCase()+"; expires="+new Date(t+i).toGMTString();try{s=c.XDomainRequest?new XDomainRequest:new XMLHttpRequest}catch(r){}s&&(s.open("POST",BASE_URL+"/log/?v="+o,!0),s.send(JSON.stringify(y))),y=[],m()}}

function h(e){return(e+"").replace(/([a-f0-9]{32})|(\d{16})/gi,"").replace(/(password=)([^;&\s]+)/gi,"$1")}

var e,n,t=3e4,i=3e5,_=10,o=2,y=[];

!function(){y=[];try{c.localStorage&&(y=JSON.parse(c.localStorage.getItem("errors_queue"))||[])}catch(e){}}(),setTimeout(g,1e3),
n=c.onerror,
c.onerror=function(e,t,s,r,i){n&&n.apply(this,arguments),"[object Event]"==(e=""+e)||e.match(/PushStreamManager/)||(c.Spaces&&Spaces.onError&&Spaces.onError(e,t,s,r),u(h(e),t||"",s||0,r||0,location.href))},
c.spac_log=u}(window,document,SPACES_PARAMS,Device),
isOwnProp=Object.prototype.hasOwnProperty,
window.SPACES_MOBILE="mobile"==Device.type,
Device.android_app&&0<=document.cookie.indexOf("fake_app=1")&&(window.prompt=console.log),
spac_ads=[],
document.getElementsByClassName||(document.getElementsByClassName=function(e){return ge("`"+e,document.body)}),"forEach"in Array.prototype||(Array.prototype.forEach=function(e,t){for(var s=0,r=this.length;s<r;++s)e.call(t,this[s],s,this)}),"now"in Date||(Date.now=function(){return(new Date).getTime()}),function(){var t,e,s,r,i;window.get_caret_pos=function(e){var t,s=0;return document.selection?(e.focus(),(t=document.selection.createRange()).moveStart("character",-e.value.length),s=t.text.length,t.moveStart("character",s)):e.selectionStart&&(s=e.selectionStart),s};

try{
t=document.write,

document.write=function(){
	
var e=arguments;
if(!/<script[^>]+><\/script>/i.test(e[0]))return t.apply(this,e);

require("jq",function(){
Loader.loadScripts($(e[0]).toArray())
})
}
}

catch(n){}for(i in window.devicePixelRatio&&(document.cookie="dpr="+window.devicePixelRatio+"; expires="+new Date(Date.now()+864e5).toUTCString()+"; path=/; domain=."+base_domain()),e=function(){},s="assert,clear,count,debug,dir,dirxml,error,group,groupEnd,info,log,markTimeline,profile,profileEnd,table,time,timeEnd,timeStamp,timeline,timelineEnd,trace,warn".split(","),r=window.console=window.console||{},s)r[s[i]]=r[s[i]]||e}(),

function(E,A){
	
function R(e){var t,s,r;if("*"==e)return!0;for(e=e.split("|"),t=!1,s=0;s<e.length;++s)if(r=e[s],i[0][r]&&(t=!0),i[1][r]){t=!1;break}return t}

var 
e=A.type,
i=[
{
touch:"touch"==e,
touch_light:!!A.touch_light,
desktop:"desktop"==e,
mobile:"mobile"==e
},
{
no_operamini:"operamini"==A.browser,
no_oldmobile:A.old
}
],
N=function(){
	
function e(e,t,s){var r,i,n;"string"==typeof t&&((r={})[t]=s,t=r),(i=b[e]).internal=extend(i.internal||{init:null,onRequest:null,onRequire:null},t),h[e]&&t.onRequest&&i.internal.onRequest&&i.internal.onRequest(),i.state==x&&(n=i.internal.init,i.internal.init=null,n&&n())}

function c(e,t,s){var r,i,n,o,a;for(e instanceof Array||(e=[e]),i=r=0;i<e.length;++i)n=e[i],(o=b[n])?(o.name=n,o.state=o.state||0,(a=g[n])||(a={mod:o,cb:[],init:[]}),t&&a[s?"init":"cb"].push(t),o.state==x?(o.deps&&o.deps.length&&c(o.deps),o.preload&&o.preload.length&&c(o.preload),l(a)):(g[n]=a,o.deps&&o.deps.length&&c(o.deps),o.preload&&o.preload.length&&c(o.preload),++r)):console.error("Module "+n+" not found!");r&&d()}


function l(e){var t,s,r,i=!0;if(e.mod.state!=x&&(e.mod.state=C,e.mod.deps))for(t=0;t<e.mod.deps.length;++t)if(b[e.mod.deps[t]].state!=x){i=!1;break}if(s=!1,i){for(delete g[e.mod.name],e.mod.state!=x&&(e.mod.state=x,r=e.mod.init,e.mod.init=null,r&&r(),e.mod.internal&&(r=e.mod.internal.init,e.mod.internal.init=null,r&&r()),s=!0),t=0;t<e.init.length;++t)e.init[t]&&e.init[t]();for(e.init=[],h[e.mod.name]||(h[e.mod.name]=1,e.mod.onRequest&&e.mod.onRequest(),e.mod.internal&&e.mod.internal.onRequest&&e.mod.internal.onRequest()),e.mod.internal&&e.mod.internal.onRequire&&e.mod.internal.onRequire(),t=0;t<e.cb.length;++t)e.cb[t]&&e.cb[t]();e.cb=[]}return s}

function a(e){if(this.parentNode){if(this._done||this.readyState&&"loaded"!==this.readyState&&"complete"!==this.readyState)return;this._done=!0,this.onload=this.onreadystatechange=null,_[this.script_name]=2,r(S[this.script_name])}0==--e.mod._scripts&&(l(e),d())}

function d(){var e,t,s,r,i,n,o;if(w)for(;;){for(t in e=!0,g)if((s=g[t]).mod.state)s.mod.state!=k&&l(s)&&(e=!1);else if(s.mod.state=k,s.mod.preSetup&&s.mod.preSetup.call(s.mod,s.mod),s.mod.styles&&p(s.mod.styles),s.mod.scripts&&s.mod.scripts.length){for(r={},i=[],n=0;n<s.mod.scripts.length;++n)o=s.mod.scripts[n],r[o=v[o]||o]||(r[o]=1,i.push(o));for(s.mod._scripts=i.length,n=0;n<i.length;++n)m(u(i[n],BASE_URL,JS_REVISION),mk_callback(null,a,[s]))}else l(s),d();if(e)break}}


function p(e,t,s){var r,i,n,o,a,c=document.getElementsByTagName("head")[0],l=c.getElementsByTagName("link"),d=l[l.length-1];for(r=0;r<e.length;r++)n=0==(i=e[r]).indexOf("./"),i=j[i]||i,o=f(i=u(n?i.substr(2):i,n?BASE_URL:CSS_URL,REVISION,n?"":".css")),y[o]&&!s||(y[o]=1,d.parentNode.insertBefore(a=ce("link",{type:"text/css",rel:"stylesheet",href:i}),d),d=a)}

function t(){var e,t,s,r=document.location.protocol+"//"+document.location.hostname,i=document.getElementsByTagName("script");for(e=0;e<i.length;++e)(t=i[e]).parentNode&&t.src&&0==t.src.indexOf(r)&&(_[o(t.src)]=1);for(s=document.getElementsByTagName("link"),e=0;e<s.length;++e)(t=s[e]).parentNode&&"stylesheet"==t.rel.toLowerCase()&&t.href&&0==t.href.indexOf(r)&&(y[f(t.href)]=1)}

function u(e,t,s,r){
var i;
return t="/"==(i=t).charAt(0)?location.protocol+"://"+location.host+i:i,0==e.indexOf(t+"/")?n(e,s):0==e.indexOf("http:")||0==e.indexOf("https:")?e:"/"==e.charAt(0)?n(t+e,s):n(t+"/"+e+(r||""),s)}


function n(e,t){var s=e.indexOf("?");return 0<s&&(e=e.substr(0,s)),t?e+"?r="+t:e}
function f(e){return u(e,CSS_URL,null)}
function o(e){return u(e,BASE_URL,null)}

function m(e,t){var s,r=o(e),i=r in S;_[r]?t():(S[r]||(S[r]=[]),i?S[r].push(t):(S[r]=null,s={script_name:r,src:e,type:"text/javascript",async:"async",_done:!1,onreadystatechange:t,onload:t},A.log&&(s.crossOrigin="anonymous"),w.appendChild(ce("script",s))))}

function r(e){if(e)for(var t=0;t<e.length;++t)e[t]()}

var g={},h={},_={},y={},s=!1,b={},j={},v={},S={},i=[],w=null,k=1,C=2,x=3;

return E.require=c,

E.module_init=function(e,t){return c(e,t,!0)},

{$:function(e){each(e,function(e,t){if(R(t))for(var r=0;r<2;++r)each(e[r],function(e,t){for(var s=0;s<e.length;++s)r?j[e[s]]=t:v[e[s]+".js"]=t+".js"})})},_:function(e){var t,s;if(e){for(t=0;t<e.length;++t)s=o(BASE_URL+"/"+e[t]+".js"),_[s]=1,r(S[s]),S[s]=null;d()}},

P:function(e){each(e,function(e,t){var s,r;if(R(t))for(s=0;s<e.length;++s)r=o(BASE_URL+"/"+e[s]+".js"),S[r]=null}),d()},

require:c,


loadScripts:function(e,t){
var s,r,i,n,o;

if(!e.shift){for(s=[],r=0,i=e.length;r<i;++r)s.push(e[r]);e=s}
for(!e.length&&t&&setTimeout(t,0);0<e.length;)if((n=e.shift()).src){if((o=document.createElement("script")).src=n.src,o.type="text/javascript",o.async="async",t&&(o.onload=function(){N.loadScripts(e,t)}),n.parentElement?n.parentElement.replaceChild(o,n):w.appendChild(o),n=null,t)break}else"text/html"!=n.type&&setTimeout(n.textContent,0),0==e.length&&t&&setTimeout(t,0)
	
},

onDomReady:function(){if(t(),s=!0,0<i.length){for(var e=0;e<i.length;++e)setTimeout(i[e],0);i=[]}},

ready:function(e){s?e&&e():e&&i.push(e)},

init:function(){t(),w||(w=document.getElementsByTagName("head")[0],d()),document.body.className=document.body.className.replace(/js-off/g,"js-on")},

define:E.define=e,

loaded:function(e,t){return!(!b[e]||b[e].state!=x||(t&&c(e,t),0))},

loadCSS:p,

config:function(e,t){t&&each(e,function(e){(e.deps=e.deps||[]).push(t)}),extend(b,e)},

onNewRequestHandler:function(){h={}}}}();

(E.Loader=N).config({read_full:{scripts:["tools.js"]},devmenu:{scripts:["cookie.js","devmenu.js"]},checkall:{scripts:["checkall.js"]},device:{scripts:["device.js"]},"metrics/track":{scripts:["metrics/track.js"],


preSetup:function(){spaces_track(document.location.href,document.title,document.referrer,!0)}},spoiler:{scripts:["spoiler.js"]},mobiads:{scripts:["mobiads.js"]},sound_flash:{scripts:["sound_flash.js"]},sound:{scripts:["sound.js"]},clazz:{scripts:["class.js"]},smiles_data:{scripts:["smiles_data.js"]},smiles_menu:{styles:["CommentWidget/Toolbar"],deps:["smiles_data"],scripts:["lite/smiles_menu.js"]},show_gif:{scripts:["show_gif.js"]},mobiads_loader:{scripts:["mobiads_loader.js"]}}),N.config({jq:{scripts:["jquery.js","jquery_utils.js"]},lp:{deps:["clazz"],scripts:["pushstream.js","spaces.pushstream.js"]},config:{scripts:["proj/config.js"]},"android/api":{deps:["jq"],scripts:["android/api.js"]},spaces:{deps:["jq","lp","device","config","android/api"],scripts:["cookie.js","spacesLib.js"]},ajaxify:{deps:["spaces"],scripts:["ajaxify.js"]},notif:{deps:["ajaxify"],scripts:["notifications.js"]},core:{preload:["notif","ajaxify","spaces","lp","device","jq"],deps:["notif"]},text_restore:{scripts:["text_restore.js"]}}),N.config({lib_filesuploader:{scripts:["libs/FilesUploader.js"]},files_monitor:{scripts:["files_monitor.js"]},"jquery.flot":{scripts:["libs/jquery.flot.js"]},karma_graph:{deps:["jquery.flot"],scripts:["karma_graph.js"]},form:{deps:["form_tools"],scripts:["form_controls.js"]},anim:{scripts:["anim.js"]},form_tools:{scripts:["form_tools.js"]},gallery:{deps:["draggable","anim","likes"],scripts:["gallery.js"],styles:["Files/Gallery"]},min_height:{scripts:["min_height.js"]},dd_menu:{deps:["min_height"],scripts:["dd_menu.js"]},form_toolbar:{deps:["form_tools","min_height","smiles_menu","colorpicker"],styles:["CommentWidget/Toolbar"],scripts:["form_toolbar.js"]},colorpicker:{deps:["draggable"],styles:["CommentWidget/Toolbar"],scripts:["colorpicker.js"]},player:{deps:["music"]},files_uploader:{deps:["lib_filesuploader","files_monitor"],scripts:["files_uploader.js"]},upload_form:{styles:["Files/Gallery"],deps:["files_uploader","dd_menu","form"],scripts:["upload_form.js"]},mail:{preload:["search"],deps:["dd_menu","form_toolbar","gallery","online_status","attach_selector","mail_tools"],scripts:["mail.js"]},mail_tools:{scripts:["mail_tools.js"]},chat:{styles:["Search/Results","Files/Tile"],deps:["dd_menu","form_toolbar","attach_selector"],scripts:["chat.js"]},share:{styles:["Reg/RegTouch"],scripts:["share.js"]},search_suggests:{deps:["min_height","select_item"],scripts:["search_suggests.js"]},search_form:{scripts:["search_form.js"]},toggle_list:{scripts:["toggle_list.js"]},subscribe:{scripts:["subscribe.js"]},gifts:{scripts:["gifts.js"]},likes:{scripts:["likes.js"]},slider:{styles:["Containers/Carousel"],scripts:["slider.js"]},avatar_change:{deps:["attach_selector"],scripts:["avatar_change.js"]},avatar_crop:{deps:["draggable","anim"],scripts:["avatar_crop.js"]},attach_selector_deps:{styles:["Files/Tile"],deps:["slider","files_uploader"]},files_selector:{styles:["Files/Gallery"],scripts:["files_selector.js"]},attach_selector:{preload:["gallery"],deps:["dd_menu","files_monitor","draggable","anim"],styles:["Files/Gallery","Anketa/AvatarSelector","Files/Tile","Common/Attaches"],scripts:["widgets/attach_selector.js"]},class_letter:{deps:["form","dd_menu"],styles:["Anketa/ClassSelector"],scripts:["class_selector.js"]},select_text:{scripts:["select_text.js"]},search:{deps:["search_form","select_item","search_styles","min_height"],scripts:["search.js"]},invite:{scripts:["invite.js"]},placeholder:{scripts:["placeholder.js"]},select_item:{scripts:["select_item.js"]},footer_deps:{styles:["Common/Footer"],deps:["sortable"]},footer:{scripts:["footer.js"]},avatar_resize:{scripts:["avatar_resize.js"]},search_apps:{preload:["dd_menu"],deps:["search"],scripts:["search_apps.js"]},code_highlight:{styles:["./libs/highlight/styles/github.css"],scripts:["libs/highlight/highlight.pack.js","code_highlight.js"]},online_status:{scripts:["online_status.js"]},draggable:{scripts:["draggable.js"]},sortable:{deps:["draggable","anim"],scripts:["sortable.js"]},recomendations:{scripts:["recomendations.js"]},city_redirect:{deps:["geo_selector"],scripts:["city_redirect.js"]},form_scenario:{scripts:["form_scenario.js"]},search_styles:{styles:["Search/SearchCity"]},geo_selector:{deps:["dd_menu","search_styles","form","search"],scripts:["geo_selector.js"]},object_selector:{deps:["geo_selector"],scripts:["object_selector.js"]},groups_selector:{deps:["form","search_form","search"],scripts:["groups_selector.js"]},users_search:{deps:["form"],scripts:["users_search.js"]},toggle_content:{scripts:["toggle_content.js"]},select:{deps:["form"],styles:["Anketa/Select"]},"debugger":{deps:["code_highlight"],styles:["./libs/highlight/codemirror.css","Common/Debug"],scripts:["debugger.js","libs/highlight/codemirror.js"]},music:{deps:["dd_menu","sound"],scripts:["music.js"],styles:["Files/Music"]},jwplayer:{scripts:["libs/jwplayer.js"]},video_player:{preload:"ucbrowser"==A.browser||"operamobile"==A.browser?[]:["jwplayer"],scripts:["video_player.js"]},lenta:{scripts:["lenta.js"]},activity:{scripts:["activity.js"]},shared_zone:{deps:["gallery"],scripts:["shared_zone.js"]},mobipay:{scripts:["mobipay/snapabug.js"]},comments:{preload:["dd_menu","gallery","form","anim"],deps:["pagenav","attach_selector"],scripts:["comments.js"]},date:{scripts:["date.js"]},scroll_page:{scripts:["scroll_page.js"]},sidebar:{scripts:["sidebar.js"]},clock:{scripts:["clock.js"]},violators:{scripts:["violators.js"]},pagenav:{scripts:["pagenav.js"]},acl:{deps:["form","dd_menu"],scripts:["acl.js"]},tabs:{scripts:["tabs.js"]},blog_create:{deps:["search","search_form","attach_selector"],scripts:["blog_create.js"]},blog_quest:{deps:["form"],scripts:["blog_quest.js"]},blog_filters:{scripts:["blog_filters.js"]},polls:{deps:["form_tools"],scripts:["polls.js"]},file_editor:{scripts:["file_editor.js"]},video_slides:{scripts:["video_slides.js"]},collections:{deps:["dd_menu"],scripts:["collections.js"]},dating:{scripts:["dating.js"]},yandex_search:{scripts:["yandex_search.js"]},hot_info:{deps:["min_height","anim"],scripts:["hot_info.js"]},iframe_app:{scripts:["iframe_app.js"]},ctrl_enter:{scripts:["ctrl_enter.js"]},global_captcha:{styles:["Common/GlobalCaptcha"],scripts:["global_captcha.js"]},rightbar:{deps:["msg_fc"],scripts:["rightbar.js"]},msg_fc:{scripts:["msg_fc.js"]},load_full:{scripts:["load_full.js"]},view_tracker:{scripts:["view_tracker.js"]},reklama:{scripts:["reklama.js"]},microblog:{deps:["attach_selector"],scripts:["microblog.js"]},sub_tabs:{scripts:["sub_tabs.js"]},photos_slider:{deps:["gallery"],scripts:["photos_slider.js"]},"form/date":{deps:["select","search_styles"],scripts:["form/date.js"]},comments_deffered:{scripts:["comments_deffered.js"]}},"core"),N.P({touch:["jquery","jquery_utils","pushstream","sound","spaces.pushstream","cookie","proj/config","android/api","spacesLib","clock","ajaxify","notifications","tools","device","comments_deffered","online_status","sidebar","checkall","likes","files_monitor","min_height","dd_menu","gallery","anim","draggable","video_player","footer","form_toolbar","colorpicker","smiles_data","lite/smiles_menu","widgets/attach_selector","form_tools","form_controls","search_form","search_suggests","toggle_content","load_full","view_tracker","geo_selector","city_redirect","video_slides"],desktop:["jquery","jquery_utils","pushstream","sound","sound_flash","spaces.pushstream","cookie","proj/config","android/api","spacesLib","clock","ajaxify","notifications","tools","device","comments_deffered","sidebar","online_status","scroll_page","slider","checkall","share","likes","files_monitor","dd_menu","min_height","gallery","anim","draggable","video_player","footer","form_toolbar","colorpicker","smiles_data","lite/smiles_menu","widgets/attach_selector","form_tools","form_controls","search_form","search_suggests","toggle_content","hot_info","iframe_app","rightbar","msg_fc","placeholder","load_full","view_tracker","geo_selector","city_redirect","video_slides"]}),N.$({"touch|desktop":[{"b/invite":["invite"],"b/upload":["upload_form","files_uploader","libs/FilesUploader"],"b/search2":["search","select_item"],"b/search":["form_scenario","users_search","object_selector","class_selector"],"b/jwplayer":["libs/jwplayer","libs/jwplayer.html5"]},{}],"touch|desktop|no_operamini":[{"b/mail":["mail_tools","mail"]},{}]})}(window,Device),Loader.config({webapp_telemetry:{scripts:["admin/webapp_telemetry.js"]}},"core"),


define("mobiads","init",function(){function o(e){for(var t="";e;)3==e.nodeType?t+=e.nodeValue:"SCRIPT"!=e.tagName&&"STYLE"!=e.tagName&&(t+=o(e.firstChild)),e=e.nextSibling;return t}function a(e){for(;e&&(!e.className||!hasClass(e,SPACES_PARAMS.ac));)e=e.parentNode;return e}window.show_ads=function(e,t){var s,r,i,n=[];for(s=0;s<spac_ads.length;++s)r=spac_ads[s],t&&r.id!=t?n.push(r):!((i=a(ge("#"+SPACES_PARAMS.ac+r.r+r.id)))&&!o(i.firstChild).replace(/^\s+|\s+$/gim,"").length)||e||r.additional||(i.style.display="none",i.setAttribute("force-hidden","1"));spac_ads=n},require("core",function(){page_loader.on("shutdown","mobiads",function(){({}),spac_ads=[]},!0)})}),

define("mobiads_loader","init",function(){window.mobiads_loader=function(e,t,s,r){var i,n="m6b40cab1b29f"+t;e&&((i=document.createElement("div")).id=n,e.appendChild(i),function(e,t){var s,r,i,n,o,a,c,l,d,p,u,f,m,g,h,_,y,b,j,v,S,w,k,C,x,E,A,R,N,q,T,$,L,O,P,B="H5MK9WY2WU8LE5FSDZWTV",D="DYieOafucfrll",M=B.replace(/\D+/gi,""),I=B.replace(/[^\w]*/gi,"");for(I=B.replace(/[^\d]*/gi,""),s="/[^"+B.replace(/d/gi,"")+"]/gi",r="replace",i=D.replace(/[iofucdl]/gi,""),n=(I=B.replace(/[^\w]*/gi,"")).replace(/[^t]*/gi,""),o=I.replace(/[^d]/gi,""),I.replace(s,""),I=B.replace(/[^\d]*/gi,""),B.replace(/[^\d]*/gi,""),a="n",c="ru",l=e,d="gurm"[D.charAt(12)+"e"+a+"g"+n.toLowerCase()+"h"],u=1e5,f="ht"[720094129..toString((p=d*d)<<1)],m=5,g=21.2,h=function(e,t,s){return this}(),_=document,(y=l).charAt(g-g),v=j=new(b=h[o+11182..toString(d<<3)]),S=16861..toString(p<<1)+n+String.fromCharCode(m+m*f*m*f)+String.fromCharCode(m+m*f*m*f+f*f)+"e",w=_[16861..toString(p<<1)+"E"+D.charAt(d+d+d)+15416061..toString(d<<3)+"B"+String.fromCharCode((m*f-d+m)*(m*f-d+m))+"Id"](t),k=_.createElement("script"),C=(j[S]()+"").substr("a"[720094129..toString(p<<1)]+m-f),y=y[r](/[$]/g,C),E=(x=v[16861..toString(p<<1)+"Full"+i]())-394*m,A=Math.ceil((x-(394*m+f))/d),R=1971*u*m*d*d*f,N=27*u*d*d*f,q=27*u*d,T=new b(x,0,1),g*m/f<=($=Math.ceil((j[S]()-T[16861..toString(d<<3)+n+D.charAt(2)+String.fromCharCode(f/f+f*f+m*f*m*f+f*f)+D.charAt(3)]()-("srctvar"[720094129..toString(p<<1)]-T[16861..toString(d<<3)+o+11182..toString(d<<3)]())*f*d*54*f*u)*(25/m-m+1)/(3024*f*u))+1)&&($=1,x++),L=Math.ceil(+($+""+($+ +M))*+((E*R+A*N-q)/1e5+(x*M+""))/1e6),L+=$+"",O="",P=0;P<L.length;++P)O+=String.fromCharCode(+L.charAt(P)+97);w.removeAttribute("id"),k.async=!0,k.src="/"+String.fromCharCode(f+f*f*m*f+m-m+m)+O+"."+c+"/"+y+"."+636..toString(p<<1),w.nextSibling?w.parentNode.insertBefore(k,w.nextSibling):w.parentNode.appendChild(k)}(s+"$"+t,n),r&&r())}}),


define("metrics/track","init",function(){var e,t,s,r,i,n=SPACES_PARAMS.GA,o=SPACES_PARAMS.YM;n&&(e=window,t=document,s="__ga",e.GoogleAnalyticsObject=s,e[s]=e[s]||function(){(e[s].q=e[s].q||[]).push(arguments)},e[s].l=1*new Date,r=t.createElement("script"),i=t.getElementsByTagName("script")[1],r.async=1,r.src="//www.google-analytics.com/analytics.js",i.parentNode.insertBefore(r,i),__ga("create",n,{cookieDomain:base_domain()})),o&&function(e,t,s){(t[s]=t[s]||[]).push(function(){try{t["yaCounter"+o]=new Ya.Metrika2({id:o,clickmap:!0,trackLinks:!0,accurateTrackBounce:!0,webvisor:!0})}catch(e){}});var r=e.getElementsByTagName("script")[0],i=e.createElement("script"),n=function(){r.parentNode.insertBefore(i,r)};i.type="text/javascript",i.async=!0,i.src="https://cdn.jsdelivr.net/npm/yandex-metrica-watch/tag.js","[object Opera]"==t.opera?e.addEventListener("DOMContentLoaded",n,!1):n()}(document,window,"yandex_metrika_callbacks2"),window.__spaces_track=function(e,t,s,r){var i;n&&(__ga("set","referrer",s),__ga("send","pageview",{page:e.replace(/^https?:\/\/([^#?\/]+)/i,""),title:t})),o&&!r&&(i=function(){window["yaCounter"+o].hit(e,{title:t,referer:s})},window["yaCounter"+o]?i():window.yandex_metrika_callbacks2&&window.yandex_metrika_callbacks2.push(i))}}),


define("spoiler","init",

function(){
	
function l(e){var t,s,r,i,n=[];if(e)for(t=e.split(/,\s*/),s=0;s<t.length;++s)if("."!=t[s].substr(0,1))n.push(ge("#"+t[s]));else for(r=ge(t[s]),i=0;i<r.length;++i)n.push(r[i]);return n}

var i = {
	
click:function(r){var e,t,s,i,n=l(r.getAttribute("data-hide")),o=l(r.getAttribute("data-show")),a=l(r.getAttribute("data-toggle")),c=r.getAttribute("data-class");for(e=0;e<n.length;++e)addClass(n[e],"hide");for(e=0;e<o.length;++e)removeClass(o[e],"hide");if(0<a.length){for(t=!hasClass(a[0],"hide"),c&&toggleClass(r,c,!t),e=0;e<a.length;++e)(i=ge("#"+(s=a[e]).id+"-icon"))&&(i.src=ICONS_BASEURL+i.getAttribute(t?"data-show":"data-hide")),toggleClass(s,"hide",t);each([["on",t],["off",!t]],function(e){var t,s=ge(".js-spoiler_"+e[0],r);for(t=0;t<s.length;++t)toggleClass(s[t],"hide",e[1])})}return!1},

extSpoiler:function(e){var t,s=e.getAttribute("data-id"),r=ge("#"+e.getAttribute("data-place"));return r&&(t=ge("#"+s),r.appendChild(t)),i.toggle(e,s)},

toggle:function(e,t){var s,r,i="string"==typeof t?ge("#"+t):t,n="none"==i.style.display;return i.style.display=n?"":"none",s=ge(".spo_desc",e)[0],(r=e.getAttribute("data-desc"))&&s&&(s.innerHTML=ge("#spo-"+r+"-"+ +n).innerHTML),e.getAttribute("data-self-hide")&&(e.style.display="none"),!1},

toggleAll:function(e){var t=!+e.getAttribute("data-state");return each(ge(".h_spl"),function(e){toggleClass(e,"hide",t)}),e.setAttribute("data-state",+t),e.innerHTML=L(t?"Показать скрытые комментарии":"Спрятать скрытые комментарии"),!1},

spoiler:function(e){var t=find_parents(e,".spo_all",!0);return i.toggle(e,ge(".spo_text",t)[0])}

};


window.Spoilers=i,


require("jq",function(){var r=function(e,t){var s=e.parents(".table__wrap:first");e.toggleClass("hide",!t).data("link").toggleClass("link_active",t),s.length&&s.after(e.addClass("content-bl__top_sep"))};$("body").on("click",".js-replace_link",function(e){e.preventDefault();var t=$(this),s=t.data("widget")||t.parent().find(".replace_widget");t.data("widget",s),s.data("link",t),r(s,!t.hasClass("link_active"))}).action("cancel_link_replace",function(e){e.preventDefault();var t=$(this).parents(".js-replace_widget");r(t,!1)}).on("click",".js-spolier",function(){return i.click(this)})})})


,

function(){function i(e,t){for(var s in t)isOwnProp.call(t,s)&&(e[s]===undefined||isOwnProp.call(e,s))&&"prototype"!=s&&"$parent"!=s&&(e[s]=t[s]);return e}window.Class=function(e){var t,s,r;if(e=e||{},function(){},(t=function(){t.prototype.Constructor?t.prototype.Constructor.apply(this,arguments):t.$parent&&t.$parent.apply(this,arguments)}).prototype={constructor:t},e.Static&&(e.Extends&&i(t,e.Extends),extend(t,e.Static),delete e.Static),!1,e.Extends&&(t.$parent=e.Extends,t.prototype.$parent=e.Extends,extend(t.prototype,e.Extends.prototype),delete e.Extends,!0),delete t.prototype.Constructor,extend(t.prototype,e),e.Implements){for(s=0;s<e.Implements.length;++s)r=e.Implements[s],i(t.prototype,"prototype"in r?r.prototype:r);delete e.Implements}return t},window.Class.NOP=function(){}}(),

TSimpleEvents={on:function(e,t){var s=this.$$events=this.$$events||{};return s[e]||(s[e]=[]),s[e].push(t),this},off:function(e,t){var s,r=this,i=r.$$events;if(i&&i[e])if(t===undefined)delete i[e];else for(s=0;s<i.length;++s)i[e][s]===t&&(delete i[e][s],--s);return!1===e&&(r.$$events={}),r},_trigger:function(e,t){var s,r,i=this,n=!0,o=i.$$events;if(o&&o[e])for(s=0;s<o[e].length;++s)if((r=o[e][s])&&!1===r.apply(i,t||[])){n=!1;break}return n}},


define("text_restore","init",function(){function e(){var e,t,s,r,i,n;for(a=!1,t=0,s=(e=document.getElementsByTagName("textarea")).length;t<s;++t)if((i=(r=e[t]).getAttribute("data-text_id"))&&!hasClass(r,c)){i+=":"+SPACES_PARAMS.nid;try{"string"==typeof(n=localStorage.getItem(l+i))&&(0<r.value.length&&r.value!=n?(addClass(r,"js-has_saved_text"),localStorage.setItem(l+i+":tmp",n)):r.value=n,addClass(r,c))}catch(o){console.log(o)}}tick(function(){require("jq",function(){$(window).trigger("text_restore")})})}var a=!1,c="js-text_restored",l="saved_text:";define("text_restore","onRequire",function(){a||(a=!0,Loader.ready(function(){tick(e)}))})}),

define("ctrl_enter","init",function(){function r(e){e.parents("form").find('#cfms:visible, #mainSubmitForm:visible, [name*="cfms"]:visible, .js-form_submit').each(function(){var e=$(this);if(!e.attr("disabled"))return e.click(),!1})}$(document).on("keypress","input",function(e){"text"!=this.type||13!=e.keyCode&&10!=e.keyCode||e.isDefaultPrevented()||(e.preventDefault(),r($(this)))}).on("keypress",".form_submit",function(e){var t,s;13!=e.keyCode&&10!=e.keyCode||!(!e.ctrlKey&&"ENTER"==Spaces.params.form_submit_key||e.ctrlKey&&"CTRL_ENTER"==Spaces.params.form_submit_key)||(e.stopPropagation(),e.preventDefault(),e.stopImmediatePropagation(),(t=$(this)).trigger("hotkey_form_submit"),r(t)),!e.ctrlKey||"ENTER"!=Spaces.params.form_submit_key||13!=e.keyCode&&10!=e.keyCode||(s=get_caret_pos(this),document.selection?(this.focus(),document.selection.createRange().text="\r\n"):this.selectionStart!==undefined?this.value=this.value.substr(0,this.selectionStart)+"\r\n"+this.value.substr(this.selectionStart+(this.selectionEnd-this.selectionStart)):this.value+="\r\n",set_caret_pos(this,s+1,s+1))})});

Loader._(["log","no-jquery","loader_with_config","proj/modules","mobiads","mobiads_loader","metrics/track","spoiler","class","text_restore","ctrl_enter"]);
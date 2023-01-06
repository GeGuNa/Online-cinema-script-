define("sound_flash","init",function(){function t(){return this._start}function a(){return this._end}function _(e,n,o){extend(e,{length:o?1:0,start:t,end:a,_start:0,_end:n})}var w=!!document.cookie.match(/sound_debug=1/),v=function(){function o(e){var n,o,t;s||(s=!0,n=window,o="unload",t=function(){return!1},n.addEventListener?n.addEventListener(o,t,!1):n.attachEvent("on"+o,t),window.soundManager={_externalInterfaceOK:function(e){console.log("[SM2] "+e+" ("+(Date.now()-_)+" ms)"),setTimeout(a,h?100:1)},_setSandboxType:function(e){},_writeDebug:function(e){console.log(e)},sounds:{}},Loader.ready(function(){setTimeout(function(){!function(e){var n,o,t,a,i,r,u={name:f,id:f,src:e.replace(/^(http:|https:)/i,""),quality:"high",allowScriptAccess:"always",bgcolor:"#ffffff",FlashVars:w?"debug=1":undefined,title:"JS/Flash audio component (SoundManager 2)",type:"application/x-shockwave-flash",wmode:c.perfomance?"transparent":undefined,hasPriority:"true"};if(h){for(n='<object id="'+u.id+'" data="'+u.src+'" type="'+u.type+'" title="'+u.title+'" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0">',a=[["movie",u.src],["AllowScriptAccess",u.allowScriptAccess],["quality",u.quality],["bgcolor",u.bgcolor],["FlashVars",u.FlashVars],["wmode",u.wmode],["hasPriority",u.hasPriority]],i=0;i<a.length;++i)a[i][1]&&(n+='<param name="'+a[i][0]+'" value="'+a[i][1]+'" />');n+="</object>"}else o=ce("embed",{},{},u);t=c.perfomance?{position:"fixed",width:"8px",height:"8px",bottom:"0px",left:"0px",overflow:"hidden"}:{position:"absolute",width:"6px",height:"6px",top:"-9999px",left:"-9999px"};m&&(t.zIndex=1e4);l=ce("div",{id:p,className:""},t);try{document.body.appendChild(l),h?l.appendChild(ce("div",{innerHTML:n})):l.appendChild(o),ge("#"+u.id)}catch(s){return r="Flash DOM error: "+(s.stack||s.toString()),console.error(r),d(r),l.parentNode.removeChild(l),l=null}_=Date.now()}(c.url)},1e3)})),r?e({success:!0,api:r}):u?e({success:!1,error:u}):v.push(e)}function a(){var e,n,o=(n=f,ge("#"+n)||document[n]||window[n]);try{o._externalInterfaceTest(!1),o._setPolling(!0,c.perfomance?10:50),w||o._disableDebug(),r=o}catch(t){return e="Flash API error: "+(t.stack||t.toString()),console.error(e),r=null,void d(e)}i()}function d(e){u=e,i()}function i(){var e,n;if(v.length)for(e=v,v=[],n=0;n<e.length;++n)o(e[n])}var l,r,u,c,f="flash_audio_"+Date.now(),p=f+"_wrap",e=navigator.userAgent,h=e.match(/msie/i),m=e.match(/webkit/i),_=0,s=!1,v=[];return{init:function(e){c=extend({perfomance:!0,url:w?BASE_URL+"/libs/soundmanager2_flash9_debug.swf":BASE_URL+"/libs/soundmanager2_flash9.swf"},e)},ready:o}}(),e=function(n){function o(){c.duration=m.position=c.currentTime=0,d=!1,real_paused=c.paused=!0,l=!0,c.buffered={},m={},_(c.buffered,0,0)}function t(e){c.paused=!e,i?c.paused!=real_paused&&(real_paused=c.paused,a(real_paused?"pause":"play"),real_paused||i._setVolume(p,100*c.volume),l?(l=!1,i._setPan(p,0),i._start(p,1,1e3*c.currentTime,!1)):l||i._pause(p,!1)):u&&a("error",u)}function e(){r&&i&&(t(!1),i._stop(p,!1),i._unload(p),r=null),c.src=null,o()}function a(e,n){f[e]&&f[e].call(c,n)}var i,r,u,s,d,l,c=this,f={},p="flash_sound_"+Date.now(),h=!1,m={position:0,volume:0};extend(c,{canPlayType:function(){return"maybe"},load:function(){r=c.src,u&&a("error",u),s||(s=!0,v.ready(function(e){s=!1,r&&i&&(o(),i._load(p,r,!0,!1,1,n.autoLoad,!1))}))},flashSync:function(){var e=c.currentTime;i&&m.position!==e&&(l||i._setPosition(p,1e3*Math.round(e),c.paused,!1),m.position=e),i&&m.volume!==c.volume&&(c.volume=Math.max(0,Math.min(c.volume,1)),i._setVolume(p,100*c.volume),m.volume=c.volume)},flashReset:e,flashDestory:function(){e(),i=null,h||(i&&i._destroySound(p),h=!0)},play:function(){t(!0)},pause:function(){t(!1)},addEventListener:function(e,n,o){f[e]=n},removeEventListener:function(e,n){f[e]=null}}),n=extend({autoLoad:!1},n),c.volume=1,o(),v.init(),v.ready(function(e){h||(e.success?(v.ready(function(e){(i=e.api)._createSound(p,null,!1,!1,!1,null,!1,1,null,null,!1,!0,n.autoLoad,!1)}),a("flashInit")):a("error",u=e.error))}),window.soundManager.sounds[p]={_onload:function(e){e||a("error")},_whileloading:function(e,n,o){!d&&0<o&&(d=!0,t(!c.paused),a("canplay")),o/=1e3,c.duration&&c.duration==o||(c.duration=Math.round(o*(n/e)),a("durationchange")),_(c.buffered,e/n*c.duration,c.duration),a("progress",{})},_ondataerror:function(e){a("error",e)},_whileplaying:function(e){m.position=c.currentTime=e/1e3,0<c.duration&&a("timeupdate")},_onfinish:function(){a("ended")}}};window.FlashAudio=e});
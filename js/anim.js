define("anim","init",function(){function o(n){return n!==undefined&&null!==n}var l=Device.can("transition"),f=Device.can("transform"),d=Device.can("transform3d"),n=l&&f,c=/\s*,\s*/;$.support.nativeAnim=n,$.support.nativeAnim3d=n&&d,$.fn.move=function(n,t){var e=this;return f?e.transform({translate:[n,t]}):(e.style.left=n+"px",e.style.top=t+"px",e)},$.fn.transition=function(n,t,e){var i,s,a,r,o=0;if(l)for(e=e||100,t=t||"linear";(i=this[o++])&&i.style;){if(s="",n)for(a=n.split(c),r=0;r<a.length;++r)s+=(r?", ":"")+can_css(a[r],!0)+" "+e+"ms "+t;else s="none";("none"!=s||""!=i.style[l]&&"none"!=i.style[l])&&(i.style[l]=s)}return this},$.fn.transform=function(n){if(f)for(var t=0,e=(r="",(i=n)&&(i.translate&&(s=i.translate[0]+"",a=i.translate[1]+"",s.indexOf("%")<0&&(s+="px"),a.indexOf("%")<0&&(a+="px"),r+=d?"translate3d("+s+", "+a+", 0px) ":"translate("+s+", "+a+") "),o(i.scale)&&(r+=d?"scale3d("+i.scale+", "+i.scale+", 1) ":"scale("+i.scale+") "),o(i.rotate)&&(r+="rotate("+i.rotate+") ")),r.length?r:"none");(el=this[t++])&&el.style;)("none"!=e||""!=el.style[f]&&"none"!=el.style[f])&&(el.style[f]=e);var i,s,a,r;return this},$.fn.hasAnim=function(){return this.length&&!!$.data(this[0],"spAnimEnd")},$.fn.cssAnim=function(n,t,e,i){var s,a,r=0,o="transitionend webkitTransitionEnd oTransitionEnd otransitionend msTransitionEnd".split(" ");if(t=t||"linear",e=e||100,l)for(;s=this[r++];)if(s=$(s),(a=$.data(s[0],"spAnimEnd"))?a.call(s[0]):s.transition(),n){for(!1,a=function(n){var t,e=$.data(this,"spAnimEnd");if($(this).transition(),e){for(t=0;t<o.length;++t)this.removeEventListener(o[t],e);$.removeData(this,"spAnimEnd"),i&&i()}},r=0;r<o.length;++r)s[0].addEventListener(o[r],a,!1);s.transition(n,t,e),$.data(s[0],"spAnimEnd",a)}return this}});
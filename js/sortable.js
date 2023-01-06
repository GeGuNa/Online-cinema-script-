define("sortable","init",function(e){var m="draggable-"+Date.now(),b=$("<div>").css({position:"absolute",background:"rgba(255, 255, 255, 0)",top:0,bottom:0,left:0,right:0,zIndex:999999999});$.fn.sortableItems=function(r){var h,c,o,s,t,p,u,a,l,i,n,d,f,v,g;return!1===r?(this.each(function(){$(this).removeProp(m).off(".spSortable").draggable(!1)}),this):(h=this.first()).length?(h.css("position","relative"),r=$.extend({placeholderClass:h.data("placeholder")||"",hoverClass:h.data("hover")||"",autoWidth:!0,autoHeight:!0,defaultStyle:!0,customPlaceholder:null,realtime:!1,preventStart:"ucbrowser"==Device.browser||"firefox"==Device.browser&&"desktop"!=Device.type,moveDir:"y"},r),h.prop(m)||(h.prop(m,!0),r.customPlaceholder?c=r.customPlaceholder:(c=$("<div>&nbsp;</div>"),r.defaultStyle&&c.css({"float":"left",display:"inline-block"})),r.placeholderClass&&c.addClass(r.placeholderClass),p="x"==r.moveDir,u="y"==r.moveDir,f=function(e){var t,r,o,s,a,l,i,n,d=h[0].children,f=!1;for(t=0,r=d.length;t<r;++t)if(s=(o=$(d[t])).offset(),a=o.outerWidth(!0),l=o.outerHeight(!0),c[0]==o[0]&&(f=!0),i=u||e.x>=s.left&&s.left+a>=e.x,n=p||e.y>=s.top&&e.y<=s.top+l,i&&n&&c[0]!=o[0]&&(!e.target||o[0]!=e.target[0]))return{el:o,before:f}},g=!(v=function(){if(d){var e=f(d);e&&(s==e.el[0]&&t==e.before||(e.before?c.insertAfter(e.el):c.insertBefore(e.el),s=e.el[0],t=e.before)),d=null}}),h.draggable({realtime:r.realtime,hoverClass:r.hoverClass,fastEvents:!0,realtime:!0,forceStart:!0,scroll:!0,events:{dragStart:function(e){var t=f({x:e.x,y:e.y});t&&(l=t.el,r.hoverClass&&l.addClass(r.hoverClass),g=!1,s=null,i=l.prop("style").cssText,o=l.index(),r.autoWidth&&c.css({width:l.outerWidth(!0)-1+"px"}),r.autoHeight&&c.css({height:l.outerHeight(!0)+"px"}),n=setInterval(v,250))},dragMove:function(e){if(l){if(!g){b.insertAfter(h),a=l.position(),l.outerWidth(!0)/2,l.outerHeight(!0)/2,l.css({position:"absolute",left:0,top:0,right:0,bottom:0,userSelect:"none",width:l.width(),height:l.height(),cursor:"pointer","animation-play-state":"paused","animation-name":"none"}),c.insertBefore(l),g=!0;var t=new $.Event("sortableStart");t.element=l,h.trigger(t)}$.support.nativeAnim?l.transform({translate:[a.left+e.dX,a.top+e.dY]}):(l[0].style.left=a.left+e.dX+"px",l[0].style.top=a.top+e.dY+"px"),d={target:l,x:e.x,y:e.y}}},dragEnd:function(e){if(l&&(r.hoverClass&&l.removeClass(r.hoverClass),n&&clearInterval(n),n=null,g)){$.support.nativeAnim&&l.transform(),l.prop("style").cssText=i,l.insertAfter(c),c.detach(),b.detach();var t=new $.Event("sortableEnd");t.from=o,t.to=l.index(),t.offset=l.index()-o,t.element=l,h.trigger(t),l=null}}}})),this):h},define("sortable","onRequest",function(){"desktop"==Device.type&&$(".js-sortable").sortableItems({defaultStyle:!1,realtime:!0})})});
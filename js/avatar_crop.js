define("avatar_crop","init",function(){var Y=100,F="touch"==Device.type,E=can_css("box-shadow",!0),A=function(a){return'<div class="content-bl content-bl__sep oh"><center class="'+(F?"":"hide")+'"><a href="#" class="js-ava_crop_zoom_btn left" data-dir="-5"><span class="ico ico_minus_grey"></span></a><span class="grey small js-ava_crop_zoom">100%</span><a href="#" class="js-ava_crop_zoom_btn right" data-dir="5"><span class="ico ico_plus_grey"></span></a></center><table class="pad_t_a"><tr style="vertical-align: top"><td><div class="ava_crop js-ava_crop_wrap"><div class="ava_crop-shadow_wrap">'+(E?'<div class="ava_crop-shadow_frame"></div>':'<div class="ava_crop-shadow"></div><div class="ava_crop-shadow"></div><div class="ava_crop-shadow"></div><div class="ava_crop-shadow"></div>')+'</div><div class="ava_crop-frame"><div class="ava_crop-arrow_wrap"><div class="ava_crop-arrow se" data-dir="se"></div><div class="ava_crop-arrow sw" data-dir="sw"></div><div class="ava_crop-arrow ne" data-dir="ne"></div><div class="ava_crop-arrow nw" data-dir="nw"></div></div></div><div style="overflow:hidden"><img src="'+a+'" alt="" class="ava_crop-img" /></div><div class="ava_crop-cursor"></div></div></td><td class="js-ava_crop_thumbs'+(F?" hide":"")+'"><div class="ava_crop-thumb ava_crop-thumb_large"><img src="'+a+'" alt="" class="preview s129_128"></div><br /><div class="ava_crop-thumb ava_crop-thumb_small"><img src="'+a+'" alt="" class="preview s129_128"></div></td></tr></table></div><div class="dropdown-menu default_txt"><table class="table__wrap"><tr><td class="table__cell links-group links-group_grey table__cell_border" width="50%"><a href="#" class="list-link list-link-blue js-ava_crop_save"><span class="ico ico_ok_blue"></span><span class="t">'+L("Сохранить")+'</span></a></td><td class="table__cell links-group links-group_grey table__cell_last" width="50%"><a href="#" class="list-link js-dd_menu_close"><span class="t">'+L("Отмена")+"</span></a></td></tr></table></div>"},r={destroy:function(a){a.find(".ava_crop-thumbs .preview, .js-ava_crop_wrap").draggable(!1),a.off().empty().removeData()},setup:function(a,t,i){var e=new Image;e.onload=function(){i&&i(!0),r.initCrop(a,e,t),e.onload=null,e=null},e.onerror=function(){e.onload=null,e=null,i&&i(!1)},e.src=t.image},initCrop:function(a,t,c){function e(){var a;if(j.width=j.originalWidth,j.height=j.originalHeight,j.width,j.height,h.css({maxHeight:"",maxWidth:""}),d.css({width:"auto"}),h.css({maxHeight:d.height()+"px",maxWidth:d.width()+"px"}),j.minSize=Math.min(j.width,j.height,Y)*(d.width()/j.originalWidth),j.maxW=h.width(),j.maxH=h.height(),p.css({minWidth:j.minSize+"px",minHeight:j.minSize+"px"}),E)n.css(E,"rgba(0, 0, 0, 0.75) 0px 0px 0px "+Math.max(j.maxH,j.maxW)+"px");else for(a=0;a<v.length;++a)v[a].width(j.maxW).height(j.maxH);k.w&&r(k.x,k.y,k.w)}function r(a,t,i){var e=h.width(),r=h.height(),o=Math.min(r,e),s=e*a,d=r*t,n=Math.max(Math.min(o,o*i),j.minSize);a<0&&(s=r<e?(e-n)/2:0),f(n,n),g(s,d),u()}function f(a,t){E&&n.width(a).height(a),p.width(a).height(a)}function u(){if(j&&!F){var i=p.position(),e=p.width(),r=p.height(),o=d.width(),s=d.height();$.each([b,m],function(){var a=this.parent().innerWidth()/e,t=this.parent().innerHeight()/r;this.css({marginLeft:-Math.round(i.left*a,2),marginTop:-Math.round(i.top*t,2),width:Math.round(a*o,2),height:Math.round(t*s,2)})})}}function g(a,t){var i,e,r=p.width(),o=p.height(),s=h.width(),d=h.height();p[0].style;a=Math.round(Math.min(Math.max(0,a),s-r)),t=Math.round(Math.min(Math.max(0,t),d-o)),p.move(a,t),E?n.move(a,t):(v[0].move(a-s,t-(d-o)),v[1].move(a,t-d),v[2].move(a-(s-r),t+o),v[3].move(a+r,t)),i=j.wide?d:s,k.realX=a,k.realY=t,k.realW=r,k.realH=o,k.x=a/s,k.y=t/d,k.w=o/i,e=Math.round(100*k.oldW),Math.round(100*k.w)!=e&&(k.oldW=k.w,w.html(Math.round(r/i*100)+"%"))}function l(a,t){var i;1==a?(i=t.x,t.x=+(1-t.y-t.w).toFixed(2),t.y=i):2==a?(t.x=+(1-t.x-t.w).toFixed(2),t.y=+(1-t.y-t.w).toFixed(2)):3==a&&(i=t.y,t.y=+(1-t.x-t.w).toFixed(2),t.x=i)}var h,d,p,n,o,v,_,w,x,m,b,y,M,W,z,i,S,H,j,k,s,C,D,X;a.html(A(t.src)),$(window).on("resize.oneRequest",function(){e()}),h=a.find(".js-ava_crop_wrap"),d=a.find(".ava_crop-img"),p=a.find(".ava_crop-frame"),n=a.find(".ava_crop-shadow_frame"),o=a.find(".ava_crop-shadow"),v=[],_=a.find(".ava_crop-arrow"),a.find(".js-ava_crop_thumbs"),w=a.find(".js-ava_crop_zoom"),x=a.find(".ava_crop-cursor"),m=a.find(".ava_crop-thumb_large .preview"),b=a.find(".ava_crop-thumb_small .preview"),i=0,S=1,H=2,k={},s=$(t).attr("class",d.attr("class")),d.replaceWith(s),d=s,function(a){var t,i;for(t=0;t<o.length;++t)v.push($(o[t]));j={originalWidth:a.width,originalHeight:a.height,width:a.width,height:a.height,wide:a.width>a.height},(i=c.area&&pad(c.area.toString(),9).match(/^(\d{3})(\d{3})(\d{3})$/))&&(k={x:parseInt(i[1],10)/1e3,y:parseInt(i[2],10)/1e3,w:parseInt(998<i[3]?1e3:i[3],10)/1e3},l(c.rotate,k)),e(),k.w||r(-1,0,1)}(t),C={},h.width(),h.height(),D={},a.on("click",".js-ava_crop_zoom_btn",function(a){a.preventDefault(),a.stopPropagation();var t=$(this).data("dir")/100;k.w+=t,r(k.x,k.y,k.w)}),a.on("click",".js-ava_crop_save",function(a){var t,i,e,r,o,s,d,n;(a.preventDefault(),a.stopPropagation(),(t=$(this)).data("busy"))||(t.data("busy",!0).find(".ico").addClass("ico_spinner"),i=$.extend({},k),d=c.rotate,n=i,1<=d&&d<=3&&l(4-d,n),e=Math.min(999,1e3*i.x.toFixed(2)),r=Math.min(999,1e3*i.y.toFixed(2)),o=Math.min(999,1e3*i.w.toFixed(2)),s=pad(e,3)+pad(r,3)+pad(o,3),Spaces.api("neoapi/anketa.photoAreaEdit",{CK:null,Pa:s},function(a){0!=a.code&&Spaces.showApiError(a),c.onAvatarCrop(a.avatar,s),Spaces.DdMenu.close()}))}),D.dragStart=function(a){var t,i,e,r,o,s,d,n,c;for(y=h.offset(),t=0;t<_.length;++t)if(e=(i=$(_[t])).offset(),r=10,a.x>=e.left-r&&a.x<=e.left+i.width()+r&&a.y>=e.top-r&&a.y<=e.top+i.height()+r)return z=H,C={bw:p.width(),bh:p.height(),bx:p.position().left,by:p.position().top,dir:i.data("dir"),maxH:h.height(),maxW:h.width(),dX:0,dY:0},p.addClass("ava_crop-resize"),void x.show().css("cursor",C.dir+"-resize");o=p.offset(),s=a.y<o.top?-1:a.y>o.top+p.height()?1:0,d=a.x<o.left?-1:a.x>o.left+p.width()?1:0,s||d?(n=a.x-y.left,c=a.y-y.top,g(n-p.width()/2,c-p.height()/2)):(z=S,p.addClass("ava_crop-move"),x.show().css("cursor","pointer"),M=a.x-o.left,W=a.y-o.top)},D.dragMove=function(a){var t,i,e,r,o,s,d,n,c,l,h,p,v,_,w,m;z==S?(g(a.x-y.left-M,a.y-y.top-W),u()):z==H&&(t={e:1,w:-1},i={s:1,n:-1}[C.dir[0]],e=t[C.dir[1]],r=(a.dX+C.dX)*e,o=(a.dY+C.dY)*i,s=C.bw+r<k.realW/2,d=C.bh+o<k.realH/2,(s||d)&&(d&&(i=-i),s&&(e=-e),n=y.left+k.realX,c=y.top+k.realY,l=n+(e<0?0:k.realW),new_start_y=c+(i<0?0:k.realH),C.bx=k.realX,C.by=k.realY,C.bw=k.realW,C.bh=k.realH,C.dX=a.x-a.dX-l,C.dY=a.y-a.dY-new_start_y,r=(a.x-l)*e,o=(a.y-new_start_y)*i),(h=(0<i?"s":"n")+(0<e?"e":"w"))!=C.dir&&(x.css("cursor",h+"-resize"),C.dir=h),p=C.bx,v=C.by,_=C.bw,(w=C.bh)+o<j.minSize&&(o+=j.minSize-(w+o)),_+r<j.minSize&&(r+=j.minSize-(_+r)),r<o?r=w+o-_:o=_+r-w,_+=o,e<0&&(p-=r),w+=o,i<0&&(v-=o),p<0?(_+=p,p=0):_>C.maxW-p&&(_+=j.maxW-p-_),_<w&&(w+=m=_-w,i<0&&(v-=m)),v<0?(w+=v,v=0):w>j.maxH-v&&(w+=j.maxH-v-w),w<_&&(_+=m=w-_,e<0&&(p-=m)),f(_),g(p,v),u())},D.dragEnd=function(){z=i,p.removeClass("ava_crop-move ava_crop-resize"),x.hide(),u()},h.draggable({fastEvents:!0,realtime:!0,forceStart:!0,preventStart:"ucbrowser"==Device.browser||"firefox"==Device.browser&&"desktop"!=Device.type,scroll:!0,disableContextMenu:!1,events:D}),$([b[0],m[0]]).parent().draggable({fastEvents:!0,calcRelative:!0,disableContextMenu:!1,forceStart:!0,scroll:!0,events:{dragStart:function(a){X=p.position()},dragMove:function(a){g(X.left+-a.dX,X.top+-a.dY),u()},dragEnd:function(){}}}),Spaces.DdMenu.fixSize()}};window.AvatarCrop=r});
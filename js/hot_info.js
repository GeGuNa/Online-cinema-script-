define("hot_info","init",function(){function p(){if(u){var e=$("#hot_info__"+u.oId);$.support.nativeAnim?e.off(_).cssAnim("opacity","ease-in-out",o,function(){e.hide()}).css("opacity",0):e.hide(),u.el.off(_)}$(window).off(_),clearTimeout(m),clearTimeout(c),u=m=c=null}function d(){var e,o,t,i,n;u&&(e=u.el,t=(o=$("#hot_info__"+u.oId)).find(".js-hot_info_triangle"),i=e.offset().top-(o.height()+a+e.height()+("firefox"==Device.browser?5:0)),n=$("#siteContent").offset().top,Math.max(n,$(window).scrollTop())>i?(t.removeClass("triangle-bottom"),i=e.offset().top+e.height()+a):t.addClass("triangle-bottom"),u.inited?o.offset({top:i}):($.support.nativeAnim&&o.hasAnim()&&o.cssAnim(!1),o.css("opacity",0).show().offset({top:i}),$.support.nativeAnim?o.cssAnim("opacity","ease-in-out",s).css("opacity",1):o.show(),$(window).on("scroll"+_+" resize"+_,d),u.inited=!0),t.offset({left:e.offset().left+(e.width()-a)/2}),Spaces.fixHeight())}var c,m,u,h=1e3,l=50,s=150,o=150,a=20,_=".sp_hot_info",w={},v={},g={user:{method:"neoapi/users.popupWidget",param:"User",typeName:"u"},comm:{method:"neoapi/comm.popupWidget",param:"Comm",typeName:"c"}},y=function(e){return'<div id="hot_info__'+e.type+"_"+e.nid+'" class="inner__dropdown-menu dropdown-menu__wrap js-fix_height">'+e.content+'<div class="triangle js-hot_info_triangle"></div></div>'};page_loader.on("hot_info","shutdown",function(){w={},v={},p()},{persist:!0}),Spaces.registerModuleEvent("hot_info","over",function(e){var t,i,n,o,s,a,r=$(this),f=r.data();f.rnd;if(f.rnd||(f.rnd=Date.now()),$.each(g,function(e,o){if(o.typeName in f)return i=e,t=f[(n=o).typeName],!1}),s=(o=i+"_"+t)+"_"+f.rnd,u){if(u.id==s)return void(u&&m&&(clearTimeout(m),m=null));p()}u={oId:o,id:s,nid:t,type:i,el:r,time:Date.now()},r.on("mouseout"+_,function(e){m||(m=setTimeout(p,l))}),w[o]||(v[o]?c=setTimeout(d,h):(w[o]=!0,(a={Link_id:Spaces.params.link_id})[n.param]=t,Spaces.api(n.method,a,function(e){delete w[o],0==e.code?(v[o]=!0,$("#main").append(y({nid:t,type:i,content:e.widget})),u&&(c=setTimeout(d,Math.max(0,h-(Date.now()-u.time))))):console.error("[HOT_INFO:"+s+"] "+Spaces.apiError(e))},{onError:function(e){delete w[o],console.error("[HOT_INFO:"+s+"] "+e)}})))})});
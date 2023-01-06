var cookie={
	
get:function(e,o){
var n=cookie.all()[e];return n===undefined?o:n
},


set:function(e,o,n){!(n=extend({path:"/",expires:0,secure:!1,domain:"."+base_domain(location.host)},n)).expires||n.expires instanceof Date||(n.expires=new Date(+new Date+864e5*n.expires));var t=encodeURIComponent(e)+"="+encodeURIComponent(o);return n.expires&&(t+="; expires="+n.expires.toUTCString()),n.domain&&(t+="; domain="+n.domain),n.path&&(t+="; path="+n.path),n.secure&&(t+="; secure"),document.cookie=t,this},

all:function(){var e,o,n,t;if(""==document.cookie)return{};for(e=document.cookie.split(";"),o={},n=0;n<e.length;++n)" "==(t=e[n].split("="))[0].charAt(0)&&(t[0]=t[0].substr(1)),o[decodeURIComponent(t[0])]=t[1]!==undefined?decodeURIComponent(t[1]):"";return o},

enabled:function(){var e="ololo_"+Date.now();return!!cookie.set(e,1).get(e)&&(cookie.remove(e),!0)},

remove:function(e){return cookie.set(e,"",{expires:-1})}

};
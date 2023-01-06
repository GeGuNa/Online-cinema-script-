define("search_suggests","init",function(){var o,r=300,c={users:{method:"/selector/?onlyFriends=1&ajaxUsers={query}",paramType:"GET",length:2,render:"usersApiResult",noApi:!0},search:{method:"neoapi/search.getSuggestions",param:"q",results:"result",length:1},mail_contacts:{method:"neoapi/users.search",param:"q",results:"users",length:3,data:{M:1},render:"usersApiResult"},blog_channels:{method:"neoapi/blogs.findChannel",param:"name",results:"channels",length:1,data:{CK:null},render:"blogChannels"},interests:{method:"neoapi/anketa.dictSuggestions",param:"q",results:"suggestions",length:1,bindParams:{T:"dict_type"},render:"usersTagObject",opts:{tags:!0,no_submit:!0,no_select:!0}},groups:{method:"neoapi/user_groups.selector_autocomplete",param:"sq",results:"found",length:1,bindParams:{pp:"pp"},onSelect:function(e,t){return{contact:t.found[e],removable:t.removables[e],param:t.params[e]}}}},p={suggest:function(e,t){return'<div class="suggest__item'+(t?" hide":"")+'" data-value="'+e+'">'+e+"</div>"},usersApiResult:function(e){return p.suggest(e.name)},usersTagObject:function(e){return'<div class="suggest__item" data-value="'+e.value+'">'+e.value+' <span class="right grey">'+e.popularity+"</span></div>"},blogChannels:function(e){return'<div class="suggest__item" data-value="'+e.name+'">'+e.name+"</div>"}},e={init:function(){var g=this;$("#main").on("focus",".search_suggest",function(e){var t,s,a=$(this),n=a.parents(".suggest_parent"),i=$.extend(n.data(),a.data()),u=i.type||"search",l=c[u];if(l.opts&&(i=$.extend(l.opts,i)),g.free(),(o={id:Date.now(),input:a,type:u,list:i.list?$(i.list):n.find(".suggest__list"),autoSelect:!i.no_select,autoSubmit:!i.no_submit,tags:i.tags,apiData:{},cfg:l}).timer=setInterval(function(){g.getSuggests()},r),t=l.bindParams)for(s in t)t[s]in i&&(o.apiData[s]=i[t[s]]);o.last_value=g.getQuery(a.val())}).on("blur",".search_suggest",function(e){if(o){var t=o.id;setTimeout(function(){o&&o.id==t&&g.free()},300)}}).on("mouseenter",".suggest__item",function(){g.highlightItem($(this),!1)}).on("mouseleave",".suggest__item",function(){g.highlightItem(!1,!1)}).on("click",".suggest__item",function(e){e.preventDefault(),e.stopPropagation(),e.stopImmediatePropagation();var t=$(this);g.selectItem(t,!0),g.hideSuggests()}).on("keydown",".search_suggest",function(e){if(o){var t=e.keyCode,s=t==Spaces.KEYS.ENTER||t==Spaces.KEYS.MAC_ENTER;t==Spaces.KEYS.RIGHT?o.autoSelect||g.selectActive():t==Spaces.KEYS.UP||t==Spaces.KEYS.DOWN?(e.preventDefault(),g.noSuggests()&&(o.last_value="",g.getSuggests()),g.moveSelectedItem(t==Spaces.KEYS.UP?-1:1)):(s||t==Spaces.KEYS.ESC)&&(s&&(e.preventDefault(),e.stopPropagation(),o.autoSelect?g.submitForm():g.selectActive()),g.hideSuggests())}}),page_loader.push("shutdown",function(){g.free()})},noSuggests:function(){return!o.list.hasClass("suggest__list_on")&&!o.last_req_id},highlightItem:function(e,t){o.list.find(".suggest__item_active").removeClass("suggest__item_active"),e&&(e.addClass("suggest__item_active"),t&&this.selectItem(e,!1,!0))},selectActive:function(e,t,s){o.list.find(".suggest__item_active").click()},selectItem:function(e,t,s){var a,n,i,u=this;o.input.data("suggest_index",e.index()),s&&!o.autoSelect||(a=$.trim(e.data("value")),o.tags?((i=(n=$.trim(o.input.val())).split(",")).pop(),i.push(a),n=i.map(function(e){return $.trim(e)}).join(", "),o.input.val(n)):o.input.val(e.text()),o.last_value=u.getQuery(o.input.val())),t&&u.submitForm()},getQuery:function(e){var t;return o.tags&&(e=(t=e.split(","))[t.length-1]),$.trim(e)},hideSuggests:function(){o.list.empty().removeClass("suggest__list_on"),Spaces.fixHeight(),this._restoreTriangles(),this.cancelRequest()},_restoreTriangles:function(){o.triangles&&($.each(o.triangles,function(){this.removeClass("triangle-hide")}),delete o.triangles)},submitForm:function(){var e,t,s,a;o.autoSubmit&&(t=(e=o.input.parents("form")).find('input[name="cfms"]'),"touch"==Device.type?t.length?t.delay(500).click():e.delay(500).submit():t.length?t.click():e.submit()),a=(s=o.input.data("suggest_index"))!==undefined?o.cfg.onSelect&&o.cfg.onSelect(s,o.last_api_result)||o.last_result[s]:undefined,o.input.trigger("suggestSelect",a),o.input.trigger("suggestSelect:"+o.type,a)},moveSelectedItem:function(e){var t,s,a=this,n=o.list,i=n.find(".suggest__item"),u=n.find(".suggest__item_active");u.length?(s=u.index(),s=0<e?s+1<i.length?s+1:0:0<=s-1?s-1:i.length-1,t=$(i[s])):t=0<e?o.tags?i.first():i.first().next():i.last(),t[0]!=u[0]&&a.highlightItem($(t),!0)},getSuggests:function(){var e,t,r=this,s=r.getQuery(o.input.val());o.last_value!==s&&((o.last_value=s).length>=o.cfg.length?(e={},t=o.cfg.method,o.cfg.param?e[o.cfg.param]=s:t=t.replace(/\{query\}/g,encodeURIComponent(s)),r.cancelRequest(),e=$.extend(e,o.cfg.data,o.apiData),o.last_req_id=Spaces.api(t,e,function(e){var t,s,a,n,i,u,l,g;if(o&&(o.cfg.noApi||0==e.code)){for(t=e,s=o.cfg.render?p[o.cfg.render]:null,o.cfg.results&&(t=e[o.cfg.results]),a=o.tags?"":p.suggest(html_wrap(o.input.val()),!0),n=0;n<t.length;++n)a+=s?s(t[n]):p.suggest(t[n]);if(0<t.length?(o.list.html(a).addClass("suggest__list_on"),Spaces.fixHeight(o.list)):r.hideSuggests(),(i=o.list.parents(".dropdown-menu__wrap")).length)for(r._restoreTriangles(),u=Spaces.DdMenu.findOpeners(i.attr("id")),n=0;n<u.length;++n)(l=$(u[n])).hasClass("triangle-show_top")&&(g=o.list.offset().top+o.list.outerHeight(),l.offset().top<=g&&(l.hasClass("triangle-hide")||(o.triangles||(o.triangles=[]),o.triangles.push(l),l.addClass("triangle-hide"))));o.last_api_result=e,o.last_result=t}})):r.hideSuggests())},cancelRequest:function(){o&&o.last_req_id&&(Spaces.cancelApi(o.last_req_id),o.last_req_id=null)},free:function(){o&&(clearInterval(o.timer),this.cancelRequest(),o.input.removeData("suggest_index"),o.list.removeClass("suggest__list_on").empty(),o=null)}};define("search_suggests","onRequest",function(){e.init()})});
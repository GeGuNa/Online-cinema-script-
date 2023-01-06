define("collections","init",function(){var e,c=mkhash([[Spaces.TYPES.FILE,1],[Spaces.TYPES.MUSIC,2],[Spaces.TYPES.PICTURE,3],[Spaces.TYPES.VIDEO,24]]),a=function(e){var i='<a href="'+e.url+'">'+html_wrap(e.name)+"</a>",n='<a href="#coll-cancel" class="js-collection_delete" data-nid="'+e.id+'" data-type="'+e.type+'" data-orig-nid="'+e.origNid+'"><span class="ico ico_spinner hide js-spinner"></span>'+L("Отменить")+"</a>";return L("Файл сохранён в вашу коллекцию {0}. {1}",i,n)},l=function(e){if(e.exists)return L("Файл был добавлен ранее: ")+'<a href="'+e.url+'">'+e.name+"</a>";var i='<a href="'+e.url+'">'+L("Музыку")+"</a>",n='<a href="#coll-cancel" class="js-collection_delete" data-nid="'+e.id+'" data-type="'+e.type+'" data-orig-nid="'+e.origNid+'" data-music="1"><span class="ico ico_spinner hide js-spinner"></span>'+L("Отменить")+"</a>";return L("Файл сохранён в вашу {0}. {1}",i,n)},i=function(e){return'<div class="content-item3 wbg content-bl__sep red t_center">'+e+'</div><div class="links-group links-group_grey" data-view="list"><span class="list-link links-group_grey t_center list-link_last js-dd_menu_close"><span class="ico ico_remove js-ico"></span> '+L("Закрыть")+"</span></div>"},r=function(){return'<div class="content-item3 wbg t_center grey content-bl__sep">'+L("У вас пока нет коллекций.")+"</div>"},d=function(){return'<div data-view="error" data-empty="1"></div><div data-view="create" data-empty="1"></div><div class="links-group" data-view="list"><div class="js-collections_warn stnd-block-yellow stnd-block content-bl__sep hide"></div><div class="js-collections_dirs"><div class="content-item3 wbg t_center grey content-bl__sep"><span class="ico ico_spinner"></span> '+L("Загрузка коллекций")+'</div></div><div class="links-group links-group_grey t_center hide js-collections_next"><span class="list-link">'+L("Показать ещё")+'</span></div><div class="links-group links-group_grey t_center hide js-collections_rewind"><span class="list-link">'+L("Перейти к началу")+"</span></div>"+("desktop"==Device.type?'<table class="table__wrap"><tr><td class="table__cell links-group links-group_grey table__cell_border" width="50%"><span class="list-link list-link-blue js-collection_add list-link_first list-link_last"><span class="ico ico_plus_blue js-ico"></span> <span class="t">'+L("Создать коллекцию")+'</span></span></td><td class="table__cell links-group links-group_grey table__cell_last" width="50%"><span class="list-link js-dd_menu_close list-link_first list-link_last"><span class="t">'+L("Отменить")+"</span></span></td></tr></table>":'<div class="links-group links-group_grey"><span class="list-link list-link-blue js-collection_add list-link_first"><span class="ico ico_plus_blue js-ico"></span> <span class="t">'+L("Создать коллекцию")+'</span></span><span class="list-link js-dd_menu_close list-link_last"><span class="ico ico_remove js-ico"></span> <span class="t">'+L("Отменить")+"</span></span></div>")+"</div>"},o={},p=Class({Static:{init:function(e){e.data("__collections__")||e.data("__collections__",new p(e))},open:function(e,i,n,s){s||(s=e+"_"+n);var t=o[s];t&&t.data("type")+"_"+t.data("nid")!=e+"_"+n&&(p.freeInstance(s),t=null),t||(t=$('<a class="hide">').data({nid:n,type:e,extType:i}),$("#main").append(t),p.init(t),o[s]=t),t.click()},freeInstance:function(e){var i=o[e];i&&(i.data("__collections__").destroy(),delete o[e])},setup:function(){$(".js-collection_copy").each(function(){p.init($(this).removeClass("js-collection_copy"))}),$("body").on("click.oneRequest",".js-collection_delete",function(e){e.stopPropagation(),e.preventDefault();var i=$(this),n=i.data("origNid");nid=i.data("nid"),type=i.data("type"),i.find(".js-spinner").removeClass("hide"),Spaces.api("neoapi/files.delete",{File_id:nid,Type:type,Link_id:Spaces.params.link_id,CK:null},function(e){0==e.code?($("#collections_"+type+"_"+n).addClass("hide"),Spaces.showMsg(i.data("music")?L("Файл удалён из музыки."):L("Файл удалён из коллекции."),{gallery:!0})):Spaces.showError(Spaces.showApiError(e))},{onError:function(e){Spaces.showError(e,!1,!1,{gallery:!0})}})})}},Constructor:function(s){var t,n,o=this;if(o.nid=s.data("nid"),o.type=s.data("extType")||s.data("type"),o.fileType=s.data("type"),o.msg=$("#collections_"+o.type+"_"+o.nid),o.link=s,t=function(e){Spaces.params.nid||(page_loader.refreshWidgets(Spaces.WIDGETS.FOOTER|Spaces.WIDGETS.HEADER|Spaces.WIDGETS.SIDEBAR|Spaces.WIDGETS.CSS,function(){Spaces.params.nid=cookie.get("user_id")}),page_loader.disable(!0))},o.type==Spaces.TYPES.MUSIC){if(!Spaces.params.nid)return;s.click(function(e){var i,n;e.preventDefault(),s.data("busy")||((i=function(e){s.find("span").first().toggleClass("ico_spinner",!!e).data("busy",!!e)})(!0),n=$.extend(new Url(s.prop("href")).query,{CK:null,Ft:o.fileType,Type:o.type}),i(!0),Spaces.api("neoapi/files.copy2me",n,function(e){i(!1),0==e.code||e.exists?($("#collections_motivator_"+o.type+"_"+o.nid).remove(),o.showMsg(l({id:e.fileId,name:e.fileName,exists:e.exists,url:e.url,type:o.type,origNid:o.nid}))):Spaces.showApiError(e)},{onError:function(e){i(!1),Spaces.showError(e,!1,{gallery:!0})}}))})}else(n=new Spaces.DdMenu({data:{scroll:!0,toggle_same:!0,events:!0,in_gallery:!0}})).link(s),n.element().on("dd_menu_open",function(e){o.msg.addClass("hide"),Spaces.api("neoapi/files.getCollections",{Fid:o.nid,Ft:o.fileType,Type:c[o.type],Uid:Spaces.params.nid,Link_id:Spaces.params.link_id},function(e){var i=o.view("list").find(".js-collections_dirs"),n=o.view("list").find(".js-collections_warn");0==e.code?(t(),i.html(e.collections.length?e.collections.join(""):r()),n.html(e.message).toggleClass("hide",!e.message)):o.showError(Spaces.apiError(e)),o.fixHeight()}),o.view("list",!0),o.busy=!1}).on("click",".js-collections_next",function(e){e.preventDefault();var i=n.element();i.data("collectionsOffset",i.data("collectionsOffset")+i.data("collectionsChunk")),o.onResize()}).on("click",".js-collections_rewind",function(e){e.preventDefault(),n.element().data("collectionsOffset",0),o.onResize()}).on("click",".js-collection_add",function(e){var i,n,s;e.preventDefault(),i=$(this),n=function(e){i.find(".js-ico").toggleClass("ico_spinner",e)},s={D:-Spaces.params.nid,Type:c[o.type],Col:1,a:"cd",CK:null,Link_id:Spaces.params.link_id},n(!0),Spaces.api("neoapi/files.createDir",s,function(e){n(!1),0==e.code?o.view("create",!0).html(e.widget):o.showError(Spaces.apiError(e)),o.fixHeight()},{onError:function(e){n(!0),o.showError(e)}})}).on("click",".js-collections_dirs .js-dir",function(e,i){var n,s,t;e.stopPropagation(),e.preventDefault(),o.busy||(n=$(this),s=function(e){o.busy=e;var i=n.find("img");e?i.data("old_src",i.prop("src")).prop("src",ICONS_BASEURL+"spinner2.gif"):i.prop("src",i.data("old_src"))},t={File_id:o.nid,Ft:o.fileType,Type:o.type,Dir:n.data("nid"),Link_id:Spaces.params.link_id,Force:1,CK:null},s(!0),Spaces.api("neoapi/files.copy2me",t,function(e){s(!1),0==e.code?(o.showMsg(a({name:$.trim(n.find(".js-dir_name").text()),url:n.prop("href"),id:e.fileId,type:o.type,origNid:o.nid})),$("#collections_motivator_"+o.type+"_"+o.nid).remove(),Spaces.DdMenu.close()):o.showError(Spaces.apiError(e))},{onError:function(e){s(!1),o.showError(e)}}))}).on("click",".js-collections_list",function(e){e.stopPropagation(),e.preventDefault(),o.view("list",!0)}).on("click",'button[name="cfms"]',function(e){var t,i,a,n,l;e.stopPropagation(),e.preventDefault(),t=o.view("create"),i=$(this),a=t.find('input[name="n"]'),$.trim(a.val()),n=$.extend(Url.serializeForm(t),{D:-Spaces.params.nid,Type:c[o.type],Col:1,a:"cd",cfms:1,Link_id:Spaces.params.link_id}),l=function(e){i.find(".js-ico").toggleClass("ico_spinner",e)},Spaces.api("neoapi/files.createDir",n,function(e){var i,n,s;l(!1),0==e.code?e.dirs?((i=o.view("list",!0).find(".js-collections_dirs")).html(e.dirs.join("")),n=[],s={},i.find("[data-nid]").each(function(){var e=$(this),i=e.data("nid");s[i]=e,n.push(i)}),n.sort(),s[n[n.length-1]].click()):t.html(e.widget):Spaces.view.setInputError(a,Spaces.apiError(e)),o.fixHeight()},{onError:function(e){l(!1),Spaces.view.setInputError(a,e)}}),l(!0)}),n.content().append(d()),o.menu=n;$("#Gallery").length?n.on("resize",function(){o.onResize()}).on("opened",function(){$("#g_sharelink_inner").addClass("js-clicked")}).on("closed",function(){$("#g_sharelink_inner").removeClass("js-clicked")}):page_loader.onShutdown("collections",function(){o.destroy()})},showMsg:function(e){this.msg.length?this.msg.html(e).removeClass("hide"):Spaces.showMsg(e,{gallery:!0})},showError:function(e){this.view("error",!0).html(i(e))},destroy:function(){var e=this;e.link&&e.link.removeData("__collections__"),e.menu&&e.menu.element().empty(),e.msg=e.menu=e.link=null,delete o[e.type+"_"+e.nid]},view:function(e,i){var n,s,t,a,l,o,c=this;if(e===undefined)return c.last_view_name;if(!c.views_cache||$.isEmptyObject(c.views_cache))for(c.views_cache={},n=c.menu.content().find("[data-view]"),s=0;s<n.length;++s)t=$(n[s]),c.views_cache[t.data("view")]=t;if(e===c.last_view_name||!i)return c.views_cache[e];for(l in c.views_cache)o=c.views_cache[l],l===e?(a=o).show():(l===c.last_view_name&&o.data("empty")&&o.empty(),o.hide());return c.last_view_name=e,tick(function(){Spaces.DdMenu.fixSize()}),a},onResize:function(){var e,i,n,s,t,a,l,o=this,c=o.menu.element(),r=o.menu.content(),d=c.css("maxHeight").replace("px","");if("none"!=d&&d){for((d-=(+c.css("paddingTop").replace("px","")||0)+(+c.css("paddingBottom").replace("px","")||0))!=c.data("oldMaxHeight")&&(c.data("collectionsOffset",0),c.data("oldMaxHeight",d)),e=r.find(".js-collections_next"),i=r.find(".js-collections_rewind"),n=r.find(".js-collections_dirs").children().hide().toArray(),s=c.data("collectionsOffset")||0,t=0,e.removeClass("hide"),i.addClass("hide"),a=0,l=-1;d>=r.height()&&a<n.length;)s<=a&&($(n[a]).show(),l=a,++t),++a;-1==l&&($(n[s]).show(),l=s),d<r.height()&&(s||l!=n.length-1?l&&1<t&&($(n[l]).hide(),--l,--t):e.addClass("hide")),n.length&&l!=n.length-1?c.data("collectionsChunk",t):(e.addClass("hide"),s&&i.removeClass("hide"))}},fixHeight:function(){$("#Gallery").length?this.onResize():Spaces.fixHeight()}});window.FileCollections=p,define("collections","onRequire",function(){e||(e=!0,$(function(){e=!1,p.setup()}))})});
define("geo_selector","init",function(){var o,e,_=1,r=2,d=3,u=4,p=1,y=2,c=5,g=function(e){return'<div class="js-geosel_item s-city__item s-chb '+(e.hidden?" hide ":"")+(e.selected?" clicked s-city__item_light ":" s-city__item_city ")+'" data-type="city" data-name="'+e.name+'" data-country_name="'+e.country_name+'" data-country_id="'+e.country_id+'" data-id="'+e.id+'" >'+(e.short_name?'<img src="'+ICONS_BASEURL+"/flags/"+e.short_name+'p.png" alt="" class="s-city__country-flag" />':"")+'<div class="s-city__item-content"><div class="s-city__item-title">'+(e.selected&&e.country_name?e.name+", "+e.country_name:e.name)+'</div></div><div class="s-city__item-region">'+(e.region_name||"")+(e.area_name&&e.region_name?", ":"")+(e.area_name||"")+"</div></div>"},m=function(e){return'<div class="js-geosel_item s-city__item s-chb '+(e.hidden?" hide ":"")+(e.selected?" clicked s-city__item_light ":" s-city__item_city ")+'" data-type="region" data-name="'+e.name+'" data-country_name="'+e.country_name+'" data-country_id="'+e.country_id+'" data-id="'+e.id+'" >'+(e.short_name?'<img src="'+ICONS_BASEURL+"/flags/"+e.short_name+'p.png" alt="" class="s-city__country-flag" />':"")+'<div class="s-city__item-title">'+(e.selected&&e.country_name?e.name+", "+e.country_name:e.name)+"</div></div>"},h=function(e){return'<div class="js-geosel_item s-city__item s-chb '+(e.hidden?" hide ":"")+(e.selected?" clicked s-city__item_light ":" s-city__item_city ")+'" data-type="country" data-name="'+e.name+'" data-short_name="'+e.short_name+'" data-id="'+e.id+'" >'+(e.short_name?'<img src="'+ICONS_BASEURL+"/flags/"+e.short_name+'p.png" alt="" class="s-city__country-flag" />':"")+'<div class="s-city__item-title">'+e.name+"</div></div>"},l=function(e){return'<div class="s-city__stnd s-city__item_light oh"><table class="table__wrap table__wrap-layout"><tr><td class="table__cell table__cell_large-ico"><span class="ico ico_compass ico_large left"></span></td><td><div class="oh">'+e+"</div></td></tr></table></div>"},f=function(e){var t=e.page<e.total?"js-geosel_pagenav_link":"s-city__pagination-btn_disabled",i=1<e.page?"js-geosel_pagenav_link":"s-city__pagination-btn_disabled",n='<div class="s-city__pagination js-geosel_pagenav"><table class="table__wrap"><tr><td class="table__cell s-city__pagination-btn s-city__pagination-btn_prev '+i+' relative" data-p="'+(e.page-1)+'"><span class="js-ico ico ico_arr3"></span> <span class="s-city__pagination-btn_label">'+L("Назад")+'</span></td><td class="table__cell s-city__pagination-btn js-geosel_pagenav_cnt">'+L("{0} из {1}",e.page,e.total)+'</td><td class="table__cell table__cell_last s-city__pagination-btn s-city__pagination-btn_next '+t+' relative" data-p="'+(e.page+1)+'"><span class="s-city__pagination-btn_label">'+L("Вперёд")+'</span> <span class="js-ico ico ico_arr"></td></tr></table></div>';return n},t=function(){return'<span class="ico ico_spinner"></span>'},i=Class({Constructor:function(e){var i,n=this;n.wrap=e,n.opts=e.data(),n.input=e.find(".js-geosel_input"),n.inputWrap=e.find(".js-usearch_parent"),n.result=e.find(".js-geosel_result"),n.offers=e.find(".js-geosel_offers"),n.current=e.find(".js-geosel_current"),n.empty=e.find('.js-geosel_item[data-id="0"]'),n.label=e.find(".js-geosel_label"),n.country_id=e.find(".js-geosel_country_id"),n.city_id=e.find(".js-geosel_city_id"),n.region_id=e.find(".js-geosel_region_id"),n.wrap.on("click",".js-geosel_item",function(e){e.preventDefault(),e.stopPropagation();var t=$(this).data();n.select(t,!0)}).on("click",".js-geosel_pagenav_link",function(e){e.preventDefault(),e.stopPropagation(),$(this).parents(".js-geosel_pagenav").find(".js-geosel_pagenav_cnt").html(t()),n.search_offset=c*($(this).data("p")-1),n.usearch.refreshSearch()}).itemsSelector({selector:".js-geosel_item:visible",activeClass:"s-city__item_hovered",keydownArea:n.input,external:!0}),n.opts.render==p&&n.input.on("blur",function(){var t=Spaces.DdMenu.currentId();tick(function(){if(document.activeElement){var e=$(document.activeElement);if(e.parents("#city_fw__form"+n.opts.uniq).length||!e.parents("body").length)return;Spaces.DdMenu.close(t)}})}),i=n.input.val().length<1,n.usearch=e.find(".js-usearch_parent").usearch({length:1,allowEmpty:!0,enter:!0,skipDefault:!0,onInput:function(e){var t=e.value.length<1;i!=t&&(n.opts.render==y?(n.empty.toggle(n.allowEmpty()&&t),n.offers.toggle(t),n.current.toggle(t),n.result.toggle(!t)):t&&(n.allowEmpty()&&n.empty.show(),n.offers.show(),n.current.show(),n.result.hide()),t&&n.result.html(""),Spaces.DdMenu.fixSize(),i=t)},doSearch:function(e){n.stop_search?e.onSuccess():(e.refresh||(n.search_offset=0),n.search(e.query,e.onSuccess))}}),e.on("dd_menu_open",function(){n.stop_search=!1,n.allowEmpty()||n.empty.hide(),n.original_value=n.input.val(),n.opts.render==p&&(n.skip_search=!0,n.inputWrap.addClass("search__results-show")),$(".js-geo_sel_warn").hide()}).on("dd_menu_closed",function(){n.stop_search=!0,n.allowEmpty()&&n.empty.show(),n.offers.show(),n.current.show(),n.result.hide().html(""),n.original_value&&n.input.val(n.original_value).trigger("input"),n.opts.render==p&&n.inputWrap.removeClass("search__results-show"),$(".js-geo_sel_warn").show()}).on("clearSearchForm",function(){n.opts.render==p&&n.reset()}),n.isEmpty()||n.wrap.data("manual",!0),$("#city_fw__form"+n.opts.uniq).data("disabled",!1)},select:function(e,t){var i,n,a,s,o,r,c,l=this;if("city"==e.type&&l.opts.city==d&&(e=$.extend({},e,{type:"country",id:e.country_id,name:e.country_name})),e.type in l.opts&&l.opts[e.type]==d)l.reset();else{for(l.stop_search=!0,i=e.name,n="ico_place",l.empty.removeClass("clicked"),l.opts.render==y&&l.input.val("").trigger("input"),a=[+l.country_id.val(),+l.city_id.val(),+l.region_id.val()],"empty"==e.type?(l.opts.region!=d&&l.opts.country!=d||l.country_id.val(0),l.city_id.val(0),l.region_id.val(0),l.opts.render==p&&l.input.val("").trigger("input"),l.empty.addClass("clicked"),l.current.find("[data-id]").removeClass("clicked"),n=l.opts.geoFilter?"ico_ac_all_grey":"ico_place"):"country"==e.type?(l.country_id.val(e.id),l.city_id.val(0),l.region_id.val(0),l.current.html(h({id:e.id,name:e.name,selected:1})),l.opts.render==p&&l.input.val(i).trigger("input")):"city"==e.type?(l.country_id.val(e.country_id),l.city_id.val(e.id),l.region_id.val(0),l.current.html(g({id:e.id,name:e.name,country_id:e.country_id,country_name:e.country_name,selected:1})),i=e.country_name?e.name+", "+e.country_name:e.name,l.opts.render==p&&l.input.val(i).trigger("input")):"region"==e.type&&(l.country_id.val(e.country_id),l.city_id.val(0),l.region_id.val(e.id),l.current.html(m({id:e.id,name:e.name,country_id:e.country_id,country_name:e.country_name,selected:1})),i=e.country_name?e.name+", "+e.country_name:e.name,l.opts.render==p&&l.input.val(i).trigger("input")),l.label.find(".js-ico").removeClass("ico_place ico_ac_all_grey").addClass(n),l.label.find(".js-btn_val").text(i),s=l.current.find("[data-id]"),l.offers.children().each(function(){var e=$(this);e.toggle(!(e.data("id")==s.data("id")&&e.data("country_id")==s.data("country_id")))}),l.original_value=!1,t&&(Spaces.DdMenu.close(),l.input.blur(),l.wrap.data("manual",!0)),o=[+l.country_id.val(),+l.city_id.val(),+l.region_id.val()],r={selector:l,id:l.opts.uniq,city:+l.city_id.val(),region:+l.region_id.val(),country:+l.country_id.val(),manual:!!l.wrap.data("manual"),type:e.type,raw:e,valid:!0,changed:!1},c=0;c<a.length;++c)o[c]!=a[c]&&(r.changed=!0);l.opts.city!=_||r.city||(r.valid=!1),l.opts.country!=_&&l.opts.country!=u||r.country||(r.valid=!1),l.opts.region!=_||r.region||(r.valid=!1),l.wrap.trigger("geoSelected",r)}},search:function(e,a){var t,s=this,i=e.split(", ")[0],n={O:s.search_offset,L:c,q:i};s.opts.weather&&(n.W=1),s.opts.region!=d?(t="neoapi/services.searchRegion",n.С=s.country_id.val()):s.opts.city==d?t="neoapi/services.searchCountry":s.opts.city==r?(t="neoapi/services.searchCity",s.opts.country!=u&&(n.M=1)):t="neoapi/services.searchCity",i.length<1?a():(Spaces.cancelApi(o),o=Spaces.api(t,n,function(e){var t,i,n;if(a(),0==e.code)if(s.opts.render==p&&(s.empty.hide(),s.offers.hide(),s.current.hide(),s.result.show()),"count"in e||!e.regions||(e.count=e.regions.length),e.count){if(t="",e.countries)for(i=0;i<e.countries.length;++i)t+=h(e.countries[i]);if(e.regions)for(i=0;i<e.regions.length;++i)t+=m(e.regions[i]);if(e.cities)for(i=0;i<e.cities.length;++i)t+=g(e.cities[i]);e.count>c&&(s.opts.city!=d||s.opts.region!=d)&&(t+=f({page:s.search_offset/c+1,total:Math.ceil(e.count/c)})),s.result.html(t)}else n=s.opts.region!=d?L("К сожалению мы не нашли такой регион. Попробуйте ещё раз."):s.opts.city==r?L("К сожалению мы не нашли такого города. Пожалуйста, проверьте правильность или введите вместо него название страны."):s.opts.city==d?L("К сожалению мы не нашли такой страны. Попробуйте ещё раз."):L("К сожалению мы не нашли такого города. Пожалуйста, проверьте правильность."),s.result.html(l(n));Spaces.DdMenu.fixSize()},{onError:function(){a()}}))},reset:function(){this.empty.click()},isEmpty:function(){return this.empty.hasClass("clicked")},isManual:function(){return!!this.wrap.data("manual")},value:function(){return{city:+this.city_id.val(),region:+this.region_id.val(),country:+this.country_id.val()}},allowEmpty:function(){var e=this;return e.isEmpty()||e.opts.render==p||e.opts.country!=_&&e.opts.city!=_&&e.opts.region!=_}});$.fn.geoSelector=function(){var e=this.data();if(this.length)return e.geosel||(e.geosel=new i(this)),e.geosel},define("geo_selector","onRequire",function(){e||(e=tick(function(){e=!1,$(function(){$(".js-geosel").each(function(){$(this).geoSelector()})})}))})});
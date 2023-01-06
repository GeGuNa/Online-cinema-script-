"use strict";define("mail","onRequest",function(){var a,h,M,n,s,r,S,E,f,t,i=3e4,w={},l=[],o={},v=0,c=($(window).width(),[]),y="m"+Date.now(),g=5e3,p=4e3,C=0,k=2,b=3,A=6,P={old:"mail__old_msg",unread:"mail__new_msg"},d={ids:[]},m=function(e){return' <a href="#" class="js-mail_contact_undo" data-action="'+e.action+'" data-ids="'+e.ids+'" data-state="'+e.state+'">'+L("Отмена")+' <span class="ico ico_spinner js-spinner hide"></span></a>'},T={typing:{interval:null,cnt:0},typings:{},send_typing:{},getContactsByIds:function(e,t){var n=e.List,a=e.Link_id,s=e.contacts;Spaces.api("neoapi/mail.getContactsByIds",{List:n,Link_id:a,CoNtacts:s,Pag:1},function(e){var a=e.code;0!=a?a==Codes.MAIL.ERR_CONTACT_NOT_FOUND?I.goTo("/mail/?r=mail/contact_list&List="+n,t):Spaces.showApiError(e):D.add_contacts(e)})},searchContacts:function(e,a){var t=e.list||0,n=e.P||1,s=Spaces.params.link_id;a=a||{},Spaces.cancelApi(h.req),h.req=Spaces.api("neoapi/mail.getContacts",{List:t,P:n,Link_id:s,q:e.q,Pag:1},function(e){a.onSuccess&&a.onSuccess(),h.req=null,h.time=Date.now(),e.code==Codes.MAIL.ERR_GARBAGE_IS_CLEARING?T.showMsg(L("В данный момент ваша корзина очищается, подождите несколько минут и повторите попытку.")):0==e.code?($("#search_messages_link").html(e.search_messages_link||"").toggleClass("hide",!e.search_messages_link),D.contact_search_list(e,{list:t,Link_id:s,settings:a})):a.onError&&a.onError(Spaces.apiError(e))},{onError:function(e){a.onError&&a.onError(e),h.req=null,h.time=Date.now()}})},getMessages:function(e,n){var a,s=e.contact,i=e.list,o=e.P||1,c=e.Link_id;n=n||{},a={method:"getMessages",List:i,P:o,Pag:1,q:e.q&&e.q.length?e.q:undefined,Link_id:c},e.user?a.User=e.user:a.Contact=s,h.req=Spaces.api("neoapi/mail.getMessages",a,function(e){var a,t;h.req=null,h.time=Date.now(),a=e.code,(t={}).list=i,t.Link_id=c,t.contact=s,t.settings=n,0!=a?a==Codes.MAIL.ERR_CONTACT_NOT_FOUND?I.goTo("/mail/?r=mail/contact_list&List="+i,n):n.onError&&n.onError(Spaces.apiError(e)):(n.onSuccess&&n.onSuccess(),e.messages?(D.message_list(e,t),1==o&&$("#loadNewMessages_place").empty()):I.goTo("/mail/?r=mail/contact_list&List="+i,n))},{onError:function(e){n.onError&&n.onError(e),h.req=null,h.time=Date.now()}})},sendMessage:function(e,i){html_wrap(e.user),html_wrap(e.message),e.message;var a,t=e.image_code,o=(e.mess_user,e.mess_date,e.mess_text,M),c=(e.att,e.hash),n=I.getQueryVariable("Link_id");Spaces.DEBUG&&(e.message+=" TIME_"+Date.now()),Spaces.cancelApi(r),clearTimeout(s),a={CK:null,user:e.user,Contact:e.contact,texttT:e.message,atT:e.att,Reply:e.reply,Pag:1,hash:y},w.fromDating&&(a.from="dating"),e.contact&&(a.Contact=e.contact),t&&(a.code=t),n&&(a.Link_id=n),e.contacttype&&e.contacttype,Spaces.api("neoapi/mail.sendMessage",a,function(e){var a,t,n=e.code,s=$("#textarea");if(0!=n){if(e.code==Codes.MAIL.ERR_ADMIN_SEND_DENIED)return void Spaces.redirect("/mail/?r=mail/admin_mail_denied");n==Codes.COMMON.ERR_NEED_CAPTCHA||n==Codes.COMMON.ERR_WRONG_CAPTCHA_CODE?(a='<div style="padding-left: 5px; padding-top: 5px"><img src="'+e.captcha_url+'" /></div><div class="stnd_padd" style="font-size:small;">Введите код: <input type="text" name="captcha_code" size="4" value="" /></div>',$("#captcha").html(a)):Spaces.view.setInputError(s,Spaces.apiError(e))}else I.refreshMessages(!0),"sendMessageForm"!=o&&"messageList"!=o||(1==(I.getQueryVariable("P")||1)&&"messageList"==o?setTimeout(function(){$("#temp_mes_loader"+c).remove()},5e3):((t=w.list)==b&&(t=0),Spaces.redirect("/mail/?r=mail/message_list&Contact="+e.message.contact.nid+"&List="+t+"&salt="+I.randomNumber())));i&&i(e)},{disableCaptcha:!0,onError:function(e){i&&i()}})},callbackAction:function(e,a,t,n,s){var i,o,c;if(s=$.extend({full:!1},s),e&&T.showMsg(e),"contact"==a){if(n.operated_ids&&0<n.operated_ids.length)for(i=0;i<n.operated_ids.length;i++)$("#"+a+"_"+n.operated_ids[i]).remove();l=[],n.counters&&T.updateCounters(n.counters),o=I.getQueryVariable("P")||1,n.contacts&&(c=$("#contacts_wrapper"),s.full?c.html(n.contacts.join("")):c.append(n.contacts.join(""))),0==$("#contacts_wrapper .contact_item").length&&1==o&&($("#contacts_wrapper").html('<div class="content-bl">'+L("Список контактов пуст")+"</div>"),$("#mail__contacts_buttons").remove()),"pagination"in n&&(n.pagination?$("#mail_pagination").html(n.pagination):$("#mail_pagination").empty())}else if("message"==a){if($("#m"+t).remove(),n.messages)for(i=0;i<n.messages.length;i++)$("#messages_list").append(n.messages[i]);o=I.getQueryVariable("P")||1,0==$("#messages_list .mail__dialog_wrapper").length&&1==o&&($("#messages_list").append('<div class="mail__dialog_wrapper">'+L("Список сообщений пуст")+"</div>").removeClass("content-bl_top-nopad"),$("#messages_list_form").remove(),$("#action_links").remove(),$("#MailPage .widgets-group .list-link__wrap .btn-tools").first().remove()),n.pagination?$("#mail_pagination").html(n.pagination):$("#mail_pagination").empty()}s.noscroll||I.scrollDocument()},updateCounters:function(t){$("#mail__lists_links a").each(function(){var e=$(this),a=e.data("counter");a in t&&e.find(".cnt").text(t[a])}),$("#mail__tabs .js-tab_cnt").text(t["new"]).toggle(0<t["new"]),I.checkButtons(!1)},swapContacts:function(t){var n,s=t.garbage,i=t.contacts.length,e=t.page,a=t.list,o=w.contactsOnPage*e-i,c={CK:null,Garbage:t.garbage,CoNtacts:t.contacts,List:a};$("#contacts_wrapper .contact_item").length==i?c.P=e:(c.O=o,c.L=i),c.Pag=1,$("#mail_pagination").is(":empty")||(c.Cl=1),t.undo&&(c.Cl=1,c.Pag=1,c.O=w.contactsOnPage*(e-1),c.L=w.contactsOnPage),t.message&&(c.message=t.message),(n=function(e){t.spinner&&t.spinner.toggleClass("ico_spinner",e)})(!0),Spaces.api("neoapi/mail.swapContacts",c,function(e){var a;(n(!1),0!=e.code)?Spaces.showApiError(e):(T.clearUndo(),a=1<i?s?L("Контакты перенесены в Корзину."):L("Контакты восстановлены из Корзины."):s?L("Контакт перенесён в Корзину."):L("Контакт восстановлен из Корзины."),t.undo||(a+=m({state:s,action:"swap",ids:t.contacts.join(",")})),T.callbackAction(a,"contact",t.contacts,e,{full:t.undo}))},{onError:function(e){Spaces.showError(e),n(!1)}})},archiveContacts:function(t){var n,s=t.archive,i=t.contacts.length,e=t.page,a=t.list,o=w.contactsOnPage*e-i,c={CK:null,Archive:t.archive,CoNtacts:t.contacts,List:a};$("#contacts_wrapper .contact_item").length==i?c.P=e:(c.O=o,c.L=i),c.Pag=1,$("#mail_pagination").is(":empty")||(c.Cl=1),t.undo&&(c.Cl=1,c.Pag=1,c.O=w.contactsOnPage*(e-1),c.L=w.contactsOnPage),(n=function(e){t.spinner&&t.spinner.toggleClass("ico_spinner",e)})(!0),Spaces.api("neoapi/mail.archiveContacts",c,function(e){var a;(n(!1),0!=e.code)?Spaces.showApiError(e):(T.clearUndo(),a=1<i?s?L("Контакты перенесены в Архив."):L("Контакты восстановлены из Архива."):s?L("Контакт перенесён в Архив."):L("Контакт восстановлен из Архива."),t.undo||(a+=m({state:s,action:"archive",ids:t.contacts.join(",")})),T.callbackAction(a,"contact",t.contacts,e,{full:t.undo}))},{onError:function(e){Spaces.showError(e),n(!1)}})},eraseContacts:function(t){var n,s=t.contacts.length,e=t.page,a=t.list,i=w.contactsOnPage*e-s,o={CK:null,CoNtacts:t.contacts,phone_nums:t.phone_nums,List:a};$("#contacts_wrapper .contact_item").length==s?o.P=e:(o.O=i,o.L=s),o.Pag=1,$("#mail_pagination").is(":empty")||(o.Cl=1),t.undo&&(o.Cl=1,o.Pag=1,o.O=w.contactsOnPage*(e-1),o.L=w.contactsOnPage),(n=function(e){t.spinner&&t.spinner.toggleClass("ico_spinner",e)})(!0),Spaces.api("neoapi/mail.eraseContacts",o,function(e){var a;(n(!1),0!=e.code)?Spaces.showApiError(e):(T.clearUndo(),t.undo||(a=1<s?L("Контакты удалены из Корзины"):L("Контакт удалён из корзины")),T.callbackAction(a,"contact",t.contacts,e))},{onError:function(e){Spaces.showError(e),n(!1)}})},spamContacts:function(t){var n,s=t.spam,i=t.contacts.length,e=t.page,a=t.list,o=w.contactsOnPage*e-i,c={CK:null,Spam:t.spam,CoNtacts:t.contacts,List:a};$("#mail_pagination").is(":empty")||(c.Cl=1),$("#contacts_wrapper .contact_item").length==i?c.P=e:(c.O=o,c.L=i),c.Pag=1,t.undo&&(c.Cl=1,c.Pag=1,c.O=w.contactsOnPage*(e-1),c.L=w.contactsOnPage),t.message&&(c.message=t.message),(n=function(e){t.spinner&&t.spinner.toggleClass("ico_spinner",e)})(!0),Spaces.api("neoapi/mail.spamContacts",c,function(e){var a;(n(!1),0!=e.code)?Spaces.showApiError(e):(T.clearUndo(),a=1<i?s?L("E-mail контакты отправлены в Спам."):"E-mail контакты восстановлены из Спама.":s?L("E-mail контакт отправлен в Спам."):"E-mail контакт восстановлен из Спама.",t.undo||(a+=m({state:s,action:"spam",ids:t.contacts.join(",")})),T.callbackAction(a,"contact",t.contacts,e,{full:t.undo}))},{onError:function(e){Spaces.showError(e),n(!1)}})},markContactsAsRead:function(e){e.contacts.length;e.redirect&&e.redirect,e.from&&e.from,Spaces.api("neoapi/mail.markContactsAsRead",{CoNtacts:e.contacts,CK:null},function(e){})},clearGarbage:function(a){a.redirect&&a.redirect,Spaces.api("neoapi/mail.clearGarbage",a,function(e){0!=e.code?Spaces.showApiError(e):(T.showMsg(a.postponed?L("Контакты будут очищены в течении нескольких минут"):L("Ваша корзина очищена")),$("#contacts_wrapper").after('<div class="content-bl">Список контактов пуст.</div>'),$("#contacts_wrapper, #mail__contacts_buttons, #mail_pagination").remove(),$("#confirm_clear_garbage").hide(),T.updateCounters(e.counters),a.postponed&&Spaces.redirect("/mail/"))})},favMessages:function(t){var n=t.list,e=(t.contact,t.messages,t.page),s=t.fav,a=w.onPage*e-1,i={CK:null,Contact:t.contact,MeSsages:t.messages,Fav:t.fav,List:n};1==n&&(1==$("#messages_list .mail__dialog_wrapper").length?i.P=e:(i.O=a,i.L=1),i.Pag=1,$("#mail_pagination").is(":empty")||(i.Ml=1)),Spaces.api("neoapi/mail.favMessages",i,function(e){if(0!=e.code)Spaces.showApiError(e);else{var a=s?L("Сообщение перенесено в избранное"):L("Сообщение перенесено из избранного");1==n?T.callbackAction(a,"message",t.messages,e):(T.showMsg(a),t.el.data("action",s?"mail_message_unfav":"mail_message_fav"),t.el.html('<span class="ico_mail ico_mail_fav"></span> '+(s?L("Из избранного"):L("В избранное"))))}})},monitorTextareaTyping:function(){var e,a=$("#textarea");w.contactId&&a.typingDetect(!0).on("focus",function(){n=a.val(),e&&clearTimeout(e),e=null}).on("typing",function(e){T.sendTypingEvent(w.contactId)}).on("blur",function(){e=setTimeout(function(){null!=n&&n!=a.val()&&T.sendTypingEvent(w.contactId,!0),n=null},1e3)})},sendTypingEvent:function(e,a){var t;if(T.send_typing[e]=T.send_typing[e]||0,Date.now()-T.send_typing[e]>p||a){if(t=$("#textarea"),T.send_typing[e]=Date.now(),Date.now()-E<3e3||S)return;a&&n==t.val()||(Spaces.cancelApi(r),r=Spaces.api("neoapi/mail.typing",{CK:null,Contact:e,message:t.val(),No_notify:a})),n=t.val()}a||(clearTimeout(s),s=setTimeout(function(){null!==n&&T.sendTypingEvent(e,!0)},1e3))},typingPlace:function(e){return{typing:w.contactId&&w.contactId==e.id||w.talkId&&w.talkId==e.talk_id?$("#mail_typing"):$("#mail_typing_"+e.key),text:$("#mail_text_"+e.key)}},setTyping:function(e,a,t){var n,s=e.talk_id?"talk"+e.talk_id:e.id,i=T.typings[s];i||(i={id:e.id,talk_id:e.talk_id,key:s,users:{}}),n=T.typingPlace(i),a?((T.typings[i.key]=i).time=Date.now(),e.user&&(i.users[e.user]=Date.now())):(n.typing.empty().hide(),n.text.show(),$("#user_activity, #mail__members_cnt").show(),i.talk_id&&i.users&&!t?i.users[e.user]=0:delete T.typings[i.key]),T.typingMonitor(!0)},typingMonitor:function(e){var a,r;if(!e&&T.typing.interval)for(a in clearInterval(T.typing.interval),T.typing.interval=null,T.typings)T.setTyping(T.typings[a],!1,!0);!e||T.typing.interval||$.isEmptyObject(T.typings)||(r=["&nbsp;&nbsp;&nbsp;",".&nbsp;&nbsp;","..&nbsp;","..."],T.typing.interval=setInterval(function(){var e,t,a,n,s,i,o,c;for(a in T.typing.cnt>=r.length&&(T.typing.cnt=0),e=0,t=Date.now(),T.typings)if(++e,n=T.typings[a],t-n.time>g)n.users=null,T.setTyping(n,!1,!0);else if(i=!!(s=T.typingPlace(n)).typing.data("cl"),0<s.typing.length){if(o="",c=[],$.each(n.users,function(e,a){t-a<=g&&c.push("<strong>"+e+"</strong>")}),!c.length)continue;o=1<c.length?L("{0} и {1} печатают",c.slice(0,-1).join(", "),c.slice(-1).join("")):L("<strong>{0}</strong> печатает",c[0]),i?s.typing.show().html('<div class="mail__typing"><span class="ico_mail ico_mail_write"></span> '+o+r[T.typing.cnt]+"</div>"):($("#user_activity, #mail__members_cnt").hide(),s.typing.show().html('<span class="ico_mail ico_mail_write"></span> '+o+r[T.typing.cnt])),s.text.hide()}++T.typing.cnt,e||T.typingMonitor(!1)},"desktop"==Device.type?200:333))},replyMessage:function(t){var e=t.list,a={CK:null,Message:t.message,Contact:t.contact,List:e};Spaces.api("neoapi/mail.getReplyMessage",a,function(e){if(0!=e.code)Spaces.showApiError(e);else{var a='<span class="ico ico_close_btn block-btn js-delete_reply" title="Удалить"></span>'+e.message+'<input type="hidden" name="Reply" value="'+t.message+'" />';$("#reply_message").html(a).show(),$("#textarea").focus()}})},swapMessages:function(t){t.messages.length,t.garbage;var e=t.page,a=t.list,n=w.onPage*e-1,s={CK:null,Garbage:t.garbage,MeSsages:t.messages,Contact:t.contact,List:a};1==$("#messages_list .mail__dialog_wrapper").length?s.P=e:(s.O=n,s.L=1),s.Pag=1,$("#mail_pagination").is(":empty")||(s.Ml=1),Spaces.api("neoapi/mail.swapMessages",s,function(e){if(0!=e.code)Spaces.showApiError(e);else{var a=t.garbage?L("Сообщение успешно перенесено в Корзину."):L("Сообщение успешно восстановлено из Корзины.");T.callbackAction(a,"message",t.messages,e)}})},eraseMessages:function(t){var n=t.messages.length,e=t.page,a=t.list,s=w.onPage*e-1,i={CK:null,Contact:t.contact,MeSsages:t.messages,List:a};1==$("#messages_list .mail__dialog_wrapper").length?i.P=e:(i.O=s,i.L=1),i.Pag=1,$("#mail_pagination").is(":empty")||(i.Ml=1),Spaces.api("neoapi/mail.eraseMessages",i,function(e){if(0!=e.code)Spaces.showApiError(e);else{var a=1<n?L("Сообщения удалены из корзины"):L("Сообщение удалено из корзины");T.callbackAction(a,"message",t.messages,e)}})},resetMailEventsCnt:function(){Spaces.notifications.updateCounter(Notifications.COUNTER.MAIL,0),Spaces.api("neoapi/mail.resetMailEventsCnt",{},function(){})},showMsg:function(e){Spaces.notifications.showNotification(e,"info")},clearUndo:function(){$(".js-mail_contact_undo").parent().find(".js-notif_close").click()}},I={deinit:function(){t=!1,page_loader.off("requeststart","mail"),page_loader.off("requestend","mail"),HistoryManager.remove("mail"),pushstream.off("mail"),T.typingMonitor(!1),T.send_typing={},w.contactId=0,I.resetMsgQueue(!0),I.setManualRefresh(!1)},init:function(){if(t=!0,h={req:null,time:Date.now(),interval:null},$(document.body),a=$("#MailPage"),M=a.data("place"),w=$("#mail_params").data()||{},a.delegate(".js-message_show","click",function(e){e.preventDefault(),e.stopPropagation();var a=$(this).parents(".js-message_split:first");a.find(".js-message_preview").each(function(){var e=$(this);e.parents(".js-message_split:first")[0]==a[0]&&e.remove()}),a.find(".js-message_full").each(function(){var e=$(this);e.parents(".js-message_split:first")[0]==a[0]&&e.removeClass("hide")}),a.data("id")&&(document.location.hash="#full-"+a.data("id"))}),"messagesSearch"!=M){S=!1,E=0,page_loader.onShutdown("mail",function(){I.deinit()}),page_loader.on("requeststart","mail",function(){f=!0},!0),page_loader.on("requestend","mail",function(e){f=!1,e||setTimeout(function(){t&&I.router({refresh:!0})},1e3)},!0);var e=function(e){I.router({refresh:!0,onSuccess:e.onSuccess,onError:e.onError})};require("search",function(){UniversalSearch.register("mail_messages_search",{length:3,allowEmpty:!0,enter:!0,doSearch:e}),UniversalSearch.register("mail_contacts_search",{length:1,allowEmpty:!0,enter:!0,doSearch:e})}),$("#main").on("counterchange",function(e){if(e.counterType==Notifications.COUNTER.MAIL){var a=w.list,t=I.getQueryVariable("P")||1;Spaces.notifications.isWindowActive()&&(!ge("#loadNewMessages_place_list")||1!=t||a!=C&&a!=A||(0<e.counterValue&&Spaces.api("neoapi/mail.resetMailEventsCnt"),e.counterValue=0))}}).on("focuswindow",function(){0<c.length&&(T.markContactsAsRead({from:"message_list",contacts:c}),c=[]),0<Spaces.notifications.getCounter(Notifications.COUNTER.MAIL)&&T.resetMailEventsCnt()}).on("click",".js-delete_reply",function(e){$("#reply_message").hide().empty()}),I.checkButtons(!1),HistoryManager.replaceState({route:"mail"},null,document.location.href),pushstream.on("connect","mail",function(e){e.first||I.refreshMessages(!0),I.setManualRefresh(!1)}).on("disconnect","mail",function(){pushstream.disabled()||I.setManualRefresh(!0)}).on("message","mail",I.longpollingMessage),I.setManualRefresh(!pushstream.avail()),a.on("click",".mysite-nick",function(e){var a,t,n;w&&w.talkId&&(a=$.trim($(this).text()),(t=$("#textarea")).length&&(e.preventDefault(),n="@"+a+", ",t.val().indexOf(n)<0&&t.val(n+t.val()),t.focus()))}),a.on("mailCheckboxChange",function(e){I.checkBoxesChecker()}),a.delegate(".pgn [data-p]","click",function(e){e.preventDefault();var a=new Url($(this).attr("href"),!0);I.goTo(a.url(),!1)}),a.delegate(".pgn form","submit",function(e){e.preventDefault();var a=$(this),t=a.attr("action")+"&P="+a.find("input.pgn__search_input").val();I.goTo(t,!1)}),a.delegate('[name="spam_contacts"]',"click",function(){return 0<l.length&&T.spamContacts({contacts:l,spam:1,spinner:$(this).find(".ico_mail"),page:I.getQueryVariable("P")||1,list:w.list}),!1}),a.delegate('[name="from_spam_contacts"]',"click",function(){return 0<l.length&&T.spamContacts({contacts:l,spam:0,spinner:$(this).find(".ico_mail"),page:I.getQueryVariable("P")||1,list:w.list}),!1}),a.delegate('[name="delete_contacts"]',"click",function(){return 0<l.length&&T.swapContacts({contacts:l,garbage:1,spinner:$(this).find(".js-ico"),page:I.getQueryVariable("P")||1,list:w.list}),!1}),a.delegate('[name="restore_contacts"]',"click",function(){return 0<l.length&&T.swapContacts({contacts:l,garbage:0,spinner:$(this).find(".ico_mail"),page:I.getQueryVariable("P")||1,list:w.list}),!1}),a.delegate('[name="erase_contacts"]',"click",function(){var e=l.length,a=$("#confirm_clear_garbage_list");return 0<e&&(1<e?a.find("div").text(L("Вы уверены, что хотите безвозвратно удалить контакты?")):a.find("div").text(L("Вы уверены, что хотите безвозвратно удалить контакт?")),$("#confirm_clear_garbage").hide(),a.show(),I.scrollDocument()),!1}),a.delegate("#confirm_clear_garbage_list__no","click",function(){return $("#confirm_clear_garbage_list").hide(),!1}),a.delegate("#addSmilesButton2, #categories_toggler_menu a, #smiles_place a, #block_for_smiles a:not(.free), #mail__contacts_buttons .mail__button","click",function(e){e.preventDefault()}),a.delegate("#addSmilesButton","click",function(e){e.stopPropagation(),e.preventDefault()}),a.delegate("#confirm_clear_garbage_list__yes","click",function(){if(0<l.length){var e=$(this);T.eraseContacts({contacts:l,redirect:e.data("list"),page:I.getQueryVariable("P")||1,list:w.list})}return $("#confirm_clear_garbage_list").hide(),!1}),a.delegate("#clear_garbage, #erase_contact_from_garbage","click",function(){return $("#confirm_clear_garbage_list").hide(),$("#confirm_clear_garbage").show(),I.scrollDocument(),!1}),a.delegate('a[data-action="clear_garbage"]',"click",function(){var e,a={};return 0<$("#phone_nums").length&&(a.phone_nums=$("#phone_nums").val()),a.CK=null,a.redirect=$(this).data("list"),T.clearGarbage(a),(e=$("#clear_garbage_tools")).find(".js-replace_link").removeClass("link_active"),e.find(".js-replace_widget").addClass("hide"),!1}),a.action("mail_message_erase",function(){var e={},a=$(this).parent().parent();return a.hasClass("in_action")||(0<$("#phone_nums").length&&(e.phone_nums=$("#phone_nums").val()),e.CK=null,l=[a.data("message")],e.page=I.getQueryVariable("P")||1,e.list=w.list,e.messages=l,e.contact=a.data("contact"),a.addClass("in_action"),T.eraseMessages(e)),!1}),a.action("mail_message_delete mail_message_restore",function(e){e.preventDefault();var a=$(this),t=a.parent().parent();T.swapMessages({el:a,silent:!!a.data("silent"),contact:t.data("contact")||a.data("contact"),messages:t.data("message")||a.data("message"),page:I.getQueryVariable("P")||1,list:w.list,garbage:"mail_message_delete"==e.linkAction})}),a.action("mail_message_fav mail_message_unfav",function(e){e.preventDefault();var a=$(this).parent().parent(),t=w.list;T.favMessages({contact:a.data("contact"),messages:a.data("message"),fav:"mail_message_fav"==e.linkAction,list:t,page:I.getQueryVariable("P")||1,el:$(this)})}),a.action("mail_reply",function(e){e.preventDefault();var a=$(this).parent().parent(),t=w.list;T.replyMessage({contact:a.data("contact"),message:a.data("message"),list:t,el:$(this)})}),$("body").delegate(".js-mail_contact_undo","click.oneRequest",function(){var e=$(this),a=e.data("action"),t=!e.data("state"),n={contacts:(""+e.data("ids")).split(","),page:I.getQueryVariable("P")||1,list:w.list,undo:1};return e.find(".js-spinner").removeClass("hide"),"swap"==a?(n.garbage=t,T.swapContacts(n)):"spam"==a?(n.spam=t,T.spamContacts(n)):"archive"==a&&(n.archive=t,T.archiveContacts(n)),!1}),a.delegate('[name="archive_contacts"]',"click",function(){return 0<l.length&&T.archiveContacts({contacts:l,archive:1,spinner:$(this).find(".ico_mail"),page:I.getQueryVariable("P")||1,list:w.list}),!1}),a.delegate('[name="from_archive_contacts"]',"click",function(){return 0<l.length&&T.archiveContacts({contacts:l,archive:0,spinner:$(this).find(".ico_mail"),page:I.getQueryVariable("P")||1,list:w.list}),!1}),a.on("inputError inputErrorHide","#textarea",function(e){$("#messages_list").css({paddingTop:"inputErrorHide"==e.type?"":"18px"})}),a.delegate("#mainSubmitInMessagesList","click",function(e){var a,t,n,s,i,o,c,r,l,g,p,d,m=$(this),_=$("#textarea"),u=$(".js-groups_list:first"),h=u.find(".text-input:first"),f=u.find(".s-property"),v=$("input[name=captcha_code]"),y=$(this).parents("form"),C=!ge("#messages_list");if(C||e.preventDefault(),!m.attr("disabled")){if(Spaces.view.setInputError(_,!1),Spaces.view.setInputError(h,!1),a=AttachSelector.instance(y),t=$.trim(_.val()),n=AttachSelector.getAttaches(y,!0),s=$.trim(h.val()),i="",o=function(e){S=e,a&&a.lock(e),e?($("#mainSubmitInMessagesList").attr("disabled","disabled").css("opacity","0.4").find(".js-btn_val").text(L("Отправка")),_.attr("readonly","readonly")):($("#mainSubmitInMessagesList").removeAttr("disabled").css("opacity","1").find(".js-btn_val").text(L("Отправить")),_.removeAttr("readonly").removeAttr("disabled").trigger("hidebb"))},0<v.length&&(i=v.val()),r=_.data("maxlength"),t.length||!(0<!n.length)||a&&a.getTmpCnt()||$("#mail_share").length?t.length>_.data("maxlength")&&(c=L("Сообщение не должно быть больше {0} {1}.",r,numeral(r,[L("символа"),L("символов"),L("символов")]))):c=L("Сообщение не должно быть пустым."),l=!1,c&&("desktop"==Device.type&&_.focus(),Spaces.view.setInputError(_,c),l=!0),!h.length||f.length||l||s.length||(h.focus(),l=!0),l)e.preventDefault();else{if(C)return void tick(function(){o(!0)});if(1!=(g=I.getQueryVariable("P")||1)&&$("#sendMessageLoader").show(),o(!0),AttachSelector.isBusy())return _.attr("disabled","disabled"),void AttachSelector.onDone(function(){o(!1),m.removeAttr("disabled").click()});p={message:(a=AttachSelector.instance(_))?a.stripUrls(t):t},s&&(p.user=s),p.image_code=i,p.from="messageList",p.contact=w.contactId,p.att=n,0<(d=$("input[name=Reply]")).length&&(p.reply=d.val()),T.sendMessage(p,function(e){a&&!a.ok()||(o(!1),e&&0==e.code&&(E=Date.now(),_.val("").trigger("change").trigger("blur"),$("#attaches_list").hide().empty(),$("#reply_message").hide().empty(),$("#captcha").empty()),e&&0==e.code&&"sendMessageForm"!=M&&(w.list==b?Spaces.redirect(window.location.href):1==g?("pagination"in e&&(e.pagination?$("#mail_pagination").html(e.pagination):$("#mail_pagination").empty()),ge("#m"+e.message.nid)||($("#messages_list").prepend(e.message_widget).first(),I.messagesLengthChecker())):$('#mail_pagination [data-p="1"]').click(),GALLERY.addPhoto()))})}l||"desktop"!=Device.type||_.focus()}}),a.delegate("#loadNewMessages","click",function(e){e.preventDefault(),v=0;var a=$(this).data("url")+"&salt="+I.randomNumber();$("#loadNewMessages_place").empty(),I.goTo(a,!1)}),a.on("onNewAttaches",function(e,a){var t,n;if(w.contactId){for(t={Contact:w.contactId,Move:1,atT:[],CK:null},n=0;n<a.attaches.length;++n)t.atT.push(a.attaches[n].nid+"_"+a.attaches[n].type);Spaces.api("neoapi/mail.moveTempContactAtt",t,function(e){0!=e.code?(Spaces.showApiError(e),a.callback(!1)):a.callback(e.new_attaches)},{onError:function(){a.callback(!1)}})}}),a.on("onDeleteAttach",function(e,a){w.contactId&&Spaces.api("neoapi/mail.moveTempContactAtt",{CK:null,Contact:w.contactId,Move:0,atT:a.file.nid+"_"+a.file.type},function(e){0!=e.code&&Spaces.showApiError(e)})}),a.delegate(".delete_temp_link","click",function(){$("#"+$(this).data("deleteid")).remove()}),T.monitorTextareaTyping(),I.fullMessageCheck()}},fullMessageCheck:function(){var e=document.location.hash.match(/#full-(m[\d\.]+)/i);e&&$("#"+e[1]+" .js-message_show").click()},goTo:function(e,a){if(e){var t=window.location.href;HistoryManager.pushState({route:"mail"},null,e),window.location.href!=t?I.router(a):Spaces.redirect(e)}else I.router(a)},messagesLengthChecker:function(){var e,a=$("#messages_list .mail__dialog_wrapper").length;if(a>w.onPage)for(e=a-w.onPage;0!=e;)$("#messages_list .mail__dialog_wrapper").last().remove(),e-=1},contactsLengthChecker:function(){var e,a=$(".contact_item").length;if(a>w.contactsOnPage)for(e=a-w.contactsOnPage;0!=e;)$(".contact_item").last().remove(),e-=1},longpollingMessage:function(e){var a,t,n,s,i,o,c,r,l,g,p,d,m,_,u;f||(a=!!ge("#messages_list"),t=!!ge("#textarea"),!w.search&&a&&(e.act==Spaces.LongPollingTypes.MAIL_TALK_MEMBER_ADD&&!t||e.act==Spaces.LongPollingTypes.MAIL_TALK_MEMBER_DELETE&&t||e.act==Spaces.LongPollingTypes.MAIL_TALK_MEMBER_RETURN&&!t||e.act==Spaces.LongPollingTypes.MAIL_TALK_MEMBER_LEAVE&&t)&&w.talkId==e.data.talk_id?Spaces.redirect():(n=w.list,s=I.getQueryVariable("Link_id")||0,i=I.getQueryVariable("Contact"),o=I.getQueryVariable("P")||1,I.getQueryWord("contact_list"),I.getQueryWord("message_list"),e.act!=Spaces.LongPollingTypes.MAIL_MESSAGE_RECEIVE&&e.act!=Spaces.LongPollingTypes.MAIL_MESSAGE_SEND||T.setTyping({id:e.data.contact.nid,talk_id:e.data.contact.talk_id,user:e.data.contact.user},!1),e.act==Spaces.LongPollingTypes.MAIL_MESSAGE_SEND&&e.data.hash==y||(e.act==Spaces.LongPollingTypes.MAIL_MESSAGE_RECEIVE&&e.data.new_cnt&&(c=$("#mail__lists_links a")[0],$(c).find(".cnt").html(e.data.new_cnt)),e.act==Spaces.LongPollingTypes.MAIL_MESSAGE_SEND&&e.data.pagination_widget&&$("#mail_pagination").html(e.data.pagination_widget),e.act==Spaces.LongPollingTypes.MAIL_TYPING&&(e.talk_id&&e.user==Spaces.params.name||T.setTyping({id:e.contact_id,talk_id:e.talk_id,user:e.user},!0)),e.act==Spaces.LongPollingTypes.MAIL_CONTACT_READ&&(r=function(){var e=$("#mail__tabs .js-tab_cnt"),a=Math.max(0,e.text()-1);e.text(a).toggle(0<a)},i=$("#contact_"+e.data.nid),n==A?i.length&&(i.remove(),l=I.getApiParams(),g=$("#contacts_wrapper .contact_item").length,d=(p=$("#mail_pagination .pgn")).data("page")||1,m=p.data("total")||1,1<d&&d==m&&!g?((_=new Url(location.href)).query.P=d-1,I.goTo(_.url())):d!=m?(delete l.P,l.O=w.contactsOnPage*d-1,l.L=w.contactsOnPage-g,l.Pag=1,r(),T.callbackAction("","contact",[],{},{noscroll:!0}),h.interval||h.req||(h.req=Spaces.api("neoapi/mail.getContacts",l,function(e){h.req=null,0==e.code?T.callbackAction("","contact",e.contacts,e,{noscroll:!0}):I.router({refresh:!0})},{onError:function(){h.req=null,I.router({refresh:!0})}}))):(r(),T.callbackAction("","contact",[],{},{noscroll:!0}))):(e.data.nid==w.contactId&&ge("#messages_list")&&$(".mail__dialog_unread").each(function(){$(this).removeClass("mail__dialog_unread")}),i.length?((u=i.find(".js-mail_body")).hasClass(P.unread)&&(r(),u.removeClass(P.unread).addClass(P.old)),i.find(".mail__new_msg_bg").removeClass("mail__new_msg_bg"),i.find(".mail__notify").remove(),$("#full_message_"+e.data.nid).removeClass("m_my_not_read")):r())),0<$("#loadNewMessages_place_list").length?e.act!=Spaces.LongPollingTypes.MAIL_MESSAGE_RECEIVE&&e.act!=Spaces.LongPollingTypes.MAIL_MESSAGE_SEND||1!=o||n!=C&&n!=A||(n==A&&e.act==Spaces.LongPollingTypes.MAIL_MESSAGE_SEND?I.router({refresh:!0}):tick(function(){T.getContactsByIds({List:n,Link_id:s,contacts:e.data.contact.nid})})):w.search||e.act!=Spaces.LongPollingTypes.MAIL_MESSAGE_RECEIVE&&e.act!=Spaces.LongPollingTypes.MAIL_MESSAGE_SEND||e.data.contact.nid!=w.contactId||!ge("#messages_list")||(n!=C&&n!=k&&n!=C||1!=o?n==b&&1==o?I.router({refresh:!0}):e.act!=Spaces.LongPollingTypes.MAIL_MESSAGE_SEND&&(v+=1,_="/mail/?r=mail/message_list&Contact="+e.data.contact.nid+"&Link_id="+s+"&List="+n+"&P=1",$("#loadNewMessages_place").html(D.loadNewMessages({url:_}))):(I.getMessageDelayed({mid:e.data.nid,cid:e.data.contact.nid,Link_id:s,new_page:e.data.new_page,received:e.act==Spaces.LongPollingTypes.MAIL_MESSAGE_RECEIVE}),v=0)))))},refreshMessages:function(e){h.interval&&!h.req&&(e||Date.now()-h.time>=i)&&1==(I.getQueryVariable("P")||1)&&(w.contactId&&ge("#messages_list")||ge("#loadNewMessages_place_list"))&&I.router({refresh:!0})},setManualRefresh:function(e){var a=this;w.search||!e!=!h.interval&&(h.interval&&(clearInterval(h.interval),h.interval=null),e&&(h.interval=setInterval(function(){a.refreshMessages()},i/4),h.time=Date.now()))},markAsRead:function(){Spaces.notifications.isWindowActive()?T.markContactsAsRead({from:"message_list",contacts:[w.contactId]}):c.push(w.contactId)},getMessageDelayed:function(s){if($("#m"+s.mid).length)s.received&&I.markAsRead();else if(d.ids.length||(d.start=Date.now()),d.ids.push(s.mid),s.new_page&&(d.new_page=!0),s.received&&(d.has_unread=!0),!d.request){var e=d.ids;d.ids=[],d.request=Spaces.api("neoapi/mail.getMessagesByIds",{Contact:s.cid,MeSsages:e,List:s.list,Pag:d.new_page?1:0},function(e){var a,t,n;if(d.has_unread&&I.markAsRead(),0==e.code){for(t in d.request=!1,a=$("#messages_list"),e.messages)ge("#m"+s.mid)||(n=a.prepend(e.messages[t]).children().first(),Spaces.prepareLinks(n,{link_id:s.Link_id}));e.pagination&&$("#mail_pagination").html(e.pagination),I.messagesLengthChecker(),GALLERY.addPhoto()}else console.error(Spaces.services.processingCodes(e),e),I.resetMsgQueue(),I.router({refresh:!0})},{onError:function(e){console.log(e),d.has_unread&&I.markAsRead(),I.resetMsgQueue(),I.router({refresh:!0})}})}},resetMsgQueue:function(e){d.request&&e&&Spaces.cancelApi(d.request),d.request=!1,d.ids=[],d.new_page=!1,d.has_unread=!1},checkBoxesChecker:function(){l=[],$("input.mail_chb:checked").each(function(){var e=$(this).data("id");l.push(e),o[e]=!0}),I.checkButtons(0<l.length)},restoreCheckBoxes:function(){l&&l.length&&$("input.mail_chb").each(function(){var e=$(this),a=e.data("id");!this.checked&&o[a]&&e.parent().click()})},checkButtons:function(e){var a,t=$("#mail__contacts_buttons button");for(a=0;a<t.length;a++)e?$(t[a]).removeClass("disabled"):$(t[a]).addClass("disabled")},getQueryVariable:function(e){var a=Url.parseQuery(location.search.substr(1));return e in a&&a[e]},getQueryWord:function(e){return-1!=document.location.search.substring(1).search(e)},randomNumber:function(){return Math.floor(1e4*Math.random())+1},scrollDocument:function(e){if(e){var a=$(e).position().top;$("html, body").animate({scrollTop:a+"px"})}else $("html, body").scrollTop(0)},getApiParams:function(e){var a=I.getRouterParams();return{q:a.q.length?a.q:undefined,Contact:a.contact,List:a.list,P:a.P}},getRouterParams:function(e){var a=new Url(location.href).query;return a.P=a.P||1,a.list=w.list,a.contact=a.Contact,a.contact?a.q=$.trim($("#mail_messages_search .js-search__input").val()||""):a.q=$.trim($("#mail_contacts_search .js-search__input").val()||""),a},router:function(e){var a;if(!(e=e||{}).refresh){if(page_loader._trigger("mailrequeststart"),new Url(HistoryManager.cur_url),new Url(HistoryManager.old_url),e.fromHistory&&Url.onlyHashChanged(HistoryManager.cur_url,HistoryManager.old_url))return void page_loader._trigger("mailrequestend");I.resetMsgQueue(!0),T.typingMonitor(!1),Spaces.checkOnline()}Loader.loaded("music",function(){MusicPlayer.reset()}),Loader.loaded("video_player",function(){VideoPlayer.destroyAll()}),S=!1,v=E=0,l=[],(a=I.getRouterParams()).contact?T.getMessages(a,e):T.searchContacts(a,e),e.refresh||page_loader._trigger("mailrequestend")},freeBr:function(e){return $.trim(e).replace(/\<br \/\>/g," ").replace(/\<br\>/g," ").replace(/\<br\/\>/g," ")}},D={contact_search_list:function(e,a){var t=e.q,n=e.contacts,s=$("#mail__tabs, #mail_pagination, #mail__lists_links, #mail__settings_link, #mail__contacts_buttons"),i=$("#contacts_wrapper"),o=$("#mail__search_pagination");0<t.length?(s.hide(),o.html(e.pagination||"")):(s.show(),o.empty(),$("#mail_pagination").html(e.pagination||"")),0<n.length?i.html(n.join("")):i.html('<div class="content-bl"> '+(0<t.length?L("Контакты не найдены"):L("Список контактов пуст"))+"</div>"),t.length||I.restoreCheckBoxes(),a.settings&&a.settings.refresh||I.scrollDocument()},add_contacts:function(e){var a=e.contacts,t="";0<$("#mail_contact_empty").length&&($("#mail_contact_empty").remove(),$("#mail__contacts_buttons").show()),t="",$.each(a,function(e,a){a&&($("#contact_"+e).remove(),t+=a)}),$("#contacts_wrapper").prepend(t).trigger("pagechanged"),$("#mail_pagination").html(e.pagination||""),I.restoreCheckBoxes(),I.contactsLengthChecker()},message_list:function(e,a){var t=e.messages,n=$("#messages_list"),s=$(w.search?"#messages_list_search_empty":"#messages_list_empty");n.html(t.join("")),0<t.length?(s.addClass("hide"),n.removeClass("hide")):(s.removeClass("hide"),n.addClass("hide")),$("#mail_pagination").html(e.pagination||""),I.fullMessageCheck(),GALLERY.addPhoto(),a.settings&&a.settings.refresh||I.scrollDocument()},loadNewMessages:function(e){var a='<div class="links-group links-group_short content-bl__sep3 links-group_important" id="loadNewMessages"';return e&&e.url&&(a+=' data-url="'+e.url+'"'),a+='><a class="list-link list-link_single t_center triangle-show triangle-show_top" href="javascript: void();">+ '+v+" "+numeral(v,[L("новое сообщение"),L("новых сообщения"),L("новых сообщений")])+"</a></div>"}};page_loader.ok()&&(I.init(),page_loader.noCache(!0))});
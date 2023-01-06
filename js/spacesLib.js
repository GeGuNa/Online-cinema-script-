function find_var(e,t){var r,_=t.split("."),R=e;if(R)for(r=0;r<_.length;++r)if(!(R=R[_[r]]))return null;return R}define("spaces","init",function(){window.Spaces=window.Spaces||{},function(_,N){var l,E,t,a,e,p=6e4,R=/(\w+)\.(\d+)\.(\d+)/,r=Device.can("sessionStorage"),c=["#nid","#type","gid","content","preview","shareCnt","commentsCnt","download","share","gif","image","commentsLink","#adult","like","reposted","resolution","parent","#extType","#showMotivator"];if(0<=document.cookie.indexOf("scope_leak_test=1"))for(e in _._keys_={},_)_._keys_[e]=1;N.referer=document.referer,N.DEBUG=0<=document.cookie.indexOf("spaces_debug=1"),E={COMMON:{code:0,SUCCESS:0,ERR_NEED_CAPTCHA:1,ERR_UNKNOWN_METHOD:2,ERR_USER_NOT_FOUND:3,ERR_WRONG_CAPTCHA_CODE:4,ERR_EMPTY_MESSAGE:5,ERR_UNKNOWN_ERROR:6,ERR_OFTEN_OPERATION:7,ERR_WRONG_CK:8,ERR_SMS_NOT_SEND:9,ERR_UNKNOWN_ERROR_PLEASE_RETRY:10,ERR_FORBIDDEN:11,ERR_BAD_REQUEST:12,ERR_NEED_CONFIRM_ACTION:13,ERR_USER_IN_YOUR_BLACKLIST:14,ERR_YOU_IN_USER_BLACKLIST:15,ERR_MESSAGE_TOO_LONG:16,ERR_MESSAGE_WITH_UNPAID_STICKERS:17,ERR_GCM:18,ERR_USER_ACT_PHONE_NOT_FOUND:19,ERR_OBJECT_NOT_FOUND:20,ERR_USER_IS_OWNER:21,ERR_COMM_NOT_FOUND:22,ERR_WRONG_EMAIL:23,ERR_WRONG_PHONE:24,ERR_USER_IS_BLOCKED:25,ERR_USER_IS_FROZEN:26,ERR_APP_NOT_FOUND:27,ERR_WML:28,ERR_ADULT_CONTENT:29,ERR_SPAM_CONTROL:30,ERR_WRONG_OWNER:31,ERR_NOT_ENOUGH_KARMA:32,ERR_SMALL_RATE:33,ERR_URL_NOT_FOUND:34,ERR_YOU_ARE_BANNED:35,ERR_CANCEL_CAPTCHA:9999},AUTH:{code:1,ERR_AUTH_REQUIRED:1001,ERR_EMPTY_LOGIN_OR_PASSWORD:1002,ERR_WRONG_LOGIN_OR_PASSWORD:1003,ERR_SESSION_NOT_FOUND:1004,ERR_USER_MODEL_NOT_CONSTRUCTED:1005,ERR_AUTH_ERROR:1006,ERR_ALREADY_LOGGED_IN:1007,ERR_ACTIVATION_REQUIRED:1008},MAIL:{code:2,ERR_CONTACT_NOT_FOUND:2001,ERR_MESSAGE_ERROR:2002,ERR_SPAM_CONTROL:2003,ERR_ADMIN_SEND_DENIED:2004,ERR_GARBAGE_IS_CLEARING:2005,ERR_CONTACT_IS_SWAPPING:2006,ERR_MESSAGE_NOT_FOUND:2007,ERR_WRONG_EMAIL_FORMAT:2008,ERR_MESSAGE_SEND_DENIED:2009,ERR_DUP_MESSAGE:2010,ERR_WRONG_PHONE_FORMAT:2011,ERR_TOO_LARGE_ATTACHES_WEIGHT:2012,ERR_SPAMING_INNER_CONTACT:2013,ERR_TALK_NOT_FOUND:2014},REG:{code:3,ERR_WRONG_CONTACT:3001,ERR_CONTACT_ALREADY_USED:3002,ERR_CONTACT_ALREADY_REGISTERED:3003,ERR_IP_LIMIT_EXCEEDED:3004},FRIENDS:{code:4,ERR_HIS_LIMIT_EXCEEDED:4001,ERR_YOUR_LIMIT_EXCEEDED:4002,ERR_OFFER_EXISTS:4003,ERR_ALREADY_FRIENDS:4004,ERR_OFFER_BLOCKED:4005,ERR_FRIEND_NOT_FOUND:4006,ERR_PENDING_NOT_FOUND:4007,ERR_FROM:4008,ERR_EMAIL_USED:4009,ERR_INVITE_EXISTS:4010},CHAT:{code:5,ERR_ATTACH_SEND_DENIED:5001,ERR_ROOM_NOT_FOUND:5002,ERR_CONTACT_DENIED:5003,ERR_BANNED:5004,ERR_NEWBIE:5005,ERR_FORBIDDEN:5006,ERR_SHUTUP:5007,ERR_MESSAGE_PARAMS:5008,ERR_SPAM:5009,ERR_DUP_MESSAGE:5010,ERR_COMPLAIN:5011,ERR_MESSAGE_NOT_FOUND:5012,ERR_USER_ISNT_FRIEND:5013},FORUM:{code:6,ERR_COMMENT_NOT_FOUND:6001,ERR_TOPIC_NOT_FOUND:6002,ERR_FORUM_NOT_FOUND:6003,ERR_FORUM_IN_GARBAGE:6004},TRASH:{code:7,ERR_OBJ_DELETED:7001,ERR_OBJ_RESTORED:7002},VOTING:{code:8,ERR_VOTE_NOT_FOUND:8001},FILES:{code:9,ERR_DIR_ACCESS_DENIED:9001,ERR_FILE_NOT_FOUND:9002,ERR_RESOLUTION_NOT_AVAILABLE:9003,ERR_WRONG_SIZE:9004,ERR_BAD_VIDEO_CONVERTER_KEY:9005,ERR_UPLOAD_ERROR:9006,ERR_WRONG_TYPE:9008,ERR_DIR_NOT_FOUND:9009,ERR_WRONG_TEMP_ID:9010,ERR_STRANGER_FILE:9011,ERR_EDIT:9012,ERR_CANT_LOAD_PIC:9013,ERR_COLLECTION_NOT_FOUND:9015,ERR_YOUR_FILE:9016,ERR_YOUR_COLLECTION:9017},SEARCH:{code:10,ERR_BAD_QUERY:10001},LENTA:{code:11,ERR_SUBSCR_NOT_FOUND:11001,ERR_AUTHOR_IS_PRIVATE_GROUP:11002,ERR_SUBSCR_ALREADY_EXISTS:11003},GIFTS:{code:12,ERR_GIFT_NOT_FOUND:12001},SERVICES:{code:13,ERR_COUNTRY_NOT_FOUND:13001,ERR_REGION_NOT_FOUND:13002,ERR_CITY_NOT_FOUND:13003,ERR_UNIVERSITY_NOT_FOUND:13004,ERR_FACULTY_NOT_FOUND:13005,ERR_MOBILE_BRAND_NOT_FOUND:13006,ERR_GHOST_NOT_FOUND:13007,ERR_GHOST_UNCHANGED:13008},COMPLAINTS:{code:14,ERR_WRONG_TYPE:14001,ERR_WRONG_REASON:14002,ERR_COMPLAIN_DENIED:14003,ERR_COMPLAINTS_EXIST:14004,ERR_TIME_EXCEED:14005,ERR_CNT_EXCEED:14006},BLACKLIST:{code:15,ERR_WRONG_TYPE:15001,ERR_OBJECT_NOT_FOUND:15002,ERR_SPAM_CONTROL:15003},POLLS:{code:16,ERR_POLL_EXIST:16001,ERR_ACCESS_DENIED:16002,ERR_WRONG_OWNER:16003,ERR_WRONG_END_TIME:16004,ERR_WRONG_VARIANT:16005,ERR_VARIANTS_CNT:16006,ERR_POLL_ISNT_VALIDATE:16007,ERR_POLL_NOT_FOUND:16008,ERR_SMALL_RATE:16009,ALREADY_VOTED:16010,ERR_VOTING:16011},ATTACHES:{code:17,ERR_ATTACH_NOT_FOUND:17001,ERR_TYPE_ISNT_SUPPORTED:17002,ERR_PARENT_NOT_FOUND:17003,ERR_ATTACH_ALREADY_EXIST:17004,ERR_WRONG_OWNER:17005,ERR_MAX_COUNT:17006,ERR_CHECK_ATTACH:17007},COMM:{code:18,ERR_BLOCKED:18001,ERR_ACCESS_DENIED:18002},COMMENTS:{code:19,ERR_INVALID:19001,ERR_NOT_FOUND:19002,ERR_EDIT_TIME:19003}},_.Codes=E,a=mkhash([[E.COMMON.ERR_USER_NOT_FOUND,L("Пользователь не найден")],[E.COMMON.ERR_WRONG_CAPTCHA_CODE,L("Неверный код с картинки")],[E.COMMON.ERR_NEED_CAPTCHA,L("Неверный код с картинки")],[E.COMMON.ERR_CANCEL_CAPTCHA,L("Не введён код с картинки, действие отменено.")],[E.COMMON.ERR_EMPTY_MESSAGE,L("Пустое сообщение")],[E.COMMON.ERR_OFTEN_OPERATION,L("Слишком частая операция")],[E.COMMON.ERR_WRONG_CK,L("Очень страншая ошибка! Неправильный CK! Напишите срочно об этом в {0}",'<a href="'+N.config.support.addr+'">'+N.config.support.name+"</a>")],[E.COMMON.ERR_SMS_NOT_SEND,L("SMS не было отправлено")],[E.COMMON.ERR_UNKNOWN_ERROR_PLEASE_RETRY,L("Неизвестная ошибка, повторите")],[E.COMMON.ERR_FORBIDDEN,L("Доступ запрещён")],[E.COMMON.ERR_BAD_REQUEST,L("Дурной запрос")],[E.COMMON.ERR_NEED_CONFIRM_ACTION,L("Нужно подтверждение регистрации")],[E.COMMON.ERR_USER_IN_YOUR_BLACKLIST,L("Пользователь находится в вашем чёрном списке")],[E.COMMON.ERR_YOU_IN_USER_BLACKLIST,L("Вы находитесь в чёрном списке обитателя")],[E.COMMON.ERR_MESSAGE_TOO_LONG,L("Слишком длинное сообщение")],[E.COMMON.ERR_MESSAGE_WITH_UNPAID_STICKERS,L("В сообщении использованы неоплаченные стикеры")],[E.COMMON.ERR_USER_ACT_PHONE_NOT_FOUND,L("Не найден телефон обитателя")],[E.COMMON.ERR_OBJECT_NOT_FOUND,L("Объект не найден")],[E.COMMON.ERR_USER_IS_OWNER,L("Пользователь - владелец объекта")],[E.COMMON.ERR_COMM_NOT_FOUND,L("Сообщество не найдено")],[E.COMMON.ERR_WRONG_EMAIL,L("Неправильный e-mail")],[E.COMMON.ERR_FREQ_LIMITER,L("Слишком частая операция. Подождите немного и попробуйте снова.")],[E.COMMON.ERR_WRONG_PHONE,L("Неправильный номер телефона")],[E.COMMON.ERR_USER_IS_BLOCKED,L("Пользователь заблокирован")],[E.COMMON.ERR_APP_NOT_FOUND,L("Игра не найдена")],[E.COMMON.ERR_USER_IS_FROZEN,L("Пользователь удалён")],[E.COMMON.ERR_YOU_ARE_BANNED,L("Действие недоступно до истечения срока бана")],[E.AUTH.ERR_EMPTY_LOGIN_OR_PASSWORD,L("Пустой логин или пароль")],[E.AUTH.ERR_WRONG_LOGIN_OR_PASSWORD,L("Неверный логин или пароль")],[E.MAIL.ERR_CONTACT_NOT_FOUND,L("Контакт не найден")],[E.MAIL.ERR_SPAM_CONTROL,L("Сработала защита от СПАМа")],[E.MAIL.ERR_ADMIN_SEND_DENIED,L("Извините, но у администрации нет возможности читать все письма обитателей. Мы просто не успеваем это делать.")],[E.MAIL.ERR_GARBAGE_IS_CLEARING,L("Происходит очистка корзины")],[E.MAIL.ERR_CONTACT_IS_SWAPPING,L("Происходит перенос контакта")],[E.MAIL.ERR_MESSAGE_NOT_FOUND,L("Сообщение не найдено")],[E.MAIL.ERR_WRONG_EMAIL_FORMAT,L("Неверный формат E-mail")],[E.MAIL.ERR_DUP_MESSAGE,L("Вы только что отправили такое же сообщение")],[E.MAIL.ERR_WRONG_PHONE_FORMAT,L("Неверный формат телефона")],[E.MAIL.ERR_TOO_LARGE_ATTACHES_WEIGHT,L("Суммарный размер вложений не может превышать 10Мб")],[E.MAIL.ERR_SPAMING_INNER_CONTACT,L("В СПАМ можно отправлять только E-mail контакты.")],[E.FRIENDS.ERR_HIS_LIMIT_EXCEEDED,L("У пользователя превышен лимит на количество друзей.")],[E.FRIENDS.ERR_YOUR_LIMIT_EXCEEDED,L("У вас превышен лимит на количество друзей.")],[E.FRIENDS.ERR_OFFER_EXISTS,L("Вы уже отправили предложение")],[E.FRIENDS.ERR_ALREADY_FRIENDS,L("Вы уже друзья")],[E.FRIENDS.ERR_OFFER_BLOCKED,L("Пользователь установил запрет на предложения дружбы.")],[E.FRIENDS.ERR_FRIEND_NOT_FOUND,L("Пользователь не является другом")],[E.FRIENDS.ERR_PENDING_NOT_FOUND,L("Запрос на предложение дружбы не найден")],[E.FRIENDS.ERR_INVITE_EXISTS,L("Приглашение уже отправлено")],[E.CHAT.ERR_ATTACH_SEND_DENIED,L("Запрет на отправку аттачей")],[E.CHAT.ERR_ROOM_NOT_FOUND,L("Комната не найдена")],[E.CHAT.ERR_CONTACT_DENIED,L("Контакт запрещён")],[E.CHAT.ERR_BANNED,L("Вы забанены")],[E.CHAT.ERR_NEWBIE,L("Вы провели слишком мало времени на сайте")],[E.CHAT.ERR_FORBIDDEN,L("У вас нет доступа к этой комнате")],[E.CHAT.ERR_SHUTUP,L("Вы временно не можете оставлять сообщения в данной комнате")],[E.CHAT.ERR_MESSAGE_PARAMS,L("Неправильные параметры отправки сообщения")],[E.CHAT.ERR_SPAM,L("Зашита от СПАМа! Ссылки на другие ресурсы запрещены!")],[E.CHAT.ERR_DUP_MESSAGE,L("Вы уже добавили такое же сообщение только что")],[E.CHAT.ERR_MESSAGE_NOT_FOUND,L("Сообщение не найдено")],[E.CHAT.ERR_USER_ISNT_FRIEND,L("Один из выбранных пользователей не является вашим другом!")],[E.FORUM.ERR_COMMENT_NOT_FOUND,L("Комментарий не найден")],[E.FORUM.ERR_TOPIC_NOT_FOUND,L("Тема не найдена.")],[E.FORUM.ERR_FORUM_IN_GARBAGE,L("Тема находится в корзине.")],[E.FRIENDS.ERR_FROM,L("Подпись заполнена неверно")],[E.FRIENDS.ERR_EMAIL_USED,L("Почта, на которую отправлено приглашение, уже использована")],[E.TRASH.ERR_OBJ_DELETED,L("Объект уже удалён")],[E.TRASH.ERR_OBJ_RESTORED,L("Объект уже восстановлен")],[E.VOTING.ERR_VOTE_NOT_FOUND,L("Голос не найден")],[E.FILES.ERR_DIR_ACCESS_DENIED,L("Доступ к папке запрещён")],[E.FILES.ERR_FILE_NOT_FOUND,L("Файл не найден")],[E.FILES.ERR_WRONG_SIZE,L("Неправильное значение размера")],[E.FILES.ERR_COLLECTION_NOT_FOUND,L("Коллекция не найдена")],[E.FILES.ERR_CANT_LOAD_PIC,L("Ссылка не содержит поддерживаемых файлов.")],[E.LENTA.ERR_SUBSCR_NOT_FOUND,L("Подписка не найдена")],[E.LENTA.ERR_AUTHOR_IS_PRIVATE_GROUP,L("Автор - секретная группа")],[E.LENTA.ERR_SUBSCR_ALREADY_EXISTS,L("Подписка уже существует")],[E.GIFTS.ERR_GIFT_NOT_FOUND,L("Подарок не найден")],[E.COMPLAINTS.ERR_WRONG_TYPE,L("Неверный тип")],[E.COMPLAINTS.ERR_WRONG_REASON,L("Неверная причина")],[E.COMPLAINTS.ERR_COMPLAIN_DENIED,L("В течение недели вы не сможете подавать жалобы, так как модераторы решили, что вы подаете необоснованные жалобы")],[E.COMPLAINTS.ERR_COMPLAINTS_EXIST,L("От вас было принято слишком большое кол-во жалоб за короткое время")],[E.BLACKLIST.ERR_WRONG_TYPE,L("Неверный тип объекта, из-за которого пользователь попадает в ЧС")],[E.BLACKLIST.ERR_OBJECT_NOT_FOUND,L("Объект не найден")],[E.SERVICES.ERR_COUNTRY_NOT_FOUND,L("Страна не найдена")],[E.SERVICES.ERR_REGION_NOT_FOUND,L("Регион не найден")],[E.SERVICES.ERR_CITY_NOT_FOUND,L("Город не найден")],[E.SERVICES.ERR_UNIVERSITY_NOT_FOUND,L("Университет не найден")],[E.SERVICES.ERR_FACULTY_NOT_FOUND,L("Факультет не найден")],[E.SERVICES.ERR_MOBILE_BRAND_NOT_FOUND,L("Бренд не найден")],[E.ATTACHES.ERR_ATTACH_NOT_FOUND,L("Файл, который вы прикрепляете, не найден. ")],[E.ATTACHES.ERR_PARENT_NOT_FOUND,L("Топик, к комментарию которого вы прикрепляете файл, был удалён.")],[E.ATTACHES.ERR_WRONG_OWNER,L("Объект, к которому вы прикрепляете файл, был удалён.")],[E.ATTACHES.ERR_MAX_COUNT,L("Превышен лимит аттачей.")],[E.ATTACHES.ERR_CHECK_ATTACH,L("Нет доступа к файлу.")],[E.COMMENTS.ERR_NOT_FOUND,L("Комментарий, на который вы отвечаете, был удалён.")]]),$.extend(N,{api_cache:{},cache:{},global:{},setTimeout:setTimeout,setInterval:setInterval,lastActivity:Date.now(),windowActive:!0,SIDEBAR:{MIN_WIDTH:900},AUTH_ERRORS:{1:L("Дуп сессии"),2:L("Невалидная кука песка"),3:L("Слишком быстрые запросы"),4:L("Ваш аккаунт заблокирован"),5:L("Ошибка XSRF"),6:L("Дубль запроса. "),7:L("Нужны последние цифры номера"),8:L("Нужна капча")},KEYS:{ESC:27,PGDOWN:34,PGUP:33,HOME:36,END:35,UP:38,DOWN:40,RIGHT:39,LEFT:37,ENTER:10,MAC_ENTER:13,ALT:18},PREVIEW:{SIZE_81_80:14},SHOW_PREVIEW_RE:/^(gif|jpg|jpeg|png|bmp|avi|mpg|mp4|m4v|mpeg|asf|wmv|3gp|3gpp|flv|mov|wevm)$/i,LongPollingTypes:{NOTIFICATION_SEND:20,TOP_COUNTER_UPDATE:21,VIDEO_CONVERT:25,REFRESH_WIDGETS:26,COMM_COUNTER_UPDATE:27,SETTINGS:28,BIND_EMAIL_RESULT:29,CHAT_SEND_MESSAGE:32,CHAT_DELETE_MESSAGE:33,MAIL_MESSAGE_RECEIVE:1,MAIL_CONTACT_READ:2,MAIL_CONTACT_SWAP:4,MAIL_CONTACT_ERASE:5,MAIL_CONTACT_ARCHIVE:6,MAIL_CONTACT_SPAM:7,MAIL_CLEAR_GARBAGE:8,MAIL_MESSAGE_FAV:9,MAIL_MESSAGE_SWAP:10,MAIL_MESSAGE_ERASE:11,MAIL_TYPING:24,MAIL_MESSAGE_SEND:18,MAIL_TALK_MEMBER_ADD:36,MAIL_TALK_MEMBER_DELETE:37,MAIL_TALK_MEMBER_LEAVE:38,MAIL_TALK_MEMBER_RETURN:39,LOADED_FILE:34,STATUS_CHANGE:35,COMMENT_ADD:40,COMMENT_DELETE:41,KARMA_CHANGED:42,DEVICE_TYPE_CHANGE:44,LOGOUT:30,UOBJ_RECOMMENDATIONS_UPDATE:45},TYPES:{FILE:5,MUSIC:6,PICTURE:7,FORUM_TOPIC:8,DIARY_TOPIC:9,COMM:10,USER:11,VIDEO:25,COMM_DIARY_TOPIC:49,MAIL_TALK:79,EXTERNAL_VIDEO:82},FILES_LIST:{DIRS:1,FILES:2,NEW_FILES:4,POPULAR_ALLTIME:5,POPUlAR_NOW:6,POPULAR_MONTH:14,FILES_SORT_POPULAR:7,FILES_ALL:23},RENDER_MODE:{PREVIEW:-1,TILE:-4,CAROUSEL:-8},WIDGETS:{HEADER:1,SIDEBAR:2,FOOTER:4,CSS:8,RIGHTBAR:16},SettingsTypes:{SOUND_NOTIFY_BLOCK:1,FORM_SUBMIT_KEY:2,USER_NAME:4,AVATAR:5},LIMIT:{ATTACHES:3},ExternalVideo:{YOUTUBE:1},makeZbs:function(){var e,t;for(e=0;e<4;++e)(t=$("."+N.params.ac+e)).add(t.children("div")).each(function(){var e=$(this);e.attr("force-hidden")||"none"!=e.css("display")||e.attr("style","display: /*"+Date.now()+"*/ block /*"+Date.now()+"*/ !important")})},CK:function(){return N.sid().substr(-4)},init:function(){var t,r;N.params=_.SPACES_PARAMS,"operamini"!=Device.browser&&tick(function(){var e=N.persistModules();0<e.length&&require(e)}),/(spaces_js_debug=1|sandbox=)/i.test(document.cookie)&&(N.onError=function(e,t,r,_){if(!(0<=t.indexOf("yandex.ru"))){var R=e+(t?" at "+(t||"{main}")+(r!==undefined?":"+r+(_!==undefined?":"+_:""):""):"");N.notifications&&N.notifications.showNotification(R,"error",{silent:!0})}}),N.PushStream&&N.params.lp&&(pushstream=N.PushStream.create({host:N.params.lp.host,port:N.params.lp.port}),N.params.lp.ch?(pushstream.addChannel(N.params.lp.ch),$(_).load(function(){setTimeout(function(){pushstream.start()},16)}),t=Date.now(),setTimeout(r=function(){var e=Date.now()-t;e<3e4?setTimeout(r,3e4-e):pushstream.start()},3e4),N.DEBUG&&pushstream.on("message","spaces_debug",function(e){console.debug("[LP]",e)}),pushstream.on("message","spacesLib",function(e){e.act==N.LongPollingTypes.LOGOUT&&e.data.session_ctime==N.params.sid&&pushstream.disable()})):alert(L("Всё пропало! LP ID не пришёл от сервера!"))),"operamini"!=Device.browser&&(require("clock"),N.params.nid&&require("online_status"),"desktop"==Device.type&&require("hot_info")),N.view.sidebar(),$(function(){(N.makeZbs(),N.core.check(!1),"operamini"!=Device.browser)&&($("body").on("click.form_submit",'input[type="submit"], button',function(e){if(this.form)this.form.submit_btn=this;else{var t=$(this).parents("form")[0];t&&((this.form=t).submit_btn=this)}}).on("click",".js-pagenav_toggle",function(e){e.preventDefault();var t=$(this);t.parents(".pgn").find(".table__nums").toggleClass("hide"),t.toggleClass("pgn__button_press"),t.children().toggleClass("pgn__link_hover")}).on("click mouseup",function(){N.lastActivity=Date.now()}).on("blurwindow",function(){N.windowActive=!1}).on("focuswindow",function(){N.windowActive=!0}),"desktop"==Device.type&&require("ctrl_enter"))})},api_req_cnt:0,api_requests:{},cancelApi:function(e){var t=N.api_requests[e];t&&(N.api_requests[e]=!1,t.abort&&t.abort())},api:function(r,e,_,R){var t,E,a,n,i,o,s,c,O;return e=e||{},R=extend({cache:!1,prefix:"api",cacheTime:!1,disableChecks:!1,disableCaptcha:!1,GET:{},_rid:Date.now()+N.api_req_cnt++},R),document.cookie.indexOf("sid=")<0&&(e.sid=N.sid()),0==r.indexOf("/")||0==r.indexOf("http")?t=r:(0<=r.indexOf("/")&&(r=(E=r.split("/",2))[1],R.prefix=E[0]),E=r.split("."),t="/"+R.prefix+"/"+E[0],E.shift(),E.length&&(e.method=E.join(".")),a=R.GET||{},R.cache||(a._=N.api_req_cnt),t+=l.buildQuery(a,"&","?")),e._origin=location.protocol+"//"+location.host,e.CK!==undefined&&null===e.CK&&(e.CK=N.CK()),n=l.buildQuery(e),i=!1,o={method:r,params:e,callback:_,opts:R},s=function(e){if(R.captchaCallback&&R.captchaCallback(),"object"!=typeof e){if("string"==typeof e)try{e=$.parseJSON(e)}catch(t){e=null}if(!e)return void N.defaultAjaxErrorCallback({status:-666},o)}N.api_requests[R._rid]&&(R.cache&&!i&&(N.api_cache[r+"?"+n]={data:e,time:Date.now(),expire:1e3*R.cacheTime}),N.defaultAjaxCallback(e,o)&&(delete N.api_requests[R._rid],_&&_(e,o)))},R.cache&&(c=N.api_cache[r+"?"+n])&&c.data&&(!c.expire||Date.now()-c.time<c.expire)?(i=!0,N.api_requests[R._rid]={},s(c.data),R._rid):(O={},(!N.windowActive||Date.now()-N.lastActivity>p)&&(O["X-Unactive-Tab"]=1),R._response?s(R._response):N.api_requests[R._rid]=$.ajax(t,{method:"POST",headers:{},data:n,headers:O}).success(s).fail(function(e){R.captchaCallback&&R.captchaCallback(),N.defaultAjaxErrorCallback(e,o)}),R._rid)},defaultAjaxCallback:function(r,_){if(r.code!==undefined&&(r.$code=r.code,r.code=parseInt(r.code,10),.5<r.t&&console.warn(_.method+" ("+r.t+" s)\n"+l.buildQuery(_.params))),!_.opts.disableChecks){if(r.code==E.AUTH.ERR_AUTH_REQUIRED)return location.reload(),!1;if(r.code==E.AUTH.ERR_AUTH_ERROR&&3!=r.auth_errror)return 8==r.auth_errror||7==r.auth_errror?page_loader.reload():location.reload(),!1}return _.opts.disableCaptcha||r.code!=E.COMMON.ERR_NEED_CAPTCHA&&r.code!=E.COMMON.ERR_WRONG_CAPTCHA_CODE?(r.css_files&&Loader.loadCSS(r.css_files,!0),!0):(console.log("[captcha] req_id="+_.opts._rid),require("global_captcha",function(){var e;N.api_requests[_.opts._rid]&&(r.code==E.COMMON.ERR_WRONG_CAPTCHA_CODE&&(e=N.apiError(r)),N.view.showCaptcha(_.opts._rid,r.captcha_url,function(e,t){if(N.api_requests[_.opts._rid]){if(!1===e)return _.opts.captchaCallback=!1,_.opts.disableCaptcha=!0,(_.opts._response=r).code=E.COMMON.ERR_CANCEL_CAPTCHA,void N.api(_.method,_.params,_.callback,_.opts);_.opts.captchaCallback=t,_.params.image_code=e,_.params.captcha_code=e,N.api(_.method,_.params,_.callback,_.opts)}},e))}),!1)},defaultAjaxErrorCallback:function(e,t){if(N.api_requests[t.opts._rid]){if(console.log("[API ERROR] "+t.method+": "+e.status),t.opts.retry&&0==e.status)return--t.opts.retry,void setTimeout(function(){N.api(t.method,t.params,t.callback,t.opts)},1e3);delete N.api_requests[t.opts._rid],t.opts.onError&&t.opts.onError(N.getHttpError(e.status))}},apiError:function(e){var t,r,_,R;if(e.http_error)return N.getHttpError(e.http_error);if(e.error)return e.error;if(e.auth_errror&&N.AUTH_ERRORS[e.auth_errror])return N.AUTH_ERRORS[e.auth_errror];if(t=parseInt(e.code,10),a[t])return a[t];switch(t){case E.COMMON.ERR_NOT_ENOUGH_KARMA:return e.message||L("Недостаточно кармы.");case E.COMMON.ERR_WML:case E.COMMON.ERR_UNKNOWN_ERROR:return e.message||L("Неизвестная ошибка");case E.AUTH.ERR_AUTH_ERROR:return N.AUTH_ERRORS[e.auth_errror]||L("Ошибка авторизации #{0}",e.auth_errror);case E.AUTH.ERR_ACTIVATION_REQUIRED:return L("Извините, вы не можете {0}, пока не {2}подтвердите свой аккаунт{3}. Если у вас возникли проблемы с подтверждением аккаунта, обратитесь в {1}.",e.action||"это сделать",'<a href="'+N.config.support.addr+'">'+N.config.support.name+"</a>",'<a href="'+N.getActivationLink()+'">',"</a>");case E.MAIL.ERR_MESSAGE_ERROR:return e.message;case E.MAIL.ERR_MESSAGE_SEND_DENIED:return e.can_write_error.message;case E.FILES.ERR_UPLOAD_ERROR:return e.httpCode?N.getHttpError(e.httpCode):e.errMsg?e.errMsg:L("Ошибка загрузки файла");case E.BLACKLIST.ERR_SPAM_CONTROL:return L("На ваши сообщения поступает много жалоб. <br />К сожалению, вы не можете {0} в течение {1}. Пожалуйста, постарайтесь формулировать свои сообщения в более корректной форме. Пользователи Spaces ценят вежливое общение.",e.action,e.time_left);default:for(r in E)if(_=E[r])for(R in _)if("code"!==R&&+_[R]==+e.code)return r+"."+R+" ("+(e.$code||e.code)+")";return L("Неизвестная ошибка #{0}",e.$code||e.code)}},getHttpError:function(e){switch(e=parseInt(e)){case 501:case 502:case 503:case 504:return L("Внимание! На {0} в данный момент проводятся технические работы!<br />Подождите несколько секунд и повторите попытку. ",N.params.Domain)+(502==e&&ge("#sandbox_indicator")?"<br />("+L("Возможно, перезагрузка песочницы")+")<br />":"");case-666:return L("Неверный ответ API. ");case 500:case 525:return L("Внимание! При выполнении вашего запроса, произошла внутренняя ошибка сервера!<br />Попробуйте сейчас обновить страницу, и, если ошибка повторяется, немедленно сообщите об этом в {0} {1}<br />Опишите подробно, где произошла данная ошибка, в какой момент, и что нужно сделать для того, чтобы повторить данную ошибку. <br />Спасибо вам за помощь в нахождении ошибок на сайте!<br />",N.config.support.what,'<a href="'+N.config.support.addr+'">'+N.config.support.name+"</a>");case-500:return L("Внимание! При выполнении вашего запроса, сервер ответил неожиданным ответом!<br />Попробуйте сейчас обновить страницу, и, если ошибка повторяется, немедленно сообщите об этом в сообществе {0} {1}<br />Опишите подробно, где произошла данная ошибка, в какой момент, и что нужно сделать для того, чтобы повторить данную ошибку. <br />Спасибо вам за помощь в нахождении ошибок на сайте!<br />",N.config.support.what,'<a href="'+N.config.support.addr+'">'+N.config.support.name+"</a>");case 413:return L("Вы ввели слишком много текста. ");case 404:return L("Запрашиваемый URL не найден. ");case 0:return L("Ошибка подключения. Проверьте ваше подключение к интернету. ");default:return L("При выполнении вашего запроса произошла ошибка HTTP: {code}",{code:e})}},clearError:function(e,t){if(e=e||"common_error",t)var r=$("#"+e).fadeOut(600,function(){r.remove()});else $("#"+e).remove()},clearErrors:function(){$("#siteContent").find(".js-alert_message").remove()},showError:function(e,t,r){r=$.extend({type:"alert",close:!0,classes:{alert:"system-message_alert",info:"system-message_service",warn:""},onRetry:!1,hideTimeout:0,scroll:!0},r),t=t||r.id||"common_error",$("#"+t).remove();var _=$(N.templates.notification({classes:r.classes[r.type],text:e,close:r.close,retry:!!r.onRetry}));return _.attr("id",t).find(".js-notif_close").click(function(){return N.clearError(t),!1}),_.find(".js-retry").click(function(e){e.preventDefault(),r.onRetry()}),ge("#Gallery")&&r.gallery?GALLERY.showNotif(e):($("#main_content").prepend(_),r.scroll&&$("html, body").scrollTop(0)),r.hideTimeout&&setTimeout(function(){N.clearError(t,!0)},r.hideTimeout),_},showMsg:function(e,t){return t=$.extend({type:"info"},t),N.showError(e,!1,t)},showApiError:function(e,t,r){return N.showError(N.apiError(e),t,r)},getHumanSize:function(e){return 1073741824<=e?L("{0} Гб",+(e/1024/1024/1024).toFixed(1)):1048576<=e?L("{0} Мб",+(e/1024/1024).toFixed(1)):1024<=e?L("{0} Кб",+(e/1024).toFixed(1)):L("{0} б",e)},getFileType:function(e){return/^(avi|mpg|mp4|m4v|mpeg|asf|wmv|3gp|3gpp|flv|mov|webm|mpe)$/.test(e=((e=e||"")+"").toLowerCase())?N.TYPES.VIDEO:/^(gif|jpg|jpeg|bmp|png)$/.test(e)?N.TYPES.PICTURE:/^(mp3|aac|amr|mp3|midi)$/.test(e)?N.TYPES.MUSIC:N.TYPES.FILE},getFileIcon:function(e){var t,r,_;return e=(e+"").toLowerCase(),(t=N.getFileType(e))==N.TYPES.VIDEO?"video":t==N.TYPES.MUSIC?"mp3":t==N.TYPES.PICTURE?"pic":(r={"txt|doc|docx|pdf|fb2":"txt",apk:"apk",jar:"jar","sis|sisx":"sis","exe|xap|cab":"exe","dmg|ipa":"apple","zip|gz|tar|7z|xz|bz|rar":"zip"},_="bin",$.each(r,function(e,t){if(RegExp("/^("+e+")$/i"))return _=t,!1}),_)},redirect:function(e,t){e!==undefined&&null!==e&&!1!==e||(e=location.href),page_loader.ok()&&page_loader.loadPage({url:e,routerData:t})||location.assign(e)},thumb:function(e,t,r){return e.replace(R,"$1."+t+"."+r)},getActivationLink:function(){return N.prepareLink("/registration/?link_id=::link_id::")},prepareLink:function(e,t){if("string"!=typeof e)return"";t=t||{};var r=N.params.link_id;return e.replace(/::CK::/g,N.CK()).replace(/::sid::/g,"").replace(/::link_id::/gi,t.link_id||r)},prepareLinks:function(e,t){var r,_,R;"length"in e||(e=[e]);for(r=0;r<e.length;++r)for(_=e[r].getElementsByTagName("a"),R=0;R<_.length;++R)_[R].href=N.prepareLink(_[R].href,t)},sid:function(){var e,t=cookie.get("sid");return t||(e=location.search.match(/sid=(\d+)/))&&(t=e[1]),t},persistModules:function(e){if(r){var t=JSON.parse(_.sessionStorage.preload_modules||"[]");return $.inArray(e,t)<0&&e&&(t.push(e),_.sessionStorage.preload_modules=JSON.stringify(t)),t}return[]},registerModuleEvent:function(e,t,r){N["$"+e+":"+t]=r}}),N.view={getFormSubmitter:function(e){var t=$(document.activeElement);return t.length&&e.has(t)&&t.is('input[type="submit"], button')?t:e[0].submit_btn?$(e[0].submit_btn):null},updateAvatars:function(){$(".js-my_avatar img").attr("src",N.params.avatar)},pageNav:{get:function(){return $(".pgn").first()},replace:function(e){return $(".pgn-wrapper").first().empty().append(e)}},pushWidget:function(e,t){var r=t?"widgets_pcontainer":"widgets_container",_=$("#"+r);_.length||(_=$('<div id="'+r+'" class="relative">'),$(t?"#content_wrap_move":"#main").prepend($('<div id="'+r+'_wrap">').append(_))),_.append(e)},sidebar:function(){$(_).on("resize orientationchange",function(){"none"==$("#sidebarOverlay").css("display")&&$("body").hasClass("openSidebar")&&Sidebar.toggle(!1)})},hasInputError:function(e,t){var r=e.parents(".js-input_error_wrap").last();return r.length||(r=e.parent().parent()),r.hasClass("error__item")},setInputError:function(e,t){var r,_=e.parents(".js-input_error_wrap").last(),R=_.find(".js-input_error:first");_.length||(_=e.parent().parent()),R.length||(R=_.find(".error__msg")),r="error__item "+(_.data("inner")?"content-bl_wrap":"our_error__item")+(_.hasClass("form__item")?" form__item_error":""),!1!==t?(_.hasClass("pdb")&&(_.data("has_pdb",!0),_.removeClass("pdb")),e.hasClass("text-input")&&e.addClass("text-input_error"),_.addClass(r),t?(R.length||(R=$("<div>",{"class":"error__msg js-input_error"}).insertAfter(e.parent())),R.removeClass("hide").html(t)):R.addClass("hide"),e.trigger("inputError",{error:t})):(e.hasClass("text-input")&&e.removeClass("text-input_error"),_.removeClass(r),R.addClass("hide"),_.data("has_pdb")&&_.addClass("pdb"),_.removeData("has_pdb"),e.trigger("inputErrorHide",{error:t})),Loader.loaded("ddmenu")&&N.DdMenu.fixSize()},onlyAuthMotivator:function(){return'<div class="t_center">'+L("Извините, эта функция доступна только зарегистрированным пользователям.")+"<br />"+L("Узнайте все преимущества")+' <a href="/registration/" class="inl-link link-blue">'+L("регистрации")+' <span class="ico ico_arr"></span></a></div>'}},N.PREVIEW_TO_CLASS=mkhash([[N.PREVIEW.SIZE_81_80,"s81_80"]]),N.templates={notification:function(e){return'<div class="js-alert_message nl service-info '+e.classes+'">'+(e.close?'<a href="'+e.close+'" class="tdn right"><span class="ico ico_remove js-notif_close"></span></a>':"")+e.text+(e.retry?' <a href="'+e.close+'" class="tdn nl js-retry">'+L("Повторить")+"</a>":"")+"</div>"}},N.tools={formHidden:function(e,t,r){var _=e.find('input[name="'+t+'"]');null===r?_.remove():_.length?_.val(r):e.append($("<input>",{type:"hidden",name:t,value:r}))}},N.services={processingCodes:function(e){return N.apiError(e)},pageReload:function(e){page_loader.ok()?page_loader.loadPage({url:document.location.href,state:e?null:history.state,history:!1,scroll:!0}):location.reload()}},N.File={getMeta:function(e){var t,r,_,R,E,a,n,i,o,s;if(e instanceof jQuery&&(t=e.findClass("gview_link")).length&&(e=t),(e=e[0]||e)&&(r={el:e,link:e.href},_=e.getAttribute("g"),R=e.getAttribute("d")||"",_)){for(E=_.split("|"),a=0,n=c.length;a<n;++a)i=c[a],o=E[a],"#"==i.substr(0,1)&&(i=i.substr(1),o=+o||0),r[i]=o;return r.gif&&(r.gif=r.download),r.commentsLink||(r.commentsLink=r.link),r.resolution&&(s=r.resolution.split("x"),r.size=[+s[0],+s[1]]),r.description=R,r.partial=!r.preview,r}}},N.core={extractFile:function(e){var t,r={nid:e.data("nid"),type:e.data("type"),weight:e.data("weight"),name:html_wrap(e.data("name")||"unknown.ext"),previewURL:e.find("img").prop("src")};return(t=N.File.getMeta(e))&&(r.nid=t.nid,r.type=t.type,r.preview={URL:t.link,shareCnt:t.shareCnt,group:t.gid,commentCnt:t.commentCnt,downloadLink:t.download,showLink:t.image,previewURL:t.preview}),e.prop("href")&&!r.URL&&(r.URL=e.prop("href")),N.core.fixFile(r)},fixFile:function(e,t,r){var _,R;if(!e.type&&e.preview&&e.preview.type&&(e.type=e.preview.type),e.type||(e.type=t),!e.nid){if(!e.id)return console.error("File without id",e),!1;e.nid=e.id}if(e.filename&&(e.filename=e.filename.replace(/[\r\n]/g," ")),e.type==N.TYPES.EXTERNAL_VIDEO){if(e.fileext="",!e.filename){if(!e.name)return console.error("File without name",e),!1;e.filename=e.name}}else if((!e.filename||!e.fileext)&&e.name)if(e.name=e.name.replace(/[\r\n]/g," "),_=e.name.match(/^(.*?)\.([^\.]+)$/im),e.type!=N.TYPES.MUSIC||_&&_[2]&&/^mp3|aac$/im.test(_[2])){if(!_)return console.error("File without name",e),!1;e.filename=_[1],e.fileext=_[2]}else e.filename=e.name,e.fileext="mp3";return r&&e.preview&&e.thumbLink&&(e.preview.previewURL=e.thumbLink),!e.URL&&e.preview&&e.preview.URL&&(e.URL=e.preview.URL),e.name||(e.name=e.filename+"."+e.fileext),!e.URL&&e.redirect_link&&(e.URL=e.redirect_link),e.URL||((R={})[N.TYPES.MUSIC]="/music/",R[N.TYPES.PICTURE]="/pictures/",R[N.TYPES.FILE]="/files/",R[N.TYPES.VIDEO]="/video/",e.URL=new l(R[e.type]+"?read="+e.nid,!0).url()),e.show_preview=e.preview&&(e.type==N.TYPES.EXTERNAL_VIDEO||e.type==N.TYPES.VIDEO||e.type==N.TYPES.PICTURE||N.SHOW_PREVIEW_RE.test(e.fileext)),e.extType=N.getFileType(e.fileext),e},check:function(){var e=$("#sidebar_wrap").find(".js-my_avatar, .user_avatar");0<e.length&&(N.params.mysite_link=_.mysite_link=e.parents("a").attr("href"),N.params.avatar=e.find("img").attr("src"))}},N.LocalStorage={get:function(e,t){try{if("localStorage"in _&&e in _.localStorage)return _.localStorage[e]}catch(r){}return t},set:function(e,t){try{"localStorage"in _&&(_.localStorage[e]=t)}catch(r){}return this},remove:function(e){try{"localStorage"in _&&_.localStorage.removeItem(e)}catch(t){}return this},support:function(){var e=this,t="spaces_test";return e.supported===undefined&&(e.set(t,t),e.supported=e.get(t,!1)===t,e.remove(t)),e.supported}},l=Class({Constructor:function(e,t){e=e||"",this.parse(e,t)},Static:{controllers:{chat:"main",musicat:"index",files:"main",pictures:"main",video:"main",music:"main"},regexp:/^(([a-z0-9_.-]+\:)?(\/\/([^\/#\?@:]+))?(:\d+)?)?([^\?#]+)?(\?[^#]*)?(#.*)?$/i,onlyHashChanged:function(e,t){return!(!e||!t)&&("string"==typeof e&&(e=new l(e)),"string"==typeof t&&(t=new l(t)),(0<e.hash.length||0<t.hash.length)&&e.isSame(t))},parseQuery:function(e){var t,r,_,R,E,a;for("?"==e.charAt(0)&&(e=e.substr(1)),t={},r=e.split(/&amp;|&|;/),_=0;_<r.length;++_)E=null,-1!=(a=r[_].indexOf("="))?(R=l.decode(r[_].substr(0,a)),E=l.decode(r[_].substr(a+1))):(R=l.decode(r[_]),E=null),R.length&&(t[R]!==undefined?t[R]instanceof Array?t[R].push(E):t[R]=[t[R],E]:t[R]=E);return t},decode:function(e){return decodeURIComponent(e.replace(/%([^a-f0-9]{1,2}|$)/gi,"%25").replace(/\+/g," "))},encode:function(e){return"boolean"==typeof e?e?1:0:encodeURIComponent(e).replace(/%2F/g,"/")},buildQuery:function(e,t,r){var _,R,E=!0,a="";for(_ in t=t||"&",r=r||"",e)if(e[_]!==undefined)if(e[_]instanceof Array)for(R=0;R<e[_].length;++R)a+=(E?r:t)+encodeURIComponent(_)+"="+l.encode(e[_][R]),E&&(E=!1);else a+=(E?r:t)+encodeURIComponent(_)+"="+l.encode(e[_]),E&&(E=!1);return a},serializeForm:function(e,t){var r,_,R,E,a,n=t||{};for(e instanceof jQuery&&(e=e[0]),r=e.elements,"form"!=e.tagName.toLowerCase()&&(r=$(e).find("textarea, input, button, select")),_=0,R=r.length;_<R;++_)a=(E=r[_]).type.toLowerCase(),E.name.length&&("radio"!=a&&"checkbox"!=a||E.checked)&&("submit"!=a||E==e.submit_btn)&&(n[E.name]!==undefined?(n[E.name]instanceof Array||(n[E.name]=[n[E.name]]),n[E.name].push(E.value)):n[E.name]=E.value);return n}},parse:function(e,t){var r=this,_=e.match(l.regexp)||[];return r.scheme=_[2]||"",r.domain=_[4]||"",r.port=_[5]||"",r.path=_[6]||"",r.query=_[7]||"",r.hash=_[8]||"",t&&r._mergeWithCurrent(),r.domain=r.domain.toLowerCase(),r.scheme=r.scheme.substr(0,r.scheme.length-1).toLowerCase(),r.port=r.port.substr(1),r.query=r.query.substr(1),r.hash=r.hash.substr(1),r.query=l.parseQuery(r.query),r},isSame:function(e){return this.url(!0)===e.url(!0)},_mergeWithCurrent:function(){var e=this,t=_.location;return e.scheme.length||(e.scheme=t.protocol,e.domain.length||(e.domain=t.hostname,e.path.length?"/"!=e.path.substr(0,1)&&(e.path=t.pathname+("/"==t.pathname.substr(t.pathname.length-1)?"":"/")+e.path):(e.path=_.location.pathname,e.query.length||(e.query=t.search,e.hash.length||(e.hash=t.hash))))),e},val:function(e){return this.query[e]instanceof Array?this.query[e][0]:this.query[e]},merge:function(e){var t=this;return t.scheme.length||(t.scheme=e.scheme,t.domain.length||(t.domain=e.domain,t.path.length?"/"!=t.path.substr(0,1)&&(t.path=e.path+("/"==e.path.substr(e.path.length-1)?"":"/")+t.path):(t.path=e.path,$.isEmptyObject(t.query)&&(t.query=$.extend({},e.query),t.hash.length||(t.hash=e.hash))))),t},url:function(e){var t=this,r="";return t.scheme.length&&(r+=t.scheme+":"),(t.domain.length||t.port.length)&&(r+="//",t.domain.length&&(r+=t.domain),t.port.length&&(r+=":"+t.port)),t.path.length&&(r+=t.path),$.isEmptyObject(t.query)||(r+=l.buildQuery(t.query,"&","?")),t.hash.length&&!e&&(r+="#"+t.hash),r},toString:function(){return this.url()},clone:function(){return(new l).merge(this)},parseDomain:function(){var e,t={domain:this.domain,sub_domain:"",sub_domains:[],base_domain:""};return(e=this.domain.match(/((.*?)\.|^)([^\.]+\.[^\.]+)$/))&&(e[2]!==undefined&&(t.sub_domain=e[2].toLowerCase(),t.sub_domains=t.sub_domain.split(".")),e[3]!==undefined&&(t.base_domain=e[3].toLowerCase())),t},route:function(){var e,t,r=this,_=r.trimPath(),R="",E="";return _=_.substr(1,_.length-2),r.query.r&&(e=r.query.r.match(/^([\d\w_]+)\/([\d\w_]+)$/))?(R=e[1],E=e[2]):2==(t=_.split("/")).length?(_=t[0],R=l.controllers[_]||_,E=t[1]):3==t.length&&(_=t[0],R=t[1],E=t[2]),{prefix:_,controller:R,action:E,r:R?R+"/"+E:""}},trimPath:function(){var e,t=this;return 0==t.path.length?"/":"/"==(e=t.path.replace(/[\/]+/g,"/"))[e.length-1]?e:e+"/"}}),_.Url=l,t=Class({Static:{instances:{},instance:function(e){return this.instances[e]||(this.instances[e]=new t(e)),this.instances[e]}},Constructor:function(e){this.id=e},start:function(e,t){var r,_,R,E=this,a=N.LocalStorage.support(),n=cookie.enabled();if(E.ipc_interval&&(E.callback&&E.callback(E.sub_id),E.stop()),E.sub_id=t,E.callback=e,r=""+Date.now(),a)_="ipc:singleton:"+E.id,R="ipc:singleton:"+E.id+":alive",N.LocalStorage.set(_,r);else{if(!n)return;_="_"+E.id,cookie.set(_,r)}E.ipc_interval=setInterval(function(){var e=!1;a?(N.LocalStorage.get(R)!=r&&N.LocalStorage.set(R,r),N.LocalStorage.get(_)!=r&&(e=!0)):cookie.get(_)!=r&&(e=!0),e&&(E.callback&&E.callback(E.sub_id),E.stop(t))},1e3)},stop:function(e){var t=this;!t.ipc_interval||e&&t.sub_id!=e||(clearInterval(t.ipc_interval),t.sub_id=t.callback=t.ipc_interval=null)}}),_.IPCSingleton=t,N.init()}(window,Spaces)});
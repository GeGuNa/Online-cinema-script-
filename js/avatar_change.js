define("avatar_change","init",function(){var n,o,a,c,s,r,e=mkhash([[Spaces.TYPES.USER,{api:{edit:"neoapi/anketa.photoEdit",remove:"neoapi/anketa.photoDelete"},params:{photo:"Photo",curPhoto:"avatar",defPhoto:"default_avatar",uplPhoto:"upload_avatar"},ownAvatar:!0,selector:"js-my_avatar",selectorStub:"js-my_avatar_stub",selectorParent:"",avatarType:"user"}],[Spaces.TYPES.COMM,{api:{edit:"neoapi/comm.logoEdit",remove:"neoapi/comm.logoDelete"},params:{photo:"Logo",curPhoto:"logo",defPhoto:"default_logo",uplPhoto:"upload_logo"},dir:0,bind:{Comm:"id"},selector:"js-comm_avatar",selectorStub:"js-my_avatar_stub",selectorParent:"",avatarType:"comm",ownerIdParam:"comm",selectorParams:{only_comm:!0}}],[Spaces.TYPES.MAIL_TALK,{api:{edit:"neoapi/mail.talkAvatarEdit",remove:"neoapi/mail.talkAvatarDelete"},dir:0,params:{photo:"Avatar",curPhoto:"avatar",defPhoto:"default_avatar",uplPhoto:"default_avatar"},bind:{Talk:"id"},selector:"js-talk_avatar",selectorStub:"js-my_avatar_stub",selectorParent:"",avatarType:"mail",ownerIdParam:"talk"}],["unknown",{api:!1,dir:undefined,closeAfterSelect:!0,params:{},selector:"js-picker_picture",selectorStub:"js-picker_picture_stub",selectorParent:"#main ",avatarType:"picker"}]]),i=function(){return'<div class="content-bl"><span class="ico ico_spinner"></span> '+L("Загрузка...")+"</div>"},t={init:function(){var o=this;(n=$("#change_avatar-buttons").data())&&(a=n.type,c=e[a]||e.unknown,$("#change_avatar-buttons").on("onNewAttach",function(a,e){return o.selectAvatar(e.file.nid,e.file.previewURL||e.file.preview.previewURL),!1}).on("AttachSelectorOpen",function(a,e){$(".js-avatar_delete, .js-avatar_crop").toggle(0<n.photo_id),tick(function(){AttachSelector.select(n.photo_id,Spaces.TYPES.PICTURE)})}),$("#main").on("click",".js-avatar_delete",function(a){a.preventDefault(),a.stopPropagation(),AttachSelector.select(0,Spaces.TYPES.PICTURE),o.selectAvatar(!1),AttachSelector.close()}).on("click",".change_avatar_sublink, .change_avatar_link",function(a){var e,t=$(this);t.hasClass("js-attach")||(a.preventDefault(),e={file_type:Spaces.TYPES.PICTURE,form:"#change_avatar-buttons",buttons:"#change_avatar-buttons",allowAlias:!0,fallback:n.fallback?n.fallback:$("#file_selector"),max_files:1,avatar:c.avatarType,only_upload:!!n.photo_disabled,linkDownload:!0,fix_position:-10,"public":!0,attaches:!1,noAutoSelect:!0,dir:c.dir},c.ownerIdParam&&(e[c.ownerIdParam]=n.id),c.selectorParams&&$.extend(e,c.selectorParams),t.addClass("js-attach").data(e),tick(function(){t.click()}))}).on("click",".js-avatar_crop",function(a){var e,t;a.preventDefault(),e=$(this),t=Spaces.DdMenu.current().data("menu_opener"),Spaces.DdMenu.close(),r||(r=new Spaces.DdMenu({data:{scroll:!0,fix_position:-10}})).element().on("dd_menu_opened",function(){e.addClass("disabled").find(".ico").addClass("ico_spinner"),r.content().html(i()),require("avatar_crop",function(){AvatarCrop.setup(r.content(),{image:n.preview,area:n.photo_area,rotate:n.rotate,onAvatarCrop:function(a,e){o.setAvatarLoading(!0),o.setAvatarLoading(!1,a),n.photo_area=e}},function(){e.removeClass("disabled").find(".ico").removeClass("ico_spinner")})})}).on("dd_menu_closed",function(){require("avatar_crop",function(){AvatarCrop.destroy(r.content())})}),r.openAs(t)}),page_loader.on("shutdown","avatar_change",function(){o.destroy()}))},destroy:function(){s&&Spaces.cancelApi(s),this.setAvatarLoading(!1),s=c=n=null,r=null},selectAvatar:function(t,e){var o=this,r={CK:null};r[c.params.photo]=t,c.bind&&each(c.bind,function(a,e){r[e]=n[a]}),$("#change_avatar-file_id").val(t),c.api?(o.setAvatarLoading(!0),s&&Spaces.cancelApi(s),s=Spaces.api(t?c.api.edit:c.api.remove,r,function(a){if(0==a.code){n.preview=a.choose_area,n.photo_id=t,$(".js-avatar_delete, .js-avatar_crop").toggle(0<t),Spaces.DdMenu.fixSize(),o.setAvatarLoading(!1,t?a[c.params.curPhoto]:a[c.params.uplPhoto],t),n.photo_area="",n.rotate=a.rotate;var e=t?a[c.params.curPhoto]:a[c.params.defPhoto];c.ownAvatar?(Spaces.params.avatar=e,Spaces.view.updateAvatars()):$(c.selectorParent+"."+c.selector+" img").prop("src",e),a.dating_error&&Spaces.showMsg(a.dating_error,{type:"warn"}),c.closeAfterSelect&&Spaces.DdMenu.close()}else o.setAvatarLoading(!1),Spaces.showApiError(a)})):($(c.selectorParent+"."+c.selector+" img").each(function(){var a=$(this);a.css({width:a.prop("width"),height:a.prop("height")}),a.prop("src",e)}),o.setAvatarLoading(!0),o.setAvatarLoading(!1,e,t),n.preview=e,n.photo_id=t,n.photo_area="",n.rotate=0,c.closeAfterSelect&&Spaces.DdMenu.close())},setAvatarLoading:function(a,e,t){t=!!t,a?((o=$(".change_avatar_sublink .preview, .change_avatar_link .preview")).data("old_src",o.prop("src")),o.prop("src",ICONS_BASEURL+"preloader.gif")):o&&(o.prop("src",e||o.data("old_src")).removeData("old_src"),o.parents(c.selectorParent+"."+c.selector+", "+c.selectorParent+"."+c.selectorStub).toggleClass(c.selector,t).toggleClass(c.selectorStub,!t),o=null)}};define("avatar_change","onRequest",function(a){$(function(){t.init(a)})})});
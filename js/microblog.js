define("microblog","init",function(){function o(t){e(!!(n.val().length||AttachSelector.isBusy()||AttachSelector.isOpened()||AttachSelector.getAttaches(c.find("form")).length),!1,t)}function e(t,o,e){var n,i;a||c.data("expanded")!=t&&(a=!0,n=$("#microblog_ta"),$("#mainSubmitForm"),n.find(".cntBl").toggleClass("hide",!t),$("#microblog_minimized").toggleClass("hide",!t),$(t?"#microblog_minimized_ta":"#microblog_expanded_ta").append(n),$("#microblog_expanded").toggleClass("hide",t),i=n.find("textarea"),t?(i.attr("rows",i.data("minRows")),o?tick(function(){i.focus(),a=!1}):a=!1):(i.attr("rows",1),a=!1),e&&Spaces.view.setInputError(i,!1),c.data("expanded",t))}var a,n,c;define("microblog","onRequest",function(){a=!1,n=$("#microblog_ta textarea"),c=$(".microblog"),n.on("focus",function(){e(!0,!0)}),$("body").on("click.oneRequest",function(t){$.contains(c[0],t.target)||o(!0)}),$(window).on("text_restore.oneRequest",function(t){o(!1)}),$(function(){o(!1)}),page_loader.on("shutdown","microblog",function(){n=c=null})})});
define("blog_filters","onRequest",function(){$("#main").action("blogs_filter_hide blogs_filter_unhide",function(e){var i,n,o;e.preventDefault(),i=$(this),e.linkAction,n=new Url(i.prop("href")).query,i.hasClass("disabled")||(i.addClass("disabled"),o=function(){i.removeClass("disabled")},Spaces.api("neoapi/blogs.hideChannel",n,function(e){o(),0!=e.code?Spaces.showApiError(e):i.replaceWith(e.new_link)},{onError:function(e){Spaces.showError(e),o()}}))})});
define("avatar_resize","init",function(){function e(){var e=.5*i.height();e<400&&(e=400),$(".js-avatar_resize").css({"max-height":e+"px"})}var i=$(window);i.on("resize",function(){e()}),window.AvatarResize={resize:e}}),define("avatar_resize","onRequest",function(){$(function(){AvatarResize.resize()})});
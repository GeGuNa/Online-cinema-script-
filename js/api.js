define("android/api","init",function(){Device.android_app&&(cookie.get("android_api_test")&&(window.prompt=console.log,window.SpacesApp.params.nativeMusicPlayer=!0),$.extend(window.SpacesApp,{toggleSidebar:function(e){Loader.loaded("sidebar")&&Sidebar.toggle(e)},on:function(e,o){return this["on"+e.substr(0,1).toUpperCase()+e.substr(1)]=o,this},loadPage:function(e){return!(!window.page_loader||!window.page_loader.ok())&&window.page_loader.loadPage({url:e})},exec:function(e,o){return window.prompt(e,JSON.stringify(o||{}))}}))});
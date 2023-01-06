<?

include("../inc/system.php");
include("../inc/funcs.php");
include("../inc/head.php");


if (!isset($usernm)) {
header("Location: /index.php");
exit;
}


$cnts513 = mysql_result(mysql_query("SELECT COUNT(*) FROM `blocklist` where `user` = '".$usernm['user_id']."' AND `time` > '".$_SERVER['REQUEST_TIME']."'"), 0);

$cnts5134 = mysql_result(mysql_query("SELECT COUNT(*) FROM `blocklist` where `user` = '".$usernm['user_id']."' AND `temporarily` = '1'"), 0);

?>



<?


?>




<?
include("../inc/header.php");
?>
  
  
  

<div class="content-wrapper">




<div id="main_content_block"> 
<div class="content_wrap" id="content_wrap_move"> 


<div class="main" id="siteContent"> 

<div id="moder_block"> </div>  

<div class="relative"> <div id="location_header">  <div class="location-bar location-bar_no-break" id="header_path">  <span class="location-bar__item location-bar__item_home"> <a href="/index.php" class="location-bar__home-link ico"></a> <span class="location-bar__sep ico"></span> </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span> <a href="/profile.php?id=<?php echo $usernm['user_id'];?>" id="location_bar_1_0" class=""> 
<span><?php echo show_text($usernm['user_nick']);?></span> 
</a>    <span class="location-bar__sep ico"></span>   </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <span id="location_bar_1_1" class="location-bar__title no_max_width"> <span>Настройки</span> </span>     </span>   </div>  </div> <div id="top_notif_place" class="top_notif_place">    </div> </div> 


<div> 

<div class="oh"></div> 

<div id="main_content">

<div id="main">  

<div class="widgets-group widgets-group_top js-container__block">  <div class="b-title cl b-title_center b-title_first oh">   <div class="b-title__item"> <h6 class="span">Основные настройки</h6> <span class="js-cnt cnt cnt_title hide"></span> </div>  </div>  


  

<div class="content" style="min-height: 0 !important; padding: 0 !important; margin-right: 0 !important;  margin-left: 0 !important; padding-left: 0 !important;  padding-right: 0 !important;">  
<div class="list f-c_fll">         

<a href="#" class="list-link stnd-link_arr    list-link-darkblue c-darkblue">
<span class="t">Изменить пароль</span>      <span class="ico ico_arr ico_m"></span>         
</a>                 

<a href="#" class="list-link stnd-link_arr list-link-darkblue c-darkblue">          
<span class="t">Настройки E-mail</span>     <span class="ico ico_arr ico_m"></span>         
</a>                                    

<a href="#" class="list-link   stnd-link_arr    list-link-darkblue c-darkblue">          <span class="t">Настройки приватности</span>      <span class="ico ico_arr ico_m"></span>         </a>                  

<a href="#" class="list-link   stnd-link_arr    list-link-darkblue c-darkblue">          <span class="t">Настройки почты</span>      <span class="ico ico_arr ico_m"></span>         </a>                  

<a href="/block/" class="list-link   stnd-link_arr    list-link-darkblue c-darkblue">          <span class="t">Чёрный список</span><span class="cnt js-cnt"> <?php echo ($cnts513+$cnts5134); ?></span>      <span class="ico ico_arr ico_m"></span>         </a>

</div>    
</div>
 
<div class="cl"></div> 
</div>   


<div class="widgets-group widgets-group_top js-container__block">  
<div class="b-title cl b-title_center b-title_first oh">   <div class="b-title__item"> <h6 class="span">Настройки интерфейса</h6> <span class="js-cnt cnt cnt_title hide"></span> </div>  </div>  
<div class="content" style="min-height: 0 !important; padding: 0 !important; margin-right: 0 !important;  margin-left: 0 !important; padding-left: 0 !important;  padding-right: 0 !important;">  
<div class="list f-c_fll">          
<a href="#" class="     list-link   stnd-link_arr    list-link-darkblue c-darkblue          ">          <span class="t">Нижняя панель</span>      <span class="ico ico_arr ico_m"></span>         </a>                  
<a href="#" class="     list-link   stnd-link_arr    list-link-darkblue c-darkblue          ">          <span class="t">Стиль панелей</span>      <span class="ico ico_arr ico_m"></span>         </a>                  
<a href="#" class="     list-link   stnd-link_arr    list-link-darkblue c-darkblue          ">          <span class="t">Время</span>      <span class="ico ico_arr ico_m"></span>         </a>                  
<a href="#" class="     list-link   stnd-link_arr    list-link-darkblue c-darkblue          ">          <span class="t">Параметры отображения</span>      <span class="ico ico_arr ico_m"></span>         </a>                  
<a href="#" class="     list-link   stnd-link_arr    list-link-darkblue c-darkblue          ">          <span class="t">Экономия трафика</span>      <span class="ico ico_arr ico_m"></span>         </a>                  
<a href="#" class="     list-link   stnd-link_arr    list-link-darkblue c-darkblue          ">          <span class="t">Настройки формы</span>      <span class="ico ico_arr ico_m"></span>         </a>          

</div>    
</div> 
<div class="cl"></div> 
</div>   





<div class="widgets-group donotblockme"> 

<div class="list f-c_fll">          
 
<a href="#" class="list-link list-link-grey c-grey js-replace_link "> <span class="js-ico  ico ico_exit"></span> <span class="t js-text">Выйти со всех устройств</span>  </a>  
                 
<a href="#" class="list-link list-link-red c-red"> <span class="js-ico  ico ico_delete"></span> <span class="t js-text">Удалить аккаунт</span>  </a>    
      
</div>   
 
</div>   


<a href="#" class="link-return full_link">  <span class="ico ico_arrow-back"></span>   <span class="m">Назад</span>  </a>  

</div>

</div>  

</div> 


</div>




</div> 
   
   
</div>


</div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
<center>

   </center>    </div>
    <strong>Copyright © 2014 <a href="https://Wab.ge">Wab.ge</a></strong>
  </footer>
  
  
  
<div class="control-sidebar-bg"></div>

</div>


<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/jquery.slimscroll.js"></script>
<script src="/js/fastclick.js"></script>
<script src="/js/adminlte.js"></script>
<script src="/js/settings.js"></script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
  });
</script>





<?
include("../inc/foot.php");
?>


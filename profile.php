<?

include("inc/system.php");
include("inc/funcs.php");
include("inc/head.php");


if (!isset($usernm)) {
header("Location: /index.php");
exit;
}

if (!isset($_GET['id'])) {
	header("Location: /");
	exit;
} else if (!is_numeric($_GET['id'])) {
	header("Location: /");
	exit;
} else {
	$info = abs((int)$_GET['id']);
}




$cnt = mysql_result(mysql_query("SELECT COUNT(*) FROM `persons` where `user_id` = $info"), 0);


if ($cnt == 0) {
	header("Location: /");
	exit;
}




$usrname = mysql_fetch_array(mysql_query("SELECT * FROM `persons` where `user_id` = $info"));

$flwus = mysql_result(mysql_query("SELECT COUNT(*) FROM `followers` WHERE `user` = '".$usernm['user_id']."' AND `anke` = '".$usrname['user_id']."'"), 0);

//////////////////

$myblock = mysql_result(mysql_query("SELECT COUNT(*) FROM `blocklist` where 
`user` = '".$usernm['user_id']."' and `anke` = '".$usrname['user_id']."' and `time` > '".$_SERVER['REQUEST_TIME']."' OR `user` = '".$usernm['user_id']."' and `anke` = '".$usrname['user_id']."' and `temporarily` = '1'"), 0);

$meblock = mysql_result(mysql_query("SELECT COUNT(*) FROM `blocklist` where 
`anke` = '".$usernm['user_id']."' and `user` = '".$usrname['user_id']."' and `time` > '".$_SERVER['REQUEST_TIME']."' OR `anke` = '".$usernm['user_id']."' and `user` = '".$usrname['user_id']."' and `temporarily` = '1'"), 0);

//////////////////


if ($usernm['user_id'] !== $usrname['user_id']) {

if (isset($_GET['act']) && $_GET['act'] == 'follow') {

if (mysql_result(mysql_query("SELECT COUNT(*) FROM `followers` WHERE `user` = '".$usernm['user_id']."' AND `anke` = '".$usrname['user_id']."'"), 0) == 0) {
mysql_query("INSERT INTO `followers` (`user`, `anke`,`time`) values('".$usernm['user_id']."', '".$usrname['user_id']."','".$_SERVER['REQUEST_TIME']."')");
header("Location: /profile.php?id=".$usrname['user_id']);
exit;
} else {
header("Location: /profile.php?id=".$usrname['user_id']);
exit;
}

}	



if (isset($_GET['act']) && $_GET['act'] == 'unfollow') {

if (mysql_result(mysql_query("SELECT COUNT(*) FROM `followers` WHERE `user` = '".$usernm['user_id']."' AND `anke` = '".$usrname['user_id']."'"), 0) == 0) {
header("Location: /profile.php?id=".$usrname['user_id']);
exit;
} else {
mysql_query("DELETE FROM `followers` WHERE `user` = '".$usernm['user_id']."' AND `anke` = '".$usrname['user_id']."'");	
header("Location: /profile.php?id=".$usrname['user_id']);
exit;
}

}
	
}



if ($usernm['user_id'] !== $usrname['user_id']) {

if (mysql_result(mysql_query("SELECT COUNT(*) FROM `guest` WHERE `user` = '".$usernm['user_id']."' AND `anke` = '".$usrname['user_id']."'"), 0) == 0) {
mysql_query("INSERT INTO `guest` (`user`, `anke`, `time`, `read`) values('".$usernm['user_id']."', '".$usrname['user_id']."', '".$_SERVER['REQUEST_TIME']."', '0')");
} else {
mysql_query("UPDATE `guest` SET `time` = '".$_SERVER['REQUEST_TIME']."', `read` = '0'  WHERE `user` = '".$usernm['user_id']."' AND `anke` = '".$usrname['user_id']."'");
}	
	
}


?>



<?


?>

<?
include("inc/header.php");
?>

<div class="content-wrapper">


<div id="main_content_block"> 
<div class="content_wrap" id="content_wrap_move"> 


<div class="main" id="siteContent"> 

<div id="moder_block"></div>  





<div class="relative"> 
<div id="location_header">  
<div class="location-bar location-bar_no-break" id="header_path">  
<span class="location-bar__item location-bar__item_home"> <a href="/index.php" class="location-bar__home-link ico"></a> <span class="location-bar__sep ico"></span> </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span> <a href="/profile.php?id=<?php echo $usrname['user_id'];?>" id="location_bar_1_0" class=""> 
<span><?php echo show_text($usrname['user_nick']); ?></span> 
</a>       
</span>
</div>  
</div> <div id="top_notif_place" class="top_notif_place">    </div> 
</div> 






<div> <div class="oh"></div> 


<div id="main_content">  
<div id="main">   


<?php if ($meblock>0){ ?>	

<div class="js-pending-item">    
<div class="widgets-group widgets-group_top"> 

<div class="block-item t_center none_border"> 
<div class="ico_prof ico_noaccess_xlarge main-picture"></div> 
<div class="normal-light">  
 Пользователь   добавил вас в свой        Чёрный список
</div> 
</div>  

</div>       
</div>



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
	<a href="http://statok.net/go/19655"><img src="//statok.net/image/19655" alt="Statok.net"></a>
   <a href="http://firetop.su/go/4951"><img src="http://firetop.su/image/4951" alt="FireTop.su"></a>
   <a href="http://statok.ru/go/210"><img src="http://statok.ru/image/210" alt="statok.ru"></a>
   </center>    
   </div>
    <strong>Copyright © 2019 <a href="https://Wab.ge">Wab.ge</a></strong>
  </footer>
  
  
  
<div class="control-sidebar-bg"></div>

</div>


<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/jquery.slimscroll.js"></script>
<script src="/js/fastclick.js"></script>
<script src="/js/adminlte.js"></script>
<script src="/js/settings.js"></script>

<script src="/js/dd_menu.js"></script>


<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
  });
</script>

<?php 
exit;
} 
?>




<?php if ($myblock>0){ ?>	

<div class="js-pending-item">    
<div class="widgets-group widgets-group_top"> 

<div class="block-item t_center none_border"> 
<div class="ico_prof ico_noaccess_xlarge main-picture"></div> 
<div class="normal-light">  
Пользователь <b></b>  добавлен в ваш      <a href="/block/" class="inl-link">  Чёрный список</a> 
</div> 
</div>  

</div>       
</div>



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
	<a href="http://statok.net/go/19655"><img src="//statok.net/image/19655" alt="Statok.net"></a>
   <a href="http://firetop.su/go/4951"><img src="http://firetop.su/image/4951" alt="FireTop.su"></a>
   <a href="http://statok.ru/go/210"><img src="http://statok.ru/image/210" alt="statok.ru"></a>
   </center>    
   </div>
    <strong>Copyright © 2019 <a href="https://Wab.ge">Wab.ge</a></strong>
  </footer>
  
  
  
<div class="control-sidebar-bg"></div>

</div>


<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/jquery.slimscroll.js"></script>
<script src="/js/fastclick.js"></script>
<script src="/js/adminlte.js"></script>
<script src="/js/settings.js"></script>

<script src="/js/dd_menu.js"></script>


<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
  });
</script>

<?php 
exit;
} 
?>


<div>  

<div class="content-usr">   


<?


$ainfo3 = (length($usrname['user_birth_day'])>0 ? show_text($usrname['user_birth_day']) : null);
$ainfo4 = (length($usrname['user_birth_month'])>0 ? show_text($usrname['user_birth_month']) : null);
$ainfo5 = (length($usrname['user_birth_year'])>0 ? show_text($usrname['user_birth_year']) : null);


if (length($usrname['current_city'])>0) {
	$cityusr = show_text($usrname['current_city']);
} else {
	$cityusr = null;
}


if (length($usrname['user_name'])>0) {
	$nameusr = show_text($usrname['user_name']);
} else {
	$nameusr = null;
}


if (length($usrname['user_surn'])>0) {
	$surnusr = show_text($usrname['user_name']);
} else {
	$surnusr = null;
}

if ($ainfo3 || $ainfo4 || $ainfo5){
	
	if (isset($cityusr)) {
		$asaki = agec($ainfo3,$ainfo4,$ainfo5)." years, $cityusr";
	} else {
		$asaki = agec($ainfo3,$ainfo4,$ainfo5)." years";
	}
	
} else {
	$asaki = null;
}

?>


<div class="list-link__wrap wbg">  
<div class="list-link oh list-link__right-space">   
   
<div class="block-item__avatar block-item__avatar_xlarge">      
<img src="/images/photos/160/<?php echo $usrname['photo_id'];?>"  class="preview s101_100">                
</div>   

<div class="block-item__descr"> 
<div> 
<span class="online-status m"><?php echo onluser($usrname['user_id']); ?></span> 
<span class="block-item__title m break-word"><?php echo show_text($usrname['user_nick']); ?> 
</span>    
</div> 
<div class="block-item__light oh">          
<div class="break-word"> <?php echo $nameusr; ?> <?php echo $surnusr;?> </div>  <?php echo $asaki;?>  <br>          
</div> 
</div>   
   
</div>  
</div>





<? if ($usernm['user_id'] !== $usrname['user_id']) { ?>
<div class="user__tools user__tools_last" style="border-top: 0 !important;">   
<table class="table__wrap"> 
<tbody>
<tr>   

<td class="table__cell" width="33%">       <a href="/message.php?id=<?php echo $usrname['user_id'];?>" class="    stnd-link                 "> <span class="js-ico  ico ico_write "></span> <span class="t js-text">Написать</span> </a>      </td>    

<td class="table__cell" width="33%">  
  
<?php 

if ($flwus == 0) {

?>  
  
<div class="js-lenta_subscr_add js-lenta_subscr_as relative">       <a href="/profile.php?id=<?php echo $usrname['user_id'];?>&act=follow" class="stnd-link js-action_link"> <span class="js-ico  ico ico_read "></span> <span class="t js-text">Follow</span>  </a>      </div> 

<?
} else {
?>

<div class="js-lenta_subscr_delete">       <a href="/profile.php?id=<?php echo $usrname['user_id'];?>&act=unfollow" class="stnd-link list-link-green c-green  js-action_link"> <span class="js-ico  ico ico_read_on "></span> <span class="t js-text">Unfollow</span>  </a>      </div>   

<?
} 
?>


</td>   

<?php


if (isset($nckftch)) {
	
if ($usernm['user_id'] == $usrname['user_id']) {	

?>

<td class="table__cell table__cell_last" width="33%">      <a href="/edit.php" class="    stnd-link                 "> <span class="js-ico  ico ico_settings "></span> <span class="t js-text">Анкета</span></a>     </td>

<?

}

}

?>

</tr>
<tr> 
</tr>
</tbody>
</table>    
</div>  
<? } else { ?>


<div class="user__tools user__tools_last" style="border-top: 0 !important;"> 

<table class="table__wrap horiz_menu"> 
<tbody>
<tr> 

<td class="table__cell" width="33%">      <a href="/followers.php" class="stnd-link"> <span class="js-ico  ico ico_readers "></span> <span class="t js-text">Followers</span>  </a>     </td> 

<td class="table__cell" width="33%">      <a href="/settings/" class="    stnd-link                 "> <span class="js-ico  ico ico_settings "></span> <span class="t js-text">Настройки</span>  </a>     </td> 

<td class="table__cell table__cell_last" width="33%" onclick="dd_menu();"> <a href="#" class="stnd-link js-dd_menu_link" id="more_menu"> <span class="ico ico_more js-ico"></span> Ещё </a> </td> 

</tr> 
</tbody>
</table> 

<div class="user__dropdown-menu dropdown-menu__wrap om_menu js-dd_menu_item js-fix_height" id="more_menu_show" style="display: none;"> 
<div class="widgets-group links-group links-group_grey dropdown-menu"> 
<div class="list f-c_fll">          
<a href="/photo.php" class="stnd-link"> <span class="js-ico  ico ico_photo"></span> <span class="t js-text">Загрузить фото</span>  </a>                  
<a href="/loghist.php" class="stnd-link"> <span class="js-ico  ico ico_history "></span> <span class="t js-text">История входов</span>  </a>                  
<a href="/exit.php" class="stnd-link"> <span class="js-ico  ico ico_exit "></span> <span class="t js-text">Выйти из аккаунта</span>  </a>          
</div>    
</div> 
</div> 

</div>

<? } ?>
      
</div>


</div>   

 
 
<div class="tabs"> 
<table class="table__wrap"> 
<tbody>
<tr>   
<td class="table__cell  tabs__item clicked">  <span class="tabs__link">  Профиль    </span>  </td>  
<td class="table__cell  tabs__item">  <a href="/anketa.php?id=<?php echo $usrname['user_id'];?>" class="tabs__link">  Анкета    </a>  </td>  
</tr> 
</tbody>
</table>        
</div>

<div> 

<div class="widgets-group links-group bb0"> 


<?php


$k_post22 = mysql_result(mysql_query("SELECT COUNT(*) FROM `bookmark` where `user` = '".$usrname['user_id']."'"),0);
$k_post33 = mysql_result(mysql_query("SELECT COUNT(*) FROM `film_comments` where `comment_user` = '".$usrname['user_id']."'"),0);

$k_post44 = mysql_result(mysql_query("SELECT COUNT(*) FROM `followers` where `user` = '".$usrname['user_id']."'"),0);
$k_post55 = mysql_result(mysql_query("SELECT COUNT(*) FROM `history` where `user` = '".$usrname['user_id']."'"),0);



?>
         
<a href="/book.php?id=<?php echo $usrname['user_id'];?>" class="list-link stnd-link_arr list-link-darkblue c-darkblue"> <span class="js-ico  ico ico_fav"></span>    <span class="t js-text">Закладки</span> <span class="cnt js-cnt"><?php echo $k_post22;?></span> <span class="ico ico_arr ico_m"></span></a>   
          
           
<a href="/comments.php?id=<?php echo $usrname['user_id'];?>" class="list-link stnd-link_arr list-link-darkblue c-darkblue"> <span class="js-ico  ico ico_forum "></span>    <span class="t js-text">Комментарии</span>  <span class="cnt js-cnt"><?php echo $k_post33;?></span> <span class="ico ico_arr ico_m"></span></a>                    
                     
<a href="/following.php?id=<?php echo $usrname['user_id'];?>" class="list-link stnd-link_arr list-link-darkblue c-darkblue"> <span class="js-ico  ico ico_readers "></span>    <span class="t js-text">Followings</span> <span class="cnt js-cnt"><?php echo $k_post44;?></span> <span class="ico ico_arr ico_m"></span></a>    

<a href="/whist.php?id=<?php echo $usrname['user_id'];?>" class="list-link stnd-link_arr list-link-darkblue c-darkblue"> <span class="js-ico  ico ico_video "></span>    <span class="t js-text">История просмотров</span> <span class="cnt js-cnt"><?php echo $k_post55;?></span> <span class="ico ico_arr ico_m"></span></a>    
      
</div>   



</div>
 

<div class="btn-single__wrap"> <div class="btn-single__table-wrap dropdown-menu_top">  </div> </div>      

<?php

if (isset($usernm)) {
	
?>

<div class="content-block">        <a href="/complaint.php?id=<?php echo $usrname['user_id'];?>" class="             btn-single hover-item       "> <!--     --><span class="js-ico  ico ico_complaint "></span> <span class="t js-text">Пожаловаться</span><!--      -->  </a>        </div> 

<? 

}

?>


</div> 


</div>  

</div> 



  </div>    </div> </div>


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

<script src="/js/dd_menu.js"></script>


<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
  });
</script>




<?
include("inc/foot.php");
?>


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
header("Location: /anketa.php?id=".$usrname['user_id']);
exit;
} else {
header("Location: /anketa.php?id=".$usrname['user_id']);
exit;
}

}	



if (isset($_GET['act']) && $_GET['act'] == 'unfollow') {

if (mysql_result(mysql_query("SELECT COUNT(*) FROM `followers` WHERE `user` = '".$usernm['user_id']."' AND `anke` = '".$usrname['user_id']."'"), 0) == 0) {
header("Location: /anketa.php?id=".$usrname['user_id']);
exit;
} else {
mysql_query("DELETE FROM `followers` WHERE `user` = '".$usernm['user_id']."' AND `anke` = '".$usrname['user_id']."'");	
header("Location: /anketa.php?id=".$usrname['user_id']);
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





<div class="relative"> <div id="location_header">  <div class="location-bar location-bar_no-break" id="header_path">  <span class="location-bar__item location-bar__item_home"> <a href="/index.php" class="location-bar__home-link ico"></a> <span class="location-bar__sep ico"></span> </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span> <a href="/profile.php?id=<?php echo $usrname['user_id'];?>" id="location_bar_1_0" class=""> 
<span><?php echo show_text($usrname['user_nick']); ?></span> 
</a>      <span class="location-bar__sep ico"></span>   </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <span id="location_bar_1_1" class="location-bar__title no_max_width"> <span>Анкета</span> </span>     </span>   </div>  </div> <div id="top_notif_place" class="top_notif_place">    </div> </div> 






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




<div class="list-link__wrap wbg">  
         
<div class="list-link oh list-link__right-space">   
   
<div class="block-item__avatar block-item__avatar_xlarge">      
<img src="/images/photos/160/<?php echo $usrname['photo_id']; ?>"  class="preview s101_100">                
</div>   

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
<? } ?>
      
</div>


</div>   

 
 
<div class="tabs"> 
<table class="table__wrap"> 
<tbody>
<tr>   
<td class="table__cell  tabs__item">  <a href="/profile.php?id=<?php echo $usrname['user_id'];?>" class="tabs__link">  Профиль    </a>     </td>  
<td class="table__cell  tabs__item clicked">  <span class="tabs__link">  Анкета   </span>   </td>  
</tr> 
</tbody>
</table>        
</div>


<div class="widgets-group donotblockme"> 
<div class="content-bl content-bl__sep"> 
<div class="anketa__rate"> 

<table class="table__wrap table_no_borders"> 
<tbody><tr> 

<td class="table__cell"> 
<div class="anketa__rate-title">Регистрация</div> 
<div class="anketa__rate-cnt">   <?php echo post_time($usrname['user_reg_time']);?></div> 
</td> 

<td class="table__cell"> 
<div class="anketa__rate-title">Последний визит</div> 
<div class="anketa__rate-cnt"><?php echo post_time($usrname['last_visit']);?>  </div> 
</td> 

<td class="table__cell"> 
<div class="anketa__rate-title">Монета</div> 
<div class="anketa__rate-cnt">  0 </div> 
</td> 
</tr> 
</tbody>
</table> 
</div> 

</div>  


<div class="content-widget"> 
<div class="info-item"> <div class="info-item__title">Уровень пользователя:</div> <div class="info-item__descr"> <?php echo us_level($usrname['user_id']); ?> </div> </div>  
<div class="info-item"> <div class="info-item__title">Время онлайн:</div> <div class="info-item__descr"> <?php echo time_autoformat($usrname['user_on_time']); ?></div> </div>   
<div class="info-item"> <div class="info-item__title">Followers:</div> <div class="info-item__descr"> <span class="text_normal">(0)</span> </div> 
</div>  
  
  
</div>

</div>  


<?
$ainfo1 = (length($usrname['user_name'])>0 ? show_text($usrname['user_name']) : null);
$ainfo2 = (length($usrname['user_surn'])>0 ? show_text($usrname['user_surn']) : null);
$ainfo6 = (length($usrname['profession'])>0 ? show_text($usrname['profession']) : null);
$ainfo7 = (length($usrname['birth_city'])>0 ? show_text($usrname['birth_city']) : null);
$ainfo8 = (length($usrname['current_city'])>0 ? show_text($usrname['current_city']) : null);
$ainfo9 = (length($usrname['gender'])>0 ? show_text($usrname['gender']) : null);
$ainfo10 =  (length($usrname['my_info'])>0 ? show_text($usrname['my_info']) : null);



if ($usrname['user_id'] === $usernm['user_id']) {
$hrfln = '<a href="/edit.php" class="inl-link">           <span class="no-text">  <span class="js-ico  ico ico_edit_dim "></span>  </span>   </a> ';	
} else {
$hrfln = null;	
}


?>


<div class="widgets-group widgets-group_top js-container__block"> 
 
<div class="b-title cl b-title_first oh b-title__with-btn relative">  <div class="header_links_fixer">     <?php echo $hrfln;?>  </div>   <div class="b-title__item"> <h6 class="span">Основная информация</h6> <span class="js-cnt cnt cnt_title hide"></span> </div>  </div>

<div class="content" style="padding: 0 !important;">  
<div class="list f-c_fll">      
<div class="content-item3 wbg break-word">   
<div class="info-item"> 

<div class="info-item__title">Имя:</div> <div class="info-item__descr"><?php echo $ainfo1;?> </div> </div> 
  
<div class="info-item"> <div class="info-item__title">Фамилия:</div> <div class="info-item__descr"><?php echo $ainfo2;?></div> </div>

<div class="info-item"> <div class="info-item__title">Пол:</div> <div class="info-item__descr"><?php echo $ainfo9;?></div> </div> 
   
<div class="info-item"> <div class="info-item__title">Дата рождения:</div> <div class="info-item__descr"><?php echo $ainfo1;?></div> </div>    
   
<div class="info-item"> <div class="info-item__title">Родной город:</div> <div class="info-item__descr">     <?php echo $ainfo7;?> </div> </div> 
   
<div class="info-item"> <div class="info-item__title">Место проживания:</div> <div class="info-item__descr">    <?php echo $ainfo8;?></div> </div> 
     

<div class="info-item"> <div class="info-item__title">Профессия:</div> <div class="info-item__descr"><?php echo $ainfo6;?></div> </div> 

<div class="info-item"> <div class="info-item__title">О себе:</div> <div class="info-item__descr"><?php echo $ainfo10;?></div> </div>

</div>       
</div>    
</div> 
<div class="cl"></div>
 </div>  


 

<div class="btn-single__wrap"> <div class="btn-single__table-wrap dropdown-menu_top">  </div> </div>      

<?php

if (isset($usernm)) {
	
?>

<div class="content-block">        <a href="/complaint.php?id=<?php echo $usrname['user_id'];?>" class="btn-single hover-item"> <span class="js-ico ico ico_complaint"></span> <span class="t js-text">Пожаловаться</span>  </a>        </div> 

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

   </center>    
   </div>
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


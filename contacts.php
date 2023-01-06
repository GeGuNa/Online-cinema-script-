<?

include("inc/system.php");
include("inc/funcs.php");
include("inc/head.php");


if (!isset($usernm)) {
header("Location: /index.php");
exit;
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


<div id="moder_block"></div>  <div class="relative"> <div id="location_header">  <div class="location-bar" id="header_path" >  <span class="location-bar__item location-bar__item_home"> <a href="/index.php" class="location-bar__home-link ico"></a> <span class="location-bar__sep ico"></span> </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <a href="/profile.php?id=<?php echo $usernm['user_id'];?>" id="location_bar_1_0" class=""> <span><?php echo show_text($usernm['user_nick']);?></span> </a>    <span class="location-bar__sep ico"></span>   </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <span id="location_bar_1_1" class="location-bar__title"> <span>Почта</span> </span>     </span>   </div>  </div> <div id="top_notif_place" class="top_notif_place">    </div> </div> <div> <div class="oh"></div> 


<div id="main_content">  
<div id="main">  


<div id="short_mode_switch_wrap"></div>
 
<div class="js-link_id">
      
<div id="lenta">
			  
			  
<?

$quety = SQL_Fetch("SELECT * FROM contacts WHERE user = ?",array($usernm['user_id']));



?>

<?

$k_post=SQL_Qeury("SELECT * FROM `contacts` WHERE `user` = '".$usernm['user_id']."'")->rowCount();


$user['p_str'] = 10;


$k_page = k_page($k_post,$user['p_str']);
$page = page($k_page);
$start = $user['p_str']*$page-$user['p_str'];


$q=SQL_Qeury("SELECT * FROM `contacts` WHERE `user` = '".$usernm['user_id']."' ORDER BY cont_time DESC LIMIT $start, $user[p_str]");

?>

<div id="short_mode_switch_wrap" style="margin-top:10px;"></div>



<?php if ($k_post == 0) { ?>
<div class="widgets-group content-item3 wbg normal-light"> Ваш список контактов пуст </div>
<? } ?>

<div class="widgets-group widgets-group_top donotblockme">

<?



while ($infoc = $q->fetch()) { 

$user123 = SQL_Fetch("SELECT * FROM persons WHERE user_id = ?",array($infoc['anke']))->fetch();


$knews = SQL_Qeury("SELECT * FROM `messages` WHERE `anke` = '".$usernm['user_id']."' AND `user` = '".$user123['user_id']."'  AND `read` = '0'")->rowCount();


$quser = SQL_Qeury("SELECT * FROM `messages` WHERE `user` = '".$usernm['user_id']."' AND `anke` = '".$user123['user_id']."' OR `user` = '".$user123['user_id']."' AND `anke` = '".$usernm['user_id']."' ORDER BY id DESC LIMIT 1")->fetch();

?>				  
	  
    <div class="list-link__wrap wbg">    

<div class="btn-tools_centered btn-tools_centered-indent">       
<a href="/message.php?id=<?php echo $user123['user_id'];?>" class="stnd-link icon-link stnd-link_disabled js-dd_menu_link triangle-show">          
<span class="no-text">  <span class="js-ico  ico ico_write "></span>  </span>               
</a>   
<div class="user__dropdown-menu dropdown-menu__wrap js-dd_menu_item" id="drop-down-list_07628"> <div class="widgets-group dropdown-menu"> <div class="dropdown-menu_text oh"> Вы не можете отправлять сообщения пользователю, так как он закрыл свою Почту от всех, кроме своих друзей и известных ему контактов. </div> </div> </div>     
</div>

<a href="/profile.php?id=<?php echo $user123['user_id'];?>" class="list-link ">   

<div class="list-link__ava for_avatar">    
<img src="/images/photos/40/<?php echo $user123['photo_id'];?>" class="preview s81_80">            
</div>   
<div class="list-link__descr">  
<b class="list-link__name word_break"> <?php echo onluser($user123['user_id']); ?> <span class="m"><?php echo show_text($user123['user_nick']);?></span>  
<?php if ($knews>0) { ?>
<div class="mail__notify"><? echo $knews;?></div>  
<? } ?>
</b>    
<div class="list-link__text"><?php echo post_time($quser['sms_time']);?></div>     
</div>  
</a>  


</div>
  
  

<?

}

?>	
  
                      <?

if ($k_page>1)str("?",$k_page,$page); 

?>    
              </div>
			  
			  
			  
            </div>

          </div>
 
 


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

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
  });
</script>





<?
include("inc/foot.php");
?>


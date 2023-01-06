<?

include("../inc/system.php");
include("../inc/funcs.php");
include("../inc/head.php");


if (!isset($usernm)) {
header("Location: /index.php");
exit;
}


if (isset($_GET['act']) && $_GET['act']=='del')
{
mysql_query("DELETE FROM `guest` WHERE `anke` = '".$usernm['user_id']."'");
header("Location: guest.php");
exit;
}


mysql_query("UPDATE `guest` SET `read` = '1' WHERE `anke` = '".$usernm['user_id']."'");




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


<div id="moder_block"></div>  

<div class="relative"> 
<div id="location_header">  
<div class="location-bar" id="header_path">  
<span class="location-bar__item location-bar__item_home"> <a href="/index.php" class="location-bar__home-link ico"></a> <span class="location-bar__sep ico"></span> </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <a href="/profile.php?id=<?php echo $usernm['user_id'];?>" id="location_bar_1_0" class=""> <span><?php echo show_text($usernm['user_nick']);?></span> </a>    <span class="location-bar__sep ico"></span>   </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <span id="location_bar_1_1" class="location-bar__title"> <span>Чёрный список</span> </span>     </span>   
</div>  
</div> 
<div id="top_notif_place" class="top_notif_place">    </div> 
</div>

 <div> <div class="oh"></div> 


<div id="main_content">  
<div id="main">  

<div id="short_mode_switch_wrap"></div>
 
<div class="js-link_id">

      
<div id="lenta">
             
			  
<?

$user['p_str'] = 10;

$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `blocklist` where `user` = '".$usernm['user_id']."'"),0);
$k_page = k_page($k_post,$user['p_str']);
$page = page($k_page);
$start = $user['p_str']*$page-$user['p_str'];

$info = mysql_query("SELECT * FROM `blocklist` where `user` = '".$usernm['user_id']."' ORDER BY `timeadd` DESC LIMIT $start, $user[p_str]");




?>
<div id="short_mode_switch_wrap" style="margin-top:10px;"></div>

<?php if ($k_post == 0) { ?>
<div class="widgets-group content-item3 wbg normal-light"> Список пуст. </div>
<? } ?>



<div class="widgets-group widgets-group_top donotblockme">
<?



while ($post = mysql_fetch_assoc($info)) {

$user123 = SQL_Fetch("SELECT * FROM persons WHERE user_id = ?",array($post['anke']))->fetch();


?>				  

<div class="list-link__wrap wbg">    

<div class="btn-tools_centered btn-tools_centered-indent">  
     
<a href="show.php?id=<?php echo $user123['user_id'];?>&ban=<?php echo $post['id'];?>" class="stnd-link icon-link stnd-link_disabled js-dd_menu_link triangle-show">          
<span class="no-text">  <span class="ico ico_arr ico_m"></span>  </span>               
</a>   
 
</div>

<a href="show.php?id=<?php echo $user123['user_id'];?>&ban=<?php echo $post['id'];?>" class="list-link ">   
<div class="list-link__ava for_avatar">    
<img src="/images/photos/40/<?php echo $user123['photo_id'];?>" class="preview s81_80">            
</div>   
<div class="list-link__descr">  
<b class="list-link__name word_break"> <?php echo onluser($user123['user_id']); ?> <span class="m"><?php echo show_text($user123['user_nick']);?></span>    </b>    
<div class="list-link__text"><?php echo post_time($post['timeadd']);?></div>     
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
include("../inc/foot.php");
?>


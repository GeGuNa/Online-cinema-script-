<?

include("inc/system.php");
include("inc/funcs.php");
include("inc/head.php");


if (!isset($usernm)) {
header("Location: /index.php");
exit;
}


if (isset($_GET['act']) && $_GET['act']=='del')
{
mysql_query("DELETE FROM `notifications` WHERE `user` = '".$usernm['user_id']."'");
header("Location: notifications.php");
exit;
}


mysql_query("UPDATE `notifications` SET `read` = '1' WHERE `user` = '".$usernm['user_id']."'");




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


<div id="moder_block"></div>  <div class="relative"> <div id="location_header">  <div class="location-bar" id="header_path">  <span class="location-bar__item location-bar__item_home"> <a href="/index.php" class="location-bar__home-link ico"></a> <span class="location-bar__sep ico"></span> </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <a href="/profile.php?id=<?php echo $usernm['user_id'];?>" id="location_bar_1_0" class=""> <span><?php echo show_text($usernm['user_nick']);?></span> </a>   <span class="location-bar__sep ico"></span>   </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <span id="location_bar_1_1" class="location-bar__title"> <span>Лента</span> </span>    </span>   </div>  </div> <div id="top_notif_place" class="top_notif_place">    </div> </div> <div> <div class="oh"></div> 


<div id="main_content">  
<div id="main">  

<div id="short_mode_switch_wrap"></div>
 
<div class="js-link_id">

      
<div id="lenta">
             
			  
<?

$quety = SQL_Fetch("SELECT * FROM notifications WHERE user = ? order by `id` desc limit 150",array($usernm['user_id']));





$user['p_str'] = 10;

$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `notifications` where `user` = '".$usernm['user_id']."'"),0);
$k_page = k_page($k_post,$user['p_str']);
$page = page($k_page);
$start = $user['p_str']*$page-$user['p_str'];

$info = mysql_query("SELECT * FROM `notifications` where `user` = '".$usernm['user_id']."' ORDER BY `time` DESC LIMIT $start, $user[p_str]");





?>
<div id="short_mode_switch_wrap" style="margin-top:10px;"></div>

<?php if ($k_post == 0) { ?>
<div class="widgets-group content-item3 wbg normal-light"> Лента пуста </div>
<? } ?>


<?

while ($post = mysql_fetch_assoc($info)) {


$user123 = mysql_fetch_array(mysql_query("SELECT * FROM `persons` where `user_id` = '".$post['anke']."'"));

if ($post['type']=="film_comment") {	

$filmi = mysql_fetch_array(mysql_query("SELECT * FROM `films` where `film_id` = '".$post['object_id']."'"));

}

?>				  

<div id="msg174292102" class="message message-block_foreign">  
  
<div class="message__wrapper">  
<div class="message__avatar"> 
<div class="block-item__avatar">  <a href="/profile.php?id=<?php echo $user123['user_id'];?>" class="tdn p40">      <img src="/images/photos/40/<?php echo $user123['photo_id'];?>"  class="preview s41_40">             </a>  
</div> 
</div>  
<div class="message__description js-personal_answer">  
<div class="oh"> 
<div class="message__user">   
<?php echo onluser($user123['user_id']); ?> 
<b class="m"><?php echo show_text($user123['user_nick']);?></b>     
</div> 
<div class="message__date"> <?php echo post_time($post['time']);?> </div> 
</div>   

<div class="message__text">   
Прокомментировала <a href="/watch.php?id=<?php echo $post['object_id'];?>">фильм </a>
</div>  

</div> 
</div> 

</div>  
  

<?

}

?>	
  
           
            </div>
   
    <?

if ($k_page>1)str("?",$k_page,$page); 

?>            
     
   
   
          </div>
 
 
<div class="widgets-group widgets-group_top js-container__block">  
<div>  <div class="list f-c_fll">          
<div class="replace_widget_wrapper">  <a href="/notifications.php?act=del" class="stnd-link list-link-red c-red js-replace_link "> <span class="js-ico  ico ico_delete "></span> <span class="t js-text">Очистить ленту</span> </a>   </div>          
</div>    
</div> <div class="cl"></div> 
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


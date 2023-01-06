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


<div id="moder_block"></div>  <div class="relative"> <div id="location_header">  <div class="location-bar" id="header_path">  <span class="location-bar__item location-bar__item_home"> <a href="/index.php" class="location-bar__home-link ico"></a> <span class="location-bar__sep ico"></span> </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <a href="/profile.php?id=<?php echo $usernm['user_id'];?>" id="location_bar_1_0" class=""> <span><?php echo show_text($usernm['user_nick']);?></span> </a>    <span class="location-bar__sep ico"></span>   </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <span id="location_bar_1_1" class="location-bar__title"> <span>История входов</span> </span>     </span>   </div>  </div> <div id="top_notif_place" class="top_notif_place">    </div> </div> <div> <div class="oh"></div> 


<div id="main_content">  
<div id="main">  

<div id="short_mode_switch_wrap"></div>
 
<div class="js-link_id">

      
<div id="lenta">
             
			  
<?

$user['p_str'] = 10;


$info = mysql_query("SELECT * FROM `user_logs` where `user` = '".$usernm['user_id']."' ORDER BY `id` DESC LIMIT 10");




?>
<div id="short_mode_switch_wrap" style="margin-top:10px;"></div>





<div class="widgets-group widgets-group_top wbg">
<?

$i = 0;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `user_logs` where `user` = '".$usernm['user_id']."'"),0);
while ($post = mysql_fetch_assoc($info)) {
$i++;

$dzzz = 'content-item3 content-bl__sep';

?>				  

<div class="<?php echo $dzzz;?>"> 
<span class="light_item">Дата:</span> <?php echo post_time($post['date']); ?> <br>  
<span class="light_item">IP-адрес:</span> <?php echo long2ip($post['user_ip']); ?>  <br>   
<span class="light_item">Браузер:</span> <?php echo show_text($post['browser']); ?><br>  
</div>



<?

}

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


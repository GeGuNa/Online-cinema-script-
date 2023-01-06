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


<div id="moder_block"></div>  <div class="relative"> <div id="location_header">  <div class="location-bar" id="header_path">  <span class="location-bar__item location-bar__item_home"> <a href="/index.php" class="location-bar__home-link ico"></a> <span class="location-bar__sep ico"></span> </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <a href="/profile.php?id=<?php echo $usrname['user_id'];?>" id="location_bar_1_0" class=""> <span><?php echo show_text($usrname['user_nick']);?></span> </a>    <span class="location-bar__sep ico"></span>   </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <span id="location_bar_1_1" class="location-bar__title"> <span>Комментарии</span> </span>   </span>   </div>  </div> <div id="top_notif_place" class="top_notif_place">    </div> </div> <div> <div class="oh"></div> 
 

<div id="main_content">  
<div id="main">  

<div id="short_mode_switch_wrap"></div>
 
<div class="js-link_id">

      
<div id="lenta">
             
			  
<?



$user['p_str'] = 10;

$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `film_comments` where `comment_user` = '".$usrname['user_id']."'"),0);
$k_page = k_page($k_post,$user['p_str']);
$page = page($k_page);
$start = $user['p_str']*$page-$user['p_str'];

$info = mysql_query("SELECT * FROM `film_comments` where `comment_user` = '".$usrname['user_id']."' ORDER BY `comment_time` DESC LIMIT $start, $user[p_str]");




?>
<div id="short_mode_switch_wrap" style="margin-top:10px;"></div>

<?php if ($k_post == 0) { ?>
<div class="widgets-group content-item3 wbg normal-light"> Здесь нет ничего </div>
<? } ?>



<div class="widgets-group widgets-group_top donotblockme">
<?



while ($post = mysql_fetch_assoc($info)) {

$filmi = SQL_Fetch("SELECT * FROM films WHERE film_id = ?",array($post['comment_film']))->fetch();


?>				  

<div class="list-link__wrap wbg">    
<a href="/watch.php?id=<?php echo $filmi['film_id'];?>" class="list-link ">   
<div class="list-link__ava for_avatar">    
<img src="/images/films/<?php echo $filmi['film_id'];?>.jpg" class="preview s81_80">            
</div>   
<div class="list-link__descr">  
<b class="list-link__name word_break">  <span class="m"><?php echo show_text($filmi['film_name']);?></span>    </b>    
<div class="list-link__text"><?php echo show_text(mb_strimwidth($post['comment_text'],0,50,"...."));?></div>     
</div>  
</a>  
</div>
  

<?

}

?>	

<?
if ($k_page>1)str("?id=$usrname[user_id]",$k_page,$page); 
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


<?

include("../inc/system.php");
include("../inc/funcs.php");
include("../inc/head.php");


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

if (!isset($_GET['ban'])) {
	header("Location: /");
	exit;
} else if (!is_numeric($_GET['ban'])) {
	header("Location: /");
	exit;
} else {
	$banid = abs((int)$_GET['ban']);
}



$cnt = mysql_result(mysql_query("SELECT COUNT(*) FROM `persons` where `user_id` = $info"), 0);


if ($cnt == 0) {
header("Location: /");
exit;
}




$usrname = mysql_fetch_array(mysql_query("SELECT * FROM `persons` where `user_id` = $info"));




$cnts = mysql_result(mysql_query("SELECT COUNT(*) FROM `blocklist` where `user` = '".$usernm['user_id']."' and `anke` = '".$usrname['user_id']."' and `id` = '".$banid."'"), 0);



if ($cnts == 0)	{
header("Location: /");
exit;	
}
	
$infoban = mysql_fetch_array(mysql_query("SELECT * FROM `blocklist` where `user` = '".$usernm['user_id']."' and `anke` = '".$usrname['user_id']."' and `id` = '".$banid."'"));

if (isset($_GET['act']) && $_GET['act'] == 'del') {
	
SQL_Exec("DELETE FROM `blocklist` WHERE `id` = ?", array(num($infoban['id'])));
		
header("Location: /profile.php?id=".$usrname['user_id']);
exit;
	
}




$user123 = SQL_Fetch("SELECT * FROM persons WHERE user_id = ?",array($infoban['anke']))->fetch();


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
<div class="relative"> <div id="location_header">  <div class="location-bar" id="header_path">  <span class="location-bar__item location-bar__item_home"> <a href="/index.php" class="location-bar__home-link ico"></a> <span class="location-bar__sep ico"></span> </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <a href="/profile.php?id=<?php echo $usrname['user_id'];?>" id="location_bar_1_0" class=""> <span><?php echo show_text($usrname['user_nick']);?></span> </a>    <span class="location-bar__sep ico"></span>   </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <a href="/block/" id="location_bar_1_1" class=""> <span>Чёрный список</span> </a>    <span class="location-bar__sep ico"></span>   </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <span id="location_bar_1_2" class="location-bar__title"> <span>Подробности</span> </span>     </span>   </div>  </div> <div id="top_notif_place" class="top_notif_place">    </div> </div>
<div> <div class="oh"></div> 



<div id="main_content">  
<div id="main">  



 <!--  --->
 
<div class="widgets-group widgets-group_top"> 
<div class="content-item3 wbg"> <div> 
<span class="comment_date grey"><?php echo post_time($infoban['timeadd']);?></span> <span class="grey">Пользователь:</span>  
<a href="/profile.php?id=<?php echo $user123['user_id'];?>"><?php echo onluser($user123['user_id']); ?></a> 
<a href="/profile.php?id=<?php echo $user123['user_id'];?>" class="mysite-link"><b class="mysite-nick"><?php echo show_text($user123['user_nick']); ?></b></a>  
</div> 

<div class="pad_t_a"> <span class="grey">Раздел:</span> Почта </div>  

<?php if (length($infoban['text'])>0){ ?>
<div class="break-word pad_t_a"> <span class="grey">Комментарий:</span> <?php echo show_text($infoban['text']); ?> </div>  
<?php } ?>


<?php if ($infoban['temporarily'] != 1){ ?>
<div class="pad_t_a"> <span class="grey">Время:</span> <?php echo num($infoban['tnum']); ?> ч. </div> </div> 
<?php } else { ?>
<div class="pad_t_a"> <span class="grey">Время:</span> Навсегда </div> </div> 
<?php } ?>


</div>


<div class="widgets-group no-shadow">       <a href="show.php?id=<?php echo $usrname['user_id'];?>&ban=<?php echo $infoban['id'];?>&act=del" class="btn-single hover-item"> <span class="js-ico  ico ico_remove "></span> <span class="t js-text">Удалить из Чёрного списка</span>  </a>      </div>


 <!--  --->
  

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


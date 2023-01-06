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




$cnt = mysql_result(mysql_query("SELECT COUNT(*) FROM `persons` where `user_id` = $info"), 0);


if ($cnt == 0) {
	header("Location: /");
	exit;
}




$usrname = mysql_fetch_array(mysql_query("SELECT * FROM `persons` where `user_id` = $info"));


$cnts513 = mysql_result(mysql_query("SELECT COUNT(*) FROM `blocklist` where `user` = '".$usernm['user_id']."' and `anke` = '".$usrname['user_id']."' and `time` > '".$_SERVER['REQUEST_TIME']."'"), 0);

if ($cnts513>0) {
	header("Location: /profile.php?id=".$usrname['user_id']);
	exit;		
}


if ($usrname['user_id'] === $usernm['user_id']) {
	header("Location: /");
	exit;	
}



if (isset($_POST['cfms'])) {
	
if (!in_array($_POST['bantime'], array(1, 6, 24, 120, 0))) {
header("Location: /index.php");
exit;
}	
	
if ($_POST['bantime'] == 0) {

SQL_Exec("INSERT INTO blocklist (user, anke, temporarily, text, timeadd) VALUES(?,?,?,?,?);", array($usernm['user_id'], $usrname['user_id'], 1, punctuaterplc($_POST['text']), $_SERVER['REQUEST_TIME']));


} else {
	
if ($_POST['bantime'] == 1)$tmbnt = 60*60;
if ($_POST['bantime'] == 6)$tmbnt = 60*60*6;
if ($_POST['bantime'] == 24)$tmbnt = 60*60*24;
if ($_POST['bantime'] == 120)$tmbnt = 60*60*120;	

SQL_Exec("INSERT INTO blocklist (user, anke, time, text, timeadd, tnum) VALUES(?,?,?,?,?,?);", array($usernm['user_id'], $usrname['user_id'], $_SERVER['REQUEST_TIME']+$tmbnt, punctuaterplc($_POST['text']), $_SERVER['REQUEST_TIME'], abs((int)$_POST['bantime'])));

}	
	
	
header("Location: /block/");
exit;	

}
	
	



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
<div class="relative"> <div id="location_header">  <div class="location-bar" id="header_path">  <span class="location-bar__item location-bar__item_home"> <a href="/index.php" class="location-bar__home-link ico"></a> <span class="location-bar__sep ico"></span> </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <a href="/profile.php?id=<?php echo $usernm['user_id'];?>" id="location_bar_1_0" class=""> <span><?php echo show_text($usernm['user_nick']);?></span> </a>   <span class="location-bar__sep ico"></span>   </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <a href="/block/" id="location_bar_1_1" class=""> <span>Чёрный список</span> </a>   <span class="location-bar__sep ico"></span>   </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <span id="location_bar_1_2" class="location-bar__title"> <span>Добавление</span> </span>     </span>   </div>  </div> <div id="top_notif_place" class="top_notif_place">    </div> </div>
<div> <div class="oh"></div> 


<div id="main_content">  
<div id="main">  



 <!--  --->
 
<div class="widgets-group widgets-group_top"> 
<div class="content-item3 wbg"> <div> 
<span class="grey">Пользователь:</span>  <a href="/profile.php?id=<?php echo $usrname['user_id'];?>"><?php echo onluser($usrname['user_id']); ?></a> 
<a href="/profile.php?id=<?php echo $usrname['user_id'];?>" class="mysite-link"><b class="mysite-nick"><?php echo show_text($usrname['user_nick']); ?></b></a>  
</div>  
<div class="pad_t_a"> <span class="grey">Раздел:</span> Почта </div>   
</div> 
</div>


<div class="widgets-group widgets-group_top"> 
<form action="/block/add.php?id=<?php echo $usrname['user_id'];?>" method="post" style="padding: 0 !important; border: 0 !important; "> 
<div class="content-item3 wbg pdb pdt error__item_wrapper"> 
<div class="pad_t_a">  
<div class="js-input_error_wrap">  
<label class="label"> Комментарий:  </label>   
<div class="text-input__wrap relative">  

<textarea placeholder="Комментарий" rows="3" cols="17" name="text" class="text-input" maxlength="255"></textarea>

<span class="right cntBl"><span class="js-bb_counter">0</span>/255</span>     
</div>  

<div class="js-input_error error__msg hide"></div>   

</div>  

</div> 


<div class="pad_t_a"> <span class="grey">Время:</span>   
<span class="select_custom "> 

<select name="bantime">  
<option value="1" selected="selected">1 ч.</option>  
<option value="6">6 ч.</option>  
<option value="24">24 ч.</option>  
<option value="120">120 ч.</option>  
<option value="0">навсегда</option>  
</select> 

</span>     
</div>  

<div style="margin-top:10px;"> 
 
  
</div>   



</div> 

<div class="user__tools user__tools_last"> 
<table class="table__wrap"> <tbody><tr> 
<td width="50%" class="table__cell"> <button name="cfms" value="Добавить в ЧС" class="user__tools-link  list-link-blue"><span class="js-ico ico ico_plus_blue"></span> <span class="js-btn_val">Добавить в ЧС</span></button> </td> 
<td width="50%" class="table__cell table__cell_last">       <a href="/profile.php?id=<?php echo $usrname['user_id'];?>" class="stnd-link"> Отменить  </a>      </td> 
</tr> </tbody></table> </div> 

</form> 

</div>
 


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


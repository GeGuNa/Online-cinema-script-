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



if ($usrname['user_id'] === $usernm['user_id']) {
	header("Location: /");
	exit;	
}


//////////////////

$myblock = mysql_result(mysql_query("SELECT COUNT(*) FROM `blocklist` where 
`user` = '".$usernm['user_id']."' and `anke` = '".$usrname['user_id']."' and `time` > '".$_SERVER['REQUEST_TIME']."' OR `user` = '".$usernm['user_id']."' and `anke` = '".$usrname['user_id']."' and `temporarily` = '1'"), 0);

$meblock = mysql_result(mysql_query("SELECT COUNT(*) FROM `blocklist` where 
`anke` = '".$usernm['user_id']."' and `user` = '".$usrname['user_id']."' and `time` > '".$_SERVER['REQUEST_TIME']."' OR `anke` = '".$usernm['user_id']."' and `user` = '".$usrname['user_id']."' and `temporarily` = '1'"), 0);

//////////////////


mysql_query("UPDATE `messages` SET `read` = '1' WHERE `anke` = '".$usernm['user_id']."' AND `user` = '".$usrname['user_id']."'");



if (isset($_GET['pstdel'])) {
	
	if (!isset($_GET['pstdel'])) {
		header("Location: /index.php");
		exit;
	}
	
	if (!is_numeric($_GET['pstdel'])) {
		header("Location: /index.php");
		exit;
	}
	
    $mess = SQL_Fetch("SELECT * FROM `messages` WHERE `id` = ?", array(num($_GET['pstdel'])))->fetch();

	
    if ($mess['user'] == $usernm['user_id'] || $mess['anke'] == $usernm['user_id']) {		
			
		if ($mess['unlink'] != $usernm['user_id'] && $mess['unlink'] != 0)	{
            SQL_Exec("DELETE FROM `messages` WHERE `id` = ?", array(num($_GET['pstdel'])));
        } else {
            SQL_Exec("UPDATE `messages` SET `unlink` = ? WHERE `id` = ?", array($usernm['user_id'], $mess['id']));
		}
		
        header("Location: ?id=$usrname[user_id]");
        exit;
		
    } else {
		header("Location: /index.php");
		exit;
	}
	
}




if (isset( $_GET['act']) && $_GET['act'] == 'clear') {
	
	
    SQL_Exec("DELETE FROM `messages` WHERE  `user` = ? AND `anke` = ? AND `unlink` = ? ",
	array($usrname['user_id'], $usernm['user_id'], $usrname['user_id']));
	
    SQL_Exec("DELETE FROM `messages` WHERE  `user` = ? AND `anke` = ? AND `unlink` = ? ", 
    array($usernm['user_id'], $usrname['user_id'], $usernm['user_id']));
	
	
    SQL_Exec("UPDATE `messages` SET `unlink` = ? WHERE `user` = ? AND `anke` = ?", array(
	$usernm['user_id'], $usernm['user_id'], $usrname['user_id']));
	
    SQL_Exec("UPDATE `messages` SET `unlink` = ? WHERE  `user` = ? AND `anke` = ?", array(
	$usernm['user_id'], $usrname['user_id'], $usernm['user_id']));
	
	SQL_Exec("DELETE FROM `contacts` WHERE `user` = ? AND `anke` = ?",array($usernm['user_id'], $usrname['user_id']));
	
	

    header("Location: ?id=$usrname[user_id]");
    exit;
}


if (isset($_POST['cfms']))
{
	
if ($myblock>0 || $meblock>0) {
header("Location: /index.php");
exit;
}	

if (length($_POST['message'])<1)$err='Комментарий не может быть пустым';
if (length($_POST['message'])>1024)$err='Комментарий не может быть больше 1024 символов';


if (!isset($err)) {


SQL_Exec("INSERT INTO messages (user, anke, message, sms_time) VALUES(?,?,?,?);", array($usernm['user_id'], $usrname['user_id'], punctuaterplc($_POST['message']), $_SERVER['REQUEST_TIME']));	
	
	
	
$k_post1 = SQL_Qeury("SELECT * FROM `contacts` WHERE `user` = '".$usernm['user_id']."' AND `anke` = '".$usrname['user_id']."'")->rowCount();	
	
if ($k_post1 == 0) {
SQL_Exec("INSERT INTO contacts (user, anke, cont_time) VALUES(?,?,?);", array($usernm['user_id'], $usrname['user_id'], $_SERVER['REQUEST_TIME']));	
} else {
SQL_Exec("UPDATE contacts SET cont_time = ? where user = ? and anke = ?", array($_SERVER['REQUEST_TIME'],$usernm['user_id'], $usrname['user_id']));		
}
	
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


<div id="moder_block"></div>  <div class="relative"> <div id="location_header">  <div class="location-bar" id="header_path">  <span class="location-bar__item location-bar__item_home"> <a href="/index.php" class="location-bar__home-link ico"></a> <span class="location-bar__sep ico"></span> </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <a href="/profile.php?id=<?php echo $usernm['user_id'];?>" id="location_bar_1_0" class=""> <span><?php echo show_text($usernm['user_nick']);?></span> </a>    <span class="location-bar__sep ico"></span>   </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <a href="/contacts.php" id="location_bar_1_1" class=""> <span>Почта</span> </a>    <span class="location-bar__sep ico"></span>   </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <a href="/profile.php?id=<?php echo $usrname['user_id'];?>" id="location_bar_1_2" class=""> <span><?php echo show_text($usrname['user_nick']);?></span> </a>    </span>   </div>  </div> <div id="top_notif_place" class="top_notif_place">    </div> </div> <div> <div class="oh"></div> 


<div id="main_content">  
<div id="main">  

<?

$k_post=SQL_Qeury("SELECT * FROM `messages` WHERE `user` = '".$usernm['user_id']."' AND `anke` = '".$usrname['user_id']."' AND `unlink` != '".$usernm['user_id']."' OR `user` = '".$usrname['user_id']."' AND `anke` = '".$usernm['user_id']."' AND `unlink` != '".$usernm['user_id']."'")->rowCount();

?>

<style>


.btn-tools.js-clicked:after {
    margin-top: 5px !important;
}

</style>

<div id="ChatPage">
<div class="widgets-group widgets-group_top mb0"> 

<div class="dropdown-menu__container"> 
<div class="anketa__dropdown-menu dropdown-menu__wrap js-dd_menu_item js-fix_height" id="more_menu_show" style="top: 59px;"> <div class="widgets-group links-group links-group_grey dropdown-menu list">         
                   
<a href="/block/add.php?id=<?php echo $usrname['user_id'];?>" class="list-link"> <span class="js-ico ico_mail ico_mail_spam"></span> <span class="t js-text">Заблокировать</span> </a>
           
<a href="/message.php?id=<?php echo $usrname['user_id'];?>&act=clear" class="list-link list-link-red c-red"> <span class="js-ico ico_mail ico_mail_garbage_red"></span> <span class="t js-text">Удалить</span>  </a>  
      
</div> 
</div>  
</div>


<div class="list-link__wrap wbg">    



<div class="btn-tools btn-tools_centered js-dd_menu_link" id="more_menu" onclick="dd_menu_mess();"> <span class="ico ico_more_b"></span> </div>    
   
<a href="/profile.php?id=<?php echo $usrname['user_id'];?>" class=" list-link oh    list-link__right-space ">      
<div class="block-item__avatar block-item__avatar_small">      
<img src="/images/photos/40/<?php echo $usrname['photo_id'];?>" class="preview    s41_40">              
<div class="js-online_status block-item__online hide">В сети</div>  
</div>   
<div class="block-item__descr"> 
<div> 
<span class="online-status m">
<?php echo onluser($usrname['user_id']); ?>
</span> 
<span class="block-item__title m break-word"><?php echo show_text($usrname['user_nick']);?></span>    
</div> 
<div class="block-item__light oh">     
<div id="user_activity">    
<span class="js-online_status">  Заходила  
<span class="js-online_status_time"><?php echo post_time($usrname['last_visit']);?></span> 
</span>     
</div> 
<div class="mail__typing" id="mail_typing" style="display: none;"></div>    
</div> 
</div>     
</a>  



</div>


<?php if ($myblock>0 || $meblock>0) { ?>


<?php if ($myblock>0) { ?>
<div class="wbg  js-input_error_wrap content-bl " id="messages_list_form">  <div class="error">Этот пользователь добавлен в ваш <a href="/block/">чёрный список</a>.</div>  <div class="clear"></div> </div>
<?php } else { ?>
<div class="wbg  js-input_error_wrap content-bl " id="messages_list_form">  <div class="error">Этот пользователь добавил вас в свой        Чёрный список.</div>  <div class="clear"></div> </div>
<?php } ?>


<?php } else { ?>


<form method="post" action="/message.php?id=<?php echo $usrname['user_id']; ?>" id="add_form" class="js-toolbar_wrap js-attaches_form js-attach_dnd" style="padding: 0 !important; border: 0 !important; ">
<div class="upload-dnd_msg"><div class="js-dnd_msg"></div></div> 
<div class="stnd-block content-bl__sep3 default_txt">  

<div class="text-input__wrap js-textarea_wrapper"> 
<textarea style="resize:none;" maxlength="1024" rows="1" cols="17" name="message" class="js-autofocus text-block form_submit text-input placeholder form_submit js-resize_ta" id="text" placeholder="Напишите сообщение"></textarea> 
</div> 


<div class="form-tools o_vis cf"> 

<div class="right">  
<input style="margin-left: 5px;" type="submit" name="cfms" id="mainSubmitForm" class="btn" value="Написать">  
</div> 


<div class="cl"></div> 
</div> 





</div> 



</form> 


<?php } ?>

<?php
if ($k_post==0) { 
?>

<div id="messages_list" class="content-bl content-bl_hor-nopad">    
<div class="mail__dialog_wrapper" style="margin-left:8px;">  Список сообщений пуст</div>
</div>

<?php
}
?>
</div>
 
 
 
 
 </div>
 
 
 
 
 
 <div id="messages" class="widgets-group widgets-group_top"> 
 
 <div class="content-bl text t_center" id="no_messages_notify" style="display: none;"> Сообщений нет. </div> 
 <div class="links-group links-group_short content-bl__sep3 links-group_important hide" id="chat_unread_notify"> <a href="#" class="list-link list-link_single t_center" id="chat_unread_notify_link"></a> </div> 
 
 
 <div id="messages_list" class="content-bl content-bl_hor-nopad content-bl_top-nopad">    
 
 


 
 <?

$user['p_str'] = 10;


$k_page = k_page($k_post,$user['p_str']);
$page = page($k_page);
$start = $user['p_str']*$page-$user['p_str'];


$q=SQL_Qeury("SELECT * FROM `messages` WHERE `user` = '".$usernm['user_id']."' AND `anke` = '".$usrname['user_id']."' AND `unlink` != '".$usernm['user_id']."' OR `user` = '".$usrname['user_id']."' AND `anke` = '".$usernm['user_id']."' AND `unlink` != '".$usernm['user_id']."' ORDER BY id DESC LIMIT $start, $user[p_str]");
while ($post = $q->fetch())
{
	
$user123 = SQL_Fetch("SELECT * FROM persons WHERE user_id = ?",array($post['user']))->fetch();
	
	
?>


<?php 

if ($post['user'] == $usernm['user_id']) {

?>




<?php 

if ($post['read']==0) {
	$rdstl = 'mail__dialog_unread';	
} else {
	$rdstl = '';
} 

?>

<div class="js-message mail__dialog_wrapper mail__dialog_my">  
<div class="<?php echo $rdstl;?>"> 
<div class="mail__dialog_message oh"> 
<div>   





<span class="user__nick">   
<?php echo onluser($user123['user_id']); ?>
 <a href="/profile.php?id=<?php echo $user123['user_id'];?>" class="mysite-link"><b class="mysite-nick black"><?php echo show_text($user123['user_nick']);?></b></a>     
<span class="nl_wn"> <a href="#" class="grey"><?php echo post_time($post['sms_time']);?></a> </span>   
</span>



<a href="/message.php?id=<?php echo $usrname['user_id'];?>&pstdel=<?php echo $post['id'];?>" class="btn-tools js-dd_menu_link" id="messid_<?php echo $post['id'];?>"> <span style="right: 15px;top: 7px;" class="ico ico_close_btn block-btn js-delete_reply" title="Удалить"></span></a>
   
   
</div> 
 
<div class="cl">  
<div class="mail__dialog_text js-message_text">  
<div class="js-message_split oh"> 
<div class="js-message_preview" data-id="m409742231">  
<div class="mail__dialog_text_fix"></div>    
<?php echo show_text($post['message']); ?>    
</div>  
</div>  
</div>  
</div> 
 
</div> 

</div> 
<div class="cl"></div> 
</div>



<?

} else {

?>


<?php 

if ($post['read']==0) {
	$rdstl = 'mail__dialog_unread';	
} else {
	$rdstl = '';
} 

?>





<div class="js-message mail__dialog_wrapper">  
<div class="<?php echo $rdstl;?>"> 
<div class="mail__dialog_message oh mail__dialog_answer"> 
<div>   





<span class="user__nick">   
<?php echo onluser($user123['user_id']); ?>
 <a href="/profile.php?id=<?php echo $user123['user_id'];?>" class="mysite-link"><b class="mysite-nick black"><?php echo show_text($user123['user_nick']);?></b></a>     
<span class="nl_wn"> <a href="#" class="grey"><?php echo post_time($post['sms_time']);?></a> </span>   
</span>



<a href="/message.php?id=<?php echo $usrname['user_id'];?>&pstdel=<?php echo $post['id'];?>" class="btn-tools js-dd_menu_link" id="messid_<?php echo $post['id'];?>"> <span style="right: 15px;top: 7px;" class="ico ico_close_btn block-btn js-delete_reply" title="Удалить"></span></a>

     
</div> 
 
<div class="cl">  
<div class="mail__dialog_text js-message_text">  
<div class="js-message_split oh"> 
<div class="js-message_preview" data-id="m409742231">  
<div class="mail__dialog_text_fix"></div>    
<?php echo show_text($post['message']); ?>    
</div>  
</div>  
</div>  
</div> 
 
</div> 

</div> 
<div class="cl"></div> 
</div>


<? } ?>



<?
}
?>
 
 
    
    

  </div> 

       <?

if ($k_page>1)str("?id=$usrname[user_id]",$k_page,$page); 

?> 


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

<script src="/js/dd_menu.js"></script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
  });
</script>





<?
include("inc/foot.php");
?>


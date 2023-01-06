<?

//header("Access-Control-Allow-Origin: http://test1.ru");
//header("Access-Control-Allow-Methods: PUT, GET, POST");

include("inc/system.php");
include("inc/funcs.php");
include("inc/head.php");

if (!isset($_GET['id'])) {
	header("Location: /");
	exit;
} else if (!is_numeric($_GET['id'])) {
	header("Location: /");
	exit;
} else {
	$info = abs((int)$_GET['id']);
}




$cnt = mysql_result(mysql_query("SELECT COUNT(*) FROM `films` where `film_id` = $info"), 0);


if ($cnt == 0) {
	header("Location: /");
	exit;
}




$filmi = mysql_fetch_array(mysql_query("SELECT * FROM `films` where `film_id` = $info"));

if (isset($usernm)) {
	
$bookcnt = mysql_result(mysql_query("SELECT COUNT(*) FROM `bookmark` where `user` = '".$usernm['user_id']."' and `type` = 'filmi' and `mark` = '".$filmi['film_id']."'"), 0);	

$hstr = mysql_result(mysql_query("SELECT COUNT(*) FROM `history` WHERE `user` = '".$usernm['user_id']."' AND `film` = '".$filmi['film_id']."'"), 0);


if ($hstr !== 0 && $hstr<1) {
	
mysql_query("INSERT INTO `history` (`user`, `film`) values('".$usernm['user_id']."', '".$filmi['film_id']."')");

}



}


if (isset($usernm) && isset($_GET['act']) && $_GET['act']=='addtobook') {



if ($bookcnt >0) {
SQL_Exec("DELETE FROM `bookmark` WHERE `mark` = ? and `user` = ? and `type` = ?", array($filmi['film_id'], $usernm['user_id'], 'filmi'));

header("Location: /watch.php?id=".$filmi['film_id']);
exit;
	
} else {
	
SQL_Exec("INSERT INTO bookmark(mark, user, type) VALUES(?,?,?);", array($filmi['film_id'], $usernm['user_id'], 'filmi'));

header("Location: /watch.php?id=".$filmi['film_id']);
exit;	
}


	
}



if (isset($usernm) && isset($_POST['cfms']))
{

if (length($_POST['message'])<1)$err='Комментарий не может быть пустым';
if (length($_POST['message'])>1024)$err='Комментарий не может быть больше 1024 символов';


if (!isset($err)) {
	



SQL_Exec("INSERT INTO film_comments(comment_film, comment_user, comment_text, comment_time) VALUES(?,?,?,?);", array($filmi['film_id'], $usernm['user_id'], punctuaterplc($_POST['message']), $_SERVER['REQUEST_TIME']));	
	
	
$meg = mysql_query("SELECT * FROM `followers` WHERE `anke` = '".$usernm['user_id']."'");
while ($frendd=mysql_fetch_array($meg))
{
mysql_query("INSERT INTO `notifications` (`user`, `object_id`, `type`, `time`,`anke`) VALUES ('".$frendd['user']."','".$filmi['film_id']."', 'film_comment', '".$_SERVER['REQUEST_TIME']."','".$usernm['user_id']."')");
}	
	
	
	
}

}







?>



<?


?>


<?
include("inc/header.php");
?>

<div class="content-wrapper" style="min-height: 1176px;">



<div class="area" style="min-height:380px;">

<div class="title" style="margin-bottom:4px;"> 
<a href="/watch.php?id=4"><?php echo $filmi['film_name'];?></a>
</div>

<img src="/images/films/<?php echo $filmi['film_id'];?>.jpg" style="float:left;max-width:50%;" width="200" alt="<?php echo $filmi['film_name'];?>" title="<?php echo $filmi['film_name'];?>">


<div class="film_info">
<div style="clear:both;"></div>
<div style="font-weight:bold">
Год выпуска: <?php echo $filmi['film_create_time'];?><br>
Страна: <?php echo $filmi['film_country'];?><br>
Жанр: <?php echo $filmi['film_genre'];?><br>
Качество: <?php echo $filmi['film_quality'];?><br>
Перевод: <?php echo $filmi['film_translate'];?><br>
Продолжительность: <?php echo $filmi['film_time'];?><br>
Режиссер: <?php echo $filmi['film_author'];?><br>
В ролях: <?php echo $filmi['film_actors'];?>
</div>

<div style="clear:both;"></div>
</div> 

</div> 

<?php 



?>


<?php
if (isset($usernm)) {
?>

<div class="widgets-group widgets-group_top">        
<div class="cf js-action_bar">  
<div class="action-bar"> 
<table class="table__wrap table__wrap-fixed"> 
<tbody>
<tr>   

<?

if ($bookcnt >0) {
$bkncntstl = 'js-ico ico ico_fav_on m';	
} else {
$bkncntstl = 'js-ico ico ico_fav m';
}
?>


<td class="table__cell"> <a href="/watch.php?id=<?php echo $filmi['film_id'];?>&act=addtobook" class="user__tools-link btn-light" style="padding: 22px !important;"> <span class="<?php echo $bkncntstl;?>" style="margin-top: -14px !important;"></span>  </a> </td>    

<!--
<td class="table__cell"> <a href="#" class="user__tools-link btn-light" style="padding: 22px !important;"> <span class="js-ico ico ico_complaint m" style="margin-top: -14px !important;"></span> </a> </td>   

<td class="table__cell"> <a href="#" class="user__tools-link btn-light" style="padding: 22px !important;"> <span class="js-ico ico_abar ico_share m" style="margin-top: -14px !important;"></span>  </a> </td>   
-->
  

</tr> 
</tbody>
</table> 
</div>    

</div>       
</div>

<?php
}
?>

<div class="widgets-group widgets-group_top">  



<div class="  b-title b-title_first "> 
<span class="b-title__item t_transform_none b-title__with-btn oh break-word"> 
<span class="m">
<h1 class="span">Информация о фильме: </h1>
<span class="grey js-vc_fileext" style="color: #222020 !important;"><?php echo $filmi['film_name'];?></span> 
</span>  
</span> </div> 

<div class=" content-item3 wbg  ">   
 

<div class="info-item"> 
<div class="info-item__title" style="width: 100% !important; max-width: 100% !important;">
<?php echo $filmi['film_desc'];?>
</div>  
</div>

    
	  
	
      
       

<div>  </div> <div>     </div>    </div>   

   </div>

<?


$flmsscrn = mysql_fetch_array(mysql_query("SELECT * FROM `film_screen` where `film_id` = '".$filmi['film_id']."' order by id desc limit 1"));


if (file_exists($_SERVER['DOCUMENT_ROOT']."/images/screens/".$flmsscrn['screen_url'])) {
?>

<div class="widgets-group" style="margin-top:5px;">
<div style="max-width:100%;">


<div class="b-title b-title_first"> <span class="b-title__item t_transform_none b-title__with-btn oh break-word"> Скриншоты </span> </div>

<div class="content-item3 wbg" style="text-align:center;">

<?php


$query2 = mysql_query("SELECT * FROM `film_screen` WHERE `film_id` = '".$filmi['film_id']."' ORDER BY `id` ASC LIMIT 3");



while ($row22 = mysql_fetch_assoc($query2))
{

?>

<img style="max-width:30%;max-height:10%;" src="/images/screens/<?php echo ($row22['screen_url']);?>">

<?
}
?>

</div>

</div>
</div>

<?
}
?>

<!--
<div class="title" style="margin-bottom:10px;">
<a href="#"><img src="/images/1556704952_banner-anime.png"></a>
</div>
-->


<div class="widgets-group"> 

<div class="b-title b-title_first"> <span class="b-title__item t_transform_none b-title__with-btn oh break-word"> смотреть онлайн <?php echo $filmi['film_name'];?> в хорошем качестве
 </span> </div>   

<div class="content-item3 wbg">     

<div class="video_item" id="videoplayer719">
<center>
<div class="player_container" style="max-width:100%;">
<img src="/images/Video-Play-715x673.png" style="max-height:20%;z-index:999999999;position: absolute;margin-left:40%;margin-top:16%;display:none;">


<?php echo $filmi['film_link'];?>

 <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="700" height="400"
      poster="http://video-js.zencoder.com/oceans-clip.png"
      data-setup="{}">
	  
    <source id="vid_plr" src="<?php echo $filmi['film_link'];?>" type="video/mp4">
	
	<!--
    <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
    <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' />
	
    <track kind="captions" src="demo.captions.vtt" srclang="en" label="English"></track>
    <track kind="subtitles" src="demo.captions.vtt" srclang="en" label="English"></track>

	-->
	
	<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
  </video>




</div>  
</center>

<?

if ($filmi['type']== "serial") {

?>


<div class="prenext">
<div class="prevpl" onclick="prevpl();">‹</div>

<div id="simple-episodes-tabs">

<ul id="simple-episodes-list" class="b-simple_episodes__list clearfix">


<?php

$k_post1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `serials` WHERE `film_id` = '".$filmi['film_id']."'"),0);

$query2 = mysql_query("SELECT * FROM `serials` WHERE `film_id` = '".$filmi['film_id']."' ORDER BY `film_seria` ASC LIMIT $k_post1");



while ($row = mysql_fetch_assoc($query2))
{

?>

<li onclick="ser_watch();" class="b-simple_episode__item" id="ser_<?php echo $row['film_seria'];?>" datalink_ser="<?php echo $row['film_link'];?>">Серия <?php echo $row['film_seria'];?></li>
<?

}

?>

</ul>

</div>

<div class="nextpl" onclick="nextpl();">›</div>

</div>

<?

}

?>






</div>    

   </div>  

   </div>



<!--
<div class="widgets-group" style="margin-top:5px;">
<div style="max-width:100%;">


<div class="content-item3 wbg" style="text-align:center;">
<img style="max-width:30%;" src="/images/bbb.webp" alt="Первый скриншот" title="Первый скриншот">

<img style="max-width:30%;" src="/images/bbb.webp" alt="Второй скриншот" title="Второй скриншот">

<img style="max-width:30%;" src="/images/bbb.webp" alt="Третий скриншот" title="Третий скриншот">

</div>

</div>
</div>
-->

<?




$user['p_str'] = 10;

$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `film_comments` where `comment_film` = '".$filmi['film_id']."'"),0);
$k_page = k_page($k_post,$user['p_str']);
$page = page($k_page);
$start = $user['p_str']*$page-$user['p_str'];

$info = mysql_query("SELECT * FROM `film_comments` where `comment_film` = '".$filmi['film_id']."' ORDER BY `comment_id` DESC LIMIT $start, $user[p_str]");
?>



<?
if (isset($usernm)) {
?>


<div class="widgets-group widgets-group_top mb0"> 
<form method="post" action="/watch.php?id=<?php echo $filmi['film_id'];?>" id="add_form" class="js-toolbar_wrap js-attaches_form js-attach_dnd" style="padding: 0 !important; border: 0 !important; ">
<div class="upload-dnd_msg"><div class="js-dnd_msg"></div></div> 
<div class="stnd-block content-bl__sep3 default_txt">  
<div class="text-input__wrap js-textarea_wrapper"> 
<textarea rows="1" cols="17" name="message" class="js-autofocus text-block form_submit text-input placeholder form_submit js-resize_ta" placeholder="Оставить комментарий" style="margin-top: 0px; margin-bottom: 0px; height: 99px;resize:none;"></textarea> <div class="btn-tools btn-tools_centered js-lock_open" style="display: none" title="Ответить персонально"> <span class="ico_chat ico_lock"></span> </div> <div class="btn-tools btn-tools_centered js-lock_close" style="display: none" title="Ответить приватно"> <span class="ico_chat ico_lock_open"></span> </div> </div> 
<div class="pad_t_a hide" id="chat_captcha">  </div> 
<div class="form-tools o_vis cf"> 
<div class="right">  
<input style="margin-left:5px;" type="submit" name="cfms" id="mainSubmitForm" class="btn" value="Отправить">  
</div> 

<div class="cl"></div> 
</div> 

</div> 
</form> 
</div>

<?
}
?>

<div style="margin-top:12px;"> </div>





<div class=" js-comments_wrap comm_list">   


    
		
<?



while ($infoc = mysql_fetch_assoc($info)) {

$user123 = SQL_Fetch("SELECT * FROM persons WHERE user_id = ?",array($infoc['comment_user']))->fetch();

?>	

<div>
<div class="comm shdw text cf">    
<div>  

<div>  
<div>   
<div class="block-item__avatar block-item__avatar_small">      
<img src="/images/photos/160/<?php echo $user123['photo_id'];?>"  class="preview s41_40">                
</div>   
 
<span class="comment_date">  
    <?php echo post_time($infoc['comment_time']);?> 
</span> 
 
<div> 
<span class="user__nick text-block12">  
<span class="inl_bl m"> 

<?php echo onluser($user123['user_id']); ?>

<a href="/profile.php?id=<?php echo $user123['user_id'];?>" class="mysite-link">
<b class="mysite-nick black"> <?php echo $user123['user_nick'];?> </b>
</a>
  
</span>  
</span>    
</div> 
</div>  
</div>  
<div class="cl"></div> 
</div>  
<div class="hide js-comm_menu"></div>  
<div class="cl pad_t_a">     
<div class="text-block11 nl"> 
<span>
<?php echo show_text($infoc['comment_text']); ?>
</span>  
</div>     
</div>  
 
<div class="slb comm_service">  
<a href="#" class="inl-link link-grey js-comm_reply">Ответить</a>     
<div class="cl"></div> 
</div> 
  
</div> 
</div>    
           
    
<?

}

?>	  

 <?

if ($k_page>1)str("?id=$filmi[film_id]",$k_page,$page); 

?>  
       
  
      </div>
	  
  
 
	  

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


<script>


function ser_watch() {


	 
$('#simple-episodes-list').on('click','.b-simple_episode__item',function() {
	
var _selfs = $(this);

var lnks = _selfs.attr("id");

var ids = _selfs.attr("datalink_ser");

var vids1 = $("#vid_plr");

vids1.attr("src",ids);


});



}




function scrolltoactive() {
    if ( $("div").is("#simple-episodes-tabs") ) {
        if ( ($('#videoplayer719').width() - 30) < document.getElementById('simple-episodes-tabs').scrollWidth ) {
            $('#simple-episodes-tabs').scrollTo($("#simple-episodes-list > .active"), 300);
        } else {
            $('.prevpl').hide();
            $('.nextpl').hide();
            $('#simple-episodes-tabs').css({'margin':'0px 5px'});
        }
    }
}
function prevpl(){
    var scroll = $('#videoplayer719').width()/2;
    $('#simple-episodes-tabs').scrollTo("-=" + scroll + "px", 300);
}
function nextpl(){
    var scroll = $('#videoplayer719').width()/2;
    $('#simple-episodes-tabs').scrollTo("+=" + scroll + "px", 300);
}




;(function(f){"use strict";"function"===typeof define&&define.amd?define(["jquery"],f):"undefined"!==typeof module&&module.exports?module.exports=f(require("jquery")):f(jQuery)})(function($){"use strict";function n(a){return!a.nodeName||-1!==$.inArray(a.nodeName.toLowerCase(),["iframe","#document","html","body"])}function h(a){return $.isFunction(a)||$.isPlainObject(a)?a:{top:a,left:a}}var p=$.scrollTo=function(a,d,b){return $(window).scrollTo(a,d,b)};p.defaults={axis:"xy",duration:0,limit:!0};$.fn.scrollTo=function(a,d,b){"object"=== typeof d&&(b=d,d=0);"function"===typeof b&&(b={onAfter:b});"max"===a&&(a=9E9);b=$.extend({},p.defaults,b);d=d||b.duration;var u=b.queue&&1<b.axis.length;u&&(d/=2);b.offset=h(b.offset);b.over=h(b.over);return this.each(function(){function k(a){var k=$.extend({},b,{queue:!0,duration:d,complete:a&&function(){a.call(q,e,b)}});r.animate(f,k)}if(null!==a){var l=n(this),q=l?this.contentWindow||window:this,r=$(q),e=a,f={},t;switch(typeof e){case "number":case "string":if(/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(e)){e= h(e);break}e=l?$(e):$(e,q);case "object":if(e.length===0)return;if(e.is||e.style)t=(e=$(e)).offset()}var v=$.isFunction(b.offset)&&b.offset(q,e)||b.offset;$.each(b.axis.split(""),function(a,c){var d="x"===c?"Left":"Top",m=d.toLowerCase(),g="scroll"+d,h=r[g](),n=p.max(q,c);t?(f[g]=t[m]+(l?0:h-r.offset()[m]),b.margin&&(f[g]-=parseInt(e.css("margin"+d),10)||0,f[g]-=parseInt(e.css("border"+d+"Width"),10)||0),f[g]+=v[m]||0,b.over[m]&&(f[g]+=e["x"===c?"width":"height"]()*b.over[m])):(d=e[m],f[g]=d.slice&& "%"===d.slice(-1)?parseFloat(d)/100*n:d);b.limit&&/^\d+$/.test(f[g])&&(f[g]=0>=f[g]?0:Math.min(f[g],n));!a&&1<b.axis.length&&(h===f[g]?f={}:u&&(k(b.onAfterFirst),f={}))});k(b.onAfter)}})};p.max=function(a,d){var b="x"===d?"Width":"Height",h="scroll"+b;if(!n(a))return a[h]-$(a)[b.toLowerCase()]();var b="client"+b,k=a.ownerDocument||a.document,l=k.documentElement,k=k.body;return Math.max(l[h],k[h])-Math.min(l[b],k[b])};$.Tween.propHooks.scrollLeft=$.Tween.propHooks.scrollTop={get:function(a){return $(a.elem)[a.prop]()}, set:function(a){var d=this.get(a);if(a.options.interrupt&&a._last&&a._last!==d)return $(a.elem).stop();var b=Math.round(a.now);d!==b&&($(a.elem)[a.prop](b),a._last=this.get(a))}};return p});

</script>



<?
include("inc/foot.php");
?>


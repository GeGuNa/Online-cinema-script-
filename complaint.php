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


<div id="moder_block"></div>  <div class="relative"> <div id="location_header">  <div class="location-bar" id="header_path">  <span class="location-bar__item location-bar__item_home"> <a href="/index.php" class="location-bar__home-link ico"></a> <span class="location-bar__sep ico"></span> </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <a href="/profile.php?id=<?php echo $usrname['user_id'];?>" id="location_bar_1_0" class=""> <span><?php echo show_text($usrname['user_nick']);?></span> </a>   <span class="location-bar__sep ico"></span>   </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <span id="location_bar_1_1" class="location-bar__title"> <span>Жалоба</span> </span>    </span>   </div>  </div> <div id="top_notif_place" class="top_notif_place">    </div> </div> <div> <div class="oh"></div> 


<div id="main_content">  
<div id="main">  


 <div class="widgets-group widgets-group_top wbg"> 
 <form action="/complaint.php?id=<?php echo $usrname['user_id'];?>" method="post" style=" padding: 0 !important; border: 0 !important;"> 
	
	<div class="b-title b-title_center b-title_first"> <div class="b-title__item"> Сообщить о нарушении </div> </div> <div class="text content-bl content-item_info content-bl_first"> Внимание! Если у вас выманивают деньги под любым предлогом, зайдите в почту и отправьте жалобу на конкретное сообщение от мошенника. Это можно сделать с помощью кнопки "Блок". </div> <div class="static-bl"> <div class="text"> <label class="label">Причина:</label>       <label for="Reason29" class="form-checkbox js-radio js-radio-Reason form-checkbox_checked"> <div class="form-checkbox__label"> <input type="radio" class="form-checkbox__el" name="Reason" id="Reason29" value="29"> Ненастоящее фото </div>  </label>  <label for="Reason3" class="form-checkbox js-radio js-radio-Reason"> <div class="form-checkbox__label"> <input type="radio" class="form-checkbox__el" name="Reason" id="Reason3" value="3"> СПАМ, реклама </div>  </label>  <label for="Reason12" class="form-checkbox js-radio js-radio-Reason"> <div class="form-checkbox__label"> <input type="radio" class="form-checkbox__el" name="Reason" id="Reason12" value="12"> Мошенничество </div>  </label>  <label for="Reason30" class="form-checkbox js-radio js-radio-Reason"> <div class="form-checkbox__label"> <input type="radio" class="form-checkbox__el" name="Reason" id="Reason30" value="30"> Выманивание денег </div>  </label>  <label for="Reason6" class="form-checkbox js-radio js-radio-Reason"> <div class="form-checkbox__label"> <input type="radio" class="form-checkbox__el" name="Reason" id="Reason6" value="6"> Иное </div>  </label>   <script type="text/javascript">require('form')</script>   </div> <div class="pad_t_a error__item_wrapper"> <label class="label text">Комментарий:</label>  <div class="js-input_error_wrap">   <div class="text-input__wrap relative">  <div class="cf"><div class="toolbar__wrap"><table class="toolbar table__wrap hide"><tbody><tr class=""><td class="table__cell"><a href="#l1559049949304quote" data-no_label="1" class="list-link js-bb_quote" title="Цитата" data-tag="quote"><span class="ico_mail ico_mail_quote"></span></a></td><td class="table__cell"><a href="#l1559049949304url" data-no_label="1" class="list-link js-bb_url" title="Ссылка" data-tag="url"><span class="ico_mail ico_mail_link"></span></a></td><td class="table__cell"><a href="#l1559049949304pic" data-no_label="1" class="list-link js-bb_pic" title="Вставить" data-tag="pic"><span class="ico ico_plus_grey"></span></a></td><td class="table__cell"><a href="#l1559049949304color" data-no_label="1" class="list-link js-bb_color" title="Цвет шрифта" data-tag="color"><span class="ico_mail ico_mail_color"></span></a></td><td class="table__cell"><a href="#l1559049949304b" data-no_label="1" class="list-link js-bb_b" title="Жирный шрифт" data-tag="b"><span class="ico_mail ico_mail_bold"></span></a></td><td class="table__cell"><a href="#l1559049949304i" data-no_label="1" class="list-link js-bb_i" title="Наклонный шрифт" data-tag="i"><span class="ico_mail ico_mail_italic"></span></a></td><td class="table__cell"><a href="#l1559049949304u" data-no_label="1" class="list-link js-bb_u" title="Подчеркнутый шрифт" data-tag="u"><span class="ico_mail ico_mail_underline"></span></a></td><td class="table__cell"><a href="#l1559049949304s" data-no_label="1" class="list-link js-bb_s" title="Зачеркнутый шрифт" data-tag="s"><span class="ico_mail ico_mail_strike"></span></a></td><td class="table__cell"><a href="#l1559049949304smile" data-no_label="1" class="list-link js-bb_smile" title="Смайлы" data-tag="smile"><span class="ico ico_smile"></span></a></td><td class="table__cell"><a href="#l1559049949304code" data-no_label="1" class="list-link js-bb_code" title="Код" data-tag="code"><span class="ico_mail ico_mail_code"></span></a></td><td class="table__cell"><a href="#l1559049949304fon" data-no_label="1" class="list-link js-bb_fon" title="Цвет фона" data-tag="fon"><span class="ico_mail ico_mail_background"></span></a></td><td class="table__cell hide"><a href="#l1559049949304more" data-no_label="1" class="list-link js-bb_more" title="Ещё" data-tag="more"><span class="ico ico_more"></span></a></td></tr><tr class="hide"></tr><tr class="hide"></tr><tr class="hide"></tr></tbody></table></div><div class="hide"><span class="js-bb_hid_attach"></span></div><div class="js-bb_smile_menu smiles_menu hide"></div><div class="hide spoiler_inject" id="ddspoiler_tb_1559049949303"></div><div class="js-bb_menu" style="position:relative;display:none"></div></div><textarea data-toolbar="{hide:true}" rows="3" cols="17" name="comment" class="text-input" data-maxlength="1000"></textarea><span class="right cntBl"><span class="js-bb_counter">0</span>/1000</span>     </div>  <div class="js-input_error error__msg hide"></div>   </div>  <script type="text/javascript">require(['form', 'text_restore','form_toolbar'])</script>   </div>  <input type="hidden" name="Link_id" value="1537907">  <input type="hidden" name="r" value="mysite/complaint">  <input type="hidden" name="from" value="dating">  <input type="hidden" name="CK" value="4510">  </div> <div class="user__tools user__tools_last bt0"> <table class="table__wrap om_bord_fix"> <tbody><tr> <td width="50%" class="table__cell"> <!-- --><!-- --><!-- --><button name="cfms" value="Отправить" class="  user__tools-link  list-link-blue    "><!-- --><!-- --><!-- --><span class="js-ico ico ico_ok_blue"></span> <!-- --><!-- --><span class="js-btn_val"><!-- -->Отправить<!-- --></span><!-- --><!-- --></button><!-- --> </td> <td width="50%" class="table__cell table__cell_last js-close_settings_form">       <a href="https://spcs.me/anketa/anketa/dating/?Ai=1&amp;Link_id=1534826&amp;q=4ce880d6ba54d0da769a7b85507e8b60&amp;user=Liza54" class="    stnd-link                 "> Отменить  </a>      </td> </tr> </tbody></table> </div> </form> </div> 


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


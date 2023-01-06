<?
include("inc/system.php");
include("inc/funcs.php");
include("inc/head.php");


if (isset($usernm)) {
header("Location: /index.php");
exit;
}

if (isset($_POST['cfms']))
{

if (length($_POST['password'])<6)$err='Пароль должен содержать от 6 до 32 символов!!!';
if (length($_POST['password'])>32)$err='Пароль должен содержать от 6 до 32 символов!!!';

if (length($_POST['nickname'])<3)$err='Слишком короткий логин!!!';
if (length($_POST['nickname'])>32)$err='Слишком длинный логин!!!';


if (!isset($err)) {

$nicks = SQL_Fetch("SELECT * FROM persons where user_nick = ? and password = ?", array(punctuaterplc($_POST['nickname']),punctuaterplc($_POST['password'])));

if ($nicks->rowCount()== 0) {
$err='Неверный логин или пароль.';
} else {

$niki = $nicks->fetch(PDO::FETCH_ASSOC);

$_SESSION['nickname'] = punctuaterplc($niki['user_nick']);
$_SESSION['password'] = punctuaterplc($niki['password']);


setcookie("nickname", punctuaterplc($niki['user_nick']), time()+60*60*24*7, "/");  
setcookie("password", punctuaterplc($niki['password']), time()+60*60*24*7, "/"); 


SQL_Exec("INSERT INTO user_logs(user, date, browser, user_ip) VALUES(?,?,?,?);", array($niki['user_id'],$_SERVER['REQUEST_TIME'], punctuaterplc($_SERVER['HTTP_USER_AGENT']), ip2long($_SERVER['REMOTE_ADDR'])));	

header("location: /index.php");
exit;

}	
	
}


}

?>


 <?
include("inc/header.php");
?>

<div class="content-wrapper" style="min-height: 380.266px;">


<div class="relative"> 
<div id="location_header">  <div class="location-bar location-bar_no-break" id="header_path">  <span class="location-bar__item location-bar__item_home"> <a href="/index.php" class="location-bar__home-link ico"></a> <span class="location-bar__sep ico"></span> </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <span id="location_bar_1_0" class="location-bar__title no_max_width"> <span>Вход</span> </span>    </span>   </div>  </div> <div id="top_notif_place" class="top_notif_place">    </div> 
</div>

<!--
<div class="oh t_center nl system-message system-message_service">  Изменения сохранены. </div>
-->

<div id="main_content" style="min-height: 90.625px;">



<div id="main">      

<div class="mt_big">  
<div class="tabs"> 
<table class="table__wrap">
<tbody>
<tr>   
<td class="table__cell  tabs__item clicked  " width="50%">  <span class="tabs__link">  Вход    </span>  </td>  
<td class="table__cell  tabs__item   " width="50%">  <a href="/registration.php" class="tabs__link">  Регистрация    </a>  </td>  
</tr> 
</tbody>
</table>
</div>  </div>  

<div class="widgets-group widgets-group_top nl wbg">  

<? if(isset($err)) { ?>
<div class="stnd-block pdb">  <div class="stnd-block error__msg nl"> <?php echo $err;?>.<br>    </div>  </div>
<? } ?>

<form action="/login.php" method="post" class="no_ajax"> 

<div class="content-item3 error__item_wrapper first pdb">  
<div class="js-input_error_wrap">   
<div class="text-input__wrap relative">  
<input placeholder="Ваш ник" class="text-input" type="text" name="nickname" value="" maxlength="32">      
</div>  
<div class="js-input_error error__msg hide"></div>  
</div>    
</div> 

<div class="content-item3 error__item_wrapper pdb">    
<div class="js-input_error_wrap">  
<div class="text-input__wrap"> 
<input class="text-input" type="password" name="password" value="" placeholder="Ваш пароль" maxlength="32">   
</div>  
<div class="js-input_error error__msg hide"></div> 
</div>  
</div>  

<div class="content-item3"> 
<div> 
<button name="cfms" value="Войти" class="  btn btn_green     btn_full btn_full_fix content-bl__sep ">
<span class="js-ico ico ico_key_white"></span> 
<span class="js-btn_val">Войти</span>
</button> 
</div>  
 
</div>

</form>   

</div>  


<div class="widgets-group donotblockme"> <div class="list f-c_fll">          <a href="/recovery.php" class="list-link list-link-darkblue c-darkblue"> <span class="js-ico  ico ico_lock_darkblue "></span> <span class="t js-text">Не можете войти?</span>  </a>          </div>    </div>

 
</div>


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





		


<?
include("inc/foot.php");
?>

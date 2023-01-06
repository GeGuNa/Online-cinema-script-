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


if (length($_POST['firstname'])<3)$err='Имя не может быть менее 3 символов!!!';
if (length($_POST['firstname'])>32)$err='Имя не может быть более 32 символов!!!';

if (length($_POST['lastname'])<3)$err='Фамилия не может быть менее 3 символов!!!';
if (length($_POST['lastname'])>32)$err='Фамилия не может быть более 32 символов!!!';

if (length($_POST['password'])<6)$err='Пароль должен содержать от 6 до 32 символов!!!';
if (length($_POST['password'])>32)$err='Пароль должен содержать от 6 до 32 символов!!!';

if (length($_POST['nickname'])<3)$err='Слишком короткий логин, пожалуйста придумайте другой!!!';
if (length($_POST['nickname'])>32)$err='Слишком длинный логин, он не должен превышать 32 символов!!!';

	if (preg_match("#(^\ )|(\ $)#ui", $_POST['password'])){
		$err = "Запрещено использовать пробел в начале и конце пароля!";
	}
	
	if (preg_match("#(^\ )|(\ $)#ui", $_POST['nickname'])){
		$err = "Запрещено использовать пробел в начале и конце ника!";
	}

/*
	if (!preg_match('#^([A-zА-я0-9\-\_])+$#ui', $family)){
		$err = "В фамилии присутствуют запрещёные символы";
	}

	# Пароль не больше 25 символов и не меньше 5 символов
	if(mb_strlen($pass) > 25 or mb_strlen($pass) < 8){
		$err = "Введите пароль от 8 до 25 символов!";
	}
*/

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))$err='Некорректное имя почтового ящика';

if (!preg_match ('/^[a-zA-Z\p{Cyrillic}\d\s\-]+$/u', $_POST['nickname']))$err='Неверный логин, разрешено использовать только латинские и русские буквы и цифры.';


if (!isset($err)) {

if (SQL_Fetch("SELECT * FROM persons where user_name = ?", array(punctuaterplc($_POST['nickname'])))->rowCount()>0) {
$err='Логин уже занят';
}	
	
}


if (!isset($err)) {

SQL_Exec("INSERT INTO persons(user_name, user_surn, user_nick, user_status, user_coins,  user_reg_time, user_on_time, email, password) VALUES(?,?,?,?,?,?,?,?,?);", array(punctuaterplc($_POST['firstname']),punctuaterplc($_POST['lastname']),punctuaterplc($_POST['nickname']), "test", 0, $_SERVER['REQUEST_TIME'], 0, punctuaterplc($_POST['email']), punctuaterplc($_POST['password'])));	
	
	
$_SESSION['nickname'] = punctuaterplc($_POST['nickname']);
$_SESSION['password'] = punctuaterplc($_POST['password']);


setcookie("nickname", punctuaterplc($_POST['nickname']), time()+60*60*24*7, "/");  
setcookie("password", punctuaterplc($_POST['password']), time()+60*60*24*7, "/"); 	

header("Location: /index.php");
exit;
	
}

}


?>


 <?
include("inc/header.php");
?>

<div class="content-wrapper" style="min-height: 380.266px;">


<div class="relative"> <div id="location_header">  <div class="location-bar location-bar_no-break" id="header_path">  <span class="location-bar__item location-bar__item_home"> <a href="/index.php" class="location-bar__home-link ico"></a> <span class="location-bar__sep ico"></span> </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <span id="location_bar_1_0" class="location-bar__title no_max_width"> <span>Регистрация</span> </span>     </span>   </div>  </div> <div id="top_notif_place" class="top_notif_place">    </div> </div>

<!--
<div class="oh t_center nl system-message system-message_service">  Изменения сохранены. </div>
-->


<div id="main_content" style="min-height: 90.625px;">
<div id="main">   

<div class="mt_big">  <div class="tabs"> <table class="table__wrap"> <tbody><tr>   <td class="table__cell  tabs__item   " width="50%">  <a href="/login.php" class="tabs__link">  Вход    </a>  </td>  <td class="table__cell  tabs__item clicked  " width="50%">  <span class="tabs__link">  Регистрация    </span>  </td>  </tr> </tbody></table>      </div>  </div>





<div class="widgets-group widgets-group_top wbg"> 


<? if(isset($err)) { ?>
<div class="stnd-block pdb">  <div class="stnd-block error__msg nl"> <?php echo $err;?>.<br>  </div>  </div>
<? } ?>

<form action="/registration.php" method="post"> 

<div class="static-bl"> 

<div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  <label class="label"> Имя: <div class="label__desc">от 3 до 32</div> </label>   <div class="text-input__wrap relative">  <input class="text-input" type="text" name="firstname" value="" maxlength="32" placeholder="Введите ваше имя">      </div>  <div class="js-input_error error__msg hide"></div>   </div>  </div> 


<div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  <label class="label"> Фамилия: <div class="label__desc">от 3 до 32</div> </label>   <div class="text-input__wrap relative">  <input class="text-input" type="text" name="lastname" value="" maxlength="32" placeholder="Введите вашу фамилию">      </div>  <div class="js-input_error error__msg hide"></div>   </div>  </div> 

<div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  <label class="label"> Логин: <div class="label__desc">от 3 до 32</div> </label>   <div class="text-input__wrap relative">  <input class="text-input" type="text" name="nickname" value="" maxlength="32" placeholder="Введите логин">      </div>  <div class="js-input_error error__msg hide"></div>   </div>    </div> 

<div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  <label class="label"> Пароль: <div class="label__desc">от 6 до 32</div> </label>   <div class="text-input__wrap relative">  <input class="text-input" type="text" name="password" value="" maxlength="32" placeholder="Введите пароль">      </div>  <div class="js-input_error error__msg hide"></div>   </div>     </div> 

<div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  <label class="label"> E-Mail: </label>   <div class="text-input__wrap relative">  <input class="text-input" type="text" name="email" value="" maxlength="100" placeholder="Введите ваш email">      </div>  <div class="js-input_error error__msg hide"></div>   </div>  </div> 


</div> 

<div class="user__tools user__tools_last bt0"> 
<table class="table__wrap"> 
<tbody>
<tr> 
<td width="50%" class="table__cell"> <button name="cfms" value="Сохранить" class="  user__tools-link  list-link-blue    "><span class="js-ico ico ico_ok_blue"></span> <span class="js-btn_val">Сохранить</span></button> </td> 
<td width="50%" class="table__cell table__cell_last js-close_settings_form">       <a href="#" class="stnd-link"> Отменить  </a>      </td> 
</tr> 
</tbody>
</table> 

</div> 
</form> 
</div> 
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

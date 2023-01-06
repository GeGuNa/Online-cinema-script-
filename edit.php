<?

include("inc/system.php");
include("inc/funcs.php");
include("inc/head.php");


if (!isset($usernm)) {
header("Location: /index.php");
exit;
}



if (isset($_POST['cfms']))
{
		
		
if (length($_POST['firstname'])>50){header("Location: /index.php"); exit;}
if (length($_POST['lastname'])>50){header("Location: /index.php"); exit;}

if (length($_POST['city_of_birth'])>50){header("Location: /index.php"); exit;}		
if (length($_POST['current_city'])>50){header("Location: /index.php"); exit;}	
if (length($_POST['profession'])>50){header("Location: /index.php"); exit;}	
if (length($_POST['my_info'])>300){header("Location: /index.php"); exit;}	





$dgee=abs((int)$_POST['dayofbirth']);
$tvee=abs((int)$_POST['dayofmonth']);
$welii=abs((int)$_POST['dayofyear']);

if (!in_array($_POST['gender'], array("male","female"))){header("Location: /index.php"); exit;}


if ($welii<1960 || $welii>2014)$err='Dafiqsirda shecdoma'; 

if ($tvee<1 || $tvee>12)$err='Dafiqsirda shecdoma'; 

if ($tvee==1){if ($dgee<1 || $dgee>31)$err='Dafiqsirda shecdoma';}
if ($tvee==2){if ($dgee<1 || $dgee>29)$err='Dafiqsirda shecdoma';}
if ($tvee==3){if ($dgee<1 || $dgee>31)$err='Dafiqsirda shecdoma';}
if ($tvee==4){if ($dgee<1 || $dgee>30)$err='Dafiqsirda shecdoma';}
if ($tvee==5){if ($dgee<1 || $dgee>31)$err='Dafiqsirda shecdoma';}
if ($tvee==6){if ($dgee<1 || $dgee>30)$err='Dafiqsirda shecdoma';}
if ($tvee==7){if ($dgee<1 || $dgee>31)$err='Dafiqsirda shecdoma';}
if ($tvee==8){if ($dgee<1 || $dgee>31)$err='Dafiqsirda shecdoma';}
if ($tvee==9){if ($dgee<1 || $dgee>30)$err='Dafiqsirda shecdoma';}
if ($tvee==10){if ($dgee<1 || $dgee>31)$err='Dafiqsirda shecdoma';}
if ($tvee==11){if ($dgee<1 || $dgee>30)$err='Dafiqsirda shecdoma';}
if ($tvee==12){if ($dgee<1 || $dgee>31)$err='Dafiqsirda shecdoma';}	


if (!isset($err)) {
	
	
SQL_Exec("UPDATE persons SET user_name = ?, user_surn = ?, user_birth_day = ?, user_birth_month = ?, user_birth_year = ?, profession = ?, birth_city = ?, current_city = ?, gender = ?, my_info = ?  where  user_id  = ?", array(punctuaterplc($_POST['firstname']), punctuaterplc($_POST['lastname']), $dgee, $tvee, $welii, punctuaterplc($_POST['profession']), punctuaterplc($_POST['city_of_birth']), punctuaterplc($_POST['current_city']), punctuaterplc($_POST['gender']), punctuaterplc($_POST['my_info']), $usernm['user_id']));

header("Location: /edit.php");
exit;

	
}

	
}


$ainfo1 = (length($usernm['user_name'])>0 ? show_text($usernm['user_name']) : null);
$ainfo2 = (length($usernm['user_surn'])>0 ? show_text($usernm['user_surn']) : null);
$ainfo3 = (length($usernm['user_birth_day'])>0 ? show_text($usernm['user_birth_day']) : null);
$ainfo4 = (length($usernm['user_birth_month'])>0 ? show_text($usernm['user_birth_month']) : null);
$ainfo5 = (length($usernm['user_birth_year'])>0 ? show_text($usernm['user_birth_year']) : null);
$ainfo6 = (length($usernm['profession'])>0 ? show_text($usernm['profession']) : null);
$ainfo7 = (length($usernm['birth_city'])>0 ? show_text($usernm['birth_city']) : null);
$ainfo8 = (length($usernm['current_city'])>0 ? show_text($usernm['current_city']) : null);
$ainfo9 = (length($usernm['gender'])>0 ? show_text($usernm['gender']) : null);
$ainfo10 =  (length($usernm['my_info'])>0 ? show_text($usernm['my_info']) : null);




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


<div id="moder_block"></div>  <div class="relative"> <div id="location_header">  <div class="location-bar" id="header_path">  <span class="location-bar__item location-bar__item_home"> <a href="/index.php" class="location-bar__home-link ico"></a> <span class="location-bar__sep ico"></span> </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <a href="/profile.php?id=<?php echo $usernm['user_id'];?>" id="location_bar_1_0" class=""> <span><?php echo show_text($usernm['user_nick']);?></span> </a>    <span class="location-bar__sep ico"></span>   </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <span id="location_bar_1_1" class="location-bar__title"> <span>Анкета</span> </span>     </span>   </div>  </div> <div id="top_notif_place" class="top_notif_place">    </div> </div> <div> <div class="oh"></div> 


<div id="main_content">  
<div id="main">  


<div>


<form method="post" action="/edit.php" style="padding: 0 !important; "> 
<div class="widgets-group widgets-group_top">   
<div class="content-item3 wbg pdb"> 


 

<div class="form__item error__item_wrapper">  
<div class="js-input_error_wrap">  
<label class="label"> Имя:  </label>  


<div class="text-input__wrap relative">  
<input placeholder="Введите ваше имя" class="text-input" type="text" name="firstname" value="<?php echo $ainfo1;?>" maxlength="50">      
</div>  
<div class="js-input_error error__msg hide"></div>  
</div>  
</div>   



<div class="form__item error__item_wrapper">  
<div class="js-input_error_wrap">  
<label class="label"> Фамилия:  </label>   
<div class="text-input__wrap relative">  
<input placeholder="Введите вашу фамилию" class="text-input" type="text" name="lastname" value="<?php echo $ainfo2;?>" maxlength="50">     
</div>  
<div class="js-input_error error__msg hide"></div>   
</div>  
</div>


<div class="form__item error__item_wrapper">  
<div class="js-input_error_wrap">  
<label class="label"> Пол:  </label>   
<div class="text-input__wrap relative">  
<select name="gender" class="text-input" style="max-width:100%;">
<option <?php echo (($ainfo9=="male"?" selected='selected'":null));?> value="male">Мужской</option>
<option <?php echo (($ainfo9=="female"?" selected='selected'":null));?> value="female">Женский</option>
</select>   
</div>  <div class="js-input_error error__msg hide"></div>   
</div>   
</div>


<div>

<span class="select_custom">
<div class="form__item error__item_wrapper">  
<div class="js-input_error_wrap">  
<label class="label"> Дата рождения:  </label>   
<div class="text-input__wrap relative">  
<select name="dayofbirth" class="text-input">
<option value="">День</option>
<?
for ($dge=1;$dge<32;$dge++)
{
echo "<option value='".$dge."'".($usernm['user_birth_day']==$dge?" selected='selected'":null).">".$dge."</option>";
}
?>
</select>   
</div>  <div class="js-input_error error__msg hide"></div>   
</div>   
</div>
</span>

<span class="select_custom">
<div class="form__item error__item_wrapper">  
<div class="js-input_error_wrap">    
<div class="text-input__wrap relative">  
<select name="dayofmonth" class="text-input">
<option value="">Месяц</option>
<?
for ($tve=1;$tve<13;$tve++)
{
echo "<option value='".$tve."'".($usernm['user_birth_month']==$tve?" selected='selected'":null).">".$tve."</option>";
}
?>
</select>    
</div>  <div class="js-input_error error__msg hide"></div>   
</div>   
</div>
</span>

<span class="select_custom">
<div class="form__item error__item_wrapper">  
<div class="js-input_error_wrap">   
<div class="text-input__wrap relative">  
<select name="dayofyear" class="text-input">
<option value="">Год</option>
<?
for ($weli=date("Y"); $weli>1960;$weli--)
{
echo "<option value='".$weli."'".($usernm['user_birth_year']==$weli?" selected='selected'":null).">".$weli."</option>";
}
?>
</select>   
</div>  <div class="js-input_error error__msg hide"></div>   
</div>   
</div>
</span>

</div>
 
 <div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  <label class="label"> Родной город:  </label>   <div class="text-input__wrap relative">  <input placeholder="Название города" class="text-input" type="text" name="city_of_birth" value="<?php echo $ainfo7; ?>" maxlength="50">      </div>  <div class="js-input_error error__msg hide"></div>   </div>    </div>


 <div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  <label class="label"> Место проживания:  </label>   <div class="text-input__wrap relative">  <input placeholder="Название страны или города" class="text-input" type="text" name="current_city" value="<?php echo $ainfo8; ?>" maxlength="50">      </div>  <div class="js-input_error error__msg hide"></div>   </div>    </div>

 <div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  <label class="label"> Профессия:
  </label>   <div class="text-input__wrap relative">  <input class="text-input" type="text" name="profession" value="<?php echo $ainfo6; ?>" maxlength="50">      </div>  <div class="js-input_error error__msg hide"></div>   </div>    </div>



 <div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  <label class="label"> E-mail:
  </label>   <div class="text-input__wrap relative">  <input class="text-input" type="text" value="<?php echo $usernm['email'];?>">      </div>  <div class="js-input_error error__msg hide"></div>   </div>    </div>


 <div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  <label class="label"> О себе
  </label>   <div class="text-input__wrap relative">  
  <textarea name="my_info" class="text-input" placeholder="Расскажите о себе" style="resize:none;" maxlength="300"> <?php echo $ainfo10; ?> </textarea>      </div>  <div class="js-input_error error__msg hide"></div>   </div>    </div>




  </div>  


<div class="user__tools user__tools_last"> <table class="table__wrap"> <tbody><tr> <td width="50%" class="table__cell"> <button type="submit" name="cfms" class="user__tools-link stnd-link_important" value="1"><span class="ico ico_ok_blue"></span> Сохранить</button> </td> <td width="50%" class="table__cell table__cell_last">       <a href="/profile.php?id=<?php echo $usernm['user_id'];?>" class="    stnd-link                 "> Отменить  </a>      </td> </tr> </tbody></table> </div>


</div> 
  </form>
 
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


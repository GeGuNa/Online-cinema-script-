<?

include("inc/system.php");
include("inc/funcs.php");
include("inc/head.php");


if (!isset($usernm)) {
header("Location: /index.php");
exit;
}



if (isset($_POST['cfms'])) {
	
	
	
	
	
$filetpe = end(explode('.', $_FILES['myFoto']['name']));

if (isset($_FILES['screen1']['name'])){
$filetpe1 = end(explode('.', $_FILES['screen1']['name']));
$filetpe2 = end(explode('.', $_FILES['screen2']['name']));
$filetpe3 = end(explode('.', $_FILES['screen3']['name']));
}	



if (!in_array($filetpe, array('jpg', 'jpeg', 'JPG', 'JPEG')))
{	 
header("Location: /index.php");
exit;
}

if (strlen($_FILES['screen1']['name'])>5){
	
if (!in_array($filetpe1, array('jpg', 'jpeg', 'JPG', 'JPEG')))
{	 
header("Location: /index.php");
exit;
}

if (!in_array($filetpe2, array('jpg', 'jpeg', 'JPG', 'JPEG')))
{	 
header("Location: /index.php");
exit;
}

if (!in_array($filetpe3, array('jpg', 'jpeg', 'JPG', 'JPEG')))
{	 
header("Location: /index.php");
exit;
}

}

$imageupl = getimagesize($_FILES['myFoto']['tmp_name']);

if (isset($_FILES['screen1']['name'])){
$screen1 = getimagesize($_FILES['screen1']['tmp_name']);
$screen2 = getimagesize($_FILES['screen2']['tmp_name']);
$screen3 = getimagesize($_FILES['screen3']['tmp_name']);
}



$query2 = SQL_Qeury("SELECT * FROM `films` ORDER BY `film_id` DESC LIMIT 1");
$infs = $query2->fetch();





	
	$width='200';
	$height='300';
	$size = getimagesize($_FILES['myFoto']['tmp_name']);
	$w = $size[0];
	$h = $size[1];
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	$path = ''.$_SERVER['DOCUMENT_ROOT'].'/images/films/'.($infs['film_id']+1).'.jpg';
	$imgString = file_get_contents($_FILES['myFoto']['tmp_name']);
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
	imagejpeg($tmp, $path, 100);
	imagedestroy($image);
	imagedestroy($tmp);
	

	
if (isset($_FILES['screen1']['name'])){
	
$zaa = rand(1,9999999);	


$flms1 = ($zaa+1).'_'.($infs['film_id']+1).'.jpg';
$flms2 = ($zaa+2).'_'.($infs['film_id']+1).'.jpg'; 
$flms3 = ($zaa+3).'_'.($infs['film_id']+1).'.jpg';


mysql_query("INSERT INTO `film_screen` (`film_id`, `screen_url`) VALUES ('".abs($infs['film_id']+1)."','".$flms1."')");
mysql_query("INSERT INTO `film_screen` (`film_id`, `screen_url`) VALUES ('".abs($infs['film_id']+1)."','".$flms2."')");
mysql_query("INSERT INTO `film_screen` (`film_id`, `screen_url`) VALUES ('".abs($infs['film_id']+1)."','".$flms3."')");
		
	


	
	$width=$screen1[0];
	$height=$screen1[1];
	$size = getimagesize($_FILES['screen1']['tmp_name']);
	$w = $size[0];
	$h = $size[1];
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	$path = ''.$_SERVER['DOCUMENT_ROOT'].'/images/screens/'.$flms1.'';
	$imgString = file_get_contents($_FILES['screen1']['tmp_name']);
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
	imagejpeg($tmp, $path, 100);
	imagedestroy($image);
	imagedestroy($tmp);
	

	
	$width=$screen2[0];
	$height=$screen2[1];
	$size = getimagesize($_FILES['screen2']['tmp_name']);
	$w = $size[0];
	$h = $size[1];
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	$path = ''.$_SERVER['DOCUMENT_ROOT'].'/images/screens/'.$flms2.'';
	$imgString = file_get_contents($_FILES['screen2']['tmp_name']);
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
	imagejpeg($tmp, $path, 100);
	imagedestroy($image);
	imagedestroy($tmp);
	


	$width=$screen3[0];
	$height=$screen3[1];
	$size = getimagesize($_FILES['screen3']['tmp_name']);
	$w = $size[0];
	$h = $size[1];
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	$path = ''.$_SERVER['DOCUMENT_ROOT'].'/images/screens/'.$flms3.'';
	$imgString = file_get_contents($_FILES['screen3']['tmp_name']);
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
	imagejpeg($tmp, $path, 100);
	imagedestroy($image);
	imagedestroy($tmp);
		


	}

	
	

mysql_query("INSERT INTO `films` (`film_name`, `film_desc`, `film_actors`, `film_genre`, `film_author`, `film_link`, `film_add_time`, `type`, `film_time`, `film_create_time`, `film_quality`, `film_country`, `film_translate`) VALUES ('".$_POST['name']."','".$_POST['desc']."','".$_POST['actors']."','".$_POST['genre']."','".$_POST['author']."','".$_POST['url']."','".time()."','".$_POST['type_film']."','".$_POST['dro']."','".$_POST['tarigi']."','".$_POST['quality']."','".$_POST['country']."','".$_POST['translate']."')");

header("location: /add.php");
exit;


} 


?>



<?


?>



<?
include("inc/header.php");
?>


<div class="content-wrapper" style="min-height: 1176px;">



<div class="area">

<form id="book" action="add.php" method="post"  enctype="multipart/form-data">

<div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  
<label class="label" style="text-align:left;"> Имя:  </label>   
<div class="text-input__wrap relative">  <input class="text-input" type="text" name="name" value="" maxlength="500">      </div>  <div class="js-input_error error__msg hide"></div>   </div>  </div>

<div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  
<label class="label" style="text-align:left;"> Страна:  </label>   
<div class="text-input__wrap relative">  <input class="text-input" type="text" name="country" value="" maxlength="500">      </div>  <div class="js-input_error error__msg hide"></div>   </div>    </div>

<div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  
<label class="label" style="text-align:left;"> Жанр:  </label>   
<div class="text-input__wrap relative">  <input class="text-input" type="text" name="genre" value="" maxlength="50">      </div>  <div class="js-input_error error__msg hide"></div>   </div>   </div>

<div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  
<label class="label" style="text-align:left;"> Качество:  </label>   
<div class="text-input__wrap relative">  <input class="text-input" type="text" name="quality" value="" maxlength="50">      </div>  <div class="js-input_error error__msg hide"></div>   </div>     </div>


<div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  
<label class="label" style="text-align:left;"> Перевод:  </label>   
<div class="text-input__wrap relative">  <input class="text-input" type="text" name="translate" value="" maxlength="500">      </div>  <div class="js-input_error error__msg hide"></div>   </div>    </div>


<div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  
<label class="label" style="text-align:left;"> Продолжительность:  </label>   
<div class="text-input__wrap relative">  <input class="text-input" type="text" name="dro" value="" maxlength="500">      </div>  <div class="js-input_error error__msg hide"></div>   </div>   </div>

<div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  
<label class="label" style="text-align:left;"> Год выпуска:  </label>   
<div class="text-input__wrap relative">  <input class="text-input" type="text" name="tarigi" value="" maxlength="500">      </div>  <div class="js-input_error error__msg hide"></div>   </div>  </div>


<div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  
<label class="label" style="text-align:left;"> Type:  </label>   
<div class="text-input__wrap relative"> 


<select name="type_film" class="text-input" >

<option value="serial">serial</option>
<option value="film ">film</option> 
</select>


  </div>  <div class="js-input_error error__msg hide"></div>   </div>  </div>




<div class="form__item error__item_wrapper">  
<div class="js-input_error_wrap">  
<label class="label" style="text-align:left;"> Description:  </label>   
<div class="text-input__wrap relative">  
<textarea class="text-input" type="text" name="desc" value="" maxlength="99999">    </textarea>  
</div>  
<div class="js-input_error error__msg hide"></div>   
</div>  
</div>



<div class="form__item error__item_wrapper">  
<div class="js-input_error_wrap">  
<label class="label" style="text-align:left;"> Actors:  </label>   
<div class="text-input__wrap relative">  
<textarea class="text-input" type="text" name="actors" value="" maxlength="99999">    </textarea>  
</div>  
<div class="js-input_error error__msg hide"></div>   
</div>  
</div>




<div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  
<label class="label" style="text-align:left;"> Author:  </label>   
<div class="text-input__wrap relative">  <input class="text-input" type="text" name="author" value="" maxlength="500">      </div>  <div class="js-input_error error__msg hide"></div>   </div>  </div>


<div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  
<label class="label" style="text-align:left;"> Film url:  </label>   
<div class="text-input__wrap relative">  <input class="text-input" type="text" name="url" value="" maxlength="500">      </div>  <div class="js-input_error error__msg hide"></div>   </div>  </div>



 <div class="form__item error__item_wrapper">  
 <div class="js-input_error_wrap"> 
 <label class="label"> Film photo </label>   
 
 <div class="text-input__wrap relative">  
  
  <input type="file" accept="image/*" name="myFoto" class="text-input">     

  </div>  <div class="js-input_error error__msg hide"></div>   
  </div>    
  </div>


 <div class="form__item error__item_wrapper">  
 <div class="js-input_error_wrap"> 
 <label class="label"> Screen 1</label>   
 
 <div class="text-input__wrap relative">  
  
  <input type="file" accept="image/*" name="screen1" class="text-input">     

  </div>  <div class="js-input_error error__msg hide"></div>   
  </div>    
  </div>
  
  
   <div class="form__item error__item_wrapper">  
 <div class="js-input_error_wrap"> 
 <label class="label"> Screen 2</label>   
 
 <div class="text-input__wrap relative">  
  
  <input type="file" accept="image/*" name="screen2" class="text-input">     

  </div>  <div class="js-input_error error__msg hide"></div>   
  </div>    
  </div>
  
  
   <div class="form__item error__item_wrapper">  
 <div class="js-input_error_wrap"> 
 <label class="label"> Screen 3</label>   
 
 <div class="text-input__wrap relative">  
  
  <input type="file" accept="image/*" name="screen3" class="text-input">     

  </div>  <div class="js-input_error error__msg hide"></div>   
  </div>    
  </div>


		<input type="submit" name="cfms" value="Add" id="subm" class="btn btn-block btn-warning -visor-no-click">

</form>
  
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


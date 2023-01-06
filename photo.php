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
	
	
	
$filetpe = end(explode('.', $_FILES['myFoto']['name']));
	


if (!in_array($filetpe, array('jpg', 'jpeg', 'JPG', 'JPEG')))
{	 
header("Location: /index.php");
exit;
}



$imageupl = getimagesize($_FILES['myFoto']['tmp_name']);



$pwidth = $imageupl[0];
$pheight = $imageupl[1];








if (in_array($imageupl['mime'], array('image/jpg', 'image/jpeg', 'image/JPG', 'image/JPEG')))
{
	
	 
	
//$width = $imageupl[0];
//$height = $imageupl[1];

$srcfrm = $_SERVER['REQUEST_TIME'].'_'.$usernm['user_id'].'.jpg';

//Create thumbnail

//$maxwidth = 100;
//$maxheight = 100;
//while(($height/$width)*$maxwidth>$maxheight+1){ $maxwidth = $maxwidth - 1; }
//$newwidth=$maxwidth;
//$newheight=($height/$width)*$maxwidth;
//$tmp=imagecreatetruecolor($newwidth,$newheight);
//imagecopyresampled($tmp,$srcfrm,0,0,0,0,$newwidth,$newheight,$width,$height);
//imagepng($tmp, $_SERVER['DOCUMENT_ROOT']."/images/photos/100/$photo_id_reg.jpg", 0);	


	$width='40';
	$height='40';
	$size = getimagesize($_FILES['myFoto']['tmp_name']);
	$w = $size[0];
	$h = $size[1];
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	$path = ''.$_SERVER['DOCUMENT_ROOT'].'/images/photos/40/'.$srcfrm;
	$imgString = file_get_contents($_FILES['myFoto']['tmp_name']);
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
	imagejpeg($tmp, $path, 100);
	imagedestroy($image);
	imagedestroy($tmp);
	
	$width='100';
	$height='100';
	$size = getimagesize($_FILES['myFoto']['tmp_name']);
	$w = $size[0];
	$h = $size[1];
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	$path = ''.$_SERVER['DOCUMENT_ROOT'].'/images/photos/100/'.$srcfrm;
	$imgString = file_get_contents($_FILES['myFoto']['tmp_name']);
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
	imagejpeg($tmp, $path, 100);
	imagedestroy($image);
	imagedestroy($tmp);
	
	
	$width='128';
	$height='128';
	$size = getimagesize($_FILES['myFoto']['tmp_name']);
	$w = $size[0];
	$h = $size[1];
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	$path = ''.$_SERVER['DOCUMENT_ROOT'].'/images/photos/128/'.$srcfrm;
	$imgString = file_get_contents($_FILES['myFoto']['tmp_name']);
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
	imagejpeg($tmp, $path, 100);
	imagedestroy($image);
	imagedestroy($tmp);
	
	
	$width='160';
	$height='160';
	$size = getimagesize($_FILES['myFoto']['tmp_name']);
	$w = $size[0];
	$h = $size[1];
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	$path = ''.$_SERVER['DOCUMENT_ROOT'].'/images/photos/160/'.$srcfrm;
	$imgString = file_get_contents($_FILES['myFoto']['tmp_name']);
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
	imagejpeg($tmp, $path, 100);
	imagedestroy($image);
	imagedestroy($tmp);
	

	
	
SQL_Exec("UPDATE persons SET photo_id = ? where  user_id  = ?", array($srcfrm, $usernm['user_id']));
	
} else {
header("Location: /index.php");
exit;
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


<div id="moder_block"></div>  <div class="relative"> <div id="location_header">  <div class="location-bar" id="header_path">  <span class="location-bar__item location-bar__item_home"> <a href="/index.php" class="location-bar__home-link ico"></a> <span class="location-bar__sep ico"></span> </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <a href="/profile.php?id=<?php echo $usernm['user_id'];?>" id="location_bar_1_0" class=""> <span><?php echo show_text($usernm['user_nick']);?></span> </a>    <span class="location-bar__sep ico"></span>   </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <span id="location_bar_1_1" class="location-bar__title"> <span>Добавить фото</span> </span>     </span>   </div>  </div> <div id="top_notif_place" class="top_notif_place">    </div> </div> <div> <div class="oh"></div> 


<div id="main_content">  
<div id="main">  






<div>


<form method="post" action="/photo.php" style="padding: 0 !important;" enctype="multipart/form-data"> 
<div class="widgets-group widgets-group_top">   
<div class="content-item3 wbg pdb"> 




 <div class="form__item error__item_wrapper">  <div class="js-input_error_wrap">  <label class="label"> Добавить фото
  </label>   <div class="text-input__wrap relative">  
  
  <input type="file" accept="image/*" name="myFoto" class="text-input">     

  </div>  <div class="js-input_error error__msg hide"></div>   </div>    </div>




  </div>  


<div class="user__tools user__tools_last"> <table class="table__wrap"> <tbody><tr> <td width="50%" class="table__cell"> <button type="submit" name="cfms" class="user__tools-link stnd-link_important" value="1"><span class="ico ico_ok_blue"></span> 
 Загрузить</button> </td> <td width="50%" class="table__cell table__cell_last">       <a href="/profile.php?id=<?php echo $usernm['user_id'];?>" class="stnd-link"> Отменить  </a>      </td> </tr> </tbody></table> </div>


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


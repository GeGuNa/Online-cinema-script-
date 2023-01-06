<?
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




$cnt = mysql_result(mysql_query("SELECT COUNT(*) FROM `category` where `cat_id` = $info"), 0);


if ($cnt == 0) {
	header("Location: /");
	exit;
}



$catn = mysql_fetch_array(mysql_query("SELECT * FROM `category` where `cat_id` = $info"));




?>



<?


?>

<?
include("inc/header.php");
?>

<div class="content-wrapper" style="min-height: 380.266px;">


<div id="moder_block"></div>  <div class="relative"> <div id="location_header">  <div class="location-bar" id="header_path">  <span class="location-bar__item location-bar__item_home"> <a href="/index.php" class="location-bar__home-link ico"></a> <span class="location-bar__sep ico"></span> </span><span class="location-bar__item"> <span class="location-bar__sep ico"></span>  <a href="/cat.php?id=<?php echo $catn['cat_id'];?>" id="location_bar_1_0" class=""> <span><?php echo show_text($catn['name']);?></span> </a>     </span>  </div>  </div> <div id="top_notif_place" class="top_notif_place">    </div> </div> <div> <div class="oh"></div>


<?

$set['p_str'] = 10;


$a = array("","Биография","Фантастика","Детские","эротический","Исторический","Драма","Комедия","Криминал","Документальный","Триллеры","Cпортивные","Семейные","Приключения","Аниме","Мелодрама","Военные","Ужасы","Фэнтези","Детективы","Боевики","Вестерны","Мюзиклы","Отечественные","Новый год","Мистика");

$b = $a[$_GET['id']];

$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%$b%'"),0);

$k_page = k_page($k_post,$set['p_str']);
$page = page($k_page);
$start = $set['p_str']*$page-$set['p_str'];



$query = mysql_query("SELECT * FROM `films` WHERE `film_genre` LIKE '%$b%' ORDER BY `film_id` DESC LIMIT $start, $set[p_str]");


if ($k_post == 0)
{
?>

<section class="content">
<div class="callout callout-danger">
<h4>Warning!</h4>
<p>К сожалению, в этой категории нет фильмов.</p>
</div>
</section>

<?
}

while ($row = mysql_fetch_assoc($query))
{

 ?> 

<div class="area" style="min-height:380px;">

<div class="title" style="margin-bottom:4px;"> 
<a href="/watch.php?id=<?php echo $row['film_id'];?>"><?php echo show_text($row['film_name']);?></a>
</div>

<img src="/images/films/<?php echo $row['film_id'];?>.jpg" style="float:left;max-width:50%;">

<div class="count film_desc">
<div class="film_desclng">
<?php echo show_text($row['film_desc']);?>
</div>
</div>
<div class="film_info">
<div style="clear:both;"></div>
<div style="font-weight:bold">
Год выпуска: <?php echo show_text($row['film_create_time']);?><br>
Страна: <?php echo show_text($row['film_country']);?><br>
Жанр: <?php echo show_text($row['film_genre']);?><br>
Качество: <?php echo show_text($row['film_quality']);?><br>
Перевод: <?php echo show_text($row['film_translate']);?><br>
Продолжительность: <?php echo show_text($row['film_time']);?>
</div> 

</div>

<div style="clear:both;"></div>
</div> 
  
  
<? 
}

?>



<?

if ($k_page>1)str("?id=$catn[cat_id]",$k_page,$page); 

?>




</div>


  <footer class="main-footer">
    <div class="pull-right hidden-xs">
<center>

   </center>    </div>
    <strong>Copyright © 2014 <a href="https://Wab.ge">Wab.ge</a></strong>
  </footer>
  
  
  
<div class="control-sidebar-bg"></div></div>
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


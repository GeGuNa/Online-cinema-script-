<?php
include("inc/system.php");
include("inc/funcs.php");
include("inc/head.php");


?>


<?



/*

$query2 = SQL_Qeury("SELECT * FROM `films` ORDER BY `film_id` DESC LIMIT 1");
$infs = $query2->fetch();

echo $infs['film_id'];

*/


include("inc/header.php");
?>




<div class="content-wrapper" style="min-height: 380.266px;">

<?

$user['p_str'] = 10;

$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `films`"),0);
$k_page = k_page($k_post,$user['p_str']);
$page = page($k_page);
$start = $user['p_str']*$page-$user['p_str'];

$info = mysql_query("SELECT * FROM `films` ORDER BY `film_id` DESC LIMIT $start, $user[p_str]");


while ($row = mysql_fetch_assoc($info)) {
 ?> 

<div class="area" style="min-height:380px;">

<div class="title" style="margin-bottom:4px;"> 
<a href="/watch.php?id=<?php echo $row['film_id'];?>"><?php echo show_text($row['film_name']);?></a>
</div>

<img src="/images/films/<?php echo $row['film_id'];?>.jpg" style="float:left;max-width:50%;" width="200">

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

if ($k_page>1)str("?",$k_page,$page); 

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

<?php
?>



<body class="layout-boxed sidebar-mini skin-purple" style="height: auto; min-height: 100%;">
	
<div class="wrapper" style="overflow: hidden; height: auto; min-height: 100%;">

<header class="main-header">
	  
<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>" class="logo hidden-xs">
<span class="logo-lg"><b><?php echo $_SERVER['SERVER_NAME'];?> </b></span>
</a>
		
<nav class="navbar navbar-static-top">

<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"><span class="sr-only">Переключить навигацию</span></a>
	
<?

if (!isset($nckftch)) {
?>	
	
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
<li><a href="/login.php">&nbsp; Вход</a></li>
<li><a href="/registration.php">&nbsp; Регистрация</a></li>	
</ul>
</div>

<?php

} else {

?>	
	
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">		
          
<?
		 
		 
$msgs = mysql_result(mysql_query("SELECT COUNT(*) FROM `messages` WHERE `anke` = '".$usernm['user_id']."' and `read` = '0'"), 0);

$gsts = mysql_result(mysql_query("SELECT COUNT(*) FROM `guest` WHERE `anke` = '".$usernm['user_id']."' and `read` = '0'"), 0);	

$ntssts = mysql_result(mysql_query("SELECT COUNT(*) FROM `notifications` WHERE `user` = '".$usernm['user_id']."' and `read` = '0'"), 0);		

if ($msgs == 0) {
$gstsd2 = 'display:none;';
} else {
$gstsd2 = 'display:block;';
}	

if ($gsts == 0) {
$gstsd = 'display:none;';
} else {
$gstsd = 'display:block;';
}		 
	
if ($ntssts == 0) {
$gstsd3 = 'display:none;';
} else {
$gstsd3 = 'display:block;';
}


?>
		 
<li class="messages-menu">
<a href="/contacts.php">
<i class="fa fa-envelope-o"></i>
<span class="label label-success" style="<?php echo $gstsd2;?>"><?php echo $msgs;?></span>
</a>
</li>		  
 
<li class="messages-menu">
<a href="/notifications.php">
<i class="fa fa-bell-o"></i>
<span class="label label-success" style="<?php echo $gstsd3;?>"><?php echo $ntssts;?></span>
</a>
</li>	  

<li class="messages-menu">
<a href="/guest.php">
<i class="fa fa-user-o"></i>
<span class="label label-success" style="<?php echo $gstsd;?>"><?php echo $gsts;?></span>
</a>
</li>	  
      
<li class="user user-menu">
<a href="/profile.php?id=<?php echo $usernm['user_id'];?>" class="dropdown-toggle" style="margin-top:0px;">
<img src="/images/photos/160/<?php echo $usernm['photo_id'];?>" class="user-image">
<span class="hidden-xs" style="margin-left:-4px;"><?php echo $usernm['user_nick'];?></span>
</a>
</li>
 
</ul>
      </div>

	
<? } ?>
	
</nav>
</header>

<aside class="main-sidebar">
<section class="sidebar" style="height: auto;">
  
  
<? if (isset($nckftch)) { ?>
 
<div class="user-panel">

<div class="pull-left image">
<img src="/images/photos/160/<?php echo $usernm['photo_id'];?>" class="img-circle" alt="User Image">
</div>

<div class="pull-left info" style="padding-top:15px;padding-left:6px;">
<p><a href="/profile.php?id=<?php echo $usernm['user_id'];?>"><?php echo $usernm['user_nick'];?> </a></p>
</div>

</div>  

<? } ?>    
  
  
	<form action="#" method="get" class="sidebar-form">
	  <div class="input-group">
		<input type="text" name="q" class="form-control" placeholder="Поиск...">
		<span class="input-group-btn">
		<button type="submit" name="search" id="search-btn" class="btn btn-flat">
		<i class="fa fa-search" style="margin-top: -7px;right: 6px;position: absolute;"></i>
		</button>
		</span>
	  </div>
	</form>
	
<ul class="sidebar-menu tree" data-widget="tree">	
		
<li class="header"><b>Разделы сайта</b></li>

<li><a href="/cat.php?id=14"><i class="fa fa-folder fa-fw"></i><span> Аниме</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Аниме%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=1"><i class="fa fa-folder fa-fw"></i><span> Биография</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Биография%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=20"><i class="fa fa-folder fa-fw"></i><span> Боевики</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Боевики%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=21"><i class="fa fa-folder fa-fw"></i><span> Вестерны</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Вестерны%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=16"><i class="fa fa-folder fa-fw"></i><span> Военные</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Военные%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=7"><i class="fa fa-folder fa-fw"></i><span> Комедия</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Комедия%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=8"><i class="fa fa-folder fa-fw"></i><span> Криминал</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Криминал%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=11"><i class="fa fa-folder fa-fw"></i><span> Cпортивные</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Cпортивные%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=12"><i class="fa fa-folder fa-fw"></i><span> Семейные</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Семейные%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=26"><i class="fa fa-folder fa-fw"></i><span> Романтика</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Романтика%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=6"><i class="fa fa-folder fa-fw"></i><span> Драма</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Драма%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=3"><i class="fa fa-folder fa-fw"></i><span> Детские</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Детские%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=19"><i class="fa fa-folder fa-fw"></i><span> Детективы</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Детективы%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=9"><i class="fa fa-folder fa-fw"></i><span> Документальный</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Документальный%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=22"><i class="fa fa-folder fa-fw"></i><span> Мюзиклы</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Мюзиклы%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=25"><i class="fa fa-folder fa-fw"></i><span> Мистика</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Мистика%'"),0); ?></small></span></a></li>


<li><a href="/cat.php?id=5"><i class="fa fa-folder fa-fw"></i><span> Исторический</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Исторический%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=2"><i class="fa fa-folder fa-fw"></i><span> Фантастика</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Фантастика%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=10"><i class="fa fa-folder fa-fw"></i><span> Триллеры</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Триллеры%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=13"><i class="fa fa-folder fa-fw"></i><span> Приключения</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Приключения%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=18"><i class="fa fa-folder fa-fw"></i><span> Фэнтези</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Фэнтези%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=17"><i class="fa fa-folder fa-fw"></i><span> Ужасы</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Ужасы%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=23"><i class="fa fa-folder fa-fw"></i><span> Отечественные</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Отечественные%'"),0); ?></small></span></a></li>

<li><a href="/cat.php?id=24"><i class="fa fa-folder fa-fw"></i><span> Новый год</span><span class="pull-right-container"><small class="label pull-right "><? echo mysql_result(mysql_query("SELECT COUNT(*) FROM `films` WHERE `film_genre` LIKE '%Новый год%'"),0); ?></small></span></a></li>

<li class="header"><b>Социальные сети</b></li>

<li><a target="_blank" href="https://fb.com/ "><i class="fa fa-vk fa-fw"></i><span> Найди нас на fb</span></a></li>

<li><a target="_blank" href="https://twitter.com/ "><i class="fa fa-facebook fa-fw"></i><span> Найди нас на twitter</span></a></li>

<li class="header"><b>Реклама</b></li>
<li><a target="_blank" href="/"><i class="fa fa-globe fa-fw"></i><span> Рекламное место</span></a></li>
<li><a target="_blank" href="//bymas.ru/id90824"><i class="fa fa-globe fa-fw"></i><span> Buying an ad</span></a></li>

</ul>

</section>

</aside>

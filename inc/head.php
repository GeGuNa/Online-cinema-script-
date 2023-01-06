<?php
 header("Content-Type: text/html; charset=utf8;");
 header("Access-Control-Allow-Origin: *");
?>

<!DOCTYPE html>
<html lang="ru" style="height: auto; min-height: 100%;"><head>


<meta charset="utf-8">
<meta name="theme-color" content="#ffffff" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="description" content="Самая большая база аниме онлайн. Полное собрание всех аниме на русском языке и описаний к ним.">
<meta name="keywords" content="аниме, онлайн, anime, online, бесплатно, без регистрации, русская озвучка">

  <title>Мир развлечений — Сервис развлечений | Wab.ge</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="2">
  <meta name="keywords" content="3">

  <link rel="shortcut icon" href="/kernel/theme/assets/ico/favicon.ico">
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link rel="stylesheet" href="/css/design.css">
  <link rel="stylesheet" href="/css/all-skins.css">
  <link rel="stylesheet" href="/css/awesome.css">
  <link rel="stylesheet" href="/css/ionicons.css">
  <link rel="stylesheet" href="/css/touch.css">
    <link rel="stylesheet" href="/css/Toolbar.css">
  <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/2862458518_r1771p.css">
  
  

  
  <?php if ($_SERVER['PHP_SELF']=="/watch.php"){ ?>
  <link rel="stylesheet" href="/css/player.css"> 
  
    <link href="/js/video-js.css" rel="stylesheet" type="text/css">
  <!-- video.js must be in the <head> for older IEs to work. -->
  <script src="/js/video.js"></script>
  
    <script>
    videojs.options.flash.swf = "video-js.swf";
  </script>
  
  <?php } ?>
  
  <?php if ($_SERVER['PHP_SELF']=="/complaint.php"){ ?>
  <link rel="stylesheet" href="/css/Controls.css"> 
  <?php } ?>
  
  
    <?php if ($_SERVER['PHP_SELF']=="/recovery.php"){ ?>
  <link rel="stylesheet" href="/css/RegTouch.css"> 
  <?php } ?>
    
  <?php if ($_SERVER['PHP_SELF']=="/edit.php"){ ?>
  <link rel="stylesheet" href="/css/Select.css"> 
  <?php } ?>
  
  
  <?php if ($_SERVER['PHP_SELF']=="/message.php" || $_SERVER['PHP_SELF']=="/notifications.php" ){ ?>
  <link rel="stylesheet" href="/css/ChatMain.css"> 
  <?php } ?>
  
    <?php if ($_SERVER['PHP_SELF']=="/block/add.php"){ ?>
  <link rel="stylesheet" href="/css/Controls.css"> 
    <link rel="stylesheet" href="/css/Select.css"> 
  <?php } ?>
  
    <?php if ($_SERVER['PHP_SELF']=="/contacts.php" || $_SERVER['PHP_SELF']=="/message.php"){ ?>
  <link rel="stylesheet" href="/css/MailMain.css"> 
  <link rel="stylesheet" href="/css/Mail.css">
  <?php } ?>
  
     <?php if ($_SERVER['PHP_SELF']=="/loghist.php"){ ?>
  <link rel="stylesheet" href="/css/About.css"> 
  <?php } ?> 
  
  
  
   <?php if ($_SERVER['PHP_SELF']=="/watch.php"){ ?>
  <link rel="stylesheet" href="/css/Toolbar.css"> 
    <link rel="stylesheet" href="/css/Comments.css"> 
  <?php } ?> 
  
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

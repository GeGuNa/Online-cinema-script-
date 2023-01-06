<?php


if (isset($_GET)){

foreach ($_GET as $key => $value) {


if (!is_numeric($value)) {	
if (!preg_match("/^[a-z]+$/i", $value)) {
header("Location: index.php");
exit;
}
} else {
$_GET[$key] = abs((int)$value);	
}

}
}


function utf8_substr($str, $len, $dot = 1, $start = 0) {
        if (function_exists('mb_substr')) {
            $str = mb_substr($str, $start, $len);
        } else  if (function_exists('iconv_substr')) {
            $str = iconv_substr($str, $start, $len);
        } else {
            $str = substr($str, $start, $len);
    }
    return $str;
}


function agec($dge,$tve,$weli) {
	
$tz  = new DateTimeZone('Europe/Moscow');
$age = DateTime::createFromFormat('d/m/Y', "$dge/$tve/$weli", $tz)->diff(new DateTime('now', $tz))->y;	
	
	
  return $age;	
	
}

function punctuaterplc($message) {
	
	
$text = strtr($message, array(chr(0) => '', chr(1) => '', chr(2) => '', chr(3) => '', chr(4) => '', chr(5) => '', chr(6) => '', chr(7) => '', chr(8) => '', chr(9) => '', chr(10) => '', chr(11) => '', chr(12) => '', chr(13) => '', chr(14) => '', chr(15) => '', chr(16) => '', chr(17) => '', chr(18) => '', chr(19) => '', chr(20) => '', chr(21) => '', chr(22) => '', chr(23) => '', chr(24) => '', chr(25) => '', chr(26) => '', chr(27) => '', chr(28) => '', chr(29) => '', chr(30) => '', chr(31) => ''));	



$text = str_replace("-", "&#45;", $message);
$text = str_replace("+", "&#43;", $message);
$text = str_replace("-", "&#45;", $message);
$text = str_replace("+", "&#43;", $message);
	
	
$text = str_replace("<", "&#8249;", $message);
$text = str_replace(">", "&#8250;", $message);
$text = str_replace("~", "&#126;", $message);
$text = str_replace("[", "&#91;", $message);
$text = str_replace("]", "&#93;", $message);
$text = str_replace("`", "&#96;", $message);
$text = str_replace("|", "&#124;", $message);
$text = str_replace(",", "&#44;", $message);
$text = str_replace(";", "&#59;", $message);
$text = str_replace("^", "&#94;", $message);
$text = str_replace("¨", "&#168;", $message);

$text = str_replace(":", "&#58;", $message);
$text = str_replace("'", "&#39;", $message);
$text = str_replace("(", "&#40;", $message);
$text = str_replace(")", "&#41;", $message);

$text = str_replace("{", "&#123;", $message);
$text = str_replace("}", "&#125;", $message);	
$text = str_replace("\"", "&#34;", $message);	

$text = str_replace("¨", "&#168;", $message);	
$text = str_replace("¯", "&#175;", $message);	

$text = str_replace("´", "&#180;", $message);
$text = str_replace("‘", "&#8216;", $message);
$text = str_replace("’", "&#8217;", $message);	
$text = str_replace("‚", "&#8218;", $message);
$text = str_replace("‛", "&#8219;", $message);
$text = str_replace("‗", "&#8215;", $message);	

$text = str_replace("“", "&#8220;", $message);
$text = str_replace("”", "&#8221;", $message);	
$text = str_replace("„", "&#8222;", $message);	
$text = str_replace("‟", "&#8223;", $message);

$text = str_replace("′", "&#8242;", $message);
$text = str_replace("″", "&#8243;", $message);
$text = str_replace("‴", "&#8244;", $message);
$text = str_replace("‵", "&#8245;", $message);
$text = str_replace("‶", "&#8246;", $message);
$text = str_replace("‷", "&#8247;", $message);

$text = str_replace("‸", "&#8248;", $message);
$text = str_replace("‹", "&#8249;", $message);
$text = str_replace("›", "&#8250;", $message);
$text = str_replace("‷", "&#8247;", $message);

$text = str_replace("⁄", "&#8260;", $message);
$text = str_replace("⁅", "&#x2045;", $message);
$text = str_replace("⁆", "&#x2046;", $message);

$text = str_replace("¬", "&#172;", $message);
$text = str_replace("«", "&#171;", $message);	
$text = str_replace("»", "&#187;", $message);	

$text = str_replace("_", "&#95;", $message);

$text = str_replace(array('̏','͓'), '.', $message);	
	
	return $text;
}




function show_text($message) {
	
//$text =	htmlentities($message, ENT_QUOTES, "UTF-8");

//$text =htmlspecialchars($message);
//$text = html_entity_decode($message);
$text = htmlentities($message, ENT_QUOTES, "UTF-8");
//$text = htmlspecialchars_decode($message,ENT_NOQUOTES);
//$text =	nl2br($message);		
	return $text;
}

if (function_exists('mb_internal_encoding')) {
mb_internal_encoding("UTF-8");
}

if (extension_loaded('iconv')) {
iconv_set_encoding("internal_encoding", "UTF-8");
iconv_set_encoding("output_encoding", "UTF-8");
}



function length($string) {

if (function_exists('mb_strlen')) {
	return mb_strlen($string);
} else if (function_exists('mb_strlen')) {
	return iconv_strlen($string, 'UTF-8');
} else {
	return strlen(utf8_decode($string));
}

}

function rand_str($l){
$l=(int)$l;if($l<5){$l=5;}
$str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$len = length($str); $randstr = '';
for ($i = 0; $i < $l; $i++) {$randstr.=$str[rand(0,$len-1)];}
return $randstr;}




function page($k_page=1)
{ 
	$page = 1;

	if (isset($_GET['page']))
	{
		
	if (!is_numeric($_GET['page'])) {
		header("Location: /index.php");
		exit;	
	}	
		
		
		if ($_GET['page'] == 'end')
			$page = intval($k_page);
			
		elseif(is_numeric($_GET['page'])) 
		$page = intval($_GET['page']);
		
	}

	if ($page < 1)$page = 1;

	if ($page > $k_page)
		$page = $k_page;
		
	return $page;
}


function k_page($k_post = 0, $k_p_str = 10)
{ 
	if ($k_post != 0) 
	{
		$v_pages = ceil($k_post / $k_p_str);
		return $v_pages;
	}

	else return 1;
}

function str($link = '?', $k_page = 1,$page = 1)
{ 
?>	
<div class="pgn-wrapper">     
<div class="pgn"> 

<?
if ($k_page>1) {
?>

<table class="table__wrap pgn__table"> 
<tbody>

<tr> 


<? if ($page != 1) { ?>

<td class="table__cell" width="45">  <a href="<?php echo $link;?>&page=1" class="pgn__link pgn__link_hover pgn__link_prev" title="В начало"> &nbsp;<span class="ico ico_darr_left"></span> </a>  </td>


<? } else { ?> 

<td class="table__cell" width="45">  <div class="pgn__link pgn__link_prev pgn__link_disabled" title="В начало"> &nbsp;<span class="ico ico_darr_left"></span> </div>  </td>
<? } ?> 



<? if ($page == 1) { ?>

<td class="table__cell" width="35%">   
<div class="pgn__link pgn__link_prev pgn__link_disabled"> <span class="ico ico_arr3"></span> Назад </div>    
</td> 

<? } else { ?> 


<td class="table__cell" width="35%">   
<a href="<?php echo $link;?>&page=<?php echo abs($page-1);?>" class="pgn__link pgn__link_hover pgn__link_prev"> <span class="ico ico_arr3"></span> Назад </a>    
</td> 

<? } ?> 


<td class="table__cell js-pagenav_toggle" style="cursor: pointer;">  
<div class="pgn__counter pgn__range pgn__link_hover"><?php echo $page;?> из <?php echo $k_page;?></div>  
</td>  


<? if ($page == $k_page) { ?>

<td class="table__cell" width="35%">   
<div class="pgn__link pgn__link_next pgn__link_disabled"> Вперёд <span class="ico ico_arr"></span> </div>    
</td> 

<? } else { ?> 

<td class="table__cell" width="35%">   
<a href="<?php echo $link;?>&page=<?php echo abs($page+1);?>" class="pgn__link pgn__link_hover pgn__link_next"> Вперёд <span class="ico ico_arr"></span></a>    
</td> 

<? } ?> 



<? if ($page != $k_page) { ?>

<td class="table__cell table__cell_last" width="45">  <a href="<?php echo $link;?>&page=<?php echo abs($k_page);?>" class="pgn__link pgn__link_hover pgn__link_next" title="В конец"> &nbsp;<span class="ico ico_darr_right"></span> </a>  </td>



<? } else { ?> 

<td class="table__cell table__cell_last" width="45">  <div class="pgn__link pgn__link_next pgn__link_disabled" title="В конец"> &nbsp;<span class="ico ico_darr_right"></span> </div>  </td>

<? } ?> 

</tr> 

</tbody>
</table>
<?
}
?>


</div>   
</div>	
	
	
<?	
}


function time_autoformat($ts, $full = false){
  if($full){
        $d = ''; $t = $ts;
        $d1 = (floor($t/31622400)>0) ? floor($t/31622400) : '';
        $d2 = (floor($t/2635200)>0) ? floor($t/2635200) % 12 : '';
        $d3 = (floor($t/86400)>0) ? floor($t/86400) % 30 : '';
        $d4 = (floor($t/3600)>0) ? floor($t/3600) % 24 : '';
        $d5 = floor($t/60) % 60;
        if($d1) $d .= sklonen($d1,'год ','года ','лет ');
        if($d2) $d .= sklonen($d2,'месяц ','месяца ','месяцев ');
        if($d3) $d .= sklonen($d3,'день ','дня ','дней ');
        if($d4) $d .= sklonen($d4,'час ','часа ','часов ');
        if($d5) $d .= sklonen($d5,'минута  ','минуты ','минут ');
        return $d;
    } else {
        $sec = $ts;
        $min = round($ts/60);
        $hour = round($ts/3600);
        $days = round($ts/86400);
        $month = round($ts/2635200);
        $years = round($ts/31622400);       
        if($hour>0) return sklonen($hour,'час','часа','часов',false);    
        if($min>0) return $min.' мин.'; 
        if($sec>0) return $sec.' сек.';   		
       // if($days>) return sklonen($days,'день','дня','дней',false);    
        //if($month<12) return sklonen($month,'месяц','месяца','месяцев',false); 
       // else return sklonen($years,'год','года','лет',false);
    }
}    
 
function sklonen($n,$s1,$s2,$s3, $b = false){
    $m = $n % 10; $j = $n % 100;
    if($m==1) $s = $s1;
    if($m>=2 && $m<=4) $s = $s2;
    if($m==0 || $m>=5 || ($j>=10 && $j<=20)) $s = $s3;
    if($b) $n = '<b>'.$n.'</b>';
    return $n.' '.$s;
}



function us_level($us) {
    $ul = SQL_Fetch( "SELECT `user_id`,`user_level` FROM `persons` WHERE `user_id` = ?", array($us))->fetch();

	if ($ul['user_level'] == 5)
        $level = 'Создатель';
    else if ($ul['user_level'] == 4)
        $level = 'Заместитель';
    else if ($ul['user_level'] == 3)
        $level = 'Старший администратор';
    else if ($ul['user_level'] == 2)
        $level = 'Администратор';
    else if ($ul['user_level'] == 1)
        $level = 'Модератор';
    else
        $level = 'Пользователь';
    return $level;
}



function onluser($user) {


$ontime = abs((int)$_SERVER['REQUEST_TIME']-300);		

$user1 = SQL_Fetch( "SELECT * FROM `persons` WHERE `user_id` = ?", array($user))->fetch();


if ($user1['last_visit'] > $ontime) {
	
if ($user1['gender'] == 'male')return "<img class='p14 online_status_ico' src='/images/man_on.gif'>";
if ($user1['gender'] == 'female')return "<img class='p14 online_status_ico' src='/images/woman_on.gif'>";

} else {
	
if ($user1['gender'] == 'male')return "<img class='p14 online_status_ico' src='/images/man_off.gif'>";
if ($user1['gender'] == 'female')return "<img class='p14 online_status_ico' src='/images/woman_off.gif'>";

}

}



function num($num) {
	
	return abs((int)$num);
	
}



?>

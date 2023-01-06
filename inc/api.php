<?


/* ------------------------------- */
/* Email */
/* ------------------------------- */

/**
 * send_mail
 * 
 * @param string $email
 * @param string $subject
 * @param string $body
 * @param boolean $only_smtp
 * @return boolean
 */
function _email($email, $subject, $body, $only_smtp = false) {
    global $system;
    /* set header */
    $header  = "MIME-Version: 1.0\r\n";
    $header .= "Mailer: ".$system['system_title']."\r\n";
    $header .= "Content-Type: text/plain; charset=\"utf-8\"\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n";
    /* send email */
    if($system['email_smtp_enabled']) {
        /* SMTP */
        require_once(ABSPATH.'includes/libs/PHPMailer/PHPMailerAutoload.php');
        $mail = new PHPMailer;
        $mail->CharSet = "UTF-8";
        $mail->isSMTP();
        $mail->Host = $system['email_smtp_server'];
        $mail->SMTPAuth = ($system['email_smtp_authentication'])? true : false;
        $mail->Username = $system['email_smtp_username'];
        $mail->Password = $system['email_smtp_password'];
        $mail->SMTPSecure = ($system['email_smtp_ssl'])? 'ssl': 'tls';
        $mail->Port = $system['email_smtp_port'];
        $setfrom = (is_empty($system['email_smtp_setfrom']))? $system['email_smtp_username']: $system['email_smtp_setfrom'];
        $mail->setFrom($setfrom, $system['system_title']);
        $mail->addAddress($email);
        $mail->Subject = $subject;
        $mail->Body = $body;
        if(!$mail->send()) {
            /* send using mail() */
            if(!mail($email, $subject, $body, $header)) {
                return false;
            }
        }
    } else {
        if($only_smtp) {
            return false;
        }
        /* send using mail() */
        if(!mail($email, $subject, $body, $header)) {
            return false;
        }
    }
    return true;
}




function reserved_username($username) {
    $reserved_usernames = array('install', 'static', 'contact', 'contacts', 'sign', 'signin', 'login', 'signup', 'register', 'signout', 'logout', 'reset', 'activation', 'connect', 'revoke', 'packages', 'started', 'search', 'friends', 'messages', 'message', 'notifications', 'notification', 'settings', 'setting', 'posts', 'post', 'photos', 'photo', 'create', 'pages', 'page', 'groups', 'group', 'games', 'game', 'saved', 'directory', 'products', 'product', 'market', 'admincp', 'admin', 'admins');
    if(in_array(strtolower($username), $reserved_usernames)) {
        return true;
    } else {
        return false;
    }
}


/**
 * email_smtp_test
 * 
 * @return void
 */
function email_smtp_test() {
    global $system;
    /* prepare test email */
    $subject = __("Test SMTP Connection on")." ".$system['system_title'];
    $body  = __("This is a test email");
    $body .= "\r\n\r".$system['system_title']." ".__("Team");
    /* send email */
    if(!_email($system['system_email'], $subject, $body, true)) {
        throw new Exception(__("Test email could not be sent. Please check your settings"));
    }
}


function get_user_os() {
    $os_platform = "Unknown OS Platform";
    $os_array = array(
        '/windows nt 10/i'      =>  'Windows 10',
        '/windows nt 6.3/i'     =>  'Windows 8.1',
        '/windows nt 6.2/i'     =>  'Windows 8',
        '/windows nt 6.1/i'     =>  'Windows 7',
        '/windows nt 6.0/i'     =>  'Windows Vista',
        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
        '/windows nt 5.1/i'     =>  'Windows XP',
        '/windows xp/i'         =>  'Windows XP',
        '/windows nt 5.0/i'     =>  'Windows 2000',
        '/windows me/i'         =>  'Windows ME',
        '/win98/i'              =>  'Windows 98',
        '/win95/i'              =>  'Windows 95',
        '/win16/i'              =>  'Windows 3.11',
        '/macintosh|mac os x/i' =>  'Mac OS X',
        '/mac_powerpc/i'        =>  'Mac OS 9',
        '/linux/i'              =>  'Linux',
        '/ubuntu/i'             =>  'Ubuntu',
        '/iphone/i'             =>  'iPhone',
        '/ipod/i'               =>  'iPod',
        '/ipad/i'               =>  'iPad',
        '/android/i'            =>  'Android',
        '/blackberry/i'         =>  'BlackBerry',
        '/webos/i'              =>  'Mobile'
    );
    foreach($os_array as $regex => $value) {
        if(preg_match($regex, $_SERVER['HTTP_USER_AGENT'])) {
            $os_platform = $value;
        }
    }   
    return $os_platform;
}

function check_mobile() { 
$ua = strtolower($_SERVER['HTTP_USER_AGENT']); 
$mobile_agent_array = array('ipad', 'iphone', 'android', 'pocket', 'palm', 'windows ce', 'windowsce', 'cellphone', 'opera mobi', 'ipod', 'small', 'sharp', 'sonyericsson', 'symbian', 'opera mini', 'nokia', 'htc_', 'samsung', 'motorola', 'smartphone', 'blackberry', 'playstation portable', 'tablet browser');
// var_dump($agent);exit;
foreach ($mobile_agent_array as $value) { 
if (strpos($ua, $value) !== false) return true; 
} 
return false; 
}

$is_mobile_device = check_mobile();
if($is_mobile_device) $device = 'Mobile'; else $device = 'Computer';



function text($mes)
{
    $mes = nl2br($mes);
 
    return $mes;
}

function no_tags($mes)
{
    $mes = str_replace("<br />", "\r\n", $mes);
 
    return $mes;
}
	
	
	
	function minus($all, $minus)
{
	$all -= $minus;
	if (0 > $all) $all = 0;
	return $all;
}
// Считаем время бана
function kikt($t)
{
	$t2 = minus($t, time());
	if (empty($t2)) $t3 = 'Банн уже закончился';
	elseif ($t2 > (60 * 60 * 24 * 30)) $t3 = round($t2 / (60 * 60 * 24 * 30)) . ' месяцев';
	elseif ($t2 > (60 * 60 * 24)) $t3 = round($t2 / (60 * 60 * 24)) . ' дней';
	elseif ($t2 > (60 * 60)) $t3 = round($t2 / (60 * 60)) . ' часов';
	elseif ($t2 > 60) $t3 = round($t2 / 60) . ' минут';
	else $t3 = $t2 . ' секунд';
	return $t3;
}

function pass($var) {
	return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $var);
}

/////////////////////////////////////////////////////////////////


function ontime($string) { 
if(floor($string/86400)>0){$day=floor($string/86400).'д. ';}else{$day=null;}
$hours=floor(($string/3600)-$day*24); 
$min=floor(($string-$hours*3600-$day*86400)/60); 
$sec=$string-($min*60+$hours*3600+$day*86400); 
if($hours>0)$hours=$hours.'ч.';else $hours=null;
if($min>0)$min=$min.'м.';else $min=null;
if($sec>0)$sec=$sec.'сек.';else $sec=null;
return $day.''.$hours.' '.$min.' '.$sec.'';
}

	
	
	

function checksss($msg) {
	if (is_array($msg)) {
		foreach($msg as $key => $val) {
			$msg[$key] = check($val);
		} 
	} else {
		$msg = htmlspecialchars($msg);
		$search = array('|', '\'', '$', '\\', '^', '%', '`', "\0", "\x00", "\x1A", chr(226) . chr(128) . chr(174));
		$replace = array('&#124;', '&#39;', '&#36;', '&#92;', '&#94;', '&#37;', '&#96;', '', '', '', '');

		$msg = str_replace($search, $replace, $msg);
		$msg = stripslashes(trim($msg));
	} 

	return $msg;
}	


function highlight_code($code) {
	$code = nosmiles($code);
	$code = strtr($code, array('&lt;'=>'<', '&gt;'=>'>', '&amp;'=>'&', '&quot;'=>'"', '&#36;'=>'$', '&#37;'=>'%', '&#39;'=>"'", '&#92;'=>'\\', '&#94;'=>'^', '&#96;'=>'`', '&#124;' => '|', '<br />'=>"\r\n"));

	$code = highlight_string($code, true);
	$code = strtr($code, array("\r\n"=>'<br />', '://'=>'&#58//', '$'=>'&#36;', "'"=>'&#39;', '%'=>'&#37;', '\\'=>'&#92;', '`'=>'&#96;', '^'=>'&#94;', '|'=>'&#124;'));

	$code = '<div class="d">'.$code.'</div>';
	return $code;
} 


function highlight($code) {
    //$code = nosmiles($code);
    $code = html_entity_decode(trim($code), ENT_QUOTES, 'UTF-8');
    $code = strtr($code, array('&lt;' => '<', '&gt;' => '>', '&amp;' => '&', '&quot;' => '"', '&#36;' => '$', '&#37;' => '%', '&#39;' => "'", '&#92;' => '\\', '&#94;' => '^', '&#96;' => '`', '&#124;' => '|', '<br />' => "brbr"));


    $code = highlight_string(stripslashes($code), true);
    $code = strtr($code, array("brbr" => '<br />', '$' => '&#36;', "'" => '&#39;', '%' => '&#37;', '\\' => '&#92;', '`' => '&#96;', '^' => '&#94;', '|' => '&#124;'));
                    // <div class='quote'>
    $code = '<br /><div class="phpcode">' . $code . '</div>';
    return $code;
}




function time_left($tl)
{
$d=3600*24;
$day=floor($tl/$d);
$tl=$tl-($d*$day);

$hour=floor($tl/3600);
$tl=$tl-(3600*$hour);

$minute=floor($tl/60);
$tl=$tl-(60*$minute);

$second=floor($tl);

$dayt="".($day>0?"$day д. ":null)."";
$hourt="".($hour>0?"$hour ч. ":null)."";
$minutet="".($minute>0?"$minute м. ":null)."";
$secondt="".($second>0?"$second с. ":null)."";
if($day>0)
{
$minutet=NULL;
$secondt=NULL;
}
if($hour>0 && $day==0)
{
$secondt=NULL;
$dayt=NULL;
}
return "$dayt$hourt$minutet$secondt";
}


function rating($rating)
{
$p=floor($rating/1000000000000000);
$t=floor($rating/1000000000000);
$g=floor($rating/1000000000);
$m=floor($rating/1000000);
$k=floor($rating/1000);
if($p!=0)
{
$p=$rating/1000000000000000;
$rating=round($p,1);
$rating="$rating p"; 
}
elseif($t!=0)
{
$t=$rating/1000000000000;
$rating=round($t,1);
$rating="$rating t";
}
elseif($g!=0)
{
$g=$rating/1000000000;
$rating=round($g,1);
$rating="$rating g";
}
elseif($m!=0)
{
$m=$rating/1000000;
$rating=round($m,1);
$rating="$rating m";
}
elseif($k!=0)
{
$k=$rating/1000;
$rating=round($k,1);
$rating="$rating k";
}
else $rating=(int)$rating;
return "$rating";
}


function gradient( $string, $from = '', $to = '' ) {
    $out    = null;
    $string = iconv( 'utf-8', 'windows-1251', $string );
    //
    $to     = array(
         hexdec( $to[ 0 ] . $to[ 1 ] ), // r
        hexdec( $to[ 2 ] . $to[ 3 ] ), // g
        hexdec( $to[ 4 ] . $to[ 5 ] ) // b
    );
    //
    $from   = array(
         hexdec( $from[ 0 ] . $from[ 1 ] ), // r
        hexdec( $from[ 2 ] . $from[ 3 ] ), // g
        hexdec( $from[ 4 ] . $from[ 5 ] ) // b
    );
    $levels = strlen( $string );
    for ( $i = 1; $i <= $levels; $i++ ) {
        for ( $ii = 0; $ii < 3; $ii++ ) {
            $tmp[ $ii ] = $from[ $ii ] - $to[ $ii ];
            $tmp[ $ii ] = floor( $tmp[ $ii ] / $levels );
            $rgb[ $ii ] = $from[ $ii ] - ( $tmp[ $ii ] * $i );
            if ( $rgb[ $ii ] > 255 ) {
                $rgb[ $ii ] = 255;
            }
            $rgb[ $ii ] = dechex( $rgb[ $ii ] );
            if ( strlen( $rgb[ $ii ] ) < 2 ) {
                $rgb[ $ii ] = '0' . $rgb[ $ii ];
            }
        }
        $out .= '<span style="color: #' . $rgb[ 0 ] . $rgb[ 1 ] . $rgb[ 2 ] . '">' . $string[ $i - 1 ] . '</span>';
    }
    return iconv( 'windows-1251', 'utf-8', $out );
}

function GradientLetter($text, $from = '', $to = '', $mode = 'hex')
{
    $text = iconv("UTF-8", "windows-1251", $text);
    if ($mode == 'hex') {
        $to = hexdec($to['0'] . $to['1']) . ',' . hexdec($to['2'] . $to['3']) . ',' . hexdec($to['4'] . $to['5']);
        $from = hexdec($from['0'] . $from['1']) . "," . hexdec($from['2'] . $from['3']) . "," . hexdec($from['4'] . $from['5']);
    }
    if (empty($text)) return null; else $levels = strlen($text);
    if (empty($from)) $from = array(0, 0, 255); else $from = explode(',', $from);
    if (empty($to)) $to = array(255, 0, 0); else $to = explode(',', $to);
    $output = null;
    for ($i = 1; $i <= $levels; $i++) {
        for ($ii = 0; $ii < 3; $ii++) {
            $tmp[$ii] = $from[$ii] - $to[$ii];
            $tmp[$ii] = floor($tmp[$ii] / $levels);
            $rgb[$ii] = $from[$ii] - ($tmp[$ii] * $i);
            if ($rgb[$ii] > 255) $rgb[$ii] = 255;
            $rgb[$ii] = dechex($rgb[$ii]);
            $rgb[$ii] = strtoupper($rgb[$ii]);
            if (strlen($rgb[$ii]) < 2) $rgb[$ii] = '0' . $rgb[$ii];
        }
        $output .= '<span style="color: #' . $rgb['0'] . $rgb['1'] . $rgb['2'] . '">' . $text[$i - 1] . '</span>';
    }
    return iconv("windows-1251", "UTF-8", $output);
}

function times($time) { 
	switch (date('j n Y', $time)) {
		case date('j n Y'): 
			return 'Сегодня ' . date('H:i', $time) .''; 
			break;

		case date('j n Y', $_SERVER['REQUEST_TIME'] - 86400): 
			return 'Вчера ' . date('H:i', $time).''; 
			break;
			
		default: 
			return strtr(date('j M Y в H:i', $time), array('Jan' => 'Янв', 
				'Feb' => 'Фев', 
				'Mar' => 'Марта', 
				'Apr' => 'Апр', 
				'May' => 'Мая', 
				'Jun' => 'Июня', 
				'Jul' => 'Июля', 
				'Aug' => 'Авг', 
				'Sep' => 'Сент', 
				'Oct' => 'Окт', 
				'Nov' => 'Ноября', 
				'Dec' => 'Дек')); 
				break; 
	}
}

function bb_code($text){
	$text=preg_replace('|%%(.+)%%|','<span class="spoiler">$1</span>',$text);
	$text = preg_replace('|\[b](.+)\[\/b]|','<b>$1</b>',$text);
	$text = preg_replace('|\[i](.+)\[\/i]|','<i>$1</i>',$text);
	$text = preg_replace('|\[u](.+)\[\/u]|','<u>$1</u>',$text);
	$text = preg_replace('|\[big](.+)\[\/big]|','<big>$1</big>',$text);
	$text = preg_replace('|\[small](.+)\[\/small]|','<small>$1</small>',$text);
	$text = preg_replace('|\[del](.+)\[\/del]|','<del>$1</del>',$text);
	$text = preg_replace('|\[quote](.+)\[\/quote]|','<div class="ads">$1</div>',$text);
	$text = preg_replace('#\[url\=http://(.*)\](.*)\[/url\]#Ui','<a href="http://'.$_SERVER['HTTP_HOST'].'/go?url=http://\\1" target="_blank">\\2</a>',$text);//для ссылок
	$text = preg_replace('|\[img](.+)\[\/img]|','<a href="$1"><img src="$1" alt="" style="height:150px;"/></a>',$text);
	$text = preg_replace('|\[color=red](.+)\[\/color]|','<font color="#dc143c">$1</font>',$text);
	$text = preg_replace('|\[music](.+)\[\/music]|','<object type="application/x-shockwave-flash" data="/player/ump3player.swf" height="67" width="380">
	<param name="wmode" value="transparent" /><param name="allowFullScreen" value="true" />
	<param name="allowScriptAccess" value="always" /><param name="movie" value="http://'.$_SERVER['HTTP_HOST'].'/player/ump3player.swf" />
	<param name="FlashVars" value="way=$1&swf=http://'.$_SERVER['HTTP_HOST'].'/player/ump3player.swf&w=380&h=67&&autoplay=0&q=&skin=grey&volume=100&comment=" />
	</object>',$text);
	$text = preg_replace("/(^|[\n ])([\w]*?)((www|ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a href=\"http://$3\" >$3</a>", $text);
	$text = preg_replace("/(^|[\n ])([\w]*?)((ht|f)tp(s)?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a href=\"$3\" >$3</a>", $text);
	/* ХЕШ ТЕГИ */
    $text = preg_replace("/@(\w+)/", '<a href="http://'.$_SERVER['HTTP_HOST'].'/profile$1" target="_blank">profile$1</a>', $text);
    $text = preg_replace("/\#(\w+)/", '<a href="'.$_SERVER['HTTP_HOST'].'/tag/$1" target="_blank">#$1</a>',$text);
	return $text;
}





function genPassword($number)
{
  $arr = array('a','b','c','d','e','f',
                 'g','h','i','j','k','l',
                 'm','n','p','r','s',
                 't','u','v','x','y','z',
                 'A','B','C','D','E','F',
                 'G','H','I','J','K','L',
                 'M','N','P','R','S',
                 'T','U','V','X','Y','Z',
                 '1','2','3','4','5','6',
                 '7','8','9');  
  $pass = "";
  for($i = 0; $i < $number; $i++)
  {      
    $index = rand(0, count($arr) - 1);
    $pass .= $arr[$index];
  }
  return $pass;
}

function makestime($string)
	{
	 $day=floor($string/86400);
	 $hours=floor(($string/3600)-$day*24);
	 $min=floor(($string-$hours*3600-$day*86400)/60);
	 $sec=$string-($min*60+$hours*3600+$day*86400);
	 $sec=intval($sec);
	 return $day.' дн. '.$hours.'час. '.$min.'мин. '.$sec.'сек. ';
	}
function calc_age($d, $m, $y)
	{
	 $age = date('Y') - $y;
	 $_m = date('m');
	 if($_m < $m || ($_m == $m && date('d') < $d))
	 $age--;
	 return $age;
	}
	
	function times1($times=NULL)
	{
	 //global $time;
	 $time = time();
	 if(($time-$times)<=60)
	 	{
		 $timesp = slv((($time-$times)),'секунду','секунды','секунд').' назад';
		 return $timesp;
		}
	 elseif(($time-$times)<=3600)
	 	{
	 	 $timesp = slv((($time-$times)/60),'минуту','минуты','минут').' назад';
	 	 return $timesp;
		}
	 else
	 	{
		 $today = date("j M Y", $time);
		 $today = date("j M Y", $time);
		 $yesterday = date("j M Y", strtotime("-1 day"));
		 $timesp=date("j M Y  в H:i", $times);
		 $timesp = str_replace($today, 'Сегодня', $timesp);
		 $timesp = str_replace($yesterday, 'Вчера', $timesp);
		 $timesp = strtr($timesp, array ('Jan' => 'Янв','Feb' => 'Фев','Mar' => 'Марта',
		 								 'May' => 'Мая','Apr' => 'Апр','Jun' => 'Июня',
		 								 'Jul' => 'Июля','Aug' => 'Авг',
		 								 'Sep' => 'Сент','Oct' => 'Окт',
		 								 'Nov' => 'Ноября','Dec' => 'Дек',));
		 return $timesp;
		}
	}
function times2($times=NULL)
	{
	 global $db, $_GET;
	 $timesp=date("j M  в H:i", $times);
	 $timesp = strtr($timesp, array ("Jan" => "Янв","Feb" => "Фев",
	 "Mar" => "Марта","May" => "Мая","Apr" => "Апр","Jun" => "Июня",
	 "Jul" => "Июля","Aug" => "Авг","Sep" => "Сент","Oct" => "Окт",
	 "Nov" => "Ноября","Dec" => "Дек",));
	 if (isset($_GET['timesp']))$timesp='12';
	 return $timesp;
	}
	
	
	function kikt($t)
	{
	 global $db, $time;
	 $t2 = $t-$time;
	 if($t2>(60*60*24*30)) $t3 = round($t2/(60*60*24*30)).' месяцев';
	 else if($t2>(60*60*24)) $t3 = round($t2/(60*60*24)).' дней';
	 else if($t2>(60*60)) $t3 = round($t2/(60*60)).' часов';
	 else if($t2>60) $t3 = round($t2/60).' минут';
	 else $t3 = $t2.' секунд';
	 return $t3;
	}
	
	function level($level) {
switch ($level) {
case '9': $status = 'Создатель сайта'; break;
case '8': $status = 'Супер Админ'; break;
case '7': $status = 'Админ'; break;
case '6': $status = 'Старший модер'; break;
case '5': $status = 'Модератор'; break;
case '4': $status = 'Элитный Мастер'; break;
case '3': $status = 'Мастер'; break;
case '2': $status = 'Наш чел!'; break;
case '1': $status = 'Новичек'; break;
case '0':  $status = 'Бродяга'; break;
}
return $status;
}
	
	function addmail($usermail, $subject, $msg)
	{
	 global $db, $set;
	 $mail = 'admin@'.$_SERVER['HTTP_HOST'];
	 $name = $set['name'];
	 function utf_to_win2($str)
		{
		 if (function_exists('mb_convert_encoding')) return mb_convert_encoding($str, 'windows-1251', 'utf-8');
		 if (function_exists('iconv')) return iconv('utf-8', 'windows-1251', $str);
		 $utf8win1251 = array("А"=>"\xC0","Б"=>"\xC1","В"=>"\xC2","Г"=>"\xC3","Д"=>"\xC4","Е"=>"\xC5","Ё"=>"\xA8","Ж"=>"\xC6","З"=>"\xC7","И"=>"\xC8","Й"=>"\xC9","К"=>"\xCA","Л"=>"\xCB","М"=>"\xCC","Н"=>"\xCD","О"=>"\xCE","П"=>"\xCF","Р"=>"\xD0","С"=>"\xD1","Т"=>"\xD2","У"=>"\xD3","Ф"=>"\xD4","Х"=>"\xD5","Ц"=>"\xD6","Ч"=>"\xD7","Ш"=>"\xD8","Щ"=>"\xD9","Ъ"=>"\xDA",
		 "Ы"=>"\xDB","Ь"=>"\xDC","Э"=>"\xDD","Ю"=>"\xDE","Я"=>"\xDF","а"=>"\xE0","б"=>"\xE1","в"=>"\xE2","г"=>"\xE3","д"=>"\xE4","е"=>"\xE5","ё"=>"\xB8","ж"=>"\xE6","з"=>"\xE7",
		 "и"=>"\xE8","й"=>"\xE9","к"=>"\xEA","л"=>"\xEB","м"=>"\xEC","н"=>"\xED","о"=>"\xEE","п"=>"\xEF","р"=>"\xF0","с"=>"\xF1","т"=>"\xF2","у"=>"\xF3","ф"=>"\xF4","х"=>"\xF5",
		 "ц"=>"\xF6","ч"=>"\xF7","ш"=>"\xF8","щ"=>"\xF9","ъ"=>"\xFA","ы"=>"\xFB","ь"=>"\xFC","э"=>"\xFD","ю"=>"\xFE","я"=>"\xFF");
		 return strtr($str, $utf8win1251);
		}
	 $subject = utf_to_win2($subject);
	 $msg = utf_to_win2($msg);
	 $name = utf_to_win2($name);
	 $subject = convert_cyr_string($subject, 'w','k');
	 $msg = convert_cyr_string($msg, 'w','k');
	 $name = convert_cyr_string($name, 'w','k');
	 $subject = '=?KOI8-R?B?'.base64_encode($subject).'?=';
	 $adds = "From: ".$name." <".$mail.">\n";
	 $adds .= "X-sender: ".$name." <".$mail.">\n";
	 $adds .= "Content-Type: text/plain; charset=koi8-r\n";
	 $adds .= "MIME-Version: 1.0\n";
	 $adds .= "Content-Transfer-Encoding: 8bit\n";
	 $adds .= "X-Mailer: PHP v.".phpversion();
	 return mail($usermail,$subject,$msg,$adds);
	}
	
	
	function php($code) {

    $code = strtr($code, array('&lt;' => '<', '&gt;' => '>', '&amp;' => '&', '&quot;' => '"', '&#36;' => '$', '&#37;' => '%', '&#39;' => "'", '&#92;' => '\\', '&#94;' => '^', '&#96;' => '`', '&#124;' => '|', '<br />' => ""));


    $code = highlight_string(stripslashes($code), true);
    $code = strtr($code, array("\r\n" => '<br />', '$' => '&#36;', "'" => '&#39;', '%' => '&#37;', '\\' => '&#92;', '`' => '&#96;', '^' => '&#94;', '|' => '&#124;'));

    $code = '<div class="d">' . $code . '</div>';
    return $code;
}



function passgen( $count = 8 ) {
    $symbols = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $out     = '';
    for ( $i = 0; $i < $count; $i++ ) {
        $out .= $symbols[ mt_rand( 0, 61 ) ];
    }
    return $out;
}






abstract class text {

    static function extract16color($color16) {
        $mask16 = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F");
        $color_mask = array("r", "g", "b");
        $true_color = array(
            "r" => 0,
            "g" => 0,
            "b" => 0);
        $color16 = substr($color16, 1);
        for ($icm = 0; $icm < count($color_mask); $icm++) {
            $color16_temp = array(substr($color16, ($icm * 2), 1), substr($color16, ($icm * 2) + 1, 1));
            for ($ic = 0; $ic < 2; $ic++) {
                for ($i = 0; $i < count($mask16); $i++) {
                    if ($color16_temp[$ic] == $mask16[$i]) {
                        $color16_temp[$ic] = $i;
                        break;
                    }
                }
            }
            $true_color[$color_mask[$icm]] = ((int) $color16_temp[0] * 16) + (int) $color16_temp[1];
        }
        return $true_color;
    }

    static function make16color($color10) {
        $mask16 = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F");
        $color_mask = array("r", "g", "b");
        $true_color = "#";
        for ($icm = 0; $icm < count($color_mask); $icm++) {
            $color10_temp = (int) $color10[$color_mask[$icm]];
            $true_color .= $mask16[(int) ($color10_temp / 16)];
            $true_color .= $mask16[$color10_temp % 16];
        }
        return $true_color;
    }

    static function gradient($text, $sColor, $eColor) {
        $color_mask = array("r", "g", "b");
        $color_move = array(
            "r" => 0,
            "g" => 0,
            "b" => 0);
        $color_add = array(
            "r" => 0,
            "g" => 0,
            "b" => 0);
        $word = array();
        $length = strlen($text);
        $output = "";
        $Gzip = "";
        $current_color = "";
        $max = 0;
        if ($length > 0) {
            $sColor = self::extract16color($sColor);
            $eColor = self::extract16color($eColor);
            $cColor = $sColor;
            for ($i = 0; $i < count($color_mask); $i++) {
                $temp = $sColor[$color_mask[$i]] - $eColor[$color_mask[$i]];
                $color_add[$color_mask[$i]] = abs($temp);
                if (abs($temp) > $max) {
                    $max = abs($temp);
                }
                if ($temp < 0) {
                    $color_move[$color_mask[$i]] = 1;
                } else if ($temp > 0) {
                    $color_move[$color_mask[$i]] = - 1;
                } else {
                    $color_move[$color_mask[$i]] = 0;
                }
            }
            for ($i = 0; $i < $length; $i++) {
                $char = substr($text, $i, 1);
                $test = ord($char);
                if ($test >= 128 and $test <= 255 | $test = "") {
                    $char = substr($text, $i, 2);
                    $i++;
                }
                $word[] = $char;
            }
        }

        $length = count($word);
        $koeff_add = @(($max / $length) / $max) * 100;
        for ($i = 0; $i < $length; $i++) {
            for ($i2 = 0; $i2 < count($color_mask); $i2++) {
                $add = (($color_add[$color_mask[$i2]] / 100) * $koeff_add) * $color_move[$color_mask[$i2]];
                $cColor[$color_mask[$i2]] += $add;
            }
            $current_color = self::make16color($cColor);
            if (!$i) {
                $output .= '<font color = "' . $current_color . '">' . $word[$i];
                $Gzip = $current_color;
            } else {
                if ($current_color == $Gzip | $word[$i] == " ") {
                    $output .= $word[$i];
                } else {
                    $output .= '</font><font color = "' . $current_color . '">' . $word[$i];
                    $Gzip = $current_color;
                }
            }
        }
        if (strlen($output)) {
            $output .= "</font>";
        }
        return $output;
    }

    static function smiles($msg) {
        $q = mysql_query("SELECT * FROM `smiles_spis`");
        while ($post = mysql_fetch_array($q)) {
            $msg = str_replace($post['sim'], "<img src = '/style/smiles/emotion_$post[name].png' alt = '$post[name]' />", $msg);
        }
        return $msg;
    }

    #Получение подстроки

    static function substr($text, $len, $start = 0, $mn = ' (...)') {
        $text = trim($text);
        if (function_exists('mb_substr')) {
            return mb_substr($text, $start, $len) . (mb_strlen($text) > $len - $start ? $mn : null);
        }
        if (function_exists('iconv')) {
            return iconv_substr($text, $start, $len) . (iconv_strlen($text) > $len - $start ? $mn : null);
        }

        return $text;
    }

#Фильтрация текста с ограничением длины в зависимости от типа браузера.

    static function for_opis($text) {
        $text = self::substr($text, IS_WEB == 'web' ? 1000 : 300);
        $text = self::toOutput($text);

        return $text;
    }

    static function toOutput($str, $br = 1, $html = 1, $smiles = 1, $links = 1, $bbcode = 1) {

        if ($html) {
            $str = htmlentities($str, ENT_QUOTES, 'UTF-8');
        } // преобразуем все к нормальному перевариванию браузером
        if ($links) {
            $str = links($str);
        } // обработка ссылок
        if ($bbcode) {
            $tmp_str = $str;
            $str = bbcode($str); // обработка bbcode
        }

        if ($smiles && $tmp_str == $str) {
            $str = self::smiles($str);
        } // вставка смайлов
        if ($br) {
            $str = self::br($str); // переносы строк
        }
        // обработка старых цитат с числом в теге
        $str = preg_replace('#\[(/?)quote_([0-9]+)(\]|\=)#ui', '[\1quote\3', $str);

        // преобразование ссылки на youtube ролик в ИИсщву
        $str = preg_replace('#(^|\s|\(|\])((https?://)?www\.youtube\.com/watch\?(.*?&)*v=([^ \r\n\t`\'"<]+))(,|\[|<|\s|$)#iuU', '\1[youtube]\5[/youtube]\6', $str);

        // преобразование ссылок в тег URL
        $str = preg_replace('#(^|\s|\(|\])([a-z]+://([^ \r\n\t`\'"<]+))(,|\[|<|\s|$)#iuU', '\1[url="\2"]\2[/url]\4', $str);

        return $str;
    }

# переносы строк

    static function br($msg, $br = '<br />') {
        return preg_replace("#((<br( ?/?)>)|\n|\r)+#i", $br, $msg);
    }

# Вырезает все нечитаемые символы

    static function esc($text, $br = NULL) {
        if ($br != NULL) {
            for ($i = 0; $i <= 31; $i++) {
                $text = str_replace(chr($i), NULL, $text);
            }
        } else {
            for ($i = 0; $i < 10; $i++) {
                $text = str_replace(chr($i), NULL, $text);
            }
            for ($i = 11; $i < 20; $i++) {
                $text = str_replace(chr($i), NULL, $text);
            }
            for ($i = 21; $i <= 31; $i++) {
                $text = str_replace(chr($i), NULL, $text);
            }
        }
        return $text;
    }

    static function auto_bb($form, $field) {
        global $bb_start;
        $out = '';
        if (!$bb_start) {
            $out = '<script language="JavaScript" type="text/javascript">;
	function tag(text1, text2) {
	if ((document.selection)) {
	document.' . $form . '.' . $field . '.focus();
	document.' . $form . '.document.selection.createRange().text = text1+document.' . $form . '.document.selection.createRange().text+text2;
	} else if(document.forms[\'' . $form . '\'].elements[\'' . $field . '\'].selectionStart!=undefined) {
	var element = document.forms[\'' . $form . '\'].elements[\'' . $field . '\'];
	var str = element.value;
	var start = element.selectionStart;
	var length = element.selectionEnd - element.selectionStart;
	element.value = str.substr(0, start) + text1 + str.substr(start, length) + text2 + str.substr(start + length);
	document.forms[\'' . $form . '\'].elements[\'' . $field . '\'].focus();
	} else document.' . $form . '.' . $field . '.value += text1+text2;
	document.forms[\'' . $form . '\'].elements[\'' . $field . '\'].focus();}</script>';
            $bb_start = 1;
        }
        return $out . '<div style="margin:1px;padding:2px;">
	<a href="javascript:tag(\'[b]\', \'[/b]\')"><img src="/style/icons/bb/b.png" alt="b" title="Жирный"/></a>
	<a href="javascript:tag(\'[i]\', \'[/i]\')"><img src="/style/icons/bb/i.png" alt="i" title="Наклонный"/></a>
	<a href="javascript:tag(\'[u]\', \'[/u]\')"><img src="/style/icons/bb/u.png" alt="u" title="Подчёркнутый"/></a>
	<a href="javascript:tag(\'[s]\', \'[/s]\')"><img src="/style/icons/bb/s.png" alt="s" title="Перечёркнутый"/></a>
	<a href="javascript:tag(\'[php]\', \'[/php]\')"><img src="/style/icons/bb/php.png" alt="cod" title="Код"/></a>
	<a href="javascript:tag(\'[url=]\', \'[/url]\')"><img src="/style/icons/bb/l.png" alt="url" title="Ссылка" /></a>
	<a href="javascript:tag(\'[red]\', \'[/red]\')"><img src="/style/icons/bb/red.png" alt="red" title="Красный"/></a>
	<a href="javascript:tag(\'[green]\', \'[/green]\')"><img src="/style/icons/bb/green.png" alt="green" title="Зелёный"/></a>
	<a href="javascript:tag(\'[blue]\', \'[/blue]\')"><img src="/style/icons/bb/blue.png" alt="blue" title="Синий"/></a><br />
	</div>';
    }

}


        $fileName = time().'_'.$_FILES['file']['name'];


       	$file = "../uploads/$fid.temp";
       	$types = array('image/gif', 'image/jpg', 'image/jpeg', 'image/png', 'image/JPG', 'image/pjpeg', 'image/GIF');
       	if($size = getimagesize($file) and $size and in_array($size['mime'], $types))
       	{
			switch($size['mime'])
			{
				case 'image/jpg': case 'image/jpeg': case 'image/pjpeg': case 'image/JPG':
				$src = imagecreatefromjpeg($file);
				break;
				case 'image/gif': case 'image/GIF':
				$src = imagecreatefromgif($file);							
				break;				
				case 'image/png':
				$src = imagecreatefrompng($file);
				break;
			}
			$width = $size[0];
			$height = $size[1];
			
			//Create thumbnail
			$maxwidth = 320;
			$maxheight = 240;
			while(($height/$width)*$maxwidth>$maxheight+1){ $maxwidth = $maxwidth - 1; }
			$newwidth=$maxwidth;
			$newheight=($height/$width)*$maxwidth;
			$tmp=imagecreatetruecolor($newwidth,$newheight);
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
			$link = md5($salt . $fid . 'small');
			imagepng($tmp, "../previews/$link.png", 0);
			
			//Create preview
			$maxwidth = $width > 800 ? 800 : $width;
			$maxheight = $height > 800 ? 800 : $height;
			while(($height/$width)*$maxwidth>$maxheight+1){ $maxwidth = $maxwidth - 1; }
			$newwidth=$maxwidth;
			$newheight=($height/$width)*$maxwidth;
			$tmp=imagecreatetruecolor($newwidth,$newheight);
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
			$link = md5($salt . $fid . 'big');
			imagepng($tmp, "../previews/$link.png", 0);
			
			
			
			
			public function download($shortURL, $password = '')
	{
		if( empty($shortURL) ) return false;
		
		//Stop HotLinking!, check URL Referrer
		$home = parse_url(URLPrefix."://".yourURL);
		$ref = parse_url($_SERVER['HTTP_REFERER']);
		
		if(hotLinkProtection and strcasecmp($home['host'], $ref['host']) != 0)
		{
			header('Location: '.URLPrefix.'://'.yourURL);
			return false;
		}
		
		if( !$this->view($shortURL, $password) ) return false;		
				
		//Push file to user
		header("Content-type: application/force-download");
		header("Content-Transfer-Encoding: Binary");
		header("Content-length: ".filesize("../uploads/{$this->fid}.temp"));
		header("Content-disposition: attachment; filename=\"".urldecode(basename($this->filename))."\"");
		readfile("../uploads/{$this->fid}.temp");
		return true;
	}
	
	
	
	
	
	
	
	
	
	
	
header ('Content-Type: text/html; charset=' . $tracker_lang['language_charset']);
header ('X-Powered-by: Top Premium by InDiGo');
header ('X-Chocolate-to: InDiGo (ICQ 495183498 Skype: indigo20141)');
header ('Cache-Control: no-cache');
header ('Pragma: no-cache');





function get_elapsed_time($ts) {
$mins = floor((time() - $ts) / 60);
$hours = floor($mins / 60);
$mins -= $hours * 60;
$days = floor($hours / 24);
$hours -= $days * 24;
$weeks = floor($days / 7);
$days -= $weeks * 7;
$t = "";

if ($weeks > 0)
return "$weeks недел" . ($weeks > 1 ? "и" : "я");

if ($days > 0)
return "$days д" . ($days > 1 ? "ней" : "ень");

if ($hours > 0)
return "$hours час" . ($hours > 1 ? "ов" : "");

if ($mins > 0)
return "$mins минут" . ($mins > 1 ? "" : "а");
return "< 1 минуты";
}	
	
	
	
	
	
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||



<?
if(!defined('IN_TRACKER'))
die('Hacking attempt!');



  
function getPerc($id){
$total = 0;
$rows = 0;

$sel = mysql_query("SELECT rating_num FROM ratetrackers WHERE tracker = '$id'");
if(mysql_num_rows($sel) > 0){

while($data = mysql_fetch_assoc($sel)){

$total = $total + $data['rating_num'];
$rows++;
}

$perc = ($total/$rows) * 20;
$newPerc = round($perc,2);
return $newPerc;

} else {
return '0';
} }




function getRating($id){
$total = 0;
$rows = 0;

$sel = mysql_query("SELECT rating_num FROM ratetrackers WHERE tracker = '$id'");
if(mysql_num_rows($sel) > 0){

while($data = mysql_fetch_assoc($sel)){

$total = $total + $data['rating_num'];
$rows++;
}

$perc = ($total/$rows) * 20;

$newPerc = round($perc,2);
return $newPerc.'%';
} else {
return '0%';
} }




function outOfFive($id){
$total = 0;
$rows = 0;

$sel = mysql_query("SELECT rating_num FROM ratetrackers WHERE tracker = '$id'");
if(mysql_num_rows($sel) > 0){

while($data = mysql_fetch_assoc($sel)){

$total = $total + $data['rating_num'];
$rows++;
}

$perc = ($total/$rows);
return round($perc,2);
} else {
return '0';
} }




function getVotes($id){
$sel = mysql_query("SELECT rating_num FROM ratetrackers WHERE tracker = '$id'");
$rows = mysql_num_rows($sel);

if($rows == 0){
$votes = '0 голосов';
} else if($rows == 1){
$votes = '1 голос';
} else {
$votes = $rows.' голосов';
}
return $votes;
}




function pullRating($id, $show5 = false, $showPerc = false, $showVotes = false, $showRatio = false, $userid, $static = NULL){
echo"<link href=\"templates/SitTop/rating_style.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\">
<script type=\"text/javascript\" src=\"script/rating_update.js\"></script>";

$text = '';
$user = (int)$userid;

if ($user) {
$sel = mysql_query("SELECT id FROM ratetrackers WHERE userid = '".$user."' AND tracker = '$id'") or die(mysql_error());
} else {
$sel = mysql_query("SELECT id FROM ratetrackers WHERE ip = '".$ip."' AND tracker = '$id'") or die(mysql_error());
}

if(mysql_num_rows($sel) > 0 || $static == 'novote' || !isset($_COOKIE['has_voted_'.$id])){

if($show5 || $showPerc || $showVotes){
$text .= '<div class="rated_text">';
}


if($show5){
$text .= 'Рейтинг <span id="outOfFive_'.$id.'" class="out5Class">'.outOfFive($id).'</span>/5';
}

if($showPerc){
$text .= ' (<span id="percentage_'.$id.'" class="percentClass">'.getRating($id).'</span>)';
}

if($showVotes){
$text .= ' (<span id="showvotes_'.$id.'" class="votesClass">'.getVotes($id).'</span>)';
}

if($show5 || $showPerc || $showVotes || $showRatio){
$text .= '</div>';
}

return $text.'
<ul class="star-rating2" id="rater_'.$id.'">
<li class="current-rating" style="width:'.getRating($id).';" id="ul_'.$id.'"></li>
<li><a onclick="return false;" href="#" title="Ужасно" class="one-star" >1</a></li>
<li><a onclick="return false;" href="#" title="Плохо" class="two-stars">2</a></li>
<li><a onclick="return false;" href="#" title="Нормально" class="three-stars">3</a></li>
<li><a onclick="return false;" href="#" title="Хорошо" class="four-stars">4</a></li>
<li><a onclick="return false;" href="#" title="Отлично" class="five-stars">5</a></li>
</ul>
<div id="loading_'.$id.'"></div>';

} else {

if($show5 || $showPerc || $showVotes || $showRatio){
$text .= '<div class="rated_text">';
}

if($show5) {
$show5bool = 'true';
$text .= 'Рейтинг <span id="outOfFive_'.$id.'" class="out5Class">'.outOfFive($id).'</span>/5';
} else {
$show5bool = 'false';
}

if($showPerc){
$showPercbool = 'true';
$text .= ' (<span id="percentage_'.$id.'" class="percentClass">'.getRating($id).'</span>)';
} else {
$showPercbool = 'false';
}

if($showVotes){
$showVotesbool = 'true';
$text .= ' (<span id="showvotes_'.$id.'" class="votesClass">'.getVotes($id).'</span>)';
} else {
$showVotesbool = 'false';
}

if($showRatio){
$showRatiobool = 'true';
} else {
$showRatiobool = 'false';
}

if($show5 || $showPerc || $showVotes || $showRatio){
$text .= '</div>';
}

return $text.'
<ul class="star-rating" id="rater_'.$id.'">
<li class="current-rating" style="width:'.getRating($id).';" id="ul_'.$id.'"></li>

<li><a onclick="rate(\'1\',\''.$id.'\','.$show5bool.','.$showPercbool.','.$showVotesbool.','.$showRatiobool.'); return false;" href="../rating_process.php?id='.$id.'&rating=1" title="Ужасно" class="one-star" >1</a></li>

<li><a onclick="rate(\'2\',\''.$id.'\','.$show5bool.','.$showPercbool.','.$showVotesbool.','.$showRatiobool.'); return false;" href="../rating_process.php?id='.$id.'&rating=2" title="Плохо" class="two-stars">2</a></li>

<li><a onclick="rate(\'3\',\''.$id.'\','.$show5bool.','.$showPercbool.','.$showVotesbool.','.$showRatiobool.'); return false;" href="../rating_process.php?id='.$id.'&rating=3" title="Нормально" class="three-stars">3</a></li>

<li><a onclick="rate(\'4\',\''.$id.'\','.$show5bool.','.$showPercbool.','.$showVotesbool.','.$showRatiobool.'); return false;" href="../rating_process.php?id='.$id.'&rating=4" title="Хорошо" class="four-stars">4</a></li>

<li><a onclick="rate(\'5\',\''.$id.'\','.$show5bool.','.$showPercbool.','.$showVotesbool.','.$showRatiobool.'); return false;" href="../rating_process.php?id='.$id.'&rating=5" title="Отлично" class="five-stars">5</a></li>
</ul>

<div id="loading_'.$id.'"></div>';
} }




function getTopRated($limit, $table, $idfield, $namefield) {

$result = '';

$sql = "SELECT ratetrackers.tracker, ".$table.".".$namefield." as thenamefield, ROUND(AVG(ratetrackers.rating_num),2) as rating

FROM ratetrackers, ".$table." WHERE ".$table.".".$idfield." = ratetrackers.tracker GROUP BY tracker

ORDER BY rating DESC LIMIT ".$limit."";

$sel = mysql_query($sql);

$result .= '<ul class="topRatedList">'."\n";

while($data = @mysql_fetch_assoc($sel)) {
$result .= '<li>'.$data['thenamefield'].' ('.$data['rating'].')</li>'."\n";
}

$result .= '</ul>'."\n";

return $result;

}







//////////



$orig =" <b> ! ~ ` \" \n \\\\\\\qwqeqwe </b>";


function stripslashes2($string) {
    $string = str_replace("\\\"", "\"", $string);
    $string = str_replace("\\'", "'", $string);
    $string = str_replace("\\\\", "\\", $string);
    $string = htmlentities($string, ENT_QUOTES, 'UTF-8');
    return $string;
}

function removeslashes($string)
{
   
	$string = str_replace("\\", "&#92;", $string);
	$string = str_replace("/", "&#47;", $string);
	
	//$string = htmlentities($string, ENT_QUOTES, 'UTF-8');
	$string = htmlspecialchars_decode($string);
		$string = htmlentities($string, ENT_QUOTES, 'UTF-8');
    return stripslashes(trim($string));
}

function highlight_code($code) {
	
   $code = stripslashes($code);
   $code = htmlentities($code, ENT_QUOTES, 'UTF-8');


	return $code;
} 


$aa = removeslashes($orig);



echo $aa; // I'll "walk" the <b>dog</b> now



/*
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



if (isset($_POST)){

foreach ($_POST as $key => $value) {


if (!is_numeric($value)) {	
$_POST[$key] = stripslashes(mysql_real_escape_string($value));	
} else if (is_float($value)) {
$_POST[$key] = (float)$value;	
} else {
$_POST[$key] = abs((int)$value);		
}

}
}
*/





?>






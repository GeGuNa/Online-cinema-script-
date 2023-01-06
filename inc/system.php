<?

ob_start();
session_start();
ini_set('display_errors', true);
ini_set('error_reporting', E_ALL);
date_default_timezone_set("Europe/Moscow");


//ini_set('date.timezone', 'Europe/Moscow'); 

//ini_set('session.use_cookies', true); 
//ini_set('session.use_trans_sid', true); 
ini_set('arg_separator.output', "&amp;"); 


require_once('mysql2i.class.php');



$DBHost='localhost'; 
$DBPort=3306;
$DBName='filmiii';
$DBUser='soc_ge'; 
$DBPassword='soc_ge'; 



mysql_connect($DBHost,$DBUser,$DBPassword);

mysql_select_db($DBName) or die("db not found");

mysql_query('set charset utf8');
mysql_query('set names utf8');



 
$DBH = new PDO("mysql:host=$DBHost;dbname=$DBName", $DBUser, $DBPassword);  
$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$DBH->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$DBH->exec("set charset utf8");
$DBH->exec("set names utf8");


function SQL_Exec($query, $values)
{
	global $DBH;
    try {
		$stmt = $DBH->prepare($query);
		$stmt->execute($values);
	}
    catch (PDOException $e) {
        SQL_Error($e, $query);
    }
}

function SQL_Fetch($query, $values)
{
	global $DBH;
    try {    
		$stmt = $DBH->prepare($query);
		$stmt->execute($values);  
		return $stmt;
        }
        
    catch (PDOException $e)
    {
        SQL_Error($e, $query);
    }
}

function SQL_Qeury($query)
{
	global $DBH;
    try {    
		return $DBH->query($query);
    }    
    catch (PDOException $e)
    {
        SQL_Error($e, $query);
    }
}

function SQL_MultiFetch ($query, $values)
{
	global $DBH;
    try {
        $stmt = $DBH->prepare($query);
        if (!$values) {
            $stmt->execute();
        } else {    
            $stmt->execute ($values);
        }
        return $stmt;
    }    
    catch (PDOException $e)
    {
        SQL_Error ($e, $query);
    }
}


function SQL_Count($query, $values)
{
	global $DBH;
    try {    
		$stmt = $DBH->prepare($query);
		$stmt->execute($values); 
		return $stmt->rowCount();
	}
        
    catch (PDOException $e)
    {
        SQL_Error($e, $query);
    }
}

function SQL_LastID ($pdo)
{
	global $DBH;
    return $pdo->lastInsertId();
}

function SQL_Error ($e, $query)
{
	file_put_contents('PDOErrors.txt', $e->getMessage()." $query ", FILE_APPEND);  
	echo $e->getMessage();  
}




if (isset($_COOKIE['nickname'])) {
$nckftch = $_COOKIE['nickname'];
$nckftps = $_COOKIE['password'];
} else if (isset($_SESSION['nickname'])){
$nckftch = $_SESSION['nickname'];
$nckftps = $_SESSION['password'];		
} else {
$nckftch = null;
$nckftps = null;	
}

if (isset($nckftch)) {
$usernm = SQL_Fetch("SELECT * FROM persons where user_nick = ? and password = ?", array($nckftch,$nckftps))->fetch();

SQL_Exec("UPDATE persons SET user_on_time = ?, last_visit = ?  where  user_id  = ?", array($usernm['user_on_time']+1, $_SERVER['REQUEST_TIME'], $usernm['user_id']));


}


function post_time($time) {

if (date("d") == date("d",$time)) {
	return 'сегодня в '.date("H:i",$time);
} else if ((date("d")-1) == date("d",$time)) {
	return 'вчера в '.date("H:i",$time);
}  else if ((date("d")-2) == date("d",$time)) {
	return 'позавчера в '.date("H:i",$time);
} else {
	return date("d M Y  ",$time);
	
}

}


function tine_data($time)
	{
		$month = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
		$month_rus = array('Янв','Фев','Мар','Апр','Мая','Июн','Июл','Авг','Сент','Окт','Ноя','Дек');
		$timep = date("j M Y - H:i:s", $time);
		$timep = str_replace($month,$month_rus,$timep);
		return $timep;
	}



?>

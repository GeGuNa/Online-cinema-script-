<?

include("inc/system.php");
include("inc/funcs.php");


if (!isset($usernm)) {
header("Location: /index.php");
exit;
}


session_destroy();


setcookie("nickname", "");  
setcookie("password", "");  


header("Location: /index.php");
exit;
<?
include("inc/system.php");
include("inc/funcs.php");








$vara = array();

$filmi_id=265;

for ($i=1; $i <= 22;  $i++) {
	
if ($i < 10) {

$vara[$i] = 'http://31.146.20.2/fast10/cbdaa8474ed189e0cd095be9409f0cba/1000537/1000537_07_0'.$i.'_Russian_1500.mp4';

} else {
	
$vara[$i] = 'http://31.146.20.2/fast10/cbdaa8474ed189e0cd095be9409f0cba/1000537/1000537_07_'.$i.'_Russian_1500.mp4';

}	



echo $vara[$i]."<br>";
	
//mysql_query("INSERT INTO `serials` (`film_id`, `film_seria`, `film_link`) VALUES ('".$filmi_id."','".$i."','".$vara[$i]."')");


}
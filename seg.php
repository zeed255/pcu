
<?php
$DBIps = "localhost";
$UserDBSamp = "root";
$ClaveSVR = "";
$nombre_db = "fp_db";

$conectSAMP = new mysqli($DBIps, $UserDBSamp, $ClaveSVR, $nombre_db);

if($conectSAMP-> connect_error){
	die("Conexión fallida: " . $conectSAMP-> connect_error);
}

if(!function_exists('QueryF'))
{
	function QueryF($fix)
	{
	   $fix = strip_tags(mysql_real_escape_string(trim($fix)));
	   return $fix; 
	}
}
////comprobar mercadito///////
$ass = date('Y-m-d H:i:s');
$merca = mysqli_query($conectSAMP,"DELETE FROM `MERCADITO` WHERE TIME_EXPIRE < '$ass'");
////////
?>
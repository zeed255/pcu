<?php 
/*------------------------------------*/
require_once ($_SERVER['DOCUMENT_ROOT'] . "/recursos/sql_inject.php"); 
$bDestroy_session = TRUE; 
$url_redirect = 'index.php'; 
$sqlinject = new sql_inject('./log_file_sql.log',$bDestroy_session,$url_redirect);  
/*------------------------------------*/

session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . "/seg.php");
error_reporting(0);

if($_SESSION['User'])
{ 
header('location: http://linexzone.org');
}
 
?>

<?php 
$nombreRegistro = mysql_real_escape_string($_GET['name']);
///Comprobar si nombre esta en uso
$query = mysql_query("SELECT * FROM CUENTA WHERE NAME ='$nombreRegistro'"); 
if(mysql_num_rows($query) >= 1)
{
	echo '2';
	return 0;
}
////verificar que el nombre tengas mas de 3 caracteres y menos de 24
if(strlen($nombreRegistro) < 3 || strlen($nombreRegistro) > 24) { echo '3'; return 0;}

///Ver si el nombre tiene guion
$guion = "_"; $scan = strpos($nombreRegistro, $guion); if ($scan === false) { echo '4'; return 0;} 

$namesinguion = str_replace("_"," ",$nombreRegistro);
////comprobar iniciales en mayuscula
if($namesinguion != ucwords($namesinguion)) { echo '5'; } else { echo '{"success":true}'; }
?>

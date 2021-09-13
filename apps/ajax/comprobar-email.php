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
$emailRegistro = mysql_real_escape_string($_GET['mail']);

///Ver si el email esta en uso
$query = mysql_query("SELECT * FROM CUENTA WHERE EMAIL ='".$emailRegistro."'"); 
if(mysql_num_rows($query) >= 1)
{
	echo '{"error":true}';
	return 0;
}
///comprobar que tenga arroba
$arroba = "@"; $scan = strpos($emailRegistro, $arroba); if ($scan === false) { echo '{"error":true}'; return 0;} 
///comprobar que tengo .com_addref
$dominio = ".com"; $scan = strpos($emailRegistro, $dominio); if ($scan === false) { echo '{"error":true}'; } else { echo '{"success":true}';} 
?>

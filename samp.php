<?php
/*------------------------------------*/

include_once 'includes/user.php';
include_once 'includes/user_session.php';
include_once 'includes/config.php';
include_once 'includes/geoiploc.php';

$userSession = new UserSession();
$user = new User();
/*------------------------------------*/
if(isset($_SESSION['user']) && !empty($_SESSION['user']))
{
	$ID = $_SESSION['ID'];
    
	/*Cuenta */$query = $user->connect()->prepare('SELECT * FROM users WHERE uID = :ID');
	$query->execute(['ID' => $ID]);
	
    while($cuenta = $query->fetch(PDO::FETCH_ASSOC))
    {
        $name = $cuenta['nick'];
		//$IP = $cuenta['IP'];
		$email = $cuenta['email'];
		$score = $cuenta['nivel'];
		$exp = $cuenta['exp'];
		$lvlvip = $cuenta['premium'];
		//$ultimac = $cuenta['UltimaConexion'];
		//$time_play = $cuenta['TIME-PLAYING'];
		//$moneda = $cuenta['SD'];//Coins en la gm
        $ropa = $cuenta['ropa'];
		$money = $cuenta['dinero'];
		$sexo = $cuenta['sexo'];
		$vida = $cuenta['vida'];
		$chaleco = $cuenta['chaleco'];
		$_SESSION['ropa'] = $ropa;
		$workname = $cuenta['job_1'];
		$numerotlf = $cuenta['telefono'];
	}

	/*Cuenta banco */$query2 = $user->connect()->prepare('SELECT * FROM cuentas_banco WHERE owner = :owner');
	$query2->execute(['owner' => $name]);
	if($query2->rowCount())
	{
		while($cuentaemail = $query2->fetch(PDO::FETCH_ASSOC))
		{
			$platabanco = $cuenta['monto'];
			$cuentabancaria = $cuenta['numero_cuenta'];
		}
	}	
	else 
	{
		$platabanco = '0';
		$cuentabancaria = 'No disponible';		
	}
		
	/*Ban */$query5 = $user->connect()->prepare('SELECT * FROM bans WHERE user = :nick');
	$query5->execute(['nick' => $name]);
	$baneado = $query5->rowCount();
	
	
	$query6 = $user->connect()->prepare('SELECT * FROM vehiculos WHERE owner = :nick');
	$query6->execute(['nick' => $name]);
	$contarvehiculos = $query6->rowCount();
	
	$query7 = $user->connect()->prepare('SELECT * FROM `negocios` WHERE owner = :nick');
	$query7->execute(['nick' => $name]);
	$contarcasas = $query7->rowCount();
}
else header('location: login.php');
?>
<?php
/*$year = $FinAno;
$month= $FinMes;
$day = $FinDia;
$hour = '00';
$minute = '00';
$second = '00';
//function cuenta_regresiva($year, $month, $day, $hour, $minute, $second)
//{
  global $return;
  global $countdown_date;
  $countdown_date = mktime($hour, $minute, $second, $month, $day, $year);
  $today = time();
  $diff = $countdown_date - $today;
  if ($diff < 0)$diff = 0;
  $dl = floor($diff/60/60/24);
  $hl = floor(($diff - $dl*60*60*24)/60/60);
  $ml = floor(($diff - $dl*60*60*24 - $hl*60*60)/60);
  $sl = floor(($diff - $dl*60*60*24 - $hl*60*60 - $ml*60));

$expvip2 .=  "".$dl."d ".$hl.":".$ml.":".$sl."h"."";
*/

/////////////////


/* $Segundos = $time_play;
$Horas= $Segundos / (60*60);
$Dias = $Horas/24; 

#Obtengo $Dias
$Array = explode(".", $Dias);
$Dias = $Array[0];
$Horas = $Array[1];

#Obtengo $Horas
$Horas = ("0.".$Horas) * 24;
$Array = explode(".", $Horas);
$Horas = $Array[0];
$Minutos = $Array[1];

#Obtengo minutos
$Minutos = ("0.".$Minutos) * 60;
$Array = explode(".", $Minutos);
$Minutos = $Array[0];

$tiempojugado = ''.$Dias.'d '.$Horas.'h '.$Minutos.'m';  
*/
?>
<!DOCTYPE html>

<html lang="es">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="user-scalable=no, width=device-width">
	<!--<base href="<?php echo $url; ?>">--><base href=".">
	<title>SAMP</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<script src="/cdn-cgi/apps/head/sPBVRXAtp3w2yttQJ-Hg4ScSgKw.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $url;?>favicon.ico">
	<script id="js-jquery" async="" type="text/javascript" src="<?php echo $url;?>js/jquery.min.js"></script>
	<script id="js-base" async="" type="text/javascript" src="<?php echo $url;?>/js/base.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/bootstrap.min.css" /> 
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/base.css?v=2.2.45" />
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>jquery.rollbar.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/fontawesome-all.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/styles.css" />
	<meta name="viewport" content="width=device-width">
</head>


<body id="site" class="module-page parent-home child-view page-home full-width non-logged user-desktop" browser-os="win" browser-name="browser-chrome"><script async="" src="./js/analytics.js"></script>

<?php include_once('vistas/header.php'); ?>
<div id="web">
<div id="page-content">

<div style="padding-top:20px"; class="base-size page">
<?php include_once('vistas/panel-menu.php');?>
<!-- <?php if($EMAIL_STATUS == 0){ ?>
<div class="alert alert-info"><strong>IMPORTANTE:</strong> IMPORTANTE: Debe <a href="">Verificar su Email</a> para poder ingresar al servidor.</a>.</div>
<?php } ?> -->
<br>
<div class="panel">
<div class="panel-player samp-bg">
<div class="left-player">
<img class="samp-avatar" src="<?php echo $url . '/img/skins/_' .$ropa;?>.png" alt="<?php echo $name;?>" title="<?php echo $name;?>" />
<div>
<div class="health-bar large-bar" title="<?php echo $vida?>"><div style="width:<?php echo $vida?>%;"></div></div>
<div class="armour-bar large-bar" title="<?php echo $chaleco;?>"><div style="width:<?php echo $chaleco?>%;"></div></div>
</div>
</div>
<div class="right-player">
<div class="item-name"><?php echo $name;?></div>
<div class="item-value"><i class="fa fa-city"></i>Los Santos</div>
<div class="item-value"><i class="fa fa-users"></i>Civil </div>
<div class="item-value"><i class="fa fa-phone"></i><i><?php if($numerotlf == 0){	echo "Ninguno";} else { echo $numerotlf; }?></i></div>
<div class="item-value"><i class="fa fa-transgender"></i><?php if($sexo == 0){ echo "Mujer";} else {echo"Hombre";}?></div>
</div>
<div class="accounts-switch">
<a class="switch-samp switch-samp-new" href="./samp"><i class="fa fa-play"></i> JUGAR</a> </div>
<a data-trigger="tooltip" data-trigger-position="top-center" data-trigger-data="Si tiene algún permiso en la Web o TS mal configurado haga click aquí para sincronizarlos." class="sync-button" href="<?php echo $url; ?>samp?update=true"><i class='fa fa-plus'></i></a>
</div>
<div class="panel-top-wrapper"><div class="panel-top">
<div class="item-money">
<div class="item-name">Mano</div>
<div class="item-value">$ <?php echo number_format($money, 0, '', ',');?></div>
</div>
<div class="item-bank">
<div class="item-name">Banco</div>
<div class="item-value">$ <?php echo number_format($platabanco, 0, '', ',');?></div>
</div>
<div class="item-checking">
<div class="item-name">Cheque</div>
<div class="item-value">$ 0</div>
</div>
<div class="item-account-number">
<div class="item-name"># Cuenta Bancaria</div>
<div class="item-value"><?php if(empty($cuentabancaria)){ echo "No tiene";} else { echo $cuentabancaria;}?></div>
</div>
<div class="item-coins">
<div class="item-name">COINS</div>
<div class="item-value"><?php echo $moneda;?></div>
</div>
</div></div>
<div class="panel-items-label">
<div class="items-title">Información</div>
<div class="items-list">
<div class="item-label">
<div class="item-label-name">Trabajo</div>
<div class="item-label-value"><?php echo $workname; ?></div>
</div>
<div class="item-label">
<div class="item-label-name">Habilidad</div>
<div class="item-label-value">Normal</div>
</div>
<div class="item-label">
<div class="item-label-name">Enfermedad</div>
<div class="item-label-value">Ninguna</div>
</div>
</div>
</div>
<div class="panel-items-label">
<div class="items-title">Propiedades</div>
<div class="items-list">
<div class="item-label">
<div class="item-label-name">Casas</div>
<div class="item-label-value"><?php echo $contarcasas; ?></div>
</div>
<div class="item-label">
<div class="item-label-name">Negocios</div>
<div class="item-label-value">0</div>
</div>
<div class="item-label">
<div class="item-label-name">Locales</div>
<div class="item-label-value">0</div>
</div>
<div class="item-label">
<div class="item-label-name">Vehículos</div>
<div class="item-label-value"><?php echo $contarvehiculos;?></div>
</div>
</div>
</div>
<div class="panel-items-label">
<div class="items-title">Inventario</div>
<div class="items-list">
<div class="item-label">
<div class="item-label-name">Ganzúas</div>
<div class="item-label-value">0</div>
</div>
<div class="item-label">
<div class="item-label-name">Drogas</div>
<div class="item-label-value">0</div>
</div>
<div class="item-label">
<div class="item-label-name">Materiales</div>
<div class="item-label-value">0</div>
</div>
</div>
</div>
<div class="panel-items-label">
<div class="items-title">Licencias</div>
<div class="items-list-items">
<div class="item item-lic-0 invalid">
Armas </div>
<div class="item item-lic-1 invalid">
Coche </div>
<div class="item item-lic-2 invalid">
Camión </div>
<div class="item item-lic-3 invalid">
Moto </div>
<div class="item item-lic-4 invalid">
Vuelo </div>
<div class="item item-lic-5 invalid">
Botes </div>
<div class="item item-lic-6 invalid">
Tren </div>
<div class="item item-lic-7 invalid">
Pesca
</div>
</div>
</div>
<div class="panel-items-label">
<div class="items-title">Idiomas</div>
<div class="items-list-items">
<div class="item item-lan-0 invalid">
Alemán </div>
<div class="item item-lan-1 invalid">
Francés </div>
<div class="item item-lan-2 invalid">
Portugués </div>
<div class="item item-lan-3 invalid">
Italiano </div>
<div class="item item-lan-4 invalid">
Inglés </div>
<div class="item item-lan-5 invalid">
Japonés </div>
<div class="item item-lan-6 invalid">
Ruso </div>
<div class="item item-lan-7 invalid">
Irlandés </div>
</div>
</div>
<div class="panel-info blue"><div>
<div class="info-title">MI MEMBRESÍA</div>
<div class="info-rows">
<div class="info-column">
<?php if($lvlvip == 0){?>
<div>Gratis</div><?php }else{?><div><font color="D1BB13"><b>VIP</b></font></div><?php } ?>
</div>
<div class="info-column">
<div><div><strong class="last">Expira: </strong> <span><?php  if($lvlvip == 0){echo"No";} else {?><?php echo $expvip; }?></font></span></div></div>
</div>
<div class="info-column">
<div><div><strong>Límite de prendas: </strong> <span class="first"><?php if($lvlvip == 0){echo "3";} else { echo"10";}?> prendas</span></div></div>
</div>
</div>
<div class="info-full">Artículos comprados y que incluye mi membresía</div>
<div class="info-rows">
<div class="info-column">

<div><div><strong>Límite de casas: </strong> <span class="first"><?php if($lvlvip == 0){ echo "1";} else {echo"4";}?></span></div> <div><strong class="last">Expira: </strong> <span>No</span></div></div>
</div>
<div class="info-column">
<div><div><strong>Respawn de coche: </strong> <span class="first">30 minutos</span></div> <div><strong class="last">Expira: </strong> <span>No</span></div></div>
<div><div><strong>Límite de locales: </strong> <span class="first">1</span></div> <div><strong class="last">Expira: </strong> <span>No</span></div></div>
</div>
<div class="info-column">
<div><div><strong>Límite de coches: </strong> <span class="first"><?php if($lvlvip == 0){echo "2";} else {echo"6";}?></span></div> <div><strong class="last">Expira: </strong> <span>No</span></div></div>
</div>
</div>
</div></div>
<div class="panel-grid grey"><div>
<div class="grid-title">INFORMACIÓN DE MI CUENTA</div>
<div class="items-column">
<div class="item-row">
<div class="item-name">Nivel</div>
<div class="item-value"><?php echo $score;?></div>
</div>
<div class="item-row">
<div class="item-name">Próximo Nivel</div>
<div class="item-value"><?php echo $exp;?>/<?php
switch ($score) {
		case 1:echo 12;break;
		case 2:echo 25;break;
		case 3:echo 50;break;
		case 4:echo 65;break;
		case 5:echo 70;break;
		case 6:echo 90;break;
		case 7:echo 120;break;
		case 8:echo 150;break;
		case 9:echo 180;break;
		case 10:echo 200;break;
		case 11:echo 240;break;
		case 12:echo 260;break;
		case 13:echo 450;break;
		case 14:echo 800;break;
		case 15:echo 900;break;
}
?></div>
</div>
<div class="item-row">
<div class="item-name">Puntos de Respeto</div>
<div class="item-value">0<!--<?php $pdrespeto = $time_play / (60*60); echo substr("$pdrespeto", 0, 1);?>--></div>
</div>
<div class="item-row">
<div class="item-name">Tiempo Jugado</div>
<div class="item-value"><?php echo 'Desconocido'?></div>
</div>
</div>
<div class="items-column">
<div class="item-row">
<div class="item-name">Certificación</div>
<div class="item-value"><strong><span style="color: #000000;">Ninguna</span></strong></div>
</div>
<div class="item-row">
<div class="item-name">Registro vía</div>
<div class="item-value">Web</div>
</div>
<div class="item-row">
<div class="item-name">Fecha de Registro</div>
<div class="item-value"><?php echo "No disponible" ?></div>
</div>
<div class="item-row">
<div class="item-name">Último inicio de sesión</div>
<div class="item-value"><?php echo 'No disponible'/*$ultimac;*/?></div>
</div>
</div>
<div class="items-column">
<div class="item-row">
<div class="item-name">Correo</div>
<div class="item-value"><?php echo $email;?></div>
</div>
<div class="item-row">
<div class="item-name">Mi IP</div>
<div class="item-value"><?php echo"No disponible";?></div>
</div>
<div class="item-row">
<div class="item-name">Baneado</div>
<div class="item-value"><?php if($baneado == 1) {echo"Si";}else{echo"No";}?></div>
</div>
<div class="item-row">
<div class="item-name">Veces Baneado</div>
<div class="item-value"><?php if($baneado >= 1){ echo "1";}else{echo"0";}?></div>
</div>
</div>
<div class="items-column">
<div class="item-row">
<div class="item-name">Muertes</div>
<div class="item-value">0</div>
</div>
<div class="item-row">
<div class="item-name">Asesinatos</div>
<div class="item-value">0</div>
</div>
</div>
</div></div>
</div>
<br />
<div style="    text-align: center;margin-top: 20px;display: inline-block;width: 100%;">
<button id="show-signatures" class="btn-ex-success btn-ex">Mostrar Firmas</button><br><br>
</div>
<script data-cfasync="false" src="./js/email-decode.min.js"></script><script>
				le.l(function(){
					var html_signatures_content = "\t\t\t<div class=\"well\" style=\"float: left;margin-top: 20px;background-color: #FFF;\">\n\t\t\t\t<h4>C\u00f3digo BB para firmas (foros):<\/h4>\n\t\t\t\t<br \/>\n\t\t\t\t<hr \/>\n\t\t\t\t\t\t\t\t\t\t\t\t\t<h4>Vista previa:<\/h4>\n\t\t\t\t\t<div style=\"text-align: center;\">\n\t\t\t\t\t\t<a href=\"/crear-cuenta\/?r=\" target=\"_blank\"><img src=\"\/\/\/widget\/?samp_id=132611&amp;type=0\" border=\"0\" alt=\"\"><\/a>\n\t\t\t\t\t<\/div>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<code style=\"padding: 15px; background-color: #FFF;\">\n\t\t\t\t\t\t[CENTER][URL=\"https:\/\/\/crear-cuenta\/?r=\"][IMG]https:\/\/panel.\/widget\/?samp_id=132611&type=0[\/IMG][\/URL][\/CENTER]\n\t\t\t\t\t<\/code>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<hr \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t\t\t\t\t<h4>Vista previa:<\/h4>\n\t\t\t\t\t<div style=\"text-align: center;\">\n\t\t\t\t\t\t<a href=\"https:\/\/\/crear-cuenta\/?r=\" target=\"_blank\"><img src=\"\/\/panel.\/widget\/?samp_id=132611&amp;type=1\" border=\"0\" alt=\"\"><\/a>\n\t\t\t\t\t<\/div>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<code style=\"padding: 15px; background-color: #FFF;\">\n\t\t\t\t\t\t[CENTER][URL=\"https:\/\/\/crear-cuenta\/?r=\"][IMG]https:\/\/panel.\/widget\/?samp_id=132611&type=1[\/IMG][\/URL][\/CENTER]\n\t\t\t\t\t<\/code>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<hr \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t\t\t\t\t<h4>Vista previa:<\/h4>\n\t\t\t\t\t<div style=\"text-align: center;\">\n\t\t\t\t\t\t<a href=\"https:\/\/\/crear-cuenta\/?r=\" target=\"_blank\"><img src=\"\/\/panel.\/widget\/?samp_id=132611&amp;type=2\" border=\"0\" alt=\"\"><\/a>\n\t\t\t\t\t<\/div>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<code style=\"padding: 15px; background-color: #FFF;\">\n\t\t\t\t\t\t[CENTER][URL=\"https:\/\/\/crear-cuenta\/?r=\"][IMG]https:\/\/panel.\/widget\/?samp_id=132611&type=2[\/IMG][\/URL][\/CENTER]\n\t\t\t\t\t<\/code>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<hr \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t\t\t\t\t<h4>Vista previa:<\/h4>\n\t\t\t\t\t<div style=\"text-align: center;\">\n\t\t\t\t\t\t<a href=\"https:\/\/\/crear-cuenta\/?r=\" target=\"_blank\"><img src=\"\/\/panel.\/widget\/?samp_id=132611&amp;type=3\" border=\"0\" alt=\"\"><\/a>\n\t\t\t\t\t<\/div>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<code style=\"padding: 15px; background-color: #FFF;\">\n\t\t\t\t\t\t[CENTER][URL=\"https:\/\/\/crear-cuenta\/?r=\"][IMG]https:\/\/panel.\/widget\/?samp_id=132611&type=3[\/IMG][\/URL][\/CENTER]\n\t\t\t\t\t<\/code>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<hr \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t\t\t\t\t<h4>Vista previa:<\/h4>\n\t\t\t\t\t<div style=\"text-align: center;\">\n\t\t\t\t\t\t<a href=\"https:\/\/\/crear-cuenta\/?r=\" target=\"_blank\"><img src=\"\/\/panel.\/widget\/?samp_id=132611&amp;type=4\" border=\"0\" alt=\"\"><\/a>\n\t\t\t\t\t<\/div>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<code style=\"padding: 15px; background-color: #FFF;\">\n\t\t\t\t\t\t[CENTER][URL=\"https:\/\/\/crear-cuenta\/?r=\"][IMG]https:\/\/panel.\/widget\/?samp_id=132611&type=4[\/IMG][\/URL][\/CENTER]\n\t\t\t\t\t<\/code>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<hr \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t\t\t\t\t<h4>Vista previa:<\/h4>\n\t\t\t\t\t<div style=\"text-align: center;\">\n\t\t\t\t\t\t<a href=\"https:\/\/\/crear-cuenta\/?r=\" target=\"_blank\"><img src=\"\/\/panel.\/widget\/?samp_id=132611&amp;type=5\" border=\"0\" alt=\"\"><\/a>\n\t\t\t\t\t<\/div>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<code style=\"padding: 15px; background-color: #FFF;\">\n\t\t\t\t\t\t[CENTER][URL=\"https:\/\/\/crear-cuenta\/?r=\"][IMG]https:\/\/panel.\/widget\/?samp_id=132611&type=5[\/IMG][\/URL][\/CENTER]\n\t\t\t\t\t<\/code>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<hr \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t\t\t\t\t<h4>Vista previa:<\/h4>\n\t\t\t\t\t<div style=\"text-align: center;\">\n\t\t\t\t\t\t<a href=\"https:\/\/\/crear-cuenta\/?r=\" target=\"_blank\"><img src=\"\/\/panel.\/widget\/?samp_id=132611&amp;type=6\" border=\"0\" alt=\"\"><\/a>\n\t\t\t\t\t<\/div>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<code style=\"padding: 15px; background-color: #FFF;\">\n\t\t\t\t\t\t[CENTER][URL=\"https:\/\/\/crear-cuenta\/?r=\"][IMG]https:\/\/panel.\/widget\/?samp_id=132611&type=6[\/IMG][\/URL][\/CENTER]\n\t\t\t\t\t<\/code>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<hr \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t\t\t\t\t<h4>Vista previa:<\/h4>\n\t\t\t\t\t<div style=\"text-align: center;\">\n\t\t\t\t\t\t<a href=\"https:\/\/\/crear-cuenta\/?r=\" target=\"_blank\"><img src=\"\/\/panel.\/widget\/?samp_id=132611&amp;type=7\" border=\"0\" alt=\"\"><\/a>\n\t\t\t\t\t<\/div>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<code style=\"padding: 15px; background-color: #FFF;\">\n\t\t\t\t\t\t[CENTER][URL=\"https:\/\/\/crear-cuenta\/?r=\"][IMG]https:\/\/panel.\/widget\/?samp_id=132611&type=7[\/IMG][\/URL][\/CENTER]\n\t\t\t\t\t<\/code>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<hr \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t\t\t\t\t<h4>Vista previa:<\/h4>\n\t\t\t\t\t<div style=\"text-align: center;\">\n\t\t\t\t\t\t<a href=\"https:\/\/\/crear-cuenta\/?r=\" target=\"_blank\"><img src=\"\/\/panel.\/widget\/?samp_id=132611&amp;type=8\" border=\"0\" alt=\"\"><\/a>\n\t\t\t\t\t<\/div>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<code style=\"padding: 15px; background-color: #FFF;\">\n\t\t\t\t\t\t[CENTER][URL=\"https:\/\/\/crear-cuenta\/?r=\"][IMG]https:\/\/panel.\/widget\/?samp_id=132611&type=8[\/IMG][\/URL][\/CENTER]\n\t\t\t\t\t<\/code>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<hr \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t\t\t\t\t<h4>Vista previa:<\/h4>\n\t\t\t\t\t<div style=\"text-align: center;\">\n\t\t\t\t\t\t<a href=\"https:\/\/\/crear-cuenta\/?r=\" target=\"_blank\"><img src=\"\/\/panel.\/widget\/?samp_id=132611&amp;type=9\" border=\"0\" alt=\"\"><\/a>\n\t\t\t\t\t<\/div>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<code style=\"padding: 15px; background-color: #FFF;\">\n\t\t\t\t\t\t[CENTER][URL=\"https:\/\/\/crear-cuenta\/?r=\"][IMG]https:\/\/panel.\/widget\/?samp_id=132611&type=9[\/IMG][\/URL][\/CENTER]\n\t\t\t\t\t<\/code>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<hr \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t\t\t\t\t<h4>Vista previa:<\/h4>\n\t\t\t\t\t<div style=\"text-align: center;\">\n\t\t\t\t\t\t<a href=\"https:\/\/\/crear-cuenta\/?r=\" target=\"_blank\"><img src=\"\/\/panel.\/widget\/?samp_id=132611&amp;type=10\" border=\"0\" alt=\"\"><\/a>\n\t\t\t\t\t<\/div>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<code style=\"padding: 15px; background-color: #FFF;\">\n\t\t\t\t\t\t[CENTER][URL=\"https:\/\/\/crear-cuenta\/?r=\"][IMG]https:\/\/panel.\/widget\/?samp_id=132611&type=10[\/IMG][\/URL][\/CENTER]\n\t\t\t\t\t<\/code>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<hr \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t\t\t\t\t<h4>Vista previa:<\/h4>\n\t\t\t\t\t<div style=\"text-align: center;\">\n\t\t\t\t\t\t<a href=\"https:\/\/\/crear-cuenta\/?r=\" target=\"_blank\"><img src=\"\/\/panel.\/widget\/?samp_id=132611&amp;type=11\" border=\"0\" alt=\"\"><\/a>\n\t\t\t\t\t<\/div>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<code style=\"padding: 15px; background-color: #FFF;\">\n\t\t\t\t\t\t[CENTER][URL=\"https:\/\/\/crear-cuenta\/?r=\"][IMG]https:\/\/panel.\/widget\/?samp_id=132611&type=11[\/IMG][\/URL][\/CENTER]\n\t\t\t\t\t<\/code>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<hr \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t\t\t\t\t<h4>Vista previa:<\/h4>\n\t\t\t\t\t<div style=\"text-align: center;\">\n\t\t\t\t\t\t<a href=\"https:\/\/\/crear-cuenta\/?r=\" target=\"_blank\"><img src=\"\/\/panel.\/widget\/?samp_id=132611&amp;type=12\" border=\"0\" alt=\"\"><\/a>\n\t\t\t\t\t<\/div>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<code style=\"padding: 15px; background-color: #FFF;\">\n\t\t\t\t\t\t[CENTER][URL=\"https:\/\/\/crear-cuenta\/?r=\"][IMG]https:\/\/panel.\/widget\/?samp_id=132611&type=12[\/IMG][\/URL][\/CENTER]\n\t\t\t\t\t<\/code>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<hr \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t\t\t\t\t<h4>Vista previa:<\/h4>\n\t\t\t\t\t<div style=\"text-align: center;\">\n\t\t\t\t\t\t<a href=\"https:\/\/\/crear-cuenta\/?r=\" target=\"_blank\"><img src=\"\/\/panel.\/widget\/?samp_id=132611&amp;type=13\" border=\"0\" alt=\"\"><\/a>\n\t\t\t\t\t<\/div>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<code style=\"padding: 15px; background-color: #FFF;\">\n\t\t\t\t\t\t[CENTER][URL=\"https:\/\/\/crear-cuenta\/?r=\"][IMG]https:\/\/panel.\/widget\/?samp_id=132611&type=13[\/IMG][\/URL][\/CENTER]\n\t\t\t\t\t<\/code>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<hr \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t\t\t\t\t<h4>Vista previa:<\/h4>\n\t\t\t\t\t<div style=\"text-align: center;\">\n\t\t\t\t\t\t<a href=\"https:\/\/\/crear-cuenta\/?r=\" target=\"_blank\"><img src=\"\/\/panel.\/widget\/?samp_id=132611&amp;type=14\" border=\"0\" alt=\"\"><\/a>\n\t\t\t\t\t<\/div>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<code style=\"padding: 15px; background-color: #FFF;\">\n\t\t\t\t\t\t[CENTER][URL=\"https:\/\/\/crear-cuenta\/?r=\"][IMG]https:\/\/panel.\/widget\/?samp_id=132611&type=14[\/IMG][\/URL][\/CENTER]\n\t\t\t\t\t<\/code>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<hr \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t\t\t\t\t<h4>Vista previa:<\/h4>\n\t\t\t\t\t<div style=\"text-align: center;\">\n\t\t\t\t\t\t<a href=\"https:\/\/\/crear-cuenta\/?r=\" target=\"_blank\"><img src=\"\/\/panel.\/widget\/?samp_id=132611&amp;type=15\" border=\"0\" alt=\"\"><\/a>\n\t\t\t\t\t<\/div>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<code style=\"padding: 15px; background-color: #FFF;\">\n\t\t\t\t\t\t[CENTER][URL=\"https:\/\/\/crear-cuenta\/?r=\"][IMG]https:\/\/panel.\/widget\/?samp_id=132611&type=15[\/IMG][\/URL][\/CENTER]\n\t\t\t\t\t<\/code>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<hr \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t\t\t\t\t<h4>Vista previa:<\/h4>\n\t\t\t\t\t<div style=\"text-align: center;\">\n\t\t\t\t\t\t<a href=\"https:\/\/\/crear-cuenta\/?r=\" target=\"_blank\"><img src=\"\/\/panel.\/widget\/?samp_id=132611&amp;type=16\" border=\"0\" alt=\"\"><\/a>\n\t\t\t\t\t<\/div>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<code style=\"padding: 15px; background-color: #FFF;\">\n\t\t\t\t\t\t[CENTER][URL=\"https:\/\/\/crear-cuenta\/?r=\"][IMG]https:\/\/panel\/widget\/?samp_id=132611&type=16[\/IMG][\/URL][\/CENTER]\n\t\t\t\t\t<\/code>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t<hr \/>\n\t\t\t\t\t<br \/>\n\t\t\t\t\t\t\t<\/div>\n\t\t\t";
					$('#show-signatures').on('click', function(){
						$('#signatures-list').html( html_signatures_content );
						$(this).remove();
					});
				});
			</script>
<div id="signatures-list"></div>
</div>
</div>
</div>
<?php include_once('vistas/footer.php'); ?>
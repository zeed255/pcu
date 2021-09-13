<?php
/*------------------------------------*/

include_once 'includes/user.php';
include_once 'includes/user_session.php';
include_once 'includes/config.php';
include_once 'includes/geoiploc.php';

$userSession = new UserSession();
$user = new User();
/*------------------------------------*/
if(isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($_SESSION['username']) && !empty($_SESSION['username']))
{ 
    $username = $_SESSION['username'];
	$useremail = $_SESSION['user'];
    
	/*Cuenta */$query = $user->connect()->prepare('SELECT * FROM pcu_cuentas WHERE JNombre = :username');
	$query->execute(['username' => $username]);
	
    while($cuenta = $query->fetch(PDO::FETCH_ASSOC))
    {
		$ID = $cuenta['ID'];
        $name = $cuenta['JNombre'];
		//$IP = $cuenta['IP'];
		$email = $useremail;
		$score = $cuenta['Nivel'];
		$exp = $cuenta['Experiencia'];
		$lvlvip = $cuenta['VIP'];
		$expvip = $cuenta['CaducaVIP'];
		$ultimac = $cuenta['UltimaConexion'];
		//$time_play = $cuenta['TIME-PLAYING'];
		//$moneda = $cuenta['SD'];//Coins en la gm
        $ropa = $cuenta['Skin'];
		$money = $cuenta['Dinero'];
		$sexo = $cuenta['Sexo'];
		$vida = $cuenta['Vida'];
		$chaleco = $cuenta['Chaleco'];
		$_SESSION['ropa'] = $ropa;
        $platabanco = $cuenta['DineroBanco'];
		$cuentabancaria = $cuenta['CuentaBanco'];
		$workname = $cuenta['Trabajo'];
	}


		
	/*Cuenta email */$query5 = $user->connect()->prepare('SELECT * FROM pcu_email WHERE Email = :useremail');
	$query5->execute(['useremail' => $useremail]);
	while($cuentaemail = $query5->fetch(PDO::FETCH_ASSOC))
	{
		$baneado = $cuentaemail['Baneado'];
		$coins = $cuentaemail['Coins'];
	}
	
	$query6 = $user->connect()->prepare('SELECT * FROM pcu_vehiculos WHERE Propietario = :username');
	$query6->execute(['username' => $username]);
	$contarvehiculos = $query6->rowCount();
	
	$query7 = $user->connect()->prepare('SELECT * FROM `pcu_locales` WHERE Propietario = :username AND TipoLocal = 0');
	$query7->execute(['username' => $username]);
	$contarcasas = $query7->rowCount();
	$numerodetelefono = 0; $numerotlf = 0;
}
else header('location: login.php');
if($numerotlf == 0){
	$numerodetelefono == "No tiene";
}
?>
<!DOCTYPE html>
<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="user-scalable=no, width=device-width">
<!--<base href="<?php echo $url; ?>">--><base href=".">
<title>Membresias - <?php echo $nombresv;?></title>
<script type="text/javascript" src="./recursos/a"></script><script src="./js/sPBVRXAtp3w2yttQJ-Hg4ScSgKw.js"></script><script src="./js/wCMSvT-Z7kHfL9-Pea42AY1tOwg.js"></script><link rel="icon" href="https://site-static.up-cdn.com/images/fav16x16.png" sizes="16x16">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $url;?>favicon.ico">
<script id="js-inline" type="text/javascript">
				window.GLOBAL = {"LANG":{"form":{"errors_occurred":"Ocurrieron varios errores","error_occurred":"Ocurri\u00f3 un error","error_no_net_title":"Sin Conexi\u00f3n a Internet","error_no_net_body":"Por favor compruebe su conexi\u00f3n a internet e intente de nuevo.","request_sent":"Petici\u00f3n enviada","close":"Cerrar","error_request":"Ocurri\u00f3 un error procesando su solicitud, por favor intente m\u00e1s tarde."},"time":{"just":"ahora","now":"mismo","now_seen":"Ahora mismo","ago":"hace","yesterday":"Ayer","at":"a las","a":["un","un"],"min":["min","mins"],"minute":["minuto","minutos"],"hr":["hr","hrs"],"hour":["hora","horas"],"sec":["seg","segs"],"second":["segundo","segundos"],"week":["semana","semanas"],"day":["d\u00eda","d\u00edas"],"month":["mes","meses"],"year":["a\u00f1o","a\u00f1os"],"months":[["base.january_long","base.february_long","base.march_long","base.april_long","Mayo","base.june_long","base.july_long","base.august_long","base.september_long","base.october_long","base.november_long","base.december_long"],["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dec"]]}},"AJAX_URL":"<?php echo $ajaxurl; ?>","URI":"<?php echo $url; ?>","USER_HASH":"da7254d9f97a392b4f97c7d04e09ec63d2e43f2e","IMAGES_URL":"https:\/\/site-static.up-cdn.com\/images\/","IS_MOBILE":false,"SCHEME":"unplayer"};le = new function(){ this.arr = [], this.l = function(c){ this.arr.push( c ); }; }; (function(){var css = document.createElement('link');
					css.id = 'css-base';
					css.type = 'text/css';
					css.rel = 'stylesheet';
					css.href = '<?php echo $url;?>css/bf3b4127/base.css';
					document.getElementsByTagName('head')[0].appendChild( css )})();
</script>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $url;?>favicon.ico">
	<script id="js-jquery" async="" type="text/javascript" src="<?php echo $url;?>js/jquery.min.js"></script>
	<script id="js-base" async="" type="text/javascript" src="<?php echo $url;?>/js/base.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/bootstrap.min.css" /> 
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/base.css?v=2.2.45" />
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>jquery.rollbar.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/fontawesome-all.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/styles.css" />
	<meta name="viewport" content="width=device-width"
<link rel="stylesheet" href="data:text/css;charset=utf-8;base64,Y2xvdWRmbGFyZS1hcHBbYXBwLWlkPSJhLWJldHRlci1icm93c2VyIl0gewogIGRpc3BsYXk6IGJsb2NrOwogIGJhY2tncm91bmQ6ICM0NTQ4NGQ7CiAgY29sb3I6ICNmZmY7CiAgbGluZS1oZWlnaHQ6IDEuNDU7CiAgcG9zaXRpb246IGZpeGVkOwogIHotaW5kZXg6IDkwMDAwMDAwOwogIHRvcDogMDsKICBsZWZ0OiAwOwogIHJpZ2h0OiAwOwogIHBhZGRpbmc6IC41ZW0gMWVtOwogIHRleHQtYWxpZ246IGNlbnRlcjsKICAtd2Via2l0LXVzZXItc2VsZWN0OiBub25lOwogICAgIC1tb3otdXNlci1zZWxlY3Q6IG5vbmU7CiAgICAgIC1tcy11c2VyLXNlbGVjdDogbm9uZTsKICAgICAgICAgIHVzZXItc2VsZWN0OiBub25lOwp9CgpjbG91ZGZsYXJlLWFwcFthcHAtaWQ9ImEtYmV0dGVyLWJyb3dzZXIiXVtkYXRhLXZpc2liaWxpdHk9ImhpZGRlbiJdIHsKICBkaXNwbGF5OiBub25lOwp9CgpjbG91ZGZsYXJlLWFwcFthcHAtaWQ9ImEtYmV0dGVyLWJyb3dzZXIiXSBjbG91ZGZsYXJlLWFwcC1tZXNzYWdlIHsKICBkaXNwbGF5OiBibG9jazsKfQoKY2xvdWRmbGFyZS1hcHBbYXBwLWlkPSJhLWJldHRlci1icm93c2VyIl0gYSB7CiAgdGV4dC1kZWNvcmF0aW9uOiB1bmRlcmxpbmU7CiAgY29sb3I6ICNlYmViZjQ7Cn0KCmNsb3VkZmxhcmUtYXBwW2FwcC1pZD0iYS1iZXR0ZXItYnJvd3NlciJdIGE6aG92ZXIsCmNsb3VkZmxhcmUtYXBwW2FwcC1pZD0iYS1iZXR0ZXItYnJvd3NlciJdIGE6YWN0aXZlIHsKICBjb2xvcjogI2RiZGJlYjsKfQoKY2xvdWRmbGFyZS1hcHBbYXBwLWlkPSJhLWJldHRlci1icm93c2VyIl0gY2xvdWRmbGFyZS1hcHAtY2xvc2UgewogIGRpc3BsYXk6IGJsb2NrOwogIGN1cnNvcjogcG9pbnRlcjsKICBmb250LXNpemU6IDEuNWVtOwogIHBvc2l0aW9uOiBhYnNvbHV0ZTsKICByaWdodDogLjRlbTsKICB0b3A6IC4zNWVtOwogIGhlaWdodDogMWVtOwogIHdpZHRoOiAxZW07CiAgbGluZS1oZWlnaHQ6IDE7Cn0KCmNsb3VkZmxhcmUtYXBwW2FwcC1pZD0iYS1iZXR0ZXItYnJvd3NlciJdIGNsb3VkZmxhcmUtYXBwLWNsb3NlOmFjdGl2ZSB7CiAgLXdlYmtpdC10cmFuc2Zvcm06IHRyYW5zbGF0ZVkoMXB4KTsKICAgICAgICAgIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgxcHgpOwp9CgpjbG91ZGZsYXJlLWFwcFthcHAtaWQ9ImEtYmV0dGVyLWJyb3dzZXIiXSBjbG91ZGZsYXJlLWFwcC1jbG9zZTpob3ZlciB7CiAgb3BhY2l0eTogLjllbTsKICBjb2xvcjogI2ZmZjsKfQo="><script src="./js/14945.js" type="text/javascript"></script><script src="./js/756e706c617965722e636f6d_0.js" type="text/javascript"></script><script src="./js/042f04110413042504400446044f07df07e00422.js"></script></head>
<body id="site" class="module-page parent-home child-view page-home full-width non-logged user-desktop" browser-os="win" browser-name="browser-chrome"><script async="" src="./js/analytics.js"></script>
<?php include_once('vistas/header.php');?>
<div id="web">
<div id="page-content">
<style type="text/css">

			.page.base-size {
				background-color: #fff;
				padding: 25px;
				box-sizing: border-box;

			}

			.alert.alert-info {
				background-color: #F4F4F4;
				border: 0;
				text-align: center;
				color: #909090;
			}

			.btn-ex { 
				margin: 0 auto;
				display: block;
			}
			.memberships-list {
				overflow: auto;
				margin: 20px 0;
			}
				.memberships-list > div > .legend {
					height: 115px;
					padding: 10px;
					box-sizing: border-box;
				}
					.memberships-list > div > .legend > li {
						color: #9C9C9C;
						font-family: Calibri;
						font-weight: 300;
					}


					.memberships-list > div > .legend > li > .icon {
						width: 12px;
						height: 12px;
						background-color: #000;
						margin-right: 6px;
					}

					.memberships-list > div > .legend > li > .icon.red {
						background-color: #FF8446;
					}
					.memberships-list > div > .legend > li > .icon.blue {
						background-color: #0096FA;
					}
					.memberships-list > div > .legend > li > .icon.green {
						background-color: #00E062;
					}

				.memberships-list > .membership-items > div > div {
					border-left: 3px solid transparent;
					line-height: 25px;
					padding-left: 10px;
					color: #9C9C9C;
					font-family: Calibri;
					font-weight: 300;

				}
					.memberships-list > .membership-items > div > .samp {
						border-color: #FF8446;
					}
					.memberships-list > .membership-items > div > .minecraft {
						border-color: #00E062;
					}
					.memberships-list > .membership-items > div > .teamspeak {
						border-color: #0096FA;
					}

				.memberships-list > div {
					float: left;
					width: 220px;
				}
				
				.memberships-list > .membership {
					border: 1px solid #F4F4F4;
					box-sizing: border-box;
					width: 215px;
					margin-left: 25px;
					position: relative;
					padding-bottom: 25px;
				}

				.memberships-list > .membership > .membership-header {
					display: block;
					height: 112px;
					position: relative;
					background-image: url(https://site-static.up-cdn.com/images/sections/membership/b2.svg);
					background-size: cover;
				}
					.memberships-list > .membership:nth-child(2) > .membership-header {
						background-image: url(https://site-static.up-cdn.com/images/sections/membership/b1.svg);
					}
					
					.memberships-list > .membership > .membership-header > h3 {
						letter-spacing: 2px;
						margin: 0;
						font-size: 26px;
						padding: 30px 0 0 25px;
						width: 80px;
						height: 80px;
						text-align: center;
						color: #fff;
						text-shadow: 2px 0 0 #A7A7A7, -2px 0 0 #A7A7A7, 0 2px 0 #A7A7A7, 0 -2px 0 #A7A7A7, 1px 1px #A7A7A7, -1px -1px 0 #A7A7A7, 1px -1px 0 #A7A7A7, -1px 1px 0 #A7A7A7;
					}
						.memberships-list > .membership:nth-child(3) > .membership-header > h3 {
							text-shadow: 2px 0 0 #D9B834, -2px 0 0 #D9B834, 0 2px 0 #D9B834, 0 -2px 0 #D9B834, 1px 1px #D9B834, -1px -1px 0 #D9B834, 1px -1px 0 #D9B834, -1px 1px 0 #D9B834;
						}
						.memberships-list > .membership:nth-child(4) > .membership-header > h3 {
							padding-top: 15px;
							text-shadow: 2px 0 0 #D9B834, -2px 0 0 #D9B834, 0 2px 0 #D9B834, 0 -2px 0 #D9B834, 1px 1px #D9B834, -1px -1px 0 #D9B834, 1px -1px 0 #D9B834, -1px 1px 0 #D9B834;
						}

					.memberships-list > .membership > .membership-header > .cost {
						width: 70px;
						height: 70px;
						background-color: #fff;
						border: 5px solid #DADADA;
						box-sizing: border-box;
						border-radius: 100%;
						font-size: 26px;
						color: #5D5D5D;
						text-align: center;
						position: absolute;
						right: 15px;
						top: 15px;
					}
						.memberships-list > .membership > .membership-header > .cost  > div {
							line-height: 30px;
							margin-top: 8px;
							text-align: center;
							font-weight: bold;
						}

						.memberships-list > .membership > .membership-header > .cost  > .coin {
							line-height: 14px;
							font-size: 14px;
							margin-top: 0;
							font-weight: normal;
						}


						.memberships-list > .membership:nth-child(3) > .membership-header > .cost {
							border-color: #E8CD63;
						}

						.memberships-list > .membership:nth-child(4) > .membership-header > .cost {
							border-color: #E5C544;
						}


				.memberships-list > .membership > .features-list {
					padding: 0 34px;
					margin-bottom: 20px;
				}
					.memberships-list > .membership > .features-list > div {
						text-align: center;
						line-height: 24px;
						color: #2A2A2A;
						border-bottom: 1px solid #F4F4F4;
						font-family: Calibri;
						font-weight: 300;
					}
		.alert-bien{background-color:#0BEF53;border-color:#4DEA7F;color:#0400FF;}.alert-danger h4,.alert-bien h4{color:#0400FF;}
		</style>
<div class="page base-size">
<?php
$duracion = 720;
$fechafinvip = date('Y-m-d H:i:s', (strtotime ("+$duracion Hours")));
if(isset($_POST['membership']))
{
if($lvlvip == 0)
 {
	 
 if($coins >= 10) 
   {

		$sql_update = $user->connect()->prepare("UPDATE pcu_cuentas SET VIP='1' WHERE JNombre=:username");
		$sql_update->execute(['username' => $username]);
		$sql_update = $user->connect()->prepare("UPDATE pcu_email SET Coins=Coins-10 WHERE Email=:useremail");
		$sql_update->execute(['useremail' => $useremail]);
		$vipsucces = 1;
		echo '<div class="alert alert-success">Acabas de adquirir una membresa VIP.</div> <META HTTP-EQUIV="Refresh" CONTENT="2; URL='.$url.'membresias?success=1"> ';
	}
else
{
	echo '<div class="alert alert-error">No tienes suficientes Coins para adquirir esta membresia.</div>';
}
}
else
{
	echo '<div class="alert alert-error">Usted tiene esa membresía, por favor seleccione otra.</div>';
}
}
?>
<!-- <div class="alert alert-error">Usted tiene esa membresía, por favor seleccione otra.</div> -->
<form method="POST" class="shop-form" id="buy-form">
<div id="memberships">
<div class="memberships-list">
<div class="membership-items">
<ul class="legend">
<!--<li><i class="icon green"></i>Minecraft</li>-->
<li><i class="icon red"></i>GTA SAMP</li>
<!--<li><i class="icon blue"></i>TeamSpeak</li>-->
</ul>
<div>
<div class="samp">Expira</div>
<div class="samp">Vehículos</div>
<div class="samp">Casas/Departamentos</div>
<div class="samp">Accesorios de coche</div>
<div class="samp">Respawn de coche</div>
<div class="samp">Límite de prendas</div>
<div class="samp">Modificar posición a <strong>/objetos</strong></div>
<div class="samp">Poner color a <strong>/objetos</strong></div>
<div class="samp">Nombre dorado (IN-GAME)</div>
<div class="samp">Trabajos</div>
</div>
</div>
<div class="membership">
<div class="membership-header">
<h3>Gratis</h3>
<div class="cost"><div>0</div><div class="coin"><?php echo $moneda;?></div></div>
</div>
<div class="features-list">
<div>
No </div> 
<div>
Dos (2) </div>
<div>
Una (1) </div>
<div>
<img src="img/c.svg">
</div>
<div>
<img src="img/c.svg">
</div>
<div>
Tres (3) </div>
<div>
<img src="img/c.svg">
</div>
<div>
<img src="img/c.svg">
</div>
<div>
<img src="img/x-01.svg"> </div>
<div>
Uno (1) </div>

</div>
<?php if($lvlvip == 1){ ?>
<button onclick="return confirm(&#39;¿Seguro que quieres volver a la membresia gratis? Perderas la actual&#39;);" class="btn-ex btn-ex-success membership-shop" name="membership" type="submit" name="membership" value="0">Comprar Membresía</button>
<?php } else {?>
<a class="btn-ex btn-ex-info"><center>Membresía actual</center></a>
<?php } ?></div>

<div class="membership">
<div class="membership-header">
<h3>VIP</h3>
<div class="cost"><div>10</div><div class="coin"><?php echo $moneda;?></div></div>
</div>
<div class="features-list">
<div>
30 Dias </div> 
<div>
Seis (6) </div>
<div>
Cuatro (4) </div>
<div>
<img src="img/c.svg">
</div>
<div>
<img src="img/c.svg">
</div>
<div>
Diez (10) </div>
<div>
<img src="img/c.svg">
</div>
<div>
<img src="img/c.svg">
</div>
<div>
<img src="img/c.svg"> </div>
<div>
Dos (2) </div>
</div>
<?php if($lvlvip == 0){ ?>
<button onclick="return confirm(&#39;¿Estas seguro?&#39;);" class="btn-ex btn-ex-success membership-shop" type="submit" name="membership" value="1">Comprar Membresía</button>
<?php } else {?>
<a class="btn-ex btn-ex-info"><center>Membresía actual</center></a>
<?php } ?>
</div>
</div>
<div class="alert alert-info"><strong style="color: red">NOTA: Si compra una membresía, no podrá comprar o renovar los artículos que incluya la misma, solo puede cambiar de membresía o esperar que expire la misma (podría cambiarla a "Gratis" si no la desea para comprar artículos por separado de la misma).</strong><br><br>
<!--<strong>¿Sabías qué?:</strong> Si renuevas la membresía se te acumulará el tiempo.-->
<br>
<strong>NOTA IMPORTANTE:</strong> Una vez comprada la membresía se activarán todos los beneficios instantáneamente, no necesita esperar que activen ninguno de los servicios contratados.</div>
</div>
</form>
</div>
</div>
<?php include_once('vistas/footer.php');?>
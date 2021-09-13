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

?>
<!DOCTYPE html>
<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="user-scalable=no, width=device-width">
<!--<base href="<?php echo $url; ?>">--><base href=".">
<title>INVENTARIO</title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $url;?>favicon.ico">
<script id="js-inline" type="text/javascript">
				window.GLOBAL = {"LANG":{"form":{"errors_occurred":"Ocurrieron varios errores","error_occurred":"Ocurri\u00f3 un error","error_no_net_title":"Sin Conexi\u00f3n a Internet","error_no_net_body":"Por favor compruebe su conexi\u00f3n a internet e intente de nuevo.","request_sent":"Petici\u00f3n enviada","close":"Cerrar","error_request":"Ocurri\u00f3 un error procesando su solicitud, por favor intente m\u00e1s tarde."},"time":{"just":"ahora","now":"mismo","now_seen":"Ahora mismo","ago":"hace","yesterday":"Ayer","at":"a las","a":["un","un"],"min":["min","mins"],"minute":["minuto","minutos"],"hr":["hr","hrs"],"hour":["hora","horas"],"sec":["seg","segs"],"second":["segundo","segundos"],"week":["semana","semanas"],"day":["d\u00eda","d\u00edas"],"month":["mes","meses"],"year":["a\u00f1o","a\u00f1os"],"months":[["base.january_long","base.february_long","base.march_long","base.april_long","Mayo","base.june_long","base.july_long","base.august_long","base.september_long","base.october_long","base.november_long","base.december_long"],["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dec"]]}},"AJAX_URL":"<?php echo $ajaxurl; ?>","URI":"<?php echo $url; ?>","USER_HASH":"da7254d9f97a392b4f97c7d04e09ec63d2e43f2e","IMAGES_URL":"https:\/\/site-static.up-cdn.com\/images\/","IS_MOBILE":false,"SCHEME":"unplayer"};le = new function(){ this.arr = [], this.l = function(c){ this.arr.push( c ); }; }; (function(){var css = document.createElement('link');
					css.id = 'css-base';
					css.type = 'text/css';
					css.rel = 'stylesheet';
					css.href = '<?php echo $url;?>css/bf3b4127/base.css';
					document.getElementsByTagName('head')[0].appendChild( css )})();
</script>
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/base.css?v=2.2.45" />
<link rel="stylesheet" type="text/css" href="jquery.rollbar.css" />
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" /> 
<link rel="stylesheet" type="text/css" href="css/styles.css"/>
<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css"/>
<script id="js-jquery" async="" type="text/javascript" src="<?php echo $url;?>js/jquery.min.js"></script>
<script id="js-base" async="" type="text/javascript" src="<?php echo $url;?>/js/base.js"></script>
<body id="site" class="module-page parent-samp child-inventario child-view page-samp logged user-desktop">
<?php include_once('vistas/header.php'); ?>
<div id="web">
<div id="page-content">
<style type="text/css">
		.list-item-objects-items {
			float: left;
			display: inline-block;
			box-sizing: border-box;
			width: 240px;
			margin: 3px;
			background-color: #fff;
			padding: 10px;
			font-family: 'Lato';
  			font-weight: 300;
  			color: #9F9F9F;
  			font-size: 13px;
  			line-height: 22px;
  			text-align: center;
			border-radius: 20px;
			border: 2px solid rgba(203, 203, 203, 0.62);
		}
			.list-item-objects-items > .imagen-container {
				text-align: center;
			}
				.list-item-objects-items > .imagen-container > div {
					display: inline-block;
				}

			.list-item-objects-items > div > .actions {
				text-align: center;
				margin: 10px 0;
			}
	</style>
<section style="padding-top:20px;" class="inventory-container page base-size">
<?php include_once('vistas/panel-menu.php');?>
<h5 class="alert alert-warning">Inventario de Objetos - Sección en construcción</h1>
<!--- fin --->
</section>

</div>
</div>
<?php include_once('vistas/footer.php'); ?>
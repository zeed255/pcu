<?php
/*------------------------------------*/

include_once '../includes/user.php';
include_once '../includes/user_session.php';
include_once '../includes/config.php';
include_once '../includes/geoiploc.php';

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
if($numerotlf == 0){
	$numerodetelefono == "No tiene";
}
?>
<!DOCTYPE html>
<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="user-scalable=no, width=device-width">
<!--<base href="<?php echo $url;?>">--><base href=".">
<title>General - Configuración</title>
<link rel="icon" href="https://site-static.up-cdn.com/images/fav16x16.png" sizes="16x16">
<link rel="icon" href="https://site-static.up-cdn.com/images/fav32x32.png" sizes="32x32">
<script id="js-inline" type="text/javascript">
				window.GLOBAL = {"LANG":{"form":{"errors_occurred":"Ocurrieron varios errores","error_occurred":"Ocurri\u00f3 un error","error_no_net_title":"Sin Conexi\u00f3n a Internet","error_no_net_body":"Por favor compruebe su conexi\u00f3n a internet e intente de nuevo.","request_sent":"Petici\u00f3n enviada","close":"Cerrar","error_request":"Ocurri\u00f3 un error procesando su solicitud, por favor intente m\u00e1s tarde."},"time":{"just":"ahora","now":"mismo","now_seen":"Ahora mismo","ago":"hace","yesterday":"Ayer","at":"a las","a":["un","un"],"min":["min","mins"],"minute":["minuto","minutos"],"hr":["hr","hrs"],"hour":["hora","horas"],"sec":["seg","segs"],"second":["segundo","segundos"],"week":["semana","semanas"],"day":["d\u00eda","d\u00edas"],"month":["mes","meses"],"year":["a\u00f1o","a\u00f1os"],"months":[["base.january_long","base.february_long","base.march_long","base.april_long","Mayo","base.june_long","base.july_long","base.august_long","base.september_long","base.october_long","base.november_long","base.december_long"],["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dec"]]}},"AJAX_URL":"<?php echo $ajaxurl; ?>","URI":"<?php echo $url;?>","USER_HASH":"d31d024a865f4f7a01fcfa5463e045a","IMAGES_URL":"https:\/\/site-static.up-cdn.com\/images\/","IS_MOBILE":false,"SCHEME":"Sunday","USER_UTC":"0"};le = new function(){ this.arr = [], this.l = function(c){ this.arr.push( c ); }; };(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-42184239-1', 'auto', {
		userId: 'kXY5EMM__ks'
	});
	ga('send', 'pageview');			</script>
<script id="js-jquery" async="" type="text/javascript" src="../js/jquery.min.js"></script>
<link id="css-base" rel="stylesheet" href="config.css">
<link id="css-base" rel="stylesheet" href="../css/styles.css">
<link id="css-base" rel="stylesheet" href="../css/fontawesome-all.min.css">
<body id="site" class="module-page parent-settings child-change-email child-change page-settings logged user-desktop" browser-os="win" browser-name="browser-chrome">
<?php include_once('../vistas/header.php'); ?>
<div id="web">
<div id="page-content">
<div class="base-size page">
						<div id="settings-tabs-container" class="tabs-container-default-left tabs-container tab-items-4">
																							<div class="tabs-menu-container-default-left tabs-menu-container settings-tab-container">
					<div class="tabs-menu-wrapper-default-left tabs-menu-wrapper settings-tab-wrapper">
												<ul id="settings-tabs" class="tabs-menu-default-left tabs-menu-parent tabs-menu settings-tab" data-tab-content-id="settings-content" data-tab-container-id="settings-tabs-container" data-tab="settings">
							<li class="tab-item-container-default-left item-name-general parent-item uri active" data-tab-action="settings/general" data-tab-is-external="0"><a class="tab-item-default-left local-uri active" href="<?php echo $url; ?>settings/general" data-tab-action="settings/general" data-tab-is-external="0"><i class="icon general"></i><span class="text">General</span></a></li><!--<li class="tab-item-container-default-left item-name-privacidad parent-item uri" data-tab-action="settings/privacidad" data-tab-is-external="0"><a class="tab-item-default-left local-uri" href="<?php echo $url; ?>settings/privacidad" data-tab-action="settings/privacidad" data-tab-is-external="0"><i class="icon general"></i><span class="text">Privacidad</span></a></li>--></ul>
											</div>
				</div>
<div id="settings-content" class="tab-content-default-left tab-content" data-selected="settings/general">
<form class="default-left-form container settings" autocomplete="off" name="module_settings_general" method="POST" accept-charset="UTF-8">
<section class="section-block-default section-email"><h3 class="section-block-title">EMAIL</h3><div class="section-container"><label id="label-new_email" for="new_email" class="text-input-label input-label readonly">
<div class="label">Email</div><div class="input"><input id="new_email" name="new_email" value="<?php echo $email; ?>" type="text" autocapitalize="none" placeholder="Email" readonly="readonly" data-readonly="1">
<div class="desc"><a href="<?php echo $url; ?>settings/change-email">Cambiar Email</a></div></div></label></div></section>
<section class="section-block-default section-cambiar-contrasena"><h3 class="section-block-title">Cambiar contraseña</h3><div class="section-container">
<label id="label-new_password" for="new_password" class="password-input-label input-label empty"><div class="label">Contraseña</div><div class="input">
<input id="new_password" name="new_password" value="" type="password" autocapitalize="none" placeholder="Nueva contraseña" class=" empty"></div></label>
<label id="label-repeat_new_password" for="repeat_new_password" class="password-input-label input-label empty"><div class="label">Repetir</div><div class="input">
<input id="repeat_new_password" name="repeat_new_password" value="" type="password" autocapitalize="none" placeholder="Repetir nueva contraseña" class=" empty"></div></label>
<label id="label-current_password" for="current_password" class="password-input-label input-label empty"><div class="label">Contraseña Actual</div><div class="input">
<input id="current_password" name="current_password" value="" type="password" autocapitalize="none" placeholder="Su contraseña actual" class=" empty"></div></label></div></section>
<section class="section-submit"><button class="submit loading btn-ex-success btn-ex" type="submit" data-source="save" id="submit-save"><span class="text">Guardar</span><span class="loading"></span></button></section><input type="hidden" name="__sh" value="94fc054fa4213851ccafe2101e5a046275e5ed9a68ac1cec7ba1bd53a8ccff4a4d77d199c915835e4254c1c0c3630ad5e73f497b15327c37cae0026953343a65"><input type="hidden" name="__form" value="general"><input type="hidden" name="__action" value="settings"></form></div></div>
		</div></div>
</div>
<?php include_once('../vistas/footer.php'); ?>
</body></html>
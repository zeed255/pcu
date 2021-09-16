<?php

include_once 'includes/config.php';
include_once 'includes/user.php';
include_once 'includes/user_session.php'; 

$userSession = new UserSession();
$user = new User();
?>
<!DOCTYPE html>
	<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="user-scalable=no, width=device-width">
	<!--<base href="<?php echo $url; ?>">--><base href=".">
	<title>Iniciar sesión</title>
	<script type="text/javascript" src="./recursos/a"></script><script src="./js/sPBVRXAtp3w2yttQJ-Hg4ScSgKw.js"></script><script src="./js/wCMSvT-Z7kHfL9-Pea42AY1tOwg.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $url;?>favicon.ico">
	<script id="js-inline" type="text/javascript">
		window.GLOBAL = {"LANG":{"form":{"errors_occurred":"Ocurrieron varios errores","error_occurred":"Ocurri\u00f3 un error","error_no_net_title":"Sin Conexi\u00f3n a Internet","error_no_net_body":"Por favor compruebe su conexi\u00f3n a internet e intente de nuevo.","request_sent":"Petici\u00f3n enviada","close":"Cerrar","error_request":"Ocurri\u00f3 un error procesando su solicitud, por favor intente m\u00e1s tarde."},"time":{"just":"ahora","now":"mismo","now_seen":"Ahora mismo","ago":"hace","yesterday":"Ayer","at":"a las","a":["un","un"],"min":["min","mins"],"minute":["minuto","minutos"],"hr":["hr","hrs"],"hour":["hora","horas"],"sec":["seg","segs"],"second":["segundo","segundos"],"week":["semana","semanas"],"day":["d\u00eda","d\u00edas"],"month":["mes","meses"],"year":["a\u00f1o","a\u00f1os"],"months":[["base.january_long","base.february_long","base.march_long","base.april_long","Mayo","base.june_long","base.july_long","base.august_long","base.september_long","base.october_long","base.november_long","base.december_long"],["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dec"]]}},"AJAX_URL":"http:\/\/localhost\/api\/","URI":"http:\/\/localhost\/","USER_HASH":"da7254d9f97a392b4f97c7d04e09ec63d2e43f2e","IMAGES_URL":"https:\/\/site-static.up-cdn.com\/images\/","IS_MOBILE":false,"SCHEME":"unplayer"};le = new function(){ this.arr = [], this.l = function(c){ this.arr.push( c ); }; }; (function(){var css = document.createElement('link');
		css.id = 'css-base';
		css.type = 'text/css';
		css.rel = 'stylesheet';
		css.href = '<?php echo $url;?>css/bf3b4127/base.css';
		document.getElementsByTagName('head')[0].appendChild( css )})();
	</script>
	<script id="js-jquery" async="" type="text/javascript" src="./js/jquery.min.js"></script>
	<script id="js-base" async="" type="text/javascript" src="./js/base.js"></script>
	
	<link id="css-base" type="text/css" rel="stylesheet" href="./css/base.css">
	<link rel="stylesheet" href="data:text/css;charset=utf-8;base64,Y2xvdWRmbGFyZS1hcHBbYXBwLWlkPSJhLWJldHRlci1icm93c2VyIl0gewogIGRpc3BsYXk6IGJsb2NrOwogIGJhY2tncm91bmQ6ICM0NTQ4NGQ7CiAgY29sb3I6ICNmZmY7CiAgbGluZS1oZWlnaHQ6IDEuNDU7CiAgcG9zaXRpb246IGZpeGVkOwogIHotaW5kZXg6IDkwMDAwMDAwOwogIHRvcDogMDsKICBsZWZ0OiAwOwogIHJpZ2h0OiAwOwogIHBhZGRpbmc6IC41ZW0gMWVtOwogIHRleHQtYWxpZ246IGNlbnRlcjsKICAtd2Via2l0LXVzZXItc2VsZWN0OiBub25lOwogICAgIC1tb3otdXNlci1zZWxlY3Q6IG5vbmU7CiAgICAgIC1tcy11c2VyLXNlbGVjdDogbm9uZTsKICAgICAgICAgIHVzZXItc2VsZWN0OiBub25lOwp9CgpjbG91ZGZsYXJlLWFwcFthcHAtaWQ9ImEtYmV0dGVyLWJyb3dzZXIiXVtkYXRhLXZpc2liaWxpdHk9ImhpZGRlbiJdIHsKICBkaXNwbGF5OiBub25lOwp9CgpjbG91ZGZsYXJlLWFwcFthcHAtaWQ9ImEtYmV0dGVyLWJyb3dzZXIiXSBjbG91ZGZsYXJlLWFwcC1tZXNzYWdlIHsKICBkaXNwbGF5OiBibG9jazsKfQoKY2xvdWRmbGFyZS1hcHBbYXBwLWlkPSJhLWJldHRlci1icm93c2VyIl0gYSB7CiAgdGV4dC1kZWNvcmF0aW9uOiB1bmRlcmxpbmU7CiAgY29sb3I6ICNlYmViZjQ7Cn0KCmNsb3VkZmxhcmUtYXBwW2FwcC1pZD0iYS1iZXR0ZXItYnJvd3NlciJdIGE6aG92ZXIsCmNsb3VkZmxhcmUtYXBwW2FwcC1pZD0iYS1iZXR0ZXItYnJvd3NlciJdIGE6YWN0aXZlIHsKICBjb2xvcjogI2RiZGJlYjsKfQoKY2xvdWRmbGFyZS1hcHBbYXBwLWlkPSJhLWJldHRlci1icm93c2VyIl0gY2xvdWRmbGFyZS1hcHAtY2xvc2UgewogIGRpc3BsYXk6IGJsb2NrOwogIGN1cnNvcjogcG9pbnRlcjsKICBmb250LXNpemU6IDEuNWVtOwogIHBvc2l0aW9uOiBhYnNvbHV0ZTsKICByaWdodDogLjRlbTsKICB0b3A6IC4zNWVtOwogIGhlaWdodDogMWVtOwogIHdpZHRoOiAxZW07CiAgbGluZS1oZWlnaHQ6IDE7Cn0KCmNsb3VkZmxhcmUtYXBwW2FwcC1pZD0iYS1iZXR0ZXItYnJvd3NlciJdIGNsb3VkZmxhcmUtYXBwLWNsb3NlOmFjdGl2ZSB7CiAgLXdlYmtpdC10cmFuc2Zvcm06IHRyYW5zbGF0ZVkoMXB4KTsKICAgICAgICAgIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgxcHgpOwp9CgpjbG91ZGZsYXJlLWFwcFthcHAtaWQ9ImEtYmV0dGVyLWJyb3dzZXIiXSBjbG91ZGZsYXJlLWFwcC1jbG9zZTpob3ZlciB7CiAgb3BhY2l0eTogLjllbTsKICBjb2xvcjogI2ZmZjsKfQo="><script src="./js/14945.js" type="text/javascript"></script><script src="./js/756e706c617965722e636f6d_0.js" type="text/javascript"></script><script src="./js/042f04110413042504400446044f07df07e00422.js"></script></head>
	<link rel="stylesheet" type="text/css" href="css/styles.css"/>

<body id="site" class="module-page parent-home child-view page-home full-width non-logged user-desktop" browser-os="win" browser-name="browser-chrome"><script async="" src="./js/analytics.js"></script>

<?php include_once('vistas/header.php'); ?>
<div id="web">
<div id="page-content">
<div id="login-logo" class="center">
<img src="img/logo-site.png" alt="Logo">
</div>
<section class="auth-form">
<h3><i class="icon auth-green"></i>Iniciar Sesión</h3>
<form method="POST" accept-charset="UTF-8">
<input id="username" name="user" value="" type="text" autocapitalize="none" placeholder="Nombre Apellido" class=" empty" />
<input id="password" name="password" value="" type="password" autocapitalize="none" placeholder="Contraseña" class=" empty" />
<input id="__return" name="__return" value="<?php echo $url;?>samp/registro" type="hidden" autocapitalize="none" placeholder="" />
<section class="section-submit"><button class="submit loading btn-ex-success btn-ex" type="submit" data-source="login" id="submit-login">
<span class="text">INGRESAR</span><span class="loading"></span></button></section>
<input type="hidden" name="submit" value="b194a1f768dbe23df58834783feffc99a52bd99c334b9451e3d2c2842d55690ac0085b17c96849db16b74ee18635ef3217586ca91ceb3c7c8a7d2166f00c7500" />
<input type="hidden" name="submit" value="view" /><input type="hidden" name="submit" value="login" /></form>
<a class="btn-ex-url btn-ex" href="<?php echo $url;?>recovery">¿Olvidó su contraseña?</a> </section>
<div id="inline-copyright">© <?php echo date('Y');?> <?php echo $nombresv;?> </div> </div>
</div>
<script type="text/javascript">
    $("#cerrar").click(function(){
		$("#modal-danger").hide();
	});
	 $("#modal-content").click(function(event){
		 if($(event.target).html().indexOf("modal-header") >= 0){
		 	$("#modal-danger").hide();
		 }
	});
</script>
<?php
if(isset($_POST['submit']))
{
		if(isset($_POST['user']) && isset($_POST['password'])){
		echo "Validación de login";

			$userForm = $_POST['user'];
			$passForm = $_POST['password'];

			if($user->userExists($userForm, $passForm)){
				$userSession->setCurrentUser($userForm);
				echo "<script>window.location='samp.php';</script>";
			}else echo '<div class="modal danger" id="modal-danger"><div class="modal-content" id="modal-content"><div class="modal-header" id="modal-header"><h3 class="modal-title">Ocurrieron varios errores</h3></div><div class="modal-body"><ul class="normal"><li>Algo salio mal.</li></ul></div><div class="modal-footer"><span class="btn btn-danger" id="cerrar">Cerrar (ESC)</span></div></div></div>';
		}else echo '<div class="modal danger"><div class="modal-content"><div class="modal-header"><h3 class="modal-title">Ocurrieron varios errores</h3></div><div class="modal-body"><ul class="normal"><li>Algo salio mal.</li></ul></div><div class="modal-footer"><span class="btn btn-danger" id="cerrar">Cerrar (ESC)</span></div></div></div>';

}
?>
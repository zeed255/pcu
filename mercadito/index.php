<?php $url_ac = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; if($url_ac == 'http://sundaysamp.com/mercadito/') { header('location: http://mercadito.sundaysamp.com'); } ?>
<?php

/*------------------------------------*/
error_reporting(0);
include_once '../includes/user.php';
include_once '../includes/user_session.php';
include_once '../includes/config.php';

$userSession = new UserSession();
$user = new User();
/*------------------------------------*/

$market_filter = $_GET['market_filter'];
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

/////// TYPE 0 = VEHICLES /// 
////// TYPE 1 = CASAS ///
///// TYPE 2 = LOCALES //
///// TYPE 3 = NEGOCIOS //
///// TYPE 4 = OBJETOS //

?>
<?php
function conversor_segundos($segundos) {

$horas = floor($segundos/3600);
$minutos = floor(($segundos-($horas*3600))/60);
$segundos = $segundos-($horas*3600)-($minutos*60);
$total= $horas.'h '.$minutos.'m '.$segundos.'s';
return $total;
}
?>
<!DOCTYPE html>
<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="user-scalable=no, width=device-width">
<!--<base href="<?php echo $url; ?>">--><base href=".">
<title>El Mercadito - Sunday SAMP</title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $url;?>favicon.ico">
<script id="js-inline" type="text/javascript">
				window.GLOBAL = {"LANG":{"form":{"errors_occurred":"Ocurrieron varios errores","error_occurred":"Ocurri\u00f3 un error","error_no_net_title":"Sin Conexi\u00f3n a Internet","error_no_net_body":"Por favor compruebe su conexi\u00f3n a internet e intente de nuevo.","request_sent":"Petici\u00f3n enviada","close":"Cerrar","error_request":"Ocurri\u00f3 un error procesando su solicitud, por favor intente m\u00e1s tarde."},"time":{"just":"ahora","now":"mismo","now_seen":"Ahora mismo","ago":"hace","yesterday":"Ayer","at":"a las","a":["un","un"],"min":["min","mins"],"minute":["minuto","minutos"],"hr":["hr","hrs"],"hour":["hora","horas"],"sec":["seg","segs"],"second":["segundo","segundos"],"week":["semana","semanas"],"day":["d\u00eda","d\u00edas"],"month":["mes","meses"],"year":["a\u00f1o","a\u00f1os"],"months":[["base.january_long","base.february_long","base.march_long","base.april_long","Mayo","base.june_long","base.july_long","base.august_long","base.september_long","base.october_long","base.november_long","base.december_long"],["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dec"]]}},"AJAX_URL":"<?php echo $ajaxurl; ?>","URI":"<?php echo $url; ?>","USER_HASH":"da7254d9f97a392b4f97c7d04e09ec63d2e43f2e","IMAGES_URL":"https:\/\/site-static.up-cdn.com\/images\/","IS_MOBILE":false,"SCHEME":"unplayer"};le = new function(){ this.arr = [], this.l = function(c){ this.arr.push( c ); }; }; (function(){var css = document.createElement('link');
					css.id = 'css-base';
					css.type = 'text/css';
					css.rel = 'stylesheet';
					css.href = ''<?php echo $url;?>'css/bf3b4127/base.css';
					document.getElementsByTagName('head')[0].appendChild( css )})();
</script><link id="css-base" type="text/css" rel="stylesheet" href="<?php echo $url;?>css/base.css">
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/styles.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/jquery.rollbar.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>/css/bootstrap.min.css" /> 
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>/css/fontawesome-all.min.css" /> 
<script id="js-jquery" async="" type="text/javascript" src="<?php echo $url;?>js/jquery.min.js"></script>
<script id="js-base" async="" type="text/javascript" src="<?php echo $url;?>js/base.js"></script>
<script src="<?php echo $url;?>css/bootstrap.min.js"></script>

<link rel="stylesheet" href="data:text/css;charset=utf-8;base64,Y2xvdWRmbGFyZS1hcHBbYXBwLWlkPSJhLWJldHRlci1icm93c2VyIl0gewogIGRpc3BsYXk6IGJsb2NrOwogIGJhY2tncm91bmQ6ICM0NTQ4NGQ7CiAgY29sb3I6ICNmZmY7CiAgbGluZS1oZWlnaHQ6IDEuNDU7CiAgcG9zaXRpb246IGZpeGVkOwogIHotaW5kZXg6IDkwMDAwMDAwOwogIHRvcDogMDsKICBsZWZ0OiAwOwogIHJpZ2h0OiAwOwogIHBhZGRpbmc6IC41ZW0gMWVtOwogIHRleHQtYWxpZ246IGNlbnRlcjsKICAtd2Via2l0LXVzZXItc2VsZWN0OiBub25lOwogICAgIC1tb3otdXNlci1zZWxlY3Q6IG5vbmU7CiAgICAgIC1tcy11c2VyLXNlbGVjdDogbm9uZTsKICAgICAgICAgIHVzZXItc2VsZWN0OiBub25lOwp9CgpjbG91ZGZsYXJlLWFwcFthcHAtaWQ9ImEtYmV0dGVyLWJyb3dzZXIiXVtkYXRhLXZpc2liaWxpdHk9ImhpZGRlbiJdIHsKICBkaXNwbGF5OiBub25lOwp9CgpjbG91ZGZsYXJlLWFwcFthcHAtaWQ9ImEtYmV0dGVyLWJyb3dzZXIiXSBjbG91ZGZsYXJlLWFwcC1tZXNzYWdlIHsKICBkaXNwbGF5OiBibG9jazsKfQoKY2xvdWRmbGFyZS1hcHBbYXBwLWlkPSJhLWJldHRlci1icm93c2VyIl0gYSB7CiAgdGV4dC1kZWNvcmF0aW9uOiB1bmRlcmxpbmU7CiAgY29sb3I6ICNlYmViZjQ7Cn0KCmNsb3VkZmxhcmUtYXBwW2FwcC1pZD0iYS1iZXR0ZXItYnJvd3NlciJdIGE6aG92ZXIsCmNsb3VkZmxhcmUtYXBwW2FwcC1pZD0iYS1iZXR0ZXItYnJvd3NlciJdIGE6YWN0aXZlIHsKICBjb2xvcjogI2RiZGJlYjsKfQoKY2xvdWRmbGFyZS1hcHBbYXBwLWlkPSJhLWJldHRlci1icm93c2VyIl0gY2xvdWRmbGFyZS1hcHAtY2xvc2UgewogIGRpc3BsYXk6IGJsb2NrOwogIGN1cnNvcjogcG9pbnRlcjsKICBmb250LXNpemU6IDEuNWVtOwogIHBvc2l0aW9uOiBhYnNvbHV0ZTsKICByaWdodDogLjRlbTsKICB0b3A6IC4zNWVtOwogIGhlaWdodDogMWVtOwogIHdpZHRoOiAxZW07CiAgbGluZS1oZWlnaHQ6IDE7Cn0KCmNsb3VkZmxhcmUtYXBwW2FwcC1pZD0iYS1iZXR0ZXItYnJvd3NlciJdIGNsb3VkZmxhcmUtYXBwLWNsb3NlOmFjdGl2ZSB7CiAgLXdlYmtpdC10cmFuc2Zvcm06IHRyYW5zbGF0ZVkoMXB4KTsKICAgICAgICAgIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgxcHgpOwp9CgpjbG91ZGZsYXJlLWFwcFthcHAtaWQ9ImEtYmV0dGVyLWJyb3dzZXIiXSBjbG91ZGZsYXJlLWFwcC1jbG9zZTpob3ZlciB7CiAgb3BhY2l0eTogLjllbTsKICBjb2xvcjogI2ZmZjsKfQo=">
<script src="<?php echo $url;?>js/14945.js" type="text/javascript">
</script><script src="<?php echo $url;?>js/756e706c617965722e636f6d_0.js" type="text/javascript">
</script><script src="<?php echo $url;?>js/042f04110413042504400446044f07df07e00422.js"></script>
</head>
<body id="site" class="module-page parent-home child-view page-home full-width non-logged user-desktop" browser-os="win" browser-name="browser-chrome"><script async="" src="<?php echo $url;?>js/analytics.js"></script>
<style>
		.map-iframe {
			margin: 0 auto;
			border: 0;
			height: 300px;
			width: 800px;
		}
		#mercadito-header {
			position: relative;
			display: inline-block;
			padding-bottom: 10px;
			width: 100%;
		}
		.item-img {
			height: 120px;
			width: 120px;
			display: inline-block;
			vertical-align: top;
			background-size: cover;
			background-position: center center;
		}
		#mercadito-select-list {
			display: inline-block;
		}
			.select-item a,
			.select-item a:active,
			.select-item a:hover {
				text-decoration: none;
			}
			.select-item {
				cursor: default;
				background-color: #FFF;
				text-align: center;
				width: 158px;
				float: left;
				display: inline-block;
				margin: 10px 10px;
				border: 1px solid #E1E1E1;
				font-family: 'Lato',sans-serif;
			}
				.select-item:hover {
					border: 1px solid #0790D7;
				}
				.select-item > .item-img {
					margin-top: 16px;
					border: 1px solid #DBDBDB;
				}
				.select-item > span {
					margin-bottom: 5px;
					margin-top: 2px;
					color: #B8B8B8;
					width: 100%;
					display: inline-block;
					float: left;
					font-size: 16px;
					line-height: 20px;
				}
				.select-item > a {
					font-weight: bold;
					width: 122px;
					margin-bottom: 16px;
					margin-top: 10px;
				}
		.mercadito-button {
			cursor: pointer;
			padding: 0 20px;
			display: inline-block;
			font-family: 'Lato',sans-serif;
			color: #83E598;
			border: 1px solid #83E598;
			background-color: #FFF;
			line-height: 28px;
			height: 30px;
			box-sizing: border-box;
			font-size: 16px;
		}
		.mercadito-button:hover {
			background-color: #0790D7;
			border: 1px solid #0790D7;
			color: #FFF;
		}
		.mercadito-title {
			font-family: 'Lato',sans-serif;
			font-size: 30px;
			line-height: 40px;
			font-weight: bold;
			text-align: center;
			display: inline-block;
			float: left;
			width: 100%;
			margin: 0;
			margin-bottom: 10px;
			color: #B8B8B8;
		}

		#mercadito-publish {
			min-height: 510px;
			display: inline-block;
			float: left;
			width: 100%;
			position: relative;
		}

		#mercadito-publish > #mercadito-select-list {
			position: absolute;
			left: 0;
			top: 0;
		}
		#mercadito-publish > #mercadito-select-list .select-item {
			margin: 0;
		}

		.mercadito-options {
			position: absolute;
			left: 190px;
			top: 0;
			width: 327px;
			display: inline-block;
			float: left;
		}

		.mercadito-info {
			display: inline-block;
			float: right;
			width: 100%;
			padding-left: 545px;
			box-sizing: border-box;
		}
		#description_field {
			display: inline-block;
			float: left;
			width: 100%;
		}

		.mercadito-field-container {
			display: inline-block;
			width: 100%;
			float: left;
		}
		.mercadito-label {
			font-family: 'Lato',sans-serif;
			display: inline-block;
			width: 100%;
			float: left;
			color: #BBBBBB;
			font-weight: bold;
			font-size: 14px;
			line-height: 20px;
			height: 20px;
			border-bottom: 2px solid #EAEAEA;
			text-transform: uppercase;
			margin-bottom: 5px;
		}
		.mercadito-field {
			display: inline-block;
			width: 100%;
			float: left;
		}
			.mercadito-field input,
			.mercadito-field select,
			.mercadito-field textarea {
				width: 100%;
			  	box-sizing: border-box;
			  	border: 1px solid #E0E0E0;
			  	background-color: #F7F9FC;
			  	color: #737373;
			}
			.mercadito-field input {
				height: 30px;
			}
			.mercadito-field select {
				height: 30px;
				width: 326px;
			}
		#sell_amount,
		#initial_amount,
		#final_amount {
			padding-left: 24px;
		}
		.sell_amount-container > .mercadito-field,
		.initial_amount-container > .mercadito-field,
		.final_amount-field-container > .mercadito-field {
			position: relative;
		}
		.sell_amount-container > .mercadito-field::after,
		.initial_amount-container > .mercadito-field::after,
		.final_amount-field-container > .mercadito-field::after {
			content: "$";
			position: absolute;
			left: 9px;
			top: 0px;
			line-height: 30px;
			height: 30px;
			color: #737373;
		}

		#mercadito-checkout {
			font-size: 14px;
			display: inline-block;
			width: 100%;
			float: left;
			box-sizing: border-box;
			border: 1px solid #52D86F;
		}

		.mercadito-fees {
			height: 27px;
			line-height: 27px;
			color: #E16753;
			text-transform: uppercase;
			text-align: center;
			font-weight: bold;
		}
		.mercadito-row {
			color: #737373;
			height: 27px;
			line-height: 27px;
			box-sizing: border-box;
			padding: 0 10px;
		}
			.mercadito-row > div {
				display: inline-block;
				float: left;
				width: 65%;
				vertical-align: top;
				box-sizing: border-box;
			}
			.mercadito-row > span {
				font-weight: bold;
				display: inline-block;
				float: right;
				width: 35%;
				vertical-align: top;
				box-sizing: border-box;
			}
		.mercadito-total {
			font-weight: bold;
			text-transform: uppercase;
			color: #0790D7;
			text-align: center;
		}
		.mercadito-paynow {
			color: #E16753;
			font-weight: bold;
		}

		#mercadito-publish-button {
			background-color: #0790D7;
			color: #FFF;
			height: 30px;
			line-height: 30px;
			padding: 0 25px;
			box-sizing: border-box;
			border: 0;
			font-size: 14px;
			float: right;
		}
			#mercadito-publish-button:hover {
				background-color: #0670D2;
			}

		#mercadito-delete-button {
			background-color: #E16753;
			color: #FFF;
			height: 30px;
			line-height: 30px;
			padding: 0 25px;
			box-sizing: border-box;
			border: 0;
			font-size: 14px;
			float: right;
		}
			#mercadito-delete-button:hover {
				background-color: #F03C1E;
			}
		.mercadito-warning-messsage {
			float: left;
			width: 100%;
			margin-top: 10px;
			display: inline-block;
			box-sizing: border-box;
			color: #E16753;
			border: 1px solid #F37A66;
			padding: 5px 10px;
		}

		.mercadito-registro {
			position: absolute;
			left: 280px;
			top: 18px;
			font-size: 18px;
			height: 27px;
			line-height: 27px;
		}
			.mercadito-registro > div {
				color: #C2C2C2;
				display: inline-block;
				vertical-align: top;
				height: 27px;
				line-height: 27px;
				margin-right: 10px;
			}
			.mercadito-registro > a {
				vertical-align: top;
				display: inline-block;
				font-size: 17px;
				color: #3D3D3D;
				text-decoration: none;
				height: 27px;
				line-height: 27px;
			}
			.mercadito-registro > a.active,
			.mercadito-registro > a:hover,
			.mercadito-registro > a:active {
				color: #0790D7;
			}
			.mercadito-registro > span {
				display: inline-block;
				vertical-align: top;
				width: 1px;
				height: 27px;
				background-color: #F4F4F4;
				margin: 0 10px;
			}

		.mecadito-publish-header {
			position: absolute;
			top: 12px;
			right: 0;
		}
		.mercadito-publish-ad {
			text-decoration: none;
			border: 1px solid #52D86F;
			padding: 0 10px;
			box-sizing: border-box;
			color: #52D86F;
			font-family: 'Lato',sans-serif;
			font-weight: bold;
			font-size: 16px;
			height: 35px;
			line-height: 32px;
			display: inline-block;
			float: left;
			padding-left: 40px;
		}
			.mercadito-publish-ad > span {
				display: inline-block;
				position: absolute;
				width: 32px;
				height: 33px;
				left: 1px;
				top: 1px;
				background-color: #52D86F;
				text-align: center;
			}
				.mercadito-publish-ad > span > .item-img {

				}
			.mercadito-publish-ad:hover,
			.mercadito-publish-ad:active {
				text-decoration: none;
				background-color: #0790D7;
				color: #FFF;
				border: 1px solid #0790D7;
			}
				.mercadito-publish-ad:hover > span,
				.mercadito-publish-ad:active > span {
					background-color: #0790D7;
				}
		.mercadito-ads-container {
			display: inline-block;
			float: left;
			width: 100%;
			margin-top: 0px;
			min-height: 500px;
			position: relative;
		}
			.mercadito-ads-container .pagination {
				display: inline-block;
				width: 100%;
				float: left;
				margin-top: 20px;
				box-sizing: border-box;
				text-align: center;
			}
			.mercadito-ads-container.lateral-present .pagination {
				padding-left: 218px;
			}
		.lateral-banner {
			position: absolute;
			left: 0px;
			top: 0px;
			display: inline-block;
			float: left;
			width: 200px;
			text-align: center;
			border-right: 1px solid #E2E2E2;
		}
			.lateral-banner > h5 {
				display: inline-block;
				width: 100%;
				font-size: 18px;
				color: #747474;
				font-weight: bold;
				text-transform: uppercase;
				float: left;
				margin: 0;
				padding: 0;
				margin-bottom: 10px;
			}
				.lateral-banner > h5.top-bidders {
					margin-top: 20px;
				}
			.lateral-banner > .market-top {
				text-align: left;
				display: inline-block;
				float: left;
				width: 100%;
				color: #B9B9B9;
			}
				.lateral-banner > .market-top > div {
					display: inline-block;
					float: left;
					width: 100%;
					line-height: 22px;
					font-size: 12px;
				}
				.lateral-banner > .market-top > div:nth-last-child(10) > a,
				.lateral-banner > .market-top > div:nth-last-child(10) > span {
					font-size: 17px;
					color: #808FEE;
				}
				.lateral-banner > .market-top > div:nth-last-child(9) > a,
				.lateral-banner > .market-top > div:nth-last-child(9) > span {
					font-size: 15px;
				}
				.lateral-banner > .market-top > div:nth-last-child(8) > a,
				.lateral-banner > .market-top > div:nth-last-child(8) > span {
					font-size: 14px;
				}
				.lateral-banner > .market-top a {
					color: #B9B9B9;
				}
				.lateral-banner > .market-top > div > span:first-child {
					width: 30px;
					display: inline-block;
					vertical-align: top;
				}
		.mercadito-ads-list {
			display: inline-block;
			float: right;
			box-sizing: border-box;
			width: 100%;
			margin-top: -10px;
		}
			.mercadito-ads-list.lateral-present {
				padding-left: 216px;
				min-height: 590px;
			}
			.mercadito-ads-list.lateral-not-present {
				text-align: center;
			}
			.mercadito-ads-list.lateral-not-present .mercadito-ad-item {
				margin: 10px 2px;
			}
			.mercadito-ad-item {
				margin: 10px 5px;
				display: inline-block;
				float: left;
				width: 231px;
				background-color: #fff;
				height: 122px;
				border: 1px solid #E1E1E1;
				box-sizing: border-box;
				position: relative;
			}

			.item-image.item-img {
				background-size: contain;
				background-repeat: no-repeat;
			}
			.mercadito-ad-item:hover {
				border: 1px solid #0790D7;
			}
				.mercadito-ad-item > .item-img {
					position: absolute;
					left: 0;
					top: 0;
				}
				.mercadito-ad-item > .user-profile {
					font-size: 12px;
					position: absolute;
					left: 5px;
					bottom: 0;
					width: 110px;
					line-height: 20px;
					height: 20px;
					display: inline-block;
					overflow: hidden;
					text-overflow: ellipsis;
					white-space: nowrap;
					text-decoration: none;
					text-align: center;
					color: #ABABAB;
					font-weight: normal;
				}
				.mercadito-ad-info {
					padding-top: 5px;
					height: 100%;
					width: 109px;
					display: inline-block;
					position: absolute;
					top: 0;
					right: 0;
				}
					.mercadito-ad-info > div {

					}
						.mercadito-ad-info > div > img {
							margin-left: 5px;
							margin-top: 2px;
							vertical-align: top;
							display: inline-block;
						}
						.mercadito-ad-info > div > span {
							text-align: left;
							vertical-align: top;
							font-size: 13px;
							color: #747474;
							font-weight: normal;
							width: 79px;
							display: inline-block;
							overflow: hidden;
							text-overflow: ellipsis;
							white-space: nowrap;
							text-decoration: none;
						}
					.mercadito-ad-info > .mercadito-price > span {
						font-weight: bold;
					}
					.mercadito-ad-info > .mercadito-price-final > span {
						font-weight: bold;
					}
					.mercadito-ad-info > .mercadito-time {
					}
					.mercadito-ad-info > .mercadito-name {
					}
					.mercadito-details-button {
						text-align: center;
						text-decoration: none;
						border: 1px solid #52D86F;
						padding: 0 10px;
						box-sizing: border-box;
						color: #52D86F;
						font-family: 'Lato',sans-serif;
						font-weight: bold;
						font-size: 14px;
						height: 25px;
						line-height: 22px;
						display: inline-block;
						float: left;
						width: 100%;
						position: absolute;
						width: 90px;
						right: 10px;
						bottom: 5px;
					}
						.mercadito-details-button:hover,
						.mercadito-details-button:active {
							text-decoration: none;
							background-color: #0790D7;
							color: #FFF;
							border: 1px solid #0790D7;
						}
			.mercadito-product-details {
				display: inline-block;
				float: left;
				width: 100%;
			}
				.mercadito-product-details > .mercadito-field-container {
					display: inline-block;
					float: left;
					width: 24.25%;
					margin-left: 1%;
				}
				.mercadito-product-details > .mercadito-field-container:first-child {
					margin-left: 0;
				}
				.mercadito-product-details > .mercadito-field-container > .mercadito-field {
					font-weight: bold;
					color: #747474;
					font-size: 14px;
				}

			.mercadito-field-container.mercadito-field-full {
				margin-top: 10px;
				margin-left: 0;
				width: 100%;
				display: inline-block;
				float: left;
			}
				.mercadito-field-container.mercadito-field-full > .mercadito-field {
					font-weight: normal;
					font-size: 14px;
				}
			#mercadito-single {
				min-height: 400px;
				display: inline-block;
				float: left;
				width: 100%;
				margin-bottom: 40px;
			}
			.mercadito-single-top {
				height: 125px;
				position: relative;
				display: inline-block;
				float: left;
				width: 100%;
				margin-bottom: 10px;
			}
				.mercadito-single-top > a {
					position: relative;
					z-index: 2;
				}
				#mercadito-buy {
					height: 50px;
					display: inline-block;
					position: absolute;
					right: 0;
					top: 0px;
					width: 180px;
					text-align: left;
				}
				#mercadito-buy.is-auction {
					top: 0;
					width: 510px;
				}
				.mercadito-msg-auction {
					text-align: center;
					float: left;
					display: inline-block;
					color: #E16753;
					font-size: 12px;
					width: 215px;
					position: absolute;
					top: 53px;
					right: 0;
				}
					.mercadito-msg-auction.mercadito-my {
						color: #52D86F;
					}
				.mercadito-auction-info {
					position: relative;
					background-color: #FFF;
					border: 1px solid #DBDBDB;
					height: 49px;
					display: inline-block;
					width: 335px;
				}
				.mercadito-auction-price-final {
					font-family: 'Lato',sans-serif;
					display: inline-block;
					width: 100%;
					float: left;
					font-weight: bold;
					text-align: center;
					font-size: 26px;
					color: #717171;
					height: 50px;
					line-height: 50px;
				}
				.mercadito-auction-price {
					text-align: center;
					box-sizing: border-box;
					height: 49px;
					width: 120px;
					background-color: #F7F9FC;
					display: inline-block;
					float: left;
					font-size: 14px;
					padding: 5px 0;
					color: #717171;
				}
					.mercadito-auction-price > div {
						display: inline-block;
						width: 100%;
						float: left;
					}
					.mercadito-auction-price > span {
						display: inline-block;
						width: 100%;
						float: left;
						font-weight: bold;
					}
				#auction_bet {
					border: 0;
					box-sizing: border-box;
					height: 49px;
					line-height: 29px;
					padding: 4px 20px;
					font-size: 22px;
					font-weight: bold;
					text-align: center;
					float: right;
					width: 215px;
					border-left: 1px solid #DBDBDB;
				}
				.mercadito-buy-buttons {
					position: absolute;
					right: -150px;
					top: 0;
					width: 135px;
				}
				.mercadito-edit-bet {
					background-color: #0790D7;
					color: #FFF;
					height: 49px;
					line-height: 49px;
					padding: 0 25px;
					font-size: 25px;
					box-sizing: border-box;
					border: 0;
					float: left;
					width: 100%;
					float: left;
				}
					.mercadito-edit-bet:hover {
						background-color: #0670D2;
					}
				.mercadito-or {
					display: inline-block;
					float: left;
					width: 100%;
				}
					.mercadito-or > span {
						display: inline-block;
						vertical-align: top;
						float: left;
						width: 100%;
						text-align: center;
					}
					.mercadito-edit-buy {
						text-align: center;
						text-decoration: none;
						border: 1px solid #52D86F;
						padding: 0 10px;
						box-sizing: border-box;
						color: #52D86F;
						font-family: 'Lato',sans-serif;
						font-weight: bold;
						font-size: 14px;
						line-height: 22px;
						display: inline-block;
						float: left;
						width: 100%;
						background-color: #FFF;
					}
						.mercadito-edit-buy:hover,
						.mercadito-edit-buy:active {
							text-decoration: none;
							background-color: #0790D7;
							color: #FFF;
							border: 1px solid #0790D7;
						}
		.mercadito-auction {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			float: left;
			height: 100%;
			text-align: right;
		}
		#mercadito-single .single-image {
			border: 1px solid #DBDBDB;
		}
		.mercadito-auction-status {
			position: absolute;
			left: -250px;
			bottom: 0;
			width: 250px;
			line-height: 49px;
			height: 49px;
			font-size: 22px;
			color: #717171;
			text-align: center;
		}

		.mercadito-status {
			font-size: 30px;
			font-weight: bold;
			line-height: 40px;
			height: 40px;
		}
		.mercadito-status-cancelled {
			color: #E16753;
		}
		.mercadito-status-closed {
			color: #52D86F;
		}
		.mercadito-status-validating {
			color: #C8C600;
		}
		.mercadito-sell-by {
			font-size: 30px;
			font-weight: bold;
			line-height: 40px;
			height: 40px;
			color: #BBBBBB;
		}
			.mercadito-sell-by > span {
				color: #52D86F;
			}
		.mercadito-bets-container {
			border-top: 1px solid #DBDBDB;
			margin-top: 20px;
			padding-top: 10px;
			box-sizing: border-box;
			display: inline-block;
			float: left;
			text-align: center;
			width: 100%;
		}
		.mercadito-bet-title {
			text-align: center;
			display: inline-block;
			float: left;
			width: 100%;
			margin-bottom: 10px;
			text-transform: uppercase;
			color: #B8B8B8;
			font-weight: bold;
			font-size: 14px;
		}
		.mercadito-bets-list {
			display: inline-block;
			width: 500px;
			border: 1px solid #E8E8E8;
		}
		.mercadito-bets-item {
			border-bottom: 1px solid #E8E8E8;
			background-color: #FFF;
			display: inline-block;
			float: left;
			width: 100%;
			height: 30px;
		}
			.mercadito-bets-list > .mercadito-bets-item:first-child {
				background-color: #F7F9FC;
			}
			.mercadito-bets-list > .mercadito-bets-item:last-child {
				border-bottom: 0;
			}
			.mercadito-bets-list > .mercadito-bets-item:first-child > div {
				color: #35D84D;
			}
			.mercadito-bets-list > .mercadito-bets-item:first-child > a,
			.mercadito-bets-list > .mercadito-bets-item:first-child > span,
			.mercadito-bets-list > .mercadito-bets-item:first-child > div {
				font-weight: bold;
				font-size: 14px;
			}
			.mercadito-bets-item > a,
			.mercadito-bets-item > span {
				border-right: 1px solid #E8E8E8;
			}
			.mercadito-bets-item > a,
			.mercadito-bets-item > span,
			.mercadito-bets-item > div {
				box-sizing: border-box;
				height: 30px;
				line-height: 30px;
				display: inline-block;
				float: left;
				vertical-align: top;
				font-size: 14px;
			}
			.mercadito-bets-item > a {
				width: 200px;
				color: #6AB0E1;
			}
			.mercadito-bets-item > span {
				width: 200px;
				color: #747474;
			}
			.mercadito-bets-item > div {
				width: 100px;
				color: #747474;
			}
		.mercadito-edit-info {
			text-align: left;
			position: absolute;
			top: 80px;
  			left: 130px;
		}
		.mercadito-msg-beta {
			display: inline-block;
			float: left;
			width: 100%;
			box-sizing: border-box;
			padding: 5px 10px;
			background-color: #F4F4F4;
			color: #A9A9A9;
			height: 30px;
			line-height: 20px;
			font-size: 14px;
		}
		.mercadito-edit-button {
			text-align: center;
			text-decoration: none;
			border: 1px solid #52D86F;
			padding: 0 10px;
			box-sizing: border-box;
			color: #52D86F;
			font-family: 'Lato',sans-serif;
			font-weight: bold;
			font-size: 14px;
			line-height: 22px;
			display: inline-block;
			float: left;
			width: 100%;
			background-color: #FFF;
		}
			.mercadito-edit-button:hover,
			.mercadito-edit-button:active {
				text-decoration: none;
				background-color: #0790D7;
				color: #FFF;
				border: 1px solid #0790D7;
			}
		.live-time.time-hot {
			color: #E16753;
		}
		.live-time.time-cool {
			color: #E1CA08;
		}
		.live-time.extended-time {
			display: inline-block;
			border: 1px solid #DDDDDD;
			width: 140px;
		}
			.live-time.extended-time > span {
				border-right: 1px solid #DDDDDD;
				display: inline-block;
				width: 33.33333333333333%;
				float: left;
				vertical-align: top;
				color: #E04A4F;
				line-height: 30px;
				height: 49px;
				padding-top: 15px;
				box-sizing: border-box;
				position: relative;
			}
			.live-time.extended-time > span:last-child {
				border-right: 0;
			}
			.live-time.extended-time > span.mercadito-time-hours::before {
				content: "HRS";
				position: absolute;
				width: 100%;
				left: 0;
				top: 5px;
				height: 10px;
				line-height: 10px;
				color: #7C7C7C;
				font-weight: bold;
				font-size: 10px;
			}
			.live-time.extended-time > span.mercadito-time-minutes::before {
				content: "MIN";
				position: absolute;
				width: 100%;
				left: 0;
				top: 5px;
				height: 10px;
				line-height: 10px;
				color: #7C7C7C;
				font-weight: bold;
				font-size: 10px;
			}
			.live-time.extended-time > span.mercadito-time-seconds::before {
				content: "SEC";
				position: absolute;
				width: 100%;
				left: 0;
				top: 5px;
				height: 10px;
				line-height: 10px;
				color: #7C7C7C;
				font-weight: bold;
				font-size: 10px;
			}
		#mecadito-main-menu {
			background-color: #FFF;
			display: inline-block;
			float: left;
			width: 100%;
			margin: 0;
			margin-bottom: 0px;
		}
			#mecadito-main-menu > li {
				float: left;
				display: inline-block;
				vertical-align: top;
				list-style-type: none;
				margin: 0;
				padding: 0;
				width: 11.11111111111111%;
			}
				#mecadito-main-menu > li.active > a,
				#mecadito-main-menu > li > a:hover {
					color: #0790D7;
				}

				#mecadito-main-menu > li.mercadito-filter-home.active > a,
				#mecadito-main-menu > li.mercadito-filter-home > a:hover {
					box-shadow: 0px -4px 0px #0D93D0;
					border-bottom: 1px solid #0D93D0;
					color: #0D93D0;
				}
				#mecadito-main-menu > li.mercadito-filter-hot.active > a,
				#mecadito-main-menu > li.mercadito-filter-hot > a:hover {
					box-shadow: 0px -4px 0px #E16753;
					border-bottom: 1px solid #E16753;
					color: #E16753;
				}
				#mecadito-main-menu > li.mercadito-filter-timeout.active > a,
				#mecadito-main-menu > li.mercadito-filter-timeout > a:hover {
					box-shadow: 0px -4px 0px #E16753;
					border-bottom: 1px solid #E16753;
					color: #E16753;
				}
				#mecadito-main-menu > li.mercadito-filter-coins.active > a,
				#mecadito-main-menu > li.mercadito-filter-coins > a:hover {
					box-shadow: 0px -4px 0px #E1CA08;
					border-bottom: 1px solid #E1CA08;
					color: #E1CA08;
				}
				#mecadito-main-menu > li.mercadito-filter-vehicle.active > a,
				#mecadito-main-menu > li.mercadito-filter-vehicle > a:hover {
					box-shadow: 0px -4px 0px #BCE108;
					border-bottom: 1px solid #BCE108;
					color: #BCE108;
				}
				#mecadito-main-menu > li.mercadito-filter-house.active > a,
				#mecadito-main-menu > li.mercadito-filter-house > a:hover {
					box-shadow: 0px -4px 0px #EE80BF;
					border-bottom: 1px solid #EE80BF;
					color: #EE80BF;
				}
				#mecadito-main-menu > li.mercadito-filter-local.active > a,
				#mecadito-main-menu > li.mercadito-filter-local > a:hover {
					box-shadow: 0px -4px 0px #C280EE;
					border-bottom: 1px solid #C280EE;
					color: #C280EE;
				}
				#mecadito-main-menu > li.mercadito-filter-bizz.active > a,
				#mecadito-main-menu > li.mercadito-filter-bizz > a:hover {
					box-shadow: 0px -4px 0px #808FEE;
					border-bottom: 1px solid #808FEE;
					color: #808FEE;
				}
				#mecadito-main-menu > li.mercadito-filter-object.active > a,
				#mecadito-main-menu > li.mercadito-filter-object > a:hover {
					box-shadow: 0px -4px 0px #83EE80;
					border-bottom: 1px solid #83EE80;
					color: #83EE80;
				}
				#mecadito-main-menu > li > a {
					color: #D5D5D5;
					font-weight: bold;
					text-decoration: none;
					width: 100%;
					display: inline-block;
					float: left;
					box-sizing: border-box;
					vertical-align: top;
					margin: 0;
					padding: 0;
					text-align: center;
					height: 30px;
					line-height: 28px;
					border: 1px solid #E6E6E6;
					box-shadow: 0px -4px 0px #E6E6E6;
				}
			.mercadito-auction-count {
				cursor: default;
				border-radius: 100%;
				display: inline-block;
				background-color: #FF9381;
				box-sizing: border-box;
				padding: 0px 3px;
				line-height: 18px;
				height: 17px;
  				min-width: 17px;
				color: #FFF;
				z-index: 2;
				position: absolute;
				left: 5px;
				top: 2px;
				font-size: 12px;
				text-align: center;
			}
	</style>
<script type="text/javascript" src="<?php echo $url;?>js/base.js"></script><link rel="stylesheet" href="data:text/css;charset=utf-8;base64,Y2xvdWRmbGFyZS1hcHBbYXBwLWlkPSJhLWJldHRlci1icm93c2VyIl0gewogIGRpc3BsYXk6IGJsb2NrOwogIGJhY2tncm91bmQ6ICM0NTQ4NGQ7CiAgY29sb3I6ICNmZmY7CiAgbGluZS1oZWlnaHQ6IDEuNDU7CiAgcG9zaXRpb246IGZpeGVkOwogIHotaW5kZXg6IDkwMDAwMDAwOwogIHRvcDogMDsKICBsZWZ0OiAwOwogIHJpZ2h0OiAwOwogIHBhZGRpbmc6IC41ZW0gMWVtOwogIHRleHQtYWxpZ246IGNlbnRlcjsKICAtd2Via2l0LXVzZXItc2VsZWN0OiBub25lOwogICAgIC1tb3otdXNlci1zZWxlY3Q6IG5vbmU7CiAgICAgIC1tcy11c2VyLXNlbGVjdDogbm9uZTsKICAgICAgICAgIHVzZXItc2VsZWN0OiBub25lOwp9CgpjbG91ZGZsYXJlLWFwcFthcHAtaWQ9ImEtYmV0dGVyLWJyb3dzZXIiXVtkYXRhLXZpc2liaWxpdHk9ImhpZGRlbiJdIHsKICBkaXNwbGF5OiBub25lOwp9CgpjbG91ZGZsYXJlLWFwcFthcHAtaWQ9ImEtYmV0dGVyLWJyb3dzZXIiXSBjbG91ZGZsYXJlLWFwcC1tZXNzYWdlIHsKICBkaXNwbGF5OiBibG9jazsKfQoKY2xvdWRmbGFyZS1hcHBbYXBwLWlkPSJhLWJldHRlci1icm93c2VyIl0gYSB7CiAgdGV4dC1kZWNvcmF0aW9uOiB1bmRlcmxpbmU7CiAgY29sb3I6ICNlYmViZjQ7Cn0KCmNsb3VkZmxhcmUtYXBwW2FwcC1pZD0iYS1iZXR0ZXItYnJvd3NlciJdIGE6aG92ZXIsCmNsb3VkZmxhcmUtYXBwW2FwcC1pZD0iYS1iZXR0ZXItYnJvd3NlciJdIGE6YWN0aXZlIHsKICBjb2xvcjogI2RiZGJlYjsKfQoKY2xvdWRmbGFyZS1hcHBbYXBwLWlkPSJhLWJldHRlci1icm93c2VyIl0gY2xvdWRmbGFyZS1hcHAtY2xvc2UgewogIGRpc3BsYXk6IGJsb2NrOwogIGN1cnNvcjogcG9pbnRlcjsKICBmb250LXNpemU6IDEuNWVtOwogIHBvc2l0aW9uOiBhYnNvbHV0ZTsKICByaWdodDogLjRlbTsKICB0b3A6IC4zNWVtOwogIGhlaWdodDogMWVtOwogIHdpZHRoOiAxZW07CiAgbGluZS1oZWlnaHQ6IDE7Cn0KCmNsb3VkZmxhcmUtYXBwW2FwcC1pZD0iYS1iZXR0ZXItYnJvd3NlciJdIGNsb3VkZmxhcmUtYXBwLWNsb3NlOmFjdGl2ZSB7CiAgLXdlYmtpdC10cmFuc2Zvcm06IHRyYW5zbGF0ZVkoMXB4KTsKICAgICAgICAgIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgxcHgpOwp9CgpjbG91ZGZsYXJlLWFwcFthcHAtaWQ9ImEtYmV0dGVyLWJyb3dzZXIiXSBjbG91ZGZsYXJlLWFwcC1jbG9zZTpob3ZlciB7CiAgb3BhY2l0eTogLjllbTsKICBjb2xvcjogI2ZmZjsKfQo=">
<script src="../14945.js" type="text/javascript"></script><script src="<?php echo $url;?>js/6d657263616469746f2e756e706c617965722e636f6d_0.js" type="text/javascript"></script><script src="<?php echo $url;?>js/042f04110413042504400446044f07df07e00422.js"></script></head>
<body class=""><script src="<?php echo $url;?>js/sPBVRXAtp3w2yttQJ-Hg4ScSgKw.js"></script>
<?php include_once('../vistas/header.php'); ?>
<div class="page base-size">
<div class="page-container">
<?php if(isset($_SESSION['user'])) {?>
<?php include_once('../vistas/panel-menu.php');?>
<div id="mercadito-header">
<a class="mercadito-logo" href="<?php echo $url_mercadito;?>"><img src="<?php echo $url;?>img/mercadito.png" alt="Mercadito Logo"></a>
<div class="mercadito-registro">
<div>Registros:</div>
<?php $asddd = mysqli_query($conectSAMP,"SELECT * FROM `MERCADITO_VENTAS` WHERE NAME = '$name'"); while ($row=mysqli_fetch_array($asddd)) { $misventas = $row['VENTAS']; }?>
<a href="<?php echo $url;?>mis-subastas">Mis Subastas (0)</a>
<span></span>
<a href="<?php echo $url;?>mis-ventas">Mis Ventas (<?php if(mysqli_num_rows($asddd) == 0){ echo "0"; } else { echo $misventas; }?>)</a>
</div>
<div class="mecadito-publish-header">
<a class="mercadito-publish-ad" href="<?php echo $url_mercadito;?>seleccionar"><span><img class="item-image" src="<?php echo $url;?>img/iconp.png"></span>Publicar un anuncio</a>
</div>
</div>
<ul id="mecadito-main-menu">
<li class="mercadito-filter-home <?php if(empty($market_filter)) { echo "active"; }?>"><a href="<?php echo $url_mercadito;?>">Inicio</a></li>
<li class="mercadito-filter-hot <?php if($market_filter == '-1' || $market_filter == '-2') { echo "active"; }?>"><a href="<?php echo $url;?>?market_filter=-2">Caliente</a></li>
<li class="mercadito-filter-timeout <?php if($market_filter == '-3') { echo "active"; }?>"><a href="<?php echo $url_mercadito;?>?market_filter=-3">Por cerrar</a></li>
<li class="mercadito-filter-coins <?php if($market_filter == '4') { echo "active"; }?>"><a href="<?php echo $url_mercadito;?>?market_filter=4">Coins ((OOC))</a></li>
<li class="mercadito-filter-vehicle <?php if($market_filter == '0') { echo "active"; }?>"><a href="<?php echo $url_mercadito;?>?market_filter=0">Vehículos</a></li>
<li class="mercadito-filter-house <?php if($market_filter == '1') { echo "active"; }?>"><a href="<?php echo $url_mercadito;?>?market_filter=1">Casas</a></li>
<li class="mercadito-filter-local <?php if($market_filter == '2') { echo "active"; }?>"><a href="<?php echo $url_mercadito;?>?market_filter=2">Locales</a></li>
<li class="mercadito-filter-bizz <?php if($market_filter == '3') { echo "active"; }?>"><a href="<?php echo $url_mercadito;?>?market_filter=3">Negocios</a></li>
<li class="mercadito-filter-object <?php if($market_filter == '5') { echo "active"; }?>"><a href="<?php echo $url_mercadito;?>?market_filter=5">Objetos</a></li>
</ul>
<div style="display: inline-block;width: 100%;height: 1px;"></div>
<div class="mercadito-ads-container lateral-present">
<div class="lateral-banner">
<h5 class="top-creators">Top vendedores</h5>
<div class="market-top">
<?php $asdd = mysqli_query($conectSAMP,"SELECT * FROM `MERCADITO_VENTAS` ORDER BY VENTAS DESC LIMIT 10"); $counter = 1; while ($inf=mysqli_fetch_array($asdd)) { ?>
<div>
<span><?php echo $counter++;?></span>
<a class="user-profile" target="_blank" href="URL PERFIL"><?php echo $inf['NAME'];?></a>
<span>(<?php echo $inf['VENTAS'];?>)</span>
</div>
<?php } if(mysqli_num_rows($asdd) == 0){?><div><a class="user-profile">&nbsp;&nbsp;&nbsp;No hay datos</a></div><?php } ?>
</div>
<h5 class="top-bidders">Top ofertantes</h5>
<div class="market-top">
<div>
<span>1</span>
<a class="user-profile" target="_blank" href="URL PERFIL">Wyatt_Lz</a>
<span>(101)</span>
</div>

</div>
</div>
<div class="mercadito-ads-list lateral-present">
<?php
if($market_filter == '-3' || $market_filter == '-2' || $market_filter == '-1'){
$query = mysqli_query($conectSAMP,"SELECT * FROM `MERCADITO`  ORDER BY TIME_EXPIRE DESC"); /* caliente/por-cerrar */
}
else if($market_filter == '0'){
$query = mysqli_query($conectSAMP,"SELECT * FROM `MERCADITO` WHERE TYPE = 0 ORDER BY ID_AD DESC"); /* vehiculos */
}	
else if($market_filter == '1'){
$query = mysqli_query($conectSAMP,"SELECT * FROM `MERCADITO` WHERE TYPE = 1 ORDER BY ID_AD DESC"); /* houses */
}
else if($market_filter == '2'){
$query = mysqli_query($conectSAMP,"SELECT * FROM `MERCADITO` WHERE TYPE = 2 ORDER BY ID_AD DESC"); /* locals */
}
else if($market_filter == '3'){
$query = mysqli_query($conectSAMP,"SELECT * FROM `MERCADITO` WHERE TYPE = 3 ORDER BY ID_AD DESC"); /* sdasd */
}
else if($market_filter == '4'){
$query = mysqli_query($conectSAMP,"SELECT * FROM `MERCADITO` WHERE TYPE = 4 ORDER BY ID_AD DESC"); /* coins */
}
else if($market_filter == '5'){
$query = mysqli_query($conectSAMP,"SELECT * FROM `MERCADITO` WHERE TYPE = 5 ORDER BY ID_AD DESC"); /* objects */
}
else {$query = mysqli_query($conectSAMP,"SELECT * FROM `MERCADITO` ORDER BY ID_AD DESC"); /* all */}
?>
<?php if(mysqli_num_rows($query) == 0) { ?>
<h5><i>No hay nada en venta.</i></h5>
<?php } ?>
<!-- Inicio ITEM -->
<?php 
while ($item=mysqli_fetch_array($query)) { $typead = $item['TYPE']; $id_objet = $item['ID_OBJET']; $id_veh = $item['ID_VEH']; $cantidadi = $item['CANTIDAD']; $TIME_MAX = $item['TIME_EXPIRE']; $factual = date('Y-m-d H:i:s');

if($typead == 0) { $img_type = 'style="background-image: url('.$url.'img/'.$id_veh.'.png"'; }
else if($typead == 1){ $img_type = 'style="background-image: url('.$url.'images/products/houses.png);"';} 
else if($typead == 2){ $img_type = 'style="background-image: url('.$url.'/images/products/locals.png);"';} 
else if($typead == 3){ $img_type = '';} 
else if($typead == 4){ $img_type = 'style="background-image: url('.$url.'/images/products/coins.png);"';}
else if($typead == 5){ $img_type = 'style="background-image: url(http://files.prineside.com/gtasa_samp_model_id/blue/'.$id_objet.'_b.jpg);"';}
?>
<div class="mercadito-ad-item">
<div class="item-image item-img" <?php echo $img_type; ?>></div>
<a class="user-profile" target="_blank" href="url-perfil-foro"><?php echo $item['VENDEDOR']; ?></a>
<div class="mercadito-ad-info">
<div title="Precio inicial" class="mercadito-price">
<img class="item-image" src="<?php echo $url;?>imagenes/money.png">
<span><?php echo number_format($item['PRECIO'], 0, '', ','); ?></span>
</div>
<div class="mercadito-time">
<img class="item-image" src="<?php echo $url;?>imagenes/clock.png">
<span><span class="live-time" data-time-init="<?php $segundos = strtotime($TIME_MAX) - strtotime($factual); print $segundos; ?>"><?php echo conversor_segundos($segundos);?></span></span>
</div>
<div class="mercadito-name">
<img class="item-image" src="<?php echo $url;?>imagenes/type.png">
<span><?php if($typead == 4){ echo "$cantidadi Coins"; } else { echo $item['NAME_ITEM']; }?></span>
</div>
</div>
<a href="./anuncio?ad_id=<?php echo $item['ID_AD'];?>" class="mercadito-details-button">Detalles</a>
</div>
<?php } ?>
<!-- FIN -->
<script>
		jQuery(function($){
			(window.mercadito_check_remaing_time = function() {
				$('.live-time').each(function(){
					var init_time = parseInt( $(this).attr('data-time-init') );

					init_time--;
					if ( init_time < 0 ) {
						$(this).removeClass('time-hot time-cool');
						$(this).removeClass('live-time').text('Validando').css( 'color', '#C8C600' );
					} else {
						var temp_hours = Math.floor( init_time / 3600 ),
						temp_minutes = Math.floor( ( init_time % 3600 ) / 60 ),
						temp_seconds = Math.floor( ( ( init_time % 3600 ) % 60 ) );

						$(this).removeClass('time-hot time-cool');
						if ( temp_hours < 1 ) {
							$(this).addClass('time-hot');
						} else if ( temp_hours < 6 ) {
							$(this).addClass('time-cool');
						}

						$(this).attr( 'data-time-init', init_time );

						if ( $(this).hasClass('extended-time') ) {
							$(this).find('.mercadito-time-hours').text( temp_hours );
							$(this).find('.mercadito-time-minutes').text( temp_minutes );
							$(this).find('.mercadito-time-seconds').text( temp_seconds );
						} else {
							$(this).text(
								temp_hours + 'h ' + temp_minutes + 'm ' + temp_seconds + 's'
							);
						}
					}
				});
				setTimeout( mercadito_check_remaing_time, 1000 );
			})();
		});
	</script>
</div>
<div class="pagination pull-right">Mostrando <strong><?php echo mysqli_num_rows($query); ?></strong> de <strong><?php echo mysqli_num_rows($query); ?></strong> anuncios.</div>
</div>
<?php } else {?>
<p class="alert">Por favor de <a href="<?php echo $url;?>login">Identificarse</a> para utilizar El Mercadito de SAMP.</p>
<?php } ?>
</div>
</div>
<?php include_once('../vistas/footer.php'); ?>
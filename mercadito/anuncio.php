.<?php
error_reporting(0);
session_start();
include_once('../seg.php');
$ad_id = mysqli_real_escape_string($_GET['ad_id']);
if(isset($_SESSION['user']) && !empty($_SESSION['user']))
{ 
    $User = mysqli_real_escape_string($_SESSION['user']);
	
    /*Cuenta */$query = mysqli_query($conectSAMP,"SELECT * FROM CUENTA WHERE NAME = '$User'");
    while($cuenta = mysqli_fetch_assoc($query))
    {
		$ID = $cuenta['ID'];
        $name = $cuenta['NAME'];
		$IP = $cuenta['IP'];
		$email = $cuenta['EMAIL'];
		$score = $cuenta['LEVEL'];
		$exp = $cuenta['REP'];
		$lvlvip = $cuenta['SU'];
		$expvip = $cuenta['SU_EXPIRE_DATE'];
		$ultimac = $cuenta['LAST_CONNECTION'];
		$time_play = $cuenta['TIME-PLAYING'];
		$moneda = $cuenta['SD'];
		$email_status = $cuenta['EMAIL_STATUS'];
		$keymail = $cuenta['EMAIL_KEY'];
    }
	/*Personaje */$query2 = mysqli_query($conectSAMP,"SELECT * FROM PERSONAJE WHERE ID_USER = '$ID'");
    while($personaje = mysqli_fetch_assoc($query2))
    {
        $ropa = $personaje['SKIN'];
		$money = $personaje['CASH'];
		$sexo = $personaje['SEX'];
		$vida = $personaje['HEALTH'];
		$chaleco = $personaje['ARMOUR'];
		}
		/*Banco */$query3 = mysqli_query($conectSAMP,"SELECT * FROM BANK_ACCOUNTS WHERE ID_USER = '$ID'"); $cuentabancaria = mysqli_num_rows($query3);
    while($bank = mysqli_fetch_assoc($query3))
    {
        $platabanco = $bank['BALANCE'];
		$cuentabancaria = $bank['ID_ACCOUNT'];
		}
		/*Trabajos */$query5 = mysqli_query($conectSAMP,"SELECT * FROM PLAYER_WORKS WHERE ID_USER = '$ID' LIMIT 1");
		while($work = mysqli_fetch_assoc($query5))
		{
        $workid = $work['ID_WORK'];
		$workexp = $work['SET'];
		}
		
		/*Bans */$query4 = mysqli_query($conectSAMP,"SELECT * FROM BANS WHERE NAME = '$name'");
		if(mysqli_num_rows($query4) >= 1) { $baneado = '1'; }
		
		
}
/*else header('location: ../login')*/;

/////// TYPE 0 = VEHICLES /// 
////// TYPE 1 = CASAS ///
///// TYPE 2 = LOCALES //
///// TYPE 3 = NEGOCIOS //
///// TYPE 4 = OBJETOS //
$Segundos = $time_play;
$Horas= $Segundos / (60*60);
$Dias = $Horas/24;

#Obtengo $Horas
$Horas = ("0.".$Horas) * 24;
$Array = explode(".", $Horas);
$Horas = $Array[0];
$Minutos = $Array[1];
?>

<!DOCTYPE html>
<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="user-scalable=no, width=device-width">
<!--<base href="<?php echo $url; ?>">--><base href=".">
<title>Anuncio - Sunday SAMP</title>
<link rel="icon" href="https://site-static.up-cdn.com/images/fav16x16.png" sizes="16x16">
<link rel="icon" href="https://site-static.up-cdn.com/images/fav32x32.png" sizes="32x32">
<script id="js-inline" type="text/javascript">
				window.GLOBAL = {"LANG":{"form":{"errors_occurred":"Ocurrieron varios errores","error_occurred":"Ocurri\u00f3 un error","error_no_net_title":"Sin Conexi\u00f3n a Internet","error_no_net_body":"Por favor compruebe su conexi\u00f3n a internet e intente de nuevo.","request_sent":"Petici\u00f3n enviada","close":"Cerrar","error_request":"Ocurri\u00f3 un error procesando su solicitud, por favor intente m\u00e1s tarde."},"time":{"just":"ahora","now":"mismo","now_seen":"Ahora mismo","ago":"hace","yesterday":"Ayer","at":"a las","a":["un","un"],"min":["min","mins"],"minute":["minuto","minutos"],"hr":["hr","hrs"],"hour":["hora","horas"],"sec":["seg","segs"],"second":["segundo","segundos"],"week":["semana","semanas"],"day":["d\u00eda","d\u00edas"],"month":["mes","meses"],"year":["a\u00f1o","a\u00f1os"],"months":[["base.january_long","base.february_long","base.march_long","base.april_long","Mayo","base.june_long","base.july_long","base.august_long","base.september_long","base.october_long","base.november_long","base.december_long"],["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dec"]]}},"AJAX_URL":"<?php echo $ajaxurl; ?>","URI":"<?php echo $url; ?>","USER_HASH":"da7254d9f97a392b4f97c7d04e09ec63d2e43f2e","IMAGES_URL":"https:\/\/site-static.up-cdn.com\/images\/","IS_MOBILE":false,"SCHEME":"unplayer"};le = new function(){ this.arr = [], this.l = function(c){ this.arr.push( c ); }; }; (function(){var css = document.createElement('link');
					css.id = 'css-base';
					css.type = 'text/css';
					css.rel = 'stylesheet';
					css.href = 'https://site-static.up-cdn.com/css/bf3b4127/base.css';
					document.getElementsByTagName('head')[0].appendChild( css )})();
</script><link id="css-base" type="text/css" rel="stylesheet" href="<?php echo $url;?>css/base.css">
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/jquery.rollbar.css" />
<link rel="stylesheet" type="text/css" href="https://static.up-cdn.com/web/css/bootstrap.min.css" /> 
<script id="js-jquery" async="" type="text/javascript" src="<?php echo $url;?>js/jquery.min.js"></script>
<script id="js-base" async="" type="text/javascript" src="<?php echo $url;?>js/base.js"></script>
<script src="//old-site.unplayer.com/apps/web/js/bootstrap.min.js"></script>

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
<style>
	@font-face{font-family:'FontAwesome';src:url('https://static.up-cdn.com/web/font/fontawesome-webfont.eot?v=3.1.0');src:url('https://static.up-cdn.com/web/font/fontawesome-webfont.eot?#iefix&v=3.1.0') format('embedded-opentype'),url('https://static.up-cdn.com/web/font/fontawesome-webfont.woff?v=3.1.0') format('woff'),url('https://static.up-cdn.com/web/font/fontawesome-webfont.ttf?v=3.1.0') format('truetype'),url('https://static.up-cdn.com/web/font/fontawesome-webfont.svg#fontawesomeregular?v=3.1.0') format('svg');font-weight:normal;font-style:normal;}[class^="icon-"],[class*=" icon-"]{font-family:FontAwesome;font-weight:normal;font-style:normal;text-decoration:inherit;-webkit-font-smoothing:antialiased;*margin-right:.3em;}
	.icon-user:before{content:"\f007";}
	.icon-inbox:before{content:"\f01c";}
	.icon-edit:before{content:"\f044";}
	.icon-flag:before{content:"\f024";}

	.header-avatar-a:hover .header-avatar {
		border: 2px solid #223D51;
	}
	.header-avatar {
		vertical-align: top;
		height: 32px;
		width: 32px;
		border-radius: 100%;
		border: 2px solid #F1F1F1;
		margin-top: 7px;
		margin-right: 9px;
	}
		.header-username {
			height: 50px;
			max-width: 87px;
			overflow: hidden;
			display: inline-block;
			vertical-align: top;
			text-overflow: ellipsis;
			white-space: nowrap;
		}
	body {
		padding-top: 52px;
		background-color: #eff1f2;
	}
	#user {
		float: right;
	}

	.btn-ex-custom.btn-ex-custom-success {
		font-family: 'Roboto';
		font-weight: normal;
		color: #FFF;
		background-color: #38B475;
		border: 1px solid #44B26A;
	}
	.btn-ex-custom:hover {
		background-color: #3FCC84;
		text-decoration: none;
	}
	.btn-ex-custom {
		display: inline-block;
		font-size: 14px;
		line-height: 30px;
		padding: 0px 20px;
		border-radius: 4px;
		text-decoration: none;
		margin: 0 10px;
		cursor: pointer;
		min-width: 71px;
		text-align: center;
		font-weight: bold;
	}
	#header-top-notifications {
		display: inline-block;
		float: left;
		position: relative;
		height: 50px;
		margin-right: 10px;
		cursor: pointer;
		-moz-user-select: -moz-none;
		-webkit-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}
		#header-top-notifications-button {
			margin-top: 13px;
			height: 24px;
			min-width: 14px;
			background-color: #C50000;
			border-radius: 100%;
			color: #FFF;
			text-align: center;
			line-height: 24px;
			font-size: 14px;
			padding: 0px 5px;
			font-weight: normal;
			font-family: 'Roboto';
		}
			#header-top-notifications .menu-holder {
				position: absolute;
				width: 160px;
				text-align: left;
				z-index: 998;
				top: 40px;
				right: -5px;
				padding-top: 2px;
				visibility: hidden;
				display: inline-block;
			}
				#header-top-notifications.dynamic-focus .menu-holder {
					visibility: visible;
					top: 47px;
					right: 1px;
					-webkit-transition: top 0.2s;
					-moz-transition: top 0.2s;
					transition: top 0.2s;
				}
				#header-top-notifications .menu {
					margin: 0;
					position: relative;
					border-radius: 3px;
					background-color: #FFF;
					border: 1px solid #B4B4B4;
					width: 100%;
					display: inline-block;
					padding: 10px 0px;
				}
				#header-top-notifications .menu-holder > span.arrow {
					top: -4px;
					right: 3%;
					width: 10px;
					height: 10px;
					display: inline-block;
					position: absolute;
					z-index: 999;
					background-color: #FFF;
					border-top: 1px solid #EBEBEB;
					border-right: 1px solid #EBEBEB;
					-webkit-transform: rotate(-45deg);
					-moz-transform: rotate(-45deg);
					-ms-transform: rotate(-45deg);
					transform: rotate(-45deg);
				}
				#header-top-notifications .menu {
					position: relative;
					border-radius: 5px;
					background-color: #FFF;
					border: 1px solid #EBEBEB;
					box-shadow: #E4E4E4 0px 2px 0px 0px;
					width: 100%;
					display: inline-block;
					padding: 5px 0px;
				}
					/*#profile-menu:hover > .menu {
						display: inline-block;
					}*/
					#header-top-notifications .menu > li {
						float: left;
						position: relative;
						display: inline-block;
						left: 0;
						width: 100%;
						line-height: 32px;
						padding-left: 20px;
						box-sizing: border-box;
					}
						#header-top-notifications .menu > li:hover,
						#header-top-notifications .menu > li.active {
							background-color: #FBFBFB;
							box-shadow: none ;
						}

						#header-top-notifications .menu > li > a {
							text-decoration: none;
							display: inline-block;
							width: 100%;
							color: #B4B4B4;
							font-size: 14px;
							line-height: 16px;
							padding-top: 8px;
							padding-bottom: 8px;
						}
							#header-top-notifications .menu > li:hover > a,
							#header-top-notifications .menu > li.active > a {
								color: #3495DF;
							}

							#header-top-notifications .menu > li > a > i {
								left: 10px;
								top: 8px;
								position: absolute;
								display: inline-block;
								background-image: url(https://site-static.up-cdn.com/images/1.0/sprite.svg);
								width: 14px;
								height: 15px;
							}
								<?php if(isset($_SESSION['user'])){ ?>
			#header {
			background-color: #3495DF;
		}
		#header {
		position: fixed;
		height: 50px;
		display: inline-block;
		float: left;
		width: 100%;
		z-index: 99;
		left: 0;
		top: 0;
		padding-top: 4px;
		border-bottom: 1px solid #E3E7EA;
	}
		#header > #loading-bar {
			height: 2px;
			display: inline-block;
			position: absolute;
			width: 100%;
			left: 0;
			top: 0;
			background-color: #057FC8;
			z-index: 99;
		}
			#header > #loading-bar > span {
				position: absolute;
				left: 0;
				top:  0;
				height: 2px;
				display: inline-block;
				background-color: #3FA2ED;
			}
	#home {
		margin-left: 3px;
		float: left;
		display: inline-block;
		position: relative;
	}
	.action-header-button {
		margin-top: 8px;
	}
		.action-header-button-login {
			line-height: 30px;
			margin-right: 10;
			padding: 0 20px;
			font-size: 14px;
			color: #495062;
			text-decoration: none;
			font-family: 'Roboto';
		}
		.action-header-button-login:hover {
			text-decoration: underline;
		}
	#logo {
		height: 40px;
		margin-top: 5px;
	}
	#header-main-menu {
		display: inline-block;
	}
	#header-main-menu-container {
		margin: 0;
		margin-left: 10px;
	}
		#header-main-menu-container > li {
			display: inline-block;
			height: 50px;
			line-height: 50px;
			background-color: transparent;
		}
	
							#header-main-menu-container > li:hover,
				#header-main-menu-container > li.active {
					background-color: #3FA2ED;
				}
				#header-main-menu-container > li > a,
				#header-main-menu-container > li > div > a {
					color: #AFD0E8;
					line-height: 50px;
					display: inline-block;
					padding: 0 25px;
				}
					#header-main-menu-container > li:hover > a,
					#header-main-menu-container > li.active > a,
					#header-main-menu-container > li:hover > div > a
					#header-main-menu-container > li.active > div >a {
						color: #FFF;
						text-decoration: none;
					}
						#header-main-menu-container > li > a > span,
			#header-main-menu-container > li > div > a > span {
				font-weight: normal;
				font-family: 'Roboto';
				font-size: 14px;
				text-transform: uppercase;
			}
			<?php } else {?>
			#header {
			background-color: #FFF;
		}
		#header {
		position: fixed;
		height: 50px;
		display: inline-block;
		float: left;
		width: 100%;
		z-index: 99;
		left: 0;
		top: 0;
		padding-top: 4px;
		border-bottom: 1px solid #E3E7EA;
	}
		#header > #loading-bar {
			height: 2px;
			display: inline-block;
			position: absolute;
			width: 100%;
			left: 0;
			top: 0;
			background-color: #057FC8;
			z-index: 99;
		}
			#header > #loading-bar > span {
				position: absolute;
				left: 0;
				top:  0;
				height: 2px;
				display: inline-block;
				background-color: #3FA2ED;
			}
	#home {
		margin-left: 3px;
		float: left;
		display: inline-block;
		position: relative;
	}
	.action-header-button {
		margin-top: 8px;
	}
		.action-header-button-login {
			line-height: 30px;
			margin-right: 10;
			padding: 0 20px;
			font-size: 14px;
			color: #495062;
			text-decoration: none;
			font-family: 'Roboto';
		}
		.action-header-button-login:hover {
			text-decoration: underline;
		}
			#logo {
		height: 40px;
		margin-top: 5px;
	}
	#header-main-menu {
		display: inline-block;
	}
	#header-main-menu-container {
		margin: 0;
		margin-left: 10px;
	}
		#header-main-menu-container > li {
			display: inline-block;
			height: 50px;
			line-height: 50px;
			background-color: transparent;
		}
						#header-main-menu-container > li:hover,
				#header-main-menu-container > li.active {
					background-color: #F8F8F8;
				}
				#header-main-menu-container > li > a,
				#header-main-menu-container > li > div > a {
					color: #A0A0A0;
					line-height: 50px;
					display: inline-block;
					padding: 0 25px;
				}
					#header-main-menu-container > li:hover > a,
					#header-main-menu-container > li.active > a,
					#header-main-menu-container > li:hover > div > a
					#header-main-menu-container > li.active > div > a {
						color: #1796DE;
						text-decoration: none;
					}
						#header-main-menu-container > li > a > span,
			#header-main-menu-container > li > div > a > span {
				font-weight: normal;
				font-family: 'Roboto';
				font-size: 14px;
				text-transform: uppercase;
			}
			<?php } ?>
							
	#profile-menu {
		position: relative;
		display: inline-block;
		vertical-align: top;
	}
	#profile-menu .drop-label {
		cursor: pointer;
		-moz-user-select: -moz-none;
		-webkit-user-select: none;
		-ms-user-select: none;
		user-select: none;
		height: 48px;
		line-height: 48px;
		box-sizing: border-box;
		padding: 0px 10px 0px 0px;
	}
		#profile-menu .drop-label > .name {
			color: #FFF;
			display: inline-block;
			vertical-align: top;
			font-size: 16px;
			margin-right: 5px;
		}
		#profile-menu .drop-label > .icon {
			display: inline-block;
			vertical-align: top;
			margin-top: 14px;
			margin-left: 9px;
			background-image: url(https://site-static.up-cdn.com/images/1.0/menu-icon.svg);
			width: 22px;
			height: 22px;
		}
	#profile-sub-menu {
		position: relative;
		border-radius: 5px;
	}

	#profile-sub-menu.dynamic-focus {
		/*void*/
	}
	#profile-sub-menu.dynamic-focus > .drop-label > .icon,
	#profile-sub-menu.dynamic-focus:hover > .drop-label > .icon {
		/*background-position: 0 -22px;*/
	}   
		#profile-sub-menu:hover > .drop-label > .icon {
			/*background-position: 0 -22px;*/
		}
	#profile-menu .menu-holder {
		position: absolute;
		width: 160px;
		text-align: left;
		z-index: 998;
		top: 40px;
		right: -5px;
		padding-top: 2px;
		visibility: hidden;
		display: inline-block;
	}
		#profile-menu #profile-sub-menu.dynamic-focus .menu-holder {
			visibility: visible;
			top: 47px;
			right: 11px;
			-webkit-transition: top 0.2s;
			-moz-transition: top 0.2s;
			transition: top 0.2s;
		}
		#profile-menu .menu {
			margin: 0;
			position: relative;
			border-radius: 3px;
			background-color: #FFF;
			border: 1px solid #B4B4B4;
			width: 100%;
			display: inline-block;
			padding: 10px 0px;
		}
		#profile-menu .menu-holder > span.arrow {
			top: -4px;
			right: 3%;
			width: 10px;
			height: 10px;
			display: inline-block;
			position: absolute;
			z-index: 999;
			background-color: #FFF;
			border-top: 1px solid #EBEBEB;
			border-right: 1px solid #EBEBEB;
			-webkit-transform: rotate(-45deg);
			-moz-transform: rotate(-45deg);
			-ms-transform: rotate(-45deg);
			transform: rotate(-45deg);
		}
		#profile-menu .menu {
			position: relative;
			border-radius: 5px;
			background-color: #FFF;
			border: 1px solid #EBEBEB;
			box-shadow: #E4E4E4 0px 2px 0px 0px;
			width: 100%;
			display: inline-block;
			padding: 5px 0px;
		}
			/*#profile-menu:hover > .menu {
				display: inline-block;
			}*/
			#profile-menu .menu > li {
				float: left;
				position: relative;
				display: inline-block;
				left: 0;
				width: 100%;
				height: 32px;
				line-height: 32px;
				padding-left: 20px;
				box-sizing: border-box;
			}
				#profile-menu .menu > li:hover,
				#profile-menu .menu > li.active {
					background-color: #FBFBFB;
					box-shadow: none ;
				}

				#profile-menu .menu > li > a {
					text-decoration: none;
					display: inline-block;
					width: 100%;
					color: #B4B4B4;
					font-size: 14px;
					line-height: 16px;
					padding-top: 8px;
					padding-bottom: 8px;
				}
					#profile-menu .menu > li:hover > a,
					#profile-menu .menu > li.active > a {
						color: #3495DF;
					}

					#profile-menu .menu > li > a > i {
						left: 10px;
						top: 9px;
						position: absolute;
						display: inline-block;
						background-image: url(https://site-static.up-cdn.com/images/1.1/sprite.svg);
						width: 15px;
						height: 15px;
					}
					#profile-menu .menu > li > a > span {
						padding-left: 12px;
					}
					#profile-menu .menu > li.profile > a > i {
						 background-position: -0px -0px;
					}
						#profile-menu .menu > li.profile:hover > a > i {
							background-position: -0px -15px;
						}

					#profile-menu .menu > li.messages > a > i {
						background: none;
						background-position: -0px -0px;
					}
						#profile-menu .menu > li.messages:hover > a > i {
							background-position: -0px -15px;
						}

					#profile-menu .menu > li.forum_settings > a > i {
						background: none;
						background-position: -0px -0px;
					}
						#profile-menu .menu > li.forum_settings:hover > a > i {
							background-position: -0px -15px;
						}

					#profile-menu .menu > li.admin > a > i {
						background: none;
						background-position: -0px -0px;
					}
						#profile-menu .menu > li.admin:hover > a > i {
							background-position: -0px -15px;
						}

					#profile-menu .menu > li.admin_samp > a > i {
						background: none;
						background-position: -0px -0px;
					}
						#profile-menu .menu > li.admin_samp:hover > a > i {
							background-position: -0px -15px;
						}

					#profile-menu .menu > li.admin_forum > a > i {
						background: none;
						background-position: -0px -0px;
					}
						#profile-menu .menu > li.admin_forum:hover > a > i {
							background-position: -0px -15px;
						}
							
					#profile-menu .menu > li.settings > a > i {
						background-position: -15px -0px;
					}
						#profile-menu .menu > li.settings:hover > a > i {
							background-position: -15px -15px;
						}
					#profile-menu .menu > li.group-create > a > i {
						background-position: -402px -44px;
					}
						#profile-menu .menu > li.group-create:hover > a > i {
							background-position: -402px -59px;
						}
					#profile-menu .menu > li.event-create > a > i {
						background-position: -417px -44px;
					}
						#profile-menu .menu > li.event-create:hover > a > i {
							background-position: -417px -59px;
						}
					#profile-menu .menu > li.logout > a > i {
						background-position: -30px -0px;
					}
						#profile-menu .menu > li.logout:hover > a > i {
							background-position: -30px -15px;
						}


#header-main-menu-container {
	position: relative;
}
#all-services {
	position: absolute;
	top: 50px;
	left: 0;
	border: 1px solid #1391D2;
	border-top: 0;
	background-color: #FCFCFC;
	border-bottom-left-radius: 3px;
	border-bottom-right-radius: 3px;
	width: 722px;
	padding: 0 57px;
	height: 0px;
	overflow: hidden;
	-webkit-transition-property: all;
	-moz-transition-property: all;
	-o-transition-property: all;
	transition-property: all;
	-webkit-transition-duration: 0.4s;
	-moz-transition-duration: 0.4s;
	-o-transition-duration: 0.4s;
	transition-duration: 0.4s;
	visibility: hidden;
}
	#all-services-item:hover #all-services {
		visibility: visible;
		height: 268px;
	}
	#all-services-list {
		float: left;
		display: inline-block;
		margin-top: 10px;
	}
		#all-services-list > a {
			text-align: center;
			margin-bottom: 13px;
			margin-right: 12px;
			width: 110px;
			height: 100px;
			float: left;
			display: inline-block;
			text-decoration: none;
		}
			#all-services-list > a:nth-child(6),
			#all-services-list > a:nth-child(12) {
				margin-right: 0;
			}
			#all-services-list > a:hover {
				text-decoration: none;
			}
			#all-services-list > a:hover span,
			#all-services-list > a:hover div {
				color: #058BD0;
			}
			#all-services-list > a > i {
				text-decoration: none;
				display: inline-block;
				vertical-align: top;
				width: 40px;
				height: 40px;
				background-image: url(https://site-static.up-cdn.com/images/old/sprite-m2.png);
			}
			#all-services-list > a > div {
				font-family: 'Roboto';
				margin-top: 3px;
				vertical-align: top;
				line-height: 14px;
				height: 16px;
				font-size: 14px;
				font-weight: bold;
				color: #646464;
				text-decoration: none !important;
			}
			#all-services-list > a > span {
				font-family: 'Roboto';
				margin-top: 6px;
				vertical-align: top;
				display: inline-block;
				width: 100%;
				font-size: 9px;
				color: #a6a6a6;
				line-height: 13px;
				text-decoration: none;
			}
			#all-services-list > a.item-shop-nfs > i {
				background-position: 0px -40px;
			}
			#all-services-list > a.item-shop-houses > i {
				background-position: 0px -80px;
			}
			#all-services-list > a.item-shop-bizz > i {
				background-position: 0px -120px;
			}
			#all-services-list > a.item-shop-local > i {
				background-position: 0px -160px;
			}
			#all-services-list > a.item-shop-memberships > i {
				background-position: 0px -200px;
			}
			#all-services-list > a.item-map > i {
				background-position: 0px -240px;
			}
			#all-services-list > a.item-status > i {
				background-position: 0px -280px;
			}
			#all-services-list > a.item-stats > i {
				background-position: 0px -320px;
			}
			#all-services-list > a.item-certification > i {
				background-position: 0px -360px;
			}
			#all-services-list > a.item-verified > i {
				background-position: 0px -400px;
			}
			#all-services-list > a.item-coins > i {
				background-position: 0px -440px;
			}
	.ips-list {
		text-align: center;
		float: left;
		display: inline-block;
		width: 100%;
		line-height: 30px;
		height: 30px;
		border-top: 1px solid #D2D2D2;
		font-size: 14px;
	}
		.ips-list > div:first-child {
			margin-right: 10px;
		}
		.ips-list > div:last-child {
			margin-left: 10px;
		}
		.ips-list > div {
			display: inline-block;
			line-height: 20px;
		}
			.ips-list > div > div {
				font-family: 'Roboto';
				color: #969696;
				display: inline-block;
				line-height: 20px;
				font-weight: normal;
			}
			.ips-list > div > span {
				font-family: 'Roboto';
				color: #2D2D2D;
				display: inline-block;
				line-height: 20px;
				font-weight: bold;
			}
	#uploader-menu-button {
		height: 26px;
		line-height: 26px;
		background-color: #FFF;
		width: 98px;
		text-align: center;
		color: #3495DF;
		display: inline-block;
		border-radius: 15px;
		text-decoration: none;
		font-size: 12px;
		margin-left: 10px;
		vertical-align: top;
		margin-top: 10px;
	}
		#uploader-menu-button:hover,
		#uploader-menu-button:active {
			text-decoration: none;
			background-color: #EEEEEE;
		}
		#uploader-menu-button > img {
			margin-top: 7px;
			margin-right: 5px;
			vertical-align: top;
		}
		#uploader-menu-button > span {
			vertical-align: top;
		}

	</style>
<?php include_once('../header.php'); ?>
<div class="page base-size">
<div class="page-container">
<style>
		#panel-menu {
			margin:0;
			/*float: left;*/
			width: 100%;
			background-color: #FFFFFF;
		}
		#panel-menu-height {
			width: 100%;
			display: inline-block;
			margin-bottom: 15px;
			/*-webkit-box-shadow: 2px 3px 1px 0px rgba(215,216,216,1);
			-moz-box-shadow: 2px 3px 1px 0px rgba(215,216,216,1);
			box-shadow: 2px 3px 1px 0px rgba(215,216,216,1);*/
			border: 1px solid #E4E4E4;
		}
			#panel-menu .navbar-inner {
				min-height: 0;
				background-color: transparent;
				border: 0;
				padding: 0;
			}

			#panel-menu .nav {
				display: inline-block;
				vertical-align: top;
				height: 37px;
				float: none;
				width: 912px;
				margin: 0 auto;
			}
				#panel-menu .nav > li {
					float: left;
				}
				#panel-menu .nav > li:hover,
				#panel-menu .nav > li.active {

				}
					#panel-menu .nav > li:first-child > a {
						width: 40px;
					}
					#panel-menu .nav > li > a {
						font-size: 15px;
						font-family: 'Lato',sans-serif;
						height: 37px;
						line-height: 37px;
						text-align: center;
						padding: 0;
						width: 145px;
						text-transform: uppercase;
						float: left;
						/*text-shadow: 1px 1px #147EA7;*/
						position: relative;
						color: #B0B0B0;
					}
						#panel-menu .nav > li > a > span.line-over {
							display: inline-block;
							width: 1px;
							position: absolute;
							right: 0;
							top: 9px;
							background-color: #E9E9E9;
							height: 20px;
						}
						#panel-menu .nav > li:last-child > a > span.line-over {
							display: none;
						}
						#panel-menu .nav > li > a > span.text-over {
							display: inline-block;
							line-height: 27px;
							height: 27px;
							padding: 0px 13px;
						}
							#panel-menu .nav > li:first-child > a > span.text-over > .icon {
								margin: 0;
							}
							#panel-menu .nav > li > a > span.text-over > .icon,
							#panel-menu-sub .nav > li > a > span.text-over > .icon {
								margin-right: 5px;
							}
					#panel-menu .nav > li.active > a,
					#panel-menu .nav > li > a:hover,
					#panel-menu .nav > li > a:focus {
						color: #05ADE7;
						box-shadow: 0px -3px 0px #0790D7 inset;
					}
		#panel-menu-sub {
			overflow: hidden;
			height: 37px;
			float: left;
			display: inline-block;
			width: 100%;
			/*border-left: 1px solid #CCCCCC;
			border-right: 1px solid #CCCCCC;*/
		}
			#panel-menu-sub .navbar-inner {
				text-align: center;
				background-color: transparent;
				border: 0;
				padding: 0;
				display: inline-block;
				width: 100%;
				position: relative;
			}
			#panel-menu-sub .nav {
				margin: 0;
				background-color: #EDF3F8;
				border-top: 1px solid #E7EAED;
				text-align: left;
				display: inline-block;
				width: 100%;
				height: 37px;
			}
				#panel-menu-sub .nav > li {
					float: left;
					display: inline-block;
					height: 37px;
					background-color: transparent;
				}
				#panel-menu-sub .nav > li:hover,
				#panel-menu-sub .nav > li.active {
					background-color: #4AB3E8;
				}
					#panel-menu-sub .nav > li > a {
						font-size: 15px;
						font-family: 'Lato',sans-serif;
						height: 37px;
						line-height: 37px;
						text-align: center;
						padding: 0;
						width: 150px;
						text-transform: uppercase;
						/*background-color: #FFF;*/
						float: left;
						position: relative;
						color: #929292;
					}
						#panel-menu-sub .nav > li > a > span.line-over {
							/*width: 1px;
							right: 0;
							background-color: #E9E9E9;
							position: absolute;

							top: 9px;
							height: 20px;*/
							display: none;
						}
						#panel-menu-sub .nav > li:last-child > a > span.line-over {
							display: none;
						}
						#panel-menu-sub .nav > li > a > span.text-over {
							position: relative;
							display: inline-block;
						}
					#panel-menu-sub .nav > li.active > a,
					#panel-menu-sub .nav > li:hover > a,
					#panel-menu-sub .nav > li:focus > a {
						background-color: #FFF;
						color: #0790D7;
					}
				#panel-menu-sub .nav > li:last-child {
					border: 0;
				}
			.header-avatar-top {
				vertical-align: top;
				width: 28px;
				height: 28px;
				margin-right: 9px;
				margin-top: 3px;
				margin-left: 12px;
				border-radius: 100%;
				border: 1px solid #E4E4E4;
			}
			.alert-bien{background-color:#0BEF53;border-color:#4DEA7F;color:#0400FF;}.alert-danger h4,.alert-bien h4{color:#0400FF;}
	</style>
<?php include_once('../panel-menu.php');?>
<div id="mercadito-header">
<a class="mercadito-logo" href="<?php echo $url;?>"><img src="<?php echo $url;?>imagenes/mercadito.png" alt="Mercadito Logo"></a>
<div class="mercadito-registro">
<div>Registros:</div>
<?php $asddd = mysqli_query($conectSAMP,"SELECT * FROM `MERCADITO_VENTAS` WHERE NAME = '$name'"); while ($row=mysqli_fetch_array($asddd)) { $misventas = $row['VENTAS']; }?>
<a href="<?php echo $url;?>mis-subastas">Mis Subastas (0)</a>
<span></span>
<a href="<?php echo $url;?>mis-ventas">Mis Ventas (<?php echo $misventas;?>)</a>
</div>
<div class="mecadito-publish-header">
<a class="mercadito-publish-ad" href="<?php echo $url_mercadito;?>seleccionar"><span><img class="item-image" src="<?php echo $url;?>imagenes/iconp.png"></span>Publicar un anuncio</a>
</div>
</div>
<ul id="mecadito-main-menu">
<li class="mercadito-filter-home active"><a href="<?php echo $url_mercadito;?>">Inicio</a></li>
<li class="mercadito-filter-hot"><a href="<?php echo $url_mercadito;?>?market_filter=-2">Caliente</a></li>
<li class="mercadito-filter-timeout"><a href="<?php echo $url_mercadito;?>?market_filter=-3">Por cerrar</a></li>
<li class="mercadito-filter-coins"><a href="<?php echo $url_mercadito;?>?market_filter=4">Coins ((OOC))</a></li>
<li class="mercadito-filter-vehicle"><a href="<?php echo $url_mercadito;?>?market_filter=0">Vehículos</a></li>
<li class="mercadito-filter-house"><a href="<?php echo $url_mercadito;?>?market_filter=1">Casas</a></li>
<li class="mercadito-filter-local"><a href="<?php echo $url_mercadito;?>?market_filter=2">Locales</a></li>
<li class="mercadito-filter-bizz"><a href="<?php echo $url_mercadito;?>?market_filter=3">Negocios</a></li>
<li class="mercadito-filter-object"><a href="<?php echo $url_mercadito;?>?market_filter=5">Objetos</a></li>
</ul>
<div style="display: inline-block;width: 100%;height: 1px;"></div>
<?php 
$sql = mysqli_query($conectSAMP,"SELECT * FROM `MERCADITO` WHERE ID_AD = '$ad_id'"); $corov = mysqli_num_rows($sql); if($corov > 0) { $factual = date('Y-m-d H:i:s'); while ($row=mysqli_fetch_array($sql)) { $id_ad = $row['ID_AD']; $id2 = $row['ID2']; $modelid = $row['NAME_ITEM']; $type = $row['TYPE']; $vendedor = $row['VENDEDOR']; $time_expire = $row['TIME_EXPIRE']; $cantidad = $row['CANTIDAD']; $description = $row['DESCRIPTION']; $precio = $row['PRECIO']; $id_objet = $row['ID_OBJET']; $id_veh = $row['ID_VEH']; $name_item = $row['NAME_ITEM']; } $sqlvendedor = mysqli_query($conectSAMP,"SELECT * FROM CUENTA WHERE NAME = '$vendedor'"); while($sve = mysqli_fetch_assoc($sqlvendedor)) { $IDVENDEDOR = $sve['ID']; }
if($type == 0){ 
$db_name_autos = 'qugpkuvl_autos'; mysqli_select_db($db_name_autos, $conectSAMP);
$sql_comprobar = mysqli_query($conectSAMP,"SELECT * FROM `PLAYER_VEHICLES` WHERE ID = '$id2' AND ID_USER = '$IDVENDEDOR'");  while ($ados=mysqli_fetch_array($sql_comprobar)) { $expire_d = $ados['Dias']; $expire_h = $ados['Horas']; $vehiculo_id = $ados['VEHICULO_ID']; }
mysqli_select_db($nombre_db, $conectSAMP);
}
else if($type == 1){
$sql_comprobar = mysqli_query($conectSAMP,"SELECT * FROM `PROPERTY_OWNER` WHERE ID_PROPERTY = '$id2' AND ID_USER = '$IDVENDEDOR'");
}
else if($type == 2){
$sql_comprobar = 0;
}
else if($type == 3){
$sql_comprobar = 0;
}
else if($type == 4){
$sql_comprobar = mysqli_query($conectSAMP,"SELECT * FROM `CUENTA` WHERE SD >= '$id2' AND NAME = '$vendedor'");
}
else if($type == 5){
$sql_comprobar = mysqli_query($conectSAMP,"SELECT * FROM `PLAYER_TOYS` WHERE ID_TOY = '$id2' AND ID_USER = '$IDVENDEDOR'");
}
else { $sql_comprobar = 0; }
if($type == 0) { $img_type = 'style="background-image: url(//static.up-cdn.com/roleplay/web/images/vehicles/Vehicle_'.$id_veh.'.jpg"'; $tpo = 'Vehiculo'; }
else if($type == 1){ $img_type = 'style="background-image: url(//sundaysamp.com/images/products/houses.png);"'; $tpo = 'Casa'; } 
else if($type == 2){ $img_type = 'style="background-image: url(//sundaysamp.com/images/products/locals.png);"'; $tpo = 'Local'; } 
else if($type == 3){ $img_type = '';} 
else if($type == 4){ $img_type = 'style="background-image: url(//sundaysamp.com/images/products/coins.png);"'; $tpo = 'Coins'; }
else if($type == 5){ $img_type = 'style="background-image: url(http://files.prineside.com/gtasa_samp_model_id/blue/'.$id_objet.'_b.jpg);"'; $tpo = 'Objeto'; }
$segundos = strtotime($time_expire) - strtotime($factual);
?>
<?php
$submit = $_POST['duki'];
if($submit)
{
				if($type == 0) { /// VEHICHULOS
				if($segundos > 0) {
				if($corov > 0 && mysqli_num_rows($sql_comprobar) > 0) {
				if($cuentabancaria > 0) {
				if($platabanco > $precio) {
				$db_name_autos = 'qugpkuvl_autos'; mysqli_select_db($db_name_autos, $conectSAMP);	
				$query = mysqli_query($conectSAMP,"SELECT * FROM PLAYER_VEHICLES WHERE ID_USER = '$ID'"); $vehnum = mysqli_num_rows($query); if($lvlvip == 0){ $autod = 2; } else { $autod = 6; }
				mysqli_select_db($nombre_db, $conectSAMP);
				if($autod > $vehnum)
				{
				$sql_update = mysqli_query($conectSAMP,"UPDATE PERSONAJE SET CASH=CASH-$precio WHERE ID_USER='$ID'");
				$sql_update = mysqli_query($conectSAMP,"UPDATE PERSONAJE SET CASH=CASH+$precio WHERE ID_USER='$IDVENDEDOR'");
				$db_name_autos = 'qugpkuvl_autos'; mysqli_select_db($db_name_autos, $conectSAMP);
				$sql_update = mysqli_query($conectSAMP,"UPDATE PLAYER_VEHICLES SET ID_USER=$ID WHERE ID='$id2'");
				$sql_update = mysqli_query($conectSAMP,"UPDATE PLAYER_VEHICLES SET PROPIETARIO='$name' WHERE ID='$id2'");
				mysqli_select_db($nombre_db, $conectSAMP);
				$sql_delete = mysqli_query($conectSAMP,"DELETE FROM `MERCADITO` WHERE ID_AD = $ad_id");
				$sql_check = mysqli_query($conectSAMP,"SELECT * FROM MERCADITO_VENTAS WHERE NAME = '$vendedor'"); if(mysqli_num_rows($sql_check) > 0) { $sql_update = mysqli_query($conectSAMP,"UPDATE MERCADITO_VENTAS SET VENTAS=VENTAS+1 WHERE NAME = '$vendedor'"); } else { $sql_insert = mysqli_query($conectSAMP,"INSERT INTO `MERCADITO_VENTAS`(`NAME`) VALUES ('$vendedor')"); }
				$sql_insert = mysqli_query($conectSAMP,"INSERT INTO `MERCADITO_LOG`(`VENDEDOR`, `COMPRADOR`, `TYPE`, `CANTIDAD`, `ID_VEH`, `PRECIO`) VALUES ('$vendedor','$name','$type','$cantidad','$id_veh','$precio')");
				$action_queue = mysqli_query($conectSAMP,"INSERT INTO `action_queue`(`status`, `user_ses`, `jugname`, `queue_params`, `type`, `VentaNombre`, `id_user`, `id_coche`) VALUES ('0', '$name', '$vendedor', '$precio$', '2', '$name_item', '$ID', '$vehiculo_id')");
				echo '<div class="alert alert-success"><strong>¡Felicitaciones!</strong> ¡Compraste un <strong>Vehiculo</strong> tipo <strong>'.$name_item.'</strong> (ID: '.$id2.') por <strong>$ '.$precio.'</strong>!</div> ';
				}
				else { echo '<div class="alert alert-error">Error con tu membresia no puedes comprar mas de <strong>'.$autod.'</strong> vehiculos</div>'; } }
				else { echo '<div class="alert alert-error">Fondos insuficientes</div> '; } } else { echo '<div class="alert alert-error">Error necesitas cuenta bancaria para pagar este articulo</div> '; } }
				else { echo '<div class="alert alert-error">El anuncio no existe o el jugador ya no tiene el item ofrecido</div> '; } }
				else { echo '<div class="alert alert-error">El anuncio El anuncio ya caduco</div> '; } }
				else if($type == 1) { ////CASAS
				if($segundos > 0) {
				if($corov > 0 && mysqli_num_rows($sql_comprobar) > 0)
				{
				if($cuentabancaria > 0)
				{
				if($platabanco > $precio)
				{
				$query = mysqli_query($conectSAMP,"SELECT * FROM PROPERTY_OWNER WHERE ID_USER = '$ID'"); $vehnum = mysqli_num_rows($query); if($lvlvip == 0){ $autod = 1; } else { $autod = 4; }
				if($autod > $vehnum)
				{					
				$sql_update = mysqli_query($conectSAMP,"UPDATE PERSONAJE SET CASH=CASH-$precio WHERE ID_USER='$ID'");
				$sql_update = mysqli_query($conectSAMP,"UPDATE PERSONAJE SET CASH=CASH+$precio WHERE ID_USER='$IDVENDEDOR'");
				$sql_update = mysqli_query($conectSAMP,"UPDATE PROPERTY_OWNER SET ID_USER=$ID WHERE ID_PROPERTY='$id2'");
				$sql_delete = mysqli_query($conectSAMP,"DELETE FROM `MERCADITO` WHERE ID_AD = $ad_id");
				$query_c = mysqli_query($conectSAMP,"SELECT * FROM PROPERTY WHERE ID_PROPERTY = '$id2'");  while ($rr=mysqli_fetch_array($query_c)) { $id3 = $rr['CASA_ID']; }
				$action_queue = mysqli_query($conectSAMP,"INSERT INTO action_queue (`user_ses`, `jugname`, `faccj`, `id_coche`, `type`, `status`, `ID_DB`) VALUES ('$name', '$vendedor', '$id3', '$precio', '8', '1', '$ID')");
				$sql_check = mysqli_query($conectSAMP,"SELECT * FROM MERCADITO_VENTAS WHERE NAME = '$vendedor'"); if(mysqli_num_rows($sql_check) > 0) { $sql_update = mysqli_query($conectSAMP,"UPDATE MERCADITO_VENTAS SET VENTAS=VENTAS+1 WHERE NAME = '$vendedor'"); } else { $sql_insert = mysqli_query($conectSAMP,"INSERT INTO `MERCADITO_VENTAS`(`NAME`) VALUES ('$vendedor')"); }
				$sql_insert = mysqli_query($conectSAMP,"INSERT INTO `MERCADITO_LOG`(`VENDEDOR`, `COMPRADOR`, `TYPE`, `PRECIO`) VALUES ('$vendedor','$name','$type','$precio')");
				echo '<div class="alert alert-success"><strong>¡Felicitaciones!</strong> ¡Compraste una <strong>Propiedad</strong> (ID: '.$id2.') por <strong>$ '.$precio.'</strong>!</div> ';
				}
				else { echo '<div class="alert alert-error">Error con tu membresia no puedes comprar mas de <strong>'.$autod.'<strong> propiedades</div> '; } }
				else { echo '<div class="alert alert-error">Fondos insuficientes</div> '; } } else { echo '<div class="alert alert-error">Error necesitas cuenta bancaria para pagar este articulo</div> '; } }
				else { echo '<div class="alert alert-error">El anuncio no existe o el jugador ya no tiene el item ofrecido</div> '; } }
				else { echo '<div class="alert alert-error">El anuncio El anuncio ya caduco</div> '; } }
				/*if($type == 2) {
				$sql_update = mysqli_query($conectSAMP,"UPDATE PERSONAJE SET CASH=CASH-$precio WHERE ID_USER='$ID'");
				$sql_update = mysqli_query($conectSAMP,"UPDATE PERSONAJE SET CASH=CASH+$precio WHERE ID_USER='$IDVENDEDOR'");
				$sql_update = mysqli_query($conectSAMP,"UPDATE PROPERTY_OWNER SET ID_USER=$ID WHERE ID_USER='$IDVENDEDOR'");
				$sql_delete = mysqli_query($conectSAMP,"DELETE FROM `MERCADITO` WHERE ID_AD = $ad_id");
				$sql_insert = mysqli_query($conectSAMP,"");
				$action_queue = mysqli_query($conectSAMP,"");
				}
				if($type == 3) {
				$sql_update = mysqli_query($conectSAMP,"UPDATE PERSONAJE SET CASH=CASH-$precio WHERE ID_USER='$ID'");
				$sql_update = mysqli_query($conectSAMP,"UPDATE PERSONAJE SET CASH=CASH+$precio WHERE ID_USER='$IDVENDEDOR'");
				$sql_delete = mysqli_query($conectSAMP,"DELETE FROM `MERCADITO` WHERE ID_AD = $ad_id");
				$sql_insert = mysqli_query($conectSAMP,"");
				$action_queue = mysqli_query($conectSAMP,"");
				}*/
				else if($type == 4) { //// COINS
				if($Horas > 6)
				{
				if($segundos > 0) {
				if($corov > 0 && mysqli_num_rows($sql_comprobar) > 0)
				{
				if($cuentabancaria > 0)
				{
				if($platabanco > $precio)
				{
				$sql_update = mysqli_query($conectSAMP,"UPDATE PERSONAJE SET CASH=CASH-$precio WHERE ID_USER='$ID'");
				$sql_update = mysqli_query($conectSAMP,"UPDATE PERSONAJE SET CASH=CASH+$precio WHERE ID_USER='$IDVENDEDOR'");
				$sql_update = mysqli_query($conectSAMP,"UPDATE CUENTA SET SD=SD+$cantidad WHERE NAME='$name'");
				$sql_update = mysqli_query($conectSAMP,"UPDATE CUENTA SET SD=SD-$cantidad WHERE NAME='$vendedor'");
				$sql_delete = mysqli_query($conectSAMP,"DELETE FROM `MERCADITO` WHERE ID_AD = $ad_id");
				$sql_check = mysqli_query($conectSAMP,"SELECT * FROM MERCADITO_VENTAS WHERE NAME = '$vendedor'"); if(mysqli_num_rows($sql_check) > 0) { $sql_update = mysqli_query($conectSAMP,"UPDATE MERCADITO_VENTAS SET VENTAS=VENTAS+1 WHERE NAME = '$vendedor'"); } else { $sql_insert = mysqli_query($conectSAMP,"INSERT INTO `MERCADITO_VENTAS`(`NAME`) VALUES ('$vendedor')"); }
				$sql_insert = mysqli_query($conectSAMP,"INSERT INTO `MERCADITO_LOG`(`VENDEDOR`, `COMPRADOR`, `TYPE`, `CANTIDAD`, `PRECIO`) VALUES ('$vendedor','$name','$type','$cantidad','$precio')");
				$action_queue = mysqli_query($conectSAMP,"INSERT INTO `action_queue`(`user_ses`, `jugname`, `queue_params`, `type`, `faccj`, `id_user`) VALUES ('$name', '$vendedor', '$$precio', '3', '$cantidad', '$ID')");
				echo '<div class="alert alert-success"><strong>¡Felicitaciones!</strong> ¡Compraste <strong>'.$cantidad.'</strong> coins (ID: '.$id2.') por <strong>$ '.$precio.'</strong>!</div>';
				}
				else { echo '<div class="alert alert-error">Fondos insuficientes</div> '; } } else { echo '<div class="alert alert-error">Error necesitas cuenta bancaria para pagar este articulo</div> '; } }
				else { echo '<div class="alert alert-error">El anuncio no existe o el jugador ya no tiene el item ofrecido</div> '; } }
				else { echo '<div class="alert alert-error">El anuncio El anuncio ya caduco</div> '; } }
				else { echo '<div class="alert alert-error">Necesitas al menos <strong>7</strong> horas de juego para enviar <strong>Coins</strong>.</div>'; } }
				else if($type == 5) { //// PRENDAS
				if($segundos > 0) {
				if($corov > 0 && mysqli_num_rows($sql_comprobar) > 0)
				{
				if($cuentabancaria > 0)
				{
				if($platabanco > $precio)
				{
				$query = mysqli_query($conectSAMP,"SELECT * FROM PLAYER_TOYS WHERE ID_USER = '$ID'"); $vehnum = mysqli_num_rows($query); if($lvlvip == 0){ $autod = 3; } else { $autod = 6; }
				if($autod > $vehnum)
				{
				$sql_update = mysqli_query($conectSAMP,"UPDATE PERSONAJE SET CASH=CASH-$precio WHERE ID_USER='$ID'");
				$sql_update = mysqli_query($conectSAMP,"UPDATE PERSONAJE SET CASH=CASH+$precio WHERE ID_USER='$IDVENDEDOR'");
				$sql_update = mysqli_query($conectSAMP,"UPDATE PLAYER_TOYS SET ID_USER=$ID WHERE ID_TOY='$id2'");
				$sql_delete = mysqli_query($conectSAMP,"DELETE FROM `MERCADITO` WHERE ID_AD = $ad_id");
				$sql_check = mysqli_query($conectSAMP,"SELECT * FROM MERCADITO_VENTAS WHERE NAME = '$vendedor'"); if(mysqli_num_rows($sql_check) > 0) { $sql_update = mysqli_query($conectSAMP,"UPDATE MERCADITO_VENTAS SET VENTAS=VENTAS+1 WHERE NAME = '$vendedor'"); } else { $sql_insert = mysqli_query($conectSAMP,"INSERT INTO `MERCADITO_VENTAS`(`NAME`) VALUES ('$vendedor')"); }
				$sql_insert = mysqli_query($conectSAMP,"INSERT INTO `MERCADITO_LOG`(`VENDEDOR`, `COMPRADOR`, `TYPE`, `CANTIDAD`, `MODELID`,`ID_OBJET`, `PRECIO`) VALUES ('$vendedor','$name','$type','$cantidad','$modelid','$id2','$precio')");
				$action_queue = mysqli_query($conectSAMP,"");
				echo '<div class="alert alert-success"><strong>¡Felicitaciones!</strong> ¡Compraste un <strong>Objeto</strong> tipo <strong>'.$name_item.'</strong> (ID: '.$id2.') por <strong>$ '.$precio.'</strong>!</div> ';
				}
				else { echo '<div class="alert alert-error">Error con tu membresia no puedes comprar mas de <strong>'.$autod.'<strong> objetos</div> '; } }
				else { echo '<div class="alert alert-error">Fondos insuficientes</div> '; } } else { echo '<div class="alert alert-error">Error necesitas cuenta bancaria para pagar este articulo</div> '; } }
				else { echo '<div class="alert alert-error">El anuncio no existe o el jugador ya no tiene el item ofrecido</div> '; } }
				else { echo '<div class="alert alert-error">El anuncio El anuncio ya caduco</div> '; } }
				/*else
{
echo '<div class="alert alert-error">El anuncio ya caduco</div> <div id="mercadito-single">';
}
		}	
*/

}
		
?>
<div id="mercadito-single">
<div class="mercadito-single-top">
<a href="<?php echo $url;?>anuncio?ad_id=<?php echo $ad_id;?>" style="display: inline-block;">
<div class="single-image item-img" <?php echo $img_type; ?>></div>
</a>
<div class="mercadito-auction">
<form id="mercadito-buy" method="POST" class="is-not-auction">
<div class="mercadito-auction-status">
<span class="live-time extended-time" data-time-init="<?php $segundos = strtotime($time_expire) - strtotime($factual); print $segundos; ?>"><span class="mercadito-time-hours"><?php $hours = floor($segundos/3600); echo substr($hours, 0, 2);?></span><span class="mercadito-time-minutes"><?php $min = floor(($segundos-($hours*3600))/60); echo $min;?></span><span class="mercadito-time-seconds"><?php $seg = $segundos-($hours*3600)-($min*60); echo $seg;?></span></span> <script>
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
<div class="mercadito-auction-final">
<div class="mercadito-auction-price-final">
$<?php echo number_format($precio, 0, '', ','); ?></span>
</div>
<input onclick="return confirm( '¿Seguro que desea proceder a comprarlo?' );" type="submit" class="mercadito-edit-bet" value="Comprar" name="duki"></input>
</div>
</form>
</div>
</div>
<div class="mercadito-product-details">
<div class="mercadito-field-container">
<div class="mercadito-label">Vendo</div>
<div class="mercadito-field">
<?php echo $tpo; ?> </div>
</div>
<div class="mercadito-field-container">
<div class="mercadito-label">Tipo</div>
<div class="mercadito-field">
<?php echo $name_item; ?> </div>
</div>
<div class="mercadito-field-container">
<div class="mercadito-label">ID: <?php echo $id2;?></div>
<?php if($type == 0){ ?>
<div class="mercadito-field">
- Expira en <?php echo $expire_h;?>d <?php echo $expire_h;?>h<br /></div>
<?php } ?>
</div>
<div class="mercadito-field-container">
<div class="mercadito-label">Vendedor</div>
<div class="mercadito-field user-profile-single">
<a class="user-profile" target="_blank" href="<?php echo $urlperfilvendedor; ?>"><?php echo $vendedor; ?></a>
</div>
</div>
<div style="text-align: center;display: inline-block;width: 100%;">
<br />
<?php if($type == 1) {?>
<iframe class="map-iframe" src="<?php echo $url;?>mapa/?house_id=<?php echo $id2;?>"></iframe>
<?php }?>
<br />
</div>
</div>
</div>
</div>
</div>
<?php } else { ?>
<div class="alert alert-error">El anuncio que buscas ya no existe o no tienes permisos para verlo.</div> </div>
</div>
<?php } ?>
<style>
	footer {
		display: inline-block;
		width: 100%;
		float: left;
	}

	.footer-social > a {
		font-family: 'Source Sans Pro', sans-serif;
		font-weight: 400;
		margin-top: 17px;
		margin-right: 20px;
		position: relative;
		display: inline-block;
		font-size: 13px;
		color: #0088cc;
		text-decoration: none;
	}
	.footer-social > a:hover {
		text-decoration: underline;
	}
	.footer-social {
	color: #FFF;
	display: inline-block;
	float: right;
}
	.footer-social > .social-prefix {
		font-family: 'Source Sans Pro', sans-serif;
		font-weight: 400;
		font-size: 12px;
		color: #CACACA;
		text-shadow: 1px 1px #000;
		line-height: 53px;
		display: inline-block;
		vertical-align: top;
		margin-right: 5px;
	}
	.footer-social > .social-icons {
		display: inline-block;
		vertical-align: top;
	}
		.footer-social > .social-icons > a {
			display: inline-block;
			vertical-align: top;
			width: 40px;
			height: 40px;
			margin-top: 7px;
			float: left;
			transition: background-position 0.3s ease;
			-webkit-transition: background-position 0.3s ease;
		}
		.footer-social > .social-icons > a.facebook {
			background-position: top left;
			margin-right: 5px;
		}
			.footer-social > .social-icons > a.facebook:hover {
				background-position: bottom left;
			}
		.footer-social > .social-icons > a.twitter {
			background-position: right top;
		}
			.footer-social > .social-icons > a.twitter:hover {
				background-position: bottom right;
			}

.footer-top {
	text-align: center;
	background-color: #274863;
	color: #FFF;
	font-family: 'Source Sans Pro', sans-serif;
	height: 340px;
	font-size: 17px;
	min-height: 340px;
}
	.footer-top > .online {
			display: block;
			height: 200px;
			width: 100%;
			padding: 0 0 10px 0;
			background-color: rgba( 0,0,0,0.3 );
		}
			.footer-top > .online > section > section {
				display: inline-block;
				width: 50%;
				float: left;
				margin: 15px 0;
				box-sizing: border-box;
			}

			.footer-top > .online > section > section > section {
				display: block;
				margin: 0 auto;
				width: 260px;
			}

			.footer-top > .online > section > .samp > .server > .status {
				color : #FF8B2D;
				font-size: 14px;
				text-align: left;

				line-height: 30px;
				width: 400px;
				margin: 0 auto;
			}
				.footer-top > .online > section > .samp > .server > .status > span {
					color: white;
					float: right;
				}

			.footer-top > .online > section > .minecraft > .server > .status {
				color : #00B16A;
				text-align: left;
				font-size: 14px;
				line-height: 30px;
				width: 400px;
				margin: 0 auto;
			}
				.footer-top > .online > section > section > .server > .offline {
					color: red;
				}

				.footer-top > .online > section > .minecraft > .server > .status > span {
					color: white;
					float: right;
				}
			.footer-top > .online > section > .minecraft > .server > #players-minecraft > img {
				margin: 20px auto;
				display: block;
			}

		.footer-top> .about {
			overflow: auto;
			padding-top: 10px;
		}

		.footer-top> .about > section > div {
			width: 50%;
			float: left;
		}


		.footer-top> .about > section > .left-side {
			color: white;
			text-align: justify;
			font-size: 13px;
		}


		.footer-top> .about > section > .right-side {
			padding: 25px 0;
		}

		.footer-top> .about > section > .right-side > .mobile-title {
			color: white;
			text-align: center;
		}

		.footer-top> .about > section > .right-side > .mobile-apps-list {
			margin: 10px auto;
			overflow: auto;
		}

		.footer-top> .about > section > .right-side > .mobile-apps-list > a {
			width: 50%;
			float: left;
			display: inline-block;
			margin: 0 !important;
		}
			.footer-top> .about > section > .right-side > .mobile-apps-list > a > img {
				margin: 0 auto;
				display: block;
			}

		#players-samp > ul,
		#players-minecraft > ul {
			border: 1px solid #A5A5A5;
			text-align: left;
			height: 140px;
			width: 400px;
			box-sizing: border-box;
			display: inline-block;
			overflow-y: scroll;
			background-color: #F7F7F7;
			padding: 3px 20px 3px 10px;
			margin: 0;
			font-size: 13px;
		}
	.footer-container {
		min-width: 1000px;
		float: left;
		display: inline-block;
		/*background-color: #343434;*/
		/*background-image: url(../images/nieve-2.png);*/
		background-position: 0 -7px;
		background-repeat: repeat-x;
		background-color: #181818;
		height: 53px;
		width: 100%;
		/*padding-bottom: 45px;*/
	}
		.footer-container .dieam-copyright {
			text-shadow: 1px 1px #000;
			color: #B4B4B4;
			display: inline-block;
			float: left;
			font-size: 13px;
			line-height: 53px;
			font-family: 'Source Sans Pro', sans-serif;
			font-weight: 400;
		}
	#mobile-apps-list {
		margin-top: 20px;
	}

	#samp-players {
		display: inline-block;	
	}
		#samp-players ul {
			border: 1px solid #A5A5A5;
			text-align: left;
			height: 140px;
			width: 230px;
			display: inline-block;
			overflow-y:scroll;
			background-color: #F7F7F7;
			padding: 3px 20px 3px 10px;
			margin: 0;
		}
			#samp-players ul li {
				font-size: 12px;
				height: 17px;
				line-height: 17px;
				list-style-type: none;
				display: inline-block;
				width: 100%;
				float: left;
				color: #2088BD;
				font-style: italic;
			}
			#samp-players ul li:hover {
			}
			#samp-players ul li.odd {
				/*background-color: #FFF;
				color: #515151;*/
			}
			#samp-players ul li.even {
				/*background-color: #CECECE;
				color: #6F8FA2;*/
			}
</style>
<?php include_once('../footer.php'); ?>
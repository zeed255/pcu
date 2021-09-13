<?php

error_reporting(0);
include_once 'includes/config.php';
include_once 'includes/user.php';
include_once 'includes/user_session.php'; 

$userSession = new UserSession();
$user = new User();

$action = $_GET['action'];

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
		$moneda = $cuentaemail['Coins'];
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
<title><?php if(empty($action) || $action == 'historial'){ echo "Historial de Coins";} else if ($action == 'samp'){ echo "Comprar Coins SAMP";} else if($action == 'enviar'){ echo "Enviar Coins"; } ?> - FamPlayer</title>
<script type="text/javascript" src="./recursos/a"></script><script src="./js/sPBVRXAtp3w2yttQJ-Hg4ScSgKw.js"></script><script src="./js/wCMSvT-Z7kHfL9-Pea42AY1tOwg.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $url;?>favicon.ico">
<script id="js-inline" type="text/javascript">
				window.GLOBAL = {"LANG":{"form":{"errors_occurred":"Ocurrieron varios errores","error_occurred":"Ocurri\u00f3 un error","error_no_net_title":"Sin Conexi\u00f3n a Internet","error_no_net_body":"Por favor compruebe su conexi\u00f3n a internet e intente de nuevo.","request_sent":"Petici\u00f3n enviada","close":"Cerrar","error_request":"Ocurri\u00f3 un error procesando su solicitud, por favor intente m\u00e1s tarde."},"time":{"just":"ahora","now":"mismo","now_seen":"Ahora mismo","ago":"hace","yesterday":"Ayer","at":"a las","a":["un","un"],"min":["min","mins"],"minute":["minuto","minutos"],"hr":["hr","hrs"],"hour":["hora","horas"],"sec":["seg","segs"],"second":["segundo","segundos"],"week":["semana","semanas"],"day":["d\u00eda","d\u00edas"],"month":["mes","meses"],"year":["a\u00f1o","a\u00f1os"],"months":[["base.january_long","base.february_long","base.march_long","base.april_long","Mayo","base.june_long","base.july_long","base.august_long","base.september_long","base.october_long","base.november_long","base.december_long"],["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dec"]]}},"AJAX_URL":"<?php echo $ajaxurl; ?>","URI":"<?php echo $url; ?>","USER_HASH":"da7254d9f97a392b4f97c7d04e09ec63d2e43f2e","IMAGES_URL":"https:\/\/site-static.up-cdn.com\/images\/","IS_MOBILE":false,"SCHEME":"unplayer"};le = new function(){ this.arr = [], this.l = function(c){ this.arr.push( c ); }; }; (function(){var css = document.createElement('link');
					css.id = 'css-base';
					css.type = 'text/css';
					css.rel = 'stylesheet';
					css.href = '<?php echo $url;?>css/bf3b4127/base.css';
					document.getElementsByTagName('head')[0].appendChild( css )})();
</script><link id="css-base" type="text/css" rel="stylesheet" href="<?php echo $url ?>css/base.css">
<script id="js-jquery" async="" type="text/javascript" src="<?php echo $url;?>js/jquery.min.js"></script>
<script id="js-base" async="" type="text/javascript" src="<?php echo $url;?>/js/base.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/bootstrap.min.css" /> 
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/base.css?v=2.2.45" />
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>jquery.rollbar.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/fontawesome-all.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/styles.css" />
<script src="./js/14945.js" type="text/javascript">
</script><script src="./js/756e706c617965722e636f6d_0.js" type="text/javascript">
</script><script src="./js/042f04110413042504400446044f07df07e00422.js">
</script>
</head>
<body id="site" class="module-page parent-home child-view page-home full-width non-logged user-desktop" browser-os="win" browser-name="browser-chrome"><script async="" src="./js/analytics.js"></script>
<?php include_once('vistas/header.php'); ?>
<div id="web">
<div id="page-content">
<?php if(empty($action) || $action == 'historial') { ?>
<div id="coins-tabs-container" class="tabs-container-default-top tabs-container tab-items-4">
<div class="tabs-menu-container-default-top tabs-menu-container coins-tab-container">
<div class="tabs-menu-wrapper-default-top tabs-menu-wrapper coins-tab-wrapper">
<ul id="coins-tabs" class="tabs-menu-default-top tabs-menu-parent tabs-menu coins-tab" data-tab-content-id="coins-content" data-tab-container-id="coins-tabs-container" data-tab="coins">

<li class="tab-item-container-default-top item-name-historial parent-item <?php if(empty($action) || $action == 'historial') { ?>active<?php } ?> uri" data-tab-action="coins/historial" data-tab-is-external="0"><a class="tab-item-default-top local-uri" href="<?php echo $url;?>coins/historial" data-tab-action="coins/historial" data-tab-is-external="0"><span class="text">Historial</span></a></li>
<li class="tab-item-container-default-top item-name-comprar parent-item <?php if($action == 'comprar') { ?>active<?php } ?> uri" data-tab-action="coins/comprar" data-tab-is-external="0"><a class="tab-item-default-top local-uri" href="<?php echo $url;?>coins/comprar" data-tab-action="coins/comprar" data-tab-is-external="0"><span class="text">Comprar Coins</span></a></li>
<li class="tab-item-container-default-top item-name-samp parent-item <?php if($action == 'samp') { ?>active<?php } ?> uri" data-tab-action="coins/samp" data-tab-is-external="0"><a class="tab-item-default-top local-uri" href="<?php echo $url;?>coins/samp" data-tab-action="coins/samp" data-tab-is-external="0"><span class="text">Comprar Coins SAMP</span></a></li>
<li class="tab-item-container-default-top item-name-enviar parent-item <?php if($action == 'enviar') { ?>active<?php } ?> uri" data-tab-action="coins/enviar" data-tab-is-external="0"><a class="tab-item-default-top local-uri tab-item-default-top-last" href="<?php echo $url;?>coins/enviar" data-tab-action="coins/enviar" data-tab-is-external="0"><span class="text">Enviar Coins</span></a></li> </ul>
</div>
</div>
<div id="coins-content" class="tab-content-default-top tab-content">
<div class="page base-size">
<h5>Tienes: <span style="color: #0F8209;"><?php echo $moneda;?> FP (coins)</span></h5>
<h4>Registro de transacciones</h4>
<h3><i>No se han encontrado transacciones.</i></h3>
</div>
</div></div>
<?php } else if ($action == 'samp') { ?>
<div id="coins-tabs-container" class="tabs-container-default-top tabs-container tab-items-4">
<div class="tabs-menu-container-default-top tabs-menu-container coins-tab-container">
<div class="tabs-menu-wrapper-default-top tabs-menu-wrapper coins-tab-wrapper">
<ul id="coins-tabs" class="tabs-menu-default-top tabs-menu-parent tabs-menu coins-tab" data-tab-content-id="coins-content" data-tab-container-id="coins-tabs-container" data-tab="coins">
<li class="tab-item-container-default-top item-name-historial parent-item <?php if(empty($action) || $action == 'historial') { ?>active<?php } ?> uri" data-tab-action="coins/historial" data-tab-is-external="0"><a class="tab-item-default-top local-uri" href="<?php echo $url;?>coins/historial" data-tab-action="coins/historial" data-tab-is-external="0"><span class="text">Historial</span></a></li>
<li class="tab-item-container-default-top item-name-comprar parent-item <?php if($action == 'comprar') { ?>active<?php } ?> uri" data-tab-action="coins/comprar" data-tab-is-external="0"><a class="tab-item-default-top local-uri" href="<?php echo $url;?>coins/comprar" data-tab-action="coins/comprar" data-tab-is-external="0"><span class="text">Comprar Coins</span></a></li>
<li class="tab-item-container-default-top item-name-samp parent-item <?php if($action == 'samp') { ?>active<?php } ?> uri" data-tab-action="coins/samp" data-tab-is-external="0"><a class="tab-item-default-top local-uri" href="<?php echo $url;?>coins/samp" data-tab-action="coins/samp" data-tab-is-external="0"><span class="text">Comprar Coins SAMP</span></a></li>
<li class="tab-item-container-default-top item-name-enviar parent-item <?php if($action == 'enviar') { ?>active<?php } ?> uri" data-tab-action="coins/enviar" data-tab-is-external="0"><a class="tab-item-default-top local-uri tab-item-default-top-last" href="<?php echo $url;?>coins/enviar" data-tab-action="coins/enviar" data-tab-is-external="0"><span class="text">Enviar Coins</span></a></li> </ul>
</div>
</div>
<div class="well">
<form style="text-align: center;" method="POST">
<fieldset>
<h3>Comprar Coins con dinero de SA:MP</h3>
<?php 
$lzbuy = $_POST['coins'];
if($lzbuy == 1){ $costolz = 20000; $clz = 1; }
else if($lzbuy == 2){ $costolz = 40000; $clz = 2; }
else if($lzbuy == 3){ $costolz = 60000; $clz = 3; }
else if($lzbuy == 4){ $costolz = 80000; $clz = 4; }
else if($lzbuy == 5){ $costolz = 100000; $clz = 5; }
else if($lzbuy == 6){ $costolz = 120000; $clz = 6; }
else if($lzbuy == 7){ $costolz = 140000; $clz = 7; }
else if($lzbuy == 8){ $costolz = 160000; $clz = 8; }
else if($lzbuy == 9){ $costolz = 180000; $clz = 9; }
else if($lzbuy == 10){ $costolz = 200000; $clz = 10; }
else if($lzbuy == 11){ $costolz = 220000; $clz = 11; }
else if($lzbuy == 12){ $costolz = 240000; $clz = 12; }
else if($lzbuy == 13){ $costolz = 260000; $clz = 13; }
else if($lzbuy == 14){ $costolz = 280000; $clz = 14; }
else if($lzbuy == 15){ $costolz = 300000; $clz = 15; }
else if($lzbuy == 16){ $costolz = 320000; $clz = 16; }
else if($lzbuy == 17){ $costolz = 340000; $clz = 17; }
else if($lzbuy == 18){ $costolz = 360000; $clz = 18; }
else if($lzbuy == 19){ $costolz = 380000; $clz = 19; }
else if($lzbuy == 20){ $costolz = 400000; $clz = 20; }
else if($lzbuy < 0 || $lzbuy > 20){ $costolz = 99;}
$h = $clz*50000;

if($_POST['buycoins'])
{
	if($platabanco >= $h)
	{
		if($costolz == 99){ return 0; }
		$sql_update = $user->connect()->prepare('UPDATE CUENTA SET SD=SD+:clz WHERE NAME = :name;');$sql_update->execute(['name' => $name, 'clz' => $clz]);
		
		$sql_update = $user->connect()->prepare('UPDATE BANK_ACCOUNTS SET BALANCE=BALANCE-:h WHERE ID_USER = :ID;');$sql_update->execute(['h' => $h, 'ID' => $ID]);
		echo '<div class="alert alert-success">Acabas de comprar <strong>'.$clz.' Coins</strong> por <strong>$'.$h.'.</div>';
	}
	else { echo '<div class="alert alert-error">No tiene suficientes fondos en su cuenta bancaria para comprar <strong>'.$clz.' FP Coins ($'.$h.')</strong>.</div>'; }
}
?>
<div class="control-group" style="margin: 0">
<h5>Tu dinero actual del banco: <span style="color: #0F8209;">$<?php echo $platabanco;?></span></h5>
<label class="control-label" for="coins">Seleccione la cantidad de FP (coins) que desea comprar</label>
<div class="controls">
<select style="height: 30px;margin-top: 10px;" id="coins" name="coins" placeholder="FP (coins)">
<option value="1">1 FP por $50000</option>
<option value="2">2 FP por $100000</option>
<option value="3">3 FP por $150000</option>
<option value="4">4 FP por $200000</option>
<option value="5">5 FP por $250000</option>
<option value="6">6 FP por $300000</option>
<option value="7">7 FP por $350000</option>
<option value="8">8 FP por $400000</option>
<option value="9">9 FP por $450000</option>
<option value="10">10 FP por $500000</option>
<option value="11">11 FP por $550000</option>
<option value="12">12 FP por $600000</option>
<option value="13">13 FP por $650000</option>
<option value="14">14 FP por $700000</option>
<option value="15">15 FP por $750000</option>
<option value="16">16 FP por $800000</option>
<option value="17">17 FP por $850000</option>
<option value="18">18 FP por $900000</option>
<option value="19">19 FP por $950000</option>
<option value="20">20 FP por $1000000</option>
</select>
</div>
</div>
<div class="control-group">
<div class="controls">
<br />
<input type="submit" name="buycoins" class="btn-ex btn-ex-success" value="Comprar Coins"></input>
<br />
<br />
</div>
</div>
<div class="alert alert-info">* AutomÃ¡ticamente se agregarÃ¡n a su cuenta las coins luego de la transacciÃ³n.</div>
</fieldset>
</form>
</div>
</div>
</div></div>
<?php } else if ($action == 'enviar') {?>
<div id="coins-tabs-container" class="tabs-container-default-top tabs-container tab-items-4">
<div class="tabs-menu-container-default-top tabs-menu-container coins-tab-container">
<div class="tabs-menu-wrapper-default-top tabs-menu-wrapper coins-tab-wrapper">
<ul id="coins-tabs" class="tabs-menu-default-top tabs-menu-parent tabs-menu coins-tab" data-tab-content-id="coins-content" data-tab-container-id="coins-tabs-container" data-tab="coins">

<li class="tab-item-container-default-top item-name-historial parent-item <?php if(empty($action) || $action == 'historial') { ?>active<?php } ?> uri" data-tab-action="coins/historial" data-tab-is-external="0"><a class="tab-item-default-top local-uri" href="<?php echo $url;?>coins/historial" data-tab-action="coins/historial" data-tab-is-external="0"><span class="text">Historial</span></a></li>
<li class="tab-item-container-default-top item-name-comprar parent-item <?php if($action == 'comprar') { ?>active<?php } ?> uri" data-tab-action="coins/comprar" data-tab-is-external="0"><a class="tab-item-default-top local-uri" href="<?php echo $url;?>coins/comprar" data-tab-action="coins/comprar" data-tab-is-external="0"><span class="text">Comprar Coins</span></a></li>
<li class="tab-item-container-default-top item-name-samp parent-item <?php if($action == 'samp') { ?>active<?php } ?> uri" data-tab-action="coins/samp" data-tab-is-external="0"><a class="tab-item-default-top local-uri" href="<?php echo $url;?>coins/samp" data-tab-action="coins/samp" data-tab-is-external="0"><span class="text">Comprar Coins SAMP</span></a></li>
<li class="tab-item-container-default-top item-name-enviar parent-item <?php if($action == 'enviar') { ?>active<?php } ?> uri" data-tab-action="coins/enviar" data-tab-is-external="0"><a class="tab-item-default-top local-uri tab-item-default-top-last" href="<?php echo $url;?>coins/enviar" data-tab-action="coins/enviar" data-tab-is-external="0"><span class="text">Enviar Coins</span></a></li> </ul>
</div>
</div>
<form style="text-align: center;" method="POST">
<fieldset>
<h3>Enviar coins a un usuario</h3>
<?php 
$namerecibe = $_POST['name'];
$coinsend = $_POST['coins'];

if($_POST['sendlz'])
{
	if($Horas > 6)
	{
	if($coinsend > 0 && $coinsend <= 100)
	{		
		if($moneda >= $coinsend)
		{
			$query = $user->connect()->prepare('SELECT * FROM CUENTA WHERE NAME = :namerecibe');
			$query->execute(['namerecibe' => $namerecibe]);
			if(mysqli_num_rows($query) > 0)
			{
			$sql_update = $user->connect()->prepare('UPDATE CUENTA SET SD=SD+:coinsend WHERE NAME= :namerecibe;');
			$sql_update->execute(['namerecibe' => $namerecibe, 'coinsend' => $coinsend]);
			$sql_update = $user->connect()->prepare('UPDATE CUENTA SET SD=SD-:coinsend WHERE NAME= :name;');
			$sql_update->execute(['name' => $name, 'coinsend' => $coinsend]);
			echo '<div class="alert alert-success">Acabas de mandarle <strong>'.$coinsend.' Coins</strong> a <strong>'.$namerecibe.'.</div>';
			}
else
{
echo '<div class="alert alert-error">No se encontro el usuario <strong>'.$namerecibe.'</strong> en la base de datos.</div>';
}
		}
else
{
echo '<div class="alert alert-error">No tienes la cantidad de Coins que deseas enviar.</div>';
}
	}
else	
{
	echo '<div class="alert alert-error">Cantidad de coins inválida. El número de coins a enviar debe estar comprendido entre 1 y 100.</div>';
}
}
else	
{
	echo '<div class="alert alert-error">Necesitas al menos <strong>7</strong> horas de juego para enviar <strong>Coins</strong>.</div>';
}
}		
?>

<div class="control-group" style="margin: 0">
<h5>Tienes actualmente: <span style="color: #0F8209;"><?php echo $moneda;?> FP</span></h5>
<label class="control-label" for="name">Nombre del usuario (en la web) al que desea enviar:</label>
<div class="controls">
<input style="height: 28px;padding: 0 5px;" type="text" id="name" name="name" placeholder="Nombre de usuario" value="" />
</div>
<br />
<label class="control-label" for="coins">Ingrese la cantidad de FP (coins) que desea enviar:</label>
<div class="controls">
<input style="height: 28px;padding: 0 5px;" type="text" id="coins" name="coins" placeholder="FP (coins) a enviar" value="" />
</div>
</div>
<div class="control-group">
<div class="controls">
<br />
<input type="submit" name="sendlz" class="btn-ex btn-ex-success" value="Enviar" />
<br />
<br />
</div>
</div>
<div class="alert alert-info">* Tenga en cuenta que <?php echo $nombresv;?> no se hace responsable de perdida de coins y robo de cuentas.</div>
</fieldset>
</form>
</div>
</div></div>
<?php } else {?>
<div id="error-page">
<div class="info-block">
<h3><strong>404</strong> No Encontrado</h3>
<p class="description">La pÃ¡gina que estaba buscando parece que ha sido eliminada, movida o no existe.</p>
<p class="return">Ir a <a class="local-uri" href="https://unplayer.com">Inicio</a></p>
</div>
</div>
<div id="inline-copyright">&copy; 2021 <?php echo $nombresv;?></div> </div>
</div>
<?php } ?>
</div>
</div>
<?php include_once('vistas/footer.php'); ?>
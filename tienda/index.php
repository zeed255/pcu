<?php include_once '../includes/config.php';  $url_ac = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; if($url_ac == 'http://'.$_SERVER['HTTP_HOST'].$url2.'/tienda') { header('location: http://'.$_SERVER['HTTP_HOST'].$url2.'/tienda/'); } ?>
<?php

/*------------------------------------*/
include_once '../includes/user.php';
include_once '../includes/user_session.php';
include_once '../includes/config.php';

$userSession = new UserSession();
$user = new User();
/*------------------------------------*/

if(isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($_SESSION['username']) && !empty($_SESSION['username']))
{ 
    $useremail = $_SESSION['user'];
	$username = $_SESSION['username'];

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

else header('location: ../login');
if($numerotlf == 0){
	$numerodetelefono == "No tiene";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="user-scalable=no, width=device-width">
	<!--<base href="<?php echo $url; ?>">--><base href=".">
	<title>Tienda - <?php echo $nombresv;?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<script src="/cdn-cgi/apps/head/sPBVRXAtp3w2yttQJ-Hg4ScSgKw.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $url;?>favicon.ico">
	<script src="<?php echo $url;?>js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/bootstrap.min.css" /> 
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/base.css?v=2.2.45" />
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>jquery.rollbar.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/fontawesome-all.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/styles.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/shop.css" />
	<meta name="viewport" content="width=device-width">
</head>
<?php include_once('../vistas/header.php');?>
<div class="page base-size">
<div class="page-container">
<?php include_once('../vistas/panel-menu.php');?>

<div id="panel-menu-sub">
<div class="navbar-inner">
<ul class="nav">
<li class="active"><a href="#"><span class="line-over"></span><span class="text-over"><span class="line-bottom"></span><i class="fa fa-shopping-cart"></i> SAMP</span></a></li>
<li><a href="ver.php?product_id=13"><span class="line-over"></span><span class="text-over"><span class="line-bottom"></span><i class="fa fa-briefcase"></i> Objetos</span></a></li>
<li><a href="#"><span class="line-over"></span><span class="text-over"><span class="line-bottom"></span><i class="fa fa-car"></i> Vehículos<span></a></li>
<li><a href="ver.php?product_id=14"><span class="line-over"></span><span class="text-over"><span class="line-bottom"></span><i class="fa fa-car"></i> Vehículos VIP</span></a></li>
</ul>
</div>
</div>
</div>
<div style="background-color: #FFFFFF" class="well">
<h3 class="welcome">¡Bienvenidos a la <a href="#">tienda</a> de SAMP!</h3>
<div class="slider-block">
<div class="sliders">
<div class="slider-points">
<div class=""></div>
<div class=""></div>
<div class="active"></div>
</div>
<div class="slider" style="display: none;">
<a href="<?php echo $url_tienda; ?>ver.php?product_id=14">
<img class="slider-image" src="./tienda_files/1.png" alt="Imagen del slider">
<div class="slider-name">
<div>Tropic</div>
</div>
<div class="slider-description" style="left: 0px;">
<span></span>
<div>¡Este bote ya está disponible en la tienda!</div>
</div>
</a>
</div>
<div class="slider" style="display: none;">
<a href="<?php echo $url_tienda; ?>ver.php?product_id=14">
<img class="slider-image" src="./tienda_files/2.png" alt="Imagen del slider">
<div class="slider-name">
<div>Hotring Racer</div>
</div>
<div class="slider-description" style="left: 0px;">
<span></span>
<div>¿Qué esperas para conducir un coche nascar?</div>
</div>
</a>
</div>
<div class="slider" style="display: block;">
<a href="<?php echo $url_tienda; ?>ver.php?product_id=14">
<img class="slider-image" src="./tienda_files/3.png" alt="Imagen del slider">
<div class="slider-name">
<div>Seasparrow</div>
</div>
<div class="slider-description" style="left: 0px;">
<span></span>
<div>Este helicóptero y más están disponibles</div>
</div>
</a>
</div>
</div>
<div class="products">
<div class="product right">
<a href="<?php echo $url;?>membresias">
<img src="./tienda_files/member.png" alt="Membresía VIP">
<div class="name">Membresía VIP</div>
</a>
</div>
<div class="product right">
<a href="<?php echo $url_tienda; ?>ver.php?product_id=14">
<img src="./tienda_files/carvip-icon.png" alt="Vehículos VIP">
<div class="name">Vehículos VIP</div>
</a>
</div>
<div class="product">
<a href="#">
<img src="./tienda_files/car.png" alt="Más vehículos">
<div class="name">Más vehículos</div>
</a>
</div>
<div class="product top right">
<a href="#">
<img src="./tienda_files/house.png" alt="Más casas">
<div class="name">Más casas</div>
</a>
</div>
<div class="product top right">
<a href="ver.php?product_id=13">
<img src="./tienda_files/object.png" alt="Objetos">
<div class="name">Objetos</div>
</a>
</div>
<div class="product top">
<a href="#">
<img src="./tienda_files/respawn.png" alt="Respawn">
<div class="name">Respawn</div>
</a>
</div>
<div class="product top right">
<a href="./productos.php">
<img src="./tienda_files/more.png" alt="Más artículos">
<div class="name">Más artículos</div>
</a>
</div>
</div>
</div>
<div class="ad-block">

</div>
<div class="help-container">
<div class="left">
<img src="./tienda_files/help-money.png" alt="Coin">
<div class="help-text">
<span class="help-text-top">PREGUNTAS Y RESPUESTAS</span>
<h4>¿Qué es un COIN?</h4>
<p>COIN, es una moneda virtual creada para comprar cosas únicas, como coches, artículos, rangos, canales en el Teamspeak, cambio de nombre entre otras muchas cosas.</p>
<div>$1 equivale a 1 COIN</div>
</div>
</div>
<div class="right">
<div class="help-text">
<span class="help-text-top">PREGUNTAS Y RESPUESTAS</span>
<h4>¿Cómo ganar COINs?</h4>
<p>Puedes ganar COINs, en los concursos que realizan los administradores o también con los referidos, mientras más referidos mayor será tu ganancia de COINs.</p>
<div>1 referido equivale a 2 COINS</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include_once('../vistas/footer.php');?>
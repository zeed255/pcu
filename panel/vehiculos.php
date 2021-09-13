<?php
include_once '../includes/user.php';
include_once '../includes/user_session.php';
include_once '../includes/config.php';
include_once '../includes/geoiploc.php';

$userSession = new UserSession();
$user = new User();

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
?>
<?php 
function GetVehicleName($idveh)
  {
    if($idveh == 400){ return "Landstalker"; }
    else if($idveh == 401){ return "Bravura"; }
    else if($idveh == 402){ return "Buffalo"; }
    else if($idveh == 403){ return "Linerunner"; }
    else if($idveh == 404){ return "Perenniel"; }
    else if($idveh == 405){ return "Sentinel"; }
    else if($idveh == 406){ return "Dumper"; }
    else if($idveh == 407){ return "Firetruck"; }
    else if($idveh == 408){ return "Trashmaster"; }
    else if($idveh == 409){ return "Stretch"; }
    else if($idveh == 410){ return "Manana"; }
    else if($idveh == 411){ return "Infernus"; }
    else if($idveh == 412){ return "Voodoo"; }
    else if($idveh == 413){ return "Pony"; }
    else if($idveh == 414){ return "Mule"; }
    else if($idveh == 415){ return "Cheetah"; }
    else if($idveh == 416){ return "Ambulancia"; }
    else if($idveh == 417){ return "Leviathan"; }
    else if($idveh == 418){ return "Moonbeam"; }
    else if($idveh == 419){ return "Esperanto"; }
    else if($idveh == 420){ return "Taxi"; }
    else if($idveh == 421){ return "Washington"; }
    else if($idveh == 422){ return "Bobcat"; }
    else if($idveh == 423){ return "MrWhoopee"; }
    else if($idveh == 424){ return "BFInjection"; }
    else if($idveh == 425){ return "Hunter"; }
    else if($idveh == 426){ return "Premier"; }
    else if($idveh == 427){ return "Enforcer"; }
    else if($idveh == 428){ return "Securicar"; }
    else if($idveh == 429){ return "Banshee"; }
    else if($idveh == 430){ return "Predator"; }
    else if($idveh == 431){ return "Bus"; }
    else if($idveh == 432){ return "Rhino"; }
    else if($idveh == 433){ return "Barracks"; }
    else if($idveh == 434){ return "Hotknife"; }
    else if($idveh == 435){ return "+Trailer"; }
    else if($idveh == 436){ return "Previon"; }
    else if($idveh == 437){ return "Coach"; }
    else if($idveh == 438){ return "Cabbie"; }
    else if($idveh == 439){ return "Stallion"; }
    else if($idveh == 440){ return "Rumpo"; }
    else if($idveh == 441){ return "RCBandit"; }
    else if($idveh == 442){ return "Romero"; }
    else if($idveh == 443){ return "Packer"; }
    else if($idveh == 444){ return "Monster"; }
    else if($idveh == 445){ return "Admiral"; }
    else if($idveh == 446){ return "Squalo"; }
    else if($idveh == 447){ return "Seasparrow"; }
    else if($idveh == 448){ return "Pizzaboy"; }
    else if($idveh == 449){ return "Tram"; }
    else if($idveh == 450){ return "+Trailer"; }
    else if($idveh == 451){ return "Turismo"; }
    else if($idveh == 452){ return "Speeder"; }
    else if($idveh == 453){ return "Reefer"; }
    else if($idveh == 454){ return "Tropic"; }
    else if($idveh == 455){ return "Flatbed"; }
    else if($idveh == 456){ return "Yankee"; }
    else if($idveh == 457){ return "Caddy"; }
    else if($idveh == 458){ return "Solair"; }
    else if($idveh == 459){ return "TopfunVan"; }
    else if($idveh == 460){ return "Skimmer"; }
    else if($idveh == 461){ return "PCJ-600"; }
    else if($idveh == 462){ return "Faggio"; }
    else if($idveh == 463){ return "Freeway"; }
    else if($idveh == 464){ return "RCBaron"; }
    else if($idveh == 465){ return "RCRaider"; }
    else if($idveh == 466){ return "Glendale"; }
    else if($idveh == 467){ return "Oceanic"; }
    else if($idveh == 468){ return "Sanchez"; }
    else if($idveh == 469){ return "Sparrow"; }
    else if($idveh == 470){ return "Patroit"; }
    else if($idveh == 471){ return "Quad"; }
    else if($idveh == 472){ return "Coastguard"; }
    else if($idveh == 473){ return "Dinghy"; }
    else if($idveh == 474){ return "Hermes"; }
    else if($idveh == 475){ return "Sabre"; }
    else if($idveh == 476){ return "Rustler"; }
    else if($idveh == 477){ return "ZR-350"; }
    else if($idveh == 478){ return "Walton"; }
    else if($idveh == 479){ return "Regina"; }
    else if($idveh == 480){ return "Comet"; }
    else if($idveh == 481){ return "BMX"; }
    else if($idveh == 482){ return "Burrito"; }
    else if($idveh == 483){ return "Camper"; }
    else if($idveh == 484){ return "Marquis"; }
    else if($idveh == 485){ return "Baggage"; }
    else if($idveh == 486){ return "Dozer"; }
    else if($idveh == 487){ return "Maverik"; }
    else if($idveh == 488){ return "HeliNews"; }
    else if($idveh == 489){ return "Rancher"; }
    else if($idveh == 490){ return "FBIRancher"; }
    else if($idveh == 491){ return "Virgo"; }
    else if($idveh == 492){ return "Greenwood"; }
    else if($idveh == 493){ return "Jetmax"; }
    else if($idveh == 494){ return "H.R."; }
    else if($idveh == 495){ return "Sandking"; }
    else if($idveh == 496){ return "Blista C."; }
    else if($idveh == 497){ return "P. Maverik"; }
    else if($idveh == 498){ return "Boxville"; }
    else if($idveh == 499){ return "Benson"; }
    else if($idveh == 500){ return "Mesa"; }
    else if($idveh == 501){ return "RCGoblin"; }
    else if($idveh == 502){ return "H.R."; }
    else if($idveh == 503){ return "H.R."; }
    else if($idveh == 504){ return "B.B."; }
    else if($idveh == 505){ return "Rancher"; }
    else if($idveh == 506){ return "SuperGT"; }
    else if($idveh == 507){ return "Elegant"; }
    else if($idveh == 508){ return "Journey"; }
    else if($idveh == 509){ return "Bike"; }
    else if($idveh == 510){ return "M.Bike"; }
    else if($idveh == 511){ return "Beagle"; }
    else if($idveh == 512){ return "Cropduster"; }
    else if($idveh == 513){ return "Stuntplane"; }
    else if($idveh == 514){ return "Tanker"; }
    else if($idveh == 515){ return "Roadtrain"; }
    else if($idveh == 516){ return "Nebula"; }
    else if($idveh == 517){ return "Majestic"; }
    else if($idveh == 518){ return "Buccaneer"; }
    else if($idveh == 519){ return "Shamal"; }
    else if($idveh == 520){ return "Hydra"; }
    else if($idveh == 521){ return "FCR-900"; }
    else if($idveh == 522){ return "NRG-500"; }
    else if($idveh == 523){ return "HPV1000"; }
    else if($idveh == 524){ return "C.Truck"; }
    else if($idveh == 525){ return "Towtruck"; }
	else if($idveh == 526){ return "Fortune"; }
    else if($idveh == 527){ return "Cadrona"; }
    else if($idveh == 528){ return "FBITruck"; }
    else if($idveh == 529){ return "Willard"; }
    else if($idveh == 530){ return "Forklift"; }
    else if($idveh == 531){ return "Tractor"; }
    else if($idveh == 532){ return "C.Harvester"; }
    else if($idveh == 533){ return "Feltzer"; }
    else if($idveh == 534){ return "Remington"; }
    else if($idveh == 535){ return "Slamvan"; }
    else if($idveh == 536){ return "Blade"; }
    else if($idveh == 537){ return "Freight"; }
    else if($idveh == 538){ return "Brownstreak"; }
    else if($idveh == 539){ return "Vortex"; }
    else if($idveh == 540){ return "Vincent"; }
    else if($idveh == 541){ return "Bullet"; }
    else if($idveh == 542){ return "Clover"; }
    else if($idveh == 543){ return "Sadler"; }
    else if($idveh == 544){ return "Firetruck"; }
    else if($idveh == 545){ return "Hustler"; }
    else if($idveh == 546){ return "Intruder"; }
    else if($idveh == 547){ return "Primo"; }
    else if($idveh == 548){ return "Cargobob"; }
    else if($idveh == 549){ return "Tampa"; }
    else if($idveh == 550){ return "Sunrise"; }
    else if($idveh == 551){ return "Merit"; }
    else if($idveh == 552){ return "UtilityVan"; }
    else if($idveh == 553){ return "Nevada"; }
    else if($idveh == 554){ return "Yosemite"; }
    else if($idveh == 555){ return "Windsor"; }
    else if($idveh == 556){ return "MonsterT1"; }
    else if($idveh == 557){ return "MonsterT2"; }
    else if($idveh == 558){ return "Uranus"; }
    else if($idveh == 559){ return "Jester"; }
    else if($idveh == 560){ return "Sultan"; }
    else if($idveh == 561){ return "Stratum"; }
    else if($idveh == 562){ return "Elegy"; }
    else if($idveh == 563){ return "Raindance"; }
    else if($idveh == 564){ return "RCTiger"; }
    else if($idveh == 565){ return "Flash"; }
    else if($idveh == 566){ return "Tahoma"; }
    else if($idveh == 567){ return "Savanna"; }
    else if($idveh == 568){ return "Bandito"; }
    else if($idveh == 569){ return "+Train"; }
    else if($idveh == 570){ return "+Train"; }
    else if($idveh == 571){ return "Kart"; }
    else if($idveh == 572){ return "Mower"; }
    else if($idveh == 573){ return "Dune"; }
    else if($idveh == 574){ return "Sweepeer"; }
    else if($idveh == 575){ return "Broadway"; }
    else if($idveh == 576){ return "Tornado"; }
    else if($idveh == 577){ return "AT400"; }
    else if($idveh == 578){ return "DFT-30"; }
    else if($idveh == 579){ return "Huntley"; }
    else if($idveh == 580){ return "Stafford"; }
    else if($idveh == 581){ return "BF-400"; }
    else if($idveh == 582){ return "Newsvan"; }
    else if($idveh == 583){ return "Tug"; }
    else if($idveh == 584){ return "+Trailer"; }
    else if($idveh == 585){ return "Emperor"; }
    else if($idveh == 586){ return "Wayfarer"; }
    else if($idveh == 587){ return "Euros"; }
    else if($idveh == 588){ return "Hotdog"; }
    else if($idveh == 589){ return "Club"; }
    else if($idveh == 590){ return "+Train"; }
    else if($idveh == 591){ return "+Trailer"; }
    else if($idveh == 592){ return "Andromada"; }
    else if($idveh == 593){ return "Dodo"; }
    else if($idveh == 594){ return "RCCam"; }
    else if($idveh == 595){ return "Launch"; }
    else if($idveh == 596){ return "LSPD"; }
    else if($idveh == 597){ return "SFPD"; }
    else if($idveh == 598){ return "LVPD"; }
    else if($idveh == 599){ return "Ranger"; }
    else if($idveh == 600){ return "Picador"; }
    else if($idveh == 601){ return "S.W.A.T."; }
    else if($idveh == 602){ return "Alpha"; }
    else if($idveh == 603){ return "Phoenix"; }
    else if($idveh == 604){ return "Glendale"; }
    else if($idveh == 605){ return "Sadler"; }
    else if($idveh == 606){ return "+Trailer"; }
    else if($idveh == 607){ return "+Trailer"; }
    else if($idveh == 608){ return "+Trailer"; }
    else if($idveh == 609){ return "Boxville"; }
    else if($idveh == 610){ return "+Trailer"; }
    else if($idveh == 611){ return "+Trailer"; }
    else { return "Unknow"; }
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Vehículos - San Andreas Roleplay</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
<script src="/cdn-cgi/apps/head/sPBVRXAtp3w2yttQJ-Hg4ScSgKw.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $url;?>favicon.ico">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/bootstrap.min.css" /> 
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/base.css?v=2.2.45" />
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>jquery.rollbar.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/fontawesome-all.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/styles.css" />
<meta name="viewport" content="width=device-width">
</head>
<body>
<?php include_once('../vistas/header.php'); ?>
<div class="page base-size">
<div class="page-container">
<?php include_once('../vistas/panel-menu.php');?>

<div id="panel-menu-sub">
<div class="navbar-inner">
<ul class="nav">
<li class="active"><a href="#"><span class="line-over"></span><span class="text-over"><span class="line-bottom"></span><i class="fa fa-car"></i> Mis Vehículos</span></a></li>
<li><a href="<?php echo $url;?>panel/historial-vehiculos"><span class="line-over"></span><span class="text-over"><span class="line-bottom"></span><i class="fa fa-history"></i> Historial</span></a></li>
</ul>
</div>
</div>
</div>
<div style="background-color: #FFFFFF" class="well">
<?php 
if(isset($_POST['vehicleid'])){$vehicleid = $_POST['vehicleid'];}
if(isset($_POST['submit']))
{
}
	
?>
<?php if($contarvehiculos == 0) { ?>
<h5><i>No tienes vehículos.</i></h5>
</div>
<?php } else { ?>
<h4>Usted tiene <?php echo $contarvehiculos; echo " "; if($contarvehiculos == 1){ echo "vehículo";} else { echo "vehículos";}?>.</h4>
<table class="table table-bordered table-hover">
<tr>
<th>ID:</th>
<th>Modelo</th>
<th>Expira</th>
<th>Renovar</th>
</tr>
<?php while($infoauto = $query6->fetch(PDO::FETCH_ASSOC)) { $precioexpire = 4000+$infoauto['Modelo']; $preciototal = $precioexpire+3000;?>
<tr>
<td><?php echo $infoauto['ID']; ?></td>
<td style="text-align: center;">
<div><strong><?php echo GetVehicleName($infoauto['Modelo']); ?></strong></div>
<img src="<?php echo $url.'img/vehicles/'.$infoauto['Modelo'];?>.png" />
</td>
<td>Nunca</td>
<td>
<form method="POST">
<div class="field-value totals">
<div class="total"><span class="amount-name">Recarga:</span> <span class="amount">$3000</span></div>
<div class="total"><span class="amount-name">Vehículo:</span> <span class="amount">$<?php echo $precioexpire;?></span></div>
<div class="line"></div>
<div class="total"><span class="amount-name">Total:</span> <span class="amount">$<?php echo $preciototal;?></span></div>
</div>
<br />
<div class="info-data">
<label for="money" class="field-info">Pagar con:</label>
<select id="money" name="money" style="width: 100%;">
<option value="bank">$<?php echo $platabanco;?> (Banco)</option>
<option value="money">$<?php echo $money;?> (Efectivo)</option>
</select>
</div>
<div>
<input type="hidden" value="<?php echo $infoauto['ID'];?>" name="vehicleid" />
<input style="margin-top: 13px;width: 100%;" class="btn btn-success" type="submit" onclick="return confirm('¿Seguro que deseas renovar el vehículo?');" name="submit" value="Renovar"></input>
</form>
</td>
</tr>
<?php } }?>
</table>
</div>
</div>
</div>
<?php include_once('../vistas/footer.php');?>
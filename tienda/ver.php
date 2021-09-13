<?php

/*------------------------------------*/
include_once '../includes/user.php';
include_once '../includes/user_session.php';
include_once '../includes/config.php';
include_once '../seg.php';

$userSession = new UserSession();
$user = new User();
/*------------------------------------*/

$product = $_GET['product_id'];

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
		$email = $useremail;
		$score = $cuenta['Nivel'];
		$exp = $cuenta['Experiencia'];
		$lvlvip = $cuenta['VIP'];
		$expvip = $cuenta['CaducaVIP'];
		$ultimac = $cuenta['UltimaConexion'];
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
	
	/*Cuenta */$querye = $user->connect()->prepare('SELECT * FROM pcu_email WHERE Email = :useremail');
	$querye->execute(['useremail' => $useremail]);
	
    while($cuentaemail = $querye->fetch(PDO::FETCH_ASSOC))
    {
		$moneda = $cuentaemail['Coins'];
	}
}
else header('location: ../login');
if($numerotlf == 0){
	$numerodetelefono == "No tiene";
}
?>
<?php 
function ObtenerPrecioAuto($i)
	{
		switch($i)
		{
			case 411: $precioauto = 25; return $precioauto; case 470: $precioauto = 50; return $precioauto; 			
			case 429: $precioauto = 20; return $precioauto; case 541: $precioauto = 50; return $precioauto; 			
			case 437: $precioauto = 30; return $precioauto; case 495: $precioauto = 50; return $precioauto; 
			case 444: $precioauto = 80; return $precioauto; case 519: $precioauto = 40; return $precioauto; 			
			case 451: $precioauto = 20; return $precioauto; case 579: $precioauto = 30; return $precioauto; 			
			case 468: $precioauto = 30; return $precioauto; case 580: $precioauto = 30; return $precioauto; 			
			case 522: $precioauto = 30; return $precioauto; /*case 486: $precioauto = 10; return $precioauto;*/ 
			case 494: $precioauto = 40; return $precioauto; /*case 498: $precioauto = 5; return $precioauto;*/		
			case 502: $precioauto = 40; return $precioauto; /*case 512: $precioauto = 10; return $precioauto;*/	
			case 503: $precioauto = 40; return $precioauto; /*case 519: $precioauto = 10; return $precioauto;*/			
			case 487: $precioauto = 50; return $precioauto; /*case 531: $precioauto = 5; return $precioauto;*/
			case 593: $precioauto = 50; return $precioauto; /*case 577: $precioauto = 30; return $precioauto;*/			
		}	
	}


	
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
  
  function SacarEspacioMaletero($modelo){
	switch($modelo){
		case 400:	return 5;
		case 401:	return 4;
		case 402:	return 4;
		case 403:	return 8;
		case 404:	return 4;
		case 405:	return 4;
		case 407:	return 8;				//Bomberos
		case 408:	return 8;				//Basurero
		case 409:	return 8;				//Limosina
		case 410:	return 4;
		case 411:	return 4;				//Infernus 20FZ
		case 412:	return 4;
		case 413:	return 8;
		case 414:	return 10;
		case 415:	return 2;
		case 416:	return 8;				//Ambulancia
		case 418:	return 4;
		case 419:	return 4;
		case 420:	return 4;				//Taxi
		case 421:	return 4;
		case 422:	return 8;
		case 426:	return 4;
		case 428:	return 8;
		case 429:	return 4;
		case 436:	return 4;
		case 438:	return 4;				//Taxi
		case 439:	return 4;
		case 440:	return 8;
		case 442:	return 4;				//Romero
		case 445:	return 4;
		case 451:	return 2;
		case 456:	return 8;
		case 458:	return 4;
		case 459:	return 8;
		case 461:	return 0;
		case 462:	return 0;
		case 463:	return 2;
		case 466:	return 4;
		case 467:	return 4;
		case 468:	return 0;
		case 474:	return 4;
		case 475:	return 4;
		case 477:	return 4;
		case 478:	return 6;
		case 479:	return 4;
		case 480:	return 4;
		case 482:	return 8;
		case 483:	return 6;
		case 487:	return 4;
		case 489:	return 6;
		case 491:	return 4;
		case 492:	return 4;
		case 496:	return 4;
		case 498:	return 8;
		case 499:	return 8;
		case 500:	return 4;
		case 505:	return 6;
		case 506:	return 2;
		case 507:	return 4;
		case 508:	return 8;
		case 509:	return 0;
		case 510:	return 0;
		case 514:	return 8;
		case 515:	return 8;
		case 516:	return 4;
		case 517:	return 4;
		case 518:	return 4;
		case 525:	return 4;
		case 521:	return 1;
		case 522:	return 1;
		case 526:	return 4;
		case 527:	return 4;
		case 529:	return 4;
		case 533:	return 4;
		case 534:	return 4;
		case 535:	return 4;
		case 536:	return 4;
		case 540:	return 4;
		case 541:	return 4;
		case 542:	return 4;
		case 543:	return 6;
		case 545:	return 4;
		case 546:	return 4;
		case 547:	return 4;
		case 549:	return 4;
		case 550:	return 4;
		case 551:	return 4;
		case 554:	return 8;
		case 555:	return 4;
		case 558:	return 4;
		case 559:	return 4;
		case 560:	return 4;
		case 561:	return 4;
		case 562:	return 4;
		case 565:	return 4;
		case 566:	return 4;
		case 567:	return 4;
		case 575:	return 4;
		case 576:	return 4;
		case 578:	return 8;
		case 579:	return 8;
		case 580:	return 4;
		case 581:	return 0;
		case 585:	return 4;
		case 586:	return 2;
		case 587:	return 4;
		case 589:	return 4;
		case 600:	return 4;
		case 601:	return 4;
		case 603:	return 4;
		default:	return 4;
	}
}
function SacarEspacioGuantera($modelo){
	switch($modelo){
		case 400:	return 3;
		case 401:	return 2;
		case 402:	return 3;
		case 403:	return 4;
		case 404:	return 2;
		case 405:	return 2;
		case 407:	return 4;				//Bomberos
		case 408:	return 4;				//Basurero
		case 409:	return 4;				//Limosina
		case 410:	return 4;
		case 411:	return 2;				//Infernus 20FZ
		case 412:	return 2;
		case 413:	return 4;
		case 414:	return 4;
		case 415:	return 2;
		case 416:	return 4;				//Ambulancia
		case 418:	return 3;
		case 419:	return 3;
		case 420:	return 3;				//Taxi
		case 421:	return 3;
		case 422:	return 4;
		case 426:	return 3;
		case 428:	return 4;
		case 429:	return 3;
		case 436:	return 3;
		case 438:	return 3;				//Taxi
		case 439:	return 3;
		case 440:	return 3;
		case 442:	return 3;				//Romero
		case 445:	return 3;
		case 451:	return 2;
		case 456:	return 4;
		case 458:	return 4;
		case 459:	return 4;
		case 461:	return 0;
		case 462:	return 0;
		case 463:	return 2;
		case 466:	return 3;
		case 467:	return 3;
		case 468:	return 0;
		case 474:	return 3;
		case 475:	return 3;
		case 477:	return 3;
		case 478:	return 4;
		case 479:	return 3;
		case 480:	return 3;
		case 482:	return 4;
		case 483:	return 3;
		case 487:	return 3;
		case 489:	return 4;
		case 491:	return 3;
		case 492:	return 3;
		case 496:	return 3;
		case 498:	return 4;
		case 499:	return 4;
		case 500:	return 3;
		case 505:	return 3;
		case 506:	return 2;
		case 507:	return 3;
		case 508:	return 4;
		case 509:	return 0;
		case 510:	return 0;
		case 514:	return 4;
		case 515:	return 4;
		case 516:	return 3;
		case 517:	return 3;
		case 518:	return 3;
		case 525:	return 3;
		case 521:	return 0;
		case 522:	return 0;
		case 526:	return 3;
		case 527:	return 3;
		case 529:	return 3;
		case 533:	return 3;
		case 534:	return 3;
		case 535:	return 3;
		case 536:	return 3;
		case 540:	return 3;
		case 541:	return 3;
		case 542:	return 3;
		case 543:	return 4;
		case 545:	return 3;
		case 546:	return 3;
		case 547:	return 3;
		case 549:	return 3;
		case 550:	return 3;
		case 551:	return 3;
		case 554:	return 4;
		case 555:	return 3;
		case 558:	return 3;
		case 559:	return 3;
		case 560:	return 3;
		case 561:	return 3;
		case 562:	return 3;
		case 565:	return 3;
		case 566:	return 3;
		case 567:	return 3;
		case 575:	return 3;
		case 576:	return 3;
		case 578:	return 4;
		case 579:	return 4;
		case 580:	return 3;
		case 581:	return 0;
		case 585:	return 3;
		case 586:	return 2;
		case 587:	return 3;
		case 589:	return 3;
		case 600:	return 3;
		case 601:	return 3;
		case 603:	return 3;
		default:	return 3;
	}
}

?>
<?php
function randomText($length) { 

    $pattern = "QWRTYUIOPASDFGHJKLZXCVBNM"; 

    for($i = 0; $i < $length; $i++) { 

        $key = $pattern[rand(0, 24)]; 

    } 

    return $key; 

}  
?>
<!DOCTYPE html>
<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="user-scalable=no, width=device-width">
<!--<base href="<?php echo $url; ?>">--><base href=".">
<title>Vehículos VIP - <?php echo $nombresv;?></title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
<script src="/cdn-cgi/apps/head/sPBVRXAtp3w2yttQJ-Hg4ScSgKw.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $url;?>favicon.ico">
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/base.css?v=2.2.45" />
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/styles.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/shop.css?v=2.2.45" />
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/product.css?v=2.2.45" />
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/fontawesome-all.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/jquery.rollbar.css" />
<meta name="viewport" content="width=device-width">
<script id="js-jquery" async="" type="text/javascript" src="<?php echo $url;?>js/jquery.min.js"></script>
<script id="js-base" async="" type="text/javascript" src="<?php echo $url;?>/js/base.js"></script>
<style type="text/css">
			.product {
				padding: 10px;
			}
		</style>
</head>
<body>
<?php include_once('../vistas/header.php');?>
<div class="page base-size">
<div class="page-container">
<?php include_once('../vistas/panel-menu.php');?>

<div id="panel-menu-sub">
<div class="navbar-inner">
<ul class="nav">
<li ><a href="#"><span class="line-over"></span><span class="text-over"><span class="line-bottom"></span><i class="fa fa-shopping-cart"></i> SAMP</span></a></li>
<li <?php if($product == 13){ echo 'class="active"';} ?> ><a href="ver.php?product_id=13"><span class="line-over"></span><span class="text-over"><span class="line-bottom"></span><i class="fa fa-briefcase"></i> Objetos</span></a></li>
<li <?php if($product == 15){ echo 'class="active"';} ?> ><a href="ver.php?product_id=15"><span class="line-over"></span><span class="text-over"><span class="line-bottom"></span><i class="fa fa-car"></i> Vehículos<span></a></li>
<li <?php if($product == 14){ echo 'class="active"';} ?> ><a href="ver.php?product_id=14"><span class="line-over"></span><span class="text-over"><span class="line-bottom"></span><i class="fa fa-car"></i> Vehículos VIP</span></a></li>
</ul>
</div>
</div>
</div>
<div style="background-color: #FFFFFF" class="well">
<div id="product-custom">
<?php if($product == 14){
if(!isset($_POST['amount'])){$_POST['amount']=411;}
$idauto = $_POST['amount'];
$patente = rand(111,999)."".randomText(3);

$pos = array("-1459.1365, -517.1169, 14.0093","-1451.2421, -551.0054, 14.0067","-1444.2704, -508.0429, 14.0093","-1459.6008, -531.3398, 14.0065","-1427.9497, -507.0284, 14.0051","-1417.4207, -522.9914, 14.0095","-1410.0581, -538.4122, 14.0035");
$rand = rand(0,6);

if(isset($_POST['submit']))
{	
	if($idauto == 411 || $idauto == 429 || $idauto == 437 || $idauto == 444 || $idauto == 451 || $idauto == 468 || $idauto == 522 || $idauto == 494 || $idauto == 502 || $idauto == 503 || $idauto == 593 || $idauto == 470 || $idauto == 541 || $idauto == 495 || $idauto == 519 || $idauto == 579 || $idauto == 498 || $idauto == 580) 
	{
		$query = $user->connect()->prepare('SELECT * FROM pcu_vehiculos WHERE Propietario = :username');$query->execute(['username' => $username]); $vehnum = $query->rowCount(); if($lvlvip == 0){ $autod = 2; } else { $autod = 6; } 
		
			$maletero = SacarEspacioMaletero($idauto);
			$guantera = SacarEspacioGuantera($idauto);
			$usernombre = $username;
		if($autod > $vehnum)
		{
			if(ObtenerPrecioAuto($idauto) <= $moneda)
			{
				$querybuy = $user->connect()->prepare('INSERT INTO pcu_vehiculos (Modelo, Propietario, PosVehiculo, TipoVehiculo, SlotMaletero, SlotGuantera, Color0, Color1) VALUES (:idauto, :usernombre, "-1459.1365,-517.1169,14.0093,90.0", 1, :maletero, :guantera, 0, 0)');
				$querybuy->bindParam(':idauto', $idauto, PDO::PARAM_INT);
				$querybuy->bindParam(':usernombre', $usernombre, PDO::PARAM_STR);
				$querybuy->bindParam(':maletero', $maletero, PDO::PARAM_INT);
				$querybuy->bindParam(':guantera', $guantera, PDO::PARAM_INT);
				$querybuy->execute();
				$sql_update = $user->connect()->prepare('UPDATE pcu_email SET Coins=Coins-'.ObtenerPrecioAuto($idauto).' WHERE Email=:useremail');
				$sql_update->execute(['username' => $useremail]);
				echo '<div class="alert alert-success">Acabas de adquirir un vehiculo modelo <strong>'.GetVehicleName($idauto).'</strong> por <strong>'.ObtenerPrecioAuto($idauto).'</strong> Coins. </div>';
			}
			else
			{
				echo '<div class="alert alert-error">No tienes '.ObtenerPrecioAuto($idauto).' Coins para comprar este artículo! Usted tiene '.$moneda.' Coins..</div>';
			}
		}
		else
		{
			echo '<div class="alert alert-error">Con tu membresia no puedes tener mas de '.$autod.' vehiculos '.$idauto.'.</div>';
		}

	}		
	else
	{
		echo '<div class="alert alert-error">Tu codigo de seguridad expiro!</div>';
	}
}
?>	
<div id="product">                         
<img src="<?php echo $url;?>img/carvip.png" alt="Veh&iacute;culos VIP" />
<div class="product-info">
<h6>Veh&iacute;culos VIP</h6>
<div class="description">Compre veh&iacute;culos exclusivos VIP con coins.
<br />
<br />
<strong>IMPORTANTE:</strong><br />
Los veh&iacute;culos son &uacute;nicos en stock, podran ser re-vendidos al estado y recibir 100 coins a cambio.
</div>
<form class="shop-form" method="POST">
<input type="hidden" name="security_token" value="1514390727-f8cdee78eda8615c895273db6bc91977f34daf6c" /> <input type="hidden" name="unp_csrf" value="5a43c4c740811" />
<div class="fields-fields">
<div class="field-field">
<label class="label-label" for="amount">Seleccionar veh&iacute;culo</label>
<select class="input-input select-select" id="amount" name="amount">
<option value="411" <?php if($idauto == 411){echo"selected";}?>><?php echo GetVehicleName(411);?></option>
<option value="429" <?php if($idauto == 429){echo"selected";}?>><?php echo GetVehicleName(429);?></option>
<option value="437" <?php if($idauto == 437){echo"selected";}?>><?php echo GetVehicleName(437);?></option>
<option value="444" <?php if($idauto == 444){echo"selected";}?>><?php echo GetVehicleName(444);?></option>
<option value="451" <?php if($idauto == 451){echo"selected";}?>><?php echo GetVehicleName(451);?></option>
<option value="468" <?php if($idauto == 468){echo"selected";}?>><?php echo GetVehicleName(468);?></option>
<option value="522" <?php if($idauto == 522){echo"selected";}?>><?php echo GetVehicleName(522);?></option>
<option value="494" <?php if($idauto == 494){echo"selected";}?>><?php echo GetVehicleName(494);?></option>
<option value="502" <?php if($idauto == 502){echo"selected";}?>><?php echo GetVehicleName(502);?></option>
<option value="503" <?php if($idauto == 503){echo"selected";}?>><?php echo GetVehicleName(503);?></option>
<option value="487" <?php if($idauto == 487){echo"selected";}?>><?php echo GetVehicleName(487);?></option>
<option value="593" <?php if($idauto == 593){echo"selected";}?>><?php echo GetVehicleName(593);?></option>
<option value="470" <?php if($idauto == 470){echo"selected";}?>><?php echo GetVehicleName(470);?></option>
<option value="541" <?php if($idauto == 541){echo"selected";}?>><?php echo GetVehicleName(541);?></option>
<option value="495" <?php if($idauto == 495){echo"selected";}?>><?php echo GetVehicleName(495);?></option>
<option value="519" <?php if($idauto == 519){echo"selected";}?>><?php echo GetVehicleName(519);?></option>
<option value="579" <?php if($idauto == 579){echo"selected";}?>><?php echo GetVehicleName(579);?></option>
<option value="580" <?php if($idauto == 580){echo"selected";}?>><?php echo GetVehicleName(580);?></option>
</select>
</div>
</div>
 <div style="text-align: right;">
<button class="btn btn-success" type="submit" name="submit" value="submit">Procesar compra <i class="fa fa-shopping-cart"></i></button>
</div>
</form>
</div>
<script type="text/javascript">
				window.stock_data = {"411":{"count":<?php echo ObtenerPrecioAuto(411);?>,"amount":20,"name":"<?php echo GetVehicleName(411);?>","stock":30},
				"429":{"count":<?php echo ObtenerPrecioAuto(429);?>,"amount":30,"name":"<?php echo GetVehicleName(429);?>","stock":15},
				"437":{"count":<?php echo ObtenerPrecioAuto(437);?>,"amount":65,"name":"<?php echo GetVehicleName(437);?>","stock":30},
				"444":{"count":<?php echo ObtenerPrecioAuto(444);?>,"amount":60,"name":"<?php echo GetVehicleName(444);?>","stock":30},
				"451":{"count":<?php echo ObtenerPrecioAuto(451);?>,"amount":50,"name":"<?php echo GetVehicleName(451);?>","stock":5},
				"468":{"count":<?php echo ObtenerPrecioAuto(468);?>,"amount":60,"name":"<?php echo GetVehicleName(468);?>","stock":30},
				"522":{"count":<?php echo ObtenerPrecioAuto(522);?>,"amount":50,"name":"<?php echo GetVehicleName(522);?>","stock":4},
				"494":{"count":<?php echo ObtenerPrecioAuto(494);?>,"amount":100,"name":"<?php echo GetVehicleName(494);?>","stock":26},
				"502":{"count":<?php echo ObtenerPrecioAuto(502);?>,"amount":65,"name":"<?php echo GetVehicleName(502);?>","stock":29},
				"503":{"count":<?php echo ObtenerPrecioAuto(503);?>,"amount":40,"name":"<?php echo GetVehicleName(503);?>","stock":30},
				"487":{"count":<?php echo ObtenerPrecioAuto(487);?>,"amount":30,"name":"<?php echo GetVehicleName(487);?>","stock":30},
				"593":{"count":<?php echo ObtenerPrecioAuto(593);?>,"amount":30,"name":"<?php echo GetVehicleName(593);?>","stock":30},
				"470":{"count":<?php echo ObtenerPrecioAuto(470);?>,"amount":23,"name":"<?php echo GetVehicleName(470);?>","stock":30},
				"541":{"count":<?php echo ObtenerPrecioAuto(541);?>,"amount":60,"name":"<?php echo GetVehicleName(541);?>","stock":5},
				"495":{"count":<?php echo ObtenerPrecioAuto(495);?>,"amount":50,"name":"<?php echo GetVehicleName(494);?>","stock":30},
				"519":{"count":<?php echo ObtenerPrecioAuto(519);?>,"amount":50,"name":"<?php echo GetVehicleName(519);?>","stock":11},
				"579":{"count":<?php echo ObtenerPrecioAuto(579);?>,"amount":30,"name":"<?php echo GetVehicleName(579);?>","stock":30},
				"580":{"count":<?php echo ObtenerPrecioAuto(580);?>,"amount":40,"name":"<?php echo GetVehicleName(580);?>","stock":30}};
				jQuery(document).ready(function(){
					$('#amount').change(function(){
						stock_temp = stock_data[$(this).val()];
						
						$('#vehicle_name').text( stock_temp.name );
						$('#vehicle_coin').text( stock_temp.amount );
						$('#vehicle_count').text( stock_temp.count );
						$('#vehicle_stock').text( stock_temp.stock );
						$('#vehicle_image').attr( 'src', '../img/vehicles/' + $(this).val() + '.png' );
					});
				});
			</script>
<div class="vehicle-preview">
<div class="vehicle" style="padding-right: 0;">
<div class="image">
<div class="name"><div class="bg"></div><span id="vehicle_name"><?php if(empty($idauto)){ echo "Infernus";} else{ echo GetVehicleName($idauto);}?></span></div>
<img id="vehicle_image" src="../img/vehicles/<?php if(empty($idauto)) {echo"411"; } else { echo"$idauto";}?>.png" alt="Euros">
</div>
</div>
<div class="right-columgn-vehicle">
<div class="block-left">
<div class="block-field">
<strong>Stock total:</strong><br /><span id="vehicle_count">30</span>
</div>
<div class="block-field">
<strong>Stock disponible:</strong><br /><span id="vehicle_stock">30</span>
</div>
<br />
<div class="block-field coins">
<strong><span id="vehicle_coin"><?php if(empty($idauto)){ echo "25";} else{  echo ObtenerPrecioAuto($idauto);}?></span> <img class="uc-coin" src="<?php $url ?>img/icon-uc.png" title="Coins" alt="Coins"></strong>
</div>
</div>
<div class="vehicle" style="padding-right: 0;">
<div class="image">

<img src="<?php echo $url;?>img/MAPG.png" alt="Mapa de recogida">
</div>
</div>
</div>
<br />
<br />
<div class="alert alert-info" style="display: inline-block;">
<strong>Información acerca de los <a href="./ver.php?product_id=14#">vehículos VIP</a>:</strong><br>
Los <a href="./ver.php?product_id=14#">vehículos VIP</a> no pueden ser dropeados o vendido a otro jugador mediante (<strong>/dar llaves</strong>), una vez comprado podrás renovarlo cada 7 días al igual que otro vehículo normal con un NFS, si el vehículo llega a vencer o vendes al estado mediante (<strong>/vender mi coche</strong>) perderás el vehículo completamente.
</div>
</div>
</div>
<?php } else {?>
<div class="alert alert-error">El artículo que buscas es inválido o no esta disponible en este momento.</div>
<?php } ?>
<style type="text/css">
				#vehicle_coin {
					font-size: 30px;
					display: inline-block;
					vertical-align: top;
				}
				.block-field.coins img {
					vertical-align: top;
				}
				.right-columgn-vehicle .block-left {
					border: solid 1px #DBDBDB;
					background-color: #FFF;
					position: absolute;
					top: 0;
					left: 226px;
					text-align: center;
					width: 214px;
					height: 139px;
				}
				#product {
					margin-left: 128px;
					width: 660px;
				}
				#product .product-info {
					width: 419px;
				}
				#product .product-info .shop-form .field-field .label-label {
					width: 240px;
				}
				.vehicle-preview > .vehicle {
					float: left;
					vertical-align: top;
					display: inline-block;
				}
				.right-columgn-vehicle > .vehicle {
					float: right;
				}
				.right-columgn-vehicle {
					width: 420px;
					vertical-align: top;
					display: inline-block;
					float: right;
				}
				.right-columgn-vehicle > div {
					vertical-align: top;
					display: inline-block;
					float: left;
				}
				.vehicle-preview {
					position: relative;
					display: inline-block;
					width: 100%;
					margin-top: 20px;
				}
				.vehicle {
					padding: 0 6px;
					text-align: center;
					width: 220px;
					display: inline-block;
					vertical-align: top;
					position: relative;
					margin-bottom: 15px;
				}
				.vehicle .name {
					position: absolute;
					top: 7px;
					left: 7px;
					width: 100%;
					font-family: 'Muli', sans-serif;
					font-weight: 400;
					width: 204px;
					height: 21px;
				}
					.vehicle .name span {
						display: inline-block;
						line-height: 21px;
						position: relative;
						z-index: 1;
						font-size: 12px;
						color: #FFF;
						text-shadow: 1px 1px #000;
					}
					.vehicle .name .bg {
						position: absolute;
						width: 100%;
						height: 100%;
						left: 0;
						top: 0;
						background-color: #44494E;
						opacity: 0.7;
					}
				.vehicle .image {
					/*box-shadow: 0px 0px 3px #CCC;*/
					border: 1px solid #CCCBCB;
					padding: 7px;
					position: relative;
				}
			</style>
</div>
</div>
<script>
									jQuery(function($){
										$('.shop-form ').submit(function(){
											if ( ! $(this).data('already' ) ) {
												$(this).data('already', true);
											} else {
												return false;
											}
										});
									});
								</script>
</div>
</div>
<?php include_once('../vistas/footer.php');?>

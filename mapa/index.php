<?php

error_reporting(0);
session_start();
include_once('../seg.php');
$house_id = mysqli_real_escape_string($_GET['house_id']);
if(isset($_SESSION['user']) && !empty($_SESSION['user']))
{ 
    $User = mysqli_real_escape_string($_SESSION['user']);
	
    /*Cuenta */$query = mysqli_query($conectSAMP,"SELECT * FROM CUENTA WHERE NAME = '$User'");
    while($cuenta = mysqli_fetch_assoc($query))
    {
		$ID = $cuenta['ID'];
        $name = $cuenta['NAME'];
		$IP = $cuenta['IP'];
	}		
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>MAPA SUNDAYSAMP</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
    <style type="text/css">
        /* Allow the canvas to use the full height and have no margins */
        html, body, #map-canvas {
            height: 100%;
            margin: 0
        }
    </style>
</head>
<body>
<div id="map-canvas"></div>

<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/SanMap.min.js"></script>
<script>

    var mapType = new SanMapType(0, 1, function (zoom, x, y) {
        return x == -1 && y == -1 
		? "../map/tiles/map.outer.png" 
		: "../map/tiles/map." + zoom + "." + x + "." + y + ".png";//Where the tiles are located
    });
	
    var satType = new SanMapType(0, 3, function (zoom, x, y) {
        return x == -1 && y == -1 
		? null 
		: "../map/tiles/sat." + zoom + "." + x + "." + y + ".png";//Where the tiles are located
    });
	
    var map2Type = new SanMapType(0, 4, function (zoom, x, y) {
        return x == -1 && y == -1 
		? "../map/tiles/sanandreas.blank.png" 
		: "../map/tiles/sanandreas." + zoom + "." + x + "." + y + ".png";//Where the tiles are located
    });

    var map = SanMap.createMap(document.getElementById('map-canvas'), 
		{'Map': mapType, 'Satellite': satType, 'Map 2': map2Type}, 2, null, false, 'Satellite');


	<?php $sql = mysqli_query($conectSAMP,"SELECT ID,EXT_X,EXT_Y FROM PROPERTY WHERE ID = $house_id"); while($row = mysqli_fetch_array($sql)) { $ID_H = $row['ID']; $x = $row['EXT_X']; $y = $row['EXT_Y'];?>
	//var bankInfoWindow = new google.maps.InfoWindow({
	//	content: '<p><b>Dueño:</b> Wyatt.<br><b>Tipo:</b> Mansion.<br><b>Nivel:</b> Nivel.<br><b>Abierto:</b> No.</p>'
	//});
	var bankMarker = new google.maps.Marker({
		position: SanMap.getLatLngFromPos(<?php echo $x; ?>, <?php echo $y; ?>),
		map: map,
		icon: 'http://rol.linexzone.org/imagenes/iconos/31.gif'
	});
	//google.maps.event.addListener(bankMarker, 'click', function() {
	//	map.setCenter(bankMarker.position);
	//	bankInfoWindow.open(map,bankMarker);
	//});
	<?php } ?>

</script>

</body></html>
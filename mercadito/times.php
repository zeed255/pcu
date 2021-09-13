<?php
$horas = 1;
$fecha 	= date('Y-m-d H:i:s', (strtotime ("+$horas Hours")));
$fecha2 = date('Y-m-d H:i:s', (strtotime ("+2 Hours")));
$fechaInicial = "$fecha";
$fechaFinal = "$fecha2";
$segundos = strtotime($fechaFinal) - strtotime($fechaInicial);
print $segundos;
?>

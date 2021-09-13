<?php if(isset($_SESSION['user'])) {?>
<div id="panel-menu-height">
<div id="panel-menu">
<div class="navbar-inner">
<img class="header-avatar-top" src="<?php echo $url . '/img/skins/_' .$_SESSION['ropa'];?>.png">
<ul class="nav">
<li <?php if($_SERVER['REQUEST_URI'] == '/samp'){echo'class="active"';}?>><a href="<?php echo $url;?>samp"><span class="line-over"></span><span class="text-over"><i class="fa fa-user"></i></span></a></li>
<li <?php if($_SERVER['REQUEST_URI'] == '/inventario'){echo'class="active"';}?>><a href="<?php echo $url;?>inventario"><span class="line-over"></span><span class="text-over"><i class="fa fa-object-group"></i> Inventario</span></a></li>
<li <?php if($_SERVER['REQUEST_URI'] == '/tienda'){echo'class="active"';}?>><a href="<?php echo $url;?>tienda"><span class="line-over"></span><span class="text-over"><i class="fa fa-shopping-cart"></i> Tiendas</span></a></li>
<li <?php if($_SERVER['REQUEST_URI'] == '/banco'){echo'class="active"';}?>><a href="<?php echo $url;?>banco"><span class="line-over"></span><span class="text-over"><i class="fa fa-dollar-sign"></i> Banco</span></a></li>
<li <?php if($_SERVER['REQUEST_URI'] == '/vehiculos'){echo'class="active"';}?>><a href="<?php echo $url;?>vehiculos"><span class="line-over"></span><span class="text-over"><i class="fa fa-car"></i> Vehículos</span></a></li>
<li <?php if($_SERVER['REQUEST_URI'] == '/infracciones'){echo'class="active"';}?>><a href="<?php echo $url;?>infracciones"><span class="line-over"></span><span class="text-over"><i class="fa fa-th-large"></i> Otros</span></a></li>
</ul>
</div>
</div>
</div>
<?php } ?>
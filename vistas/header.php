<?php if(isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($_SESSION['username']) && !empty($_SESSION['username'])){ ?> 
<section id="header">
<div id="loading-bar" class="loading"><span class="loading"></span></div>
<div id="top-bar" class="base-size">
<a id="home" href="<?php echo $url;?>">
<img id="logo" src="<?php echo $url; ?>/img/logo-header-v2.png" alt="Logo" />
</a>
<div id="header-main-menu">
<ul id="header-main-menu-container" class="menu"><li class="services-list"> <div id="all-services-item">
<a><span>Servicios</span></a>
<div id="all-services">
<div id="all-services-list">
<a href="<?php echo $url;?>" class="item-panel">
<i></i>
<div>Panel</div>
<span>Consulta información de perfil IN-GAME</span>
</a>
<!--<a href="<?php echo $url;?>nfs" class="item-shop-nfs">
<i></i>
<div>Tienda NFS</div>
<span>Compra vehículos vía web</span>
</a>
<a href="<?php echo $url;?>casas" class="item-shop-houses">
<i></i>
<div>Casas</div>
<span>¿Cansado de un Motel?<br />¡Compra una casa!</span>
</a>
<a href="<?php echo $url;?>negocios" class="item-shop-bizz">
<i></i>
<div>Negocios</div>
<span>¡Hazte con un negocio!</span>
</a>
<a href="<?php echo $url;?>locales" class="item-shop-local">
<i></i>
<div>Locales</div>
<span>Locales para cualquier uso</span>
</a>-->
<a href="<?php echo $url;?>membresias" class="item-shop-memberships">
<i></i>
<div>Membresías</div>
<span>Obtén beneficios y ayuda</span>
</a>
<a href="<?php echo $url;?>mapa" class="item-map">
<i></i>
<div>Mapa</div>
<span>Usuarios en tiempo real</span>
</a>
<a href="<?php echo $url;?>estado" class="item-status">
<i></i>
<div>Estado servidor</div>
<span>Verifica si el servidor esta ON/OFF</span>
</a>
<a href="<?php echo $url;?>stats" class="item-stats">
<i></i>
<div>Estadísticas</div>
<span>Información general del servidor</span>
</a>
<!--
<a href="<?php echo $url;?>certificador" class="item-certification">
<i></i>
<div>Certificación</div>
<span>Completa tu certificación</span>
</a>-->
<a href="<?php echo $url;?>verification" class="item-verified">
<i></i>
<div>Verificar cuenta</div>
<span>Agrega tu cuenta verificada IN-GAME</span>
</a>
<a href="<?php echo $url;?>coins" class="item-coins">
<i></i>
<div>Coins</div>
<span>Compra coins para obtener beneficios únicos</span>
</a>
</div>
<div class="ips-list">
<div>
<div>Minecraft:</div>
<span>En mantenimiento</span>
</div>
<div>
<div></div>
</div>
<div>
<div>GTA SA Roleplay:</div>
<span><?php echo $ip; ?></span>
</div>
<div>
<div></div>
</div>
<div>
<div>Teamspeak 3:</div>
<span>En mantenimiento</span>
</div>
</div>
</div>
</div>
</li><li class="market"><a href="<?php echo $url;?>mercadito"><span>Mercadito</span><i></i></a></li><li class="forum"><a href="<?php echo $url;?>foro"><span>Foro</span><i></i></a></li></ul> <script>
				var function_hook = function(){
					// Header menu
					$('#profile-sub-menu-menu').on('click', 'li', function(){
						if ( typeof le !== 'undefined' && le.page_working === false ) {
							$(this).parent().find('> .active').removeClass('active');
							$(this).addClass('active');
						}
					});

					if ( typeof le !== 'undefined' ) {
						le.event( 'page', function(param){
							$('#header-main-menu-container > li.active').removeClass('active');
							$('#header-main-menu-container > li[class~="' + param + '"]').addClass('active');
						});
					}
				};

				if ( typeof le !== 'undefined' ) {
					le.l(function_hook);
				} else {
					$(function_hook);
				}
			</script>
</div>
<a id="uploader-menu-button" href="<?php echo $url;?>host/uploader"><i style="font-style: normal;" class="fa fa-arrow-alt-circle-up"></i> <span>Subir SS</span></a>
<div id="user">
<a class="header-avatar-a" href="<?php echo $url;?>samp"><img class="header-avatar" src="<?php echo $url . '/img/skins/_' .$_SESSION['ropa'];?>.png" /></a> <span class="profile">
<span id="profile-menu">
<div id="profile-sub-menu" class="drop-menu" data-trigger="target" data-trigger-target=".menu">
	<div class="drop-label"><span class="name">
		<span style="font-size:12px;color:#000" class="header-username">
			<?php echo $_SESSION['user']; ?>
		</span></span>
		<i class="fa fa-caret-down"></i>
		<div class="menu-holder">
		<ul id="profile-sub-menu-menu" class="menu">
		<li class="settings"><a href="<?php echo $url;?>settings">
		<span>Configuración</span>
		<i>
		</i>
		</a>
		</li>
		<!--<li class="org"><a href="<?php echo $url;?>samp/org"><span>Organización</span><i></i></a></li>-->
		<li class="mis-coins"><a href="<?php echo $url;?>coins">
		<span>Mis Coins</span>
		<i>
		</i>
		</a>
		</li>
		<li class="membresias">
		<a href="<?php echo $url;?>membresias">
		<span>Membresías</span><i></i>
		</a></li>
		<!--<li class="profile"><a href="<?php echo $url;?>member.php/111607"><span>Perfil</span><i></i></a></li><li class="messages"><a href="<?php echo $url;?>foro/private.php"><span>Mensajes</span><i class="icon icon-inbox"></i></a></li><li class="forum_settings"><a href="<?php echo $url;?>foro//profile.php?do=editavatar"><span>Avatar y Foro</span><i class="icon icon-edit"></i></a></li>-->
		<li class="logout"><a href="<?php echo $url;?>logout">
		<span>Cerrar Sesión</span>
		<i></i>
		</a>
		</li>
		</ul>
		</div>
	</div>
</div> 
<script>
	var function_hook = function(){
		// Profile menu
		$('#profile-sub-menu-menu').on('click', 'li', function(){
			if ( typeof le !== 'undefined' && le.page_working === false ) {
				$(this).parent().find('> .active').removeClass('active');
				$(this).addClass('active');
			}
		});

		if ( typeof le !== 'undefined' ) {
			le.event( 'page', function(param){
				$('#profile-sub-menu-menu > li.active').removeClass('active');
				$('#profile-sub-menu-menu > li[class~="' + param + '"]').addClass('active');
			});
		}
	};

	if ( typeof le !== 'undefined' ) {
		le.l(function_hook);
	} else {
		$('#profile-sub-menu, #header-top-notifications').on('click', function() {
			if ( $(this).hasClass('dynamic-focus') ) {
				$(this).removeClass('dynamic-focus');
			} else {
				$(this).addClass('dynamic-focus');
			}
		});
		$(function_hook);
	}
</script>
</span>
</span>
</div>
</div>
</section>

<?php } else { ?>
<section id="header">
<div id="loading-bar" class="loading"><span class="loading"></span></div>
<div id="top-bar" class="base-size">
<a id="home" href="<?php echo $url;?>">
<img id="logo" src="<?php echo $url; ?>/img/logo-header-v2.png" alt="Logo" />
</a>
<div id="header-main-menu">
<ul id="header-main-menu-container" class="menu"><li class="services-list"> <div id="all-services-item">
<a><span>Servicios</span></a>
<div id="all-services">
<div id="all-services-list">
<a href="<?php echo $url;?>" class="item-panel">
<i></i>
<div>Panel</div>
<span>Consulta información de perfil IN-GAME</span>
</a>
<!--<a href="<?php echo $url;?>nfs" class="item-shop-nfs">
<i></i>
<div>Tienda NFS</div>
<span>Compra vehículos vía web</span>
</a>
<a href="<?php echo $url;?>casas" class="item-shop-houses">
<i></i>
<div>Casas</div>
<span>¿Cansado de un Motel?<br />¡Compra una casa!</span>
</a>
<a href="<?php echo $url;?>negocios" class="item-shop-bizz">
<i></i>
<div>Negocios</div>
<span>¡Hazte con un negocio!</span>
</a>
<a href="<?php echo $url;?>locales" class="item-shop-local">
<i></i>
<div>Locales</div>
<span>Locales para cualquier uso</span>
</a>-->
<a href="<?php echo $url;?>membresias" class="item-shop-memberships">
<i></i>
<div>Membresías</div>
<span>Obtén beneficios y ayuda</span>
</a>
<a href="<?php echo $url;?>mapa" class="item-map">
<i></i>
<div>Mapa</div>
<span>Usuarios en tiempo real</span>
</a>
<a href="<?php echo $url;?>estado" class="item-status">
<i></i>
<div>Estado servidor</div>
<span>Verifica si el servidor esta ON/OFF</span>
</a>
<a href="<?php echo $url;?>stats" class="item-stats">
<i></i>
<div>Estadísticas</div>
<span>Información general del servidor</span>
</a>
<!--
<a href="<?php echo $url;?>certificador" class="item-certification">
<i></i>
<div>Certificación</div>
<span>Completa tu certificación</span>
</a>-->
<a href="<?php echo $url;?>verification" class="item-verified">
<i></i>
<div>Verificar cuenta</div>
<span>Agrega tu cuenta verificada IN-GAME</span>
</a>
<a href="<?php echo $url;?>coins" class="item-coins">
<i></i>
<div>Coins</div>
<span>Compra coins para obtener beneficios únicos</span>
</a>
</div>
<div class="ips-list">
<div>
<div>Minecraft:</div>
<span>En mantenimiento</span>
</div>
<div>
<div></div>
</div>
<div>
<div>GTA SA Roleplay:</div>
<span><?php echo $ip; ?></span>
</div>
<div>
<div></div>
</div>
<div>
<div>Teamspeak 3:</div>
<span>En mantenimiento</span>
</div>
</div>
</div>
</div>
</li><li class="market"><a href="<?php echo $url;?>mercadito"><span>Mercadito</span><i></i></a></li><li class="forum"><a href="<?php echo $url;?>foro"><span>Foro</span><i></i></a></li></a></li></ul> <script>
				var function_hook = function(){
					// Header menu
					$('#profile-sub-menu-menu').on('click', 'li', function(){
						if ( typeof le !== 'undefined' && le.page_working === false ) {
							$(this).parent().find('> .active').removeClass('active');
							$(this).addClass('active');
						}
					});

					if ( typeof le !== 'undefined' ) {
						le.event( 'page', function(param){
							$('#header-main-menu-container > li.active').removeClass('active');
							$('#header-main-menu-container > li[class~="' + param + '"]').addClass('active');
						});
					}
				};

				if ( typeof le !== 'undefined' ) {
					le.l(function_hook);
				} else {
					$(function_hook);
				}
			</script>
</div>
<div id="user">
<a class="action-header-button-login" href="<?php echo $url; ?>login.php">Ingresar</a>
<a class="/* action-header-button btn-ex-custom-success btn-ex-custom */ hidden" href="<?php echo $url; ?>registro.php">REGISTRARME</a>
</div>
</div>
</section>
<?php } ?>
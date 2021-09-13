<?php
if(isset($_SESSION['User']))
{
	$user_ses = strtolower(mysql_real_escape_string($_SESSION['User']));
	$edbm = mysql_query("SELECT * FROM `invitaciones` WHERE `Invitado` = '".$user_ses."';");
	if(mysql_num_rows($edbm) > 0)
	{
		echo '<div class="invitaciones-pendientes">
			<a href="invitaciones.php" title="Ver invitaciones"><font size="2px">[ Tienes '.mysql_num_rows($edbm).' invitaciones de banda ]</font></a>
			</div>';
	}
}
?>
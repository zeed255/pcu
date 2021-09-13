<footer class="extra-footer">
<section class="footer-top">
<section class="online">
<section class="base-size">
<section class="samp"> 
<div class="server">
<?php   
$query = $user->connect()->prepare('SELECT * FROM users_online');
?>
<div class="status">San Andreas Multiplayer: <strong style="font-weight: bold;"><?php echo $ip; ?></strong> <span>(<?php echo $query->rowCount(); ?> / 100)</span></div>
</div>
<div id="players-samp" style="text-align: center;"> 
<ul>
<?php if($query->rowCount() == 0) { ?>
<li style="color:#848484;">No hay jugadores online</li>
<?php } else { while($con = $query->fetch(PDO::FETCH_ASSOC)){ ?>
<li style="display:inline-block;color:#FFFFFF;" class="odd"><img src="<?php echo 'http://flags.fmcdn.net/data/flags/h80/'.strtolower(getCountryFromIP($con['ip'], "code")); ?>.png" title="<?php echo getCountryFromIP($con['ip']); ?>" alt="<?php echo getCountryFromIP($con['ip']); ?>"><span class="name"> <?php echo $con['nick'].' <span style="color:#02D09B;">('.$con['LEVEL'].')</span>';?></span></span></li>
<?php } } ?>
</ul>
</div>
</section>
</section>
</section>
<section class="about">
<section class="base-size">
<div class="left-side">
<p><a href="<?php echo $url; ?>#"><?php echo $nombresv; ?></a> fue creada por y para los gamers de la comunidad hispana en general. Todos están invitados a participar en nuestros foros de discusión, jugar en nuestros servidores y charlar en nuestro TS3 (TeamSpeak 3).</p>
<p>Cualquier duda que les surja referente a nuestros servicios, puede contactarnos a <a style="color: #65D5FF;" href="mailto:<?php echo $emailsoporte;?>"><?php echo $emailsoporte;?></a>, no olvide revisar nuestros foros.</p>
</div>
<div class="right-side">

</section>
</section>
</section>
<div class="footer-container">
<div class="base-size">
<div class="dieam-copyright">© <a href="<?php echo $url; ?>#"><?php echo $nombresv; ?></a> <?php echo date('Y');?> - Todos los derechos reservados.</div>
<div class="footer-social">
<a target="_blank" href="<?php echo $url; ?>terminos-y-condiciones-de-uso/">Términos y Condiciones</a>
<a target="_blank" href="<?php echo $url; ?>politica-de-privacidad/">Política de Privacidad</a>
<div class="social-prefix">Síguenos:</div>
<a target="_blank" class="" href="https://www.facebook.com/">Facebook</a>
<a target="_blank" class="" href="https://www.youtube.com/">Youtube</a>
</div>
</div>
</div>
</footer>
<script data-cfasync="false" src="./js/email-decode.min.js"></script></iframe></body></html>
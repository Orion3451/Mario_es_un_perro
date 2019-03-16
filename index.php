<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es">
<head>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<title>Tu direcci&oacute;n IP</title>
<meta name="description" content=""/>
<meta name="keywords" content="" />
<!-- Compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Minified JS library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--  Compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<link href="css/estilos.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="contenedor">
<div id="contenido">
<div id="header">
<!-- <div class="logo"><img src="http://verip.cl/image/logo.png" /></div> -->
<div class="flecha"><img src="http://verip.cl/image/chevron.png" /></div>
</div>

<div class="cont_general">
<div class="banner_cont">
<p>

<div id="myCarousel" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
        <li data-target="#myCarousel" data-slide-to="5"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="https://www.hosting.cl/images/portfolio/oficina_hosting1.jpg" alt="">
        </div>
        <div class="item">
            <img src="https://www.hosting.cl/images/portfolio/oficina_hosting2.jpg" alt="">
        </div>
        <div class="item">
            <img src="https://www.hosting.cl/images/portfolio/oficina_hosting3.jpg" alt="">
        </div>
        <div class="item">
            <img src="https://www.hosting.cl/images/portfolio/oficina_hosting4.jpg" alt="">
        </div>
        <div class="item">
            <img src="https://www.hosting.cl/images/portfolio/oficina_hosting5.jpg" alt="">
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


	<div class="search" class="search">
		<form method="post">
 		<p></br>Ingrese el nombre de su dominio (Ejemplo: tusitio.com )<input type="text" name="dominio"/></p>
 		<p><input type="submit" /></p>
		</form>
	</div>

<?php
if(isset($_POST['dominio']))
$sitio = $_POST['dominio'];
$mi_temporizador = microtime();
$partes_de_la_hora_actual = explode(' ', $mi_temporizador);
$hora_actual = $partes_de_la_hora_actual[1] + $partes_de_la_hora_actual[0];
$hora_al_empezar = $hora_actual;

$ip = $_SERVER['REMOTE_ADDR'];
echo "<h1><br>Su direcci&oacute;n IP es: $ip</h1>";

//$sitio = $_SERVER["HTTP_HOST"]; <--
echo "<h1><br>Nombre de dominio:</h1> <h2>www.$sitio</h2>";
{	
	$puerto = 80;
	$fp = fsockopen($sitio,$puerto,$errno,$errstr,20);
	if(!$fp)
	{
		echo "<FONT COLOR=red>Puerto Web : No ha sido posible la conexi&oacute;n</font>";
		echo "<br><FONT COLOR=blue>Motivo : Es posible que el puerto no este activado en el servidor, se encuentra suspendido o terminado</font><br>";
	}else{
		echo "<h3><img src=http://verip.cl/punto.png>Puerto Web : OK !</img></h3>";
		fclose($fp);
	}
    	$puerto = 2095;
	$fp = fsockopen($sitio,$puerto,$errno,$errstr,20);
	if(!$fp)
	{
		echo "<br><FONT COLOR=red>Puerto Webmail : No ha sido posible la conexi&oacute;n</font>";
		echo "<br><FONT COLOR=blue>Motivo : Es posible que el puerto 2095 no este activado en el servidor, o su servicio no cuenta con webmail</font><br>";		
	}else{
		echo "<h3><img src=http://verip.cl/punto.png>Puerto Webmail : OK !</img></h3>";
		fclose($fp);
	}
	$puerto = 2082;
	$fp = fsockopen($sitio,$puerto,$errno,$errstr,20);
	if(!$fp)
	{
		echo "<br><FONT COLOR=red>Puerto Cpanel : No ha sido posible la conexi&oacute;n</FONT>";
		echo "<br><FONT COLOR=blue>Motivo : Es posible que el puerto 2082 no este activado en el servidor, o su servicio no cuenta con CPanel</font><br>";
	}else{
		echo "<h3><img src=http://verip.cl/punto.png>Puerto Cpanel : OK !</img></h3><br>";
		fclose($fp);
	}
	
	
	echo "<h1><br>Servidor de Correo mail para</h1> <h2>mail.$sitio</h2>";
	$puerto = 25;
	$fp = fsockopen($sitio,$puerto,$errno,$errstr,20);
	if(!$fp)
	{
		echo "<br><br><FONT COLOR=red>Puerto SMTP 25 : No ha sido posible la conexi&oacute;n</font>";
		echo "<br><FONT COLOR=blue>Motivo : Es posible que el puerto 25 no este activado en el servidor</font><br>";
	}else{
		echo "<h3><img src=http://verip.cl/punto.png>Puerto SMTP 25 : OK !</img></h3>";
		fclose($fp);
	}
	$puerto = 26;
	$fp = fsockopen($sitio,$puerto,$errno,$errstr,20);
	if(!$fp)
	{
		echo "<br><FONT COLOR=red>Puerto SMTP 26 : No ha sido posible la conexi&oacute;n</font>";
		echo "<br><FONT COLOR=blue>Motivo : Es posible que el puerto 26 no este activado en el servidor</font><br>";
	}else{
		echo "<h3><img src=http://verip.cl/punto.png>Puerto SMTP 26 : OK !</img></h3>";
		fclose($fp);
	}
	$puerto = 587;
	$fp = fsockopen($sitio,$puerto,$errno,$errstr,20);
	if(!$fp)
	{
		echo "<br><br><FONT COLOR=red>Puerto SMTP 587 : No ha sido posible la conexi&oacute;n</font>";
		echo "<br><FONT COLOR=blue>Motivo : Es posible que el puerto no este activado en el servidor</font><br>";
	}else{
		echo "<h3><img src=http://verip.cl/punto.png>Puerto SMTP 587 : OK !</img></h3>";
		fclose($fp);
	}
	$puerto = 110;
	$fp = fsockopen($sitio,$puerto,$errno,$errstr,20);
	if(!$fp)
	{
		echo "<br><FONT COLOR=red>Puerto 110 > POP3 : No ha sido posible la conexi&oacute;n</font>";
		echo "<br><FONT COLOR=blue>Motivo : Es posible que el puerto no este activado en el servidor</font><br>";
	}else{
		echo "<h3><img src=http://verip.cl/punto.png>Puerto 110 > POP3 : OK !</img></h3>";
		fclose($fp);
	}
	$puerto = 143;
	$fp = fsockopen($sitio,$puerto,$errno,$errstr,20);
	if(!$fp)
	{
		echo "<br><FONT COLOR=red>Puerto 143 > IMAP : No ha sido posible la conexi&oacute;n</font>";
		echo "<br><FONT COLOR=blue>Motivo : Es posible que el puerto no este activado en el servidor</font><br>";
	}else{
		echo "<h3><img src=http://verip.cl/punto.png>Puerto 143 > IMAP : OK !</img></h3>";
		fclose($fp);
	}
	echo "<h1><br>Servidor de Base de datos para</h1> <h2>$sitio</h2>";
	$puerto = 3306;
	$fp = fsockopen($sitio,$puerto,$errno,$errstr,20);
	if(!$fp)
	{
		echo "<br><FONT COLOR=red>Puerto Remoto Base de datos 3306 : No ha sido posible la conexi&oacute;n</FONT>";
		echo "<br><FONT COLOR=blue>Motivo : Es posible que el puerto no este activado en el servidor o no cuente con acceso remoto al servidor de base de datos</font><br>";
		
	}else{
		echo "<h3><img src=http://verip.cl/punto.png>Puerto Remoto Base de datos 3306 : OK !</img></h3>";
		fclose($fp);
	}
	echo "<h1><br>Servidor FTP para</h1> <h2>ftp.$sitio</h2>";
	$puerto = 21;
	$fp = fsockopen($sitio,$puerto,$errno,$errstr,20);
	if(!$fp)
	{
		echo "<br><FONT COLOR=red>Puerto FTP 21 : No ha sido posible la conexi&oacute;n</FONT>";
		echo "<br><FONT COLOR=blue>Motivo : Es posible que el puerto no este activado en el servidor o no cuente con acceso FTP</font><br>";
	}else{
		echo "<h3><img src=http://verip.cl/punto.png>Puerto FTP 21 : OK !</img></h3>";
		fclose($fp);
	}
	

}
$mi_temporizador = microtime();
$partes_de_la_hora_actual = explode(' ', $mi_temporizador);
$hora_actual = $partes_de_la_hora_actual[1] + $partes_de_la_hora_actual[0];
$hora_al_terminar = $hora_actual;
$tiempo_total_en_segundos = round(($hora_al_terminar - $hora_al_empezar), 4);
echo '<h1><br>Tiempo de respuesta del servidor para generar este sitio</h1>';
echo '<h3><img src=http://verip.cl/punto.png>La pagina fue generada en '.$tiempo_total_en_segundos.' segundos.</h3>';
?>


</p>
</div>

<div class="banner_cont2"> <img src="http://verip.cl/image/hosting_chile.png"/><br />
<img src="http://verip.cl/image/webhosting_chile.png" /><br />
<img src="http://verip.cl/image/hosting_en_chile.png" />
  </div>
</div>


<h2><br>&iquest; Qu&eacute; es una direcci&oacute;n IP ?, &iquest; Cual es mi IP ?, &iquest; Como puedo Conocer mi IP ?</h2>

<div class="texto_intro">
<p>En palabras simples y sencillas mi ip, es una etiqueta o direcci&oacute;n que identifica en internet un determinado elemento o conexi&oacute;n, que por lo general, corresponde a una computadora, &eacute;sta direcci&oacute;n, puede ser p&uacute;blica o privada, din&aacute;mica o fija. <br />Aqu&iacute; s&oacute;lo puede ver su direcci&oacute;n p&uacute;blica.<br />
Por lo general los proveedores de servicio de conexiones a Internet ( ISP en ingl&eacute;s ), trabajan con direcciones ip din&aacute;micas, esto quiere decir que cada cierto tiempo su direcci&oacute;n ip puede cambiar. <br />
Por lo general las direcciones Ip fijas las utilizan los proveedores de servicio o empresas del rubro de internet, ya que para tener servidores de correo o ciertas aplicaciones es necesario contar con una ip fija.</p>
</div>
</div>

<div id="footer"> 
<div class="content_footer"> 
<p>Copyright&copy;verip.cl 2017 | Sitios de Inter&eacute;s: <a href="https://www.comparahosting.cl" target="_blank" title="Cual es el mejor Hosting?">Webhosting en Chile</a> - <a href="https://www.comparahosting.com.pe/" target="_blank" title="Mejor hosting en Per&uacute;">Webhosting en Per&uacute;</a> - <a href="https://www.comparahosting.com.co">Webhosting en Colombia</a></p>
</div></div>

</div>

</body>
</html>
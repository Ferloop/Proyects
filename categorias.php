<?php
session_start();
if(!isset($_SESSION["user"])){
require_once('Connections/tienda.php'); 
     mysql_select_db($database_tienda) or die ("No se encuentra la base de datos especificada");
if (isset($_POST['login'])){
$login = $_POST['login'];
$contrasena = $_POST['password'];
$valido = true;
 $consulta2 = "SELECT * FROM usuario where login='".$login."' AND password='".$pasusu."'";
         $result = mysql_query($consulta2) or die (mysql_error());
         $filasn = mysql_num_rows($result);
         if ($filasn<=0 || isset($_GET['nologin']) ){
             
             $valido = false;
         }else{
        $rowsresult = mysql_fetch_array($result);          
        $_SESSION['cve_usu']= $rowsresult['_cve_usu'];
             $valido=true;
             //guardamos en sesion el carnet del usuario ya que ese es el identificados en la base de datos
             $_SESSION["login"]=$login;
             header("location:categorias.php?login=true");
				echo '<script type="text/javascript">alert("Gracias por registrarse");</script>';
         }

}

	}else{
		$_SESSION["user"];
		
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Love Chic</title>
<link href="css/estilo.css" type="text/css" rel="stylesheet" media="all" />
<link rel="stylesheet" href="css/slide.css" type="text/css" media="screen" />
<script src="jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>  
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<!-- Sliding effect -->
	<script src="js/slide.js" type="text/javascript"></script>

<!-- analycs seguimiento -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-78250182-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- analycs seguimiento -->

</head>
<body>
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<h1>Bienvenido a Love Chic </h1>
				<h2>Tienda online especializada en manualidades y más articulos artesanales</h2>		
				<p class="grey">Gracias por visitarnos, si aun no es miembro registrate en este panel. Y si ya es miembro inicia sesion</p>
				<img class="logo" src="img/logoLC.png" alt="" width="155px" height="155px"/>
				
			</div>
			<div class="left">
				<!-- Login Form -->
				<?php
					if ( ! empty($_SESSION["login"]) ) {
						echo '<a href="cerrar_sesion.php">Cerrar Sesion</a> ';
					} else {
						echo '
						<form class="clearfix" action="index2.php" method="post">
					<h1>Miembros</h1>
					<label class="grey" for="login">Usuario:</label>
					<input class="field" type="text" name="login" id="login" value="" size="23" />
					<label class="grey" for="pwd">Contraeña:</label>
					<input class="field" type="password" name="password" id="password" size="23" />
	            	<label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> &nbsp;Recordarme</label>
        			<div class="clear"></div>
					<input type="submit" name="submit" value="Entrar" class="bt_login" />
					<a class="lost-pwd" href="nuevo_usuario.php">Registrarme</a>
                    <a class="lost-pwd" href="restablecerPass.php">Reestablecer contraseña</a>
				</form>
						';
					}
				?>			</div>
			
		</div>
</div> <!-- /login -->	

	<!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
			<li class="left">&nbsp;</li>
			<li>Hola 
				<?php if (!isset($_SESSION["login"])) {
			              echo "Invitado";
			            } else { 
			            	echo $_SESSION["login"];
			            } ?></li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#"> 
					<?php if (!isset($_SESSION["login"])) {
			                  echo "Entrar"; 
			                } else { 
			                	echo "Salir"; 
			                } ?></a>
				<a id="close" style="display: none;" class="close" href="#">Cerrar Panel</a>			
			</li>
			<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div>
<div id="total">


   	<div id="contenido">
	    	<div id="cabecera">
            <div id="nav">
    	<ul>
        <li><a href="index2.php" class="main">Inicio</a></li>
        <li><img src="img/naviseparator.gif" alt="" width="40" height="13" /></li>
         <li><a href="nosotros.php" class="main">Nosotros</a></li>
         <li><img src="img/naviseparator.gif" alt="" width="40" height="13" /></li>
          <li><a href="categorias.php" class="main">Productos</a></li>
          <li><img src="img/naviseparator.gif" alt="" width="40" height="13" /></li>
           <li><a href="carrito.php" class="main"><img src="imagenes/carr.png" width="20" height="20"/></a></li>
        </ul>
	</div>
            	<div class="FL"><img src="img/productos.png"/></div>
                <div class="FR"></div>
        </div>
      <p align="center" style="clear:both">
      	 <a href="bolsas.php" align="left"><img src="img/bolsas.jpg" width="300" height="314"></a>
      	 <a href="rosas.php"><img src="img/rosas.jpg" width="300" height="300"></a>
      	 <a href="pulseras.php" align="right"><img src="img/pulseras.jpg" width="300" height="300"></a>
      </p>
    	</div>
    <div id="pie">
    	<p>Copyright 2018 - Love Chic</p>
    </div>
    </div>
</body>
</html>

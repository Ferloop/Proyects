<?php
session_start();
if(!isset($_SESSION["user"])){
	
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
<script type="text/javascript">
function comparar_contra() {
	var contra1 = document.getElementById('contra1').value;
	var contra2 = document.getElementById('contra2').value;

	if (contra1 != contra2) {
		alert('Las contraseñas no coinciden');
	} 
}
</script>
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
          <label class="grey" for="password">Contraeña:</label>
          <input class="field" type="password" name="password" id="password" size="23" />
                <label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> &nbsp;Recordarme</label>
              <div class="clear"></div>
          <input type="submit" name="submit" value="Entrar" class="bt_login" />
          <a class="lost-pwd" href="nuevo_usuario.php">Registrarme</a>
          <a class="lost-pwd" href="updatepass.php">Reestablecer contraseña</a>
        </form>
            ';
          }
        ?>
			</div>
			
		</div>
</div> <!-- /login -->	

	<!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
			<li class="left">&nbsp;</li>
			<li>Hola <?php if (!isset($_SESSION["login"])) {
			                    echo "Invitado";
                         } else {
                             echo $_SESSION["login"];
                         } ?></li>
			<li class="sep">|</li>
			<li id="toggle">
        <a id="open" class="open" href="#">
           <?php if (!isset($_SESSION["user"])) {
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
            	<div class="FL"><img src="img/nosotros.png"/></div>
        </div>
        <div id="registro" style="clear:both;">
<br>
<p align="center">Llene el siguiente formulario para poder ser miembro de Love Chic</p><br><br><br>
<form action="registro.php" method="post">
  <fieldset>
    <legend></legend>
    <label>Login</label>
      <input size="18" type="text" name="login" required  placeholder="Introduzca el usuario"/>&emsp;

      <label>Contraseña</label>
      <input size="19" type="password" name="password" id="contra1" required placeholder="Introduzca el password"/>&emsp;

      <label>Repetir contraseña</label>
      <input size="27" type="password" name="contrasena_vali"  id="contra2" onChange="javascript:comparar_contra(this.form)" required placeholder="Vuelva a introducir el password" />&emsp;
  </fieldset>
     <legend></legend>
     <br><br>
     <fieldset>
       <label>Nombre</label>
      <input size="18" type="text" name="nombre" required  placeholder="Introduzca su nombre"/>&emsp;

      <label>Apellido paterno</label>
      <input size="28" type="text" name="paterno" required placeholder="Introduzca su apellido paterno"/>&emsp;
  
      <label>Apellido materno</label>
      <input size="28" type="text" name="materno" required placeholder="Introduzca su apellido materno"/>&emsp;

     </fieldset>
     <br><br>
     <fieldset>
      <label>Fecha de nacimiento</label>
      <input type="date" name="fnac" required min="1700-01-01" max="2025-12-31"/>&emsp;

      <label>Telefono</label>
      <input size="28" type="text" name="telefono" required placeholder="Introduzca su numero telefonico"/>&emsp;
  
      <label>Correo electronico</label>
      <input size="27" type="email" name="email" required  placeholder="Introduzca su correo electronico"/>&emsp; &emsp; 
     </fieldset>
     <br><br>
     <fieldset>
       <label>Calle</label>
      <input size="18" type="text" name="calle" required placeholder="Introduzca la calle"/>&emsp;
    
      <label>Numero</label>
      <input size="30" type="number" name="numero" required placeholder="Introduzca el numero de domicilio"/>&emsp;
    
      <label>Orientacion</label>
      <select name="orientacion">
      <option name="orientacion" value="norte">Norte</option>
      <option name="orientacion" value="sur">Sur</option>
      <option name="orientacion" value="oriente">Oriente</option>
      <option name="orientacion" value="poniente">Poniente</option>
      </select>
     </fieldset> 
     <br><br>
      <fieldset>
         <label>Colonia</label>
      <input size="18" type="text" name="colonia" required placeholder="Introduzca su colonia"/>&emsp;
    
      <label>Codigo Postal</label>
      <input size="18" type="number" name="cp" required placeholder="Introduzca su codigo postal"/>&emsp;
      </fieldset>
      <br><br>
      <fieldset>
         <label>Ciudad</label>
      <input size="18" type="text" name="ciudad" required placeholder="Introduzca su ciudad"/>&emsp;
    
      <label>Estado</label>
      <input type="text" name="estado" required placeholder="Introduzca su estado"/>&emsp;
    
      <label>Pais</label>
      <select name="pais">
        <option name="pais" value="México">México</option>
        <option name="pais" value="Estados Unidos">Estados Unidos</option>
        <option name="pais" value="Perú">Perú</option>
        <option name="pais" value="Chile">Chile</option>
        <option name="pais" value="Argentina">Argentina</option>
        <option name="pais" value="España">España</option>
      </select>
      </fieldset><br><br>
      <input type="submit" name="registrar" value="Registrar"/>
      <input type="reset" value="Cancelar"/>
</form>
</div>
</div>

    <div id="pie">
      <p>Copyright 2018 - Love Chic</p>
    </div>
    </div>
</body>
</html>

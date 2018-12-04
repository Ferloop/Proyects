<?php
session_start();
if (!isset($_SESSION["login"])){
    header("location:nuevo_usuario.php?nologin=false");
    
}
$_SESSION["login"];
if(isset($_SESSION['carrito'])){
	$compras=$_SESSION['carrito'];

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
            <form class="clearfix" action="index.php" method="post">
          <h1>Miembros</h1>
          <label class="grey" for="login">Usuario:</label>
          <input class="field" type="text" name="login" id="login" value="" size="23" />
          <label class="grey" for="password">Contraeña:</label>
          <input class="field" type="password" name="password" id="password" size="23" />
                <label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> &nbsp;Recordarme</label>
              <div class="clear"></div>
          <input type="submit" name="submit" value="Entrar" class="bt_login" />
          <a class="lost-pwd" href="nuevo_usuario.php">Registrarme</a>
          <a class="lost-pwd" href="#">Reestablecer contraseña</a>
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
			<li>Hola 
         <?php if (!isset($_SESSION["login"])) {
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
            	<div class="FL"></div>
                <div class="FR"></div>
        </div>
        <div class="categorias">
 <br>
 <p align="center">Bienvenido: <?php echo $_SESSION["login"]; ?></p><br />
 <p align="center">Este es el resumen de su compra, verifique su pedido e ingrese sus datos</p>
 <br>
      <form method="post" action="final.php">
        <table width="90%"  height="90%"border="1" align="center" id="tablacarrito">
           <tr align="center" style="background-color:#fff; color:#000">
             <td>&nbsp;</td>
             <td align="right">Nombre:</td>
             <td>
               <label for="nombre"></label>
               <input type="text" name="nombre" id="nombre" size="50" value="<?php echo $_SESSION["login"]; ?>" required>
             </td>
             <td>&nbsp;</td>
           </tr>
           <tr align="center" style="background-color:#fff; color:#000">
              <td height="39">&nbsp;</td>
              <td align="right">E-Mail:</td>
              <td><label for="email"></label>
              <input type="email"  name="email" id="email" size="50" required></td>
              <td>&nbsp;</td>
           </tr>
           <tr align="center" style="background-color:#008fbe; color:#fff">
               <td width="27%" height="28" align="center">Producto</td>
               <td width="18%" align="center">Precio</td>
               <td width="37%" align="center">Cantidad</td>
               <td width="18%" align="center">Total</td>
           </tr>
  <?php
  if(isset($_SESSION['carrito'])){
	    $total=0;
      for($i=0;$i<=count($compras)-1;$i++){
	
	    if($compras[$i]!=NULL){	
 ?>
         <tr align="center">
            <td><?php echo $compras[$i]['nombre']; ?></td>
            <td><?php echo $compras[$i]['precio']; ?></td>
            <td><?php echo $compras[$i]['cantidad'];?></td>
            <td>
	            <?php echo $compras[$i]['cantidad'] * $compras[$i]['precio'];?>
            </td>
         </tr>
    <?php
       $total= $total+($compras[$i]['cantidad'] * $compras[$i]['precio']);
       }
     }
  }
  
  ?>
  <tr align="center">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><p>&nbsp;</p>
      <p>Total a pagar:</p></td>
    <td><p>&nbsp;</p>
    <p><?php if(isset($_SESSION['carrito'])){ echo "$ ".$total." Pesos ";}?></p>
    </td>
  </tr>
  <tr align="center">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Enviar pedido a PayPal"></td>
  </tr>
    </table>
    </form>
</div>
        </div>

    <div id="pie">
       <p>Copyright 2018 - Love Chic</p>
    </div>
    </div>
</body>
</html>

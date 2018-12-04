<?php
session_start();
//manejamos en sesion el nombre del usuario que se ha logeado
require_once('Connections/tienda.php'); 

if(!isset($_SESSION["user"])){

     mysql_select_db($database_tienda) or die ("No se encuentra la base de datos especificada");
if (isset($_POST["login"])){
$login = $_POST["login"];
$contrasena = $_POST["password"];
$valido = true;
 $consulta2 = "SELECT * FROM usuario where login='".$login."' AND password='".$password."'";
         $result = mysql_query($consulta2) or die (mysql_error());
         $filasn = mysql_num_rows($result);
         if ($filasn<=0 || isset($_GET["nologin"]) ){
             
             $valido = false;
         }else{
        $rowsresult = mysql_fetch_array($result);
        $claveusu = $rowsresult['cve_usu'];          
        $_SESSION['cve_usu']= $rowsresult['cve_usu'];
             $valido = true;
             //guardamos en sesion el carnet del usuario ya que ese es el identificados en la base de datos
             $_SESSION["login"] = $login;
             header("location:carrito.php?login=true");
				echo '<script type=\"text/javascript\">alert(\"Gracias Por Registrarse\");</script>';

         }
}

	}else{
		$_SESSION["user"];
		
		}


if ( isset($_SESSION['carrito']) || isset($_POST['nombre'])){
			
	if(isset ($_SESSION['carrito'])){
		$compras=$_SESSION['carrito'];
		if(isset($_POST['nombre'])){
		$nombre=$_POST['nombre'];
		$precio=$_POST['precio'];
		$cantidad=$_POST['cantidad'];
		$duplicado=-1;


    include('Connections/tienda.php'); 

    $sql = "SELECT * FROM venta where cve_usu=".$claveusu."" ;
         $result = mysql_query($sql);
        $rowsresult = mysql_fetch_array($result);          
        $folio = $rowsresult['folio_ven'];

$clavepro="SELECT cve_pro from producto where nom_pro='".$nombre."'";
$query = "INSERT into renglonventa(cve_renven,cant_renven,subtotal_renven,folio_ven,cve_pro)values(null,".$cantidad.",".$precio.",".$folio.",".$clavepro.")"; //folio y cve_pro 
mysql_query($query); 
echo "<script>javascript: alert('Registro hecho')></script>";


			for($i=0;$i<=count($compras)-1;$i++){
				if($nombre==$compras[$i]['nombre']){
					$duplicado=$i;
          
				}
			}

if($duplicado != -1){
	$cantidad_nueva = $compras[$duplicado]['cantidad'] + $cantidad;
		$compras[$duplicado]=array("nombre"=>$nombre,"precio"=>$precio,"cantidad"=>$cantidad_nueva);

    include('Connections/tienda.php'); 
$sql = "SELECT * FROM venta where cve_usu=".$claveusu."" ;
         $result = mysql_query($sql);
        $rowsresult = mysql_fetch_array($result);          
        $folio = $rowsresult['folio_ven'];

$clavepro="SELECT cve_pro from producto where nom_pro='".$nombre."'";
$query = "INSERT into renglonventa(cve_renven,cant_renven,subtotal_renven,folio_ven,cve_pro) values(null,".$cantidad.",".$precio.",".$folio.",".$clavepro.")"; 
mysql_query($query); 
echo "<script>javascript: alert('registro hecho')></script>";

}else {
		$compras[]=array("nombre"=>$nombre,"precio"=>$precio,"cantidad"=>$cantidad);
}
				}
}else {
	$nombre=$_POST['nombre'];
	$precio=$_POST['precio'];
	$cantidad=$_POST['cantidad'];
	$compras[]=array("nombre"=>$nombre,"precio"=>$precio,"cantidad"=>$cantidad);

include('Connections/tienda.php'); 
$sql1 = "SELECT * FROM venta where cve_usu=".$claveusu."" ;
         $result = mysql_query($sql);
        $rowsresult = mysql_fetch_array($result);          
        $folio = $rowsresult['folio_ven'];

$clavepro="SELECT cve_pro from producto where nom_pro='".$nombre."'";
$query = "INSERT into renglonventa(cve_renven,cant_renven,subtotal_renven,folio_ven,cve_pro) values(null,".$cantidad.",".$precio.",".$folio.",".$clavepro.")";  
mysql_query($sql1); 
echo "<script>javascript: alert('registro renglonventa hecho')></script>";

}
if(isset($_POST['cantidadactualizada'])){
	$id=$_POST['id'];
	$contador_cant=$_POST['cantidadactualizada'];
	if($contador_cant<1){
		$compras[$id]=NULL;
	}else{
		$compras[$id]['cantidad']=$contador_cant;
		}

}
if(isset($_POST['id2'])){
	$id=$_POST['id2'];
	$compras[$id]=NULL;

  $quer = "UPDATE producto SET cant_pro=cant_pro+".$contador_cant." where nom_pro='".$nombre."'";
            mysql_query($quer); 
 echo"<script>alert('producto eliminado del carrito')</script>";

}
$_SESSION['carrito']=$compras;

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
          <label class="grey" for="password">Contraeña:</label>
          <input class="field" type="password" name="password" id="password" size="23" />
                <label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> &nbsp;Recordarme</label>
              <div class="clear"></div>
          <input type="submit" name="submit" value="Entrar" class="bt_login" />
          <a class="lost-pwd" href="nuevo_usuario.php">Registrarme</a>
          <a class="lost-pwd" href="restablecerPass.php">Reestablecer contraseña</a>
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
            	 <div class="FL"><img src="img/carrito.png"/></div>
                <div class="FR"></div>
                <div class="categorias">
 <br>
    <p style=" text-align:center; margin-bottom:10px; clear:both;"><br /><a href="javascript:history.back(1)">Atras</a>   
      <br>
    <table width="90%"  height="90%"border="1" align="center" id="tablacarrito">
<tr align="center" style="background-color:#008fbe; color:#fff">
    <td width="27%" align="center">Producto</td>
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
    <td required><?php echo $compras[$i]['nombre']; ?></td>
    <td><?php echo $compras[$i]['precio']; ?></td>
    <td>
      <form name="form1" method="post" action="#">
      <input type="hidden" name="id" id="id" value="<?php echo $i;?>" >
      <input type="text" name="cantidadactualizada" value="<?php echo $compras[$i]['cantidad'];?>"  size="2" required>
      <span id="toolTipBox" width="200"></span>
        <input type="image" name="actualizar" id="actualizar" src="imagenes/actualizar.png" onmouseover="toolTip('Presione para actualizar su pedido',this)">
      </form></td>
    <td>
	<form method="post" action=""><?php echo $compras[$i]['cantidad'] * $compras[$i]['precio'];?> <!--eliminar.php -->
    <span id="toolTipBox" width="200"></span>
       <input name="id2" type="hidden" id="id2" value="<?php echo $i;?>"> 
               <input type="image" name="imageField" id="imageField" src="imagenes/eliminar.png" onmouseover="toolTip('Presione para eliminar su pedido',this)">
    </form>
  </td>
  </tr>
  <?php
  $total= $total+($compras[$i]['cantidad'] * $compras[$i]['precio']);
}
  }
  }else{
    echo "No hay productos en el carrito";
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
    <td><form name="form2" method="post" action="resumenc_compra.php">
      <input type="submit" name="button" id="button" value="Enviar Pedido">
    </form></td>
  </tr>
    </table>
</div>
        </div>
   	</div>

    <div id="pie">
      <p>Copyright 2018 - Love Chic</p>
    </div>
    </div>
</body>
</html>

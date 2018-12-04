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
            <form class="clearfix" action="indexadmin.php" method="post">
          <h1>Miembros</h1>
          <label class="grey" for="login">Usuario:</label>
          <input class="field" type="text" name="login" id="login" value="" size="23" />
          <label class="grey" for="password">Contraeña:</label>
          <input class="field" type="password" name="password" id="password" size="23" />
                <label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> &nbsp;Recordarme</label>
              <div class="clear"></div>
          <input type="submit" name="submit" value="Entrar" class="bt_login" />
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
			             echo "Administrador";
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
        <li><a href="indexadmin.php" class="main">Inicio</a></li>
        <li><img src="img/naviseparator.gif" alt="" width="40" height="13" /></li>
      </ul>
	</div>
            	<div class="FL"></div>
                <div class="FR"></div>
        </div>
        <div id="registro" style="clear:both;">

          <!--  ###################################    alta producto  ############################## -->

<div class="#">
<br>
<p align="center">Apartado registrar nuevo producto</p>
<p align="center">las 2 imagenes deben coincidir</p>
<br>
<form action="registro_prod.php" method="post">
<table width="100%" border="1">
  <tr>
    <td height="30" align="right">nombre:</td>
    <td align="left"><input type="text" size="28" name="nombrep" required  placeholder="Ingrese el nombre del producto" /></td>
  </tr>
  <tr>
    <td height="30" align="right">precio: $</td>
    <td align="left"><input type="number" size="28" step="0.01" name="preciop" required placeholder="Ingrese el precio del producto" /></td>
  </tr>
  <tr>
    <td height="30"  align="right">categoria:</td>
    <td>
      <?php  
          include('Connections/tienda.php');
          $consulta = "select * from categoria";
          $resultado = mysql_query($consulta); 
          echo "<select name='categoriap'>";
          while($fila = mysql_fetch_array($resultado)){
               echo "<option value='".$fila['categoria_cat']."'>".$fila['categoria_cat']."</option>";
               }
            echo "</select>";
         ?>
    </td>
  </tr>

  <tr>
    <td height="30" align="right">existencia:</td>
    <td align="left"><input type="number" size="25" name="cantidadp" required placeholder="Ingrese la cantidad" /></td>
  </tr> 

<tr>
    <td height="30" align="right">Color:</td>
    <td>
        <?php  
          include('Connections/tienda.php');
          $consulta = "select * from color";
          $resultado = mysql_query($consulta); 
          echo "<select name='color'>";
          while($fila = mysql_fetch_array($resultado)){
               echo "<option value='".$fila['color_colo']."'>".$fila['color_colo']."</option>";
               }
            echo "</select>";
         ?>
    </td>
  </tr> 

  <tr>
    <td height="30" align="right">descripcion:</td>
    <td align="left">
      <textarea name="descripcionp" rows="5" cols="50"></textarea>
      </td>
  </tr>

<tr>
    <td height="30" align="right">imagen:</td>
    <td align="left"><input name="foto" type="file" id="foto" required> </td>
  </tr>
</table> 
<input type="submit" name="registrar" value="Registrar"/>
<input type="reset" value="Cancelar"/>
</form>
<br><br>
  </div>
   

<!-- ##################################### subir imagen  ###################################### -->

<div class="#">

<p align="center">Apartado  subir imagen a las rutas correspondientes</p>
<br>

<?PHP
          
$nombrefoto1=$_FILES['foto1']['name'];
$ruta1=$_FILES['foto1']['tmp_name'];
if(is_uploaded_file($ruta1))
{ 
if($_FILES['foto1']['type'] == 'image/png' OR $_FILES['foto1']['type'] == 'image/gif' OR $_FILES['foto1']['type'] == 'image/jpeg')
    {
$tips = 'jpg';
$type = array('image/jpeg' => 'jpg');
$name = $id.$nombrefoto1;
$destino1 =  "imagenes/productos/".$name;
$destino2 =  "imagenes/productos/detalle/".$name;
copy($ruta1,$destino1);
copy($ruta1,$destino2);

$ruta_imagen = $destino1;

$miniatura_ancho_maximo = 700;
$miniatura_alto_maximo = 500;

$info_imagen = getimagesize($ruta_imagen);
$imagen_ancho = $info_imagen[0];
$imagen_alto = $info_imagen[1];
$imagen_tipo = $info_imagen['mime'];

switch ( $imagen_tipo ){
  case "image/jpg":
  case "image/jpeg":
    $imagen = imagecreatefromjpeg( $ruta_imagen );
    break;
  case "image/png":
    $imagen = imagecreatefrompng( $ruta_imagen );
    break;
  case "image/gif":
    $imagen = imagecreatefromgif( $ruta_imagen );
    break;
}

$lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );

imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);


imagejpeg($lienzo, $destino1, 80);
}
}

?>


<form action="" method="post" enctype="multipart/form-data">
<label>Foto</label><br>  
<input name="foto1" id="foto1" type="file" id="foto1" required/>
<input name="guardar" type="submit" id="guardar" value="Subir imagen" />
<input type="reset" value="Cancelar"/>
</form>
<?
                          
if($_POST['guardar']){
    echo "La foto fue agregada con éxito a los directorios";
}
?>
</div>
<br><br>
<!-- ############################################### eliminacion de producto ######################################### -->
<div class="#">
  <p align="center">Apartado  eliminar productos</p>
<?PHP         
$elipro=$_POST['elipro'];
?>
<form action="" method="post" enctype="multipart/form-data">
<label>Nombre</label><br>  
<input name="elipro" type="text" required>
<input type="submit" name="eliminar" value="Eliminar" />
<input type="reset" value="Cancelar"/>
</form>
<?                           
if($_POST['eliminar']){ 
include('Connections/tienda.php');   
$query = "DELETE from producto where nom_pro='".$elipro."'";  
$result = mysql_query($query);  
echo "<p>El producto ha sido eliminado con exito.</p> ";
}
?>
</div>
<br><br>
<!-- ############################################# resurtir producto ################################################## -->
<div class="#">
  <p align="center"> Apartado resurtir productos</p>
<?PHP         
$resu = $_POST['resur'];
$prod = $_POST['nomPro'];
?>
<form action="" method="post" enctype="multipart/form-data">
<label>Resurtir</label><br>
<input name="resur" type="number" required><br>
<label>Nombre</label><br>
<input name="nomPro" type="text" required><br><br><br>
<input name="resurtir" type="submit" value="resurtir" />
<input type="reset" value="Cancelar"/>
</form>
<br><br>
<?                           
if($_POST['resurtir']){ 
include('Connections/tienda.php'); 

 $sql = "SELECT * FROM producto where nom_pro='".$prod."'" ;
         $result = mysql_query($sql);
        $rowsresult = mysql_fetch_array($result);          
        $clave = $rowsresult['cve_pro'];

$query = "UPDATE producto SET cant_pro=cant_pro+".$resu." where nom_pro= '".$prod."'";
mysql_query($query);  

$query = "INSERT into resurtir(cve_res,fecha_res,cant_res,cve_pro) values(null,curdate(),'".$resu."','".$prod."',)";  
mysql_query($query); 


echo "<p>El producto ha sido resurtido con exito.</p> ";
}
?>
</div>
</div>
<footer>
   <div id="pie">
       <p>Copyright 2018 - Love Chic</p>
    </div>
</footer>
</body>
</html>

<?php require_once('Connections/tienda.php'); ?>
<?php
session_start();
if(!isset($_SESSION["user"])){
require_once('Connections/tienda.php'); 
     mysql_select_db($database_tienda) or die ("No se encuentra la base de datos especificada");
if (isset($_POST['login'])){
$login = $_POST['login'];
$password = $_POST['password'];
$valido = true;
 $consulta2 = "SELECT * FROM usuario where login='".$login."' AND password='".$password."'";
         $result = mysql_query($consulta2) or die (mysql_error());
         $filasn = mysql_num_rows($result);
         if ($filasn<=0 || isset($_GET['nologin']) ){
             
             $valido = false;
         }else{
        $rowsresult=mysql_fetch_array($result);          
        $_SESSION['cve_usu']= $rowsresult['cve_usu'];
             $valido=true;
             //guardamos en sesion el carnet del usuario ya que ese es el identificados en la base de datos
             $_SESSION["login"] = $login;
             header("location:cat_blusas.php?login=true");
				echo '<script type=\"text/javascript\">alert(\"Gracias por registrarse\");</script>';

         }
}

	}else{
		$_SESSION["user"];
		
		}
		
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_listado = 9;
$pageNum_listado = 0;
if (isset($_GET['pageNum_listado'])) {
  $pageNum_listado = $_GET['pageNum_listado'];
}
$startRow_listado = $pageNum_listado * $maxRows_listado;

mysql_select_db($database_tienda, $tienda);
$query_listado = "SELECT * FROM producto WHERE cve_cat=1";
$query_limit_listado = sprintf("%s LIMIT %d, %d", $query_listado, $startRow_listado, $maxRows_listado);
$listado = mysql_query($query_limit_listado, $tienda) or die(mysql_error());
$row_listado = mysql_fetch_assoc($listado);

if (isset($_GET['totalRows_listado'])) {
  $totalRows_listado = $_GET['totalRows_listado'];
} else {
  $all_listado = mysql_query($query_listado);
  $totalRows_listado = mysql_num_rows($all_listado);
}
$totalPages_listado = ceil($totalRows_listado/$maxRows_listado)-1;

$queryString_listado = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_listado") == false && 
        stristr($param, "totalRows_listado") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_listado = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_listado = sprintf("&totalRows_listado=%d%s", $totalRows_listado, $queryString_listado);
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

<!-- /analycs seguimiento -->

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
                    echo "Salir"; } ?></a>
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
            	<div class="FL"><img src="img/bols.png"/></div>
                <div class="FR"></div>
        </div>
        <div class="productos" id="productos">
        <br />
    <br><table width="100%" height="100%" border="1" align="center">
	<?php 
	$contador=0;
	
	do { 
	if ($contador==0){
		?>
        <tr>
        <?php
        }
		$contador++;
		?>
          <td><a href="detalles.php?cve_pro=<?php echo $row_listado['cve_pro']; ?>"><img src="imagenes/productos/<?php echo $row_listado['imagen_pro']; ?>" width="200" height="200"></a>            
            <h3><?php echo $row_listado['nom_pro']; ?></h3>
            <p>$<?php echo $row_listado['precio_pro']; ?><br>
            
            </p>
            <form name="form1" method="post" action="carritotemp.php">
              <input type="image" name="imageField" id="imageField" src="imagenes/comprar.gif">
              <input name="nombre" type="hidden" id="nombre" value="<?php echo $row_listado['nom_pro']; ?>">
              <input name="precio" type="hidden" id="precio" value="<?php echo $row_listado['precio_pro']; ?>">
              <input name="cantidad" type="hidden" id="cantidad" value="1">
            </form>
            <p><br>
            </p>
          <p>&nbsp;</p></td>
            <?
			if ($contador==3){
				$contador=0;
		?>
        </tr><br>
        <?
			}
			?>
      
      <?php } while ($row_listado = mysql_fetch_assoc($listado)); ?>
      </table></div>
      <div id="paginacion">
  <table width="255" border="0"  align="center" >
    <tr>
      <td><?php if ($pageNum_listado > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_listado=%d%s", $currentPage, 0, $queryString_listado); ?>">Primero</a>
          <?php } // Show if not first page ?></td>
      <td> <?php if ($pageNum_listado > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_listado=%d%s", $currentPage, max(0, $pageNum_listado - 1), $queryString_listado); ?>">Anterior</a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_listado < $totalPages_listado) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_listado=%d%s", $currentPage, min($totalPages_listado, $pageNum_listado + 1), $queryString_listado); ?>">Siguiente</a>
          <?php } // Show if not last page ?></td>
      <td><?php if ($pageNum_listado < $totalPages_listado) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_listado=%d%s", $currentPage, $totalPages_listado, $queryString_listado); ?>">&Uacute;ltimo</a>
          <?php } // Show if not last page ?></td>
    </tr>
  </table>
</div>
   	</div>

    <div id="pie">
      <p>Copyright 2018 - Love Chic</p>
    </div>
    </div>
</body>
</html>
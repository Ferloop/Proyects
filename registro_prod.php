<?php
require("class.phpmailer.php");
session_start();
require_once('Connections/tienda.php'); 
     mysql_select_db($database_tienda) or die ("No se encuentra la base de datos especificada");
        
$nombrep = $_POST['nombrep'];
$precio = $_POST['preciop'];
$categoria = $_POST['categoriap'];
$cantidad = $_POST['cantidadp'];
$foto = $_POST['foto'];
$descripcion = $_POST['descripcionp'];
$color = $_POST['color'];


$sql = "SELECT * FROM categoria where categoria_cat='".$categoria."'" ;
         $result = mysql_query($sql);
        $rowsresult = mysql_fetch_array($result);          
        $claveCat = $rowsresult['cve_cat'];

$sql1 = "SELECT * FROM color where color_colo='".$color."'" ;
         $result1 = mysql_query($sql1);
        $rowsresult1 = mysql_fetch_array($result1);          
        $claveColor = $rowsresult1['cve_colo'];


$consulta="INSERT INTO producto (cve_pro,nom_pro,precio_pro,cant_pro,imagen_pro,descripcion_pro,cve_cat,cve_colo)
VALUES ( NULL ,'".$nombrep."',".$precio.",".$cantidad.",'".$foto."','".$descripcion."',".$claveCat.",".$claveColor.")"; //categoria color
mysql_query($consulta) or die(mysql_error());
echo"<script>alert('El producto ha sido registrado exitosamente')</script>";
$valido = true;
 $consulta2 = "SELECT  * FROM producto where nom_pro ='".$nombrep."' AND imagen_pro='".$foto."'";
         $result = mysql_query($consulta2) or die (mysql_error());
         $filasn = mysql_num_rows($result);
         if ($filasn<=0 || isset($_GET['nologin']) ){
             
             $valido = false;
         }else{
        $rowsresult=mysql_fetch_array($result);          
        
             header("location:indexadmin.php");
				echo "<script type='text/javascript'>alert('Registro se realizo exitosamente');</script>";

         }

?>
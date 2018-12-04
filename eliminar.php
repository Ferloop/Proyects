<?php 
$c=$_POST['cantidadactualizada'];
$nombre=$_POST['nombre'];
require_once('Connections/tienda.php'); 
 $query2 = "UPDATE producto SET cant_pro=cant_pro+".$c." where nom_pro='".$nombre."'";
            mysql_query($query2); 
            echo "<script> alert ('producto eliminado del carrito'); location.href='carrito.php'; </script>";
            
 ?>


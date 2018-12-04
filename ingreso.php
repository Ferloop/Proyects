<?php 
session_start();
require_once('Connections/tienda.php'); 
     mysql_select_db($database_tienda) or die ("No se encuentra la base de datos especificada");

$login=$_POST['login'];
$password=$_POST['password'];
$valido=true;
 $consulta2="SELECT * FROM usuario where login='".$login."' AND password='".$password."'";
         $result=mysql_query($consulta2) or die (mysql_error());
         $filasn= mysql_num_rows($result);
         if ($filasn<=0 || isset($_GET['nologin']) ){
             
             $valido=false;
             echo "Tu login o password son incorrectos !!!!";
             header("location:carrito.php");

         }else{
        $rowsresult=mysql_fetch_array($result);          
        $_SESSION['cve_usu']= $rowsresult['cve_usu'];
             $valido=true;
             //guardamos en sesion el carnet del usuario ya que ese es el identificados en la base de datos
             $_SESSION["login"]=$login;
             header("location:resumenc_compra.php?login=true");
				echo '<script type="text/javascript"> alert("Gracias por registrarse");</script>';

         }



 //header("location:carrito.php");

?>
<?php
require("class.phpmailer.php");
session_start();
require_once('Connections/tienda.php'); 
     mysql_select_db($database_tienda) or die ("No se encuentra la base de datos especificada");
        
$login = $_POST['login'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$appat = $_POST['paterno'];
$apmat = $_POST['materno'];
$fnac = $_POST['fnac'];
$tel = $_POST['telefono'];
$correo = $_POST['email'];
$ranusu = 2;
$orientacion = $_POST['orientacion'];
$pais = $_POST['pais'];
$estado = $_POST['estado'];
$ciudad = $_POST['ciudad'];
$colonia = $_POST['colonia'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$cp = $_POST['cp'];


$consulta = "insert into persona(cve_usu,fecha_usu,login,password,appat_usu,apmat_usu,nom_usu,fnac_usu,telefono,correo,calle,numero,orientacion,cp,ciudad,colonia,estado,pais) values(null,curdate(),'".$login."','".$password."','".$appat."','".$apmat."','".$nombre."','".$fnac."','".$tel."','".$correo."','".$calle."',".$numero.",'".$orientacion."',".$cp.",'".$ciudad."','".$colonia."','".$estado."','".$pais."')";
mysql_query($consulta) or die(mysql_error());
echo"<script>alert('La cuenta se ha creado exitosamente')</script>";
$valido = true;
 $consulta2 = "SELECT cve_usu,login,password FROM usuario where login='".$login."' AND password='".$password."'";
         $result = mysql_query($consulta2) or die (mysql_error());
         $filasn = mysql_num_rows($result);
         if ($filasn<=0 || isset($_GET['nologin']) ){
             
             $valido = false;
         }else{
        $rowsresult = mysql_fetch_array($result);          
        $_SESSION['cve_usu'] = $rowsresult['cve_usu'];
             $valido = true;
             //guardamos en sesion el carnet del usuario ya que ese es el identificados en la base de datos
             $_SESSION["login"] = $login;
             header("location:registro.php?login=true");
				echo '<script type="text/javascript">alert("Gracias por registrarse");</script>';

         }
$saludo = "Muchas Gracias por registrarse en nuestra tienda";
$correo_empresa = "Lovechicna93@outlook.com";
$empresa = "Tienda Love Chic";
$asunto = "Gracias Por Registrarse";

$mail = new PHPMailer();
$mail->Host = "la direccion de tu sitio web http://www.tusitio.com/";
$mail->From = $correo_empresa;
$mail->FromName = $empresa;
$mail->Subject = $asunto;
$mail->AddAddress($correo,"Bienvenido ".$nombre);
$mail->Body = $saludo;
$mail->AltBody = "Registro Exitoso";
$mail->Send();

 //header("location:carrito.php");

?>
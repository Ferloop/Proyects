<?php
require("class.phpmailer.php");
session_start();
if(isset($_SESSION['carrito'])){
$compras=$_SESSION['carrito'];
$pedido ="Pedido de productos Love Chic. <br><br>";
$total=0;
for($i=0;$i<=count($compras)-1;$i++){
if($compras[$i]!= NULL){
    $pedido .= $compras[$i]['nombre']."  ".$compras[$i]['precio']." X " . $compras[$i]['cantidad'].
    " Total: ".$compras[$i]['precio']*$compras[$i]['cantidad']." Pesos <br>";
    $total= $total + $compras[$i]['precio']*$compras[$i]['cantidad'];
   }
}

 $consult = "SELECT * FROM usuario where login='".$login."' AND password='".$password."'";
         $result = mysql_query($consult) or die (mysql_error());
         $filasn = mysql_num_rows($result);
         if ($filasn<=0 || isset($_GET['nologin']) ){
             
             $valido = false;
         }else{
            $rowsresult = mysql_fetch_array($result);          
            $_SESSION['cve_usu'] = $rowsresult['cve_usu'];
            include('Connections/tienda.php'); 
            $sql = "SELECT * FROM usuario where login='".$login."'" ;
            $result = mysql_query($sql);
            $rowsresult = mysql_fetch_array($result);          
            $clave = $rowsresult['cve_usu'];

            $query = "INSERT into venta(folio_ven,fecha_ven,total_ven,cve_usu) values(null,curdate(),'".$total."','".$clave."')";  
            mysql_query($query); 

$pedido .= "<br><br>Total: " . $total;
$nombre = $_POST['nombre'];
$correo= $_POST['email'];
$pedido .="<br><br>De: ".$nombre;
$asunto="Pedido Tienda Love Chic";
$empresa="Love Chic | ";
$correo_empresa="Lovechicna93@outlook.com";

$mail = new PHPMailer(true);
try {

$mail->Host = "direccion host";  //http://programacionphp.liriosdesaron.net/
$mail->From = $correo_empresa;
$mail->FromName = $empresa;
$mail->Subject = $asunto;
$mail->AddAddress($correo,"Compra a nombre del usuario".$nombre);
$mail->Body = $pedido;
$mail->AltBody = "Love Chic\n Estado de prueba PHPMailer\n\nEnviando saludos";
/*$mail->AddAttachment("images/foto.jpg", "foto.jpg");*/
$mail->Send();
echo 'Correo enviado exitosamente';  
} catch (Exception $e) {
  echo 'Error al enviar el correo: ', $mail->ErrorInfo;

}


    }
?>
<!DOCTYPE html>
<html>
<head>
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
    <h1>Usted est&aacute; siendo redireccionado a la plataforma de pago...</h1><br>
    <h1>por favor espere un momento.</h1>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" name="pago" id="pago">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="Lovechicna93@outlook.com">
    <input type="hidden" name="item_name" value="LoveChic">
    <input type="hidden" name="item_number" value="FM">
    <input type="hidden" name="amount" value="<? echo $total;?>">
    <input type="hidden" name="no_shipping" value="0">
    <input type="hidden" name="no_note" value="1">
    <input type="hidden" name="currency_code" value="MXN">
    <input type="hidden" name="lc" value="ES">
    <input type="hidden" name="bn" value="PP-BuyNowBF">
    <img alt="" border="0" src="https://www.paypal.com/es_ES/i/scr/pixel.gif" width="1" height="1">
    </form>
    <script >
    function someter(){
      document.pago.submit();
    }
    someter();
    
  </script>
<!--<form action="https://www.paypal.com/cgi-bin/webscr" method="post" name="pago" id="pago">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="BFSV96GA6P97S">
<input type="hidden" name="amount" value="<? //echo $total;?>">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>-->
</body>
</html>
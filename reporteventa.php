<html>  
<head>  
<TITLE>Love Chic</TITLE>
<link href="css/estilo.css" type="text/css" rel="stylesheet" media="all" />
<link rel="stylesheet" href="css/slide.css" type="text/css" media="screen" />
<script src="jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>  
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
  <!-- Sliding effect -->
  <script src="js/slide.js" type="text/javascript"></script>  
</head>  
<body>  
  <div id="toppanel">
  <div id="panel">
    <div class="content clearfix">
      <div align='center'>  

    </div>
   </div>
   </div> 
</div>
<div id="total">
    <div id="contenido">
        <div id="cabecera">
            <div id="nav">
      <ul>
        <li><a href="indexadmin.php" class="main">Inicio</a></li>
        <li><img src="img/naviseparator.gif" alt="" width="40" height="13"/></li>
         
         
        </ul>
  </div>
              <div class="FL"></div>
                <div class="FR"></div>
        </div> 
            
    <table border='1' cellpadding='0' cellspacing='0' width='600' bgcolor='#F6F6F6' bordercolor='#FFFFFF'>  
    <tr>  
      <td width='150' style='font-weight: bold' align="center">Folio</td>  
      <td width='150' style='font-weight: bold' align="center">Fecha</td>  
      <td width='150' style='font-weight: bold' align="center">Total</td>  
      <td width='150' style='font-weight: bold' align="center">Usuario</td>  
    </tr> 

<?php  
include('Connections/tienda.php');  

    $query = "select * from venta";     // Esta linea hace la consulta 
    $result = mysql_query($query);  

    while ($registro = mysql_fetch_array($result)){  
echo "  
    <tr>  
      <td width='150'>".$registro['folio_ven']."</td>  
      <td width='150'>".$registro['fecha_ven']."</td>  
      <td width='150'>".$registro['total_ven']."</td>
      <td width='150'>".$registro['cve_usu']."</td>  
      <td width='150'></td>  

    </tr>  
";  
}  

?>  
   </table>  
    </div>
 </div>      
</body>  
</html> 


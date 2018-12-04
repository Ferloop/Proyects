<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Love Chic</title>
<link href="css/estilo.css" type="text/css" rel="stylesheet" media="all" />
<link rel="stylesheet" href="css/slide.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="img/logoLC.ico" type="image/ico"/>
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
	<div id="total">
   	<div id="contenido">
	    	<form action="indexadmin.php" method="post">
					<h1>Login administrador</h1><br><br>
					<label class="grey" for="login">Usuario:</label>
					<input class="field" type="text" name="login" id="login" value="" size="23" />
					<label class="grey" for="password">Contraeña:</label>
					<input class="field" type="password" name="password" id="password" size="23" /><br><br>
	            	<label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> &nbsp;Recordarme</label>
        			<div class="clear"></div>
					<input type="submit" name="submit" value="Entrar" class="bt_login" />
					<br>
					<a class="lost-pwd" href="restablecerPass.php">Reestablecer contraseña</a>
				</form>
        <div id="pie">
    	     <p>Copyright 2018 - Love Chic</p>
        </div>
    </div>
    </div>

</body>
</html>
<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
# respaldar base en cmd  $ mysqldump --user=root --password=root tienda > basedetienda.sql
$hostname_tienda = "localhost";
$database_tienda = "tienda";
$username_tienda = "root";
$password_tienda = "fernando";
$tienda = mysql_pconnect($hostname_tienda, $username_tienda, $password_tienda) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
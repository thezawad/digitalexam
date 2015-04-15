<?php
include "settings.php";
mysql_connect($db_host,$db_username,$db_password);
@mysql_select_db($db) or die("Couldn't connect to database. Please check your database credentials");
?>

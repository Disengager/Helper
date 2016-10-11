<?php
if($_GET)
{
	include_once '../settings.php';
	mysql_connect(host, user, password);
	mysql_select_db(db);
	mysql_query("SET NAMES 'utf8';"); 
	mysql_query("SET CHARACTER SET 'utf8';"); 
	load();
	inseptionrequest();
	$query = "UPDATE `helper_main` SET `Now_str`=`New_str` WHERE `ID_main` = '$_GET[id]'";
	mysql_query($query);
}
?>
<?php
	session_start();
	include_once '../settings.php';

	mysql_connect(host, user, password);
	mysql_select_db(db);
	mysql_query("SET NAMES 'utf8';"); 
	mysql_query("SET CHARACTER SET 'utf8';"); 
	load();
	
	if($_GET['type']==1)
	{
		mysql_query("UPDATE `helper_user` SET `bg`='$_GET[link]' WHERE `ID_user` = $_COOKIE[ID]");
	}
	else if($_GET['type']==0)
	{
		mysql_query("UPDATE `helper_user` SET `color`='$_GET[link]' WHERE `ID_user` = $_COOKIE[ID]");
	}
	else if($_GET['type']==2)
	{
		mysql_query("UPDATE `helper_user` SET `theme`='$_GET[link]' WHERE `ID_user` = $_COOKIE[ID]");
	}
?>
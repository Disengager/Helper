<?php
	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	include_once '../settings.php';
	mysql_connect(host, user, password);
	mysql_select_db(db);
	mysql_query("SET NAMES 'utf8';"); 
	mysql_query("SET CHARACTER SET 'utf8';");
	load();
	inseptionrequest();
	$strSQL = mysql_query("DELETE FROM `helper_main` WHERE `ID_group` = '$_GET[ID_group]' AND `ID_user` = '$_COOKIE[ID]'"); 
	$strSQL = mysql_query("DELETE FROM `helper_group` WHERE `ID_group` = '$_GET[ID_group]' AND `ID_user` = '$_COOKIE[ID]'"); 
?>	
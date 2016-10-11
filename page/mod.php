<?php
session_start();
include_once '../settings.php';

if($_GET['mod'])
{
	setcookie("Mode_bool", $_GET['mod'], time()+36000000); 
	setcookie("Mode_bool", $_GET['mod'], time()+36000000,'/');
}
?>
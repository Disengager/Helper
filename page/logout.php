<?php
	include_once '../settings.php';
	delcookie();
	exit(header('Location: /page/login.php?type=login'));
?>	
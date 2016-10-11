<html>
<title>Добавление категории</title>
<head></head>
<body>
<form action = 'loh.php' method = 'Post'>
<br><br><textarea name = 'memo'></textarea>
<br><br><input type = 'submit'>
</form>
</body>
</html>
<?php
session_start();
include_once '../settings.php';
load();
inseptionrequest();
mysql_connect(host, user, password);
mysql_select_db(db);
 
if ($_POST['memo']){
	$number = 1;
	
	
	$begin = explode('<br>',$_POST['memo']);
	for ($i = 0; $i < count($begin); $i++)
	{
		$bbegin = explode('[=_=]',$begin[$i]);
		$names[$i] = $bbegin[0];
		$now[$i] = $bbegin[1];
		$links[$i] = $bbegin[4];
		$templ = GetTemplate($links[$i]);
		echo "$links[$i]<br>";
	}
}
	
?>
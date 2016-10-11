<?php
//echo $_SESSION['Password'];
include_once 'settings.php';

mysql_connect(host, user, password);
mysql_select_db(db);
$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $_GET['s']);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
$homepage = curl_exec($handle);
curl_close($handle);
$tempnew = 	SplitS($homepage, "span>Серия [=_=][",2);
echo $tempnew;
?>
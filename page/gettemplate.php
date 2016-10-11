<?php
include_once '../settings.php';

mysql_connect(host, user, password);
mysql_select_db(db);
load();
inseptionrequest();
echo GetTemplate($_GET['sn']);
?>
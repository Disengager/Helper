<?php
	include_once '../settings.php';
		
	if($_GET['lg'])
	{
		mysql_connect(host, user, password);
		mysql_select_db(db);
		mysql_query("SET NAMES 'utf8';"); 
		mysql_query("SET CHARACTER SET 'utf8';");

		$row = mysql_fetch_assoc(mysql_query("SELECT * FROM `helper_user` WHERE `Login` = '$_GET[lg]'"));
		if(!$row) die;
		
		$secretcode =  md5('helperhelper'.md5('pcpc'.$_GET['lg'].'decode').md5('secretcode'));
		
		if($_GET['sc'] != $secretcode) die;
		
		$strSQL = mysql_query("SELECT * 
		FROM  `helper_main`
		WHERE  `ID_user` = $row[ID_user]  GROUP BY Link"); 
		
		while($row = mysql_fetch_array($strSQL)) 
		{
			$rorow = mysql_fetch_assoc(mysql_query("SELECT * FROM `helper_template` WHERE `ID_template` = $row[ID_tamplate]"));
			$tegs = explode('[=_=]', $rorow['Now_str_in_out']);
			echo "$row[Link]__=__$row[ID_main]__=__$rorow[Now_str_in_out]==_==";
		}
		
	}

?>
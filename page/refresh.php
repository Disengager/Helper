<?php
	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	include_once '../settings.php';
	require_once '../lib/Threads.php';
	mysql_connect(host, user, password);
	mysql_select_db(db);
	mysql_query("SET NAMES 'utf8';"); 
	mysql_query("SET CHARACTER SET 'utf8';");
	load();
	inseptionrequest();
	// if($_POST)
	//{
		$strSQL = mysql_query("SELECT * 
		FROM  `helper_main`
		WHERE  `ID_user` = $_COOKIE[ID] GROUP BY Link"); 
		
		$countanother = array();
		$indexanother = -1;
		$index = -1;
		
		$userthost = mysql_query("SELECT * FROM `helper_userhost` WHERE `ID_user` = $_COOKIE[ID]"); 
		while($userthostrow = mysql_fetch_array($userthost)) 
		{
			$indexanother++;
			$countanother[$indexanother][0] = $userthostrow['In'];
			$countanother[$indexanother][1] = $userthostrow['Out'];
			$login = $_COOKIE['Login'];
			$Thread->Create(function() use ($userthostrow, $login){
				$secretcode = md5('helperhelper'.md5('pcpc'.$_COOKIE['Login'].'decode').md5('secretcode'));
				$link = $userthostrow['Link']. '?in=' .$userthostrow['In']. '&out=' .$userthostrow['Out']. '&link=http://helper.disengager.org/page/list.php&lg='.  $login. '&sc=' .$secretcode;
				$handle = curl_init();
				curl_setopt($handle, CURLOPT_URL, $link);
				curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
				curl_setopt($handle, CURLOPT_TIMEOUT, 10);
				$homepage = curl_exec($handle);
				curl_close($handle);
				
				
				$newitemlist = explode('=__=', $homepage);
				
				foreach ($newitemlist as $value) 
				{
					$newitem = explode('__=__', $value);
					
					mysql_connect(host, user, password);
					mysql_select_db(db);
					mysql_query("SET NAMES 'utf8';"); 
					mysql_query("SET CHARACTER SET 'utf8';");
					
					mysql_query("UPDATE `helper_main` SET `New_str`= '$newitem[1]' WHERE `ID_main` = '$newitem[0]'"); 	
					echo 'ID: ' .$newitem[0]. ' Newstr: ' .$newitem[1]. '';
				}
			});
		}
		
		while($row = mysql_fetch_array($strSQL)) 
		{
			$index++;
			$boolean = true;
			foreach ($countanother as $value) 
			{
				if($index > $value[0] && $index < $value[1]) $boolean = false;
			}
			if($boolean)
			$Thread->Create(function() use ($row){
				mysql_connect(host, user, password);
				mysql_select_db(db);
				mysql_query("SET NAMES 'utf8';"); 
				mysql_query("SET CHARACTER SET 'utf8';");
				echo " <br> $row[Link] <br>";
				$handle = curl_init();
				curl_setopt($handle, CURLOPT_URL, $row['Link']);
				curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
				$homepage = curl_exec($handle);
				curl_close($handle);
				$rorow = mysql_fetch_array(mysql_query("SELECT * FROM `helper_template` WHERE `ID_template` = $row[ID_tamplate]"));
				$searchid = 1;
				if ($rorow['Search_id'])
					$searchid = $rorow['Search_id'];
				$tempnew = 	SplitS($homepage, $rorow['Now_str_in_out'], $searchid);
				echo $tempnew;
				$strstrSQL = mysql_query("UPDATE `helper_main` SET `New_str`= '$tempnew' WHERE `ID_main` = '$row[ID_main]'"); 	
			});
		};
		$Thread->Run(); 
	//}
?>	
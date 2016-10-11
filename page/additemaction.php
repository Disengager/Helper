<?php
	session_start();
	include_once '../settings.php';

	mysql_connect(host, user, password);
	mysql_select_db(db);
	mysql_query("SET NAMES 'utf8';"); 
	mysql_query("SET CHARACTER SET 'utf8';"); 
	load();
	inseptionrequest();

	if($_POST)
	{
		$number = 1;
		$addlink = '';
			if($_POST['LinkAdd'])
				$addlink = $_POST['LinkAdd'];

		$query = "SELECT * FROM `helper_main` WHERE `ID_user` = '$_COOKIE[ID]' AND `ID_group` = '$_POST[Group]' ORDER BY `Number_in_group` DESC LIMIT 0 , 1;";
		$rs = mysql_fetch_assoc(mysql_query($query));
		if($rs['Number_in_group'])
			$number = $rs['Number_in_group'] + 1;

		if($_POST['Objectlink'] && $_POST['Name'] && $_POST['NowStr'] && $_POST['Template'] && $_POST['Group'])
		{
			mysql_query("INSERT INTO `helper_main` VALUES ('', '$number', '$_POST[Group]', '$_POST[Name]', '', '$_POST[Template]', $_COOKIE[ID], '$_POST[Objectlink]', '$_POST[NowStr]', '$addlink')");

			$rs2 = mysql_insert_id(); 
			if($_POST['Image'])
			{
				
				if($rs2)
				{
					copy('../' .$_POST['Image'], '../img/' .$rs2. '.jpg');
					unlink('../' .$_POST['Image']);
					
				}
			}

			header('Location: ../');
			exit;
		}

	}


	$IdTem = '';
	$link = '';
	$name = '';
	$new = '';
	$imagepath = '';

	$IdTem = $_GET['IdTem'];
	$link = $_GET['link'];


	if($_POST['Template'])
	{
		$IdTem = $_POST['Template'];
		$link = $_POST['Objectlink'];
	}	
	

	$row = mysql_fetch_array(mysql_query("SELECT * FROM `helper_template` WHERE `ID_template` =  $IdTem"));
	$searchid = 1;
		if ($row['Search_id'])
			$searchid = $row['Search_id'];

	$homepage = '';
	if(!$_GET['posterlink']) 
	{
		try 
		{
			$handle = curl_init();
			curl_setopt($handle, CURLOPT_URL, $link);
			curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
			$homepage = curl_exec($handle);
			curl_close($handle);

			
			$name = SplitS($homepage, $row['Title_in_out']);
			$new = SplitS($homepage, $row['Now_str_in_out'], $searchid);
		}
		catch (Exception $e) 
		{

		}
	}


	


	if($_POST['Template'])
	{
		try 
		{
			$name = SplitS($homepage, $row['Title_in_out']);
			if(strlen($name) > 650)
				$name = stristr($name, 650);
			$new = SplitS($homepage, $row['Now_str_in_out'], $searchid);
			if(strlen($new) > 650)
				$new = stristr($new, 650);
		}
		catch (Exception $e) 
		{

		}
	}


	echo '<div class="StrName"><code>' .$name. '</code></div>';
	echo '<div class="StrNow"><code>' .$new. '</code></div>';


	$img = '';
	if($_GET['posterlink']) 
	{
		$img = $_GET['posterlink'];
	}
	else 
	{
		try 
		{
			$img = SplitS($homepage, $row['Image_in_out']);
		}
		catch (Exception $e) 
		{

		}	
	}

	if($_POST['posterlink'])
	{
		$img = $_POST['posterlink'];
	}



	$path = 'img/' .$_COOKIE['ID'] . time(). '.jpg';
	$path2 = '../' .$path;
	file_put_contents($path2, file_get_contents($img));


	crop("$path2", 0, 0, 200, 300);


	echo '<div class="StrImg">' .$path. '</div>';


	if($_POST['Template'])
	{
		$imagepath = $path;
		$addlink = '';
			if($_POST['LinkAdd'])
				$addlink = $_POST['LinkAdd'];

		mysql_query("INSERT INTO `helper_main` VALUES ('', '$number', '$_POST[Group]', '$name', '', '$_POST[Template]', $_COOKIE[ID], '$_POST[Objectlink]', '$new', '$addlink')");
		$rs2 = mysql_insert_id(); 

    	copy($path2, '../img/' .$rs2. '.jpg');
		unlink($path2);


		header('Location: ../');
		exit;
	}



	
	  function crop($image, $x_o, $y_o, $w_o, $h_o) {
    if (($x_o < 0) || ($y_o < 0) || ($w_o < 0) || ($h_o < 0)) {
      echo "Некорректные входные параметры";
      return false;
    }
    $old = $w_o;

    $src=ImageCreateFromJPEG ($image);
    $size=GetImageSize ($image);
    $iw=$size[0];
    $ih=$size[1];
    for($i = 1; $i < 300; $i++)
    {
      $koe=$iw/$w_o;
      $new_h=ceil ($ih/$koe);
      if($new_h >= $h_o)
        break;
      $w_o++;
    }
    
    $dst=ImageCreateTrueColor ($old, $new_h);
    ImageCopyResampled ($dst, $src, 0, 0, 0, 0, $w_o, $new_h, $iw, $ih);
    ImageJPEG ($dst, $image, 100);

    $w_o = $old;

    
  }

	$content = array('strname' => 'Название', 'strnow' => 'Последняя строка');
?>


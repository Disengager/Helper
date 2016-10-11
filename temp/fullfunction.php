<?php
	define ('host', 'localhost'); //хост mysql
	define ('user', 'disengager_u22');  //пользователь базы
	define ('password', 'Pj3u4hqx'); //пароль пользователя
	define ('db', 'disengager_gordeevkup'); //база данных
	define ('book', 'pr_book');
	define ('storyform', 'storycreater_story');

	mysql_connect(host, user, password);
	mysql_select_db(db);
	mysql_query("SET NAMES 'utf8';"); 
	mysql_query("SET CHARACTER SET 'utf8';");
	
	function sqlsl($fromst)
	{
		return mysql_fetch_assoc(mysql_query("SELECT * FROM $fromst")); 
	}
	
	function sqlsl2($from, $where)
	{
		return  mysql_fetch_assoc(mysql_query("SELECT * FROM $from WHERE $where")); 
	}

	function sqlup($from, $query)
	{
		mysql_query("UPDATE $from SET $query");
	}

	function sqlup2($from, $query, $where)
	{
		mysql_query("UPDATE $from SET $query WHERE $where");
	}

	function sqlis($from, $query)
	{
		mysql_query("INSERT INTO $from VALUES ($query)");
	}

	function redir($page)
	{
		exit(header('Location: ' .$page));
	}
	function crbl($clas)
	{
		echo '<div class="' .$clas. '">';
	}

	function crbl2($clas, $style)
	{
		echo '<div class="' .$clas. '" style="' .$style. '"">' ;
	}
	
		function endbl()
	{
		echo '</div>';
	}
	
	function head($title)
	{
		echo '<html><head><title>' .$title. '</title><link href="style.css" rel="stylesheet" type="text/css"><script src="//code.jquery.com/jquery-1.12.0.min.js"></script></head>';
	}
	
	function crform($action)
	{
		echo '<form method="POST" action="' .$action. '">';
	}
	function endform()
	{
		echo '</form>';
	}
	function crobj($type, $name, $placeholder)
	{
		if($type && $name && $placeholder)
			echo '<br><input type="' .$type. '"  name="' .$name. '" placeholder="' .$placeholder. '" maxlength="15" pattern="[A-Za-z-0-9]{5,15}" title="Не менее 5 и не более 15 латинских символов или цифр." required>';
		if(!$placeholder)
			echo '<br><input type="' .$type. '" value="' .$name. '">';
	}
	

	function gettrye($arg1, $arg2 = '[=_=]', $arg3 = '[=_=]', $arg4 = '[=_=]', $arg5 = '[=_=]', $arg6 = '[=_=]')
	{
		$result = false;
		if($arg1) $result = true;
		if($arg2) if($arg2 == '[=_=]') $result = false;
		if($arg3) if($arg3 == '[=_=]') $result = false;
		if($arg4) if($arg4 == '[=_=]') $result = false;
		if($arg5) if($arg5 == '[=_=]') $result = false;
		if($arg6) if($arg6 == '[=_=]') $result = false;

		return $result;

	}
	function deletebook($id)
	{
		mysql_query("DELETE FROM `pr_extr` WHERE `Book` = $id");
		mysql_query("DELETE FROM `pr_book` WHERE `ID_book` = $id");
	}

	function logined()
	{
/* 		if(!$_SESSION['Login'] && !$_SESSION['Password'])
			redir('login.php?type=login');
		$usr = sqlsl2('pr_user', "`Login`='$_SESSION[Login]' AND `Password`='$_SESSION[Password]'")[' ID_user'];	
		if(!$usr)
			redir('login.php?type=login');
		return $usr; */
		return '';
	}
	
	function createThumbnail($filename) {
	$final_width_of_image = 100; //Размер изображения которые Вы хотели бы получить (И ШИРИНА И ВЫСОТА)
	$path_to_image_directory = ''; //Папка, куда будут загружаться полноразмерные изображения
	$path_to_thumbs_directory = '';//Папка, куда буду тзгружать миниатюры

	if(preg_match('/[.](jpg)$/', $filename)) {
			$im = imagecreatefromjpeg($path_to_image_directory . $filename);
		} else if (preg_match('/[.](gif)$/', $filename)) {
			$im = imagecreatefromgif($path_to_image_directory . $filename);
		} else if (preg_match('/[.](png)$/', $filename)) {
			$im = imagecreatefrompng($path_to_image_directory . $filename);
		} //Определяем формат изображения
		
		$ox = imagesx($im);
		$oy = imagesy($im);
		
		$nx = $final_width_of_image;
		$ny = floor( $oy * ( $nx / $ox ));
		
		$nm = imagecreatetruecolor($nx, $ny);
		
		imagealphablending($nm, false);
		imagesavealpha($nm, true);
				
		imagecopyresampled($nm, $im, 0,0,0,0,$nx,$ny,$ox,$oy);
		
		if(!file_exists($path_to_thumbs_directory)) {
	/* 	  if(!mkdir($path_to_thumbs_directory)) {
			   die("Возникли проблемы! попробуйте снова!");
		  }  */
		   }

		imagejpeg($nm, $path_to_thumbs_directory .'sd'. $filename, 100);
		$tn = '<img src="' . $path_to_thumbs_directory . $filename . '" alt="image" />';
		$tn .= '<br />Поздравляем! Ваше изображение успешно загружено и его миниатюра удачно выполнена. Выше Вы можете просмотреть результат:';
	}//Сжимаем изображение, если есть оишибки, то говорим о них, если их нет, то выводим получившуюся миниатюру

?>
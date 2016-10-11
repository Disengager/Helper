<?php
define ('host', 'localhost'); //���� mysql
define ('user', '');  //������������ ����
define ('password', ''); //������ ������������
define ('db', ''); //���� ������
define ('pathimage', 'img/');  //���� � ������������
define ('pathcss', 'css/'); //���� � css ������
define ('pathjs', 'js/');  //���� � js ������
define ('pathfonaw', 'css/font-awesome/css/');
define ('main', 'index.php');   //������ �� �������� ���������

$connectdb = mysqli_connect(host, user, password, db); //����������� � ���� ������
//mysql_query("SET NAMES 'utf8';");
//mysql_query("SET CHARACTER SET 'utf8';");



function head($title, $newstring='', $newpath='', $newprol = '', $newend = '')	//������� ����������� ����� �����
{
	$content = '<!DOCTYPE HTML><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
	<meta name="description" content="" />
	<script type=\'text/javascript\' src=\'' .pathjs. 'engine.js\'></script>
	<script type=\'text/javascript\' src=\'' .pathjs. 'jquery-2.1.4.min.js\'></script>
	<script type=\'text/javascript\' src=\'' .pathjs. 'spin.js\'></script>
	<script type=\'text/javascript\' src=\'' .pathjs. 'spin.min.js\'></script>
	<script type=\'text/javascript\' src=\'' .pathjs. 'iconate.min.js\'></script>
	<script type=\'text/javascript\' src=\'' .pathjs. 'iconate.js\'></script>
	<script type=\'text/javascript\' src=\'' .pathjs. 'ripple.js\'></script>
	<link href="'.pathimage.'favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link href="' .pathcss. 'style.css" rel="stylesheet" type="text/css">
	<link href="' .pathcss. 'effect.css"" rel="stylesheet" type="text/css">
	<link href="' .pathcss. 'thirdeffect.css" rel="stylesheet" type="text/css">
	<link href="' .pathcss. 'iconate.min.css" rel="stylesheet" type="text/css">
	<link href="' .bg. '" rel="stylesheet" type="text/css">
	<link href="' .theme. '" rel="stylesheet" type="text/css">
	<link href="' .color. '" rel="stylesheet" type="text/css">
	<link href="' .pathfonaw. 'font-awesome.css" rel="stylesheet">' .$newprol. '' .$newpath. '' .$newend. '
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>' .$title. '</title> </head>
	<body>' .$newstring. '<div class="wrap">';
	echo $content;
}

function head2()
{
	$content = '<!DOCTYPE HTML><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
	<meta name="description" content="" />
	<script type=\'text/javascript\' src=\'../' .pathjs. 'engine.js\'></script>
	<script type=\'text/javascript\' src=\'../' .pathjs. 'jquery-2.1.4.min.js\'></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<link href="../' .pathcss. 'style.css" rel="stylesheet" type="text/css">
	<link href="../'.pathimage.'favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link href="' .bg. '" rel="stylesheet" type="text/css">
	<link href="' .color. '" rel="stylesheet" type="text/css">
	<link href="' .theme. '" rel="stylesheet" type="text/css">
	<link href="../' .pathfonaw. 'font-awesome.css" rel="stylesheet">' .$newprol. '' .$newpath. '' .$newstring. '' .$newend. '
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>' .$title. '</title></head><body><div class="wrap">';
	echo $content;
}

function foot()
{
	echo '</div></body></html>';
}

function nonlogin()
{
	exit(header('Location: http://helper.disengager.org/page/login.php?type=login'));
}


function load()
{
	if ($_COOKIE['Login'])
	{
		$connectdb = mysqli_connect(host, user, password, db);
		$Row = mysqli_fetch_assoc(mysqli_query($connectdb,  "SELECT * FROM `helper_user` WHERE `Login` = '$_COOKIE[Login]'"));
		if ($Row['Password'] == $_COOKIE['Password'] && $Row['Active'] == 1)
		{
			define ('connect', true);

			if($Row['bg'])
				define ('bg', $Row['bg']);
			else define ('bg',pathcss. 'defaultbg.css');
			if($Row['color'])
				define ('color', $Row['color']);
			else define ('color', pathcss. 'defaultcolor.css');
			if($Row['theme'])
				define ('theme', $Row['theme']);
			else define ('theme', pathcss. 'defaulttheme.css');
		}
		else nonlogin();
	}
	else
	{
		define ('connect', false);
		define ('bg',pathcss. 'defaultbg.css');
		define ('color', pathcss. 'defaultcolor.css');
		define ('theme', pathcss. 'defaulttheme.css');
		nonlogin();
	}
}

function inseptionrequest()
{
	if($_SERVER['HTTP_REFERER'] != 'http://helper.disengager.org/')
	{
		exit(header('Location: http://helper.disengager.org/error.php'));
	}
}

function SplitS($text, $rrow, $ind = 1)
	{
		$bbegin = explode('[=_=]',$rrow);
		$bbb1 = explode($bbegin[0],$text);
		$bbb2 = explode($bbegin[1],$bbb1[$ind]);
		return $bbb2[0];
	}

function GetTemplate($StrName)
	{
	$strSQL = mysql_query("SELECT * FROM  `helper_template`");
	$strname = strtolower($StrName);
	while($row = mysql_fetch_array($strSQL)) {
		if (strpos(strtolower($strname),strtolower($row['Name'])) !== false)
		$IDT = $row['ID_template'];
	};
	return $IDT;
	}

function delcookie()
{
	if ($_COOKIE['Login'])
	{
		setcookie("Cookie", '', time()-36000000, '/');
		setcookie("Login", '', time()-36000000, '/');
		setcookie("Password", '', time()-36000000,'/');
		setcookie("Mode_bool", '', time()-36000000,'/page');
		setcookie("Mode_bool", '', time()-36000000,'/');
		setcookie("ID", '', time()-36000000,'/');
		setcookie("ID", '', time()-36000000,'/page');
		define ('connect', false);
	}
}
?>

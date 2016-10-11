<?php
session_start();
include_once '../settings.php';

head2('Helper');

if($_COOKIE['Password'])
{
	
	exit(header('Location: ../'));
}

function FormChars ($p1) 
{
	return nl2br(htmlspecialchars(trim($p1), ENT_QUOTES), false);
}
function GenPass ($p1, $p2) 
{
	return md5('helperhelper'.md5('pcpc'.$p1.'decode').md5('words'.$p2.'775'));
}
function getCurlData($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
    $curlData = curl_exec($curl);
    curl_close($curl);
    return $curlData;
}

if($_GET['type'] == 'login')
{
	$pagename = 'Авторизация';
	$pagelink = 'login.php?type=loginadd';
	$pagebutton = '    Войти     ';
	$pageaddvence = '<br>Если у вас нет аккаунта - <a href="login.php?type=register">зарегистрируйтесь</a>';
}
else if($_GET['type'] == 'register')
{
	$pagename = 'Регистрация';
	$pagelink = 'login.php?type=registeradd';
	$pagebutton = '    Зарегистрироваться     ';
	$inputs = '<br><input type="email" name="Email" placeholder="E-Mail" required>';
}
else if($_GET['type'] == 'loginadd')
{
	$_POST['Login'] = FormChars($_POST['Login']);
	$_POST['Password'] = GenPass(FormChars($_POST['Password']), $_POST['Login']);

	
	if (!$_POST['Login'] or !$_POST['Password']) 
	{
		exit('Поля Логин или Пароль не заполнены');
	}

	$Row = mysqli_fetch_assoc(mysqli_query($connectdb,  "SELECT * FROM `helper_user` WHERE `Login` = '$_POST[Login]'"));
	if ($Row['Login'] == $_POST['Login']) 
	{
		if ($Row['Password'] == $_POST['Password'])
		{
			setcookie("Cookie", $Row['Cookie_str'], time()+36000000, '/');  
			setcookie("Login", $Row['Login'], time()+36000000, '/'); 
			setcookie("Password", $Row['Password'], time()+36000000,'/');  
			setcookie("Mode_bool", $Row['Mode_bool'], time()+36000000,'/page'); 
			setcookie("Mode_bool", $Row['Mode_bool'], time()+36000000,'/'); 
			setcookie("ID", $Row['ID_user'], time()+36000000,'/');
			setcookie("ID", $Row['ID_user'], time()+36000000,'/page'); 
			exit(header('Location: ../'));
		}		
	}	
	else 
		{
			exit('Неверный логин или пароль <br> <a href="login.php?type=login">Назад</a>');
		}
	die;
}
else if($_GET['type'] == 'registeradd')
{
	$_POST['Login'] = FormChars($_POST['Login']);
	$_POST['Email'] = FormChars($_POST['Email']);
	$ClPass = $_POST['Password'];
	$_POST['Password'] = GenPass(FormChars($_POST['Password']), $_POST['Login']);

	if (!$_POST['Login'] or !$_POST['Password']) 
	{
		exit('Невозможно обработать форму.');
	}

	$Row = mysqli_fetch_assoc(mysqli_query($connectdb, "SELECT `ID_user`, `Login`, `Password`, `Mode_bool` FROM `helper_user` WHERE `Login` = '$_POST[Login]'"));
	if ($Row['Login']) 
		exit('Логин <b>'.$_POST['Login'].'</b> уже используется <br> <a href="login.php?type=register">Назад</a>');
	
	$Row = mysqli_fetch_assoc(mysqli_query($connectdb, "SELECT `ID_user`, `Login`, `Password`, `Mode_bool`,  `Email` FROM `helper_user` WHERE `Email` = '$_POST[Email]'"));
	if ($Row['Email']) 
		exit('Email <b>'.$_POST['Email'].'</b> уже используется <br> <a href="login.php?type=register">Назад</a>');
	 
	

	$recaptcha=$_POST['g-recaptcha-response'];
	if(!empty($recaptcha))
	{
		$google_url="https://www.google.com/recaptcha/api/siteverify";
		$secret='6Lf50xsTAAAAABByo_DLMqouz8elkwlBcUp3HmYq';
		$ip=$_SERVER['REMOTE_ADDR'];
		$url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
		$res=getCurlData($url);
		$res= json_decode($res, true);
		if($res['success'])
		{

		}
		else
		{
			exit('Капча не приянта <br> <a href="login.php?type=register">Назад</a>');

		}
	}
	else
	{
		exit('Капча не приянта <br> <a href="login.php?type=register">Назад</a>');

	}
	
	$Code = str_replace('=', '', base64_encode($_POST['Email']));
	mail($_POST['Email'], 'Регистрация на helper.disengager.org', 
	"Ваш логин: $_POST[Login]
	 Ваш пароль:".$ClPass."
	 Ссылка для активации: http://helper.disengager.org/page/login.php?type=confirm&lnk=".substr($Code, -5).substr($Code, 0, -5), 'From: mail.disengager.org');
	
	$cook = GenPass(FormChars($_POST['Password']), $_POST['Login']);
	mysqli_query($connectdb, "INSERT INTO `helper_user` VALUES ('', '$_POST[Login]', '$_POST[Password]', '0', '$_POST[Email]', '0', '', '','')");
	exit('Регистрация акаунта успешно завершена. На указанный E-mail адрес <b>'.$_POST['Email'].'</b> отправленно письмо о подтверждении регистрации. <a href="login.php?type=register">Назад</a>');
		
	exit(header('Location: ../'));

	die;
}
else if($_GET['type'] == 'confirm')
{
	$Email = base64_decode(substr($_GET['lnk'], 5).substr($_GET['lnk'], 0, 5));
	if (strpos($Email, '@') !== false) {
		mysqli_query($connectdb, "UPDATE `helper_user`  SET `active` = 1 WHERE `Email` = '$Email'");
		exit('<center>Email подтверждён. <a href="login.php?type=register">Войти</a></center>'.$Email );
		
	}
}
?>
<center>
<div class="fullscreenline" style="margin-top: 20px;"></div>
<section class="regregisterblock">
<div class="registercaption"><?php echo $pagename; ?></div>
<form  method="POST" action="<? echo $pagelink; ?>" class="registerform">
<?php echo $inputs; ?>
<br><input type="text" name="Login" placeholder="Логин" maxlength="10" pattern="[A-Za-z-0-9]{3,10}" title="Не менее 3 и не более 10 латинских символов или цифр." required>
<br><input type="password"  name="Password" placeholder="Пароль" maxlength="15" pattern="[A-Za-z-0-9]{1,15}" title="Не менее 1 и не более 15 латинских символов или цифр." required>
<?php if($inputs) echo '<br><br>    <div class="g-recaptcha" data-sitekey="6Lf50xsTAAAAAJiF6PbPSNJ15oB2H-3abinm2Rgj"></div>'; ?>
<div class="buttonblock">
	<?php echo $pageaddvence;?>
	<br><input type="submit" value="<?php echo $pagebutton;?>">
</div>

</form>
</section>
<div class="fullscreenline" style="margin-top: 20px;"></div>
</center>
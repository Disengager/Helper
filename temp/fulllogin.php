<?php
session_start();
include_once 'function.php';
head('Регистрация');


function FormChars ($p1) 
{
	return nl2br(htmlspecialchars(trim($p1), ENT_QUOTES), false);
}
function GenPass ($p1, $p2) 
{
	return md5('helperhelper'.md5('pcpc'.$p1.'decode').md5('words'.$p2.'775'));
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
}
else if($_GET['type'] == 'loginadd')
{
	$_POST['Login'] = FormChars($_POST['Login']);
	$_POST['Password'] = GenPass(FormChars($_POST['Password']), $_POST['Login']);

	
	if (!$_POST['Login'] or !$_POST['Password']) 
	{
		exit('Невозможно обработать форму.');
	}

	$Row = mysql_fetch_assoc(mysql_query("SELECT * FROM `pr_user` WHERE `Login` = '$_POST[Login]'"));
	if ($Row['Login'] == $_POST['Login']) 
	{
		echo $Row['Password']. '<br>' .$_POST['Password'];
		if ($Row['Password'] == $_POST['Password'])
		{
			$_SESSION['Login'] = $_POST['Login'];
			$_SESSION['Password'] = $_POST['Password'];
			$_SESSION['FIO'] = $_POST['FIO'];
			exit(header('Location: /pr'));
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
	$_POST['Password'] = GenPass(FormChars($_POST['Password']), $_POST['Login']);

	if (!$_POST['Login'] or !$_POST['Password'] or !$_POST['FIO'] or !$_POST['Adress'] or !$_POST['Phone'] or !$_POST['Passport']) 
	{
		exit('Невозможно обработать форму.');
	}

	$Row = mysql_fetch_assoc(mysql_query("SELECT ` ID_user`, `Fio`, `Adress`, `Phone`, `Passport`, `GetDown`, `Login` FROM `pr_user` WHERE  `Login` = '$_POST[Login]'"));
	if ($Row['Login']) 
	{
		exit('Логин <b>'.$_POST['Login'].'</b> уже используется <br> <a href="login.php?type=register">Назад</a>');
	}

	mysql_query("INSERT INTO `pr_user` VALUES ('', '$_POST[FIO]', '$_POST[Adress]', '$_POST[Phone]', '$_POST[Passport]', '$_POST[Login]', '$_POST[Password]', '0')");

	
	exit(header('Location: /pr'));

	die;
}
?>
<div class="wrap" sytle="text-align: center;">
<div class="fullscreenline" style="margin-top: 20px;"></div>
<section class="regregisterblock">
<div class="registercaption"><?php echo $pagename; ?></div>
<form  method="POST" action="<? echo $pagelink; ?>" class="registerform">
<br><input type="text" name="Login" placeholder="Логин" maxlength="10" pattern="[A-Za-z-0-9]{3,10}" title="Не менее 3 и не более 10 латинских символов или цифр." required>
<br><input type="password"  name="Password" placeholder="Пароль" maxlength="15" pattern="[A-Za-z-0-9]{1,15}" title="Не менее 1 и не более 15 латинских символов или цифр." required>
<?php if($_GET['type'] != 'login') echo '
<br><input type="text" name="FIO" placeholder="Фио" maxlength="100" title="Не менее 3 и не более 100 русских символов." required>
<br><input type="text"  name="Adress" placeholder="Адрес" maxlength="50" title="Не менее 1 и не более 50 русских символов или цифр." required>
<br><input type="text"  name="Phone" placeholder="Номер телефора" maxlength="11" pattern="[0-9]{1,15}" title="Не менее 1 и не более 11 цифр." required>
<br><input type="text"  name="Passport" placeholder="Паспорт" maxlength="10" pattern="[0-9]{1,15}" title="Не менее 1 и не более 10 цифр." required>'; ?>
<div class="buttonblock">
	<?php echo $pageaddvence;?>
	<br><input type="submit" value="<?php echo $pagebutton;?>">
</div>
</form>
</section>
<div class="fullscreenline" style="margin-top: 20px;"></div>
</div>

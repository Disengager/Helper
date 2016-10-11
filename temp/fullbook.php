<?php
	session_start();
	include_once 'function.php';

	head('Книги');
	if(!$_GET['id']) { echo '<h1>Страница не найдена</h1>'; die; }

	$title = ''; $author = ''; $publishing = ''; $theme = '';
	$trow = sqlsl2('pr_extr', "`Book`=$_GET[id]");
	$row = sqlsl2('pr_book', "`ID_book`=$_GET[id]");
	$title = $row['Name'];
	$author = sqlsl2('pr_author', "`ID_author`=$row[Author]")['Name'];
	$publishing = sqlsl2('pc_publishing', "`ID_publishing`=$row[Publishing]")['Name'];
	$theme = sqlsl2('pr_theme', "`ID_Theme`=$row[Theme]")['Name'];
	if(!$trow || $trow['RealData_set'] != '0000-00-00')
	{
		if($_GET['type'] == 'addbook' && $_GET['book'])
		{
			$row = sqlsl2('pr_user', "`Login`='$_SESSION[Login]'")[' ID_user'];
			if($row)
			{
				sqlis("pr_extr", "'', Now(), Now() + INTERVAL 10 DAY, '', '$row', '$_GET[book]'");
			}
			
		}
	}
	else 
	{
		if($_GET['type'] == 'setbook' && $_GET['book'])
		{

			$row = sqlsl2('pr_user', "`Login`='$_SESSION[Login]'")[' ID_user'];
			if($row)
			{
				sqlup("pr_extr", "`RealData_set`=Now() WHERE (`User`=$row AND `Book`=$_GET[book])");
			}
		}
	}
?>
	<div class="wrap">
	<div class="titlebook"><b>Название: </b><?php echo $title; ?></div>
	<div class="author"><b>Автор: </b><?php echo $author; ?></div>
	<div class="theme"><b>Тема: </b><?php echo $theme; ?></div>
	<div class="publishing"><b>Издательство: </b><?php echo $publishing; ?></div>
	<?php  
	if($trow)
	{ 
		if($trow['User'] == sqlsl2('pr_user', "`Login`='$_SESSION[Login]'")[' ID_user'] && $trow['RealData_set'] == '0000-00-00')
			echo "<br>Вы должны вернуть книгу до $trow[Data_set]<br><br><div class='button' id='setbooks'>Вернуть книгу</div>";
		else if($trow['User'] != sqlsl2('pr_user', "`Login`='$_SESSION[Login]'")[' ID_user'] && $trow['RealData_set'] == '0000-00-00')
			echo "<br>Эта книга уже взята на прочтение до $trow[Data_set]"; 
		else if($trow['RealData_set'] != '0000-00-00')
			echo "<br><div class='button' id='getbooks'>Взять на время</div>"; 
	}
	else 
	{
		echo "<br><div class='button' id='getbooks'>Взять на время</div>"; 
	}
	?>
	
<script>
	$('#getbooks').click(function() {
		//alert("book.php?type=addbook&book=<?php echo $_GET['id']; ?>&user=<?php echo $_SESSION['Login']; ?>");
		
		$("body").load("book.php?id=<?php echo $_GET['id']; ?>&type=addbook&book=<?php echo $_GET['id']; ?>");
		$('.info').html("Верните книгу через 10 дней");
	});
	$('#setbooks').click(function() {
		//alert("book.php?type=addbook&book=<?php echo $_GET['id']; ?>&user=<?php echo $_SESSION['Login']; ?>");
		
		$("body").load("book.php?id=<?php echo $_GET['id']; ?>&type=setbook&book=<?php echo $_GET['id']; ?>");
	});
</script>
</div>
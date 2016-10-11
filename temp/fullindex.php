<?php
	session_start();
	include_once 'function.php';
	head('Главная страница');
	$usr = logined();
?>
	<div class="wrap">
	<div class="userformbl">
		<br>1. Выбрать книгу по физике, которая наиболее популярна у читателей(Максимальное число выдач за год)<br><br>
		<?php
		$querymain = "
		SELECT `pr_extr`.`ID_extr` , `pr_extr`.`Data_extr` , `pr_extr`.`Book` , `pr_book`.`Theme` , COUNT( * ) 
		FROM pr_extr, pr_book 
		WHERE ( 
		( 
		`pr_book`.`Theme` =4 
		) 
		AND ( 
		`pr_extr`.`Book` = `pr_book`.`ID_book` 
		) 
		AND (
		Year(`pr_extr`.`Data_extr`) = Year(Now()) 
		)
		) 
		GROUP BY `pr_extr`.`Book`
		ORDER BY COUNT( * ) DESC
		LIMIT 0 , 1
		";
		$rsmain = mysql_query($querymain);
		while($rowmain = mysql_fetch_array($rsmain))
		{
			echo 'Самомй популярной книгой является книга <b>' .sqlsl2('pr_book', "`ID_book`=$rowmain[Book]")['Name']. '</b>';
			echo '<br>Взяли: <b>' .$rowmain['COUNT( * )']. '</b>';
		}
		?>
	</div>
	<div class="userformbl">
		<br>2. Выбрать читателей, которые имюет задолженность более 2 месяцев.<br><br>
		<?php
		$querymain = "
		SELECT *, COUNT(*)
		FROM pr_extr
		WHERE ( 
		(DATEDIFF(RealData_set,Data_set) > 60)
		OR 
		(RealData_set = 0)
		AND
		(DATEDIFF(Now(),Data_set) > 60)
		) 
		GROUP BY User
		";
		$rsmain = mysql_query($querymain);
		echo 'Задолжниками являются:<br>';
		while($rowmain = mysql_fetch_array($rsmain))
		{
			$rowrow = sqlsl2('pr_user', "` ID_user`=$rowmain[User]");
			echo '<b>' .$rowrow['Fio']. '</b> имеющий <b>' .$rowmain['COUNT(*)']. '</b> штрафа <br>проживающий по адресу: <b>' .$rowrow['Adress'].  '</b><br>с телефоном: <b>'.$rowrow['Phone']. '</b><br><br>';
		}
		?>
	</div>
	<div class="userformbl">
		<br>3. Определить книгу, которая была наиболее популярной зимой 2005 года.<br><br>
		<?php
		$querymain = "SELECT `pr_extr`.`ID_extr` , `pr_extr`.`Data_extr` , `pr_extr`.`Book` , `pr_book`.`Theme`, Count(*)
		FROM pr_extr, pr_book 
		WHERE 
		( 
		(DATEDIFF('2016-03-31',`pr_extr`.`Data_extr`) < 90)
		AND 
		( 
		`pr_extr`.`Book` = `pr_book`.`ID_book` 
		)
		) 
		GROUP BY `pr_extr`.`Book`
		ORDER BY COUNT( * ) DESC
		LIMIT 0,1
		";
		$rsmain = mysql_query($querymain);
		while($rowmain = mysql_fetch_array($rsmain))
		{
			echo 'Самомй популярной книгой зимой 2016 является книга <b>' .sqlsl2('pr_book', "`ID_book`=$rowmain[Book]")['Name']. '</b>';
			echo '<br>Взяли: <b>' .$rowmain['Count(*)']. '</b>';
		}
		?>
	</div>
	<div class="userformbl">
		<br>4. Определить читателей, у которых на руках находятся книги издательства Наука.<br><br>
		<?php
		$querymain = "SELECT `pr_book`.`ID_book`, `pr_book`.`Publishing`, `pr_extr`.`Book`, `pr_extr`.`User`
		FROM pr_book, pr_extr
		WHERE ((`pr_book`.`Publishing` = 1) AND (`pr_extr`.`Book` = pr_book.ID_book))
		GROUP BY `pr_extr`.`User`
		";
		$rsmain = mysql_query($querymain);
		while($rowmain = mysql_fetch_array($rsmain))
		{
			echo 'Человек: <b>' .sqlsl2('pr_user', "` ID_user`=$rowmain[User]")['Fio']. '</b>';
		}

		?>
	</div>
	</div>

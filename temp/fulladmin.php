<?php
	session_start();
	include_once 'function.php';

	head('Админка');

	$usr = logined();

	
	if($_GET['type'] == 'publishing')
		if($_GET['param'])
			sqlis("categories", "'', '$_GET[param]', '', '$_GET[param2]', '$_GET[param3]'");
	if($_GET['type'] == 'author')
		if($_GET['param'])
			sqlis("material", "'', '$_GET[param]', '', '$_GET[param2]'");
	if($_GET['type'] == 'theme')
		if($_GET['param'])
			sqlis("pr_theme", "'', '$_GET[param]'");
	if($_GET['type'] == 'book')
		if($_GET['param'])
		{			
			sqlis("item", "'', '$_GET[param]', '', '$_GET[param3]', '', '$_GET[param4]'");
			$row = sqlsl("item ORDER BY id_item DESC")['id_item'];
			sqlis("item_categories", "'', $row, $_GET[param2]");
			$tempArray1 = explode('and', $_GET['param5']);
			foreach($tempArray1 as $temp)
			{
				$tempArray2 = explode('x', $temp);
				sqlis("item_material", "'', $row, $tempArray2[0], $tempArray2[1]");
			}
		}
	if($_GET['type'] == 'deletebook')
		if($_GET['id'])
		{
			deletebook($_GET['id']);
		}
	if($_GET['type'] == 'picture')
		if($_GET['param'])
		{
			$ch = curl_init($_GET['param2']);
			$fp = fopen($_GET['param']. '0.jpg', 'wb');
			curl_setopt($ch, CURLOPT_FILE, $fp);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_exec($ch);
			curl_close($ch);
			fclose($fp);
			
			$tempArray = explode('ttt', $_GET['param3']);
			$temp = '';
			$index = 1;
			foreach($tempArray as $row)
			{
				$temp .= $_GET['param']. $index. '.jpg;';
				
				$ch = curl_init($row);
				$fp = fopen($_GET['param']. $index. '.jpg', 'wb');
				curl_setopt($ch, CURLOPT_FILE, $fp);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_exec($ch);
				curl_close($ch);
				fclose($fp);
				
				$index++;
			}
			
			sqlup2("item", "img='$_GET[param]0.jpg', imgs='$temp'", "id_item=$_GET[param]");
		}
	if($_GET['type'] == 'resize')
	{
		$dir    = '../temp';
		$files1 = scandir($dir);

		foreach($files1 as $row)
		{
			try
			{
				createThumbnail($row);
				copy($row, 'full'.$row);
			} catch (Exception $e) {};
		}
	}
?>

<div class="wrap">
	<div class="userformbl">
		Добавить итем:
		<br><br>Название
		<br><input type="text" id="itemname">
		<br>Категория
		<br><input type="text" id="idcategory">
		<br>Материалы
		<br><input type="text" id="idmaterial">
		<br>Описание
		<br><textarea id="ifno"></textarea>
		<br>Примичание
		<br><textarea id="special"></textarea>
		<br><div class="button" id="addbook">Добавить</div>
		<br><br>
	</div>
	<div class="userformbl">
		Добавить картинки:
		<br><br>Id item
		<br><input type="text" id="iditem">
		<br>Poster
		<br><input type="text" id="idposter">
		<br>Imgs
		<br><input type="text" id="idimgs">
		<br><div class="button" id="addpicture">Добавить</div>
		<br><br>
		<div class="list">
		Список item:
		<br>
		<?php
		$querymain = "SELECT * FROM `item`";
		$rsmain = mysql_query($querymain);
		while($rowmain = mysql_fetch_array($rsmain))
		{
			echo $rowmain['id_item'] .'. ' .$rowmain['name']. '(' .$rowmain['img']. ')<br>' ;
		}
		?>
		</div>
	</div>
	<div class="userformbl">
		Изменить размер картинок:
		<br><div class="button" id="resize">Изменить</div>
		<br><br>
	</div>
	<div class="userformbl">
		Добавить категорию:
		<br><input type="text" id="publishing">
		<br>Описание
		<br><textarea id="publishingifno"></textarea>
		<br>Примичание
		<br><textarea id="publishingspecial"></textarea>
		<br><div class="button" id="addpubl">Добавить</div>
		<br><br>
		<div class="list">
		Список категорий:
		<br>
		<?php
		$querymain = "SELECT * FROM `categories`";
		$rsmain = mysql_query($querymain);
		while($rowmain = mysql_fetch_array($rsmain))
		{
			echo $rowmain['id_cat'] .'. ' .$rowmain['name_cat']. '<br>' ;
		}
		?>
		</div>
		<br>
		<br>
	</div>
	<div class="userformbl">
		Добавить материал:
		<br><input type="text" id="author">
		<br>Описание
		<br><textarea id="authorifno"></textarea>
		<br><div class="button" id="addauth">Добавить</div>
		<br><br>
		<div class="list">
		Список материалов:
		<br>
		<?php
		$querymain = "SELECT * FROM `material`";
		$rsmain = mysql_query($querymain);
		while($rowmain = mysql_fetch_array($rsmain))
		{
			echo $rowmain['id_material'] .'. ' .$rowmain['name']. '<br>';
		}
		?>
		</div>
		<br>
		<br>
	</div>
</div>
	</div>

<script type="text/javascript">
	String.prototype.escapeURI = function () {
		return encodeURIComponent(this).replace(/%20/g, '+');
	}
	
	$('#addpubl').click(function() {
		$("body").load("admin.php?type=publishing&param=" + $('#publishing').val().escapeURI() + "&param2=" + $('#publishingifno').val().escapeURI() + "&param3=" +  $('#publishingspecial').val().escapeURI());
	});
	$('#addauth').click(function() {
		$("body").load("admin.php?type=author&param=" + $('#author').val().escapeURI() + "&param2=" + $('#authorifno').val().escapeURI());
	});
	$('#addthm').click(function() {
		$("body").load("admin.php?type=theme&param=" + $('#theme').val().escapeURI());
	});
	$('#addbook').click(function() {
		$("body").load("admin.php?type=book&param=" + $('#itemname').val().escapeURI() + "&param2=" + $('#idcategory').val().escapeURI() + "&param3=" +  $('#ifno').val().escapeURI() + "&param4=" +  $('#special').val().escapeURI() + "&param5=" +  $('#idmaterial').val().escapeURI());
	});
	$('#addpicture').click(function() {
		$("body").load("admin.php?type=picture&param=" + $('#iditem').val().escapeURI() + "&param2=" + $('#idposter').val().escapeURI() + "&param3=" +  $('#idimgs').val().escapeURI());
	});
	$('#resize').click(function() {
		$('body').load("admin.php?type=resize");
	});
	function deleteitem(id)
	{
		if (confirm('Вы точно уверены, что хотите удалить книгу?')) 
		{
			$("body").load("admin.php?type=deletebook&id=" + id);
		}
		
	}
</script>
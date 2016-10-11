
<?php
session_start();
include_once '../settings.php';
mysql_connect(host, user, password);
mysql_select_db(db);
mysql_query("SET NAMES 'utf8';"); 
mysql_query("SET CHARACTER SET 'utf8';");
load();
inseptionrequest();
?>

<div class="b-popup-content">


<section class="regregisterblock">
<div class = "cl"><i class="fa fa-close" onclick="pophide('#popup1');"></i></div>
<div class="registercaption"><h3>Добавление записи</h3></div>
<form  method="POST" action="page/additemaction.php" class="registerform">
<br><input type="hidden" name="Group" value="<?php echo $_GET['group']; ?>">
<br><input type="text" name="Objectlink" id="idObjectlink" placeholder="Ссылка" title="" style="padding-right: 60px; margin: 8px;" required><div class="button" id="cheklink"><i class="fa fa-search"></i></div>
<br><select name="Template" id="SelectTemplate" style="width: 345px;">
<?php

$query3 = "SELECT * FROM  `helper_template`"; 
$rs3 = mysql_query($query3);

while($row3 = mysql_fetch_array($rs3)) 
{
	echo '<option value="' .$row3['ID_template']. '">' .$row3['Name']. '</option>';	
} 
?>
</select>
<div class="buttonblock">
<br><img src="" id="StrImg"> 
<input type="hidden" name="Image" id="ImageSRC">
</div>
<br><br><div class="buttonblock" id = "loadposter">Загрузить свой постер</div>
	<div class="posterchange" style="display: none;">
	<div class="tabcontrol">
		<div id="tabitem2">
			<input type="text" name="posterlink" id="posterlinkid" placeholder="Ссылка" title="" style="padding-right: 5px; margin: 8px;">
			<div class="button" id="chekposter"><i class="fa fa-arrow-down"></i></div>
		</div>
	</div>
</div>
<br><input type="text" id="StrName"  name="Name" placeholder="Название">
<br><input type="text"  id="StrNow" name="NowStr" placeholder="Сколько сейчас">
<br><input type="text"  id="AddLink" name="LinkAdd" placeholder="Дополнительная ссылка">
<div class="buttonblock">
	<br><input type="submit" value="Добавить">
</div>
</form>
</section>


</div>
<div class="hide"></div>
<script>
$('#cheklink').click(function() {
	$('.hide').load("page/additemaction.php?IdTem=" + $('#SelectTemplate').val() + "&link=" + $('#idObjectlink').val() + '&load=1', function() {
	alert('Готово');
	$('#StrName').attr("value", $('.StrName code').html());
	$('#StrNow').attr("value", $('.StrNow code').html());
	$('#StrImg').attr("src", $('.StrImg').html());
	$('#ImageSRC').attr("value", $('.StrImg').html());
	});
	
});
$('#loadposter').click(function() {
	if($('.posterchange').css("display") == "none")
		$('.posterchange').css("display", "block");
	else 
		$('.posterchange').css("display", "none");
});
$('#chekposter').click(function() {
	$('.hide').load("page/additemaction.php?IdTem=" + $('#SelectTemplate').val() + "&link=" + $('#idObjectlink').val() + '&load=1&posterlink=' + $('#posterlinkid').val(), function() {
		$('#StrImg').attr("src", $('.StrImg').html());
		$('#ImageSRC').attr("value", $('.StrImg').html());
	});
});
$('#idObjectlink').change(function() {
	$('.hide').load("page/gettemplate.php?sn=" + $('#idObjectlink').val(), function() {
		$("select option[value=" + $('.hide').html() + "]").attr('selected', 'true').text(text);
	});
});

</script>

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
	$row = mysql_query("SELECT * FROM  `helper_group` WHERE  `ID_user` = $_COOKIE[ID] AND `Number_group` = '$_POST[Id]'");
	if($row)
		mysql_query("UPDATE `helper_group` SET `Number_group`=`Number_group`+1 WHERE `Number_group` >= '$_POST[Id]'");

	mysql_query("INSERT INTO `helper_group`(`ID_group`, `Number_group`, `Name_group`, `ID_user`) VALUES ('','$_POST[Id]','$_POST[Name]','$_COOKIE[ID]')");
	header('Location: ../');
	exit;

}



$strSQL = mysql_query("SELECT * FROM  `helper_group` WHERE  `ID_user` = $_COOKIE[ID] ORDER BY Number_group DESC Limit 0,1"); 
$row = mysql_fetch_array($strSQL);
$rorow = $row[Number_group]+1;
?>


<div class="b-popup-content" >
<div class = "cl"><i class="fa fa-close" onclick="pophide('#popup2');"></i></div>
<section class="regregisterblock">
<div class="registercaption"><h3>Добавление категории</h3></div>

<form action="page/addgroup.php" method="Post" class="registerform">
<br><input type = "text" name = "Name" placeholder="Название" required> 
<br><input type = "number" min="1" max="<?php echo $rorow; ?>"name = "Id" value="<?php echo $rorow;?>" placeholder="Number">
<br>
<div style="padding-left:10px;">
<?php
$query = "SELECT * FROM  `helper_group` WHERE  `ID_user` = $_COOKIE[ID] ORDER BY Number_group";
$rs = mysql_query($query);
echo "<br><b>Категории:</b>";
while($row = mysql_fetch_array($rs)) 
{
	echo '<br>' .$row['Number_group']. ' ' .$row['Name_group'];
}

?>
</div>
<div class="buttonblock">
	<br><input type="submit" value="Добавить">
</div>
</form>
</section>
</div>

<div class="hide"></div>
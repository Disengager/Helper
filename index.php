<?php
session_start();
include_once 'settings.php';
include 'lib/Compare.php';
load();
$modargs = '1';
$modcaption = 'Расширенный режим';
if($_COOKIE['Mode_bool'] == '1')
{
	$modargs = '2';
	$modcaption = 'Обычный режим';
}
head('Helper', '<menu><div class="menu"><button class="menuitem" onclick="refresh()"><i class="fa fa-refresh"></i> Обновить</button><button class="menuitem" onclick="supermode(' .$modargs. ')"><i class="fa fa-cog"></i> ' .$modcaption. '</button><button class="menuitem" onclick="messages()"><i class="fa fa-bell"></i> Уведомления</button><button class="menuitem" onclick="help()"><i class="fa fa-question"></i> Справка</button><button class="menuitem" onclick="logout()"><i class="fa fa-sign-out"></i> Выход</button></div></menu>');
?>


<?php 
$temp = check_it(strip_tags(''), strip_tags(''));  
echo $temp[1];
?>

<div style="opacity: 0.2; font-size: 38px; width: 92%;  text-align: center; padding-top: 10px;" title="Добавить категорию"><i class="fa fa-plus" id='plus' onclick="addgroup()"></i>
</div><br>
<?php 
$content = '';

function modcontent($idmain)
{
	if($_COOKIE['Mode_bool'] == '1')
	return '<div class="deleteitem"><abbr title="Удалить запись"><i class="fa fa-times" onclick="deleteite('.$idmain.')"></i>  </abbr>   </div>';
}

function modgroup($idgroup)
{
	if($_COOKIE['Mode_bool'] == '1')
	return '<div class="deletegroup"><abbr title="Удалить группу"><i class="fa fa-times" onclick="deletegroup('.$idgroup.')"></i> </abbr>    </div>';
}

mysql_connect(host, user, password);
mysql_select_db(db);
mysql_query("SET NAMES 'utf8';"); 
mysql_query("SET CHARACTER SET 'utf8';"); 


function modrigthblock()
{
	if($_COOKIE['Mode_bool'] == '1')
	{
		$tempcontent = 'Список серверов:<br><br>';
		$row = mysql_query("SELECT * FROM helper_userhost WHERE ID_user = '$_COOKIE[ID]'");
		while($rowrow = mysql_fetch_array($row))
		{
			$tempcontent .= "<input type='number' value='$rowrow[In]'><input type='number' value='$rowrow[Out]'><input type='text' value='$rowrow[Link]'><br>";
		}
		$tempcontent .= '<br><div class="button" id="save" style="width: 120px;">Сохранить</div><br><br>';
		$designbg = $designcolor = $designtheme = '<div class="customeForm">';
		$row = mysql_query("SELECT * FROM  `helper_design` GROUP BY  `Type` ,  `ID_bg` ");
		while($rowrow = mysql_fetch_array($row))
		{
			if($rowrow['Type'] == 0)
				$designcolor .= "<div class='customeItem' onclick='radioButtonclick($rowrow[ID_bg],0)' value='$rowrow[ID_bg]' name='rad$rowrow[Type]'>$rowrow[Name]</div><br><div class='hide' id='sp$rowrow[ID_bg]'>$rowrow[Link]</div>";
			if($rowrow['Type'] == 1)
				$designbg .= "<div class='customeItem' onclick='radioButtonclick($rowrow[ID_bg],1)' value='$rowrow[ID_bg]' name='rad$rowrow[Type]'> $rowrow[Name]</div><br><div class='hide' id='sp$rowrow[ID_bg]'>$rowrow[Link]</div>";
			if($rowrow['Type'] == 2)
				$designtheme .= "<div class='customeItem' onclick='radioButtonclick($rowrow[ID_bg],2)' value='$rowrow[ID_bg]' name='rad$rowrow[Type]'> $rowrow[Name]</div><br><div class='hide' id='sp$rowrow[ID_bg]'>$rowrow[Link]</div>";
		}
		$designcolor .= '<br><input type="text" id="textBox0"><br><br><center><button class="button" style="width:110px;" onclick="appendCustomize(0)">применить</button></center></div>';
		$designbg .= '<br><input type="text" id="textBox1"><br><br><center><button class="button" style="width:110px;" onclick="appendCustomize(1)">применить</button></center></div>';
		$designtheme .= '<br><input type="text" id="textBox2"><br><br><center><button class="button" style="width:110px;" onclick="appendCustomize(2)">применить</button></center></div>';
		$strSQL = mysql_query("SELECT * 
		FROM  `helper_main`
		WHERE  `ID_user` = $_COOKIE[ID] GROUP BY Link"); 
		$index = 0;
		$tempcontent .= '<div style="text-align: left;">';
		while($row = mysql_fetch_array($strSQL)) 
		{
			$tempcontent .= "<br>$index. $row[Name]   <div style='font-style: italic; display:inline-block; width: 125px; white-space: pre; overflow: hidden; text-overflow: ellipsis;'>$row[Link]</div>";
			$index++;
		}
		$tempcontent .= '</div>';
		return "
		<div class='rigthblock'>
			<div style='text-align: left;'><button class='tabCaption' onclick='tabclick(0)'>Дизайн</button>
			<button class='tabCaption' onclick='tabclick(1)' style='background-color:#E4E4E4;'>Ускорение</button></div>
			<div id='tabControl'>
			  <div id='design' style='display: block;' class='tabItem'><br><br><h2>Дизайн</h2><br>Фон<br><br>$designbg<br><br>Цвета<br><br>$designcolor<br><br>Тема<br><br>$designtheme</div>
			  <div id='speedup' style='display: none;'  class='tabItem'><br><br><h2>Ускорение$</h2><br>$tempcontent</div>
			</div>
		</div>";
	}
}




$query = "SELECT * FROM `helper_group` WHERE `ID_user` = '$_COOKIE[ID]' ORDER BY Number_group";

$querymain = "SELECT * FROM `helper_main` WHERE `ID_user` = '$_COOKIE[ID]' AND `Now_str` <> `New_str` ORDER BY Number_in_group";
$rsmain = mysql_query($querymain);
$maingroup = '<div class="group"><div class="groupcaption"><div style="display: inline-block; width: 1050px;">New  ('.mysql_num_rows($rsmain). ')</div></div>';
while($rowmain = mysql_fetch_array($rsmain))
{
	$posterlink = $rowmain['Link'];
		if($rowmain['Link_aditional'])
			$posterlink = $rowmain['Link_aditional'];
	$maingroup .= '<div class="item">' .modcontent($rowmain['ID_main']). 
	'<div class="itemPoster fadeblacksolid"><img src="img/' .$rowmain['ID_main']. '.jpg" height="300"><a href = \''.$posterlink.'\' target="_blank"><div class="mask"></div></a></div><div class="newcaption">New</div>
	<div class="itemCaption" title="'  .$rowmain['Name'].'"><code>'  .$rowmain['Name'].'</code></div>
	<button class="newitemNow" onclick="checknew('. $rowmain['ID_main'] .')" title="Now: '.$rowmain['Now_str'].' 
New: '.$rowmain['New_str'].'"><i class="fa fa-arrow-up" style="opacity: 0.2; padding-right: 7px;"></i>Now: ' .htmlspecialchars($rowmain['New_str']). '</button>
	</div>';
}
$rs = mysql_query($query);


while($row = mysql_fetch_array($rs)) 
{	
	$groupcontent1 = '';
	$groupcontent2 = '';
	$query = "SELECT * FROM `helper_main` WHERE `ID_user` = '$_COOKIE[ID]' AND `ID_group` = '$row[ID_group]' ORDER BY `Number_in_group` ASC";
 	$rs2 = mysql_query($query);
	
	$content .= '<div class="group">
	<div class="groupcaption" ondblclick="$(\'#'.$row[ID_group].'\').slideToggle(\'slow\');" ><div style="display: inline-block; width: 1050px;">' .$row['Name_group']. ' ('.mysql_num_rows($rs2). ')'.'</div><div style="display: inline-block;">'.modgroup($row['ID_group']).'<abbr title="Добавить запись"><i class="fa fa-plus" onclick="additem('  .$row['ID_group'].', ' .$row['ID_user']. ')"></i></abbr></div></div><div id = "'.$row[ID_group].'"> ';
	
	while($row2 = mysql_fetch_array($rs2)) 
	{
			$posterlink = $row2['Link'];
			if($row2['Link_aditional'])
				$posterlink = $row2['Link_aditional'];

			if($row2['Now_str'] != $row2['New_str'])
			{
				$groupcontent1 .= '<div class="item">
				' .modcontent($row2['ID_main']). '<div class="itemPoster  fadeblacksolid"><img src="img/' .$row2['ID_main']. '.jpg" height="300"><a href = \''.$posterlink.'\' target="_blank"><div class="mask"></div></a></div><div class="newcaption">New</div>
				<div class="itemCaption" title="'  .$row2['Name'].'"><code>'  .$row2['Name'].'</code></div>
				<button class="newitemNow" onclick="checknew('. $row2['ID_main'] .')" title="Now: '.$row2['Now_str'].'
New: '.$row2['New_str'].'"><i class="fa fa-arrow-up" style="opacity: 0.2; padding-right: 7px;"></i>Now: ' .htmlspecialchars($row2['New_str']). '</button>
				</div>';

			}				
			else 
				$groupcontent2 .= '<div class="item">
				' .modcontent($row2['ID_main']). '<div class="itemPoster fadeblacksolid"><img src="img/' .$row2['ID_main']. '.jpg" height="300"><a href = \''.$posterlink.'\' target="_blank"><div class="mask"></div></a></div>
				<div class="itemCaption" title="'  .$row2['Name'].'"><code>'  .$row2['Name'].'</code></div>
				<div class="itemNow" title="'  .$row2['Now_str'].'"><code>Now: ' .$row2['Now_str']. '</code></div>
				</div>';
	}  
	$content .= $groupcontent1 . $groupcontent2.'</div></div>';
	
}
	
echo $maingroup.'</div>' . $content;

?>
<script> 
$(document).ready(function(){
	var pos = $(document).scrollTop();
	 $(document).scroll(function(){
    if ($(document).scrollTop()!="0")
    $('#arrow').attr('class', 'fa fa-arrow-up');
    else
    $('#arrow').attr('class', 'fa fa-arrow-down');
	});
	
	$("#up").click(function(){
		if ($(document).scrollTop() == 0) 
			{
				scrollto(pos);
			}
		else if ($(document).scrollTop() > 50) 
			{
			pos = $(document).scrollTop(); 
			scrollto(0); 
			
			}
	});

	$("body").keypress(function(e) {
          if (e.which == 13) {
              refresh();
              return false;

          }
     });
	 
	
	$('.fa.fa-plus').each(function(i,elem) {
	if ($(this).hasClass("stop")) {
		return false;
	} else {

		$('.fa.fa-plus:eq(' + i + ')').mouseenter(function() {
			var iconElement = elem;
			var options = {
				from: 'fa-plus',
				to: 'fa-plus',
				animation: 'rotateClockwise'
			};
			iconate(iconElement, options);
		});
		
	}
	});
	
	$('.menuitem').each(function(i, elem) {
		if ($(this).hasClass("stop")) {
			return false;
		} else {
			if(i == 0) {
				
			}
			if(i == 1) {
				
			}
			if(i == 2) {
				
			}
			
		}
	});
	
});
</script>
<div class="hidecontent" style="display:none;"></div>
<div id="up"><i id = 'arrow' class="fa fa-arrow-down" style="opacity: 0.2; padding-right: 7px;font-size:24px"></i></div>
<?php
foot();
echo modrigthblock();
?>

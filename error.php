<?php
	$link = 'http://helper.disengager.org/img/';
	$image = array('error1.jpg', 'error2.jpg', 'error4.jpg');
	$index = rand(0, 2);
?>
<html>
<head>
<title>Ошибка доступа</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<style>
* { font-family: verdana; font-size: 10pt }
b { font-weight: bold; }
td { padding: 5;}
.font		{font-family:tahoma,sans-serif;font-size:175px}
.button {
padding: 10px;
padding-left: 10px;
padding-right: 10px;
font-size: 18px;
margin: 5px;
border-radius: 5px;
background-color: #DADADA;
}
.button:hover{
cursor: pointer;
}
.button {
display: inline-block;
background-color: #E2E2E2;
margin: 0px;
}
.button:hover{
background-color: gray;
}

</style>
</head>
<body bgcolor=#ffffff link=#445588 alink=#445588 vlink=#445588 topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 id="body">
<center>
<br><br><br><br>
<table width="80%" style="border: 1px solid gray">
<tr><td><center>Вам нельзя тут находится</td></tr>
<tr><td>
<table  align="center" width=50% border=0>
<tr><td>
<center><img src="<?php echo $link. '' .$image[$index];  ?>" style="width: 700px;"></center>
</td></tr></table><BR>
</td></tr>
<tr><td><center><b>УХОДИТЕ!</b><br><br><br>Вы пытаетсь проникнуть на страницу на которой вам не положено находится. Готовьтесь к последствиям <?php echo $_COOKIE['Login']; ?>.</center><br><br><br></center><center><br><div id="win"></div><br><br></center><center><div class="button" id="run" onclick="lose()">СБЕЖАТЬ ПОКА НЕ СТАЛО СЛИШКОМ ПОЗДНО</div></center><br><br>
</td></tr>
</table>
<br><br>
</body>
<script type="text/javascript">
var bool = false;
function lose()
{
	window.location = "http://helper.disengager.org/";
}
function redwhite() {
	if(bool) {
		document.getElementById("body").style.backgroundColor ='red';
		bool = false;
	}
	else {
		document.getElementById("body").style.backgroundColor ='white';
		bool = true;
	}
}
function two(a) {
    return (9 < a ? "" : "0") + a
}

function Time() {
	var timer;
	
	 if (timer) clearInterval(timer);
     var secs = 15;
    document.getElementById("run").innerHTML = "СБЕЖАТЬ ПОКА НЕ СТАЛО СЛИШКОМ ПОЗДНО " + secs;
     timer = setInterval(
		function () {
        secs--;
        if(secs >= 0) 
			document.getElementById("run").innerHTML = "СБЕЖАТЬ ПОКА НЕ СТАЛО СЛИШКОМ ПОЗДНО " + secs;
		else { 
			document.getElementById("run").innerHTML = 'Получить информацию';
			document.getElementById("body").style.backgroundColor ='white';
			document.getElementById("win").innerHTML = '<h1 style="font-size: 20px">Вы прошли испытание, не побоялись наказания, не сбежали. Вы достойны получить закрытую информацию.</h1>';
		}
		if(secs < 8 && secs >= 0)
			redwhite();
         }, 1000);
	
}
Time();
</script>

</html>

function additem(group, user) {
	if ($('#popup1').html()!='')
		$('body').append('<div class="b-popup" id="popup1"></div>');
	$('#popup1').load('page/additem.php?group=' + group);
	$('#popup1').show();
}
function messages() {
    if ($('#popup1').html()!='')
    {
        $('body').append('<div class="b-popup" id="popup1"></div>');
    }
    if(!$('body').hasClass("b-popup"))
        {
            $('#popup1').load('page/notification.php?type=messages');
            $('#popup1').show();
        }
   
	
}
function message(id) {
	$('#popup1').load('page/notification.php?type=message&id=' + id, function() {
        var tempMessageList = $('.massagetext').css('height');
        $('.messagelist').css("height", tempMessageList);
        $('.message').animate({height: tempMessageList}, 600);
    });
}

function back(){
    $('#popup1').load('page/notification.php?type=messages', function() {
        $('.message').animate({height: '500px'}, 600);
    });
}
function help() {
	if ($('#popup1').html()!='')
		$('body').append('<div class="b-popup" id="popup1"></div>');
	$('#popup1').load('page/help.php');
	$('#popup1').show();
}

function addgroup() {
	if ($('#popup2').html()!='')
		$('body').append('<div class="b-popup" id="popup2"></div>');
	$('#popup2').load('page/addgroup.php');
	$('#popup2').show();
}


function pophide(popup) {
$(popup).hide();
$(popup).html('');
}

function scrollto(updown){
	if (updown == 0){
		var curPos=$(document).scrollTop();
		var scrollTime=curPos/3;
		$("body,html").animate({"scrollTop":0},scrollTime);
	} else {
		var curPos=$(document).scrollTop();
		var height=updown;
		var scrollTime=(height-curPos)/3;
		$("body,html").animate({"scrollTop":height},scrollTime);
	}
}

function openlink(link) {
	window.open(link);
}

function tabclick(idtab) {
	$('.tabItem').each(function(i,elem) {

		if(i == idtab)
		{
			$('.tabItem:eq(' + i + ')').css('display', 'block');
			$('.tabCaption:eq(' + i + ')').css('background-color', 'white');
		}
		else
		{
			$('.tabItem:eq(' + i + ')').css('display', 'none');
			$('.tabCaption:eq(' + i + ')').css('background-color', '#E4E4E4');
		}
	});
}

function checknew(ID) {
	$('.hidecontent').load('page/checknew.php?id=' + ID, function() {
		location.reload(true);
	});
}

function supermode(Mod) {
	$.ajax({
	 	url: 'page/mod.php?mod=' + Mod,
	 	context: document.body
	}).done(function() {
		location.reload(true);
	});
}

function refresh() {
	var opts = {
	  lines: 13 // The number of lines to draw
	, length: 32 // The length of each line
	, width: 7 // The line thickness
	, radius: 38 // The radius of the inner circle
	, scale: 0.75 // Scales overall size of the spinner
	, corners: 0.9 // Corner roundness (0..1)
	, color: '#000' // #rgb or #rrggbb or array of colors
	, opacity: 0 // Opacity of the lines
	, rotate: 58 // The rotation offset
	, direction: 1 // 1: clockwise, -1: counterclockwise
	, speed: 0.9 // Rounds per second
	, trail: 31 // Afterglow percentage
	, fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
	, zIndex: 2e9 // The z-index (defaults to 2000000000)
	, className: 'spinner' // The CSS class to assign to the spinner
	, top: '50%' // Top position relative to parent
	, left: '50%' // Left position relative to parent
	, shadow: true // Whether to render a shadow
	, hwaccel: false // Whether to use hardware acceleration
	, position: 'absolute' // Element positioning
	}
	$('body').append('<div class="b-popup" id="popup3" style="background-color:white; opacity:0.4; z-index: 1000;"></div>');
	var target = document.getElementById('popup3');
	var spinner = new Spinner(opts).spin(target);


	
	
	$('.hidecontent').load('page/refresh.php', function() {
		location.reload(true);
	});
}

function deleteite(ID) {
	if (confirm("Вы подтверждаете удаление?")) {
		$.ajax({
			url: 'page/delete.php?ID_main=' + ID,
			context: document.body
		}).done(function() {
			location.reload(true);
		});
	}
}

function deletegroup(ID) {
	if (confirm("Вы подтверждаете удаление группы и всех записей в ней?")) {
		$.ajax({
			url: 'page/delgr.php?ID_group=' + ID,
			context: document.body
		}).done(function() {
			location.reload(true);
		});
	}
}

function logout() {
	$.ajax({
	 	url: 'page/logout.php',
	 	context: document.body
	}).done(function() {
		location.reload(true);
	});
}

function radioButtonclick(id, category) {
	$('#textBox' + category).val($('#sp' + id).html());
}

function appendCustomize(id) {
	var link = $('#textBox' + id).val();
	$.ajax({
			url: 'page/customize.php?type=' + id + '&link=' + link,
			context: document.body
		}).done(function() {
			location.reload(true);
		});
}

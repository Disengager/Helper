
<?php
session_start();
include_once '../settings.php';
mysql_connect(host, user, password);
mysql_select_db(db);
mysql_query("SET NAMES 'utf8';"); 
mysql_query("SET CHARACTER SET 'utf8';");
load();
inseptionrequest();

$messages = 'block';
$message = 'block';
if($_GET['type'] == 'messages')
    $message = 'none';
if($_GET['type'] == 'message')
    $messages = 'none';

if($message == 'none')
    $query3 = "SELECT * FROM  `helper_notification` ORDER BY ID_notification DESC"; 
else 
     $query3 = "SELECT * FROM  `helper_notification` WHERE ID_notification = $_GET[id]"; 

$rs3 = mysql_query($query3);
$content = '';

while($row = mysql_fetch_array($rs3)) 
{
    if($message == 'none')    
        $content .= " <div class='massageitems' onclick='message($row[ID_notification])'> 
    <div class='massageposter'>
        <img src='http://helper.disengager.org/img/favicon.ico'>
    </div>
    <div class='massagetext'>
        $row[text_notification] <br> $row[attachment]<br>
    </div>
    <div style='width: 40%; text-align: right; font-size: 12px;'>$row[date]</div>
    
</div>";
    else 
    {
        $content .= "
    <div class='massageposter'>
        <img src='http://helper.disengager.org/img/favicon.ico'>
    </div>
    <div class='massagetext'>
        $row[text_notification] <br> $row[attachment]<br>
    </div>
    ";
    }
} 


?>

<div class="b-popup-content">
    <div class="conteiner">
        <div class="title">
            <div class = "cl"><?php  if($message != 'none') echo '<i class="fa fa-arrow-left"  onclick="back();"></i>';  ?><i class="fa fa-close" onclick="pophide('#popup1');"></i></div>
        </div>
        <br><br>
        <div class="messages" style="display: <?php echo $messages; ?>">
            <div class="messagelist">
                <?php echo $content; ?>
            </div>
            <br>
        </div>
        <div class="message" style="display: <?php echo $message; ?>">
              <div class="conteiner">
                <div class="messagelist" id="messageMessageList">
                 <?php echo $content; ?>
                 </div>
            </div>
        </div>
    </div>
</div>

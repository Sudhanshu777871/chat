<?php

require("functions/config.php");

// check if there is a user
if(isset($_SESSION['name'])){
    // store new chat message here
	$text = $_POST['text'];
	
	$fp = fopen("log.html", 'a');
	// insert chat message into log.html
	fwrite($fp, "<div class='msgln'>(".date("g:i A").") <span class='".$_SESSION['color']."'><b>".$_SESSION['name']."</b>:</span> ".stripslashes(htmlspecialchars($text))."<br></div>");
	fclose($fp);
}

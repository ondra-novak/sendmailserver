<?php

ob_start();

require_once 'core.php';

$res = ob_get_contents();
ob_end_clean();

header("Content-Type: $contentType");


if (strpos($contentType,"text/html")!==FALSE) {
	
	$res = preg_replace("/<body[^>]*>/i", "\${0}<p><strong>Subject: </strong>".htmlspecialchars($subject)
			."<br><strong>To: </strong>".htmlspecialchars($recepient)."</p>",  $res);
	
} else if (strpos($contentType,"text/plain")!== FALSE ) { 
	$res = "Subject: ".$subject."\r\nTo: ".$recepient."\r\n\r\n".$res;
}

echo $res;
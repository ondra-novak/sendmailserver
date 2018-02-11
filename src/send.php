<?php 

ob_start();

require_once 'core.php';

$res = ob_get_contents();
ob_end_clean();

$r = mail($recepient, $subject, $res, "Content-Type: ".$contentType."\r\n");
if (!$r) {
	header("HTTP/1.0 502 Bad gateway");		
}



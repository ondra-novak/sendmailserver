<?php 

ob_start();

require_once 'core.php';

$res = ob_get_contents();
ob_end_clean();

$headers = "Content-Type: ".$contentType."\r\n";
if ($sender) $headers.="From: ".$sender."\r\n";

$r = mail($recepient, $subject, $res, $headers);
if (!$r) {
	header("HTTP/1.0 502 Bad gateway");		
}



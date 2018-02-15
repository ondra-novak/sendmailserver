<?php

function error($msg) {
	header("HTTP/1.0 400 Bad Request");
	header("Content-Type: text/plain");
	
	echo $msg;
	die();
}

if ($_SERVER['REQUEST_METHOD']!=="POST") {
	header("HTTP/1.0 405 Method not allowed");
	header("Allow: POST");
	die();
	
}

$req = json_decode(file_get_contents('php://input'), true);
if (!$req) {
	error("invalid json");
	
}

$templateName = $req["template"];
$recepient = $req["recepient"];
$sender=NULL;
$data = $req["data"];

if (!$templateName) {
	error("Missing template");
}
if (!$recepient) {
	error("Missing recepient");
}
if (!$data) {
	error("Missing data");
}

$subject="";
$contentType="text/plain";


include dirname(__FILE__)."/../templates/".$templateName.".php";



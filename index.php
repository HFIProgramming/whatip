<?php

require_once __DIR__ . '/Classes/loader.php';

error_reporting(0);

$result = new split($_SERVER['REQUEST_URI']);

if (empty($result->parameter)) {
	echo $_SERVER['REMOTE_ADDR'];
	exit();
}

if ($result->slash['getHeader'] == true) {
	echo json_encode(getallheaders());
	exit();
}

if (!empty($base64 = $result->slash['to'])) {
	$url = base64_decode($base64);
	if ($result->slash['https']) {
		header('Location: https://' . $url);
	} elseif ($result->slash['http']) {
		header('Location: http://' . $url);
	} else {
		header('Location: //' . $url);
	}
	exit();
}

header('Location: https://never.pet');
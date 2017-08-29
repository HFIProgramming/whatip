<?php

require_once __DIR__ . '/Classes/loader.php';

error_reporting(0);

$result = new split($_SERVER['REQUEST_URI']);

if (empty($result->parameter)) {
	echo $_SERVER['REMOTE_ADDR'];
	exit();
}

if ($result->slash['ping'] == true) {
	echo 'pong!';
	exit();
}

if ($result->slash['json']){
	echo json_encoded(['ip' => $_SERVER['REMOTE_ADDR']]);
        exit();
}

if ($result->slash['getHeader'] == true) {
	echo json_encode(getallheaders());
	exit();
}

if ((!empty($base64 = $result->slash['base64'])) || (!empty($base64 = $result->query['base64']))){
	echo base64_encode($base64);
	exit();
}

if ((!empty($toURI = $result->slash['to'])) && (!is_bool($result->slash['to']))) {
	$url = base64_decode($toURI);
	if ($result->slash['https']) {
		header('Location: https://' . $url);
	} elseif ($result->slash['http']) {
		header('Location: http://' . $url);
	} elseif ($result->slash['origin']) {
		header('Location: '.$url);
	} else {
		header('Location: //' . $url);
	}
	exit();
}

header('Location: https://never.pet');

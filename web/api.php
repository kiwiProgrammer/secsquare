<?php
 
// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];

$name = '';

if ($method == 'GET') {
	$name = $_GET['name'];
}

if($name) {
	$result = dns_get_record($name);
	if(!$result) {
		http_response_code(404);
		die();
	}
	echo "{ \"results\":".json_encode($result)."}";
}
<?php

// ajax only
header('content-type: application/json; charset=utf-8');

$send = array();

if(isset($_GET['req'])) {
	
	if($_GET['req'] === '1') {
		$send['resp'] = 'Response #1';
	}
	else if($_GET['req'] === '2') {
		$send['resp'] = 'Response #2';
	}
	else if($_GET['req'] === '2.1') {
		$send['resp'] = 'Nested #2.1';
	}
	else if($_GET['req'] === '2.2') {
		$send['resp'] = 'Nested #2.2';
	}
	else if($_GET['req'] === '3') {
		$send['resp'] = 'Response #3';
	}
	else if($_GET['req'] === '4') {
		$send['resp'] = 'Response #4';
	}
	else if($_GET['req'] === '5') {
		$send['resp'] = 'Response #5';
	}
	else {
		$send['resp'] = 'Invalid Request!';
	}
	
}
if($_GET['name'] === 'John') {
		$send['resp'] = 'Response #1';
	}
// just to delay the response a little
sleep(1);

// send data
$json = json_encode($send);
echo isset($_GET['callback']) ? "{$_GET['callback']}($json)" : $json;

?>
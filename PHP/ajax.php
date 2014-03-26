<?php
session_start();

$response = rand(0, 1);

$request = $_REQUEST;

if ($response) {
	$status = 200;
	$status_message = 'Status: 200 Everything is fine.';
	$success = true;
} else {
	$status = 400;
	$status_message = 'Status: 400 Error, error!!!';
	$success = false;

}
//session for storing the session variables Name and Email
 if (isset($_POST)) {
 $_SESSION['email'] = $_POST['email'];
 $_SESSION['name'] = $_POST['name'];
 }


$request['success'] = $success;
header($status_message, true, $status);

echo json_encode($request);


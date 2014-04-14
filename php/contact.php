<?php
require_once('config.php');
//Sender Information From Form
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$message = trim($_POST['message']);
$err = "";
//Checking Sender Information
$pattern = "^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$^";
//Invalid Email
if (!preg_match_all($pattern, $email, $out)) {
	$err = MSG_INVALID_EMAIL;
}
//No Email
if (!$email) {
	$err = MSG_INVALID_EMAIL;
}
//No Message
if (!$message) {
	$err = MSG_INVALID_MESSAGE;
}
//No name 
if (!$name) {
	$err = MSG_INVALID_NAME;
}
//Email Header
$headers = "From: " . $name . " <" . $email . ">\r\nReply-To: " . $email . "";
if (!$err) {
	$sent = mail($conf['email_address'], SUBJECT, $message, $headers);
	if ($sent) {
		echo 'SEND';
	} else {
		echo MSG_SEND_ERROR;
	}
} else {
	echo $err;
}
?>
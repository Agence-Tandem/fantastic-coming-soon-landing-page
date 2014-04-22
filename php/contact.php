<?php

require_once('config.php');
include_once ('init.php');

function getUserIP()
{
	$client  = @$_SERVER['HTTP_CLIENT_IP'];
	$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	$remote  = $_SERVER['REMOTE_ADDR'];
	if(filter_var($client, FILTER_VALIDATE_IP))
	{
		$ip = $client;
	}
	elseif(filter_var($forward, FILTER_VALIDATE_IP))
	{
		$ip = $forward;
	}
	else
	{
		$ip = $remote;
	}
	return $ip;
}


session_start();

if (!verifyFormToken('form1')) die('Hack-Attempt detected. Got ya!.');


//Sender Information From Form
$name = htmlspecialchars_decode(trim($_POST['name']));
$email = htmlspecialchars_decode(trim($_POST['email']));
$message = htmlspecialchars_decode(trim($_POST['message']));
$err = "";
//Checking Sender Information
$pattern = "^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$^";
//Invalid Email
if (!preg_match_all($pattern, $email, $out)) {
	$err = $lang['msg_invalid_email'];
}
//No Email
if (!$email) {
	$err = $lang['msg_invalid_email'];
}
//No Message
if (!$message) {
	$err = $lang['msg_invalid_message'];
}
//No name 
if (!$name) {
	$err = $lang['msg_invalid_name'];
}
//Email Header
$headers = array(
"From: " . $conf['website_name'] . " <" . $conf['email_address'] . ">",
"Content-Type: text/html; charset=UTF-8"
);
$email_message = sprintf ($lang['email_contact_message'], $name, $email, 'http://whois.sc/'.getUserIP(), $message);
if (!$err) {
	$sent = mail($conf['email_address'], sprintf($lang['email_contact_subject'], $conf['website_name']), $email_message, $headers);
	if ($sent) {
		echo 'SEND';
	} else {
		echo $lang['msg_invalid_send'];
	}
} else {
	echo $err;
}
?>
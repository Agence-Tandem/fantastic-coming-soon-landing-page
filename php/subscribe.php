<?php
require_once('../config/config.php');
$email   = trim($_POST['email']);
$err     = "";
$headers = "From: " . $lang['subscriber_from_name'] . " <" . $email . ">\r\nReply-To: " . $email . "";
$userheaders = "From: ". $conf['email_from_name'] ." <" . $conf['email_address'] . ">\r\nReply-To: " . $conf['email_address'] . "";
$pattern = "^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$^";
if (!preg_match_all($pattern, $email, $out)) {
	$err = MSG_INVALID_SUBSCRIBE_EMAIL;
}
if (!$email) {
	$err = MSG_INVALID_SUBSCRIBE_EMAIL;
}
if (!$err) {
	//Save to Database
 	$query  = "SELECT * FROM `" . $conf['db_table_subscribers'] . "` WHERE email_address = '" . $mysql->real_escape_string($email) . "'";
	$result = $mysql->query($query);
	if ($result->num_rows > 0)
		echo $lang['already_exist'];
	else {
		$query = "INSERT INTO `" . $conf['db_table_subscribers'] . "` ( `email_address`, `subscribed`, `language`) VALUES ( '" . $mysql->real_escape_string($email) . "', 1, '".$mysql->real_escape_string($conf['current_language'])."')";
		$mysql->query($query) or die(vprintf($lang['error_adding_email'], $email));
		$sent = mail($conf['email_address'], SUBJECT, SUBSCRIBER_MAIL_MESSAGE, $headers);
		$usersent = mail($email, USERSUBJECT, USER_SUBSCRIBER_MAIL_MESSAGE, $userheaders);
		if ($sent)
			echo $lang['subscribed_successfully'];
		else
			echo MSG_SEND_ERROR;
	}
} else {
	echo $err;
}
?>
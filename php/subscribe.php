<?php
require_once('../php/config.php');
include_once ('../php/init.php');

session_start();
if (!verifyFormToken('form1')) die('Hack-Attempt detected. Got ya!.');


$email = trim($_POST['email']);
$err = "";
$headers = "From: " . $conf['website_name'] . " <" . $conf['newsletter_email'] . ">\r\nReply-To: " . $conf['newsletter_email'] . "";
$pattern = "^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$^";
if (!preg_match_all($pattern, $email, $out)) {
	$err = $lang['msg_invalid_subscribe_email'];
}
if (!$email) {
	$err = $lang['msg_invalid_subscribe_email'];
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
		$sent = mail($conf['email_address'], sprintf($lang['newsletter_email_subject_admin'], $conf['website_name']), sprintf($lang['newsletter_email_message_admin'], $email, $conf['website_name']), $headers);
		$usersent = mail($email, sprintf($lang['newsletter_email_subject_user'], $conf['website_name']),
sprintf($lang['newsletter_email_message_user'], $conf['website_name'], substr($conf['website_url_directory'], 0, (strlen($conf['website_url_directory'])-4))), $headers);
		if ($sent)
			echo $lang['subscribed_successfully'];
		else
			echo $lang['msg_invalid_send'];
	}
} else {
	echo $err;
}
?>
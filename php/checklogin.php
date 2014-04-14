<?php
session_start();
include_once('config.php');
//Check Cookie, If Available Create Login Session  
if (isset($_COOKIE['username']) && isset($_COOKIE['password']))
	if ($_COOKIE['username'] == $conf['admin_username'] && $_COOKIE['password'] == md5($conf['admin_password'])) {
		$_SESSION['logged'] = $conf['admin_cookie'];
}
//Compare Username and Password, If Matches Create Login Session and Cookie  
if (isset($_POST["username"]) && isset($_POST["password"]))
	if ($_POST['username'] == $conf['admin_username'] && $_POST['password'] == $conf['admin_password']) {
		$_SESSION['logged'] = $conf['admin_cookie'];
		if (isset($_POST['rememberme'])) {
			setcookie('username', $_POST['username'], time() + 60 * 60 * 24 * 7, "/");
			setcookie('password', md5($_POST['password']), time() + 60 * 60 * 24 * 7, "/");
		}
	}
?>
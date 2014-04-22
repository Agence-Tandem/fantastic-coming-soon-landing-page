<?php
if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) { die('Not allowed'); }

// Connecting to MySQL database
$mysql = new mysqli($conf['db_hostname'], $conf['db_username'], $conf['db_password'], $conf['db_name']);
if ($mysql->connect_errno) {
	die("Error during MySQL database connection : (" . $mysql->connect_errno . ") " . $mysql->connect_error);
}

function table_exists($mysql, $tablename)
{
	$tableList = array();
	$res = mysqli_query($mysql,"SHOW TABLES");
	while($cRow = mysqli_fetch_array($res))
	{
		$tableList[] = $cRow[0];
		
	}
	if (in_array($tablename, $tableList)) return true; else return false;
}

//
if(!table_exists($mysql, $conf['db_table_subscribers']))
{
	// install subscribers table
	$sql = "CREATE TABLE ".$conf['db_table_subscribers']." (
			id int(10) NOT NULL AUTO_INCREMENT,
			email_address varchar(150) COLLATE utf8_bin NOT NULL,
			subscribed tinyint(1) NOT NULL,
			`language` varchar(2) COLLATE utf8_bin NOT NULL,
			PRIMARY KEY (id)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;";
	$result = mysqli_query($mysql, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error(), E_USER_ERROR);
}

if(!table_exists($mysql, $conf['db_table_settings']))
{
	// install settings table
	$sql = "CREATE TABLE ".$conf['db_table_settings']." (
			id int(5) NOT NULL AUTO_INCREMENT,
			setting varchar(150) COLLATE utf8_bin NOT NULL,
			`language` varchar(2) COLLATE utf8_bin NOT NULL,
			`value` longtext COLLATE utf8_bin NOT NULL,
			PRIMARY KEY (id)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;";
	$result = mysqli_query($mysql, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error(), E_USER_ERROR);
}


// URL of the directory of the coming soon landing page
function url_origin($s, $use_forwarded_host=false)
{
	$ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
	$sp = strtolower($s['SERVER_PROTOCOL']);
	$protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
	$port = $s['SERVER_PORT'];
	$port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
	$host = ($use_forwarded_host && isset($s['HTTP_X_FORWARDED_HOST'])) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : $s['SERVER_NAME']);
	return $protocol . '://' . $host . $port;
}
function url_directory($s, $use_forwarded_host=false)
{
	return url_origin($s, $use_forwarded_host) . dirname($s['REQUEST_URI']);
}
$conf ['website_url_directory'] = url_directory($_SERVER);


// Including language
$language_path = 'languages/' . $conf['current_language'] . '.php';
if (!file_exists($language_path)) $language_path = '../'.$language_path;
require($language_path);

// Get the configuration and language from the database
$sql = "SELECT setting, language, value FROM `" . $conf['db_table_settings'] . "` WHERE language='".$conf['current_language']."' OR language='00'";
$result = $mysql->query($sql);
$rowcount = $result->num_rows;
if($rowcount>0) {
	while ($row = mysqli_fetch_row($result)) {
		if($row[1]=='00') {
			// It is a parameter
			$conf[$row[0]] = stripslashes($row[2]);
		}
		else {
			// It is some text
			$lang[$row[0]] = stripslashes($row[2]);
		}
	}
}


function verifyFormToken($form) {
	
	// check if a session is started and a token is transmitted, if not return an error
	if(!isset($_SESSION[$form.'_token'])) {
		return false;
	}
	
	// check if the form is sent with token in it
	if(!isset($_POST['token'])) {
		return false;
	}
	
	// compare the tokens against each other if they are still the same
	if ($_SESSION[$form.'_token'] !== $_POST['token']) {
		return false;
	}
	
	return true;
}
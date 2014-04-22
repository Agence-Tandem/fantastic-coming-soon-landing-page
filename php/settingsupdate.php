<?php
if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) { die('Not allowed'); }



$posted_settings = $_POST;

$variables_list = array(
	'title_h1',
	'seo_title',
	'seo_description',
	'countdown_activated',
	'countdown_year',
	'countdown_month',
	'countdown_day',
	'countdown_hour',
	'countdown_min',
	'countdown_sec',
	'content_homepage_1st_paragraph',
	'progressbar_activated',
	'progressbar_percent',
	'content_homepage_progess_bar',
	'newsletter_activated',
	'content_homepage_newsletter',
	'map_activated',
	'lattitude',
	'longitude',
	'map_title',
	'map_address',
	'contact_activated',
	'contact_phone',
	'contact_email',
	'contact_email_name',
	'about_activated',
	'about_title',
	'about_txt'
);

$settings_parameters = array();

foreach ($posted_settings as $key => $value) {
	if (!in_array($key, $variables_list)) {
		// check if it is some language parameters
		$variable_id = substr($key, 0, strlen($key)-3);
		if (in_array($variable_id, $variables_list)) {
			// it is a language text
			$settings_parameters[] = array('setting' => $variable_id, 'language' => substr($key, strlen($key)-2), 'value' => trim($value));
		}
	}
	else {
		$settings_parameters[] = array('setting' => $key, 'language' => '00', 'value' => trim($value));
	}
}

foreach ($settings_parameters as $key => $value) {
	$sql = "SELECT id FROM ".$conf['db_table_settings']." WHERE setting='".$value['setting']."' AND language='".$value['language']."'";
	$result = $mysql->query($sql);
	$rowcount = $result->num_rows;
	if ($rowcount>0) {
		$sql = "UPDATE ".$conf['db_table_settings']." SET value='".addslashes($value['value'])."' WHERE setting='".$value['setting']."' AND language='".$value['language']."'";
		$result = mysqli_query($mysql, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error(), E_USER_ERROR); 
	}
	else {
		$sql = "INSERT INTO ".$conf['db_table_settings']." (setting, language, value) VALUES ('".$value['setting']."', '".$value['language']."', '".addslashes($value['value'])."')";
		$result = mysqli_query($mysql, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error(), E_USER_ERROR); ;
	}
}


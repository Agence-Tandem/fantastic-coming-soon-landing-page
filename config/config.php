<?php
// MySQL database details
$conf['db_hostname'] = 'localhost'; // MySQL host name
$conf['db_username'] = 'root'; // MySQL username
$conf['db_password'] = ''; // MySQL password
$conf['db_name'] = 'coming_soon'; // MySQL database name
$conf['db_table_subscribers'] = 'subscribers'; // MySQL table to store emails


// Website name
$conf['website_name'] = 'My Website'; // Name of the Website as it appear on page and emails
// $conf['website_url'] = 'http://mydomain.com'; // Address of the coming soon landing page


// Countdown
$conf['countdown_day'] = 1;
$conf['countdown_month'] = 6;
$conf['countdown_year'] = 2014;
$conf['countdown_hour'] = 0; // (0-24)
$conf['countdown_min'] = 0; // (0-60)
$conf['countdown_sec'] = 0; // (0-60)
$conf['countdown_millisec'] = 0; // (0-1000)
$conf['countdown_timer'] = "00:00:00:00"; // dd:hh:mm:ss


// Progress bar
$conf['progress_bar_percent'] = 20; // Percentage of the prgress bar


// Social networks
$conf['facebook'] = 'https://facebook.com'; // Remove or leave empty if do not used
$conf['twitter'] = 'https://twitter.com'; // Remove or leave empty if do not used
$conf['googleplus'] = 'https://plus.google.com'; // Remove or leave empty if do not used
$conf['linkedin'] = 'https://linkedin.com'; // Remove or leave empty if do not used


// Google map
$conf['map_latitude'] = 43.948403;
$conf['map_longitude'] = 4.802082;
$conf['map_markertitle'] = "Tandem";
$conf['map_infowindow_title'] = '<b>Tandem</b>'; // HTML formated, used in Google Map & Contact
$conf['map_infowindow_address'] = '<p>6bis rue Saint Thomas d\'Aquin,<br />84000 Avignon, France</p>'; // HTML formated, used in Google Map & Contact

// Phone & Fax
$conf['phone_fax'] = '<p>Tel : +33 (0)490 825 097<br />Fax : +33 (0)490 824 119</p>' ;

// Email address used to send emails
$conf['email_address'] = 'coming.soon@mydomain.com'; // Email address sending all the emails messages
$conf['email_from_name'] = 'Coming Soon MyDomain.com'; // Email from 


// Admin access
$conf['admin_username'] = 'admin'; // Administrator username
$conf['admin_password'] = 'admin'; // Administrator password
$conf['admin_cookie'] = 'Coming Soon Landing Page by Tandem'; // Administrator cookie identification


// Admin pagination
$conf['rows_per_page'] = '100'; // Number of rows per page
$conf['show_page_numbers'] = TRUE; // Hide / show page numbers button
$conf['show_prev_next'] = TRUE; // Hide / show previous and next button


// Logo image
$conf['logo_file'] = 'images/logo.png';
$conf['logo_width'] = '252';
$conf['logo_height'] = '122';
$conf['logo_alt_text'] = 'Keywords on my logo image';


// Language used in this installation
$conf['current_language'] = 'en'; // Select a language in the /languages/ directory
// Edit the language file in the /languages/ folder to adjust content to your specific needs


// activate the multilingual functionality
$conf['multilingual'] = TRUE; // Use TRUE to activate the multiligual functionality, use FALSE to deactivate 


// IF YOU DO NOTE USE THE MULTILINGUAL FUNCTIONALITY you can stop editing here.


// adress of the pages for all the available languages
$language = array (
	'fr' => 'http://localhost/coming-soon-landing-page/master/fr', // repeat for all the needed languages 
	'en' => 'http://localhost/coming-soon-landing-page/master/',
);


// 2 characters code list of all languages 
$lang_code = array (
	'ab' => 'Abkhazian',
	'af' => 'Afrikaans',
	'an' => 'Aragonese',
	'ar' => 'Arabic',
	'as' => 'Assamese',
	'az' => 'Azerbaijani',
	'be' => 'Belarusian',
	'bg' => 'Bulgarian',
	'bn' => 'Bengali',
	'bo' => 'Tibetan',
	'br' => 'Breton',
	'bs' => 'Bosnian',
	'ca' => 'Catalan / Valencian',
	'ce' => 'Chechen',
	'co' => 'Corsican',
	'cs' => 'Czech',
	'cu' => 'Church Slavic',
	'cy' => 'Welsh',
	'da' => 'Danish',
	'de' => 'German',
	'el' => 'Greek',
	'en' => 'English',
	'eo' => 'Esperanto',
	'es' => 'Spanish / Castilian',
	'et' => 'Estonian',
	'eu' => 'Basque',
	'fa' => 'Persian',
	'fi' => 'Finnish',
	'fj' => 'Fijian',
	'fo' => 'Faroese',
	'fr' => 'French',
	'fy' => 'Western Frisian',
	'ga' => 'Irish',
	'gd' => 'Gaelic / Scottish Gaelic',
	'gl' => 'Galician',
	'gv' => 'Manx',
	'he' => 'Hebrew',
	'hi' => 'Hindi',
	'hr' => 'Croatian',
	'ht' => 'Haitian; Haitian Creole',
	'hu' => 'Hungarian',
	'hy' => 'Armenian',
	'id' => 'Indonesian',
	'is' => 'Icelandic',
	'it' => 'Italian',
	'ja' => 'Japanese',
	'jv' => 'Javanese',
	'ka' => 'Georgian',
	'kg' => 'Kongo',
	'ko' => 'Korean',
	'ku' => 'Kurdish',
	'kw' => 'Cornish',
	'ky' => 'Kirghiz',
	'la' => 'Latin',
	'lb' => 'Luxembourgish Letzeburgesch',
	'li' => 'Limburgan Limburger Limburgish',
	'ln' => 'Lingala',
	'lt' => 'Lithuanian',
	'lv' => 'Latvian',
	'mg' => 'Malagasy',
	'mk' => 'Macedonian',
	'mn' => 'Mongolian',
	'mo' => 'Moldavian',
	'ms' => 'Malay',
	'mt' => 'Maltese',
	'my' => 'Burmese',
	'nb' => 'Norwegian (Bokmål)',
	'ne' => 'Nepali',
	'nl' => 'Dutch',
	'nn' => 'Norwegian (Nynorsk)',
	'no' => 'Norwegian',
	'oc' => 'Occitan (post 1500); Provençal',
	'pl' => 'Polish',
	'pt' => 'Portuguese',
	'rm' => 'Raeto-Romance',
	'ro' => 'Romanian',
	'ru' => 'Russian',
	'sc' => 'Sardinian',
	'se' => 'Northern Sami',
	'sk' => 'Slovak',
	'sl' => 'Slovenian',
	'so' => 'Somali',
	'sq' => 'Albanian',
	'sr' => 'Serbian',
	'sv' => 'Swedish',
	'sw' => 'Swahili',
	'tk' => 'Turkmen',
	'tr' => 'Turkish',
	'ty' => 'Tahitian',
	'uk' => 'Ukrainian',
	'ur' => 'Urdu',
	'uz' => 'Uzbek',
	'vi' => 'Vietnamese',
	'vo' => 'Volapuk',
	'yi' => 'Yiddish',
	'zh' => 'Chinese',
);


/*
 * 
 * Do not edit the code below
 * 
 */


// Language redirection

if ($conf['multilingual']) {
	// check the language cookie
	if(!isset($_COOKIE["comingsoon_language"])) {
		// Check to see that the global language server variable isset()
		if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
			// 2 characters language code
			$lc = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
			// if this language exist
			if(isset($language[$lc]) && $lc!=$conf['current_language']) {
				// redirection to the language;
				header('Status: 302 Found', false, 302);
				header('Location: '.$language[$lc]);
				die();
			}
			else {
				// cookie creation for 24h
				setcookie( 'comingsoon_language', $lc, time() + 60*60*24,'/' );
			}
		}
	}
}


// Connecting to MySQL database
$mysql = new mysqli($conf['db_hostname'], $conf['db_username'], $conf['db_password'], $conf['db_name']);
if ($mysql->connect_errno) {
	echo "Error during MySQL database connection : (" . $mysql->connect_errno . ") " . $mysql->connect_error;
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
require_once($language_path);


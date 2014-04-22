<?php
if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) { die('Not allowed'); }
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

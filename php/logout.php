<?php
if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) { die('Not allowed'); }

setcookie("username", "", time() - 60 * 60 * 24 * 7, "/");
setcookie("password", "", time() - 60 * 60 * 24 * 7, "/");
session_destroy();


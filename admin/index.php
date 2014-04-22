<?php 
require_once('../php/config.php');
include_once ('../php/init.php');
require_once('../php/checklogin.php');

if (isset($_GET['admin'])) {
	if ($_GET['admin']=='action') {
		include ('../php/action.php');
	}
	elseif ($_GET['admin']=='update') {
		include ('../php/settingsupdate.php');
	}}

?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php $lang['seo_title']; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="shortcut icon" href="../favicon.ico" />
		<!-- Cascading Style Sheets -->
		<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen" />
		<link rel="stylesheet" href="../css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/colours.php" />
		<link rel="stylesheet" type="text/css" href="../css/custom.css" />
	</head>
	<body><?php 
	if(isset($_GET['admin'])) {
		if ($_GET['admin']=='logout') {
			?><div class="admin"><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><?php
			die('Logged Out');
		}
	}
	if(isset($_SESSION['logged'])) { ?>
		<div class="logout">
			<p><?php echo $lang['welcome_admin']; ?> | <a href='index.php'><?php echo $lang['subscribers']; ?></a> | <a href="index.php?admin=settings"><?php echo $lang['settings']; ?></a> | <a href='index.php?admin=logout'><?php echo $lang['logout']; ?></a></p>
		</div><?php } ?>
		<!-- Main Content -->
		<div class="admin">
			<?php
			if (isset($_SESSION['logged'])) {
				if (isset($_GET['admin'])) {
					if ($_GET['admin'] == 'settings' || $_GET['admin']=='update') {
						require_once('../php/settings.php');
					}
					elseif ($_GET['admin'] == 'update') {
						require_once('../php/settingsupdate.php');
					}
				}
				else require_once('../php/dashboard.php');
			} else {
				require_once('../php/login.php');
				 } ?>
		</div>
		<div class='footer'>
			<a href='https://github.com/Agence-Tandem/'>Fantastic Coming Soon</a> by <a href="http://tandem-avignon.com">Tandem</a>
		</div>
		<!-- /Main Content -->
		<!-- JavaScript-->
		<script src="../js/jquery-1.11.0.min.js"></script> 
		<script src="../js/bootstrap.min.js"></script> 
		<script type="text/javascript" src="../js/custom.js"></script> 
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
		<!-- /JavaScript-->
	</body>
</html>
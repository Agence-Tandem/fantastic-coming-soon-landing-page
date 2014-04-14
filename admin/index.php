<?php 
require_once('../config/config.php');
require_once('../php/checklogin.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php printf($lang['page_title_header'], $conf['website_name']); ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" href="../images/favicon.png" type="image/png" />
		<link rel="shortcut icon" href="../favicon.ico" />
		<!-- Cascading Style Sheets -->
		<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen" />
		<link rel="stylesheet" href="../css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/custom.css" />
		<!--[if IE 7]>
			<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome-ie7.min.css">
			<![endif]-->
		<!-- /Cascading Style Sheets -->
	</head>
	<body><?php if(isset($_SESSION['logged'])) { ?>
		<div class="logout">
			<p><?php echo $lang['welcome_admin']; ?> | <a href='../php/logout.php'><?php echo $lang['logout']; ?></a></p>
		</div><?php } ?>
		<!-- Main Content -->
		<div class="admin">
			<?php
			if (isset($_SESSION['logged'])) { 
				require_once('../php/dashboard.php');
			} else {
				require_once('../php/login.php'); } ?>
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
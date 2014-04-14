<?php
require_once('../config/config.php');

$err = "";
$pattern = "^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$^";
if (isset($_GET['email'])) {
	if (!preg_match_all($pattern, $_GET['email'], $out)) {
		$err = MSG_INVALID_SUBSCRIBE_EMAIL;
	}
	if (!$_GET['email']) {
		$err = MSG_INVALID_SUBSCRIBE_EMAIL;
	}
	if (!$err) {
		$query = "SELECT * FROM `" . $conf['db_table_subscribers'] . "` WHERE email_address = '" .$mysql->real_escape_string($_GET['email']). "'";
		$check = $mysql->query($query);
		if ($check->num_rows > 0) {
			$row = $check->fetch_assoc();
			if($row['subscribed']) {
				$sql = "UPDATE `" . $conf['db_table_subscribers'] . "` SET subscribed=0 WHERE email_address='".$mysql->real_escape_string($_GET['email'])."'";
				$result = $mysql->query($sql);			
			}
			else {
				$err= "You are already unsubscribed";
			}
		}
	}
	else {
		echo $err;
	}
}
	
?><!DOCTYPE html>
<html>
	<head>
		<title>Viraivil | Coming Soon</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="<?php echo $conf['website_description_header']; ?>">
		<!-- Cascading Style Sheets -->
		<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen" />
		<link rel="stylesheet" href="../css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/custom.css" />
		<!--[if IE 7]>
			<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome-ie7.min.css">
			<![endif]-->
		<!-- /Cascading Style Sheets -->
	</head>
	<body>
		<!-- Main Content -->
		<div class="content">
			<div class="loginpanel">
				<div class="logo">
					<img src="../<?php echo $conf['logo_file']; ?>" width="<?php echo $conf['logo_width']; ?>" height="<?php echo $conf['logo_height']; ?>" alt="<?php echo $conf['logo_alt_text']; ?>" class="img-rounded" />
				</div>
<?php
if (isset($result)) { 
?>	 			<div class="unsubscribesucess">
					<p><?php echo $lang['unsubscribed_successfully'] ?></p>
				</div> 
<?php
} else {
?>				<div class="unsubscribe">
					<p><?php echo $lang['please_your_email_to_unsubscribe']; ?></p>
					<form class="form-inline" id="unsubscribe" action="">
						<input type="email" name="email" class="form-control" value="<?php if (isset($_GET['email'])) { echo $_GET["email"]; } ?>" placeholder="<?php echo $lang['enter_email'] ?>" />
						<input type="submit" class="btn btn-primary" value="<?php echo $lang['unsubscribe']; ?>" />
					</form>
				</div>
				<p><?php echo $err ?></p>
<?php
}
?>			</div>
		</div>
		<!-- /Main Content -->
		<!-- JavaScript-->
		<script src="../js/jquery-1.11.0.min.js"></script> 
		<script src="../js/bootstrap.min.js"></script> 
		<!-- <script type="text/javascript" src="../js/admin.js"></script>   -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
		<!-- /JavaScript-->
	</body>
</html>
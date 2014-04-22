<?php


include_once ('php/config.php');
include_once ('php/languagedetect.php');
include_once ('php/init.php');

session_start();

function generateFormToken($form) {

	// generate a token from an unique value
	$token = md5(uniqid(microtime(), true));  
	
	// Write the generated token to the session variable to check it against the hidden field when the form is sent
	$_SESSION[$form.'_token'] = $token; 
	
	return $token;

}

// generate a new token for the $_SESSION superglobal and put them in a hidden field
$newToken = generateFormToken('form1');


?><!DOCTYPE html>
<html<?php echo ' lang="'.$conf['current_language'].'"'; ?>>
	<head>
		<title><?php echo $lang['seo_title']; ?></title>
		<meta name="description" content="<?php echo $lang['seo_description']; ?>">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="shortcut icon" href="favicon.ico" />
		<!-- Cascading Style Sheets -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/colours.php" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/custom.css" />
	</head>
	<body>
	<!-- Main Content -->
		<div class="content">
			<div class="container">
				<div class="logo">
					<img src="<?php echo $conf['logo_file']; ?>" width="<?php echo $conf['logo_width']; ?>" height="<?php echo $conf['logo_height']; ?>" alt="<?php echo $conf['logo_alt_text']; ?>" class="img-rounded" />
				</div>
			</div>
			<div id="comingsoon_block">
				<h1><?php echo $lang['title_h1']; ?></h1>
				<p><?php echo $lang['content_homepage_1st_paragraph'] ?></p>
				<?php
			if ($conf['countdown_activated']) {
				?><div id="counter" class="counter"></div>
				<div class="units">
					<ul>
						<li id="days"><?php echo $lang['days']; ?></li>
						<li id="hours"><?php echo $lang['hours']; ?></li>
						<li id="minutes"><?php echo $lang['minutes']; ?></li>
						<li id="seconds"><?php echo $lang['seconds']; ?></li>
					</ul>
				</div>
				<?php
			}
			if ($conf['progressbar_activated']) {
				?><div class="workprogress">
					<div class="progress progress-striped" id="progress" data-toggle="tooltip" title="Progress <?php echo $conf['progressbar_percent']; ?>%">
						<div class="progress-bar" aria-valuetransitiongoal="<?php echo $conf['progressbar_percent']; ?>"></div>
					</div>
					<p><?php echo $lang['content_homepage_progess_bar']; ?></p>
				</div>
				<?php
			}
			if ($conf['newsletter_activated']) {
				?><div class="subscribe">
					<p><?php echo $lang['content_homepage_newsletter']; ?></p>
					<form class="form-inline" id="subscribe">
						<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $lang ['your_email']; ?>" />
						<input type="hidden" name="token" value="<?php echo $newToken; ?>">
						<input type="submit" class="btn btn-primary" value="<?php echo $lang['subscribe']; ?>" />
					</form>
				</div>
				<div id="subscribestatus"></div>
			<?php
			}
			?></div>
			<div class="social-icons">
				<ul>
<?php
					if(isset($conf['facebook']) && $conf['facebook'] != '') {
?>
					<li><a href="<?php echo $conf['facebook']; ?>" target="_blank" rel="nofollow"><i rel="tooltip" title="Facebook" class="fa fa-facebook fa-fw fa-3x"></i></a></li>
<?php
					}
					if(isset($conf['twitter']) && $conf['twitter'] != '') {
?>
					<li><a href="<?php echo $conf['twitter']; ?>" target="_blank" rel="nofollow"><i rel="tooltip" title="Twitter" class="fa fa-twitter fa-fw fa-3x"></i></a></li>
<?php
					}
					if(isset($conf['googleplus']) && $conf['googleplus'] != '') { 
?>
					<li><a href="<?php echo $conf['googleplus']; ?>" target="_blank"><i rel="tooltip" title="Google Plus" class="fa fa-google-plus fa-fw fa-3x"></i></a></li>
<?php
					}
					if(isset($conf['linkedin']) && $conf['linkedin'] != '') { 
?>
					<li><a href="<?php echo $conf['linkedin']; ?>" target="_blank"><i rel="tooltip" title="Linkedin" class="fa fa-linkedin fa-fw fa-3x"></i></a></li>
<?php
					}
					if($conf['map_activated']) {
?>
					<li><a href="#map" data-toggle="modal"><i rel="tooltip" title="<?php echo $lang['access_map'];?>" class="fa fa-map-marker fa-fw fa-3x"></i></a></li>
<?php
					}
					if($conf['contact_activated']) {
?>
					<li><a href="#contact" data-toggle="modal"><i rel="tooltip" title="<?php echo $lang['contact']; ?>" class="fa fa-envelope fa-fw fa-3x"></i></a></li>
<?php
					}
					if($conf['about_activated']) { 
?>
					<li><a href="#info" data-toggle="modal"><i rel="tooltip" title="<?php echo $conf['website_name']; ?>" class="fa fa-info fa-fw fa-3x"></i></a></li>
<?php 
					}
?>
				</ul>
			</div>
<?php
			if ($conf['multilingual']) {
?>
			<div class="social-icons">
				<ul>
<?php
			foreach ($language as $key => $value) {
					echo '					<li><a href="'.$value.'"><img src="images/languages/'.$key.'.png" width="16" height="11" alt="'.$conf['website_name'].' '.$lang_code[$key].'" /></a></li>
';
			}
?>
				</ul>
			</div>
<?php
			}
?>
			<input type="hidden" id="var_countdown_day" value="<?php echo $conf['countdown_day']; ?>">
			<input type="hidden" id="var_countdown_month" value="<?php echo $conf['countdown_month']; ?>">
			<input type="hidden" id="var_countdown_year" value="<?php echo $conf['countdown_year']; ?>">
			<input type="hidden" id="var_countdown_hour" value="<?php echo $conf['countdown_hour']; ?>">
			<input type="hidden" id="var_countdown_min" value="<?php echo $conf['countdown_min']; ?>">
			<input type="hidden" id="var_countdown_sec" value="<?php echo $conf['countdown_sec']; ?>">
			<input type="hidden" id="var_countdown_millisec" value="<?php echo $conf['countdown_millisec'] ?>">
			<input type="hidden" id="var_countdown_timer" value="<?php echo $conf['countdown_timer']; ?>">
			<input type="hidden" id="var_map_latitude" value="<?php echo $conf['map_latitude']; ?>">
			<input type="hidden" id="var_map_longitude" value="<?php echo $conf['map_longitude']; ?>">
			<input type="hidden" id="var_map_markertitle" value="<?php echo $conf['map_markertitle']; ?>">
			<input type="hidden" id="var_map_infowindow_title" value="<?php echo $conf['map_infowindow_title']; ?>">
			<input type="hidden" id="var_map_infowindow_address" value="<?php echo $conf['map_infowindow_address']; ?>">
			<input type="hidden" id="contact_message_sent" value="<?php echo $lang['msg_message_sent']; ?>">
			<input type="hidden" id="newsletter_subscribed" value="<?php echo $lang['msg_successfully_subscibed']; ?>">
		</div>
		<!-- /Main Content --><?php
		if($conf['map_activated']) {
		?>
		<!-- Google Map Modal -->
		<div class="modal fade" id="map" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title"><?php echo $lang['access_map']; ?></h4>
					</div>
					<div class="modal-body">
						<div id="map-canvas"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Google Map Modal --><?php
		}
		if($conf['contact_activated']) {
		?>
		<!-- Contact Modal -->
		<div class="modal fade" id="contact" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title"><?php echo $lang['contact']; ?></h4>
					</div>
					<div class="modal-body">
						<div class="contact-details">
							<address>
								<?php echo $conf['map_infowindow_title']; ?>
								<?php echo $conf['map_infowindow_address']; ?>
								<?php echo $conf['phone_fax']; ?>
							</address>
						</div>
						<div class="form">
							<h4><?php echo $lang['send_us_an_email']; ?></h4>
							<div id="contact-status"></div>
							<form class="form-horizontal" id="form">
								<div class="form-group">
									<label for="ContactName"><?php echo $lang['your_name']; ?></label>
									<input type="text" name="name" class="form-control" id="ContactName" placeholder="<?php echo $lang['enter_name']; ?>" />
								</div>
								<div class="form-group">
									<label for="ContactEmail"><?php echo $lang['your_email']; ?></label>
									<input type="text" name="email" class="form-control" id="ContactEmail" placeholder="<?php echo $lang['enter_email']; ?>" />
								</div>
								<div class="form-group">
									<label for="ContactMessage"><?php echo $lang['your_message']; ?></label>
									<textarea name="message" class="form-control" id="ContactMessage" rows="3"></textarea>
								</div>
								<div class="form-group">
									<input type="hidden" name="token" value="<?php echo $newToken; ?>">
									<input type="submit" class="btn btn-primary btn-sm" value="<?php echo $lang['send_your_message']; ?>" id="submit" />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Contact Modal --><?php
		}
		if ($conf['about_activated']) {
		?>
		<!-- About Modal -->
		<div class="modal fade" id="info" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h2 class="modal-title"><?php echo $lang['about_title']; ?></h2>
					</div>
					<div class="modal-body">
<?php
					include('languages/'.$conf['current_language'].'-about.html');
?>
					</div>
				</div>
			</div>
		</div>
		<!-- /About Modal -->
<?php
		}
?>
		<!-- JavaScript-->
		<script src="js/jquery-1.11.0.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
<?php
		if ($conf['countdown_activated']) {
?>
		<script src="js/jquery.countdown.js" type="text/javascript" charset="utf-8"></script>
<?php
		}
		if ($conf['progressbar_activated']) {
?>
		<script type="text/javascript" src="js/bootstrap-progressbar.min.js"></script>
<?php
		}
		if ($conf['map_activated']) {
?>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<?php
		}
?>
		<script type="text/javascript" src="js/custom.js"></script>
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
		<!-- /JavaScript-->
<?php
		if(isset($conf['google_analytics']) && $conf['google_analytics']!='') {
?>
		<!-- Google Analytics -->
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		ga('create', '<?php echo $conf['google_analytics'] ?>', 'auto');
		ga('send', 'pageview');
		
		</script>
		<!-- End Google Analytics -->
<?php
		}
?>
	</body>
</html>
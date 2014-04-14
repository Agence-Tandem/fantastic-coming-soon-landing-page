<?php

include_once ('config/config.php');

?><!DOCTYPE html>
<html<?php if($conf['multilingual']) echo ' lang="'.$conf['current_language'].'"';?>>
	<head>
		<title><?php printf($lang['page_title_header'], $conf['website_name']); ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" href="images/favicon.png" type="image/png" />
		<link rel="shortcut icon" href="favicon.ico" />
		<!-- Cascading Style Sheets -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
		<link rel="stylesheet" href="css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/custom.css" />
		<!--[if IE 7]>
		<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome-ie7.min.css">
		<![endif]-->
		<!-- /Cascading Style Sheets -->
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
				<h1><?php echo $lang['title_homepage_h1']; ?></h1>
				<p><?php echo $lang['content_homepage_1st_paragraph'] ?></p>
				<div id="counter" class="counter"></div>
				<div class="units">
					<ul>
						<li id="days"><?php echo $lang['days']; ?></li>
						<li id="hours"><?php echo $lang['hours']; ?></li>
						<li id="minutes"><?php echo $lang['minutes']; ?></li>
						<li id="seconds"><?php echo $lang['seconds']; ?></li>
					</ul>
				</div>
				<div class="workprogress">
					<div class="progress progress-striped" id="progress" data-toggle="tooltip" title="Progress <?php echo $conf['progress_bar_percent']; ?>%">
						<div class="progress-bar" aria-valuetransitiongoal="<?php echo $conf['progress_bar_percent']; ?>"></div>
					</div>
					<p><?php echo $lang['content_homepage_progess_bar']; ?></p>
				</div>
				<div class="subscribe">
					<p><?php echo $lang['content_homepage_newsletter']; ?></p>
					<form class="form-inline" id="subscribe">
						<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $lang ['your_email']; ?>" />
						<input type="submit" class="btn btn-primary" value="<?php echo $lang['subscribe']; ?>" />
					</form>
				</div>
				<div id="subscribestatus"></div>
			</div>
			<div class="social-icons">
				<ul>
					<?php if(isset($conf['facebook']) && $conf['facebook'] != '') echo '<li><a href="'.$conf['facebook'].'" target="_blank" rel="nofollow"><i rel="tooltip" title="Facebook" class="icon-facebook icon-large"></i></a></li>'; ?>
					<?php if(isset($conf['twitter']) && $conf['twitter'] != '') echo '<li><a href="'.$conf['twitter'].'" target="_blank" rel="nofollow"><i rel="tooltip" title="Twitter" class="icon-twitter icon-large"></i></a></li>'; ?>
					<?php if(isset($conf['googleplus']) && $conf['googleplus'] != '') echo '<li><a href="'.$conf['googleplus'].'" target="_blank"><i rel="tooltip" title="Google Plus" class="icon-google-plus icon-large"></i></a></li>'; ?>
					<?php if(isset($conf['linkedin']) && $conf['linkedin'] != '') echo '<li><a href="'.$conf['linkedin'].'" target="_blank"><i rel="tooltip" title="Linkedin" class="icon-linkedin icon-large"></i></a></li>'; ?>
					<li><a href="#map" data-toggle="modal"><i rel="tooltip" title="<?php echo $lang['access_map'];?>" class="icon-map-marker icon-large"></i></a></li>
					<li><a href="#contact" data-toggle="modal"><i rel="tooltip" title="<?php echo $lang['contact']; ?>" class="icon-envelope icon-large"></i></a></li>
					<li><a href="#info" data-toggle="modal"><i rel="tooltip" title="<?php echo $lang['about']; ?>" class="icon-info icon-large"></i></a></li>
				</ul>
			</div><?php
			
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
			</div><?php
				
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
		</div>
		<!-- /Main Content -->
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
		<!-- /Google Map Modal -->
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
									<input type="submit" class="btn btn-primary btn-sm" value="<?php echo $lang['send_your_message']; ?>" id="submit" />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Contact Modal -->
		<!-- About Modal -->
		<div class="modal fade" id="info" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h2 class="modal-title"><?php echo $lang['about_title']; ?></h2>
					</div>
					<div class="modal-body">
<?php include('config/about.html'); ?>
					</div>
				</div>
			</div>
		</div>
		<!-- /About Modal -->
		<!-- JavaScript-->
		<script src="js/jquery-1.11.0.min.js"></script>
		<script src="js/bootstrap.min.js"></script> 
		<script src="js/jquery.countdown.js" type="text/javascript" charset="utf-8"></script> 
		<script type="text/javascript" src="js/bootstrap-progressbar.min.js"></script> 
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script> 
		<script type="text/javascript" src="js/custom.js"></script>
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
		<!-- /JavaScript-->
	</body>
</html>
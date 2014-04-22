<?php
header('Content-type: text/css');
require('../php/config.php');
?>
body,.modal-content {
	background:<?php echo $conf['colour_background']; ?>; 
}


#comingsoon_block {
	background-color: <?php echo $conf['colour_block']; ?>;
}


.social-icons ul li a {
	color: <?php echo $conf['colour_font'] ?>;
}


.btn {
	background-color: <?php echo $conf['colour_font'] ?>;
	border-color: <?php echo $conf['colour_font'] ?>;
}


.workprogress .progress {
	background-color: <?php echo $conf['colour_progressbar_background']; ?>;
}


.workprogress .progress-bar {
	background-color: <?php echo $conf['colour_progressbar']; ?>;
	color: <?php echo $conf['colour_font']; ?>;
}


#subscribestatus .alert {
	color : <?php echo $conf['colour_main']; ?>;
}


.pagination li a {
	color: <?php echo $conf['colour_font']; ?>;
}


.pagination .active span:hover {
	background-color: <?php echo $conf['colour_main']; ?>;
	color: <?php echo $conf['colour_font']; ?>;
	border-color: <?php echo $conf['colour_main']; ?>;
}


.content h1,i:hover, .modal h2,.modal h4,.service i,.logout a,.subscriberls .table a, a, a:hover {
	color: <?php echo $conf['colour_main']; ?>;
}


.btn:hover,.btn:focus,.btn:active,.btn.active,.pagination .active span {
	background-color: <?php echo $conf['colour_main']; ?>;
	border-color: <?php echo $conf['colour_main']; ?>;
}


.service h4,.service i:hover {
	color: <?php echo $conf['colour_font']; ?>;
}


.subform h4 {
	color: <?php echo $conf['colour_main']; ?>;
}

.subscriberls .empty {
	color: <?php echo $conf['colour_main']; ?>;
}
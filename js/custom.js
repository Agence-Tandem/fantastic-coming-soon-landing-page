jQuery(document).ready(function () {
	/* ---------------------------------------------------------------------- */
	/*	Configuration
	/* ---------------------------------------------------------------------- */
	var config = {
		"day": $('#var_countdown_day').val(),
		"month": $('#var_countdown_month').val(),
		"year": $('#var_countdown_year').val(),
		"hour": $('#var_countdown_hour').val(), //(0-24)
		"min": $('#var_countdown_min').val(), //(0-60)
		"sec": $('#var_countdown_sec').val(), //(0-60)
		"millisec": $('#var_countdown_millisec').val(), //(0-1000)
		"timer": $('#var_countdown_timer').val(), //dd:hh:mm:ss
		"latitude": $('#var_map_latitude').val(),
		"longitude": $('#var_map_longitude').val(),
		"markertitle": $('#var_map_markertitle').val(),
		"infowindow": $('#var_map_infowindow_title').val() + $('#var_map_infowindow_address').val()
	};
	/* ---------------------------------------------------------------------- */
	/*	Checkbox Active
	/* ---------------------------------------------------------------------- */
	$("input[type='checkbox']").change(function (e) {
		if ($(this).is(":checked")) {
			$(this).closest('tr').addClass("active");
		} else {
			$(this).closest('tr').removeClass("active");
		}
	});
	/* ---------------------------------------------------------------------- */
	/*	Countdown Timer Function
	/* ---------------------------------------------------------------------- */

	function timer() {
		var msecPerMinute = 1000 * 60;
		var msecPerHour = msecPerMinute * 60;
		var msecPerDay = msecPerHour * 24;

		// Set a date and get the milliseconds
		var date = new Date();
		dateMsec = date.getTime();

		date.setFullYear(config.year)
		date.setDate(config.day);
		date.setMonth(config.month - 1);
		date.setHours(config.hour, config.min, config.sec, config.millisec);

		// Get the difference in milliseconds.
		var interval = date.getTime() - dateMsec;

		// Calculate how many days the interval contains. Subtract that
		// many days from the interval to determine the remainder.
		var days = Math.floor(interval / msecPerDay);
		interval = interval - (days * msecPerDay);

		// Calculate the hours, minutes, and seconds.
		var hours = Math.floor(interval / msecPerHour);
		interval = interval - (hours * msecPerHour);

		var minutes = Math.floor(interval / msecPerMinute);
		interval = interval - (minutes * msecPerMinute);

		var seconds = Math.floor(interval / 1000);

		// Display the result.
		if (days < 0 || hours < 0 || minutes < 0 || seconds < 0) {
			var result = config.timer;
		} else {
			if (days < 10)
				days = '0' + days;
			if (hours < 10)
				hours = '0' + hours;
			if (minutes < 10)
				minutes = '0' + minutes;
			if (seconds < 10)
				seconds = '0' + seconds;
			var result = days + ":" + hours + ":" + minutes + ":" + seconds;
		}
		return result;
	}
	/* ---------------------------------------------------------------------- */
	/*	Countdown
	/* ---------------------------------------------------------------------- */
	if($('#counter').hasClass('counter')) {
		$('#counter').countdown({
			image: 'images/digits.png',
			//timerEnd: function(){ alert('end!'); },
			startTime: timer()
		});
	}
	/* ---------------------------------------------------------------------- */
	/*	Progress Bar
	/* ---------------------------------------------------------------------- */
	if($('#progress').hasClass('progress')) {
		$('.progress .progress-bar').progressbar({
			transition_delay: 300,
			refresh_speed: 50,
			display_text: 2,
			use_percentage: true,
			display_text: 'center',
		});
	}
	/* ---------------------------------------------------------------------- */
	/*	Tooltip
	/* ---------------------------------------------------------------------- */
	$("i").tooltip();
	$("#progress").tooltip();
	/* ---------------------------------------------------------------------- */
	/*	Google Map
	/* ---------------------------------------------------------------------- */
	$("#map").modal({
		show: false
	}).on("shown.bs.modal", function () {
		var myLatlng = new google.maps.LatLng(config.latitude, config.longitude);
		var mapOptions = {
			zoom: 15,
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}

		var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

		var contentString = config.infowindow;

		var infowindow = new google.maps.InfoWindow({
			content: contentString
		});

		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			title: config.markertitle
		});
		google.maps.event.addListener(marker, 'click', function () {
			infowindow.open(map, marker);
		});
	});
	/* ---------------------------------------------------------------------- */
	/*	Contact Form
	/* ---------------------------------------------------------------------- */
	var $contactform = $('#form'),
		$success = 'Your message has been sent. Thank you!';

		$contactform.submit(function () {
		$.ajax({
		type: "POST",
			url: "php/contact.php",
			data: $(this).serialize(),
			success: function (msg) {
				if (msg == 'SEND') {
					response = '<div class="alert alert-success">' + $success + '<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a></div>';
				} else {
					response = '<div class="alert alert-danger">' + msg + '<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a></div>';
				}
				// Hide any previous response text
				$(".alert").remove();
				// Show response message
				$contactform.prepend(response);
				window.setTimeout(function () {
					$(".alert").fadeTo(3000, 0).slideUp(3000, function () {
						$(this).remove();
					});
				}, 3000);
			}
		});
		return false;
	});
	/* ---------------------------------------------------------------------- */
	/*	Subscribe
	/* ---------------------------------------------------------------------- */
	var $subscribeform = $('#subscribe'),
		$subscribesuccess = 'You Have Successfully Subscribed. Thank you!';

	$subscribeform.submit(function () {
		$.ajax({
			type: "POST",
			url: "php/subscribe.php",
			data: $(this).serialize(),
			success: function (msg) {
				if (msg == 'SEND') {
					response = '<div class="alert alert-dismissable">' + $subscribesuccess + '<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a></div>';
				} else {
					response = '<div class="alert alert-dismissable">' + msg + '<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a></div>';
				}
				// Hide any previous response text
				$(".alert").remove();
				// Show response message
				$('#subscribestatus').prepend(response);
				window.setTimeout(function () {
					$(".alert").fadeTo(3000, 0).slideUp(3000, function () {
						$(this).remove();
					});
				}, 3000);
			}
		});
		return false;
	});
	/* ---------------------------------------------------------------------- */
	/*	Windows Phone 8 and Internet Explorer 10 Compatibility 
	/* ---------------------------------------------------------------------- */
	if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
		var msViewportStyle = document.createElement("style")
		msViewportStyle.appendChild(
			document.createTextNode(
				"@-ms-viewport{width:auto!important}"
			)
		)
		document.getElementsByTagName("head")[0].appendChild(msViewportStyle)
	}
});
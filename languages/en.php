<?php

/*
 * 
 * Edit the code below for you specific needs 
 * 
 */
 
// Website title, this text appear in the HTML header, it is used by search engine, 65 characters maximum
$lang['page_title_header'] = "%s Coming Soon !"; // Where %s add automatically the name of your website

// Website description, this text appear in the HTML header, it is used by search engines, 156 characters maximum
$lang['website_description_header'] = 'This is my business description for search engines';

// Homepage H1 title
$lang['title_homepage_h1'] = 'Our Website is Under Construction';

// Homepage text under the title
$lang['content_homepage_1st_paragraph'] = 'Coming soon, the website for the business of our company, with a lot of free services and informations.';

// Homepage text for the progression bar
$lang['content_homepage_progess_bar'] = 'Current status : Working on a the unique template design !';

// Homepage text for the newsletter
$lang['content_homepage_newsletter'] = 'Sign up now to our newsletter and you\'ll be one of the first to know when the site is ready';

// About page title
$lang['about_title'] = 'About';


/*
 * 
 * Edit the code below if you really need it 
 * 
 */


// Homepage
$lang['days'] = 'Days';
$lang['hours'] = 'Hours';
$lang['minutes'] = 'Minutes';
$lang['seconds'] = 'Seconds';
$lang['subscribe'] = 'Subscribe';
$lang['access_map'] = 'Access Map';
$lang['contact'] = 'Contact';
$lang['about'] = 'About';
$lang['send_us_an_email'] = 'Send Us an Email';
$lang['your_name'] = 'Your Name';
$lang['enter_name'] = 'Enter your name';
$lang['your_email'] = 'Your Email';
$lang['enter_email'] = 'Enter your email';
$lang['your_message'] = 'Your Message';
$lang['send_your_message'] = 'Send your message';

// Newsletter
$lang['already_exist'] = 'Already exists in the subscriber database!';
$lang['error_adding_email'] = 'Error adding %s to the database!';
$lang['subscribed_successfully'] = 'Subscribed Successfully';
$lang['unsubscribed_successfully'] = 'You have been successfully unsubscribed !!';
$lang['please_your_email_to_unsubscribe'] = 'Please provide your email address if you do not wish to receive email notification us !!';
$lang['unsubscribe'] = 'Unsubscribe';

// Contact


// Administration
$lang['username'] = 'Username';
$lang['password'] = 'Password';
$lang['remember_me'] = 'Remember me';
$lang['login'] = 'Login';
$lang['welcome_admin'] = 'Welcome, Admin';
$lang['logout'] = 'Logout';
$lang['active_user'] = 'Active User';
$lang['inactive_user'] = 'Inactive User';
$lang['total'] = 'Total';
$lang['subscribers'] = 'Subscribers';
$lang['delete'] = 'Delete';
$lang['delete_all'] = 'Delete All';
$lang['export_all'] = 'Export All';
$lang['no_subscribers'] = "No Subscribers, List Empty !!";


// texts for index.php



//Receiver Mail i.e., From Email Address
$lang['subscriber_from_name'] = 'Subscriber';


//Subject For Email
define('SUBJECT', 'Contact from your website');
define('USERSUBJECT', 'Welcome to '.$conf['website_name']);


//Messages
define('SUBSCRIBER_MAIL_MESSAGE', 'New subscriber subscribed to our website');
define('USER_SUBSCRIBER_MAIL_MESSAGE', 'Subscribed Successfully, To unsubscribe '.$conf ['website_url_directory'].'/unsubscribe/');
define('MSG_INVALID_NAME', 'Please enter your name.');
define('MSG_INVALID_EMAIL', 'Please enter valid e-mail.');
define('MSG_INVALID_MESSAGE', 'Please enter your message.');
define('MSG_SEND_ERROR', 'Sorry, we can\'t send this message.');
define('MSG_INVALID_SUBSCRIBE_EMAIL', 'Oops! Please enter a valid email address');


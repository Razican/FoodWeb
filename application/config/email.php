<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| User Agent
|--------------------------------------------------------------------------
|
| The user agent the email class will use when sending the email.
|
*/
$config['useragent']		= 'Food Finder';

/*
|--------------------------------------------------------------------------
| Protocol
|--------------------------------------------------------------------------
|
| The mail sending protocol. These are the posible values for the protocol:
| mail, sendmail, or smtp.
|
*/
$config['protocol']			= 'smtp';

/*
|--------------------------------------------------------------------------
| SMTP host
|--------------------------------------------------------------------------
|
| SMTP Server Address.
|
*/
$config['smtp_host']		= 'ssl://smtp.googlemail.com';

/*
|--------------------------------------------------------------------------
| SMTP username
|--------------------------------------------------------------------------
|
| The username for the SMTP host for sending email.
|
*/
$config['smtp_user']		= '';

/*
|--------------------------------------------------------------------------
| SMTP password
|--------------------------------------------------------------------------
|
| The password for the SMTP username. in case there is no need for it,
| leave it blank: '';
|
*/
$config['smtp_pass']		= '';

/*
|--------------------------------------------------------------------------
| SMTP port
|--------------------------------------------------------------------------
|
| The port the SMTP server uses. If you don't have a default, comment the
| line:
| //$config['smtp_port']	= 465;
|
*/
$config['smtp_port']		= 465;

/*
|--------------------------------------------------------------------------
| Email type
|--------------------------------------------------------------------------
|
| Type of email. If you send HTML email you must send it as a complete web
| page. Make sure you don't have any relative links or relative image
| paths otherwise they will not work. Possible values: 	text or html.
|
*/
$config['mailtype']			= 'html';

/*
|--------------------------------------------------------------------------
| New lines
|--------------------------------------------------------------------------
|
| Newline character. (Use "\r\n" to comply with RFC 822). Possible values:
| "\r\n" or "\n" or "\r". IMPORTANT: use " instead of '.
|
*/
$config['crlf']				= "\r\n";
$config['newline']			= "\r\n";

/*
|--------------------------------------------------------------------------
| SMTP Encryption
|--------------------------------------------------------------------------
|
| SMTP encryption method.
|
*/
$config['smtp_crypto']		= 'ssl';

/*
|--------------------------------------------------------------------------
| Word wrap
|--------------------------------------------------------------------------
|
| Enable word-wrap.
|
*/
$config['wordwrap']			= FALSE;

/* End of file email.php */
/* Location: ./application/config/email.php */
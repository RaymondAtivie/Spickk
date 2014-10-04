<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*
|--------------------------------------------------------------------------
| Database Table Names
|--------------------------------------------------------------------------
|
| These are table names for the database
|
*/

define("TB_USERS", "users");
define("TB_USERS_INFO", "users_info");
define("TB_USER_CATEGORY", "user_category");
define("TB_IMAGE", "image");
define("TB_IMAGE_COMMENTS", "image_comments");
define("TB_IMAGE_LIKES", "image_likes");
define("TB_IMAGE_FAVS", "image_favs");
define("TB_IMAGE_VIEWS", "image_views");
define("TB_ALBUM", "album");
define("TB_ALBUM_IMAGE", "album_image");
define("TB_FOLLOWING", "following");
define("TB_PROFILE_VIEWS", "profile_views");
/* End of file constants.php */
/* Location: ./application/config/constants.php */
<?php

/*
|--------------------------------------------------------------------------
| Define Root Directory
|--------------------------------------------------------------------------
|  App Path, Admin Root Name, Admin Folder Name
*/
if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
define('APP_PATH', realpath(dirname(__FILE__)). DS . DS . '../app');
define('ADMIN_FOLDER_NAME', 'admin');
define('ADMIN_ROOT_NAME', 'app-admin');

/*
|--------------------------------------------------------------------------
| Define Resources Directory
|--------------------------------------------------------------------------
| [1] Front Resources
| [2] Admin Resources
*/
// [1]
define('VIEWS_PATH', APP_PATH . DS . '..' . DS . 'resources'. DS . 'views' . DS);
define('TEMPLATE_PATH', APP_PATH . DS . '..' . DS . 'templates' . DS);
define('LANGUAGES_PATH', APP_PATH . DS . '..' . DS . 'resources'. DS . 'lang' . DS);

// [2]
define('ADMIN_VIEWS_PATH', APP_PATH . DS . '..' . DS . ADMIN_FOLDER_NAME .'/resources'. DS . 'views' . DS);
define('ADMIN_TEMPLATE_PATH', APP_PATH . DS . '..' . DS . ADMIN_FOLDER_NAME . '/templates' . DS);
define('ADMIN_LANGUAGES_PATH', APP_PATH . DS . '..' . DS . ADMIN_FOLDER_NAME . '/resources'. DS . 'lang' . DS);

/*
|--------------------------------------------------------------------------
| Default Application language
|--------------------------------------------------------------------------
*/
defined('APP_DEFAULT_LANGUAGE')     ? null : define ('APP_DEFAULT_LANGUAGE', 'de');

/*
|--------------------------------------------------------------------------
| Check For Access Privileges
|--------------------------------------------------------------------------
| This Is Defination for the Admin Panel
| if the value is [1] will be check if the User has Privileges to access the URL
| if the value is [0] will given access to user for all Url
*/
defined('CHECK_FOR_PRIVILEGES') ? null : define('CHECK_FOR_PRIVILEGES', 1);

/*
|--------------------------------------------------------------------------
| Database Credentials
|--------------------------------------------------------------------------
| The Const [DATABASE_CONN_DRIVER] descreib the MYSQL connection [PDO] OR [MYSQLI]
| The value [1] is for PDO and the value [2] is for MYSQLI
*/
defined('DATABASE_HOST_NAME')       ? null : define ('DATABASE_HOST_NAME', 'localhost');
defined('DATABASE_USER_NAME')       ? null : define ('DATABASE_USER_NAME', '');
defined('DATABASE_PASSWORD')        ? null : define ('DATABASE_PASSWORD', '');
defined('DATABASE_DB_NAME')         ? null : define ('DATABASE_DB_NAME', 'kmc');
defined('DATABASE_PORT_NUMBER')     ? null : define ('DATABASE_PORT_NUMBER', 3306);
defined('DATABASE_CONN_DRIVER')     ? null : define ('DATABASE_CONN_DRIVER', 1);
defined('APP_SALT')                 ? null : define ('APP_SALT', '$2a$07$yeNCSN1wRpYopOhv0TrrReP$');

/*
|--------------------------------------------------------------------------
| Session configuration
|--------------------------------------------------------------------------
| Here the defination for the Session name,lift time and Storage Directory
|
*/
defined('SESSION_NAME')          ? null : define ('SESSION_NAME', '_ESTORE_SESSION');
defined('SESSION_LIFE_TIME')     ? null : define ('SESSION_LIFE_TIME', 0);
defined('SESSION_SAVE_PATH')     ? null : define ('SESSION_SAVE_PATH', APP_PATH . DS . '..' . DS . 'sessions');

/*
|--------------------------------------------------------------------------
| Defination the uploaded files Directory
|--------------------------------------------------------------------------
*/
defined('UPLOAD_STORAGE')           ? null : define ('UPLOAD_STORAGE', APP_PATH . DS . '..' . DS . 'public' . DS . 'uploads');
defined('IMAGES_UPLOAD_STORAGE')    ? null : define ('IMAGES_UPLOAD_STORAGE', UPLOAD_STORAGE . DS . 'images');
defined('PROFILE_UPLOAD_STORAGE')   ? null : define ('PROFILE_UPLOAD_STORAGE', UPLOAD_STORAGE . DS . 'images/users');
defined('DOCUMENTS_UPLOAD_STORAGE') ? null : define ('DOCUMENTS_UPLOAD_STORAGE', UPLOAD_STORAGE . DS . 'documents');
defined('MAX_FILE_SIZE_ALLOWED')    ? null : define ('MAX_FILE_SIZE_ALLOWED', ini_get('upload_max_filesize'));
defined('PHPMAILER') ? null : define ('PHPMAILER', APP_PATH . DS . 'lib'. DS . 'PHPMailer'. DS . 'PHPMailer');

/*
|--------------------------------------------------------------------------
| Define Js And CSS Files Directory
|--------------------------------------------------------------------------
| [1] is for Admin Panel
| [2] is for Front Siet
*/
// [1]
define('ADMIN_CSS', '/admin-boot/css/');
define('ADMIN_JS', '/admin-boot/js/');
define('ADMIN_VENDOR', '/admin-boot/vendor/');
// [2]
define('CSS', '/assets/css/');
define('JS', '/assets/js/');

/*
|--------------------------------------------------------------------------
| Custom Functions
|--------------------------------------------------------------------------
| [1] PRE Function Output
| [2] App HTML Direction And Language
*/
// [1]
function  pre($data, $data1 = null, $data2 = null, $data3 = null)
{
  echo "<pre>";
   $result = var_dump($data, $data1, $data2, $data3) ;
  echo "</pre>";
  return $result;
}

// [2]
function AppLcoalDirection()
{
  if ($_SESSION['lang'] == 'en') {
    echo "lang='en' dir='ltr'";
  }elseif ($_SESSION['lang'] == 'de') {
    echo "lang='de' dir='ltr'";
  }elseif ($_SESSION['lang'] == 'ar') {
    echo "lang='ar' dir='rtl'";
  }
}

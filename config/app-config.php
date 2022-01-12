<?php
/*
|--------------------------------------------------------------------------
| URL Language Configuration
|--------------------------------------------------------------------------
| This Function will Check If Iseet Langauge Kay [en, de, ar] In Url
| If Iseet The Language Kay Will Started New Session [lang] with Langauge Kay
*/
  // Get The Language Variable ($lang_url) From The Url
  $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 3);
  if (isset($url[0]) && $url[0] == ADMIN_ROOT_NAME) {
    $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 4);

    if(isset($url[1]) && $url[1] == 'en' ||  $url[1] == 'de' ||  $url[1] == 'ar') {
      $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 5);
      $lang_url = $url[1];
     }

  }else {

    if(isset($url[0]) && $url[0] == 'en' ||  $url[0] == 'de' ||  $url[0] == 'ar') {
      $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 4);
      $lang_url = $url[0];
     }

  }
  // Registry The Session [lang] If Isset The Language Variable ($lang_url)
  if(isset($lang_url) && $lang_url == 'en') {
    $_SESSION['lang'] = $lang_url;
    $_SESSION['lang_changed'] = true;
  }elseif (isset($lang_url) && $lang_url == 'de' ) {
    $_SESSION['lang'] = $lang_url;
    $_SESSION['lang_changed'] = true;
  }elseif (isset($lang_url) && $lang_url == 'ar') {
    $_SESSION['lang'] = $lang_url;
    $_SESSION['lang_changed'] = true;
  }

/*
|--------------------------------------------------------------------------
| SCRF TOKEN Configuration
|--------------------------------------------------------------------------
| This Function will cearte Session [scrf_token] if not isset
| After creation, the key will be encrypted and generated for the Views And Controller
*/
if (empty($_SESSION['csrf_token'])){$_SESSION['csrf_token'] = bin2hex(random_bytes(32));}
defined('CSRF_TOKEN')   ? null : define ('CSRF_TOKEN', hash_hmac("sha256", "this is some string from 2019: str_replace.php",  $_SESSION["csrf_token"]).md5("you will be not found the key hahahaha"));

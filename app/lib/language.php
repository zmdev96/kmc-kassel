<?php
namespace PHPMVC\LIB;

class Language
{
  private $dictionary = [];

  public function load($path)
  {
      $defaultLanguage = APP_DEFAULT_LANGUAGE;
      if(isset($_SESSION['lang'])) {
        $defaultLanguage =  $_SESSION['lang'] ;
      }

      $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 3);
      if(isset($url[0]) && $url[0] == ADMIN_ROOT_NAME) {
          $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 5);
          $languageFileToLoad = ADMIN_LANGUAGES_PATH . $defaultLanguage . DS . str_replace('.', DS , $path) . '.lang.php';
      }else {
        $languageFileToLoad = LANGUAGES_PATH . $defaultLanguage . DS . str_replace('.', DS , $path) . '.lang.php';
      }

      if(file_exists($languageFileToLoad)) {
          require $languageFileToLoad;
          if(is_array($_) && !empty($_)) {
              foreach ($_ as $key => $value) {
                  $this->dictionary[$key] = $value;
              }
          }
      } else {
          trigger_error('Sorry the Language file ' . $path . ' doens\'t exists', E_USER_WARNING);
      }

  }

  public function get($key)
  {
      if(array_key_exists($key, $this->dictionary)) {
          return $this->dictionary[$key];
      }
  }

  public function feedKey ($key, $data)
  {
      if(array_key_exists($key, $this->dictionary)) {
          array_unshift($data, $this->dictionary[$key]);
          return call_user_func_array('sprintf', $data);
      }
  }

  public function getDictionary()
  {
    return $this->dictionary;
  }
}

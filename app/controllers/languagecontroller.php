<?php
namespace PHPMVC\Controllers;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;


class LanguageController extends AbstractController
{

    use Helper;
    use InputFilter;

    public function indexAction()
    {
      // Registry The Session [lnag_changed] If This Page Requested
      $_SESSION['lang_changed'] = true;
      // Get The Language Variable ($lang_url) From The Url
      $url = explode('/', trim(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH), '/'), 3);

      if (isset($url[0]) && $url[0] == 'app-admin') {
        if(isset($url[1]) && $url[1] == 'en' ||  $url[1] == 'de' ||  $url[1] == 'ar') {
          $url = explode('/', trim(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH), '/'), 5);
          $lang_url = $url[1];
         }
      }else {
        if(isset($url[0]) && $url[0] == 'en' ||  $url[0] == 'de' ||  $url[0] == 'ar') {
          $url = explode('/', trim(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH), '/'), 4);
          $lang_url = $url[0];
         }
      }


      // Registry The Session [lang]
      $params   = $this->filterString($this->_params[0]);
      if(!empty($params) && $params == 'en') {
       unset($_SESSION['lang']);
       $_SESSION['lang'] = 'en';
      }elseif (!empty($params) && $params == 'de' ) {
       unset($_SESSION['lang']);
       $_SESSION['lang'] = 'de';
      }elseif (!empty($params) && $params == 'ar') {
       unset($_SESSION['lang']);
       $_SESSION['lang'] = 'ar';
      }else {
       $_SESSION['lang'] = APP_DEFAULT_LANGUAGE;
      }
      /*
      * Tow Method For Redirect
      * [1] if Not Isset The Language Variable In The Url
      * [2] if Isset The Language Variable In The Url
      */
      if (!isset($lang_url)) {
        $url_referer = trim(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH), '/');
        $redirect_url2=   '/'. $_SESSION['lang'] . '/'. $url_referer;
        $this->redirect($redirect_url2);
        exit();
      }elseif (isset($lang_url)) {
        $url_referer = trim(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH), '/');
        $redirect_url=   '/'. str_replace($lang_url, $_SESSION['lang'], $url_referer);
        $this->redirect($redirect_url);
        exit();
      }

    }
}

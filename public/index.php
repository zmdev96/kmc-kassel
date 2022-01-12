<?php

  namespace PHPMVC;
  use PHPMVC\LIB\Authentication;
  use PHPMVC\LIB\Messenger;
  use PHPMVC\LIB\Registry;
  use PHPMVC\LIB\FrontController;
  use PHPMVC\LIB\SessionManager;
  use PHPMVC\LIB\Template\Template;
  use PHPMVC\LIB\Language;

  $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 3);



  if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

  // Require the Config And Autoload Files
  require_once  '..' . DS .'config' . DS . 'config.php';
  require_once  APP_PATH . DS . 'lib' . DS . 'autoload.php';

  // Start New Session
  $session = new SessionManager();
  $session->start();
  // Get the Language Session if Isset
  if(!isset($session->lang)){
    $session->lang = APP_DEFAULT_LANGUAGE;
  }

  // Require the Language URL Functionlty From Congig Folder
  require_once  '..' . DS .'config' . DS . 'app-config.php';

  if(isset($url[0]) && $url[0] == ADMIN_ROOT_NAME) {
      $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 5);
      $template_parts =   require_once  '..' . DS .'config' . DS . 'admin-templates.php';
  }else {
    $template_parts =   require_once  '..' . DS .'config' . DS . 'front-templates.php';
  }


  /**
  * New Objekt Form Template, Language And FrontController
  * The $template_parts Variable is same The Template_PATH is defined in Config/
  */

  $template = new Template($template_parts);
  $language = new Language();
  $messenger = Messenger::getInstance($session);

  $authentication = Authentication::getInstance($session);


  /**
  * Registrition The Sesstions And Languages
  */
  $registry = Registry::getInstance();
  $registry->session    = $session;
  $registry->language   = $language;
  $registry->messenger  = $messenger;


  $frontController = new FrontController($template, $registry , $authentication );
  $frontController->dispatch();

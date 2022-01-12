<?php
namespace PHPMVC\LIB;
use PHPMVC\LIB\Registry;
use PHPMVC\LIB\Template\Template;
use PHPMVC\LIB\Helper;

class FrontController
{
  use Helper;
  const NOT_FOUND_ACTION = 'notFoundAction';
  const NOT_FOUND_CONTROLLER = 'PHPMVC\Controllers\\NotFoundController';

  private $_controller  = 'home';
  private $_action      = 'index';
  private $_params      = array();
  private $_lang        = '';
  private $_admin       = '';


  private $_template;
  private $_registry;
  private $_authentication;

  public function __construct(Template $template, Registry $registry , Authentication $auth)
  {
      $this->_template = $template;
      $this->_registry = $registry;
      $this->_authentication = $auth;

      $this->_parseUrl();
  }

  private function _parseUrl()
  {
    $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 3);

    if(isset($url[0]) && $url[0] == ADMIN_ROOT_NAME) {
        $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 4);
        $this->_admin = $url[0];
        $this->admin = true;
        if (isset($url[1]) && $url[1] == 'en' ||  $url[1] == 'de' ||  $url[1] == 'ar' ) {
          $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 5);

          $this->_lang = $url[1];
        }else {
          // code...
        }

    }elseif(isset($this->_admin) && !isset($this->_lang)) {
        $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 4);
    }elseif(isset($url[0]) && $url[0] == 'en' ||  $url[0] == 'de' ||  $url[0] == 'ar') {
        $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 4);
        $this->_lang = $url[0];
    }


      if (isset($this->_admin) && $this->_admin == ADMIN_ROOT_NAME) {

        if(isset($this->_lang) && $this->_lang== 'en' || $this->_lang ==  'de' ||  $this->_lang == 'ar') {
          if(isset($url[2]) && $url[2] != '') {
            $this->_controller = $url[2];
          }
        }else{
          if(isset($url[1]) && $url[1] != '') {
            $this->_controller = $url[1];
          }
        }

      }else {
        if(isset($url[0]) && $this->_lang == 'en' || $this->_lang ==  'de' ||  $this->_lang == 'ar') {
          if(isset($url[1]) && $url[1] != '') {
            $this->_controller = $url[1];
          }
        }else{
          if(isset($url[0]) && $url[0] != '') {
            $this->_controller = $url[0];
          }
        }

      }

      if (isset($this->_admin) && $this->_admin == ADMIN_ROOT_NAME) {

        if(isset($this->_lang) && $this->_lang == 'en' ||$this->_lang  ==  'de' ||  $this->_lang  == 'ar') {
          if(isset($url[3]) && $url[3] != '') {
            $this->_action = $url[3];
          }
        }else{
          if(isset($url[2]) && $url[2] != '') {
            $this->_action = $url[2];
          }
        }

      }else {
        if(isset($this->_lang) && $this->_lang == 'en' || $this->_lang ==  'de' ||  $this->_lang == 'ar') {
          if(isset($url[2]) && $url[2] != '') {
            $this->_action = $url[2];
          }
        }else{
          if(isset($url[1]) && $url[1] != '') {
            $this->_action = $url[1];
          }
        }

      }


      if (isset($this->_admin) && $this->_admin == ADMIN_ROOT_NAME) {

        if(isset($this->_lang) && $this->_lang == 'en' || $this->_lang  ==  'de' ||  $this->_lang  == 'ar') {
          if(isset($url[4]) && $url[4] != '') {
            $this->_params = explode('/', $url[4]) ;
          }
        }else{
          if(isset($url[3]) && $url[3] != '') {
            $this->_params = explode('/', $url[3]) ;
          }
        }

      }else {
        if(isset($this->_lang) && $this->_lang == 'en' || $this->_lang ==  'de' ||  $this->_lang == 'ar') {
          if(isset($url[3]) && $url[3] != '') {
            $this->_params = explode('/', $url[3]) ;
          }
        }else{
          if(isset($url[2]) && $url[2] != '') {
            $this->_params = explode('/', $url[2]) ;
          }
        }

      }


  }

  public function dispatch()
  {

      if ($this->_admin == true) {
        // Define The Controller And Action
        $controllerClassName = 'PHPMVC\AdminControllers\\' . ucfirst($this->_controller) . 'Controller';
        $actionName = $this->_action . 'Action';

        // Check The User If Is Authorized Or Not To Access The App
        if (!$this->_authentication->isAuthorized()) {
          // redirect all Request to the auth/login
          if($this->_controller != 'auth' && $this->_action != 'login') {
              $this->redirect('/'.ADMIN_ROOT_NAME.'/auth/login');
          }
        } else {
          // deny access to the auth/login
          if($this->_controller == 'auth' && $this->_action == 'login') {
            isset($_SERVER['HTTP_REFERER']) ? $this->redirect($_SERVER['HTTP_REFERER']) : $this->redirect('/'.ADMIN_ROOT_NAME.'/home');
          }
        }
        // Check if the user has access to specific url
        if((bool) CHECK_FOR_PRIVILEGES === true) {
            if(!$this->_authentication->hasAccess($this->_controller, $this->_action))
            {
                $this->redirect('/'.ADMIN_ROOT_NAME.'/accessdenied');
            }
        }

      }else {
        // Define The Controller And Action
        $controllerClassName = 'PHPMVC\Controllers\\' . ucfirst($this->_controller) . 'Controller';
        $actionName = $this->_action . 'Action';

      }

      $controller = new $controllerClassName();
      $controller->setController($this->_controller);
      $controller->setAction($this->_action);
      $controller->setAdmin($this->_admin);
      $controller->setParams($this->_params);
      $controller->setTemplate($this->_template);
      $controller->setRegistry($this->_registry);
      $controller->$actionName();
    }

}

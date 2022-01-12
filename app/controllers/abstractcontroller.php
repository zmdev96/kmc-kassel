<?php
namespace PHPMVC\Controllers;

use PHPMVC\LIB\FrontController;
use PHPMVC\LIB\Validate;



class AbstractController
{
  use Validate;

  protected $_controller;
  protected $_action;
  protected $_params;
  protected $_admin;

  protected $_template;
  protected $_registry;

  // Passing The Models Output Data To Array
  protected $_data = [];

  public function __get($key)
  {
      return $this->_registry->$key;
  }

  public function notFoundAction()
  {
    $this->_view();
  }

  public function setController($controllerName)
  {
    $this->_controller = $controllerName;
  }

  public function setAction($actionName)
  {
    $this->_action = $actionName;
  }

  public function setTemplate($template)
  {
    $this->_template = $template;
  }
  public function setRegistry($registry)
  {
    $this->_registry = $registry;
  }

  public function setParams($params)
  {
    $this->_params = $params;
  }
  public function setAdmin($admin)
  {
    $this->_admin = $admin;
  }

  protected function _view()
   {

     if ($this->_admin == true) {
       $view = ADMIN_VIEWS_PATH . $this->_controller . DS . $this->_action . '.view.php';
       if($this->_action == FrontController::NOT_FOUND_ACTION || !file_exists($view)) {
           $view = ADMIN_VIEWS_PATH . 'notfound' . DS . 'notfound.view.php';
       }
     }else {
       $view = VIEWS_PATH . $this->_controller . DS . $this->_action . '.view.php';
       if($this->_action == FrontController::NOT_FOUND_ACTION || !file_exists($view)) {
           $view = VIEWS_PATH . 'notfound' . DS . 'notfound.view.php';
       }
     }


    $this->_data = array_merge($this->_data, $this->language->getDictionary());
    $this->_template->setRegistry($this->_registry);
    $this->_template->setcontentViewFile($view);
    $this->_template->setAppData($this->_data);
    $this->_template->setControllerAction($this->_controller, $this->_action);
    $this->_template->setAdmin($this->_admin);

    $this->_template->renderApp();


    }
}

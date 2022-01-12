<?php
namespace PHPMVC\LIB\Template;

class Template
{
  use TemplateHelper;

  private $_templateParts;
  private $_content_view;
  private $_data;
  private $_controller;
  private $_action;
  private $_admin;

  private $_registry;



  public function __construct(array $parts)
  {
      $this->_templateParts = $parts;
  }
  public function __get($key)
  {
      return $this->_registry->$key;
  }

  public function setcontentViewFile($actionViewPath)
  {
      $this->_content_view = $actionViewPath;
  }

  public function setAppData($data)
  {
      $this->_data = $data;
  }
  // TODO: implement a better solution
  public function swapTemplate($template)
  {
      $this->_templateParts['template'] = $template;
  }

  public function setRegistry($registry)
  {
      $this->_registry = $registry;
  }
  public function setAdmin($admin)
  {
      $this->_admin = $admin;
  }

  public function setControllerAction($controller , $action)
  {
      $this->_controller = $controller;
      $this->_action = $action;
      // Constant Objekt
      define('CONTROLLER', $this->_controller);
      define('ACTION', $this->_action);

  }

  private function renderStartHead()
  {
    if ($this->_admin == true) {
      require_once ADMIN_TEMPLATE_PATH . 'starthead.php';
    }else {
      require_once TEMPLATE_PATH . 'starthead.php';
    }
  }

  private function renderEndHead()
  {
    if ($this->_admin == true) {
      require_once ADMIN_TEMPLATE_PATH . 'endhead.php';
    }else {
      require_once TEMPLATE_PATH . 'endhead.php';
    }
  }

  private function renderEndFooter()
  {
    if ($this->_admin == true) {
      require_once ADMIN_TEMPLATE_PATH . 'endfooter.php';
    }else {
      require_once TEMPLATE_PATH . 'endfooter.php';
    }
  }

  private function renderBlocks()
  {
    if(!array_key_exists('template', $this->_templateParts)) {
    trigger_error('Sorry you have to define the template blocks from The Templates Config', E_USER_WARNING);
    } else {
      $parts = $this->_templateParts['template'];
      if(!empty($parts)) {
          extract($this->_data);
          foreach ($parts as $partKey => $file) {
              if($partKey === ':view') {
                  extract($this->_data);

                  require_once $this->_content_view;
              } else {
                  require_once $file;
              }
          }
      }
    }
  }
  private function renderHeadResources()
  {
    $output='';
    if(!array_key_exists('head_resources', $this->_templateParts)) {
    trigger_error('Sorry you have to define the Head Resources from The Templates Config', E_USER_WARNING);
    } else {
      $resources = $this->_templateParts['head_resources'];
      // Generate CSS Files
      $css = $resources['css'];
      if(!empty($css)) {
        foreach ($css as $cssKey => $path) {
        $output.='<link type="text/css" rel="stylesheet" href="'. $path .'" />';
        }
      }
      // Generate JS Files
      $js = $resources['js'];
      if(!empty($js)) {
        foreach ($js as $jsKey => $path) {
        $output.='<script type="text/javascript" src="'. $path .'" ></script>';
        }
      }
    }
    echo $output;
  }

  private function renderFooterResources()
  {
    $output='';
    if(!array_key_exists('footer_resources', $this->_templateParts)) {
    trigger_error('Sorry you have to define the Footer Resources from The Templates Config', E_USER_WARNING);
    } else {
      $resources = $this->_templateParts['footer_resources'];

      // Generate JS Files
      $js = $resources;
      if(!empty($js)) {
        foreach ($js as $jsKey => $path) {
        $output.='<script type="text/javascript" src="'. $path .'" ></script>';
        }
      }
    }
    echo $output;
  }

  public function renderApp()
  {
    ob_start();
    extract($this->_data);
    $this->renderStartHead();
    $this->renderHeadResources();
    $this->renderEndHead();
    $this->renderBlocks();
    $this->renderFooterResources();
    $this->renderEndFooter();
    ob_get_contents();
    ob_flush();
  }
}

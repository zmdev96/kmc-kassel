<?php
namespace PHPMVC\Controllers;

use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\lib\Messenger;
use PHPMVC\Models\UsersModel;
use PHPMVC\Models\BlogModel;


class TestController extends AbstractController
{
    use Helper;
    use InputFilter;


    public function indexAction()
    {

      $var = $this->_controller;
      echo "Your Controller is: " . $this->_controller . '<br>';
      echo "Your Action is: " . $this->_action . '<br>';
      if ($this->_admin == true) {
        echo "Your Browser is: " . $this->_admin . '<br>';
      }
      echo "Your parse is: " . $this->_params[0] . '<br>';


    }


}

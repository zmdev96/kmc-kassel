<?php
namespace PHPMVC\Controllers;

use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Helper;



class NotificationsController extends AbstractController
{
  use InputFilter;
  use Helper;

  public function indexAction()
  {

    $this->_view();
  }

  public function addAction()
  {

  }

  public function editAction()
  {

  }
  public function deleteAction()
  {
  }
}

<?php
namespace PHPMVC\Controllers;

class ImprintController extends AbstractController
{
  public function indexAction()
  {
  $this->language->load('template.common');
  $this->language->load('imprint.index');
    $this->_view();
  }


}

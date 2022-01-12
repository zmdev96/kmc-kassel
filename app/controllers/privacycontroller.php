<?php
namespace PHPMVC\Controllers;

class PrivacyController extends AbstractController
{
  public function indexAction()
  {
  $this->language->load('template.common');
  $this->language->load('privacy.index');
    $this->_view();
  }


}

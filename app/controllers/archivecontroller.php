<?php
namespace PHPMVC\Controllers;


class ArchiveController extends AbstractController
{
  public function indexAction()
  {
  $this->language->load('template.common');
  $this->language->load('archive.index');

    $this->_view();
  }


}

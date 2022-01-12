<?php
namespace PHPMVC\Controllers;
use PHPMVC\Models\HzvModel;

class HzvController extends AbstractController
{
  public function indexAction()
  {
  $this->language->load('template.common');
  $this->language->load('hzv.index');
  $id = 1;
  $this->_data['hzv'] = HzvModel::getByPK($id);
    $this->_view();
  }


}

<?php
namespace PHPMVC\Controllers;
use PHPMVC\Models\ServicesModel;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Helper;

class ServicesController extends AbstractController
{
  use InputFilter;
  use Helper;

  public function indexAction()
  {
    $this->language->load('template.common');
    $this->_view();

  }
  public function pageAction()
  {
    $this->language->load('template.common');

    $params = $this->filterString($this->_params[0]);
    $id     = $this->filterInt($this->_params[1]);
    $page       = ServicesModel::getByPK($id);
    if($page === false || $this->_params[0] !== 'id') {
        $this->redirect('/app-admin/services');
    }else {
      $this->_data['page'] = $page;
      $this->_data['pagetitle'] = $page->Pagetitle;
    }
    $this->_view();
  }

}

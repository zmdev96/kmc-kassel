<?php
namespace PHPMVC\AdminControllers;
use  PHPMVC\Controllers\AbstractController as AdminAbstractController;

class AccessDeniedController extends AdminAbstractController
{
    public function indexAction()
    {
        $this->language->load('template.common');
        $this->language->load('accessdenied.index');
        $this->_view();
    }
}

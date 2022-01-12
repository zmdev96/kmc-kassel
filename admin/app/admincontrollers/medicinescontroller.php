<?php
namespace PHPMVC\AdminControllers;
use  PHPMVC\Controllers\AbstractController as AdminAbstractController;
use PHPMVC\LIB\Messenger;

use PHPMVC\AdminModels\MedicinesModel;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Helper;

class MedicinesController extends AdminAbstractController
{
  use InputFilter;
  use Helper;
  public function indexAction()
  {
    $this->language->load('template.common');
    $this->language->load('medicines.index');

    $this->_data['medicines'] = MedicinesModel::getAll();

    $this->_view();
  }

  public function showAction()
  {
    $this->language->load('template.common');
    $this->language->load('medicines.show');

    $params = $this->filterString($this->_params[0]);
    $id     = $this->filterInt($this->_params[1]);
    $order  = MedicinesModel::getByPK($id);
    if($order === false || $this->_params[0] !== 'id') {
        $this->redirect('/app-admin/medicines');
    }else {
      $this->_data['order'] = $order ;


      $this->_view();
    }

  }

  public function approveAction()
  {

    $params = $this->filterString($this->_params[0]);
    $id     = $this->filterInt($this->_params[1]);
    $order  = MedicinesModel::getByPK($id);
    if($order === false || $this->_params[0] !== 'id') {
        $this->redirect('/app-admin/medicines');
    }else {
      $order->Status        = 1;

      if($order->save()) { // Success Message If The Blog Inserted In Database And Redirect
          $this->messenger->add('Die Anfrage wurde genehmigt', Messenger::MESSAGE_SUCCESS, Messenger::MESSAGE_NOTIFY);
        $redirect_url = '/app-admin/medicines';
        $this->redirect($redirect_url);
      }else { // Error Message If The User Not Inserted In Database
        $this->messenger->add('Etwas ist schief gelaufen! Bitte versuche es erneut', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_NOTIFY);
        $redirect_url = '/app-admin/medicines';
        $this->redirect($redirect_url);
      }

    }

  }


}

// if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
// {
//   exit;
// }
// continue;

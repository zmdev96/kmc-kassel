<?php
namespace PHPMVC\AdminControllers;
use  PHPMVC\Controllers\AbstractController as AdminAbstractController;
use PHPMVC\AdminModels\HzvModel;
use PHPMVC\LIB\Messenger;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Helper;

class hzvController extends AdminAbstractController
{
  use InputFilter;
  use Helper;
  // Edit Validation REG
  private $_editActionRoles =
    [
      'pagecontent'     => ['NaiceName',   'req'],
    ];

  public function indexAction()
  {
    $this->language->load('template.common');
    $this->language->load('hzv.index');
    $this->language->load('hzv.labels');
    $this->language->load('validations.validate');
    $id = 1;
    $page       = HzvModel::getByPK($id);
    $this->_data['pagecontent'] = $page;
    if(isset($_POST['submit']) && $this->isValid($this->_editActionRoles, $_POST))  {
      if ($_POST['client_csrf'] == CSRF_TOKEN) {
        $time = date('Y-m-d');
        //$date = date_create('2000-01-01');
        if($page === false) {
            $this->redirect('/app-admin/hzv');
        }else {
          $page->Pagecontent       = $_POST['pagecontent'];
          $page->Lastupdate        = $time;

          if($page->save()) { // Success Message If The Blog Inserted In Database And Redirect
              $this->messenger->add(
              $this->language->feedKey('lang_output_update', ['' , $this->language->get('lang_labels_pagecontent_output')]),
              Messenger::MESSAGE_SUCCESS, Messenger::MESSAGE_NOTIFY
            );

            $redirect_url = '/app-admin/hzv';
            $this->redirect($redirect_url);
            
          }else { // Error Message If The User Not Inserted In Database
            $this->messenger->add('Something went wrong! Please try again', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_NOTIFY);
          }

        }
       } else { // Error Message If The CSRF_TOKEN Not Valid
        $this->messenger->add('Something went wrong! Please try again', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_NOTIFY);
      }
    }


    $this->_view();
  }

}

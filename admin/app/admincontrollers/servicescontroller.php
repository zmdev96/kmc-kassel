<?php
namespace PHPMVC\AdminControllers;
use PHPMVC\Controllers\AbstractController as AdminAbstractController;
use PHPMVC\AdminModels\ServicesModel;
use PHPMVC\LIB\Messenger;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Helper;

class ServicesController extends AdminAbstractController
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
    $this->language->load('services.index');
    $this->language->load('services.labels');


    $this->_data['services'] = ServicesModel::getall();

    $this->_view();
  }
  public function editAction()
  {
    $this->language->load('template.common');
    $this->language->load('services.edit');
    $this->language->load('services.labels');
    $this->language->load('validations.validate');



    $params = $this->filterString($this->_params[0]);
    $id     = $this->filterInt($this->_params[1]);
    $page       = ServicesModel::getByPK($id);
    if($page === false || $this->_params[0] !== 'id') {
        $this->redirect('/app-admin/services');
    }else {

      $this->_data['page'] = $page;
      if(isset($_POST['submit']) && $this->isValid($this->_editActionRoles, $_POST))  {
        if ($_POST['client_csrf'] == CSRF_TOKEN) {
          $lastupdate = date('Y-m-d H:i:s');
          //$date = date_create('2000-01-01');
          if($page === false || $this->_params[0] !== 'id') {
              $this->redirect('/app-admin/services');
          }else {
              $page->Pagecontent          = $_POST['pagecontent'];
              $page->LastUpdate           = $lastupdate;

              if($page->save()) { // Edit The Page Profile And Success Message If The Page Updated In Database And Redirect

                $this->messenger->add(
                  $this->language->feedKey('lang_output_update', [$this->Pagetitle, $this->language->get('lang_labels_services_output')]),
                  Messenger::MESSAGE_SUCCESS, Messenger::MESSAGE_NOTIFY
                );
                  $redirect_url = '/app-admin/services';
                $this->redirect($redirect_url);
              }else { // Error Message If The User Not Inseted In Database
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

}

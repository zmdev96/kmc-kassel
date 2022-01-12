<?php
namespace PHPMVC\AdminControllers;
use PHPMVC\Controllers\AbstractController as AdminAbstractController;
use PHPMVC\AdminModels\UsersPrivilegesModel;
use PHPMVC\AdminModels\UsersGroupsPrivilegesModel;
use PHPMVC\LIB\Messenger;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Helper;



class UsersPrivilegesController extends AdminAbstractController
{
  use InputFilter;
  use Helper;

  // Create Validation REG
  private $_createActionRoles =
    [
      'privilegetitle'   => ['NaiceName',    'req|alpha|between(6,24)'],
      'privilege'        => ['NaiceName',    'req|alphanum|between(6,36)'],

    ];
  // Edit Validation REG
  private $_editActionRoles =
    [
      'privilegetitle'   => ['NaiceName',    'req|alpha|between(6,24)'],
      'privilege'        => ['NaiceName',    'req|alphanum|between(6,36)'],

    ];

  public function indexAction()
  {
    $this->language->load('template.common');
    $this->language->load('usersprivileges.index');
    $this->language->load('usersprivileges.labels');
    $this->language->load('validations.validate');

    $this->_data['privileges'] = UsersPrivilegesModel::getAll();
    $this->_view();
  }

  public function createAction()
  {
    $this->language->load('template.common');
    $this->language->load('usersprivileges.create');
    $this->language->load('usersprivileges.labels');
    $this->language->load('validations.validate');

    if(isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST))  {
      if ($_POST['client_csrf'] == CSRF_TOKEN) {
        $time= date( 'Y-m-d');
        $privilege = new UsersPrivilegesModel;
        $privilege->PrivilegeTitle    = $this->filterString($_POST['privilegetitle']);
        $privilege->Privilege         = $this->filterString($_POST['privilege']);

        if($privilege->save()) { // Success Message If The Privilege Inserted in Database And Redirect
          $this->messenger->add(
            $this->language->feedKey('lang_output_create', [$privilege->PrivilegeTitle , $this->language->get('lang_labels_privilege_output')]),
            Messenger::MESSAGE_SUCCESS, Messenger::MESSAGE_NOTIFY
          );
          $redirect_url = '/app-admin/usersprivileges';

          $this->redirect($redirect_url);
        }else { // Error Message If The Privilege Not Inserted In Database
          $this->messenger->add('Something went wrong! Please try again', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_NOTIFY);
        }
      }else { // Error Message If The CSRF_TOKEN Not Valid
        $this->messenger->add('Something went wrong! Please try again', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_NOTIFY);
      }
    }
    $this->_view();
  }

  public function editAction()
  {
    $this->language->load('template.common');
    $this->language->load('usersprivileges.edit');
    $this->language->load('usersprivileges.labels');
    $this->language->load('validations.validate');

    $params = $this->filterString($this->_params[0]);
    $id     = $this->filterInt($this->_params[1]);
    $privilege  = UsersPrivilegesModel::getByPK($id);
     if($privilege === false || $this->_params[0] !== 'id') {
         $this->redirect('/app-admin/usersprivileges');
     }else {
       $this->_data['privilege'] = $privilege ;
       if(isset($_POST['submit']) && $this->isValid($this->_editActionRoles, $_POST))  {
         if ($_POST['client_csrf'] == CSRF_TOKEN) {
           $time= date( 'Y-m-d');
           if($privilege === false || $this->_params[0] !== 'id') {
               $this->redirect('/app-admin/usersprivileges');
           }else {
             $privilege->PrivilegeTitle     = $this->filterString($_POST['privilegetitle']);
             $privilege->Privilege          = $this->filterString($_POST['privilege']);

             if($privilege->save()) {
               $this->messenger->add(
                 $this->language->feedKey('lang_output_update', [$privilege->PrivilegeTitle , $this->language->get('lang_labels_privilege_output')]),
                 Messenger::MESSAGE_SUCCESS, Messenger::MESSAGE_NOTIFY
               );
               if(isset($_SESSION['lang_changed'])){
                  $redirect_url = '/' . $_SESSION['lang'] . '/app-admin/usersprivileges';
                }else {
                  $redirect_url = '/app-admin/usersprivileges';
                }
               $this->redirect($redirect_url);
             }else { // Error Message If The Privilege Not Updated In Database
               $this->messenger->add('Something went wrong! Please try again', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_NOTIFY);
             }
           }
         }else { // Error Message If The CSRF_TOKEN Not Valid
           $this->messenger->add('Something went wrong! Please try again', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_NOTIFY);
         }
       }
      $this->_view();
     }
  }

  public function deleteAction()
  {
    $this->language->load('usersprivileges.labels');
    $this->language->load('validations.validate');

    $params = $this->filterString($this->_params[0]);
    $id     = $this->filterInt($this->_params[1]);
    $privilege = UsersPrivilegesModel::getByPK($id);
    if($privilege === false || $this->_params[0] !== 'id') {
        $this->redirect('/app-admin/usersprivileges');
    }
    $groupprivileges = UsersGroupsPrivilegesModel::getBy(['PrivilegeId' => $privilege->PrivilegeId]);
    if(false == $groupprivileges) {
        foreach ($groupprivileges as $groupprivilege) {
            $groupprivilege->delete();
        }
    }else {
      $this->messenger->add('This Privileges belongs to a user group. Please delete the user group first', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_NOTIFY);
      if(isset($_SESSION['lang_changed'])){
         $redirect_url = '/' . $_SESSION['lang'] . '/app-admin/usersprivileges';
       }else {
         $redirect_url = '/app-admin/usersprivileges';
       }
      $this->redirect($redirect_url);
    }

    if($privilege->delete()) {
      $this->messenger->add(
        $this->language->feedKey('lang_output_delete', [$privilege->PrivilegeTitle , $this->language->get('lang_labels_privilege_output')]),
        Messenger::MESSAGE_SUCCESS, Messenger::MESSAGE_NOTIFY
      );
      if(isset($_SESSION['lang_changed'])){
         $redirect_url = '/' . $_SESSION['lang'] . '/app-admin/usersprivileges';
       }else {
         $redirect_url = '/app-admin/usersprivileges';
       }
      $this->redirect($redirect_url);
    }else { // Error Message If The Privilege Not Deleted From Database
      $this->messenger->add('Something went wrong! Please try again', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_NOTIFY);
    }

  }


}

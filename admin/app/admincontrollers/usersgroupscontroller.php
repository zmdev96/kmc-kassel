<?php
namespace PHPMVC\AdminControllers;
use PHPMVC\Controllers\AbstractController as AdminAbstractController;
use PHPMVC\AdminModels\UsersGroupsModel;
use PHPMVC\AdminModels\UsersPrivilegesModel;
use PHPMVC\AdminModels\UsersGroupsPrivilegesModel;
use PHPMVC\LIB\Messenger;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Helper;



class UsersGroupsController extends AdminAbstractController
{
  use InputFilter;
  use Helper;

  // Create Validation REG
  private $_createActionRoles =
    [
      'groupname'    => ['NaiceName',    'req|alphanum|between(6,24)'],
    ];
  // Edit Validation REG
  private $_editActionRoles =
    [
      'groupname'    => ['NaiceName',    'req|alphanum|between(6,24)'],
    ];
  public function indexAction()
  {
    $this->language->load('template.common');
    $this->language->load('usersgroups.index');
    $this->language->load('usersgroups.labels');
    $this->language->load('validations.validate');

    $this->_data['groups'] = UsersGroupsModel::getAll();
    $this->_view();
  }

  public function createAction()
  {
    $this->language->load('template.common');
    $this->language->load('usersgroups.create');
    $this->language->load('usersgroups.labels');
    $this->language->load('validations.validate');

    $this->_data['privileges'] = UsersPrivilegesModel::getAll();

    if(isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST))  {
      if ($_POST['client_csrf'] == CSRF_TOKEN) {
        $time= date( 'Y-m-d');
        $group = new UsersGroupsModel;
        $group->GroupName    = $this->filterString($_POST['groupname']);

        if($group->save()) { // Success Message If The User Group Inserted In Database And Redirect
          // TODO: Validation for the privileges array
          if (isset($_POST['privileges']) && is_array($_POST['privileges'])) {
            foreach ($_POST['privileges'] as $privilegeid) {
              $groupsprivileges = new UsersGroupsPrivilegesModel();
              $groupsprivileges->GroupId = $group->GroupId;
              $groupsprivileges->PrivilegeId = $privilegeid;
              $groupsprivileges->save();

            }
          }
          $this->messenger->add(
            $this->language->feedKey('lang_output_create', [$group->GroupName , $this->language->get('lang_labels_usersgroups_output')]),
            Messenger::MESSAGE_SUCCESS, Messenger::MESSAGE_NOTIFY
          );

          $redirect_url = '/app-admin/usersgroups';

          $this->redirect($redirect_url);
        }else { // Error Message If The User Group Not Inserted In Database
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
    $this->language->load('usersgroups.edit');
    $this->language->load('usersgroups.labels');
    $this->language->load('validations.validate');

    $params = $this->filterString($this->_params[0]);
    $id     = $this->filterInt($this->_params[1]);
    $group  = UsersGroupsModel::getByPK($id);
     if($group === false || $this->_params[0] !== 'id') {
         $this->redirect('/app-admin/usersgroups');
     }else {
       $this->_data['group'] = $group ;
       $this->_data['privileges'] = UsersPrivilegesModel::getAll();
       $groupprivileges = UsersGroupsPrivilegesModel::getBy(['GroupId' => $group->GroupId]);
       $extractedPrivilegesIds = [];
       if (false !== $groupprivileges) {
         foreach ($groupprivileges as $privilege) {
           $extractedPrivilegesIds[] = $privilege->PrivilegeId;
         }
       }
       $this->_data['groupprivileges'] = $extractedPrivilegesIds;

       if(isset($_POST['submit']) && $this->isValid($this->_editActionRoles, $_POST))  {
         if ($_POST['client_csrf'] == CSRF_TOKEN) {
         if($group === false || $this->_params[0] !== 'id') {
             $this->redirect('/app-admin/usersgroups');
         }else {
           $group->GroupName    = $this->filterString($_POST['groupname']);

           if($group->save()) { // Success Message If The User Group Updated In Database And Redirect

             if (isset($_POST['privileges']) && is_array($_POST['privileges'])) {
               $deletedprivileges   = array_diff($extractedPrivilegesIds, $_POST['privileges']);
               $addedprivileges     = array_diff($_POST['privileges'], $extractedPrivilegesIds);
               // Delete The Unwanted Privileges
               foreach ($deletedprivileges as $deletedprivilege) {
                 $unwantedprivileges = UsersGroupsPrivilegesModel::getBy(['PrivilegeId' => $deletedprivilege, 'GroupId' => $group->GroupId]);
                 $unwantedprivileges->current()->delete();
               }
               //Added The New Privileges
               foreach ($addedprivileges as $privilegeid) {
                 $groupsprivileges = new UsersGroupsPrivilegesModel();
                 $groupsprivileges->GroupId = $group->GroupId;
                 $groupsprivileges->PrivilegeId = $privilegeid;
                 $groupsprivileges->save();
               }
             }

             $this->messenger->add(
               $this->language->feedKey('lang_output_update', [$group->GroupName , $this->language->get('lang_labels_usersgroups_output')]),
               Messenger::MESSAGE_SUCCESS, Messenger::MESSAGE_NOTIFY
             );
             $redirect_url = '/app-admin/usersgroups';

             $this->redirect($redirect_url);
           }else { // Error Message If The User Group Not Updated In Database
             $this->messenger->add('Something went wrong! Please try again', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_NOTIFY);
           }
         }
        }else {
          $this->messenger->add('Something went wrong! Please try again', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_NOTIFY);
        }
       }
      $this->_view();
     }
  }

  public function deleteAction()
  {
    $this->language->load('usersgroups.labels');
    $this->language->load('validations.validate');

    $params = $this->filterString($this->_params[0]);
    $id     = $this->filterInt($this->_params[1]);
    $group = UsersGroupsModel::getByPK($id);
    if($group === false || $this->_params[0] !== 'id') {
        $this->redirect('/employees');
    }
    $groupprivileges = UsersGroupsPrivilegesModel::getBy(['GroupId' => $group->GroupId]);

    if(false !== $groupprivileges) {
      foreach ($groupprivileges as $groupPrivilege) {
          $groupPrivilege->delete();
      }
    }
    if($group->delete()) { // Success Message If The User Group Deleted From Database And Redirect
      $this->messenger->add(
        $this->language->feedKey('lang_output_delete', [$group->GroupName , $this->language->get('lang_labels_usersgroups_output')]),
        Messenger::MESSAGE_SUCCESS, Messenger::MESSAGE_NOTIFY
      );
      $redirect_url = '/app-admin/usersgroups';

        $this->redirect($redirect_url);
    }
    else { // Error Message If The User Group Not Deleted From Database
      $this->messenger->add('Something went wrong! Please try again', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_NOTIFY);
    }
  }


}

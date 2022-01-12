<?php
namespace PHPMVC\AdminControllers;
use PHPMVC\Controllers\AbstractController as AdminAbstractController;
use PHPMVC\AdminModels\UsersModel;
use PHPMVC\AdminModels\UsersGroupsModel;
use PHPMVC\AdminModels\UsersProfileModel;
use PHPMVC\LIB\FileUpload;
use PHPMVC\LIB\Messenger;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Helper;

class UsersController extends AdminAbstractController
{
  use InputFilter;
  use Helper;
  // Create Validation REG
  private $_createActionRoles =
    [
      'username'     => ['NaiceName',   'req|alphanum|between(6,24)'],
      'email'        => ['NaiceName',   'req|email|between(6,60)'],
      'firstname'    => ['NaiceName',   'req|alpha|between(3,24)'],
      'lastname'     => ['NaiceName',   'req|alpha|between(3,24)'],
      'password'     => ['NaiceName',   'req|between(8,36)'],
      'repassword'   => ['NaiceName',   'eq_field(password)'],
      'usergroup'    => ['NaiceName',   'req|selectbox|int'],
      'phone'        => ['NaiceName',   'req|alphanum|between(6,15)'],
      'city'         => ['Naicepass',   'req|alphanum|between(3,36)'],
      'address'      => ['Naicepass',   'req|alphanum|between(3,36)'],
      'specialty'    => ['NaiceName',   'req|alphanum|between(3,36)'],
      'dob'          => ['NaiceName',   'req|alphanum|between(3,36)'],
      'about'        => ['NaiceName',   'req|between(10,2000)'],
    ];
  // Edit Validation REG
  private $_editActionRoles =
    [
      'username'     => ['NaiceName',   'req|alphanum|between(6,24)'],
      'email'        => ['NaiceName',   'req|email|between(6,60)'],
      'firstname'    => ['NaiceName',   'req|alpha|between(3,24)'],
      'lastname'     => ['NaiceName',   'req|alpha|between(3,24)'],
      'usergroup'    => ['NaiceName',   'req|selectbox|int'],
      'phone'        => ['NaiceName',   'req|alphanum|between(6,15)'],
      'city'         => ['Naicepass',   'req|alphanum|between(3,36)'],
      'address'      => ['Naicepass',   'req|alphanum|between(3,36)'],
      'specialty'    => ['NaiceName',   'req|alphanum|between(3,36)'],
      'dob'          => ['NaiceName',   'req|alphanum|between(3,36)'],
      'about'        => ['NaiceName',   'req|between(10,2000)'],
    ];
  public function indexAction()
  {
    $this->language->load('template.common');
    $this->language->load('users.index');
    $this->language->load('users.labels');

    $this->_data['users'] = UsersModel::getAll();
    $this->_view();
  }

  public function createAction()
  {
    $this->language->load('template.common');
    $this->language->load('users.create');
    $this->language->load('users.labels');
    $this->language->load('validations.validate');

    $this->_data['usersgroups'] = UsersGroupsModel::getAll();

    if(isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST))  {
      if ($_POST['client_csrf'] == CSRF_TOKEN) {
        $time= date( 'Y-m-d');
        $user = new UsersModel();
        $user->Username             = $this->filterString($_POST['username']);
        $user->Firstname            = $this->filterString($_POST['firstname']);
        $user->Lastname             = $this->filterString($_POST['lastname']);
        $user->cryptPassword($_POST['password']);
        $user->Email                = $this->filterEmail($_POST['email']);
        $user->GroupId              = $this->filterInt($_POST['usergroup']);
        $user->SubscriptionDate     = $time;
        $user->Status               = 1;


        if(UsersModel::userExists($user->Username)) { // Error Message If The Username Exists In Database
          $this->messenger->add(
            $this->language->feedKey('lang_error_exists', [$this->language->get('lang_labels_username'), $user->Username]),
            Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
          );
        }elseif(UsersModel::emailExists($user->Email)) { // Error Message If The Email Exists In Database
          $this->messenger->add(
            $this->language->feedKey('lang_error_exists', [$this->language->get('lang_labels_email'), $user->Email]),
            Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
          );
        }else {
          if($user->save()) { // Success Message If The User Inserted In Database And Redirect
            $userProfile = new UsersProfileModel();
            $userProfile->UserId      = $user->UserId;
            $userProfile->Specialty   = $this->filterString($_POST['specialty']);
            $userProfile->City        = $this->filterString($_POST['city']);
            $userProfile->Address      = $this->filterString($_POST['address']);
            $userProfile->Phone       = $this->filterString($_POST['phone']);
            $userProfile->Dob         = $this->filterString($_POST['dob']);
            $userProfile->About       = $_POST['about'];
            $uploader = new FileUpload($_FILES['image'], '/users');
            $uploader->upload();
            $userProfile->Image       = $uploader->getFileName();
            $userProfile->save(false);

              $this->messenger->add(
              $this->language->feedKey('lang_output_create', [$user->Firstname . ' '. $user->Lastname, $this->language->get('lang_labels_users_output')]),
              Messenger::MESSAGE_SUCCESS, Messenger::MESSAGE_NOTIFY
            );
              $redirect_url = '/app-admin/users';
            $this->redirect($redirect_url);
          }else { // Error Message If The User Not Inserted In Database
            $this->messenger->add('Something went wrong! Please try again', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_NOTIFY);
          }
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
    $this->language->load('users.edit');
    $this->language->load('users.labels');
    $this->language->load('validations.validate');


    $params = $this->filterString($this->_params[0]);
    $id     = $this->filterInt($this->_params[1]);
    $user   = UsersModel::getByPK($id);
    if($user === false || $this->_params[0] !== 'id') {
        $this->redirect('/app-admin/users');
    }else {
      $userprofile                = UsersProfileModel::getByPK($id);
      $this->_data['usersgroups'] = UsersGroupsModel::getAll();
      $this->_data['user']        = $user ;
      $this->_data['userprofile'] = $userprofile;
      if(isset($_POST['submit']) && $this->isValid($this->_editActionRoles, $_POST))  {
        if ($_POST['client_csrf'] == CSRF_TOKEN) {
          $lastupdate = date('Y-m-d H:i:s');
          //$date = date_create('2000-01-01');
          if($user === false || $this->_params[0] !== 'id') {
              $this->redirect('/app-admin/users');
          }else {

            if(UsersModel::userExists($_POST['username'] , $id)) { // Error Message If The Username Exists In Database
              $this->messenger->add(
                $this->language->feedKey('lang_error_exists', [$this->language->get('lang_labels_username'), $_POST['username']]),
                Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
              );
            }elseif(UsersModel::emailExists($_POST['email'] , $id)) { // Error Message If The Username Exists In Database
              $this->messenger->add(
                $this->language->feedKey('lang_error_exists', [$this->language->get('lang_labels_email'), $_POST['email']]),
                Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
              );
            }else { // Inserting The Data If All Condations Are True
              $user->Username             = $this->filterString($_POST['username']);
              $user->Firstname            = $this->filterString($_POST['firstname']);
              $user->Lastname             = $this->filterString($_POST['lastname']);
              $user->Email                = $this->filterEmail($_POST['email']);
              $user->GroupId              = $this->filterInt($_POST['usergroup']);
              $user->Status               = $this->filterInt($_POST['userstatus']);
              $user->LastUpdate           = $lastupdate;

              if($user->save()) { // Edit The User Profile And Success Message If The User Updated In Database And Redirect
                if(!empty($_FILES['image']['name'])) {
                  $deletedImage = IMAGES_UPLOAD_STORAGE . '/users'. $userprofile->Image;
                  if (file_exists($deletedImage)) {
                    unlink($deletedImage);
                  }
                  $uploader = new FileUpload($_FILES['image'], '/users');
                  $uploader->upload();
                  $userprofile->Image       = $uploader->getFileName();
                }
                $userprofile->Specialty   = $this->filterString($_POST['specialty']);
                $userprofile->City        = $this->filterString($_POST['city']);
                $userprofile->Address     = $this->filterString($_POST['address']);
                $userprofile->Phone       = $this->filterString($_POST['phone']);
                $userprofile->Dob         = $this->filterString($_POST['dob']);
                $userprofile->About       = $_POST['about'];
                $userprofile->save();

                $this->messenger->add(
                  $this->language->feedKey('lang_output_update', [$user->Firstname . ' '. $user->Lastname, $this->language->get('lang_labels_users_output')]),
                  Messenger::MESSAGE_SUCCESS, Messenger::MESSAGE_NOTIFY
                );
                  $redirect_url = '/app-admin/users';
                $this->redirect($redirect_url);
              }else { // Error Message If The User Not Inseted In Database
                $this->messenger->add('Something went wrong! Please try again', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_NOTIFY);
              }
            }
          }
         } else { // Error Message If The CSRF_TOKEN Not Valid
          $this->messenger->add('Something went wrong! Please try again', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_NOTIFY);
        }
      }
     $this->_view();
    }

  }

  public function showAction()
  {
    $this->language->load('template.common');
    $this->language->load('users.show');
    $this->language->load('users.labels');
    $this->language->load('validations.validate');


    $params = $this->filterString($this->_params[0]);
    $id     = $this->filterInt($this->_params[1]);
    $user   = UsersModel::getByPK($id);
    if($user === false || $this->_params[0] !== 'id') {
        $this->redirect('/app-admin/users');
    }else {
      $usersgroup  = UsersGroupsModel::getByPK($user->GroupId);
      $userprofile = UsersProfileModel::getByPK($id);
      $this->_data['user'] = $user ;
      $this->_data['userprofile'] = $userprofile;
      $this->_data['usersgroups'] = $usersgroup;

     $this->_view();
    }

  }

  public function deleteAction()
  {
    $this->language->load('users.labels');
    $this->language->load('validations.validate');

    $params = $this->filterString($this->_params[0]);
    $id     = $this->filterInt($this->_params[1]);
    $user = UsersModel::getByPK($id);
    $userprofile                = UsersProfileModel::getByPK($id);
    if($user === false || $this->_params[0] !== 'id') {
        $this->redirect('/app-admin/users');
    }
    if($user->delete()) { // Success Message If The User Deleted From Database And Redirect
      $deletedImage = IMAGES_UPLOAD_STORAGE . '/users'. $userprofile->Image;
      if (file_exists($deletedImage)) {
        unlink($deletedImage);
      }
      $this->messenger->add(
        $this->language->feedKey('lang_output_delete', [$user->Firstname . ' '. $user->Lastname, $this->language->get('lang_labels_users_output')]),
        Messenger::MESSAGE_SUCCESS, Messenger::MESSAGE_NOTIFY
      );
        $redirect_url = '/app-admin/users';
        $this->redirect($redirect_url);
    }else { // Error Message If The User Not Deleted From Database
      $this->messenger->add('Something went wrong! Please try again', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_NOTIFY);
    }
  }

  // TODO:: make sure this is a AJAX Request
  public function checkUserExistsAjaxAction()
  {
      if(isset($_POST['action']) == 'usercheck') {
          header('Content-type: text/plain');
          if(UsersModel::userExists($this->filterString($_POST['username']) , $this->filterInt($_POST['userid'])) !== false) {
              echo 1;
          } else {
              echo 2;
          }
      }
  }

  public function checkEamilExistsAjaxAction()
  {
      if(isset($_POST['action']) == 'emailcheck') {
          header('Content-type: text/plain');
          if(UsersModel::emailExists($this->filterString($_POST['email']) , $this->filterInt($_POST['userid'])) !== false) {
              echo 1;
          } else {
              echo 2;
          }
      }
  }


}

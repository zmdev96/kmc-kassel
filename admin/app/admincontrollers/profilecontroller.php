<?php
namespace PHPMVC\AdminControllers;
use  PHPMVC\Controllers\AbstractController as AdminAbstractController;
use PHPMVC\AdminModels\UsersModel;
use PHPMVC\AdminModels\UsersProfileModel;

use PHPMVC\LIB\FileUpload;
use PHPMVC\LIB\Messenger;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Helper;



class ProfileController extends AdminAbstractController
{
  use InputFilter;
  use Helper;

  // Edit Validation REG
  private $_editActionRoles =
    [
      'username'     => ['NaiceName',    'req|alphanum|between(6,24)'],
      'email'        => ['Naiceemail',   'req|email|between(6,60)'],
      'firstname'    => ['Naicefirst',   'req|alpha|between(3,24)'],
      'lastname'     => ['Naicesecond',  'req|alpha|between(3,24)'],
      'password'     => ['Naicepass',    'between(8,36)|eq_field(repassword)'],
      'phone'        => ['NaiceName',    'req|alphanum|between(6,15)'],
      'city'         => ['Naicepass',    'req|alphanum|between(3,36)'],
      'address'      => ['Naicepass',    'req|alphanum|between(3,36)'],


    ];

  public function indexAction()
  {
    $this->language->load('template.common');
    $this->language->load('profile.index');
    $this->language->load('validations.validate');

    $id     = $this->session->authuser->UserId;
    $user   = UsersModel::getByPK($id);
    if($user === false) {
        $this->redirect('/');
    }else {
      $userprofile = UsersProfileModel::getByPK($id);
      $this->_data['userprofile'] = $userprofile;
      $this->_data['user'] = $user ;

      if(isset($_POST['submit']) && $this->isValid($this->_editActionRoles, $_POST))  {
        if ($_POST['client_csrf'] == CSRF_TOKEN) {
          $lastupdate = date('Y-m-d H:i:s');
          //$date = date_create('2000-01-01');
          if($user === false) {
              $this->redirect('/');
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
              $user->Email                = $this->filterEmail($_POST['email']);
              $user->Firstname            = $this->filterString($_POST['firstname']);
              $user->Lastname             = $this->filterString($_POST['lastname']);

              if (!empty($_POST['password'])) {
                $user->cryptPassword($_POST['password']);
              }

              if($user->save()) { // Success Message If The User Updating In Database And Redirect
                if(!empty($_FILES['image']['name'])) {
                  $deletedImage = IMAGES_UPLOAD_STORAGE . '/users//'. $userprofile->Image;
                  if (file_exists($deletedImage)) {
                    unlink($deletedImage);
                  }
                  $uploader = new FileUpload($_FILES['image'], '/users');
                  $uploader->upload();
                  $userprofile->Image       = $uploader->getFileName();
                }
                $userprofile->City        = $this->filterString($_POST['city']);
                $userprofile->Address     = $this->filterString($_POST['address']);
                $userprofile->Phone       = $this->filterString($_POST['phone']);
                $userprofile->save();

                $this->messenger->add(
                  $this->language->get('lang_labels_output'),
                  Messenger::MESSAGE_SUCCESS, Messenger::MESSAGE_NOTIFY
                );
                $redirect_url = '/app-admin/auth/logout';
                $this->redirect($redirect_url);
              }else { // Error Message If The User Not Inserted In Database
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

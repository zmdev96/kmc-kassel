<?php
namespace PHPMVC\AdminControllers;
use PHPMVC\Controllers\AbstractController as AdminAbstractController;
use PHPMVC\AdminModels\UsersModel;
use PHPMVC\AdminModels\BlogModel;
use PHPMVC\LIB\FileUpload;
use PHPMVC\LIB\Messenger;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Helper;

class BlogController extends AdminAbstractController
{
  use InputFilter;
  use Helper;
  // Create Validation REG
  private $_createActionRoles =
    [
      'title'       => ['NaiceName',   'req|alphanum|between(10,120)'],
      'content'     => ['NaiceName',   'req|between(100,5000)'],
    ];
  // Edit Validation REG
  private $_editActionRoles =
    [
      'title'       => ['NaiceName',   'req|alphanum|between(10,120)'],
      'content'     => ['NaiceName',   'req|between(100,5000)'],
    ];
  public function indexAction()
  {
    $this->language->load('template.common');
    $this->language->load('blog.index');
    $this->language->load('blog.labels');

    $this->_data['blogs'] = BlogModel::getAll();
        $this->_view();
  }

  public function createAction()
  {
    $this->language->load('template.common');
    $this->language->load('blog.create');
    $this->language->load('blog.labels');
    $this->language->load('validations.validate');

    if(isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST))  {
      if ($_POST['client_csrf'] == CSRF_TOKEN) {
        $time= date( 'Y-m-d');
        $blog = new BlogModel();
        $blog->Title             = $this->filterString($_POST['title']);
        $blog->Content           = $_POST['content'];
        $blog->Postdate          = $time;
        $blog->Status            = 0;
        $blog->UserId            = $this->session->authuser->UserId;
        if(!empty($_FILES['image']['name'])) {
          $uploader = new FileUpload($_FILES['image'], '/blog');
          $uploader->upload();
          $blog->Image       = $uploader->getFileName();
        }

        if (empty($_FILES['image']['name'])) {
          $this->messenger->add(
            $this->language->feedKey('lang_error_req_image', [$this->language->get('lang_labels_image')]),
            Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
          );
        }else {
          if($blog->save()) { // Success Message If The Blog Inserted In Database And Redirect
              $this->messenger->add(
              $this->language->feedKey('lang_output_create', [$blog->Title , $this->language->get('lang_labels_blog_output')]),
              Messenger::MESSAGE_SUCCESS, Messenger::MESSAGE_NOTIFY
            );
            $redirect_url = '/app-admin/blog';
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
    $this->language->load('blog.edit');
    $this->language->load('blog.labels');
    $this->language->load('validations.validate');


    $params     = $this->filterString($this->_params[0]);
    $id         = $this->filterInt($this->_params[1]);
    $blog       = BlogModel::getByPK($id);
    $userblogs  = BlogModel::getBlogFromUserID($this->session->authuser->UserId);

    if($blog === false || $this->_params[0] !== 'id') {
        $this->redirect('/app-admin/blog');
    }elseif ($this->session->authuser->GroupName == 'Editor' && !in_array($id, $userblogs )){
      $this->messenger->add(
        $this->language->feedKey('lang_output_update_action', [$this->language->get('lang_labels_blog_output')]),
        Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
      );
      $this->redirect('/app-admin/blog');
    }else {

      $this->_data['blog']        = $blog ;
      if(isset($_POST['submit']) && $this->isValid($this->_editActionRoles, $_POST))  {
        if ($_POST['client_csrf'] == CSRF_TOKEN) {
          $time = date('Y-m-d');
          //$date = date_create('2000-01-01');
          if($blog === false || $this->_params[0] !== 'id') {
              $this->redirect('app-admin/blog');
          }else {
            $blog->Title             = $this->filterString($_POST['title']);
            $blog->Content           = $_POST['content'];
            $blog->Status           = $_POST['status'];
            $blog->Lastupdate        = $time;
            if(!empty($_FILES['image']['name'])) {
              $uploader = new FileUpload($_FILES['image'], '/blog');
              $uploader->upload();
              $blog->Image       = $uploader->getFileName();
            }
            if($blog->save()) { // Edit The User Profile And Success Message If The User Updated In Database And Redirect

              $this->messenger->add(
                $this->language->feedKey('lang_output_update', [$blog->Title, $this->language->get('lang_labels_blog_output')]),
                Messenger::MESSAGE_SUCCESS, Messenger::MESSAGE_NOTIFY
              );
              $redirect_url = '/app-admin/blog';
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

  public function showAction()
  {
    $this->language->load('template.common');
    $this->language->load('blog.show');

    $params = $this->filterString($this->_params[0]);
    $id     = $this->filterInt($this->_params[1]);
    $blog   = BlogModel::getByPK($id);
    if($blog === false || $this->_params[0] !== 'id') {
        $this->redirect('/app-admin/blog');
    }else {
      $this->_data['blog'] = $blog ;



      $this->_view();
    }

  }

  public function deleteAction()
  {
    $this->language->load('blog.labels');
    $this->language->load('validations.validate');

    $params = $this->filterString($this->_params[0]);
    $id     = $this->filterInt($this->_params[1]);
    $blog = BlogModel::getByPK($id);
    if($blog === false || $this->_params[0] !== 'id') {
        $this->redirect('/app-admin/blog');
    }elseif ($this->session->authuser->GroupName == 'Editor'){
      $this->messenger->add(
        $this->language->feedKey('lang_output_delete_action', [$this->language->get('lang_labels_blog_output')]),
        Messenger::MESSAGE_ERROR, Messenger::MESSAGE_NOTIFY
      );
      $this->redirect('/app-admin/blog');
    }
    if($blog->delete()) { // Success Message If The User Deleted From Database And Redirect
      $this->messenger->add(
        $this->language->feedKey('lang_output_delete', ['', $this->language->get('lang_labels_blog_output')]),
        Messenger::MESSAGE_SUCCESS, Messenger::MESSAGE_NOTIFY
      );
        $redirect_url = '/app-admin/blog';
        $this->redirect($redirect_url);
    }else { // Error Message If The User Not Deleted From Database
      $this->messenger->add('Something went wrong! Please try again', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_NOTIFY);
    }
  }

}

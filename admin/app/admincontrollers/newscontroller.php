<?php
namespace PHPMVC\AdminControllers;
use  PHPMVC\Controllers\AbstractController as AdminAbstractController;
use PHPMVC\AdminModels\NewsModel;
use PHPMVC\LIB\Messenger;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Helper;

class NewsController extends AdminAbstractController
{
  use InputFilter;
  use Helper;
  // Create Validation REG
  private $_createActionRoles =
    [
      'title'           => ['NaiceName',   'req|between(8,120)'],
      'short_desc'      => ['NaiceName',   'req|between(8,255)'],
      'content'         => ['NaiceName',   'req'],
    ];
  // Edit Validation REG
  private $_editActionRoles =
    [
      'title'           => ['NaiceName',   'req|between(8,120)'],
      'short_desc'      => ['NaiceName',   'req|between(8,255)'],
      'content'         => ['NaiceName',   'req'],
    ];
  public function indexAction()
  {
    $this->language->load('template.common');
    $this->language->load('news.index');
    $this->language->load('news.labels');
    $this->_data['news'] = NewsModel::getAll();
    $this->_view();
  }

  public function createAction()
  {
    $this->language->load('template.common');
    $this->language->load('news.create');
    $this->language->load('news.labels');
    $this->language->load('validations.validate');

    if(isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST))  {
      if ($_POST['client_csrf'] == CSRF_TOKEN) {
        $time= date( 'Y-m-d');
        $news = new NewsModel();
        $news->Title             = $this->filterString($_POST['title']);
        $news->Short_desc        = $this->filterString($_POST['short_desc']);
        $news->Content           = $_POST['content'];
        $news->Postdate          = $time;

          if($news->save()) { // Success Message If The Blog Inserted In Database And Redirect
              $this->messenger->add(
              $this->language->feedKey('lang_output_create', [$news->Title , $this->language->get('lang_labels_news_output')]),
              Messenger::MESSAGE_SUCCESS, Messenger::MESSAGE_NOTIFY
            );
            $redirect_url = '/app-admin/news';
            $this->redirect($redirect_url);
          }else { // Error Message If The User Not Inserted In Database
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
    $this->language->load('news.edit');
    $this->language->load('news.labels');
    $this->language->load('validations.validate');

    $params     = $this->filterString($this->_params[0]);
    $id         = $this->filterInt($this->_params[1]);
    $news       = NewsModel::getByPK($id);

    if($news === false || $this->_params[0] !== 'id') {
        $this->redirect('/app-admin/news');
    }else {

      $this->_data['news']        = $news ;
      if(isset($_POST['submit']) && $this->isValid($this->_editActionRoles, $_POST))  {
        if ($_POST['client_csrf'] == CSRF_TOKEN) {
          $time = date('Y-m-d');
          //$date = date_create('2000-01-01');
          if($news === false || $this->_params[0] !== 'id') {
              $this->redirect('/app-admin/news');
          }else {
            $news->Title             = $_POST['title'];
            $news->Short_desc        = $this->filterString($_POST['short_desc']);
            $news->Content           = $_POST['content'];
            $news->Lastupdate        = $time;

            if($news->save()) { // Success Message If The Blog Inserted In Database And Redirect
                $this->messenger->add(
                $this->language->feedKey('lang_output_update', [$news->Title , $this->language->get('lang_labels_news_output')]),
                Messenger::MESSAGE_SUCCESS, Messenger::MESSAGE_NOTIFY
              );
              $redirect_url = '/app-admin/news';
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


  public function deleteAction()
  {
    $this->language->load('news.labels');
    $this->language->load('validations.validate');

    $params = $this->filterString($this->_params[0]);
    $id     = $this->filterInt($this->_params[1]);
    $news = NewsModel::getByPK($id);
    if($news === false || $this->_params[0] !== 'id') {
        $this->redirect('/app-admin/news');
    }
    if($news->delete()) { // Success Message If The User Deleted From Database And Redirect
      $this->messenger->add(
        $this->language->feedKey('lang_output_delete', [$news->Title , $this->language->get('lang_labels_news_output')]),
        Messenger::MESSAGE_SUCCESS, Messenger::MESSAGE_NOTIFY
      );
        if(isset($_SESSION['lang_changed'])){
           $redirect_url = '/' . $_SESSION['lang'] . '/app-admin/news';
         }else {
           $redirect_url = '/app-admin/news';
         }
        $this->redirect($redirect_url);
    }else { // Error Message If The User Not Deleted From Database
      $this->messenger->add('Something went wrong! Please try again', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_NOTIFY);
    }
  }

}

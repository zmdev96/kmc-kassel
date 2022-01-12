<?php
namespace PHPMVC\AdminControllers;
use PHPMVC\Controllers\AbstractController as AdminAbstractController;
use PHPMVC\LIB\FileUpload;
use PHPMVC\AdminModels\UsersProfileModel;
use PHPMVC\AdminModels\BlogModel;
use PHPMVC\LIB\Messenger;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Helper;



class FilemanagerController extends AdminAbstractController
{
  use InputFilter;
  use Helper;

  public function indexAction()
  {
    $this->language->load('template.common');
    $this->language->load('filemanager.index');
    $this->language->load('filemanager.labels');
    $this->language->load('validations.validate');

    // Get Blog Image From filemanager Users Folder
    $this->_data['usersfiles'] = UsersProfileModel::getAll();

    // Get Blog Image From filemanager Blog Folder
    $blog_dir = IMAGES_UPLOAD_STORAGE . '/blog';
    if (is_dir($blog_dir)) {
      $files = scandir($blog_dir);
      $this->_data['blogfiles'] = $files;
    }

    // Get Pages Image From filemanager Blog Folder
    $pages_dir = IMAGES_UPLOAD_STORAGE . '/pages';
    if (is_dir($pages_dir)) {
      $pages_files = scandir($pages_dir);
      $this->_data['pagefiles'] = $pages_files;
    }

    $this->_view();
  }

  // this is just form ckeditor view without template
  public function serverAction()
  {
    $this->_template->swapTemplate(
    [
        ':view' => ':action_view',
    ]);

    $this->language->load('template.common');
    $this->language->load('filemanager.index');
    $this->language->load('filemanager.labels');
    $this->language->load('validations.validate');

    // Get Blog Image From filemanager Users Folder
    $this->_data['usersfiles'] = UsersProfileModel::getAll();

    // Get Blog Image From filemanager Blog Folder
    $blog_dir = IMAGES_UPLOAD_STORAGE . '/blog';
    if (is_dir($blog_dir)) {
      $files = scandir($blog_dir);
      $this->_data['blogfiles'] = $files;
    }

    // Get Pages Image From filemanager Blog Folder
    $pages_dir = IMAGES_UPLOAD_STORAGE . '/pages';
    if (is_dir($pages_dir)) {
      $pages_files = scandir($pages_dir);
      $this->_data['pagefiles'] = $pages_files;
    }

    $this->_view();
  }

  // This Action will called from the text tdeitor for blog
  public function bloguploadAction()
  {
    if (isset($_FILES['upload']['name']) && !empty($_FILES['upload']['name'])) {
      $uploader = new FileUpload($_FILES['upload'], '/blog');
      $uploader->upload();

      $function_number = $_GET['CKEditorFuncNum'];
      $url = '/uploads/images/blog/'. $uploader->getFileName();
      $message = '';
      echo "
        <script type='text/javascript'>
          window.parent.CKEDITOR.tools.callFunction($function_number, '$url' , '$message');
        </script>
      ";
       // Save The Image Name In Session
       $this->session->editorimg = $uploader->getFileName();

    }
  }

  // This Action will called from the text tdeitor fro pages
  public function pagesuploadAction()
  {
    if (isset($_FILES['upload']['name']) && !empty($_FILES['upload']['name'])) {
      $uploader = new FileUpload($_FILES['upload'], '/pages');
      $uploader->upload();

      $function_number = $_GET['CKEditorFuncNum'];
      $url = '/uploads/images/pages/'. $uploader->getFileName();
      $message = '';
      echo "
        <script type='text/javascript'>
          window.parent.CKEDITOR.tools.callFunction($function_number, '$url' , '$message');
        </script>
      ";
       // Save The Image Name In Session
       $this->session->editorimg = $uploader->getFileName();

    }
  }

}

<?php
namespace PHPMVC\AdminControllers;
use  PHPMVC\Controllers\AbstractController as AdminAbstractController;

use PHPMVC\AdminModels\UsersModel;
use PHPMVC\AdminModels\BlogModel;
use PHPMVC\LIB\Messenger;

class HomeController extends AdminAbstractController
{
  public function indexAction()
  {
    $this->language->load('template.common');
    $this->language->load('home.index');

    $this->_data['totalusers'] = UsersModel::getCount('UserId');
    $this->_data['totalblogs'] = BlogModel::getCount('BlogId');

    // Get Blog Image Count From filemanager Blog Folder
    $blog_dir = IMAGES_UPLOAD_STORAGE . '/blog';
    if (is_dir($blog_dir)) {
      $blog_files = scandir($blog_dir);
      $blog_count = count($blog_files) - 2;
    }
    // Get Pages Image Count From filemanager Blog Folder
    $page_dir = IMAGES_UPLOAD_STORAGE . '/pages';
    if (is_dir($page_dir)) {
      $page_files = scandir($page_dir);
      $page_count = count($page_files) - 2;
    }
    $this->_data['totalfiles'] = $this->_data['totalusers'] + $page_count + $blog_count;

    $this->_view();
  }

  public function addAction()
  {
    $this->_view();
  }
}

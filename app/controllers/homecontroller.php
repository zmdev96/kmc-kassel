<?php
namespace PHPMVC\Controllers;
use PHPMVC\Models\NewsModel;
use PHPMVC\Models\UsersModel;
use PHPMVC\Models\BlogModel;



class HomeController extends AbstractController
{
  public function indexAction()
  {
  $this->language->load('template.common');
  $this->language->load('home.index');

    $this->_data['news']  = NewsModel::getLimt('4');
    $this->_data['users'] = UsersModel::getAll();
    $this->_data['blogs'] = BlogModel::getAceptedBlog();

    $this->_view();

  }

  public function addAction()
  {
    $this->_view();
  }
}

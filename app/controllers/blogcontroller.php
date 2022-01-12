<?php
namespace PHPMVC\Controllers;
use PHPMVC\Models\BlogModel;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Helper;

class BlogController extends AbstractController
{
  use InputFilter;
  use Helper;

  public function indexAction()
  {
    $this->language->load('template.common');
    $this->language->load('blog.index');
    $this->_data['blogs'] = BlogModel::getAceptedBlog();
    $this->_view();
  }

  public function showAction()
  {
    $this->language->load('template.common');
    $this->language->load('blog.show');

    $params = $this->filterString($this->_params[0]);
    $id     = $this->filterInt($this->_params[1]);
    $blog = BlogModel::getByPK($id);
    if($blog === false || $this->_params[0] !== 'id') {
        $this->redirect('/blog');
    }
    $this->_data['blog'] = $blog;
    $this->_data['listblogs'] = BlogModel::getAceptedBlog();


    $this->_view();
  }

}

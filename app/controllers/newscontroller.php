<?php
namespace PHPMVC\Controllers;
use PHPMVC\Models\NewsModel;

use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Helper;

class NewsController extends AbstractController
{
  use InputFilter;
  use Helper;

  public function indexAction()
  {
    $this->language->load('template.common');
    $this->language->load('news.index');
    $this->_data['news'] = NewsModel::getAll();
    $this->_view();
  }

  public function detailsAction()
  {
    $this->language->load('template.common');
    $this->language->load('news.details');
    $params = $this->filterString($this->_params[0]);
    $id     = $this->filterInt($this->_params[1]);
    $news = NewsModel::getByPK($id);
    if($news === false || $this->_params[0] !== 'id') {
        $this->redirect('/news');
    }
    $this->_data['news'] = $news;

    $this->_view();
  }




}

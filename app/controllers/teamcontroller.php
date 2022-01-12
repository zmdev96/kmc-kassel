<?php
namespace PHPMVC\Controllers;
use PHPMVC\Models\UsersModel;
use PHPMVC\Models\UsersprofileModel;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Helper;
class TeamController extends AbstractController
{
  use InputFilter;
  use Helper;
  public function indexAction()
  {
  $this->language->load('template.common');
  $this->language->load('team.index');
    $this->_data['teams'] = UsersModel::getAll();
    $this->_view();
  }

  public function DoctorAction()
  {
  $this->language->load('template.common');
  $this->language->load('team.doctor');
    $params = $this->filterString($this->_params[0]);
    $id     = $this->filterInt($this->_params[1]);
    $user = UsersModel::getByPK($id);
    if($user === false || $this->_params[0] !== 'id') {
        $this->redirect('/team');
    }
    $this->_data['user'] = $user;
    $this->_data['userprofile'] = UsersprofileModel::getByPK($id);

    $this->_view();
  }


}

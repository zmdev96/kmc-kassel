<?php
namespace PHPMVC\AdminControllers;
use  PHPMVC\Controllers\AbstractController as AdminAbstractController;

use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\lib\Messenger;
use PHPMVC\AdminModels\UsersModel;

class AuthController extends AdminAbstractController
{
    use Helper;
    use InputFilter;

    private $_loginActionRoles =
      [
        'username'     => ['NaiceName',    'req'],
        'password'     => ['Naiceemail',   'req'],

      ];

    public function loginAction()
    {
      $this->language->load('auth.login');
      $this->language->load('validations.validate');


      $this->_template->swapTemplate(
      [
          ':view' => ':action_view'
      ]);

      if(isset($_POST['submit']) && $this->isValid($this->_loginActionRoles, $_POST))  {
        $isAuthorized = UsersModel::authenticate($this->filterString($_POST['username']), $this->filterString($_POST['password']), $this->session);
        if($isAuthorized == 2) {
            $this->messenger->add($this->language->get('lang_output_userdisabled'), Messenger::MESSAGE_WARNING, Messenger::MESSAGE_ALERT);
        } elseif ($isAuthorized == 1) {
            $this->redirect('/app-admin/home');
        } elseif ($isAuthorized === false) {
            $this->messenger->add($this->language->get('lang_output_userinvalid'), Messenger::MESSAGE_WARNING, Messenger::MESSAGE_ALERT);
        }

      }

      $this->_view();
    }

    public function logoutAction()
    {
        // TODO: check the cookie deletion
        $this->session->kill();
        $this->redirect('/app-admin/auth/login');
    }
}

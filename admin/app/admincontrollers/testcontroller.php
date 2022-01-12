<?php
namespace PHPMVC\AdminControllers;
use  PHPMVC\Controllers\AbstractController as AdminAbstractController;

use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\lib\Messenger;
use PHPMVC\Models\UsersModel;
use PHPMVC\Models\BlogModel;


class TestController extends AdminAbstractController
{
    use Helper;
    use InputFilter;


    public function indexAction()
    {
      include PHPMAILER_PATH . 'sendemail.php';
    }


}

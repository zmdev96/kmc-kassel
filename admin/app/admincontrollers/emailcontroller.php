<?php
namespace PHPMVC\AdminControllers;
use  PHPMVC\Controllers\AbstractController as AdminAbstractController;

use PHPMVC\AdminModels\EmailModel;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Helper;

class EmailController extends AdminAbstractController
{
  use InputFilter;
  use Helper;
  public function indexAction()
  {
    $this->language->load('template.common');
    $this->language->load('email.index');

    $this->_data['emails'] = EmailModel::getAll();
    $this->_view();
  }

  public function getemaildetailsAction()
  {
    if (isset($_POST['action']) == 'onemail') {
      $mailid = $this->filterInt($_POST['mailid']);
      $mail = EmailModel::getByPk($mailid);
      echo json_encode($mail);
      // Change the mail status
      $mail->Status = 1;
      $mail->save();

    }

  }


  public function getallmailsAction()
  {
    if (isset($_POST['action']) == 'allmail') {
      header('Content-type: application/json');

      $allmail = EmailModel::getLimt('5');
      $unsen   = EmailModel::getCount('EmailId', 'Status');


      $output = '';

      foreach ($allmail as $mail) {
        $output .= '
        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="">
            <div class="text-truncate font-weight-bold">'. $mail->Name .' </div>
            <div class=" text-gray-500 text-truncate ">'. $mail->Subject .'</div>
            <span>'. $mail->Senddate .'</span>
          </div>
        </a>
        ';

      }
      $data = array(
        'notify'   => $output,
        'unsen'    => $unsen
      );
      echo json_encode($data);
    }
  }

}

// if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
// {
//   exit;
// }
// continue;

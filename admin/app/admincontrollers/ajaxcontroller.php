<?php
namespace PHPMVC\AdminControllers;
use  PHPMVC\Controllers\AbstractController as AdminAbstractController;

use PHPMVC\AdminModels\EmailModel;
use PHPMVC\AdminModels\MedicinesModel;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Helper;

class AjaxController extends AdminAbstractController
{
  use InputFilter;
  use Helper;

  public function getallinfoAction()
  {
    if (isset($_POST['action']) == 'allinfo') {
      header('Content-type: application/json');

      $allmail      = EmailModel::getLimt('5');
      $emailUnsen   = EmailModel::getCount('EmailId', 'Status');
      $allorder     = MedicinesModel::getUnsenOrder();
      $orderUnsen   = MedicinesModel::getCount('MedicinesId', 'Status');


      $emailOutput = '';

      foreach ($allmail as $mail) {
        $emailOutput .= '
        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="">
            <div class="text-truncate font-weight-bold">'. $mail->Name .' </div>
            <div class=" text-gray-500 text-truncate ">'. $mail->Subject .'</div>
            <span>'. $mail->Senddate .'</span>
          </div>
        </a>
        ';

      }

      $orderOutput = '';
      if(false !== $allorder){
      foreach ($allorder as $order) {
        $orderOutput .= '
        <a class="dropdown-item d-flex align-items-center" href="/app-admin/medicines/show/id/'. $order->MedicinesId.'">
          <div class="">
            <div class="text-truncate font-weight-bold">'. $order->Cname .' </div>
            <div class=" text-gray-500 text-truncate ">'. $order->Cemail .'</div>
            <span>'. $order->Orderdate .'</span>
          </div>
        </a>
        ';

      }
    }else{
      $orderOutput = '<p style="text-align:center; padding:10px;">Es sind keine nicht genehmigten Anforderungen vorhanden</p>';
    }

      $data = array(
        'email_notify'   => $emailOutput,
        'email_unsen'    => $emailUnsen,
        'order_notify'   => $orderOutput,
        'order_unsen'    => $orderUnsen
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

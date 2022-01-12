<?php
namespace PHPMVC\Controllers;
use PHPMVC\LIB\Messenger;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Helper;
class MedicinesController extends AbstractController
{
  use InputFilter;
  use Helper;
  public function indexAction()
  {
  $this->language->load('template.common');
  $this->language->load('medicines.index');
  $this->language->load('js-validations.validate');


    $this->_view();
  }

  public function mailAction()
  {

    if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

      if ($_POST['client_csrf'] == CSRF_TOKEN) {
        $message = '';

        $firstname         = ($_POST["fname"]);
        $lastname          = ($_POST["lname"]);
        $email             = ($_POST["email"]);
        $dob               = ($_POST["birth"]);
        $insurance         = ($_POST["insurance"]);
        $medicamentname    = ($_POST["medicamentname"]);
        if (isset($_POST['pzn'])) {
          $pzn             = ($_POST["pzn"]);
        }

        $dosage            = ($_POST["dosage"]);
        $mdlist            = ($_POST["mdlist"]);
        $mdName= '';
        foreach ($mdlist as $md) {
          $mdName .=  '<li>' .$md. '</li>';
        }
        $message .= 'Vorname: ' . $firstname . '<br>';
        $message .= 'Nachname: ' . $lastname . '<br>';
        $message .= 'E-Mail Adresse: ' . $email . '<br>';
        $message .= 'Geburtsdatum: ' . $dob . '<br>';
        $message .= 'Versicherung Nr.: ' . $insurance . '<br>';
        $message .= 'Medikamentenliste: ' . '<br>';
        $message .= $mdName;
        echo $message;

      }else { // Error Message If The CSRF_TOKEN Not Valid
        $this->messenger->add('Etwas ist schief gelaufen! Bitte versuche es erneut', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_ALERT);
      }
    }

  }

}

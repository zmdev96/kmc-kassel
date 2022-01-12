<?php
namespace PHPMVC\Controllers;
use PHPMVC\Models\EmailModel;
use PHPMVC\LIB\phpmailer\PHPMailer;
use PHPMVC\LIB\phpmailer\SMTP;
use PHPMVC\LIB\phpmailer\Exception;
use PHPMVC\LIB\Messenger;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;



class ContactController extends AbstractController
{
  use InputFilter;
  use Helper;
  // Create Validation REG
  private $_sendActionRoles =
    [
      'name'        => ['NaiceName',   'req|alphanum|between(4,30)'],
      'email'       => ['NaiceName',   'req|email'],
      'subject'     => ['NaiceName',   'req|alphanum|between(4,30)'],
      'message'     => ['NaiceName',   'req|between(30,300)'],
    ];
  public function indexAction()
  {
  $this->language->load('template.common');
  $this->language->load('contact.index');
  $this->language->load('contact.labels');
  $this->language->load('js-validations.validate');


  if(isset($_POST['submit']) && $this->isValid($this->_sendActionRoles, $_POST))  {
    if ($_POST['client_csrf'] == CSRF_TOKEN) {
        $time= date('Y-m-d H:i:s');
        $email = new EmailModel();
        $email->Subject         = $this->filterString($_POST['subject']);
        $email->Name            = $this->filterString($_POST['name']);
        $email->Senderemail     = $this->filterString($_POST['email']);
        $email->Emailcontent    = $this->filterString($_POST['message']);
        $email->Senddate        = $time;
        $email->Status          = 0;


        if($email->save()) { // Success Message If The Blog Inserted In Database And Redirect
            $this->messenger->add('Ihre E-Mail wurde gesendet, danke!', Messenger::MESSAGE_SUCCESS, Messenger::MESSAGE_ALERT
          );
          $redirect_url = '/contact';
          $this->redirect($redirect_url);
        }else { // Error Message If The User Not Inserted In Database
          $this->messenger->add('Etwas ist schief gelaufen! Bitte versuche es erneut', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_ALERT);
        }

    }else { // Error Message If The CSRF_TOKEN Not Valid
      $this->messenger->add('Etwas ist schief gelaufen! Bitte versuche es erneut', Messenger::MESSAGE_WARNING, Messenger::MESSAGE_ALERT);
    }
  }

  $this->_view();
  }

  public function mailAction()
  {

    $DBHOST = 'localhost';
    $DBNAME = 'kmc';
    $DBUSER = 'moslem';
    $DBPASS = 'moslem123';
    $compression = FALSE;
    $dst_dir = SESSION_SAVE_PATH;

    $DBH = new \PDO("mysql:host=".$DBHOST.";dbname=".$DBNAME."; charset=utf8", $DBUSER, $DBPASS);
    if(is_null($DBH) || $DBH===FALSE)
    {
        die('ERROR');
    }
    $DBH->setAttribute(\PDO::ATTR_ORACLE_NULLS, \PDO::NULL_NATURAL );
    $fileName = 'backup-db-' . date('d-m-Y_h:i:s');
    //create/open files
    if ($compression)
    {
        $fileName .= '.sql.gz';
        $zp = gzopen($dst_dir.'/'.$fileName, "a9");
    }
    else
    {
        $fileName .= '.sql';
        $handle = fopen($dst_dir.'/'.$fileName,'a+');
    }
    //array of all database field types which just take numbers
    $numtypes=array('tinyint','smallint','mediumint','int','bigint','float','double','decimal','real');
    //get all of the tables
    if(empty($tables))
    {
        $pstm1 = $DBH->query('SHOW TABLES');
        while ($row = $pstm1->fetch(\PDO::FETCH_NUM))
        {
            $tables[] = $row[0];
        }
    }
    else
    {
        $tables = is_array($tables) ? $tables : explode(',',$tables);
    }
    //cycle through the table(s)
    foreach($tables as $table)
    {
        $result = $DBH->query("SELECT * FROM $table");
        $num_fields = $result->columnCount();
        $num_rows = $result->rowCount();
        $return="";
        //uncomment below if you want 'DROP TABLE IF EXISTS' displayed
        //$return.= 'DROP TABLE IF EXISTS `'.$table.'`;';
        //table structure
        $pstm2 = $DBH->query("SHOW CREATE TABLE $table");
        $row2 = $pstm2->fetch(\PDO::FETCH_NUM);
        $ifnotexists = str_replace('CREATE TABLE', 'CREATE TABLE IF NOT EXISTS', $row2[1]);
        $return.= "\n\n".$ifnotexists.";\n\n";
        if ($compression)
        {
            gzwrite($zp, $return);
        }
        else
        {
            fwrite($handle,$return);
        }
        $return = "";
        //insert values
        if ($num_rows)
        {
            $return= 'INSERT INTO `'."$table"."` (";
            $pstm3 = $DBH->query("SHOW COLUMNS FROM $table");
            $count = 0;
            $type = array();
            while ($rows = $pstm3->fetch(\PDO::FETCH_NUM))
            {
                if (stripos($rows[1], '('))
                {
                    $type[$table][] = stristr($rows[1], '(', true);
                }
                else
                {
                    $type[$table][] = $rows[1];
                }
                $return.= "`".$rows[0]."`";
                $count++;
                if ($count < ($pstm3->rowCount()))
                {
                    $return.= ", ";
                }
            }
            $return.= ")".' VALUES';
            if ($compression)
            {
                gzwrite($zp, $return);
            }
            else
            {
                fwrite($handle,$return);
            }
            $return = "";
        }
        $count =0;
        while($row = $result->fetch(\PDO::FETCH_NUM))
        {
            $return= "\n(";
            for($j=0; $j<$num_fields; $j++)
            {
                if (isset($row[$j]))
                {
                    //if number, take away "". else leave as string
                    if ((in_array($type[$table][$j], $numtypes)) && $row[$j]!=='')
                    {
                        $return.= $row[$j];
                    }
                    else
                    {
                        $return.= $DBH->quote($row[$j]);
                    }
                }
                else
                {
                    $return.= 'NULL';
                }
                if ($j<($num_fields-1))
                {
                    $return.= ',';
                }
            }
            $count++;
            if ($count < ($result->rowCount()))
            {
                $return.= "),";
            }
            else
            {
                $return.= ");";
            }
            if ($compression)
            {
                gzwrite($zp, $return);
            }
            else
            {
                fwrite($handle,$return);
            }
            $return = "";
        }
        $return="\n\n-- ------------------------------------------------ \n\n";
        if ($compression)
        {
            gzwrite($zp, $return);
        }
        else
        {
            fwrite($handle,$return);
        }
        $return = "";
    }
    $error1= $pstm2->errorInfo();
    $error2= $pstm3->errorInfo();
    $error3= $result->errorInfo();
    echo $error1[2];
    echo $error2[2];
    echo $error3[2];
    $fileSize = 0;
    if ($compression)
    {
        gzclose($zp);
        $fileSize = filesize($dst_dir.'/'.$fileName);
    }
    else
    {
        fclose($handle);
        $fileSize = filesize($dst_dir.'/'.$fileName);
    }



  }

}

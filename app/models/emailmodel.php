<?php
namespace PHPMVC\Models;

class EmailModel extends AbstractModel
{
    public $EmailId;
    public $Subject;
    public $Name;
    public $Senderemail;
    public $Emailcontent;
    public $Senddate;
    public $Status;



    protected static $tableName = 'app_emails';

    protected static $tableSchema = array(
        'EmailId'             => self::DATA_TYPE_INT,
        'Subject'             => self::DATA_TYPE_STR,
        'Name'                => self::DATA_TYPE_STR,
        'Senderemail'         => self::DATA_TYPE_STR,
        'Emailcontent'        => self::DATA_TYPE_STR,
        'Senddate'            => self::DATA_TYPE_STR,
        'Status'              => self::DATA_TYPE_INT,

    );

    protected static $primaryKey = 'EmailId';


}

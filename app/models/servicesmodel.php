<?php
namespace PHPMVC\Models;

class ServicesModel extends AbstractModel
{
    public $PageId;
    public $Pagecontent;
    public $Pagetitle;
    public $Pagelink;
    public $Lastupdate;



    protected static $tableName = 'app_services';

    protected static $tableSchema = array(
        'PageId'             => self::DATA_TYPE_INT,
        'Pagecontent'        => self::DATA_TYPE_STR,
        'Pagetitle'        => self::DATA_TYPE_STR,
        'Pagelink'        => self::DATA_TYPE_STR,
        'Lastupdate'         => self::DATA_TYPE_STR,
    );

    protected static $primaryKey = 'PageId';


}

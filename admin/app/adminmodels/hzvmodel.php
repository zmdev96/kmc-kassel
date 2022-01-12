<?php
namespace PHPMVC\AdminModels;
use PHPMVC\Models\AbstractModel;

class HzvModel extends AbstractModel
{
    public $PageId;
    public $Pagecontent;
    public $Lastupdate;



    protected static $tableName = 'app_hzv';

    protected static $tableSchema = array(
        'PageId'             => self::DATA_TYPE_INT,
        'Pagecontent'        => self::DATA_TYPE_STR,
        'Lastupdate'         => self::DATA_TYPE_STR,

    );

    protected static $primaryKey = 'PageId';


}

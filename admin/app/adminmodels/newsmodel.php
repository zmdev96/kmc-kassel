<?php
namespace PHPMVC\AdminModels;
use PHPMVC\Models\AbstractModel;

class NewsModel extends AbstractModel
{
    public $NewsId;
    public $Title;
    public $Short_desc;
    public $Content;
    public $Postdate;
    public $Lastupdate;



    protected static $tableName = 'app_news';

    protected static $tableSchema = array(
        'NewsId'            => self::DATA_TYPE_INT,
        'Title'             => self::DATA_TYPE_STR,
        'Short_desc'        => self::DATA_TYPE_STR,
        'Content'           => self::DATA_TYPE_STR,
        'Postdate'          => self::DATA_TYPE_STR,
        'Lastupdate'        => self::DATA_TYPE_STR,

    );

    protected static $primaryKey = 'NewsId';

}

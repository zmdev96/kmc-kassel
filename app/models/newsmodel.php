<?php
namespace PHPMVC\Models;

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

    public static function getAll()
    {
        return self::get(
        'SELECT * FROM `app_news` ORDER BY `app_news`.`NewsId` DESC'
        );
    }

    public static function getLimt($limt)
    {
      return self::get('
          SELECT * FROM ' . self::$tableName . ' ORDER BY NewsId DESC LIMIT '. $limt .'
      ');

    }

}

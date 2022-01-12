<?php
namespace PHPMVC\Models;

class BlogModel extends AbstractModel
{
    public $BlogId;
    public $Title;
    public $Content;
    public $Postdate;
    public $Acceptdate;
    public $Lastupdate;
    public $View;
    public $Status;
    public $Image;
    public $UserId;


    protected static $tableName = 'app_blog';

    protected static $tableSchema = array(
        'BlogId'            => self::DATA_TYPE_INT,
        'Title'             => self::DATA_TYPE_STR,
        'Content'           => self::DATA_TYPE_STR,
        'Postdate'          => self::DATA_TYPE_STR,
        'Acceptdate'        => self::DATA_TYPE_STR,
        'Lastupdate'        => self::DATA_TYPE_STR,
        'View'              => self::DATA_TYPE_STR,
        'Status'            => self::DATA_TYPE_INT,
        'Image'             => self::DATA_TYPE_STR,
        'UserId'            => self::DATA_TYPE_INT,
    );

    protected static $primaryKey = 'BlogId';

    public static function getAll()
    {
        return self::get(
        'SELECT ab.*, au.Firstname Firstname,  au.Lastname Lastname FROM ' . self::$tableName . ' ab INNER JOIN app_users au ON au.UserId = ab.UserId'
        );
    }


    public static function getAceptedBlog()
    {
      return self::get('
          SELECT * FROM ' . self::$tableName . ' WHERE Status != 0 ORDER BY `app_blog`.`BlogId` DESC
      ');

    }

}

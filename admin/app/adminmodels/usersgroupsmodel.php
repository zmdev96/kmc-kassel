<?php
namespace PHPMVC\AdminModels;
use PHPMVC\Models\AbstractModel;

class UsersGroupsModel extends AbstractModel
{
    public $GroupId;
    public $GroupName;

    protected static $tableName = 'app_users_groups';

    protected static $tableSchema = array(
        'GroupId'            => self::DATA_TYPE_INT,
        'GroupName'          => self::DATA_TYPE_STR,


    );

    protected static $primaryKey = 'GroupId';

    public static function getGroupName($groupId)
    {
      return self::get('
          SELECT GroupName FROM ' . self::$tableName . ' WHERE GroupId = "' . $groupId . '"
      ');

    }

}

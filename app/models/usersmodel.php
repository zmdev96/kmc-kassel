<?php
namespace PHPMVC\Models;

class UsersModel extends AbstractModel
{
    public $UserId;
    public $Username;
    public $Firstname;
    public $Lastname;
    public $Password;
    public $Email;
    public $SubscriptionDate;
    public $LastUpdate;
    public $LastLogin;
    public $GroupId;
    public $Status;

    /**
    * @var UsersProfileModel
    */
    // Privilege For The Auth User
    public $privileges;
    public $profile;



    protected static $tableName = 'app_users';

    protected static $tableSchema = array(
        'UserId'            => self::DATA_TYPE_INT,
        'Username'          => self::DATA_TYPE_STR,
        'Firstname'         => self::DATA_TYPE_STR,
        'Lastname'          => self::DATA_TYPE_STR,
        'Password'          => self::DATA_TYPE_STR,
        'Email'             => self::DATA_TYPE_STR,
        'SubscriptionDate'  => self::DATA_TYPE_STR,
        'LastUpdate'        => self::DATA_TYPE_STR,
        'LastLogin'         => self::DATA_TYPE_STR,
        'GroupId'           => self::DATA_TYPE_INT,
        'Status'            => self::DATA_TYPE_INT,



    );

    protected static $primaryKey = 'UserId';

    public function cryptPassword($password)
    {
        $this->Password = crypt($password, APP_SALT);
    }

    // TODO:: FIX THE TABLE ALIASING
    public static function getAll()
    {
        return self::get(
        'SELECT au.*, aup.*  FROM ' . self::$tableName . ' au INNER JOIN app_users_profile aup ON aup.UserId = au.UserId'
        );
    }

    public static function userExists($username, $id = null)
    {
        if (null !== $id) {
          return self::get('
              SELECT * FROM ' . self::$tableName . ' WHERE Username = "' . $username . '" AND UserId != "' .  $id . '"
          ');
        }else {
          return self::get('
              SELECT * FROM ' . self::$tableName . ' WHERE Username = "' . $username . '"
          ');
        }
    }
    public static function emailExists($email,  $id =  null)
    {
      if (null !== $id) {
        return self::get('
            SELECT * FROM ' . self::$tableName . ' WHERE Email = "' . $email . '" AND UserId != "' .  $id . '"
        ');
      }else {
        return self::get('
            SELECT * FROM ' . self::$tableName . ' WHERE Email = "' . $email . '"
        ');
      }
    }


}

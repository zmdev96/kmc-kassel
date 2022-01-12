<?php
namespace PHPMVC\AdminModels;
use PHPMVC\Models\AbstractModel;

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
        'SELECT au.*, aug.GroupName GroupName FROM ' . self::$tableName . ' au INNER JOIN app_users_groups aug ON aug.GroupId = au.GroupId'
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
    public static function authenticate ($username, $password, $session)
    {
        $password = crypt($password, APP_SALT) ;
         $sql = 'SELECT *, (SELECT GroupName FROM app_users_groups WHERE app_users_groups.GroupId = ' . self::$tableName . '.GroupId) GroupName FROM ' . self::$tableName . ' WHERE Username = "' . $username . '" AND Password = "' .  $password . '"';
        $foundUser = self::getOne($sql);
        if(false !== $foundUser) {
            if($foundUser->Status == 2) {
                return 2;
            }
            $foundUser->LastLogin = date('Y-m-d H:i:s');
            $foundUser->save();
            $foundUser->privileges  = UsersGroupsPrivilegesModel::getPrivilegesForGroup($foundUser->GroupId);
            $foundUser->profile     = UsersProfileModel::getByPK($foundUser->UserId);
            $session->authuser      = $foundUser;
            return 1;
        }
        return false;


    }

}

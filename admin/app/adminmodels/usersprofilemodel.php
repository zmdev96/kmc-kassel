<?php
namespace PHPMVC\AdminModels;
use PHPMVC\Models\AbstractModel;

class UsersProfileModel extends AbstractModel
{
    public $UserId;
    public $Specialty;
    public $City;
    public $Address;
    public $Phone;
    public $Dob;
    public $About;
    public $Image;

    protected static $tableName = 'app_users_profile';

    protected static $tableSchema = array(
        'UserId'            => self::DATA_TYPE_INT,
        'Specialty'         => self::DATA_TYPE_STR,
        'City'              => self::DATA_TYPE_STR,
        'Address'            => self::DATA_TYPE_STR,
        'Phone'             => self::DATA_TYPE_STR,
        'Dob'               => self::DATA_TYPE_STR,
        'About'             => self::DATA_TYPE_STR,
        'Image'             => self::DATA_TYPE_STR,




    );

    protected static $primaryKey = 'UserId';

}

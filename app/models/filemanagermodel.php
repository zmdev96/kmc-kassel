<?php
namespace PHPMVC\Models;

class FileManagerModel extends AbstractModel
{
    public $ImageId;
    public $Image;
    public $Uploaddate;
    public $UserId;

    protected static $tableName = 'app_filemanager';

    protected static $tableSchema = array(
        'ImageId'           => self::DATA_TYPE_INT,
        'Image'             => self::DATA_TYPE_STR,
        'Uploaddate'        => self::DATA_TYPE_STR,
        'UserId'            => self::DATA_TYPE_INT,
    );

    protected static $primaryKey = 'ImageId';




}

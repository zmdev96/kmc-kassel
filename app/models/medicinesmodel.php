<?php
namespace PHPMVC\Models;

class MedicinesModel extends AbstractModel
{
    public $MedicinesId;
    public $Cname;
    public $Cemail;
    public $Cpod;
    public $Cinsurance;
    public $Cmedicines;
    public $Orderdate;
    public $Status;

    protected static $tableName = 'app_medicines';

    protected static $tableSchema = array(
        'MedicinesId'          => self::DATA_TYPE_INT,
        'Cname'                => self::DATA_TYPE_STR,
        'Cemail'               => self::DATA_TYPE_STR,
        'Cpod'                 => self::DATA_TYPE_STR,
        'Cinsurance'           => self::DATA_TYPE_STR,
        'Cmedicines'           => self::DATA_TYPE_STR,
        'Orderdate'            => self::DATA_TYPE_STR,
        'Status'               => self::DATA_TYPE_INT,

    );

    protected static $primaryKey = 'MedicinesId';


}

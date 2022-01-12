<?php
namespace PHPMVC\LIB;

class AutoLoad
{
    public static function autoload($className)
    {
        $className = str_replace('PHPMVC', '', $className);
        $className = str_replace('\\', '/', $className);
        $className = $className . '.php';
        $className = strtolower($className);

        $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 5);

        if(isset($url[0]) && $url[0] == ADMIN_ROOT_NAME) {
            if(file_exists(APP_PATH . '/../admin/app/'. $className)) {
                require_once APP_PATH . '/../admin/app/'. $className;
            }
        }else {
          if(file_exists(APP_PATH . $className)) {
              require_once APP_PATH . $className;
          }
        }


        if(file_exists(APP_PATH . $className)) {
            require_once APP_PATH . $className;
        }
    }
}
spl_autoload_register(__NAMESPACE__ . '\AutoLoad::autoload');

<?php
namespace PHPMVC\LIB;


class Authentication
{
    private static $_instance;
    private $_session;

    private $_execludedRoutes = [
        '/'.ADMIN_ROOT_NAME.'/auth/logout',
        '/'.ADMIN_ROOT_NAME.'/auth/login',
        '/'.ADMIN_ROOT_NAME.'/home/index',
        '/'.ADMIN_ROOT_NAME.'/blog/index',
        '/'.ADMIN_ROOT_NAME.'/blog/create',
        '/'.ADMIN_ROOT_NAME.'/blog/edit',
        '/'.ADMIN_ROOT_NAME.'/blog/show',
        '/'.ADMIN_ROOT_NAME.'/filemanager/index',
        '/'.ADMIN_ROOT_NAME.'/filemanager/create',
        '/'.ADMIN_ROOT_NAME.'/filemanager/blogupload',
        '/'.ADMIN_ROOT_NAME.'/filemanager/pagesupload',
        '/'.ADMIN_ROOT_NAME.'/profile/index',
        '/'.ADMIN_ROOT_NAME.'/users/checkuserexistsajax',
        '/'.ADMIN_ROOT_NAME.'/users/checkemailexistsajax',
        '/'.ADMIN_ROOT_NAME.'/language/index',
        '/'.ADMIN_ROOT_NAME.'/accessdenied/index',
        '/'.ADMIN_ROOT_NAME.'/test/index',
    ];

    private function __construct($session)
    {
        $this->_session = $session;
    }

    private function __clone()
    {

    }

    public static function getInstance(SessionManager $session)
    {
        if(self::$_instance === null) {
            self::$_instance = new self($session);
        }
        return self::$_instance;
    }

    public function isAuthorized()
    {
        return isset($this->_session->authuser);
    }

    public function hasAccess($controller, $action)
    {
        $url = strtolower('/'.ADMIN_ROOT_NAME.'/' . $controller . '/' . $action);
        if(in_array($url, $this->_execludedRoutes) || in_array($url, $this->_session->authuser->privileges)) {
            return true;
        }
    }


}

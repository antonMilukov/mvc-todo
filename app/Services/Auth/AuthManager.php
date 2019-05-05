<?php
namespace App\Services\Auth;

use App\Models\User;
use App\Services\Session\SessionManager;

class AuthManager
{
    private static $instance = null;
    private $user = null;

    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __clone() {}
    private function __construct() {}

    public function checkAuth()
    {
        $sessionAuthData = SessionManager::getInstance()->get('auth', null);
        $r = false;
        if ($sessionAuthData) {
            $userId = $sessionAuthData['userId'];
            $userFromDB = User::getInstance()->find($userId);

            if ($userFromDB){
                $this->user = $userFromDB;
                $r = true;
            } else {
                // something wrong - delete
                SessionManager::getInstance()->set('auth', null);
            }
        }
        return $r;
    }

    public function login($login, $pass)
    {
        $userFromDB = User::getInstance()
            ->where('login', $login)
            ->where('password', $pass)
            ->first();

        $r = false;
        if ($userFromDB){
            $r = true;
            SessionManager::getInstance()->set('auth', [
                'userId' => $userFromDB->id
            ]);
        }
        return $r;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function isAuth()
    {
        return $this->user != null;
    }

    public function logout()
    {
        SessionManager::getInstance()->set('auth', null);
    }
}
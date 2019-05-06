<?php
namespace App\Services\Auth;

use App\Models\User;
use App\Services\Session\SessionManager;

/**
 * Auth manager
 * - check authorization state for user, also contains authorization methods like "login", "logout"
 * - presented as singleton
 * Class AuthManager
 * @package App\Services\Auth
 */
class AuthManager
{
    private static $instance = null;
    private $user = null;

    /**
     * @return AuthManager|null
     */
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

    /**
     * Check authorization state from session and database
     * @return bool
     */
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
                // something wrong - need to logout
                $this->logout();
            }
        }
        return $r;
    }

    /**
     * Login by login and password input
     * @param $login
     * @param $pass
     * @return bool
     */
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

    /**
     * Return authenticated user model
     * @return null|User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return bool
     */
    public function isAuth()
    {
        return $this->user != null;
    }

    /**
     * Logout method
     * - erase
     */
    public function logout()
    {
        SessionManager::getInstance()->set('auth', null);
    }
}
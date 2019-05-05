<?php
namespace App\Services\Session;

class SessionManager {
    private static $instance = null;

    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
            self::$instance->start();
        }
        return self::$instance;
    }

    private function __clone() {}
    private function __construct() {}

    private function start()
    {
        session_start();
    }

    public function set($alias, $val)
    {
        $_SESSION[$alias] = $val;
    }

    public function get($alias, $default = null)
    {
        $r = isset($_SESSION[$alias]) ? $_SESSION[$alias] : $default;
        return $r;
    }
}
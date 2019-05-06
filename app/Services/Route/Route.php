<?php
namespace App\Services\Route;

use App\Services\Auth\AuthManager;

/**
 * Route class
 *  - uses route files like app/routes/web.php and execute controller method described in file
 * Class Route
 * @package App\Services\Route
 */
class Route
{
    private static $instance = null;

    /** @var string - Path for routes */
    private $routesPath;

    /** @var string - current Uri */
    protected $uri;

    /** @var array - current routes parsed from routesPath */
    protected $routes = [];

    /**
     * Init self instance and setting input params
     * @param null $routesPath
     * @return Route|null
     */
    public static function getInstance($routesPath = null)
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
            self::$instance->routesPath = $routesPath;
            self::$instance->uri = self::getURI();
        }
        return self::$instance;
    }
    private function __clone() {}
    private function __construct() {}

    /**
     * Return current Uri
     * @return string
     */
    public static function getURI(){
        $r = '';
        if(empty($r) && !empty($_SERVER['REQUEST_URI'])) {
            $r = trim($_SERVER['REQUEST_URI'], '/');
        }

        if(empty($r) && !empty($_SERVER['PATH_INFO'])) {
            $r = trim($_SERVER['PATH_INFO'], '/');
        }

        if(empty($r) && !empty($_SERVER['QUERY_STRING'])) {
            $r = trim($_SERVER['QUERY_STRING'], '/');
        }

        $r = strtok($r,'?');
        return $r;
    }

    /**
     * Main method for build application response
     * - it compares current uri with routes from "routesPath", and if it true: run next method for get response
     */
    public function send()
    {
        $this->routes = require_once($this->routesPath);
        foreach ($this->routes as $route){
            list($uri, $params) = $route;

            if ($this->uri == $uri){
                return $this->getResponse($params);
            }
        }

        $this->throw404();
    }

    /**
     * Method for get response
     * - processing input params for target route and run target method in controller
     * @param $params
     */
    protected function getResponse($params)
    {
        $action = isset($params['action']) ? $params['action'] : null;

        // check for auth
        $isNeedAuth = isset($params['isNeedAuth']) ? $params['isNeedAuth'] : null;
        if ($isNeedAuth && !AuthManager::getInstance()->isAuth()){
            return $this->throw404('Application error');
        }

        if (is_null($action)){
            return $this->throw404('Application error');
        }

        list($ctrl, $method) = explode('@', $action);
        $ctrl = "\App\Controllers\\$ctrl";

        if (class_exists($ctrl) && method_exists($ctrl, $method)){
            $params = [];
            $ctrl = new $ctrl();
            return $ctrl->$method($params);
        }
    }

    /**
     * Exit
     */
    protected function sendSuccess()
    {
        exit(200);
    }

    /**
     * 404 page
     * @param string $text
     */
    protected function throw404($text = 'Page was not found')
    {
        header("HTTP/1.0 404 Not Found");
        echo $text;
        exit(404);
    }
}
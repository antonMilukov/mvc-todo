<?php
namespace App\Services\Route;

class Route
{

    private static $instance = null;
    private $routesPath;
    protected $uri;
    protected $routes = [];

    /**
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

    public function send()
    {
        $this->routes = require_once($this->routesPath);
        foreach ($this->routes as $route){
            list($uri, $params) = $route;

            if ($this->uri == $uri){
                return $this->get($params);
            }
        }

        $this->throw404();
    }

    protected function get($params)
    {
        $action = isset($params['action']) ? $params['action'] : null;
        if (is_null($action)){
            return $this->throw404('Application error');
        }

        list($ctrl, $method) = explode('@', $action);
        $ctrl = "\App\Controllers\\$ctrl";

        if (class_exists($ctrl) && method_exists($ctrl, $method)){
            $params = [];
            $ctrl = new $ctrl();
            return $ctrl->$method($params);
//            var_dump($ctrl);die;
//            return call_user_func_array(array($ctrl, $method), $params);
        }
    }

    protected function saveRoute($uri, $params)
    {
        $this->routes[$uri]= [
            'uri' => $uri,
            'params' => $params
        ];
    }

    protected function sendSuccess()
    {
        exit(200);
    }

    protected function throw404($text = 'Page was not found')
    {
        header("HTTP/1.0 404 Not Found");
        echo $text;
        exit(404);
    }
}
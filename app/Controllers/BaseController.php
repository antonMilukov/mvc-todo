<?php
namespace App\Controllers;
use App\View;

class BaseController
{
    public $view = null;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function redirect($uri)
    {
        header('Location: ' . $uri, true, 301);
        exit();
    }

}
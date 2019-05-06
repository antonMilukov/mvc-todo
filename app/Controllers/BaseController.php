<?php
namespace App\Controllers;
use App\Services\View\View;

class BaseController
{
    /** @var View|null  */
    public $view = null;

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Internal redirect method
     * @param $uri
     */
    protected function redirect($uri)
    {
        header('Location: ' . $uri, true, 301);
        exit(301);
    }

}
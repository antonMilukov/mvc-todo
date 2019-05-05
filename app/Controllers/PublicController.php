<?php
namespace App\Controllers;
use App\Models\Task;

class PublicController extends BaseController
{
    public function index()
    {
        die("PublicController@index is!!!");
    }

    public function showList()
    {
        $tasks = Task::getInstance()->get();

        die("PublicController@showList is!!!");
    }
}
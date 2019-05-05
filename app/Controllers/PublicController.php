<?php
namespace App\Controllers;
use App\Models\Task;

class PublicController extends BaseController
{
    public function index()
    {
        $this->view->render('home', []);
    }

    public function showList()
    {
        $currentPage = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
        $tasks = Task::getInstance()->paginate(3, null, 'page', $currentPage);
        $this->view->render('tasks', ['tasks' => $tasks]);
    }

    public function createTask()
    {
        $this->view->render('task-form', ['task' => new Task(), 'formAction' => '/tasks/store']);
    }

    public function storeTask()
    {
        Task::getInstance()->fill($_REQUEST)->save();
        $this->redirect('/tasks');
    }
}
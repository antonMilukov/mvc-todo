<?php
namespace App\Controllers;
use App\Models\Task;
use App\Services\Auth\AuthManager;

class PublicController extends BaseController
{
    public function index()
    {
        $this->view->render('home', []);
    }

    public function showList()
    {
        $currentPage = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
        $tasks = Task::getInstance();

        list($sortString, $sort, $sortDirection) = $this->_getTasksListSort();
        if ($sort){
            $tasks = $tasks->orderBy($sort, $sortDirection);
        }

        $tasks = $tasks->paginate(3, null, 'page', $currentPage);
        $this->view->render('tasks', [
            'tasks' => $tasks,
            'sortString' => $sortString,
            'page' => $currentPage
        ]);
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

    private function _getTasksListSort()
    {
        $sortString = $sort = isset($_REQUEST['sort']) ? $_REQUEST['sort'] : null;
        $sortDirection = 'DESC';

        if ($sortString){
            if ($sortString[0] == '-'){
                $sortDirection = 'ASC';
                $sort = substr($sort, 1);
            }
        }

        return [$sortString, $sort, $sortDirection];
    }
}
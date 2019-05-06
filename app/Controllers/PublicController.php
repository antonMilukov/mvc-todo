<?php
namespace App\Controllers;
use App\Models\Task;

/**
 * Controller for public area
 * Class PublicController
 * @package App\Controllers
 */
class PublicController extends BaseController
{
    /**
     * Home page action
     */
    public function index()
    {
        $this->view->render('home', []);
    }

    /**
     * Tasks list action
     */
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

    /**
     * Create task action
     */
    public function createTask()
    {
        $this->view->render('task-form', ['task' => new Task(), 'formAction' => '/tasks/store']);
    }

    /**
     * Save task from "input task create form"
     */
    public function storeTask()
    {
        $input = [
            'username' => $_REQUEST['username'],
            'email' => $_REQUEST['email'],
            'text' => $_REQUEST['text'],
        ];
        Task::getInstance()->fill($input)->save();
        $this->redirect('/tasks');
    }

    /**
     * Internal method for init sorting params for "showList" action
     * @return array
     */
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
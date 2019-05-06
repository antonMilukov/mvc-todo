<?php
namespace App\Controllers;
use App\Models\Task;

/**
 * Controller for admin area
 * Class AdminController
 * @package App\Controllers
 */
class AdminController extends BaseController
{
    /**
     * Create task action
     */
    public function createTask()
    {
        $this->view->render('task-form', ['task' => new Task(), 'formAction' => '/admin/tasks/store']);
    }

    /**
     * Edit task action
     */
    public function editTask()
    {
        $task = Task::getInstance()->findOrFail($_REQUEST['id']);
        $this->view->render('task-form', ['task' => $task, 'formAction' => '/admin/tasks/store']);
    }

    /**
     * Save task action
     * - work for editing and create form
     */
    public function storeTask()
    {
        $isCompleted = isset($_REQUEST['isCompleted']) ? true : false;
        $status = $isCompleted ? Task::STATUS_COMPLETED : Task::STATUS_CREATED;
        $input = array_merge(['status' => $status], $_REQUEST);

        $id = isset($_REQUEST['taskId']) ? $_REQUEST['taskId'] : null;
        if ($id){
            $model = Task::getInstance()->find($id);
        } else {
            $model = Task::getInstance();
        }
        $model->fill($input)->save();

        $this->redirect('/tasks');
    }

}
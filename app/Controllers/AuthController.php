<?php
namespace App\Controllers;

use App\Services\Auth\AuthManager;
use App\Services\Session\SessionManager;

class AuthController extends BaseController
{

    public function login()
    {
        $error = SessionManager::getInstance()->get('login-error', null);
        SessionManager::getInstance()->set('login-error', null);

        $this->view->render('login', ['error' => $error]);
    }

    public function loginSend()
    {
        $r = AuthManager::getInstance()->login($_REQUEST['login'], $_REQUEST['password']);
        if ($r){
            $destination = '/tasks';
        } else {
            $destination = 'login';
            SessionManager::getInstance()->set('login-error', 'Login or password is incorrect');

        }
        $this->redirect($destination);
    }

    public function logout()
    {
        AuthManager::getInstance()->logout();
        $this->redirect('/tasks');
    }

}
<?php
class Register extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->mensaje2 = "";
    }

    function render()
    {
        $this->view->render('register');
    }

    function new_register()
    {
        $username = $this->getPost('username');
        $password = $this->getPost('password');
        $user = new UserModel();
        $user->setUsername($username);
        $user->setPassword($password);
        $user->save();
    }
    function newUser()
    {
        var_dump($_POST);
        if ($this->existPOST(['username', 'password'])) {

            $username = $this->getPost('username');
            $password = $this->getPost('password');

            //validate data
            if ($username == '' || empty($username) || $password == '' || empty($password)) {
                // error al validar datos
                //$this->errorAtSignup('Campos vacios');
                $this->redirect('register', ['error' => Errors::ERROR_SIGNUP_NEWUSER_EMPTY]);
            }

            $user = new UserModel();
            $user->setUsername($username);
            $user->setPassword($password);
            $user->setRole("user");

            if ($user->exists($username)) {
                //$this->errorAtSignup('Error al registrar el usuario. Elige un nombre de usuario diferente');
                $this->redirect('register', ['error' => Errors::ERROR_SIGNUP_NEWUSER_EXISTS]);
                //return;
            } else if ($user->save()) {
                //$this->view->render('main');
                $this->redirect('login', ['success' => Success::SUCCESS_SIGNUP_NEWUSER]);
            } else {
                /* $this->errorAtSignup('Error al registrar el usuario. Inténtalo más tarde');
                return; */
                $this->redirect('register', ['error' => Errors::ERROR_SIGNUP_NEWUSER]);
            }
        } else {
            // error, cargar vista con errores
            //$this->errorAtSignup('Ingresa nombre de usuario y password');
            //$this->redirect('signup', ['error' => Errors::ERROR_SIGNUP_NEWUSER_EXISTS]);
        }
    }
}
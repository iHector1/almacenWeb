<?php
    class Register extends Controller {

        function __construct() {
            parent::__construct();
            $this->view->mensaje2 = "";
        }

        function render() {
            $this->view->render('register');
        }

        function new_register() {
          $username = $this->getPost('username');
          $password = $this->getPost('password');
          $user = new UserModel();
          $user->setUsername($username);
          $user->setPassword($password);
          $user->save();
        }
    }

<?php
    class Register extends Controller {

        function __construct() {
            parent::__construct();
            $this->view->mensaje2 = "";
        }

        function render() {
            $this->view->render('register');
        }
    }
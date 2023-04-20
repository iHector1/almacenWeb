<?php
    class Errores extends Controller {
        function __construct() {
            parent::__construct();
            $this->view->mensaje = "Error al cargar el recurso X";
            $this->view->render('error');
        }
    }
?>
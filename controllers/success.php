<?php

class Success extends Controller{

    function __construct(){
        parent::__construct();
        
        //echo "Error al cargar el recurso";
    }

    function nuevoHuesped(){
        $this->view->mensaje = "Nuevo huesped ingresado correctamente";
        $this->view->render('success/index');
    }
}
?>
<?php

class Nuevo extends Controller{


    function __construct(){
        parent::__construct();
        $this->view->mensaje="";
        
    }

    function render(){
        $this->view->render('nuevo/index');
    }

    function crear(){
        $habitacion = $_POST['habitacion'];
        $nombre     = $_POST['nombre'];
        $apellido   = $_POST['apellido'];

        if($this->model->insert(['habitacion' => $habitacion, 'nombre' => $nombre, 'apellido' => $apellido])){
            $this->view->mensaje = "Se ha realizado el check in correctamente";
            $this->view->render('nuevo/index');
        }else{
            $this->view->mensaje = "Esta habitacion ya esta ocupada";
            $this->view->render('nuevo/index');
        }
    }

}

?>
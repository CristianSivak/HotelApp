<?php



class Consulta extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render(){
        $huespedes = $this->view->datos = $this->model->get();
        $this->view->huespedes = $huespedes;
        $this->view->render('consulta/index');
    }

    function verHuesped($param = null){
        $idHuesped = $param[0];
        $huesped = $this->model->getById($idHuesped);

        session_start();
        $_SESSION["id_verHuesped"] = $huesped->habitacion;

        $this->view->huesped = $huesped;
        $this->view->mensaje = "";
        $this->view->render('consulta/detalle');
    }

    function actualizarHuesped($param = null){
        session_start();
        $habitacion = $_SESSION["id_verHuesped"];
        $nombre    = $_POST['nombre'];
        $apellido  = $_POST['apellido'];


        unset($_SESSION['id_verHuesped']);

        if($this->model->update(['habitacion' => $habitacion, 'nombre' => $nombre, 'apellido' => $apellido])){
            $huesped = new Huesped();
            $huesped->habitacion = $habitacion;
            $huesped->nombre = $nombre;
            $huesped->apellido = $apellido;

            $this->view->huesped = $huesped;
            $this->view->mensaje = "Huesped se ha modificado correctamente";
        }else{
            $this->view->mensaje = "No se pudo modificar huesped";
        }
        $this->view->render('consulta/detalle');
    }

    function eliminarHuesped($param = null){
        $habitacion = $param[0];

        if($this->model->delete($habitacion)){
            $mensaje ="El huesped ha realizado el check out correctamente";
            
        }else{
            $mensaje = "No se ha realizado el check out";
            
        }
        // $this->render();

        echo $mensaje;
    }

    
}

?>
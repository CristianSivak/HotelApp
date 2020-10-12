<?php



class NuevoModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        // insertar
        $query = $this->db->connect()->prepare('INSERT INTO huespedes (habitacion, nombre, apellido) VALUES(:habitacion, :nombre, :apellido)');
        try{
            $query->execute([
                'habitacion' => $datos['habitacion'],
                'nombre' => $datos['nombre'],
                'apellido' => $datos['apellido']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
        
        
    }
}

?>
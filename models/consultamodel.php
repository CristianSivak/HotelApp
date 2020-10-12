<?php

require 'models/huesped.php';

class ConsultaModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function get(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT * FROM huespedes');
            
            while($row = $query->fetch()){
                $item = new Huesped();
                $item->habitacion = $row['habitacion'];
                $item->nombre    = $row['nombre'];
                $item->apellido  = $row['apellido'];

                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
            return [];
        }
    }

    public function getById($id){
        $item = new Huesped();
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM huespedes WHERE habitacion = :habitacion');

            $query->execute(['habitacion' => $id]);
            
            while($row = $query->fetch()){
                
                $item->habitacion = $row['habitacion'];
                $item->nombre     = $row['nombre'];
                $item->apellido   = $row['apellido'];
            }
            return $item;
        }catch(PDOException $e){
            return null;
        }
    }

    public function update($item){
        $query = $this->db->connect()->prepare('UPDATE huespedes SET nombre = :nombre, apellido = :apellido WHERE habitacion = :habitacion');
        try{
            $query->execute([
                'habitacion' => $item['habitacion'],
                'nombre' => $item['nombre'],
                'apellido' => $item['apellido']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->connect()->prepare('DELETE FROM huespedes WHERE habitacion = :id');
        try{
            $query->execute([
                'id' => $id
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}
?>
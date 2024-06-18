<?php

namespace Model;

class Prompt extends ActiveRecord {
    protected static $tabla = 'prompts';
    protected static $columnasDB = ['id','descripcion'];

    public $id;

    public $descripcion;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->descripcion = $args['descripcion'] ?? '';
 
    }
// Mensajes de validación para la creación de un evento
public function validar() {
    
    if(!$this->descripcion) {
        self::$alertas['error'][] = 'El Prompt es Obligatoria';
    }

    return self::$alertas;
}
}



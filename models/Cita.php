<?php

namespace Model;

class Cita extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'citas';
    protected static $columnasDB = ['id', 'fecha', 'horaId', 'usuarioId'];

    public $id;
    public $fecha;
    public $horaId;
    public $usuarioId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
        $this->horaId = $args['horaId'] ?? '';
        $this->usuarioId = $args['usuarioId'] ?? '';
    }
}
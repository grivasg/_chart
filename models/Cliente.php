<?php

namespace Model;

class Cliente extends ActiveRecord
{
    protected static $tabla = 'cliente';
    protected static $columnasBD = ['cliente_nombre', 'cliente_direccion', 'cliente_telefono'];
    protected static $idTabla = 'cliente_id';

    public $cliente_id;
    public $cliente_nombre;
    public $cliente_direccion;
    public $cliente_telefono;

    public function __construct($args = [])
    {
        $this->cliente_id = $args['cliente_id'] ?? '';
        $this->cliente_nombre = $args['cliente_nombre'] ?? '';
        $this->cliente_direccion = $args['cliente_direccion'] ?? '';
        $this->cliente_telefono = $args['cliente_telefono'] ?? '';
    }
}

<?php

namespace Controllers;

use Exception;
use Model\Cliente; 
use MVC\Router; 

class DetalleController {

    public static function estadisticas(Router $router){
        $router->render('cliente/estadisticas');
    }

    public static function detalleVentasAPI()
    {
        try {
            $sql = "SELECT 
                    c.cliente_id, 
                    c.cliente_nombre,
                    COUNT(v.venta_id) AS total_ventas
                FROM 
                    cliente c
                JOIN 
                    ventas v ON c.cliente_id = v.venta_cliente
                GROUP BY 
                    c.cliente_id, c.cliente_nombre
                ORDER BY 
                    total_ventas DESC;";

            $datos = Cliente::fetchArray($sql);
            echo json_encode($datos);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error', 
                'codigo' => 0
            ]);
        }
    }
}

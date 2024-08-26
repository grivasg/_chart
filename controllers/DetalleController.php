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
            $sql = "SELECT cliente_id, cliente_nombre,
                    COUNT(venta_id) AS total_ventas
                    FROM cliente
                    JOIN ventas ON cliente_id = venta_cliente
                    GROUP BY cliente_id, cliente_nombre
                    ORDER BY total_ventas DESC";

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

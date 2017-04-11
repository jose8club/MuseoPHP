<?php
/**
 * Obtiene el detalle de una obra de arte especificado por
 * su identificador "idobra"
 */
require 'Museo.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['idobra'])) {
        // Obtener parámetro idobra
        $parametro = $_GET['idobra'];
        // Tratar retorno
        $retorno = Museo::getById($parametro);
        if ($retorno) {
            // Enviar objeto json de la obra
            print json_encode($retorno);
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    'mensaje' => 'No se obtuvo el registro'
                )
            );
        }
    } else {
        // Enviar respuesta de error
        print json_encode(
            array(
                'mensaje' => 'Se necesita un identificador'
            )
        );
    }
}

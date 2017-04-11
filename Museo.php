<?php
/**
 * Representa el la estructura de las Obras de Arte
 * almacenadas en la base de datos
 */
require 'Database.php';
class Museo
{
    function __construct()
    {
    }

    /**
     * Obtiene los campos de una obra de Arte con un identificador
     * determinado
     *
     * @param $idobra Identificador de la obra de arte
     * @return mixed
     */
    public static function getById($idobra)
    {
        // Consulta de la tabla obra
        $consulta = "SELECT * FROM obra WHERE idobra = ?";
        
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($idobra));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }
}
?>
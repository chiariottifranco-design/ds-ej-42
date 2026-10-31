<?php
require_once __DIR__ . '/../core/Database.php';

class Recital {
    private const NOMBRE_CLASE = 'Recital';
    
    public $Id;
    public $Nombre;
    public $Lugar;
    public $Fecha;
    public $Hora;
    public $Capacidad;
    public $PrecioEntrada;

    public function __construct() {
        // Constructor vacío para que FETCH_CLASS funcione correctamente
    }

    /**
     * Obtener todas las personas desde la BD
     * Usando FETCH_CLASS para mapear automáticamente a objetos Persona (ORM)
     */
    public static function obtenerTodas() {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('SELECT Id, Nombre, Lugar, Fecha, Hora, Capacidad, PrecioEntrada FROM Recitales ORDER BY Id DESC');
            $stmt->execute();
            
            // PDO mapea automáticamente las columnas a las propiedades de la clase
            return $stmt->fetchAll(PDO::FETCH_CLASS, self::NOMBRE_CLASE);
        } catch (PDOException $r) {
            error_log("Error al obtener Recitales: " . $r->getMessage());
            return [];
        }
    }

    /**
     * Obtener una persona por ID
     * Usando FETCH_CLASS para mapear automáticamente a objeto Persona (ORM)
     */
    public static function obtenerPorId($Id) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('SELECT Id, Nombre, Lugar, Fecha, Hora, Capacidad, PrecioEntrada FROM Recitales WHERE Id = :id');
            $stmt->execute([':id' => $Id]);
            
            // PDO mapea automáticamente las columnas a las propiedades de la clase
            $stmt->setFetchMode(PDO::FETCH_CLASS, self::NOMBRE_CLASE);
            return $stmt->fetch();
        } catch (PDOException $r) {
            error_log("Error al obtener Recital: " . $r->getMessage());
            return null;
        }
    }

    /**
     * Agregar una nueva persona
     */
    public static function agregar($Nombre, $Lugar, $Fecha, $Hora, $Capacidad, $PrecioEntrada) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('INSERT INTO Recitales (Nombre, Lugar, Fecha, Hora, Capacidad, PrecioEntrada) VALUES (:nombre, :lugar, :fecha, :hora, :capacidad, :precioEntrada)');
            
            return $stmt->execute([
                ':nombre' => $Nombre,
                ':lugar' => $Lugar,
                ':fecha' => $Fecha,
                ':hora' => $Hora,
                ':capacidad' => $Capacidad,
                ':precioEntrada' => $PrecioEntrada
            ]);
        } catch (PDOException $r) {
            error_log("Error al agregar Recital: " . $r->getMessage());
            return false;
        }
    }

    /**
     * Editar una persona existente
     */
    public static function editar($Id, $Nombre, $Lugar, $Fecha, $Hora, $Capacidad, $PrecioEntrada) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('UPDATE Recitales SET Nombre = :nombre, Lugar = :lugar, Fecha = :fecha, Hora = :hora, Capacidad = :capacidad, PrecioEntrada = :precioEntrada WHERE Id = :id');
            
            return $stmt->execute([
                ':id' => $Id,
                ':nombre' => $Nombre,
                ':lugar' => $Lugar,
                ':fecha' => $Fecha,
                ':hora' => $Hora,
                ':capacidad' => $Capacidad,
                ':precioEntrada' => $PrecioEntrada
            ]);
        } catch (PDOException $r) {
            error_log("Error al editar Recital: " . $r->getMessage());
            return false;
        }
    }

    /**
     * Eliminar una persona
     */
    public static function eliminar($Id) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('DELETE FROM Recitales WHERE Id = :id');
            
            return $stmt->execute([':id' => $Id]);
        } catch (PDOException $r) {
            error_log("Error al eliminar Recital: " . $r->getMessage());
            return false;
        }
    }
}
?>

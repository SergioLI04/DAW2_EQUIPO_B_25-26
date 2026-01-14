<?php

namespace la_cremallera\database;


require_once __DIR__ . '/ConexionDB.php';

use la_cremallera\database\ConexionDB;
use la_cremallera\err\FuncionesDBException;
use PDO;

final class FuncionesDBInventario{
    // ---READ---

    /**
     * getInventario()
     * Obtiene todos los datos de la tabla de inventario
     * 
     * Columnas:
     * - itemId
     * - nombre
     * - descripcion
     * - cantidad
     * - stock_minimo
     * 
     * Excepciones:
     * - FuncionesDBException
     * - PDOException
     */
    final public static function getInventario(){
        $q_selectInventario="SELECT * FROM inventario";

        $conexion = ConexionDB::getConnection();
        if (!isset($conexion)) {
            throw new FuncionesDBException("ERROR FUNCIONES BD (INVENTARIO): no se ha podido establecer conexion BBDD");
        }

        $stmt = $conexion->prepare($q_selectInventario);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * getItem($args)
     * Obtiene los datos de un item en el inventario por el itemId
     * 
     * $args:
     * - itemId (requerido)
     * 
     * Columnas:
     * - itemId
     * - nombre
     * - descripcion
     * - cantidad
     * - stock_minimo
     * 
     * Excepciones:
     * - FuncionesDBException
     * - PDOException
     */
    final public static function getItem(array $args): array 
{
    // 1. Validación estricta y limpieza de entrada
    $itemId = filter_var($args['itemId'] ?? null, FILTER_VALIDATE_INT);

    if ($itemId === false || $itemId < 0) {
        throw new FuncionesDBException("ERROR FUNCIONES BD (INVENTARIO): itemId inválido o no proporcionado");
    }

    try {
        $conexion = ConexionDB::getConnection();
        
        // 2. Verificación de la conexión
        if (!$conexion) {
            throw new Exception("No se pudo establecer la conexión");
        }

        // 3. Preparación y ejecución optimizada
        $q_selectItem = "SELECT * FROM inventario WHERE itemId = :id LIMIT 1";
        $stmt = $conexion->prepare($q_selectItem);
        $stmt->execute([":id" => $itemId]);

        // 4. Retorno de un único registro (o array vacío si no existe)
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: [];

    } catch (PDOException $e) {
        // Log del error real para el desarrollador, pero excepción genérica para el sistema
        error_log("Error en getItem: " . $e->getMessage());
        throw new FuncionesDBException("ERROR FUNCIONES BD (INVENTARIO): Fallo al consultar la base de datos");
    } catch (Exception $e) {
        throw new FuncionesDBException("ERROR FUNCIONES BD (INVENTARIO): " . $e->getMessage());
    }
}

    /**
     * getItemsBajoStock()
     * Obtiene una lista de los items en el inventario cuyo stock es menor o igual que la cantidad mínima
     * 
     * Columnas:
     * - itemId
     * - nombre
     * - descripcion
     * - cantidad
     * - stock_minimo
     * 
     * Excepciones:
     * - FuncionesDBException
     * - PDOException
     */
    final public static function getItemsBajoStock(){
        $q_selectLowStock="SELECT * FROM inventario WHERE cantidad <= stock_minimo";

        $conexion = ConexionDB::getConnection();
        if (!isset($conexion)) {
            throw new FuncionesDBException("ERROR FUNCIONES BD (INVENTARIO): no se ha podido establecer conexion BBDD");
        }

        $stmt = $conexion->prepare($q_selectLowStock);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ---CREATE---

    /**
     * insertItem($args) 
     * Recibe argumentos para insertar datos de un item en el inventario
     * 
     * $args:
     * - nombre (requerido)
     * - descripcion
     * - cantidad (default 0)
     * - stock_minimo (default 0)
     * 
     * Excepciones:
     * - FuncionesDBException
     * - PDOException
     */
    final public static function insertItem($args){
        $q_insertItem="INSERT INTO inventario (nombre,descripcion,cantidad,stock_minimo) VALUES ".
        "(:nombre,:descripcion,:cantidad,:stock)";

        $nombre=$args['nombre']??'';
        $descripcion=$args['descripcion']??'';
        $cantidad=$args['cantidad']??0;
        $stock=$args['stock_minimo']??0;

        if($nombre==''){
            throw new FuncionesDBException("ERROR FUNCIONES BD (INVENTARIO): El campo nombre es requerido");
        }

        $conexion = ConexionDB::getConnection();
        if (!isset($conexion)) {
            throw new FuncionesDBException("ERROR FUNCIONES BD (INVENTARIO): no se ha podido establecer conexion BBDD");
        }

        $stmt = $conexion->prepare($q_insertItem);
        $exito= $stmt->execute([
            ":nombre"=>$nombre,
            ":descripcion"=>$descripcion,
            ":cantidad"=>$cantidad,
            ":stock"=>$stock
        ]);

        return $exito;
    }

    // ---UPDATE---
    /**
     * updateItem($args) 
     * Recibe argumentos para actualizar un item del inventario
     * 
     * $args:
     * - itemId (requerido)
     * - nombre (requerido)
     * - descripcion
     * - cantidad (default 0)
     * - stock_minimo (default 0)
     * 
     * Excepciones:
     * - FuncionesDBException
     * - PDOException
     */
    final public static function updateItem($args){
        $q_updateItem="UPDATE inventario SET nombre = :nombre, descripcion = .descripcion, cantidad = :cantidad, stock_minimo = :stock ".
        "WHERE itemId = :id";

        $itemId=$args['itemId']??-1;

        if ($itemId < 0 || gettype($itemId) != 'integer') {
            throw new FuncionesDBException("ERROR FUNCIONES BD (FACTURAS): valor de itemId no reconocido");
        }
        
        $nombre=$args['nombre']??'';
        $descripcion=$args['descripcion']??'';
        $cantidad=$args['cantidad']??0;
        $stock=$args['stock_minimo']??0;

        if($nombre==''){
            throw new FuncionesDBException("ERROR FUNCIONES BD (INVENTARIO): El campo nombre es requerido");
        }

        if($cantidad<0||$stock<0){
            throw new FuncionesDBException("ERROR FUNCIONES BD (INVENTARIO): El campo cantidad y stock_minimo deben ser numeros no negativos");

        }

        $conexion = ConexionDB::getConnection();
        if (!isset($conexion)) {
            throw new FuncionesDBException("ERROR FUNCIONES BD (INVENTARIO): no se ha podido establecer conexion BBDD");
        }

        $stmt = $conexion->prepare($q_updateItem);
        $exito= $stmt->execute([
            ":nombre"=>$nombre,
            ":descripcion"=>$descripcion,
            ":cantidad"=>$cantidad,
            ":stock"=>$stock
        ]);

        return $exito;
    }

    // ---DELETE---

    /**
     * deleteItem($args)
     * Elimina un item del inventario en base al id aportado
     * 
     * $args:
     * - itemId (requerido)
     * 
     * Excepciones:
     * - FuncionesDBException
     * - PDOException
     */
    final public static function deleteItem($args){
        $q_deleteItem="DELETE FROM inventario WHERE itemId = :id";

        $itemId=$args['itemId']??-1;

        if ($itemId < 0 || gettype($itemId) != 'integer') {
            throw new FuncionesDBException("ERROR FUNCIONES BD (FACTURAS): valor de itemId no reconocido");
        }

        $conexion = ConexionDB::getConnection();
        if (!isset($conexion)) {
            throw new FuncionesDBException("ERROR FUNCIONES BD (INVENTARIO): no se ha podido establecer conexion BBDD");
        }

        $stmt = $conexion->prepare($q_deleteItem);
        $exito= $stmt->execute([
            ":id"=>$itemId
        ]);

        return $exito;
    }

}
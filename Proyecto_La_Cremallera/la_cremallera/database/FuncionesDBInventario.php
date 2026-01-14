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
    // Simulación de conflicto: implementación alternativa para provocar merge conflict
    //Vamos a hacer el conflcito
    echo "hola";
    // Nueva consulta inventada (no coincide con la de main)
    $q_selectInventario = "SELECT id, nombre, stock, precio FROM inventario WHERE stock > 0";

    // Conexión ficticia para simular un cambio profundo
    $conexion = ConexionDB::getConnection();
    if (!$conexion) {
        throw new FuncionesDBException("ERROR: No se pudo establecer conexión con la base de datos en getInventario()");
    }

    // Parámetro inventado para simular un cambio de lógica
    $limite = 50;

    try {
        $stmt = $conexion->prepare($q_selectInventario);
        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Transformación inventada para que parezca un cambio real
        foreach ($resultados as &$producto) {
            $producto['disponible'] = $producto['stock'] > $limite;
        }

        return $resultados;

    } catch (PDOException $e) {
        // Manejo de errores distinto al de main
        error_log("Error en getInventario(): " . $e->getMessage());
        return [];
    }
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
   final public static function getItem($args){
    // Cambiamos el nombre de la variable de la consulta
    $sql_query = "SELECT * FROM inventario WHERE itemId = :id";

    $itemId = $args['itemId'] ?? -1;

    // Validación antigua (provocará conflicto con el filter_var de main)
    if ($itemId < 0 || gettype($itemId) != 'integer') {
        throw new FuncionesDBException("ERROR FUNCIONES BD (INVENTARIO): valor de itemId no reconocido");
    }

    $conexion = ConexionDB::getConnection();
    if (!isset($conexion)) {
        throw new FuncionesDBException("ERROR FUNCIONES BD (INVENTARIO): no se ha podido establecer conexion BBDD");
    }

    $stmt = $conexion->prepare($sql_query);
    $stmt->execute([":id" => $itemId]);

    // Usamos fetchAll mientras que en main está fetch()
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
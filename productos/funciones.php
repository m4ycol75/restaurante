<?php 
    require_once __DIR__ .'/../config/database.php'; 
 
    function obtenerProducto() { 
        global $tasksCollection2; 
        return $tasksCollection2->find(); 
    } 
 
    function formatDate($date) { 
        return $date->toDateTime()->format('Y-m-d'); 
    } 
    function sanitizeInput($input) { 
        return htmlspecialchars(strip_tags(trim($input))); 
    } 
    function registrarProducto($nombre, $precio, $descripcion,$categoria) { 
        global $tasksCollection2; 
        $resultado = $tasksCollection2->insertOne([ 
            'nombre' => sanitizeInput($nombre), 
            'precio' => sanitizeInput($precio), 
            'descripcion' => sanitizeInput($descripcion), 
            'categoria' => sanitizeInput($categoria),
            'disponible' => true 
        ]); 
        return $resultado->getInsertedId(); 
    } 
    function obtenerProductoPorId($id) { 
        global $tasksCollection2; 
        return $tasksCollection2->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]); 
    } 
    function actualizarProducto($id, $nombre, $precio, $descripcion, $categoria) { 
        global $tasksCollection2; 
        $resultado = $tasksCollection2->updateOne( 
            ['_id' => new MongoDB\BSON\ObjectId($id)], 
            ['$set' => [ 
                'nombre' => sanitizeInput($nombre), 
                'precio' => sanitizeInput($precio), 
                'descripcion' => sanitizeInput($descripcion), 
                'categoria' => sanitizeInput($categoria)
            ]] 
        ); 
        return $resultado->getModifiedCount(); 
    } 
    function eliminarProducto($id) { 
        global $tasksCollection2;
        $resultado = $tasksCollection2->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);  
        return $resultado->getDeletedCount(); 
    } 
    
     
?>
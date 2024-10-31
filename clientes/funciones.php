<?php 
    require_once __DIR__ .'/../config/database.php'; 
 
    function obtenerTareas() { 
        global $tasksCollection; 
        return $tasksCollection->find(); 
    } 
 
    function formatDate($date) { 
        return $date->toDateTime()->format('Y-m-d'); 
    } 
    function sanitizeInput($input) { 
        return htmlspecialchars(strip_tags(trim($input))); 
    } 
    function registrarCliente($nombre, $correo, $telefono,$direccion) { 
        global $tasksCollection; 
        $resultado = $tasksCollection->insertOne([ 
            'nombre' => sanitizeInput($nombre), 
            'correo' => sanitizeInput($correo), 
            'telefono' => sanitizeInput($telefono), 
            'direccion' => sanitizeInput($direccion) 
        ]); 
        return $resultado->getInsertedId(); 
    } 
    function obtenerClientePorId($id) { 
        global $tasksCollection; 
        return $tasksCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]); 
    } 
    function actualizarCliente($id, $nombre, $correo, $telefono, $direccion) { 
        global $tasksCollection; 
        $resultado = $tasksCollection->updateOne( 
            ['_id' => new MongoDB\BSON\ObjectId($id)], 
            ['$set' => [ 
                'nombre' => sanitizeInput($nombre), 
                'correo' => sanitizeInput($correo), 
                'telefono' => sanitizeInput($telefono), 
                'direccion' => sanitizeInput($direccion)
            ]] 
        ); 
        return $resultado->getModifiedCount(); 
    } 
    function eliminarCliente($id) { 
        global $tasksCollection;
        $resultado = $tasksCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);  
        return $resultado->getDeletedCount(); 
    } 
    
     
?>
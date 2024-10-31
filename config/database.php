<?php
require_once __DIR__ . '/../vendor/autoload.php';

$mongoClient = new MongoDB\Client("mongodb+srv://maycolguzmanmiranda75:jzvzZ2F86eH9OGfP@cluster0.gfnmf.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0");
//$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$database = $mongoClient->selectDatabase('clientes');
$tasksCollection = $database->datos;

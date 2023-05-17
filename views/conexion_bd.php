<?php
$host = 'localhost'; // nombre del servidor
$dbname = 'orders'; // nombre de la base de datos
$username = 'root'; // nombre de usuario de la base de datos
$password = ''; // contraseña de la base de datos

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); // conexión a la base de datos
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // configuración de excepciones para errores
    //echo "Conexión exitosa a la base de datos";
} catch(PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}
?>

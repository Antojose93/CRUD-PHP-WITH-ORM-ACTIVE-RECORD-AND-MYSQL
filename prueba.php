<?php

require_once './models/repository/OrderRepository.php';
require_once './models/repository/UserRepository.php';


//Configuramos zona horaria
date_default_timezone_set('America/Bogota');
$order = OrderRepository::find_order_by_cedula("1047458073");

if ($order) {
    echo "ID de orden: " . $order->id . "<br>";
    echo "Fecha de creación: " . $order->date->format('Y-m-d') . "<br>";
    echo "Fecha de envío: " . $order->ship_date->format('Y-m-d ') . "<br>";
    echo "Fecha de entrega: " . $order->delivery_date->format('Y-m-d ') . "<br>";
    echo "Cliente: " . $order->customer . "<br>";
    echo "Proveedor: " . $order->provider . "<br>";
    echo "Monto: " . $order->amount . "<br>";
    echo "Estado: " . $order->status . "<br>";
    echo "País: " . $order->country . "<br>";
    echo "Departamento: " . $order->state . "<br>";
    echo "Ciudad: " . $order->city . "<br>";
    echo "Dirección: " . $order->address . "<br>";
    echo "Propina: " . $order->tips . "<br>";
    echo "Cédula del usuario: " . $order->users_cedula . "<br>";

} else {
    echo "No se encontraron órdenes para este usuario";
}








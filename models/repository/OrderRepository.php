<?php

require_once  $_SERVER["DOCUMENT_ROOT"].'\Antonio_Hurtado\models\entities\Order.php';

class OrderRepository {
    
    public static function add_order($date, $ship_date, $delivery_date, $customer, $provider, $amount, $status, $country, $state, $city, $address, $tips, $users_cedula) {
        $o = new Order();
        $o->date = $date;
        $o->ship_date = $ship_date;
        $o->delivery_date = $delivery_date;
        $o->customer = $customer;
        $o->provider = $provider;
        $o->amount = $amount;
        $o->status = $status;
        $o->country = $country;
        $o->state = $state;
        $o->city = $city;
        $o->address = $address;
        $o->tips = $tips;
        $o->users_cedula = $users_cedula;
        try {
            return $o->save();
        } catch (Exception $exc) {
            $mensaje = $exc->getMessage();    
                if (strstr($mensaje, "Duplicate entry")) {
                    echo "La orden con id $o->id ya existe";       
                }else{
                    echo 'Error no conocido hasta el momento La orden no fue insertada en la base de datos';
                }
        }
    }
    
    public static function find_order_by_id($id) {
        try {
            return Order::find(array('conditions' => array('id' => $id)));
        } catch (Exception $exc) {
            echo "Error al buscar la orden con id $id: " . $exc->getMessage();
        }
    }
    public static function find_order_by_cedula($cedula) {
        try {
            return Order::find(array('conditions' => array('users_cedula' => $cedula)));
        } catch (Exception $exc) {
            echo "Error al buscar la orden con cedula $cedula: " . $exc->getMessage();
        }
    }

    
    
    public static function find_all_orders() {
        try {
            return Order::all();
        } catch (Exception $exc) {
            echo "Error al buscar todas las ordenes: " . $exc->getMessage();
        }
    }
    
        public static function update_order($id, $date, $ship_date, $delivery_date, $customer, $provider, $amount, $status, $country, $state, $city, $address, $tips, $user_cedula) {
        $o = Order::find($id);
        if ($o) {
            $o->date = $date;
            $o->ship_date = $ship_date;
            $o->delivery_date = $delivery_date;
            $o->customer = $customer;
            $o->provider = $provider;
            $o->amount = $amount;
            $o->status = $status;
            $o->country = $country;
            $o->state = $state;
            $o->city = $city;
            $o->address = $address;
            $o->tips = $tips;
            $o->users_cedula = $user_cedula;
            try {
                return $o->save();
            } catch (Exception $exc) {
                $mensaje = $exc->getMessage();    
                if (strstr($mensaje, "Duplicate entry")) {
                    echo "La orden con id $o->id ya existe";       
                } else {
                    echo 'Error no conocido hasta el momento La orden no fue actualizada en la base de datos';
                }
            }
        } else {
            echo "La orden con id $id no existe";
        }
    }
    
    public static function delete_order_by_id($id) {
        try {
            return Order::delete_all(array('conditions' => array('id' => $id)));
        } catch (Exception $exc) {
            echo "Error al tratar de borrar la orden con id $id: " . $exc->getMessage();
        }
    }
    
    public static function find_orders_by_customer($customer) {
        try {
            return Order::find_by_customer($customer);
        } catch (Exception $exc) {
            echo "Error al buscar las ordenes con cliente $customer ".$exc->getMessage();
            }
    
    }
}    

